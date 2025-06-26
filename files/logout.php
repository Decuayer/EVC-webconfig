<?php
    include 'optionsAndControls.php';
    session_start();
    ChangeLog:: saveChangeLog("action: logout", $_SESSION["username"]);
    unset($_SESSION["loggedIn"]);
    unset($_SESSION["loginStatus"]);
    unset($_SESSION["username"]);
    unset($_SESSION["forcedToLogin"]);
    unset($_SESSION["token"]);
    
    
    header("Location: " . "http://" . $_SERVER['HTTP_HOST']);
    exit();
