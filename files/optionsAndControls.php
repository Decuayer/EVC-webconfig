<?php
include 'zmqHandler.php';
include_once "access_control.php";

    class Constants{
        public static $led_dimming_dictionary =  [
            1 => "veryLow",
            2 => "low",
            3 => "mid",
            4 => "high"
        ];

        public static $binary_options = [0,1];

        public static function check_ip_format($ip_address){
            $ip_regex = "/^\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3}$/";
            return preg_match($ip_regex, $ip_address);
        }

        public static function validate_ip_formats($ip_format_array){
            foreach($ip_format_array as $item){
                if(!self::check_ip_format($item)){
                    return False;
                }
            }
            return True;
        }

        public static function validate_empty_ip_format($ip_format_array){
            foreach($ip_format_array as $item){
                if (!empty($item) && !Constants::check_ip_format($item)) {
                    return False;
                }
            }
            return True;
        }

    }

    trait ChangeLogTrait {
        private function isDifferent($defaultValue, $postValue) {
            return $defaultValue != $postValue;
        }
    
        private function appendToChangeLog($log) {
            if ($this->changeLog) {
                $this->changeLog .= '|';
            }
            $this->changeLog .= $log;
        }
    }

    class DisplayLanguageSettings {
        use ChangeLogTrait;
        private $webconfigDB;
        private $displayLanguages;
        public $changeLog = "";

        public function __construct($dbConnection) {
            $this->webconfigDB = $dbConnection;
            $this->displayLanguages = array(
                "en", "tr", "fr", "de", "it", "ro", "es", "fi", "cz", "da", "he", "hu", "nl",
                "no", "pl", "sk", "sv", "bg", "gr", "me", "ba", "rs", "hr"
            );
        }

        public function saveDisplayLanguage($selectedLanguage) {
            $stmt = $this->webconfigDB->prepare("SELECT * FROM generalSettings WHERE id = :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $generalSettings = $stmt->execute();
            $rowGeneral = $generalSettings->fetchArray();
            if (in_array($selectedLanguage, $this->displayLanguages) && $this->isDifferent($rowGeneral["displayLanguage"],$selectedLanguage)){
                $this->appendToChangeLog("displayLanguage: " . $selectedLanguage);
                $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET displayLanguage = :displayLanguage WHERE id = :id");
                $stmt->bindValue(':displayLanguage', $selectedLanguage, SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }
        }
    }

    class DisplayBackLightDimmingSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        private $ledDimming;
        private $timeRegex;
        public $changeLog = "";

        public function __construct($dbConnection) {
            $this->webconfigDB = $dbConnection;
            $this->ledDimming = array("veryLow",
            "low","mid","high","timeBased","userInteraction");
            $this->timeRegex = "/^(?:2[0-4]|[01][1-9]|10):([0-5][0-9])$/";
        }

        public function saveBackLightDimming($backlightLevel,$sunrise=null,$sunset=null) {
            $stmt = $this->webconfigDB->prepare("SELECT * FROM generalSettings WHERE id = :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $generalSettings = $stmt->execute();
            $rowGeneral = $generalSettings->fetchArray();
            if(in_array($backlightLevel, $this->ledDimming) && $this->isDifferent($rowGeneral["backlightDimmingLvl"],$backlightLevel)){
                    $this->appendToChangeLog("backlightDimmingLvl: " . $backlightLevel);
                    $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET backlightDimmingLvl = :backlightLevel WHERE id = :id");
                    $stmt->bindValue(':backlightLevel', $backlightLevel, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
            }
            if($backlightLevel == "timeBased" && $sunrise != null && $sunset != null){
                if (preg_match($this->timeRegex, $sunrise) && preg_match($this->timeRegex, $sunset)){
                    if($this->isDifferent($rowGeneral["backlightDimmingSunrise"],$sunrise)){
                        $this->appendToChangeLog("backlightDimmingSunrise: " . $sunrise);
                        $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET backlightDimmingSunrise= :backlightDimmingSunrise WHERE id= :id");
                        $stmt->bindValue(':backlightDimmingSunrise', $sunrise, SQLITE3_TEXT);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                    }
                    if($this->isDifferent($rowGeneral["backlightDimmingSunset"],$sunset)){
                        $this->appendToChangeLog("backlightDimmingSunset: " . $sunset);
                        $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET backlightDimmingSunset= :backlightDimmingSunset WHERE id= :id");
                        $stmt->bindValue(':backlightDimmingSunset', $sunset, SQLITE3_TEXT);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                    }
                }
            }
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }
        }

    }

    class DisplayServiceContactInfoSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        private $displayServiceContactInfoRegex;
        private $showExtraServiceContactInfoOptions;
        public $changeLog = "";

        public function __construct($dbConnection) {
            $this->webconfigDB = $dbConnection;
            $this->displayServiceContactInfoRegex = "/^([@+.,* a-z0-9]){1,25}$/";
            $this->showExtraServiceContactInfoOptions = array(0,1);

        }

        public function saveServiceContactInfo($dipslayServiceContactInfo,$showExtraServiceContactInfo) {
            $stmt = $this->webconfigDB->prepare("SELECT * FROM generalSettings WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $generalSettings = $stmt->execute();
            $rowGeneral = $generalSettings->fetchArray();
            if(in_array($showExtraServiceContactInfo, $this->showExtraServiceContactInfoOptions) && $this->isDifferent($rowGeneral["showServiceContactInfoOnHmi"],$showExtraServiceContactInfo)){
                $this->appendToChangeLog("showServiceContactInfoOnHmi: " . $showExtraServiceContactInfo);
                $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET showServiceContactInfoOnHmi= :showServiceContactInfoOnHmi WHERE id= :id");
                $stmt->bindValue(':showServiceContactInfoOnHmi', $showExtraServiceContactInfo, SQLITE3_INTEGER);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
            if($dipslayServiceContactInfo == "" || preg_match($this->displayServiceContactInfoRegex, $dipslayServiceContactInfo)){
                if($this->isDifferent($rowGeneral["contactInfo"],$dipslayServiceContactInfo)){
                    $this->appendToChangeLog("contactInfo: " . $dipslayServiceContactInfo);
                    $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET contactInfo= :contactInfo WHERE id= :id");
                    $stmt->bindValue(':contactInfo', $dipslayServiceContactInfo, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
            }
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }
        }
    }

    class ThemeSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        private $themeSettingOptions;
        public $changeLog = "";

        public function __construct($dbConnection) {
            $this->webconfigDB = $dbConnection;
            $this->themeSettingOptions = array("darkblue","orange");

        }
        public function saveTheme($theme) {
            $stmt = $this->webconfigDB->prepare("SELECT * FROM generalSettings WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $generalSettings = $stmt->execute();
            $rowGeneral = $generalSettings->fetchArray();
            if(in_array($theme, $this->themeSettingOptions) && $this->isDifferent($rowGeneral["uiTheme"],$theme)){
                $this->appendToChangeLog("uiTheme: " . $theme);
                $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET uiTheme= :uiTheme WHERE id= :id");
                $stmt->bindValue(':uiTheme', $theme, SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $generalSettings = $stmt->execute();
            }
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }
        }
        
    }

    class LedDimmingSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        private $ledDimmingOptions;
        private $timeRegex;
        public $changeLog = "";

        public function __construct($dbConnection) {
            $this->webconfigDB = $dbConnection;
            $this->ledDimmingOptions = ["veryLow",
            "low","mid","high","timeBased"];
            $this->timeRegex = "/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/";
        }

        public function saveLedDimming($ledDimmingLevel,$sunrise=null,$sunset=null) {
            $stmt = $this->webconfigDB->prepare("SELECT * FROM generalSettings WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $generalSettings = $stmt->execute();
            $rowGeneral = $generalSettings->fetchArray();
            if(in_array($ledDimmingLevel, $this->ledDimmingOptions) && $this->isDifferent($rowGeneral["ledDimmingLevel"],$ledDimmingLevel)){
                $this->appendToChangeLog("ledDimmingLevel: " . $ledDimmingLevel);
                $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET ledDimmingLevel= :ledDimmingLevel WHERE id= :id");
                $stmt->bindValue(':ledDimmingLevel', $ledDimmingLevel, SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
                if(in_array($ledDimmingLevel, array_values(Constants::$led_dimming_dictionary))){
                    $light_intensity = array_search ($ledDimmingLevel, Constants::$led_dimming_dictionary);
                    if($light_intensity !==false){
                        $this->appendToChangeLog("LightIntensity: " . $light_intensity);
                        $stmt = $this->webconfigDB->prepare("UPDATE ocppConfigurations SET LightIntensity= :LightIntensity WHERE id= :id");
                        $stmt->bindValue(':LightIntensity', $light_intensity, SQLITE3_TEXT);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                        sendZeroMqMessage("ocppUpdate");
                    }
                }
            }
            if($ledDimmingLevel == "timeBased" && $sunrise != null && $sunset != null){
                if (preg_match($this->timeRegex, $sunrise) && preg_match($this->timeRegex, $sunset)){
                    if($this->isDifferent($rowGeneral["ledDimmingSunrise"],$sunrise)){
                        $this->appendToChangeLog("ledDimmingSunrise: " . $sunrise);
                        $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET ledDimmingSunrise= :ledDimmingSunrise WHERE id= :id");
                        $stmt->bindValue(':ledDimmingSunrise', $sunrise, SQLITE3_TEXT);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                    }
                    if($this->isDifferent($rowGeneral["ledDimmingSunset"],$sunset)){
                        $this->appendToChangeLog("ledDimmingSunset: " . $sunset);
                        $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET ledDimmingSunset= :ledDimmingSunset WHERE id= :id");
                        $stmt->bindValue(':ledDimmingSunset', $sunset, SQLITE3_TEXT);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                    }
                }
            }
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }
        }
    }

    class StandaloneModeSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        public $changeLog = "";

        public function __construct($dbConnection) {
            $this->webconfigDB = $dbConnection;
        }
        public function setStandaloneMode($selectedMode,$listArray){
            $stmt = $this->webconfigDB->prepare("SELECT * FROM authorizationMode WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $standaloneSettings = $stmt->execute();
            $rowStandaloneSettings = $standaloneSettings->fetchArray();
            if ($selectedMode == "localList"){
                $this->updateLocalListMode($listArray, $rowStandaloneSettings);
            }else if($this->isDifferent($rowStandaloneSettings["mode"],$selectedMode)){
                $this->updateStandaloneMode($selectedMode);
            }
            $this->sendStandaloneUpdateMessage();
            if($this->isOcppListMode()){
                $this->sendSoftResetCommand();
            }
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }
        }
        private function updateLocalListMode($listArray,$rowStandaloneSettings){
            $dbList = $listArray;
            $listArray = explode(",", $listArray);
            if($this->isDifferent($rowStandaloneSettings["mode"],$selectedMode)){
                $this->appendToChangeLog("mode: 'localList");
                $stmt = $this->webconfigDB->prepare("UPDATE authorizationMode SET mode= :mode WHERE id= :id");
                $stmt->bindValue(':mode', 'localList', SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
            if($this->isDifferent($rowStandaloneSettings["localList"],$dbList)){
                $this->appendToChangeLog("localList: " . $dbList);
                $stmt = $this->webconfigDB->prepare("UPDATE authorizationMode SET localList= :localList WHERE id= :id");
                $stmt->bindValue(':localList', $dbList, SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
        }

        private function updateStandaloneMode($mode){
            $this->appendToChangeLog("mode: " . $mode);
            $stmt = $this->webconfigDB->prepare("UPDATE authorizationMode SET mode= :mode WHERE id= :id");
            $stmt->bindValue(':mode', $mode, SQLITE3_TEXT);
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $stmt->execute();
            $stmt = $this->webconfigDB->prepare("UPDATE authorizationMode SET localList= :localList WHERE id= :id");
            $stmt->bindValue(':localList', '', SQLITE3_TEXT);
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $stmt->execute();
        }

        private function sendStandaloneUpdateMessage(){
            sendZeroMqMessage("authenticationUpdate");
        }

        private function isOcppListMode(){
            $stmt = $this->webconfigDB->prepare("SELECT mode FROM authorizationMode WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $resAuthorizationMode = $stmt->execute();
            $rowAuthorizationMode = $resAuthorizationMode->fetchArray();
            if($rowAuthorizationMode["mode"] == "ocppList"){
                return True;
            }
            return False;
        }

        private function sendSoftResetCommand(){
            $this->appendToChangeLog("action: softReset");
            sendZeroMqMessageWithCommand("agentCommand","softReset");
        }

    }

    class NetworkSettings{
        public static function encrypt_text($text_to_encrypt) {
            $key_file = '/usr/lib/vestel/aes-password-key.txt';
            $command = "python3 /usr/lib/vestel/utils.py encrypt_text " . escapeshellarg($text_to_encrypt) . " " . escapeshellarg($key_file);
            $encrypted_text = shell_exec($command);
            return trim($encrypted_text, "\n");
        }
    }

    class EthernetSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        private $cellularGateway;
        public $changeLog = "";
        public function __construct($dbConnection,$cellularGateway) {
            $this->webconfigDB = $dbConnection;
            $this->cellularGateway = $cellularGateway;
        }
        public function saveStaticEthernet($postData)
        {
            $stmt = $this->webconfigDB->prepare("SELECT * FROM ethernetSettings WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $lanSettings = $stmt->execute();
            $rowLanSettings = $lanSettings->fetchArray();
            
            $ip_address = $postData["IPadress"];
            $network_mask = $postData["networkMask"];
            $gateway = $postData["defaultGateway"];
            $primary_DNS = $postData["primaryDns"];
            $secondary_DNS = $postData["secondaryDns"];
            $ip_validation_flag = True;
            $arbitrary_ip_array = [$ip_address,$network_mask];
            $temporary_ip_array = [$gateway,$primary_DNS,$secondary_DNS];

            if(!Constants::validate_ip_formats($arbitrary_ip_array)){
                return False;
            }
            if(!Constants::validate_empty_ip_format($temporary_ip_array)){
                return False;
            }
            if($this->isCellularGateway($this->cellularGateway)){
                $this->setFalseToCellularGateway();
            }
            if($this->isDifferent($rowLanSettings["IPSetting"],"Static")){
                $this->appendToChangeLog("IPSetting: Static");
                $stmt = $this->webconfigDB->prepare("UPDATE ethernetSettings SET IPSetting= :IPSetting WHERE id= :id");
                $stmt->bindValue(':IPSetting', 'Static', SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
            if($this->isDifferent($rowLanSettings["IPAddress"],$ip_address)){
                $this->appendToChangeLog("IPAddress: ". $ip_address);
                $stmt = $this->webconfigDB->prepare("UPDATE ethernetSettings SET IPAddress= :IPAddress WHERE id= :id");
                $stmt->bindValue(':IPAddress', $ip_address, SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
            if($this->isDifferent($rowLanSettings["networkMask"],$network_mask)){
                $this->appendToChangeLog("networkMask: ". $network_mask);
                $stmt = $this->webconfigDB->prepare("UPDATE ethernetSettings SET networkMask= :network_mask WHERE id= :id");
                $stmt->bindValue(':network_mask', $network_mask, SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
            if($this->isDifferent($rowLanSettings["gateway"],$gateway)){
                $this->appendToChangeLog("gateway: ". $gateway);
                $stmt = $this->webconfigDB->prepare("UPDATE ethernetSettings SET gateway= :gateway WHERE id= :id");
                $stmt->bindValue(':gateway', $gateway, SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
            if($this->isDifferent($rowLanSettings["primaryDNS"],$primary_DNS)){
                $this->appendToChangeLog("primaryDNS: ". $primary_DNS);
                $stmt = $this->webconfigDB->prepare("UPDATE ethernetSettings SET primaryDNS= :primary_DNS WHERE id= :id");
                $stmt->bindValue(':primary_DNS', $primary_DNS, SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
            if($this->isDifferent($rowLanSettings["secondaryDNS"],$secondary_DNS)){
                $this->appendToChangeLog("secondaryDNS: ". $secondary_DNS);
                $stmt = $this->webconfigDB->prepare("UPDATE ethernetSettings SET secondaryDNS= :secondary_DNS WHERE id= :id");
                $stmt->bindValue(':secondary_DNS', $secondary_DNS, SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }
            sendZeroMqMessage("interfacesUpdate");

        }
        public function saveDhcpServer($postData)
        {
            $stmt = $this->webconfigDB->prepare("SELECT * FROM ethernetSettings WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $lanSettings = $stmt->execute();
            $rowLanSettings = $lanSettings->fetchArray();

            $max_range = $_POST["maxDHCPAddrRange"];
            $min_range = $_POST["minDHCPAddrRange"];
            $ip_address = $_POST["IPadress"];
            $network_mask = $_POST["networkMask"];
            $gateway = $_POST["defaultGateway"];
            $primary_dns = $_POST["primaryDns"];
            $secondary_dns = $_POST["secondaryDns"];
            if(Constants::validate_ip_formats($ip_format_array)){
                if($this->isDifferent($rowLanSettings["IPSetting"],"DHCPServer")){
                    $this->appendToChangeLog("IPSetting: ". "DHCPServer");
                    $stmt = $this->webconfigDB->prepare("UPDATE ethernetSettings SET IPSetting= :IPSetting WHERE id= :id");
                    $stmt->bindValue(':IPSetting', 'DHCPServer', SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this->isDifferent($rowLanSettings["dhcpRangeEnd"],$max_range)){
                    $this->appendToChangeLog("dhcpRangeEnd: ". $max_range);
                    $stmt = $this->webconfigDB->prepare("UPDATE ethernetSettings SET dhcpRangeEnd= :dhcpRangeEnd WHERE id= :id");
                    $stmt->bindValue(':dhcpRangeEnd', $max_range, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this->isDifferent($rowLanSettings["dhcpRangeStart"],$min_range)){
                    $this->appendToChangeLog("dhcpRangeStart: ". $min_range);
                    $stmt = $this->webconfigDB->prepare("UPDATE ethernetSettings SET dhcpRangeStart= :dhcpRangeStart WHERE id= :id");
                    $stmt->bindValue(':dhcpRangeStart', $min_range, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this->isDifferent($rowLanSettings["IPAddress"],$ip_address)){
                    $this->appendToChangeLog("IPAddress: ". $ip_address);
                    $stmt = $this->webconfigDB->prepare("UPDATE ethernetSettings SET IPAddress= :IPAddress WHERE id= :id");
                    $stmt->bindValue(':IPAddress', $ip_address, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this->isDifferent($rowLanSettings["networkMask"],$network_mask)){
                    $this->appendToChangeLog("networkMask: ". $network_mask);
                    $stmt = $this->webconfigDB->prepare("UPDATE ethernetSettings SET networkMask= :networkMask WHERE id= :id");
                    $stmt->bindValue(':networkMask', $network_mask, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this->isDifferent($rowLanSettings["gateway"],$gateway)){
                    $this->appendToChangeLog("gateway: ". $gateway);
                    $stmt = $this->webconfigDB->prepare("UPDATE ethernetSettings SET gateway= :gateway WHERE id= :id");
                    $stmt->bindValue(':gateway', $gateway, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this->isDifferent($rowLanSettings["primaryDNS"],$primary_DNS)){
                    $this->appendToChangeLog("primaryDNS: ". $primary_DNS);
                    $stmt = $this->webconfigDB->prepare("UPDATE ethernetSettings SET primaryDNS= :primaryDNS WHERE id= :id");
                    $stmt->bindValue(':primaryDNS', $primary_DNS, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this->isDifferent($rowLanSettings["secondaryDNS"],$secondary_DNS)){
                    $this->appendToChangeLog("secondaryDNS: ". $secondary_DNS);
                    $stmt = $this->webconfigDB->prepare("UPDATE ethernetSettings SET secondaryDNS= :secondaryDNS WHERE id= :id");
                    $stmt->bindValue(':secondaryDNS', $secondary_DNS, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this-> changeLog){
                    ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
                }
                sendZeroMqMessage("interfacesUpdate");
            }
        }
        public function saveDhcpClient($postData)
        {
            if($this->isCellularGateway($this->cellularGateway)){
                $this->setFalseToCellularGateway();
            }
            $this->appendToChangeLog("IPSetting: DHCP");
            $stmt = $this->webconfigDB->prepare("UPDATE ethernetSettings SET IPSetting= :IPSetting WHERE id= :id");
            $stmt->bindValue(':IPSetting', 'DHCP', SQLITE3_TEXT);
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $stmt->execute();
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }
            sendZeroMqMessage("interfacesUpdate");
        }

        private function isCellularGateway($gatewayValue){
            return ($gatewayValue) ? true:false;
        }

        private function setFalseToCellularGateway(){
            $this->appendToChangeLog("cellularGateway: false");
            $stmt = $this->webconfigDB->prepare("UPDATE cellularSettings SET cellularGateway= :cellularGateway WHERE id= :id");
            $stmt->bindValue(':cellularGateway', 'false', SQLITE3_TEXT);
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $stmt->execute();
        }
    }

    class WlanSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        public $changeLog = "";
        public $wlanSettings;
        public $rowWlan;
        public function __construct($dbConnection) {
            $this->webconfigDB = $dbConnection;
            $stmt = $this->webconfigDB->prepare("SELECT * FROM wifiSettings WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $this->wlanSettings = $stmt->execute();
            $this->rowWlan = $this->wlanSettings->fetchArray();
        }


        public function saveWlanEnable($postData){
            $ssid = $this->webconfigDB->escapeString($postData["wifiSSID"]);
            $password = $this->rowWlan["password"];
            if(empty($postData["wifiPassword"])) {
                $password = $postData["wifiPassword"];
            } else {
                if($postData["wifiPassword"] != "******"){
                    if($this->isDifferent($this->rowWlan["password"],$postData["wifiPassword"])){
                        $password = NetworkSettings::encrypt_text($postData["wifiPassword"]);
                    }
                }
            }
            $security = $postData["selectSecurity"];
            $ipSetting = $postData['selectWifiIPSetting'];
            if($ipSetting == "1"){
                $static_arbitrary_ip_fields = ["IPAddress" => $postData["wifiIPaddress"],
                    "networkMask"=>$postData["wifiNetworkMask"]
                ];
                $static_tempory_ip_fields = [
                "gateway"=>$postData["wifiDefaultGateway"],
                "primaryDNS"=>$postData["wifiPrimaryDns"],
                "secondaryDNS"=>$postData["wifiSecondaryDns"]
                ];
                if(!Constants::validate_ip_formats(array_values($static_arbitrary_ip_fields))){
                    return False;
                }
                if(!Constants::validate_empty_ip_format(array_values($static_tempory_ip_fields))){
                    return False;
                }
                if(!$this->check_main_field($ssid,$password,$security)){
                    return False;
                }
                $this->set_ip_setting('Static');
                $this->set_wlan_main_field($ssid,$password,$security);
                $static_ip_fields = array_merge($static_arbitrary_ip_fields,$static_tempory_ip_fields);
                $this->update_static_ip_fields($static_ip_fields);
                
                if($this-> changeLog){
                    ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
                }
                sendZeroMqMessage("interfacesUpdate");

            }elseif($ipSetting == "2"){
                if($this->check_main_field($ssid,$password,$security)){
                    $this->set_ip_setting('DHCP');
                    $this->set_wlan_main_field($ssid,$password,$security);
                    if($this-> changeLog){
                        ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
                    }
                    sendZeroMqMessage("interfacesUpdate");
                }
            }
        }

        public function saveWlanDisable(){
            if($this->isDifferent($this->rowWlan["enable"],"false")){
                $this->appendToChangeLog("enable: false");
                $stmt = $this->webconfigDB->prepare("UPDATE wifiSettings SET enable= :enable WHERE id= :id");
                $stmt->bindValue(':enable', 'false', SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
                if($this-> changeLog){
                    ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
                }
                sendZeroMqMessage("interfacesUpdate");
            }
        }

        public function saveWlanEnableCellularDisable($postData){
            $stmt = $this->webconfigDB->prepare("SELECT * FROM cellularSettings WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $cellularSettings = $stmt->execute();
            $rowCellular = $cellularSettings->fetchArray();

            $this->saveWlanEnable($postData);
            if($this->isDifferent($rowCellular["enable"],"false")){
                $this->appendToChangeLog("cellularEnable: false");
                $stmt = $this->webconfigDB->prepare("UPDATE cellularSettings SET enable= :enable WHERE id= :id");
                $stmt->bindValue(':enable', 'false', SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }

        }

        private function set_ip_setting($value){
            if($this->isDifferent($this->rowWlan["IPSetting"],$value)){
                $this->appendToChangeLog("IPSetting: ".$value);
                $stmt = $this->webconfigDB->prepare("UPDATE wifiSettings SET IPSetting= :IPSetting WHERE id= :id");
                $stmt->bindValue(':IPSetting', $value, SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }

        }


        private function check_main_field($ssid,$password,$security){
            if(!in_array($security, ["none","WPA"])){
                return False;
            }
            if(empty($ssid)){
                return False;
            }
            if($security == "WPA" && empty($password)){
                return False;
            }
            return True;
        }

        private function set_wlan_main_field($ssid,$password,$security){
            if($this->isDifferent($this->rowWlan["enable"],"true")){
                $this->appendToChangeLog("enable: true");
                $stmt = $this->webconfigDB->prepare("UPDATE wifiSettings SET enable= :enable WHERE id= :id");
                $stmt->bindValue(':enable', 'true', SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
            if($this->isDifferent($this->rowWlan["ssid"],$ssid)){
                $this->appendToChangeLog("ssid: ".$ssid);
                $stmt = $this->webconfigDB->prepare("UPDATE wifiSettings SET ssid= :ssid WHERE id= :id");
                $stmt->bindValue(':ssid', $ssid, SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
            if($this->isDifferent($this->rowWlan["password"],$password)){
                $this->appendToChangeLog("password: "."*****");
                $stmt = $this->webconfigDB->prepare("UPDATE wifiSettings SET password= :password WHERE id= :id");
                $stmt->bindValue(':password', $password, SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
            if($this->isDifferent($this->rowWlan["securityType"],$security)){
                $this->appendToChangeLog("securityType: ".$security);
                $stmt = $this->webconfigDB->prepare("UPDATE wifiSettings SET securityType= :securityType WHERE id= :id");
                $stmt->bindValue(':securityType', $security, SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
        }
        private function update_static_ip_fields($static_ip_fields){
            foreach($static_ip_fields as $key => $value){
                if($this->isDifferent($this->rowWlan[$key],$value)){
                    $this->appendToChangeLog($key.": ".$value);
                    $stmt = $this->webconfigDB->prepare("UPDATE wifiSettings SET $key= :value WHERE id= :id");
                    $stmt->bindValue(':value', $value, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
            }
        }



    }

    class CellularSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        public $changeLog = "";
        public $rowCellularSettings;
        public function __construct($dbConnection) {
            $this->webconfigDB = $dbConnection;
            $stmt = $this->webconfigDB->prepare("SELECT * FROM cellularSettings WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $cellularSettings = $stmt->execute();
            $this->rowCellularSettings = $cellularSettings->fetchArray();
            
        }

        public function saveCellularEnable($postData){
            $apnPassword = $this->rowCellularSettings["apnPassword"];
            if(empty($postData["apnPassword"])) {
                $apnPassword = $postData["apnPassword"];
            } else {
                if($postData["apnPassword"] != "******"){
                    if($this->isDifferent($this->rowCellularSettings["apnPassword"],$postData["apnPassword"])){
                        $apnPassword = NetworkSettings::encrypt_text($postData["apnPassword"]);
                    }
                }
            }
            $simPin = $this->rowCellularSettings["simPin"];
            if(empty($postData["simPin"])) {
                $simPin = $postData["simPin"];
            } else {
                if($postData["simPin"] != "******"){
                    if($this->isDifferent($this->rowCellularSettings["simPin"],$postData["simPin"])){
                        $simPin = NetworkSettings::encrypt_text($postData["simPin"]);
                    }
                }
            }
            $cellular_fields = ["enable"=>'true',
            "apnName" => $postData["apn"],
            "apnUsername"=>$postData["apnUserName"],
            "apnPassword"=>$apnPassword,
            "simPin"=>$simPin,
            "cellularGateway"=>$postData["selectLTEGateway"]
            ];
            $this->updateCellularFields($cellular_fields);
            if($cellular_fields["cellularGateway"] == "true"){
                $this->appendToChangeLog("IPSetting: DHCPServer");
                $stmt = $this->webconfigDB->prepare("UPDATE ethernetSettings SET IPSetting= :IPSetting WHERE id= :id");
                $stmt->bindValue(':IPSetting', 'DHCPServer', SQLITE3_TEXT);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }
        }

        public function saveCellularDisable(){
            $cellular_fields = ["enable"=>'false',
            "cellularGateway" => 'false'
            ];
            $this->updateCellularFields($cellular_fields);
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }
        }

        public function saveCellularEnableWlanDisable($postData){
            $this->saveCellularEnable($postData);
            $this->appendToChangeLog("wifiSettingsEnable: false");
            $stmt = $this->webconfigDB->prepare("UPDATE wifiSettings SET enable= :enable WHERE id= :id");
            $stmt->bindValue(':enable', 'false', SQLITE3_TEXT);
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $stmt->execute();
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }

        }

        private function updateCellularFields($cellular_fields){
            $stmt = $this->webconfigDB->prepare("SELECT * FROM cellularSettings WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $cellularSettings = $stmt->execute();
            $this->rowCellularSettings = $cellularSettings->fetchArray();
            foreach($cellular_fields as $key => $value){
                if($this->isDifferent($this->rowCellularSettings[$key],$value)){
                    $stmt = $this->webconfigDB->prepare("UPDATE cellularSettings SET $key= :value WHERE id= :id");
                    $stmt->bindValue(':value', $value, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                    $value = ($key == "apnPassword" ||$key == "simPin") ? "*****" : $value;
                    $this->appendToChangeLog($key.": ". $value);

                }
            }
        }
    }

    class WifiHotspotSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        private $password_level;
        private $success_station;
        public $changeLog = "";
        public $rowWifiHotspotSettings;
        public function __construct($dbConnection,$password_level) {
            $this->webconfigDB = $dbConnection;
            $this->password_level = $password_level;
            $this->success_station = False;
            $stmt = $this->webconfigDB->prepare("SELECT * FROM wifiHotspotSettings WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $wifiHotspotSettings = $stmt->execute();
            $this->rowWifiHotspotSettings = $wifiHotspotSettings->fetchArray();
        }
        public function saveWifiHotspotEnable($postData){
            $password = $this->rowWifiHotspotSettings["password"];
            if(empty($postData["wifiHotspotPassword"])) {
                $password = $postData["wifiHotspotPassword"];
            } else {
                
                if($postData["wifiHotspotPassword"] != "******"){

                    if($this->isDifferent($this->rowWifiHotspotSettings["password"],$postData["wifiHotspotPassword"])){
                        $password = NetworkSettings::encrypt_text($postData["wifiHotspotPassword"]);
                    }
                }
            }
            $hotspot_fields = ["enable"=>'true',
            "timeout" => $postData["selectWifiHotspotTimeout"],
            "ssid"=>$postData["wifiHotspotSSID"],
            "password"=>$password,
            "autoTurnOff"=>$postData["selectWifiHotspotAutoTurnOff"]
            ];
            if($this->checkAutoTurnOff($hotspot_fields["autoTurnOff"], $hotspot_fields) && $this->checkSsid($hotspot_fields["ssid"]) && !$this->checkPassword($hotspot_fields["password"])){
                $this->updateWifiHotspotFields($hotspot_fields);
                $this->setSuccessStation(True);
                if($this-> changeLog){
                    ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
                }
            }
        }

        public function saveWifiHotspotDisable(){
            $hotspot_fields = ["enable"=>'false'];
            $this->updateWifiHotspotFields($hotspot_fields);
            $this->setSuccessStation(True);
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }
        }

        private function updateWifiHotspotFields($hotspot_fields){
            $stmt = $this->webconfigDB->prepare("SELECT * FROM wifiHotspotSettings WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $wifiHotspotSettings = $stmt->execute();
            $this->rowWifiHotspotSettings = $wifiHotspotSettings->fetchArray();
            $this->webconfigDB->exec('BEGIN');
            foreach($hotspot_fields as $key => $value){
                if($this->isDifferent($this->rowWifiHotspotSettings[$key],$value)){
                    $stmt = $this->webconfigDB->prepare("UPDATE wifiHotspotSettings SET $key= :value WHERE id= :id");
                    $stmt->bindValue(':value', $value, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                    $value = $key == "password" ? "*****" : $value;
                    $this->appendToChangeLog($key.": ". $value);
                }
            }
            $this->webconfigDB->exec('COMMIT');
        }

        private function checkAutoTurnOff($status, $hotspot_fields){
            if($status == 'true'){
                return $this->checkTimeout($hotspot_fields["timeout"]) ? true : false;
            }
            else{
                return true;
            }
        }

        private function checkTimeout($timeout){
            $valid_timeouts = [5,10,15,20,25,30];
            return in_array($timeout,$valid_timeouts) ? true : false;
        }

        private function checkSsidCharacter($ssid){
            return preg_match('/^[\x20-\x7F]+$/', $ssid) === 1 ? true : false;
        }

        private function checkSsidSpecialCharacter($ssid){
            return (strpos($ssid, "'") !== false || strpos($ssid, '"') !== false || strpos($ssid, "\\") !== false) ? false : true;
        }

        private function checkSsid($ssid){
            if(!empty($ssid) && $this->checkSsidCharacter($ssid) && $this->checkSsidSpecialCharacter($ssid)){
                return True;
            }
            return False;
        }

        private function checkPassword($wifiHotspotPassword){
                // Validate based on the selected hotspotPasswordLevel
            if ($this->password_level == 1) {
                // Level 1 validation
                $trimmedPassword = trim($wifiHotspotPassword);
                if (!empty($trimmedPassword) && !preg_match('/^[\x20-\x7F]{8,63}$/', $trimmedPassword)) {
                    return false; // Password does not meet level 1 criteria
                }
            } elseif ($this->password_level == 2) {
                // Level 2 validation
                $trimmedPassword = trim($wifiHotspotPassword);
                if (!empty($trimmedPassword) && (
                    !preg_match('/^(?=^.{20}$)(?=(.*\d){2})(?=(.*[A-Za-z]){2})(?=(.*[!%&\/()=?\*#+\-_]){2}).*$/', $trimmedPassword) === 0 ||
                    !preg_match('/^[ A-Za-z0-9!%&\/()=?\*#+\-_]*$/', $trimmedPassword)
                )) {
                    return false; // Password does not meet level 2 criteria
                }
            } elseif ($this->password_level == 3) {
                // Level 3 validation
                if (
                    !preg_match('/^(?=^.{12,32}$)(?=(.*\d){2})(?=(.*[A-Z]){2})(?=(.*[a-z]){2})(?=(.*[!%&\/()=?\*#+\-_]){2}).*$/', $wifiHotspotPassword) === 0 ||
                    !preg_match('/^[ A-Za-z0-9!%&\/()=?\*#+\-_]*$/', $wifiHotspotPassword)
                ) {
                    return false; // Password does not meet level 3 criteria
                }
            }
            return false; // If no matching level, return false
        }

        public function setSuccessStation($station){
            $this->success_station = $station;

        }

        public function getSuccessStation(){
            return $this->success_station;
        }

    }

    class OcppSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        public $changeLog = "";
        private $resetRequiredParameter = False;
        public function __construct($dbConnection) {
            $this->webconfigDB = $dbConnection;

        }

        public function saveOcppSettings($ocppVersion,$centralSystemAddress,$chargePointId){
            $stmt = $this->webconfigDB->prepare("SELECT * FROM ocppSettings WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $ocppSettings = $stmt->execute();
            $rowOcppSettings = $ocppSettings->fetchArray();
            if(!empty($ocppVersion) && !empty($centralSystemAddress) && !empty($chargePointId)){
                $chargePointId = trim($chargePointId);
                $tempChargePoint = $chargePointId;
                $final = "";
                for ($i = 0; $i < strlen($chargePointId); $i++) {
                    $temp = ord($tempChargePoint[$i]);
                    //Comparison of ASCII values. [48-57] => 0-9, [65-90] => [A-Z]
                    if ($temp > 47 && $temp < 58)
                        $final = $final . ($tempChargePoint[$i]);
                    else if ($temp > 64 && $temp < 91)
                        $final = $final . ($tempChargePoint[$i]);
                    else
                        $final = $final . rawurlencode($chargePointId[$i]);
                }
                $chargePointId = $final;
                $this->webconfigDB->exec('BEGIN');
                if($this->isDifferent($rowOcppSettings["ocppVersion"],$ocppVersion)){
                    $this->appendToChangeLog("ocppVersion: ". $ocppVersion);
                    $stmt = $this->webconfigDB->prepare("UPDATE ocppSettings SET ocppVersion= :ocppVersion WHERE id= :id");
                    $stmt->bindValue(':ocppVersion', $ocppVersion, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this->isDifferent($rowOcppSettings["centralSystemAddress"],$centralSystemAddress)){
                    $this->appendToChangeLog("centralSystemAddress: ". $centralSystemAddress);
                    $this -> resetRequiredParameter = True;
                    $stmt = $this->webconfigDB->prepare("UPDATE ocppSettings SET centralSystemAddress= :centralSystemAddress WHERE id= :id");
                    $stmt->bindValue(':centralSystemAddress', $centralSystemAddress, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                    
                }
                if($this->isDifferent($rowOcppSettings["chargePointId"],$chargePointId)){
                    $this->appendToChangeLog("chargePointId: ". $chargePointId);
                    $this -> resetRequiredParameter = True;
                    $stmt = $this->webconfigDB->prepare("UPDATE ocppSettings SET chargePointId= :chargePointId WHERE id= :id");
                    $stmt->bindValue(':chargePointId', $chargePointId, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                $this->webconfigDB->exec('COMMIT');
                if($this-> changeLog){
                    ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
                }
            }

        }

        public function getresetRequiredParameter(){
            return $this -> resetRequiredParameter;
        }

    }
    class OcppConfigurations{
        use ChangeLogTrait;
        private $webconfigDB;
        private $earthingType;
        private $private_charging_enable;
        private $meterType;
        public $changeLog = "";
        public $rowOcppConfigurations;
        private $resetRequiredParameter = False;
        public function __construct($dbConnection,$earthingType,$private_charging_enable,$meterType) {
            $this->webconfigDB = $dbConnection;
            $this->earthingType = $earthingType;
            $this->private_charging_enable = $private_charging_enable;
            $this->meterType = $meterType;

        }
        public function saveOcppConfigurations($postData){
            $authorizationKey = $this->rowOcppConfigurations["AuthorizationKey"];
            if(empty($postData["authorizationKey"])) {
                $authorizationKey = $postData["authorizationKey"];
            } else {
                if($postData["authorizationKey"] != "******"){
                    if($this->isDifferent($this->rowOcppConfigurations["AuthorizationKey"],$postData["authorizationKey"])){
                        $authorizationKey = NetworkSettings::encrypt_text($postData["authorizationKey"]);
                    }
                }
            }

            $configuration_fields = [
            "FreeModeActive" => $postData['freeModeActive'] ?? null,
            "FreeModeRFID"=>$postData["freeModeRFID"] ?? null,
            "AllowOfflineTxForUnknownId" => $postData["allowOffline"] ?? null,
            "AuthorizationCacheEnabled"=>$postData["authorizationCache"] ?? null,
            "AuthorizationKey"=>$authorizationKey,
            "AuthorizeRemoteTxRequests"=>$postData["authorizeRemote"] ?? null,
            "BlinkRepeat"=>$postData["blinkRepeat"] ?? null,
            "BootNotificationAfterConnectionLoss"=>$postData["bootNotificationAfterConnectionLoss"] ?? null,
            "CentralSmartChargingWithNoTripping"=>$postData["centralSmartChargingWithNoTripping"] ?? null,
            "ClockAlignedDataInterval"=>$postData["clockData"] ?? null,
            "ConnectionTimeOut"=>$postData["connectionTimeOut"] ?? null,
            "ContinueChargingAfterPowerLoss" => $postData['continueChargingAfterPowerLoss'] ?? null,
            "CTStationCurrentInformationInterval" => $postData['CTStationCurrentInformationInterval'] ?? null,
            "DailyReboot"=>$postData["dailyReboot"] ?? null,
            "DailyRebootTime"=>$postData["dailyRebootTime"] ?? null,
            "DailyRebootType"=>$postData["dailyRebootType"] ?? null,
            "HeartbeatInterval"=>$postData["heartbeat"] ?? null,
            "InstallationErrorEnable"=>$postData["installationErrorEnable"] ?? null,
            "LEDTimeoutEnable"=>$postData["LEDTimeoutEnable"] ?? null,
            "LightIntensity"=>$postData["light"] ?? null,
            "LocalAuthListEnabled"=>$postData["localAuthListEnabled"] ?? null,
            "LocalAuthListMaxLength"=>$postData["localAuthListMaxLength"] ?? null,
            "LocalAuthorizeOffline"=>$postData["authorizeOffline"] ?? null,
            "LocalPreAuthorize"=>$postData["localPreAuthorize"] ?? null,
            "MaxEnergyOnInvalidId"=>$postData["maxEnergy"] ?? null,
            "MaxPowerChargeComplete"=>$postData["maxPowerChargeComplete"] ?? null,
            "MaxTimeChargeComplete"=>$postData["maxTimeChargeComplete"] ?? null,
            "MeterValuesAlignedData"=>$postData["alignedData"] ?? null,
            "MeterValuesSampledData"=>$postData["sampleData"] ?? null,
            "MeterValueSampleInterval"=>$postData["sampleInterval"] ?? null,
            "MinimumStatusDuration"=>$postData["minDuration"] ?? null,
            "NewTransactionAfterPowerLoss"=>$postData["newTransactionAfterPowerLoss"] ?? null,
            "RandomDelayOnDailyRebootEnabled"=>$postData["randomDelayOnDailyRebootEnabled"] ?? null,
            "ContinueChargingAfterPenError"=>$postData["continueChargingAfterPenError"] ?? null,
            "WebconfigEnabled"=>$postData["webconfigEnabled"] ?? null,
            "ResetRetries"=>$postData["resetRetries"] ?? null,
            "RfidEndianness"=>$postData["rfidEndianness"] ?? null,
            "SendDataTransferMeterConfigurationForNonEichrecht"=>$postData["sendDataTransferMeterConfigurationForNonEichrecht"] ?? null,
            "OcppSecurityProfile"=>$postData["ocppSecurityProfile"] ?? null,
            "SendLocalListMaxLength"=>$postData["sendLocalListMaxLength"] ?? null,
            "SendTotalPowerValue"=>$postData["sendTotalPowerValue"] ?? null,
            "StopTransactionOnEVSideDisconnect"=>$postData["disconnect"] ?? null,
            "StopTransactionOnInvalidId"=>$postData["stopInvalidId"] ?? null,
            "StopTxnAlignedData"=>$postData["stopAligned"] ?? null,
            "StopTxnSampledData"=>$postData["stopSampled"] ?? null,
            "TransactionMessageAttempts"=>$postData["attempts"] ?? null,
            "TransactionMessageRetryInterval"=>$postData["retryInterval"] ?? null,
            "UKSmartChargingEnabled"=>$postData["UKSmartCharging"] ?? null,
            "UnlockConnectorOnEVSideDisconnect"=>$postData["unlockConnector"] ?? null,
            "WebSocketPingInterval"=>$postData["pingInterval"] ?? null
            ];
            $configuration_fields = array_filter($configuration_fields, function ($value) {
                return isset($value);
            });

            if($this->validateOcppConfigutationFields($configuration_fields)){
                $this->updateOcppConfig($configuration_fields);
                if($this-> changeLog){
                    ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
                }
            }
        }
        private function validateOcppConfigutationFields($postData){
            $errors = [];
            $validation_rules = ["FreeModeActive"=>["type"=>"boolean"],
                                 "FreeModeRFID"=>["type"=>"string"],
                                 "AllowOfflineTxForUnknownId"=>["type"=>"boolean"],
                                 "AuthorizationCacheEnabled"=>["type"=>"boolean"],
                                 "AuthorizationKey"=>["type"=>"string","maxLength"=>40],
                                 "AuthorizeRemoteTxRequests"=>["type"=>"boolean"],
                                 "BlinkRepeat"=>["type"=>"integer","maxValue"=>20,"minValue"=>0],
                                 "BootNotificationAfterConnectionLoss"=>["type"=>"boolean"],
                                 "CentralSmartChargingWithNoTripping"=>["type"=>"boolean"],
                                 "ClockAlignedDataInterval"=>["type"=>"integer","maxValue"=>65000,"minValue"=>0],
                                 "ConnectionTimeOut"=>["type"=>"integer","maxValue"=>300,"minValue"=>0],
                                 "ContinueChargingAfterPowerLoss"=>["type"=>"boolean"],
                                 "CTStationCurrentInformationInterval"=>["type"=>"integer","minValue"=>0],
                                 "DailyReboot"=>["type"=>"boolean"],
                                 "DailyRebootTime"=>["type"=>"time"],
                                 "DailyRebootType"=>["type"=>"string","validItem"=>["SOFT","HARD"]],
                                 "HeartbeatInterval"=>["type"=>"readOnly"],
                                 "InstallationErrorEnable"=>["type"=>"boolean"],
                                 "LEDTimeoutEnable"=>["type"=>"boolean"],
                                 "LightIntensity"=>["type"=>"integer","maxValue"=>4,"minValue"=>1],
                                 "LocalAuthListEnabled"=>["type"=>"boolean"],
                                 "LocalAuthListMaxLength"=>["type"=>"integer","maxValue"=>10000,"minValue"=>0],
                                 "LocalAuthorizeOffline"=>["type"=>"boolean"],
                                 "LocalPreAuthorize"=>["type"=>"boolean"],
                                 "MaxEnergyOnInvalidId"=>["type"=>"integer","maxValue"=>22,"minValue"=>0],
                                 "MaxPowerChargeComplete"=>["type"=>"integer","minValue"=>0],
                                 "MaxTimeChargeComplete"=>["type"=>"integer","minValue"=>0],
                                 "MeterValuesAlignedData"=>["type"=>"string","validItem"=>['Energy.Active.Import.Register','Voltage','Current.Import','Power.Active.Import','Current.Offered','Power.Offered']],
                                 "MeterValuesSampledData"=>["type"=>"string","validItem"=>['Energy.Active.Import.Register','Voltage','Current.Import','Power.Active.Import','Current.Offered','Power.Offered']],
                                 "MeterValueSampleInterval"=>["type"=>"integer","maxValue"=>65000,"minValue"=>0],
                                 "MinimumStatusDuration"=>["type"=>"integer","maxValue"=>600,"minValue"=>0],
                                 "NewTransactionAfterPowerLoss"=>["type"=>"boolean"],
                                 "ResetRetries"=>["type"=>"integer","maxValue"=>10,"minValue"=>0],
                                 "RandomDelayOnDailyRebootEnabled"=>["type"=>"boolean"],
                                 "ContinueChargingAfterPenError"=>["type"=>"boolean"],
                                 "WebconfigEnabled"=>["type"=>"boolean"],
                                 "RfidEndianness"=>["type"=>"string","validItem"=>["big-endian","little-endian"]],
                                 "SendDataTransferMeterConfigurationForNonEichrecht"=>["type"=>"boolean"],
                                 "OcppSecurityProfile"=>["type"=>"integer","validItem"=>[0, 1, 2, 3]],
                                 "SendLocalListMaxLength"=>["type"=>"integer","maxValue"=>10000,"minValue"=>0],
                                 "SendTotalPowerValue"=>["type"=>"boolean"],
                                 "StopTransactionOnEVSideDisconnect"=>["type"=>"boolean"],
                                 "StopTransactionOnInvalidId"=>["type"=>"boolean"],
                                 "StopTxnAlignedData"=>["type"=>"string","validItem"=>['Energy.Active.Import.Register','Voltage','Current.Import','Power.Active.Import','Current.Offered','Power.Offered']],
                                 "StopTxnSampledData"=>["type"=>"string","validItem"=>['Energy.Active.Import.Register','Voltage','Current.Import','Power.Active.Import','Current.Offered','Power.Offered']],
                                 "TransactionMessageAttempts"=>["type"=>"integer","maxValue"=>10,"minValue"=>0],
                                 "TransactionMessageRetryInterval"=>["type"=>"integer","maxValue"=>120,"minValue"=>0],
                                 "UKSmartChargingEnabled"=>["type"=>"boolean"],
                                 "UnlockConnectorOnEVSideDisconnect"=>["type"=>"boolean"],
                                 "WebSocketPingInterval"=>["type"=>"integer","maxValue"=>600,"minValue"=>0]];

            foreach ($validation_rules as $param => $rules) {
                if (isset($postData[$param])) {
                    $value = $postData[$param];

                    foreach ($rules as $rule => $rule_value) {
                        switch ($rule) {
                            case 'type':
                                $type = gettype($value);
                                if($rule_value == "boolean" && !in_array($value,["TRUE","FALSE"])){
                                    $errors[] = "Invalid value for $param. Expected $rule_value, got $type.";
                                }
                                else if ($param!= "HeartbeatInterval" && $rule_value == "readOnly" && $this->getOcppConfigValue($param) != $value){
                                    $errors[] = "Invalid value for $param. Expected $rule_value, got $type.";
                                }
                                break;

                            case 'maxLength':
                                if (strlen($value) > $rule_value) {
                                    $errors[] = "$param exceeds the maximum length of $rule_value characters.";
                                }
                                break;

                            case 'maxValue':
                                if ($value > $rule_value) {
                                    $errors[] = "$param exceeds the maximum value of $rule_value.";
                                }
                                break;

                            case 'minValue':
                                if ($value < $rule_value) {
                                    $errors[] = "$param exceeds the minimum value of $rule_value.";
                                }
                                break;

                            case 'validItem':
                                if (!in_array($value, $rule_value)) {
                                    $errors[] = "$param is not a valid value. Expected one of: " . implode(', ', $rule_value);
                                }
                                break;



                        }
                    }
                }

                if (in_array($param, ['StopTxnAlignedData', 'StopTxnSampledData', 'MeterValuesAlignedData', 'MeterValuesSampledData'])) {
                    if (is_array($value)) {
                        foreach ($value as $item) {
                            $items = explode(',', $item);
                            foreach ($items as $singleItem) {
                                if (isset($validation_rules[$param]['validItem']) && !in_array($singleItem, $validation_rules[$param]['validItem'])) {
                                    return false;
                                }
                            }
                        }
                        return true;
                    } else {
                        $items = explode(',', $value);
                        foreach ($items as $singleItem) {
                            if (isset($validation_rules[$param]['validItem']) && !in_array($singleItem, $validation_rules[$param]['validItem'])) {
                                return false;
                            }
                        }
                        return true;
                    }
                }

            }
            return empty($errors) ? True : False;
        }

        private function getOcppConfigValue($param){
            $stmt = $this->webconfigDB->prepare("SELECT $param FROM ocppConfigurations WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $resOcppConfigurations = $stmt->execute();
            $rowOcppConfiguration = $resOcppConfigurations->fetchArray();
            $value = $rowOcppConfiguration[$param];
            return $value;

        }

        private function updateOcppConfig($config_fields){
            $resetRequiredList = array("UKSmartChargingEnabled","OcppSecurityProfile","AuthorizationKey");
            $stmt = $this->webconfigDB->prepare("SELECT * FROM ocppConfigurations WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $ocppConfigurations = $stmt->execute();
            $rowOcppConfiguration = $ocppConfigurations->fetchArray();
            foreach($config_fields as $key => $value){
                if(strtoupper(strval($rowOcppConfiguration[$key])) != strtoupper(strval($value))){
                    if($key == "FreeModeActive" && ($this->private_charging_enable || $this->meterType !== "EichrechtBauer")){
                        $stmt = $this->webconfigDB->prepare("UPDATE ocppConfigurations SET $key= :value WHERE id= :id");
                        $stmt->bindValue(':value', $value, SQLITE3_TEXT);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                        $this->appendToChangeLog($key. ": " . strval($value));
                    }elseif($key == "ContinueChargingAfterPowerLoss" && ($this->private_charging_enable || $this->meterType !== "EichrechtBauer")){
                        $stmt = $this->webconfigDB->prepare("UPDATE ocppConfigurations SET $key= :value WHERE id= :id");
                        $stmt->bindValue(':value', $value, SQLITE3_TEXT);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                        $this->appendToChangeLog($key. ": " . strval($value));
                        if($value == 'TRUE'){
                            $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET continueChargingWithoutReauthAfterPowerLoss= :continueChargingWithoutReauthAfterPowerLoss WHERE ID= :ID");
                            $stmt->bindValue(':continueChargingWithoutReauthAfterPowerLoss', '1', SQLITE3_INTEGER);
                            $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                            $stmt->execute();
                            $this->appendToChangeLog("continueChargingWithoutReauthAfterPowerLoss: 1");
                        }else{
                            $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET continueChargingWithoutReauthAfterPowerLoss= :continueChargingWithoutReauthAfterPowerLoss WHERE ID= :ID");
                            $stmt->bindValue(':continueChargingWithoutReauthAfterPowerLoss', '0', SQLITE3_INTEGER);
                            $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                            $stmt->execute();
                            $this->appendToChangeLog("continueChargingWithoutReauthAfterPowerLoss: 0");
                        }

                    }elseif($this->earthingType == 0 && $key == "installationErrorEnable"){
                        $value = "TRUE";
                        $this->appendToChangeLog($key. " :" . strval($value));
                        $stmt = $this->webconfigDB->prepare("UPDATE ocppConfigurations SET $key= :value WHERE id= :id");
                        $stmt->bindValue(':value', $value, SQLITE3_TEXT);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();

                    }elseif($key == "LightIntensity"){
                        $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET ledDimmingLevel= :ledDimmingLevel WHERE id= :id");
                        $constant_value = Constants::$led_dimming_dictionary[$value];
                        $stmt->bindValue(':ledDimmingLevel', $constant_value, SQLITE3_TEXT);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                        $this->appendToChangeLog("ledDimmingLevel: " . Constants::$led_dimming_dictionary[$value]);
                        $stmt = $this->webconfigDB->prepare("UPDATE ocppConfigurations SET $key= :value WHERE id= :id");
                        $stmt->bindValue(':value', $value, SQLITE3_TEXT);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                        $this->appendToChangeLog($key. ": " . strval($value));
                        sendZeroMqMessage("generalUpdate");

                    }

                    else{
                        $stmt = $this->webconfigDB->prepare("UPDATE ocppConfigurations SET $key= :value WHERE id= :id");
                        $stmt->bindValue(':value', $value, SQLITE3_TEXT);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                        if(in_array($key, $resetRequiredList)){
                            $this -> resetRequiredParameter = True;
                        }
                        $value = $key == "AuthorizationKey" ? "*****" : $value;
                        $this->appendToChangeLog($key. ": " . strval($value));
                    }

                }
            }

        }

        public function getresetRequiredParameter(){
            return $this -> resetRequiredParameter;
        }




    }

    class PasswordSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        private $passwordLevel;
        private $dbCurrentPassword;
        private $currentUser;
        public $changeLog = "";
        public function __construct($dbConnection,$passwordLevel,$dbCurrentPassword,$currentUser) {
            $this->webconfigDB = $dbConnection;
            $this->passwordLevel = $passwordLevel;
            $this->dbCurrentPassword = $dbCurrentPassword;
            $this->currentUser = $currentUser;
        }

        public function savePassword($currentPassword,$password,$repassword){
            $stmt = $this->webconfigDB->prepare("SELECT * FROM account WHERE id= :id");
            $stmt->bindValue(':id', $this->currentUser, SQLITE3_INTEGER);
            $accountSettings = $stmt->execute();
            $rowAccount = $accountSettings->fetchArray();

            if($this->isPasswordValid($password, $repassword, $currentPassword)){
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                if($this->isDifferent($rowAccount["password"],$hashed_password)){
                    $this->appendToChangeLog("password: ". $hashed_password);
                    $stmt = $this->webconfigDB->prepare("UPDATE account SET password= :password WHERE id= :id");
                    $stmt->bindValue(':password', $hashed_password, SQLITE3_TEXT);
                    $stmt->bindValue(':id', $this->currentUser, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this->isDifferent($rowAccount["firstLogin"],"false")){
                    $this->appendToChangeLog("firstLogin: ". "false");
                    $stmt = $this->webconfigDB->prepare("UPDATE account SET firstLogin= :firstLogin WHERE id= :id");
                    $stmt->bindValue(':firstLogin', 'false', SQLITE3_TEXT);
                    $stmt->bindValue(':id', $this->currentUser, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this-> changeLog){
                    ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
                }
                session_unset();
                session_destroy();
                header("Location: " . "http://" . $_SERVER['HTTP_HOST']);
                exit();
            }
        }

        private function checkEquality($password,$repassword){
            return ($password==$repassword)? True:False;

        }

        private function checkPasswordAcToPasswordLevel($password){
            $password_level_regex = [1=>"/(?=^.{12,32}$)(?=(.*\d){2})(?=(.*[A-Z]){2})(?=(.*[a-z]){2})(?=(.*[!%&\/()=?\*#+\-_]){2}).*$/",
            2=>"/(?=^.{20}$)(?=(.*\d){2})(?=(.*[A-Za-z]){2})(?=(.*[!%&\/()=?\*#+\-_]){2}).*$/",
            3=>"/(?=^.{12,32}$)(?=(.*\d){2})(?=(.*[A-Z]){2})(?=(.*[a-z]){2})(?=(.*[!%&\/()=?\*#+\-_]){2}).*$/"
            ];
            return preg_match($password_level_regex[$this->passwordLevel],$password) ? True:False;

        }

        private function comparePasswords($dbCurrentPassword,$currentPassword){
            return password_verify($currentPassword, $dbCurrentPassword);

        }

        private function compareSameness($password,$currentPassword){
            return ($password == $currentPassword) ? False: True;

        }
        private function isPasswordValid($password, $repassword,$currentPassword)
        {
            $passwordValid = $this->checkPasswordAcToPasswordLevel($password);
            $passwordMatch = $this->checkEquality($password, $repassword);
            $currentPasswordMatch = $this->comparePasswords($this->dbCurrentPassword, $currentPassword);
            $passwordSameAsCurrent = $this->compareSameness($password, $currentPassword);
            return $passwordValid && $passwordMatch && $currentPasswordMatch && $passwordSameAsCurrent;
        }


    }

    class LoadManagementSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        private $power_optimizer;
        private $ul_type;
        public $changeLog = "";
        public function __construct($dbConnection,$power_optimizer,$ul_type) {
            $this->webconfigDB = $dbConnection;
            $this->power_optimizer = $power_optimizer;
            $this->ul_type = $ul_type;
        }

        public function saveLoadManagementSettings($postData)
        {
            $dlmMode = $postData["loadManagementSelection"] ?? $this->get_load_management_value("dlmMode");

            if ($dlmMode === "Enabled") {
                $this->handleEnabledLoadManagement($postData);
            } elseif ($dlmMode === "Modbus") {
                $this->handleModbusLoadManagement($postData);
            } elseif ($dlmMode === "Eebus") {
                $this->handleEebusLoadManagement($postData);
            } else {
                $this->disableLoadManagement();
            }
        }

        private function handleEnabledLoadManagement($postData)
        {
            $cpRole = $postData["cpRoleSelection"] ?? $this->get_load_management_value("cpRoleSelection");

            if ($cpRole === "Slave") {
                $loadManagementFields = ["dlmMode" => "Enabled", "loadManagementMode"=> "EquallyShared",
                "cpRole" => "Slave", "dlmInterface" => $postData["dlmInterfaceSelectionOuter"] ?? $this->get_load_management_value("dlmInterface"), "supplyType" => "Static","fifoPercentage"=> "","totalCurrentLimitPerPhase"=> ""];
            } else {
                $loadManagementFields = [
                    "dlmMode" => "Enabled",
                    "cpRole" => "Master",
                    "dlmInterface" => $postData["dlmInterfaceSelectionOuter"] ?? $this->get_load_management_value("dlmInterface"),
                    "mainCircuitCurrent" => $postData["mainCircuitCurrent"] ?? $this->get_load_management_value("mainCircuitCurrent"),
                    "clusterMaxCurrent" => $postData["clusterMaxCurrent"] ?? $this->get_load_management_value("clusterMaxCurrent"),
                    "clusterFailSafeMode" => $postData["clusterFailSafeMode"] ?? $this->get_load_management_value("clusterFailSafeMode"),
                    "clusterFailSafeCurrent" => $postData["clusterFailSafeCurrent"] ?? $this->get_load_management_value("clusterFailSafeCurrent"),
                    "totalCurrentLimit" => $postData["totalCurrentLimit"] ?? $this->get_load_management_value("totalCurrentLimit"),
                    "gridBuffer" => $postData["gridBufferSelection"] ?? $this->get_load_management_value("gridBufferSelection"),
                    "supplyType" => $postData["supplyTypeSelection"] ?? $this->get_load_management_value("supplyTypeSelection"),
                    "loadManagementMode" => $postData["loadManagementModeSelection"] ?? $this->get_load_management_value("loadManagementModeSelection")
                ];

                if ($loadManagementFields["loadManagementMode"] === "Combined") {
                    $loadManagementFields["FIFOPercentage"] = $postData["fifoPercentageSelection"] ?? $this->get_load_management_value("fifoPercentageSelection");
                }
            }

            $this->update_dlm_Settings($loadManagementFields);
        }

        private function handleModbusLoadManagement($postData)
        {
            $loadManagementFields = ["dlmMode" => "Modbus", "failSafeCurrent" => $postData["failSafeCurrent"] ?? $this->get_load_management_value("failSafeCurrent")];
            $this->update_dlm_Settings($loadManagementFields);
            powerOptimizerSettings::saveAutoPhaseSwitching(0, $this->webconfigDB);
            // saveAutoPhaseSwitching added to ensure autoPhaseSwitching is disabled when Modbus is active, as 0 represents the disabled state.
        }

        private function handleEebusLoadManagement($postData)
        {
            $loadManagementFields = ["dlmMode" => "Eebus" , "eebusEnabled" => "true"];
            $this->update_dlm_Settings($loadManagementFields);
        }

        private function disableLoadManagement()
        {
            $loadManagementFields = ["dlmMode" => "Disabled"];
            $this->update_dlm_Settings($loadManagementFields);
        }
        private function get_load_management_value($param){
            $stmt = $this->webconfigDB->prepare("SELECT $param FROM dlmSettings WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $resLoadManagement = $stmt->execute();
            $rowLoadManagement = $resLoadManagement->fetchArray();
            $value = $rowLoadManagement[$param];
            return $value;

        }

        private function check_validation($load_management_fields){
            $hasFalseValue = True;
            $validation_rules = ["dlmMode" => $this->check_load_management($load_management_fields["dlmMode"] ?? null),
            "cpRole"=>$this->check_cp_role($load_management_fields["cpRole"] ?? null),
            "dlmInterface"=>$this->check_dlm_interface($load_management_fields["dlmInterface"] ?? null),
            "mainCircuitCurrent" => $this->check_main_circuit_current($load_management_fields["mainCircuitCurrent"] ?? null,$load_management_fields["supplyType"] ?? null,$load_management_fields["gridBuffer"] ?? null),
            "clusterMaxCurrent"=>$this->check_cluster_max_current($load_management_fields["clusterMaxCurrent"] ?? null, $load_management_fields["mainCircuitCurrent"] ?? null,$load_management_fields["gridBuffer"] ?? null),
            "clusterFailSafeMode"=>$this->check_cluster_failsafe($load_management_fields["clusterFailSafeMode"] ?? null),
            "clusterFailSafeCurrent"=>$this->check_cluster_failsafe_current($load_management_fields["clusterFailSafeCurrent"] ?? null,$load_management_fields["mainCircuitCurrent"] ?? null),
            "gridBuffer"=>$this->check_grid_buffer($load_management_fields["gridBuffer"] ?? null),
            //"totalCurrentLimit"=>$this->check_total_current($load_management_fields["totalCurrentLimit"] ?? null),
            "supplyType"=>$this->check_supply_type($load_management_fields["supplyType"] ?? null),
            "loadManagementMode"=>$this->check_load_management_mode($load_management_fields["loadManagementMode"] ?? null),
            "FIFOPercentage"=>$this->check_fifo_percentage($load_management_fields["FIFOPercentage"] ?? null),
            "failSafeCurrent"=>$this->check_failsafe_current($load_management_fields["dlmMode"] ?? null,
                                                             $load_management_fields["failSafeCurrent"] ?? null)

        ];

            foreach ($validation_rules as $key => $value) {
                if(isset($load_management_fields[$key])){
                    if ($value === false) {
                        $hasFalseValue = False;
                        break; // Exit the loop early because we found a false value
                    }
                }
            }

            return $hasFalseValue;

        }

        private function update_dlm_Settings($load_management_fields){
            $stmt = $this->webconfigDB->prepare("SELECT * FROM dlmSettings");
            $dlmSettings = $stmt->execute();
            $rowDlm = $dlmSettings->fetchArray();

            if($this->check_validation($load_management_fields)){
                $selectedLoadManagement = $load_management_fields["dlmMode"];
                $selectedCpRole = $load_management_fields["cpRole"];
                $selectedDlmInterface = $load_management_fields["dlmInterface"];
                $mainCircuitCurrent = $load_management_fields["mainCircuitCurrent"];
                $selectedClusterMaxCurrent = $load_management_fields["clusterMaxCurrent"];
                $selectedClusterFailSafe = $load_management_fields["clusterFailSafeMode"];
                $selectedClusterFailSafeCurrent = $load_management_fields["clusterFailSafeCurrent"];
                //$totalCurrentLimit =$load_management_fields["totalCurrentLimit"];
                $selectedSupplyType = $load_management_fields["supplyType"];
                $selectedLoadManagementMode = $load_management_fields["loadManagementMode"];
                $selectedFifoPercentage = $load_management_fields["FIFOPercentage"];
                $failSafeCurrent = $load_management_fields["failSafeCurrent"];
                if($this->isDifferent($rowDlm["dlmMode"],$selectedLoadManagement)){
                    $this->appendToChangeLog("dlmMode: ". $selectedLoadManagement);
                    $stmt = $this->webconfigDB->prepare("UPDATE dlmSettings SET dlmMode= :dlmMode WHERE id= :id");
                    $stmt->bindValue(':dlmMode', $selectedLoadManagement, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();                
                }
                if($this->isDifferent($rowDlm["cpRole"],$selectedCpRole)){
                    $this->appendToChangeLog("cpRole: ". $selectedCpRole);
                    $stmt = $this->webconfigDB->prepare("UPDATE dlmSettings SET cpRole= :cpRole WHERE id= :id");
                    $stmt->bindValue(':cpRole', $selectedCpRole, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this->isDifferent($rowDlm["dlmInterface"],$selectedDlmInterface)){
                    $this->appendToChangeLog("dlmInterface: ". $selectedDlmInterface);
                    $stmt = $this->webconfigDB->prepare("UPDATE dlmSettings SET dlmInterface= :dlmInterface WHERE id= :id");
                    $stmt->bindValue(':dlmInterface', $selectedDlmInterface, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this->isDifferent($rowDlm["mainCircuitCurrent"],$mainCircuitCurrent)){
                    $this->appendToChangeLog("mainCircuitCurrent: ". $mainCircuitCurrent);
                    $stmt = $this->webconfigDB->prepare("UPDATE dlmSettings SET mainCircuitCurrent= :mainCircuitCurrent WHERE id= :id");
                    $stmt->bindValue(':mainCircuitCurrent', $mainCircuitCurrent, SQLITE3_INTEGER);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($selectedClusterMaxCurrent == 0){
                    if($this->isDifferent($rowDlm["clusterMaxCurrent"],$mainCircuitCurrent)){
                        $this->appendToChangeLog("clusterMaxCurrent: ". $mainCircuitCurrent);
                        $stmt = $this->webconfigDB->prepare("UPDATE dlmSettings SET clusterMaxCurrent= :clusterMaxCurrent WHERE id= :id");
                        $stmt->bindValue(':clusterMaxCurrent', $mainCircuitCurrent, SQLITE3_INTEGER);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                    }
                } else {
                    if($this->isDifferent($rowDlm["clusterMaxCurrent"],$selectedClusterMaxCurrent)){
                        $this->appendToChangeLog("clusterMaxCurrent: ". $selectedClusterMaxCurrent);
                        $stmt = $this->webconfigDB->prepare("UPDATE dlmSettings SET clusterMaxCurrent= :clusterMaxCurrent WHERE id= :id");
                        $stmt->bindValue(':clusterMaxCurrent', $selectedClusterMaxCurrent, SQLITE3_INTEGER);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                    }
                }
                if($this->isDifferent($rowDlm["clusterFailSafeMode"],$selectedClusterFailSafe)){
                    $this->appendToChangeLog("clusterFailSafeMode: ". $selectedClusterFailSafe);
                    $stmt = $this->webconfigDB->prepare("UPDATE dlmSettings SET clusterFailSafeMode= :clusterFailSafeMode WHERE id= :id");
                    $stmt->bindValue(':clusterFailSafeMode', $selectedClusterFailSafe, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this->isDifferent($rowDlm["clusterFailSafeCurrent"],$selectedClusterFailSafeCurrent)){
                    $this->appendToChangeLog("clusterFailSafeCurrent: ". $selectedClusterFailSafeCurrent);
                    $stmt = $this->webconfigDB->prepare("UPDATE dlmSettings SET clusterFailSafeCurrent= :clusterFailSafeCurrent WHERE id= :id");
                    $stmt->bindValue(':clusterFailSafeCurrent', $selectedClusterFailSafeCurrent, SQLITE3_INTEGER);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                /* if($this->isDifferent($rowDlm["totalCurrentLimit"],$totalCurrentLimit)){
                    $this->appendToChangeLog("totalCurrentLimit: ". $totalCurrentLimit);
                    $this->webconfigDB->query("UPDATE dlmSettings SET totalCurrentLimit='$totalCurrentLimit' WHERE id='1'");
                } */
                if(isset($load_management_fields["gridBuffer"])) {
                    $selectedgridBuffer = $load_management_fields["gridBuffer"];
                    if($this->isDifferent($rowDlm["gridBuffer"],$selectedgridBuffer)){
                        $this->appendToChangeLog("gridBuffer: ". $selectedgridBuffer);
                        $stmt = $this->webconfigDB->prepare("UPDATE dlmSettings SET gridBuffer= :gridBuffer WHERE id= :id");
                        $stmt->bindValue(':gridBuffer', $selectedgridBuffer, SQLITE3_INTEGER);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                    }
                }
                if($this->isDifferent($rowDlm["supplyType"],$selectedSupplyType)){
                    $this->appendToChangeLog("supplyType: ". $selectedSupplyType);
                    $stmt = $this->webconfigDB->prepare("UPDATE dlmSettings SET supplyType= :supplyType WHERE id= :id");
                    $stmt->bindValue(':supplyType', $selectedSupplyType, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this->isDifferent($rowDlm["loadManagementMode"],$selectedLoadManagementMode)){
                    $this->appendToChangeLog("loadManagementMode: ". $selectedLoadManagementMode);
                    $stmt = $this->webconfigDB->prepare("UPDATE dlmSettings SET loadManagementMode= :loadManagementMode WHERE id= :id");
                    $stmt->bindValue(':loadManagementMode', $selectedLoadManagementMode, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this->isDifferent($rowDlm["FIFOPercentage"],$selectedFifoPercentage)){
                    $this->appendToChangeLog("FIFOPercentage: ". $selectedFifoPercentage);
                    $stmt = $this->webconfigDB->prepare("UPDATE dlmSettings SET FIFOPercentage= :FIFOPercentage WHERE id= :id");
                    $stmt->bindValue(':FIFOPercentage', $selectedFifoPercentage, SQLITE3_INTEGER);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if(isset($load_management_fields["failSafeCurrent"])) {
                    $selectedFailSafeCurrent = $load_management_fields["failSafeCurrent"];
                    if($this->isDifferent($rowDlm["failSafeCurrent"],$selectedFailSafeCurrent)){
                        $this->appendToChangeLog("failSafeCurrent: ". $selectedFailSafeCurrent);
                        $stmt = $this->webconfigDB->prepare("UPDATE dlmSettings SET failSafeCurrent= :failSafeCurrent WHERE id= :id");
                        $stmt->bindValue(':failSafeCurrent', $selectedFailSafeCurrent, SQLITE3_INTEGER);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                    }
                }
                if($this-> changeLog){
                    ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
                }
                sendZeroMqMessage("dlmSettingsUpdate");
            }
        }

        private function check_load_management($selectedLoadManagement){
            return in_array($selectedLoadManagement,["Enabled","Modbus","Disabled","Eebus"]);
        }
        private function check_cp_role($selectedCpRole){
            return in_array($selectedCpRole,["Master","Slave"]);

        }
        private function check_dlm_interface($selectedDlmInterface){
            return in_array($selectedDlmInterface,["Ethernet","wifi"]);
        }

        private function check_main_circuit_current($mainCircuitCurrent, $selectedSupplyType, $selectedgridBuffer){
            if($mainCircuitCurrent != "" && is_numeric($mainCircuitCurrent)){
                $calculateMainCircuitCurrent = floor($mainCircuitCurrent * (1 - ($selectedgridBuffer / 100)));
            }
            if($selectedSupplyType != "TIC"){
                if(!is_numeric($mainCircuitCurrent)){
                    return False;
                }else if($mainCircuitCurrent == ""){
                    return False;
                }else if($mainCircuitCurrent>1024){
                    return False;

                }else if($calculateMainCircuitCurrent<10){
                    return False;

                }
            }
            return True;
        }
        private function check_cluster_max_current($selectedClusterMaxCurrent, $mainCircuitCurrent, $selectedgridBuffer){
            if($mainCircuitCurrent != "" && is_numeric($mainCircuitCurrent)){
                $calculateMainCircuitCurrent = floor($mainCircuitCurrent * (1 - ($selectedgridBuffer / 100)));
            }
            if(!is_numeric($selectedClusterMaxCurrent)){
                return False;
            }else if($selectedClusterMaxCurrent == ""){
                return False;
            }else if($selectedClusterMaxCurrent<10){
                return False;
            }else if($selectedClusterMaxCurrent>$calculateMainCircuitCurrent){
                return False;
            }
            return True;
        }
        private function check_cluster_failsafe($selectedClusterFailSafe){
            return in_array($selectedClusterFailSafe,["Disabled","Enabled"]);
        }
        private function check_cluster_failsafe_current($selectedClusterFailSafeCurrent, $mainCircuitCurrent){
            if(!is_numeric($selectedClusterFailSafeCurrent)){
                return False;
            }else if($selectedClusterFailSafeCurrent == ""){
                return False;
            }else if($selectedClusterFailSafeCurrent<0){
                return False;
            }else if($selectedClusterFailSafeCurrent>$mainCircuitCurrent){
                return False;
            }
            return True;
        }

        private function check_total_current($totalCurrentLimit){
            if(!is_numeric($totalCurrentLimit)){
                return False;
            }else if($totalCurrentLimit == ""){
                return False;
            }else if($totalCurrentLimit>1024){
                return False;

            }else if($totalCurrentLimit<12){
                return False;

            }
            /*else if($totalCurrentLimit>$mainCircuitCurrent){
                return False;
            }*/
            return True;
        }

        private function check_supply_type($selectedSupplyType){
            return in_array($selectedSupplyType,["Static","Klefr","TIC","GARO","P1"]);

        }
        private function check_load_management_mode($selectedLoadManagementMode){
            return in_array($selectedLoadManagementMode,["EquallyShared","FIFO","Combined"]);

        }

        private function check_failsafe_current($selectedLoadManagement,$failSafeCurrent){
            $maximum_failsafe_current = ($this->ul_type === 'UL50') ? 50:32;
            if($selectedLoadManagement == "Modbus" && $this->power_optimizer == 0){
                if(!is_numeric($failSafeCurrent)){
                    return False;
                }else if($failSafeCurrent == ""){
                    return False;
                }else if($failSafeCurrent>1024){
                    return False;

                }else if($failSafeCurrent<0){
                    return False;

                }else if($failSafeCurrent>$maximum_failsafe_current){
                    return False;
                }
            }
            return True;
        }

        private function check_grid_buffer($selectedgridBuffer){
            return in_array($selectedgridBuffer,[0,10,20,30,40,50,60,70,80,90]);
        }

        private function check_fifo_percentage($selectedFifoPercentage){
            return in_array($selectedFifoPercentage,[10,20,30,40,50,60,70,80,90]);

        }


    }


    class StandbyLedBehaviourSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        public $changeLog = "";
        public function __construct($dbConnection) {
            $this->webconfigDB = $dbConnection;

        }
        public function saveStandByLedBehaviour($standby_led_behave) {
            $stmt = $this->webconfigDB->prepare("SELECT * FROM generalSettings WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $generalSettings = $stmt->execute();
            $rowGeneral = $generalSettings->fetchArray();
            if(in_array($standby_led_behave, Constants::$binary_options) && $this->isDifferent($rowGeneral["standbyLedBehaviour"],$standby_led_behave)){
                $this->appendToChangeLog("standbyLedBehaviour: " . $standby_led_behave);
                $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET standbyLedBehaviour= :standbyLedBehaviour WHERE id= :id");
                $stmt->bindValue(':standbyLedBehaviour', $standby_led_behave, SQLITE3_INTEGER);
                $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }
        }       
    }

    class EarthingSystemSettings{
        use ChangeLogTrait;
        private $db_connection;
        private $installation_error_enable;
        public $changeLog = "";
        public function __construct($db_connection,$installation_error_enable) {
            $this->db_connection = $db_connection;
            $this->installation_error_enable = $installation_error_enable;

        }
        public function saveEarthingSystem($earthing_system) {
            $stmt = $this->db_connection->prepare("SELECT * from installationSettings");
            $installationSettings = $stmt->execute();
            $rowInstallationSettings = $installationSettings->fetchArray();

            if($earthing_system == 0 && $this->installation_error_enable == "FALSE"){
                return False;
            }
            if(in_array($earthing_system, Constants::$binary_options) && $this->isDifferent($rowInstallationSettings["earthingType"],$earthing_system)){
                $this->appendToChangeLog("earthingType: " . $earthing_system);
                $stmt = $this->db_connection->prepare("UPDATE installationSettings SET earthingType= :earthingType WHERE ID= :ID");
                $stmt->bindValue(':earthingType', $earthing_system, SQLITE3_TEXT);
                $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                $stmt->execute();
                if($this-> changeLog){
                    ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
                }
                sendZeroMqMessage("installationUpdate");
            }

        }
    }

    class UnbalancedLoadDetection {
        use ChangeLogTrait;
        private $db_connection;
        private $max_current;
        private $meter_type;
        private $cable_model;
        public $changeLog = "";
        public function __construct($db_connection, $max_current, $meter_type, $cable_model) {
            $this->db_connection = $db_connection;
            $this->max_current = $max_current;
            $this->meter_type = $meter_type;
            $this->cable_model = $cable_model;
        }

        public function saveUnbalancedLoadDetection($postData) {
            $unbalancedLoadDetectionSelection = $postData["unbalancedLoadDetectionSelection"] ?? $this->getUnbalancedLoadDetection("unbalancedLoadDetection");
            if (in_array($unbalancedLoadDetectionSelection, Constants::$binary_options)) {
                if ($unbalancedLoadDetectionSelection == 1 || ($this->meter_type === "EichrechtBauer" && $this->cable_model == 2)) {
                    $this->enableUnbalancedLoadDetection($postData);
                } else {
                    $this->disableUnbalancedLoadDetection();
                }
            }
        }

        private function getUnbalancedLoadDetection($param){
            $stmt = $this->db_connection->prepare("SELECT $param FROM installationSettings WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $resLoadManagement = $stmt->execute();
            $rowLoadManagement = $resLoadManagement->fetchArray();
            $value = $rowLoadManagement[$param];
            return $value;

        }

        private function enableUnbalancedLoadDetection($postData) {
            $maxCurrentSelection = $postData["unbalancedLoadDetectionMaxCurrentSelection"] ?? null;

            if ($maxCurrentSelection !== null && $this->checkUnbalancedLoadDetectionMaxCurrent($maxCurrentSelection)) {
                $unbalancedLoadDetectionFields = [
                    "unbalancedLoadDetection" => 1,
                    "unbalancedLoadDetectionMaxCurrent" => $maxCurrentSelection
                ];
                $this->updateUnbalancedLoadDetection($unbalancedLoadDetectionFields);
            } else {
                $unbalancedLoadDetectionFields = ["unbalancedLoadDetection" => 1];
                $this->updateUnbalancedLoadDetection($unbalancedLoadDetectionFields);
            }


        }

        private function disableUnbalancedLoadDetection() {
            $unbalancedLoadDetectionFields = ["unbalancedLoadDetection" => 0];
            $this->updateUnbalancedLoadDetection($unbalancedLoadDetectionFields);
        }

        private function checkUnbalancedLoadDetectionMaxCurrent($maxCurrentSelection) {
            if (!is_numeric($maxCurrentSelection) || $maxCurrentSelection > $this->max_current) {
                return false;
            }
            return true;
        }

        private function updateUnbalancedLoadDetection($detectionFields) {
            $this->db_connection->exec('BEGIN');
            foreach ($detectionFields as $key => $value) {
                if($this->isDifferent($this->getUnbalancedLoadDetection($key),$value)){
                    $this->appendToChangeLog($key.": " . $value);
                    $stmt = $this->db_connection->prepare("UPDATE installationSettings SET $key= :value WHERE id= :id");
                    $stmt->bindValue(':value', $value, SQLITE3_TEXT);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
            }
            $this->db_connection->exec('COMMIT');
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }
            sendZeroMqMessage("installationUpdate");
        }
    }


    class ExternalEnableInputSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        public $changeLog = "";
        public function __construct($dbConnection) {
            $this->webconfigDB = $dbConnection;

        }
        public function saveExternalEnableInput($external_enable_input) {
            $stmt = $this->webconfigDB->prepare("SELECT * from installationSettings");
            $installationSettings = $stmt->execute();
            $rowInstallationSettings = $installationSettings->fetchArray();
            if(in_array($external_enable_input, Constants::$binary_options) && $this->isDifferent($rowInstallationSettings["externalEnableInput"],$external_enable_input)){
                $this->appendToChangeLog("externalEnableInput: " . $external_enable_input);
                $stmt = $this->webconfigDB->prepare("UPDATE installationSettings SET externalEnableInput= :externalEnableInput WHERE ID= :ID");
                $stmt->bindValue(':externalEnableInput', $external_enable_input, SQLITE3_INTEGER);
                $stmt->bindvalue(':ID', 1, SQLITE3_INTEGER);
                $stmt->execute();
                sendZeroMqMessage("installationUpdate");
            }
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }
        }
    }
    class LockableCableSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        public $changeLog = "";
        public function __construct($dbConnection) {
            $this->webconfigDB = $dbConnection;

        }
        public function saveLockableCable($lockable_cable) {
            $stmt = $this->webconfigDB->prepare("SELECT * from installationSettings");
            $installationSettings = $stmt->execute();
            $rowInstallationSettings = $installationSettings->fetchArray();
            if(in_array($lockable_cable, Constants::$binary_options) && $this->isDifferent($rowInstallationSettings["lockableCable"],$lockable_cable)){
                $this->appendToChangeLog("lockableCable: " . $lockable_cable);
                $stmt = $this->webconfigDB->prepare("UPDATE installationSettings SET lockableCable= :lockableCable WHERE ID= :ID");
                $stmt->bindValue(':lockableCable', $lockable_cable, SQLITE3_INTEGER);
                $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                $stmt->execute();
                sendZeroMqMessage("installationUpdate");
            }
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }
        }
    }

    class LoadShedingMinimumCurrentSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        private $current_limiter_value;
        public $changeLog = "";
        public function __construct($dbConnection,$current_limiter_value) {
            $this->webconfigDB = $dbConnection;
            $this->current_limiter_value = $current_limiter_value;

        }
        public function saveLoadShedingMinimumCurrent($load_sheding_minimum_current) {
            if($load_sheding_minimum_current >= 0 && $load_sheding_minimum_current<=$this->current_limiter_value){
                $stmt = $this->webconfigDB->prepare("SELECT * from installationSettings");
                $installationSettings = $stmt->execute();
                $rowInstallationSettings = $installationSettings->fetchArray();
                if($this->isDifferent($rowInstallationSettings["loadSheddingMinimumCurrent"],$load_sheding_minimum_current)){
                    $this->appendToChangeLog("loadSheddingMinimumCurrent: " . $load_sheding_minimum_current);
                    $stmt = $this->webconfigDB->prepare("UPDATE installationSettings SET loadSheddingMinimumCurrent= :loadSheddingMinimumCurrent WHERE ID= :ID");
                    $stmt->bindvalue(':loadSheddingMinimumCurrent', $load_sheding_minimum_current, SQLITE3_INTEGER);
                    $stmt->bindvalue(':ID', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                    sendZeroMqMessage("installationUpdate");
                }
                if($this-> changeLog){
                    ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
                }

            }
        }
    }

    class powerOptimizerSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        private $powerOptimizerTotalCurrentValues;
        private $powerOptimizerExternalMeterOptions;
        public $changeLog = "";
        public function __construct($dbConnection,$powerOptimizerTotalCurrentValues,$powerOptimizerExternalMeterOptions) {
            $this->webconfigDB = $dbConnection;
            $this->powerOptimizerTotalCurrentValues = $powerOptimizerTotalCurrentValues;
            $this->powerOptimizerExternalMeterOptions = $powerOptimizerExternalMeterOptions;
        }
        public function savePowerOptimizer($powerOptimizerValue,$powerOptimizerTotalCurrentValue,$powerOptimizerExternalMeterValue,$operationModeValue,$followTheSun,$followTheSunMode) {
            $stmt = $this->webconfigDB->prepare("SELECT * from installationSettings");
            $installationSettings = $stmt->execute();
            $rowInstallationSettings = $installationSettings->fetchArray();            
            if($this->checkPowerOptimizerValues($powerOptimizerValue,$powerOptimizerTotalCurrentValue,$powerOptimizerExternalMeterValue,$operationModeValue)){
                if($this->isDifferent($rowInstallationSettings["operationMode"],$operationModeValue)){
                    $this->appendToChangeLog("operationMode: " . $operationModeValue);
                    $stmt = $this->webconfigDB->prepare("UPDATE installationSettings SET operationMode= :operationMode WHERE ID= :ID");
                    $stmt->bindValue(':operationMode', $operationModeValue, SQLITE3_INTEGER);
                    $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this->isDifferent($rowInstallationSettings["followTheSun"],$followTheSun)){
                    $this->appendToChangeLog("followTheSun: " . $followTheSun);
                    $stmt = $this->webconfigDB->prepare("UPDATE installationSettings SET followTheSun= :followTheSun WHERE ID= :ID");
                    $stmt->bindValue(':followTheSun', $followTheSun, SQLITE3_INTEGER);
                    $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                
                if($operationModeValue != 3 && $operationModeValue != 4){
                    if($this->isDifferent($rowInstallationSettings["powerOptimizer"],$powerOptimizerValue)){
                        $this->appendToChangeLog("powerOptimizer: " . $powerOptimizerValue);
                        $stmt = $this->webconfigDB->prepare("UPDATE installationSettings SET powerOptimizer= :powerOptimizer WHERE ID= :ID");
                        $stmt->bindValue(':powerOptimizer', $powerOptimizerValue, SQLITE3_INTEGER);
                        $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                    }
                    if($this->isDifferent($rowInstallationSettings["powerOptimizerTotalCurrent"],$powerOptimizerTotalCurrentValue)){
                        $this->appendToChangeLog("powerOptimizerTotalCurrent: " . $powerOptimizerTotalCurrentValue);
                        $stmt = $this->webconfigDB->prepare("UPDATE installationSettings SET powerOptimizerTotalCurrent= :powerOptimizerTotalCurrent WHERE ID= :ID");
                        $stmt->bindValue(':powerOptimizerTotalCurrent', $powerOptimizerTotalCurrentValue, SQLITE3_INTEGER);
                        $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                    }
                    if($powerOptimizerValue != 0 || ($followTheSun == 1 && $followTheSunMode != 3)){
                        if($this->isDifferent($rowInstallationSettings["powerOptimizerExternalMeter"],$powerOptimizerExternalMeterValue)){
                            $this->appendToChangeLog("powerOptimizerExternalMeter: " . $powerOptimizerExternalMeterValue);
                            $stmt = $this->webconfigDB->prepare("UPDATE installationSettings SET powerOptimizerExternalMeter= :powerOptimizerExternalMeter WHERE ID= :ID");
                            $stmt->bindValue(':powerOptimizerExternalMeter', $powerOptimizerExternalMeterValue, SQLITE3_INTEGER);
                            $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                            $stmt->execute();
                        }
                    }else{
                        if($this->isDifferent($rowInstallationSettings["powerOptimizerExternalMeter"],0)){
                            $this->appendToChangeLog("powerOptimizerExternalMeter: 0");
                            $stmt = $this->webconfigDB->prepare("UPDATE installationSettings SET powerOptimizerExternalMeter= :powerOptimizerExternalMeter WHERE ID= :ID");
                            $stmt->bindValue(':powerOptimizerExternalMeter', 0, SQLITE3_INTEGER);
                            $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                            $stmt->execute();
                        }
                    }
                }else{
                    if($this->isDifferent($rowInstallationSettings["powerOptimizer"],0)){
                        $this->appendToChangeLog("powerOptimizer: 0" );
                        $stmt = $this->webconfigDB->prepare("UPDATE installationSettings SET powerOptimizer= :powerOptimizer WHERE ID= :ID");
                        $stmt->bindValue(':powerOptimizer', 0, SQLITE3_INTEGER);
                        $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                    }
                    if($this->isDifferent($rowInstallationSettings["powerOptimizerTotalCurrent"],10)){
                        $this->appendToChangeLog("powerOptimizer: 10" );
                        $stmt = $this->webconfigDB->prepare("UPDATE installationSettings SET powerOptimizerTotalCurrent= :powerOptimizerTotalCurrent WHERE ID= :ID");
                        $stmt->bindValue(':powerOptimizerTotalCurrent', 10, SQLITE3_INTEGER);
                        $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                    }
                    if($this->isDifferent($rowInstallationSettings["powerOptimizerExternalMeter"],0)){
                        $this->appendToChangeLog("powerOptimizerExternalMeter: 0" );
                        $stmt = $this->webconfigDB->prepare("UPDATE installationSettings SET powerOptimizerExternalMeter= :powerOptimizerExternalMeter WHERE ID= :ID");
                        $stmt->bindValue(':powerOptimizerExternalMeter', 0, SQLITE3_INTEGER);
                        $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                    }
                }
                if($this-> changeLog){
                    ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
                }
            }
        }

        public function saveFollowTheSunMode($followTheSunMode){
            $stmt = $this->webconfigDB->prepare("UPDATE installationSettings SET followTheSunMode= :followTheSunMode WHERE ID= :ID");
            $stmt->bindValue(':followTheSunMode', $followTheSunMode, SQLITE3_INTEGER);
            $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
            $stmt->execute();
        }

        public static function saveAutoPhaseSwitching($autoPhaseSwitching, $webconfigDB){
            if (in_array($autoPhaseSwitching, Constants::$binary_options)) {
                $stmt = $webconfigDB->prepare("UPDATE installationSettings SET autoPhaseSwitching= :autoPhaseSwitching WHERE ID= :ID");
                $stmt->bindValue(':autoPhaseSwitching', $autoPhaseSwitching, SQLITE3_INTEGER);
                $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                $stmt->execute();
            }
        }

        private function checkOperationModeValue($operationMode){
            return in_array($operationMode,[1,2,3,4]);
        }
        private function checkPowerOptimizerValue($powerOptimizerValue){
            return in_array($powerOptimizerValue,[0,1]);
        }
        private function checkPowerOptimizerTotalCurrentValue($powerOptimizerTotalCurrentValue){
            return in_array($powerOptimizerTotalCurrentValue,$this->powerOptimizerTotalCurrentValues);
        }

        private function checkPowerOptimizerExternalMeterValue($powerOptimizerExternalMeterValue){
            return in_array($powerOptimizerExternalMeterValue,$this->powerOptimizerExternalMeterOptions);
        }

        private function checkPowerOptimizerValues($powerOptimizerValue,$powerOptimizerTotalCurrentValue,$powerOptimizerExternalMeterValue,$operationModeValue){
            $operation_mode_check = $this->checkOperationModeValue($operationModeValue);
            $power_optimizer_check = $this->checkPowerOptimizerValue($powerOptimizerValue);
            $power_optimizer_total_current_check = $this->checkPowerOptimizerTotalCurrentValue($powerOptimizerTotalCurrentValue);
            $power_optimizer_external_meter_check = $this->checkPowerOptimizerExternalMeterValue($powerOptimizerExternalMeterValue);
            return $operation_mode_check && $power_optimizer_check && $power_optimizer_total_current_check && $power_optimizer_external_meter_check;
        }
    }

    class currentLimiterSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        private $current_min_val;
        private $current_max_val;
        private $chargePointStatus;
        public $changeLog = "";
        public function __construct($dbConnection,$current_min_val,$current_max_val, $chargePointStatus) {
            $this->webconfigDB = $dbConnection;
            $this->current_min_val = $current_min_val;
            $this->current_max_val = $current_max_val;
            $this->chargePointStatus = $chargePointStatus;
        }

        public function saveCurrentLimiterSettings($currentLimiterPhase,$currentLimiterValue){
            $stmt = $this->webconfigDB->prepare("SELECT * from installationSettings");
            $installationSettings = $stmt->execute(); 
            $rowInstallationSettings = $installationSettings->fetchArray();   

            if (!$this->isPhaseChangeAllowed($rowInstallationSettings["currentLimiterPhase"], $currentLimiterValue)){
                return false;
            }

            if($this->checkCurrentPhase($currentLimiterPhase) && $this->checkCurrentLimiterInterval($currentLimiterValue)){
                if($this->isDifferent($rowInstallationSettings["currentLimiterPhase"],$currentLimiterPhase)){
                    $this->appendToChangeLog("currentLimiterPhase: ". $currentLimiterPhase);
                    $stmt = $this->webconfigDB->prepare("UPDATE installationSettings SET currentLimiterPhase= :currentLimiterPhase WHERE ID= :ID");
                    $stmt->bindValue(':currentLimiterPhase', $currentLimiterPhase, SQLITE3_INTEGER);
                    $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this->isDifferent($rowInstallationSettings["currentLimiterValue"],$currentLimiterValue)){
                    $this->appendToChangeLog("currentLimiterValue: ". $currentLimiterValue);
                    $stmt = $this->webconfigDB->prepare("UPDATE installationSettings SET currentLimiterValue= :currentLimiterValue WHERE ID= :ID");
                    $stmt->bindValue(':currentLimiterValue', $currentLimiterValue, SQLITE3_INTEGER);
                    $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this-> changeLog){
                    ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
                }
                sendZeroMqMessage("installationUpdate");
            }
        }

        private function isPhaseChangeAllowed($currentPhase, $currentLimiterPhase){
            if ($this->chargePointStatus === "Charging" && $currentPhase != $currentLimiterPhase){
                return false;
            }
            return true;
        }

        private function checkCurrentPhase($currentLimiterPhase){
            return in_array($currentLimiterPhase,[0,1]);
        }

        private function checkCurrentLimiterInterval($currentLimiterValue) {
            if (empty($currentLimiterValue) || !is_numeric($currentLimiterValue)) {
                return false;
            }
            if ($currentLimiterValue < $this->current_min_val || $currentLimiterValue > $this->current_max_val) {
                return false;
            }

            return true;
        }
    }

    class qrCodeSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        private $backlightDimmingLvl;
        public $changeLog = "";
        public function __construct($dbConnection,$backlightDimmingLvl) {
            $this->webconfigDB = $dbConnection;
            $this->backlightDimmingLvl = $backlightDimmingLvl;
        }

        public function saveQrCode($postData){
            $stmt = $this->webconfigDB->prepare("SELECT * FROM generalSettings WHERE id= :id");
            $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
            $generalSettings = $stmt->execute();
            $rowGeneral = $generalSettings->fetchArray();
            $qr_code = $postData["qrCodeSelection"];
            if(in_array($qr_code, Constants::$binary_options)){
                if($qr_code == 1){
                    $qr_code_delimiter = $postData['qrCodeDelimiter'];
                    if($this->checkQrCodeDelimeter($qr_code_delimiter) && $this->isDifferent($rowGeneral["qrCodeDelimiter"],$qr_code_delimiter)){
                        $this->appendToChangeLog("qrCodeDelimiter: " . $qr_code_delimiter);
                        $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET qrCodeDelimiter= :qrCodeDelimiter WHERE ID= :ID");
                        $stmt->bindValue(':qrCodeDelimiter', $qr_code_delimiter, SQLITE3_TEXT);
                        $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                    }

                    $adhoc_url_prefix = $postData['adhocUrlPrefix'];
                    if ($this->isDifferent($rowGeneral['AdhocUrlPrefix'], $adhoc_url_prefix)) {
                        $this->appendToChangeLog("AdhocUrlPrefix: " . $adhoc_url_prefix);
                        $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET AdhocUrlPrefix= :AdhocUrlPrefix WHERE ID= :ID");
                        $stmt->bindValue(':AdhocUrlPrefix', $adhoc_url_prefix, SQLITE3_TEXT);
                        $stmt->bindValue(':ID', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                    }

                    if($this->backlightDimmingLvl == "veryLow"){
                        $this->appendToChangeLog("backlightDimmingLvl: low");
                        $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET backlightDimmingLvl= :backlightDimmingLvl WHERE id= :id");
                        $stmt->bindValue(':backlightDimmingLvl', 'low', SQLITE3_TEXT);
                        $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                        $stmt->execute();
                    }

                }
                if($this->isDifferent($rowGeneral["qrCode"],$qr_code)){
                    $this->appendToChangeLog("qrCode: " . $qr_code);
                    $stmt = $this->webconfigDB->prepare("UPDATE generalSettings SET qrCode= :qrCode WHERE id= :id");
                    $stmt->bindValue(':qrCode', $qr_code, SQLITE3_INTEGER);
                    $stmt->bindValue(':id', 1, SQLITE3_INTEGER);
                    $stmt->execute();
                }
                if($this-> changeLog){
                    ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
                }
                sendZeroMqMessage("generalUpdate");
            }
        }

        private function checkQrCodeDelimeter($qr_code_delimiter){
            if(!empty($qr_code_delimiter) && empty(trim($qr_code_delimiter))){
                return false;
            }
            else if (!empty(trim($qr_code_delimiter)) && !preg_match('/^[@+.,0-9:;!#^$%&\/()\[\]{}=*?_<>|-]{1,3}$/', $qr_code_delimiter)) {
                return false;
            }
            return true;
        }

    }

    class LogSettings{
        use ChangeLogTrait;
        private $webconfigDB;
        private $dateRegex;
        public $changeLog = "";
        public function __construct($dbConnection) {
            $this->webconfigDB = $dbConnection;
            $this->dateRegex = '/^(\d{4})-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/';
        }
        public function saveLogSettings($logsStartDate,$logsEndDate) {
            $logSettings = $this->webconfigDB->query("SELECT * FROM logSettings WHERE id='1'");
            $rowLogs = $logSettings->fetchArray();
            if (preg_match($this->dateRegex, $logsStartDate) && preg_match($this->dateRegex, $logsEndDate)){
                if($this->isDifferent($rowLogs["logsStartDate"],$logsStartDate)){
                    $this->appendToChangeLog("logsStartDate: " . $logsStartDate);
                    $this->webconfigDB->query("UPDATE logSettings SET logsStartDate='$logsStartDate' WHERE id='1'");
                }
                if($this->isDifferent($rowLogs["logsEndDate"],$logsEndDate)){
                    $this->appendToChangeLog("logsEndDate: " . $logsEndDate);
                    $this->webconfigDB->query("UPDATE logSettings SET logsEndDate='$logsEndDate' WHERE id='1'");
                }
            }
            if($this-> changeLog){
                ChangeLog:: saveChangeLog($this-> changeLog, $_SESSION["username"]);
            }
        }
    }

    class ChangeLog {
        public static $LOG_DATABASE = "/var/lib/vestel-persistent/webconfigChangeLog.db";
        public static $SERVICE = "WEBCONFIG";

        public static function saveChangeLog($event, $username) {
            if (file_exists(self::$LOG_DATABASE)) {
                error_log($event);
                $logger_db = new SQLite3(self::$LOG_DATABASE);
                $logger_db->busyTimeout(10000);
                if (!$logger_db) {
                    die("Unable to connect");
                }
                $stmt = $logger_db->prepare("INSERT INTO changeLog (service, timeStamp, user, change) VALUES (:service, :timestamp, :username, :event)");
                if (!$stmt) {
                    die("Unable to prepare statement");
                }
                $timezone = new DateTimeZone('UTC');
                $date = new DateTime('now', $timezone);
                $iso_zoned_date_time = $date->format(DateTime::ATOM);

                $stmt->bindValue(':service', self::$SERVICE);
                $stmt->bindValue(':timestamp', $iso_zoned_date_time);
                $stmt->bindValue(':username',$username);
                $stmt->bindValue(':event', $event);
                $result = $stmt->execute();
                if (!$result) {
                    die("Unable to execute statement");
                }
                $logger_db->close();
            }
        }
    }

    ?>

