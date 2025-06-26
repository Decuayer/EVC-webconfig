<?php
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&      strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!IS_AJAX) {
    header('HTTP/1.0 403 Forbidden');
    echo '403 Forbidden';
    exit;
}
include 'languageController.php';
include_once "access_control.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eebusState'])) {
    $eebusState = 'true';
    $eebusPairingUnpair = $_POST['selectEEBUSPairingUnpair'];
    $eebusPairingPair = $_POST['selectEEBUSPairingPair'];

    if ($eebusState === 'true' || $eebusPairingUnpair === 'false' || $eebusPairingPair === 'true') {
    //if ($eebusPairingUnpair === 'false' || $eebusPairingPair === 'true') {
        $pairing = ($eebusPairingUnpair === 'false') ? 'false' : (($eebusPairingPair === 'true') ? 'true' : 'false');
        $eebusState = 'true';
        $eebusDiscovery = $_POST['selectEebusDiscovery'];
        $discoveryArray = explode("|", $eebusDiscovery);
        $SKI = $discoveryArray[1];
        $MANUFACTURER = $discoveryArray[2];
        $PRODUCT = $discoveryArray[3];
        if (file_exists("/var/lib/vestel/webconfig.db")) {
            $db = new SQLite3('/var/lib/vestel/webconfig.db');
            $db->busyTimeout(5000);
            $stmt1 = $db->prepare('UPDATE eebusPairInfo SET ski = :ski, manufacturer = :manufacturer, product = :product');
            if ($pairing === 'false') {
                $stmt1->bindValue(':ski', null, SQLITE3_NULL);
                $stmt1->bindValue(':manufacturer', null, SQLITE3_NULL);
                $stmt1->bindValue(':product', null, SQLITE3_NULL);
            } elseif ($pairing === 'true') {
                $stmt1->bindValue(':ski', $SKI, SQLITE3_TEXT);
                $stmt1->bindValue(':manufacturer', $MANUFACTURER, SQLITE3_TEXT);
                $stmt1->bindValue(':product', $PRODUCT, SQLITE3_TEXT);
            }
            $result1 = $stmt1->execute();

            $stmt = $db->prepare('UPDATE eebusSettings SET eebusState = :eebusState, energyManagerPairingState = :energyManagerPairingState');
            $stmt->bindValue(':eebusState', $eebusState, SQLITE3_TEXT);
            $stmt->bindValue(':energyManagerPairingState', $pairing, SQLITE3_TEXT);
            $result = $stmt->execute();

            $context = new ZMQContext();
            $publisher = new ZMQSocket($context, ZMQ::SOCKET_PUB);
            $publisher->bind('ipc:///var/lib/webconfig.ipc');
            $publisher->send("initialization");
            sleep(1);

            $discoveryArray = explode("|", $eebusDiscovery);
            $pairing = ($eebusPairingUnpair === 'false') ? 'false' : (($eebusPairingPair === 'true') ? 'true' : 'null');
            $eebusUpdateMessage = array(
                'type' => 'eebusConfigUpdate',
                'pairing' => $pairing,
                'discovery' => array(
                    'shipId' => $discoveryArray[0],
                    'ski' => $discoveryArray[1],
                    'manufacturer' => $discoveryArray[2],
                    'product' => $discoveryArray[3]
                )
            );
            if (($pairing === 'true' && $SKI != '') || ($pairing === 'false')) {
            $eebusUpdateMessage = json_encode($eebusUpdateMessage, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
            $publisher->send($eebusUpdateMessage);
            }
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'success'));

            $db->close();
        } else {
            error_log('Database file not found');
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'error'));
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'no_action_taken'));
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(array('status' => 'error'));
}
?>
