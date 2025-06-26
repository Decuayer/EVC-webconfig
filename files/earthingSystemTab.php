<?php
    include_once "access_control.php";
?>
<div style="left:28%; position:absolute; width: 37.5vw;" id="earthingSystemPage">
  <span style="float:left; padding-top:15px;" class="textInSettings"><?= _EARTHINGSYSTEM ?></span>
  <div style="float:right; ">
    <div style="height:60px; " class="selectbox">
    <select id="earthingSystemSelection" name="earthingSystemSelection" style="width: 12vw;" onchange="earthingSystemCheck()">
      <?php if($ulType != "UL32" && $ulType != "UL50") {?>
        <option id="tnortt" value=0 <?= $rowInstallationSettings["earthingType"] == 0 ? ' selected="selected"' : ''; ?>><?= _TNORTT ?></option>
      <?php }?>
        <option id="splitPhase" value=1 <?= $rowInstallationSettings["earthingType"] == 1 ? ' selected="selected"' : ''; ?>><?= _SPLITPHASE ?></option> 
      </select>
    </div>
  </div>
</div>

<div style="display:flex;margin-top:34%;margin-left:35%;">
  <button type="button" name="earthing_system_button" id="earthing_system_button" class="interfacesButton" onclick="checkEarthingSystemForm()"> <?= _SAVE ?> </button>
  <input type="submit" id="button_earthing_system" name="button_earthing_system" hidden>
</div>


<div id="earthingSystemAlertMessage" style="display:none">
    <p class="dialogText"><?= _EARTHINGSYSTEMCONFIRM ?></p>
</div>
