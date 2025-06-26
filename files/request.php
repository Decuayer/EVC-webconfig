<?php
    session_start();
    define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&      strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
    if(!IS_AJAX) {
        header('HTTP/1.0 403 Forbidden');
        echo '403 Forbidden';
        exit;
    }
    
    if (!isset($_POST['token']) || !hash_equals($_SESSION['token'], $_POST['token'])) {
        header('HTTP/1.0 403 Forbidden');
        echo 'CSRF token mismatch.';
        exit;
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
          WHERE timeStamp >= :timeStart
          AND timeStamp <= :currentTime";
        $stmt = $webconfigDB->prepare($query);
        $stmt->bindValue(':timeStart', $currentTime - $duration, SQLITE3_INTEGER);
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
    
    function log_failed_attempts($webconfigDB, $username, $correctPassword) {
        $time = time();
        $ipAddr = get_ip_address();
        if (empty(is_login_locked($webconfigDB)) && empty($correctPassword)) {
            $stmt = $webconfigDB->prepare("INSERT INTO loginAttempts(username, ipAddress, timeStamp) VALUES(:username, :ipAddress, :timeStamp)");
            $stmt->bindValue(':username', $username, SQLITE3_TEXT);
            $stmt->bindValue(':ipAddress', $ipAddr, SQLITE3_TEXT);
            $stmt->bindValue(':timeStamp', $time, SQLITE3_TEXT);
            $stmt->execute();
            error_log("Failed to change password! \nusername : $username \nIP Address : $ipAddr \nTimestamp : $time");
        }
    
        return is_login_locked($webconfigDB);
    }



    if ($_POST['id'] == 1) {
        if (file_exists("/usr/lib/vestel/webconfig.db")) {
            class MyDBWebconfigDefault extends SQLite3
            {
                function __construct()
                {
                    $this->open('/usr/lib/vestel/webconfig.db');
                }
            }
            $webconfigDBDefault = new MyDBWebconfigDefault();
            $webconfigDBDefault->busyTimeout(10000);
            //this part is used for take all column names from /usr/lib/vestel/webconfig.db
            $ocppConfigurations = $webconfigDBDefault->query("PRAGMA table_info(ocppConfigurations);");
            //this part is used for take column and values form /usr/lib/vestel/webconfig.db
            $stmt = $webconfigDBDefault->prepare("SELECT * FROM ocppConfigurations WHERE id = :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $usrOcppConfigurations = $stmt->execute();
            $usrRowOcppConfigurations = $usrOcppConfigurations->fetchArray();  
            $ocppConfigurationsItems = []; 
            while ($columns = $ocppConfigurations->fetchArray(SQLITE3_ASSOC)) {
                array_push($ocppConfigurationsItems, $columns['name']);
            }

            if (file_exists("/run/media/mmcblk1p3/webconfig.db")) {
                class vfactoryDefault extends SQLite3
                {
                    function __construct()
                    {
                        $this->open('/run/media/mmcblk1p3/webconfig.db');
                    }
                }
                try {
                    $webconfigVfactoryDBDefault = new vfactoryDefault();
                    $vfactoryocppConfigurationsColumns = $webconfigVfactoryDBDefault->query("PRAGMA table_info(ocppConfigurations);");
                    //this part is used for take all column names from /run/media/mmcblk1p3/webconfig.db
                    $vfactoryOcppConfigurationsItems = []; 
                    while ($columns = $vfactoryocppConfigurationsColumns->fetchArray(SQLITE3_ASSOC)) {
                        array_push($vfactoryOcppConfigurationsItems, $columns['name']);
                    }
                    $stmt = $webconfigVfactoryDBDefault->prepare("SELECT * FROM ocppConfigurations WHERE id = :id");
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $vfactoryOcppConfigurations = $stmt->execute();
                    $vfactoryRowOcppConfigurations = $vfactoryOcppConfigurations->fetchArray();
                    $stmt = $webconfigVfactoryDBDefault->prepare("SELECT * FROM generalSettings WHERE id= :id");
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $vfactoryGeneralSettings = $stmt->execute();
                    $vfactoryRowGeneralSettings = $vfactoryGeneralSettings->fetchArray();
                    $led_dimming_dictionary =  [
                        "veryLow" => 1,
                        "low" => 2,
                        "mid" => 3,
                        "high" => 4,
                    ];
                    $jsonOcppObj =  new stdClass();
                    foreach ($ocppConfigurationsItems as &$column) {
                        if (in_array($column, $vfactoryOcppConfigurationsItems)) {
                            $jsonOcppObj->$column = $vfactoryRowOcppConfigurations[$column];
                            if($column == "StopTxnAlignedData" && intval($vfactoryRowOcppConfigurations[$column]) == 0){
                                $jsonOcppObj->$column = "Energy.Active.Import.Register";
                            }
                            if($column == "LightIntensity" && intval($vfactoryRowOcppConfigurations[$column]) == 0){
                                $jsonOcppObj->$column = $led_dimming_dictionary[$vfactoryRowGeneralSettings["ledDimmingLevel"]];
                            }
                            if($column == "GetConfigurationMaxKeys" && intval($vfactoryRowOcppConfigurations[$column]) == 60){
                                $jsonOcppObj->$column = "1";
                            }
                        }
                        else{
                            $jsonOcppObj->$column = $usrRowOcppConfigurations[$column];
                        }
                        
                    }
                
                    echo json_encode($jsonOcppObj);
                    $webconfigVfactoryDBDefault->close();
                    unset($webconfigVfactoryDBDefault);
                }
                catch (Error $e) {
                    echo json_encode($usrRowOcppConfigurations);
                }   
            }
            else{
                echo json_encode($usrRowOcppConfigurations);
            }
            $webconfigDBDefault->close();
            unset($webconfigDBDefault);
        }
    }
    else if ($_POST['id'] == 2) {
        if (file_exists("/var/lib/vestel/webconfig.db")) {
            $logInUser =  (isset($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : 1;
            class MyDB extends SQLite3
            {
                function __construct()
                {
                    $this->open('/var/lib/vestel/webconfig.db');
                }
            }

            $db = new MyDB();
            $db->busyTimeout(10000);
            $current_password = $_POST['currentPassword'];

            $new_password = $_POST['newPassword'];

            $new_password_repeat = $_POST['newPasswordRepeat'];
            



            // missing data check
            if (!$logInUser || !$current_password || !$new_password || !$new_password_repeat) {
                return;
            }

            // user check
            $stmt = $db->prepare("SELECT * FROM account WHERE id = :id");
            $stmt->bindValue(':id', $logInUser, SQLITE3_INTEGER);
            $res = $stmt->execute();

            if (!$res) {
                echo json_encode(['error' => _DBQUERYFAILURE]);
                return;
            }

            $row = $res->fetchArray(SQLITE3_ASSOC);

            if (!$row) {
                echo json_encode(['error' => _USERNAMEORCURRENTPASSWORDWRONG]);
                return;
            }

            $dbCurrentPass = $row["password"];
            $dbPasswordLevel = $row["passwordLevel"];
            if(!in_array($dbPasswordLevel, ["1","2","3"])) {
                echo json_encode(['error' => "_PASSWORDLEVELERROR"]);
                return;
            }

            if($new_password == $current_password){
                echo json_encode(['error' => _SAMEPASSWORDERROR]);
                return;
            }

            if($new_password != $new_password_repeat){
                echo json_encode(['error' => "_PASSWORDMATCHERROR"]);
                return;
            }

            if ((int)$dbPasswordLevel == 2) {
                if (!preg_match('/^(?=.{20}$)(?=(.*\d){2})(?=(.*[A-Za-z]){2})(?=(.*[!%&\/()=?\*#+\-_]){2}).*$/', $new_password) || 
                    !preg_match('/^[ A-Za-z0-9!%&\/()=?\*#+\-_]*$/', $new_password)) {
                    echo json_encode(['error' => _PASSWORDERRORLEVEL2]);
                    return;
                }
            } elseif ((int)$dbPasswordLevel == 1 || (int)$dbPasswordLevel == 3) {
                if (!preg_match('/^(?=.{12,32}$)(?=(.*\d){2})(?=(.*[A-Z]){2})(?=(.*[a-z]){2})(?=(.*[!%&\/()=?\*#+\-_]){2}).*$/', $new_password) || 
                    !preg_match('/^[ A-Za-z0-9!%&\/()=?\*#+\-_]*$/', $new_password)) {
                    echo json_encode(['error' => _PASSWORDERRORLEVEL3]);
                    return;
                }
            } 
            $check_result = password_verify($current_password, $dbCurrentPass);
            if($check_result == false){
                echo json_encode(['error' => _CURRENTPASSWORDWRONG]);
                return;
            }
            $loginLocked = log_failed_attempts($db, $logInUser, $check_result);
            if ($check_result && empty($loginLocked)) {
                try {
                    $stmt = $db->prepare("DELETE FROM loginAttempts");
                    $stmt->execute();
                } catch (Exception $e) {
                    error_log("ChangePassword/Could not delete values from database: {$e->getMessage()}");
                }
            } else {
                if (!empty($loginLocked)) {
                    $check_result = _LOGINLOCKOUT;
                }
            }
            echo json_encode(['error' => $check_result]);
        }
    }
    else if ($_POST['id'] == 3) {
        $_SESSION["indexPage"] = true;
    }    
    else if ($_POST['id'] == 4) {
        $error = "";
        $correctPassword = "";
        if (file_exists("/var/lib/vestel/webconfig.db")) {
            class MyDB extends SQLite3 {
                function __construct() {
                    $this->open('/var/lib/vestel/webconfig.db');
                }
            }
    
            $db = new MyDB();
            $db->busyTimeout(10000);
            if (!$db) {
                echo $db->lastErrorMsg();
                return; // Exit on error
            }
    
            $currentPassword = $_POST["currentPass"];
            $password = $_POST["pass"];
            $repassword = $_POST["repass"];
            $logInUser = $_POST["username"] ?? $_SESSION["username"];
    
            if ($logInUser) {
                $stmt = $db->prepare("SELECT id, username,passwordLevel, password FROM account WHERE username = :username");
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
                                
                                    if ($dbPasswordLevel == "2") {
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
                                        $stmt = $db->prepare("UPDATE account SET password = :hashed_password, firstLogin = :firstLogin WHERE id = :id");
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
                $loginLocked = log_failed_attempts($db, $dbCurrentUser, $correctPassword);
                if ($correctPassword == 'true' && empty($loginLocked) && trim($error) == "successful") {
                    try {
                        $stmt = $db->prepare("DELETE FROM loginAttempts");
                        $stmt->execute();
                    } catch (Exception $e) {
                        error_log("ChangePassword/Could not delete values from database: {$e->getMessage()}");
                    }
                } elseif (!empty($loginLocked)) {
                    $error = _LOGINLOCKOUT;
                }
    
                $db->close();
            } else {
                $error = _DBACCESSFAILURE;
            }
    
            echo $error;
        }
    }
    else if ($_POST['id'] == 5) {
        ob_start();
        session_unset();
        session_destroy();
        ob_flush();
    }


?>
