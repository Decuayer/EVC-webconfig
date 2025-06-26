<?php
    include_once "access_control.php";
?>
<div style="left:28%; position:absolute; width: 37.5vw;" id="unbalancedLoadDetectionPage">
  <span style="float:left; padding-top:15px;" class="textInSettings"><?= _UNBALANCEDLOADDETECTION ?></span>
  <div style="float:right; ">
    <div style="height:60px; " class="selectbox">
    <select id="unbalancedLoadDetectionSelection" name="unbalancedLoadDetectionSelection" style="width: 12vw;" onchange ="unbalancedLoadDetectionFunction()" <?= $meterType == 'EichrechtBauer' && $cableModel == 2 ? 'disabled' : '' ?>>
        <option id="unbalancedLoadDetectionDisable" value=0 <?= $rowInstallationSettings["unbalancedLoadDetection"] == 0 ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
        <option id="unbalancedLoadDetectionEnable" value=1 <?= $rowInstallationSettings["unbalancedLoadDetection"] == 1 || ($meterType == 'EichrechtBauer' && $cableModel == 2) ? 'selected="selected"' : ''; ?>><?= _ENABLED ?></option>
      </select>
    </div>
  </div>
  <br></br>
  <br></br>
  <div id="unbalancedLoadDetectionCurrentPart">
    <span style="float:left; padding-top:15px;" class="textInSettings"><?= _UNBALANCEDLOADDETECTIONMAXCURRENT ?></span>
    <div style="float:right; ">
        <div style="height:60px; " class="selectbox">
            <select id="unbalancedLoadDetectionMaxCurrentSelection" name="unbalancedLoadDetectionMaxCurrentSelection" style="width: 12vw;">
                <?php foreach ($unbalancedLoadDetectionMaxCurrentValues as $t) { ?>
                    <option value="<?php print $t ?>"<?php if($rowInstallationSettings["unbalancedLoadDetectionMaxCurrent"] == $t) echo 'selected="selected"'; ?>>
                        <?php echo $t ?>
                    </option>
                <?php } ?>
            </select>  
        </div>
    </div>
  </div>
</div>

<div style="display:flex;margin-top:34%;margin-left:35%;">
  <button type="button" name="unbalanced_load_detection_button" id="unbalanced_load_detection_button" class="interfacesButton" onclick="checkUnbalancedLoadDetectionForm()"> <?= _SAVE ?> </button>
  <input type="submit" id="button_unbalanced_load_detection" name="button_unbalanced_load_detection" hidden>
</div>