<?php
session_start();
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&      strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!IS_AJAX) {
    header('HTTP/1.0 403 Forbidden');
    echo '403 Forbidden';
    exit;
}
if (!isset($_SESSION["loginStatus"])) {
    header("Location: http://" . $_SERVER['HTTP_HOST']);
    exit();
}
$status = isset($_SESSION["DownloadStatus"]) && $_SESSION["DownloadStatus"] === "finish" ? 'complete' : 'in_progress';
echo json_encode(['status' => $status]);
?>