<?php
    include_once "access_control.php";
?>
<div class="container my-4" id="networkCellularPage">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <!-- Açıklama -->
            <div class="mb-3">
                <span class="star"><b>*</b></span>
                <span class="explanation"><?= _EXPLANATION ?></span>
            </div>

            <!-- Cellular Aç/Kapa -->
            <div class="row mb-3 align-items-center">
                <span class="col-12 col-md-6  textInSettings"><?= _CELLULAR ?></span>
                <div class="col-12 col-md-6">
                    <select class="form-select" name="selectCellular" id="selectCellular" onchange="cellularFunction()">
                        <option id="cellularDisable" value="cellularDisable" name="cellularCheck" <?= $rowCellularSettings["enable"] == "false" ? ' selected="selected"' : '' ?>><?= _DISABLED ?></option>
                        <option id="cellularEnable" value="cellularEnable" name="cellularCheck" <?= $rowCellularSettings["enable"] == "true" ? ' selected="selected"' : '' ?>><?= _ENABLED ?></option>
                    </select>
                </div>
            </div>

            <!-- Cellular Ayarları -->
            <div id="cellularSettingsPart">
            <!-- LTE Gateway -->
                <div class="row mb-3 align-items-center" id="selectLTEGatewayItem">
                    <label class="col-12 col-md-6 textInSettings"><?= _CELLULARGATEWAY ?></label>
                    <div class="col-12 col-md-6">
                        <select class="form-select" name="selectLTEGateway" id="selectLTEGateway" onchange="lteGatewayFunction()">
                            <option value="false" <?= $rowCellularSettings["cellularGateway"] == "false" ? ' selected="selected"' : '' ?>><?= _DISABLED ?></option>
                            <option value="true" <?= $rowCellularSettings["cellularGateway"] == "true" ? ' selected="selected"' : '' ?>><?= _ENABLED ?></option>
                        </select>
                    </div>
                </div>

                <!-- IP Address -->
                <div class="row mb-3" id="interfaceIPAddressLabelItem" style="display:none;">
                    <label class="col-12 col-md-6 textInSettings" id="interfaceIPAddressLabel"><?= _INTERFACEIPADDRESS ?></label>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control" id="InterfaceIPAddress" readonly disabled value="<?= $WWanIP ?>">
                    </div>
                </div>

                <!-- IMEI -->
                <div class="row mb-3" id="imeiItem">
                    <label class="col-12 col-md-6 textInSettings"><?= _IMEI ?></label>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control" readonly disabled value="<?= $IMEI ?>">
                    </div>
                </div>

                <!-- IMSI -->
                <div class="row mb-3" id="imsiItem">
                    <label class="col-12 col-md-6 textInSettings"><?= _IMSI ?></label>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control" readonly disabled value="<?= $IMSI ?>">
                    </div>
                </div>

                <!-- ICCID -->
                <div class="row mb-3" id="iccidItem">
                    <label class="col-12 col-md-6 textInSettings"><?= _ICCID ?></label>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control" readonly disabled value="<?= $ICCID ?>">
                    </div>
                </div>

                <!-- APN -->
                <div class="row mb-3" id="apnItem">
                    <label class="col-12 col-md-6 textInSettings"><?= _APNNAME ?></label>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control" name="apn" id="apn" value="<?= htmlspecialchars($rowCellularSettings["apnName"]) ?>">
                        <span class="error text-danger" id="apnError"></span>
                        <div class="errorText">
                            <span class="alert text-danger" id="apnErr"></span>
                        </div>
                    </div>
                </div>

                <!-- APN Username -->
                <div class="row mb-3" id="apnUsernameItem">
                    <label class="col-12 col-md-6 textInSettings"><?= _APNUSERNAME ?></label>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control" name="apnUserName" id="apnUserName" value="<?= htmlspecialchars($rowCellularSettings["apnUsername"]) ?>">
                        <span class="error text-danger" id="apnUserNameError"></span>
                        <div class="errorText">
                            <span class="alert text-danger" id="apnUserNameErr"></span>
                        </div>
                    </div>
                </div>

                <!-- APN Password -->
                <div class="row mb-3" id="apnPasswordItem">
                    <label class="col-12 col-md-6 textInSettings"><?= _APNPASSWORD ?></label>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control" id="apnPassword" name="apnPassword" value="" onkeydown="listenerForEmptyText('apnPassword')">
                        <span class="error text-danger" id="apnPasswordError"></span>
                        <div class="errorText">
                            <span class="alert text-danger" id="apnPasswordErr"></span>
                        </div>
                    </div>
                </div>

                <!-- SIM PIN -->
                <div class="row mb-3" id="simpinItem">
                    <label class="col-12 col-md-6 textInSettings">SIM PIN:</label>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control" id="simPin" name="simPin" value="" onkeydown="listenerForEmptyText('simPin')">
                        <span class="error text-danger" id="simPinError"></span>
                        <div class="errorText">
                            <span class="alert text-danger" id="simPinErr"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div class="text-center my-4">
            <button type="button" id="interfaces_cellular_button" name="interfaces_cellular_button" class="btn btn-primary px-4" onclick="checkCellularNetworkForm()">
                <?= _SAVE ?>
            </button>
            <input type="submit" id="button_cellular_interfaces" name="button_cellular_interfaces" hidden>
        </div>
    </div>
</div>

<!-- Alerts -->
<div class="container mt-4" id="alertMessageForLTEFunction" style="display:none">
  <p class="dialogText" id="lteEnabled" style="display:none"><?= _WARNINGFORLTEENABLED ?></p>
  <p class="dialogTextBold"><?= _ACCEPTQUESTION ?></p>
</div>

<div class="container text-center mt-4" id="networkInterfaceAlertMessageCellular" style="display:none">
  <p class="dialogText" id="forCellular"><?= _WIFICONNECTIONCONFIRM ?></p>
</div>

<input type="submit" id="button_cellular_wlan" name="button_cellular_wlan" hidden>