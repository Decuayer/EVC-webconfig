<?php
    include_once "access_control.php";
?>
<div class="container my-5">
  <div class="row justify-content-center text-center">
    <div class="col-12 col-md-6" id="logoUploadPart">
      <img id="hmiLogIcon" src="css/upload-icon.png" class="img-fluid mx-auto d-block" alt="Upload Icon" style="max-height:150px;">
      <div class="mt-4 system_maintanence_text"><?= _USELOGO ?></div>
      <label for="imageFile" class="btn btn-primary mt-4 px-4 py-2" style="font-size: 1.125rem; cursor: pointer;">
        <?= _UPLOAD ?>
      </label>
    </div>

    <div class="col-12 col-md-6 d-none" id="logoUpdatePart">
      <img id="hmiLogIcon" src="css/upload-icon.png" class="img-fluid mx-auto d-block" alt="Upload Icon" style="max-height:150px;">
      <div class="mt-3 system_maintanence_text" id="logoFileName"><?= _FILENAME ?></div>
      <button type="button" class="btn btn-primary mt-3 px-4 py-2" id="logo_update_button" onclick="logoUpdate()">
        <?= _UPDATE ?>
      </button>
    </div>

    <div class="col-12 text-center mt-4" id="logoRemovePart">
      <button type="button" class="btn btn-danger px-4 py-2" id="logo_remove_button" onclick="logoRemove()">
        <?= _REMOVE ?>
      </button>
    </div>
  </div>

  <div id="logoUpdateAlertMessage" class="mt-3" style="display:none">
    <p class="dialogText" id="logoUpdateForType" style="display:none"><?= _LOGOTYPE ?></p>
    <p class="dialogText" id="logoUpdateForDimension" style="display:none"><?= _LOGODIMENSION ?></p>
  </div>

  <div id="logo_update_saved_message" class="mt-3" style="display:none"><?= _PROCESSING ?></div>

  <form action="" id="imageForm" method="POST" enctype="multipart/form-data" class="d-none">
    <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
    <input type="file" name="imageFile" id="imageFile" />
    <input type="submit" id="logoUpload" />
    <input type="submit" id="button_logo_remove" name="button_logo_remove" />
  </form>
</div>