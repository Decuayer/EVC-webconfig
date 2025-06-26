<?php
include_once "access_control.php";
define("_LOGIN", "LOG IN");
define("_USERNAME", "User Name:");
define("_PASSWORD", "Password:");
define("_CHANGEPASSWORD", "Change Password");
define("_CURRENTPASSWORD", "Current password:");
define("_NEWPASSWORD", "New password:");
define("_CONFIRMNEWPASSWORD", "Confirm new password:");
define("_SUBMIT", "Submit");
define("_CURRENTPASSWORDREQUIRED", "Current password is required");
define("_PASSWORDREQUIRED", "Password is required");
define("_USERNAMEREQUIRED", "Username is required");
define("_USERAUTHFAILED", "User authentication failed!");
define("_USERNAMEORCURRENTPASSWORDWRONG", "Username or current password is wrong!");
define("_DBACCESSFAILURE", "Cannot access the database!");
define("_CHANGEPASSWORDERROR", "You must first change your password!");
define("_SAMEPASSWORDERROR", "Current and new password should be different from each other!");
define("_PASSWORDMATCHERROR", "Passwords do not match!");
define("_CURRENTPASSWORDWRONG", "Current password is wrong!");
define("_PASSWORDERRORLEVEL2", "Password is invalid, character length must be 20 and contain at least two letters [A-Za-z], two digits [0-9] and two special characters [!%&/()=?*#+-_]");
define("_PASSWORDERRORLEVEL3", "The password is invalid, the character length must be at least 12, maximum 32 characters and contains at least two lowercase [a-z] and two uppercase letters [A-Z], two numbers [0-9] and at least two special characters [!%&/()=?*#+-_].");
define("_LOGINLOCKOUT", "Too many failed attempts. Please try after 1800 seconds.");

define("_MAINPAGE", "Main Page");
define("_GENERAL", "General Settings");
define("_OCPPSETTINGS", "OCPP Settings");
define("_NETWORKINTERFACES", "Network Interfaces");

define("_OCPPCONNINTERFACE", "OCPP Connection Interface : ");
define("_CONNECTIONSTATE", "Connection State : ");
define("_DISCONNECTED", "Disconnected");
define("_NEEDTOLOGINFIRST", "You need to login first!");
define("_CONNECTED", "Connected");
define("_CPSERIALNUMBER", "CP Serial Number : ");
define("_HMISOFTWAREVERSION", "HMI Software Version : ");
define("_OCPPSOFTWAREVERSION", "OCPP Software Version : ");
define("_POWERBOARDSOFTWAREVERSION", "Power Board Software Version : ");
define("_OCPPDEVICEID", "OCPP Device ID : ");
define("_DURATIONAFTERPOWERON", "Duration after power on : ");
define("_LOGOUT", "Log out");
define("_PRESET", "Pre-Sets:");

define("_OCPPCONNECTION", "OCPP Connection");
define("_ENABLED", "Enabled");
define("_DISABLED", "Disabled");
define("_CONNECTIONSETTINGS", "Connection Settings");
define("_CENTRALSYSTEMADDRESS", "Central System Address ");
define("_CHARGEPOINTID", "Charge Point ID ");
define("_OCPPVERSION", "OCPP Version");
define("_SAVE", "Save");
define("_SAVESUCCESSFUL", "Successfully saved.");
define("_CENTRALSYSTEMADDRESSERROR", "Central system address is required!");
define("_CHARGEPOINTIDERROR", "Charge point id is required!");
define("_SECONDS", "Seconds");
define("_ADD", "Add");
define("_REMOVE", "Remove");
define("_SAVECAPITAL", "SAVE");
define("_CANCEL", "Cancel");

define("_CELLULAR", "Cellular");
define("_INTERFACEIPADDRESS", "Interface IP Address: ");
define("_ICCID", "ICCID: ");
define("_IMSI", "IMSI: ");
define("_IMEI", "IMEI: ");
define("_APNNAME", "APN Name: ");
define("_APNUSERNAME", "APN Username: ");
define("_APNPASSWORD", "APN Password: ");
define("_IPSETTING", "IP Setting: ");
define("_IPADDRESS", "IP Address: ");
define("_NETWORKMASK", "Network Mask: ");
define("_DEFAULTGATEWAY", "Default Gateway: ");
define("_PRIMARYDNS", "Primary DNS: ");
define("_SECONDARYDNS", "Secondary DNS: ");
define("_WIFI", "WLAN");
define("_SECURITY", "Security: ");
define("_SECURITYTYPE", "Select security type");
define("_NONE", "None");
define("_SELECTMODE", "Please select mode!");
define("_RFIDLOCALLIST", "RFID Local List");
define("_ACCEPTALLRFIDS", "Accept All RFID&#39s");
define("_MANAGERFIDLOCALLIST", "Manage RFID Local List:");
define("_AUTOSTART", "Autostart");
define("_PROCESSING", "Processing... Please wait...");
define("_MACADDRESS", "MAC Address: ");
define("_WIFIHOTSPOT", "Wi-Fi Hotspot");
define("_TURNONDURINGBOOT", "Turn on during boot: ");
define("_AUTOTURNOFFTIMEOUT", "Auto turn off timeout: ");
define("_AUTOTURNOFF", "Auto turn off: ");
define("_HOTSPOTALERTMESSAGE", "Hotspot setting changes will take effect the next time the device is turned on. ");
define("_HOTSPOTREBOOTMESSAGE", "Do you want to reboot now? ");

define("_DOWNLOADACLOGS", "Download AC Logs");
define("_DOWNLOADCELLULARLOGS", "Download Cellular Module Logs");
define("_DOWNLOADPOWERBOARDLOGS", "Download Power Board Logs");
define("_PASSWORDRESETSUCCESSFUL", "Your password has been successfully reset.");
define("_DBOPENEDSUCCESSFULLY", "Opened database successfully\n");
define("_WSSCERTSSETTINGS", "WSS Certificates Settings ");
define("_CONFKEYS", "Configuration Keys");
define("_KEY", "Key");
define("_STATIC", "Static");
define("_TIMEZONE", "Timezone");
define("_PLEASESELECTTIMEZONE", "Please Select Timezone");
define("_DISPLAYSETTINGS", "Display Settings");
define("_DISPLAYLANGUAGE", "Display Language");
define("_BACKLIGHTDIMMING", "Backlight Dimming : ");
define("_PLEASESELECT", "Please select");
define("_TIMEBASED", "Time Based");
define("_SENSORBASED", "Sensor Based");
define("_BACKLIGHTDIMMINGLEVEL", "Backlight Dimming Level : ");
define("_BACKLIGHTTHRESHOLD", "Backlight Threshold : ");
define("_SETMIDTHRESHOLD", "SetMidThreshold");
define("_SETHIGHTHRESHOLD", "SetHighThresold");
define("_LOCALLOADMANAGEMENT", "Local Load Management");
define("_MINIMUMCURRENT", "Minimum Current: ");
define("_FIFOPERCENTAGE", "FIFO Percentage: ");
define("_GRIDMAXCURRENT", "Grid Maximum Current: ");
define("_MASTERIPADDRESS", "IP Address of Master: ");
define("_BACKLIGHTTIMESETTINGS", "Backlight Time Settings: ");
define("_SHOULDSELECTTIMEZONE", "* You have to select timezone!");
define("_MINIMUMCURRENTREQUIRED", "* Minimum current is required!");
define("_CURRENTMUSTBENUMERIC", "* Current must be numeric!");
define("_FIFOPERCREQUIRED", "* FIFO percentage is required!");
define("_FIFOPERCSHOULDBETWEEN", "* FIFO percentage must be between 0 and 100!");
define("_PERCMUSTBENUMERIC", "* Percentage must be numeric!");
define("_GRIDMAXCURRENTREQUIRED", "* Grid maximum current is required!");
define("_GRIDCURRENTMUSTBENUMERIC", "* Grid current must be numeric!");
define("_IPADDRESSOFMASTERREQUIRED", "* IP address of master is required!");
define("_INVALIDIPADDRESS", "* You have entered an invalid IP address!");
define("_SAMENETWORKLAN", "* You have entered an IP address in the same network with LAN!");
define("_SAMENETWORKWLAN", "* You have entered an IP address in the same network with WLAN!");
define("_APNISREQUIRED", "APN is required!");
define("_IPADDRESSREQUIRED", "IP address is required!");
define("_NETWORKMASKREQUIRED", "Network mask is required!");
define("_INVALIDNETWORKMASK", "* You have entered an invalid network mask!");
define("_DEFAULTGATEWAYREQUIRED", "Default gateway is required!");
define("_INVALIDGATEWAY", "You have entered an invalid default gateway!");
define("_PRIMARYDNSREQUIRED", "Primary dns is required!");
define("_INVALIDDNS", "You have entered an invalid dns!");
define("_SELECTIPSETTING", "Please select IP setting.");
define("_SSIDREQUIRED", "SSID is required!");
define("_PASSWORDISREQUIRED", "Password is required!");
define("_WIFIPASSWORDERROR", "Password is invalid, character length must be minimum 8 and maximum 63 <br> valid characters a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL2", "&#8226; Password is invalid, character length must be 20,<br>&#8226; Password must contain at least two letters [A-Za-z],<br>&#8226; Password must contain at least two digits [0-9],<br>&#8226; Password must contain at least two special characters [!%&/()=?*#+-_]");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL3", "&#8226; Password is invalid, character length must be at least 12, maximum 32,<br>&#8226; Password must contain at least two lowercase letters [a-z], <br>&#8226; Password must contain at least two uppercase letters [A-Z], <br>&#8226; Password must contain at least two digits [0-9],<br>&#8226; Password must contain at least two special characters [!%&/()=?*#+-_]");
define("_WIFISSIDERROR", "SSID is invalid, valid characters a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_SELECTSECURITYTYPE", "Please select security type");
define("_HOSTIPREQUIRED", "* Host IP is required!");
define("_CERTMANREQUIRED", "* Certification management is required!");
define("_OCPPENABLEALERT", "If you want to use your Charging Station in Standalone Mode,<br>first you need to disable OCPP connection<br>from &#39OCPP Settings Menu&#39.");
define("_NOTSAVEDALERT", "Page was not saved.");
define("_SAVEQUESTION", "Do you want to save the changes?");
define("_OKBUTTON", "OK");
define("_LTECONNECTIONCONFIRM", "Cellular connection will be disabled. Do you confirm?");
define("_WIFICONNECTIONCONFIRM", "Wi-Fi connection will be disabled. Do you confirm?");
define("_DHCPSERVERCONNECTIONCONFIRM", "If you want to enable LAN DHCP Server,<br>first you need to disable Wi-Fi Hotspot<br>from &#39Wi-Fi Hotspot&#39.");
define("_WIFIHOTSPOTCONNECTIONCONFIRM", "If you want to enable Wi-Fi Hotspot,<br>first you need to disable LAN DHCP Server<br>from &#39LAN IP Setting&#39.");

define("_DYNAMIC", "Dynamic");
define("_DIAGNOSTICS", "Diagnostics");
define("_LOCALLOAD", "Local Load Management");
define("_DOWNLOAD", "Download");
define("_STARTDATE", "Start Date");
define("_ENDDATE", "End Date");
define("_CLEAREVENTLOGS", "Clear All Event Logs");
define("_CLEAREVENTLOGSINFO", "This will clear all event logs!");
define("_DOWNLOADEVENTLOGSINFO", "Download device event logs for a maximum of 5 days of period");
define("_DEVICEEVENTLOGS", "Device Event Logs");
define("_DEVICECHANGELOGS", "Device Change Logs");
define("_LOGSDATEERROR", "Please select dates for a maximum period of 5 days.");
define("_DOWNLOACHANGELOGS", "Download Device Change Logs");
define("_VPNFUNCTIONALITY", "VPN Functionality: ");
define("_CERTMANAGEMENT", "Certification Management: ");
define("_NAME", "Name: ");
define("_CONNECTIONINTERFACE", "Connection Interface ");
define("_ANY", "Any");
define("_OCPPCONNPARAMETERS", "OCPP Configuration Parameters");
define("_SETDEFAULT", "Set to Defaults ");
define("_STANDALONEMODE", "Standalone Mode");
define("_STANDALONEMODETITLE", "Standalone Mode:");
define("_STANDALONEMODENOTSELECTED", "* Standalone mode cannot be selected since OCPP is enabled.");
define("_CHARGERWEBUI", "Charger Web User Interface");
define("_SYSTEMMAINTENANCE", "System Maintenance");
define("_HOSTIP", "Host IP: ");
define("_PASSWORDERRORLEVEL1", "Password is invalid, character length must be minimum 6 characters and contain at least 1 lowercase letter, 1 uppercase letter and 1 numeric character!");
define("_SELECTBACKLIGHTDIMMING", "* You have to select backlight dimming!");
define("_ISREQUIRED", "is required!");
define("_ISNOTVALID", "is not valid!");
define("_ISDUPLICATED", "is duplicated!");
define("_MUSTBENUMERIC", "must be numeric!");
define("_VPNFUNCTIONALITYREQUIRED", "* Vpn functionality is required!");
define("_VPNNAMEREQUIRED", "* Vpn name is required!");
define("_VPNPASSWORDREQUIRED", "* Vpn password is required!");
define("_EXPLANATION", "Indicates required field.");
define("_FIRMWAREUPDATE", "Firmware Updates");
define("_BACKUPRESTORE", "Configuration Backup & Restore");
define("_SYSTEMRESET", "System Reset");
define("_CHANGEADMINPASSWORD", "Administration Password");
define("_FACTORYRESET", "Factory Default");
define("_FACTORYRESETBUTTON", "Factory Reset");
define("_FACTORYDEFAULTCONFIGURATION", "Factory Default Configuration");
define("_LOGFILES", "Log Files");
define("_BACKUPFILE", "Backup File");
define("_RESTOREFILE", "Restore Config File");
define("_FREEMODEMAXCHARACTER", "must be maximum 32 characters!");
define("_RESTOREMESSAGE", "Do you confirm to apply changes and reboot now?");

define("_TURKISH", "Türkçe");
define("_ROMANIAN", "Română");
define("_ENGLISH", "English");
define("_GERMAN", "Deutsch");
define("_FRENCH", "Français");
define("_SPANISH", "Español");
define("_ITALIAN", "Italiano");
define("_FINNISH", "Suomi");
define("_NORWEGIAN", "Norsk");
define("_SWEDISH", "Svenska");
define("_DUTCH", "Nederlands");
define("_HEBREW", "עב&#39ת");
define("_DANISH", "Dansk");
define("_CZECH", "Čeština");
define("_POLISH", "Polski");
define("_HUNGARIAN", "Magyar");
define("_SLOVAK", "Slovák");
define("_BULGARIAN", "български");
define("_GREEK", "Ελληνικά");
define("_MONTENEGRIN", "црногорски");
define("_BOSNIAN", "босански");
define("_SERBIAN", "Srpski Jezik");
define("_CROATIAN", "Hrvatski");

define("_PASSWORDTYPEEXPLANATION", "Your password must be 6 characters and it contain at least one uppercase
letter,one lower case letter,one number digit.");

define("_PASSWORDTYPEEXPLANATIONLEVEL2", "Your password must be 20 characters and it contains at least two
letters,two number digits and two special characters.");

define("_PASSWORDTYPEEXPLANATIONLEVEL3", "Your password must be minimum 12, maximum 32 characters and it contains at least two uppercase letters,
two lower case letters, two number digits and two special characters.");
define("_BACKTOLOGIN", "Back to Login");
define("_CHANGE", "Change");
define("_SYSTEMADMINISTRATION", "System Administration");
define("_UPDATE", "Update");
define("_CONFIRM", "Confirm");
define("_FACTORYDEFAULTCONFIRM", "Are you sure to reset back to factory defaults?");
define("_FILENAME", "File Name");
define("_UPLOAD", "Upload");
define("_SELECTFIRMWARE", "Select Firmware Update file from Pc");
define("_FIRMWAREFILESIZE", "Please check the size of the firmware file.");
define("_FIRMWAREFILETYPE", "Please check the type of the firmware file.");

define("_LESSTHANOREQUAL4", "must be between 1 and 4");
define("_LESSTHANOREQUAL20", "must be less than or equal to 20");
define("_LESSTHANOREQUAL65000", "must be less than or equal to 65000");
define("_LESSTHANOREQUAL300", "must be less than or equal to 300");
define("_LESSTHANOREQUAL86500", "must be less than or equal to 86500");
define("_LESSTHANOREQUAL10000", "must be less than or equal to 10000");
define("_LESSTHANOREQUAL22", "must be less than or equal to 22");
define("_LESSTHANOREQUAL10", "must be less than or equal to 10");
define("_LESSTHANOREQUAL600", "must be less than or equal to 600");
define("_LESSTHANOREQUAL120", "must be less than or equal to 120");
define("_HIGHTHANOREQUAL0", "must be higher than or equal to 0");
define("_CHANGEPASSWORDSUGGESTION", "We recommend you to change your default password from system maintenance menu");

define("_FILESIZE", "Please check the size of the  file.");
define("_FILETYPE", "Please check the type of the  file.");

define("_BACKUPVERSIONCHECK", "This file&#39s version is not suitable for the device.");
define("_HARDRESETCONFIRM", "Are you sure to Hard Reset?");
define("_SOFTRESETCONFIRM", "Are you sure to Soft Reset?");
define("_NEWSETUP", "Please use the user&#39s manuel the for the new setup.");

define("_LOADMANAGEMENT", "Load Management");
define("_CPROLE", "Charge Point Role");
define("_GRIDSETTINGS", "Grid Settings");
define("_LOADMANAGEMENTMODE", "Load Management Mode");
define("_LOADMANAGEMENTGROUP", "Load Management Group");
define("_LOADMANAGEMENTOPTION", "Load Management Option");
define("_ALARMS", "Alarms");

define("_MASTER", "Master");
define("_SLAVE", "Slave");
define("_TOTALCURRENTLIMIT", "Total Current Limit Per Phase");
define("_SUPPLYTYPE", "Supply Type");
define("_FIFOPERCANTAGE", "FIFO Percentage");
define("_TIC", "TIC");
define("_EQUALLYSHARED", "Equally Shared");
define("_COMBINED", "Combined");
define("_TOTALCURRENTLIMITERROR", "Total Current Limit Per Phase is required!");
define("_LESSTHAN1024", "must be less than 1024");
define("_ATLEAST0", "must be at least 0");
define("_MORETHAN12", "must be more than 12");
define("_CHOOSEONE", "Choose one");
define("_SLAVEMINCHCURRENT", "Offline Failsafe Charging Current Setting");
define("_SERIALNO", "Serial Number");
define("_CONNECTORSTATE", "Connector State");
define("_NUMBEROFPHASES", "Number of Phases");
define("_PHASECONSEQUENCE", "Phase Connection Sequence");
define("_VIP", "VIP Charging");
define("_CPMODE", "CP Mode");
define("_VIPERROR", "VIP Charging is required");
define("_PHASECONSEQUENCEERROR", "Phase Connection Sequence is required!");
define("_CPMODEERROR", "CP Mode is required!");
define("_SUPPORTEDCURRENT", "Supported Current");
define("_INSTANTCURPERPHASE", "Instant Current Phase");
define("_FIFOCHARGINGPERCENTAGE", "FIFO Charging Percentage");
define("_MINIMUMCURRENT1P", "Minimum Charging Current 1-Phase");
define("_MINIMUMCURRENT3P", "Minimum Charging Current 3-Phase");
define("_MAXIMUMCURRENT", "Maximum Charging Current");
define("_STEP", "Step");
define("_UPDATEDLMGROUP", "Update DLM Group");
define("_MAINCIRCUITCURRENT", "Maximum Grid Current");
define("_MAINCIRCUITCURRENTERROR", "Maximum Grid Current is required!");
define("_DLMMAXCURRENT", "DLM Total Current Limit Per Phase");
define("_DLMMAXCURRENTERROR", "DLM Total Current Limit Per Phase is required!");
define("_DLMMAXCURRENTMORETHANMAIN", "DLM Total Current Limit should be more than half of Main Circuit Breaker Current");
define("_DLMMAXCURRENTLESSTHANMAIN", "DLM Total Current Limit should be less than Main Circuit Breaker Current");

define("_LOGOSETTINGS", "Logo Settings");
define("_USELOGO", "Select logo file from Pc");
define("_LOGOTYPE", "Please select a logo with png format.");
define("_LOGODIMENSION", "The maximum allowed logo size is 80x80, please select a logo with the appropriate size.");

define("_SERVICECONTACTINFO", "Display Service Contact Info");
define("_SERVICECONTACTINFOCHARACTER", "Display Service Contact Info must be maximum 25 characters!<br>Valid characters a..z 0..9 .+@*");

define("_SCREENTHEME", "Display Theme");
define("_DARKBLUE", "Dark Blue");
define("_ORANGE", "Orange");
define("_PLEASEENTERRFIDLOCALLIST", "Please enter RFID local list!");

define("_DHCPSERVER", "DHCP Server");
define("_DHCPCLIENT", "DHCP Client");

define("_MAXDHCPADDRRANGE", "DHCP Server End IP Address");
define("_MINDHCPADDRRANGE", "DHCP Server Start IP Address");

define("_MAXDHCPADDRRANGEERROR", "DHCP Server End IP Address is required!");
define("_MINDHCPADDRRANGEERROR", "DHCP Server Start IP Address is required!");
define("_DIFFERENCEBETWEENMAXANDMINADDRRANGE", "DHCP Server End IP Address should be greater than DHCP Server Start IP Address");
define("_IPADDRESSRANGE", "IP Address can not take a value between DHCP Server Start and End IP Addresses");

define("_CELLULARGATEWAY", "Cellular Gateway");
define("_INVALIDSUBNET", "Ip Adress is not in the true subnet");

define("_CONNECTIONSTATUS", "Connection Status");

define("_INSTALLATIONSETTINGS", "Installation Settings");
define("_EARTHINGSYSTEM", "Earthing System");
define("_CURRENTLIMITERSETTINGS", "Current Limiter Settings");
define("_CURRENTLIMITERPHASE", "Current Limiter Phase");
define("_CURRENTLIMITERVALUE", "Current Limiter Value");
define("_UNBALANCEDLOADDETECTION", "Unbalanced Load Detection");
define("_EXTERNALENABLEINPUT", "External Enable Input");
define("_LOCKABLECABLE", "Lockable Cable");
define("_POWEROPTIMIZERTOTALCURRENTLIMIT", "Power Optimizer Total Current Limit");
define("_POWEROPTIMIZER", "Power Optimizer");
define("_TNORTT", "TN/TT");
define("_SPLITPHASE", "IT/Split Phase");
define("_ONEPHASE", "One Phase");
define("_THREEPHASE", "Three Phase");
define("_POWEROPTIMIZERTOTALCURRENTLIMITMORETHANOREQUAL16", "Power optimizer total <br> current  limit must be more <br> than or  equal to 16");
define("_POWEROPTIMIZERTOTALCURRENTLIMITLESSTHANOREQUAL100", "Power optimizer total <br> current limit must be less <br> than or equal to 100");
define("_FOLLOWTHESUN", "Follow The Sun");
define("_FOLLOWTHESUNMODE", "Follow The Sun Mode");
define("_AUTOPHASESWITCHING", "Auto Phase Switching");
define("_MAXHYBRID", "Max Hybrid");
define("_SUNONLY", "Sun Only");
define("_SUNHYBRID", "Sun Hybrid");

define("_DISPLAYBACKLIGHTSETTINGS", "Display Backlight Settings");
define("_BACKLIGHTLEVEL", "Backlight Level");
define("_SUNRISETIME", "Sunrise Time ");
define("_SUNSETTIME", "Sunset Time");

define("_HIGH", "High");
define("_MID", "Mid");
define("_LOW", "Low");

define("_A", " (A)");

define("_CURRENTLIMITERVALUELESSTHAN8", "* When EVReadySupport on and Current Limiter Phase is one phase, current limiter value must not be less than 8!");
define("_CURRENTLIMITERVALUELESSTHAN14", "* When EVReadySupport on and Current Limiter Phase is three phase, current limiter value must not be less than 14!");

define("_LEDDIMMINGSETTINGS", "Led Dimming Settings");
define("_LEDDIMMINGLEVEL", "Led Dimming Level");
define("_VERYLOW", "Very Low");
define("_WARNINGFORLTEENABLED", "LAN interface IP setting mode will be set as static and DHCP Server will be activated.");
define("_WARNINGFORLTEDISABLED", "LAN interface IP setting mode will be set as DHCP Client and DHCP Server will be inactivated.");
define("_ACCEPTQUESTION", "Do you accept the changes?");

define("_CELLULARGATEWAYCONFIRM", "Cellular Gateway will be disabled.");

define("_ETHERNETIP", "Ethernet Interface IP:");
define("_WLANIP", "WLAN Interface IP:");
define("_STRENGTH", "Strength");
define("_WIFIFREQ", "Frequency");
define("_WIFILEVEL", "Level");
define("_CELLULARIP", "Cellular Interface IP:");
define("_CELLULAROPERCODE" , "Oparator");
define("_CELLULARTECH" , "Technology");
define("_SCANNETWORKS" , "Scan Networks");
define("_AVAILABLENETWORKS" , "Available Networks");
define("_NETWORKSTATUS" , "Network Status");
define("_PLEASEWAITMSG" , "Please Wait...");
define("_SCANNINGWIFIMSG" , "Scanning Wi-Fi Networks");
define("_NOWIFIFOUNDMSG" , "No Wi-Fi Networks Found");
define("_PLEASECHECKWIFICONNMSG" , "Please check your Wi-Fi connection and try again.");

define("_APPLICATIONRESTART", "This change requires application restart.");

define("_QRCODE", "Display QR Code");
define("_QRCODEONSCREEN", "QR Code On Screen");
define("_QRCODEDELIMITER", "QR Code Delimiter");
define("_INVALIDDELIMITERCHARACTER", "QR code delimiter is invalid, whitespace character is not acceptable, character length must be minimum 1 and maximum 3<br> valid characters 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");

define("_LOCATION", "Location");
define("_INDOOR", "Indoor");
define("_OUTDOOR", "Outdoor");
define("_POWEROPTIMIZEREXTERNALMETER", "External Meter");
define("_OPERATIONMODE", "Operation Mode");
define("_AUTOSELECTED", "Auto Selected");
define("_NOTSELECTED", "Not Selected");
define("_CHARGINGMODESELECTIONANDPOWEROPTIMIZERCONF", "Charging Mode Selection and Power Optimizer Configuration");

define("_USERINTERACTION", "User Interaction");

define("_STANDBYLEDBEHAVIOUR", "Standby LED Behaviour");
define("_OFF", "Off");
define("_ON", "On");

define("_LOADSHEDDINGMINIMUMCURRENT", "Load Shedding Minimum Current");
define("_UNBALANCEDLOADDETECTIONMAXCURRENT", "Unbalanced Load Detection Max Current");

define("_SCHEDULEDCHARGING", "Scheduled Charging");
define("_OFFPEAKCHARGING", "Off-peak Charging");
define("_OFFPEAKCHARGINGWEEKENDS", "Off-peak Charging at the Weekends");
define("_OFFPEAKCHARGINGPERIODS", "Off-peak Charging Periods");
define("_CONTINUECHARGINGENDPEAKINTERVAL", "Continue Charging End Peak Interval");
define("_CONTINUECHARGINGWITHOUTREAUTHAFTERPOWERLOSS", "Continue Charging Without Reauth After Power Loss");



define("_RANDOMISEDDELAYMAXIMUMDURATION", "Randomised Delay Maximum <br> Duration (seconds)");

define("_RANDOMISEDDELAYMAXIMUMDURATIONERROR", "* Randomised Delay Maximum Duration is required!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONBENUMERIC", "* Randomised Delay Maximum Duration must be integer!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONLIMIT", "* Randomised Delay Maximum Duration should be between 0 and 1800");
define("_OFFPEAKCHARGINGPERIODSERROR", "* Off Peak Charging Periods are required!");
define("_OFFPEAKCHARGINGPERIODSSAMETIMEERROR", "* Off Peak Charging Start and Finish time can not be the same!");

define("_OFFPEAKCHARGINGSECONDTIMEPERIOD", "Off-peak Charging Second Time Period");
define("_OFFPEAKDISABLEDCONFIRM", "Off-Peak Charging will be disabled. Do you confirm?");

define("_SHOWSERVICECONTACTINFO", "Show Extra Service Contact Info");
define("_EXTRASERVICECONTACTINFORMATION", "Service Contact Information is shown on Connect Charging Cable, Preparing for Charging, Initializing and Waiting for Connection Screens");

define("_LOADSHEDDINGSTATUS", "Load Shedding Status: ");
define("_ACTIVE", "Active");
define("_INACTIVE", "Inactive");
define("_POWEROPTIMIZEREXTERNALMETERENABLEALERT", "If you want to use your Load Management Option in Modbus,<br>first you need to disable Power Optimizer Total Current Limit<br>from &#39Charging Mode Selection and Power Optimizer Configuration&#39.");
define("_MODBUSALERT", "If you want to enable your Power Optimizer External Meter,<br>first you need to deactivate Modbus<br>from &#39Local Load Management&#39.");
define("_POWEROPTIMIZERDLMENABLEALERT", "If you want to use your Load Management Option in Master/Slave,<br>first you need to disable Power Optimizer<br>from &#39Charging Mode Selection and Power Optimizer Configuration&#39.");
define("_DLMALERT", "If you want to enable your Power Optimizer,<br>first you need to deactivate Master/Slave<br>from &#39Local Load Management&#39.");

define("_DLMALERTFOLLOWTHESUN", "If you want to enable your Follow The Sun,<br>first you need to deactivate Master/Slave<br>from &#39Local Load Management&#39.");
define("_FOLLOWTHESUNDLMENABLEALERT", "If you want to use your Load Management Option in Master/Slave,<br>first you need to disable Follow The Sun<br>from &#39Charging Mode Selection and Power Optimizer Configuration&#39.");

define("_RESETUSERPASSWORD", "Reset User <br> Password");
define("_INSTALLATIONERRORENABLEDCONFIRM", "If you want to disable Installation Error Enable,<br>first you need to set Earthing System from &#39Installation Settings&#39 to IT/Split Phase.");
define("_EARTHINGSYSTEMCONFIRM", "If you want to set Earthing System to TN/TT,<br>first you need to enable Installation Error Enable from &#39OCPP Settings&#39.");

define("_AUTHKEYMAXLIMIT", "length should be maximum 40 characters.");
define("_AUTHORIZATIONKEYEMPTYCONFIRM", "Authorization Key field is empty.<br>Do you confirm the changes?");

define("_RANDOMISEDDELAYATOFFPEAKEND", "Randomised Delay At Off Peak End");
define("_FIFO", "FIFO");
define("_FAILSAFECURRENT", "Failsafe Current");
define("_FAILSAFECURRENTERROR", "Failsafe Current is required!");
define("_FAILSAFECURRENTLESSTHAN0", "* Failsafe Current value must not be less than 0!");
define("_FAILSAFECURRENTMORETHAN32", "* Failsafe Current value must not be more than 32!");
define("_FAILSAFECURRENTMORETHAN50", "* Failsafe Current value must not be more than 50!");

define("_LOCALCHARGESESSION", "Local Charge Sessions");
define("_ROWNUMBER", "Row No");
define("_SESSIONUUID", "Charge ID");
define("_AUTHORIZATIONUID", "RFID Code");
define("_STARTTIME", "Starting Time");
define("_STOPTIME", "Finishing Time");
define("_TOTALTIME", "Total Time");
define("_STATUS", "Status");
define("_CHARGEPOINTIDS", "Socket Number");
define("_INITIALENERGY", "Starting Energy(kWh)");
define("_LASTENERGY", "Finishing Energy(kWh)");
define("_TOTALENERGY", "Total Energy(kWh)");
define("_DOWNLOADLOCALCHARGESESSIONLOGS", "Full Session Log in CSV");
define("_DOWNLOADFULLSESSIONLOGS", "Summary Log in CSV");
define("_STARTDATE", "Start Date");
define("_ENDDATE", "End Date");
define("_RFIDSELECTION", "RFID Selection");
define("_CLEAR", "Clear");

define("_FALLBACKCURRENT", "Fallback Current");
define("_FALLBACKRANGE", "Fallback current must be 0 or within the range of ");
define("_DOWNLOADEEBUSLOGS", "EEBUS Logs");
define("_PAIRINGENERGYMANAGER", "Enabled for pairing");
define("_PAIR", "Pair Enable");
define("_UNPAIR", "Unpair");
define("_EEBUS", "EEBUS");
define("_FIRMWAREVERSION", "Firmware Version");
define("_EEBUSDISCOVERY", "Discovered Devices");
define("_REFRESH", "Refresh");
define("_CPROLEMASTERREQUIREDFIELD", "If you want to update Load Management Group  settings,charge point role must be saved as &#39Master&#39 from load management general settings.");

define("_LISTOFSLAVES", "List of Slaves");
define("_NUMBEROFSLAVES", "Number of Slaves");
define("_LISTOFCONNECTOR", "List of Connectors");
define("_AVAILABLECURRENT", "Available Current Phase");

define("_DLMINTERFACE", "DLM Network Selection");
define("_ETHERNET", "Ethernet");
define("_DLMINTERFACEERROR", "Enable WiFi from Network Interfaces!");

define("_MUSTBEINTEGER", "must be integer!");

define("_GRIDBUFFER", "Grid Protection Margin Percentage");
define("_CHARGINGSTATUSALERT", "In the charging status, the value cannot be updated!");
define("_READUNDERSTAND", "I read, I understand");

define("_MORETHAN10", "You must increase the Maximum Grid Current or decrease the Grid Protection Margin Percentage before saving these settings. The Maximum Grid Current limit cannot be lower than 10A when using the Grid Protection Margin Percentage.");

define("_CLUSTERMAXCURRENT", "Cluster Max Current");
define("_CLUSTERFAILSAFECURRENT", "Cluster Failsafe Current");
define("_CLUSTERMAXCURRENTERROR", "Cluster Max Current is required!");
define("_CLUSTERFAILSAFECURRENTERROR", "Cluster Failsafe Current is required!");
define("_CLUSTERFAILSAFECURRENTLESSTHAN0", "Cluster Failsafe Current value must not be less than 0!");
define("_CLUSTERFAILSAFECURRENTMORETHAN", "Cluster Failsafe Current value must be less than Maximum Grid Current!");
define("_CLUSTERFAILSAFE", "Cluster Failsafe Mode");

define("_CLUSTERMAXCURRENTLESSTHAN10", "Cluster Max Current value must not be less than 10");
define("_CLUSTERMAXCURRENTMORETHAN", "Cluster Max Current value must be equal to or less than this value :");