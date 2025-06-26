<?php
    include_once "access_control.php";
?>
<div style="left:28%; position:absolute; width: 37.5vw;" id="displayBacklight">
    <span style="float:left; padding-top:15px;" class="textInSettings"><?= _LEDDIMMINGLEVEL ?></span>
    <div style="float:right;margin-bottom:0.5%;" id="ledDimmingLevelSelectionItem">
    <div style="height:60px; " class="selectbox">
    <select id="ledDimmingLevelSelection" name="ledDimmingLevelSelection" style="width: 12vw;" onchange="displayBacklightSettingsFunction()">
        <option id="ledDimmingVeryLow" value="veryLow" <?= $rowGeneral["ledDimmingLevel"] == "veryLow" ? ' selected="selected"' : ''; ?>><?= _VERYLOW ?></option>
        <option id="ledDimmingLow" value="low" <?= $rowGeneral["ledDimmingLevel"] == "low" ? ' selected="selected"' : ''; ?>><?= _LOW ?></option> 
        <option id="ledDimmingMid" value="mid" <?= $rowGeneral["ledDimmingLevel"] == "mid" ? ' selected="selected"' : ''; ?>><?= _MID ?></option> 
        <option id="ledDimmingHigh" value="high" <?= $rowGeneral["ledDimmingLevel"] == "high" ? ' selected="selected"' : ''; ?>><?= _HIGH ?></option>
        <option id="ledDimmingTimeBased" value="timeBased" <?= $rowGeneral["ledDimmingLevel"] == "timeBased" ? ' selected="selected"' : ''; ?>><?= _TIMEBASED ?></option>
    </select>
    </div>
    </div>
    <br></br>
    <br></br>
    <div style="margin-top:2%;" id="ledDimmingSunriseTimeSelectionItem">
        <span style="float:left; padding-top:15px;" class="textInSettings"><?= _SUNRISETIME ?></span>
        <div style="float:right;margin-bottom:0.5%;">
            <input type="time" class="textarea1" id="ledDimmingSunriseTimeSelection" name="ledDimmingSunriseTimeSelection" style="width:12vw;" value="<?php echo trim($rowGeneral["ledDimmingSunrise"])?>" ></td>
        </div>
    </div>
    <br></br>
    <br></br>
    <div style="margin-top:2%;" id="ledDimmingSunsetTimeSelectionItem">
        <span style="float:left; padding-top:15px;" class="textInSettings"><?= _SUNSETTIME ?></span>
        <div style="float:right;margin-bottom:0.5%;">
            <input type="time" class="textarea1" id="ledDimmingSunsetTimeSelection" name="ledDimmingSunsetTimeSelection" style="width:12vw;" value="<?php echo trim($rowGeneral["ledDimmingSunset"])?>" ></td>
        </div>
    </div>
</div>

<div style="display:flex;margin-top:34%;margin-left:35%;">
    <button type="button" name="led_dimming_button" id="led_dimming_button" class="interfacesButton" onclick="checkLedDimmingForm()"> <?= _SAVE ?> </button>
    <input type="submit" id="button_led_dimming" name="button_led_dimming" hidden>
</div>

