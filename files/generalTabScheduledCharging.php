<?php
    include_once "access_control.php";
?>
<div class="container my-5" id="generalTabScheduledChargingPage">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="row align-items-center mb-4">
                <label for="textRandomisedDelayMaximumDuration" class="col-12 col-md-6  textInSettings fs-5 mb-2 mb-md-0">
                    <?= _RANDOMISEDDELAYMAXIMUMDURATION ?>
                </label>
                <div class="col-12 col-md-6 d-flex align-items-center gap-2">
                    <input type="text" id="textRandomisedDelayMaximumDuration" name="textRandomisedDelayMaximumDuration" class="form-control" value="<?= htmlspecialchars($rowGeneral['randomisedDelayMaximumDuration']); ?>" />
                    <span class="error" id="randomisedDelayMaximumDurationError">*</span>
                </div>
                <div class="col-12 col-md-1 mt-2 mt-lg-0">
                    <span class="alertForLoadManagementGroup" id="randomisedDelayMaximumDurationErr"></span>
                </div>
            </div>

            <div class="row align-items-center mb-4" id ="scheduledChargingOcppEnablePart">
                <label for="offPeakChargingSelection" class="col-12 col-md-6  textInSettings fs-5 mb-2 mb-md-0">
                    <?= _OFFPEAKCHARGING ?>
                </label>
                <div class="col-12 col-md-6">
                    <select id="offPeakChargingSelection" name="offPeakChargingSelection" class="form-select" onchange="offPeakChargingEnability()">
                        <option id="offPeakChargingDisable" value="0" <?= $rowGeneral["ecoCharge"] == 0 ? ' selected="selected"' : '' ?>><?= _DISABLED ?></option>
                        <option id="offPeakChargingEnable" value="1" <?= $rowGeneral["ecoCharge"] == 1 ? ' selected="selected"' : '' ?>><?= _ENABLED ?></option>
                    </select>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <label for="offPeakChargingWeekendSelection" class="col-12 col-md-6 textInSettings fs-5 mb-2 mb-md-0">
                    <?= _OFFPEAKCHARGINGWEEKENDS ?>
                </label>
                <div class="col-12 col-md-6">
                    <select id="offPeakChargingWeekendSelection" name="offPeakChargingWeekendSelection" class="form-select" >
                        <option id="offPeakChargingWeekendDisable" value="0" <?= $rowGeneral["ecoChargeWeekends"] == 0 ? ' selected="selected"' : '' ?>><?= _DISABLED ?></option>
                        <option id="offPeakChargingWeekendEnable" value="1" <?= $rowGeneral["ecoChargeWeekends"] == 1 ? ' selected="selected"' : '' ?>><?= _ENABLED ?></option>
                    </select>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <label for="offPeakChargingSecondTimeInterval" class="col-12 col-md-6 textInSettings fs-5 mb-2 mb-md-0">
                    <?= _OFFPEAKCHARGINGSECONDTIMEPERIOD ?>
                </label>
                <div class="col-12 col-md-6">
                    <select id="offPeakChargingSecondTimeInterval" name="offPeakChargingSecondTimeInterval" class="form-select" onchange="secondTimeEnability()">
                        <option id="offPeakChargingWeekendDisable" value="0"><?= _DISABLED ?></option>
                        <option id="offPeakChargingWeekendEnable" value="1"><?= _ENABLED ?></option>
                    </select>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <label class="col-12 col-md-6 textInSettings fs-5 mb-2 mb-md-0">
                    <?= _OFFPEAKCHARGINGPERIODS ?>
                </label>
                <div class="col-6 col-md-3 mb-2 mb-md-0">
                    <input type="time" id="textOffPeakChargingPeriodsStart" name="textOffPeakChargingPeriodsStart" class="form-control" value="<?= htmlspecialchars($rowGeneral['ecoChargeInterval']); ?>" />
                </div>
                <div class="col-6 col-md-3 mb-2 mb-md-0">
                    <input type="time" id="textOffPeakChargingPeriodsEnd" name="textOffPeakChargingPeriodsEnd" class="form-control" value="<?= htmlspecialchars($rowGeneral['ecoChargeInterval2']); ?>" />
                </div>
                <div class="col-12">
                    <span class="error" id="offPeakChargingPeriodsError">
                        *
                    </span>
                    <div>
                        <span class="alertForLoadManagementGroup" id="offPeakChargingPeriodsErr">

                        </span>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <label class="col-12 col-md-6 textInSettings fs-5 mb-2 mb-md-0">
                </label>
                <div class="col-6 col-md-3 mb-2 mb-md-0">
                    <input type="time" id="textOffPeakChargingPeriodsOptionalStart" name="textOffPeakChargingPeriodsOptionalStart" class="form-control" value="<?= htmlspecialchars($rowGeneral['ecoChargeInterval3']); ?>" />
                </div>
                <div class="col-6 col-md-3 mb-2 mb-md-0">
                    <input type="time"id="textOffPeakChargingPeriodsOptionalEnd" name="textOffPeakChargingPeriodsOptionalEnd" class="form-control" value="<?= htmlspecialchars($rowGeneral['ecoChargeInterval4']); ?>" />
                </div>
                <div class="col-12">
                    <span class="error d-none" id="offPeakChargingPeriodsOptionalError">*</span>
                    <div>
                        <span class="alertForLoadManagementGroup" id="offPeakChargingPeriodsOptionalErr">
                            
                        </span>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <label for="randomisedDelayAtOffPeakEndSelection" class="col-12 col-md-6 textInSettings fs-5 mb-2 mb-md-0">
                    <?= _RANDOMISEDDELAYATOFFPEAKEND ?>
                </label>
                <div class="col-12 col-md-6" id="randomisedDelayAtOffPeakEndSelectionItem">
                    <select id="randomisedDelayAtOffPeakEndSelection" name="randomisedDelayAtOffPeakEndSelection" class="form-select" >
                        <option id="randomisedDelayAtOffPeakEndDisable" value="0" <?= $rowGeneral["randomisedDelayAtOffPeakEnd"] == 0 ? ' selected="selected"' : '' ?>><?= _DISABLED ?></option>
                        <option id="randomisedDelayAtOffPeakEndEnable" value="1" <?= $rowGeneral["randomisedDelayAtOffPeakEnd"] == 1 ? ' selected="selected"' : '' ?>><?= _ENABLED ?></option>
                    </select>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <label for="offPeakTimeZoneSelection" class="col-12 col-md-6 textInSettings fs-5 mb-2 mb-md-0">
                    <?= _TIMEZONE ?>
                </label>
                <div class="col-12 col-md-6" id="continueChargingEndOfSelectionItem">
                    <select id="offPeakTimeZoneSelection" name="offPeakTimeZoneSelection" class="form-select" >
                    <?php foreach ($timeZoneList as $t) { ?>
                        <option value="<?= htmlspecialchars($t) ?>" <?= $rowGeneral["timeZone"] == $t ? ' selected="selected"' : '' ?>>
                            <?php echo $t ?>
                        </option>
                    <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <label for="continueChargingEndOfSelection" class="col-12 col-md-6 textInSettings fs-5 mb-2 mb-md-0">
                    <?= _CONTINUECHARGINGENDPEAKINTERVAL ?>
                </label>
                <div class="col-12 col-md-6" id="continueChargingEndOfSelectionItem">
                    <select id="continueChargingEndOfSelection" name="continueChargingEndOfSelection" class="form-select" >
                        <option value="0" <?= $rowGeneral["continueChargingEndPeakInterval"] == 0 ? ' selected="selected"' : '' ?>><?= _DISABLED ?></option>
                        <option value="1" <?= $rowGeneral["continueChargingEndPeakInterval"] == 1 ? ' selected="selected"' : '' ?>><?= _ENABLED ?></option>
                    </select>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <label for="continueChargingWithoutReAuthenticationSelection" class="col-12 col-md-6 textInSettings fs-5 mb-2 mb-md-0">
                    <?= _CONTINUECHARGINGWITHOUTREAUTHAFTERPOWERLOSS ?>
                </label>
                <div class="col-12 col-md-6" id="continueChargingWithoutReAuthenticationSelectionItem">
                    <select id="continueChargingWithoutReAuthenticationSelection" name="continueChargingWithoutReAuthenticationSelection" class="form-select" >
                        <option value="0" <?= $rowGeneral["continueChargingWithoutReauthAfterPowerLoss"] == 0 ? ' selected="selected"' : '' ?>><?= _DISABLED ?></option>
                        <option value="1" <?= $rowGeneral["continueChargingWithoutReauthAfterPowerLoss"] == 1 ? ' selected="selected"' : '' ?>><?= _ENABLED ?></option>
                    </select>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center my-4">
            <button type="button" id="scheduled_charging_button" name="scheduled_charging_button" class="btn btn-primary px-4" onclick="checkScheduledCharging()" >
                <?= _SAVE ?>
            </button>
            <input type="submit" id="button_scheduled_charging" name="button_scheduled_charging" hidden>
        </div>
    </div>
</div>

