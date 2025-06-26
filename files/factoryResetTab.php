<?php
    include_once "access_control.php";
?>
<div style="left:28%;position:absolute;z-index: 1;right:1%;" id="factoryResetPage">
  <div style="margin-left:35%;margin-right:20%;margin-top:10%;">
    <div class="center_system_maintanence" style="float:left">
      <div style="text-align: center;">
        <img id="hmiLogIcon" src="css/factory-reset-icon.png">
      </div>
      <div id="factory_reset_saved_message" style="display:none;margin-top:10%;"><?= _PROCESSING ?>
        <br></br><br></br><br></br>
        <div id="progress">
          <div id="bar"></div>
        </div>
        <br></br>
        <p id="factory_reset_setup_message" style="display:none"><?= _NEWSETUP ?></p>
      </div>
      <div style="margin-top:1%;margin-left:12%;">
        <button type="button" id="factory_default_button" name="factory_default_button" class="factory_default_button" onclick="factoryReset('<?php echo $_SESSION['token']?>')"> <?= _FACTORYRESETBUTTON ?> </button>
        <input type="submit" id="button_factory_default" name="button_factory_default" hidden>
      </div>
    </div>
  </div>

</div>
<div id="savedAlertMessage" style="display:none">
  <p class="dialogText" id="factoryResetText"><?= _FACTORYDEFAULTCONFIRM ?></p>
</div>
