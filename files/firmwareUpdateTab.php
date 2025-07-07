<?php
    include_once "access_control.php";
?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
   <div class="row justify-content-center">
      <div class="col-12 col-md-8">
         <div id="uploadPart" class="text-center w-100" style="max-width: 500px;">
            <div class="mb-4">
               <img id="hmiLogIcon" src="css/upload-icon.png" class="img-fluid" alt="Upload Icon">
            </div>
            <div class="mb-3 h5 system_maintanence_text"><?= _SELECTFIRMWARE ?></div>
            <div class="mb-3">
               <label for="zipFile" class="btn btn-primary fw-bold px-4 py-2 fs-5"><?= _UPLOAD ?></label>
            </div>
         </div>

         <div id="updatePart" class="text-center w-100 d-none" style="max-width: 500px;">
            <div class="mb-4">
               <img id="hmiLogIcon" src="css/upload-icon.png" class="img-fluid" alt="Upload Icon">
            </div>
            <div class="mb-3 h5 system_maintanence_text" id="fileName"><?= _FILENAME ?></div>
            <div class="mb-3">
               <button type="button" class="btn btn-success fw-bold px-4 py-2" onclick="firmwareUpdate()"><?= _UPDATE ?></button>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Alert Messages -->
<div id="firmwareUpdateAlertMessage" class="container mt-4" style="display:none">
  <p class="dialogText text-danger" id="firmwareUpdateForSize" style="display:none"><?= _FIRMWAREFILESIZE ?></p>
  <p class="dialogText text-danger" id="firmwareUpdateForType" style="display:none"><?= _FIRMWAREFILETYPE ?></p>
</div>

<div id="firmware_update_saved_message" class="container text-center text-success mt-3" style="display:none">
  <?= _PROCESSING ?>
</div>

<!-- Form -->
<form method="POST" enctype="multipart/form-data" class="d-none">
  <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
  <input type="file" name="zipFile" id="zipFile" style="visibility: hidden;" />
  <input type="submit" id="fileUpload" style="visibility: hidden;" />
</form>
