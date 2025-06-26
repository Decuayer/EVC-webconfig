<?php
    include_once "access_control.php";
?>

<div style="left:28%;width:60vw;position:absolute; z-index: 1;" id="networkWlanPage">
    <div>
        <p class="star" style="display: inline;"><b>*</b> </p>
        <p class="explanation" style="display: inline;"><?= _EXPLANATION ?></p>
    </div>
    <div style="height:35px;">
        <!-- _WIFI -->
        <span class="interfaceTitle" style="float:left;width: 11vw"><?= _WIFI ?></span>
        <div style="height:30px; margin-left:13vw;margin-top:1%;" class="selectbox">
            <select name="selectNetworkWLAN" id="selectNetworkWLAN" onchange="wifiFunction()">
                <option id="wifiDisable" value="wifiDisable" name="wifiCheck" <?= $rowWlanSettings["enable"] == "false" ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
                <option id="wifiEnable" value="wifiEnable" name="wifiCheck" <?= $rowWlanSettings["enable"] == "true" ?  ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
            </select>
        </div>
    </div><!-- _WIFI -->
    <div id="wifiIpInfo">
        <div id="wifiMacAddessItem">
            <label><?= _MACADDRESS ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" readonly disabled value='<?php echo htmlspecialchars($rowWlanSettings["macAddress"]);?>'\>
        </div>
        <div id="wifiNetworkStatus" style=" margin-top:2.5vh;">
            <label><?= _NETWORKSTATUS ?>:</label>
            <br><br>
            <div class="textarea1" style="display: flex; align-items:center;">

                <div style="display: flex; align-items: flex-end; gap: 2px; height: 30px;">
                    <img src="css/wifi_level_<?php echo empty($WifiLevel) ? 0 : $WifiLevel; ?>.png"  style="width: 36px; height: 36px;"/>
                </div>
                            
                <div style="display: flex; flex-direction: column; justify-content: center; margin-left:2%;">
                    <span style="font-size: 14px; font-weight: bold; color:black; "><?php echo htmlspecialchars($rowWlanSettings["ssid"] ?? ""); ?></span>
                    <span style="font-size: 12px; color: #6c757d; display:flex;">
                        <?php echo htmlspecialchars($WifiFreq);?>
                        <div style="color: <?php echo ($WlanIP === '-') ? '#dc3545' : '#28a745'; ?>; font-weight: bold; margin-left:5%;">
                            <?php echo ($WlanIP === '-') ? _DISCONNECTED : _CONNECTED; ?>
                        </div>
                    </span>
                </div>
            </div>
        </div>
        <div id="wifiSSIDItem" style="display: flex; flex-direction: column; gap: 10px;">
            <label>SSID: </label>
            <div style="display: flex; align-items: center; gap: 10px;">
                <input type="text" class="textarea1" style="margin-bottom: 1%;" id="wifiSSID" name="wifiSSID" value='<?php echo htmlspecialchars($rowWlanSettings["ssid"]);?>'>
                <span class="error" id="wifiSSIDError">*</span>
                <button type="button" id="button_scanWifiNetworks" onclick="scanWifiNetworks()" class="standalone_button" style="margin-top: 1%; margin-bottom: 1%;" > <?= _SCANNETWORKS ?> </button>
            </div>
            <div class="errorText">
                <span class="alert" style="float:right; margin:0 0;" id="wifiSSIDErr"></span>
            </div>
        </div>
        <div id="wifiPasswordItem">
            <label><?= _PASSWORD ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" id="wifiPassword" name="wifiPassword" onkeydown="listenerForEmptyText('wifiPassword')" value="">
            <span class="error" id="wifiPasswordError">*</span>
            <div class="errorText"><span class="alert wlanErr"  id="wifiPasswordErr"></span></div>            
        </div>
        <div style=" margin-bottom:5%; left:0%; width:12vw; position:absolute; z-index: 1; display: grid; grid-template-columns: 1fr 2fr 1fr; gap: 1px;" >
            <div>
                <div style="height:45px; margin-top:2vh; margin-bottom: 10%;" id="selectSecurityItem">
                    <label style="width: 11vw; margin-top:1%;"><?= _SECURITY ?></label>
                </div>
                <div style="height:38px;" id="wifiIpSettingItem">
                    <label style="width: 11vw; margin-top:35%;"><?= _IPSETTING ?></label>
                </div>
            </div>
            <div style="display: flex; flex-direction: column;">
                <div style="height: 35px; margin-bottom: 25%;">
                    <div style="height:30px; margin-left:13vw; margin-bottom: 8%; margin-top: 1vh;" class="selectbox">
                        <select name="selectSecurity" id="selectSecurity" onchange="wifiFunction()" disabled>
                            <option value="default" selected><?= _SECURITYTYPE ?></option>
                            <option id="wifiNone" value="none" <?= $rowWlanSettings["securityType"] == "none" ? ' selected="selected"' : ''; ?>><?= _NONE ?></option>
                            <option id="wifiWPA" value="WPA" <?= $rowWlanSettings["securityType"] == "WPA" ? ' selected="selected"' : ''; ?>>WPA/WPA2 PSK</option>
                        </select>
                    </div>
                </div>
                <div style="height: 35px; margin-bottom: 5%;">          
                    <div style="height:30px; margin-left:13vw; margin-bottom: 8%;" class="selectbox">
                        <select name="selectWifiIPSetting" id="wifiIpSetting" onchange="wifiFunction()" disabled>
                            <option value="0" selected><?= _SELECTIPSETTING ?></option>
                            <option id="wifiStatic" value="1" <?= $rowWlanSettings["IPSetting"] == "Static" ? ' selected="selected"' : ''; ?>><?= _STATIC ?></option>
                            <option id="wifiDHCP" value="2" <?= $rowWlanSettings["IPSetting"] == "DHCP" ? ' selected="selected"' : ''; ?>>DHCP</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="error" style="display: flex; flex-direction: column;">
                <div style="height: 35px; margin-bottom: 100%; flex:1;">
                    <span id="selectSecurityError" style="height: 60px; padding-top:16px; display: flex;">*</span>
                </div>
                <div style="height: 46px;">
                    <span id="selectWifiIPSettingError" style="height: 12vh; display: flex;">*</span>
                </div>
            </div>
        </div>
        <div>
            <div class="errorText" style="width: auto; margin-top: 2%;"><span class="alert wlanErr" id="selectSecurityErr" style="width: 34vw;"></span></div>
            <div class="errorText" style="width: auto; margin-top: 5%;"><span class="alert wlanErr"  id="selectWifiIPSettingErr" style="width:34vw;"></span></div>
        </div>
        <div id="wifiAvailableNetworks" style="margin-top: 20vh; margin-left: 0vw; width: 50vw;">
            <label><?= _AVAILABLENETWORKS ?></label>
            <ul id="wifiNetworkList">
            <?php foreach ($networks as $network): ?>
            <li style="padding: 8px; border: 1px solid #007BFF; border-radius: 5px; cursor: pointer; background-color: #F8F9FA; transition: background-color 0.3s; display: flex; align-items: center; gap: 10px;"
                onmouseover="this.style.backgroundColor='#007BFF'; this.style.color='#FFFFFF';"
                onmouseout="this.style.backgroundColor='#F8F9FA'; this.style.color='#000000';"
                onclick="selectNetwork('<?php echo htmlspecialchars($network['ssid']); ?>')">
                <div style="display: flex; align-items: flex-end; gap: 2px; height: 30px;">
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                        <div style="width: 6px; height: <?php echo $i * 6; ?>px;
                            background-color: <?php echo ($i <= $network['wifiLevel']) ? '#28a745' : '#e0e0e0'; ?>;
                            border-radius: 1px;">
                        </div>
                    <?php endfor; ?>
                </div>
                <div style="flex: 1; display: flex; flex-direction: column; justify-content: center;">
                    <span style="font-size: 14px; font-weight: bold;"><?php echo htmlspecialchars($network['ssid']); ?></span>
                    <span style="font-size: 12px; color: #6c757d;">
                        <?php echo htmlspecialchars($network['freq'])."hz". "&nbsp;";?>
                        <?php echo htmlspecialchars($network['signal']). " dBm";?>
                    </span>
                </div>
                </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
         
    <!--wifiIpInfo-->
    <div id="wifiInfo">
        <div id="wifiIPaddressItem">
            <label><?= _IPADDRESS ?>:</label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" id="wifiIPaddress" name="wifiIPaddress" value=<?php echo htmlspecialchars($rowWlanSettings["IPAddress"]); ?>>
            <span class="error" id="wifiIPaddressError">*</span>
            <div class="errorText"><span class="alert" style="float:right;margin:0 0;" id="wifiIPaddressErr"></span></div>
        </div>
        <div id="wifiNetworkMaskItem">
            <label><?= _NETWORKMASK ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" id="wifiNetworkMask" name="wifiNetworkMask" value=<?php echo htmlspecialchars($rowWlanSettings["networkMask"]); ?>>
            <span class="error" id="wifiNetworkMaskError">*</span>
            <div class="errorText"><span class="alert" style="float:right;margin:0 0;" id="wifiNetworkMaskErr"></span></div>
        </div>
        <div id="wifiDefaultGatewayItem">
            <label><?= _DEFAULTGATEWAY ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" id="wifiDefaultGateway" name="wifiDefaultGateway" value=<?php echo htmlspecialchars($rowWlanSettings["gateway"]); ?>>
            <span class="error" id="wifiDefaultGatewayError"></span>
            <div class="errorText"><span class="alert" style="float:right;margin:0 0;" id="wifiDefaultGatewayErr"></span></div>
        </div>
        <div id="wifiPrimaryDnsItem">
            <label><?= _PRIMARYDNS ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" id="wifiPrimaryDns" name="wifiPrimaryDns" value=<?php echo htmlspecialchars($rowWlanSettings["primaryDNS"]); ?>>
            <span class="error" id="wifiPrimaryDnsError"></span>
            <div class="errorText"><span class="alert" style="float:right;margin:0 0;" id="wifiPrimaryDnsErr"></span></div>
        </div>
        <div id="wifiSecondaryDnsItem">
            <label><?= _SECONDARYDNS ?></label>
            <input type="text" class="textarea1" style="margin-bottom: 1%;" id="wifiSecondaryDns" name="wifiSecondaryDns" value=<?php echo htmlspecialchars($rowWlanSettings["secondaryDNS"]); ?>>
            <span class="error" id="wifiSecondaryDnsError"></span>
            <div class="errorText"><span class="alert" style="float:right;margin:0 0;" id="wifiSecondaryDnsErr"></span></div>
        </div>
    </div>
    <!--wifiInfo -->
    <br></br>
    <button type="button" id="interfaces_wlan_button" name="interfaces_wlan_button" value="Save" class="interfacesButton" onclick="checkWLANNetworkForm()"> <?= _SAVE ?> </button>
    <input type="submit" id="button_wlan_interfaces" name="button_wlan_interfaces" hidden>
</div>
<div id="networkInterfaceAlertMessageWlan" style="display:none">
    <p class="dialogText" id="forWifi" style="text-align:center;"><?= _LTECONNECTIONCONFIRM ?></p>
</div>

<div id="noNetworkPopup" class="noNetworkPopUp">
    <div>
        <div style="font-size: 28px; font-weight: bold; margin-bottom: 10px;"><?= _NOWIFIFOUNDMSG ?></div>
        <div style="font-size: 18px; margin-bottom: 20px;"><?= _PLEASECHECKWIFICONNMSG ?></div>
        <div style="display: flex; justify-content: center; gap: 40px;">
            <button type="button" onclick="closeNoNetworkPopup()" style="padding: 10px 20px; font-size: 16px; cursor: pointer; background-color: #007bff; color: white; border: none; border-radius: 5px;">Cancel</button>
            <button type="button" onclick="retryScanWifiNetworks()" style="padding: 10px 20px; font-size: 16px; cursor: pointer; background-color: #007bff; color: white; border: none; border-radius: 5px;">Retry</button>
        </div>
    </div>
</div>

<div id="loadingPopup" class="scanningPopUp">
    <div style="margin-bottom: 20px;">
        <div class="circle-spinner"></div>
    </div>
    <div style="font-size: 28px; font-weight: 600; letter-spacing: 1.5px; margin-bottom: 10px;"><?= _SCANNINGWIFIMSG ?></div>
    <div style="font-size: 20px; font-weight: 400; color: #ccc;"><?= _PLEASEWAITMSG ?></div>
</div>

<input type="submit" id="button_wlan_cellular" name="button_wlan_cellular" hidden><!-- general div -->
