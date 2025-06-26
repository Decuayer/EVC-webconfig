<?php
session_start();
include_once "access_control.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
$_SESSION["DownloadStatus"] = "start";
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="SummaryLog.csv"');
header('Pragma: no-cache');
header('Expires: 0');
$db_path = '/var/lib/vestel/agent.db';

// Open the database connection
$db = new SQLite3($db_path);

if (!file_exists($db_path)) {
    die("Error: Database file not found at $db_path");
}

if (!is_readable($db_path)) {
    die("Error: Database file at $db_path is not readable");
}

$query = "SELECT sessionUuid, authorizationUid, startTime, stopTime, status, chargePointId, initialEnergy, lastEnergy FROM chargeSessions";
$results = $db->prepare($query);
$results = $results->execute();


$output = fopen("php://output", 'w');
fputcsv($output, array('Authorization Card Id', 'Total Energy'));

$sumOfAllSessionTotalEnergy = 0;

while ($row = $results->fetchArray()) {
    $authorizationUid = $row['authorizationUid'];
    $initialEnergy = number_format(($row['initialEnergy'] / 1000), 3, '.', '');
    $lastEnergy = number_format(($row['lastEnergy'] / 1000), 3, '.', '');
    $totalEnergy = number_format((($row['lastEnergy'] - $row['initialEnergy']) / 1000), 3, '.', '');
    $sumOfAllSessionTotalEnergy += $totalEnergy;
    fputcsv($output, array($authorizationUid, $totalEnergy));
}

fputcsv($output, array("Sum of All Session Total Energy", $sumOfAllSessionTotalEnergy));
fputcsv($output, array());

fputcsv($output, array('Authorization Card Id', 'Sum of Total Energy of Sessions'));

$authorizationUids = [];
$authorizationUidEnergy = [];

$results = $db->prepare($query); // Execute the query again
$results = $results->execute();

while ($row = $results->fetchArray()) {
    $authorizationUid = $row['authorizationUid'];
    if (!in_array($authorizationUid, $authorizationUids)) {
        $authorizationUids[] = $authorizationUid;
        $authorizationUidEnergy[$authorizationUid] = 0;
    }
    $initialEnergy = number_format(($row['initialEnergy'] / 1000), 3, '.', '');
    $lastEnergy = number_format(($row['lastEnergy'] / 1000), 3, '.', '');
    $totalEnergy = number_format((($row['lastEnergy'] - $row['initialEnergy']) / 1000), 3, '.', '');

    if (!array_key_exists($authorizationUid, $authorizationUidEnergy)) {
        continue;
    }
    $authorizationUidEnergy[$authorizationUid] += $totalEnergy;
}

foreach ($authorizationUidEnergy as $authorizationUid => $totalEnergy) {
    fputcsv($output, array($authorizationUid, $totalEnergy));
}

fclose($output);

// Close the database connection
$db->close();
$_SESSION["DownloadStatus"] = "finish";
?>

