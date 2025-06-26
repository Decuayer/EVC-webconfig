<?php
    session_start();
    define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&      strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
    include_once "access_control.php";

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['fetch'])){
        if (file_exists("/var/lib/vestel/webconfig.db")) {
            try{
                class MyDBWebconfig extends SQLite3
                {
                    function __construct()
                    {
                        $this->open('/var/lib/vestel/webconfig.db');
                    }
                }
                $webconfigDB = new MyDBWebconfig();
                $webconfigDB->busyTimeout(10000);
                $wlanStatusDB = $webconfigDB->querySingle("SELECT enable FROM wifiSettings WHERE id = 1");
                if ($wlanStatusDB == "false"){
                    shell_exec('ifconfig wlan0 up');
                }

            } catch (Exception $e) {
                error_log($e);
                shell_exec('ifconfig wlan0 up');
            }
        }
    }
    $command = "iw dev wlan0 scan | grep -e 'on wlan0\|freq:\|SSID:\|signal:'";
    $maxAttempts = 5;
    $attempts = 0;

    if (!isset($_SESSION['wifiScanStatus']) || $_SESSION['wifiScanStatus'] === false) {
        $_SESSION['wifiScanStatus'] = true;
        do {
            exec($command, $output, $status);
            if (empty($output)) {
                $attempts++;
                usleep(300000);
            }
        } while (empty($output) && $attempts < $maxAttempts);
        $_SESSION['wifiScanStatus'] = false;
    }

    $networks = [];
    $currentNetwork = [];
    $readIssue = false;

    foreach ($output as $line) {
        try {
            if (strpos($line, "on wlan0") !== false) {
                if (!empty($currentNetwork) && !$readIssue) {
                    $networks[] = $currentNetwork;
                }
                $currentNetwork = ["ssid" => "", "freq" => "", "signal" => ""];
                $readIssue = false;
            } elseif (strpos($line, "freq:") !== false) {
                preg_match('/freq: (\d+)/', $line, $matches);
                $freq = intval($matches[1]);
                $currentNetwork["freq"] = $freq < 3000 ? "2.4G" : "5G";
            } elseif (strpos($line, "signal:") !== false) {
                preg_match('/signal: ([\-\d.]+)/', $line, $matches);
                $currentNetwork["signal"] = $matches[1];
            } elseif (strpos($line, "SSID:") !== false) {
                $currentNetwork["ssid"] = trim(substr($line, strpos($line, "SSID:") + 6));
            }
        } catch (Exception $e) {
            $readIssue = true;
        }
    }

    if (!empty($currentNetwork)) {
        $networks[] = $currentNetwork;
    }

    usort($networks, function ($a, $b) {
        return floatval($b["signal"]) - floatval($a["signal"]);
    });

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['fetch'])) {
        header('Content-Type: application/json');
        echo json_encode($networks ?? []);
        if ($wlanStatusDB == "false"){
            shell_exec('ifconfig wlan0 down');
        }
    }

?>