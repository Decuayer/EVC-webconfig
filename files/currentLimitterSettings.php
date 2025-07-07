<?php
    include_once "access_control.php";
?>
<div class="container my-5" id="currentLimiterSettingsPage">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="mb-3">
        <p class="mb-0">
          <span class="text-danger fw-bold">*</span>
          <span class="explanation"><?= _EXPLANATION ?></span>
        </p>
      </div>

      <div class="row align-items-center mb-4">
        <label for="currentLimiterPhaseSelection" class="col-12 col-md-6 textInSettings">
          <?= _CURRENTLIMITERPHASE ?>
        </label>
        <div class="col-12 col-md-6 ">
          <select
            id="currentLimiterPhaseSelection"
            name="currentLimiterPhaseSelection"
            class="form-select"
            data-original-value="<?= $rowInstallationSettings["currentLimiterPhase"] ?>"
            data-charging-status="<?= $chargePointStatus ?>"
            <?= $ulType == "UL50" || $ulType == "UL32" || $phaseTypeProduction == "0" ? 'disabled' : '' ?>
          >
            <option id="currentLimiterOnePhase" value="0" <?= $rowInstallationSettings["currentLimiterPhase"] == 0 ? 'selected' : '' ?>>
              <?= _ONEPHASE ?>
            </option>
            <option id="currentLimiterThreePhase" value="1" <?= $rowInstallationSettings["currentLimiterPhase"] == 1 ? 'selected' : '' ?>>
              <?= _THREEPHASE ?>
            </option>
          </select>
        </div>
      </div>

      <div class="row align-items-center mb-4">
        <label for="currentLimiterValue" class="col-12 col-md-6 textInSettings">
          <?= _CURRENTLIMITERVALUE ?>
        </label>
        <div class="col-12 col-md-6 ">
          <select id="currentLimiterValue" name="currentLimiterValue" class="form-select">
            <?php foreach ($currentLimiterValues as $t) { ?>
              <option value="<?= $t ?>" <?= $rowInstallationSettings["currentLimiterValue"] == $t ? 'selected' : '' ?>>
                <?= $t ?>
              </option>
            <?php } ?>
          </select>
        </div>
      </div>

      <div class="d-flex justify-content-center my-4">
        <button
          type="button"
          name="current_limiter_settings_button"
          id="current_limiter_settings_button"
          class="btn btn-primary px-4"
          onclick="checkCurrentLimiterSettingsForm()"
        >
          <?= _SAVE ?>
        </button>
        <input type="submit" id="button_current_limiter_settings" name="button_current_limiter_settings" hidden>
      </div>
    </div>
  </div>
  
</div>

<!-- Alert Mesajları -->
<div class="container mt-4" id="notSavedAlertMessageForCurrentLimiterSettingsTab" style="display:none">
  <p class="dialogText"><?= _NOTSAVEDALERT ?></p>
  <p class="dialogTextBold"><?= _SAVEQUESTION ?></p>
</div>

<div class="container text-center mt-4" id="chargingStatusAlertMessage" style="display:none">
  <p class="dialogText"><?= _CHARGINGSTATUSALERT ?></p>
</div>

<div id="currentLimiterValueErr"></div>