<?php
    include_once "access_control.php";
?>
<html>
<body>
   <div style="left:28%;position:absolute;z-index: 1;right:1%;" id="uploadPart">
      <div style="margin-top:10%;"> 
         <div style="text-align: center">
            <div>
               <img style="text-align: center" id="hmiLogIcon" src="css/upload-icon.png">
            </div>
            <div style="margin-top:3%" class="system_maintanence_text"><?= _SELECTFIRMWARE ?></div>
            <div style="margin-top: 3%;text-align: center">
               <label for="zipFile" style="float:none;display: inline-block;padding: 1.25em 0;text-align: center;font-size: 18px;" class="log_button"><?= _UPLOAD ?></label>
            </div>
         </div>
      </div>
   </div>
   <!-- ****************************************************************************************** -->
   <div style="left:28%;position:absolute;z-index: 1;right:1%;display:none" id="updatePart">
      <div style="margin-top:10%">
         <div style="text-align: center">
            <div>
               <img style="text-align: center" id="hmiLogIcon" src="css/upload-icon.png">
            </div>
            <div style="margin-top:3%;text-align: center" class="system_maintanence_text" id="fileName"> <?= _FILENAME ?></div>
            <div style="margin-top:3%;text-align: center">
               <button type="button" class="log_button" onclick="firmwareUpdate()"> <?= _UPDATE ?> </button>
            </div>
         </div>
      </div>
   </div>
   <div id="firmwareUpdateAlertMessage" style="display:none">
      <p class="dialogText" id="firmwareUpdateForSize" style="display:none"><?= _FIRMWAREFILESIZE ?></p>
      <p class="dialogText" id="firmwareUpdateForType" style="display:none"><?= _FIRMWAREFILETYPE ?></p>
   </div>

   <div id="firmware_update_saved_message" style="display:none"><?= _PROCESSING ?></div>
   <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
      <input type="file" name="zipFile" id="zipFile" style="visibility: hidden;" />
      <input type="submit" id="fileUpload" style="visibility: hidden;" />
   </form>
</body>
</html>
