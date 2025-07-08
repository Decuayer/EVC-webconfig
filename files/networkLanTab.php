<?php
    include_once "access_control.php";
?>
<div class="container my-4" id="networkLanPage">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
             <!-- Desc -->
            <div class="mb-3 d-flex align-items-center">
                <span class="star"><b>*</b></span>
                <span class="explanation ms-2"><?= _EXPLANATION ?></span>
            </div>

            <!-- LAN Title -->
            <h5 class="interfaceTitle mb-3">LAN</h5>

            <!-- MAC Address -->
            <div class="row mb-3" id="macAddressItem">
                <label class="col-12 col-md-6 textInSettings"><?= _MACADDRESS ?>:</label>
                <div class="col-12 col-md-6">
                    <input type="text" id="macAddress" class="form-control" readonly disabled value="<?= htmlspecialchars($rowLanSettings["macAddress"]) ?>">
                </div>
            </div>

            <!-- IP Settings -->
            <div class="row mb-3 align-items-center" id="ipSettingItem">
                <label class="col-12 col-md-6 textInSettings"><?= _IPSETTING ?></label>
                <div class="col-12 col-md-6">
                    <select name="selectEthernetIPSetting" id="ethernetIpSetting" class="form-select" onchange="ethernetFunction()">
                        <option value="0"><?= _SELECTIPSETTING ?></option>
                        <option id="static" value="1" <?= $rowLanSettings["IPSetting"] == "Static" ? ' selected="selected"' : '' ?>><?= _STATIC ?></option>
                        <option id="dhcpServer" value="2" <?= $rowLanSettings["IPSetting"] == "DHCPServer" ? ' selected="selected"' : '' ?>><?= _DHCPSERVER ?></option>
                        <option id="dhcpClient" value="3" <?= $rowLanSettings["IPSetting"] == "DHCP" ? ' selected="selected"' : '' ?>><?= _DHCPCLIENT ?></option>
                    </select>
                    <span class="error text-danger" id="ethernetIpSettingError">*</span>
                </div>
                <div style="col-md-6">
                    <span class="alert text-danger"  id="ethernetIpSettingErr"></span>
                </div>        
            </div>

            <!-- Ethernet Info -->
            <div id="ethernetInfo">

                <!-- DHCP Interval -->
                <div id="DHCPServerInfo">
                    <div class="row mb-3" id="minDHCPAddrRangeItem">
                        <label class="col-12 col-md-6 textInSettings"><?= _MINDHCPADDRRANGE ?>:</label>
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control" id="minDHCPAddrRange" name="minDHCPAddrRange" value="<?= htmlspecialchars($rowLanSettings["dhcpRangeStart"]) ?>">
                            <span class="error text-danger" id="minDHCPAddrRangeError">*</span>
                            <div class="errorText">
                                <span class="alert text-danger" id="minDHCPAddrRangeErr"></span>
                            </div>
                        </div>
                    </div>

                <div class="row mb-3" id="maxDHCPAddrRangeItem">
                    <label class="col-12 col-md-6 textInSettings"><?= _MAXDHCPADDRRANGE ?>:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="maxDHCPAddrRange" name="maxDHCPAddrRange" value="<?= htmlspecialchars($rowLanSettings["dhcpRangeEnd"]) ?>">
                        <span class="error text-danger" id="maxDHCPAddrRangeError">*</span>
                        <div class="errorText">
                            <span class="alert text-danger" id="maxDHCPAddrRangeErr"></span>
                        </div>
                    </div>
                </div>
                </div>

                <!-- IP Address -->
                <div class="row mb-3" id="IPadressItem">
                    <label class="col-12 col-md-6 textInSettings"><?= _IPADDRESS ?>:</label>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control" id="IPadress" name="IPadress" value="<?= htmlspecialchars($rowLanSettings["IPAddress"]) ?>">
                        <span class="error text-danger" id="IPadressError">*</span>
                        <div class="errorText">
                            <span class="alert text-danger" id="IPadressErr"></span>
                        </div>
                    </div>
                </div>

                <!-- Network Mask -->
                <div class="row mb-3" id="networkMaskItem">
                    <label class="col-12 col-md-6 textInSettings"><?= _NETWORKMASK ?>:</label>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control" id="networkMask" name="networkMask" value="<?= htmlspecialchars($rowLanSettings["networkMask"]) ?>">
                        <span class="error text-danger" id="networkMaskError">*</span>
                        <div class="errorText">
                            <span class="alert text-danger" id="networkMaskErr"></span>
                        </div>
                    </div>
                </div>

                <!-- Default Gateway -->
                <div class="row mb-3" id="defaultGatewayItem">
                    <label class="col-12 col-md-6 textInSettings"><?= _DEFAULTGATEWAY ?>:</label>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control" id="defaultGateway" name="defaultGateway" value="<?= htmlspecialchars($rowLanSettings["gateway"]) ?>">
                        <span class="error text-danger" id="defaultGatewayError"></span>
                        <div class="errorText">
                            <span class="alert text-danger" id="defaultGatewayErr"></span>
                        </div>
                    </div>
                </div>

                <!-- Primary DNS -->
                <div class="row mb-3" id="primaryDnsItem">
                    <label class="col-12 col-md-6 textInSettings"><?= _PRIMARYDNS ?>:</label>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control" id="primaryDns" name="primaryDns" value="<?= htmlspecialchars($rowLanSettings["primaryDNS"]) ?>">
                        <span class="error text-danger" id="primaryDnsError"></span>
                        <div class="errorText">
                            <span class="alert text-danger" id="primaryDnsErr"></span>
                        </div>
                    </div>
                </div>

                <!-- Secondary DNS -->
                <div class="row mb-3" id="secondaryDnsItem">
                    <label class="col-12 col-md-6 textInSettings"><?= _SECONDARYDNS ?>:</label>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control" id="secondaryDns" name="secondaryDns" value="<?= htmlspecialchars($rowLanSettings["secondaryDNS"]) ?>">
                        <span class="error text-danger" id="secondaryDnsError"></span>
                        <span class="alert text-danger" id="secondaryDnsErr"></span>
                        <div class="errorText">
                            <span class="alert text-danger" id="secondaryDnsErr"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="text-center my-4">
                <button type="button" id="interfaces_lan_button" name="interfaces_lan_button" class="btn btn-primary px-4" onclick="checkLANNetworkForm()">
                <?= _SAVE ?>
                </button>
                <input type="submit" id="button_lan_interfaces" name="button_lan_interfaces" hidden>
            </div>
        </div>
    </div>
</div>

<!-- Uyarılar -->
<div  class="container mt-4" id="networkInterfaceAlertMessageCellularGateway" style="display:none">
  <p class="dialogText" id="forCellularGateway"><?= _CELLULARGATEWAYCONFIRM ?></p>
  <p class="dialogTextBold"><?= _ACCEPTQUESTION ?></p>
</div>

<div class="container text-center mt-4" id="alertMessageDhcpServer" style="display:none">
  <p class="dialogText" id="forDhcpServer"><?= _DHCPSERVERCONNECTIONCONFIRM ?></p>
</div>

<!--general div -->