<?php
    include_once "access_control.php";
?>
<div class="container my-4" id="powerOptimizerPage">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8" id="followTheSunSelectionPart">
      <div class="row mb-4 align-items-center">
        <label class="col-12 col-md-6 textInSettings"><?= _FOLLOWTHESUN ?></label>
        <div class="col-12 col-md-6" id="followTheSunSelectionItem">
          <select class="form-select" id="followTheSunSelection" name="followTheSunSelection" onchange="operationModeFunction()">
            <option value="0" <?= $rowInstallationSettings["followTheSun"] == 0 ? 'selected' : '' ?>><?= _DISABLED ?></option>
            <option value="1" <?= $rowInstallationSettings["followTheSun"] == 1 ? 'selected' : '' ?>><?= _ENABLED ?></option>
          </select>
        </div>
      </div>

      <div class="row mb-4 align-items-center" id="followTheSunModePart">
        <label class="col-12 col-md-6 textInSettings"><?= _FOLLOWTHESUNMODE ?></label>
        <div class="col-12 col-md-6" id="followTheSunModeSelectionItem">
          <select class="form-select" id="followTheSunModeSelection" name="followTheSunModeSelection" onchange="operationModeFunction()">
            <option value="1" <?= $rowInstallationSettings["followTheSunMode"] == 1 ? 'selected' : '' ?>><?= _SUNONLY ?></option>
            <option value="2" <?= $rowInstallationSettings["followTheSunMode"] == 2 ? 'selected' : '' ?>><?= _SUNHYBRID ?></option>
            <option value="3" <?= $rowInstallationSettings["followTheSunMode"] == 3 ? 'selected' : '' ?>><?= _MAXHYBRID ?></option>
          </select>
        </div>
      </div>

      <div class="row mb-4 align-items-center" id="autoPhaseSwitchingPart">
        <label class="col-12 col-md-6 textInSettings"><?= _AUTOPHASESWITCHING ?></label>
        <div class="col-12 col-md-6" id="autoPhaseSwitchingSelectionItem">
          <select class="form-select" id="autoPhaseSwitchingSelection" name="autoPhaseSwitchingSelection" onchange="operationModeFunction()">
            <option value="0" <?= $rowInstallationSettings["autoPhaseSwitching"] == 0 ? 'selected' : '' ?>><?= _DISABLED ?></option>
            <option value="1" <?= $rowInstallationSettings["autoPhaseSwitching"] == 1 ? 'selected' : '' ?>><?= _ENABLED ?></option>
          </select>
        </div>
      </div>

      <div class="row mb-4 align-items-center">
        <label class="col-12 col-md-6 textInSettings"><?= _OPERATIONMODE ?></label>
        <div class="col-12 col-md-6" id="operationModeSelectionItem">
          <select class="form-select" id="operationModeSelection" name="operationModeSelection" onchange="operationModeFunction()">
            <?php foreach ($operationModeOptions as $value): ?>
              <option value="<?= $value['value'] ?>" <?= $rowInstallationSettings["operationMode"] == $value['value'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($value['text']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="row mb-4 align-items-center" id="powerOptimizerPart">
        <label class="col-12 col-md-6 textInSettings"><?= _POWEROPTIMIZER ?></label>
        <div class="col-12 col-md-6">
          <select class="form-select" id="powerOptimizerSelection" name="powerOptimizerSelection" onchange="operationModeFunction()">
            <option value="0" <?= $rowInstallationSettings["powerOptimizer"] == 0 ? 'selected' : '' ?>><?= _DISABLED ?></option>
            <option value="1" <?= $rowInstallationSettings["powerOptimizer"] == 1 ? 'selected' : '' ?>><?= _ENABLED ?></option>
          </select>
        </div>
      </div>

      <div class="row mb-4 align-items-center" id="powerOptimizerTotalCurrentPart">
        <label class="col-12 col-md-6 textInSettings"><?= _POWEROPTIMIZERTOTALCURRENTLIMIT ?><?= _A ?></label>
        <div class="col-12 col-md-6">
          <select class="form-select" id="powerOptimizerTotalCurrentSelection" name="powerOptimizerTotalCurrentSelection">
            <?php foreach ($powerOptimizerTotalCurrentValues as $t): ?>
              <option value="<?= $t ?>" <?= $rowInstallationSettings["powerOptimizerTotalCurrent"] == $t ? 'selected' : '' ?>><?= $t ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="row mb-4 align-items-center" id="powerOptimizerExternalMeterPart">
        <label class="col-12 col-md-6 textInSettings"><?= _POWEROPTIMIZEREXTERNALMETER ?></label>
        <div class="col-12 col-md-6">
          <select class="form-select mb-2" id="powerOptimizerExternalMeterSelection" name="powerOptimizerExternalMeterSelection" onchange="powerOptimizerExternalMeterFunction()">
            <?php foreach ($powerOptimizerExternalMeterOptions as $value): ?>
              <option value="<?= $value['id'] ?>" <?= $rowInstallationSettings["powerOptimizerExternalMeter"] == $value['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($value['text']) ?>
              </option>
            <?php endforeach; ?>
          </select>
          <input type="text" class="form-control" id="textPowerOptimizerExternalMeterPartForAutoSelected" name="textPowerOptimizerExternalMeterPartForAutoSelected" disabled
            value="<?php
              if ($rowInstallationSettings["autoSelectedMeteringDevice"] == 0) echo _NOTSELECTED;
              elseif ($rowInstallationSettings["autoSelectedMeteringDevice"] == 1) echo 'Klefr 6924/6934';
              elseif ($rowInstallationSettings["autoSelectedMeteringDevice"] == 2) echo 'Garo GNM3T/GNM3D';
              elseif ($rowInstallationSettings["autoSelectedMeteringDevice"] == 3) echo 'Embedded Power Optimizer with CT';
              elseif ($rowInstallationSettings["autoSelectedMeteringDevice"] == 4) echo 'P1 Slimmemeter';
              else echo 'Carlo Gavazzi EM530';
            ?>">
        </div>
      </div>

      <!-- Save Button -->
      <div class="d-flex justify-content-center my-4">
        <button type="button" name="power_optimizer_button" id="power_optimizer_button" class="btn btn-primary px-4" onclick="checkPowerOptimizerForm()"><?= _SAVE ?></button>
        <input type="submit" id="button_power_optimizer" name="button_power_optimizer" hidden>
      </div>
    </div>
  </div>
</div>

<!-- Alert Dialogs -->
<div id="offPeakChargingAlertMessage" style="display:none">
  <p class="dialogText text-center" id="offPeakChargingAlert"><?= _OFFPEAKDISABLEDCONFIRM ?></p>
</div>

<div id="alertMessageForPowerOptimizerExternalEnableAlert" style="display:none">
  <p class="dialogText"><?= _MODBUSALERT ?></p>
</div>

<div id="alertMessageForDlmEnable" style="display:none">
  <p class="dialogText"><?= _DLMALERT ?></p>
</div>

<div id="alertMessageForDlmAndFollowTheSunEnable" style="display:none">
  <p class="dialogText"><?= _DLMALERTFOLLOWTHESUN ?></p>
</div>
