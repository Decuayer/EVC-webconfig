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
<div class="container my-4" id="loadSheddingMinimumCurrentPage">
    <div class="row justify-content-center">
        <div class="row col-12 col-md-8">
            <div class="row mb-4 align-items-center">
                <div class="col-12 col-md-6">
                    <p class="textInSettings mb-0"><?= _LOADSHEDDINGSTATUS ?></p>
                </div>
                <div class="col-12 col-md-6 text-end">
                    <p class="textInSettings mb-0" style="display:<?= $loadSheddingStatusActive ?>;"><?= _ACTIVE ?></p>
                    <p class="textInSettings mb-0" style="display:<?= $loadSheddingStatusInactive ?>;"><?= _INACTIVE ?></p>
                </div>
            </div>
            <div class="row mb-4 align-items-center">
                <label class="col-12 col-md-6 textInSettings"><?= _LOADSHEDDINGMINIMUMCURRENT ?></label>
                <div class="col-12 col-md-6">
                    <select class="form-select" id="loadSheddingMinimumCurrentValueSelection" name="loadSheddingMinimumCurrentValueSelection">
                        <?php foreach ($loadSheddingMinimumCurrentValues as $t): ?>
                        <option value="<?= $t ?>" <?= $rowInstallationSettings["loadSheddingMinimumCurrent"] == $t ? 'selected' : '' ?>>
                            <?= $t ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-center my-4">
                <button type="button" name="load_shedding_minimum_current_button" id="load_shedding_minimum_current_button"
                class="btn btn-primary px-4" onclick="checkLoadSheddingMinimumCurrentForm()">
                <?= _SAVE ?>
                </button>
                <input type="submit" id="button_load_shedding_minimum_current" name="button_load_shedding_minimum_current" hidden>
            </div>
        </div>
    </div>
</div>