<?php
    include_once "access_control.php";
?>
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="row justify-content-center mb-3 align-items-center">
        <div class="col-12 col-md-6 mb-2 mb-sm-0">
          <span class="textInSettings"><?= _BACKLIGHTDIMMING ?></span>
        </div>
        <div class="col-12 col-md-6 d-flex align-items-center">
          <select name="backlightSelection" id="backlightSelection" class="form-select w-100 me-3" onchange="displaySettings()">
            <option value="0"><?= _PLEASESELECT ?></option>
            <option value="Static"><?= _STATIC ?></option>
            <option value="Dynamic"><?= _DYNAMIC ?></option>
          </select>
          <span class="error" id="backlightSelectionErr">*</span>
        </div>
      </div>
      <div class="row justify-content-center mb-3 align-items-center" id="backlightLevelRow">
        <div class="col-12 col-md-6 mb-2 mb-sm-0">
          <span id="backlightLevelTitle" class="textInSettings" style="visibility:hidden;"><?= _BACKLIGHTDIMMINGLEVEL ?></span>
        </div>
        <div class="col-12 col-md-6">
          <select name="backlightStaticLevel" id="backlightStaticLevel" class="form-select w-100" style="visibility:hidden;">
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="75">75</option>
            <option value="100">100</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>


