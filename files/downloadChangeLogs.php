<?php
    ob_start();
    include_once "access_control.php";
    $_SESSION["DownloadStatus"] = "start";

    $date = date("Ymd");
    $time = date("His");

    $pdo = new PDO("sqlite:/var/lib/vestel-persistent/webconfigChangeLog.db");

    $csvFilePath = '/var/lib/vestel-persistent/changeLog.csv';
    $csvFile = fopen($csvFilePath, 'w');


    // Prepared statement for PRAGMA table_info
    $stmt = $pdo->prepare("PRAGMA table_info(changeLog)");
    $stmt->execute();
    $columnNames = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $columnNames[] = $row['name'];
    }
    fputcsv($csvFile, $columnNames);

    // Prepared statement to select data from changeLog
    $stmt = $pdo->prepare("SELECT * FROM changeLog");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        fputcsv($csvFile, $row);
    }

    fclose($csvFile);

    $systemCSVFile = glob($csvFilePath);
    $files = $systemCSVFile;
    $zipname = '/var/lib/vestel/Change_logs_'.$date.'_'.$time.'.zip';
    $zipFileName = 'Change_logs_'.$date.'_'.$time.'.zip';
    $zip = new ZipArchive;
    if ($zip->open($zipname, ZipArchive::CREATE) === TRUE)
    {
        foreach ($files as $file) {
            $new_filename = substr($file,strrpos($file,'/') + 1);
            $zip->addFile($file,$new_filename);
        }
        $zip->close();
    }
    
    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename='.$zipFileName);
    header('Content-Length: ' . filesize($zipname));

    ob_end_clean();
    $_SESSION["DownloadStatus"] = "finish";

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
    // Remove temporary files after processing
    shell_exec("rm " . escapeshellarg($zipname));
    shell_exec("rm " . escapeshellarg($csvFilePath));
    
    ob_end_flush();
