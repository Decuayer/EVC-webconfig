<?php
    include_once "access_control.php";
?>
<div style="left:28.25%;width:40vw;position:absolute; z-index: 1;" id="generalTabScheduledChargingPage">
    <div id="randomisedDelayMaximumDuration">
        <span style="float:left; padding-top:15px;font-size:18px;" class="textInSettings" style="width:12vw;"><?= _RANDOMISEDDELAYMAXIMUMDURATION ?></span>
        <div style="float:right;">
            <div id="scheduledChargingDiv1" style="height:60px;position:relative;float:left;">
                <input type="text" class="textareaForLocalLoadGroup" style="width:12vw;" id="textRandomisedDelayMaximumDuration" name="textRandomisedDelayMaximumDuration" value=<?php echo htmlspecialchars($rowGeneral['randomisedDelayMaximumDuration']); ?>></td>
            </div>
            <span class="error" style="padding-top:16px; height:15px; display: inline-block;" id="randomisedDelayMaximumDurationError">*</span>
            <br></br>
            <div style="float:right;margin-right:15%;width:12vw;"><span class="alertForLoadManagementGroup" id="randomisedDelayMaximumDurationErr"></span></div>
        </div>
    </div>
    <br></br>
    <br></br>
    <!-- -->
    <div id ="scheduledChargingOcppEnablePart">
        <div id="scheduledChargingDiv2" style="margin-top:3%;">
            <span style="float:left; padding-top:15px;font-size:18px;" class="textInSettings"><?= _OFFPEAKCHARGING ?></span>
            <div style="float:right;margin-bottom:0.5%;margin-right:4%" id="offPeakChargingSelectionItem" onchange ="offPeakChargingEnability()">
                <div style="height:60px; " class="selectbox">
                    <select id="offPeakChargingSelection" name="offPeakChargingSelection" style="width: 12vw;">
                        <option id="offPeakChargingDisable" value=0  <?= $rowGeneral["ecoCharge"] == 0 ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
                        <option id="offPeakChargingEnable" value=1 <?= $rowGeneral["ecoCharge"] == 1 ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
                    </select>
                </div>
            </div>
        </div>
        <br></br>
        <br></br>
        <!-- -->
        <div id="scheduledChargingDiv3" style="margin-top:1.5%;">
            <span style="float:left; padding-top:15px;font-size:18px;" class="textInSettings"><?= _OFFPEAKCHARGINGWEEKENDS ?></span>
            <div style="float:right;margin-bottom:0.5%;margin-right:4%" id="offPeakChargingWeekendSelectionItem">
                <div style="height:60px; " class="selectbox">
                    <select id="offPeakChargingWeekendSelection" name="offPeakChargingWeekendSelection" style="width: 12vw;">
                        <option id="offPeakChargingWeekendDisable" value=0  <?= $rowGeneral["ecoChargeWeekends"] == 0 ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
                        <option id="offPeakChargingWeekendEnable" value=1 <?= $rowGeneral["ecoChargeWeekends"] == 1 ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
                    </select>
                </div>
            </div>
        </div>
        <!-- -->
        <br></br>
        <br></br>
        <div id="scheduledChargingDiv4" style="margin-top:1.5%;">
            <span style="float:left; padding-top:15px;font-size:18px;" class="textInSettings"><?= _OFFPEAKCHARGINGSECONDTIMEPERIOD ?></span>
            <div style="float:right;margin-bottom:0.5%;margin-right:4%" id="offPeakChargingSecondTimeIntervalSelectionItem" onchange ="secondTimeEnability()">
                <div style="height:60px; " class="selectbox">
                    <select id="offPeakChargingSecondTimeInterval" name="offPeakChargingSecondTimeInterval" style="width: 12vw;">
                        <option id="offPeakChargingWeekendDisable" value=0  ><?= _DISABLED ?></option>
                        <option id="offPeakChargingWeekendEnable" value=1 ><?= _ENABLED ?></option>
                    </select>
                </div>
            </div>
        </div>
        <br></br>
        <br></br>
        <div id="scheduledChargingDiv5" style="margin-top:1.5%;">
            <span style="float:left; padding-top:15px;font-size:18px;" class="textInSettings" style="width:12vw;"><?= _OFFPEAKCHARGINGPERIODS ?></span>
            <div style="float:right;">
                <div id="scheduledChargingDiv6" style="height:60px;position:relative;float:left;">
                    <input type="time" class="textareaForLocalLoadGroup" style="width:7vw;font-size:16px; padding:0px 0px 0px 0px;" id="textOffPeakChargingPeriodsStart" name="textOffPeakChargingPeriodsStart" value="<?php echo htmlspecialchars($rowGeneral['ecoChargeInterval']);?>" ></td>
                </div>
                <div id="scheduledChargingDiv7" style="height:60px;position:relative;float:left;">
                    <input type="time" class="textareaForLocalLoadGroup" style="width:7vw;font-size:16px; padding:0px 0px 0px 0px;" id="textOffPeakChargingPeriodsEnd" name="textOffPeakChargingPeriodsEnd" value="<?php echo htmlspecialchars($rowGeneral['ecoChargeInterval2']);?>" ></td>
                </div>
                <span class="error" style="padding-top:16px; height:15px; display: inline-block;" id="offPeakChargingPeriodsError">*</span>
                <br></br>
                <div style="float:right;margin-right:15%;width:12vw;"><span class="alertForLoadManagementGroup" id="offPeakChargingPeriodsErr"></span></div>
                </div>
        </div>

        <br></br>
        <br></br>
        <div id="scheduledChargingDiv8" style="margin-top:1.5%;">
            <span style="float:left; padding-top:15px;" class="textInSettings" style="width:12vw;"></span>
            <div id= "scheduledChargingDiv14" style="float:right;margin-right:4.5%;">
                <div id="scheduledChargingDiv9" style="height:60px;position:relative;float:left;">
                    <input type="time" class="textareaForLocalLoadGroup" style="width:7vw;font-size:16px; padding:0px 0px 0px 0px;" id="textOffPeakChargingPeriodsOptionalStart" name="textOffPeakChargingPeriodsOptionalStart" value="<?php echo htmlspecialchars($rowGeneral['ecoChargeInterval3']);?>" ></td>
                </div>
                <div id="scheduledChargingDiv10" style="height:60px;position:relative;float:left;">
                    <input type="time" class="textareaForLocalLoadGroup" style="width:7vw;font-size:16px; padding:0px 0px 0px 0px;" id="textOffPeakChargingPeriodsOptionalEnd" name="textOffPeakChargingPeriodsOptionalEnd" value="<?php echo htmlspecialchars($rowGeneral['ecoChargeInterval4']);?>" ></td>
                </div>
                <span class="error" style="padding-top:16px; height:15px; display: none;" id="offPeakChargingPeriodsOptionalError">*</span>
                <br></br>
                <div style="float:right;margin-right:15%;width:12vw;"><span class="alertForLoadManagementGroup" id="offPeakChargingPeriodsOptionalErr"></span></div>
            </div>
        </div>
        <br></br>
        <br></br>
        <!-- -->
        <div id="scheduledChargingDiv11" style="margin-top:1.5%;">
            <span style="float:left; padding-top:15px;font-size:18px;" class="textInSettings"><?= _RANDOMISEDDELAYATOFFPEAKEND ?></span>
            <div style="float:right;margin-bottom:0.5%;margin-right:4%" id="randomisedDelayAtOffPeakEndSelectionItem">
                <div style="height:60px; " class="selectbox">
                    <select id="randomisedDelayAtOffPeakEndSelection" name="randomisedDelayAtOffPeakEndSelection" style="width: 12vw;">
                        <option id="randomisedDelayAtOffPeakEndDisable" value=0  <?= $rowGeneral["randomisedDelayAtOffPeakEnd"] == 0 ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
                        <option id="randomisedDelayAtOffPeakEndEnable" value=1 <?= $rowGeneral["randomisedDelayAtOffPeakEnd"] == 1 ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
                    </select>
                </div>
            </div>
        </div>
        <br></br>
        <br></br>
        <!-- -->
        <div id="scheduledChargingDiv12" style="margin-top:1.5%;">
            <span style="float:left; padding-top:15px;font-size:18px;" class="textInSettings"><?= _TIMEZONE ?></span>
            <div style="float:right;margin-bottom:0.5%;margin-right:4%" id="continueChargingEndOfSelectionItem">
                <div style="height:60px; " class="selectbox">
                    <select id="offPeakTimeZoneSelection" name="offPeakTimeZoneSelection" style="width: 12vw;">
                    <?php foreach ($timeZoneList as $t) { ?>
                    <option id="<?php print $t ?>" value="<?php print $t ?>"<?php if($rowGeneral["timeZone"] == $t) echo 'selected="selected"'; ?>>
                    <?php echo $t ?>
                    </option>
                    <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <br></br>
        <br></br>
        <!-- -->
        <div id="scheduledChargingDiv13" style="margin-top:1.5%;">
            <span style="float:left; padding-top:15px;font-size:18px;" class="textInSettings"><?= _CONTINUECHARGINGENDPEAKINTERVAL ?></span>
            <div style="float:right;margin-bottom:0.5%;margin-right:4%" id="continueChargingEndOfSelectionItem">
                <div style="height:60px; " class="selectbox">
                    <select id="continueChargingEndOfSelection" name="continueChargingEndOfSelection" style="width: 12vw;">
                        <option id="continueChargingEndOfDisable" value=0  <?= $rowGeneral["continueChargingEndPeakInterval"] == 0 ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
                        <option id="continueChargingEndOfEnable" value=1 <?= $rowGeneral["continueChargingEndPeakInterval"] == 1 ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
                    </select>
                </div>
            </div>
        </div>
        <br></br>
        <br></br>
    </div>
        <!-- -->
    <div id="scheduledChargingDiv14" style="margin-top:1.5%;">
        <span style="float:left; padding-top:35px;font-size:18px;" class="textInSettings"><?= _CONTINUECHARGINGWITHOUTREAUTHAFTERPOWERLOSS ?></span>
        <div style="float:right;margin-bottom:0.5%;margin-right:4%" id="continueChargingWithoutReAuthenticationSelectionItem">
            <div style="height:60px; " class="selectbox">
                <select id="continueChargingWithoutReAuthenticationSelection" name="continueChargingWithoutReAuthenticationSelection" style="width: 12vw;">
                    <option id="continueChargingWithoutReAuthenticationDisable" value=0  <?= $rowGeneral["continueChargingWithoutReauthAfterPowerLoss"] == 0 ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
                    <option id="continueChargingWithoutReAuthenticationEnable" value=1 <?= $rowGeneral["continueChargingWithoutReauthAfterPowerLoss"] == 1 ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
                </select>
            </div>
        </div>
    </div>
</div>
<div style="display:flex;margin-top:34%;margin-left:35%;">
    <button type="button" name="scheduled_charging_button" id="scheduled_charging_button" class="interfacesButton" onclick="checkScheduledCharging()"> <?= _SAVE ?> </button>
    <input type="submit" id="button_scheduled_charging" name="button_scheduled_charging" hidden>
</div>
