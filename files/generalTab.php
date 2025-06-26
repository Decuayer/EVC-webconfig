<!--configurationSettings.json FILE SOULD BE UPDATED FOR EACH SETTINGS ADDED TO WEBCONFIG-->
<?php
    include_once "access_control.php";
?>
<div id="sidebar" class="container-fluid">
  <div class="row" style="margin-top: 100px;">
    <nav class="col-12 col-md-3 col-lg-2 d-none d-md-block bg-dark text-white position-fixed h-100" style="top: 70px;">
      <div class="position-sticky">
        <ul class="nav-flex-dolumn mt-5 gap-2" style="padding-top: 30px;">
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" onclick="openBar(event, 'LanguageSettings')" id="languageSettingsBar"><?= _DISPLAYLANGUAGE ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" onclick="openBar(event, 'DisplayBacklightSettings')" id="displayBacklightSettingsBar"><?= _DISPLAYBACKLIGHTSETTINGS ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" onclick="openBar(event, 'LedDimmingSettings')" id="ledDimmingSettingsBar"><?= _LEDDIMMINGSETTINGS ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" onclick="openBar(event, 'StandbyLedBehaviour')" id="standbyLedBehaviourBar"><?= _STANDBYLEDBEHAVIOUR ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" onclick="openBar(event, 'ThemeSettings')" id="themeSettingsBar"><?= _SCREENTHEME ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" onclick="openBar(event, 'ServiceContactSettings')" id="contactInfoBar"><?= _SERVICECONTACTINFO ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" onclick="openBar(event, 'LogoSettings')" id="logoSettingsBar"><?= _LOGOSETTINGS ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" style="display:<?php echo $displayQRCode; ?>" nclick="openBar(event, 'QRCodeSettings')" id="qrCodeBar"><?= _QRCODE ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" onclick="openBar(event, 'ScheduledCharging')" id="scheduledChargingBar"><?= _SCHEDULEDCHARGING ?></a></li>
        </ul>
      </div>
    </nav>
    <main class="col-md-9 offset-md-3 col-lg-10 offset-lg-2" style="height: calc(100vh - 56px); margin-top: 20px;">
      <div class="container pt-5">
        <input type="hidden" id="active_bar" name="active_bar" value="LanguageSettings" />
        <!-- !! -->
        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="LanguageSettings" class="barcontent">
            <?php include("generalTabLanguage.php"); ?>
          </div>
        </form>
        <!-- !! -->
        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="DisplayBacklightSettings" class="barcontent">
            <?php include("generalTabDisplayBacklight.php"); ?>
          </div>
        </form>
        <!-- !! -->
        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="LedDimmingSettings" class="barcontent">
            <?php include("generalTabLedDimming.php"); ?>
          </div>
        </form>
        <!-- !! -->
        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="StandbyLedBehaviour" class="barcontent">
            <?php include("generalTabStandbyLedBehaviour.php"); ?>
          </div>
        </form>
        <!-- !! -->
        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="DisplaySettings" class="barcontent">
            <?php include("generalTabDisplay.php"); ?>
          </div>
        </form>
        <!-- !! -->
        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="ThemeSettings" class="barcontent">
            <?php include("generalTabTheme.php"); ?>
          </div>
        </form>
        <!-- !! -->
        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="ServiceContactSettings" class="barcontent">
            <?php include("serviceContactInfoTab.php"); ?>
          </div>
        </form>
        <!-- !! -->
        <div id="LogoSettings" class="barcontent">
          <?php include("webLogoTab.php"); ?>
        </div>
        <!-- !! -->
        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="QRCodeSettings" class="barcontent">
            <?php include("generalTabQRCode.php"); ?>
          </div>
        </form>
        <!-- !! -->
        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="ScheduledCharging" class="barcontent">
            <?php include("generalTabScheduledCharging.php"); ?>
          </div>
        </form>
      </div>
    </main>
  </div>
</div>
<!--configurationSettings.json FILE SOULD BE UPDATED FOR EACH SETTINGS ADDED TO WEBCONFIG-->
