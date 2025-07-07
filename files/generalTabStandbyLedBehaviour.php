<?php
    include_once "access_control.php";
?>
<div class="container my-5" id="generalSettingsPage">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="row mb-4 align-items-center">
        <div class="col-12 col-sm-6">
          <span class="textInSettings"><?= _STANDBYLEDBEHAVIOUR ?></span>
        </div>
        <div class="col-12 col-sm-6">
          <select id="standByLedBehaviourSelection" name="standByLedBehaviourSelection" class="form-select w-100">
            <option id="standByLedOff" value="0" <?= $rowGeneral["standbyLedBehaviour"] == 0 ? ' selected="selected"' : ''; ?>><?= _OFF ?></option>
            <option id="standByLedOn" value="1" <?= $rowGeneral["standbyLedBehaviour"] == 1 ? ' selected="selected"' : ''; ?>><?= _ON ?></option>
          </select>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-auto">
          <button type="button" name="standby_led_behaviour_button" id="standby_led_behaviour_button" class="btn btn-primary px-4" onclick="checkStandByLedBehaviourForm()">
            <?= _SAVE ?>
          </button>
          <input type="submit" id="button_standby_led_behaviour" name="button_standby_led_behaviour" hidden>
        </div>
      </div>

    </div>
  </div>
</div>