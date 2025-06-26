<?php
    include_once "access_control.php";
?>
<div style="left:28%; position:absolute; width: 37.5vw;" id="generalSettingsQRCodePage">
    <span style="float:left; padding-top:15px" class="textInSettings"><?= _QRCODEONSCREEN ?></span>
    <div style="float:right; ">
        <div style="height:60px; " class="selectbox">
            <select id="qrCodeSelection" name="qrCodeSelection" onchange ="qrCodeFunction()">
                <option id="qrCodeDisable" value=0 <?= $rowGeneral["qrCode"] == 0 ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
                <option id="qrCodeEnable" value=1 <?= $rowGeneral["qrCode"] == 1 ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option> 
            </select>
        </div>
    </div>
    <br></br>
    <br></br>
    <div id="qrCodeDelimiterPart">
        <span style="float:left; padding-top:15px; width:500px;" class="textInSettings" ><?= _QRCODEDELIMITER ?></span>
        <br></br>
        <input type="text" id="qrCodeDelimiter" class="textarea1" style="margin-top: 1%;margin-bottom:1%" name="qrCodeDelimiter" value='<?php echo htmlspecialchars($rowGeneral["qrCodeDelimiter"]); ?>'>
        <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="qrCodeDelimiterErr"></span></div>
    </div>
    <div id="adhocUrlPrefixPart">
        <span style="float:left; padding-top:15px; width:500px;" class="textInSettings" >AdhocUrlPrefix</span>
        <br></br>
        <input type="text" id="adhocUrlPrefix" class="textarea1" style="margin-top: 1%;margin-bottom:1%" name="adhocUrlPrefix" value='<?php echo htmlspecialchars($rowGeneral["AdhocUrlPrefix"]); ?>'>
    </div>
</div>

<div style="display:flex;margin-top:34%;margin-left:35%;">
    <button type="button" name="general_qrCode_button" id="general_qrCode_button" class="interfacesButton" onclick="checkGeneralQRCodeForm()"> <?= _SAVE ?> </button>
    <input type="submit" id="button_general_qrCode" name="button_general_qrCode" hidden>
</div>
