<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

ob_start();
include_once "access_control.php";

$_SESSION["DownloadStatus"] = "start";

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="FullSessionLogs.csv"');
header('Pragma: no-cache');
header('Expires: 0');

$db_path = '/var/lib/vestel/agent.db';

if (!file_exists($db_path)) {
    die("Error: Database file not found at $db_path");
}

if (!is_readable($db_path)) {
    die("Error: Database file at $db_path is not readable");
}

$db = new SQLite3($db_path);
$query = "SELECT sessionUuid, authorizationUid, startTime, stopTime, status, chargePointId, initialEnergy, lastEnergy FROM chargeSessions";
$results = $db->prepare($query);
$results = $results->execute();

$output = fopen("php://output", 'w');
fputcsv($output, array('SessionUuid','Authorization Card Id','Start Time','Stop Time','Total Time','Status','Connector Id','Initial Energy(in kWh)','Last Energy(in kWh)','Total Energy(in kWh)'));

while ($row = $results->fetchArray()) {
    $sessionUuid = $row['sessionUuid'];
    $authorizationUid = $row['authorizationUid'];
    $startTime = date("Y.m.d H:i:s", $row['startTime']);
    $stopTime = date("Y.m.d H:i:s", $row['stopTime']);
    $totalTime1 = $row['stopTime'] - $row['startTime'];
    $totalTime = gmdate("H:i:s", $totalTime1);
    $status = $row['status'];
    $chargePointId = $row['chargePointId'];
    $initialEnergy = number_format(($row['initialEnergy'] / 1000), 3, '.', ''); // Convert to kilowatts and round to three decimal places
    $lastEnergy = number_format(($row['lastEnergy'] / 1000), 3, '.', ''); // Convert to kilowatts and round to three decimal places
    $totalEnergy = number_format((($row['lastEnergy'] - $row['initialEnergy']) / 1000), 3, '.', ''); // Difference in kilowatts and round to three decimal places

    fputcsv($output, array($sessionUuid, $authorizationUid, $startTime, $stopTime, $totalTime, $status, $chargePointId, $initialEnergy, $lastEnergy, $totalEnergy));
}

fclose($output);

// Close the database connection
$db->close();
$_SESSION["DownloadStatus"] = "finish";

?>

