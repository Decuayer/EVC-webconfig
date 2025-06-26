<?php
    include_once "access_control.php";
?>
<span style="margin-bottom:15px;" class="textInSettings"><?= _DEVICEEVENTLOGS ?></span>
<div class="outer_box" style="margin-top:15px;">
    <div class="box" style="margin-bottom:20px">
    <span style="width:45vw" class="textInSettings"><?= _DOWNLOADEVENTLOGSINFO ?></span>   
    <div style="padding-top:2vw">
        <span style="display:inline-block;width:8vw" class="textInSettings"><?= _STARTDATE ?></span>
        <input type="date" class="textarea1" id="logsStartDateSelection" name="logsStartDateSelection" onchange="handleMinMaxDates();" min="<?php echo $logsMinDate; ?>" max="<?php echo $logsMaxDate; ?>" style="width:12vw;margin-right:3vw;"></td>
        <span style="display:inline-block;width:8vw" class="textInSettings"><?= _ENDDATE ?></span>
        <input type="date" class="textarea1" id="logsEndDateSelection" name="logsEndDateSelection" onchange="handleMinMaxDates();" min="<?php echo $logsMinDate; ?>" max="<?php echo $logsMaxDate; ?>" style="width:12vw;margin-right:4vw;"></td>
        <button type="button" id="device_log_button" class="logFilesButton" onclick="deviceLogSettings('button_device_log');"> <?= _DOWNLOAD ?> </button>
        <input type="submit" id="button_device_log" name="button_device_log" hidden>
        <span class="alert" style="padding-left:0;margin-left:0;" id="downloadLogDateErr"></span>
    </div>

    </div>
    <br></br>
    <br></br>
    <div class="box">
        <div>
            <span style="float:left; padding-top:20px; display:inline-block; width:19vw;" class="textInSettings"><?= _CLEAREVENTLOGS ?></span>
            <button type="button" id="clear_device_log_button" class="logFilesButton" onclick="clearLogsRestartAlertMessage();"> <?= _CLEAR ?> </button>
            <input type="submit" id="button_clear_device_log" name="button_clear_device_log" hidden>
            <span class="alert" style="padding-top:10px;" id="clearLogsErr"><?= _CLEAREVENTLOGSINFO ?></span>
        </div>
    </div> 
</div>
<br></br>
<br></br>
<span style="margin-bottom:15px;" class="textInSettings"><?= _DEVICECHANGELOGS ?></span>
<div class="outer_box" style="margin-top:15px;">
    <div>
        <span style="float:left; padding-top:15px; display:inline-block; width:20vw;" class="textInSettings"><?= _DOWNLOACHANGELOGS ?></span>
        <button type="button" id="hmi_log_button" class="logFilesButton" onclick="location.href='downloadChangeLogs.php'"> <?= _DOWNLOAD ?> </button>
    </div>
</div>

<div id="clearLogsRestartAlertMessage" style="display:none">
    <p class="dialogText" id="clearDeviceLogsRestartAlert" style="text-align:center;"><?= _APPLICATIONRESTART ?></p>
    <p class="dialogTextBold"><?= _ACCEPTQUESTION ?></p>
</div>
