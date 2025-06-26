<?php 
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&      strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!IS_AJAX) {
    header('HTTP/1.0 403 Forbidden');
    echo '403 Forbidden';
    exit;
}
include 'languageController.php'; 
include_once "access_control.php";
?>
<?php
// Function to get the initial offline current value
function getInitialOfflineCurrentValue($phasesNumber, $minCurrent1P, $minCurrent3P, $offlineCurrent)
{
    if ($offlineCurrent === 0) {
        return 0;
    }
    if ($offlineCurrent == '') {
        if ($phasesNumber == 0) {
            return $minCurrent1P;
        } elseif ($phasesNumber == 1) {
            return $minCurrent3P;
        }
    } else {
        return $offlineCurrent;
    }
}
?>
<select id="serialNumberSelection" onchange="checkSaving()">
    <option selected disabled><?= _CHOOSEONE ?></option>
    <?php


    if (file_exists("/var/lib/vestel/webconfig.db")) {
        class slaveConfigDb extends SQLite3
        {
            function __construct()
            {
                $this->open('/var/lib/vestel/webconfig.db');
            }
        }
        $slaveDB = new slaveConfigDb();
        $slaveDB->busyTimeout(10000);
        $stmt = $slaveDB->prepare("SELECT * FROM slaveConfigs");
        $slaveConfigSettings = $stmt->execute();

        while ($rowDlmSettings = $slaveConfigSettings->fetchArray()) {
            $value = $rowDlmSettings['serialNumber']; ?>

            <option value="<?php echo $rowDlmSettings['serialNumber']; ?>"><?php echo $rowDlmSettings['serialNumber']; ?></option>
        <?php }
    }
    $slaveDB->close();
    unset($slaveDB)


    ?>
</select>

<?php
if (file_exists("/var/lib/vestel/webconfig.db")) {
    class slaveConfigDbz extends SQLite3
    {
        function __construct()
        {
            $this->open('/var/lib/vestel/webconfig.db');
        }
    }
}
$slaveDBz = new slaveConfigDbz();
$slaveDBz->busyTimeout(10000);
if ($_POST['serialNumber'] != "" and $_POST['serialNumber'] != "clicked") {
    $serialNumber = $_POST['serialNumber'];
    $return_arr = array();


    $stmt = $slaveDBz->prepare("SELECT * FROM slaveConfigs WHERE serialNumber = :serialNumber");
    $stmt->bindValue(':serialNumber', $serialNumber, SQLITE3_TEXT);
    $slaveConfigSettingsz = $stmt->execute();
    while ($rowDlmSettings = $slaveConfigSettingsz->fetchArray()) {
        $row_array['serialNumber'] = $rowDlmSettings["serialNumber"];
        $row_array['noOfConnectors'] = $rowDlmSettings["noOfConnectors"];
        $row_array['IPAddress'] = $rowDlmSettings["IPAddress"];
        $row_array['macAddress'] = $rowDlmSettings["macAddress"];
        $row_array['connectorState'] = $rowDlmSettings["connectorState"];
        $row_array['phasesNumber'] = $rowDlmSettings["phasesNumber"];
        $row_array['minCurrent1P'] = $rowDlmSettings["minCurrent1P"];
        $row_array['minCurrent3P'] = $rowDlmSettings["minCurrent3P"];
        $row_array['maxCurrent'] = $rowDlmSettings["maxCurrent"];
        $row_array['step'] = $rowDlmSettings["step"];
        $row_array['instantCurrentP1'] = $rowDlmSettings["instantCurrentP1"];
        $row_array['instantCurrentP2'] = $rowDlmSettings["instantCurrentP2"];
        $row_array['instantCurrentP3'] = $rowDlmSettings["instantCurrentP3"];
        $row_array['vip'] = $rowDlmSettings["vip"];
        $row_array['connectionSequence'] = $rowDlmSettings["connectionSequence"];
        $row_array['connectionStatus'] = $rowDlmSettings["connectionStatus"];
        $phasesNumber = $rowDlmSettings["phasesNumber"];
        $minCurrent1P = $rowDlmSettings["minCurrent1P"];
        $minCurrent3P = $rowDlmSettings["minCurrent3P"];
        $offlineCurrent = $rowDlmSettings["offlineCurrent"];
        $initialOfflineCurrentValue = getInitialOfflineCurrentValue($phasesNumber, $minCurrent1P, $minCurrent3P, $offlineCurrent);
        $row_array['offlineCurrent'] = $initialOfflineCurrentValue;
    }
    array_push($return_arr, $row_array);
    echo '|' . json_encode($return_arr);

}
//For Saving Slave Config Files
if (($_POST['vip'] != "" && $_POST['serialNumber']!= "")) {
    $context = new ZMQContext();
    $publisher = new ZMQSocket($context, ZMQ::SOCKET_PUB);
    $publisher->bind("ipc:///var/lib/webconfig.ipc");
    $publisher->send("initialization");
    sleep(1);

    $serialNumber = $_POST['serialNumber'];
    $vip = $_POST['vip'];
    $phaseConSequence = $_POST['phaseConSequence'];
    $offlineCurrent = $_POST['offlineCurrent'];

    $stmt = $slaveDBz->prepare("UPDATE slaveConfigs SET connectionSequence = :phaseConSequence WHERE serialNumber = :serialNumber");
    $stmt->bindValue(':phaseConSequence', $phaseConSequence, SQLITE3_TEXT);
    $stmt->bindValue(':serialNumber', $serialNumber, SQLITE3_TEXT);
    $stmt->execute();
    
    $stmt = $slaveDBz->prepare("UPDATE slaveConfigs SET vip = :vip WHERE serialNumber = :serialNumber");
    $stmt->bindValue(':vip', $vip, SQLITE3_TEXT);
    $stmt->bindValue(':serialNumber', $serialNumber, SQLITE3_TEXT);
    $stmt->execute();

    $stmt = $slaveDBz->prepare("UPDATE slaveConfigs SET offlineCurrent = :offlineCurrent WHERE serialNumber = :serialNumber");
    $stmt->bindValue(':offlineCurrent', $offlineCurrent, SQLITE3_INTEGER);
    $stmt->bindValue(':serialNumber', $serialNumber, SQLITE3_TEXT);
    $stmt->execute();

    $slaveUpdateMessage = array("type" => "dlmSlaveGroupConfigUpdate");
    $slaveUpdateMessage = json_encode($slaveUpdateMessage, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    $publisher->send($slaveUpdateMessage);
}
if($_POST['serialNumber'] == "clicked"){
    $context = new ZMQContext();
    $publisher = new ZMQSocket($context, ZMQ::SOCKET_PUB);
    $publisher->bind("ipc:///var/lib/webconfig.ipc");
    $publisher->send("initialization");
    sleep(1);
    $slaveUpdateMessage = array("type" => "dlmSlaveGroupConfigUpdate");
    $slaveUpdateMessage = json_encode($slaveUpdateMessage, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    $publisher->send($slaveUpdateMessage);

}
$slaveDBz->close();
unset($slaveDBz);
?>
