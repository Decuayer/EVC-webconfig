<?php
    include_once "access_control.php";
?>
<div style="left:28%; position:absolute; width: 37.5vw;" id="generalSettingsPage">
    <span style="padding-top:15px;" class="textInSettings"><?= _STANDBYLEDBEHAVIOUR ?></span>
    <div style="float:right; ">
        <div style="height:60px; " class="selectbox">
            <select id="standByLedBehaviourSelection" name="standByLedBehaviourSelection">
                <option id="standByLedOff" value=0 <?= $rowGeneral["standbyLedBehaviour"] == 0 ? ' selected="selected"' : ''; ?>><?= _OFF ?></option>
                <option id="standByLedOn" value=1 <?= $rowGeneral["standbyLedBehaviour"] == 1 ? ' selected="selected"' : ''; ?>><?= _ON ?></option> 
            </select>
        </div>
    </div>
</div>

<div style="display:flex;margin-top:34%;margin-left:35%;">
    <button type="button" name="standby_led_behaviour_button" id="standby_led_behaviour_button" class="interfacesButton" onclick="checkStandByLedBehaviourForm()"> <?= _SAVE ?> </button>
    <input type="submit" id="button_standby_led_behaviour" name="button_standby_led_behaviour" hidden>
</div>