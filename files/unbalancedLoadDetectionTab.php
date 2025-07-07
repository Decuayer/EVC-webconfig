<?php
    include_once "access_control.php";
?>
<div class="container my-5" id="unbalancedLoadDetectionPage">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="row align-items-center mb-4">
        <label for="unbalancedLoadDetectionSelection" class="col-12 col-md-6 textInSettings">
          <?= _UNBALANCEDLOADDETECTION ?>
        </label>
        <div class="col-12 col-md-6">
          <select
            id="unbalancedLoadDetectionSelection"
            name="unbalancedLoadDetectionSelection"
            class="form-select"
            onchange="unbalancedLoadDetectionFunction()"
            <?= $meterType == 'EichrechtBauer' && $cableModel == 2 ? 'disabled' : '' ?>
          >
            <option id="unbalancedLoadDetectionDisable" value="0" <?= $rowInstallationSettings["unbalancedLoadDetection"] == 0 ? 'selected' : '' ?>>
              <?= _DISABLED ?>
            </option>
            <option id="unbalancedLoadDetectionEnable" value="1" <?= $rowInstallationSettings["unbalancedLoadDetection"] == 1 || ($meterType == 'EichrechtBauer' && $cableModel == 2) ? 'selected' : '' ?>>
              <?= _ENABLED ?>
            </option>
          </select>
        </div>
      </div>

      <!-- Max Current -->
      <div class="row align-items-center mb-4" id="unbalancedLoadDetectionCurrentPart">
        <label for="unbalancedLoadDetectionMaxCurrentSelection" class="col-12 col-md-6 textInSettings">
          <?= _UNBALANCEDLOADDETECTIONMAXCURRENT ?>
        </label>
        <div class="col-12 col-md-6">
          <select
            id="unbalancedLoadDetectionMaxCurrentSelection"
            name="unbalancedLoadDetectionMaxCurrentSelection"
            class="form-select"
          >
            <?php foreach ($unbalancedLoadDetectionMaxCurrentValues as $t) { ?>
              <option value="<?= $t ?>" <?= $rowInstallationSettings["unbalancedLoadDetectionMaxCurrent"] == $t ? 'selected' : '' ?>>
                <?= $t ?>
              </option>
            <?php } ?>
          </select>
        </div>
      </div>

      <!-- Kaydet Butonu -->
      <div class="d-flex justify-content-center mt-4">
        <button
          type="button"
          name="unbalanced_load_detection_button"
          id="unbalanced_load_detection_button"
          class="btn btn-primary px-4"
          onclick="checkUnbalancedLoadDetectionForm()"
        >
          <?= _SAVE ?>
        </button>
        <input type="submit" id="button_unbalanced_load_detection" name="button_unbalanced_load_detection" hidden>
      </div>
    </div>
  </div>
  
</div>