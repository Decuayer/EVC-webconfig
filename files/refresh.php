<?php
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&      strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!IS_AJAX) {
    header('HTTP/1.0 403 Forbidden');
    echo '403 Forbidden';
    exit;
}
include_once "access_control.php";
if (file_exists("/var/lib/vestel/webconfig.db")) {
    class MyDBEEBUS1 extends SQLite3
    {
        function __construct()
        {
            $this->open('/var/lib/vestel/webconfig.db');
        }
    }
    $eebusDB = new MyDBEEBUS1();
    $eebusDB->busyTimeout(10000);
    $stmt = $eebusDB->prepare("SELECT * FROM eebusDiscovery");
    $eebusDiscovery = $stmt->execute();
    $options = '';
    while ($rowEebusDiscovery = $eebusDiscovery->fetchArray()) {
        $shipId = $rowEebusDiscovery['shipId'];
        $ski = $rowEebusDiscovery['ski'];
        $manufacturer = $rowEebusDiscovery['manufacturer'];
        $product = $rowEebusDiscovery['product'];
        $pairing_state = $rowEebusDiscovery['pairing_state'];

        $options .= '<option value="' . htmlspecialchars($shipId . '|' . $ski . '|' . $manufacturer . '|' . $product . '|' . $pairing_state) . '"> ' . (($product !== 'None') ? htmlspecialchars($product) : 'None') . '  from ' . (($manufacturer !== 'None') ? htmlspecialchars($manufacturer) : 'None') . '  (ski:' . (($ski !== 'None') ? htmlspecialchars($ski) : 'None') . ' ) ' . '</option>';
    }
    $eebusDB->close();
    unset($eebusDB);
    $pairedEnergyManager = '';
    $eebus1DB = new MyDBEEBUS1();
    $eebus1DB->busyTimeout(10000);
    $stmt = $eebus1DB->prepare("SELECT * FROM eebusPairInfo");
    $eebusPairInfo = $stmt->execute();
    $rowEebusPairInfo = $eebusPairInfo->fetchArray();
    $SKI = $rowEebusPairInfo['ski'];
    if ($SKI == '') {
        $pairedEnergyManager = "None";
    } else {
        $manufacturer = $rowEebusPairInfo['manufacturer'];
        $product = $rowEebusPairInfo['product'];
        $pairedEnergyManager = htmlspecialchars($product) . " from " . htmlspecialchars($manufacturer) . " (ski: " . htmlspecialchars($SKI) . ")";
    }
    $eebus1DB->close();
    unset($eebus1DB);
}
if (file_exists("/var/lib/vestel/webconfig.db")) {
    class MyDBEebus extends SQLite3
    {
        function __construct()
        {
            $this->open('/var/lib/vestel/webconfig.db');
        }
    }
    $eebusConfigDB = new MyDBEebus();
    $eebusConfigDB->busyTimeout(10000);
    $stmt = $eebusConfigDB->prepare("SELECT * FROM eebusSettings");
    $eebusConfigurations = $stmt->execute();
    $rowEebusConfigurations = $eebusConfigurations->fetchArray();
    $fallbackCurrent = htmlspecialchars($rowEebusConfigurations["fallbackCurrent"]);
    $skiStatus = $rowEebusConfigurations["skiStatus"];
    $firmwareVersion = $rowEebusConfigurations["firmwareVersion"];
    $eebusConfigDB->close();
    unset($eebusConfigDB);
    $response = [
        "pairedEnergyManager" => $pairedEnergyManager,
        "selectOptions" => $options,
        "fallbackCurrent" => $fallbackCurrent,
        "skiStatus" => $skiStatus,
        "firmwareVersion" => $firmwareVersion,
        "SKI" => $SKI,
        "skiDiscovery" => $ski
    ];
    $jsonResponse = json_encode($response);
    header('Content-Type: application/json');
    echo $jsonResponse;
}
?>
