<?php
    include_once "access_control.php";
?>
<div class="container my-5" id="externalEnableInputPage">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="row align-items-center mb-4">
        <label for="lockableCableSelection" class="col-12 col-md-6 textInSettings">
          <?= _LOCKABLECABLE ?>
        </label>
        <div class="col-12 col-md-6">
          <select
            id="lockableCableSelection"
            name="lockableCableSelection"
            class="form-select"
          >
            <option id="lockableCableDisable" value="0" <?= $rowInstallationSettings["lockableCable"] == 0 ? 'selected' : '' ?>>
              <?= _DISABLED ?>
            </option>
            <option id="lockableCableEnable" value="1" <?= $rowInstallationSettings["lockableCable"] == 1 ? 'selected' : '' ?>>
              <?= _ENABLED ?>
            </option>
          </select>
        </div>
      </div>

      <div class="d-flex justify-content-center mt-4">
        <button
          type="button"
          name="lockable_cable_button"
          id="lockable_cable_button"
          class="btn btn-primary px-4"
          onclick="checklockableCableForm()"
        >
          <?= _SAVE ?>
        </button>
        <input type="submit" id="button_lockable_cable" name="button_lockable_cable" hidden>
      </div>
    </div>
  </div>
  
</div>