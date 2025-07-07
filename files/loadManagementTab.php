<?php
    include_once "access_control.php";
?>
<div class="container my-5" id="loadManagementGeneralSettingsPage">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="row mb-3">
        <div class="col-12 d-flex align-items-center">
          <p class="star mb-0 me-2"><b>*</b></p>
          <p class="explanation mb-0" id="OCPPConnectionPart"><?= _EXPLANATION ?></p>
        </div>
      </div>

      <div class="row mb-4 align-items-center" id="LoadManagementGeneralSettings">
        <div class="col-12 col-md-6 textInSettings">
          <?= _LOADMANAGEMENTOPTION ?>
        </div>
        <div class="col-12 col-md-6">
          <select id="loadManagementSelection" name="loadManagementSelection" class="form-select" onchange="loadManagementOptionFunction()">
            <option id="loadManagementEnable" value="Enabled" <?= $rowDlm["dlmMode"] == "Enabled" ? ' selected="selected"' : ''; ?>>Master/Slave</option>
            <option id="loadManagementModbus" value="Modbus" <?= $rowDlm["dlmMode"] == "Modbus" ? ' selected="selected"' : ''; ?>>Modbus TCP</option>
            <option id="loadManagementEebus" value="Eebus" <?= $rowDlm["dlmMode"] == "Eebus" ? ' selected="selected"' : ''; ?>>EEBUS</option>
            <option id="loadManagementDisable" value="Disabled" <?= $rowDlm["dlmMode"] == "Disabled" ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="failSafeCurrentItem" style="display:none;">
        <div class="col-12 col-md-4">
          <label><?= _FAILSAFECURRENT ?></label>
        </div>
        <div class="col-12 col-md-8">
          <input type="text" id="failSafeCurrent" class="form-control" name="failSafeCurrent" value="<?= htmlspecialchars($rowDlm["failSafeCurrent"]) ?>">
          <span class="error" id="failSafeCurrentError">*</span>
          <div class="errorText"><span class="alert float-end" id="failSafeCurrentErr"></span></div>
        </div>
      </div>


      <div class="row mb-3" id="CPRolePart">
        <div class="col-12 col-md-6">
          <label class="textInSettings"> <?= _CPROLE ?> </label>
        </div>
        <div class="col-12 col-md-6">
          <select id="cpRoleSelection" name="cpRoleSelection" class="form-select" onchange="CPRoleFunction()">
            <option id="slave" value="Slave" <?= $rowDlm["cpRole"] == "Slave" ? ' selected="selected"' : ''; ?>><?= _SLAVE ?></option>
            <option id="master" value="Master" <?= $rowDlm["cpRole"] == "Master" ? ' selected="selected"' : ''; ?>><?= _MASTER ?></option>
          </select>
        </div>
      </div>

      <div class="row mb-3" id="DLMInterfacePart">
        <div class="col-12 col-md-6">
          <label class="textInSettings"> <?= _DLMINTERFACE ?> </label>
        </div>
        <div class="col-12 col-md-6">
          <select id="dlmInterfaceSelectionOuter" name="dlmInterfaceSelectionOuter" class="form-select">
            <option id="Ethernet" value="Ethernet" <?= $rowDlm["dlmInterface"] == "Ethernet" ? ' selected="selected"' : ''; ?>><?= _ETHERNET ?></option>
            <option id="wifi" value="wifi" style="display:<?= $wifiDisplay ?>" <?= $rowDlm["dlmInterface"] == "wifi" ? ' selected="selected"' : ''; ?>><?= _WIFI ?></option>
          </select>
          <span class="error" id="dlmInterfaceSelectionOuterError"></span>
          <div class="errorText">
            <span class="alert float-end" id="dlmInterfaceSelectionOuterErr"></span>
          </div>
        </div>
      </div>

      <div class="row mb-3" id="failsafeCurrentItem">
        <div class="col-12 col-md-6">
          <label class="textInSettings"> <?= _FAILSAFECURRENT ?> </label>
        </div>
        <div class="col-12 col-md-6">
          <input type="text" id="textfailsafeCurrent" class="form-control bg-secondary-subtle" name="failsafeCurrent" readonly value="<?= htmlspecialchars($rowEebusConfigurations["fallbackCurrent"]) ?>">
          <span class="error" id="failsafeCurrentError"></span>
          <div class="errorText">
            <span class="alert float-end" id="failsafeCurrentErr"></span>
          </div>
        </div>
      </div>

      <div class="row mb-3" id="statusItem">
        <div class="col-12 col-md-6">
          <label class="textInSettings"> <?= _STATUS ?> </label>
        </div>
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
        <div class="col-12 col-md-6">
          <input type="text" id="textSkiStatus" class="form-control bg-secondary-subtle" name="status" readonly value="<?= htmlspecialchars($skiStatus) ?>">
          <span class="error" id="statusError"></span>
          <div class="errorText">
            <span class="alert float-end" id="statusErr"></span>
          </div>
        </div>
      </div>

      <div class="row mb-3" id="firmwareVersionItem">
        <div class="col-12 col-md-6">
          <label class="textInSettings"> <?= _FIRMWAREVERSION ?> </label>
        </div>
        <div class="col-12 col-md-6">
          <input type="text" id="textFirmwareVersion" class="form-control bg-secondary-subtle" name="firmwareVersion" readonly value="<?= $rowEebusConfigurations["firmwareVersion"] ?>">
          <span class="error" id="firmwareVersionError"></span>
          <div class="errorText">
            <span class="alert float-end" id="firmwareVersionErr"></span>
          </div>
        </div>
      </div>

      <div class="row mb-3" id="pairedEnergyManagerItem">
        <div class="col-12 col-md-6">
          <label class="textInSettings"> <?= _PAIRINGENERGYMANAGER ?> </label>
        </div>
        <div class="col-12 col-md-6">
          <?php
          try {
            $SKI = $rowEebusPairInfo['ski'];
            if ($SKI == '') {
              // Display "None" if ski value is empty
          ?>
          <input type="text" id="textPairedEnergyManager" class="form-control" name="pairedEnergyManager" readonly value="None">
          <?php
            } else {
              // Display data from the table
              do {
                $manufacturer = $rowEebusPairInfo['manufacturer'];
                $product = $rowEebusPairInfo['product'];
          ?>
          <input type="text" id="textPairedEnergyManager" class="form-control" name="pairedEnergyManager" readonly value="<?= htmlspecialchars($product) ?> from <?= htmlspecialchars($manufacturer) ?> (ski: <?= htmlspecialchars($SKI) ?>)">
          <?php
              } while ($rowEebusPairInfo = $eebusPairInfo->fetchArray());
            }
          } catch (Exception $e) {
            // Handle exception
          }
          ?>
        </div>
      </div>

      <div class="row mb-3" id="unpairedEnergyManagerItem">
        <div class="col-12 col-md-6">
          <label class="textInSettings"><?= _UNPAIR ?></label>
        </div>
        <div class="col-12 col-md-6 d-flex align-items-center">
          <?php
            $pairingState = "false";
          ?>
          <button type="button" id="eebusUnpair" name="eebusUnpair" class="btn btn-outline-danger px-2 w-100 <?php if ($pairingState === "false") echo 'active'; ?>" value="false">
            <?= _UNPAIR ?>
          </button>
        </div>
      </div>

      <div class="row mb-3" id="eebusDiscovery" style="align-items: center;">
        <div class="col-12 col-md-4">
          <label class="textInSettings"><?= _EEBUSDISCOVERY ?></label>
        </div>
        <div class="col-12 col-md-5">
          <select id="selectEebusDiscovery" name="selectEebusDiscovery" class="form-select">
            <?php
              try {
                if (file_exists("/var/lib/vestel/webconfig.db")) {
                  class MyDBEEBUSs extends SQLite3 {
                    function __construct() {
                      $this->open('/var/lib/vestel/webconfig.db');
                    }
                  }

                  $eebusDB = new MyDBEEBUSs();
                  $eebusDB->busyTimeout(10000);

                  $stmt = $eebusDB->prepare("SELECT * FROM eebusDiscovery");
                  $eebusDiscovery = $stmt->execute();

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
        <div id="pairingEnergyManagerItem" class="col-12 col-md-3 d-flex gap-2">
          <div id="selectEEBUSPairingPair" name="selectEEBUSPairingPair">

            <?php
              $pairingState1 = 'true';
              $isSkiEmpty = ($SKI ?? '') === '' ? 0 : 1;
              $isSkiDiscoveryEmpty = ($skiDiscovery ?? '') === '' ? 0 : 1;
              if (!((($isSkiEmpty === 0) && ($isSkiDiscoveryEmpty === 1)))) {
                ?>
              <button type="button" id="eebusPair" name="eebusPair" class="btn btn-secondary px-2 w-100 disabled selected" value="true" disabled>
                <?= _PAIR ?>
              </button>
            <?php } else { ?>
              <button type="button" id="eebusPair" name="eebusPair" class="btn btn-primary px-2 w-100 <?= ($pairingState1 === 'true') ? 'selected' : ''; ?>" value="true">
                <?= _PAIR ?>
              </button>
            <?php } ?>
          </div>
        </div>
      </div>
      
      <div class="row mb-3">
        <div class="col-12 d-flex justify-content-center">
          <div class="col-12 col-md-6">
            <button type="button" id="refreshButton" name="refreshButton" class="btn btn-primary px-2 w-100"
              onclick="refreshSelectBox()">
              <?= _REFRESH ?>
            </button>
          </div>
        </div>
      </div>

      
      <div id="DLMSettingsPart">
        <div class="row my-4">
          <div class="col-12">
            <h3 class="textForOccpSetting"><?= _GRIDSETTINGS ?></h3>
          </div>
        </div>

        <!-- Main Circuit Current -->
        <div class="row mb-3" id="mainCircuitCurrentItem">
          <div class="col-12 col-md-6">
            <label class="textInSettings"><?= _MAINCIRCUITCURRENT ?></label>
          </div>
          <div class="col-12 col-md-6">
            <?php if ($rowDlm["supplyType"] != "TIC"): ?>
              <input type="text" id="mainCircuitCurrent" class="form-control" name="mainCircuitCurrent" value="<?= htmlspecialchars($rowDlm["mainCircuitCurrent"]); ?>">
            <?php else: ?>
              <input type="text" id="mainCircuitCurrent" class="form-control" name="mainCircuitCurrent" value="<?= htmlspecialchars($rowDlm["dlmTICTotalCurrent"]); ?>">
            <?php endif; ?>
            <span class="error" id="mainCircuitCurrentError">*</span>
            <div class="errorText">
              <span class="alert float-end" id="mainCircuitCurrentErr"></span>
            </div>
          </div>
        </div>

        <!-- Grid Buffer Selection -->
        <div class="row mb-3" id="gridBufferSelectionItem">
          <div class="col-12 col-md-6">
            <label class="textInSettings"><?= _GRIDBUFFER ?></label>
          </div>
          <div class="col-12 col-md-6">
            <select id="gridBufferSelection" name="gridBufferSelection" class="form-select w-100">
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
        </div>

        <!-- clusterMaxCurrent -->
        <div id="clusterMaxCurrentPart">
          <div class="row mb-3" id="clusterMaxCurrentItem">
            <div class="col-12 col-md-6">
              <label class="textInSettings"><?= _CLUSTERMAXCURRENT ?></label>
            </div>
            <div class="col-12 col-md-6">
              <input type="text" id="clusterMaxCurrent" class="form-control w-100" name="clusterMaxCurrent" value="<?= htmlspecialchars($rowDlm["clusterMaxCurrent"]); ?>">
              <span class="error" id="clusterMaxCurrentError"></span>
              <div class="errorText">
                <span class="alert float-end" id="clusterMaxCurrentErr"></span>
              </div>
            </div>
          </div>
        </div>
        
        
        <!-- clusterFailSafeMode -->
        <div class="row mb-3" id="clusterFailSafeModePart">
          <div class="col-12 col-md-6">
            <label class="textInSettings"><?= _CLUSTERFAILSAFE ?></label>
          </div>
          <div class="col-12 col-md-6">
            <select id="clusterFailSafeMode" name="clusterFailSafeMode" class="form-select w-100" onchange="toggleClusterFailsafeMode()">
              <option value="Disabled" <?= $rowDlm["clusterFailSafeMode"] == "Disabled" ? 'selected' : ''; ?>><?= _DISABLED ?></option>
              <option value="Enabled" <?= $rowDlm["clusterFailSafeMode"] == "Enabled" ? 'selected' : ''; ?>><?= _ENABLED ?></option>
            </select>
            <span class="error" id="clusterFailSafeModeError"></span>
            <div class="errorText">
              <span class="alert float-end" id="clusterFailSafeModeErr"></span>
            </div>
          </div>
        </div>

        <!-- Cluster Failsafe Current -->
        <div class="row mb-3" id="clusterFailSafeCurrentPart">
          <div class="col-12 col-md-6">
            <label class="textInSettings"><?= _CLUSTERFAILSAFECURRENT ?></label>
          </div>
          <div class="col-12 col-md-6">
            <input type="text" id="clusterFailSafeCurrent" class="form-control w-100" name="clusterFailSafeCurrent" value="<?= htmlspecialchars($rowDlm["clusterFailSafeCurrent"]); ?>">
            <span class="error" id="clusterFailSafeCurrentError"></span>
            <div class="errorText">
              <span class="alert float-end" id="clusterFailSafeCurrentErr"></span>
            </div>
          </div>
        </div>

        <!-- Supply Type -->
        <div class="row mb-3" id="supplyTypeSelectionItem">
          <div class="col-12 col-md-6">
            <label class="textInSettings"><?= _SUPPLYTYPE ?></label>
          </div>
          <div class="col-12 col-md-6">
            <select id="supplyTypeSelection" name="supplyTypeSelection" class="form-select w-100" onchange="toggleMainCircuitCurrent()">
              <option id="supplyTypeStatic" value="Static" <?= $rowDlm["supplyType"] == "Static" ? ' selected="selected"' : ''; ?>>Static</option>
              <option id="supplyTypeKlefr" value="Klefr" <?= $rowDlm["supplyType"] == "Klefr" ? ' selected="selected"' : ''; ?>>Klefr</option>
              <option id="supplyTypeTic" style="display:<?php echo $followTheSunDisplay; ?>" value="TIC" <?= $rowDlm["supplyType"] == "TIC" ? ' selected="selected"' : ''; ?>>TIC</option>
              <option id="supplyTypeGaro" value="GARO" <?= $rowDlm["supplyType"] == "GARO" ? ' selected="selected"' : ''; ?>>GARO</option>
              <option id="supplyTypeP1" style="display:<?php echo $P1Display; ?>" value="P1" <?= $rowDlm["supplyType"] == "P1" ? ' selected="selected"' : ''; ?>>P1</option>
            </select>
          </div>
        </div>

        <!-- Load Management Mode -->
        <div class="row mb-3" id="loadManagementModeSelectionItem">
          <div class="col-12 col-md-6">
            <label class="textInSettings"><?= _LOADMANAGEMENTMODE ?></label>
          </div>
          <div class="col-12 col-md-6">
            <select id="loadManagementModeSelection" name="loadManagementModeSelection" class="form-select w-100" onchange="loadManagementFunction()">
              <option id="equallyShared" value="EquallyShared" <?= $rowDlm["loadManagementMode"] == "EquallyShared" ? ' selected="selected"' : ''; ?>><?= _EQUALLYSHARED ?></option>
              <option id="fifo" value="FIFO" <?= $rowDlm["loadManagementMode"] == "FIFO" ? ' selected="selected"' : ''; ?>><?= _FIFO ?></option>
              <option id="combined" value="Combined" <?= $rowDlm["loadManagementMode"] == "Combined" ? ' selected="selected"' : ''; ?>><?= _COMBINED ?></option>
            </select>
          </div>
        </div>

        <!-- FIFO Charging Percentage -->
        <div class="row mb-4" id="fifoPercentageSelectionItem">
          <div class="col-12 col-md-6">
            <label class="textInSettings"><?= _FIFOCHARGINGPERCENTAGE ?></label>
          </div>
          <div class="col-12 col-md-6">
            <select id="fifoPercentageSelection" name="fifoPercentageSelection" class="form-select">
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
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-12 d-flex justify-content-center">
          <div class="col-12 col-md-6">
            <button type="button" id="load_management_button" name="load_management_button" class="btn btn-success px-2 w-100" onclick="checkDLMSettingsForm()">
              <?= _SAVE ?>
            </button>
            <input type="submit" id="button_load_management" name="button_load_management" hidden>      
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container text-center mt-4" id="alertMessageForLoadManagement" style="display:none">
  <p class="dialogText">
    <?= _POWEROPTIMIZEREXTERNALMETERENABLEALERT ?>
  </p>
</div>

<div class="container text-center mt-4" id="alertMessageForMasterSlave" style="display:none">
  <p class="dialogText">
    <?= _POWEROPTIMIZERDLMENABLEALERT ?>
  </p>
</div>

<div class="container text-center mt-4" id="alertMessageForMasterSlaveFollowTheSun" style="display:none">
  <p class="dialogText">
    <?= _FOLLOWTHESUNDLMENABLEALERT ?>
  </p>
</div>