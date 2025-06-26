<?php
    include_once "access_control.php";
?>
<div style="left:28%;position:absolute;z-index: 1;right:1%;" id="systemResetPart">
<div style="margin-top:10%;margin-left:20%;margin-right:20%;">
<div class="center_system_maintanence" style="float:left">
<div  style="text-align: center;">
<img  src="css/hard-reset.png" style="width:198px;height:175px;">
</div>
<div style="margin-top:15%;">
<button type="button"  class="log_button" style="font-weight : bold ;" onclick="systemReset('button_hard_reset')">Hard Reset</button>   
<input type="submit" id="button_hard_reset" name="button_hard_reset" hidden>

</div>
</div>
<!-- ----------------------- -->
<div class="center_system_maintanence" style="float:right">
<div  style="text-align: center;">
<img  src="css/soft-reset.png">
</div>
<div style="margin-top:15%;">
<button type="button"  class="log_button" style="font-weight : bold ;" id="softResetButton" onclick="systemReset('button_soft_reset')">Soft Reset</button>  
<input type="submit" id="button_soft_reset" name="button_soft_reset" hidden>
</div>
</div>
</div>
</div>
<div id="system_reset_message" style="display:none"><?= _PROCESSING ?></div>

<div id="systemResetWarningAlert" style="display:none">
    <p class="dialogText" id="hardResetWarningText"><?= _HARDRESETCONFIRM ?></p>
    <p class="dialogText" id="softResetWarningText"><?= _SOFTRESETCONFIRM ?></p>
</div>
