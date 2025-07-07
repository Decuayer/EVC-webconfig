<?php
    include_once "access_control.php";
?>

<div class="container py-5 justify-content-center align-items-center" id="systemResetPart" style="min-height: 50vh;">
  <div class="row justify-content-center g-4">

    <!-- Backup File Button -->
    <div class="col-12 col-md-5 text-center">
      <img src="css/download-icon.png" class="img-fluid mb-3" alt="Download Icon">
      <div>
        <button type="button" id="backup_file_button" class="btn btn-primary fw-bold fs-5 px-4 py-2" onclick="handleBackupButtonClick()">
          <?= _BACKUPFILE ?>
        </button>
        <input type="submit" id="button_backup_file" name="button_backup_file" hidden>
      </div>
    </div>

    <!-- Restore File Upload -->
    <div class="col-12 col-md-5 text-center">
      <img src="css/upload-icon.png" class="img-fluid mb-3" alt="Upload Icon">
      <div>
        <label for="configBackUpFile" class="btn btn-primary fw-bold px-4 py-2 fs-5">
          <?= _RESTOREFILE ?>
        </label>
        <input type="submit" id="button_restore_config_file" name="button_restore_config_file" hidden>
      </div>
    </div>

  </div>
</div>

<!-- Alert Messages -->
<div class="container mt-4" id="ConfigUpdateAlertMessage" style="display:none">
  <p class="text-danger dialogText" id="configUpdateForSize" style="display:none"><?= _FILESIZE ?></p>
  <p class="text-danger dialogText" id="configUpdateForType" style="display:none"><?= _FILETYPE ?></p>
</div>

<div class="container text-center text-success mt-3" id="configuration_backup_message" style="display:none">
  <?= _PROCESSING ?>
</div>

<!-- Hidden File Upload Form -->
<form method="POST" enctype="multipart/form-data" class="d-none">
  <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
  <input type="file" name="configBackUpFile" id="configBackUpFile" style="visibility: hidden;" />
  <input type="submit" id="configFileUpload" style="visibility: hidden;" />
</form>

<!-- Restore Alerts -->
<div class="container text-center mt-3" id="restoreConfigAlertMessage" style="display:none">
  <p class="dialogText"><?= _BACKUPVERSIONCHECK ?></p>
</div>

<div class="container text-center mt-3" id="restoreRebootAlertMessage" style="display:none">
  <p class="dialogText"><?= _RESTOREMESSAGE ?></p>
</div>