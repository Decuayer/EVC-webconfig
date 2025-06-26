<?php
    include_once "access_control.php";
?>
<div style="left:28.25%;width:60vw;position:absolute; z-index: 1;" id="loadManagementGeneralSettingsPage">
  <div>
    <p class="star" style="display: inline;"><b>*</b> </p>
    <p class="explanation" id="OCPPConnectionPart" style="display: inline;">
      <?= _EXPLANATION ?>
    </p>
  </div>
  <br></br>
  <div style="height:35px;" id="LoadManagementGeneralSettings">
    <!-- load management -->
    <span class="textForOccpSetting">
      <?= _LOADMANAGEMENTOPTION ?>
    </span>
    <div style="height:35px; margin-left:10vw;" class="selectbox">
      <select id="loadManagementSelection" name="loadManagementSelection" onchange="loadManagementOptionFunction()">
        <option id="loadManagementEnable" value="Enabled" <?= $rowDlm["dlmMode"] == "Enabled" ? ' selected="selected"' : ''; ?>>Master/Slave</option>
        <option id="loadManagementModbus" value="Modbus" <?= $rowDlm["dlmMode"] == "Modbus" ? ' selected="selected"' : ''; ?>>Modbus TCP</option>
        <option id="loadManagementEebus" value="Eebus" <?= $rowDlm["dlmMode"] == "Eebus" ? ' selected="selected"' : ''; ?>>EEBUS</option>
        <option id="loadManagementDisable" value="Disabled" <?= $rowDlm["dlmMode"] == "Disabled" ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
      </select>
    </div>
  </div>
  <!--end of load management -->
  <br></br>
  <div id="failSafeCurrentItem" style="display:none;">
    <label>
      <?= _FAILSAFECURRENT ?>
    </label>
    <input type="text" id="failSafeCurrent" class="textarea1" style="margin-bottom: 1%;" name="failSafeCurrent"
      value=<?php echo htmlspecialchars($rowDlm["failSafeCurrent"]); ?>>
    <span class="error" id="failSafeCurrentError">*</span>
    <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="failSafeCurrentErr"></span></div>
  </div>

  <div id="CPRolePart">
    <!-- cp role -->
    <span class="textForOccpSetting">
      <?= _CPROLE ?>
    </span>
    <div style="height:35px; margin-left:10vw;" class="selectbox">
      <select id="cpRoleSelection" name="cpRoleSelection" onchange="CPRoleFunction()">
        <option id="slave" value="Slave" <?= $rowDlm["cpRole"] == "Slave" ? ' selected="selected"' : ''; ?>>
          <?= _SLAVE ?>
        </option>
        <option id="master" value="Master" <?= $rowDlm["cpRole"] == "Master" ? ' selected="selected"' : ''; ?>>
          <?= _MASTER ?>
        </option>
      </select>
    </div>
  </div> <!-- end of cprole -->

  <br></br>
  <br></br>
  <div id="DLMInterfacePart">
    <!-- the dlm interface -->
    <span class="textForOccpSetting"><?= _DLMINTERFACE ?></span>
    <div style="margin-left:10vw;" class="selectbox">
      <select id="dlmInterfaceSelectionOuter" name="dlmInterfaceSelectionOuter">
        <option id="Ethernet" value="Ethernet" <?= $rowDlm["dlmInterface"] == "Ethernet" ? ' selected="selected"' : ''; ?>><?= _ETHERNET ?></option>
        <option id="wifi" value="wifi" style="display:<?php echo $wifiDisplay; ?>" <?= $rowDlm["dlmInterface"] == "wifi" ? ' selected="selected"' : ''; ?>><?= _WIFI ?></option>
      </select>
    </div>
    <span class="error" id="dlmInterfaceSelectionOuterError"></span>
      <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="dlmInterfaceSelectionOuterErr"></span></div>
  </div><!-- dlm interface -->

  <!--------EEBUS--------->

  <div id="failsafeCurrentItem">
    <label>
      <?= _FAILSAFECURRENT ?>
    </label>
    <input type="text" id="textfailsafeCurrent" class="textarea1" style="margin-bottom: 1%;background-color: #d6d2d1"
      name="failsafeCurrent" readonly value="<?= htmlspecialchars($rowEebusConfigurations["fallbackCurrent"]) ?>">
    <span class="error" id="failsafeCurrentError"></span>
    <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="failsafeCurrentErr"></span></div>
  </div>

  <div id="statusItem">
    <label>
        <?= _STATUS ?>
    </label>

    <?php
    $skiStatus = $rowEebusConfigurations["skiStatus"];
    if ($skiStatus != "EMPTY") {
        // Replace 'eebus' with your specific service name
        $serviceName = 'eebus';

        // Run the systemctl command and capture the output
        $output = shell_exec("systemctl status $serviceName");

        // Check if the output contains a specific string indicating the service status
        if (strpos($output, 'Active: inactive (dead)') !== false) {
            $skiStatus = "Starting";
        } elseif (strpos($output, 'Active: active (running)') !== false) {
            // Keep the existing $skiStatus value if the service is active and running
            // This assumes $skiStatus already contains a meaningful value
        }
    } else {
        $skiStatus = "Not Connected";
    }
    ?>

    <input type="text" id="textSkiStatus" class="textarea1" style="margin-bottom: 1%;background-color: #d6d2d1"
        name="status" readonly value="<?= htmlspecialchars($skiStatus) ?>">

    <span class="error" id="statusError"></span>
    <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="statusErr"></span></div>
</div>


  <div id="firmwareVersionItem">
    <label>
      <?= _FIRMWAREVERSION ?>
    </label>
    <input type="text" id="textFirmwareVersion" class="textarea1" style="margin-bottom: 1%;background-color: #d6d2d1"
      name="firmwareVersion" readonly value="<?php echo $rowEebusConfigurations["firmwareVersion"]; ?>">
    <span class="error" id="firmwareVersionError"></span>
    <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="firmwareVersionErr"></span></div>
  </div>
  <div id="pairedEnergyManagerItem">
    <label>
      <?= _PAIRINGENERGYMANAGER ?>
    </label>
    <?php
    try {
      $SKI = $rowEebusPairInfo['ski'];
      if ($SKI == '') {
        // Display "None" if ski value is empty
        ?>
    <input type="text" id="textPairedEnergyManager" class="textarea1"
      style="margin-bottom: 1%;background-color: #d6d2d1" name="pairedEnergyManager" readonly value="None">
    <?php
        } else {
          // Display data from the table
          do {
            $manufacturer = $rowEebusPairInfo['manufacturer'];
            $product = $rowEebusPairInfo['product'];
            ?>
    <input type="text" id="textPairedEnergyManager" class="textarea1"
      style="margin-bottom: 1%;background-color: #d6d2d1" name="pairedEnergyManager" readonly
      value="<?= htmlspecialchars($product) ?> from <?= htmlspecialchars($manufacturer) ?> (ski: <?= htmlspecialchars($SKI) ?>)">
    <?php
          } while ($rowEebusPairInfo = $eebusPairInfo->fetchArray());
        }
    } catch (Exception $e) {
      // Handle exception
    }
    ?>
  </div>
  <div id="unpairedEnergyManagerItem">
    <div id="selectEEBUSPairingUnpair" name="selectEEBUSPairingUnpair" style="width:200px;">
      <?php
      $pairingState = "false";
      ?>
      <button type="button" id="eebusUnpair" name="eebusUnpair" class="interfacesButtonUnpair <?php if ($pairingState === "false")
        echo 'selected'; ?>" value="false">
        <?= _UNPAIR ?>
      </button>
    </div>
  </div>
  <br></br>
  <div id="eebusDiscovery" style="display: flex; flex-flow: row wrap; align-items: center;">
    <label style="flex-basis: 100%;">
      <?= _EEBUSDISCOVERY ?>
    </label>
    <div class="selectbox selectionbox" style="flex-grow: 1;">
      <select style="max-width: 100%;" id="selectEebusDiscovery" name="selectEebusDiscovery">
        <?php
        try {
          if (file_exists("/var/lib/vestel/webconfig.db")) {
            class MyDBEEBUSs extends SQLite3
            {
              function __construct()
              {
                $this->open('/var/lib/vestel/webconfig.db');
              }
            }

            $eebusDB = new MyDBEEBUSs();
            $eebusDB->busyTimeout(10000);

            // Eebus Discovery
            $stmt = $eebusDB->prepare("SELECT * FROM eebusDiscovery");
            $eebusDiscovery = $stmt->execute();
            // Eebus Pair Info Query using prepared statement
            $stmtPairInfo = $eebusDB->prepare("SELECT * FROM eebusPairInfo");
            $resPairInfo = $stmtPairInfo->execute();
            $rowEebusPairInfo = $resPairInfo ? $resPairInfo->fetchArray(SQLITE3_ASSOC) : null;
              while ($rowEebusDiscovery = $eebusDiscovery->fetchArray()) {
                $shipId = $rowEebusDiscovery['shipId'];
                $ski = $rowEebusDiscovery['ski'];
                $manufacturer = $rowEebusDiscovery['manufacturer'];
                $product = $rowEebusDiscovery['product'];
                $pairing_state = $rowEebusDiscovery['pairing_state'];
                ?>
        <option
          value="<?= htmlspecialchars($shipId . '|' . $ski . '|' . $manufacturer . '|' . $product . '|' . $pairing_state); ?>">
          <?= ($product !== 'None') ? htmlspecialchars($product) : 'None'; ?> from
          <?= ($manufacturer !== 'None') ? htmlspecialchars($manufacturer) : 'None'; ?> (ski:
          <?= ($ski !== 'None') ? htmlspecialchars($ski) : 'None'; ?>)
        </option>
        <?php
              }
            $eebusDB->close();
            unset($eebusDB);
            if (isset($db)) {
              $db->close();
            }
          }
        } catch (Exception $e) {
          echo "Error: " . $e->getMessage();
        }
        ?>
      </select>
    </div>
    <div id="pairingEnergyManagerItem">
      <div id="selectEEBUSPairingPair" name="selectEEBUSPairingPair" style="width:200px;">
        <?php
        $pairingState1 = 'true';
        $isSkiEmpty = ($SKI ?? '') === '' ? 0 : 1;
        $isSkiDiscoveryEmpty = ($skiDiscovery ?? '') === '' ? 0 : 1;
        if (!((($isSkiEmpty === 0) && ($isSkiDiscoveryEmpty === 1)))) {
          ?>
        <button type="button" id="eebusPair" name="eebusPair" class="interfacesButtonPairDisabled selected" value="true"
          disabled>
          <?= _PAIR ?>
        </button>
        <?php } else { ?>
        <button type="button" id="eebusPair" name="eebusPair"
          class="interfacesButtonPair <?= ($pairingState1 === 'true') ? 'selected' : ''; ?>" value="true">
          <?= _PAIR ?>
        </button>
        <?php } ?>
      </div>
    </div>
  </div>
  <button type="button" id="refreshButton" name="refreshButton" class="interfacesRefreshButton"
    onclick="refreshSelectBox()" style="text-transform: uppercase; margin-left: 10px;">
    <?= _REFRESH ?>
  </button>
  <!---------EEBUS------------>
  <br>
  <div id="DLMSettingsPart">
    <!--  -->
    <br></br>
    <div>
      <!-- grid settings  -->
      <span class="textForOccpSetting" style="font-size: 26px;">
        <?= _GRIDSETTINGS ?>
      </span>
      <br></br>
      <br></br>
      <div id="mainCircuitCurrentItem">
        <label><?= _MAINCIRCUITCURRENT ?></label>
        <?php if ($rowDlm["supplyType"] != "TIC") { ?>
        <input type="text" id="mainCircuitCurrent" class="textarea1" style="margin-bottom: 1%;" name="mainCircuitCurrent" 
            value="<?= htmlspecialchars($rowDlm["mainCircuitCurrent"]); ?>">
            <?php } else { ?>
        <input type="text" id="mainCircuitCurrent" class="textarea1" style="margin-bottom: 1%;" name="mainCircuitCurrent" 
            value="<?= htmlspecialchars($rowDlm["dlmTICTotalCurrent"]); ?>">
            <?php } ?>
        <span class="error" id="mainCircuitCurrentError">*</span>
        <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="mainCircuitCurrentErr"></span></div>
      </div>
      
      <br></br>
      <br>
      <div style="height:40px;" id="gridBufferSelectionItem">
        <label style="width: 11vw;margin-top:1%;"><?= _GRIDBUFFER ?></label>
        <div style="height:30px; margin-left:13vw;" class="selectbox">
        <select id="gridBufferSelection" name="gridBufferSelection" style="width:200px;">
            <option value= 0 <?= $rowDlm["gridBuffer"] == 0 ? ' selected="selected"' : ''; ?>>0</option>
            <option value= 10 <?= $rowDlm["gridBuffer"] == 10 ? ' selected="selected"' : ''; ?>>10</option>
            <option value= 20 <?= $rowDlm["gridBuffer"] == 20 ? ' selected="selected"' : ''; ?>>20</option>
            <option value= 30 <?= $rowDlm["gridBuffer"] == 30 ? ' selected="selected"' : ''; ?>>30</option>
            <option value= 40 <?= $rowDlm["gridBuffer"] == 40 ? ' selected="selected"' : ''; ?>>40</option>
            <option value= 50 <?= $rowDlm["gridBuffer"] == 50 ? ' selected="selected"' : ''; ?>>50</option>
            <option value= 60 <?= $rowDlm["gridBuffer"] == 60 ? ' selected="selected"' : ''; ?>>60</option>
            <option value= 70 <?= $rowDlm["gridBuffer"] == 70 ? ' selected="selected"' : ''; ?>>70</option>
            <option value= 80 <?= $rowDlm["gridBuffer"] == 80 ? ' selected="selected"' : ''; ?>>80</option>
            <option value= 90 <?= $rowDlm["gridBuffer"] == 90 ? ' selected="selected"' : ''; ?>>90</option>
          </select>
        </div>
      </div> <!--  -->
      <br></br>
      <div id="clusterMaxCurrentPart">
        <!-- clusterMaxCurrent -->
        <div id="clusterMaxCurrentItem">
          <label><?= _CLUSTERMAXCURRENT ?></label>
          <input type="text" id="clusterMaxCurrent" class="textarea1" style="margin-bottom: 1%;"
            name="clusterMaxCurrent" value="<?= htmlspecialchars($rowDlm["clusterMaxCurrent"]); ?>">
          <span class="error" id="clusterMaxCurrentError"></span>
          <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="clusterMaxCurrentErr"></span>
          </div>
        </div>
      </div>
      <div style="height:35px;" id="clusterFailSafeModePart">
        <!-- clusterFailSafeMode -->
        <label style="width: 11vw;margin-top:1%;"><?= _CLUSTERFAILSAFE ?></label>
        <div style="height:30px; margin-left:13vw;" class="selectbox">
          <select id="clusterFailSafeMode" name="clusterFailSafeMode" style="width:200px;"
            onchange="toggleClusterFailsafeMode()">
            <option id="Disabled" value="Disabled" <?= $rowDlm["clusterFailSafeMode"] == "Disabled" ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
            <option id="Enabled" value="Enabled" <?= $rowDlm["clusterFailSafeMode"] == "Enabled" ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
          </select>
        </div>
        <span class="error" id="clusterFailSafeModeError"></span>
        <div class="errorText"><span class="alert" style="float:right; margin:0 0;" id="clusterFailSafeModeErr"></span>
        </div>
      </div><!-- clusterFailSafeMode -->
      <div id="clusterFailSafeCurrentPart">
        <!-- clusterFailSafeCurrent -->
        <div id="mainCircuitCurrentItem">
          <label><?= _CLUSTERFAILSAFECURRENT ?></label>
          <input type="text" id="clusterFailSafeCurrent" class="textarea1" style="margin-bottom: 1%;"
            name="clusterFailSafeCurrent" value="<?= htmlspecialchars($rowDlm["clusterFailSafeCurrent"]); ?>">
          <span class="error" id="clusterFailSafeCurrentError"></span>
          <div class="errorText"><span class="alert" style="float:right; margin:0 0;"
              id="clusterFailSafeCurrentErr"></span></div>
        </div>
      </div>
      <br></br>
      <br>
      <div style="height:35px;" id="supplyTypeSelectionItem">
        <!-- the supply type -->
        <label style="width: 11vw;margin-top:1%;">
          <?= _SUPPLYTYPE ?>
        </label>
        <div style="height:30px; margin-left:13vw;" class="selectbox">
          <select id="supplyTypeSelection" name="supplyTypeSelection" style="width:200px;" onchange="toggleMainCircuitCurrent()">
            <option id="supplyTypeStatic" value="Static" <?= $rowDlm["supplyType"] == "Static" ? ' selected="selected"' : ''; ?>>Static</option>
            <option id="supplyTypeKlefr" value="Klefr" <?= $rowDlm["supplyType"] == "Klefr" ? ' selected="selected"' : ''; ?>>Klefr</option>
            <option id="supplyTypeTic" style="display:<?php echo $followTheSunDisplay; ?>" value="TIC" <?= $rowDlm["supplyType"] == "TIC" ? ' selected="selected"' : ''; ?>>TIC
            </option>
            <option id="supplyTypeGaro" value="GARO" <?= $rowDlm["supplyType"] == "GARO" ? ' selected="selected"' : ''; ?>>
              GARO</option>
            <option id="supplyTypeP1" style="display:<?php echo $P1Display; ?>" value="P1" <?= $rowDlm["supplyType"] == "P1" ? ' selected="selected"' : ''; ?>>
              P1</option>
          </select>
        </div>
      </div><!-- supply type -->

      <br></br>
      <br>
      <div>
        <!-- load management mode -->
        <div style="height:35px;" id="loadManagementModeSelectionItem">
          <!--  -->
          <label style="width: 11vw;margin-top:1%;">
            <?= _LOADMANAGEMENTMODE ?>
          </label>
          <div style="height:30px; margin-left:13vw;" class="selectbox" onchange="loadManagementFunction()">
            <select id="loadManagementModeSelection" name="loadManagementModeSelection" style="width:200px;">
              <option id="equallyShared" value="EquallyShared" <?= $rowDlm["loadManagementMode"] == "EquallyShared" ? ' selected="selected"' : ''; ?>>
                <?= _EQUALLYSHARED ?>
              </option>
              <option id="fifo" value="FIFO" <?= $rowDlm["loadManagementMode"] == "FIFO" ? ' selected="selected"' : ''; ?>>
                <?= _FIFO ?>
              </option>
              <option id="combined" value="Combined" <?= $rowDlm["loadManagementMode"] == "Combined" ? ' selected="selected"' : ''; ?>>
                <?= _COMBINED ?>
              </option>
            </select>
          </div>

        </div> <!--  -->

        <br></br>
        <br>
        <div style="height:40px;" id="fifoPercentageSelectionItem">
          <label style="width: 11vw;margin-top:1%;">
            <?= _FIFOCHARGINGPERCENTAGE ?>
          </label>
          <div style="height:30px; margin-left:13vw;" class="selectbox">
            <select id="fifoPercentageSelection" name="fifoPercentageSelection" style="width:200px;">
              <option value=10 <?= $rowDlm["FIFOPercentage"] == 10 ? ' selected="selected"' : ''; ?>>10</option>
              <option value=20 <?= $rowDlm["FIFOPercentage"] == 20 ? ' selected="selected"' : ''; ?>>20</option>
              <option value=30 <?= $rowDlm["FIFOPercentage"] == 30 ? ' selected="selected"' : ''; ?>>30</option>
              <option value=40 <?= $rowDlm["FIFOPercentage"] == 40 ? ' selected="selected"' : ''; ?>>40</option>
              <option value=50 <?= $rowDlm["FIFOPercentage"] == 50 ? ' selected="selected"' : ''; ?>>50</option>
              <option value=60 <?= $rowDlm["FIFOPercentage"] == 60 ? ' selected="selected"' : ''; ?>>60</option>
              <option value=70 <?= $rowDlm["FIFOPercentage"] == 70 ? ' selected="selected"' : ''; ?>>70</option>
              <option value=80 <?= $rowDlm["FIFOPercentage"] == 80 ? ' selected="selected"' : ''; ?>>80</option>
              <option value=90 <?= $rowDlm["FIFOPercentage"] == 90 ? ' selected="selected"' : ''; ?>>90</option>
            </select>
          </div>
        </div> <!--  -->
        <br></br>
      </div><!-- load management mode -->
    </div><!--  -->
  </div>
  <br></br>
  <button type="button" id="load_management_button" name="load_management_button" class="interfacesButton"
    onclick="checkDLMSettingsForm()" style="text-transform: uppercase;">
    <?= _SAVE ?>
  </button>
  <input type="submit" id="button_load_management" name="button_load_management" hidden>
</div><!-- general div -->

<div id="alertMessageForLoadManagement" style="display:none">
  <p class="dialogText">
    <?= _POWEROPTIMIZEREXTERNALMETERENABLEALERT ?>
  </p>
</div>

<div id="alertMessageForMasterSlave" style="display:none">
  <p class="dialogText">
    <?= _POWEROPTIMIZERDLMENABLEALERT ?>
  </p>
</div>

<div id="alertMessageForMasterSlaveFollowTheSun" style="display:none">
  <p class="dialogText">
    <?= _FOLLOWTHESUNDLMENABLEALERT ?>
  </p>
</div>
