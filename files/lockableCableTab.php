<?php
    include_once "access_control.php";
?>
<div style="left:28%; position:absolute; width: 37.5vw;" id="externalEnableInputPage">
  <span style="float:left; padding-top:15px;" class="textInSettings"><?= _LOCKABLECABLE ?></span>
  <div style="float:right; ">
    <div style="height:60px; " class="selectbox">
    <select id="lockableCableSelection" name="lockableCableSelection" style="width: 12vw;">
        <option id="lockableCableDisable" value=0 <?= $rowInstallationSettings["lockableCable"] == 0 ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
        <option id="lockableCableEnable" value=1 <?= $rowInstallationSettings["lockableCable"] == 1 ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option> 
      </select>
    </div>
  </div>
</div>

<div style="display:flex;margin-top:34%;margin-left:35%;">
  <button type="button" name="lockable_cable_button" id="lockable_cable_button" class="interfacesButton" onclick="checklockableCableForm()"> <?= _SAVE ?> </button>
  <input type="submit" id="button_lockable_cable" name="button_lockable_cable" hidden>
</div>