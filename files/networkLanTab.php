<?php
    include_once "access_control.php";
?>
<div style="left:28%;width:60vw;position:absolute; z-index: 1;" id="networkLanPage">
    <div>
        <p class="star" style="display: inline;"><b>*</b> </p>
        <p class="explanation" style="display: inline;"><?= _EXPLANATION ?></p>
    </div>
    <br></br>
    <span class="interfaceTitle">LAN</span>
    <br></br>
    <div>
        <!--macAddress-->
        <div id="macAddressItem">
            <label><?= _MACADDRESS ?>:</label>
            <div>
                <input type="text" id="macAddress" class="textarea1" style="margin-bottom: 1%;" readonly disabled value=<?php echo htmlspecialchars($rowLanSettings["macAddress"]); ?>>
            </div>
        </div>
        <!--MAcaddress-->
        <div style="height:35px;" id="ipSettingItem">
            <!-- the ip setting -->
            <label id ="ipSettingLabel" style="width: 12vw;margin-top:1%;"><?= _IPSETTING ?></label>
            <div id = "ipSettingDiv"  style="height:30px; margin-left:12vw;" class="selectbox">
                <select name="selectEthernetIPSetting" id="ethernetIpSetting" style= "width:12vw;" onchange="ethernetFunction()">
                    <option value="0"><?= _SELECTIPSETTING ?></option>
                    <option id="static" value="1" <?= $rowLanSettings["IPSetting"] == "Static" ? ' selected="selected"' : ''; ?>><?= _STATIC ?></option>
                    <option id="dhcpServer" value="2" <?= $rowLanSettings["IPSetting"] == "DHCPServer" ? ' selected="selected"' : ''; ?>><?= _DHCPSERVER ?></option>
                    <option id="dhcpClient" value="3" <?= $rowLanSettings["IPSetting"] == "DHCP" ? ' selected="selected"' : ''; ?>><?= _DHCPCLIENT ?></option>
                </select>
            </div>
            <span class="error" id="ethernetIpSettingError" style="height: 60px; padding-top:16px; display: inline-block;">*</span>
        </div><!-- ip setting -->
        <div style="width: 38vw;"><span class="alert" style="margin-left:28vw;height: 60px; padding-top:16px; display: inline-block;float:right;" id="ethernetIpSettingErr"></span></div>
    </div>
    <!--ethernetInfo-->
    <div id="ethernetInfo">
        <div id="DHCPServerInfo">
            <div id="minDHCPAddrRangeItem">
                <label><?= _MINDHCPADDRRANGE ?>:</label>
                <input type="text" class="textarea1" style="margin-bottom: 1%;" id="minDHCPAddrRange" name="minDHCPAddrRange" value=<?php echo htmlspecialchars($rowLanSettings["dhcpRangeStart"]); ?>>
                <span class="error" id="minDHCPAddrRangeError">*</span>
                <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="minDHCPAddrRangeErr"></span></div>
            </div>
            <div id="maxDHCPAddrRangeItem">
                <label><?= _MAXDHCPADDRRANGE ?>:</label>
                <input type="text" class="textarea1" style="margin-bottom: 1%;" id="maxDHCPAddrRange" name="maxDHCPAddrRange" value=<?php echo htmlspecialchars($rowLanSettings["dhcpRangeEnd"]); ?>>
                <span class="error" id="maxDHCPAddrRangeError">*</span>
                <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="maxDHCPAddrRangeErr"></span></div>
            </div>
        </div>
        <div id="IPadressItem">
            <label><?= _IPADDRESS ?>:</label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" id="IPadress" name="IPadress" value=<?php echo htmlspecialchars($rowLanSettings["IPAddress"]); ?>>
            <span class="error" id="IPadressError">*</span>
            <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="IPadressErr"></span></div>
        </div>
        <div id="networkMaskItem">
            <label><?= _NETWORKMASK ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" id="networkMask" name="networkMask" value=<?php echo htmlspecialchars($rowLanSettings["networkMask"]); ?>>
            <span class="error" id="networkMaskError">*</span>
            <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="networkMaskErr"></span></div>
        </div>
        <div id="defaultGatewayItem">
            <label><?= _DEFAULTGATEWAY ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" id="defaultGateway" name="defaultGateway" value=<?php echo htmlspecialchars($rowLanSettings["gateway"]); ?>>
            <span class="error" id="defaultGatewayError"></span>
            <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="defaultGatewayErr"></span></div>
        </div>
        <div id="primaryDnsItem">
            <label><?= _PRIMARYDNS ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" id="primaryDns" name="primaryDns" value=<?php echo htmlspecialchars($rowLanSettings["primaryDNS"]); ?>>
            <span class="error" id="primaryDnsError"></span>
            <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="primaryDnsErr"></span></div>
        </div>
        <div id="secondaryDnsItem">
            <label><?= _SECONDARYDNS ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" id="secondaryDns" name="secondaryDns" value=<?php echo htmlspecialchars($rowLanSettings["secondaryDNS"]); ?>>
            <span class="error" id="secondaryDnsError"></span>
            <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="secondaryDnsErr"></span></div>
        </div>
    </div>
    <!--ethernetInfo -->
    <br></br>
    <button type="button" id="interfaces_lan_button" name="interfaces_lan_button" value="Save" class="interfacesButton" onclick="checkLANNetworkForm()"> <?= _SAVE ?> </button>
    <input type="submit" id="button_lan_interfaces" name="button_lan_interfaces" hidden>
</div>

<div id="networkInterfaceAlertMessageCellularGateway" style="display:none">
    <p class="dialogText" id="forCellularGateway" style="text-align:center;"><?= _CELLULARGATEWAYCONFIRM ?></p>
    <p class="dialogTextBold"><?= _ACCEPTQUESTION ?></p>
</div>
<div id="alertMessageDhcpServer" style="display:none">
    <p class="dialogText" id="forDhcpServer" style="text-align:center;"><?= _DHCPSERVERCONNECTIONCONFIRM ?></p>
</div>
<!--general div -->