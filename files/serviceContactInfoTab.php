<?php
    include_once "access_control.php";
?>
<div class="container my-5" id="ServiceContactSettingsPage">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div id="ServiceContactPart" class="mb-4">
        <label for="serviceContactInfo" class="form-label textInSettings"><?= _SERVICECONTACTINFO ?></label>
        <input 
          type="text" 
          id="serviceContactInfo" 
          name="serviceContactInfo" 
          class="form-control textarea1" 
          value='<?= htmlspecialchars($rowGeneral["contactInfo"]); ?>'
        >
        <div class="errorText mt-1">
          <span class="alert text-danger" id="serviceContactInfoErr"></span>
        </div>
      </div>
      <?php if($model == "EVC04") { ?>
        <div class="mb-4" id="showServiceContactInfoOnHmiItem">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <span class="textInSettings"><?= _SHOWSERVICECONTACTINFO ?></span>
            </div>
            <div class="col-12 col-md-6 mt-2 mt-md-0">
              <select 
                id="serviceContactInfoSelection" 
                name="serviceContactInfoSelection" 
                class="form-select w-100"
              >
                <option id="showServiceContactInfoOnHmiDisable" value="0" <?= $rowGeneral["showServiceContactInfoOnHmi"] == 0 ? ' selected="selected"' : ''; ?>><?= _DISABLED ?></option>
                <option id="showServiceContactInfoOnHmiEnable" value="1" <?= $rowGeneral["showServiceContactInfoOnHmi"] == 1 ? ' selected="selected"' : ''; ?>><?= _ENABLED ?></option>
              </select>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col">
              <span class="tooltip-wrapper" tabindex="0" aria-describedby="tooltip1">
                <i class="fa fa-info-circle fa-2x"></i>
                <span class="tooltip-text" role="tooltip" id="tooltip1">
                  <?= _EXTRASERVICECONTACTINFORMATION ?>
                </span>
              </span>
            </div>
          </div>
        </div>
      <?php } ?>

      <div class="text-center">
        <button 
          type="button" 
          id="contact_info_button" 
          name="contact_info_button" 
          class="btn btn-primary px-4 interfacesButton" 
          onclick="checkServiceContactInfoForm()"
        >
          <?= _SAVE ?>
        </button>
        <input type="submit" id="button_contact_info" name="button_contact_info" hidden>
      </div>

    </div>
  </div>
</div>