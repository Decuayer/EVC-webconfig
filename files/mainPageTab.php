<?php
    include_once "access_control.php";
?>
<div class="centerElement">
  <table style="border-collapse:separate; border-spacing:10px 30px;">
    <tbody>
      <tr>
        <td><label><?= _USERNAME ?></label></td>
        <td><span class="infotext"><?php echo $dbCurrentUser; ?></span></td>
      </tr>
      <tr>
        <td><label><?= _CPSERIALNUMBER ?></label></td>
        <td><span class="infotext"><?php echo $serialNumber; ?></span></td>
      </tr>
      <tr>
        <td><label><?= _HMISOFTWAREVERSION ?></label></td>
        <td><span class="infotext"><?php echo $softwareVersion; ?></span></td>
      </tr>
      <tr>
        <td><label><?= _OCPPSOFTWAREVERSION ?></label></td>
        <td><span class="infotext"><?php echo $ocppSoftwareVersion; ?></span></td>
      </tr>
      <tr>
        <td><label><?= _POWERBOARDSOFTWAREVERSION ?></label></td>
        <td><span class="infotext"><?php echo $powerBoardVersion; ?></span></td>
      </tr>
      <tr>
        <td><label><?= _DURATIONAFTERPOWERON ?></label></td>
        <td><span id="durationText" class="infotext"><?php echo $duration; ?></span></td>
      </tr>
    </tbody>
    <tbody>
      <tr>
        <td><label><?= _CONNECTIONINTERFACE ?></label></td>
        <td><span class="infotext"><?php echo $IPsettings; ?></span></td>
      </tr>
      <tr>
        <td><label><?= _ETHERNETIP ?></label></td>
        <td><span class="infotext"><?php echo $LanIP; ?></span></td>
      </tr>
      <tr>
        <td><label><?= _WLANIP ?></label></td>
        <?php if (strtoupper($rowWlanSettings["enable"]) === "TRUE"): ?>
          <td><span class="infotext"><?php echo $WlanIP; ?></span></td>
          <?php if ($WlanIP !== "-"): ?>
          <tr>
        <td colspan="2">
        <?php echo  _STRENGTH .": ". $WifiStrength .", ". _WIFIFREQ .": ". $WifiFreq .", ". _WIFILEVEL .": ". $WifiLevel ; ?>
        </td>
        </tr>
        <?php endif; ?>
        <?php else: ?>
          <td><span class="infotext"><?php echo "-" ?></span></td>
        <?php endif; ?>
      </tr>
      <tr>
        <td><label><?= _CELLULARIP ?></label></td>
        <td><span class="infotext"><?php echo $CellularIP; ?></span></td>
      </tr>
      <?php if ($CellularIP !== "-"): ?>
      <tr>
        <td colspan="2">
        <?php echo _STRENGTH .": ". $gSMStrength .", ". _CELLULAROPERCODE .": ". $gSMOperCode .", ". _CELLULARTECH.": " .$gSMTech ; ?>
        </td>
        </tr>
        <tr>
        <td colspan="2">
         <?php echo " RSRP: ".$gSMrsrp . ", RSRQ: " . $gSMRSrq . ", SINR:" . $gSMsinr; ?>
        </td>
        </tr>
      <?php endif; ?>
      <tr>
        <td><label><?= _OCPPDEVICEID ?></label></td>
        <td><span class="infotext"><?php echo htmlspecialchars(urldecode($rowOcppSettings["chargePointId"])); ?></span></td>
      </tr>
      <!-- Connector status rows start here -->
      <tr>
          <td><label><?php echo _CONNECTORSTATE . " :" ?></label></td>
            <td>
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
      <!-- Connector status rows end here -->
      <tr style="display:<?php echo $presetDisplay; ?>">
        <td><label><?= _PRESET ?></label></td>
        <td>
        <div style="height:60px;" class="selectbox">
          <select id="presetSelection" name="presetSelection">
            <?php foreach ($rowPresetsSettings as $t) { ?>
              <option id="<?php print $t['title']?>" value="<?php print $t['title'] ?>"<?php if($t['enable']=='true') echo 'selected="selected"'; ?>>
                <?php echo $t['title'] ?>
              </option>
            <?php } ?>
          </select>
        </div>
        </td>
      </tr>
      <tr style="display:<?php echo $passwordResetAuthorizationDisplay; ?>">
        <td>
          <div id = "password_authorization_button_div">
            <button type="button" name="password_reset_authorization_button" id="password_reset_authorization_button" class="interfacesButton"  onclick="checkPasswordResetForm()"> <?= _RESETUSERPASSWORD ?> </button>
            <input type="submit" id="button_password_reset_authorization" name="button_password_reset_authorization" hidden>
          </div>
        </td>
      </tr>

    </tbody>
  </table>
</div>
<div style="display:<?php echo $presetDisplay; ?>;margin-top:34%;margin-left:35%;">
  <button type="button" name="preset_button" id="preset_button" class="interfacesButton" onclick="checkPresetForm()"> <?= _SAVE ?> </button>
  <input type="submit" id="button_preset" name="button_preset" hidden>
</div>
