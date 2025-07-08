<?php
    include_once "access_control.php";
?>
<div class="container my-4" id="networkWlanPage">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="mb-3 d-flex align-items-center">
                <span class="star"><b>*</b></span>
                <span class="explanation ms-2"><?= _EXPLANATION ?></span>
            </div>

            <!-- Wi-Fi Settings -->
            <div class="row mb-3 align-items-center">
                <label class="col-12 col-md-6 textInSettings"><?= _WIFI ?></label>
                <div class="col-12 col-md-6">
                    <select name="selectNetworkWLAN" id="selectNetworkWLAN" class="form-select" onchange="wifiFunction()">
                        <option id="wifiDisable" value="wifiDisable" name="wifiCheck" <?= $rowWlanSettings["enable"] == "false" ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
                        <option id="wifiEnable" value="wifiEnable" name="wifiCheck" <?= $rowWlanSettings["enable"] == "true" ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
                    </select>
                </div>
            </div>

            <div id="wifiIpInfo">
                <!-- MAC Address -->
                <div class="mb-3" id="wifiMacAddessItem">
                    <label><?= _MACADDRESS ?></label>
                    <input type="text" class="form-control" readonly disabled value='<?= htmlspecialchars($rowWlanSettings["macAddress"]) ?>'>
                </div>

                <!-- Network Status -->
                <div class="mb-4" id="wifiNetworkStatus">
                    <label><?= _NETWORKSTATUS ?>:</label>
                    <div class="d-flex align-items-center bg-light p-2 rounded">
                        <img src="css/wifi_level_<?= empty($WifiLevel) ? 0 : $WifiLevel ?>.png" width="36" height="36" />
                        <div class="ms-3">
                            <div class="fw-bold"><?= htmlspecialchars($rowWlanSettings["ssid"] ?? "") ?></div>
                            <div class="text-muted">
                                <?= htmlspecialchars($WifiFreq) ?>
                                <span class="ms-3 fw-bold" style="color: <?= ($WlanIP === '-') ? '#dc3545' : '#28a745' ?>;">
                                <?= ($WlanIP === '-') ? _DISCONNECTED : _CONNECTED ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SSID + Scan Button -->
                <div class="mb-3" id="wifiSSIDItem">
                    <label>SSID:</label>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control" id="wifiSSID" name="wifiSSID" value='<?= htmlspecialchars($rowWlanSettings["ssid"]) ?>'>
                            <button type="button" id="button_scanWifiNetworks" onclick="scanWifiNetworks()" class="btn btn-outline-primary"> <?= _SCANNETWORKS ?> </button>
                        </div>
                    <span class="error text-danger" id="wifiSSIDError">*</span>
                    <div class="errorText text-end">
                        <span class="alert text-danger" id="wifiSSIDErr"></span>
                    </div>
                </div>

                <!-- Wi-Fi Password -->
                <div class="mb-3" id="wifiPasswordItem">
                    <label><?= _PASSWORD ?></label>
                    <input type="text" class="form-control" id="wifiPassword" name="wifiPassword" onkeydown="listenerForEmptyText('wifiPassword')">
                    <span class="error text-danger" id="wifiPasswordError">*</span>
                    <div class="errorText">
                        <span class="alert wlanErr text-danger"  id="wifiPasswordErr"></span>
                    </div>
                </div>

                <!-- Security + IP Setting -->
                <div class="row mb-4 w-100">
                    <div class="col-12 col-md-6">
                        <label><?= _SECURITY ?></label>
                        <select name="selectSecurity" id="selectSecurity" class="form-select w-100" disabled>
                            <option value="default" selected><?= _SECURITYTYPE ?></option>
                            <option id="wifiNone" value="none" <?= $rowWlanSettings["securityType"] == "none" ? ' selected="selected"' : ''; ?>><?= _NONE ?></option>
                            <option id="wifiWPA" value="WPA" <?= $rowWlanSettings["securityType"] == "WPA" ? ' selected="selected"' : ''; ?>>WPA/WPA2 PSK</option>
                        </select>
                        <span class="error text-danger" id="selectSecurityError">*</span>
                        <div class="errorText">
                            <span class="alert wlanErr text-danger" id="selectSecurityErr"></span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <label><?= _IPSETTING ?></label>
                        <select name="selectWifiIPSetting" id="wifiIpSetting" class="form-select w-100" disabled>
                            <option value="0" selected><?= _SELECTIPSETTING ?></option>
                            <option id="wifiStatic" value="1" <?= $rowWlanSettings["IPSetting"] == "Static" ? ' selected="selected"' : ''; ?>><?= _STATIC ?></option>
                            <option id="wifiDHCP" value="2" <?= $rowWlanSettings["IPSetting"] == "DHCP" ? ' selected="selected"' : ''; ?>>DHCP</option>
                        </select>
                        <span class="error text-danger" id="selectWifiIPSettingError">*</span>
                        <div class="errorText">
                            <span class="alert text-dangerwlanErr" id="selectWifiIPSettingErr"></span>
                        </div>
                    </div>
                </div>

                <!-- Available Networks -->
                <div class="mb-4"  id="wifiAvailableNetworks">
                <label><?= _AVAILABLENETWORKS ?></label>
                <ul class="list-group" id="wifiNetworkList">
                    <?php foreach ($networks as $network): ?>
                    <li class="list-group-item d-flex align-items-center" style="cursor:pointer" onclick="selectNetwork('<?= htmlspecialchars($network['ssid']) ?>')">
                    <div class="me-3 d-flex">
                        <?php for ($i = 1; $i <= 4; $i++): ?>
                        <div style="width: 6px; height: <?= $i * 6 ?>px; margin-right: 2px; background-color: <?= ($i <= $network['wifiLevel']) ? '#28a745' : '#e0e0e0' ?>; border-radius: 1px;"></div>
                        <?php endfor; ?>
                    </div>
                    <div>
                        <div class="fw-bold"><?= htmlspecialchars($network['ssid']) ?></div>
                        <div class="text-muted"><?= htmlspecialchars($network['freq']) ?>Hz - <?= htmlspecialchars($network['signal']) ?> dBm</div>
                    </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
                </div>
            </div>
            

            <!-- IP Settings Fields -->
            <div id="wifiInfo">
                <?php
                    $fields = [
                    'wifiIPaddress' => _IPADDRESS,
                    'wifiNetworkMask' => _NETWORKMASK,
                    'wifiDefaultGateway' => _DEFAULTGATEWAY,
                    'wifiPrimaryDns' => _PRIMARYDNS,
                    'wifiSecondaryDns' => _SECONDARYDNS
                    ];
                    foreach ($fields as $id => $label):
                ?>
                    <div class="mb-3">
                        <label><?= $label ?></label>
                        <input type="text" class="form-control" id="<?= $id ?>" name="<?= $id ?>" value="<?= htmlspecialchars($rowWlanSettings[$id]) ?>">
                        <span class="error text-danger" id="<?= $id ?>Error"></span>
                        <div class="errorText"><span class="alert" id="<?= $id ?>Err"></span></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Save Button -->
            <div class="text-center my-4">
                <button type="button" id="interfaces_wlan_button" name="interfaces_wlan_button" class="btn btn-primary px-4" onclick="checkWLANNetworkForm()">
                    <?= _SAVE ?>
                </button>
                <input type="submit" id="button_wlan_interfaces" name="button_wlan_interfaces" hidden>
            </div>
        </div>

        <div class="container text-center mt-4" id="networkInterfaceAlertMessageWlan" style="display:none">
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

        <input type="submit" id="button_wlan_cellular" name="button_wlan_cellular" hidden>
    </div>
</div>