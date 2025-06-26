<?php
    include_once "access_control.php";
?>
<html>
<body>
<div style="position:absolute;left:50%;margin-top:5%;">
    <div style="left:28%;position:relative;z-index: 1;right:1%;" id="logoUploadPart">
      <div style="margin-top:10%;"> 
         <div style="text-align: center">
            <div>
               <img style="text-align: center" id="hmiLogIcon" src="css/upload-icon.png">
            </div>
            <div style="margin-top:5%" class="system_maintanence_text"><?= _USELOGO ?></div>
            <div style="margin-top: 5%;text-align: center">
               <label for="imageFile" style="float:none;display: inline-block;padding: 1.25em 0;text-align: center;font-size: 18px;" class="log_button"><?= _UPLOAD ?></label>
            </div>
         </div>
      </div>
   </div>
   <!-- ****************************************************************************************** -->
   <div style="left:28%;position:relative;z-index: 1;right:1%;display:none" id="logoUpdatePart">
      <div style="margin-top:10%">
         <div style="text-align: center">
            <div>
               <img style="text-align: center" id="hmiLogIcon" src="css/upload-icon.png">
            </div>
            <div style="margin-top:3%;text-align: center" class="system_maintanence_text" id="logoFileName"> <?= _FILENAME ?></div>
            <div style="margin-top:3%;text-align: center">
               <button type="button" class="log_button" id ="logo_update_button" onclick="logoUpdate()"> <?= _UPDATE ?> </button>
            </div>
         </div>
      </div>
   </div>
   <!-- -->
   <div style="left:28%;position:relative;z-index: 1;right:1%;" id="logoRemovePart">
      <div style="margin-top: 5%;text-align: center">
      <button type="button" class="log_button"  id ="logo_remove_button" onclick="logoRemove()"><?= _REMOVE ?></button>
      
      </div>
   </div>
</div>
   <div id="logoUpdateAlertMessage" style="display:none">
      <p class="dialogText" id="logoUpdateForType" style="display:none"><?= _LOGOTYPE ?></p>
      <p class="dialogText" id="logoUpdateForDimension" style="display:none"><?= _LOGODIMENSION ?></p>
   </div>

   <div id="logo_update_saved_message" style="display:none"><?= _PROCESSING ?></div>
   <form action=""  id="imageForm" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
      <input type="file" name="imageFile" id="imageFile" style="visibility: hidden;" />
      <input type="submit" id="logoUpload" style="visibility: hidden;" />
      <input type="submit" id="button_logo_remove" name="button_logo_remove"  style="visibility: hidden;" />
   </form>
</body>
</html>
