<?php 
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&      strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!IS_AJAX) {
    header('HTTP/1.0 403 Forbidden');
    echo '403 Forbidden';
    exit;
}
include 'languageController.php'; 
?>
<?php

if (file_exists("/var/lib/vestel/webconfig.db")) {
    class connectorInfoDbz extends SQLite3
    {
        function __construct()
        {
            $this->open('/var/lib/vestel/webconfig.db');
        }
    }
}
$connectorInfoDBz = new connectorInfoDbz();
$connectorInfoDBz->busyTimeout(10000);
if ($_POST['serialNumber'] != "" and $_POST['serialNumber'] != "clicked") {
    $serialNumber = $_POST['serialNumber'];
    $connectorId  = $_POST['connectorId'];
    $return_arr = array();
    $stmt = $connectorInfoDBz->prepare("SELECT * FROM connectorInfo WHERE serialNumber= :serialNumber AND connectorId= :connectorId");
    $stmt->bindValue(':serialNumber', $serialNumber, SQLITE3_TEXT);
    $stmt->bindValue(':connectorId', $connectorId, SQLITE3_INTEGER);
    $connectorInfoSettingsz = $stmt->execute(); 
    while ($rowDlmSettings1 = $connectorInfoSettingsz->fetchArray()) {
        $row_array['serialNumber'] = $rowDlmSettings1["serialNumber"];
        $row_array['connectorId'] = $rowDlmSettings1["connectorId"];
        $row_array['connectorState'] = $rowDlmSettings1["connectorState"];
        $row_array['instantCurrentP1'] = $rowDlmSettings1["instantCurrentP1"];
        $row_array['instantCurrentP2'] = $rowDlmSettings1["instantCurrentP2"];
        $row_array['instantCurrentP3'] = $rowDlmSettings1["instantCurrentP3"];
        $row_array['availableCurrentP1'] = $rowDlmSettings1["availableCurrentP1"];
        $row_array['availableCurrentP2'] = $rowDlmSettings1["availableCurrentP2"];
        $row_array['availableCurrentP3'] = $rowDlmSettings1["availableCurrentP3"];
        }
    array_push($return_arr, $row_array);
    echo '|' . json_encode($return_arr);
}

$connectorInfoDBz->close();
unset($connectorInfoDBz);
?>
