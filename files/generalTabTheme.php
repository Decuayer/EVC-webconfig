<?php
    include_once "access_control.php";
?>
<div class="container my-5" id="generalThemePage">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="row mb-4 align-items-center">
        <div class="col-12 col-sm-6">
          <span class="textInSettings"><?= _SCREENTHEME ?></span>
        </div>
        <div class="col-12 col-sm-6">
          <select id="themeSelection" name="themeSelection" class="form-select w-100">
            <option id="darkblue" value="darkblue" <?= $rowGeneral["uiTheme"] == "darkblue" ? ' selected="selected"' : ''; ?>><?= _DARKBLUE ?></option>
            <option id="orange" value="orange" <?= $rowGeneral["uiTheme"] == "orange" ? ' selected="selected"' : ''; ?>><?= _ORANGE ?></option>
          </select>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-auto">
          <button type="button" name="general_theme_button" id="general_theme_button" class="btn btn-primary px-4" onclick="checkGeneralThemeForm()">
            <?= _SAVE ?>
          </button>
          <input type="submit" id="button_general_theme" name="button_general_theme" hidden>
        </div>
      </div>
    </div>
  </div>
</div>
