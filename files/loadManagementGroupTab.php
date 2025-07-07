<?php
    include_once "access_control.php";
?>
<div class="container my-5 py-5" id="loadManagementGroupPage">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="mb-3 d-flex align-items-center">
        <p class="star mb-0 me-2"><b>*</b></p>
        <p class="explanation mb-0" id="OCPPConnectionPart"><?= _EXPLANATION ?></p>
      </div>

      <div class="mb-4">
        <button type="button" id="loadmanagement_updatedlmgroup_button" name="loadmanagement_updatedlmgroup_button"
          class="btn btn-outline-secondary px-2">
          <?= _UPDATEDLMGROUP ?>
        </button>
        <input type="submit" id="button_loadmanagement_updatedlmgroup" name="button_loadmanagement_updatedlmgroup" hidden>
      </div>

      <div class="row gx-3">
        <div class="col-12 col-md-6 mb-4" id="numberOfSlavesItem">
          <label for="numberOfSlaves" class="textInSettings"><?= _NUMBEROFSLAVES ?></label>
          <input type="text" id="numberOfSlaves" name="numberOfSlaves" class="form-control" readonly disabled
            value="<?= htmlspecialchars($countSlaves['COUNT( *)']); ?>">
        </div>

        <div class="col-12 col-md-6 mb-4" id="serialNumberSelectionItem">
          <label for="serialNumberSelection" class="textInSettings"><?= _LISTOFSLAVES ?></label>
          <select id="serialNumberSelection" name="serialNumberSelection" class="form-select" onchange="checkSaving()">
            <option selected disabled><?= _CHOOSEONE ?></option>
            <?php
            while ($rowDlmSettings = $slaveConfigSettings->fetchArray()) {
              $value = $rowDlmSettings['IPAddress']; ?>
              <option value="<?php echo $rowDlmSettings['serialNumber']; ?>"><?php echo $rowDlmSettings['serialNumber']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>

      <div class="mb-4">
        <button type="button" id="loadmanagement_button" name="loadmanagement_button" class="btn btn-primary px-2 w-25"
          onclick="saveSlaveConfigDb()">
          <?= _SAVE ?>
        </button>
        <input type="submit" id="button_loadmanagement" name="button_loadmanagement" hidden>
      </div>

      <div id="slaveConfigItems" class="d-none">
        <div class="row gx-3 gy-3">
          <div class="col-12 col-md-6" id="textMacAddressItem">
            <label for="textMacAddress" class="textInSettings"><?= _MACADDRESS ?></label>
            <input type="text" id="textMacAddress" name="macAddress" class="form-control" readonly disabled
              value="<?= htmlspecialchars($rowDlmSettings['macAddress']); ?>">
          </div>

          <div class="col-12 col-md-6" id="textIpAddressItem">
            <label for="textIpAddress" class="textInSettings"><?= _IPADDRESS ?></label>
            <input type="text" id="textIpAddress" name="ipAddress" class="form-control" readonly disabled
              value="<?= htmlspecialchars($rowDlmSettings['ipAddress']); ?>">
          </div>

          <div class="col-12 col-md-6" id="vipSelectionItem">
            <label for="vipSelection" class="textInSettings"><?= _VIP ?></label>
            <select id="vipSelection" name="vipSelection" class="form-select" style="max-width: 220px;">
              <option value="True" <?= $rowDlmSettings["vip"] == "True" ? 'selected' : ''; ?>><?= _ENABLED ?></option>
              <option value="False" <?= $rowDlmSettings["vip"] == "False" ? 'selected' : ''; ?>><?= _DISABLED ?></option>
            </select>
          </div>

          <div class="col-12 col-md-6" id="textPhasesNumberItem">
            <label for="textPhasesNumber" class="textInSettings"><?= _NUMBEROFPHASES ?></label>
            <input type="text" id="textPhasesNumber" name="phasesNumber" class="form-control" readonly disabled
              value="<?= htmlspecialchars($rowDlmSettings['phasesNumber']); ?>">
          </div>

          <div class="col-12 col-md-6" id="phaseConnectionSelectionItem">
            <label for="phaseConnectionSelection" class="textInSettings"><?= _PHASECONSEQUENCE ?></label>
            <select id="phaseConnectionSelection" name="phaseConnectionSelection" class="form-select" style="max-width: 220px;">
              <!-- Options dinamik olarak JS ile dolduruluyor -->
            </select>
          </div>

          <div class="col-12 col-md-6" id="textMaximumCurrentItem">
            <label for="textMaximumCurrent" class="textInSettings"><?= _MAXIMUMCURRENT ?></label>
            <input type="text" id="textMaximumCurrent" name="maximumCurrent" class="form-control" readonly disabled
              value="<?= htmlspecialchars($rowDlmSettings['maxCurrent']); ?>">
          </div>

          <div class="col-12 col-md-6" id="textMinCurrent1PItem">
            <label for="textMinCurrent1P" class="textInSettings"><?= _MINIMUMCURRENT1P ?></label>
            <input type="text" id="textMinCurrent1P" name="minCurrent1P" class="form-control" readonly disabled
              value="<?= htmlspecialchars($rowDlmSettings['minCurrent1P']); ?>">
          </div>

          <div class="col-12 col-md-6" id="textMinCurrent3PItem">
            <label for="textMinCurrent3P" class="textInSettings"><?= _MINIMUMCURRENT3P ?></label>
            <input type="text" id="textMinCurrent3P" name="minCurrent3P" class="form-control" readonly disabled
              value="<?= htmlspecialchars($rowDlmSettings['minCurrent3P']); ?>">
          </div>

          <div class="col-12 col-md-6" id="textForStepItem">
            <label for="textForStep" class="textInSettings"><?= _STEP ?></label>
            <input type="text" id="textForStep" name="step" class="form-control" readonly disabled
              value="<?= htmlspecialchars($rowDlmSettings['step']); ?>">
          </div>

          <div class="col-12 col-md-6" id="textconnectionStatusItem">
            <label for="textconnectionStatus" class="textInSettings"><?= _CONNECTIONSTATUS ?></label>
            <input type="text" id="textconnectionStatus" name="textconnectionStatus" class="form-control" readonly disabled
              value="<?= htmlspecialchars($rowDlmSettings["connectionStatus"]); ?>">
          </div>

          <div class="col-12 col-md-6" id="textFallBackCurrentItem">
            <label for="textofflineCurrent" class="textInSettings"><?= _FALLBACKCURRENT ?></label>
            <input type="number" id="textofflineCurrent" name="textofflineCurrent" class="form-control"
              value="<?= htmlspecialchars($rowDlmSettings["offlineCurrent"]); ?>">
            <span class="error" id="textofflineCurrentError"></span>
            <div class="errorText">
              <span class="alert" id="textofflineCurrentErr"></span>
            </div>
          </div>
        </div>
      </div>

      <div id="slaveConfigItems1" class="mt-5">
        <div class="row gx-3 gy-3">
          <div class="col-12 col-md-6" id="serialNumberSelectionItem1">
            <label for="serialNumberSelection1" class="textInSettings"><?= _LISTOFCONNECTOR ?></label>
            <select id="serialNumberSelection1" name="serialNumberSelection1" class="form-select w-100" onchange="checkSavings()">
              <option selected disabled><?= _CHOOSEONE ?></option>
              <?php
                while ($rowDlmSettings1 = $connectorInfoSettings->fetchArray()) {
                  $count = $rowDlmSettings1['connectorId'];
                }
              ?>
            </select>
          </div>

          <div class="col-12 col-md-6" id="textConnectorStateItem1">
            <label for="textConnectorState1" class="textInSettings"><?= _CONNECTORSTATE ?></label>
            <input type="text" id="textConnectorState1" name="connectorState1" class="form-control" readonly disabled
              value="<?= htmlspecialchars($rowDlmSettings1["connectorState"]); ?>">
          </div>

          <div class="col-12 col-md-4" id="textInstantCurrentPerPhase1Item1">
            <label for="textInstantCurrentPerPhase01" class="textInSettings"><?= _INSTANTCURPERPHASE ?>1</label>
            <input type="text" id="textInstantCurrentPerPhase01" name="instantCurrentPerPhase01" class="form-control"
              readonly disabled
              value="<?= (($rowDlmSettings1["connectorId"] ?? '') === "Charging") ? htmlspecialchars($rowDlmSettings1["instantCurrentP1"]) : ''; ?>">
          </div>

          <div class="col-12 col-md-4" id="textInstantCurrentPerPhase2Item1">
            <label for="textInstantCurrentPerPhase02" class="textInSettings"><?= _INSTANTCURPERPHASE ?>2</label>
            <input type="text" id="textInstantCurrentPerPhase02" name="instantCurrentPerPhase02" class="form-control"
              readonly disabled value="<?= htmlspecialchars($rowDlmSettings1["instantCurrentP2"]); ?>">
          </div>

          <div class="col-12 col-md-4" id="textInstantCurrentPerPhase3Item1">
            <label for="textInstantCurrentPerPhase03" class="textInSettings"><?= _INSTANTCURPERPHASE ?>3</label>
            <input type="text" id="textInstantCurrentPerPhase03" name="instantCurrentPerPhase03" class="form-control"
              readonly disabled value="<?= htmlspecialchars($rowDlmSettings1["instantCurrentP3"]); ?>">
          </div>

          <div class="col-12 col-md-4" id="textAvailableCurrentPerPhase1Item1">
            <label for="textAvailableCurrentPerPhase01" class="textInSettings"><?= _AVAILABLECURRENT ?>1</label>
            <input type="text" id="textAvailableCurrentPerPhase01" name="availableCurrentPerPhase01" class="form-control"
              readonly disabled value="<?= htmlspecialchars($rowDlmSettings1["availableCurrentP1"]); ?>">
          </div>

          <div class="col-12 col-md-4" id="textAvailableCurrentPerPhase2Item1">
            <label for="textAvailableCurrentPerPhase02" class="textInSettings"><?= _AVAILABLECURRENT ?>2</label>
            <input type="text" id="textAvailableCurrentPerPhase02" name="availableCurrentPerPhase02" class="form-control"
              readonly disabled value="<?= htmlspecialchars($rowDlmSettings1["availableCurrentP2"]); ?>">
          </div>

          <div class="col-12 col-md-4" id="textAvailableCurrentPerPhase3Item1">
            <label for="textAvailableCurrentPerPhase03" class="textInSettings"><?= _AVAILABLECURRENT ?>3</label>
            <input type="text" id="textAvailableCurrentPerPhase03" name="availableCurrentPerPhase03" class="form-control"
              readonly disabled value="<?= htmlspecialchars($rowDlmSettings1["availableCurrentP3"]); ?>">
          </div>
        </div>
      </div>

      <div id="notSavedAlertMessageForLoadManagementGroupTab" class="container mt-4" style="display: none;">
        <p class="dialogText"><?= _NOTSAVEDALERT ?></p>
        <p class="dialogTextBold"><?= _SAVEQUESTION ?></p>
      </div>

      <div id="cpRoleMasterAlertMessage" class="container text-center mt-4" style="display: none;">
        <p class="dialogText" id="cpRoleMasterRequiredText"><?= _CPROLEMASTERREQUIREDFIELD ?></p>
      </div>
    </div>
  </div>
</div>

