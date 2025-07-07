<?php
    include_once "access_control.php";
?>
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="row mb-3">
        <div class="col-12 col-md-12">s
          <div class="d-flex align-items-center mb-2">
            <span class="text-danger fw-bold me-1">*</span>
            <p class="mb-0" id="OCPPConnectionPart"><?= _EXPLANATION ?></p>
          </div>
        </div>
      </div>
          

      <div class="row mb-3" id="selectOCPPConnectionItem">
        <!-- OCPP connection -->
        <span class="col-12 col-md-6 textInSettings"><?= _OCPPCONNECTION ?></span>
        <div class="col-12 col-md-6" >
          <select class="form-select" id="selectOCPPConnection" name="selectOCPPConnection" onchange="ocppConnection()">
            <option id="ocppDisable" value="2" <?= $rowStandaloneSettings["mode"] != "ocppList" ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
            <option id="ocppEnable" value="1" <?= $rowStandaloneSettings["mode"] == "ocppList" ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
          </select>
        </div>
      </div>
      
      <div id="OCPPVersionPart">
        <div class="row mb-3" id="OCPPVersionPartItem">
          <!-- OCPP version -->
          <span class="col-12 col-md-6 textInSettings"><?= _OCPPVERSION ?></span>
          <div class="col-12 col-md-6">
            <select class="form-select" id="selectOcppVersion" name="selectOcppVersion">
              <option value="1.6" <?= $rowOcppSettings["ocppVersion"] == '1.6' ? ' selected="selected"' : ''; ?>>OCPP 1.6J</option>
            </select>
          </div>
        </div>
      </div>

      <div id="OCPPConnectionSettingsPart" class="mb-4">
        <!-- The OCPP connection settings -->
        <span class="textForOccpSetting"><?= _CONNECTIONSETTINGS ?></span>
        
        <div class="mb-3" id="centralSystemAddressItem">
          <label for="centralSystemAddress" class="textInSettings"><?= _CENTRALSYSTEMADDRESS ?></label>
          <input type="text" id="centralSystemAddress" name="centralSystemAddress" value="<?= htmlspecialchars($rowOcppSettings["centralSystemAddress"]); ?>" class="form-control">
          <span class="error text-danger" id="centralSystemError">*</span>
          <div class="errorText">
            <span class="alert float-end mt-1" id="centralSystemErr"></span>
          </div>
        </div>

        <div class="mb-3" id="chargePointIdItem">
          <label for="chargePointId" class="textInSettings"><?= _CHARGEPOINTID ?></label>
          <input type="text" id="chargePointId" name="chargePointId" value="<?= urldecode(htmlspecialchars($rowOcppSettings["chargePointId"])); ?>" class="form-control">
          <span class="error text-danger" id="chargePointIdError">*</span>
          <div class="errorText">
            <span class="alert float-end mt-1" id="chargePointIdErr"></span>
          </div>
        </div>

        <div id="wssSettingsItem" class="mb-3">
          <label for="wssSettings" class="textInSettings" style="display: none;"><?= _WSSCERTSSETTINGS ?></label>
          <input type="text" id="wssSettings" name="wssSettings" class="form-control" style="display: none;">
          <span class="error text-danger" id="wssError" style="display: none;">*</span>
          <span class="alert" id="wssErr" style="display: none;"></span>
        </div>
      </div>
      
      <div id="selectOcppKeyItem" class="row mb-3" style="display: none;">
        <!-- selectOcppKey -->
        <span class="title col-12 col-md-6" style="display:none"><?= _CONFKEYS ?></span>
        <div class="col-12 col-md-6">
          <select name="selectOcppKey" id="selectOcppKey" class="form-select" style="display:none" disabled>
            <option name="Key 1" selected><?= _KEY ?> 1</option>
            <option name="Key 2"><?= _KEY ?> 2</option>
            <option name="Key 3"><?= _KEY ?> 3</option>
          </select>
        </div>
      </div>

      <div id="OCPPConfigurationPart" class="text-center my-4">
        <!-- the OCPP configuration -->
        <button type="button" id="set_default_button" name="set_default_button" class="btn btn-primary px-4 py-2" onclick="setDefaultParameters()">
          <?= _SETDEFAULT ?>
        </button>
      </div>

      <div class="row mb-3" id="freeModeActiveItem">
        <!-- the OCPP FreeModeActive -->
        <label for="freeModeActive" class="col-12 col-md-6 textInSettings">FreeModeActive</label>
        <div class="col-12 col-md-6">
          <select name="freeModeActive" id="freeModeActive" class="form-select">
            <option id="freeModeActiveFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["FreeModeActive"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>
              False
            </option>
            <option id="freeModeActiveTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["FreeModeActive"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>
              True
            </option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-12 col-md-12">
          <div class="" id="freeModeRFIDItem">
            <!-- the OCPP FreeModeRFID -->
            <label for="freeModeRFID" class="textInSettings">FreeModeRFID</label>
            <input type="text" id="freeModeRFID" name="freeModeRFID" value="<?= htmlspecialchars($rowOcppConfigurations["FreeModeRFID"]); ?>" class="form-control">
            <div class="errorText">
              <span class="alert float-end mt-1" id="freeModeRFIDErr"></span>
            </div>
          </div>
        </div>
      </div>

      <div class="row mb-3" id="allowOfflineItem">
        <!-- the OCPP AllowOfflineTxForUnknownId -->
        <label for="allowOffline" class="col-12 col-md-6 textInSettings">
          AllowOfflineTxForUnknownId
        </label>
        <div class="col-12 col-md-6">
          <select name="allowOffline" id="allowOffline" class="form-select">
            <option id="allowOfflineFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["AllowOfflineTxForUnknownId"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>
              False
            </option>
            <option id="allowOfflineTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["AllowOfflineTxForUnknownId"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>
              True
            </option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="authorizationCacheItem">
        <!-- the OCPP AuthorizationCacheEnabled -->
        <label for="authorizationCache" class="col-12 col-md-6 textInSettings">
          AuthorizationCacheEnabled
        </label>
        <div class="col-12 col-md-6">
          <select name="authorizationCache" id="authorizationCache" class="form-select">
            <option id="authorizationCacheFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["AuthorizationCacheEnabled"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>
              False
            </option>
            <option id="authorizationCacheTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["AuthorizationCacheEnabled"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>
              True
            </option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="authorizeRemoteItem">
        <!-- the OCPP AuthorizeRemoteTxRequests -->
        <label for="authorizeRemote" class="col-12 col-md-6 textInSettings">
          AuthorizeRemoteTxRequests
        </label>
        <div class="col-12 col-md-6">
          <select name="authorizeRemote" id="authorizeRemote" class="form-select">
            <option id="authorizeRemoteFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["AuthorizeRemoteTxRequests"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>
              False
            </option>
            <option id="authorizeRemoteTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["AuthorizeRemoteTxRequests"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>
              True
            </option>
          </select>
        </div>
      </div>

      <div>
        <div class="row mb-3" id="AuthorizationKeyItem">
          <label for="authorizationKey" class="col-12 col-md-6 textInSettings">
            AuthorizationKey
          </label>
          <div class="col-12 col-md-6">
            <input type="text" id="authorizationKey" name="authorizationKey" value="" class="form-" onchange="checkAuthorizationKey()" onkeydown="listenerForEmptyText('authorizationKey')"/>
            <div><span id="authorizationKeyErr" class="float-end text-danger alert"></span></div>
          </div>
        </div>

        <div class="row mb-3" id="blinkRepeatItem">
          <label for="blinkRepeat" class="col-12 col-md-6 textInSettings">BlinkRepeat</label>
          <div class="col-12 col-md-6">
            <input type="text" id="blinkRepeat" name="blinkRepeat" value="<?= htmlspecialchars($rowOcppConfigurations["BlinkRepeat"]); ?> "class="form-control"/>
            <span class="error text-danger" id="blinkRepeatError">*</span>
            <div><span id="blinkRepeatErr" class="float-end text-danger alert"></span></div>
          </div>
        </div>

        <div class="row mb-3" id="chargeProfileMaxStackLevelItem">
          <label for="chargeProfileMaxStackLevel" class="col-12 col-md-6 textInSettings">
            ChargeProfileMaxStackLevel
          </label>
          <div class="col-12 col-md-6">
            <input type="text" id="chargeProfileMaxStackLevel" name="chargeProfileMaxStackLevel" value="<?= htmlspecialchars($rowOcppConfigurations["ChargeProfileMaxStackLevel"]); ?>"  class="form-control"readonly/>
            <span class="error text-danger" id="chargeProfileMaxStackLevelError">*</span>
            <div><span id="chargeProfileMaxStackLevelErr" class="float-end text-danger alert"></span></div>
          </div>
        </div>

        <div class="row mb-3" id="chargingScheduleAllowedChargingRateUnitItem">
          <label for="chargingScheduleAllowedChargingRateUnit" class="col-12 col-md-6 textInSettings">
            ChargingScheduleAllowedChargingRateUnit
          </label>
          <div class="col-12 col-md-6">
            <input type="text" id="chargingScheduleAllowedChargingRateUnit" name="chargingScheduleAllowedChargingRateUnit" value="<?= htmlspecialchars($rowOcppConfigurations["ChargingScheduleAllowedChargingRateUnit"]); ?>" class="form-control bg-light" readonly/>
            <span class="error text-danger" id="chargingScheduleAllowedChargingRateUnitError">*</span>
            <div><span id="chargingScheduleAllowedChargingRateUnitErr" class="float-end text-danger alert"></span></div>
          </div>
        </div>

        <div class="row mb-3" id="chargingScheduleMaxPeriodsItem">
          <label for="chargingScheduleMaxPeriods" class="col-12 col-md-6 textInSettings">
            ChargingScheduleMaxPeriods
          </label>
          <div class="col-12 col-md-6">
            <input type="text" id="chargingScheduleMaxPeriods" name="chargingScheduleMaxPeriods" value="<?= htmlspecialchars($rowOcppConfigurations["ChargingScheduleMaxPeriods"]); ?>" class="form-control"readonly/>
            <span class="error text-danger" id="chargingScheduleMaxPeriodsError">*</span>
            <div><span id="chargingScheduleMaxPeriodsErr" class="float-end text-danger alert"></span></div>
          </div>
        </div>

        <div class="row mb-3" id="clocAlignedkDataItem">
          <label for="clockData" class="col-12 col-md-6 textInSettings">ClockAlignedDataInterval</label>
          <div class="col-12 col-md-6">
            <input type="text" id="clockData" name="clockData" value="<?= htmlspecialchars($rowOcppConfigurations["ClockAlignedDataInterval"]); ?>"class="form-control"/>
            <span class="error text-danger" id="clockDataError">*</span>
            <div><span id="clockDataErr" class="float-end text-danger alert"></span></div>
          </div>
        </div>

        <div class="row mb-3" id="connectionTimeOutItem">
          <label for="connectionTimeOut" class="col-12 col-md-6 textInSettings">ConnectionTimeOut</label>
          <div class="col-12 col-md-6">
            <input type="text" id="connectionTimeOut" name="connectionTimeOut" value="<?= htmlspecialchars($rowOcppConfigurations["ConnectionTimeOut"]); ?>" class="form-control" />
            <span class="error text-danger" id="connectionTimeOutError">*</span>
            <div><span id="connectionTimeOutErr" class="float-end text-danger alert"></span></div>
          </div>
        </div>

        <div class="row mb-3" id="connectorPhaseRotationItem">
          <label for="connectorPhase" class="col-12 col-md-6 textInSettings">ConnectorPhaseRotation</label>
          <div class="col-12 col-md-6">
            <input type="text" id="connectorPhase" name="connectorPhase" value="<?= htmlspecialchars($rowOcppConfigurations["ConnectorPhaseRotation"]); ?>" class="form-control" readonly/>
            <span class="error text-danger" id="connectorPhaseError">*</span>
            <div><span id="connectorPhaseErr" class="float-end text-danger alert"></span></div>
          </div>
        </div>

        <div class="row mb-3" id="connectorPhaserRotationMaxLengthItem">
          <label for="rotationMaxLength" class="col-12 col-md-6 textInSettings">ConnectorPhaseRotationMaxLength</label>
          <div class="col-12 col-md-6">
            <input type="text" id="rotationMaxLength" name="rotationMaxLength" value="<?= htmlspecialchars($rowOcppConfigurations["ConnectorPhaseRotationMaxLength"]); ?>" class="form-control" readonly/>
            <span class="error text-danger" id="rotationMaxLengthError">*</span>
            <div><span id="rotationMaxLengthErr" class="float-end text-danger alert"></span></div>
          </div>
        </div>
      </div>

      <div class="row mb-3" id="bootNotificationAfterConnectionLossItem">
        <!-- the OCPP BootNotificationAfterConnectionLoss -->
        <label for="bootNotificationAfterConnectionLoss" class="col-12 col-md-6 textInSettings" id="bootNotificationAfterConnectionLossVal">
          BootNotificationAfterConnectionLoss
        </label>
        <div class="col-12 col-md-6">
          <select name="bootNotificationAfterConnectionLoss" id="bootNotificationAfterConnectionLoss" class="form-select">
            <option id="bootNotificationAfterConnectionLossTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["BootNotificationAfterConnectionLoss"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>
              True
            </option>
            <option id="bootNotificationAfterConnectionLossFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["BootNotificationAfterConnectionLoss"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>
              False
            </option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="centralSmartChargingWithNoTrippingItem">
        <!-- the OCPP CentralSmartChargingWithNoTripping -->
        <label for="centralSmartChargingWithNoTripping" class="col-12 col-md-6 textInSettings" id="centralSmartChargingWithNoTrippingVal">
          CentralSmartChargingWithNoTripping
        </label>
        <div class="col-12 col-md-6">
          <select name="centralSmartChargingWithNoTripping" id="centralSmartChargingWithNoTripping" class="form-select">
            <option id="centralSmartChargingWithNoTrippingFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["CentralSmartChargingWithNoTripping"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>
              False
            </option>
            <option id="centralSmartChargingWithNoTrippingTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["CentralSmartChargingWithNoTripping"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>
              True
            </option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="connectorSwitch3to1PhaseSupportedItem">
        <!-- the OCPP ConnectorSwitch3to1PhaseSupported -->
        <label for="connectorSwitch3to1PhaseSupported" class="col-12 col-md-6 textInSettings" id="connectorSwitch3to1PhaseSupportedVal">
          ConnectorSwitch3to1PhaseSupported
        </label>
        <div class="col-12 col-md-6">
          <select name="connectorSwitch3to1PhaseSupported" id="connectorSwitch3to1PhaseSupported" class="form-select" readonly>
            <option value="FALSE" <?= strtoupper($rowOcppConfigurations["ConnectorSwitch3to1PhaseSupported"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>
              False
            </option>
            <option value="TRUE" <?= strtoupper($rowOcppConfigurations["ConnectorSwitch3to1PhaseSupported"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>
              True
            </option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="continueChargingAfterPowerLossItem">
        <!-- the OCPP ContinueChargingAfterPowerLoss -->
        <label for="continueChargingAfterPowerLoss" class="col-12 col-md-6 textInSettings" id="continueChargingAfterPowerLossVal">
          ContinueChargingAfterPowerLoss
        </label>
        <div class="col-12 col-md-6">
          <select name="continueChargingAfterPowerLoss" id="continueChargingAfterPowerLoss" class="form-select">
            <option id="continueChargingAfterPowerLossFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["ContinueChargingAfterPowerLoss"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>
              False
            </option>
            <option id="continueChargingAfterPowerLossTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["ContinueChargingAfterPowerLoss"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>
              True
            </option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="CTStationCurrentInformationIntervalItem">
        <!-- the OCPP CTStationCurrentInformationInterval -->
        <label for="CTStationCurrentInformationInterval" class="col-12 col-md-6 textInSettings">
          CTStationCurrentInformationInterval
        </label>
        <div class="col-12 col-md-6">
          <input type="text" id="CTStationCurrentInformationInterval" name="CTStationCurrentInformationInterval" value="<?= htmlspecialchars($rowOcppConfigurations["CTStationCurrentInformationInterval"]); ?>" class="form-control"/>
          <span class="error text-danger" id="CTStationCurrentInformationIntervalError">*</span>
          <div><span id="CTStationCurrentInformationIntervalErr" class="float-end text-danger alert"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="newTransactionAfterPowerLossItem">
        <!-- the OCPP NewTransactionAfterPowerLoss -->
        <label for="newTransactionAfterPowerLoss" class="col-12 col-md-6 textInSettings">
          NewTransactionAfterPowerLoss
        </label>
        <div class="col-12 col-md-6">
          <select name="newTransactionAfterPowerLoss" id="newTransactionAfterPowerLoss" class="form-select">
            <option id="newTransactionAfterPowerLossFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["NewTransactionAfterPowerLoss"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>
              False
            </option>
            <option id="newTransactionAfterPowerLossTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["NewTransactionAfterPowerLoss"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>
              True
            </option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="dailyRebootItem">
        <!-- the OCPP DailyReboot -->
        <label for="dailyReboot" class="col-12 col-md-6 textInSettings">
          DailyReboot
        </label>
        <div class="col-12 col-md-6">
          <select name="dailyReboot" id="dailyReboot" class="form-select">
            <option id="dailyRebootTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["DailyReboot"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>
              True
            </option>
            <option id="dailyRebootFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["DailyReboot"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>
              False
            </option>
          </select>
        </div>
      </div>


      <div class="row mb-3" id="dailyRebootTimeItem">
        <!-- the OCPP DailyRebootTime -->
        <label for="dailyRebootTimeInput" class="col-12 col-md-6 textInSettings">
          DailyRebootTime
        </label>
        <div class="col-12 col-md-6">
          <input type="time" class="form-control" id="dailyRebootTimeInput" name="dailyRebootTime" value="<?= htmlspecialchars($rowOcppConfigurations["DailyRebootTime"]); ?>">
        </div>
      </div>

      <div class="row mb-3" id="dailyRebootTypeItem">
        <label for="dailyRebootType" class="col-12 col-md-6 textInSettings">DailyRebootType</label>
        <div class="col-12 col-md-6">
          <select name="dailyRebootType" id="dailyRebootType" class="form-select">
            <option value="SOFT" <?= strtoupper($rowOcppConfigurations["DailyRebootType"]) == "SOFT" ? ' selected="selected"' : ''; ?>>Soft Reset</option>
            <option value="HARD" <?= strtoupper($rowOcppConfigurations["DailyRebootType"]) == "HARD" ? ' selected="selected"' : ''; ?>>Hard Reset</option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="getConfigurationMaxKeysItem">
        <!-- the OCPP GetConfigurationMaxKeys -->
        <label for="maxKeys" class="col-12 col-md-6 textInSettings">GetConfigurationMaxKeys</label>
        <div class="col-12 col-md-6">
          <input type="text" id="maxKeys" name="maxKeys" value="<?= htmlspecialchars($rowOcppConfigurations["GetConfigurationMaxKeys"]); ?>" class="form-control" readonly>
          <span class="error text-danger" id="maxKeysError">*</span>
          <div><span id="maxKeysErr" class="float-end text-danger alert"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="heartbeatIntervalItem">
        <!-- the OCPP HeartbeatInterval -->
        <label for="heartbeat" class="col-12 col-md-6 textInSettings">HeartbeatInterval</label>
        <div class="col-12 col-md-6">
          <input type="text" id="heartbeat" name="heartbeat" value="<?= htmlspecialchars($rowOcppConfigurations["HeartbeatInterval"]); ?>" class="form-control" readonly>
          <span class="error text-danger" id="heartbeatError">*</span>
          <div><span id="heartbeatErr" class="float-end text-danger alert"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="installationErrorEnableItem">
        <!-- the OCPP InstallationErrorEnable -->
        <label for="installationErrorEnable" class="col-12 col-md-6 textInSettings">InstallationErrorEnable</label>
        <div class="col-12 col-md-6">
          <select name="installationErrorEnable" id="installationErrorEnable" class="form-select">
            <option value="TRUE" <?= strtoupper($rowOcppConfigurations["InstallationErrorEnable"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>
              True
            </option>
            <option value="FALSE" <?= strtoupper($rowOcppConfigurations["InstallationErrorEnable"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>
              False
            </option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="LEDTimeoutEnableItem">
        <!-- LEDTimeoutEnable -->
        <label for="LEDTimeoutEnable" class="col-12 col-md-6 textInSettings">LEDTimeoutEnable</label>
        <div class="col-12 col-md-6">
          <select name="LEDTimeoutEnable" id="LEDTimeoutEnable" class="form-select">
            <option id="LEDTimeoutEnableItemTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["LEDTimeoutEnable"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
            <option id="LEDTimeoutEnableItemFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["LEDTimeoutEnable"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="lightIntensityItem">
        <!-- LightIntensity -->
        <label for="light" class="col-12 col-md-6 textInSettings">LightIntensity</label>
        <div class="col-12 col-md-6">
          <input type="text" id="light" name="light" class="form-control" value="<?= htmlspecialchars($rowOcppConfigurations["LightIntensity"]); ?>">
          <span class="error text-danger" id="lightError">*</span>
          <div><span class="float-end text-danger alert" id="lightErr"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="localAuthListEnabledItem">
        <!-- LocalAuthListEnabled -->
        <label for="localAuthListEnabled" class="col-12 col-md-6 textInSettings">LocalAuthListEnabled</label>
        <div class="col-12 col-md-6">
          <select name="localAuthListEnabled" id="localAuthListEnabled" class="form-select">
            <option id="localAuthListEnabledTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["LocalAuthListEnabled"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
            <option id="localAuthListEnabledFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["LocalAuthListEnabled"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="localAuthListMaxLengthItem">
        <!-- LocalAuthListMaxLength -->
        <label for="localAuthListMaxLength" class="col-12 col-md-6 textInSettings">LocalAuthListMaxLength</label>
        <div class="col-12 col-md-6">
          <input type="text" id="localAuthListMaxLength" name="localAuthListMaxLength" 
                class="form-control" 
                value="<?= htmlspecialchars($rowOcppConfigurations["LocalAuthListMaxLength"]); ?>">
          <span class="error text-danger" id="localAuthListMaxLengthError">*</span>
          <div><span class="float-end text-danger alert" id="localAuthListMaxLengthErr"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="localAuthorizeOfflineItem">
        <!-- LocalAuthorizeOffline -->
        <label for="authorizeOffline" class="col-12 col-md-6 textInSettings">LocalAuthorizeOffline</label>
        <div class="col-12 col-md-6">
          <select name="authorizeOffline" id="authorizeOffline" class="form-select">
            <option id="authorizeOfflineTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["LocalAuthorizeOffline"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
            <option id="authorizeOfflineFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["LocalAuthorizeOffline"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="localPreAuthorizeItem">
        <!-- LocalPreAuthorize -->
        <label for="localPreAuthorize" class="col-12 col-md-6 textInSettings">LocalPreAuthorize</label>
        <div class="col-12 col-md-6">
          <select name="localPreAuthorize" id="localPreAuthorize" class="form-select">
            <option id="localPreAuthorizeFalse" value="FALSE" <?= strtoupper($rowOcppConfigurations["LocalPreAuthorize"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
            <option id="localPreAuthorizeTrue" value="TRUE" <?= strtoupper($rowOcppConfigurations["LocalPreAuthorize"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="maxChargingProfilesInstalledItem">
        <label for="maxChargingProfilesInstalled" class="col-12 col-md-6 textInSettings">MaxChargingProfilesInstalled</label>
        <div class="col-12 col-md-6">
          <input type="text" id="maxChargingProfilesInstalled" name="maxChargingProfilesInstalled" class="form-control" readonly value="<?= htmlspecialchars($rowOcppConfigurations["MaxChargingProfilesInstalled"]); ?>">
          <span class="error text-danger" id="maxChargingProfilesInstalledError">*</span>
          <div><span class="float-end text-danger alert" id="maxChargingProfilesInstalledErr"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="maxEnergyOnInvalidIdItem">
        <label for="maxEnergy" class="col-12 col-md-6 textInSettings">MaxEnergyOnInvalidId</label>
        <div class="col-12 col-md-6">
          <input type="text" id="maxEnergy" name="maxEnergy" class="form-control" value="<?= htmlspecialchars($rowOcppConfigurations["MaxEnergyOnInvalidId"]); ?>">
          <span class="error text-danger" id="maxEnergyError">*</span>
          <div><span class="float-end text-danger alert" id="maxEnergyErr"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="maxPowerChargeCompleteItem">
        <label for="maxPowerChargeComplete" class="col-12 col-md-6 textInSettings">MaxPowerChargeComplete</label>
        <div class="col-12 col-md-6">
          <input type="text" id="maxPowerChargeComplete" name="maxPowerChargeComplete" class="form-control" value="<?= htmlspecialchars($rowOcppConfigurations["MaxPowerChargeComplete"]); ?>">
          <span class="error text-danger" id="maxPowerChargeCompleteError">*</span>
          <div><span class="float-end text-danger alert" id="maxPowerChargeCompleteErr"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="maxTimeChargeCompleteItem">
        <label for="maxTimeChargeComplete" class="col-12 col-md-6 textInSettings">MaxTimeChargeComplete</label>
        <div class="col-12 col-md-6">
          <input type="text" id="maxTimeChargeComplete" name="maxTimeChargeComplete" class="form-control" value="<?= htmlspecialchars($rowOcppConfigurations["MaxTimeChargeComplete"]); ?>">
          <span class="error text-danger" id="maxTimeChargeCompleteError">*</span>
          <div><span class="float-end text-danger alert" id="maxTimeChargeCompleteErr"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="meterValuesAlignedDataItem">
        <label for="alignedData" class="col-12 col-md-6 textInSettings">MeterValuesAlignedData</label>
        <div class="col-12 col-md-6">
          <input type="text" id="alignedData" name="alignedData" class="form-control" value="<?= htmlspecialchars($rowOcppConfigurations["MeterValuesAlignedData"]); ?>">
          <span class="error text-danger" id="alignedDataError">*</span>
          <div><span class="float-end text-danger alert" id="alignedDataErr"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="meterValuesAlignedDataMaxLengthItem">
        <label for="alignedDataMaxLength" class="col-12 col-md-6 textInSettings">MeterValuesAlignedDataMaxLength</label>
        <div class="col-12 col-md-6">
          <input type="text" id="alignedDataMaxLength" name="alignedDataMaxLength" class="form-control" readonly value="<?= htmlspecialchars($rowOcppConfigurations["MeterValuesAlignedDataMaxLength"]); ?>">
          <span class="error text-danger" id="alignedDataMaxLengthError">*</span>
          <div><span class="float-end text-danger alert" id="alignedDataMaxLengthErr"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="meterValuesSampleDataItem">
        <label for="sampleData" class="col-12 col-md-6 textInSettings">MeterValuesSampledData</label>
        <div class="col-12 col-md-6">
          <input type="text" id="sampleData" name="sampleData" class="form-control" value="<?= htmlspecialchars($rowOcppConfigurations["MeterValuesSampledData"]); ?>">
          <span class="error text-danger" id="sampleDataError">*</span>
          <div><span class="float-end text-danger alert" id="sampleDataErr"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="meterValuesSampledDataMaxLengthItem">
        <label for="meterValuesSampledDataMaxLength" class="col-12 col-md-6 textInSettings">MeterValuesSampledDataMaxLength</label>
        <div class="col-12 col-md-6">
          <input type="text" id="meterValuesSampledDataMaxLength" name="meterValuesSampledDataMaxLength" class="form-control bg-light" readonly value="<?= htmlspecialchars($rowOcppConfigurations["MeterValuesSampledDataMaxLength"]); ?>">
          <span class="error text-danger" id="meterValuesSampledDataMaxLengthError">*</span>
          <div><span class="float-end text-danger alert" id="meterValuesSampledDataMaxLengthErr"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="meterValuesSampleIntervalItem">
        <label for="sampleInterval" class="col-12 col-md-6 textInSettings">MeterValueSampleInterval</label>
        <div class="col-12 col-md-6">
          <input type="text" id="sampleInterval" name="sampleInterval" class="form-control" value="<?= htmlspecialchars($rowOcppConfigurations["MeterValueSampleInterval"]); ?>">
          <span class="error text-danger" id="sampleIntervalError">*</span>
          <div><span class="float-end text-danger alert" id="sampleIntervalErr"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="minimumStatusDurationItem">
        <label for="minDuration" class="col-12 col-md-6 textInSettings">MinimumStatusDuration</label>
        <div class="col-12 col-md-6">
          <input type="text" id="minDuration" name="minDuration" class="form-control" value="<?= htmlspecialchars($rowOcppConfigurations["MinimumStatusDuration"]); ?>">
          <span class="error text-danger" id="minDurationError">*</span>
          <div><span class="float-end text-danger alert" id="minDurationErr"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="numberOfConnectorsItem">
        <label for="connectorNum" class="col-12 col-md-6 textInSettings">NumberOfConnectors</label>
        <div class="col-12 col-md-6">
          <input type="text" id="connectorNum" name="connectorNum" class="form-control" readonly value="<?= htmlspecialchars($rowOcppConfigurations["NumberOfConnectors"]); ?>">
          <span class="error text-danger" id="connectorNumError">*</span>
          <div><span class="float-end text-danger alert" id="connectorNumErr"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="ocppSecurityProfileItem">
        <label for="ocppSecurityProfile" class="col-12 col-md-6 textInSettings">OcppSecurityProfile</label>
        <div class="col-12 col-md-6">
          <select name="ocppSecurityProfile" id="ocppSecurityProfile" class="form-select">
            <option value="0" <?= $rowOcppConfigurations["OcppSecurityProfile"] == 0 ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
            <option value="1" <?= $rowOcppConfigurations["OcppSecurityProfile"] == 1 ? ' selected="selected"' : ''; ?>>1</option>
            <option value="2" <?= $rowOcppConfigurations["OcppSecurityProfile"] == 2 ? ' selected="selected"' : ''; ?>>2</option>
            <option value="3" <?= $rowOcppConfigurations["OcppSecurityProfile"] == 3 ? ' selected="selected"' : ''; ?>>3</option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="RandomDelayOnDailyRebootEnabledItem">
        <label for="randomDelayOnDailyRebootEnabled" class="col-12 col-md-6 textInSettings">RandomDelayOnDailyRebootEnabled</label>
        <div class="col-12 col-md-6">
          <select name="randomDelayOnDailyRebootEnabled" id="randomDelayOnDailyRebootEnabled" class="form-select">
            <option value="TRUE" <?= strtoupper($rowOcppConfigurations["RandomDelayOnDailyRebootEnabled"]) == 'TRUE' ? ' selected="selected' : ''; ?>>True</option>
            <option value="FALSE" <?= strtoupper($rowOcppConfigurations["RandomDelayOnDailyRebootEnabled"]) == 'FALSE' ? ' selected="selected' : ''; ?>>False</option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="ContinueChargingAfterPenError">
        <label for="continueChargingAfterPenError" class="col-12 col-md-6 textInSettings">ContinueChargingAfterPenError</label>
        <div class="col-12 col-md-6">
          <select name="continueChargingAfterPenError" id="continueChargingAfterPenError" class="form-select">
            <option value="TRUE" <?= strtoupper($rowOcppConfigurations["ContinueChargingAfterPenError"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
            <option value="FALSE" <?= strtoupper($rowOcppConfigurations["ContinueChargingAfterPenError"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="WebconfigEnabled">
        <label for="webconfigEnabled" class="col-12 col-md-6 textInSettings">WebconfigEnabled</label>
        <div class="col-12 col-md-6">
          <select name="webconfigEnabled" id="webconfigEnabled" class="form-select">
            <option value="TRUE" <?= strtoupper($rowOcppConfigurations["WebconfigEnabled"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
            <option value="FALSE" <?= strtoupper($rowOcppConfigurations["WebconfigEnabled"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="reserveConnectorZeroSupportedItem">
        <label for="reserveConnectorZeroSupported" class="col-12 col-md-6 textInSettings">ReserveConnectorZeroSupported</label>
        <div class="col-12 col-md-6">
          <select name="reserveConnectorZeroSupported" id="reserveConnectorZeroSupported" class="form-select bg-light" readonly>
            <option value="TRUE" <?= strtoupper($rowOcppConfigurations["ReserveConnectorZeroSupported"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
            <option value="FALSE" <?= strtoupper($rowOcppConfigurations["ReserveConnectorZeroSupported"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="rfidEndiannessItem">
        <label for="rfidEndianness" class="col-12 col-md-6 textInSettings">RfidEndianness</label>
        <div class="col-12 col-md-6">
          <select name="rfidEndianness" id="rfidEndianness" class="form-select">
            <option value="big-endian" <?= $rowOcppConfigurations["RfidEndianness"] == 'big-endian' ? ' selected="selected"' : ''; ?>>Big-Endian</option>
            <option value="little-endian" <?= $rowOcppConfigurations["RfidEndianness"] == 'little-endian' ? ' selected="selected"' : ''; ?>>Little-Endian</option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="resetRetriesItem">
        <label for="resetRetries" class="col-12 col-md-6 textInSettings">ResetRetries</label>
        <div class="col-12 col-md-6">
          <input type="text" id="resetRetries" name="resetRetries" class="form-control" value="<?= htmlspecialchars($rowOcppConfigurations["ResetRetries"]); ?>">
          <span class="error text-danger" id="resetRetriesError">*</span>
          <div><span class="float-end text-danger alert" id="resetRetriesErr"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="sendDataTransferMeterConfigurationForNonEichrechtItem">
        <label for="sendDataTransferMeterConfigurationForNonEichrecht" class="col-12 col-md-6 textInSettings">SendDataTransferMeterConfigurationForNonEichrecht</label>
        <div class="col-12 col-md-6">
          <select name="sendDataTransferMeterConfigurationForNonEichrecht" id="sendDataTransferMeterConfigurationForNonEichrecht" class="form-select">
            <option value="FALSE" <?= strtoupper($rowOcppConfigurations["SendDataTransferMeterConfigurationForNonEichrecht"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
            <option value="TRUE" <?= strtoupper($rowOcppConfigurations["SendDataTransferMeterConfigurationForNonEichrecht"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
          </select>
        </div>
      </div>
      <!-- SSSSSSSSSSSS -->
      <div class="row mb-3" id="sendLocalListMaxLengthItem">
        <label for="sendLocalListMaxLength" class="col-12 col-md-6 textInSettings">SendLocalListMaxLength</label>
        <div class="col-12 col-md-6">
          <input type="text" id="sendLocalListMaxLength" name="sendLocalListMaxLength" class="form-control" value="<?= htmlspecialchars($rowOcppConfigurations["SendLocalListMaxLength"]); ?>">
          <span class="error text-danger" id="sendLocalListMaxLengthError">*</span>
          <div><span class="float-end text-danger alert" id="sendLocalListMaxLengthErr"></span></div>
        </div>
      </div>

      <div class="row mb-3" id="sendTotalPowerValueItem">
        <label for="sendTotalPowerValue" class="col-12 col-md-6 textInSettings">SendTotalPowerValue</label>
        <div class="col-12 col-md-6">
          <select name="sendTotalPowerValue" id="sendTotalPowerValue" class="form-select">
            <option value="FALSE" <?= strtoupper($rowOcppConfigurations["SendTotalPowerValue"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
            <option value="TRUE" <?= strtoupper($rowOcppConfigurations["SendTotalPowerValue"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="stopTransactionOnEVSideDisconnectItem">
        <label for="disconnect" class="col-12 col-md-6 textInSettings">StopTransactionOnEVSideDisconnect</label>
        <div class="col-12 col-md-6">
          <select name="disconnect" id="disconnect" class="form-select">
            <option value="TRUE" <?= strtoupper($rowOcppConfigurations["StopTransactionOnEVSideDisconnect"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
            <option value="FALSE" <?= strtoupper($rowOcppConfigurations["StopTransactionOnEVSideDisconnect"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="stopTransactionOnInvalidIdItem">
        <label for="stopInvalidId" class="col-12 col-md-6 textInSettings">StopTransactionOnInvalidId</label>
        <div class="col-12 col-md-6">
          <select name="stopInvalidId" id="stopInvalidId" class="form-select">
            <option value="TRUE" <?= strtoupper($rowOcppConfigurations["StopTransactionOnInvalidId"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
            <option value="FALSE" <?= strtoupper($rowOcppConfigurations["StopTransactionOnInvalidId"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
          </select>
        </div>
      </div>

      <!-- StopTxnAlignedData -->
      <div>
        <div class="row mb-3" id="stopTxAlignedItem">
          <label for="disconnect" class="col-12 col-md-6 textInSettings">StopTxnAlignedData</label>
          <div class="col-12 col-md-6">
            <input type="text" id="stopAligned" name="stopAligned" class="form-control" value="<?php echo htmlspecialchars($rowOcppConfigurations["StopTxnAlignedData"]); ?>">
            <span class="error text-danger" id="stopAlignedError">*</span>
            <div><span class="float-end text-danger alert" id="stopAlignedErr"></span></div>
          </div>
        </div>

        <div class="row mb-3" id="stopTxnAlignedDataMaxLengthItem">
          <label for="disconnect" class="col-12 col-md-6 textInSettings">StopTxnAlignedDataMaxLength</label>
          <div class="col-12 col-md-6">
            <input type="text" id="stopAlignedMax" name="stopAlignedMax" class="form-control" value="<?php echo htmlspecialchars($rowOcppConfigurations["StopTxnAlignedDataMaxLength"]); ?>">
            <span class="error text-danger" id="stopAlignedMaxError">*</span>
            <div><span class="float-end text-danger alert" id="stopAlignedMaxErr"></span></div>
          </div>
        </div>

        <div class="row mb-3" id="stopTxSampledItem">
          <label for="stopSampled" class="col-12 col-md-6 textInSettings">StopTxnSampledData</label>
          <div class="col-12 col-md-6">
            <input type="text" id="stopSampled" name="stopSampled" class="form-control" value="<?= htmlspecialchars($rowOcppConfigurations["StopTxnSampledData"]) ?>">
            <span class="error text-danger" id="stopSampledError">*</span>
            <div><span class="float-end text-danger alert" id="stopSampledErr"></span></div>
          </div>
        </div>

        <div class="row mb-3" id="stopTxSampledDataMaxLengthItem">
          <label for="stopSampledMax" class="col-12 col-md-6 textInSettings">StopTxnSampledDataMaxLength</label>
          <div class="col-12 col-md-6">
            <input type="text" id="stopSampledMax" name="stopSampledMax" class="form-control bg-light" readonly value="<?= htmlspecialchars($rowOcppConfigurations["StopTxnSampledDataMaxLength"]) ?>">
            <span class="error text-danger" id="stopSampledMaxError">*</span>
            <div><span class="float-end text-danger alert" id="stopSampledMaxErr"></span></div>
          </div>
        </div>

        <div class="row mb-3" id="supportedFeatureProfilesItem">
          <label for="supported" class="col-12 col-md-6 textInSettings">SupportedFeatureProfiles</label>
          <div class="col-12 col-md-6">
            <input type="text" id="supported" name="supported" class="form-control bg-light" readonly style="font-size: 12px;" value='<?= htmlspecialchars($rowOcppConfigurations["SupportedFeatureProfiles"]) ?>'>
            <span class="error text-danger" id="supportedError">*</span>
            <div><span class="float-end text-danger alert" id="supportedErr"></span></div>
          </div>
        </div>

        <div class="row mb-3" id="supportedFeatureProfilesMaxLengthItem">
          <label for="supportedMax" class="col-12 col-md-6 textInSettings">SupportedFeatureProfilesMaxLength</label>
          <div class="col-12 col-md-6">
            <input type="text" id="supportedMax" name="supportedMax" class="form-control bg-light" readonly value="<?= htmlspecialchars($rowOcppConfigurations["SupportedFeatureProfilesMaxLength"]) ?>">
            <span class="error text-danger" id="supportedMaxError">*</span>
            <div><span class="float-end text-danger alert" id="supportedMaxErr"></span></div>
          </div>
        </div>

        <div class="row mb-3" id="transactionMessageAttemptsItem">
          <label for="attempts" class="col-12 col-md-6 textInSettings">TransactionMessageAttempts</label>
          <div class="col-12 col-md-6">
            <input type="text" id="attempts" name="attempts" class="form-control" value="<?= htmlspecialchars($rowOcppConfigurations["TransactionMessageAttempts"]) ?>">
            <span class="error text-danger" id="attemptsError">*</span>
            <div><span class="float-end text-danger alert" id="attemptsErr"></span></div>
          </div>
        </div>

        <div class="row mb-3" id="transactionMessageRetryIntervalItem">
          <label for="retryInterval" class="col-12 col-md-6 textInSettings">TransactionMessageRetryInterval</label>
          <div class="col-12 col-md-6">
            <input type="text" id="retryInterval" name="retryInterval" class="form-control" value="<?= htmlspecialchars($rowOcppConfigurations["TransactionMessageRetryInterval"]) ?>">
            <span class="error text-danger" id="retryIntervalError">*</span>
            <div><span class="float-end text-danger alert" id="retryIntervalErr"></span></div>
          </div>
        </div>
      </div>
      <!-- StopTxnAlignedData -->

      <div class="row mb-3" id="UKSmartChargingEnabledItem">
        <label for="UKSmartCharging" class="col-12 col-md-6 textInSettings">UKSmartChargingEnabled</label>
        <div class="col-12 col-md-6">
          <select name="UKSmartCharging" id="UKSmartCharging" class="form-select">
            <option value="TRUE" <?= strtoupper($rowOcppConfigurations["UKSmartChargingEnabled"]) == 'TRUE' ? ' selected="selected"' : ''; ?>>True</option>
            <option value="FALSE" <?= strtoupper($rowOcppConfigurations["UKSmartChargingEnabled"]) == 'FALSE' ? ' selected="selected"' : ''; ?>>False</option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="unlockConnectorOnEVSideDisconnectItem">
        <label for="unlockConnector" class="col-12 col-md-6 textInSettings">UnlockConnectorOnEVSideDisconnect</label>
        <div class="col-12 col-md-6">
          <select name="unlockConnector" id="unlockConnector" class="form-select">
            <option value="TRUE" <?= strtoupper($rowOcppConfigurations["UnlockConnectorOnEVSideDisconnect"]) == 'TRUE' ? 'selected' : ''; ?>>True</option>
            <option value="FALSE" <?= strtoupper($rowOcppConfigurations["UnlockConnectorOnEVSideDisconnect"]) == 'FALSE' ? 'selected' : ''; ?>>False</option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="webSocketPingIntervalItem">
        <label for="pingInterval" class="col-12 col-md-6 textInSettings">WebSocketPingInterval</label>
        <div class="col-12 col-md-6">
          <input type="text" id="pingInterval" name="pingInterval" class="form-control" value="<?= htmlspecialchars($rowOcppConfigurations["WebSocketPingInterval"]); ?>">
          <span class="error text-danger" id="pingIntervalError">*</span>
          <div><span class="alert text-danger float-end" id="pingIntervalErr"></span></div>
        </div>
      </div>

       <!-- Save Button -->
      <div class="row mb-4">
        <div class="col text-center">
          <button type="button" id="ocpp_button" name="ocpp_button" class="btn btn-primary px-5 text-uppercase" onclick="checkOcppForm()"><?= _SAVE ?></button>
          <input type="submit" id="button_ocpp" name="button_ocpp" hidden>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Alert Messages -->
<div id="ocppModeSelectionAlertMessage" style="display:none">
  <p class="text-center" id="ocppModeTransitionAlert"><?= _APPLICATIONRESTART ?></p>
  <p class="fw-bold"><?= _ACCEPTQUESTION ?></p>
</div>

<div id="offPeakChargingAlertMessage" style="display:none">
  <p class="text-center" id="offPeakChargingAlert"><?= _OFFPEAKDISABLEDCONFIRM ?></p>
</div>

<div id="installationErrorAlertMessage" style="display:none">
  <p><?= _INSTALLATIONERRORENABLEDCONFIRM ?></p>
</div>

<div id="authorizationKeyAlertMessage" style="display:none">
  <p><?= _AUTHORIZATIONKEYEMPTYCONFIRM ?></p>
</div>

<div id="ocppErrorAlertMessage" style="display:none">
  <p id="ocppErrorDialogText"></p>
</div>