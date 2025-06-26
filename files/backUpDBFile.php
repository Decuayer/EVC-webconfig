<?php
session_start();
$_SESSION["DownloadStatus"] = "start";
include 'optionsAndControls.php';
include_once "access_control.php";
    try{
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
    
        $sql="BEGIN TRANSACTION;\n"; 
        $tables=$webconfigDB->query("SELECT name FROM sqlite_master WHERE type ='table' AND name NOT LIKE 'sqlite_%';");  
        while ($table=$tables->fetchArray(SQLITE3_NUM)) {
            $sql.=$webconfigDB->querySingle("SELECT sql FROM sqlite_master WHERE name = '{$table[0]}'").";\n\n";
            $rows=$webconfigDB->query("SELECT * FROM {$table[0]}");
            $rows_db = $webconfigDB->query("SELECT COUNT(*) as count FROM $table[0]");
            $row_number = $rows_db->fetchArray();
            $numRows = $row_number['count'];
            if ($numRows != 0) {
                $sql.="INSERT INTO {$table[0]} (";
                $columns=$webconfigDB->query("PRAGMA table_info({$table[0]})");
                $fieldnames=array();
                while ($column=$columns->fetchArray(SQLITE3_ASSOC)) {
                    $fieldnames[]=$column["name"];
                }
                $sql.=implode(",",$fieldnames).") VALUES";
                while ($row=$rows->fetchArray(SQLITE3_ASSOC)) {
                    foreach ($row as $k=>$v) {
                        $row[$k]="'".SQLite3::escapeString($v)."'";
                    }
                    $sql.="\n(".implode(",",$row)."),";
                }
                $sql=rtrim($sql,",").";\n\n";
            }
        }
        $sql.="COMMIT;";
        file_put_contents("/var/lib/vestel/backUpDBFile.sql",base64_encode($sql));   
        }
        $file = "/var/lib/vestel/backUpDBFile.sql";
        $encrypt_command = "python3 /usr/lib/vestel/utils.py encrypt_file " . escapeshellarg($file);
        shell_exec($encrypt_command);
        
        if(!file_exists($file)){
            error_log("The file doesn't seem to exist.");
        }else{
            $type = filetype($file);
            $filename = 'backUpFile.bak';
            header("Content-type: $type");
            header("Content-Disposition: attachment;filename=".$filename);
            header("Content-Transfer-Encoding: binary"); 
            header('Pragma: no-cache'); 
            header('Expires: 0');
            header('Content-Length: ' . filesize($file));

            ob_end_clean();
            $fd = fopen($file, "r");
            while(!feof($fd))
            {
                set_time_limit(0);
                echo fread($fd, 4096);
                ob_flush(); 
                flush();
            }
            ob_end_flush();

            ChangeLog:: saveChangeLog("action: backUp", $_SESSION["username"]);
            $_SESSION["DownloadStatus"] = "finish";
            shell_exec("rm /var/lib/vestel/backUpDBFile.sql");
        }
    } catch (ExceptionType $e) {
        // Code to handle the exception
        error_log($e);
    }finally{
        $webconfigDB->close();
        unset($webconfigDB);
    }