<?php
    include_once "access_control.php";
?>
<div id="loadManagementGroupPage" style="left:28%; position:absolute; width: 630px;  z-index: 1;">
  <div>
    <p class="star" style="display: inline;"><b>*</b> </p>
    <p class="explanation" id="OCPPConnectionPart" style="display: inline;"><?= _EXPLANATION ?></p>

  </div>
  <br></br>
  <button type="button" id="loadmanagement_updatedlmgroup_button" name="loadmanagement_updatedlmgroup_button"
    class="interfacesButtonUpdateSlaveDisabled" style="text-transform: uppercase;">
    <?= _UPDATEDLMGROUP ?>
  </button>
  <input type="submit" id="button_loadmanagement_updatedlmgroup" name="button_loadmanagement_updatedlmgroup" hidden>
  <div style="display:inline-block;width: 38.5vw;">
    <div style="margin-top:2%;" id="numberOfSlavesItem">
      <span style="float:left; padding-top:15px;" class="textInSettings"><?= _NUMBEROFSLAVES ?></span>
      <div style="float:right;margin-right:5%;">
        <div style="height:60px;position:relative;float:left;">
          <input type="text" class="textareaForLocalLoadGroup" id="numberOfSlaves" name="numberOfSlaves" readonly disabled value=<?php echo htmlspecialchars($countSlaves['COUNT( *)']); ?>>
        </div>
      </div>
    </div>
    <br></br>
    <br></br>
    <div style="margin-top:2%;" id="serialNumberSelectionItem">
      <span style="float:left; padding-top:15px;" class="textInSettings"><?= _LISTOFSLAVES ?></span>
      <div style="float:right;margin-right:5%;margin-bottom:0.5%;">
        <div style="height:60px;" class="selectbox" id="queryPart">
          <select id="serialNumberSelection" onchange="checkSaving()">
            <option selected disabled><?= _CHOOSEONE ?></option>
            <?php

            while ($rowDlmSettings = $slaveConfigSettings->fetchArray()) {
              $value = $rowDlmSettings['IPAddress']; ?>

              <option value="<?php echo $rowDlmSettings['serialNumber']; ?>"><?php echo $rowDlmSettings['serialNumber']; ?></option>

            <?php }
            ?>
          </select>
        </div>
      </div>
    </div>
    <!-- -->
    <button type="button" id="loadmanagement_button" name="loadmanagement_button" class="interfacesButton" onclick="saveSlaveConfigDb()" style="text-transform: uppercase;"> <?= _SAVE ?> </button>
    <input type="submit" id="button_loadmanagement" name="button_loadmanagement" hidden>

    <!-- -->
    <br></br>
    <br></br>
    <div id="slaveConfigItems" style="display:none;width:38.5vw;">
      <!-- slave config part -->
      <div style="margin-top:2%;"  id="textMacAddressItem">
        <span style="float:left; padding-top:15px;" class="textInSettings"><?= _MACADDRESS ?></span>
        <div style="float:right;margin-right:5%;">
          <div style="height:60px;position:relative;float:left;" id="div4">
            <input type="text" class="textareaForLocalLoadGroup" id="textMacAddress" name="macAddress" readonly disabled value=<?php echo htmlspecialchars($rowDlmSettings['macAddress']); ?>>
          </div>
        </div>
      </div>

      <!-- -->
      <br></br>
      <br></br>
      <div style="margin-top:2%;" id="textIpAddressItem">
        <span style="float:left; padding-top:15px;" class="textInSettings"><?= _IPADDRESS ?></span>
        <div style="float:right;margin-right:5%;">
          <div style="height:60px;position:relative;float:left;" id="div5">
            <input type="text" class="textareaForLocalLoadGroup" id="textIpAddress" name="ipAddress" readonly disabled value=<?php echo htmlspecialchars($rowDlmSettings['ipAddress']); ?>></td>
          </div>
        </div>
      </div>
      <!-- -->
      <br></br>
      <br></br>
      <div style="margin-top:2%;" id="vipSelectionItem">
        <span style="float:left; padding-top:15px;" class="textInSettings"><?= _VIP ?></span>
        <div style="float:right;margin-right:5%;margin-bottom:0.5%;">
          <div style="height:60px;" class="selectbox" id="div7">
            <select id="vipSelection" name="vipSelection" style="width:220px;">
              <option id="vipSelectionEnable" value="True" <?= $rowDlmSettings["vip"] == "True" ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
              <option id="vipSelectionDisable" value="False" <?= $rowDlmSettings["vip"] == "False" ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>

            </select>
          </div>
      </div>
      <!-- -->
      <br></br>
      <br></br>
      <div style="margin-top:2%;" id="textPhasesNumberItem">
        <span style="float:left; padding-top:15px;" class="textInSettings"><?= _NUMBEROFPHASES ?></span>
        <div style="float:right;margin-right:5%;">
          <div style="height:60px;position:relative;float:left;" id="div8">
            <input type="text" class="textareaForLocalLoadGroup" id="textPhasesNumber" name="phasesNumber" readonly disabled value=<?php echo htmlspecialchars($rowDlmSettings['phasesNumber']); ?>>
          </div>
        </div>
      </div>
      <!-- -->
      <br></br>
      <br></br>
      <div style="margin-top:2%;" id="phaseConnectionSelectionItem">
        <span style="float:left; padding-top:15px;" class="textInSettings"><?= _PHASECONSEQUENCE ?></span>
        <div style="float:right;margin-right:5%;margin-bottom:0.5%;">
          <div style="height:60px;" class="selectbox" id="div9">
            <select id="phaseConnectionSelection" name="phaseConnectionSelection" style="width:220px;">

            </select>
          </div>
        </div>
      </div>
      <br></br>
      <br></br>
      <div style="margin-top:2%;" id="textMaximumCurrentItem">
        <span style="float:left; padding-top:15px;" class="textInSettings"><?= _MAXIMUMCURRENT ?></span>
        <div style="float:right;margin-right:5%;">
          <div style="height:60px;position:relative;float:left;" id="div11">
            <input type="text" class="textareaForLocalLoadGroup" id="textMaximumCurrent" name="maximumCurrent" readonly disabled value=<?php echo htmlspecialchars($rowDlmSettings['maxCurrent']); ?>>
          </div>
        </div>
      </div>
      <!-- -->
      <br></br>
      <br></br>
      <div style="margin-top:2%;" id="textMinCurrent1PItem">
        <span style="float:left; padding-top:15px;" class="textInSettings"><?= _MINIMUMCURRENT1P ?></span>
        <div style="float:right;margin-right:5%;">
          <div style="height:60px;position:relative;float:left;" id="div12">
            <input type="text" class="textareaForLocalLoadGroup" id="textMinCurrent1P" name="minCurrent1P" readonly disabled value=<?php echo htmlspecialchars($rowDlmSettings['minCurrent1P']); ?>>
          </div>
        </div>
      </div>
      <!-- -->
      <br></br>
      <br></br>
      <div style="margin-top:2%;" id="textMinCurrent3PItem">
        <span style="float:left; padding-top:15px;" class="textInSettings"><?= _MINIMUMCURRENT3P ?></span>
        <div style="float:right;margin-right:5%;">
          <div style="height:60px;position:relative;float:left;" id="div13">
            <input type="text" class="textareaForLocalLoadGroup" id="textMinCurrent3P" name="minCurrent3P" readonly disabled value=<?php echo htmlspecialchars($rowDlmSettings['minCurrent3P']); ?>>
          </div>
        </div>
      </div>

      <!-- -->
      <br></br>
      <br></br>
      <div style="margin-top:2%;" id="textForStepItem">
        <span style="float:left; padding-top:15px;" class="textInSettings"><?= _STEP ?></span>
        <div style="float:right;margin-right:5%;">
          <div style="height:60px;position:relative;float:left;" id="div14">
            <input type="text" class="textareaForLocalLoadGroup" id="textForStep" name="step" readonly disabled value=<?php echo htmlspecialchars($rowDlmSettings['step']); ?>>
          </div>
        </div>
      </div>
      <br></br>
      <br></br>
      <div style="margin-top:2%;"  id="textconnectionStatusItem">
        <span style="float:left; padding-top:15px;" class="textInSettings"><?= _CONNECTIONSTATUS ?></span>
        <div style="float:right;margin-right:5%;">
          <div style="height:60px;position:relative;float:left;" id="div18">
            <input type="text" class="textareaForLocalLoadGroup" id="textconnectionStatus" name="textconnectionStatus" readonly disabled value=<?php echo htmlspecialchars($rowDlmSettings["connectionStatus"]); ?>>
          </div>
        </div>
        <br></br>
        <br></br>
        <div style="margin-top: 2%;" id="textFallBackCurrentItem">
            <span style="float:left; padding-top:15px;" class="textInSettings">
              <?= _FALLBACKCURRENT ?>
            </span>
            <div style="float:right;margin-right:5%;">
              <div style="height: 60px; position:relative;float:left;" id="div19">
                <div style="margin-left: 1%;">
                  <input type="number" class="textareaForLocalLoadGroup" id="textofflineCurrent"
                    name="textofflineCurrent"
                    value="<?php echo htmlspecialchars($rowDlmSettings["offlineCurrent"]); ?>">
                </div>
                <span class="error" id="textofflineCurrentError"></span>
              </div>
            </div>
            <div class="errorText" style="align-self: center; margin-left: 10px;">
              <span class="alert" style="margin: 15px auto;" id="textofflineCurrentErr"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br></br>
  <div style="display:inline-block;width: 38.5vw;">
  <div id="slaveConfigItems1">
    <div style="margin-top:2%;" id="serialNumberSelectionItem1">
      <span style="float:left; padding-top:15px;" class="textInSettings">
        <?= _LISTOFCONNECTOR ?>
      </span>
      <div style="float:right;margin-right:5%;margin-bottom:0.5%;">
        <div style="height:60px;" class="selectbox" id="connectorInfoPart">
          <select id="serialNumberSelection1" onchange="checkSavings()">
            <option selected disabled>
              <?= _CHOOSEONE ?>
            </option>
            <?php
            while ($rowDlmSettings1 = $connectorInfoSettings->fetchArray()) {
              $count = $rowDlmSettings1['connectorId'];
            }
            ?>

          </select>
        </div>
      </div>
    </div>
    <!---------->
    <!-- -->
    <br></br>
    <br></br>
    <div style="margin-top:2%;" id="textConnectorStateItem1">
      <span style="float:left; padding-top:15px;" class="textInSettings">
        <?= _CONNECTORSTATE ?>
      </span>
      <div style="float:right;margin-right:5%;">
        <div style="height:60px;position:relative;float:left;" id="div20">
          <input type="text" class="textareaForLocalLoadGroup" id="textConnectorState1" name="connectorState1" readonly
            disabled value=<?php echo htmlspecialchars($rowDlmSettings1["connectorState"]); ?>>

        </div>
      </div>
    </div>
    <!-- -->
    <!-- -->
    <br></br>
    <br></br>
    <div style="margin-top:2%;" id="textInstantCurrentPerPhase1Item1">
      <span style="float:left; padding-top:15px;" class="textInSettings">
        <?= _INSTANTCURPERPHASE ?>1
      </span>
      <div style="float:right;margin-right:5%;">
        <div style="height:60px;position:relative;float:left;" id="div21">
          <input type="text" class="textareaForLocalLoadGroup" id="textInstantCurrentPerPhase01"
            name="instantCurrentPerPhase01" readonly disabled value=<?php if (($rowDlmSettings1["connectorId"]) == "Charging") {
              echo htmlspecialchars($rowDlmSettings1["instantCurrentP1"]);
            } ?>>
        </div>
      </div>
    </div>
    <!-- -->
    <br></br>
    <br></br>
    <div style="margin-top:2%;" id="textInstantCurrentPerPhase2Item1">
      <span style="float:left; padding-top:15px;" class="textInSettings">
        <?= _INSTANTCURPERPHASE ?>2
      </span>
      <div style="float:right;margin-right:5%;">
        <div style="height:60px;position:relative;float:left;" id="div22">
          <input type="text" class="textareaForLocalLoadGroup" id="textInstantCurrentPerPhase02"
            name="instantCurrentPerPhase02" readonly disabled value=<?php echo htmlspecialchars($rowDlmSettings1["instantCurrentP2"]); ?>>
        </div>
      </div>
    </div>
    <!-- -->
    <br></br>
    <br></br>
    <div style="margin-top:2%;" id="textInstantCurrentPerPhase3Item1">
      <span style="float:left; padding-top:15px;" class="textInSettings">
        <?= _INSTANTCURPERPHASE ?>3
      </span>
      <div style="float:right;margin-right:5%;">
        <div style="height:60px;position:relative;float:left;" id="div23">
          <input type="text" class="textareaForLocalLoadGroup" id="textInstantCurrentPerPhase03"
            name="instantCurrentPerPhase03" readonly disabled value=<?php echo htmlspecialchars($rowDlmSettings1["instantCurrentP3"]); ?>>
        </div>
      </div>
    </div>
    <br></br>
    <br></br>
    <div style="margin-top:2%;" id="textAvailableCurrentPerPhase1Item1">
      <span style="float:left; padding-top:15px;" class="textInSettings">
        <?= _AVAILABLECURRENT ?>1
      </span>
      <div style="float:right;margin-right:5%;">
        <div style="height:60px;position:relative;float:left;" id="div24">
          <input type="text" class="textareaForLocalLoadGroup" id="textAvailableCurrentPerPhase01"
            name="availableCurrentPerPhase01" readonly disabled value=<?php echo htmlspecialchars($rowDlmSettings1["availableCurrentP1"]); ?>>
        </div>
      </div>
    </div>
    <br></br>
    <br></br>
    <div style="margin-top:2%;" id="textAvailableCurrentPerPhase2Item1">
      <span style="float:left; padding-top:15px;" class="textInSettings">
        <?= _AVAILABLECURRENT ?>2
      </span>
      <div style="float:right;margin-right:5%;">
        <div style="height:60px;position:relative;float:left;" id="div25">
          <input type="text" class="textareaForLocalLoadGroup" id="textAvailableCurrentPerPhase02"
            name="availableCurrentPhaces02" readonly disabled value=<?php echo htmlspecialchars($rowDlmSettings1["availableCurrentP2"]); ?>>
        </div>
      </div>
    </div>
    <br></br>
    <br></br>
    <div style="margin-top:2%;" id="textAvailableCurrentPerPhase3Item1">
      <span style="float:left; padding-top:15px;" class="textInSettings">
        <?= _AVAILABLECURRENT ?>3
      </span>
      <div style="float:right;margin-right:5%;">
        <div style="height:60px;position:relative;float:left;" id="div26">
          <input type="text" class="textareaForLocalLoadGroup" id="textAvailableCurrentPerPhase03"
            name="availableCurrentPerPhase03" readonly disabled value=<?php echo htmlspecialchars($rowDlmSettings1["availableCurrentP3"]); ?>>
        </div>
      </div>
    </div>
    <br></br>
    <br></br>
    <!-- -->
    </div><!-- slve config part final -->
  </div>
</div>
  <!-- -->
</div>
<div id="notSavedAlertMessageForLoadManagementGroupTab" style="display:none">
  <p class="dialogText"><?= _NOTSAVEDALERT ?></p>
  <p class="dialogTextBold"><?= _SAVEQUESTION ?></p>
</div>

<div id="cpRoleMasterAlertMessage" style="display:none">
    <p class="dialogText" id="cpRoleMasterRequiredText"><?= _CPROLEMASTERREQUIREDFIELD ?></p>
</div>
</div>
</div>
