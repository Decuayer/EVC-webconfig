<?php
    include_once "access_control.php";
?>
<div style="left:28%;width:60vw;position:absolute; z-index: 1;" id="networkCellularPage">
    <div>
        <p class="star" style="display: inline;"><b>*</b> </p>
        <p class="explanation" style="display: inline;"><?= _EXPLANATION ?></p>
    </div>
    <br></br>
    <div style="height:35px;">
        <!-- _CELLULAR -->
        <span class="interfaceTitle" style="float:left;width: 11vw"><?= _CELLULAR ?></span>
        <div style="height:30px; margin-left:13vw;margin-top:1%;" class="selectbox">
            <select name="selectCellular" id="selectCellular" onchange="cellularFunction()">
                <option id="cellularDisable" value="cellularDisable" name="cellularCheck" <?= $rowCellularSettings["enable"] == "false" ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
                <option id="cellularEnable" value="cellularEnable" name="cellularCheck" <?= $rowCellularSettings["enable"] == "true" ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
            </select>
        </div>
    </div><!-- _CELLULAR -->
    <br></br>
    <div id="cellularSettingsPart">
        <div style="height:35px;" id="selectLTEGatewayItem">
            <label style="width: 11vw;margin-top:2%;"><?= _CELLULARGATEWAY ?></label>
            <div style="height:30px; margin-left:13vw;margin-top:1%;" class="selectbox">
                <select name="selectLTEGateway" id="selectLTEGateway" onchange="lteGatewayFunction()">
                    <option id="lteGatewayDisable" value="false" name="lteGatewayCheck" <?= $rowCellularSettings["cellularGateway"] == "false" ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
                    <option id="lteGatewayEnable" value="true" name="lteGatewayCheck" <?= $rowCellularSettings["cellularGateway"] == "true" ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
                </select>
            </div>
        </div>
        <br></br>
        <div id="interfaceIPAddressLabelItem">
            <label style="height:30px;display:none" id="interfaceIPAddressLabel"><?= _INTERFACEIPADDRESS ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;display:none" id="InterfaceIPAddress" readonly disabled value=<?php echo $WWanIP; ?>>
        </div>
        <div id="imeiItem">
            <label style="height:30px"><?= _IMEI ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" readonly disabled value=<?php echo $IMEI; ?>>
        </div>
        <div id="imsiItem">
            <label style="height:30px"><?= _IMSI ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" readonly disabled value=<?php echo $IMSI; ?>>
        </div>
        <div id="iccidItem">
            <label style="height:30px"><?= _ICCID ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" readonly disabled value=<?php echo $ICCID; ?>>
        </div>
        <div id="apnItem">
            <label><?= _APNNAME ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" name="apn" id="apn" value=<?php echo htmlspecialchars($rowCellularSettings["apnName"]); ?>>
            <span class="error" id="apnError"></span>
            <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="apnErr"></span></div>
        </div>
        <div id="apnUsernameItem">
            <label><?= _APNUSERNAME ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" name="apnUserName" id="apnUserName" value=<?php echo htmlspecialchars($rowCellularSettings["apnUsername"]); ?>>
            <span class="error" id="apnUserNameError"></span>
            <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="apnUserNameErr"></span></div>
        </div>
        <div id="apnPasswordItem">
            <label><?= _APNPASSWORD ?></label>
            <div style="position: relative;">
                <input type="text" class="textarea1" style="margin-bottom: 1%;" id="apnPassword" name="apnPassword" onkeydown="listenerForEmptyText('apnPassword')" value="">
            </div>
            <span class="error" id="apnPasswordError"></span>
            <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="apnPasswordErr"></span></div>
        </div>
        <div id="simpinItem">
            <label>SIM PIN: </label>
            <div style="position: relative;">
                <input type="text" class="textarea1" style="margin-bottom: 1%;" id="simPin" name="simPin" onkeydown="listenerForEmptyText('simPin')" value="">
            </div>
            <span class="error" id="simPinError"></span>
            <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="simPinErr"></span></div>
        </div>
    </div>
    <br></br>
    <button type="button" id="interfaces_cellular_button" name="interfaces_cellular_button" value="Save" class="interfacesButton" onclick="checkCellularNetworkForm()"> <?= _SAVE ?> </button>
    <input type="submit" id="button_cellular_interfaces" name="button_cellular_interfaces" hidden>
</div>
<!--general div -->
<div id="alertMessageForLTEFunction" style="display:none">
    <p class="dialogText" id="lteEnabled" style="display:none"><?= _WARNINGFORLTEENABLED ?></p>
    <p class="dialogTextBold"><?= _ACCEPTQUESTION ?></p>
</div>
<div id="networkInterfaceAlertMessageCellular" style="display:none">
    <p class="dialogText" id="forCellular" style="text-align:center;"><?= _WIFICONNECTIONCONFIRM ?></p>
</div>
<input type="submit" id="button_cellular_wlan" name="button_cellular_wlan" hidden><!-- general div -->

