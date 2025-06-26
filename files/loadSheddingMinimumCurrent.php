<?php
    include_once "access_control.php";
    $loadSheddingStatusActive = "none";
    $loadSheddingStatusInactive = "";
    if($rowInstallationSettings["loadSheddingSwitchStatus"] == 0){
        $loadSheddingStatusActive = "none";
        $loadSheddingStatusInactive = "";

    }
    else{
        $loadSheddingStatusActive = "";
        $loadSheddingStatusInactive = "none";

    }
?>
<div style="left:28%; position:absolute; width: 37.5vw;" id="loadSheddingMinimumCurrentPage">
<div style="display:flex;">
    <p class="explanation" style="display: inline;">
        <p class="textInSettings"><?= _LOADSHEDDINGSTATUS ?></p>
        <p class="textInSettings" style="width:12vw;margin-left:auto;display:<?php echo $loadSheddingStatusActive; ?>"?><?= _ACTIVE ?></p>
        <p class="textInSettings" style="width:12vw;margin-left:auto;display:<?php echo $loadSheddingStatusInactive; ?>"><?= _INACTIVE ?></p>
        
    </p>
</div>
<br></br>
    <span style="float:left; padding-top:15px;" class="textInSettings"><?= _LOADSHEDDINGMINIMUMCURRENT ?></span>
    <div style="float:right; ">
        <div style="height:60px; " class="selectbox">
            <select id="loadSheddingMinimumCurrentValueSelection" name="loadSheddingMinimumCurrentValueSelection" style="width: 12vw;">
                <?php foreach ($loadSheddingMinimumCurrentValues as $t) { ?>
                    <option value="<?php print $t ?>"<?php if($rowInstallationSettings["loadSheddingMinimumCurrent"] == $t) echo 'selected="selected"'; ?>>
                        <?php echo $t ?>
                    </option>
                <?php } ?>
        </select>  
        </div>
    </div>
</div>

<div style="display:flex;margin-top:34%;margin-left:35%;">
    <button type="button" name="load_shedding_minimum_current_button" id="load_shedding_minimum_current_button" class="interfacesButton" onclick="checkLoadSheddingMinimumCurrentForm()"> <?= _SAVE ?> </button>
    <input type="submit" id="button_load_shedding_minimum_current" name="button_load_shedding_minimum_current" hidden>
</div>