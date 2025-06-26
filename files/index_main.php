<?php
include 'check_session.php';
include 'optionsAndControls.php';
include 'scanWifiNetworks.php';
include_once 'languageController.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title><?= _CHARGERWEBUI ?></title>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <meta name="csrf-token" content="<?php echo $_SESSION['token']; ?>">
    <!-- php echo time(); function should be added at the end of css and js files -->
    <link rel="stylesheet" type="text/css" href="css/webconfig.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/util.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/main.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css?<?php echo time(); ?>">
</head>

<body>

    <?php
    ob_start();
    if (!isset($_SESSION["loginStatus"])) {
        $_SESSION["error"] = _NEEDTOLOGINFIRST;
        header("Location: " . "http://" . $_SERVER['HTTP_HOST']);
        exit();
    }

    if ($_POST) {
        if (!isset($_POST["token"]) ||
        (isset($_POST["token"]) && !hash_equals($_SESSION['token'], $_POST['token']))) {
            $_SESSION["loginStatus"] = false;
            $_SESSION["error"] = _NEEDTOLOGINFIRST;
            header("Location:index.php");
            exit();
        }
    }

    $localLoad = $minCurrent = $FIFO = $gmMax = "";
    $centralSystemAddress = $chargePointId = $wssSettings = "";
    $connectionStatus = "";
    $cableModel = 0;

    $interface = shell_exec("ip route get 1.2.3.4");
    $interface = str_replace("\n", "", $interface);
    if (strpos($interface, 'eth') !== false) {
        $IPsettings = "Ethernet";
    } else if (strpos($interface, 'wwan') !== false) {
        $IPsettings = _CELLULAR;
    } else if (strpos($interface, 'wlan') !== false) {
        $IPsettings = _WIFI;
    }

    //If the eth1 is not available, then eth0's Mac Address will be used.
    //Otherwise, eth1's Mac Address will be used.
    $MacAddress = shell_exec("ifconfig -a | grep eth1 | grep HWaddr | awk '{print $5}'");
    if ($MacAddress == null)
        $MacAddress = shell_exec("ifconfig -a | grep eth0 | grep HWaddr | awk '{print $5}'");
    if ($MacAddress == null)
        $MacAddress = shell_exec("ifconfig -a | grep eth2 | grep HWaddr | awk '{print $5}'");
    $MacAddressWlan = shell_exec("ifconfig -a | grep wlan | grep HWaddr | awk '{print $5}'");

    if (shell_exec("/sbin/route -n | grep -c '^0\.0\.0\.0'") == 0) {
        $connectionStatus = _DISCONNECTED;
    } else {
        $connectionStatus = _CONNECTED;
    }

    $WWanIP = shell_exec("ip addr show wwan0 | grep 'inet ' | awk '{print $2}' | cut -f1 -d'/'");
    $hour = shell_exec("awk '{print int($1/3600)}' /proc/uptime");
    $minute = shell_exec("awk '{print int(($1%3600)/60)}' /proc/uptime");
    $second = shell_exec("awk '{print int($1%60)}' /proc/uptime");
    $duration = str_pad($hour, 3, "0", STR_PAD_LEFT) . ": " . str_pad($minute, 3, "0", STR_PAD_LEFT) . ": " . str_pad($second, 3, "0", STR_PAD_LEFT);

    $command = shell_exec("ls /sys/class/net");
    $cellularDisplay = $ethernetDisplay = $wifiDisplay = "";
    $vpnDisplay = "none";
    if (strpos($command, 'eth') === false) {
        $ethernetDisplay = "none";
    }


    $interfaceList = preg_split("/\r\n|\n|\r/", $command); //this part is used for split the string according to \n

    $CellularIP = $WlanIP = $LanIP = '-';

    $logsMaxDate = date('Y-m-d');
    $logsMinDate =  date('Y-m-d', strtotime($logsMaxDate . ' -30 days'));
    $defaultStartDate =  date('Y-m-d', strtotime($logsMaxDate . ' -5 days'));

    //Read power board version and local charge session from the database
    if (file_exists("/var/lib/vestel/agent.db")) {
        class MyDB extends SQLite3
        {
            function __construct()
            {
                $this->open('/var/lib/vestel/agent.db');
            }
        }

        $db = new MyDB();
        $db->busyTimeout(10000);
        if ($db) {
            $stmt = $db->prepare("SELECT * FROM deviceDetails WHERE ID= :ID");
            $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
            $res = $stmt->execute();
            $row = $res->fetchArray();
            if ($row['acpwVersion'] != "N/A")
                $powerBoardVersion = $row['acpwVersion'];
            if ($row['acpwSerialNumber'] != "N/A")
                $serialNumber = $row['acpwSerialNumber'];

            $stmt = $db->prepare("SELECT * FROM hmiDetails WHERE ID= :ID");
            $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
            $resHmi = $stmt->execute();
            $rowHmi = $resHmi->fetchArray();
            if ($rowHmi['imei'] != "N/A")
                $IMEI = $rowHmi['imei'];
            if ($rowHmi['imsi'] != "N/A")
                $IMSI = $rowHmi['imsi'];
            if ($rowHmi['iccid'] != "N/A")
                $ICCID = $rowHmi['iccid'];
            if ($rowHmi['wifiLevel'] != "N/A")
                $WifiLevel = $rowHmi['wifiLevel'];
            if ($rowHmi['wifiStrength'] != "N/A")
                $WifiStrength = $rowHmi['wifiStrength'];
            if ($rowHmi['wifiFreq'] != "N/A" && !empty($rowHmi['wifiFreq']))
                $WifiFreq = $rowHmi['wifiFreq']."Ghz";
            if ($rowHmi['gSMTech'] != "N/A")
                $gSMTech = $rowHmi['gSMTech'];
            if ($rowHmi['gSMStrength'] != "N/A")
                $gSMStrength = $rowHmi['gSMStrength'];
            if ($rowHmi['gSMOperCode'] != "N/A")
                $gSMOperCode = $rowHmi['gSMOperCode'];
            if ($rowHmi['gSMrsrp'] != "N/A")
                $gSMrsrp = $rowHmi['gSMrsrp'];
            if ($rowHmi['gSMrsrq'] != "N/A")
                $gSMRSrq = $rowHmi['gSMrsrq'];
            if ($rowHmi['gSMsinr'] != "N/A")
                $gSMsinr = $rowHmi['gSMsinr'];
            if ($rowHmi['cellularHw'] != "True")
                $cellularDisplay = "none";
            if ($rowHmi['wifiHw'] != "True")
                $wifiDisplay = "none";
            
                $results_per_page = 5;
                $query = "SELECT * FROM chargeSessions";
                $stmt = $db->prepare("SELECT * FROM chargeSessions");
                $result = $stmt->execute();
                $row = $result->fetchArray();
                $data = array();
                static $i = 0;
                while ($row = $result->fetchArray()) {
                      $data[$i] = array(
                      'sessionUuid' => $row['sessionUuid'],
                      'authorizationUid' => $row['authorizationUid'],
                      'startTime' => $row['startTime'],
                      'stopTime' => $row['stopTime'],
                      'status' => $row['status'],
                      'chargePointId' => $row['chargePointId'],
                      'initialEnergy' => $row['initialEnergy'],
                      'lastEnergy' => $row['lastEnergy'],
                      );
                ++$i;
              }

            $stmt = $db->prepare("SELECT * FROM dipSwitch WHERE ID= :ID");
            $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
            $resDipSwitch = $stmt->execute();
            $rowDipSwitch = $resDipSwitch->fetchArray();
            $privateCharging = $rowDipSwitch['dip4'];

            $stmt = $db->prepare("SELECT * FROM chargePoints WHERE chargePointId= :chargePointId");
            $stmt->bindValue(':chargePointId', 1, SQLITE3_INTEGER);
            $resChargePoint = $stmt->execute();
            $rowChargePoint = $resChargePoint->fetchArray();
            $cableModel = $rowChargePoint['proximityPilotState'];

            // Charge point status and Error codes
            $vendorErrors = $rowChargePoint["vendorErrorCode"];
            $chargePointStatus = $rowChargePoint["status"];
            // Decimal to binary
            $vendorErrors = decbin(floatval($vendorErrors));
            // Convert the binary number string into an array of characters, in reverse order
            $bitsArray = array_reverse(str_split($vendorErrors));
            // Use array_keys to find the positions of set bits (value '1')
            $vendorErrorsArray = array_keys($bitsArray, '1');
            // Save as array

            // Charge Station Status query
            $stmt = $db->prepare("SELECT status, phaseTypeProduction FROM chargeStation WHERE ID = :ID");
            $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
            $resChargeStation = $stmt->execute();
            $rowChargeStation = $resChargeStation ? $resChargeStation->fetchArray(SQLITE3_ASSOC) : null;
            $chargeStationStatus = $rowChargeStation ? $rowChargeStation['status'] : null;
            $phaseTypeProduction = $rowChargeStation ? $rowChargeStation['phaseTypeProduction'] : 1;

            $stmt = $db->prepare("UPDATE hmiDetails SET connectionInterface= :connectionInterface WHERE ID= :ID");
            $stmt->bindValue(':connectionInterface', $IPsettings, SQLITE3_TEXT);
            $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
            $stmt->execute();

        }
        $number_of_results = count($row);

               $total_records = $i;
               $per_page_record = 4;
               $number_of_pages = ceil ($number_of_results / $results_per_page);
               if (!isset ($_GET["page"]) ) {
                  $page = 1;
               } else {
                  $page = $_GET["page"];
               }
              $start_from = ($page-1) * $per_page_record;
              $query = "SELECT * FROM chargeSessions LIMIT $start_from, $per_page_record";
              $stmt = $db->prepare("SELECT * FROM chargeSessions");
              $result = $stmt->execute();
              $row1 = $result->fetchArray();
              $sessionUuid1 = $row1['sessionUuid'];
              $authorizationUid1 = $row1['authorizationUid'];
              $startTime1 = $row1['startTime'];
              $stopTime1 = $row1['stopTime'];
              $status1 = $row1['status'];
              $chargePointId1 = $row1['chargePointId'];
              $initialEnergy1 = $row1['initialEnergy'];
              $lastEnergy1 = $row1['lastEnergy'];
              $total_pages = ceil($total_records / $per_page_record);
              $pagLink = "";
        $db->close();
        unset($db);
    }

    if (file_exists("/usr/lib/vestel/system.db")) {
        class MySystemDB extends SQLite3
        {
            function __construct()
            {
                $this->open("/usr/lib/vestel/system.db");
            }
        }

        $db = new MySystemDB();
        $db->busyTimeout(10000);
        $stmt = $db->prepare("SELECT hmiVersion,ocppVersion FROM deviceInfo WHERE ID= :ID");
        $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
        $res = $stmt->execute();
        $row = $res->fetchArray();
        $softwareVersion = $row["hmiVersion"];
        $ocppSoftwareVersion = $row["ocppVersion"];
        $db->close();
        unset($db);
    }

    $deviceModel = "Configuration Interface";
    $logoDisplay = "";
    $uiTheme = "";
    $displayHideList = "";
    $displayQRCode = "";
    $modelCode ="";
    $meterType = "";
    $ulType = "";
    $model = "";
    $eebusEnabled = "false";

    $vfactoryPath = "/var/lib/configuration/vfactory.db";
    $vfactoryDefaultPath = "/run/media/mmcblk1p3/vfactory.db";
    $deviceDetailPath = "";
    $current_limiter_phase = 0;
    if (file_exists($vfactoryPath)){
        $deviceDetailPath = $vfactoryPath;
    }
    else{
        $deviceDetailPath = $vfactoryDefaultPath;
    }
    if (!file_exists("/run/media/mmcblk1p3/weblogo.png")) {
        $logoDisplay = "none;";
    }

    if (file_exists($deviceDetailPath)) {
        class MyDBVFactory extends SQLite3
        {
            function __construct()
            {
                global $deviceDetailPath;
                $this->open($deviceDetailPath);
            }
        }
        try {
            $vfactoryDB = new MyDBVFactory();
            $vfactoryDB->busyTimeout(10000);

            $stmt = $vfactoryDB->prepare("SELECT * FROM deviceDetails WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $resultDevice = $stmt->execute();
            $rowDevice = $resultDevice->fetchArray();

            $deviceModel = $rowDevice["model"] . " " . $deviceModel;
            $uiTheme = $rowDevice["uiTheme"];
            $modelCode = $rowDevice["modelCode"];
            $meterType = $rowDevice["meterType"];
            $displayExist = $rowDevice["display"];
            $ulType = $rowDevice["ulType"];
            $model = $rowDevice["model"];
            $eebusEnabled = $rowDevice["eebusEnabled"];
            if ($displayExist == "false") {
                $displayHideList = 'languageSettingsBar,displayBacklightSettingsBar,themeSettingsBar,contactInfoBar,logoSettingsBar';
                $displayQRCode = "none";
            }

            $vfactoryDB->close();
            unset($vfactoryDB);
        }
        catch (Error $e) {
        }
    }

    if (file_exists("/var/lib/vestel/webconfig.db")) {
        class MyDBWebconfig extends SQLite3
        {
            function __construct()
            {
                $this->open('/var/lib/vestel/webconfig.db');
            }
        }
        $webconfigDB = new MyDBWebconfig();
        $webconfigDB->busyTimeout(10000);

        // Eebus Configurations
        $stmt = $webconfigDB->prepare("SELECT * FROM eebusSettings");
        $eebusConfigurations = $stmt->execute();
        $rowEebusConfigurations = $eebusConfigurations->fetchArray();

        // Eebus Discovery
        $stmt = $webconfigDB->prepare("SELECT * FROM eebusDiscovery");
        $eebusDiscovery = $stmt->execute();
        $rowEebusDiscovery = $eebusDiscovery->fetchArray();
        $skiDiscovery = $rowEebusDiscovery['ski'];

        $stmt = $webconfigDB->prepare("SELECT * FROM eebusPairInfo");
        $eebusPairInfo = $stmt->execute();
        $rowEebusPairInfo = $eebusPairInfo->fetchArray();

        //Account
        $currentUser = (isset($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : 1;

            $stmt = $webconfigDB->prepare("SELECT * FROM account WHERE id= :id");
            $stmt->bindValue(':id', $currentUser, SQLITE3_INTEGER);
            $accountSettings = $stmt->execute();
            $rowAccount = $accountSettings->fetchArray();
        $dbCurrentPass = $rowAccount["password"];
        $dbCurrentUser = $rowAccount["username"];

        //General Settings
        $stmt = $webconfigDB->prepare("SELECT * FROM generalSettings WHERE id= :id");
        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
        $generalSettings = $stmt->execute();
        $rowGeneral = $generalSettings->fetchArray();
        $offPeakChargingPeriod = $rowGeneral['ecoChargeInterval'];
        $offPeakChargingPeriod2 = $rowGeneral['ecoChargeInterval2'];
        $offPeakChargingPeriod3 = $rowGeneral['ecoChargeInterval3'];
        $offPeakChargingPeriod4 = $rowGeneral['ecoChargeInterval4'];

        //Ocpp Settings
        $stmt = $webconfigDB->prepare("SELECT * FROM ocppSettings WHERE id= :id");
        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
        $ocppSettings = $stmt->execute();
        $rowOcppSettings = $ocppSettings->fetchArray();

        //Ocpp Configurations
        $stmt = $webconfigDB->prepare("SELECT * FROM ocppConfigurations WHERE id= :id");
        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
        $ocppConfigurations = $stmt->execute();
        $rowOcppConfigurations = $ocppConfigurations->fetchArray();
        $authorizationKeyValue = empty($rowOcppConfigurations["AuthorizationKey"]) ? "" : "******";

        //LAN network settings
        $stmt = $webconfigDB->prepare("SELECT * FROM ethernetSettings WHERE id= :id");
        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
        $lanSettings = $stmt->execute();
        $rowLanSettings = $lanSettings->fetchArray();

        //WLAN network settings
        $stmt = $webconfigDB->prepare("SELECT * FROM wifiSettings WHERE id= :id");
        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
        $wlanSettings = $stmt->execute();
        $rowWlanSettings = $wlanSettings->fetchArray();
        $wifiPasswordValue = empty($rowWlanSettings["password"]) ? "" : "******";

        //Cellular network settings
        $stmt = $webconfigDB->prepare("SELECT * FROM cellularSettings WHERE id= :id");
        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
        $cellularSettings = $stmt->execute();
        $rowCellularSettings = $cellularSettings->fetchArray();
        $simPinValue = empty($rowCellularSettings["simPin"]) ? "" : "******";
        $apnPasswordValue = empty($rowCellularSettings["apnPassword"]) ? "" : "******";

        //Wi-Fi Hotspot settings
        $stmt = $webconfigDB->prepare("SELECT * FROM wifiHotspotSettings WHERE id= :id");
        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
        $wifiHotspotSettings = $stmt->execute();
        $rowWifiHotspotSettings = $wifiHotspotSettings->fetchArray();
        $wifiHotspotPasswordValue = empty($rowWifiHotspotSettings["password"]) ? "" : "******";


        //Standalone mode settings
        $stmt = $webconfigDB->prepare("SELECT * FROM authorizationMode WHERE id= :id");
        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
        $standaloneSettings = $stmt->execute();
        $rowStandaloneSettings = $standaloneSettings->fetchArray();

        //dlm Settings
        $stmt = $webconfigDB->prepare("SELECT * FROM dlmSettings");
        $dlmSettings = $stmt->execute();
        $rowDlm = $dlmSettings->fetchArray();

        //Connector Info Settings
        $stmt = $webconfigDB->prepare("SELECT * FROM connectorInfo");
        $connectorInfoSettings = $stmt->execute();
        $stmt = $webconfigDB->prepare("SELECT COUNT( *) from connectorInfo");
        $countConnectorInfo = $stmt->execute();
        $countConnector = $countConnectorInfo->fetchArray();


        //Local load management slave configs
        $stmt = $webconfigDB->prepare("SELECT * FROM slaveConfigs");
        $slaveConfigSettings = $stmt->execute();
        $stmt = $webconfigDB->prepare("SELECT COUNT( *) from slaveConfigs");
        $countSlavesOfDlmSettings = $stmt->execute();
        $countSlaves = $countSlavesOfDlmSettings->fetchArray();

        $stmt = $webconfigDB->prepare("SELECT connectionStatus FROM slaveConfigs WHERE serialNumber = :serialNumber");
        $stmt->bindValue(':serialNumber', $serialNumber, SQLITE3_TEXT);
        $result_master = $stmt->execute();
        if ($row = $result_master->fetchArray(SQLITE3_ASSOC)) {
            $connectionStatus_master = $row['connectionStatus'];
        }

        //Visibility Settings
        $stmt = $webconfigDB->prepare("SELECT * from visibility");
        $visibilitySettings = $stmt->execute();

        //Log Settings
        $stmt = $webconfigDB->prepare("SELECT * FROM logSettings WHERE id= :id");
        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
        $logSettings = $stmt->execute();
        $rowLogs = $logSettings->fetchArray();

        if(is_int(array_search("eth0",$interfaceList,true)) && $rowLanSettings["enable"] == "true"){
            $LanIP = shell_exec("ip addr show eth0 | grep 'inet ' | awk '{print $2}' | cut -f1 -d'/'");
            if(empty($LanIP)){
                $LanIP = '-';
            }

        }
        if(is_int(array_search("eth1",$interfaceList,true)) && $rowLanSettings["enable"] == "true"){
            $LanIP = shell_exec("ip addr show eth1 | grep 'inet ' | awk '{print $2}' | cut -f1 -d'/'");
            if(empty($LanIP)){
                $LanIP = '-';
            }
        }
        if(is_int(array_search("eth2",$interfaceList,true)) && $rowLanSettings["enable"] == "true"){
            $LanIP = shell_exec("ip addr show eth2 | grep 'inet ' | awk '{print $2}' | cut -f1 -d'/'");
            if(empty($LanIP)){
                $LanIP = '-';
            }
        }
        if(is_int(array_search("wlan0",$interfaceList,true)) && $rowWlanSettings["enable"] == "true"){
            $WlanIP = shell_exec("ip addr show wlan0 | grep 'inet ' | awk '{print $2}' | cut -f1 -d'/'");
            if(empty($WlanIP)){
                $WlanIP = '-';
            }
        }
        if(is_int(array_search("wwan0",$interfaceList,true)) && $rowCellularSettings["enable"] == "true"){
            $CellularIP = shell_exec("ip addr show wwan0 | grep 'inet ' | awk '{print $2}' | cut -f1 -d'/'");
            if(empty($CellularIP)){
                $CellularIP = '-';
            }
        }


        $hidden_tabs = "";
        $hidden_bars = "";
        $hidden_page_items ="";
        $hiddenOptionList = "";
        $visible_tabs = "";
        $visible_bars = "";
        $visible_page_items = "";
        $visibleOptionList = "";

        if($displayHideList != ""){
            $hidden_bars =  $displayHideList;
        }


        $display_none_count = 0;
        $tabs_display = array(
            "mainPageTab" => ";",
            "generalSettingsTab" => ";",
            "installationSettingsTab" => ";",
            "ocppSettingTab" => ";",
            "networkInterfacesTab" => ";",
            "standaloneModeTab" => ";",
            "localLoadManagementTab" => ";",
            "systemMaintenanceTab" => ";"
        );

        while($rowVisibility = $visibilitySettings->fetchArray()){
            $userGroup = $rowVisibility["userGroup"];
            if ($userGroup == $dbCurrentUser) {
                $hidden_tabs = $rowVisibility["hiddenTabs"];
                $hidden_page_items = $rowVisibility["hiddenPageItems"];
                $hiddenOptionList = $rowVisibility["option"];
                $visible_tabs = $rowVisibility["visibleTabs"];
                $visible_bars = $rowVisibility["visibleBars"];
                $visible_page_items = $rowVisibility["visiblePageItems"];
                $visibleOptionList = $rowVisibility["visibleOption"];

                if ($rowVisibility["hiddenBars"] != null && $rowVisibility["hiddenBars"] != "" && $displayHideList != ""){
                    $displayHideList = "," . $displayHideList;
                }
                $hidden_bars = $rowVisibility["hiddenBars"] . $displayHideList;
                break;
            }
        }

        if(!empty($visible_tabs)){
            $visible_tabs = explode(",",$visible_tabs);
            $tabs_display_keys = array_keys($tabs_display);
            foreach($tabs_display_keys as $tab){
                if(!empty($tab) && !in_array($tab,$visible_tabs)){
                    $tabs_display[$tab] = "none;";
                }
            }
        }

        if(!empty($hidden_tabs)){
            $hidden_tabs = explode(",",$hidden_tabs);
            foreach($hidden_tabs as $tab){
                if(!empty($tab) && array_key_exists($tab,$tabs_display)){
                    $tabs_display[$tab] = "none;";
                }
            }
        }

        $private_charging_disable = ($meterType == "EichrechtBauer" && $privateCharging == 1) ? True : False;
        $private_charging_enable = ($meterType == "EichrechtBauer" && $privateCharging == 0) ? True : False;

        if($private_charging_disable){
            $tabs_display["standaloneModeTab"] = "none;";
        }

        if($cableModel == 2){
            if($hidden_bars != ""){
                $hidden_bars = $hidden_bars. ','. "lockableCableBar";
            }
            else{
                $hidden_bars = "lockableCableBar";
            }
        }

        foreach ($tabs_display as $value) {
            if(strpos($value,'none') !== false){
                $display_none_count = $display_none_count + 1;
            }
        }
        $size = 92 / (sizeof($tabs_display) - $display_none_count);
        $size = "width: " . strval($size) . "vw";
        foreach ($tabs_display as $key => $value) {
            $tabs_display[$key] = $tabs_display[$key] . $size;
        }

        //Installation Settings
        $stmt = $webconfigDB->prepare("SELECT * from installationSettings");
        $installationSettings = $stmt->execute();
        $rowInstallationSettings = $installationSettings->fetchArray();
        $powerOptimizerTotalCurrentValues = [];
        $current_limiter_phase = $rowInstallationSettings['currentLimiterPhase'];
        $powerOptimizerExternalMeterOptions = [
            ['id' => 0, 'text' => _AUTOSELECTED],
            ['id' => 1, 'text' => 'Klefr 6924/6934'],
            ['id' => 2, 'text' => 'Garo GNM3T/GNM3D'],
            ['id' => 3, 'text' => 'Embedded Power Optimizer with CT'],
            ['id' => 4, 'text' => 'P1 Slimmemeter']
        ];

        $operationModeOptions = [
            ['id' => "normal", 'value' => 1, 'text' => "Normal"],
            ['id' => "peakOffPeak", 'value' => 2, 'text' => "Peak / Off-Peak"],
            ['id' => "tic", 'value' => 3, 'text' => "TIC"]
        ];

        foreach (range(10, 100) as $number) {
            array_push($powerOptimizerTotalCurrentValues,$number);
        }

        $loadSheddingMinimumCurrentValues = [];
        foreach (range(6, $rowInstallationSettings['currentLimiterValue']) as $number) {
            array_push($loadSheddingMinimumCurrentValues,$number);
        }

        $unbalancedLoadDetectionMaxCurrentValues = [];
        $maxCurrentValue = ($meterType == "EichrechtBauer") && ($cableModel == 2) ? 18 : $rowInstallationSettings['currentLimiterValue'];

        foreach (range(6, $maxCurrentValue) as $number) {
            $unbalancedLoadDetectionMaxCurrentValues[] = $number;
        }

        $currentLimiterValues = [];
        $currentLimiterMaxVal = $rowInstallationSettings['currentLimiterMaxVal'];
        $currentLimiterMinVAlue = $rowInstallationSettings['currentLimiterMinVal'];
        foreach (range($currentLimiterMinVAlue, $currentLimiterMaxVal) as $number) {
            $currentLimiterValues[] = $number;
        }

        if (startsWith($powerBoardVersion, '1.7')) {
            $powerOptimizerExternalMeterOptions = [
                ['id' => 0, 'text' => _AUTOSELECTED],
                ['id' => 1, 'text' => 'Klefr 6924/6934'],
                ['id' => 2, 'text' => 'Garo GNM3T/GNM3D'],
                ['id' => 3, 'text' => 'Embedded Power Optimizer with CT']
            ];
        }

        if (startsWith($powerBoardVersion, '1.1') || startsWith($powerBoardVersion, '1.7')) {
            $operationModeOptions = [
                ['id' => "normal", 'value' => 1, 'text' => "Normal"],
                ['id' => "peakOffPeak", 'value' => 2, 'text' => "Peak / Off-Peak"],
                ['id' => "tic", 'value' => 3, 'text' => "TIC"],
                ['id' => "ticWithoutPeakOffPeak", 'value' => 4, 'text' => "TIC without Peak / Off-Peak"]
            ];
        }

        if ((startsWith($powerBoardVersion, '1.8') || startsWith($powerBoardVersion, '9.8'))) {
            $operationModeOptions = [
                ['id' => "normal", 'value' => 1, 'text' => "Normal"],
                ['id' => "peakOffPeak", 'value' => 2, 'text' => "Peak / Off-Peak"]
            ];
        }

        if($ulType == "UL32" || $ulType == "UL50"){
            $tabs_display["localLoadManagementTab"] = "none;";
            $powerOptimizerExternalMeterOptions = [
                ['id' => 0, 'text' => _AUTOSELECTED],
                ['id' => 3, 'text' => 'Embedded Power Optimizer with CT'],
                ['id' => 5, 'text' => 'Carlo Gavazzi EM530'],
            ];

            $operationModeOptions = [
                ['id' => "normal", 'value' => 1, 'text' => "Normal"]
            ];
        }

        $timeZoneList =[
            "Africa/Accra","Africa/Addis_Ababa","Africa/Algiers",
            "Africa/Asmara","Africa/Bamako","Africa/Bangui", "Africa/Banjul",
            "Africa/Bissau","Africa/Blantyre","Africa/Brazzaville","Africa/Bujumbura",
            "Africa/Casablanca","Africa/Ceuta","Africa/Conakry","Africa/Dakar",
            "Africa/Dar_es_Salaam","Africa/Djibouti","Africa/Douala","Africa/El_Aaiun",
            "Africa/Freetown","Africa/Gaborone","Africa/Harare","Africa/Johannesburg",
            "Africa/Kampala","Africa/Khartoum","Africa/Kigali","Africa/Kinshasa",
            "Africa/Lagos", "Africa/Libreville","Africa/Lome","Africa/Luanda",
            "Africa/Lubumbashi","Africa/Lusaka","Africa/Malabo","Africa/Maputo",
            "Africa/Maseru","Africa/Mbabane","Africa/Mogadishu","Africa/Monrovia",
            "Africa/Nairobi","Africa/Ndjamena","Africa/Niamey","Africa/Nouakchott",
            "Africa/Ouagadougou","Africa/Porto-Novo","Africa/Sao_Tome","Africa/Tripoli",
            "Africa/Tunis","Africa/Windhoek","America/Adak","America/Anchorage",
            "America/Anguilla","America/Antigua","America/Araguaina","America/Argentina/Buenos_Aires",
            "America/Argentina/Catamarca","America/Argentina/Cordoba","America/Argentina/Jujuy",
            "America/Argentina/La_Rioja","America/Argentina/Mendoza","America/Argentina/Rio_Gallegos",
            "America/Argentina/Salta", "America/Argentina/San_Juan","America/Argentina/San_Luis",
            "America/Argentina/Tucuman","America/Argentina/Ushuaia","America/Aruba","America/Asuncion",
            "America/Atikokan","America/Bahia","America/Bahia_Banderas","America/Barbados",
            "America/Belem","America/Belize","America/Blanc-Sablon","America/Boa_Vista","America/Bogota","America/Boise",
            "America/Cambridge_Bay","America/Campo_Grande","America/Cancun","America/Caracas",
            "America/Cayenne","America/Cayman","America/Chicago","America/Chihuahua",
            "America/Costa_Rica","America/Creston","America/Cuiaba","America/Curacao",
            "America/Danmarkshavn","America/Dawson","America/Dawson_Creek",
            "America/Denver","America/Detroit","America/Dominica","America/Edmonton",
            "America/Eirunepe","America/El_Salvador","America/Fort_Nelson",
            "America/Fortaleza","America/Glace_Bay","America/Godthab","America/Goose_Bay",
            "America/Grand_Turk","America/Grenada","America/Guadeloupe",
            "America/Guatemala","America/Guayaquil","America/Guyana","America/Halifax",
            "America/Havana", "America/Hermosillo","America/Indiana/Indianapolis",
            "America/Indiana/Knox","America/Indiana/Marengo","America/Indiana/Petersburg",
            "America/Indiana/Tell_City","America/Indiana/Vevay","America/Indiana/Vincennes",
            "America/Indiana/Winamac","America/Inuvik","America/Iqaluit","America/Jamaica",
            "America/Juneau","America/Kentucky/Louisville","America/Kentucky/Monticello",
            "America/Kralendijk","America/La_Paz","America/Lima","America/Los_Angeles",
            "America/Lower_Princes","America/Maceio","America/Managua","America/Manaus",
            "America/Marigot","America/Martinique","America/Matamoros","America/Mazatlan",
            "America/Menominee","America/Merida","America/Metlakatla","America/Mexico_City",
            "America/Miquelon","America/Moncton","America/Monterrey","America/Montevideo",
            "America/Montserrat","America/Nassau","America/New_York","America/Nipigon",
            "America/Nome","America/Noronha","America/North_Dakota/Beulah","America/North_Dakota/Center",
            "America/North_Dakota/New_Salem","America/Ojinaga","America/Panama","America/Pangnirtung",
            "America/Paramaribo","America/Phoenix","America/Port-au-Prince","America/Port_of_Spain",
            "America/Porto_Velho","America/Puerto_Rico","America/Punta_Arenas","America/Rainy_River",
            "America/Rankin_Inlet","America/Recife","America/Regina","America/Resolute",
            "America/Rio_Branco","America/Santarem","America/Santiago","America/Santo_Domingo",
            "America/Sao_Paulo","America/Scoresbysund","America/Sitka","America/St_Barthelemy",
            "America/St_Johns","America/St_Kitts","America/St_Lucia","America/St_Thomas",
            "America/St_Vincent","America/Swift_Current","America/Tegucigalpa","America/Thule",
            "America/Thunder_Bay","America/Tijuana","America/Toronto","America/Tortola",
            "America/Vancouver","America/Whitehorse","America/Winnipeg","America/Yakutat",
            "America/Yellowknife","Antarctica/Casey","Antarctica/Davis","Antarctica/DumontDUrville",
            "Antarctica/Macquarie","Antarctica/Mawson","Antarctica/McMurdo","Antarctica/Palmer",
            "Antarctica/Rothera","Antarctica/Syowa","Antarctica/Troll","Antarctica/Vostok",
            "Arctic/Longyearbyen","Asia/Aden","Asia/Almaty","Asia/Amman","Asia/Anadyr",
            "Asia/Aqtau","Asia/Aqtobe","Asia/Ashgabat","Asia/Atyrau","Asia/Baghdad",
            "Asia/Bahrain","Asia/Baku","Asia/Bangkok","Asia/Barnaul","Asia/Beirut",
            "Asia/Bishkek","Asia/Brunei","Asia/Chita","Asia/Choibalsan","Asia/Colombo",
            "Asia/Damascus","Asia/Dhaka","Asia/Dili","Asia/Dubai","Asia/Dushanbe",
            "Asia/Famagusta","Asia/Gaza","Asia/Hebron","Asia/Ho_Chi_Minh",
            "Asia/Hong_Kong","Asia/Hovd","Asia/Irkutsk","Asia/Jakarta",
            "Asia/Jayapura","Asia/Jerusalem","Asia/Kabul","Asia/Kamchatka",
            "Asia/Karachi","Asia/Kathmandu","Asia/Khandyga","Asia/Kolkata",
            "Asia/Krasnoyarsk","Asia/Kuala_Lumpur","Asia/Kuching","Asia/Kuwait",
            "Asia/Macau","Asia/Magadan","Asia/Makassar","Asia/Manila","Asia/Muscat",
            "Asia/Nicosia","Asia/Novokuznetsk","Asia/Novosibirsk","Asia/Omsk",
            "Asia/Oral","Asia/Phnom_Penh","Asia/Pontianak","Asia/Pyongyang",
            "Asia/Qatar","Asia/Qostanay","Asia/Qyzylorda","Asia/Riyadh","Asia/Sakhalin",
            "Asia/Samarkand","Asia/Seoul","Asia/Shanghai","Asia/Singapore","Asia/Srednekolymsk",
            "Asia/Taipei","Asia/Tashkent","Asia/Tbilisi","Asia/Tehran","Asia/Thimphu",
            "Asia/Tokyo","Asia/Tomsk","Asia/Ulaanbaatar","Asia/Urumqi","Asia/Ust-Nera",
            "Asia/Vientiane","Asia/Vladivostok","Asia/Yakutsk","Asia/Yangon","Asia/Yekaterinburg",
            "Asia/Yerevan","Atlantic/Azores","Atlantic/Bermuda","Atlantic/Canary","Atlantic/Cape_Verde",
            "Atlantic/Faroe", "Atlantic/Madeira","Atlantic/Reykjavik","Atlantic/South_Georgia",
            "Atlantic/St_Helena","Atlantic/Stanley","Australia/Adelaide","Australia/Brisbane",
            "Australia/Broken_Hill","Australia/Currie","Australia/Darwin","Australia/Eucla",
            "Australia/Hobart","Australia/Lindeman","Australia/Lord_Howe","Australia/Melbourne",
            "Australia/Perth","Australia/Sydney","Europe/Amsterdam","Europe/Andorra","Europe/Astrakhan",
            "Europe/Athens","Europe/Belgrade","Europe/Berlin","Europe/Bratislava", "Europe/Brussels",
            "Europe/Bucharest","Europe/Budapest","Europe/Busingen","Europe/Chisinau",
            "Europe/Copenhagen","Europe/Dublin","Europe/Gibraltar","Europe/Guernsey","Europe/Helsinki",
            "Europe/Isle_of_Man","Europe/Istanbul","Europe/Jersey","Europe/Kaliningrad",
            "Europe/Kiev","Europe/Kirov","Europe/Lisbon","Europe/Ljubljana","Europe/London",
            "Europe/Luxembourg","Europe/Madrid","Europe/Malta","Europe/Mariehamn",
            "Europe/Minsk","Europe/Monaco","Europe/Moscow","Europe/Oslo","Europe/Paris",
            "Europe/Podgorica","Europe/Prague","Europe/Riga","Europe/Rome","Europe/Samara",
            "Europe/San_Marino","Europe/Sarajevo","Europe/Saratov","Europe/Simferopol",
            "Europe/Skopje","Europe/Sofia","Europe/Stockholm","Europe/Tallinn",
            "Europe/Tirane","Europe/Ulyanovsk","Europe/Uzhgorod","Europe/Vaduz",
            "Europe/Vatican","Europe/Vienna","Europe/Vilnius","Europe/Volgograd",
            "Europe/Warsaw","Europe/Zagreb","Europe/Zaporozhye","Europe/Zurich",
            "Indian/Antananarivo","Indian/Chagos","Indian/Christmas",
            "Indian/Cocos","Indian/Comoro","Indian/Kerguelen","Indian/Mahe",
            "Indian/Maldives","Indian/Mauritius","Indian/Mayotte","Indian/Reunion",
            "Pacific/Apia","Pacific/Auckland","Pacific/Bougainville",
            "Pacific/Chatham","Pacific/Chuuk","Pacific/Easter","Pacific/Efate",
            "Pacific/Enderbury","Pacific/Fakaofo","Pacific/Fiji","Pacific/Funafuti",
            "Pacific/Galapagos","Pacific/Gambier","Pacific/Guadalcanal","Pacific/Guam",
            "Pacific/Honolulu","Pacific/Kiritimati","Pacific/Kosrae","Pacific/Kwajalein",
            "Pacific/Majuro","Pacific/Marquesas","Pacific/Midway","Pacific/Nauru",
            "Pacific/Niue","Pacific/Norfolk","Pacific/Noumea","Pacific/Pago_Pago",
            "Pacific/Palau","Pacific/Pitcairn","Pacific/Pohnpei","Pacific/Port_Moresby",
            "Pacific/Rarotonga","Pacific/Saipan","Pacific/Tahiti","Pacific/Tarawa",
            "Pacific/Tongatapu","Pacific/Wake","Pacific/Wallis","UTC"];

        //Presets Settings
        $rowPresetsSettings = array();
        $stmt = $webconfigDB->prepare("SELECT * FROM presets");
        $presetSettings = $stmt->execute();

        $i = 0;
        $presetDisplay = "";
        $passwordResetAuthorizationDisplay = "none";
    
        $stmt = $webconfigDB->prepare("SELECT COUNT(*) as count FROM presets");
        $rows = $stmt->execute();
        $row_number = $rows->fetchArray();
        $numRows = $row_number['count'];

        if ($numRows == 0) {
            $presetDisplay = "none";
        } else {
            while ($row = $presetSettings->fetchArray()) {

                if($meterType != "EichrechtBauer" || $row['presetName'] != "Standalone"){
                    $rowPresetsSettings[$i]['title'] = $row['presetName'];
                    $rowPresetsSettings[$i]['enable'] = $row['enable'];
                }

                $i++;
            }
        }
        $qrEnability = "";
        if($rowGeneral["qrCode"] == 1){
            $qrEnability = "none";
        } else {
            $qrEnability = "";
        }

        if($rowAccount["passwordResetAuthorization"] && !empty($rowAccount["passwordResetAuthorization"])){
            $passwordResetAuthorizationDisplay = "";
        }
    }

    if($rowGeneral["uiTheme"] == null){
        $rowGeneral["uiTheme"] = $uiTheme;
    }

    function language_list()
    {

        $turkish = _TURKISH;
        $english = _ENGLISH;
        $german = _GERMAN;
        $french = _FRENCH;
        $romanian = _ROMANIAN;
        $spanish = _SPANISH;
        $italian = _ITALIAN;
        $finnish = _FINNISH;
        $norwegian = _NORWEGIAN;
        $swedish = _SWEDISH;
        $dutch = _DUTCH;
        $hebrew = _HEBREW;
        $danish = _DANISH;
        $czech = _CZECH;
        $polish = _POLISH;
        $hungarian = _HUNGARIAN;
        $slovak = _SLOVAK;
        $bulgarian = _BULGARIAN;
        $greek = _GREEK;
        $montenegrin = _MONTENEGRIN;
        $bosnian = _BOSNIAN;
        $serbian = _SERBIAN;
        $croatian = _CROATIAN;

        $language_list = array($turkish, $english, $german, $french, $romanian, $spanish, $italian, $finnish, $norwegian, $swedish, $hebrew, $danish, $czech, $polish, $hungarian, $slovak, $dutch, $bulgarian, $greek, $montenegrin, $bosnian, $serbian, $croatian);
        $key_list = array("tr", "en", "de", "fr", "ro", "es", "it","fi", "no", "sv", "he", "da", "cz", "pl", "hu", "sk", "nl", "bg", "gr", "me", "ba", "rs", "hr");
        $language_array = array();
        foreach ($key_list as $key => $lang) {
            $language_array[$key]['value'] = $lang;
        }
        foreach ($language_list as $key => $lang) {
            $language_array[$key]['lang'] = $lang;
        }
        return $language_array;
    }

    $select_backlight_dimming = _SELECTBACKLIGHTDIMMING;
    $enter_central_system_address = _CENTRALSYSTEMADDRESSERROR;
    $enter_charge_point_id = _CHARGEPOINTIDERROR;
    $is_required = _ISREQUIRED;
    $must_be_numeric = _MUSTBENUMERIC;
    $auth_key_max_limit = _AUTHKEYMAXLIMIT;
    $enter_apn = _APNISREQUIRED;
    $enter_ip = _IPADDRESSREQUIRED;
    $enter_network_mask = _NETWORKMASKREQUIRED;
    $entered_invalid_network_mask = _INVALIDNETWORKMASK;
    $enter_default_gateway = _DEFAULTGATEWAYREQUIRED;
    $entered_invalid_default_gateway = _INVALIDGATEWAY;
    $enter_primary_dns = _PRIMARYDNSREQUIRED;
    $entered_invalid_dns = _INVALIDDNS;
    $select_ip_setting = _SELECTIPSETTING;
    $enter_ssid = _SSIDREQUIRED;
    $enter_password = _PASSWORDISREQUIRED;
    $select_security_type = _SELECTSECURITYTYPE;
    $entered_invalid_ip = _INVALIDIPADDRESS;
    $same_network_lan = _SAMENETWORKLAN;
    $same_network_wlan = _SAMENETWORKWLAN;
    $enter_vpn_functionality = _VPNFUNCTIONALITYREQUIRED;
    $enter_host_ip = _HOSTIPREQUIRED;
    $enter_cert_management = _CERTMANREQUIRED;
    $enter_vpn_name = _VPNNAMEREQUIRED;
    $enter_vpn_password = _VPNPASSWORDREQUIRED;
    $ok_button = _OKBUTTON;
    $enter_user_name = _USERNAMEREQUIRED;
    $wrongCurrentPassword = _CURRENTPASSWORDWRONG;
    $loginLockout = _LOGINLOCKOUT;
    $passwordErrorLevel1 = _PASSWORDERRORLEVEL1;
    $matchCharacter = _PASSWORDMATCHERROR;
    $wifiSpecialCharacter = _WIFIPASSWORDERROR;
    $wifiSSIDSpecialCharacter = _WIFISSIDERROR;
    $wifiHotspotPasswordErrorLevel2 = _WIFIHOTSPOTPASSWORDERRORLEVEL2;
    $wifiHotspotPasswordErrorLevel3 = _WIFIHOTSPOTPASSWORDERRORLEVEL3;
    $passwordErrorLevel2 = _PASSWORDERRORLEVEL2;
    $passwordErrorLevel3 = _PASSWORDERRORLEVEL3;
    $save_button = _SAVECAPITAL;
    $cancel_button = _CANCEL;
    $confirm_button = _CONFIRM;
    $factory_reset = _FACTORYRESETBUTTON;
    $less_than_or_equalto4 = _LESSTHANOREQUAL4;
    $less_than_or_equalto20 = _LESSTHANOREQUAL20;
    $less_than_or_equalto300 = _LESSTHANOREQUAL300;
    $less_than_or_equalto65000 = _LESSTHANOREQUAL65000;
    $less_than_or_equalto86500 = _LESSTHANOREQUAL86500;
    $less_than_or_equalto22 = _LESSTHANOREQUAL22;
    $less_than_or_equalto10 = _LESSTHANOREQUAL10;
    $less_than_or_equalto600 = _LESSTHANOREQUAL600;
    $less_than_or_equalto120 = _LESSTHANOREQUAL120;
    $less_than_or_equalto10000 = _LESSTHANOREQUAL10000;
    $high_than_or_equalto0 = _HIGHTHANOREQUAL0;
    $is_not_valid = _ISNOTVALID;
    $is_duplicated = _ISDUPLICATED;
    $freeModeMaxCharacter = _FREEMODEMAXCHARACTER;
    $isVersionControl = false;
    $hard_reset_confirm = _HARDRESETCONFIRM;
    $soft_reset_confirm = _SOFTRESETCONFIRM;
    $cp_role = _CPROLE;
    $grid_settings = _GRIDSETTINGS;
    $load_management_mode = _LOADMANAGEMENTMODE;
    $load_management_group = _LOADMANAGEMENTGROUP;
    $alarms = _ALARMS;
    $master = _MASTER;
    $slave = _SLAVE;
    $main_circuit_current = _MAINCIRCUITCURRENT;
    $main_circuit_current_err = _MAINCIRCUITCURRENTERROR;
    $cluster_max_current = _CLUSTERMAXCURRENT;
    $cluster_max_current_err = _CLUSTERMAXCURRENTERROR;
    $cluster_failsafe_current = _CLUSTERFAILSAFECURRENT;
    $cluster_failsafe_current_err = _CLUSTERFAILSAFECURRENTERROR;
    $cluster_max_current_less_than_10 = _CLUSTERMAXCURRENTLESSTHAN10;
    $cluster_max_current_more_than = _CLUSTERMAXCURRENTMORETHAN;
    $cluster_failsafe_current_less_than_0 = _CLUSTERFAILSAFECURRENTLESSTHAN0;
    $cluster_failsafe_current_more_than = _CLUSTERFAILSAFECURRENTMORETHAN;
    $dlm_interface_selection_err = _DLMINTERFACEERROR;
    $dlm_max_current = _DLMMAXCURRENT;
    $dlm_max_current_err = _DLMMAXCURRENTERROR;
    $dlm_max_current_more_err = _DLMMAXCURRENTMORETHANMAIN;
    $dlm_max_current_less_err = _DLMMAXCURRENTLESSTHANMAIN;
    $supply_type = _SUPPLYTYPE;
    $fifo_percentage = _FIFOPERCANTAGE;
    $tic = _TIC;
    $fifo = _FIFO;
    $equally_shared = _EQUALLYSHARED;
    $combined = _COMBINED;
    $less_than_1024 = _LESSTHAN1024;
    $more_than_12 = _MORETHAN12;
    $more_than_10 = _MORETHAN10;
    $at_least_0 = _ATLEAST0;
    $list_of_slaves = _LISTOFSLAVES;
    $choose_one = _CHOOSEONE;
    $number_of_slaves = _NUMBEROFSLAVES;
    $serial_no = _SERIALNO;
    $connector_state = _CONNECTORSTATE;
    $number_of_phases = _NUMBEROFPHASES;
    $phase_con_sequence = _PHASECONSEQUENCE;
    $vip = _VIP;
    $vip_error = _VIPERROR;
    $phase_con_sequence_error = _PHASECONSEQUENCEERROR;
    $supported_current = _SUPPORTEDCURRENT;
    $instant_cur_per_phase = _INSTANTCURPERPHASE;
    $fifo_charging_percantage = _FIFOCHARGINGPERCENTAGE;
    $minimum_current1P = _MINIMUMCURRENT1P;
    $minimum_current3P = _MINIMUMCURRENT3P;
    $maximum_current = _MAXIMUMCURRENT;
    $step = _STEP;
    $service_contact_info_character = _SERVICECONTACTINFOCHARACTER;
    $select_mode = _SELECTMODE;
    $enter_rfid_local_list = _PLEASEENTERRFIDLOCALLIST;
    $enter_max_dhcp_addr_range  = _MAXDHCPADDRRANGEERROR;
    $enter_min_dhcp_addr_range  = _MINDHCPADDRRANGEERROR;
    $diff_max_and_min_dhcp_adr_range = _DIFFERENCEBETWEENMAXANDMINADDRRANGE;
    $ip_address_range  = _IPADDRESSRANGE;
    $entered_invalid_subnet = _INVALIDSUBNET;
    $power_more_than_equal_to_16 = _POWEROPTIMIZERTOTALCURRENTLIMITMORETHANOREQUAL16;
    $power_less_than_equal_to_100 = _POWEROPTIMIZERTOTALCURRENTLIMITLESSTHANOREQUAL100;
    $same_pass = _SAMEPASSWORDERROR;
    $current_limit_less_than_8 = _CURRENTLIMITERVALUELESSTHAN8;
    $current_limit_less_than_14 = _CURRENTLIMITERVALUELESSTHAN14;
    $randomised_delay_maximum_duration_required = _RANDOMISEDDELAYMAXIMUMDURATIONERROR;
    $randomised_delay_maximum_duration_numeric = _RANDOMISEDDELAYMAXIMUMDURATIONBENUMERIC;
    $randomised_delay_maximum_duration_limit = _RANDOMISEDDELAYMAXIMUMDURATIONLIMIT;
    $off_peak_charging_periods_error = _OFFPEAKCHARGINGPERIODSERROR;
    $off_peak_charging_periods_same_time_error = _OFFPEAKCHARGINGPERIODSSAMETIMEERROR;
    $change_administration_password = _CHANGEADMINPASSWORD;
    if($rowAccount["type"] != "administrator"){
        $change_administration_password = _CHANGEPASSWORD;
    }
    $qr_code_delimiter_value = _INVALIDDELIMITERCHARACTER;
    $failsafe_current = _FAILSAFECURRENT;
    $failsafe_current_err = _FAILSAFECURRENTERROR;
    $failsafe_current_less_than_0 = _FAILSAFECURRENTLESSTHAN0;
    $failsafe_current_more_than = ($ulType == "" || $ulType =="UL32")  ? _FAILSAFECURRENTMORETHAN32 : _FAILSAFECURRENTMORETHAN50;
    $fallback_current_range = _FALLBACKRANGE;
    $must_be_integer = _MUSTBEINTEGER;
    $db_access_fall = _DBACCESSFAILURE;
    $logsDateError = _LOGSDATEERROR;
    $P1Display = (startsWith($powerBoardVersion, '1.7') || startsWith($powerBoardVersion, '9.7')) ? "none" : "";
    $followTheSunDisplay = (startsWith($powerBoardVersion, '1.8') || startsWith($powerBoardVersion, '9.8')) ? "none" : "";

    function getWifiLevel($signal) {
        if ($signal >= -50) return 4;
        if ($signal >= -60) return 3;
        if ($signal >= -70) return 2;
        if ($signal >= -90) return 1;
        return 0;
    }

    foreach ($networks as &$network) {
        $network['wifiLevel'] = getWifiLevel($network['signal']);
    }
    unset($network);
    ?>

    <script type="text/javascript">
        var select_backlight_dimming = '<?php echo $select_backlight_dimming ?>';
        var enter_central_system_address = '<?php echo $enter_central_system_address ?>';
        var enter_charge_point_id = '<?php echo $enter_charge_point_id ?>';
        var is_required = '<?php echo $is_required ?>';
        var must_be_numeric = '<?php echo $must_be_numeric ?>';
        var auth_key_max_limit = '<?php echo $auth_key_max_limit ?>';
        var enter_apn = '<?php echo $enter_apn ?>';
        var enter_ip = '<?php echo $enter_ip ?>';
        var enter_network_mask = '<?php echo $enter_network_mask ?>';
        var entered_invalid_network_mask = '<?php echo $entered_invalid_network_mask ?>';
        var enter_default_gateway = '<?php echo $enter_default_gateway ?>';
        var entered_invalid_default_gateway = '<?php echo $entered_invalid_default_gateway ?>';
        var enter_primary_dns = '<?php echo $enter_primary_dns ?>';
        var entered_invalid_dns = '<?php echo $entered_invalid_dns ?>';
        var select_ip_setting = '<?php echo $select_ip_setting ?>';
        var enter_ssid = '<?php echo $enter_ssid ?>';
        var enter_password = '<?php echo $enter_password ?>';
        var select_security_type = '<?php echo $select_security_type ?>';
        var entered_invalid_ip = '<?php echo $entered_invalid_ip ?>';
        var same_network_lan = '<?php echo $same_network_lan ?>';
        var same_network_wlan = '<?php echo $same_network_wlan ?>';
        var enter_vpn_functionality = '<?php echo $enter_vpn_functionality ?>';
        var enter_host_ip = '<?php echo $enter_host_ip ?>';
        var enter_cert_management = '<?php echo $enter_cert_management ?>';
        var enter_vpn_name = '<?php echo $enter_vpn_name ?>';
        var enter_vpn_password = '<?php echo $enter_vpn_password ?>';
        var ok_button = '<?php echo $ok_button ?>';
        var enter_user_name = '<?php echo $enter_user_name ?>';
        var currentUser = '<?php echo $currentUser ?>';
        var wrongCurrentPassword = '<?php echo $wrongCurrentPassword ?>';
        var loginLockout = '<?php echo $loginLockout ?>';
        var passwordErrorLevel1 = '<?php echo $passwordErrorLevel1 ?>';
        var matchCharacter = '<?php echo $matchCharacter ?>';
        var wifiSpecialCharacter = '<?php echo $wifiSpecialCharacter ?>';
        var wifiSSIDSpecialCharacter = '<?php echo $wifiSSIDSpecialCharacter ?>';
        var wifiHotspotPasswordErrorLevel2 = '<?php echo $wifiHotspotPasswordErrorLevel2 ?>';
        var wifiHotspotPasswordErrorLevel3 = '<?php echo $wifiHotspotPasswordErrorLevel3 ?>';
        var passwordErrorLevel2 = '<?php echo $passwordErrorLevel2 ?>';
        var passwordErrorLevel3 = '<?php echo $passwordErrorLevel3 ?>';
        var save_button = '<?php echo $save_button ?>';
        var cancel_button = '<?php echo $cancel_button ?>';
        var confirm_button = '<?php echo $confirm_button ?>';
        var factory_reset = '<?php echo $factory_reset ?>';
        var less_than_or_equalto4 = '<?php echo $less_than_or_equalto4 ?>';
        var less_than_or_equalto20 = '<?php echo $less_than_or_equalto20 ?>';
        var less_than_or_equalto65000 = '<?php echo $less_than_or_equalto65000 ?>';
        var less_than_or_equalto300 = '<?php echo $less_than_or_equalto300 ?>';
        var less_than_or_equalto86500 = '<?php echo $less_than_or_equalto86500 ?>';
        var less_than_or_equalto22 = '<?php echo $less_than_or_equalto22 ?>';
        var less_than_or_equalto10 = '<?php echo $less_than_or_equalto10 ?>';
        var less_than_or_equalto600 = '<?php echo $less_than_or_equalto600 ?>';
        var less_than_or_equalto120 = '<?php echo $less_than_or_equalto120 ?>';
        var less_than_or_equalto10000 = '<?php echo $less_than_or_equalto10000 ?>';
        var high_than_or_equalto0 = '<?php echo $high_than_or_equalto0 ?>';
        var is_not_valid = '<?php echo $is_not_valid ?>';
        var is_duplicated = '<?php echo $is_duplicated ?>';
        var freeModeMaxCharacter = '<?php echo $freeModeMaxCharacter ?>';
        var hard_reset_confirm = '<?php echo $hard_reset_confirm ?>';
        var soft_reset_confirm = '<?php echo $soft_reset_confirm ?>';
        var somethingChanged = false;
        var versionCompare = false;
        var cp_role = '<?php echo $cp_role ?>';
        var grid_settings = '<?php echo $grid_settings ?>';
        var load_management_mode = '<?php echo $load_management_mode ?>';
        var load_management_group = '<?php echo $load_management_group ?>';
        var alarms = '<?php echo $alarms ?>';
        var master = '<?php echo $master ?>';
        var slave = '<?php echo $slave ?>';
        var main_circuit_current = '<?php echo $main_circuit_current ?>';
        var main_circuit_current_err = '<?php echo $main_circuit_current_err ?>';
        var cluster_max_current = '<?php echo $cluster_max_current ?>';
        var cluster_failsafe_current = '<?php echo $cluster_failsafe_current ?>';
        var cluster_max_current_err = '<?php echo $cluster_max_current_err ?>';
        var cluster_failsafe_current_err = '<?php echo $cluster_failsafe_current_err ?>';
        var cluster_max_current_less_than_10 = '<?php echo $cluster_max_current_less_than_10 ?>';
        var cluster_max_current_more_than = '<?php echo $cluster_max_current_more_than ?>';
        var cluster_failsafe_current_less_than_0 = '<?php echo $cluster_failsafe_current_less_than_0 ?>';
        var cluster_failsafe_current_more_than = '<?php echo $cluster_failsafe_current_more_than ?>';
        var dlm_interface_selection_err = '<?php echo $dlm_interface_selection_err ?>';
        var dlm_max_current = '<?php echo $dlm_max_current ?>';
        var dlm_max_current_err = '<?php echo $dlm_max_current_err ?>';
        var dlm_max_current_more_err = '<?php echo $dlm_max_current_more_err ?>';
        var dlm_max_current_less_err = '<?php echo $dlm_max_current_less_err ?>';
        var supply_type = '<?php echo $supply_type ?>';
        var fifo_percentage = '<?php echo $fifo_percentage ?>';
        var tic = '<?php echo $tic ?>';
        var fifo = '<?php echo $fifo ?>';
        var equally_shared = '<?php echo $equally_shared ?>';
        var combined = '<?php echo $combined ?>';
        var less_than_1024 = '<?php echo $less_than_1024 ?>';
        var more_than_12 = '<?php echo $more_than_12 ?>';
        var more_than_10 = '<?php echo $more_than_10 ?>';
        var at_least_0 = '<?php echo $at_least_0 ?>';
        var list_of_slaves = '<?php echo $list_of_slaves ?>';
        var choose_one = '<?php echo $choose_one ?>';
        var number_of_slaves = '<?php echo $number_of_slaves ?>';
        var serial_no = '<?php echo $serial_no ?>';
        var connector_state = '<?php echo $connector_state ?>';
        var number_of_phases = '<?php echo $number_of_phases ?>';
        var phase_con_sequence = '<?php echo $phase_con_sequence ?>';
        var vip = '<?php echo $vip ?>';
        var vip_error = '<?php echo $vip_error ?>';
        var phase_con_sequence_error = '<?php echo $phase_con_sequence_error ?>';
        var supported_current = '<?php echo $supported_current ?>';
        var instant_cur_per_phase = '<?php echo $instant_cur_per_phase ?>';
        var fifo_charging_percantage = '<?php echo $fifo_charging_percantage ?>';
        var minimum_current1P = '<?php echo $minimum_current1P ?>';
        var minimum_current3P = '<?php echo $minimum_current3P ?>';
        var maximum_current = '<?php echo $maximum_current ?>';
        var step = '<?php echo $step ?>';
        var service_contact_info_character = '<?php echo $service_contact_info_character ?>';
        var select_mode = '<?php echo $select_mode ?>';
        var enter_rfid_local_list = '<?php echo $enter_rfid_local_list ?>';
        var wlanEnable = '<?php echo $rowWlanSettings["enable"] ?>';
        var cellularEnable = '<?php echo $rowCellularSettings["enable"] ?>';
        var lanIpSetting = '<?php echo $rowLanSettings["IPSetting"] ?>';
        var hotspotEnable = '<?php echo $rowWifiHotspotSettings["enable"] ?>';
        var hotspotPasswordLevel = '<?php echo $rowWifiHotspotSettings["passwordLevel"] ?>';
        var enter_max_dhcp_addr_range = '<?php echo $enter_max_dhcp_addr_range ?>';
        var enter_min_dhcp_addr_range = '<?php echo $enter_min_dhcp_addr_range ?>';
        var diff_max_and_min_dhcp_adr_range = '<?php echo $diff_max_and_min_dhcp_adr_range ?>';
        var ip_address_range = '<?php echo $ip_address_range ?>';
        var entered_invalid_subnet = '<?php echo $entered_invalid_subnet ?>';
        var hidden_tabs = '<?php echo $hidden_tabs ?>';
        var hidden_bars = '<?php echo $hidden_bars ?>';
        var hidden_page_items = '<?php echo $hidden_page_items ?>';
        var hiddenOptionList = '<?php echo $hiddenOptionList ?>';
        var visible_tabs = '<?php echo $visible_tabs ?>';
        var visible_bars = '<?php echo $visible_bars ?>';
        var visible_page_items = '<?php echo $visible_page_items ?>';
        var visibleOptionList = '<?php echo $visibleOptionList ?>';
        var power_more_than_equal_to_16 = '<?php echo $power_more_than_equal_to_16 ?>';
        var power_less_than_equal_to_100 = '<?php echo $power_less_than_equal_to_100 ?>';
        var same_password = '<?php echo $same_pass ?>';
        var current_limit_less_than_8 = '<?php echo $current_limit_less_than_8 ?>';
        var current_limit_less_than_14 = '<?php echo $current_limit_less_than_14 ?>';
        var ethernet_ip_settings = '<?php echo $rowLanSettings['IPSetting'] ?>';
        var cellular_gateway = '<?php echo $rowCellularSettings['cellularGateway'] ?>';
        var standalone_mode = '<?php echo $rowStandaloneSettings["mode"] ?>';
        var webconfigPasswordLevel = '<?php echo $rowAccount["passwordLevel"] ?>';
        var randomised_delay_maximum_duration_required = '<?php echo $randomised_delay_maximum_duration_required ?>';
        var randomised_delay_maximum_duration_numeric = '<?php echo $randomised_delay_maximum_duration_numeric ?>';
        var randomised_delay_maximum_duration_limit = '<?php echo $randomised_delay_maximum_duration_limit ?>';
        var off_peak_charging_periods_error = '<?php echo $off_peak_charging_periods_error ?>';
        var current_user_type = '<?php echo $rowAccount["type"]; ?>';
        var off_peak_charging_periods_same_time_error = '<?php echo $off_peak_charging_periods_same_time_error ?>';
        var offPeakChargingPeriodsArbitraryStart = '<?php echo $offPeakChargingPeriod ?>';
        var offPeakChargingPeriodsArbitraryEnd = '<?php echo $offPeakChargingPeriod2 ?>';
        var offPeakChargingPeriodsTemporarStart = '<?php echo $offPeakChargingPeriod3 ?>';
        var offPeakChargingPeriodsTemporaryEnd = '<?php echo $offPeakChargingPeriod4 ?>';
        var powerOptimizerValue = '<?php echo $rowInstallationSettings["powerOptimizer"] ?>';
        var loadManagementValue = '<?php echo $rowDlm["dlmMode"] ?>';
        var evReadySupportValue = '<?php echo $rowInstallationSettings["evReadySupport"] ?>';
        var deviceModelCode = '<?php echo searchModelCodes() ?>';
        var earthingType = '<?php echo $rowInstallationSettings["earthingType"] ?>';
        var installationErrorEnableValue = '<?php echo $rowOcppConfigurations["InstallationErrorEnable"] ?>';
        var authorizationKeyValue = '<?php echo $authorizationKeyValue ?>';
        var meterType = '<?php echo $meterType ?>';
        var model = '<?php echo $rowDevice["model"] ?>';
        var current_min_val = '<?php echo $rowInstallationSettings["currentLimiterMinVal"] ?>';
        var current_max_val = '<?php echo $rowInstallationSettings["currentLimiterMaxVal"] ?>';
        var qrCodeDelimiterCharacter = '<?php echo $qr_code_delimiter_value ?>';
        var failsafe_current_err = '<?php echo $failsafe_current_err ?>';
        var failsafe_current = '<?php echo $failsafe_current ?>';
        var failsafe_current_less_than_0 = '<?php echo $failsafe_current_less_than_0 ?>';
        var failsafe_current_more_than = '<?php echo $failsafe_current_more_than ?>';
        var ul_type = '<?php echo $ulType ?>';
        var private_charging = '<?php echo $privateCharging ?>';
        var fallback_current_range = '<?php echo $fallback_current_range ?>';
        var followTheSunDisplay = '<?php echo ((startsWith($powerBoardVersion, '1.1') || startsWith($powerBoardVersion, '9.1') || startsWith($powerBoardVersion, '1.8') || startsWith($powerBoardVersion, '9.8')|| $HS) && strtoupper($model) != "EVC10") ? "" : "none"; ?>';
        var masterRequiredFields = {
            "cpRole" : '<?php echo $rowDlm["cpRole"]; ?>',
            "mainCircuitCurrent" : '<?php echo $rowDlm["mainCircuitCurrent"]; ?>',
            "totalCurrentLimit": '<?php echo $rowDlm["totalCurrentLimit"]; ?>',
            "supplyType" : '<?php echo $rowDlm["supplyType"]; ?>',
            "loadManagementMode" : '<?php echo $rowDlm["loadManagementMode"]; ?>'
        };
        var must_be_integer = '<?php echo $must_be_integer ?>';
        var eebusEnabled = <?php echo json_encode($eebusEnabled); ?>;
        var supplyType = '<?php echo $rowDlm["supplyType"]; ?>';
        var dlmTICTotalCurrentValue = '<?php echo $rowDlm["dlmTICTotalCurrent"]; ?>';
        var mainCircuitCurrentValue = '<?php echo $rowDlm["mainCircuitCurrent"]; ?>';
        var db_access_fall = '<?php echo $db_access_fall ?>';
        var masterSerialNumber = '<?php echo $serialNumber ?>';
        var masterConnectionStatus = '<?php echo $connectionStatus_master ?>';
        var simPinValue = '<?php echo $simPinValue ?>';
        var apnPasswordValue = '<?php echo $apnPasswordValue ?>';
        var wifiPasswordValue = '<?php echo $wifiPasswordValue ?>';
        var wifiHotspotPasswordValue = '<?php echo $wifiHotspotPasswordValue ?>';
        var defaultLogsStartDate = '<?php echo $defaultStartDate ?>';
        var defaultLogsEndDate = '<?php echo $logsMaxDate ?>';
        var logsDateError = '<?php echo $logsDateError ?>';
        var currentLimiterPhase = '<?php echo $current_limiter_phase ?>';
    </script>
    <!-- ----------------HTML START------------------------------------------------------------------------------------------- -->
    <header class="bg-dark text-white py-2 fixed-top w-100" style="z-index:1030;">
        <div class="container container-fluid d-flex justify-content-between align-items-center flex-wrap">
            <div class="navbar-brand d-flex align-items-center flex-shrink-1">
                <?php
                    $imagePath = '/usr/share/webconfig/css/weblogo.png';
                    $logoStyle = "margin-top:0.4%;width:80px;height:20px;";
                    if(file_exists($imagePath)){
                        $imageInfo = getimagesize($imagePath);
                        $width = $imageInfo[0];
                        $height = $imageInfo[1];
                        if (($width > 0) && (($height / $width) == 1)) { //for the square
                            if ($height > 50) {
                                $logoStyle = "margin-top:0.4%;margin-left:15px;height:50px;width:50px;";
                            } else {
                                $margin = ((80 - $width) / 2);
                                $logoStyle = "margin-left:{$margin} px; margin-top:0.4%;height:{$height} px;width:{$width} px;";
                            }
                        } else if (($width > 0) && (($height / $width) > 1)) { // for the rectangle
                            if ($height > 50) {
                                $width = ($width * 50) / $height;
                                $left = ((50 - $width) / 2);
                                $logoStyle = "left:{$left} px; margin-top:0.4%;height:50px;width:{$width} px;";
                            } else {
                                $logoStyle = "margin-top:0.4%;height:50px;width:80px;";
                            }
                        } else { // for the rectangle
                            $logoStyle = "margin-top:0.4%;height:20px;width:80px;";
                        }
                    }
                ?>
                <img src="/css/weblogo.png" alt="logo" height="40" class="me-2" style="<?php echo $logoStyle."display:".$logoDisplay; ?>">
                <span class="fw-bold text-nowrap"><?php echo $deviceModel;?></span>
            </div>
            <div class="d-flex align-items-center ms-auto">
                <form method="post">
                    <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
                    <select name="lang" id="lang" onchange="changeLanguage()" class="form-select form-select-sm bg-light text-dark me-3 w-auto">
                        <?php foreach (language_list() as $t) { ?>
                            <option value="<?php print $t['value'] ?>" <?= $rowGeneral["webconfigLanguage"] == $t['value'] ? ' selected="selected"' : ''; ?>>
                                <?php print $t['lang'] ?>
                            </option>
                        <?php } ?>
                    </select>
                    <input id="changeLangButton" type="submit" hidden />
                </form>
                <a href="logout.php" id="logoutText" class="btn btn-outline-light btn-sm"><?= _LOGOUT ?></a>
            </div>
        </div>
    </header>
    <div class="animationBar">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container container-fluid">
            <a href="#" class="navbar-brand d-lg-none">Menu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav">
                    <li id="mainPageTab" class="nav-item"><a class="nav-link" style="display:<?php echo $tabs_display["mainPageTab"] ?>" onclick="openTab(event, 'MainPage')" id="defaultOpen"><?= _MAINPAGE ?></a></li>
                    <li id="generalSettingsTab" class="nav-link dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="display:<?php echo $tabs_display["generalSettingsTab"] ?>" onclick="openTab(event, 'General')" id="generalNav"><?= _GENERAL ?></a>
                        <ul class="dropdown-menu d-md-none">
                            <li><a class="dropdown-item" href="#" >Display Language</a></li>
                            <li><a class="dropdown-item" href="#">Display Backlight Settings</a></li>
                            <li><a class="dropdown-item" href="#">Led Dimming Settings</a></li>
                            <li><a class="dropdown-item" href="#">Standby Led Behaviour</a></li>
                            <li><a class="dropdown-item" href="#">Display Theme</a></li>
                            <li><a class="dropdown-item" href="#">Display Service Contact Info</a></li>
                            <li><a class="dropdown-item" href="#">Logo Settings</a></li>
                            <li><a class="dropdown-item" href="#">Display QR Code</a></li>
                            <li><a class="dropdown-item" href="#">Schedulde Charging</a></li>
                        </ul>
                    </li>
                    <li id="installationSettingsTab" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="display:<?php echo $tabs_display["installationSettingsTab"] ?>" onclick="openTab(event, 'InstallationSettings')" id="installationSettingsNav"><?= _INSTALLATIONSETTINGS ?></a>
                        <ul class="dropdown-menu d-md-none">
                            <li><a class="dropdown-item" href="#">Earthing System</a></li>
                            <li><a class="dropdown-item" href="#">Current Limiter Settings</a></li>
                            <li><a class="dropdown-item" href="#">Unbalanced Load Detection</a></li>
                            <li><a class="dropdown-item" href="#">External Enable Input</a></li>
                            <li><a class="dropdown-item" href="#">Lockable Cable</a></li>
                            <li><a class="dropdown-item" href="#">Charging Mode Selection and Power Optimizer Configuration</a></li>
                            <li><a class="dropdown-item" href="#">Load Shedding Minimum Current</a></li>
                        </ul>
                    </li>
                    <li id="ocppSettingTab" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="display:<?php echo $tabs_display["ocppSettingTab"] ?>" onclick="openTab(event, 'OCPPSettings')" id="ocppNav" ><?= _OCPPSETTINGS ?></a>
                        <ul class="dropdown-menu d-md-none">
                            <li><a class="dropdown-item" href="#">OCPP Connection</a></li>
                            <li><a class="dropdown-item" href="#">OCPP Version</a></li>
                            <li><a class="dropdown-item" href="#">Connection Settings</a></li>
                            <li><a class="dropdown-item" href="#">OCPP Configuration Parameters</a></li>
                        </ul>
                    </li>
                    <li id="networkInterfacesTab" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="display:<?php echo $tabs_display["networkInterfacesTab"] ?>" onclick="openTab(event, 'NetworkInterfaces')" id="networkNav" ><?= _NETWORKINTERFACES ?></a>
                        <ul class="dropdown-menu d-md-none">
                            <li><a class="dropdown-item" href="#">LAN</a></li>
                            <li><a class="dropdown-item" href="#">WLAN</a></li>
                            <li><a class="dropdown-item" href="#">Wi-Fi Hotspot</a></li>
                        </ul>
                    </li>
                    <li id="standaloneModeTab" class="nav-item"><a class="nav-link" style="display:<?php echo $tabs_display["standaloneModeTab"] ?>" onclick="openTab(event, 'StandaloneMode')" id="standaloneNav" ><?= _STANDALONEMODE ?></a></li>
                    <li id="localLoadManagementTab" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="display:<?php echo $tabs_display["localLoadManagementTab"] ?>" onclick="openTab(event, 'LocalLoadManagement')" id="localNav"><?= _LOCALLOAD ?></a>
                        <ul class="dropdown-menu d-md-none">
                            <li><a class="dropdown-item" href="#">General Settings</a></li>
                        </ul>
                    </li>
                    <li id="systemMaintenanceTab" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="display:<?php echo $tabs_display["systemMaintenanceTab"] ?>" onclick="openTab(event, 'SystemMaintenance')" id="systemNav"><?= _SYSTEMMAINTENANCE ?></a>
                        <ul class="dropdown-menu d-md-none">
                            <li><a class="dropdown-item" href="#">Log Files</a></li>
                            <li><a class="dropdown-item" href="#">Firmware Updates</a></li>
                            <li><a class="dropdown-item" href="#">Configuration Backup & Restore</a></li>
                            <li><a class="dropdown-item" href="#">System Reset</a></li>
                            <li><a class="dropdown-item" href="#">Administration Password</a></li>
                            <li><a class="dropdown-item" href="#">Factory Default Configuration</a></li>
                            <li><a class="dropdown-item" href="#">Local Charge Sessions</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <input type="hidden" id="active_tab" name="active_tab" value="MainPage" />

    <form method="post" autocomplete="off">
        <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
        <div id="MainPage" class="tabcontent" style="display:none">
            <?php include("mainPageTab.php"); ?>
        </div>
    </form>

    <div id="General" class="tabcontent" style="display:none">
        <?php include("generalTab.php"); ?>
    </div>

    <div id="InstallationSettings" class="tabcontent" style="display:none">
        <?php include("installationSettings.php"); ?>
    </div>

    <div id="OCPPSettings" class="tabcontent" style="display:none">
        <?php include("ocppSettingsTab.php"); ?>
    </div>

    <div id="NetworkInterfaces" class="tabcontent" style="display:none">
        <?php include("networkInterfacesTab.php"); ?>
    </div>

    <form method="post" autocomplete="off">
        <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
        <div id="StandaloneMode" class="tabcontent" style="display:none">
            <?php include("standaloneTab.php"); ?>
        </div>
    </form>

    <div id="LocalLoadManagement" class="tabcontent" style="display:none">
        <?php include("localLoadTab.php"); ?>
    </div>

    <div id="SystemMaintenance" class="tabcontent" style="display:none">
        <?php include("systemMaintenanceTab.php"); ?>
    </div>

    <div id="notSavedAlertMessage" style="display:none">
        <p class="dialogText"><?= _NOTSAVEDALERT ?></p>
        <p class="dialogTextBold"><?= _SAVEQUESTION ?></p>
    </div>
    <?php
    if (isset($_POST["button_general"])) {
        $selectedLanguage = $_POST["languageSelection"];
        $language_settings = new DisplayLanguageSettings($webconfigDB);
        $language_settings->saveDisplayLanguage($selectedLanguage);
        sendZeroMqMessage("generalUpdate");
    }

    if (isset($_POST["button_back_light_dimming"])) {
        $backlight_dimming_settings = new DisplayBackLightDimmingSettings($webconfigDB);
        $selectedBackLightLevel = $_POST["backLightLevelSelection"];
        if($selectedBackLightLevel == "timeBased"){
            $backlightDimmingSunrise = $_POST["sunriseTimeSelection"];
            $backlightDimmingSunset = $_POST["sunsetTimeSelection"];
            $backlight_dimming_settings->saveBackLightDimming($selectedBackLightLevel,$backlightDimmingSunrise,$backlightDimmingSunset);
        }
        else{
            $backlight_dimming_settings->saveBackLightDimming($selectedBackLightLevel);
        }
        sendZeroMqMessage("generalUpdate");
    }

    if (isset($_POST["button_contact_info"])) {
        $serviceContactInformation = $_POST["serviceContactInfo"];
        $serviceContactInfoSelection = $_POST["serviceContactInfoSelection"];
        $service_contact_info = new DisplayServiceContactInfoSettings($webconfigDB);
        $service_contact_info->saveServiceContactInfo($serviceContactInformation,$serviceContactInfoSelection);
        sendZeroMqMessage("generalUpdate");
    }

    if (isset($_POST["button_general_theme"])) {
        $selectedTheme = $_POST["themeSelection"];
        $theme = new ThemeSettings($webconfigDB);
        $theme->saveTheme($selectedTheme);
        sendZeroMqMessage("generalUpdate");
    }

    if (isset($_POST["button_led_dimming"])) {
        $led_dimming_settings = new LedDimmingSettings($webconfigDB);
        $selectedLedDimmingLevel = $_POST["ledDimmingLevelSelection"];
        if($selectedLedDimmingLevel == "timeBased"){
            $ledDimmingSunrise = $_POST["ledDimmingSunriseTimeSelection"];
            $ledDimmingSunset = $_POST["ledDimmingSunsetTimeSelection"];
            $led_dimming_settings->saveLedDimming($selectedLedDimmingLevel,$ledDimmingSunrise,$ledDimmingSunset);
        }
        else{
            $led_dimming_settings->saveLedDimming($selectedLedDimmingLevel);
        }
        sendZeroMqMessage("generalUpdate");
    }

    if (isset($_POST["button_standalone"])) {
        $selectedMode = $_POST["selectStandaloneMode"];
        $listArray = $_POST["demo"];
        $standalone_mode = new StandaloneModeSettings($webconfigDB);
        $standalone_mode->setStandaloneMode($selectedMode,$listArray);

    }

    //Save LAN information
    if (isset($_POST["button_lan_interfaces"])) {
        $selectedIpSetting = $_POST['selectEthernetIPSetting'];
        if(in_array($selectedIpSetting,[1,2,3])){
            $ethernet_setting = new EthernetSettings($webconfigDB,$rowCellularSettings["cellularGateway"]);
            if($selectedIpSetting == 1){
                $ethernet_setting -> saveStaticEthernet($_POST);
            }else if($selectedIpSetting == 2){
                $ethernet_setting -> saveDhcpServer($_POST);
            }else{
                $ethernet_setting->saveDhcpClient($_POST);
            }

        }
    }

    //Save log settings
    if (isset($_POST["button_device_log"])) {
        $log_settings = new LogSettings($webconfigDB);
        $selectedLogStartDate = $_POST["logsStartDateSelection"];
        $selectedLogEndDate = $_POST["logsEndDateSelection"];
        $log_settings->saveLogSettings($selectedLogStartDate,$selectedLogEndDate);
    }

    //Clear Device Logs
    if (isset($_POST["button_clear_device_log"])) {
        shell_exec("rm -rf /var/log/*");
        ChangeLog:: saveChangeLog("action: clearDeviceLogs", $_SESSION["username"]);
        sendZeroMqMessageWithCommand("agentCommand", "softReset");
    }

    if (isset($_POST["button_password_reset_authorization"])) {
        $account = $rowAccount["passwordResetAuthorization"];

        $stmt = $webconfigDB->prepare("SELECT * FROM account WHERE username= :username");
        $stmt->bindValue(':username', $account, SQLITE3_TEXT);
        $resAccount = $stmt->execute();
        $rowAccountUser = $resAccount->fetchArray();
        $username = $rowAccountUser["username"];

        if(!empty($username)){
            $configurationSettings = "/var/lib/configuration/configurationSettings.json";
            $eonConfigurationSettings = "/usr/lib/vestel/configurationSettings.json";
            $configurationSettingsPath = file_exists($configurationSettings) ? $configurationSettings : searchModelCodes() ? $eonConfigurationSettings : False;

            if(file_exists($configurationSettingsPath)){
                $jsonConfigurationFile = file_get_contents($configurationSettingsPath);
                $json_configuration_file = json_decode($jsonConfigurationFile,true);
                $common_settings_array = $json_configuration_file[0]["customer"]["commonSettings"];

                foreach ($common_settings_array as $common_settings) {
                    if ($common_settings["tableName"] == "account") {
                        $settings_array = $common_settings["settings"];
                        foreach ($settings_array as $settings) {
                            if ($settings["username"]["value"] == $account || $settings["username"]["value"] == "agent\$deviceDetails\$acpwSerialNumber"){
                                $password = $settings["username"]["value"] == $account ? $settings["password"]["value"] : $rowOcppSettings["chargePointId"];
                                $password = password_hash($password, PASSWORD_BCRYPT);

                                $stmt = $webconfigDB->prepare("UPDATE account SET password= :password WHERE username= :username");
                                $stmt->bindValue(':username', $account, SQLITE3_TEXT);
                                $stmt->bindValue(':password', $password, SQLITE3_TEXT);
                                $stmt->execute();

                                $stmt = $webconfigDB->prepare("UPDATE account SET forcedToLogin= :forcedToLogin WHERE username= :username");
                                $stmt->bindValue(":forcedToLogin", 'true', SQLITE3_TEXT);
                                $stmt->bindValue(':username', $account, SQLITE3_TEXT);
                                $stmt->execute();

                                $stmt = $webconfigDB->prepare("UPDATE account SET firstLogin= :firstLogin WHERE username= :username");
                                $stmt->bindValue(':firstLogin', 'true', SQLITE3_TEXT);
                                $stmt->bindValue(':username', $account, SQLITE3_TEXT);
                                $stmt->execute();
                            }
                        }
                    }
                }

            }else{
                $path = "";
                if(file_exists("/run/media/mmcblk1p3/webconfig.db")){
                    $path = "/run/media/mmcblk1p3/webconfig.db";
                }
                else{
                    $path = "/usr/lib/vestel/webconfig.db";
                }
                class dbForUserAccount extends SQLite3
                {
                    function __construct()
                    {
                        global $path;
                        $this->open($path);
                    }
                }

                try {
                    $accountWebconfigDB = new dbForUserAccount();
                    $accountWebconfigDB->busyTimeout(10000);


                    $stmt = $accountWebconfigDB->prepare("SELECT * FROM account WHERE username= :username");
                    $stmt->bindValue(':username', $account, SQLITE3_TEXT);
                    $resUserAccount = $stmt->execute();
                    $rowUserAccount = $resUserAccount->fetchArray();

                    $password = $rowUserAccount["password"];

                    if(!empty($password)){
                        $stmt = $webconfigDB->prepare("UPDATE account SET password= :password WHERE username= :username");
                        $stmt->bindValue(':username', $account, SQLITE3_TEXT);
                        $stmt->bindValue(':password', $password, SQLITE3_TEXT);
                        $stmt->execute();

                        $stmt = $webconfigDB->prepare("UPDATE account SET forcedToLogin= :forcedToLogin WHERE username= :username");
                        $stmt->bindValue(":forcedToLogin", 'true', SQLITE3_TEXT);
                        $stmt->bindValue(':username', $account, SQLITE3_TEXT);
                        $stmt->execute();

                        $stmt = $webconfigDB->prepare("UPDATE account SET firstLogin= :firstLogin WHERE username= :username");
                        $stmt->bindValue(':firstLogin', 'true', SQLITE3_TEXT);
                        $stmt->bindValue(':username', $account, SQLITE3_TEXT);
                        $stmt->execute();
                    }
                    $accountWebconfigDB->close();
                    unset($accountWebconfigDB);
                }
                catch (Error $e) {
                }

            }
        }
    }

    function searchModelCodes(){
        global $modelCode;

        $customerModelCodeArray = array("eon" => array("EVC04-E7-W-C","EVC04-E7-WCTPEN-S","EVC04-E7-WCTPEN-C","EVC04-E11-W-S",
        "EVC04-E11-W-C","EVC04-E11-WDM-S","EVC04-E11-WDM-C","EVC04-E11WDM-S","EVC04-E22-WLDM-S","EVC04-E22-WLDM-C","EVC04-E22-WLPDM-S",
        "EVC04-E22-WLPDM-C","EVC04-E22-WLDM-S(R)","EVC04-E22-WLDM-C(R)","EVC04-E7-W-S"));
        foreach ($customerModelCodeArray as $key => $value) {
            if(array_search($modelCode,$value)){
                return True;
            }

        }
        return False;
    }
    function isDifferent($defaultValue, $postValue) {
        return $defaultValue != $postValue;
    }

    function appendToChangeLog($changeLog,$log) {
        if ($changeLog) {
            $changeLog .= '|';
        }
        return $changeLog .= $log;
    }

    function scheduled_charging($mode, $page){
        $changeLog = "";
        global $webconfigDB,$publisher,$rowAccount,$rowGeneral,$rowOcppConfigurations,$private_charging_enable, $meterType;
        $operationMode = $_POST['operationModeSelection'];
        if($page == 'generalSettings'){
            if($rowAccount["type"] != "administrator" && searchModelCodes()){
                $randomisedDelayMaximumDuration =$rowGeneral['randomisedDelayMaximumDuration'];
            }else{
                $randomisedDelayMaximumDuration =$_POST['textRandomisedDelayMaximumDuration'];
            }
            if(isDifferent($rowGeneral["randomisedDelayMaximumDuration"],$randomisedDelayMaximumDuration)){
                $changeLog = appendToChangeLog($changeLog,"randomisedDelayMaximumDuration: ". $randomisedDelayMaximumDuration);
                $stmt = $webconfigDB->prepare("UPDATE generalSettings SET randomisedDelayMaximumDuration= :randomisedDelayMaximumDuration WHERE ID= :ID");
                $stmt->bindValue(':randomisedDelayMaximumDuration', $randomisedDelayMaximumDuration, SQLITE3_INTEGER);
                $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                $stmt->execute();

            }
            if($private_charging_enable || $meterType !== "EichrechtBauer"){
                $continueChargingWithoutReAuthenticationSelection = $_POST['continueChargingWithoutReAuthenticationSelection'];
                if(isDifferent($rowGeneral["continueChargingWithoutReauthAfterPowerLoss"],$continueChargingWithoutReAuthenticationSelection)){
                    $changeLog = appendToChangeLog($changeLog,"continueChargingWithoutReauthAfterPowerLoss: ". $continueChargingWithoutReAuthenticationSelection);
                        $stmt = $webconfigDB->prepare("UPDATE generalSettings SET continueChargingWithoutReauthAfterPowerLoss= :continueChargingWithoutReauthAfterPowerLoss WHERE ID= :ID");
                        $stmt->bindValue(':continueChargingWithoutReauthAfterPowerLoss', $continueChargingWithoutReAuthenticationSelection, SQLITE3_INTEGER);
                        $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                }
                if($continueChargingWithoutReAuthenticationSelection == 1){
                    $changeLog = appendToChangeLog($changeLog,"ContinueChargingAfterPowerLoss: TRUE");
                        $stmt = $webconfigDB->prepare("UPDATE ocppConfigurations SET ContinueChargingAfterPowerLoss= :ContinueChargingAfterPowerLoss WHERE id= :id");
                        $stmt->bindValue(':ContinueChargingAfterPowerLoss', 'TRUE', SQLITE3_TEXT);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                }else{
                    $changeLog = appendToChangeLog($changeLog,"ContinueChargingAfterPowerLoss: FALSE");
                        $stmt = $webconfigDB->prepare("UPDATE ocppConfigurations SET ContinueChargingAfterPowerLoss= :ContinueChargingAfterPowerLoss WHERE id= :id");
                        $stmt->bindValue(':ContinueChargingAfterPowerLoss', 'FALSE', SQLITE3_TEXT);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                }
            }
            if($mode == "ocppList" && strtoupper($rowOcppConfigurations["UKSmartChargingEnabled"]) == "FALSE"){
                $offPeakChargingSelection = $_POST['offPeakChargingSelection'];
                $changeLog = appendToChangeLog($changeLog,"ecoCharge: ". $offPeakChargingSelection);
                $stmt = $webconfigDB->prepare("UPDATE generalSettings SET ecoCharge= :ecoCharge WHERE ID= :ID");
                $stmt->bindValue(':ecoCharge', $offPeakChargingSelection, SQLITE3_INTEGER);
                $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                $stmt->execute();
                if($offPeakChargingSelection == 1){
                    $continueChargingEndOfSelection = $_POST['continueChargingEndOfSelection'];
                    $offPeakChargingWeekendSelection = $_POST['offPeakChargingWeekendSelection'];
                    $randomisedDelayAtOffPeakEndSelection = $_POST['randomisedDelayAtOffPeakEndSelection'];
                    $offPeakChargingSecondTimeInterval = $_POST['offPeakChargingSecondTimeInterval'];
                    if($rowAccount["type"] != "administrator" && searchModelCodes()){

                        $offPeakTimeZoneSelection = $rowGeneral['timeZone'];

                    }else{
                        $offPeakTimeZoneSelection = $_POST['offPeakTimeZoneSelection'];
                    }
                    //$offPeakChargingPeriods = $_POST['textOffPeakChargingPeriodsStart'].'-'.$_POST['textOffPeakChargingPeriodsEnd'].','.$_POST['textOffPeakChargingPeriodsOptionalStart'].'-'.$_POST['textOffPeakChargingPeriodsOptionalEnd'];
                    
                    $offPeakChargingPeriods = $_POST['textOffPeakChargingPeriodsStart'];
                    $offPeakChargingPeriods2 = $_POST['textOffPeakChargingPeriodsEnd'];
                    if($offPeakChargingSecondTimeInterval == 1){
                        $offPeakChargingPeriods3 = $_POST['textOffPeakChargingPeriodsOptionalStart'];
                        $offPeakChargingPeriods4 = $_POST['textOffPeakChargingPeriodsOptionalEnd'];
                    }else{
                        $offPeakChargingPeriods3 = '-';
                        $offPeakChargingPeriods4 = '-';
                    }
                    $stmt = $webconfigDB->prepare("UPDATE generalSettings SET ecoChargeWeekends= :ecoChargeWeekends WHERE ID= :ID");
                    $stmt->bindValue(':ecoChargeWeekends', $offPeakChargingWeekendSelection, SQLITE3_INTEGER);
                    $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                    $stmt = $webconfigDB->prepare("UPDATE generalSettings SET ecoChargeInterval= :ecoChargeInterval WHERE ID= :ID");
                    $stmt->bindValue(':ecoChargeInterval', $offPeakChargingPeriods, SQLITE3_TEXT);
                    $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                    $stmt = $webconfigDB->prepare("UPDATE generalSettings SET ecoChargeInterval2= :ecoChargeInterval2 WHERE ID= :ID");
                    $stmt->bindValue(':ecoChargeInterval2', $offPeakChargingPeriods2, SQLITE3_TEXT);
                    $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                    $stmt = $webconfigDB->prepare("UPDATE generalSettings SET ecoChargeInterval3= :ecoChargeInterval3 WHERE ID= :ID");
                    $stmt->bindValue(':ecoChargeInterval3', $offPeakChargingPeriods3, SQLITE3_TEXT);
                    $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                    $stmt = $webconfigDB->prepare("UPDATE generalSettings SET ecoChargeInterval4= :ecoChargeInterval4 WHERE ID= :ID");
                    $stmt->bindValue(':ecoChargeInterval4', $offPeakChargingPeriods4, SQLITE3_TEXT);
                    $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                    $stmt = $webconfigDB->prepare("UPDATE generalSettings SET continueChargingEndPeakInterval= :continueChargingEndPeakInterval WHERE ID= :ID");
                    $stmt->bindValue(':continueChargingEndPeakInterval', $continueChargingEndOfSelection, SQLITE3_INTEGER);
                    $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                    $stmt = $webconfigDB->prepare("UPDATE generalSettings SET timeZone= :timeZone WHERE ID= :ID");
                    $stmt->bindValue(':timeZone', $offPeakTimeZoneSelection, SQLITE3_TEXT);
                    $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                    $stmt = $webconfigDB->prepare("UPDATE generalSettings SET randomisedDelayAtOffPeakEnd= :randomisedDelayAtOffPeakEnd WHERE ID= :ID");
                    $stmt->bindValue(':randomisedDelayAtOffPeakEnd', $randomisedDelayAtOffPeakEndSelection, SQLITE3_INTEGER);
                    $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
            }
        }else if($mode != "ocppList" && ($page == 'ocppSettings' || $page == 'mainPage')){ // when ocppSettings is disabled, only eco charge is disabled
            if(isDifferent($rowGeneral["ecoCharge"],0)){
                $changeLog = appendToChangeLog($changeLog,"ecoCharge: 0");
                $stmt = $webconfigDB->prepare("UPDATE generalSettings SET ecoCharge= :ecoCharge WHERE ID= :ID");
                $stmt->bindValue(':ecoCharge', 0, SQLITE3_INTEGER);
                $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
        }else if($page == 'installationSettings' && ($operationMode == 2 || $operationMode == 3 || $operationMode == 4)){ // when operation mode is TIC, TIC without Peak / Off-Peak or Peak/Off-Peak, eco charge becomes to disabled
            if(isDifferent($rowGeneral["ecoCharge"],0)){
                $changeLog = appendToChangeLog($changeLog,"ecoCharge: 0");
                $stmt = $webconfigDB->prepare("UPDATE generalSettings SET ecoCharge= :ecoCharge WHERE ID= :ID");
                $stmt->bindValue(':ecoCharge', 0, SQLITE3_INTEGER);
                $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
        }
        $generalUpdateMessage = array("type" => "generalUpdate");
        $generalUpdateMessage = json_encode($generalUpdateMessage, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        if($changeLog){
            ChangeLog:: saveChangeLog($changeLog, $_SESSION["username"]);
        }
        $publisher->send($generalUpdateMessage);
    }
    function startsWith($haystack, $needle) {
        return strncmp($haystack, $needle, strlen($needle)) === 0;
    }
    //Save WLAN information
    if (isset($_POST["button_wlan_interfaces"])) {
        $wlan_option = $_POST['selectNetworkWLAN'];
        if($wlan_option == "wifiEnable" || $wlan_option == "wifiDisable"){
            $wlan_setting = new WlanSettings($webconfigDB);

            if (($_POST['selectNetworkWLAN']) == "wifiEnable") {
                $wlan_setting->saveWlanEnable($_POST);
            }
            else{
                $wlan_setting->saveWlanDisable();

            }
        }
    }

    //Save Cellular information
    if (isset($_POST["button_cellular_interfaces"])) {
        $cellular_action = $_POST['selectCellular'];
        if(in_array($cellular_action,["cellularEnable","cellularDisable"])){
            $cellular_settings = new CellularSettings($webconfigDB);
            if (($_POST['selectCellular']) == "cellularEnable") {   //Enable
                $cellular_settings->saveCellularEnable($_POST);
            } else {     //Disable
                $cellular_settings->saveCellularDisable();
            }
        }
        sendZeroMqMessage("interfacesUpdate");
    }

    //Save Cellular enable, Wlan disable
    if (isset($_POST["button_cellular_wlan"])) {
        $cellular_settings = new CellularSettings($webconfigDB);
        $cellular_settings->saveCellularEnableWlanDisable($_POST);
        sendZeroMqMessage("interfacesUpdate");
    }
    //Save Wlan enable, Cellular disable
    if (isset($_POST["button_wlan_cellular"])) {
        $wlan_option = $_POST['selectNetworkWLAN'];
        $wlan_setting = new WlanSettings($webconfigDB);
        $wlan_setting->saveWlanEnableCellularDisable($_POST);
        sendZeroMqMessage("interfacesUpdate");
    }

    //Save Wi-Fi Hotspot information
    if (isset($_POST["button_hotspot_interfaces"])) {  //Enable
        $hotspot_action = $_POST['selectWifiHotspot'];
        if(in_array($hotspot_action,["wifiHotspotEnable","wifiHotspotDisable"])){
            $hotspot_settings = new WifiHotspotSettings($webconfigDB,$rowWifiHotspotSettings["passwordLevel"]);
            if ($hotspot_action == "wifiHotspotEnable") {   //Enable
                $hotspot_settings->saveWifiHotspotEnable($_POST);
            } else {     //Disable
                $hotspot_settings->saveWifiHotspotDisable();
            }
        }
    }

    //Reboot device for hotspot settings
    if (isset($_POST["button_hotspot_reboot_now"])) {
        $hotspot_action = $_POST['selectWifiHotspot'];
        if(in_array($hotspot_action,["wifiHotspotEnable","wifiHotspotDisable"])){
            $hotspot_settings = new WifiHotspotSettings($webconfigDB,$rowWifiHotspotSettings["passwordLevel"]);
            if ($hotspot_action == "wifiHotspotEnable") {   //Enable
                $hotspot_settings->saveWifiHotspotEnable($_POST);
            } else {     //Disable
                $hotspot_settings->saveWifiHotspotDisable();
            }
        }
        if($hotspot_settings->getSuccessStation()){
            sendZeroMqMessageWithCommand("agentCommand","softReset");
        }

    }

    //Send Factory Reset
    if (isset($_POST["button_factory_default"])) {
        ChangeLog:: saveChangeLog("action: factoryReset", $_SESSION["username"]);
        sendZeroMqMessageWithCommand("agentCommand","factoryReset");

        unset($_SESSION["loginStatus"]);
    }
    if (isset($_POST["button_ocpp"])) {
        $mode = $rowStandaloneSettings["mode"];
        $ocpp_connection_selection = $_POST['selectOCPPConnection'];
        if($ocpp_connection_selection == "1"){
            $ocpp_settings = new OcppSettings($webconfigDB);
            $postOcppVersion = $_POST['selectOcppVersion'];
            $postCentralSystemAddress = $_POST["centralSystemAddress"];
            $postChargePointId = trim($_POST['chargePointId']);
            $ocpp_settings->saveOcppSettings($postOcppVersion,$postCentralSystemAddress,$postChargePointId);
            $ocpp_configurations = new OcppConfigurations($webconfigDB,$rowInstallationSettings["earthingType"],$private_charging_enable,$meterType);
            $ocpp_configurations->saveOcppConfigurations($_POST);

            $stmt = $webconfigDB->prepare("UPDATE authorizationMode SET mode= :mode WHERE id= :id");
            $stmt->bindValue(':mode', 'ocppList', SQLITE3_TEXT);
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $stmt->execute();
            $reset_required_parameter = $ocpp_settings->getresetRequiredParameter() || $ocpp_configurations->getresetRequiredParameter();
        }else{
            $stmt = $webconfigDB->prepare("UPDATE authorizationMode SET mode= :mode WHERE id= :id");
            $stmt->bindValue(':mode', NULL, SQLITE3_NULL);
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $stmt->execute();
        }

        if (($ocpp_connection_selection == 1 && $mode != "ocppList") || ($ocpp_connection_selection == 2 && $mode == "ocppList")) {
            sendZeroMqMessage("authenticationUpdate");
        }

        sendZeroMqMessageWithResetRequired("ocppUpdate",$reset_required_parameter);

        if($_POST['selectOCPPConnection'] == 2){
            scheduled_charging("",'ocppSettings');
        }
        else if ($mode != "ocppList" && $mode != "" && $mode != null) {
            sendZeroMqMessageWithCommand("agentCommand","softReset");
        }
    }

    if (isset($_POST["button_change_passwordSys"])) {
        if (file_exists("/var/lib/vestel/webconfig.db")) {

            $currentPassword = $_POST["currentPassSys"];
            $password = $_POST["passSys"];
            $repassword = $_POST["repassSys"];

            $stmt = $webconfigDB->prepare("SELECT password FROM account WHERE id= :id");
            $stmt->bindValue(':id', $currentUser, SQLITE3_INTEGER);
            $resPassword = $stmt->execute();
            $rowPassword = $resPassword->fetchArray();
            $dbCurrentPass = $rowPassword["password"];

            $password_settings = new PasswordSettings($webconfigDB,$rowAccount["passwordLevel"],$dbCurrentPass,$currentUser);
            $password_settings->savePassword($currentPassword,$password,$repassword);
        }
    }
    if (isset($_FILES['zipFile'])) {
        $errors = array();
        $file_name = $_FILES['zipFile']['name'];
        $file_size = $_FILES['zipFile']['size'];
        $file_tmp = $_FILES['zipFile']['tmp_name'];
        $file_type = $_FILES['zipFile']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['zipFile']['name'])));
        $file_path = "/var/lib/vestel/" . $file_name;
        $extensions = array("update");
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "Extension error.";
        }
        if ($file_size > 1000000000) {
            $errors[] = "Size error.";
        }
        if (empty($errors) == true && !file_exists($file_path)) {
            if (move_uploaded_file($file_tmp, $file_path)) {
                ChangeLog:: saveChangeLog("action: firmwareUpdate", $_SESSION["username"]);
                sendZeroMqMessageWithLocation("agentCommand","firmwareUpdate",$file_path);
            }
        }
    }

    if (isset($_FILES['imageFile'])) {
        $errors = array();
        $file_name = "logo.png";
        $file_tmp = $_FILES['imageFile']['tmp_name'];
        $file_type = $_FILES['imageFile']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['imageFile']['name'])));
        $file_path = "/var/lib/vestel/". $file_name ;
        list($width, $height) = getimagesize($file_tmp);
        $extensions = array("png");
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "Extension error.";
        }
        if ($width > 80 || $height > 80) {
            $errors[] = "Size error.";
        }
        if (empty($errors) == true) {
            if (move_uploaded_file($file_tmp, $file_path)) {
            }
            shell_exec('sync');
            $logoUpdateMessage = array("type" => "logoUpdate");
            $logoUpdateMessage = json_encode($logoUpdateMessage, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
            $publisher->send($logoUpdateMessage);
        }
    }

    //restore Config File
    if (isset($_FILES['configBackUpFile'])) {
        $stmt = $webconfigDB->prepare("SELECT * FROM dbInfo WHERE id= :id");
        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
        $dbDeviceInfo = $stmt->execute();
        $rowDbDeviceInfo = $dbDeviceInfo->fetchArray();
        $dbDeviceVersion = $rowDbDeviceInfo["dbVersion"];
        $errors = array();
        $file_name = $_FILES['configBackUpFile']['name'];
        $file_size = $_FILES['configBackUpFile']['size'];
        $file_tmp = $_FILES['configBackUpFile']['tmp_name'];
        $file_type = $_FILES['configBackUpFile']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['configBackUpFile']['name'])));
        $file_path = "/var/lib/vestel/" . $file_name;
        $extensions = array("bak");
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "Extension error.";
        }
        if ($file_size > 1000000000) {
            $errors[] = "Size error.";
        }
        if (empty($errors) == true) {
            if (
                $_FILES['configBackUpFile']['error'] == UPLOAD_ERR_OK
                && is_uploaded_file($_FILES['configBackUpFile']['tmp_name'])
            ) {
                $decrypt_command = "python3 /usr/lib/vestel/utils.py decrypt_file " . $_FILES['configBackUpFile']['tmp_name'];
                shell_exec($decrypt_command);
                $encoded_file = file_get_contents($_FILES['configBackUpFile']['tmp_name']);
                $ddlTxt =  utf8_decode(base64_decode($encoded_file));

                if (preg_match("/INSERT INTO dbInfo\s*\(\s*id,\s*dbVersion\s*\)\s*VALUES\s*\(\s*'\d+'\s*,\s*'(\d+)'\s*\)\s*;/i", $ddlTxt, $matches)) {
                    $dbBackUpVersion = $matches[1];
                } else {
                    error_log("dbVersion not found in backup ddlText.");
                }
                $tablesquery = "";

                if ($dbDeviceVersion >= $dbBackUpVersion) {
                    $insertQueries = "";
                    $queries = explode(";", $ddlTxt);
                    for ($i = 0; $i < sizeof($queries); $i++) {
                        if (strpos($queries[$i], "INTO") && !strpos($queries[$i], "dbInfo") && !strpos($queries[$i], "sqlite_sequence")) {
                            $insertQueries .= $queries[$i] . ';';
                        }
                    }
                    $tablesquery = $webconfigDB->query("SELECT name FROM sqlite_master WHERE type='table';");
                    while ($table = $tablesquery->fetchArray(SQLITE3_ASSOC)) {
                        if ($table['name'] != "sqlite_sequence" && $table['name'] != "dbInfo") {
                            $deleteSqlStatement = "DELETE FROM " . $table['name'];
                            $stmt = $webconfigDB->prepare($deleteSqlStatement);
                            $stmt->execute();
                        }
                    }
                    $webconfigDB->exec("BEGIN TRANSACTION;");
                    $insertQueriesArray = explode(";", $insertQueries);
                    foreach ($insertQueriesArray as $query) {
                        if (trim($query)) {
                            $stmt = $webconfigDB->prepare($query);
                            if ($stmt) {
                                $result = $stmt->execute();
                                if ($result === false) {
                                    error_log("Failed to execute query: " . $query . " Error: " . $webconfigDB->lastErrorMsg());
                                    $webconfigDB->exec("ROLLBACK;");
                                    break;
                                }
                            } else {
                                error_log("Failed to prepare query: " . $query . " Error: " . $webconfigDB->lastErrorMsg());
                                $webconfigDB->exec("ROLLBACK;");
                                break;
                            }
                        }
                    }
                    $webconfigDB->exec("COMMIT;");
                } else {
                    $isVersionControl = true;
?>
                    <script type="text/javascript">
                        versionCompare = true;
                    </script>
<?php
                }
                ChangeLog:: saveChangeLog("action: restoreConfigFile", $_SESSION["username"]);
                sendZeroMqMessage("rebootForUpdate");
            }
        }
    }
    //Hard Reset
    if (isset($_POST["button_hard_reset"])) {
        ChangeLog:: saveChangeLog("action: hardReset", $_SESSION["username"]);
        sendZeroMqMessageWithCommand("agentCommand", "hardReset");
    }
    //Soft Reset
    if (isset($_POST["button_soft_reset"])) {
        ChangeLog:: saveChangeLog("action: softReset", $_SESSION["username"]);
        sendZeroMqMessageWithCommand("agentCommand", "softReset");
    }


    //Save DLM Settings
    if (isset($_POST["button_load_management"])) {
        $load_management_settings = new LoadManagementSettings($webconfigDB,$rowInstallationSettings["powerOptimizer"],$ulType);
        $load_management_settings->saveLoadManagementSettings($_POST);
    }


    if (isset($_POST["button_loadmanagement_updatedlmgroup"])) {
        sendZeroMqMessage("dlmUpdateSlaveGroupRequest");

    }

    //For Saving earhingSystem Files
    if (isset($_POST["button_earthing_system"])) {
        $earthingSystem = $_POST['earthingSystemSelection'];
        $earthing_system_setting = new EarthingSystemSettings($webconfigDB,$rowOcppConfigurations["InstallationErrorEnable"]);
        $earthing_system_setting->saveEarthingSystem($earthingSystem);
    }

    if (isset($_POST["button_unbalanced_load_detection"])) {
        $unbalancedLoadDetection = new UnbalancedLoadDetection($webconfigDB,$maxCurrentValue,$meterType,$cableModel);
        $unbalancedLoadDetection->saveUnbalancedLoadDetection($_POST);
    }

    if (isset($_POST["button_external_enable_input"])) {
        $externalEnableInput = $_POST['externalEnableInputSelection'];
        $external_enable_input_setting = new ExternalEnableInputSettings($webconfigDB);
        $external_enable_input_setting->saveExternalEnableInput($externalEnableInput);

    }

    if (isset($_POST["button_lockable_cable"])) {
        $lockableCable = $_POST['lockableCableSelection'];
        $lockable_cable_setting = new LockableCableSettings($webconfigDB);
        $lockable_cable_setting->saveLockableCable($lockableCable);
    }
    if (isset($_POST["button_load_shedding_minimum_current"])) {
        $loadSheddingMinimumCurrentValue = $_POST['loadSheddingMinimumCurrentValueSelection'];
        $load_sheding_minimum_current = new LoadShedingMinimumCurrentSettings($webconfigDB,$rowInstallationSettings['currentLimiterValue']);
        $load_sheding_minimum_current->saveLoadShedingMinimumCurrent($loadSheddingMinimumCurrentValue);
    }

    if (isset($_POST["button_power_optimizer"])) {
        $powerOptimizerValue = $_POST['powerOptimizerSelection'];
        $powerOptimizerTotalCurrentValue = $_POST['powerOptimizerTotalCurrentSelection'];
        $powerOptimizerExternalMeterValue = $_POST['powerOptimizerExternalMeterSelection'];
        $operationModeValue =  $_POST['operationModeSelection'];
        $followTheSun = $_POST['followTheSunSelection'];
        $followTheSunMode = $_POST['followTheSunModeSelection'];

        $powerOptimizerExternalMeters = [];
        foreach ($powerOptimizerExternalMeterOptions as $value) {
            array_push($powerOptimizerExternalMeters,$value['id']);
        }

        $power_optimizer = new powerOptimizerSettings($webconfigDB,$powerOptimizerTotalCurrentValues,$powerOptimizerExternalMeters);
        if($followTheSun == 1){
            $power_optimizer->saveFollowTheSunMode($followTheSunMode);
            powerOptimizerSettings::saveAutoPhaseSwitching($_POST['autoPhaseSwitchingSelection'], $webconfigDB);
        }
        $power_optimizer->savePowerOptimizer($powerOptimizerValue,$powerOptimizerTotalCurrentValue,$powerOptimizerExternalMeterValue,$operationModeValue,$followTheSun,$followTheSunMode);
        scheduled_charging($rowStandaloneSettings["mode"],'installationSettings'); // when operation mode is TIC or Peak/Off-Peak, eco charge becomes to disabled
        sendZeroMqMessage("installationUpdate");
    }

    if (isset($_POST["button_current_limiter_settings"])) {
        if ($ulType == "UL50") {
            $currentLimiterPhase = $rowInstallationSettings["currentLimiterPhase"];
        } else {
            $currentLimiterPhase = $_POST['currentLimiterPhaseSelection'];
        }
        $currentLimiterValue = $_POST['currentLimiterValue'];
        $current_limiter_settings = new currentLimiterSettings($webconfigDB,$rowInstallationSettings["currentLimiterMinVal"],$rowInstallationSettings["currentLimiterMaxVal"], $chargePointStatus);
        $current_limiter_settings->saveCurrentLimiterSettings($currentLimiterPhase,$currentLimiterValue);
        if ($currentLimiterPhase == 0) {
            $autoPhaseSwitching = 0;
            powerOptimizerSettings::saveAutoPhaseSwitching($autoPhaseSwitching,$webconfigDB);
            // saveAutoPhaseSwitching added to ensure autoPhaseSwitching is disabled when Current Limiter is One Phase, as 0 represents the disabled state.
        }
    }
    //Preset Settings
    if (isset($_POST["button_preset"])) {

        $selectedPreset = $_POST["presetSelection"];
        if(in_array($selectedPreset,array_column($rowPresetsSettings, 'title'))){
            $stmt = $webconfigDB->prepare("SELECT * FROM presets WHERE presetName= :presetName");
            $stmt->bindValue(':presetName' , $selectedPreset, SQLITE3_TEXT);
            $presetSettings = $stmt->execute();
            $row = $presetSettings->fetchArray();

            $rowEnable = $row["enable"];
            $rowEthernet = $row["ethernet"];
            $rowWifi = $row["wifi"];
            $rowCellular = $row["cellular"];
            $rowApnName = $row["apnName"];
            $rowOcppUrl = $row["centralSystemAddress"];
            $rowAuth = $row["authorizationMode"];

            $stmt = $webconfigDB->prepare("UPDATE presets SET enable= :enable");
            $stmt->bindValue(':enable', 'false', SQLITE3_TEXT);
            $stmt->execute();
            $stmt = $webconfigDB->prepare("UPDATE presets SET enable= :enable WHERE presetName= :presetName");
            $stmt->bindValue(':enable', 'true', SQLITE3_TEXT);
            $stmt->bindValue(':presetName' , $selectedPreset, SQLITE3_TEXT);
            $stmt->execute();

            if ($rowWifi != "true" && $rowAuth != "autoStart") {
                $stmt = $webconfigDB->prepare("UPDATE ethernetSettings SET IPSetting= :IPSetting WHERE id= :id");
                $stmt->bindValue(':IPSetting', 'DHCP', SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }

            $stmt = $webconfigDB->prepare("UPDATE wifiSettings SET enable= :enable WHERE id= :id");
            $stmt->bindValue(':enable', $rowWifi, SQLITE3_TEXT);
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $stmt->execute();

            $stmt = $webconfigDB->prepare("UPDATE cellularSettings SET enable= :enable WHERE id= :id");
            $stmt->bindValue(':enable', $rowCellular, SQLITE3_TEXT);
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $stmt->execute();

            $stmt = $webconfigDB->prepare("UPDATE cellularSettings SET apnName= :apnName WHERE id= :id");
            $stmt->bindValue(':apnName', $rowApnName, SQLITE3_TEXT);
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $stmt->execute();

            $stmt = $webconfigDB->prepare("UPDATE ocppSettings SET centralSystemAddress= :centralSystemAddress WHERE id= :id");
            $stmt->bindValue(':centralSystemAddress', $rowOcppUrl, SQLITE3_TEXT);
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $stmt->execute();

            $stmt = $webconfigDB->prepare("UPDATE authorizationMode SET mode= :mode WHERE id= :id");
            $stmt->bindValue(':mode', $rowAuth, SQLITE3_TEXT);
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $stmt->execute();

            if ($rowAuth != "ocppList" ){
                scheduled_charging($rowAuth,"mainPage");
            }
            sendZeroMqMessage("authenticationUpdate");
            sendZeroMqMessage("interfacesUpdate");
            sendZeroMqMessageWithResetRequired("ocppUpdate",True);
        }

    }

    if (isset($_POST["button_general_qrCode"])) {
        $qrCode = new qrCodeSettings($webconfigDB,$rowGeneral["backlightDimmingLvl"]);
        $qrCode->saveQrCode($_POST);
    }

    if (isset($_POST["button_standby_led_behaviour"])) {
        $selectStandByLedBehaviour = $_POST['standByLedBehaviourSelection'];
        $standby_led_behaviour = new StandbyLedBehaviourSettings($webconfigDB);
        $standby_led_behaviour->saveStandByLedBehaviour($selectStandByLedBehaviour);
        sendZeroMqMessage("generalUpdate");
    }

    //Scheduled Charging
    if (isset($_POST["button_scheduled_charging"])) {
        scheduled_charging($rowStandaloneSettings["mode"],'generalSettings');

    }

    if (isset($_POST["button_logo_remove"])) {
        if (file_exists("/var/lib/vestel/logo.png")) {
            shell_exec("rm /var/lib/vestel/logo.png");
            shell_exec('sync');
            ChangeLog:: saveChangeLog("action: logoRemove", $_SESSION["username"]);
            sendZeroMqMessage("logoUpdate");
        }
    }

    $webconfigDB->close();
    unset($webconfigDB);

    if ($_POST || $_FILES) {
        if ($isVersionControl == false) {
            header("Location: " . "http://" . $_SERVER['HTTP_HOST']);
            exit();
        }
    }
    ?>
    <!-- php echo time(); function should be added at the end of css and js files -->
    <script src="js/jquery.js?<?php echo time(); ?>"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css?<?php echo time(); ?>">
    <script src="js/jquery-ui.js?<?php echo time(); ?>"></script>
    <script src="js/jquery.cookie.js?<?php echo time(); ?>"></script>
    <script src="js/webconfig.js?<?php echo time(); ?>"></script>
    <script src="js/main.js?<?php echo time(); ?>"></script>

    <?php ob_end_flush(); ?>
</body>

</html>
