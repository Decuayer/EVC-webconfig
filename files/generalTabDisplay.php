<?php
    include_once "access_control.php";
?>
<table>
  <tr>
    <td><span class="infotext"><?= _BACKLIGHTDIMMING ?></span></td>
    <td><select style="margin:0 15px 5px 15px; width:150px;" class="combobox" id="backlightSelection" name="backlightSelection" onchange="displaySettings()">
        <option value="0"><?= _PLEASESELECT ?></option>
        <option value="Static"><?= _STATIC ?></option>
        <option value="Dynamic"><?= _DYNAMIC ?></option>
      </select>
      <span class="error" id="backlightSelectionErr">*</span></td>
  </tr>
  <tr>
    <td><span id="backlightLevelTitle" style="visibility:hidden;" class="infotext"><?= _BACKLIGHTDIMMINGLEVEL ?></span></td>
    <td><select style="visibility:hidden; margin-left:15px; width:150px;" name="backlightStaticLevel" id="backlightStaticLevel" class="combobox">
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="75">75</option>
        <option value="100">100</option>
      </select></td>
  </tr>
</table>