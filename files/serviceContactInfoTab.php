<?php
    include_once "access_control.php";
?>
<div style="left:28.25%;width:60vw;position:absolute; z-index: 1;" id="ServiceContactSettingsPage">
  <div id="ServiceContactPart">
    <span style="float:left; padding-top:15px; width:500px;" class="textInSettings" ><?= _SERVICECONTACTINFO ?></span>
    <br></br>
    <input type="text" id="serviceContactInfo" class="textarea1" style="margin-top: 1%;margin-bottom:1%" name="serviceContactInfo" value='<?php echo htmlspecialchars($rowGeneral["contactInfo"]); ?>'>
    <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="serviceContactInfoErr"></span></div>
  </div>

  <?php if($model == "EVC04") {?>
    <div style="height:35px;" id="showServiceContactInfoOnHmiItem">
      <span class="textForOccpSetting"><?= _SHOWSERVICECONTACTINFO ?></span>
      <div style="height:30px; margin-left:12vw;min-width:0px;" class="selectbox">
        <select style="width:12vw;" id="serviceContactInfoSelection" name="serviceContactInfoSelection">
          <option id="showServiceContactInfoOnHmiDisable" value=0  <?= $rowGeneral["showServiceContactInfoOnHmi"] == 0 ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
          <option id="showServiceContactInfoOnHmiEnable" value=1 <?= $rowGeneral["showServiceContactInfoOnHmi"] == 1 ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
        </select>
      </div>
        <span class="info">
          <i class="fa fa-info-circle fa-2x" style="margin-left: 1%;margin-top: 1%;"></i>
          <span class="contactInformation"><?= _EXTRASERVICECONTACTINFORMATION ?></span>
      </span>
    </div>
  <?php } ?>
  <button type="button" id="contact_info_button" name="contact_info_button" class="interfacesButton" onclick="checkServiceContactInfoForm()" style="text-transform: uppercase;"> <?= _SAVE ?> </button>
  <input type="submit" id="button_contact_info" name="button_contact_info" hidden>
</div>
