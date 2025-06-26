<?php
session_start();
if(isset($_SESSION["indexPage"])){
	unset($_SESSION["indexPage"]);
}else{
	header("Location: " . "http://" . $_SERVER['HTTP_HOST']);
	unset($_SESSION["indexPage"]);
}

$forcedToLogin = "flex";
$logInUser  = "";

if(isset($_SESSION["forcedToLogin"]) && $_SESSION["forcedToLogin"] == "none"){
	$forcedToLogin = $_SESSION["forcedToLogin"];
}


if($forcedToLogin == "none"){
        $logInUser = $_SESSION["username"];
}else{
        $logInUser = $_POST["username"];
}

include 'languageController.php';
$error = "";
unset($_SESSION["loginStatus"]);

function language_list()
{

	$turkish = _TURKISH;
	$english = _ENGLISH;
	$german = _GERMAN;
	$french = _FRENCH;
	$spanish = _SPANISH;
	$romanian = _ROMANIAN;
	$italian = _ITALIAN;
	$finnish = _FINNISH;
	$norwegian = _NORWEGIAN;
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

	// Language
	$rowLang = $webconfigDB->prepare("SELECT webconfigLanguage FROM generalSettings WHERE id= :id");
	$rowLang->bindValue(':id', 1, SQLITE3_INTEGER);
	$langResult = $rowLang->execute();
	$lang = $langResult->fetchArray();

	// Password Level
	$res = $webconfigDB->prepare("SELECT passwordLevel FROM account WHERE id= :id");
	$res->bindValue(':id', 1, SQLITE3_INTEGER);
	$resLevel = $res->execute();
	$rowLevel = $resLevel->fetchArray();

	$webconfigDB->close();
	unset($webconfigDB);
} else {
	$error = _DBACCESSFAILURE;
}


$deviceModel = "Configuration Interface";
$logoDisplay = "";
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

		// Model
		$resDevice = $vfactoryDB->prepare("SELECT model FROM deviceDetails WHERE id= :id");
		$resDevice->bindValue(':id', 1, SQLITE3_INTEGER);
		$resultDevice = $resDevice->execute();
		$rowModel = $resultDevice->fetchArray();
		$deviceModel = $rowModel["model"] . " " . $deviceModel;

		$vfactoryDB->close();
		unset($vfactoryDB);
	}
	catch (Error $e) {
	}
}

if (isset($_POST["changeLangButtonLogin"])) {
	$_SESSION["indexPage"] = true;
	header('Location: changePassword.php');
}
?>

<!DOCTYPE html>
<html>

<head>
	<title><?= _CHARGERWEBUI ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--===============================================================================================-->
	<!-- php echo time(); function should be added at the end of css and js files -->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css?<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="css/util.css?<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="css/main.css?<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="css/webconfig.css?<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css?<?php echo time(); ?>">
	<!--===============================================================================================-->
</head>

<body>
	<div class="flexColumn">
		<div class="containerMainTextArea">
			<li>
				<div class="titleBar" style="height:100px;">
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
            <div style=<?php echo $logoStyle ?>><img id="logo" style="<?php echo $logoStyle."display:".$logoDisplay; ?>" src="/css/weblogo.png" /></div>
            <div style="margin-top:0.3%;margin-left:0.3%;"><?php echo $deviceModel;?></div>
        </div>
				<div class="languagePosition">
					<form method="post">
						<div class="selectbox" style="min-width: 140px;">
							<select name="lang" id="lang" onchange="changeLanguageForLoginPage()">
								<?php foreach (language_list() as $t) { ?>
									<option value="<?php print $t['value'] ?>" <?= $lang["webconfigLanguage"] == $t['value'] ? ' selected="selected"' : ''; ?>>
										<?php print $t['lang'] ?>
									</option>
								<?php } ?>
							</select>
							<input id="changeLangButtonLogin" name="changeLangButtonLogin" type="submit" hidden />
						</div>
					</form>

				</div>
			</li>
		</div>

		<form class="login100-form validate-form flex-sb flex-w" role="form" method="post" autocomplete="off">

			<div class="animationBar">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>


			<div class="containerMainTextArea wrap" style="margin-left:42.06%; margin-right:29.06%; margin-top:4%; display:flex; text-transform: uppercase ; ">
				<p class="generalTitle"><?= _CHANGEPASSWORD ?></p>
			</div>
			<div class="containerMainTextArea wrap" style="margin-left:29.5%;margin-right:25.06%;margin-bottom:1%; display:flex;">
			<?php
				$password =  _PASSWORDTYPEEXPLANATIONLEVEL;
				if($rowLevel['passwordLevel'] == 2){
					$password =  _PASSWORDTYPEEXPLANATIONLEVEL2;
				}else {
					$password =  _PASSWORDTYPEEXPLANATIONLEVEL3;
				}		
				echo"<p class='generalExplanationText'>$password</p>"
			?>
			</div>
			<div class="containerMainTextArea wrap" style="margin-left:32.30%;margin-right:32%;margin-top:1%; margin-bottom:1%;display:<?php echo $forcedToLogin; ?>;">
				<p class="generalSubTitle"><?= _USERNAME ?></p>
			</div>
            <div class="wrap-input100 validate-input m-b-36" data-validate="<?= _USERNAMEREQUIRED ?>">
				<div id="userNameArea" class="containerMainTextArea" style="margin-left:30.5%; display:<?php echo $forcedToLogin; ?>;">
					<input class="textAreaChangePassword" type="text" name="username" id="username">
					<p id="star">*</p>
				</div> <!-- wrap input -->
			<div class="containerMainTextArea wrap" style="margin-left:32.30%;margin-right:32%;margin-top:1%; margin-bottom:1%;display:flex;">
				<p class="generalSubTitle"><?= _CURRENTPASSWORD ?></p>
			</div>
			<div class="wrap-input100 validate-input m-b-36" data-validate="<?= _CURRENTPASSWORDREQUIRED ?>">
				<div class="containerMainTextArea" style="margin-left:30.5%">
					<span class="btn-show-pass">
						<i class="fa fa-eye"></i>
					</span>
					<input class="textAreaChangePassword" type="password" name="currentPass" id="currentPass">
					<p id="star">*</p>

				</div> <!-- wrap input -->
				<!-- ******************************************************************************************** -->
				<div class="containerMainTextArea wrap" style="margin-left:32.30%;margin-right:32%;margin-top:1%; margin-bottom:1%;display:flex;">
					<p class="generalSubTitle"><?= _NEWPASSWORD ?></p>
				</div>
				<div class="wrap-input100 validate-input m-b-36" data-validate="<?= _PASSWORDREQUIRED ?>">
					<div class="containerMainTextArea" style="margin-left:30.5%">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="textAreaChangePassword" type="password" name="pass" id="pass">
						<p id="star">*</p>

					</div> <!-- wrap input -->

					<div class="containerMainTextArea wrap" style="margin-left:32.30%;margin-bottom:1%;margin-top:1%;margin-right:32%;display:flex;">
						<p class="generalSubTitle"><?= _CONFIRMNEWPASSWORD ?></p>
					</div>
					<div class="wrap-input100 validate-input m-b-36" data-validate="<?= _CONFIRMNEWPASSWORD ?>">
						<div class="containerMainTextArea" style="margin-left:30.5%">
							<span class="btn-show-pass">
								<i class="fa fa-eye"></i>
							</span>
							<input class="textAreaChangePassword" type="password" name="repass" id="repass">
							<p id="star">*</p>

						</div> <!-- wrap input -->

						<div class="flex-sb-m w-full"></div>

						<?php
						if (isset($_SESSION["error"])) {
							$error = $_SESSION["error"];
							unset($_SESSION["error"]);
						}
						?>
						<div id='passwordErrorDiv' class='containerMainTextArea wrap' style='margin-left:53.4%;margin-right:27.1%;margin-bottom:1%;'><b class='alertValidation' id='passwordError' name='passwordError' style='color:#FF0000;'><?php echo defined($error) ? constant($error) : $error; ?></b></div>
						<div class="flex-sb-m w-full"></div>

						<div style="width:12vw;margin-left:42%;">
							<button type="button" class="generalButton" name="change_password_button" onclick="checkPassword(<?php echo $rowLevel['passwordLevel'];?>)"> <?= _SUBMIT ?> </button>
							<div style="display: table;margin: 0 auto;">
								<a href="" id="backToLoginText" style="text-decoration:none;display: table-cell;vertical-align: middle;text-align:center"><?= _BACKTOLOGIN ?></a>
							</div>
						</div>
						<!-- *********************************************** -->
		</form>

		<!-- ******************************************************************************************** -->
	</div><!-- flex column -->
	<!--===============================================================================================-->
	<!-- php echo time(); function should be added at the end of css and js files -->
	<script src="js/jquery-3.7.1.min.js?<?php echo time(); ?>"></script>
	<script src="js/main.js?<?php echo time(); ?>"></script>
	<script>
		$('.animationBar').hide();
		const passwordErrors = {
				_USERNAMEORCURRENTPASSWORDWRONG : "<?= _USERNAMEORCURRENTPASSWORDWRONG ?>",
				_SAMEPASSWORDERROR : "<?= _SAMEPASSWORDERROR ?>",
				_DBACCESSFAILURE : "<?= _DBACCESSFAILURE ?>",
				_LOGINLOCKOUT : "<?= _LOGINLOCKOUT ?>",
				_PASSWORDERRORLEVEL2 : "<?= _PASSWORDERRORLEVEL2 ?>",
				_PASSWORDERRORLEVEL3 : "<?= _PASSWORDERRORLEVEL3 ?>",
				_PASSWORDMATCHERROR : "<?= _PASSWORDMATCHERROR ?>"
		}
		function checkPasswordServerSide(index) {
			var csrfToken = '<?php echo $_SESSION['tempToken'] ?>';
			index.action = "changePassword"; // this part is used for request ajax
			index.tempToken = csrfToken;
			$.ajax({
    			type: 'POST',
    			data: index,
    			url: 'login.php',
    			success: function(data) {
					if(data.trim() == "successful"){
						window.location = window.location;
					}else{	
						if(passwordErrors.hasOwnProperty(data.trim())){
							passwordError.innerHTML = passwordErrors[data.trim()];
							if (data.trim() == "_USERNAMEORCURRENTPASSWORDWRONG") {
								passwordErrorDiv.style.marginLeft = "51.5%";
								passwordErrorDiv.style.marginRight = "20%";
							} else if (data.trim() == "_LOGINLOCKOUT") {
								passwordErrorDiv.style.marginLeft = "45%";
								passwordErrorDiv.style.marginRight = "20%";
							} else if (data.trim() == "_PASSWORDERRORLEVEL2" || data.trim() == "_PASSWORDERRORLEVEL3") {
								passwordErrorDiv.style.marginLeft = "30.5%";
							} else if (data.trim() == "_PASSWORDMATCHERROR") {
								passwordErrorDiv.style.marginLeft = "53.4%";
							}
							else if (data.trim() == "_SAMEPASSWORDERROR") {
								passwordErrorDiv.style.marginLeft = "53.4%";
							}
							else {
								passwordErrorDiv.style.marginLeft = "53.4%";
							}
							passwordError.className = "alertChangePassword";
						}
					}
    			}
    		});
		}

		function checkPassword(webconfigPasswordLevel) {
			var password = document.getElementById("pass");
			var repassword = document.getElementById("repass");
			var passwordError = document.getElementById("passwordError");
			var username = document.getElementById("username");
			var passwordErrorDiv = document.getElementById("passwordErrorDiv");
			var userNamePart = document.getElementById("userNameArea");
			passwordError.innerHTML = "";
			var error = 1;
			if(userNamePart.style.display == "flex"){
				if (username.value.trim() == '') {
					passwordError.innerHTML = "<?= _USERNAMEREQUIRED ?>";
				} else{
					error--;
				}
			} else {
				error--;
			}
			if (error == 0) {
				var index = {   currentPass : document.getElementById("currentPass").value,
								pass: password.value,
								repass: repassword.value
								};
				if(userNamePart.style.display == "flex"){
					index.username = username.value.replaceAll("'","''");
				}
				checkPasswordServerSide(index);
			}
		}

		function changeLanguageForLoginPage() {			
			var getLangButton = document.getElementById("changeLangButtonLogin");
			getLangButton.click();
			var div = document.createElement("div");
			div.className += "overlay";
			document.body.appendChild(div);
			$('.animationBar').show();
		}
	</script>
</body>

</html>
