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
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <!-- Filtreler -->
            <div class="row g-3 mb-4">
                <div class="col-md-3 col-sm-6">
                    <input type="text" id="startdate-filter" class="form-control" placeholder="<?= _STARTDATE ?>">
                </div>
                <div class="col-md-3 col-sm-6">
                    <input type="text" id="enddate-filter" class="form-control" placeholder="<?= _ENDDATE ?>">
                </div>
                <div class="col-md-3 col-sm-6">
                    <input type="text" id="evse-filter" class="form-control" placeholder="<?= _RFIDSELECTION ?>">
                </div>
                <div class="col-md-3 col-sm-6">
                    <button id="clear-filter" class="btn btn-outline-primary w-100"><?= _CLEAR ?></button>
                </div>
            </div>

            <!-- Tablo -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th><?= _ROWNUMBER ?></th>
                            <th><?= _SESSIONUUID ?></th>
                            <th><?= _AUTHORIZATIONUID ?></th>
                            <th><?= _STARTTIME ?></th>
                            <th><?= _STOPTIME ?></th>
                            <th><?= _TOTALTIME ?></th>
                            <th><?= _STATUS ?></th>
                            <th><?= _CHARGEPOINTIDS ?></th>
                            <th><?= _INITIALENERGY ?></th>
                            <th><?= _LASTENERGY ?></th>
                            <th><?= _TOTALENERGY ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?= isset($sessionUuid1) ? $i : "" ?></td>
                        <td><?= $sessionUuid1 ?></td>
                        <td><?= $authorizationUid1 ?></td>
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
                        <td><?= $status1 ?></td>
                        <td><?= $chargePointId1 ?></td>
                        <td>
                            <?php 
                                if (!isset($sessionUuid1)) {
                                    echo "";
                                } else { $kWh = $initialEnergy1 / 1000;
                                    printf("%.3f", $kWh); 
                                } 
                            ?>
                        </td>
                        <td>
                            <?php if (!isset($sessionUuid1)) {
                                    echo "";
                                } else { $kWh = $lastEnergy1 / 1000;
                                    printf("%.3f", $kWh); 
                                } 
                            ?>      
                        </td>
                        <td>
                            <?php 
                                if (!isset($sessionUuid1)) {
                                    echo "";
                                } else { $totalEnergy1 = $lastEnergy1-$initialEnergy1; $kWh = $totalEnergy1 / 1000;
                                    printf("%.3f", $kWh);
                                } 
                            ?>
                        </td>
                    </tr>
                    <?php 
                        $i = $start_record + 2;
                        foreach ($paginated_data as $record): 
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $record['sessionUuid'] ?></td>
                        <td><?= $record['authorizationUid'] ?></td>
                        
                        <td>
                            <?php  
                                $timezone = date_default_timezone_get();
                                date_default_timezone_set($timezone);
                                $formattedStartTime = date("d/m/Y, H:i:s", $record[startTime]);
                                echo $formattedStartTime;
                            ?>     
                        </td>
                        <td>
                            <?php  
                                $timezone = date_default_timezone_get();
                                date_default_timezone_set($timezone);
                                $formattedStopTime = date("d/m/Y, H:i:s", $record[stopTime]);
                                echo $formattedStopTime;
                            ?>
                        </td>
                        <td>
                            <?php 
                                if (!isset($sessionUuid1)) {
                                    echo "";
                                } else {  $timezone = date_default_timezone_get();
                                    date_default_timezone_set($timezone);
                                    $formattedStartTime3 = date("Y-m-d, H:i:s", $record[startTime]);
                                    $formattedStopTime3 = date("Y-m-d, H:i:s", $record[stopTime]);
                                    $startTimeTimestamp3 = strtotime($formattedStartTime3);
                                    $stopTimeTimestamp3 = strtotime($formattedStopTime3);
                                    $formattedTotalTime = $stopTimeTimestamp3 - $startTimeTimestamp3;
                                    echo gmdate("H:i:s", $formattedTotalTime);
                                }
                            ?>  
                        </td>
                        <td><?= $record['status'] ?></td>
                        <td><?= $record['chargePointId'] ?></td>
                        <td>
                            <?php 
                                if (!isset($sessionUuid1)) {
                                    echo "";
                                } else {
                                    $kWh = $record[initialEnergy] / 1000;
                                    printf("%.3f", $kWh);
                                } 
                            ?>
                        </td>
                        <td>
                            <?php 
                                if (!isset($sessionUuid1)) {
                                    echo "";
                                } else {
                                    $kWh = $record[lastEnergy] / 1000;
                                    printf("%.3f", $kWh);
                                } 
                            ?>
                        </td>
                        <td>
                            <?php 
                                if (!isset($sessionUuid1)) {
                                    echo "";
                                } else {
                                    $totalEnergy = $record[lastEnergy]-$record[initialEnergy]; $kWh = $totalEnergy / 1000;
                                    printf("%.3f", $kWh);
                                } 
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Sayfalama -->
            <div class="d-flex flex-wrap justify-content-center gap-2 my-4">
            <?php if ($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>" class="btn btn-outline-secondary btn-sm">‹ <?= _PREV ?></a>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?= $i ?>" class="btn btn-sm <?= $i == $page ? 'btn-primary' : 'btn-outline-primary' ?>"><?= $i ?></a>
            <?php endfor; ?>
            <?php if ($page < $total_pages): ?>
                <a href="?page=<?= $page + 1 ?>" class="btn btn-outline-secondary btn-sm"><?= _NEXT ?> ›</a>
            <?php endif; ?>
            </div>

            <!-- Butonlar -->
            <div class="row justify-content-center my-5 g-4">
            <div class="col-12 col-md-4 text-center">
                <img src="css/download-icon.png" alt="Local" class="img-fluid" style="max-height: 100px;">
                <div class="mt-2">
                <button type="button" class="btn btn-outline-primary w-100" onclick="location.href='downloadChargeSessionsLogs.php'">
                    <?= _DOWNLOADLOCALCHARGESESSIONLOGS ?>
                </button>
                </div>
            </div>

            <div class="col-12 col-md-4 text-center">
                <img src="css/download-icon.png" alt="Full" class="img-fluid" style="max-height: 100px;">
                <div class="mt-2">
                <button type="button" class="btn btn-outline-primary w-100" onclick="location.href='downloadFullSessionLogs.php'">
                    <?= _DOWNLOADFULLSESSIONLOGS ?>
                </button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>