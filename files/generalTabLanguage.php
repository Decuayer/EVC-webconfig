<?php
    include_once "access_control.php";
?>
<div class="container my-5" id="generalSettingsPage">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="row mb-3 align-items-center">
        <div class="col-12 col-sm-6">
          <span class="textInSettings"><?= _DISPLAYLANGUAGE ?></span>
        </div>
        <div class="col-12 col-sm-6">
          <select id="languageSelection" name="languageSelection" class="form-select">
            <option id="en" value="en" <?= $rowGeneral["displayLanguage"] == "en" ? ' selected="selected"' : ''; ?>><?= _ENGLISH ?></option>
            <option id="tr" value="tr" <?= $rowGeneral["displayLanguage"] == "tr" ? ' selected="selected"' : ''; ?>><?= _TURKISH ?></option>
            <option id="fr" value="fr" <?= $rowGeneral["displayLanguage"] == "fr" ? ' selected="selected"' : ''; ?>><?= _FRENCH ?></option>
            <option id="de" value="de" <?= $rowGeneral["displayLanguage"] == "de" ? ' selected="selected"' : ''; ?>><?= _GERMAN ?></option>
            <option id="it" value="it" <?= $rowGeneral["displayLanguage"] == "it" ? ' selected="selected"' : ''; ?>><?= _ITALIAN ?></option>
            <option id="ro" value="ro" <?= $rowGeneral["displayLanguage"] == "ro" ? ' selected="selected"' : ''; ?>><?= _ROMANIAN ?></option>
            <option id="es" value="es" <?= $rowGeneral["displayLanguage"] == "es" ? ' selected="selected"' : ''; ?>><?= _SPANISH ?></option>
            <option id="fi" value="fi" <?= $rowGeneral["displayLanguage"] == "fi" ? ' selected="selected"' : ''; ?>><?= _FINNISH ?></option>
            <option id="cz" value="cz" <?= $rowGeneral["displayLanguage"] == "cz" ? ' selected="selected"' : ''; ?>><?= _CZECH ?></option>
            <option id="da" value="da" <?= $rowGeneral["displayLanguage"] == "da" ? ' selected="selected"' : ''; ?>><?= _DANISH ?></option>
            <option id="he" value="he" <?= $rowGeneral["displayLanguage"] == "he" ? ' selected="selected"' : ''; ?>><?= _HEBREW ?></option>
            <option id="hu" value="hu" <?= $rowGeneral["displayLanguage"] == "hu" ? ' selected="selected"' : ''; ?>><?= _HUNGARIAN ?></option>
            <option id="nl" value="nl" <?= $rowGeneral["displayLanguage"] == "nl" ? ' selected="selected"' : ''; ?>><?= _DUTCH ?></option>
            <option id="no" value="no" <?= $rowGeneral["displayLanguage"] == "no" ? ' selected="selected"' : ''; ?>><?= _NORWEGIAN ?></option>
            <option id="pl" value="pl" <?= $rowGeneral["displayLanguage"] == "pl" ? ' selected="selected"' : ''; ?>><?= _POLISH ?></option>
            <option id="sk" value="sk" <?= $rowGeneral["displayLanguage"] == "sk" ? ' selected="selected"' : ''; ?>><?= _SLOVAK ?></option>
            <option id="sv" value="sv" <?= $rowGeneral["displayLanguage"] == "sv" ? ' selected="selected"' : ''; ?>><?= _SWEDISH ?></option>
            <option id="bg" value="bg" <?= $rowGeneral["displayLanguage"] == "bg" ? ' selected="selected"' : ''; ?>><?= _BULGARIAN ?></option>
            <option id="gr" value="gr" <?= $rowGeneral["displayLanguage"] == "gr" ? ' selected="selected"' : ''; ?>><?= _GREEK ?></option>
            <option id="me" value="me" <?= $rowGeneral["displayLanguage"] == "me" ? ' selected="selected"' : ''; ?>><?= _MONTENEGRIN?></option>
            <option id="ba" value="ba" <?= $rowGeneral["displayLanguage"] == "ba" ? ' selected="selected"' : ''; ?>><?= _BOSNIAN ?></option>
            <option id="rs" value="rs" <?= $rowGeneral["displayLanguage"] == "rs" ? ' selected="selected"' : ''; ?>><?= _SERBIAN ?></option>
            <option id="hr" value="hr" <?= $rowGeneral["displayLanguage"] == "hr" ? ' selected="selected"' : ''; ?>><?= _CROATIAN ?></option>
          </select>
        </div>
      </div>
      <div class="row mt-4 justify-content-center">
        <div class="col-auto">
          <button type="button" name="general_button" id="general_button" class="btn btn-primary px-4" onclick="checkGeneralForm()">
            <?= _SAVE ?>
          </button>
          <input type="submit" id="button_general" name="button_general" hidden>
        </div>
      </div>
    </div>
  </div>
</div>







