<!--configurationSettings.json FILE SOULD BE UPDATED FOR EACH SETTINGS ADDED TO WEBCONFIG-->
<?php
    include_once "access_control.php";
?>

<!-- SIDEBAR -->
<div id="sidebar" class="container-fluid">
  <div class="row" style="margin-top: 100px;">
    <!-- SIDEBAR FOR DESKTOP -->
    <nav class="col-12 col-md-3 col-lg-2 d-none d-md-block bg-dark text-white position-fixed h-100" style="top: 70px;">
      <div class="position-sticky">
        <ul class="nav flex-column mt-5 gap-2 " style="padding-top: 30px;">
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" style="display:<?php echo $cellularDisplay; ?>" onclick="openBar(event, 'CellularNetwork')" id="cellularBar"><?= _CELLULAR ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" style="display:<?php echo $ethernetDisplay; ?>" onclick="openBar(event, 'LanNetwork')" id="lanBar">LAN</a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" style="display:<?php echo $wifiDisplay; ?>" onclick="openBar(event, 'WlanNetwork')" id="wlanBar"><?= _WIFI ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white" style="display:<?php echo $wifiDisplay; ?>" onclick="openBar(event, 'WifiHotspotNetwork')" id="wifiHotspotBar"><?= _WIFIHOTSPOT ?></a></li>
        </ul> 
      </div>
    </nav>
    <!-- MAIN CONTENT -->
    <main class="col-md-9 offset-md-3 col-lg-10 offset-lg-2" style="height: calc(100vh - 56px); margin-top: 20px;">
      <div class="container pt-5">
        <input type="hidden" id="active_bar" name="active_bar" value="CellularNetwork" />

        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="CellularNetwork" class="barcontent">
            <?php include("networkCellularTab.php"); ?>
          </div>
        </form>

        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="LanNetwork" class="barcontent">
            <?php include("networkLanTab.php"); ?>
          </div>
        </form>

        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="WlanNetwork" class="barcontent">
            <?php include("networkWlanTab.php"); ?>
          </div>
        </form>

        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="WifiHotspotNetwork" class="barcontent">
            <?php include("networkWifiHotspotTab.php"); ?>
          </div>
        </form>
      </div>
    </main>
  </div>
</div>
<!--configurationSettings.json FILE SOULD BE UPDATED FOR EACH SETTINGS ADDED TO WEBCONFIG-->
