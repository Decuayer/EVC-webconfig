<?php
    include_once "access_control.php";
?>
<div class="container my-5" id="generalSettingsQRCodePage">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="row align-items-center mb-3">
                <div class="col-12 col-md-6">
                    <span class="textInSettings"><?= _QRCODEONSCREEN ?></span>
                </div>
                <div class="col-12 col-md-6">
                    <select id="qrCodeSelection" name="qrCodeSelection" class="form-select w-100" onchange="qrCodeFunction()">
                        <option id="qrCodeDisable" value="0" <?= $rowGeneral["qrCode"] == 0 ? 'selected' : ''; ?>><?= _DISABLED ?></option>
                        <option id="qrCodeEnable" value="1" <?= $rowGeneral["qrCode"] == 1 ? 'selected' : ''; ?>><?= _ENABLED ?></option>
                    </select>
                </div>
            </div>
            <div id="qrCodeDelimiterPart" class="mb-4">
                <label for="qrCodeDelimiter" class="form-label textInSettings d-block mb-2"><?= _QRCODEDELIMITER ?></label>
                <input type="text" id="qrCodeDelimiter" name="qrCodeDelimiter" class="form-control w-100" value="<?= htmlspecialchars($rowGeneral["qrCodeDelimiter"]); ?>">
                <div class="errorText"><span class="alert float-end" id="qrCodeDelimiterErr"></span></div>
            </div>
            <div id="adhocUrlPrefixPart" class="mb-4">
                <label for="adhocUrlPrefix" class="form-label textInSettings d-block mb-2">AdhocUrlPrefix</label>
                <input type="text" id="adhocUrlPrefix" name="adhocUrlPrefix" class="form-control w-100" value="<?= htmlspecialchars($rowGeneral["AdhocUrlPrefix"]); ?>">
            </div>
            <div class="d-flex justify-content-center">
                <button type="button" id="general_qrCode_button" name="general_qrCode_button" class="btn btn-primary px-4" onclick="checkGeneralQRCodeForm()">
                    <?= _SAVE ?>
                </button>
                <input type="submit" id="button_general_qrCode" name="button_general_qrCode" hidden>
            </div>
        </div>
    </div>
</div>