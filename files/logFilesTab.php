<?php
    include_once "access_control.php";
?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <h5 class="mb-3"><?= _DEVICEEVENTLOGS ?></h5>
            <div class="p-3 border border-2 rounded mb-4">
                <p class="mb-2"><?= _DOWNLOADEVENTLOGSINFO ?></p>
            
                <div class="row mb-3">
                    <div class="col-12 col-md-6 mb-2">
                        <label class="textInSettings"><?= _STARTDATE ?></label>
                        <input type="date" class="form-control" id="logsStartDateSelection" name="logsStartDateSelection"
                            onchange="handleMinMaxDates();"
                            min="<?php echo $logsMinDate; ?>" max="<?php echo $logsMaxDate; ?>">
                    </div>

                    <div class="col-12 col-md-6 mb-2">
                        <label class="textInSettings"><?= _ENDDATE ?></label>
                        <input type="date" class="form-control" id="logsEndDateSelection" name="logsEndDateSelection"
                            onchange="handleMinMaxDates();"
                            min="<?php echo $logsMinDate; ?>" max="<?php echo $logsMaxDate; ?>">
                    </div>
                </div>

                <div class="mb-2">
                    <button type="button" id="device_log_button" class="btn btn-danger px-4" onclick="deviceLogSettings('button_device_log');"><?= _DOWNLOAD ?></button>
                    <input type="submit" id="button_device_log" name="button_device_log" hidden>
                    <div class="text-danger mt-2" id="downloadLogDateErr">
                    </div>
                </div>
            </div>

            <div class="p-3 border border-2 rounded mb-4">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start">
                    <div>
                        <p class="mb-1"><?= _CLEAREVENTLOGS ?></p>
                        <span class="text-muted small"><?= _CLEAREVENTLOGSINFO ?></span>
                    </div>
                    <div>
                        <button type="button" id="clear_device_log_button" class="btn btn-warning px-4 mt-2 mt-md-0" onclick="clearLogsRestartAlertMessage();"><?= _CLEAR ?></button>
                        <input type="submit" id="button_clear_device_log" name="button_clear_device_log" hidden>
                    </div>
                </div>
                <div id="clearLogsErr" class="text-danger mt-2">
                </div>
            </div>

            <h5 class="mb-3"><?= _DEVICECHANGELOGS ?></h5>

            <div class="p-3 border border-2 rounded mb-4">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <span class="mb-2 mb-md-0"><?= _DOWNLOACHANGELOGS ?></span>
                    <button type="button" id="hmi_log_button" class="btn btn-primary px-4" onclick="location.href='downloadChangeLogs.php'"><?= _DOWNLOAD ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="clearLogsRestartAlertMessage" style="display:none">
  <p class="text-center fw-bold"><?= _APPLICATIONRESTART ?></p>
  <p class="fw-bold"><?= _ACCEPTQUESTION ?></p>
</div>