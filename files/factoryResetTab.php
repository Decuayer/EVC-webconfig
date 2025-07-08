<?php
    include_once "access_control.php";
?>
<div class="container justify-content-center align-items-center my-5 py-5" id="factoryResetPage" style="min-height: 50vh;">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="text-center">

        <!-- Reset Icon -->
        <div class="mb-4">
          <img id="hmiLogIcon" src="css/factory-reset-icon.png" class="img-fluid" style="max-height: 180px;" alt="Factory Reset">
        </div>

        <!-- Progress -->
        <div id="factory_reset_saved_message" style="display:none;">
          <div class="fw-bold mb-4"><?= _PROCESSING ?></div>

          <!-- Bar -->
          <div class="my-3">
            <div id="progress" class="progress" style="height: 20px;">
              <div id="bar" class="progress-bar progress-bar-striped progress-bar-animated" style="width: 0%;"></div>
            </div>
          </div>

          <p id="factory_reset_setup_message" class="mt-3" style="display:none">
            <?= _NEWSETUP ?>
          </p>
        </div>

        <!-- Reset Button -->
        <div class="mt-4">
          <button type="button" id="factory_default_button" name="factory_default_button" class="btn btn-danger fw-bold px-4 py-2 fs-5"
            onclick="factoryReset('<?php echo $_SESSION['token']?>')">
            <?= _FACTORYRESETBUTTON ?>
          </button>
          <input type="submit" id="button_factory_default" name="button_factory_default" hidden>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Alert Msg -->
<div class="container text-center mt-4" id="savedAlertMessage" style="display:none">
  <p class="dialogText text-warning" id="factoryResetText"><?= _FACTORYDEFAULTCONFIRM ?></p>
</div>
