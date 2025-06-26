<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
ob_start();
check_session_time();
function check_session_time() {
    $session_timeout = 1800;
    
    if (!isset($_SESSION["loginStatus"]) || $_SESSION["loginStatus"] !== true) {
        echo "session_expired";
    } elseif (!isset($_SESSION['timeout']) || (time() - $_SESSION['timeout'] > $session_timeout)) {
        // Close the session
        session_unset();
        session_destroy();

        echo "session_expired";
    } else {
        // Assign new time
        $_SESSION['timeout'] = time();
    }

    // Flush the output buffer
    ob_flush();
}
?>
