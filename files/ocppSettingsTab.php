<!--configurationSettings.json FILE SOULD BE UPDATED FOR EACH SETTINGS ADDED TO WEBCONFIG-->
<?php
    include_once "access_control.php";
?>
<div id="sidebar" class="container-fluid">
  <div class="row" style="margin-top: 100px;">
    <nav class="col-12 col-md-3 col-lg-2 d-none d-md-block bg-dark text-white position-fixed h-100" style="top: 70px;">
      <div class="position-sticky">
        <ul class="nav flex-column mt-5 gap-2 " style="padding-top: 30px;">
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white barlinks" onclick="openBarOCPP(event, 'OCPPConnection')" id="defaultOpenOCPP"><?= _OCPPCONNECTION ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white barlinks" onclick="openBarOCPP(event, 'OCPPVersion')" id="ocppVersionBar"><?= _OCPPVERSION ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white barlinks" onclick="openBarOCPP(event, 'OCPPConnectionSettings')" id="ocppConnectionSettingsBar"><?= _CONNECTIONSETTINGS ?></a></li>
          <li class="nav-item"><a class="btn btn-dark w-100 text-start text-white barlinks" onclick="openBarOCPP(event, 'OCPPConfiguration')" id="ocppConnectionParametersBar"><?= _OCPPCONNPARAMETERS ?></a></li>
        </ul> 
      </div>
    </nav>
    <main class="col-md-9 offset-md-3 col-lg-10 offset-lg-2" style="height: calc(100vh - 56px); margin-top: 20px;">
      <div class="container pt-5">
        <form method="post" autocomplete="off">
          <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
          <div id="OCPPConnection" class="barcontent">
            <?php include("ocppConnectionTab.php"); ?>
          </div>
        </form>
      </div>
    </main>
  </div>
</div>
<!--configurationSettings.json FILE SOULD BE UPDATED FOR EACH SETTINGS ADDED TO WEBCONFIG-->
