<?php
    include_once "access_control.php";
?>
<div style="left:28%; position:absolute; width: 60vw;" id="powerOptimizerPage">
<div id="followTheSunSelectionPart"> 
<span style="float:left; padding-top:15px;width:25.5vw;" class="textInSettings"><?= _FOLLOWTHESUN ?></span>
  <div style="float:left;" id="followTheSunSelectionItem">
    <div style="height:60px; " class="selectbox">
      <select id="followTheSunSelection" name="followTheSunSelection" style="width: 12vw;" onchange ="operationModeFunction()">
        <option id="followTheSunDisable" value=0 <?= $rowInstallationSettings["followTheSun"] == 0 ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
        <option id="followTheSunEnable" value=1 <?= $rowInstallationSettings["followTheSun"] == 1 ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option> 
      </select>
    </div>
  </div>
  <br></br>
  <br></br>
  </div>
  <div id="followTheSunModePart">
  <span style="float:left; padding-top:15px;width:25.5vw;" class="textInSettings"><?= _FOLLOWTHESUNMODE ?></span>
  <div style="float:left;" id="followTheSunModeSelectionItem">
      <div style="height:60px; " class="selectbox">
          <select id="followTheSunModeSelection" name="followTheSunModeSelection" style="width: 12vw;" onchange ="operationModeFunction()">
            <option id="sunOnly" value=1 <?= $rowInstallationSettings["followTheSunMode"] == 1 ? ' selected="selected"' : ''; ?>><?= _SUNONLY ?></option>
            <option id="sunHybrid" value=2 <?= $rowInstallationSettings["followTheSunMode"] == 2 ? ' selected="selected"' : ''; ?>><?= _SUNHYBRID ?></option>
            <option id="maxHybrid" value=3 <?= $rowInstallationSettings["followTheSunMode"] == 3 ? ' selected="selected"' : ''; ?>><?= _MAXHYBRID ?></option>
          </select>  
      </div>
  </div>
  <br></br>
  <br></br>
  </div>
  <div id="autoPhaseSwitchingPart">
  <span style="float:left; padding-top:15px;width:25.5vw;" class="textInSettings"><?= _AUTOPHASESWITCHING ?></span>
  <div style="float:left;" id="autoPhaseSwitchingSelectionItem">
      <div style="height:60px; " class="selectbox">
          <select id="autoPhaseSwitchingSelection" name="autoPhaseSwitchingSelection" style="width: 12vw;" onchange ="operationModeFunction()">
            <option id="autoPhaseSwitchingDisable" value=0 <?= $rowInstallationSettings["autoPhaseSwitching"] == 0 ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
            <option id="autoPhaseSwitchingEnable" value=1 <?= $rowInstallationSettings["autoPhaseSwitching"] == 1 ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option> 
          </select>  
      </div>
  </div>
  <br></br>
  <br></br>
  </div>
<span style="float:left; padding-top:15px;width:25.5vw;" class="textInSettings"><?= _OPERATIONMODE ?></span>
  <div style="float:left;" id="operationModeSelectionItem" >
    <div style="height:60px; " class="selectbox">
      <select id="operationModeSelection" name="operationModeSelection" style="width: 12vw;" onchange ="operationModeFunction()">
        <?php foreach ($operationModeOptions as $value): ?>
              <option id="<?= $value['id'] ?>" value="<?= $value['value'] ?>" <?= $rowInstallationSettings["operationMode"] == $value['value'] ? 'selected="selected"' : '' ?>>
                  <?= htmlspecialchars($value['text']) ?>
              </option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  <br></br>
  <br></br>
  <div id="powerOptimizerPart"> 
      <span style="float:left; padding-top:15px;width:25.5vw;" class="textInSettings"><?= _POWEROPTIMIZER ?></span>
      <div style="float:left; ">
        <div style="height:60px; " class="selectbox">
          <select id="powerOptimizerSelection" name="powerOptimizerSelection" style="width: 12vw;" onchange ="operationModeFunction()">
            <option id="powerOptimizerDisable" value=0 <?= $rowInstallationSettings["powerOptimizer"] == 0 ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
            <option id="powerOptimizerEnable" value=1 <?= $rowInstallationSettings["powerOptimizer"] == 1 ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option> 
          </select>
        </div>
      </div>
      <br></br>
      <br></br>
    </div>
    <div id="powerOptimizerTotalCurrentPart"> 
      <span style="float:left; padding-top:15px;width:25.5vw;" class="textInSettings"><?= _POWEROPTIMIZERTOTALCURRENTLIMIT ?><?= _A ?> </span>
      <div style="float:left; ">
        <div style="height:60px; " class="selectbox">
          <select id="powerOptimizerTotalCurrentSelection" name="powerOptimizerTotalCurrentSelection" style="width: 12vw;" >
            <?php foreach ($powerOptimizerTotalCurrentValues as $t) { ?>
              <option id="<?php print $t ?>" value="<?php print $t ?>"<?php if($rowInstallationSettings["powerOptimizerTotalCurrent"] == $t) echo 'selected="selected"'; ?>>
            <?php echo $t ?>
            </option>
          <?php } ?>
          </select>
        </div>
      </div>
      <br></br>
      <br></br>
    </div>
  <div id = "powerOptimizerExternalMeterPart">
      <span style="float:left; padding-top:15px;width:25.5vw;" class="textInSettings"><?= _POWEROPTIMIZEREXTERNALMETER ?></span>
      <div style="float:left; ">
        <div style="height:60px; " class="selectbox">
          <select id="powerOptimizerExternalMeterSelection" name="powerOptimizerExternalMeterSelection" style="width: 12vw;" onchange="powerOptimizerExternalMeterFunction()">
              <?php foreach ($powerOptimizerExternalMeterOptions as $value): ?>
                  <option value="<?= $value['id'] ?>" <?= $rowInstallationSettings["powerOptimizerExternalMeter"] == $value['id'] ? 'selected="selected"' : '' ?>>
                      <?= htmlspecialchars($value['text']) ?>
                  </option>
              <?php endforeach; ?>
          </select>
        </div>

        <div id="powerOptimizerExternalMeterPartForAutoSelected" style="height:60px;position:relative;float:right;">
            <input type="text" class="textareaForLocalLoadGroup" style="width:12vw;font-size:12px;" id="textPowerOptimizerExternalMeterPartForAutoSelected" name="textPowerOptimizerExternalMeterPartForAutoSelected" disabled value="<?php 
                if($rowInstallationSettings["autoSelectedMeteringDevice"] == 0){
                   echo _NOTSELECTED ; 
                }else if($rowInstallationSettings["autoSelectedMeteringDevice"] == 1){
                  echo 'Klefr 6924/6934';
                }else if($rowInstallationSettings["autoSelectedMeteringDevice"] == 2){
                  echo 'Garo GNM3T/GNM3D';
                }else if($rowInstallationSettings["autoSelectedMeteringDevice"] == 3){
                  echo 'Embedded Power Optimizer with CT';
                }else if($rowInstallationSettings["autoSelectedMeteringDevice"] == 4){
                  echo 'P1 Slimmemeter';
                }else{
                  echo 'Carlo Gavazzi EM530';
                }
                
               ?>"></td>
        </div>
      </div>
    </div> 
</div>
<div style="display:flex;margin-top:34%;margin-left:35%;">
  <button type="button" name="power_optimizer_button" id="power_optimizer_button" class="interfacesButton" onclick="checkPowerOptimizerForm()"> <?= _SAVE ?> </button>
  <input type="submit" id="button_power_optimizer" name="button_power_optimizer" hidden>
</div>
<div id="offPeakChargingAlertMessage" style="display:none">
    <p class="dialogText" id="offPeakChargingAlert" style="text-align:center;"><?= _OFFPEAKDISABLEDCONFIRM ?></p>
</div>

<div id="alertMessageForPowerOptimizerExternalEnableAlert" style="display:none">
    <p class="dialogText"><?= _MODBUSALERT ?></p>
</div>

<div id="alertMessageForDlmEnable" style="display:none">
    <p class="dialogText"><?= _DLMALERT ?></p>
</div>

<div id="alertMessageForDlmAndFollowTheSunEnable" style="display:none">
    <p class="dialogText"><?= _DLMALERTFOLLOWTHESUN ?></p>
</div>
