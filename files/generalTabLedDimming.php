<?php
    include_once "access_control.php";
?>
<div class="container my-5" id="displayBacklight">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="row mb-3 align-items-center" id="ledDimmingLevelSelectionItem">
        <div class="col-12 col-sm-6">
          <span class="textInSettings"><?= _LEDDIMMINGLEVEL ?></span>
        </div>
        <div class="col-12 col-sm-6">
          <select id="ledDimmingLevelSelection" name="ledDimmingLevelSelection" class="form-select w-100" onchange="displayBacklightSettingsFunction()">
            <option id="ledDimmingVeryLow" value="veryLow" <?= $rowGeneral["ledDimmingLevel"] == "veryLow" ? ' selected="selected"' : ''; ?>><?= _VERYLOW ?></option>
            <option id="ledDimmingLow" value="low" <?= $rowGeneral["ledDimmingLevel"] == "low" ? ' selected="selected"' : ''; ?>><?= _LOW ?></option>
            <option id="ledDimmingMid" value="mid" <?= $rowGeneral["ledDimmingLevel"] == "mid" ? ' selected="selected"' : ''; ?>><?= _MID ?></option>
            <option id="ledDimmingHigh" value="high" <?= $rowGeneral["ledDimmingLevel"] == "high" ? ' selected="selected"' : ''; ?>><?= _HIGH ?></option>
            <option id="ledDimmingTimeBased" value="timeBased" <?= $rowGeneral["ledDimmingLevel"] == "timeBased" ? ' selected="selected"' : ''; ?>><?= _TIMEBASED ?></option>
          </select>
        </div>
      </div>
      <div class="row mb-3 align-items-center" id="ledDimmingSunriseTimeSelectionItem">
        <div class="col-12 col-sm-6">
          <span class="textInSettings"><?= _SUNRISETIME ?></span>
        </div>
        <div class="col-12 col-sm-6">
          <input type="time" class="form-control" id="ledDimmingSunriseTimeSelection" name="ledDimmingSunriseTimeSelection" value="<?= trim($rowGeneral["ledDimmingSunrise"]) ?>">
        </div>
      </div>

      <div class="row mb-4 align-items-center" id="ledDimmingSunsetTimeSelectionItem">
        <div class="col-12 col-sm-6">
          <span class="textInSettings"><?= _SUNSETTIME ?></span>
        </div>
        <div class="col-12 col-sm-6">
          <input type="time" class="form-control" id="ledDimmingSunsetTimeSelection" name="ledDimmingSunsetTimeSelection" value="<?= trim($rowGeneral["ledDimmingSunset"]) ?>">
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-auto">
          <button type="button" name="led_dimming_button" id="led_dimming_button" class="btn btn-primary px-4" onclick="checkLedDimmingForm()">
            <?= _SAVE ?>
          </button>
          <input type="submit" id="button_led_dimming" name="button_led_dimming" hidden>
        </div>
      </div>
    </div>
  </div>
</div>
