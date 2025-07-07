<?php
    include_once "access_control.php";
?>
<div class="container my-5" id="externalEnableInputPage">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="row align-items-center mb-4">
        <label for="externalEnableInputSelection" class="col-12 col-md-6 textInSettings">
          <?= _EXTERNALENABLEINPUT ?>
        </label>
        <div class="col-12 col-md-6">
          <select
            id="externalEnableInputSelection"
            name="externalEnableInputSelection"
            class="form-select"
          >
            <option id="externalEnableInputDisable" value="0" <?= $rowInstallationSettings["externalEnableInput"] == 0 ? 'selected' : '' ?>>
              <?= _DISABLED ?>
            </option>
            <option id="externalEnableInputEnable" value="1" <?= $rowInstallationSettings["externalEnableInput"] == 1 ? 'selected' : '' ?>>
              <?= _ENABLED ?>
            </option>
          </select>
        </div>
      </div>

      <div class="d-flex justify-content-center mt-4">
        <button
          type="button"
          name="external_enable_input_button"
          id="external_enable_input_button"
          class="btn btn-primary px-4"
          onclick="checkExternalEnableInputForm()"
        >
          <?= _SAVE ?>
        </button>
        <input type="submit" id="button_external_enable_input" name="button_external_enable_input" hidden>
      </div>
    </div>
  </div>
  
</div>