<?php
    include_once "access_control.php";
?>
<?php include_once "access_control.php"; ?>

<div class="container" id="standaloneModeTab" name="standaloneModeContainer">
  <div class="row justify-content-center">
    <div class="col-12 col-md-6">

      <!-- Açıklama -->
      <div class="d-flex align-items-center gap-2 mb-3">
        <p class="star mb-0"><b>*</b></p>
        <p class="explanation mb-0"><?= _EXPLANATION ?></p>
      </div>

      <!-- Başlık ve Seçim -->
      <div class="row mb-4 align-items-center">
        <div class="col-md-6">
          <span class="standaloneTitle"><?= _STANDALONEMODETITLE ?></span>
        </div>
        <div class="col-md-6">
          <select id="selectStandaloneMode" name="selectStandaloneMode" class="form-select" onchange="selectMode()">
            <option value="select"><?= _SELECTMODE ?></option>
            <option id="rfidLocalList" value="localList" <?= $rowStandaloneSettings["mode"] == "localList" ? ' selected="selected"' : ''; ?>><?= _RFIDLOCALLIST ?></option>
            <option id="acceptAllRfids" value="acceptAll" <?= $rowStandaloneSettings["mode"] == "acceptAll" ? ' selected="selected"' : ''; ?>><?= _ACCEPTALLRFIDS ?></option>
            <option id="autoStart" value="autoStart" <?= $rowStandaloneSettings["mode"] == "autoStart" ? ' selected="selected"' : ''; ?>><?= _AUTOSTART ?></option>
          </select>
          <span class="error" id="standaloneErr">*</span>
        </div>
      </div>

      <!-- Kayıt başarılı mesajı -->
      <div id="standalone_saved_message" class="alert alert-success py-2 px-3 mb-4" style="display:none">
        <?= _SAVESUCCESSFUL ?>
      </div>

      <!-- Hata mesajı -->
      <div class="mb-3">
        <span class="alert" id="standaloneModeErr"></span>
      </div>

      <!-- RFID Yönetim Alanı -->
      <div id="mode" style="visibility: hidden;">
        <label id="manageLebel" class="textInSettings"><?= _MANAGERFIDLOCALLIST ?></label>
        <input type="text" name="from" id="from" class="form-control w-100 mb-3">
        <?php
          $list = $rowStandaloneSettings["localList"];
          $list = explode(",", $list);
          $array_length = count($list);
        ?>
        <select multiple id="to" size="10" name="rfids[]" class="form-select">
          <?php
            for ($i = 0; $i < $array_length; $i++) {
              if ($list[$i] != "") {
          ?>
          <option style="color:black;" value="<?= $list[$i]; ?>"><?= $list[$i]; ?></option>
          <?php
              }
            }
          ?>
        </select>
        <div class="d-flex justify-content-center mb-4 mt-5 gap-2">
          <button type="button" id="add_button" name="add_button" onclick="addToList('from', 'to')" class="btn btn-outline-primary px-2"><?= _ADD ?></button>
          <button type="button" id="remove_button" name="remove_button" onclick="removeFromList('to')" class="btn btn-outline-danger px-2"><?= _REMOVE ?></button>
        </div>
      </div>

      <!-- KAYDET Butonu -->
      <div class="text-center mb-4">
        <button type="button" id="rfid_list_button" name="rfid_list_button" onclick="sendMode()" class="btn btn-primary px-4"><?= _SAVE ?></button>
        <input type="submit" id="button_standalone" name="button_standalone" hidden>
      </div>

      <!-- Hidden input -->
      <input type="text" class="form-control" id="demo" name="demo" hidden>

    </div>
  </div>
</div>

<!-- Uyarı Mesajları -->
<div id="alertMessage" style="display:none">
    <p class="dialogText"><?= _OCPPENABLEALERT ?></p>
</div>

<div id="standaloneModeAlertMessage" style="display:none">
    <p class="dialogText" id="standaloneModeTransitionAlert" style="text-align:center;"><?= _APPLICATIONRESTART ?></p>
    <p class="dialogTextBold"><?= _ACCEPTQUESTION ?></p>
</div>