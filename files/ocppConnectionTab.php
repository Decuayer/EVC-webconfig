<?php
    include_once "access_control.php";
?>
<div style="left:28.25%;width:60vw;position:absolute; z-index: 1;" id="ocppConnectionPage">
  <div>
    <p class="star" style="display: inline;"><b>*</b> </p>
    <p class="explanation" id="OCPPConnectionPart" style="display: inline;"><?= _EXPLANATION ?></p>
  </div>
  <br></br>
  <div style="height:35px;" id="selectOCPPConnectionItem">
    <!-- occp connection -->
    <span class="textForOccpSetting"><?= _OCPPCONNECTION ?></span>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select style="width:200px;" id="selectOCPPConnection" name="selectOCPPConnection" onchange="ocppConnection()">
        <option id="ocppDisable" value="2" <?= $rowStandaloneSettings["mode"] != "ocppList" ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
        <option id="ocppEnable" value="1" <?= $rowStandaloneSettings["mode"] == "ocppList" ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
      </select>
    </div>
  </div>
  <!--end of connection -->
  <br></br>
  <div id="OCPPVersionPartItem">
    <!-- occp version -->
    <span class="textForOccpSetting"><?= _OCPPVERSION ?></span>
    <div style="height:35px; margin-left:13vw;" class="selectbox">
      <select style="width:200px;" id="selectOcppVersion" name="selectOcppVersion">
        <option value="1.6" <?= $rowOcppSettings["ocppVersion"] == '1.6' ? ' selected="selected"' : ''; ?>>OCPP 1.6J</option>
      </select>
    </div>
  </div>
  <!--end of the ocp connection-->
  <br></br>
  <br></br>
  <div id="OCPPConnectionSettingsPart">
    <!--the ocp connection settings-->
    <span class="textForOccpSetting"><?= _CONNECTIONSETTINGS ?></span>
    <br></br>
    <br></br>
    <div id="centralSystemAddressItem">
      <label><?= _CENTRALSYSTEMADDRESS ?></label>
      <input type="text" id="centralSystemAddress" class="textarea1" style="margin-bottom: 1%;" name="centralSystemAddress" value=<?php echo htmlspecialchars($rowOcppSettings["centralSystemAddress"]); ?>>
      <span class="error" id="centralSystemError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="centralSystemErr"></span></div>
    </div>
    <div id="chargePointIdItem">
      <label><?= _CHARGEPOINTID ?></label>
      <input type="text" id="chargePointId" class="textarea1" style="margin-bottom: 1%;" name="chargePointId" value="<?php echo urldecode(htmlspecialchars(($rowOcppSettings["chargePointId"]))); ?>">
      <span class="error" id="chargePointIdError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="chargePointIdErr"></span></div>
    </div>
    <div id="wssSettingsItem">
      <label style="display:none"><?= _WSSCERTSSETTINGS ?></label>
      <input type="text" id="wssSettings" class="textarea1" name="wssSettings" style="display:none">
      <span class="error" id="wssError" style="display:none">*</span>
      <span class="alert" style="display:none;" id="wssErr"></span>
      </div>
  </div>
  <!--end of the ocp connection settings-->
  <div  id="selectOcppKeyItem">
    <!--selectOcppKey -->
    <span class="title" style="display:none"><?= _CONFKEYS ?></span>
    <div style="height:30px; margin-left:13vw;display:none" class="selectbox">
      <select name="selectOcppKey" id="selectOcppKey" style="display:none" disabled>
        <option name="Key 1" selected><?= _KEY ?> 1</option>
        <option name="Key 2"><?= _KEY ?> 2</option>
        <option name="Key 3"><?= _KEY ?> 3</option>
      </select>
    </div>
  </div>
  <!--selectOcppKey -->
  <div id="OCPPConfigurationPart">
    <!-- the occp configuration -->
    <button type="button" id="set_default_button" name="set_default_button" class="ocppButton" onclick="setDefaultParameters()"><?= _SETDEFAULT ?></button>
  </div><!-- end of configuration -->
  <br></br>
  <div style="height:35px;" id="freeModeActiveItem">
    <!-- the occp FreeModeActive -->
    <label style="width: 11vw;margin-top:1%;">FreeModeActive</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="freeModeActive" id="freeModeActive">
        <option id="freeModeActiveFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["FreeModeActive"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
        <option id="freeModeActiveTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["FreeModeActive"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
      </select>
    </div>
  </div><!-- end of FreeModeActive -->
  <br></br>
  <div id="freeModeRFIDItem">
    <!-- the occp FreeModeRFID -->
    <label>FreeModeRFID</label>
    <input type="text" id="freeModeRFID" class="textarea1" style="margin-bottom: 1%;" name="freeModeRFID" value="<?php echo htmlspecialchars($rowOcppConfigurations["FreeModeRFID"]); ?>">
    <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="freeModeRFIDErr"></span></div>
  </div><!-- end of the FreeModeRFID -->
  <div style="height:35px;" id="allowOfflineItem">
    <!-- the occp AllowOfflineTxForUnknownId -->
    <label style="width: 11vw;margin-top:1%;">AllowOfflineTxForUnknownId</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="allowOffline" id="allowOffline" style="width:15vw;">
        <option id="allowOfflineFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["AllowOfflineTxForUnknownId"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
        <option id="allowOfflineTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["AllowOfflineTxForUnknownId"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
      </select>
    </div>
  </div><!-- end of AllowOfflineTxForUnknownId -->
  <br></br>
  <div style="height:35px;" id="authorizationCacheItem">
    <!-- the occp AuthorizationCacheEnabled -->
    <label style="width: 11vw;margin-top:1%;">AuthorizationCacheEnabled</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="authorizationCache" id="authorizationCache" style="width:15vw;">
        <option id="authorizationCacheFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["AuthorizationCacheEnabled"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
        <option id="authorizationCacheTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["AuthorizationCacheEnabled"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
      </select>
    </div>
  </div><!-- the occp AuthorizationCacheEnabled -->
  <br></br>
  <div style="height:35px;" id="authorizeRemoteItem">
    <!-- the occp AuthorizeRemoteTxRequests -->
    <label style="width: 11vw;margin-top:1%;">AuthorizeRemoteTxRequests</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="authorizeRemote" id="authorizeRemote" style="width:15vw;">
        <option id="authorizeRemoteFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["AuthorizeRemoteTxRequests"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
        <option id="authorizeRemoteTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["AuthorizeRemoteTxRequests"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
      </select>
    </div>
  </div><!-- end the occp AuthorizeRemoteTxRequests -->
  <br></br>
  <br></br>
  <div>
    <!-- the occp blank -->
    <div id="AuthorizationKeyItem">
      <label>AuthorizationKey</label>
      <input type="text" id="authorizationKey" class="textarea1" style="margin-bottom: 1%;" name="authorizationKey" onchange="checkAuthorizationKey()" onkeydown="listenerForEmptyText('authorizationKey')" value="">
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="authorizationKeyErr"></span></div>
    </div>
    <br></br>
    <div id="blinkRepeatItem">
      <label>BlinkRepeat</label>
      <input type="text" id="blinkRepeat" class="textarea1" style="margin-bottom: 1%;" name="blinkRepeat" value=<?php echo htmlspecialchars($rowOcppConfigurations["BlinkRepeat"]); ?>>
      <span class="error" id="blinkRepeatError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="blinkRepeatErr"></span></div>
    </div>
    <div id="chargeProfileMaxStackLevelItem">
      <label>ChargeProfileMaxStackLevel</label>
      <input type="text" id="chargeProfileMaxStackLevel" class="textarea1" style="margin-bottom: 1%;background-color: #d6d2d1" name="chargeProfileMaxStackLevel" readonly value=<?php echo htmlspecialchars($rowOcppConfigurations["ChargeProfileMaxStackLevel"]); ?>>
      <span class="error" id="chargeProfileMaxStackLevelError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="chargeProfileMaxStackLevelErr"></span></div>
    </div>
    <div id="chargingScheduleAllowedChargingRateUnitItem">
      <label>ChargingScheduleAllowedChargingRateUnit</label>
      <input type="text" id="chargingScheduleAllowedChargingRateUnit" class="textarea1" style="margin-bottom: 1%;background-color: #d6d2d1" name="chargingScheduleAllowedChargingRateUnit" readonly value=<?php echo htmlspecialchars($rowOcppConfigurations["ChargingScheduleAllowedChargingRateUnit"]); ?>>
      <span class="error" id="chargingScheduleAllowedChargingRateUnitError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="chargingScheduleAllowedChargingRateUnitErr"></span></div>
    </div>
    <div id="chargingScheduleMaxPeriodsItem">
      <label>ChargingScheduleMaxPeriods</label>
      <input type="text" id="chargingScheduleMaxPeriods" class="textarea1" style="margin-bottom: 1%;background-color: #d6d2d1" name="chargingScheduleMaxPeriods" readonly value=<?php echo htmlspecialchars($rowOcppConfigurations["ChargingScheduleMaxPeriods"]); ?>>
      <span class="error" id="chargingScheduleMaxPeriodsError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="chargingScheduleMaxPeriodsErr"></span></div>
    </div>
    <div id="clocAlignedkDataItem">
      <label>ClockAlignedDataInterval</label>
      <input type="text" id="clockData" class="textarea1" style="margin-bottom: 1%;" name="clockData" value=<?php echo htmlspecialchars($rowOcppConfigurations["ClockAlignedDataInterval"]); ?>>
      <span class="error" id="clockDataError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="clockDataErr"></span></div>
    </div>
    <div id="connectionTimeOutItem">
      <label>ConnectionTimeOut</label>
      <input type="text" id="connectionTimeOut" class="textarea1" style="margin-bottom: 1%;" name="connectionTimeOut" value=<?php echo htmlspecialchars($rowOcppConfigurations["ConnectionTimeOut"]); ?>>
      <span class="error" id="connectionTimeOutError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="connectionTimeOutErr"></span></div>
    </div>
    <div id="connectorPhaseRotationItem">
      <label>ConnectorPhaseRotation</label>
      <input type="text" id="connectorPhase" class="textarea1" style="margin-bottom: 1%;background-color: #d6d2d1;" name="connectorPhase" readonly value=<?php echo htmlspecialchars($rowOcppConfigurations["ConnectorPhaseRotation"]); ?>>
      <span class="error" id="connectorPhaseError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="connectorPhaseErr"></span></div>
    </div>
    <div id="connectorPhaserRotationMaxLengthItem">
      <label>ConnectorPhaseRotationMaxLength</label>
      <input type="text" id="rotationMaxLength" class="textarea1" style="margin-bottom: 1%;background-color: #d6d2d1;" name="rotationMaxLength" readonly value=<?php echo htmlspecialchars($rowOcppConfigurations["ConnectorPhaseRotationMaxLength"]); ?>>
      <span class="error" id="rotationMaxLengthError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="rotationMaxLengthErr"></span></div>
    </div>
  </div>
  <div style="height:35px;" id="bootNotificationAfterConnectionLossItem">
    <!-- the occp BootNotificationAfterConnectionLoss -->
      <label style="width: 11vw;margin-top:1%;" id="bootNotificationAfterConnectionLossVal">BootNotificationAfterConnectionLoss</label>
      <div style="height:30px; margin-left:13vw;" class="selectbox">
        <select name="bootNotificationAfterConnectionLoss" id="bootNotificationAfterConnectionLoss" style="width: 15vw;">
          <option id="bootNotificationAfterConnectionLossTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["BootNotificationAfterConnectionLoss"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
          <option id="bootNotificationAfterConnectionLossFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["BootNotificationAfterConnectionLoss"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
        </select>
      </div>
  </div><!-- end the occp BootNotificationAfterConnectionLoss -->
  <br></br>
  <div style="height:35px;" id="centralSmartChargingWithNoTrippingItem">
    <!-- the occp CentralSmartChargingWithNoTripping -->
      <label style="width: 11vw;margin-top:1%;" id="centralSmartChargingWithNoTrippingVal">CentralSmartChargingWithNoTripping</label>
      <div style="height:30px; margin-left:13vw;" class="selectbox">
        <select name="centralSmartChargingWithNoTripping" id="centralSmartChargingWithNoTripping" style="width:15vw;">
          <option id="centralSmartChargingWithNoTrippingFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["CentralSmartChargingWithNoTripping"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
          <option id="centralSmartChargingWithNoTrippingTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["CentralSmartChargingWithNoTripping"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
        </select>
      </div>
  </div><!-- end the occp CentralSmartChargingWithNoTripping -->
  <br></br>
  <div style="height:35px;" id="connectorSwitch3to1PhaseSupportedItem">
    <!-- the occp ConnectorSwitch3to1PhaseSupported -->
    <label style="width: 11vw;margin-top:1%;" id="connectorSwitch3to1PhaseSupportedVal">ConnectorSwitch3to1PhaseSupported</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="connectorSwitch3to1PhaseSupported" id="connectorSwitch3to1PhaseSupported" readonly style="background-color: #d6d2d1; width:15vw;">
        <option value="FALSE" <?= strtoupper($rowOcppConfigurations["ConnectorSwitch3to1PhaseSupported"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
        <option value="TRUE" <?= strtoupper($rowOcppConfigurations["ConnectorSwitch3to1PhaseSupported"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
      </select>
    </div>
  </div><!-- end the occp ConnectorSwitch3to1PhaseSupported -->
  <br></br>
  <div style="height:35px;" id="continueChargingAfterPowerLossItem">
    <!-- the occp ContinueChargingAfterPowerLoss -->
    <label style="width: 11vw;margin-top:1%;" id="continueChargingAfterPowerLossVal">ContinueChargingAfterPowerLoss</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="continueChargingAfterPowerLoss" id="continueChargingAfterPowerLoss" style="width: 15vw;">
        <option id="continueChargingAfterPowerLossFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["ContinueChargingAfterPowerLoss"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
        <option id="continueChargingAfterPowerLossTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["ContinueChargingAfterPowerLoss"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
      </select>
    </div>
  </div><!-- end the occp ContinueChargingAfterPowerLoss -->
  <br></br>
  <br></br>
  <div id="CTStationCurrentInformationIntervalItem">
    <!-- the occp CTStationCurrentInformationInterval -->
    <label>CTStationCurrentInformationInterval</label>
    <input type="text" id="CTStationCurrentInformationInterval" class="textarea1" style="margin-bottom: 1%;" name="CTStationCurrentInformationInterval" value=<?php echo htmlspecialchars($rowOcppConfigurations["CTStationCurrentInformationInterval"]); ?>>
    <span class="error" id="CTStationCurrentInformationIntervalError">*</span>
    <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="CTStationCurrentInformationIntervalErr"></span></div>
  </div><!-- end the occp CTStationCurrentInformationInterval -->
    <div style="height:35px;" id="newTransactionAfterPowerLossItem">
    <!-- the occp NewTransactionAfterPowerLoss -->
    <label style="width: 11vw;margin-top:1%;">NewTransactionAfterPowerLoss</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="newTransactionAfterPowerLoss" id="newTransactionAfterPowerLoss">
        <option id="newTransactionAfterPowerLossFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["NewTransactionAfterPowerLoss"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
        <option id="newTransactionAfterPowerLossTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["NewTransactionAfterPowerLoss"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
      </select>
    </div>
  </div><!-- end the occp NewTransactionAfterPowerLoss -->
  <br><br>
  <div style="height:35px;" id="dailyRebootItem">
    <!-- the occp DailyReboot -->
    <label style="width: 11vw;margin-top:1%;">DailyReboot</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="dailyReboot" id="dailyReboot">
        <option id="dailyRebootTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["DailyReboot"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
        <option id="dailyRebootFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["DailyReboot"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
      </select>
    </div>
  </div><!-- end the occp DailyReboot -->
  <br></br>
  <div id="dailyRebootTimeItem">
    <!-- the occp DailyRebootTime -->
    <label style="width: 11vw;margin-top:1%;">DailyRebootTime</label>
    <div style="height:30px; margin-left:13vw;" name="dailyRebootTime" id="dailyRebootTime">
      <input type="time" class="textareaForLocalLoadGroup" style="margin-left:11vw; margin-top:0.1vw; height:50px; padding:0px 0px 0px 0px;" id="dailyRebootTimeInput" name="dailyRebootTime" value=<?php echo htmlspecialchars($rowOcppConfigurations["DailyRebootTime"]);?>></td>
    </div><!-- end the occp DailyRebootTime -->
  </div>
  <br></br>
  <div id="dailyRebootTypeItem">
    <!-- the occp DailyRebootType -->
    <label style="width: 11vw;margin-top:1%;">DailyRebootType</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="dailyRebootType" id="dailyRebootType">
        <option id="dailyRebootTypeSoft" value="SOFT" <?= strtoupper($rowOcppConfigurations["DailyRebootType"]) == "SOFT" ? ' selected="selected"' : ''; ?>>Soft Reset</option>
        <option id="dailyRebootTypeHard" value="HARD" <?= strtoupper($rowOcppConfigurations["DailyRebootType"]) == "HARD" ? ' selected="selected"' : ''; ?>>Hard Reset</option>
      </select>
    </div><!-- end the occp DailyRebootType -->
  </div>
  <br></br>
  <br></br>
  <div>
    <div id="getConfigurationMaxKeysItem">
      <label>GetConfigurationMaxKeys</label>
      <input type="text" id="maxKeys" class="textarea1" style="margin-bottom: 1%;background-color: #d6d2d1;" name="maxKeys" readonly value=<?php echo htmlspecialchars($rowOcppConfigurations["GetConfigurationMaxKeys"]); ?>>
      <span class="error" id="maxKeysError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="maxKeysErr"></span></div>
    </div>
    <div id="heartbeatIntervalItem">
      <label>HeartbeatInterval</label>
      <input type="text" id="heartbeat" class="textarea1" style="margin-bottom: 1%;background-color: #d6d2d1;" name="heartbeat" readonly value=<?php echo htmlspecialchars($rowOcppConfigurations["HeartbeatInterval"]); ?>>
      <span class="error" id="heartbeatError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="heartbeatErr"></span></div>
    </div>
    <!-- the occp InstallationErrorEnable -->
    <div style="height:35px;" id="installationErrorEnableItem">
    <label style="width: 11vw;margin-top:1%;">InstallationErrorEnable</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="installationErrorEnable" id="installationErrorEnable">
        <option value="TRUE" <?= strtoupper($rowOcppConfigurations["InstallationErrorEnable"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
        <option value="FALSE" <?= strtoupper($rowOcppConfigurations["InstallationErrorEnable"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
      </select>
    </div>
  </div><!-- end the occp InstallationErrorEnable -->
  <br></br>
  <div id="LEDTimeoutEnableItem">
    <!-- LEDTimeoutEnable  -->
    <label style="width: 11vw;margin-top:1%;">LEDTimeoutEnable</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="LEDTimeoutEnable" id="LEDTimeoutEnable">
        <option id="LEDTimeoutEnableItemTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["LEDTimeoutEnable"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
        <option id="LEDTimeoutEnableItemFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["LEDTimeoutEnable"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
      </select>
    </div>
  </div><!-- LEDTimeoutEnableItem -->
  <br></br>
  <br></br>
    <div id="lightIntensityItem">
      <label>LightIntensity</label>
      <input type="text" id="light" class="textarea1" style="margin-bottom: 1%;" name="light" value=<?php echo htmlspecialchars($rowOcppConfigurations["LightIntensity"]); ?>>
      <span class="error" id="lightError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="lightErr"></span></div>
    </div>
  </div>
  <div id="localAuthListEnabledItem">
    <!-- LocalAuthListEnabled  -->
    <label style="width: 11vw;margin-top:1%;">LocalAuthListEnabled</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="localAuthListEnabled" id="localAuthListEnabled">
        <option id="localAuthListEnabledTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["LocalAuthListEnabled"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
        <option id="localAuthListEnabledFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["LocalAuthListEnabled"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
      </select>
    </div>
  </div><!-- LocalAuthListEnabled -->
  <br></br>
  <br></br>
  <div id="localAuthListMaxLengthItem">
    <!-- localAuthListMaxLength -->
    <label>LocalAuthListMaxLength</label>
    <input type="text" id="localAuthListMaxLength" class="textarea1" style="margin-bottom: 1%;" name="localAuthListMaxLength" value=<?php echo htmlspecialchars($rowOcppConfigurations["LocalAuthListMaxLength"]); ?>>
    <span class="error" id="localAuthListMaxLengthError">*</span>
    <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="localAuthListMaxLengthErr"></span></div>
  </div>
  <div id="localAuthorizeOfflineItem">
    <!-- local authorization -->
    <label style="width: 11vw;margin-top:1%;">LocalAuthorizeOffline</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="authorizeOffline" id="authorizeOffline">
        <option id="authorizeOfflineTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["LocalAuthorizeOffline"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
        <option id="authorizeOfflineFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["LocalAuthorizeOffline"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
      </select>
    </div>
  </div><!-- local authorization -->
  <br></br>
  <br></br>
  <div id="localPreAuthorizeItem">
    <!-- LocalPreAuthorize -->
    <label style="width: 11vw;margin-top:1%;">LocalPreAuthorize</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="localPreAuthorize" id="localPreAuthorize">
        <option id="localPreAuthorizeFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["LocalPreAuthorize"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
        <option id="localPreAuthorizeTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["LocalPreAuthorize"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
      </select>
    </div>
  </div>
  <!--LocalPreAuthorize -->
  <br></br>
  <br></br>
  <div>
    <!-- MaxEnergyOnInvalidId -->
    <div id="maxChargingProfilesInstalledItem">
      <label>MaxChargingProfilesInstalled</label>
      <input type="text" id="maxChargingProfilesInstalled" class="textarea1" style="margin-bottom: 1%;background-color: #d6d2d1;" name="maxChargingProfilesInstalled" readonly value=<?php echo htmlspecialchars($rowOcppConfigurations["MaxChargingProfilesInstalled"]); ?>>
      <span class="error" id="maxChargingProfilesInstalledError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="maxChargingProfilesInstalledErr"></span></div>
    </div>
    <div id="maxEnergyOnInvalidIdItem">
      <label>MaxEnergyOnInvalidId</label>
      <input type="text" id="maxEnergy" class="textarea1" style="margin-bottom: 1%;" name="maxEnergy" value=<?php echo htmlspecialchars($rowOcppConfigurations["MaxEnergyOnInvalidId"]); ?>>
      <span class="error" id="maxEnergyError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="maxEnergyErr"></span></div>
    </div>
    <div id="maxPowerChargeCompleteItem">
      <label>MaxPowerChargeComplete</label>
      <input type="text" id="maxPowerChargeComplete" class="textarea1" style="margin-bottom: 1%;" name="maxPowerChargeComplete" value=<?php echo htmlspecialchars($rowOcppConfigurations["MaxPowerChargeComplete"]); ?>>
      <span class="error" id="maxPowerChargeCompleteError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="maxPowerChargeCompleteErr"></span></div>
    </div>
    <div id="maxTimeChargeCompleteItem">
      <label>MaxTimeChargeComplete</label>
      <input type="text" id="maxTimeChargeComplete" class="textarea1" style="margin-bottom: 1%;" name="maxTimeChargeComplete" value=<?php echo htmlspecialchars($rowOcppConfigurations["MaxTimeChargeComplete"]); ?>>
      <span class="error" id="maxTimeChargeCompleteError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="maxTimeChargeCompleteErr"></span></div>
    </div>
    <div id="meterValuesAlignedDataItem">
      <label>MeterValuesAlignedData</label>
      <input type="text" id="alignedData" class="textarea1" style="margin-bottom: 1%;" name="alignedData" value=<?php echo htmlspecialchars($rowOcppConfigurations["MeterValuesAlignedData"]); ?>>
      <span class="error" id="alignedDataError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="alignedDataErr"></span></div>
    </div>
    <div id="meterValuesAlignedDataMaxLengthItem">
      <label>MeterValuesAlignedDataMaxLength</label>
      <input type="text" id="alignedDataMaxLength" class="textarea1" style="margin-bottom: 1%;background-color: #d6d2d1;" name="alignedDataMaxLength" readonly value=<?php echo htmlspecialchars($rowOcppConfigurations["MeterValuesAlignedDataMaxLength"]); ?>>
      <span class="error" id="alignedDataMaxLengthError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="alignedDataMaxLengthErr"></span></div>
    </div>
    <div id="meterValuesSampleDataItem">
      <label>MeterValuesSampledData</label>
      <input type="text" id="sampleData" class="textarea1" style="margin-bottom: 1%;" name="sampleData" value=<?php echo htmlspecialchars($rowOcppConfigurations["MeterValuesSampledData"]); ?>>
      <span class="error" id="sampleDataError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="sampleDataErr"></span></div>
    </div>
    <div id="meterValuesSampledDataMaxLengthItem">
      <label>MeterValuesSampledDataMaxLength</label>
      <input type="text" id="meterValuesSampledDataMaxLength" class="textarea1" style="margin-bottom: 1%;background-color: #d6d2d1;" name="meterValuesSampledDataMaxLength" readonly value=<?php echo htmlspecialchars($rowOcppConfigurations["MeterValuesSampledDataMaxLength"]); ?>>
      <span class="error" id="meterValuesSampledDataMaxLengthError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="meterValuesSampledDataMaxLengthErr"></span></div>
    </div>
    <div id="meterValuesSampleIntervalItem">
      <label>MeterValueSampleInterval</label>
      <input type="text" id="sampleInterval" class="textarea1" style="margin-bottom: 1%;" name="sampleInterval" value=<?php echo htmlspecialchars($rowOcppConfigurations["MeterValueSampleInterval"]); ?>>
      <span class="error" id="sampleIntervalError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="sampleIntervalErr"></span></div>
    </div>
    <div id="minimumStatusDurationItem">
      <label>MinimumStatusDuration</label>
      <input type="text" id="minDuration" class="textarea1" style="margin-bottom: 1%;" name="minDuration" value=<?php echo htmlspecialchars($rowOcppConfigurations["MinimumStatusDuration"]); ?>>
      <span class="error" id="minDurationError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="minDurationErr"></span></div>
    </div>
    <div id="numberOfConnectorsItem">
      <label>NumberOfConnectors</label>
      <input type="text" id="connectorNum" class="textarea1" style="margin-bottom: 1%;background-color: #d6d2d1;" name="connectorNum" readonly value=<?php echo htmlspecialchars($rowOcppConfigurations["NumberOfConnectors"]); ?>>
      <span class="error" id="connectorNumError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="connectorNumErr"></span></div>
    </div>
  </div>
  <div id="ocppSecurityProfileItem">
    <!-- SecurityProfile -->
    <label style="width: 11vw;margin-top:1%;">OcppSecurityProfile</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="ocppSecurityProfile" id="ocppSecurityProfile">
        <option id="OcppSecurityProfile0" value=0 <?= $rowOcppConfigurations["OcppSecurityProfile"] == 0 ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
        <option id="OcppSecurityProfile1" value=1 <?= $rowOcppConfigurations["OcppSecurityProfile"]== 1 ? ' selected="selected"' : ''; ?>>1</option>
        <option id="OcppSecurityProfile2" value=2 <?= $rowOcppConfigurations["OcppSecurityProfile"] == 2 ? ' selected="selected"' : ''; ?>>2</option>
        <option id="OcppSecurityProfile3" value=3 <?= $rowOcppConfigurations["OcppSecurityProfile"]== 3 ? ' selected="selected"' : ''; ?>>3</option>
      </select>
    </div><!-- SecurityProfile -->
  </div>
  <br></br>
  <br></br>
  <div id="RandomDelayOnDailyRebootEnabledItem">
    <!-- RandomDelayOnDailyRebootEnabled  -->
    <label style="width: 11vw;margin-top:1%;">RandomDelayOnDailyRebootEnabled</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="randomDelayOnDailyRebootEnabled" id="randomDelayOnDailyRebootEnabled">
        <option id="RandomDelayOnDailyRebootEnabledItemTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["RandomDelayOnDailyRebootEnabled"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
        <option id="RandomDelayOnDailyRebootEnabledFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["RandomDelayOnDailyRebootEnabled"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
      </select>
    </div>
  </div><!-- RandomDelayOnDailyRebootEnabledItem -->
  <br></br>
  <br></br>
  <div id="ContinueChargingAfterPenError">
    <!-- ContinueChargingAfterPenError  -->
    <label style="width: 11vw;margin-top:1%;">ContinueChargingAfterPenError</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="continueChargingAfterPenError" id="continueChargingAfterPenError">
        <option id="ContinueChargingAfterPenErrorTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["ContinueChargingAfterPenError"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
        <option id="ContinueChargingAfterPenErrorFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["ContinueChargingAfterPenError"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
      </select>
    </div>
  </div><!-- ContinueChargingAfterPenError -->
  <br></br>
  <br></br>
  <div id="WebconfigEnabled">
    <!-- WebconfigEnabled  -->
    <label style="width: 11vw;margin-top:1%;">WebconfigEnabled</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="webconfigEnabled" id="webconfigEnabled">
        <option id="WebconfigEnabledTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["WebconfigEnabled"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
        <option id="WebconfigEnabledFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["WebconfigEnabled"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
      </select>
    </div>
  </div><!-- WebconfigEnabled -->
  <br></br>
  <br></br>
  <div id="reserveConnectorZeroSupportedItem">
    <!-- ReserveConnectorZeroSupported -->
    <label style="width: 11vw;margin-top:1%;">ReserveConnectorZeroSupported</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="reserveConnectorZeroSupported" id="reserveConnectorZeroSupported" readonly style="background-color: #d6d2d1;">
        <option value="TRUE" <?= strtoupper($rowOcppConfigurations["ReserveConnectorZeroSupported"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
        <option value="FALSE" <?= strtoupper($rowOcppConfigurations["ReserveConnectorZeroSupported"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>

      </select>
    </div>
  </div>
  <!--ReserveConnectorZeroSupported -->
  <br></br>
  <br></br>
  <div id="rfidEndiannessItem">
    <!-- RfidEndianness -->
    <label style="width: 11vw;margin-top:1%;">RfidEndianness</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="rfidEndianness" id="rfidEndianness">
        <option id="rfidEndiannessBigEndian" value="big-endian" <?= $rowOcppConfigurations["RfidEndianness"] == 'big-endian' ? ' selected="selected"' : ''; ?>>Big-Endian</option>
        <option id="rfidEndiannessLittleEndian" value="little-endian" <?= $rowOcppConfigurations["RfidEndianness"] == 'little-endian' ? ' selected="selected"' : ''; ?>>Little-Endian</option>
      </select>
    </div>
  </div>
  <!--RfidEndianness -->
  <br></br>
  <br></br>
  <div id="resetRetriesItem">
    <label>ResetRetries</label>
    <input type="text" id="resetRetries" class="textarea1" style="margin-bottom: 1%;" name="resetRetries" value=<?php echo htmlspecialchars($rowOcppConfigurations["ResetRetries"]); ?>>
    <span class="error" id="resetRetriesError">*</span>
    <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="resetRetriesErr"></span></div>
  </div><!-- maxenergy -->


 <!-- SendDataTransferMeterConfigurationForNonEichrecht -->
 <div id="sendDataTransferMeterConfigurationForNonEichrechtItem">
 <label style="width: 11vw;margin-top:1%;">SendDataTransferMeter ConfigurationForNonEichrecht</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="sendDataTransferMeterConfigurationForNonEichrecht" id="sendDataTransferMeterConfigurationForNonEichrecht">
        <option id="sendDataTransferMeterConfigurationForNonEichrechtFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["SendDataTransferMeterConfigurationForNonEichrecht"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
        <option id="sendDataTransferMeterConfigurationForNonEichrechtTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["SendDataTransferMeterConfigurationForNonEichrecht"])== 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
      </select>
    </div><!-- SendDataTransferMeterConfigurationForNonEichrecht -->
  </div>
  <br></br>
  <br></br>




  <div id="sendLocalListMaxLengthItem">
    <label>SendLocalListMaxLength</label>
    <input type="text" id="sendLocalListMaxLength" class="textarea1" style="margin-bottom: 1%;" name="sendLocalListMaxLength" value=<?php echo htmlspecialchars($rowOcppConfigurations["SendLocalListMaxLength"]); ?>>
    <span class="error" id="sendLocalListMaxLengthError">*</span>
    <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="sendLocalListMaxLengthErr"></span></div>
  </div>
  <div id="sendTotalPowerValueItem">
    <!-- SendTotalPowerValue -->
    <label style="width: 11vw;margin-top:1%;">SendTotalPowerValue</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="sendTotalPowerValue" id="sendTotalPowerValue">
        <option id="sendTotalPowerValueFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["SendTotalPowerValue"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
        <option id="sendTotalPowerValueTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["SendTotalPowerValue"])== 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
      </select>
    </div><!-- SendTotalPowerValue -->
  </div>
  <br></br>
  <br></br>
  <div id="stopTransactionOnEVSideDisconnectItem">
    <!-- StopTransactionOnEVSideDisconnect -->
    <label style="width: 11vw;margin-top:1%;">StopTransactionOnEVSideDisconnect</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="disconnect" id="disconnect">
        <option id="disconnectTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["StopTransactionOnEVSideDisconnect"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
        <option id="disconnectFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["StopTransactionOnEVSideDisconnect"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
      </select>
    </div>
  </div><!-- StopTransactionOnEVSideDisconnect -->
  <br></br>
  <br></br>
  <div id="stopTransactionOnInvalidIdItem">
    <!-- StopTransactionOnInvalidId -->
    <label style="width: 11vw;margin-top:1%;">StopTransactionOnInvalidId</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="stopInvalidId" id="stopInvalidId">
        <option id="stopInvalidIdTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["StopTransactionOnInvalidId"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
        <option id="stopInvalidIdFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["StopTransactionOnInvalidId"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
      </select>
    </div>
  </div><!-- StopTransactionOnInvalidId -->
  <br></br>
  <br></br>
  <div>
    <!-- StopTxnAlignedData -->
    <div id="stopTxAlignedItem">
      <label>StopTxnAlignedData</label>
      <input type="text" id="stopAligned" class="textarea1" style="margin-bottom: 1%;" name="stopAligned" value=<?php echo htmlspecialchars($rowOcppConfigurations["StopTxnAlignedData"]); ?>>
      <span class="error" id="stopAlignedError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="stopAlignedErr"></span></div>
    </div>
    <div id="stopTxnAlignedDataMaxLengthItem">
      <label>StopTxnAlignedDataMaxLength</label>
      <input type="text" id="stopAlignedMax" class="textarea1" style="margin-bottom: 1%;;background-color: #d6d2d1;" name="stopAlignedMax" readonly value=<?php echo htmlspecialchars($rowOcppConfigurations["StopTxnAlignedDataMaxLength"]); ?>>
      <span class="error" id="stopAlignedMaxError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="stopAlignedMaxErr"></span></div>
    </div>
    <div id="stopTxSampledItem">
      <label>StopTxnSampledData</label>
      <input type="text" id="stopSampled" class="textarea1" style="margin-bottom: 1%;" name="stopSampled" value=<?php echo htmlspecialchars($rowOcppConfigurations["StopTxnSampledData"]); ?>>
      <span class="error" id="stopSampledError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="stopSampledErr"></span></div>
    </div>
    <div id="stopTxSampledDataMaxLengthItem">
      <label>StopTxnSampledDataMaxLength</label>
      <input type="text" id="stopSampledMax" class="textarea1" style="margin-bottom: 1%;;background-color: #d6d2d1;" name="stopSampledMax" readonly value=<?php echo htmlspecialchars($rowOcppConfigurations["StopTxnSampledDataMaxLength"]); ?>>
      <span class="error" id="stopSampledMaxError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="stopSampledMaxErr"></span></div>
    </div>
    <div id="supportedFeatureProfilesItem">
      <label>SupportedFeatureProfiles</label>
      <input type="text" id="supported" class="textarea1" style="margin-bottom: 1%;;background-color: #d6d2d1;font-size: 12px;" name="supported" readonly value='<?php echo htmlspecialchars($rowOcppConfigurations["SupportedFeatureProfiles"]); ?>' \>
      <span class="error" id="supportedError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="supportedErr"></span></div>
    </div>
    <div id="supportedFeatureProfilesMaxLengthItem">
      <label>SupportedFeatureProfilesMaxLength</label>
      <input type="text" id="supportedMax" class="textarea1" style="margin-bottom: 1%;;background-color: #d6d2d1;" name="supportedMax" readonly value=<?php echo htmlspecialchars($rowOcppConfigurations["SupportedFeatureProfilesMaxLength"]); ?>>
      <span class="error" id="supportedMaxError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="supportedMaxErr"></span></div>
    </div>
    <div id="transactionMessageAttemptsItem">
      <label>TransactionMessageAttempts</label>
      <input type="text" id="attempts" class="textarea1" style="margin-bottom: 1%;" name="attempts" value=<?php echo htmlspecialchars($rowOcppConfigurations["TransactionMessageAttempts"]); ?>>
      <span class="error" id="attemptsError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="attemptsErr"></span></div>
    </div>
    <div id="transactionMessageRetryIntervalItem">
      <label>TransactionMessageRetryInterval</label>
      <input type="text" id="retryInterval" class="textarea1" style="margin-bottom: 1%;" name="retryInterval" value=<?php echo htmlspecialchars($rowOcppConfigurations["TransactionMessageRetryInterval"]); ?>>
      <span class="error" id="retryIntervalError">*</span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="retryIntervalErr"></span></div>
    </div>
  </div><!-- StopTxnAlignedData -->
  <div id="UKSmartChargingEnabledItem">
    <label style="width: 11vw;margin-top:1%;">UKSmartChargingEnabled</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="UKSmartCharging" id="UKSmartCharging">
        <option id="UKSmartChargingTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["UKSmartChargingEnabled"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
        <option id="UKSmartChargingFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["UKSmartChargingEnabled"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
      </select>
    </div>
  </div>
  <br></br>
  <br></br>
  <div id="unlockConnectorOnEVSideDisconnectItem">
    <label style="width: 11vw;margin-top:1%;">UnlockConnectorOnEVSideDisconnect</label>
    <div style="height:30px; margin-left:13vw;" class="selectbox">
      <select name="unlockConnector" id="unlockConnector">
        <option id="unlockConnectorTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["UnlockConnectorOnEVSideDisconnect"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
        <option id="unlockConnectorFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["UnlockConnectorOnEVSideDisconnect"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
      </select>
    </div>
  </div>
  <br></br>
  <br></br>
  <div id="webSocketPingIntervalItem" >
    <!--WebSocketPingInterval -->
    <label>WebSocketPingInterval</label>
    <input type="text" id="pingInterval" class="textarea1" style="margin-bottom: 1%;" name="pingInterval" value=<?php echo htmlspecialchars($rowOcppConfigurations["WebSocketPingInterval"]); ?>>
    <span class="error" id="pingIntervalError">*</span>
    <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="pingIntervalErr"></span></div>
  </div><!-- WebSocketPingInterval -->
  <br></br>
  <button type="button" id="ocpp_button" name="ocpp_button" class="interfacesButton" onclick="checkOcppForm()" style="text-transform: uppercase;"> <?= _SAVE ?> </button>
  <input type="submit" id="button_ocpp" name="button_ocpp" hidden>
</div><!-- general div -->

<div id="ocppModeSelectionAlertMessage" style="display:none">
    <p class="dialogText" id="ocppModeTransitionAlert" style="text-align:center;"><?= _APPLICATIONRESTART ?></p>
    <p class="dialogTextBold"><?= _ACCEPTQUESTION ?></p>
</div>
<div id="offPeakChargingAlertMessage" style="display:none">
    <p class="dialogText" id="offPeakChargingAlert" style="text-align:center;"><?= _OFFPEAKDISABLEDCONFIRM ?></p>
</div>
<div id="installationErrorAlertMessage" style="display:none">
    <p class="dialogText"><?= _INSTALLATIONERRORENABLEDCONFIRM ?></p>
</div>
<div id="authorizationKeyAlertMessage" style="display:none">
    <p class="dialogText"><?= _AUTHORIZATIONKEYEMPTYCONFIRM ?></p>
</div>

<div id="ocppErrorAlertMessage" style="display:none">
    <p class="dialogText" id="ocppErrorDialogText"></p>
</div>