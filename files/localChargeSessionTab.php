<?php
include_once "access_control.php";
$records_per_page = 10;
$total_records = count($data);
$total_pages = ceil($total_records / $records_per_page);
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$start_record = ($page - 1) * $records_per_page;
$end_record = min($start_record + $records_per_page, $total_records);
$paginated_data = array_slice($data, $start_record, $records_per_page);
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css?<?php echo time(); ?>">
<script src="js/jquery.min.js?<?php echo time(); ?>"></script>
<script src="js/bootstrap.min.js?<?php echo time(); ?>"></script>
</head>

<div class="col-sm-3 input-container" style="width: 200px !important; margin-right: 20px !important;">
    <input type="text" id="startdate-filter" class="form-control behind-input" placeholder="<?= _STARTDATE ?>">
</div>

<div class="col-sm-3 input-container" style="width: 200px !important; margin-right: 20px !important;">
    <input type="text" id="enddate-filter" class="form-control behind-input" placeholder="<?= _ENDDATE ?>">
</div>

<div class="col-sm-3 input-container" style="width: 200px !important; margin-right: 20px !important;">
    <input type="text" id="evse-filter" class="form-control behind-input" placeholder="<?= _RFIDSELECTION ?>">
</div>

<div class="col-sm-3 input-container" style="width: 200px !important; margin-right: 20px !important;">
    <button id="clear-filter" class="btn btn-primary behind-input"><?= _CLEAR ?></button>
</div>

<br></br>
  <div class="container">
    <table id="myTable" class="table table-striped table-condensed table-bordered">
      <thead>
        <tr>
          <th style="background-color:#337ab7"><label style="font-size: 0.9em; color: white"><?= _ROWNUMBER ?></label></th>
          <th style="background-color:#337ab7"><label style="font-size: 0.9em; color: white"><?= _SESSIONUUID ?></label></th>
          <th style="background-color:#337ab7"><label style="font-size: 0.9em; color: white"><?= _AUTHORIZATIONUID ?></label></th>
          <th style="background-color:#337ab7"><label style="font-size: 0.9em; color: white"><?= _STARTTIME ?></label></th>
          <th style="background-color:#337ab7"><label style="font-size: 0.9em; color: white"><?= _STOPTIME ?></label></th>
          <th style="background-color:#337ab7"><label style="font-size: 0.9em; color: white"><?= _TOTALTIME ?></label></th>
          <th style="background-color:#337ab7"><label style="font-size: 0.9em; color: white"><?= _STATUS ?></label></th>
          <th style="background-color:#337ab7"><label style="font-size: 0.9em; color: white"><?= _CHARGEPOINTIDS ?></label></th>
          <th style="background-color:#337ab7"><label style="font-size: 0.9em; color: white"><?= _INITIALENERGY ?></label></th>
          <th style="background-color:#337ab7"><label style="font-size: 0.9em; color: white"><?= _LASTENERGY ?></label></th>
          <th style="background-color:#337ab7"><label style="font-size: 0.9em; color: white"><?= _TOTALENERGY ?></label></th>
        </tr>
      </thead>
      <tbody>
    <tr>
    <td><?php if (isset($sessionUuid1)) {
              echo $i;
              } else {
              echo "";
              }?>
    </td>
    <td><?php echo $sessionUuid1;?></td>
    <td><?php echo $authorizationUid1;?></td>
    <td>
<?php
if (!isset($sessionUuid1)) {
    echo "";
} else {
    $timezone = date_default_timezone_get();
    date_default_timezone_set($timezone);
    $formattedStartTime1 = date("d/m/Y, H:i:s", $startTime1);
    echo $formattedStartTime1;
}
?>
</td>
<td>
<?php
if (!isset($sessionUuid1)) {
    echo "";
} else {
    $timezone = date_default_timezone_get();
    date_default_timezone_set($timezone);
    $formattedStopTime1 = date("d/m/Y, H:i:s", $stopTime1);
    echo $formattedStopTime1;
}
?>
</td>
<td>
<?php
if (!isset($sessionUuid1)) {
    echo "";
} else {
    $timezone = date_default_timezone_get();
    date_default_timezone_set($timezone);
    $formattedStartTime2 = date("Y-m-d, H:i:s", $startTime1);
    $formattedStopTime2 = date("Y-m-d, H:i:s", $stopTime1);
    $startTimeTimestamp = strtotime($formattedStartTime2);
    $stopTimeTimestamp = strtotime($formattedStopTime2);
    $formattedTotalTime1 = $stopTimeTimestamp - $startTimeTimestamp;
    echo gmdate("H:i:s", $formattedTotalTime1);
}
?>
</td>

    <td><?php echo $status1;?></td>
    <td><?php echo $chargePointId1;?></td>
    <td><?php if (!isset($sessionUuid1)) {
        echo "";
    } else { $kWh = $initialEnergy1 / 1000;
        printf("%.3f", $kWh); } ?></td>
    <td><?php if (!isset($sessionUuid1)) {
        echo "";
    } else { $kWh = $lastEnergy1 / 1000;
        printf("%.3f", $kWh); } ?></td>
    <td><?php if (!isset($sessionUuid1)) {
        echo "";
    } else { $totalEnergy1 = $lastEnergy1-$initialEnergy1; $kWh = $totalEnergy1 / 1000;
        printf("%.3f", $kWh);} ?></td>
</tr>
<?php
      $i = $start_record + 2;
        foreach ($paginated_data as $record) { ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= $record['sessionUuid'] ?></td>
          <td><?= $record['authorizationUid'];?></td>
          <td><?php  $timezone = date_default_timezone_get();
                     date_default_timezone_set($timezone);
                     $formattedStartTime = date("d/m/Y, H:i:s", $record[startTime]);
                     echo $formattedStartTime;
                     ?></td>
          <td><?php  $timezone = date_default_timezone_get();
                     date_default_timezone_set($timezone);
                     $formattedStopTime = date("d/m/Y, H:i:s", $record[stopTime]);
                     echo $formattedStopTime;
                     ?></td>
    <td><?php if (!isset($sessionUuid1)) {
              echo "";
    } else {  $timezone = date_default_timezone_get();
              date_default_timezone_set($timezone);
              $formattedStartTime3 = date("Y-m-d, H:i:s", $record[startTime]);
              $formattedStopTime3 = date("Y-m-d, H:i:s", $record[stopTime]);
              $startTimeTimestamp3 = strtotime($formattedStartTime3);
              $stopTimeTimestamp3 = strtotime($formattedStopTime3);
              $formattedTotalTime = $stopTimeTimestamp3 - $startTimeTimestamp3;
              echo gmdate("H:i:s", $formattedTotalTime);
    }?> </td>
    <td><?php echo $record[status];?></td>
    <td><?php echo $record[chargePointId];?></td>
    <td><?php if (!isset($sessionUuid1)) {
        echo "";
    } else {
        $kWh = $record[initialEnergy] / 1000;
        printf("%.3f", $kWh);} ?></td>
    <td><?php if (!isset($sessionUuid1)) {
        echo "";
    } else {
        $kWh = $record[lastEnergy] / 1000;
        printf("%.3f", $kWh); } ?></td>
    <td><?php if (!isset($sessionUuid1)) {
        echo "";
    } else {
        $totalEnergy = $record[lastEnergy]-$record[initialEnergy]; $kWh = $totalEnergy / 1000;
        printf("%.3f", $kWh); } ?></td>
         </tr>
      <?php } ?>
  </table>
 <div class="pagination">
    <?php if ($page > 1) { ?>
      <a href="#" class="page-link" data-page="<?= $page - 1 ?>">Prev</a>
    <?php } ?>
    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
      <a href="#" class="page-link<?= $i === $page ? ' active' : '' ?>" data-page="<?= $i ?>"><?= $i ?></a>
    <?php } ?>
    <?php if ($page < $total_pages) { ?>
      <a href="#" class="page-link" data-page="<?= $page + 1 ?>">Next</a>
    <?php } ?>
  </div>
<div style="display: flex; justify-content: space-between; margin-top: 10%; margin-left: 20%; margin-right: 20%;">
    <div class="center_system_maintanence">
        <div style="text-align: center;">
            <img id="localChargeSessionLogIcon" src="css/download-icon.png" style="width: 30%; height: auto;">
        </div>
        <div style="margin-top: 2%;">
            <button type="button" id="localChargeSession_log_button" class="log_button" onclick="location.href='downloadChargeSessionsLogs.php'"><?= _DOWNLOADLOCALCHARGESESSIONLOGS ?></button>
        </div>
    </div>
    <div class="center_system_maintanence">
        <div style="text-align: center;">
            <img id="fullSessionLogIcon" src="css/download-icon.png" style="width: 30%; height: auto;">
        </div>
        <div style="margin-top: 2%;">
            <button type="button" id="full_session_log_button" class="log_button" onclick="location.href='downloadFullSessionLogs.php'"><?= _DOWNLOADFULLSESSIONLOGS ?></button>
        </div>
    </div>
</div>
</div>
</body>
</html>
