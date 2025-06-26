<?php
session_start();
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&      strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!IS_AJAX) {
    header('HTTP/1.0 403 Forbidden');
    echo '403 Forbidden';
    exit;
}
include_once "access_control.php";

if (file_exists("/var/lib/vestel/agent.db")) {
    class connectorInfoDbz extends SQLite3 {
        function __construct() {
            $this->open('/var/lib/vestel/agent.db');
        }
    }
}
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$items_per_page = 10; // change this as needed
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$connectorInfoDBz = new connectorInfoDbz();
$connectorInfoDBz->busyTimeout(10000);
$query = "SELECT * FROM chargeSessions";
$hasFilter = !empty($filter);
if ($hasFilter) {
   $query .= " WHERE authorizationUid LIKE :filter
               OR chargePointId LIKE :filter";
}
$offset = ($page - 1) * $items_per_page;
$query .= " LIMIT :limit OFFSET :offset";
$connectorInfoSettingsz = $connectorInfoDBz->prepare($query);
if ($hasFilter) {
    $connectorInfoSettingsz->bindValue(':filter', "%$filter%", SQLITE3_TEXT);
}
$connectorInfoSettingsz->bindValue(':limit', $items_per_page, SQLITE3_INTEGER);
$connectorInfoSettingsz->bindValue(':offset', $offset, SQLITE3_INTEGER);
$result = $connectorInfoSettingsz->execute();
$index = ($page - 1) * $items_per_page + 1;
$table_array = array();
while ($rowChargeSession = $result->fetchArray()) {
    $row_array = array();
    $row_array['Row No'] = $index++;
    $row_array['sessionUuid'] = $rowChargeSession['sessionUuid'];
    $row_array['authorizationUid'] = $rowChargeSession['authorizationUid'];
    $row_array['startTime'] = $rowChargeSession['startTime'];
    $row_array['stopTime'] = $rowChargeSession['stopTime'];
    $row_array['totalTime'] = $row_array['stopTime'] - $row_array['startTime'];
    $row_array['status'] = $rowChargeSession['status'];
    $row_array['chargePointId'] = $rowChargeSession['chargePointId'];
    $row_array['initialEnergy'] = $rowChargeSession['initialEnergy'];
    $row_array['lastEnergy'] = $rowChargeSession['lastEnergy'];
    $row_array['totalEnergy'] = $row_array['lastEnergy'] - $row_array['initialEnergy'];
    array_push($table_array, $row_array);
}
$stmt = $connectorInfoDBz->prepare("SELECT COUNT(*) AS total FROM chargeSessions");
$result = $stmt->execute();
if ($result) {
    $row = $result->fetchArray(SQLITE3_ASSOC);
    $count_result = $row['total'];
} else {
    $count_result = 0;
}
$count = intval($count_result);
$total_pages = ceil($count / $items_per_page);
$prev_page = $page > 1 ? $page - 1 : null;
$next_page = $page < $total_pages ? $page + 1 : null;
$response = array(
  'data' => $table_array,
  'pagination' => array(
    'prev_page' => $prev_page,
    'next_page' => $next_page,
    'total_pages' => $total_pages,
    'current_page' => $page,
    'total_items' => $count,
  ),
);
echo json_encode($response);
// Close the database connection
$connectorInfoDBz->close();
?>
