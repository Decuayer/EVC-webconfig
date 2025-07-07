<?php
    include_once "access_control.php";
?>
<div class="container my-5" id="earthingSystemPage">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="row align-items-center mb-4">
        <label for="earthingSystemSelection" class="col-12 col-md-6 textInSettings">
          <?= _EARTHINGSYSTEM ?>
        </label>
        <div class="col-12 col-md-6">
          <select
            id="earthingSystemSelection"
            name="earthingSystemSelection"
            class="form-select"
            onchange="earthingSystemCheck()"
          >
            <?php if ($ulType != "UL32" && $ulType != "UL50") { ?>
              <option id="tnortt" value="0" <?= $rowInstallationSettings["earthingType"] == 0 ? 'selected' : '' ?>>
                <?= _TNORTT ?>
              </option>
            <?php } ?>
            <option id="splitPhase" value="1" <?= $rowInstallationSettings["earthingType"] == 1 ? 'selected' : '' ?>>
              <?= _SPLITPHASE ?>
            </option>
          </select>
        </div>
      </div>

      <div class="d-flex justify-content-center my-4">
        <button
          type="button"
          name="earthing_system_button"
          id="earthing_system_button"
          class="btn btn-primary px-4"
          onclick="checkEarthingSystemForm()"
        >
          <?= _SAVE ?>
        </button>
        <input type="submit" id="button_earthing_system" name="button_earthing_system" hidden>
      </div>
    </div>
  </div>
</div>

<!-- Alert Message -->
<div class="container text-center mt-4" id="earthingSystemAlertMessage" style="display:none">
  <p class="dialogText"><?= _EARTHINGSYSTEMCONFIRM ?></p>
</div>
