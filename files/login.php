<?php
require_once "documentationApproval.php";
const PRIVACY_DOCUMENTATION_PATH = "/usr/lib/vestel/privacyDocumentation.json";
session_start();

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&      strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!IS_AJAX) {
    header('HTTP/1.0 403 Forbidden');
    echo '403 Forbidden';
    exit;
}

if (!isset($_POST['tempToken']) || !hash_equals($_SESSION['tempToken'], $_POST['tempToken'])) {
    header('HTTP/1.0 403 Forbidden');
    echo 'CSRF token mismatch.';
    exit;
}
class ChangeLog {
    public static $LOG_DATABASE = "/var/lib/vestel-persistent/webconfigChangeLog.db";
    public static $SERVICE = "WEBCONFIG";

    public static function saveChangeLog($event, $username) {
        if (file_exists(self::$LOG_DATABASE)) {
            $logger_db = new SQLite3(self::$LOG_DATABASE);
            $logger_db->busyTimeout(10000);
            if (!$logger_db) {
                die("Unable to connect");
            }
            $stmt = $logger_db->prepare("INSERT INTO changeLog (service, timeStamp, user, change) VALUES (:service, :timestamp, :username, :event)");
            if (!$stmt) {
                die("Unable to prepare statement");
            }
            $timezone = new DateTimeZone('UTC');
            $date = new DateTime('now', $timezone);
            $iso_zoned_date_time = $date->format(DateTime::ATOM);

            $stmt->bindValue(':service', self::$SERVICE);
            $stmt->bindValue(':timestamp', $iso_zoned_date_time);
            $stmt->bindValue(':username',$username);
            $stmt->bindValue(':event', $event);
            $result = $stmt->execute();
            if (!$result) {
                die("Unable to execute statement");
            }
            $logger_db->close();
        }
    }
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

  function get_unapproved_documentations($webconfigDB,$userId){
    try{
        if(file_exists(PRIVACY_DOCUMENTATION_PATH)) {
          $jsonContent = file_get_contents(PRIVACY_DOCUMENTATION_PATH);

          $data = json_decode($jsonContent, true);
      
          if (json_last_error() !== JSON_ERROR_NONE) {
              throw new Exception("JSON parsing error: " . json_last_error_msg());
          }
      
          $userApproval = new UserApproval();
          $documentCollection = new DocumentationCollection($data);
          $unapprovedDocuments = $userApproval->getUnapprovedDocuments($webconfigDB, $userId, $documentCollection);
          return($unapprovedDocuments);
          
            
        }
        
      } catch (Exception $e) {
        error_log("Error during KVKK document check: {$e->getMessage()}");
    }
  }

  function save_unapproved_document($webconfigDB,$userId,$document){
    try{

          $userApproval = new UserApproval();
          return $userApproval->save($webconfigDB, $userId, json_decode(json_encode($document)));
                      
      } catch (Exception $e) {
        error_log("Error during KVKK document check: {$e->getMessage()}");
    }
  }




$action = isset($_POST['action']) ? $_POST['action'] : '';


$loginTrue = '';
$error = '';
$location = '';

//db process
if (file_exists("/var/lib/vestel/webconfig.db")) {
    try {
        class MyDBWebconfig extends SQLite3 {
            function __construct() {
                $this->open('/var/lib/vestel/webconfig.db');
            }
        }

        $webconfigDB = new MyDBWebconfig();
        $webconfigDB->busyTimeout(10000);

        if (!$webconfigDB) {
            throw new Exception("Error occurred: " . $webconfigDB->lastErrorMsg());
        }
    } catch (Exception $e) {
        $error = "Database connection failed: " . $e->getMessage();
        return;
    }
} else {
    $error = "Database file not found.";
    return;
}

switch ($action) {

    case 'login':
        $username = $_POST['username'];
        $password = $_POST['password'];


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
          $dbPasswordLevel = $row["passwordLevel"];
        }

        if ($id != "") {
          if(password_verify($password, $dbPassword)) {
            ChangeLog:: saveChangeLog("action: login", $dbUsername);
            $loginTrue = 'true';
          } else {
            //Wrong password
            ChangeLog:: saveChangeLog("action: loginAttemp", $dbUsername);
            $error = "_USERAUTHFAILED";
          }
        } else {
          //Wrong username
          ChangeLog:: saveChangeLog("action: loginAttemp", $dbUsername);
          $error = "_USERAUTHFAILED";
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
        $loginLocked = log_failed_attempts($webconfigDB, $username, $loginTrue);
        $check_result = password_verify("admin", $dbPassword);
        if ($loginTrue == 'true' && empty($loginLocked) && empty($error)) {
          try {
            $stmt = $webconfigDB->prepare("DELETE FROM loginAttempts");
            $stmt->execute(); // Execute the delete query
            $_SESSION["username"] =  $dbUsername;
            if ($dbFirstLogin == "true" && $dbUsername == "user" && $dbForcedToLogin == "true") { //this part is used for user 
              $_SESSION["indexPage"] = true;
              $_SESSION["forcedToLogin"] = "none";
              $location = "changePassword.php";
            } elseif(($check_result == true) && ($dbUsername=="admin")){
              $_SESSION["indexPage"] = true;
              $location = "changePassword.php";
            } elseif(($dbPasswordLevel == 1 || $dbPasswordLevel == 3) && (!preg_match('/^(?=.{12,32}$)(?=(.*\d){2})(?=(.*[A-Z]){2})(?=(.*[a-z]){2})(?=(.*[!%&\/()=?\*#+\-_]){2}).*$/', $password) ||
            !preg_match('/^[ A-Za-z0-9!%&\/()=?\*#+\-_]*$/', $password))){
              $_SESSION["indexPage"] = true;
              $location = "changePassword.php";
            } 
            elseif(($dbPasswordLevel == 2) && (!preg_match('/^(?=.{20}$)(?=(.*\d){2})(?=(.*[A-Za-z]){2})(?=(.*[!%&\/()=?\*#+\-_]){2}).*$/', $password) || 
            !preg_match('/^[ A-Za-z0-9!%&\/()=?\*#+\-_]*$/', $password))) {
              $_SESSION["indexPage"] = true;
              $location = "changePassword.php";
            } 

            else { // for other
              
              $_SESSION["firstLogin"] = $row["firstLogin"];
              $_SESSION["loggedIn"] = $id;
              
              try{
                if(file_exists(PRIVACY_DOCUMENTATION_PATH)) {
                  $jsonContent = file_get_contents(PRIVACY_DOCUMENTATION_PATH);
                
                  $data = json_decode($jsonContent, true);
                
                  if (json_last_error() !== JSON_ERROR_NONE) {
                      throw new Exception("JSON çözümleme hatası: " . json_last_error_msg());
                  }
              
                  $userApproval = new UserApproval();
                  $documentCollection = new DocumentationCollection($data);
                  $unapprovedDocuments = $userApproval->getUnapprovedDocuments($webconfigDB, $_SESSION["loggedIn"], $documentCollection);
                  if (!empty($unapprovedDocuments)) {

                }
                }
              } catch (Exception $e) {
                error_log("Error during KVKK document check: {$e->getMessage()}");
            }
        
        
        
            }
          } catch (Exception $e) {
            error_log("Could not delete values from database: {$e->getMessage()}");
          }
        } else {
          if (!empty($loginLocked)) {
            $error = "_LOGINLOCKOUT";
          }
        }
        $_SESSION["error"] = $error;
        if($error){
            $response = ['status' => 'failure', "error" => $error];
        
        }else if($location){
          $response = ['status' => 'changeLocation', "location" => $location];
        }
        else{
        
            $response = ['status' => 'success', "error" => $error];
        }
        echo json_encode($response);
        break;
    case "document":
      $logInUser = $_POST["username"] ?? $_SESSION["username"];
      if ($logInUser) {
          $stmt = $webconfigDB->prepare("SELECT id FROM account WHERE username = :username");
          $stmt->bindValue(':username', $logInUser, SQLITE3_TEXT);
          $result = $stmt->execute();
          $row = $result->fetchArray();
          if ($row) {
              $id = $row["id"];
              $unapprovedDocuments = get_unapproved_documentations($webconfigDB, $id);
          }
          if (!empty($unapprovedDocuments)) {
              echo json_encode(['documents' => $unapprovedDocuments]);
          } else {
              echo json_encode(['documents' => []]);
          }
      }
      break;

    case "saveDocument":
      $logInUser = $_POST["username"] ?? $_SESSION["username"];
      $document = $_POST["documentObject"];

      if ($logInUser) {
          $stmt = $webconfigDB->prepare("SELECT id FROM account WHERE username = :username");
          $stmt->bindValue(':username', $logInUser, SQLITE3_TEXT);
          $result = $stmt->execute();
          $row = $result->fetchArray();
          if ($row) {
              $id = $row["id"];
              echo json_encode(['returnOfSaveOperation' => save_unapproved_document($webconfigDB,$id,$document)]);
          }
      }
      break;

      case "directToChangePassword":
        $_SESSION["indexPage"] = true;
        break;


      case "changePassword" :
        $error = "";
        $correctPassword = "";
    
            $currentPassword = $_POST["currentPass"];
            $password = $_POST["pass"];
            $repassword = $_POST["repass"];
            $logInUser = $_POST["username"] ?? $_SESSION["username"];
    
          if ($logInUser) {
              $stmt = $webconfigDB->prepare("SELECT id, username,passwordLevel, password FROM account WHERE username = :username");
              $stmt->bindValue(':username', $logInUser, SQLITE3_TEXT);
              $result = $stmt->execute();
              $row = $result->fetchArray();
              
              if ($row) {
                  $id = $row["id"];
                  $dbCurrentUser = $row["username"];
                  $dbCurrentPass = $row["password"];
                  $dbPasswordLevel = $row["passwordLevel"];
                  if(in_array($dbPasswordLevel, ["1","2","3"])) {
                      if (password_verify($currentPassword, $dbCurrentPass)) {
                          $correctPassword = "true";
                      
                          if ($password == $repassword) {
                              if ($password == $currentPassword) {
                                  $error = _SAMEPASSWORDERROR;
                              } else {
                                  $error_count = 0;
                                  if (!empty(is_login_locked($webconfigDB))){
                                    $error_count++;
                                    $error = "_LOGINLOCKOUT";
                                  }
                                  elseif ($dbPasswordLevel == "2") {
                                      if (!preg_match('/^(?=.{20}$)(?=(.*\d){2})(?=(.*[A-Za-z]){2})(?=(.*[!%&\/()=?\*#+\-_]){2}).*$/', $password) || 
                                          !preg_match('/^[ A-Za-z0-9!%&\/()=?\*#+\-_]*$/', $password)) {
                                          $error_count++;
                                          $error = _PASSWORDERRORLEVEL2;
                                      }
                                  } elseif ($dbPasswordLevel == "1" || $dbPasswordLevel == "3") {
                                      if (!preg_match('/^(?=.{12,32}$)(?=(.*\d){2})(?=(.*[A-Z]){2})(?=(.*[a-z]){2})(?=(.*[!%&\/()=?\*#+\-_]){2}).*$/', $password) || 
                                          !preg_match('/^[ A-Za-z0-9!%&\/()=?\*#+\-_]*$/', $password)) {
                                          $error_count++;
                                          $error = _PASSWORDERRORLEVEL3;
                                      }
                                  } 
                              
                                  if ($error_count == 0) {
                                      $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                                      $stmt = $webconfigDB->prepare("UPDATE account SET password = :hashed_password, firstLogin = :firstLogin WHERE id = :id");
                                      $stmt->bindValue(':hashed_password', $hashed_password, SQLITE3_TEXT);
                                      $stmt->bindValue(':firstLogin', 'false', SQLITE3_TEXT);
                                      $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
                                      $stmt->execute();
                                      unset($_SESSION["indexPage"]);
                                      $error = successful;
                                  }
                              }
                          } else {
                              $error = _PASSWORDMATCHERROR;
                          }
                      } else {
                          $error = _USERNAMEORCURRENTPASSWORDWRONG;
                      }
                  } else {
                      return;
                  }
              }
              else{
                  $error = _USERNAMEORCURRENTPASSWORDWRONG;
              }
              $loginLocked = log_failed_attempts($webconfigDB, $dbCurrentUser, $correctPassword);
              if ($correctPassword == 'true' && empty($loginLocked) && trim($error) == "successful") {
                  try {
                      $stmt = $webconfigDB->prepare("DELETE FROM loginAttempts");
                      $stmt->execute();
                  } catch (Exception $e) {
                      error_log("ChangePassword/Could not delete values from database: {$e->getMessage()}");
                  }
              } elseif (!empty($loginLocked)) {
                  $error = _LOGINLOCKOUT;
              }
  
          } else {
              $error = _DBACCESSFAILURE;
          }
  
          echo $error;
          break;
        
    
      
      

}

$webconfigDB->close();
unset($webconfigDB);


?>
