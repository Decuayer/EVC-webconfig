<!--configurationSettings.json FILE SOULD BE UPDATED FOR EACH SETTINGS ADDED TO WEBCONFIG-->
<?php
    include_once "access_control.php";
?>
<div id="sidebar" class="container-fluid">
  <div class="row" style="margin*top: 100px;">
    <nav class="col-12 col-md-3 col-lg-2 d-none d-md-block bg-dark text-white position-fixed h-100" style="top: 70px;">
      <div class="position-sticky">
        <ul class="nav flex-column mt-5 gap-2" style="padding-top: 30px;">
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" onclick="openBar(event, 'EarthingSystem')" id="earthingSystemBar"><?= _EARTHINGSYSTEM ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" onclick="openBar(event, 'CurrrentLimitterSettings')" id="currentLimiterBarSettingsBar"><?= _CURRENTLIMITERSETTINGS ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" onclick="openBar(event, 'UnbalancedLoadDetection')" id="unbalancedLoadDetectionBar"><?= _UNBALANCEDLOADDETECTION ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" onclick="openBar(event, 'ExternalEnableInput')" id="externalEnableInputBar"><?= _EXTERNALENABLEINPUT ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" onclick="openBar(event, 'LockableCable')" id="lockableCableBar"><?= _LOCKABLECABLE ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" onclick="openBar(event, 'PowerOptimizerCurrentLimit')" id="powerOptimizerCurrentLimitBar"><?= _CHARGINGMODESELECTIONANDPOWEROPTIMIZERCONF ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" onclick="openBar(event, 'LoadSheddingMinimumCurrent')" id="loadSheddingMinimumCurrentBar"><?=  _LOADSHEDDINGMINIMUMCURRENT?></a></li>
        </ul>
      </div>
    </nav>
    <main class="col-md-9 offset-md-3 col-lg-10 offset-lg-2" style="height: calc(100vh - 56px); margin-top: 20px;">
      <div class="container pt-5">
        <input type="hidden" id="active_bar" name="active_bar" value="EarthingSystem" />

        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="EarthingSystem" class="barcontent">
            <?php include("earthingSystemTab.php"); ?>
          </div>
        </form>

        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="CurrrentLimitterSettings" class="barcontent">
            <?php include("currentLimitterSettings.php"); ?>
          </div>
        </form>

        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="UnbalancedLoadDetection" class="barcontent">
            <?php include("unbalancedLoadDetectionTab.php"); ?>
          </div>
        </form>

        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="ExternalEnableInput" class="barcontent">
            <?php include("externalEnableInputTab.php"); ?>
          </div>
        </form>

        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="LockableCable" class="barcontent">
            <?php include("lockableCableTab.php"); ?>
          </div>
        </form>

        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="PowerOptimizerCurrentLimit" class="barcontent">
            <?php include("powerOptimizerCurrentLimit.php"); ?>
          </div>
        </form>

        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="LoadSheddingMinimumCurrent" class="barcontent">
            <?php include("loadSheddingMinimumCurrent.php"); ?>
          </div>
        </form>
      </div>
    </main>
  </div>
</div>

<!--configurationSettings.json FILE SOULD BE UPDATED FOR EACH SETTINGS ADDED TO WEBCONFIG-->
