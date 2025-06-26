<?php
    include "access_control.php";
?>
<span class="title"><?= _DIAGNOSTICS ?></span>
<button type="button" id="device_log_button" style="width: 250px; display:none" class="tab_button" onclick="location.href='downloadDeviceLogs.php'"> <?= _DOWNLOADDEVICELOGS ?> </button>
<button type="button" id="ac_log_button" style="width: 250px;" hidden onclick="location.href='downloadACLogs.php'"> <?= _DOWNLOADACLOGS ?> </button>
<button type="button" id="cellular_log_button" style="width: 250px;" hidden onclick="location.href='downloadCellularLogs.php'"> <?= _DOWNLOADCELLULARLOGS ?> </button>
<button type="button" id="power_log_button" style="width: 250px;" hidden onclick="location.href='downloadPowerBoardLogs.php'"> <?= _DOWNLOADPOWERBOARDLOGS ?> </button>
<div id="uiOverlay" style="display: none;"><?= _PROCESSING ?></div>
