<?php
    include_once "access_control.php";
?>

<div class="container py-5 justify-content-center align-items-center" id="systemResetPart" style="min-height: 50vh;">
  <div class="row justify-content-center g-4">

    <!-- Hard Reset -->
    <div class="col-12 col-md-5 text-center">
      <img src="css/hard-reset.png" alt="Hard Reset" class="img-fluid" style="height: 175px;">
      <div class="mt-4">
        <button type="button" class="btn btn-danger fw-bold px-4 py-2 fs-5" onclick="systemReset('button_hard_reset')">
          Hard Reset
        </button>
        <input type="submit" id="button_hard_reset" name="button_hard_reset" hidden>
      </div>
    </div>

    <!-- Soft Reset -->
    <div class="col-12 col-md-5 text-center">
      <img src="css/soft-reset.png" alt="Soft Reset" class="img-fluid" style="height: 175px;">
      <div class="mt-4">
        <button type="button" class="btn btn-warning fw-bold px-4 py-2 fs-5" id="softResetButton" onclick="systemReset('button_soft_reset')">
          Soft Reset
        </button>
        <input type="submit" id="button_soft_reset" name="button_soft_reset" hidden>
      </div>
    </div>

  </div>
</div>

<!-- Processing Notifications -->
<div class="container text-center text-success mt-3" id="system_reset_message" style="display:none">
  <?= _PROCESSING ?>
</div>

<!-- Alerts -->
<div class="container mt-3" id="systemResetWarningAlert" style="display:none">
  <p class="dialogText text-danger" id="hardResetWarningText"><?= _HARDRESETCONFIRM ?></p>
  <p class="dialogText text-warning" id="softResetWarningText"><?= _SOFTRESETCONFIRM ?></p>
</div>