<?php
    include_once "access_control.php";
?>
<html>
<div style="left:28%;position:absolute;z-index: 1;right:1%;" id="systemResetPart">
    <div style="margin-top:10%;margin-left:20%;margin-right:20%;">
        <div class="center_system_maintanence" style="float:left" id="backupFileItem">
            <div style="text-align: center;">
                <img src="css/download-icon.png">
            </div>
            <div style="margin-top:15%;">
                <button type="button" id = "backup_file_button" class="log_button" style="font-weight : bold ;" onclick="handleBackupButtonClick()"><?= _BACKUPFILE ?></button>
                <input type="submit" id="button_backup_file" name="button_backup_file" hidden>
            </div>
        </div>
        <!-- ----------------------- -->
        <div class="center_system_maintanence" style="float:right" id="restoreConfigFileItem">
            <div style="text-align: center;">
                <img src="css/upload-icon.png">
            </div>
            <div style="margin-top:15%;">
                <label for="configBackUpFile" style="display: inline-block;padding: 1.25em 0;text-align: center;font-size: 18px;" class="log_button"><?= _RESTOREFILE ?></label>
                <input type="submit" id="button_restore_config_file" name="button_restore_config_file" hidden>
            </div>
        </div>
    </div>
</div>
<div id="ConfigUpdateAlertMessage" style="display:none">
    <p class="dialogText" id="configUpdateForSize" style="display:none"><?= _FILESIZE ?></p>
    <p class="dialogText" id="configUpdateForType" style="display:none"><?= _FILETYPE ?></p>
</div>
<div id="configuration_backup_message" style="display:none"><?= _PROCESSING ?></div>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
    <input type="file" name="configBackUpFile" id="configBackUpFile" style="visibility: hidden;" />
    <input type="submit" id="configFileUpload" style="visibility: hidden;" />
</form>
<div id="restoreConfigAlertMessage" style="display:none">
    <p class="dialogText" id="backUpVersionText"><?= _BACKUPVERSIONCHECK ?></p>
</div>
<div id="restoreRebootAlertMessage" style="display:none">
    <p class="dialogText" id="restoreRebootAlert" style="text-align:center;"><?= _RESTOREMESSAGE ?></p>
</div>
</body>

</html>