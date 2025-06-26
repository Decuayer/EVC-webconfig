<?php
    include_once "access_control.php";
?>
<div id="currentLimiterSettingsPage" style="left:27.9%; position:absolute; width: 40vw;  z-index: 1;">
  <div>
    <p class="star" style="display: inline;"><b>*</b> </p>
    <p class="explanation" id="OCPPConnectionPart" style="display: inline;"><?= _EXPLANATION ?></p>
    
  </div>
  <br></br>
  <div>
  <div style="margin-top:2%;"  id="currentLimiterPhaseSelectionItem">
        <span style="float:left; padding-top:15px;" class="textInSettings"><?= _CURRENTLIMITERPHASE ?></span>
        <div style="float:right;margin-right:5%;margin-bottom:0.5%;">
          <div style="height:60px;" class="selectbox">
          <select id="currentLimiterPhaseSelection" name="currentLimiterPhaseSelection" style="width: 12vw;"  data-original-value="<?= $rowInstallationSettings["currentLimiterPhase"] ?>"  data-charging-status="<?= $chargePointStatus ?>"  <?= $ulType == "UL50" || $ulType == "UL32" || $phaseTypeProduction == "0" ?  'disabled' : ''?>>
              <option id="currentLimiterOnePhase" value=0 <?= $rowInstallationSettings["currentLimiterPhase"] == 0 ? ' selected="selected"' : ''; ?>><?= _ONEPHASE ?></option>
              <option id="currentLimiterThreePhase" value=1 <?= $rowInstallationSettings["currentLimiterPhase"] == 1 ? ' selected="selected"' : ''; ?>><?= _THREEPHASE ?></option> 
          </select>
          </div>
        </div>
    </div>
    <br></br>
    <br></br>
    <div style="margin-top:2%;" id="currentLimiterValueItem">
      <span style="float:left; padding-top:15px;" class="textInSettings"><?= _CURRENTLIMITERVALUE ?></span>
      <div style="float:right;margin-right:5%;">
        <div style="height:60px; " class="selectbox">
            <select id="currentLimiterValue" name="currentLimiterValue" style="width: 12vw;">
                <?php foreach ($currentLimiterValues as $t) { ?>
                    <option value="<?php print $t ?>"<?php if($rowInstallationSettings["currentLimiterValue"] == $t) echo 'selected="selected"'; ?>>
                        <?php echo $t ?>
                    </option>
                <?php } ?>
            </select>
          </div>
      </div>
    </div>
    <br></br>
    <br></br>
  </div>
</div>
<div id="notSavedAlertMessageForCurrentLimiterSettingsTab" style="display:none">
  <p class="dialogText"><?= _NOTSAVEDALERT ?></p>
  <p class="dialogTextBold"><?= _SAVEQUESTION ?></p>
</div>
<div style="display:flex;margin-top:34%;margin-left:35%;">
  <button type="button" name="current_limiter_settings_button" id="current_limiter_settings_button" class="interfacesButton" onclick="checkCurrentLimiterSettingsForm()"> <?= _SAVE ?> </button>
  <input type="submit" id="button_current_limiter_settings" name="button_current_limiter_settings" hidden>
</div>
<div id="chargingStatusAlertMessage" style="display:none">                                                                                                                                                  
    <p class="dialogText"><?= _CHARGINGSTATUSALERT ?></p>                                                                                                                                                   
</div>    
<div id="currentLimiterValueErr"></div>
