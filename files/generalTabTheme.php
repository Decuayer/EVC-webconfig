<?php
    include_once "access_control.php";
?>
<div style="left:28%; position:absolute; width: 37.5vw;" id="generalThemePage">
  <span style="float:left; padding-top:15px;" class="textInSettings"><?= _SCREENTHEME ?></span>
  <div style="float:right; ">
    <div style="height:60px; " class="selectbox">
      <select id="themeSelection" name="themeSelection">
        <option id="darkblue" value="darkblue" <?= $rowGeneral["uiTheme"] == "darkblue" ? ' selected="selected"' : ''; ?>><?= _DARKBLUE ?></option>
        <option id="orange" value="orange" <?= $rowGeneral["uiTheme"] == "orange" ? ' selected="selected"' : ''; ?>><?= _ORANGE ?></option> 
      </select>
    </div>
  </div>
</div>

<div style="display:flex;margin-top:34%;margin-left:35%;">
  <button type="button" name="general_theme_button" id="general_theme_button" class="interfacesButton" onclick="checkGeneralThemeForm()"> <?= _SAVE ?> </button>
  <input type="submit" id="button_general_theme" name="button_general_theme" hidden>
</div>
