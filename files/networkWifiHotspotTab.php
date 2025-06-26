<?php
    include_once "access_control.php";
?>
<div style="left:28%;width:60vw;position:absolute; z-index: 1;" id="networkWifiHotspotPage">
    <div>
        <p class="star" style="display: inline;"><b>*</b> </p>
        <p class="explanation" style="display: inline;"><?= _EXPLANATION ?></p>
    </div>
    <br></br>
    <div style="height:35px;">
        <label style="width: 11vw;margin-top:1%;"><?= _TURNONDURINGBOOT ?></label>
        <div style="height:30px; margin-left:13vw;margin-top:1%;" class="selectbox">
            <select name="selectWifiHotspot" id="selectWifiHotspot" onchange="wifiHotspotFunction()">
                <option id="wifiHotspotDisable" value="wifiHotspotDisable" <?= $rowWifiHotspotSettings["enable"] == "false" ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
                <option id="wifiHotspotEnable" value="wifiHotspotEnable" <?= $rowWifiHotspotSettings["enable"] == "true" ?  ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
            </select>
        </div>
    </div>
    <br></br><br></br>
    <div id="wifiHotspotInfo">
        <div style="height:35px;"  id="selectWifiHotspotAutoTurnOffItem">
            <label style="width: 11vw;margin-top:1%;"><?= _AUTOTURNOFF ?></label>
            <div style="height:30px; margin-left:13vw;margin-top:1%;" class="selectbox">
                <select name="selectWifiHotspotAutoTurnOff" id="selectWifiHotspotAutoTurnOff" onchange="checkWifiHotspotTimeout()">
                    <option id="hotspotAutoTurnOffDisable" value="false" <?= $rowWifiHotspotSettings["autoTurnOff"] == "false" ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
                    <option id="hotspotAutoTurnOffEnable" value="true" <?= $rowWifiHotspotSettings["autoTurnOff"] == "true" ?  ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
                </select>
            </div>
        </div>
        <br></br><br></br>
        <div id="wifiHotspotTimeoutPart">
            <div style="height:35px;"  id="selectWifiHotspotTimeoutItem">
                <label style="width: 11vw;margin-top:1%;"><?= _AUTOTURNOFFTIMEOUT ?></label>
                <div style="height:30px; margin-left:13vw;margin-top:1%;" class="selectbox">
                    <select name="selectWifiHotspotTimeout" id="selectWifiHotspotTimeout">
                        <option id="hotspotTimeout5" value="5" <?= $rowWifiHotspotSettings["timeout"] == "5" ?  ' selected="selected"' : ''; ?>>5</option>
                        <option id="hotspotTimeout10" value="10" <?= $rowWifiHotspotSettings["timeout"] == "10" ?  ' selected="selected"' : ''; ?>>10</option>
                        <option id="hotspotTimeout15" value="15" <?= $rowWifiHotspotSettings["timeout"] == "15" ?  ' selected="selected"' : ''; ?>>15</option>
                        <option id="hotspotTimeout20" value="20" <?= $rowWifiHotspotSettings["timeout"] == "20" ?  ' selected="selected"' : ''; ?>>20</option>
                        <option id="hotspotTimeout25" value="25" <?= $rowWifiHotspotSettings["timeout"] == "25" ?  ' selected="selected"' : ''; ?>>25</option>
                        <option id="hotspotTimeout30" value="30" <?= $rowWifiHotspotSettings["timeout"] == "30" ?  ' selected="selected"' : ''; ?>>30</option>
                    </select>
                </div>
            </div>
            <br></br><br></br>
        </div>
        <div id="wifiHotspotSSIDItem">
            <label>SSID: </label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" id="wifiHotspotSSID" name="wifiHotspotSSID" value='<?php echo htmlspecialchars($rowWifiHotspotSettings["ssid"]);?>'\>
            <span class="error" id="wifiHotspotSSIDError">*</span>
            <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="wifiHotspotSSIDErr"></span></div>
        </div>
        <div id="wifiHotspotPasswordItem">
            <label><?= _PASSWORD ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" id="wifiHotspotPassword" name="wifiHotspotPassword" onkeydown="listenerForEmptyText('wifiHotspotPassword')" value="">
            <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="wifiHotspotPasswordErr"></span></div>
        </div>
    </div>
    <br></br>
    <button type="button" id="interfaces_hotspot_button" name="interfaces_hotspot_button" value="Save" class="interfacesButton" onclick="checkWifiHotspotForm()"> <?= _SAVE ?> </button>
    <input type="submit" id="button_hotspot_interfaces" name="button_hotspot_interfaces" hidden>
    <input type="submit" id="button_hotspot_reboot_now" name="button_hotspot_reboot_now" hidden>
</div>
<div id="hotspotAlertMessage" style="display:none">
    <p class="dialogText" id="hotspotAlert" style="text-align:center;"><?= _HOTSPOTALERTMESSAGE ?></p>
    <p class="dialogTextBold"><?= _HOTSPOTREBOOTMESSAGE ?></p>
</div>
<div id="alertMessageHotspot" style="display:none">
    <p class="dialogText" id="forHotspot" style="text-align:center;"><?= _WIFIHOTSPOTCONNECTIONCONFIRM ?></p>
</div>