<?php
    ob_start();
    include_once "access_control.php";
    $_SESSION["DownloadStatus"] = "start";
    $zipname = exec("python3 /usr/lib/vestel/utils.py zip_log_files False");
    $zipFileName = basename($zipname);
    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename='.$zipFileName);
    header('Content-Length: ' . filesize($zipname));
    
    ob_end_clean();
    try{
        if($fd = fopen($zipname, "r")){
            while(!feof($fd))
            {
                set_time_limit(0);
                echo fread($fd, 4096);
                ob_flush(); 
                flush();
            }
        }
    } catch (Exception $e) {
        error_log($e->getMessage());
    }
    
    ob_end_flush();
    $_SESSION["DownloadStatus"] = "finish";