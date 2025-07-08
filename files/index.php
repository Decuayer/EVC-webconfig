<?php
session_start();
include 'languageController.php';
include 'optionsAndControls.php';

$error = "";
$_SESSION["forcedToLogin"] = "";
$_SESSION["tempToken"] = md5(uniqid(mt_rand(), true)); // Pre-login token for change password

function language_list()
{
  $turkish = _TURKISH;
  $english = _ENGLISH;
  $german = _GERMAN;
  $french = _FRENCH;
  $spanish = _SPANISH;
  $italian = _ITALIAN;
  $finnish = _FINNISH;
  $norwegian = _NORWEGIAN;
  $romanian = _ROMANIAN;
  $swedish = _SWEDISH;
  $dutch = _DUTCH;
  $hebrew = _HEBREW;
  $danish = _DANISH;
  $czech = _CZECH;
  $polish = _POLISH;
  $hungarian = _HUNGARIAN;
  $slovak = _SLOVAK;
  $bulgarian = _BULGARIAN;
	$greek = _GREEK;
	$montenegrin = _MONTENEGRIN;
	$bosnian = _BOSNIAN;
	$serbian = _SERBIAN;
	$croatian = _CROATIAN;

  $language_list = array($turkish, $english,$german,$french,$romanian,$spanish,$italian,$finnish,$norwegian,$swedish,$hebrew,$danish,$czech,$polish,$hungarian,$slovak,$dutch,$bulgarian,$greek,$montenegrin,$bosnian,$serbian,$croatian);
  $key_list = array("tr", "en","de","fr","ro","es","it","fi","no","sv","he","da","cz","pl","hu","sk","nl","bg","gr","me","ba","rs","hr");
  $language_array = array();
  foreach ($key_list as $key => $lang) {
      $language_array[$key]['value'] = $lang;
  }
  foreach ($language_list as $key => $lang) {
      $language_array[$key]['lang'] = $lang;
  }
  return $language_array;
}

function get_ip_address() {
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ipAddr = $_SERVER['HTTP_CLIENT_IP'];
  } elseif ($_SERVER['HTTP_X_FORWARDED_FOR']) {
    $ipAddr = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ipAddr = $_SERVER['REMOTE_ADDR'];
  }
  return $ipAddr;
}

function is_login_locked($webconfigDB) {
  $currentTime = time();
  $lockThreshold = 3;
  $duration = 1800;
  $query = "SELECT COUNT(*) as totalCount,
            MAX(timeStamp) as lastTimeStamp
            FROM loginAttempts
            WHERE timeStamp >= :lastTime
            AND timeStamp <= :currentTime";

  $stmt = $webconfigDB->prepare($query);
  $stmt->bindValue(':lastTime', $currentTime - $duration, SQLITE3_INTEGER);
  $stmt->bindValue(':currentTime', $currentTime, SQLITE3_INTEGER);
  $res = $stmt->execute();

  $row = $res->fetchArray();
  $totalCount = $row['totalCount'];
  $lastTimeStamp = $row['lastTimeStamp'];
  if ($totalCount >= $lockThreshold && $currentTime <= ($lastTimeStamp + $duration)) {
    return true;
  }
  return false;
}



function log_failed_attempts($webconfigDB, $username, $loginTrue) {
  $time = time();
  $ipAddr = get_ip_address();
  if (empty(is_login_locked($webconfigDB)) && empty($loginTrue)) {
    $query = "INSERT INTO loginAttempts (username, ipAddress, timeStamp) 
                  VALUES (:username, :ipAddr, :timeStamp)";
  
    $stmt = $webconfigDB->prepare($query);
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $stmt->bindValue(':ipAddr', $ipAddr, SQLITE3_TEXT);
    $stmt->bindValue(':timeStamp', $time, SQLITE3_INTEGER);
    $stmt->execute();
    error_log("Failed to login! \nusername : $username \nIP Address : $ipAddr \nTimestamp : $time");
  }

  return is_login_locked($webconfigDB);
}

if (file_exists("/var/lib/vestel/webconfig.db")) {
  class MyDBWebconfig extends SQLite3
  {
    function __construct()
    {
      $this->open('/var/lib/vestel/webconfig.db');
    }
  }
  $webconfigDB = new MyDBWebconfig();
  $webconfigDB->busyTimeout(10000);
  if (!$webconfigDB) {
    $error = "Error occured : " . $db->lastErrorMsg();
  }
  //Account
  $dbFirstLogin = false;
  $stmt = $webconfigDB->prepare("SELECT * FROM account");
  $accountSettings = $stmt->execute(); // Execute the prepared statement
  while ($row = $accountSettings->fetchArray()) {
    if($row["firstLogin"] == "true"){
      $dbFirstLogin = $row["firstLogin"];
    }
  }
  //Language
  $stmt = $webconfigDB->prepare("SELECT webconfigLanguage FROM generalSettings WHERE id=:id");
  $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
  $rowLang = $stmt->execute();
  $lang = $rowLang->fetchArray();
  //Visibility
  $hideChangePassword = "block";
  $stmt = $webconfigDB->prepare("SELECT hiddenPageItems FROM visibility");
  $resVisibility = $stmt->execute(); // Execute the prepared statement
  while ($item = $resVisibility->fetchArray()) {
    if (strpos($item["hiddenPageItems"], 'changePasswordItem') !== false) {
      $hideChangePassword = "none";
    }
  }
} else {
  $error = _DBACCESSFAILURE;
}

if (isset($_POST["button_login"])) {
  $loginTrue = '';
  $username = $_POST["username"];
  $password = $_POST["pass"];
  $query = "SELECT * FROM account WHERE username= :username";
  if(strpos($username, "'") !== false){
    $username = str_replace('"', '""', $username);
    $query = 'SELECT * FROM account WHERE username="' . ":username" . '"';
  }
  $stmt = $webconfigDB->prepare($query);
  $stmt->bindValue(':username', $username, SQLITE3_TEXT);
  $res = $stmt->execute(); // Execute the prepared statement
  while ($row = $res->fetchArray()) {
    $id = $row['id'];
    $dbUsername  = $row["username"];
    $dbPassword = $row["password"];
    $dbForcedToLogin = $row["forcedToLogin"];
    $dbFirstLogin = $row["firstLogin"];
  }
  if ($id != "") {
    if(password_verify($password, $dbPassword)) {
      ChangeLog:: saveChangeLog("action: login", $dbUsername);
      $loginTrue = 'true';
    } else {
      //Wrong password
      ChangeLog:: saveChangeLog("action: loginAttemp", $dbUsername);
      $error = _USERAUTHFAILED;
    }
  } else {
    //Wrong username
    ChangeLog:: saveChangeLog("action: loginAttemp", $dbUsername);
    $error = _USERAUTHFAILED;
  }

  /*
      LOGIN LOCKOUT IMPLEMENTATION

      If there are invalid login attempts for 3 times, the webconfig
      login system will be locked for 1800 seconds (30 min.).
      Each failed attempt info will be logged into the webconfig
      database in the loginAttempts table. While the webconfig is locked,
      the user can't try a login attempt. If there is a successful
      attempt, all the logs will be deleted from database.
  */

  $pList = [
    '$2y$10$WUJm7u0GYjdX16QufUXUtu6qIV.vEdCRePpxRPCNi6WGoyaeWq7Fi' => 'admin',
    '$2y$10$6VlsFGtLNxuZ5T3Vf/q/IeEcC1ndRWFOvEsYyE23sqxxDg7krDkAe' => 'admin',
    '$2y$10$ydKmEfZ9Mjrp9cGW1NnmOuQYOv3mxV.8Nf5wCysw1Q94BkSG92pZS' => 'admin',
    '$2y$10$dy.lNpjxO3XMtHIQCdnst.G88zV/bgfRZaoYDjTsmk3iZM/XF03xK' => 'admin',
    '$2y$10$6.4m62tYkqEqivyv.zv0zOkvR9J.ecZ6iQFQRKoJqiVwt521iAURm' => 'admin',
    '$2y$10$O0dEYx3aaw3rtt7W4Cs71ufGw8p8SCq1E7HYWR.3XjzIoBQrcWE1S' => 'IES',
    '$2y$10$Ict2CoNYIaUToKv0pZ.F/OuQRhEKjqVHu.1zgc4YVnHNyYtxkwptS' => 'RonesansSarj',
    '$2y$10$skT2L5A/z9GPr1zCE/BKveeHt9UI8NfDOW0kzhzea/ttGGNLzp7ge' => 'dreev',
    '$2y$10$95OnIokroHoEZPri24bzVeGD9H16zDtB/QEJGkmaTZ/DSuJtNj4Ja' => 'evkalyon',
    '$2y$10$N2etSeW06l9QNaWUyXQFouKgdrQPF12tY5Gyn/avB1/g1SXwLGzha' => 'beefull',
    '$2y$10$rKeXeLjukcusvPet876GReqJS4bDO85wvDCQTY/OtWf21ZFYnonTq' => 'ByW@tt230'
  ];

  $loginLocked = log_failed_attempts($webconfigDB, $username, $loginTrue);
  if ($loginTrue == 'true' && empty($loginLocked) && empty($error)) {
    try {
      $stmt = $webconfigDB->prepare("DELETE FROM loginAttempts");
      $stmt->execute(); // Execute the delete query
      $_SESSION["username"] =  $dbUsername;
      if ($dbFirstLogin == "true" && $dbUsername == "user" && $dbForcedToLogin == "true") { //this part is used for user account
        $_SESSION["indexPage"] = true;
        header('Location: changePassword.php');
        $_SESSION["forcedToLogin"] = "none";
        exit();
      }
      foreach ($pList as $hashedP => $validUsername) {
        if (password_verify($password, $hashedP) && $dbUsername == $validUsername) {
            $_SESSION["indexPage"] = true;
            header('Location: changePassword.php');
            exit();
        }
      }

      $_SESSION["loginStatus"] = true;
      $_SESSION["firstLogin"] = $row["firstLogin"];
      $_SESSION["loggedIn"] = $id;
      $_SESSION["token"] = md5(uniqid(mt_rand(), true)); // Generate a new token for logged in operations
  
    } catch (Exception $e) {
      error_log("Could not delete values from database: {$e->getMessage()}");
    }
  } else {
    if (!empty($loginLocked)) {
      $error = _LOGINLOCKOUT;
    }
  }
  $webconfigDB->close();
  unset($webconfigDB);
  $_SESSION["error"] = $error;



  if(isset($_SESSION["passwordErrorCount"])){
    $_SESSION["passwordErrorCount"] += 1;
    if($_SESSION["passwordErrorCount"] == 3){
      sendZeroMqMessageWithTimestamp("eventNotification", "SecurityEventNotification","InvalidLocalUserCredentials", "Login attempted with invalid user credentials");
    }
  }else{
    $_SESSION["passwordErrorCount"] = 1;
  }


  if ($_POST) {
    header("Location: " . "http://" . $_SERVER['HTTP_HOST']);
    exit();
  }
}

if (isset($_SESSION["loginStatus"])) {
  if ($_SESSION["loginStatus"] == true && empty($_SESSION["error"])) {
    $_SESSION["passwordErrorCount"] = 0;
    if (file_exists("/var/lib/vestel/Device_logs*")) {
      shell_exec("rm /var/lib/vestel/Device_logs*");
    }
    $_SESSION['timeout'] = time();
    header("Location:index_main.php");
    exit();
  }
}

$deviceModel = "Configuration Interface";
$logoDisplay = "";
$customer = "";
$vfactoryPath = "/var/lib/configuration/vfactory.db";
$vfactoryDefaultPath = "/run/media/mmcblk1p3/vfactory.db";
$deviceDetailPath = "";
if (file_exists($vfactoryPath)){
	$deviceDetailPath = $vfactoryPath;
}
else{
	$deviceDetailPath = $vfactoryDefaultPath;
}
if (!file_exists("/run/media/mmcblk1p3/weblogo.png")) {
   $logoDisplay = "none;";
}

if (file_exists($deviceDetailPath)) {
  class MyDBVFactory extends SQLite3
  {
    function __construct()
    {
      global $deviceDetailPath;
      $this->open($deviceDetailPath);
    }
  }
  try {
    $vfactoryDB = new MyDBVFactory();
    $vfactoryDB->busyTimeout(10000);
    $stmt = $vfactoryDB->prepare("SELECT model, customer FROM deviceDetails WHERE id = :id");
    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
    $resDevice = $stmt->execute(); // Execute the prepared statement
    $rowDeviceDetails = $resDevice->fetchArray();
    $deviceModel = $rowDeviceDetails["model"] . " " . $deviceModel;
    $customer = $rowDeviceDetails["customer"];
    $vfactoryDB->close();
    unset($vfactoryDB);
  }
  catch (Error $e) {
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title><?= _CHARGERWEBUI ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
  <!--===============================================================================================-->
  <!-- php echo time(); function should be added at the end of css and js files -->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css?<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="css/util.css?<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="css/main.css?<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="css/webconfig.css?<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css?<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css?<?php echo time(); ?>">
  <!--===============================================================================================-->
</head>

<body>
  <nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark py-3 mb-4" aria-label="Offcanvas navbar large">
    <div class="container container-fluid d-flex justify-content-between align-items-center flex-wrap">
      <a href="#" class="navbar-brand d-flex align-items-center flex-shrink-1">
        <?php
          $imagePath = '/usr/share/webconfig/css/weblogo.png';
          $logoStyle = "margin-top:0.4%;width:80px;height:20px;";
          if(file_exists($imagePath)){
            $imageInfo = getimagesize($imagePath);
            $width = $imageInfo[0];
            $height = $imageInfo[1];
            if (($width > 0) && (($height / $width) == 1)) { //for the square
              if ($height > 50) {
                $logoStyle = "margin-top:0.4%;margin-left:15px;height:50px;width:50px;";
              } else {
                $margin = ((80 - $width) / 2);
                $logoStyle = "margin-left:{$margin} px; margin-top:0.4%;height:{$height} px;width:{$width} px;";
              }
            } else if (($width > 0) && (($height / $width) > 1)) { // for the rectangle 
              if ($height > 50) {
                $width = ($width * 50) / $height;
                $left = ((50 - $width) / 2);
                $logoStyle = "left:{$left} px; margin-top:0.4%;height:50px;width:{$width} px;";
              } else {
                $logoStyle = "margin-top:0.4%;height:50px;width:80px;";
              }
            } else { // for the rectangle
              $logoStyle = "margin-top:0.4%;height:20px;width:80px;";
            }
          }
        ?>
        <?php
          $logoPath = $_SERVER['DOCUMENT_ROOT'] . '/css/weblogo.png';
          if (file_exists($logoPath)) {
            echo '<img src="/css/weblogo.png" alt="logo" height="40" class="me-2" style="' . $logoStyle . 'display:' . $logoDisplay . ';">';
          }
        ?>
        <span class="m-2 text-nonwrap fs-6"><?php echo $deviceModel;?></span>
      </a>
      <div class="d-flex ms-auto">
        <form method="post">
          <select name="lang" id="lang" onchange="changeLanguageForLoginPage()" class="form-select form-select-sm bg-light text-dark w-auto">
            <?php foreach (language_list() as $t) { ?>
              <option value="<?php print $t['value'] ?>" <?= $lang["webconfigLanguage"] == $t['value'] ? ' selected="selected"' : ''; ?>>
                <?php print $t['lang'] ?>
              </option>
            <?php } ?>
          </select>
          <input id="changeLangButtonLogin" type="submit" hidden />
        </form>
      </div>
    </div>
  </nav>
  <main>
    <div class="animationBar">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
    <div class="container vh-100 d-flex justify-content-center align-items-center mb-5">
      <div class="row w-100">
        <div class="col-md-4 offset-md-4">
          <form role="form" method="post" autocomplete="off">
            <h2 class="h1-responsive text-center font-weight-bold my-4">
              <?= _LOGIN ?>
            </h2>

            <hr class="featurette-divider">

            <div class="mb-3" data-validate="<?= _USERNAMEREQUIRED ?>">
              <label for="username" class="form-label"><?= _USERNAME ?></label>
              <input class="form-control" type="text" id="username" name="username">
              <span class="error">*</span>
            </div>

            <div class="mb-3" data-validate="<?= _PASSWORDREQUIRED ?>">
              <label for="pass" class="form-label"><?= _PASSWORD ?></label>
              <div class="input-group">
                <input class="form-control" type="password" id="pass" name="pass">
                <button class="btn btn-outline-primary btn-show-pass" type="button">
                  <i class="fa fa-eye"></i>
                </button>
              </div>
              <span class="error">*</span>
            </div>
            
            <div id="loginErrorMessage" class="alert alert-danger" style="display:none;">
              Test Alert
            </div>
            <div class="mt-3">
              <?php
                if ($dbFirstLogin == "true" && strtolower($customer) != "webasto") { ?>
                  <div class="alert alert-info">
                    <?= _CHANGEPASSWORDSUGGESTION ?>
                  </div>
              <?php } ?>
            </div>
            <div class="d-grid">
              <input type="submit" id="login_button" class="btn btn-primary fs-4" name="login_button" onclick="checkRequirements(event);" value="<?= _LOGIN ?>">
              <input type="submit" id="button_login" name="button_login" hidden>
            </div> 
            <div class="mt-3 text-center">
              <a id="changePasswordText" onclick="changeLocation();" id = "changePasswordItem" style="display:<?php echo $hideChangePassword ?>" class="btn btn-link"><?= _CHANGEPASSWORD ?></a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <!-- Popup Modal -->
  <div id="documentModal" class="modal px-5">
    <div class="modal-content">
      <span class="position-absolute top-0 end-0 m-3 fs-4 fw-bold text-muted" style="cursor:pointer;" onclick="closeModal()">&times;</span>
      <p class="generalTitle" id="documentTitle" style="font-size: 16px;"></p>
      <p id="documentText"></p>
      <div class="checkbox-container">
        <input type="checkbox" id="readCheckbox" />
        <label for="readCheckbox" style="margin-left:20px; font-size: clamp(14px, 1vw, 16px);"><?= _READUNDERSTAND ?></label>
      </div>
      <div class="row justify-content-center">
        <button class="btn btn-primary w-50" id="confirmButton" onclick="loadNextDocument()" disabled><?= _CONFIRM ?></button>
      </div>
    </div>
  </div>
</body>


  <!--===============================================================================================-->
  <!-- php echo time(); function should be added at the end of css and js files -->
  <script src="js/jquery-3.7.1.min.js?<?php echo time(); ?>"></script>
  <script src="js/main.js?<?php echo time(); ?>"></script>
  <script src="js/jquery-ui.js?<?php echo time(); ?>"></script>
  <script src="js/jquery.cookie.js?<?php echo time(); ?>"></script>
  <script src="js/jquery.js?<?php echo time(); ?>"></script>
  <script src="js/bootstrap.min.js?<?php echo time(); ?>"></script>
  <script type="text/javascript">
    
    $('.animationBar').css('display', 'none');

    var div = document.createElement("div");
    div.className += "overlay";

    let documents = [];
    let currentDocIndex = 0;
		const loginProcessErrors = {
        _LOGINLOCKOUT : "<?= _LOGINLOCKOUT ?>",
				_USERAUTHFAILED : "<?= _USERAUTHFAILED ?>"
		}

    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("pass");

    window.checkRequirements = function(event) {
      event.preventDefault();
      document.body.appendChild(div);
      $('.animationBar').css('display', 'flex');
      passwordInput.readOnly = true;
      usernameInput.readOnly = true;

      const userName = document.getElementById("username").value;
      const password = document.getElementById("pass").value;
      var csrfToken = '<?php echo $_SESSION['tempToken'] ?>';
      var data = { action: "login", 
                    username: userName,
                    password: password,
                    tempToken: csrfToken
      };
      $.ajax({
          type: 'POST',
          data: data,
          url: 'login.php',
          dataType: 'json',
          success: function(response) {
            if(response.status.trim() == "success"){
              checkDocuments(userName, csrfToken);
            } else if (response.status.trim() == "changeLocation") {
              window.location.href = response.location.trim();
            }else{
              document.body.removeChild(div);
              $('.animationBar').css('display', 'none');

              $('#loginErrorMessage').text(loginProcessErrors[response.error.trim()]).show();
              usernameInput.readOnly = false;
              passwordInput.readOnly = false;
            }          
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.error("Error:", textStatus, errorThrown); // checks the errors
          }
      });
    }

    function checkDocuments(userName){
      var csrfToken = '<?php echo $_SESSION['tempToken'] ?>';
      var index = { action: "document", username: userName,
        tempToken: csrfToken
      };
      $.ajax({
          type: 'POST',
          data: index,
          url: 'login.php',
          success: function(response) {
            const data = JSON.parse(response);
            if (data.documents && data.documents.length > 0) {
              // when there is pop ups show them
              showDocumentPopup(data.documents);
            }else{
              document.body.appendChild(div);
              $('.animationBar').css('display', 'flex');
              document.getElementById("button_login").click();
            }
          
          }
      });
    }

    // show documentation on pop up
    function showDocumentPopup(docs) {
      documents = docs; // coming documentations
      currentDocIndex = 0;
      loadDocument();
      $('.animationBar').css('display', 'none');

      usernameInput.readOnly = false;
      passwordInput.readOnly = false;
      document.body.removeChild(div);
      document.getElementById("documentModal").style.display = "block";
      document.getElementById("readCheckbox").checked = false;
      document.getElementById("confirmButton").disabled = true;
     
    }

    function loadDocument() {
      if (currentDocIndex < documents.length) {     
        document.getElementById("documentTitle").innerText = documents[currentDocIndex].translatedDocumentName;
        document.getElementById("documentText").innerHTML = documents[currentDocIndex].documentText;
        document.getElementById("readCheckbox").checked = false;
        document.getElementById("confirmButton").disabled = true; 
      } else {
        closeModal();
      }
    }

    document.getElementById("readCheckbox").addEventListener("change", function () {
      const isChecked = this.checked;
      document.getElementById("confirmButton").disabled = !isChecked;
    });
    // load the next doc
    function loadNextDocument() {
      saveDocumentToUserApproval();
      currentDocIndex++;
      loadDocument();
    }

    function saveDocumentToUserApproval(){
      var csrfToken = '<?php echo $_SESSION['tempToken'] ?>';      
      var userName = document.getElementById("username").value;
      var index = { action: "saveDocument", username: userName,
        tempToken: csrfToken,
        documentObject: documents[currentDocIndex]
      };
      $.ajax({
          type: 'POST',
          data: index,
          url: 'login.php',
          success: function(response) {
            const data = JSON.parse(response);
            if (data.documents && data.documents.length > 0) {
              showDocumentPopup(data.documents);
            }
          }
      });
    }

    function closeModal() {
      document.getElementById("documentModal").style.display = "none";
    }

    function changeLanguageForLoginPage() {
      var getLangButton = document.getElementById("changeLangButtonLogin");
      getLangButton.click();
      var div = document.createElement("div");
      div.className += "overlay";
      document.body.appendChild(div);
      $('.animationBar').css('display', 'flex');
    }

    function changeLocation() {
      var csrfToken = '<?php echo $_SESSION['tempToken'] ?>';
      var index = { action: "directToChangePassword", tempToken: csrfToken};
      $.ajax({
          type: 'POST',
          data: index,
          url: 'login.php',
          success: function(data) {
            location.replace("changePassword.php");
          }
      });
  }
  </script>



</html>
