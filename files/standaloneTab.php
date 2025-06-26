<?php
    include_once "access_control.php";
?>
<div id="standaloneModeTab" style="left: 33.4%; position: absolute; margin-left: -100px; margin-top: 2.7%; z-index: 1;">
    <div>
        <p class="star" style="display: inline;"><b>* </b></p>
        <p class="explanation" style="display: inline;"><?= _EXPLANATION ?></p>
    </div>
    <div id="wrapper">
        <span class="standaloneTitle" style="float:left;"><?= _STANDALONEMODETITLE ?></span>

        <div style="float:right;">
            <div class="selectbox" id = "selectdiv">
                <select id="selectStandaloneMode" name="selectStandaloneMode" style="padding-right: 25px" onchange="selectMode()">
                    <option value="select"><?= _SELECTMODE ?></option>
                    <option id="rfidLocalList" value="localList" <?= $rowStandaloneSettings["mode"] == "localList" ? ' selected="selected"' : ''; ?>><?= _RFIDLOCALLIST ?></option>
                    <option id="acceptAllRfids" value="acceptAll" <?= $rowStandaloneSettings["mode"] == "acceptAll" ? ' selected="selected"' : ''; ?>><?= _ACCEPTALLRFIDS ?></option>
                    <option id="autoStart" value="autoStart" <?= $rowStandaloneSettings["mode"] == "autoStart" ? ' selected="selected"' : ''; ?>><?= _AUTOSTART ?></option>
                </select>
            </div>

            <span class="error" id="standaloneErr">*</span>

        </div>
    </div>
    <div id="standalone_saved_message" style="display: none"><?= _SAVESUCCESSFUL ?></div>
    <div style="float:right">

        <span class="alert" style="float:right; margin-bottom:1px;" id="standaloneModeErr"></span>

        <div id="mode" style="visibility: hidden;">
            <label id = "manageLebel"><?= _MANAGERFIDLOCALLIST ?></label>
            <br></br>
            <input type="text" name="from" id="from" class="textarea1">
            <br></br>
            <?php
            $list = $rowStandaloneSettings["localList"];
            $list = explode(",", $list);
            $array_length = count($list);
            ?>
            <select multiple id="to" size="10" name="rfids[]" class="listbox">
                <?php
                for ($i = 0; $i < $array_length; $i++) {
                    if ($list[$i] != "") {
                ?>
                        <option style="color:black;" value="<?= $list[$i]; ?>"><?= $list[$i]; ?></option>
                <?php
                    }
                }
                ?>
            </select>
            <div class="centerButtons">
                <button type="button" id="add_button" name="add_button" onclick="addToList('from', 'to')" class="standalone_button" style="margin-right:10%;"> <?= _ADD ?> </button>
                <button type="button" id="remove_button" name="remove_button" onclick="removeFromList('to')" class="standalone_button"> <?= _REMOVE ?> </button>
            </div>
        </div>
        <div class="centerSaveButton">
            <button type="button" id="rfid_list_button" name="rfid_list_button" onclick="sendMode()" class="standaloneModeButton"> <?= _SAVE ?> </button>
            <input type="submit" id="button_standalone" name="button_standalone" hidden>
        </div>
        <input type="text" class="textarea1" id="demo" name="demo" hidden>
    </div>
</div>

<div id="alertMessage" style="display:none">
    <p class="dialogText"><?= _OCPPENABLEALERT ?></p>
</div>

<div id="standaloneModeAlertMessage" style="display:none">
    <p class="dialogText" id="standaloneModeTransitionAlert" style="text-align:center;"><?= _APPLICATIONRESTART ?></p>
    <p class="dialogTextBold"><?= _ACCEPTQUESTION ?></p>
</div>
