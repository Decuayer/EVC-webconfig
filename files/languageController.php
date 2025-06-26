<?php
session_start();
include_once "access_control.php";
if (file_exists("/var/lib/vestel/webconfig.db")) {
    class webconfigDB extends SQLite3
    {
        function __construct()
        {
            $this->open('/var/lib/vestel/webconfig.db');
        }
    }
    $dbWebconfig = new webconfigDB();
    $dbWebconfig->busyTimeout(10000);
    $stmt = $dbWebconfig->prepare("SELECT webconfigLanguage FROM generalSettings WHERE id=:id");
    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
    $rowLang = $stmt->execute();
    $rowLang = $rowLang->fetchArray();
}

$HS = false;
$hs_status =explode("-",explode(" ",shell_exec("uname -a"))[2])[0]; 	
$HS = (strcmp($hs_status,"4.19.94")) ? false : true;	

// After onchange()
if(isset($_POST['lang']) && !empty($_POST['lang'])){
    $_SESSION['lang'] = $_POST['lang'];
    $lang_data = $_SESSION['lang'];
    $stmt = $dbWebconfig->prepare("UPDATE generalSettings SET webconfigLanguage = :lang_data WHERE id = :id");
    $stmt->bindValue(':lang_data', $lang_data, SQLITE3_TEXT);
    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
    $stmt->execute();
    if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_POST['lang']){
        echo "<script type='text/javascript'> location.reload(); </script>";
    }
}
// After non-post activity
else {
    $last_lang = isset($rowLang["webconfigLanguage"]) ? $rowLang["webconfigLanguage"] : "en";
    $_SESSION['lang'] = $last_lang;
}


// Include language file
if(isset($_SESSION['lang']) && ($_SESSION['lang'] == "en" || $_SESSION['lang'] == "tr" || $_SESSION['lang'] == "fr" || $_SESSION['lang'] == "de" || $_SESSION['lang'] == "es" || $_SESSION['lang'] == "it" || $_SESSION['lang'] == "ro"  || $_SESSION['lang'] == "da" || $_SESSION['lang'] == "fi" || $_SESSION['lang'] == "no" || $_SESSION['lang'] == "hu" || $_SESSION['lang'] == "sv" || $_SESSION['lang'] == "pl" || $_SESSION['lang'] == "sk" || $_SESSION['lang'] == "he" || $_SESSION['lang'] == "cz" || $_SESSION['lang'] == "nl" || $_SESSION['lang'] == "ba" || $_SESSION['lang'] == "bg" || $_SESSION['lang'] == "gr" || $_SESSION['lang'] == "hr" || $_SESSION['lang'] == "me" || $_SESSION['lang'] == "rs")){
    include "lang_".$_SESSION['lang'].".php";
 
}else{
    include "lang_en.php";
}

$dbWebconfig->close();
unset($dbWebconfig);
