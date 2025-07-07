<?php
    include_once "access_control.php";
?>
<div class="container" id="mainPageContainer">
  <div class="row justify-content-center">
    <div class="col-12 col-md-6">
      <div class="table-responsive">
        <table class="table table-sm table-borderless align-middle" style="border-collapse: separate; border-spacing: 5px 15px;">
          <tbody>
            <tr>
              <td class="px-2"><label class="from-label fw-semibold"><?= _USERNAME ?></label></td>
              <td class="px-2"><span class="infotext"><?php echo $dbCurrentUser; ?></span></td>
            </tr>
            <tr>
              <td class="px-2"><label class="form-label fw-semibold"><?= _CPSERIALNUMBER ?></label></td>
              <td class="px-2"><span class="infotext"><?php echo $serialNumber; ?></span></td>
            </tr>
            <tr>
              <td class="px-2"><label class="form-label fw-semibold"><?= _HMISOFTWAREVERSION ?></label></td>
              <td class="px-2"><span class="infotext"><?php echo $softwareVersion; ?></span></td>
            </tr>
            <tr>
              <td class="px-2"><label class="form-label fw-semibold"><?= _OCPPSOFTWAREVERSION ?></label></td>
              <td class="px-2"><span class="infotext"><?php echo $ocppSoftwareVersion; ?></span></td>
            </tr>
            <tr>
              <td class="px-2"><label class="form-label fw-semibold"><?= _POWERBOARDSOFTWAREVERSION ?></label></td>
              <td class="px-2"><span class="infotext"><?php echo $powerBoardVersion; ?></span></td>
            </tr>
            <tr>
              <td class="px-2"><label class="form-label fw-semibold"><?= _DURATIONAFTERPOWERON ?></label></td>
              <td class="px-2"><span id="durationText" class="infotext"><?php echo $duration; ?></span></td>
            </tr>
            <tr>
              <td class="px-2"><label class="form-label fw-semibold"><?= _CONNECTIONINTERFACE ?></label></td>
              <td class="px-2"><span class="infotext"><?php echo $IPsettings; ?></span></td>
            </tr>
            <tr>
              <td class="px-2"><label class="form-label fw-semibold"><?= _ETHERNETIP ?></label></td>
              <td class="px-2"><span class="infotext"><?php echo $LanIP; ?></span></td>
            </tr>
            <tr>
              <td class="px-2"><label class="form-label fw-semibold"><?= _WLANIP ?></label></td>
              <?php if (strtoupper($rowWlanSettings["enable"]) === "TRUE"): ?>
              <td class="px-2"><span class="infotext"><?php echo $WlanIP; ?></span></td>
              <?php if ($WlanIP !== "-"): ?>
            </tr>
            <tr>
              <td class="px-2" colspan="2" class="small text-muted">
                <?php echo  _STRENGTH .": ". $WifiStrength .", ". _WIFIFREQ .": ". $WifiFreq .", ". _WIFILEVEL .": ". $WifiLevel ; ?>
              </td>
            </tr>
              <?php endif; ?>
              <?php else: ?>
              <td class="px-2"><span class="infotext">-</span></td>
              <?php endif; ?>
            </tr>
            <tr>
              <td class="px-2"><label class="form-label fw-semibold"><?= _CELLULARIP ?></label></td>
              <td class="px-2"><span class="infotext"><?php echo $CellularIP; ?></span></td>
            </tr>
            <?php if ($CellularIP !== "-"): ?>
            <tr>
              <td class="px-2" colspan="2" class="small text-muted">
                <?php echo _STRENGTH .": ". $gSMStrength .", ". _CELLULAROPERCODE .": ". $gSMOperCode .", ". _CELLULARTECH.": " .$gSMTech ; ?>
              </td>
            </tr>
            <tr>
              <td class="px-2" colspan="2" class="small text-muted">
                <?php echo " RSRP: ".$gSMrsrp . ", RSRQ: " . $gSMRSrq . ", SINR:" . $gSMsinr; ?>
              </td>
            </tr>
            <?php endif; ?>
            <tr>
              <td class="px-2"><label class="form-label fw-semibold"><?= _OCPPDEVICEID ?></label></td>
              <td class="px-2"><span class="infotext"><?php echo htmlspecialchars(urldecode($rowOcppSettings["chargePointId"])); ?></span></td>
            </tr>
            <tr>
              <td class="px-2"><label class="form-label fw-semibold"><?= _CONNECTORSTATE ?> :</label></td>
              <td class="px-2">
                <span class="infotext">
                  <?php if ($chargePointStatus == "Faulted" && !empty($vendorErrorsArray)) { ?>
                    <?= $chargePointStatus ?> (<?= "E" . implode(', E', $vendorErrorsArray) ?>)
                  <?php } elseif ($chargeStationStatus == "InstallingFirmware") { ?>
                    Unavailable
                  <?php } else { ?>
                    <?= $chargePointStatus ?>
                  <?php } ?>
                </span>
              </td>
            </tr>
            <tr style="display:<?php echo $presetDisplay; ?>">
              <td class="px-2"><label class="form-label fw-semibold"><?= _PRESET ?></label></td>
              <td class="px-2">
                <select id="presetSelection" name="presetSelection" class="form-select form-select-sm">
                  <?php foreach ($rowPresetsSettings as $t) { ?>
                    <option id="<?php print $t['title']?>" value="<?php print $t['title'] ?>"<?php if($t['enable']=='true') echo 'selected="selected"'; ?>>
                      <?php echo $t['title'] ?>
                    </option>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr style="display:<?php echo $passwordResetAuthorizationDisplay; ?>">
              <td class="px-2 text-center" colspan="2">
                <button type="button" name="password_reset_authorization_button" id="password_reset_authorization_button" class="btn btn-primary" onclick="checkPasswordResetForm()">
                  <?= _RESETUSERPASSWORD ?>
                </button>
                <input type="submit" id="button_password_reset_authorization" name="button_password_reset_authorization" hidden>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="mt-4" style="display:<?php echo $presetDisplay; ?>; margin-left:auto; margin-right:auto; max-width:200px;">
        <button type="button" name="preset_button" id="preset_button" class="btn btn-primary w-100" onclick="checkPresetForm()">
          <?= _SAVE ?>
        </button>
        <input type="submit" id="button_preset" name="button_preset" hidden>
      </div>
    </div>
  </div>
  
</div>