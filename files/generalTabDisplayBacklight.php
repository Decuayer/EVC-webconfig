<?php
    include_once "access_control.php";
?>
<div class="container my-5" id="displayBacklight">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">

      <div class="row mb-3 align-items-center">
        <div class="col-12 col-sm-6">
          <span class="textInSettings"><?= _BACKLIGHTLEVEL ?></span>
        </div>
        <div class="col-12 col-sm-6">
          <select id="backLightLevelSelection" name="backLightLevelSelection" class="form-select w-100" onchange="displayBacklightSettingsFunction()">
            <option id="backlightVeryLow" value="veryLow" style="display:<?= $qrEnability; ?>" <?= $rowGeneral["backlightDimmingLvl"] == "veryLow" ? ' selected="selected"' : ''; ?>><?= _VERYLOW ?></option>
            <option id="backlightLow" value="low" <?= $rowGeneral["backlightDimmingLvl"] == "low" ? ' selected="selected"' : ''; ?>><?= _LOW ?></option>
            <option id="backlightMid" value="mid" <?= $rowGeneral["backlightDimmingLvl"] == "mid" ? ' selected="selected"' : ''; ?>><?= _MID ?></option>
            <option id="backlightHigh" value="high" <?= $rowGeneral["backlightDimmingLvl"] == "high" ? ' selected="selected"' : ''; ?>><?= _HIGH ?></option>
            <option id="backlightTimeBased" value="timeBased" <?= $rowGeneral["backlightDimmingLvl"] == "timeBased" ? ' selected="selected"' : ''; ?>><?= _TIMEBASED ?></option>
            <option id="backlightUserInteraction" value="userInteraction" <?= $rowGeneral["backlightDimmingLvl"] == "userInteraction" ? ' selected="selected"' : ''; ?>><?= _USERINTERACTION ?></option>
          </select>
        </div>
      </div>

      <div class="row mb-3 align-items-center" id="sunriseTimeSelectionItem">
        <div class="col-12 col-sm-6">
          <span class="textInSettings"><?= _SUNRISETIME ?></span>
        </div>
        <div class="col-12 col-sm-6">
          <input type="time" class="form-control" id="sunriseTimeSelection" name="sunriseTimeSelection" value="<?= trim($rowGeneral["backlightDimmingSunrise"]) ?>">
        </div>
      </div>

      <div class="row mb-4 align-items-center" id="sunsetTimeSelectionItem">
        <div class="col-12 col-sm-6">
          <span class="textInSettings"><?= _SUNSETTIME ?></span>
        </div>
        <div class="col-12 col-sm-6">
          <input type="time" class="form-control" id="sunsetTimeSelection" name="sunsetTimeSelection" value="<?= trim($rowGeneral["backlightDimmingSunset"]) ?>">
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-auto">
          <button type="button" name="back_light_dimming_button" id="back_light_dimming_button" class="btn btn-primary px-4" onclick="checkBackLightDimmingForm()">
            <?= _SAVE ?>
          </button>
          <input type="submit" id="button_back_light_dimming" name="button_back_light_dimming" hidden>
        </div>
      </div>

    </div>
  </div>
</div>
