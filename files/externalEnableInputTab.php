<?php
    include_once "access_control.php";
?>
<div style="left:28%; position:absolute; width: 37.5vw;" id="externalEnableInputPage">
  <span style="float:left; padding-top:15px;" class="textInSettings"><?= _EXTERNALENABLEINPUT ?></span>
  <div style="float:right; ">
    <div style="height:60px; " class="selectbox">
    <select id="externalEnableInputSelection" name="externalEnableInputSelection" style="width: 12vw;">
        <option id="externalEnableInputDisable" value=0 <?= $rowInstallationSettings["externalEnableInput"] == 0 ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
        <option id="externalEnableInputEnable" value=1 <?= $rowInstallationSettings["externalEnableInput"] == 1 ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option> 
      </select>
    </div>
  </div>
</div>

<div style="display:flex;margin-top:34%;margin-left:35%;">
  <button type="button" name="external_enable_input_button" id="external_enable_input_button" class="interfacesButton" onclick="checkExternalEnableInputForm()"> <?= _SAVE ?> </button>
  <input type="submit" id="button_external_enable_input" name="button_external_enable_input" hidden>
</div>