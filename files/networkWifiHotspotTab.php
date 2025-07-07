<?php
    include_once "access_control.php";
?>

<div class="container" id="networkWifiHotspotPage">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8" style="z-index: 1;">
            <div class="d-flex align-items-center gap-2 mb-3">
                <p class="star mb-0"><b>*</b></p>
                <p class="explanation mb-0"><?= _EXPLANATION ?></p>
            </div>
            <!-- Açılışta Aktif Et -->
            <div class="row mb-4 align-items-center">
                <label class="col-12 col-md-6 textInSettings"><?= _TURNONDURINGBOOT ?></label>
                <div class="col-12 col-md-6">
                    <select class="form-select" id="selectWifiHotspot" name="selectWifiHotspot" onchange="wifiHotspotFunction()">
                        <option id="wifiHotspotDisable" value="wifiHotspotDisable" <?= $rowWifiHotspotSettings["enable"] == "false" ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
                        <option id="wifiHotspotEnable" value="wifiHotspotEnable" <?= $rowWifiHotspotSettings["enable"] == "true" ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
                    </select>
                </div>
            </div>

            <div id="wifiHotspotInfo">
                <div class="row mb-4 align-items-center" id="selectWifiHotspotAutoTurnOffItem">
                    <label class="col-12 col-md-6 textInSettings"><?= _AUTOTURNOFF ?></label>
                    <div class="col-12 col-md-6">
                        <select class="form-select" id="selectWifiHotspotAutoTurnOff" name="selectWifiHotspotAutoTurnOff" onchange="checkWifiHotspotTimeout()">
                            <option id="hotspotAutoTurnOffDisable" value="false" <?= $rowWifiHotspotSettings["autoTurnOff"] == "false" ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
                            <option id="hotspotAutoTurnOffEnable" value="true" <?= $rowWifiHotspotSettings["autoTurnOff"] == "true" ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
                        </select>
                    </div>
                </div>
                <div id="wifiHotspotTimeoutPart">
                    <div class="row mb-4 align-items-center" id="selectWifiHotspotTimeoutItem">
                        <label class="col-12 col-md-6 textInSettings"><?= _AUTOTURNOFFTIMEOUT ?></label>
                        <div class="col-12 col-md-6">
                            <select class="form-select" id="selectWifiHotspotTimeout" name="selectWifiHotspotTimeout">
                                <?php foreach ([5, 10, 15, 20, 25, 30] as $val): ?>
                                    <option id="hotspotTimeout<?= $val ?>" value="<?= $val ?>" <?= $rowWifiHotspotSettings["timeout"] == "$val" ? ' selected="selected"' : ''; ?>><?= $val ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3" id="wifiHotspotSSIDItem">
                    <label for="wifiHotspotSSID" class="form-label">SSID:</label>
                    <input type="text" class="form-control" id="wifiHotspotSSID" name="wifiHotspotSSID" value="<?= htmlspecialchars($rowWifiHotspotSettings["ssid"]); ?>">
                    <span class="text-danger small" id="wifiHotspotSSIDError">*</span>
                    <div class="text-danger small" id="wifiHotspotSSIDErr"></div>
                </div>

                <div class="mb-4" id="wifiHotspotPasswordItem">
                    <label for="wifiHotspotPassword" class="form-label"><?= _PASSWORD ?></label>
                    <input type="text" class="form-control" id="wifiHotspotPassword" name="wifiHotspotPassword" onkeydown="listenerForEmptyText('wifiHotspotPassword')" value="">
                    <div class="text-danger small" id="wifiHotspotPasswordErr"></div>
                </div>
            </div>
            
            <div class="text-center mb-4">
                <button type="button" id="interfaces_hotspot_button" name="interfaces_hotspot_button" class="btn btn-primary px-4" onclick="checkWifiHotspotForm()"> <?= _SAVE ?> </button>
            </div>      
            <input type="submit" id="button_hotspot_interfaces" name="button_hotspot_interfaces" hidden>
            <input type="submit" id="button_hotspot_reboot_now" name="button_hotspot_reboot_now" hidden>
        </div>
    </div>
</div>

<!-- Alert Messages (Popup'lar) -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div id="hotspotAlertMessage" style="display:none">
        <p class="dialogText text-center" id="hotspotAlert"><?= _HOTSPOTALERTMESSAGE ?></p>
        <p class="dialogTextBold text-center"><?= _HOTSPOTREBOOTMESSAGE ?></p>
      </div>

      <div id="alertMessageHotspot" style="display:none">
        <p class="dialogText text-center" id="forHotspot"><?= _WIFIHOTSPOTCONNECTIONCONFIRM ?></p>
      </div>
    </div>
  </div>
</div>
