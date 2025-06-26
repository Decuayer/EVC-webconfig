<?php
    include_once "access_control.php";
?>
<div style="left:28%; position:absolute; width: 37.5vw;" id="displayBacklight">
  <span style="float:left; padding-top:15px;" class="textInSettings"><?= _BACKLIGHTLEVEL ?></span>
  <div style="float:right;margin-bottom:0.5%;" id="backLightLevelSelectionItem">
    <div style="height:60px; " class="selectbox">
    <select id="backLightLevelSelection" name="backLightLevelSelection" style="width: 12vw;" onchange="displayBacklightSettingsFunction()">
        <option id="backlightVeryLow" value="veryLow" style="display:<?php echo $qrEnability; ?>" <?= $rowGeneral["backlightDimmingLvl"] == "veryLow" ? ' selected="selected"' : ''; ?>><?= _VERYLOW ?></option> 
        <option id="backlightLow" value="low" <?= $rowGeneral["backlightDimmingLvl"] == "low" ? ' selected="selected"' : ''; ?>><?= _LOW ?></option> 
        <option id="backlightMid" value="mid" <?= $rowGeneral["backlightDimmingLvl"] == "mid" ? ' selected="selected"' : ''; ?>><?= _MID ?></option> 
        <option id="backlightHigh" value="high" <?= $rowGeneral["backlightDimmingLvl"] == "high" ? ' selected="selected"' : ''; ?>><?= _HIGH ?></option>
        <option id="backlightTimeBased" value="timeBased" <?= $rowGeneral["backlightDimmingLvl"] == "timeBased" ? ' selected="selected"' : ''; ?>><?= _TIMEBASED ?></option> 
        <option id="backlightUserInteraction" value="userInteraction" <?= $rowGeneral["backlightDimmingLvl"] == "userInteraction" ? ' selected="selected"' : ''; ?>><?= _USERINTERACTION ?></option> 
      </select>
    </div>
  </div>
  <br></br>
  <br></br>
  <div style="margin-top:2%;" id="sunriseTimeSelectionItem">
    <span style="float:left; padding-top:15px;" class="textInSettings"><?= _SUNRISETIME ?></span>
    <div style="float:right;margin-bottom:0.5%;">
      <input type="time" class="textarea1" id="sunriseTimeSelection" name="sunriseTimeSelection" style="width:12vw;" value="<?php echo trim($rowGeneral["backlightDimmingSunrise"])?>" ></td>
    </div>
  </div>
  <br></br>
  <br></br>
  <div style="margin-top:2%;" id="sunsetTimeSelectionItem">
    <span style="float:left; padding-top:15px;" class="textInSettings"><?= _SUNSETTIME ?></span>
    <div style="float:right;margin-bottom:0.5%;">
      <input type="time" class="textarea1" id="sunsetTimeSelection" name="sunsetTimeSelection" style="width:12vw;" value="<?php echo trim($rowGeneral["backlightDimmingSunset"])?>" ></td>
    </div>
  </div>
</div>

<div style="display:flex;margin-top:34%;margin-left:35%;">
  <button type="button" name="back_light_dimming_button" id="back_light_dimming_button" class="interfacesButton" onclick="checkBackLightDimmingForm()"> <?= _SAVE ?> </button>
  <input type="submit" id="button_back_light_dimming" name="button_back_light_dimming" hidden>
</div>

