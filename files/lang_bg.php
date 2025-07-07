<?php
include_once "access_control.php";
define("_LOGIN", "ВЛИЗАНЕ");
define("_USERNAME", "Потребителско име:");
define("_PASSWORD", "Парола:");
define("_CHANGEPASSWORD", "Смяна на паролата");
define("_CURRENTPASSWORD", "Настояща парола:");
define("_NEWPASSWORD", "Нова парола:");
define("_CONFIRMNEWPASSWORD", "Потвърждение на новата парола:");
define("_SUBMIT", "Изпрати");
define("_CURRENTPASSWORDREQUIRED", "Изисква се текуща парола");
define("_PASSWORDREQUIRED", "Изисква се парола");
define("_USERNAMEREQUIRED", "Изисква се потребителско име");
define("_USERAUTHFAILED", "Неуспешно удостоверяване на потребител!");
define("_USERNAMEORCURRENTPASSWORDWRONG", "Потребителското име или текущата парола са грешни!");
define("_DBACCESSFAILURE", "Няма достъп до базата данни!");
define("_CHANGEPASSWORDERROR", "Първо трябва да смените паролата си!");
define("_SAMEPASSWORDERROR", "Текущата и новата парола трябва да се различават една от друга!");
define("_PASSWORDMATCHERROR", "Паролите не съвпадат!");
define("_CURRENTPASSWORDWRONG", "Текущата парола е грешна!");
define("_PASSWORDERRORLEVEL2", "Паролата е невалидна, дължината на знака трябва да е 20 и да съдържа поне две букви [A-Za-z], две цифри [0-9] и два специални знака [!§$%&/()=?*#+- _.:,;]");
define("_PASSWORDERRORLEVEL3", "Паролата е невалидна, дължината на знака трябва да е поне 12, максимум 32 знака и да съдържа поне две малки [a-z] и две главни букви [A-Z], две цифри [0-9] и поне два специални знака [!% &/()=?*#+-_].");
define("_LOGINLOCKOUT", "Твърде много неуспешни опити. Моля, опитайте след 1800 секунди.");

define("_MAINPAGE", "Главна страница");
define("_GENERAL", "Общи настройки");
define("_OCPPSETTINGS", "OCPP настройки");
define("_NETWORKINTERFACES", "Мрежови интерфейси");

define("_OCPPCONNINTERFACE", "OCPP Connection Interface : ");
define("_CONNECTIONSTATE", "Състояние на връзката : ");
define("_DISCONNECTED", "Разединен");
define("_NEEDTOLOGINFIRST", "Първо трябва да влезете!");
define("_CONNECTED", "Свързан");
define("_CPSERIALNUMBER", "CP сериен номер : ");
define("_HMISOFTWAREVERSION", "Версия на софтуера HMI : ");
define("_OCPPSOFTWAREVERSION", "Версия на софтуера OCPP : ");
define("_POWERBOARDSOFTWAREVERSION", "Софтуерна версия на Power Board : ");
define("_OCPPDEVICEID", "ID на OCPP устройство : ");
define("_DURATIONAFTERPOWERON", "Продължителност след включване : ");
define("_LOGOUT", "Отписване");
define("_PRESET", "Предварителни настройки:");

define("_OCPPCONNECTION", "OCPP Връзка");
define("_ENABLED", "Активиран");
define("_DISABLED", "Деактивиран");
define("_CONNECTIONSETTINGS", "Настройки на връзката");
define("_CENTRALSYSTEMADDRESS", "Адрес на централната система ");
define("_CHARGEPOINTID", "Идент. № на зарядната точка ");
define("_OCPPVERSION", "OCPP Версия");
define("_SAVE", "Запазване");
define("_SAVESUCCESSFUL", "Успешно запазено.");
define("_CENTRALSYSTEMADDRESSERROR", "Изисква се адрес на централната система!");
define("_CHARGEPOINTIDERROR", "Изисква се идентификатор на точка за зареждане!");
define("_SECONDS", "Секунди");
define("_ADD", "Добавяне");
define("_REMOVE", "Премахване");
define("_SAVECAPITAL", "ЗАПАЗВАНЕ");
define("_CANCEL", "Отмяна");

define("_CELLULAR", "Клетъчен");
define("_INTERFACEIPADDRESS", "IP адрес на интерфейса: ");
define("_ICCID", "ICCID: ");
define("_IMSI", "IMSI: ");
define("_IMEI", "IMEI: ");
define("_APNNAME", "APN Име: ");
define("_APNUSERNAME", "APN Потребителско име: ");
define("_APNPASSWORD", "APN Парола: ");
define("_IPSETTING", "IP Настройка: ");
define("_IPADDRESS", "IP адрес: ");
define("_NETWORKMASK", "Мрежова маска: ");
define("_DEFAULTGATEWAY", "Път по подразбиране: ");
define("_PRIMARYDNS", "Основен DNS: ");
define("_SECONDARYDNS", "Вторичен DNS: ");
define("_WIFI", "WLAN");
define("_SECURITY", "Безопасност: ");
define("_SECURITYTYPE", "Изберете тип защита");
define("_NONE", "Няма");
define("_SELECTMODE", "Моля, изберете режим!");
define("_RFIDLOCALLIST", "RFID локален списък");
define("_ACCEPTALLRFIDS", "Приема всички RFID");
define("_MANAGERFIDLOCALLIST", "Управление на RFID локален списък:");
define("_AUTOSTART", "Автоматично стартиране");
define("_PROCESSING", "Обработка... Моля Изчакайте...");
define("_MACADDRESS", "MAC Адрес: ");
define("_WIFIHOTSPOT", "Wi-Fi Hotspot");
define("_TURNONDURINGBOOT", "Включете по време на зареждане: ");
define("_AUTOTURNOFFTIMEOUT", "Изчакване за автоматично изключване: ");
define("_AUTOTURNOFF", "Автоматично изключване: ");
define("_HOTSPOTALERTMESSAGE", "Промените в настройките на Hotspot ще влязат в сила при следващото включване на устройството. ");
define("_HOTSPOTREBOOTMESSAGE", "Искате ли да рестартирате сега? ");

define("_DOWNLOADACLOGS", "Изтеглете AC регистрационни файлове");
define("_DOWNLOADCELLULARLOGS", "Изтеглете регистрационни файлове на клетъчния модул");
define("_DOWNLOADPOWERBOARDLOGS", "Изтеглете регистрационни файлове на Power Board");
define("_PASSWORDRESETSUCCESSFUL", "Вашата парола е успешно нулирана.");
define("_DBOPENEDSUCCESSFULLY", "Базата данни е отворена успешно\n");
define("_WSSCERTSSETTINGS", "Настройки на WSS сертификати ");
define("_CONFKEYS", "Конфигурационни ключове");
define("_KEY", "Ключ");
define("_STATIC", "Статично");
define("_TIMEZONE", "Часова зона");
define("_PLEASESELECTTIMEZONE", "Моля, изберете часова зона");
define("_DISPLAYSETTINGS", "Настройки на дисплея");
define("_DISPLAYLANGUAGE", "Език на дисплея");
define("_BACKLIGHTDIMMING", "Затъмняване на фоновото осветление : ");
define("_PLEASESELECT", "Моля изберете");
define("_TIMEBASED", "Въз основа на времето");
define("_SENSORBASED", "Базиран на сензор");
define("_BACKLIGHTDIMMINGLEVEL", "Ниво на затъмняване на фоновото осветление : ");
define("_BACKLIGHTTHRESHOLD", "Праг на фоновото осветление : ");
define("_SETMIDTHRESHOLD", "SetMidThreshold");
define("_SETHIGHTHRESHOLD", "SetHighThresold");
define("_LOCALLOADMANAGEMENT", "Локално управление на натоварването");
define("_MINIMUMCURRENT", "Минимален ток: ");
define("_FIFOPERCENTAGE", "FIFO процент: ");
define("_GRIDMAXCURRENT", "Максимален ток на мрежата: ");
define("_MASTERIPADDRESS", "IP адрес на главния: ");
define("_BACKLIGHTTIMESETTINGS", "Настройки за време на задно осветяване ");
define("_SHOULDSELECTTIMEZONE", "* Трябва да изберете часова зона!");
define("_MINIMUMCURRENTREQUIRED", "* Изисква се минимален ток!");
define("_CURRENTMUSTBENUMERIC", "*  Токът трябва да е числов!");
define("_FIFOPERCREQUIRED", "* Изисква се процент FIFO!");
define("_FIFOPERCSHOULDBETWEEN", "* FIFO процентът трябва да бъде между 0 и 100!");
define("_PERCMUSTBENUMERIC", "* Процентът трябва да е число!");
define("_GRIDMAXCURRENTREQUIRED", "* Изисква се максимален ток на мрежата!");
define("_GRIDCURRENTMUSTBENUMERIC", "* Токът на мрежата трябва да бъде числов!");
define("_IPADDRESSOFMASTERREQUIRED", "* Изисква се IP адрес на главния!");
define("_INVALIDIPADDRESS", "* Въвели сте невалиден IP адрес!");
define("_SAMENETWORKLAN", "* Вие сте въвели IP адрес в същата мрежа с LAN!");
define("_SAMENETWORKWLAN", "* Вие сте въвели IP адрес в същата мрежа с WLAN!");
define("_APNISREQUIRED", "Изисква се APN!");
define("_IPADDRESSREQUIRED", "Изисква се IP адрес!");
define("_NETWORKMASKREQUIRED", "Изисква се мрежова маска!");
define("_INVALIDNETWORKMASK", "* Въведохте невалидна мрежова маска!");
define("_DEFAULTGATEWAYREQUIRED", "Изисква се път по подразбиране!");
define("_INVALIDGATEWAY", "Въвели сте невалиден път по подразбиране!");
define("_PRIMARYDNSREQUIRED", "Изисква се първичен DNS!");
define("_INVALIDDNS", "Въвели сте невалиден DNS!");
define("_SELECTIPSETTING", "Моля, изберете IP настройка.");
define("_SSIDREQUIRED", "Изисква се SSID!");
define("_PASSWORDISREQUIRED", "Изисква се парола!");
define("_WIFIPASSWORDERROR", "Паролата е невалидна, дължината на знака трябва да бъде минимум 8 и максимум 63 валидни знака a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL2", "&#8226; дължината на знака трябва да бъде 20,<br>&#8226; и да съдържа поне две букви [A-Za-z],<br>&#8226; две цифри [0-9],<br>&#8226; и два специални знака [!%&/()=?*#+-_]");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL3", "&#8226; Паролата е невалидна, дължината на знака трябва да бъде поне 12, максимум 32,<br>&#8226; съдържа поне две малки букви [a-z], <br>&#8226; съдържа поне две главни букви [A-Z], <br>&#8226; съдържа поне две цифри [0-9],<br>&#8226; съдържа поне два специални знака [!%&/()=?*#+-_]");
define("_WIFISSIDERROR", "SSID е невалиден, валидни знаци a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_SELECTSECURITYTYPE", "Моля, изберете тип защита");
define("_HOSTIPREQUIRED", "* Изисква се IP адрес на хост!");
define("_CERTMANREQUIRED", "* Изисква се управление на сертифициране!");
define("_OCPPENABLEALERT", "Ако искате да използвате вашата зарядна станция в самостоятелен режим, първо трябва да деактивирате OCPP връзката от &#39Меню за настройки на OCPP");
define("_NOTSAVEDALERT", "Страницата не беше запазена.");
define("_SAVEQUESTION", "Искате ли да запазите промените?");
define("_OKBUTTON", "OK");
define("_LTECONNECTIONCONFIRM", "Клетъчната връзка ще бъде деактивирана. Потвърждавате ли?");
define("_WIFICONNECTIONCONFIRM", "Wi-Fi връзката ще бъде деактивирана. Потвърждавате ли?");
define("_DHCPSERVERCONNECTIONCONFIRM", "Ако искате да активирате LAN DHCP сървър,<br> първо трябва да деактивирате Wi-Fi Hotspot от &#39Wi-Fi Hotspot&#39.");
define("_WIFIHOTSPOTCONNECTIONCONFIRM", "Ако искате да активирате Wi-Fi Hotspot,<br> първо трябва да деактивирате LAN DHCP сървър от &#39LAN IP настройка&#39.");

define("_DYNAMIC", "Динамичен");
define("_DIAGNOSTICS", "Диагностика");
define("_LOCALLOAD", "Локално управление на натоварването");
define("_DOWNLOAD", "Изтегли");
define("_STARTDATE", "Дата на започване");
define("_ENDDATE", "Дата на приключване");
define("_CLEAREVENTLOGS", "Изчисти всички журнали на събития");
define("_CLEAREVENTLOGSINFO", "Това ще изчисти всички журнали на събития!");
define("_DOWNLOADEVENTLOGSINFO", "Изтеглете журнали на събития на устройството за максимален период от 5 дни");
define("_DEVICEEVENTLOGS", "Журнали на събития на устройството");
define("_DEVICECHANGELOGS", "Журнали на промени на устройството");
define("_LOGSDATEERROR", "Моля, изберете дати за максимален период от 5 дни.");
define("_DOWNLOACHANGELOGS", "Изтеглете журналите на промени на устройството");
define("_VPNFUNCTIONALITY", "VPN функционалност: ");
define("_CERTMANAGEMENT", "Управление на сертифицирането: ");
define("_NAME", "Име: ");
define("_CONNECTIONINTERFACE", "Интерфейс за свързване ");
define("_ANY", "Всеки");
define("_OCPPCONNPARAMETERS", "Конфигурационни параметри на OCPP");
define("_SETDEFAULT", "Настройте на Подразбиране ");
define("_STANDALONEMODE", "Самостоятелен режим");
define("_STANDALONEMODETITLE", "Самостоятелен режим:");
define("_STANDALONEMODENOTSELECTED", "* Самостоятелният режим не може да бъде избран, тъй като OCPP е активиран.");
define("_CHARGERWEBUI", "Уеб потребителски интерфейс на зарядното устройство");
define("_SYSTEMMAINTENANCE", "Системна поддръжка");
define("_HOSTIP", "IP на хоста: ");
define("_PASSWORDERRORLEVEL1", "Паролата е невалидна, дължината на знака трябва да е минимум 6 знака и да съдържа поне 1 малка буква, 1 главна буква и 1 цифра!");
define("_SELECTBACKLIGHTDIMMING", "* Трябва да изберете затъмняване на подсветката!");
define("_ISREQUIRED", "изисква се!");
define("_ISNOTVALID", "не е валидно!");
define("_ISDUPLICATED", "се дублира!");
define("_MUSTBENUMERIC", "трябва да е числово!");
define("_VPNFUNCTIONALITYREQUIRED", "* Необходима е Vpn функционалност!");
define("_VPNNAMEREQUIRED", "* Изисква се Vpn име!");
define("_VPNPASSWORDREQUIRED", "* Изисква се Vpn парола!");
define("_EXPLANATION", "Задължителни полета.");
define("_FIRMWAREUPDATE", "Актуализации на фърмуера");
define("_BACKUPRESTORE", "Архивиране и възстановяване на конфигурацията");
define("_SYSTEMRESET", "Нулиране на системата");
define("_CHANGEADMINPASSWORD", "Административна парола");
define("_FACTORYRESET", "Фабрични настройки");
define("_FACTORYRESETBUTTON", "Фабрично нулиране");
define("_FACTORYDEFAULTCONFIGURATION", "Фабрична конфигурация по подразбиране");
define("_LOGFILES", "Регистрационни файлове");
define("_BACKUPFILE", "Архивиран файл");
define("_RESTOREFILE", "Възстановяване на конфигурационния файл");
define("_FREEMODEMAXCHARACTER", "трябва да има максимум 32 знака!");
define("_RESTOREMESSAGE", "Потвърждавате ли да приложите промените и да рестартирате сега?");

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

define("_PASSWORDTYPEEXPLANATION", "Вашата парола трябва да е от 6 знака и да съдържа поне една главна буква
една малка буква и една цифра.");

define("_PASSWORDTYPEEXPLANATIONLEVEL2", "Вашата парола трябва да е от 20 знака и да съдържа поне двебукви,
две цифри и два специални знака.");

define("_PASSWORDTYPEEXPLANATIONLEVEL3", "Вашата парола трябва да е минимум 12, максимум 32 знака и да съдържа поне две главни букви,
две малки букви, две цифри и два специални знака.");
define("_BACKTOLOGIN", "Назад към Вход");
define("_CHANGE", "Промяна");
define("_SYSTEMADMINISTRATION", "Системна администрация");
define("_UPDATE", "Актуализиране");
define("_CONFIRM", "Потвърдете");
define("_FACTORYDEFAULTCONFIRM", "Сигурни ли сте че искате да върнете фабричните настройки?");
define("_FILENAME", "Име на файл");
define("_UPLOAD", "Качване");
define("_SELECTFIRMWARE", "Изберете файл за актуализация на фърмуера от компютър");
define("_FIRMWAREFILESIZE", "Моля, проверете размера на файла на фърмуера.");
define("_FIRMWAREFILETYPE", "Моля, проверете типа на файла на фърмуера.");

define("_LESSTHANOREQUAL4", "трябва да е между 1 и 4");
define("_LESSTHANOREQUAL20", "трябва да бъде по-малко или равно на 20");
define("_LESSTHANOREQUAL65000", "трябва да бъде по-малко или равно на 65000");
define("_LESSTHANOREQUAL300", "трябва да бъде по-малко или равно на 300");
define("_LESSTHANOREQUAL86500", "трябва да бъде по-малко или равно на 86500");
define("_LESSTHANOREQUAL10000", "трябва да бъде по-малко или равно на 10000");
define("_LESSTHANOREQUAL22", "трябва да бъде по-малко или равно на 22");
define("_LESSTHANOREQUAL10", "трябва да бъде по-малко или равно на 10");
define("_LESSTHANOREQUAL600", "трябва да бъде по-малко или равно на 600");
define("_LESSTHANOREQUAL120", "трябва да бъде по-малко или равно на 120");
define("_HIGHTHANOREQUAL0", "трябва да е по-високо или равно на 0");
define("_CHANGEPASSWORDSUGGESTION", "Препоръчваме Ви да промените паролата си по подразбиране от менюто за поддръжка на системата");

define("_FILESIZE", "Моля, проверете размера на файла.");
define("_FILETYPE", "Моля, проверете типа на файла.");

define("_BACKUPVERSIONCHECK", "Версията на този файл не е подходяща за устройството.");
define("_HARDRESETCONFIRM", "Сигурни ли сте за Фабрично нулиране?");
define("_SOFTRESETCONFIRM", "Сигурни ли сте за Софтуерно нулиране?");
define("_NEWSETUP", "Моля, използвайте ръководството на потребителя за новата настройка.");

define("_LOADMANAGEMENT", "Управление на натоварването");
define("_CPROLE", "Роля на зарядна точка");
define("_GRIDSETTINGS", "Настройки на мрежата");
define("_LOADMANAGEMENTMODE", "Режим на управление на натоварването");
define("_LOADMANAGEMENTGROUP", "Група за управление на натоварването");
define("_LOADMANAGEMENTOPTION", "Опция за управление на натоварването");
define("_ALARMS", "Аларми");

define("_MASTER", "Главен");
define("_SLAVE", "Второстепенен");
define("_TOTALCURRENTLIMIT", "Общо ограничение на тока на фаза");
define("_SUPPLYTYPE", "Тип доставка");
define("_FIFOPERCANTAGE", "FIFO процент");
define("_TIC", "TIC");
define("_EQUALLYSHARED", "Равно споделено");
define("_COMBINED", "Комбиниран");
define("_TOTALCURRENTLIMITERROR", "Изисква се общо ограничение на тока на фаза!");
define("_LESSTHAN1024", "трябва да е по-малко от 1024");
define("_ATLEAST0","трябва да бъде поне 0");
define("_MORETHAN12", "трябва да е повече от 12");
define("_CHOOSEONE", "Изберете едно");
define("_SLAVEMINCHCURRENT", "Настройка на тока на офлайн безопасно зареждане");
define("_SERIALNO", "Сериен номер");
define("_CONNECTORSTATE", "Състояние на конектора");
define("_NUMBEROFPHASES", "Брой фази");
define("_PHASECONSEQUENCE", "Последователност на фазово свързване");
define("_VIP", "VIP зареждане");
define("_CPMODE", "Pежим CP");
define("_VIPERROR", "Изисква се VIP зареждане");
define("_PHASECONSEQUENCEERROR", "Необходима е последователност на свързване на фазите!");
define("_CPMODEERROR", "Изисква се режим CP!");
define("_SUPPORTEDCURRENT", "Поддържан ток");
define("_INSTANTCURPERPHASE", "Моментална текуща фаза");
define("_FIFOCHARGINGPERCENTAGE", "Моментална текуща фаза");
define("_MINIMUMCURRENT1P", "Минимален заряден ток 1-фазен");
define("_MINIMUMCURRENT3P", "Минимален заряден ток 3-фазен");
define("_MAXIMUMCURRENT", "Максимален ток на зареждане");
define("_STEP", "Стъпка");
define("_UPDATEDLMGROUP", "Актуализирайте DLM групата");
define("_MAINCIRCUITCURRENT", "Максимален ток на мрежата");
define("_MAINCIRCUITCURRENTERROR", "Изисква се максимален ток на мрежата!");
define("_DLMMAXCURRENT", "DLM Общо ограничение на тока на фаза");
define("_DLMMAXCURRENTERROR", "Необходимо е DLM общо ограничение на тока на фаза!");
define("_DLMMAXCURRENTMORETHANMAIN", "Общото ограничение на тока на DLM трябва да бъде повече от половината от тока на главния прекъсвач");
define("_DLMMAXCURRENTLESSTHANMAIN", "Общото ограничение на тока на DLM трябва да бъде по-малко от тока на главния прекъсвач");

define("_LOGOSETTINGS", "Настройки на логото");
define("_USELOGO", "Изберете файл с лого от компютър");
define("_LOGOTYPE", "Моля, изберете лого с png формат.");
define("_LOGODIMENSION", "Максимално допустимият размер на логото е 80x80, моля изберете лого с подходящ размер.");

define("_SERVICECONTACTINFO", "Показване на информация за контакт със сервиз");
define("_SERVICECONTACTINFOCHARACTER", "Показваната информация за контакт със сервиз трябва да бъде максимум 25 знака!<br>валидни знаци a..z 0..9 .+@*");

define("_SCREENTHEME", "Тема на дисплея");
define("_DARKBLUE", "Тъмно синьо");
define("_ORANGE", "Оранжево");
define("_PLEASEENTERRFIDLOCALLIST", "Моля, въведете местния списък с RFID!");
define("_DHCPSERVER", "DHCP Сървър");
define("_DHCPCLIENT", "DHCP Клиент");

define("_MAXDHCPADDRRANGE", "Краен IP адрес на DHCP Сървър");
define("_MINDHCPADDRRANGE", "Начален IP адрес на DHCP Сървър");

define("_MAXDHCPADDRRANGEERROR", "Изисква се краен IP адрес на DHCP сървър!");
define("_MINDHCPADDRRANGEERROR", "Изисква се начален IP адрес на DHCP сървър!");
define("_DIFFERENCEBETWEENMAXANDMINADDRRANGE", "Крайният IP адрес на DHCP сървъра трябва да е по-голям от началния IP адрес на DHCP сървъра");
define("_IPADDRESSRANGE", "IP адресът не може да приема стойност между началния и крайния IP адрес на DHCP сървъра");

define("_CELLULARGATEWAY", "Клетъчен шлюз");
define("_INVALIDSUBNET", "IP адресът не е в истинската подмрежа");

define("_CONNECTIONSTATUS", "Състояние на връзката");

define("_INSTALLATIONSETTINGS", "Инсталационни настройки");
define("_EARTHINGSYSTEM", "Заземителна система");
define("_CURRENTLIMITERSETTINGS", "Текущи настройки на ограничителя");
define("_CURRENTLIMITERPHASE", "Фаза на ограничителя на тока");
define("_CURRENTLIMITERVALUE", "Текуща ограничителна стойност");
define("_UNBALANCEDLOADDETECTION", "Откриване на небалансирано натоварване");
define("_EXTERNALENABLEINPUT", "Вход за външно активиране");
define("_LOCKABLECABLE", "Заключващ се кабел");
define("_POWEROPTIMIZERTOTALCURRENTLIMIT", "Ограничение на общия ток на оптимизатора на захранването");
define("_POWEROPTIMIZER", "Оптимизатор на мощността");
define("_TNORTT", "TN/TT");
define("_SPLITPHASE", "IT/Разделена фаза");
define("_ONEPHASE", "Една фаза");
define("_THREEPHASE", "Три фази");
define("_POWEROPTIMIZERTOTALCURRENTLIMITMORETHANOREQUAL16", "Общото ограничение на <br> тока на оптимизатора на мощността трябва <br> да бъде повече от или равно на 16");
define("_POWEROPTIMIZERTOTALCURRENTLIMITLESSTHANOREQUAL100", "Общият ток на оптимизатора <br> на мощността трябва да <br> бъде по-малък или равен на 100");
define("_FOLLOWTHESUN", "следвай слънцето");
define("_FOLLOWTHESUNMODE", "следвайте слънчевия режим");
define("_AUTOPHASESWITCHING", "Автоматично превключване на фазите");
define("_MAXHYBRID", "Максимален хибрид");
define("_SUNONLY", "Само слънце");
define("_SUNHYBRID", "Слънчев хибрид");

define("_DISPLAYBACKLIGHTSETTINGS", "Настройки на подсветката на дисплея");
define("_BACKLIGHTLEVEL", "Ниво на фоновото осветление");
define("_SUNRISETIME", "Време на изгрев ");
define("_SUNSETTIME", "Време на залез");

define("_HIGH", "Високо");
define("_MID", "Средно");
define("_LOW", "Ниско");

define("_A", " (A)");

define("_CURRENTLIMITERVALUELESSTHAN8", "* Когато EVReadySupport е включен и фазата на ограничителя на тока е една фаза, стойността на ограничителя на тока не трябва да бъде по-малка от 8!");
define("_CURRENTLIMITERVALUELESSTHAN14", "* Когато EVReadySupport е включен и фазата на ограничителя на тока е трифазна, стойността на ограничителя на тока не трябва да бъде по-малка от 14!");

define("_LEDDIMMINGSETTINGS", "Настройки за затъмняване на светодиоди");
define("_LEDDIMMINGLEVEL", "Led ниво на затъмняване");
define("_VERYLOW", "Много ниско");
define("_WARNINGFORLTEENABLED", "Режимът на IP настройка на LAN интерфейс ще бъде зададен като статичен и DHCP сървърът ще бъде активиран.");
define("_WARNINGFORLTEDISABLED", "Режимът на IP настройка на LAN интерфейс ще бъде зададен като DHCP клиент и DHCP сървърът ще бъде деактивиран.");
define("_ACCEPTQUESTION", "Приемате ли промените?");

define("_CELLULARGATEWAYCONFIRM", "Клетъчният път ще бъде деактивиран.");

define("_ETHERNETIP", "Ethernet интерфейс IP:");
define("_WLANIP", "WLAN интерфейс IP:");
define("_STRENGTH", "Сила");
define("_WIFIFREQ", "Частота");
define("_WIFILEVEL", "Уровень");
define("_CELLULARIP", "Клетъчен интерфейс IP:");
define("_CELLULAROPERCODE" , "Оператор");
define("_CELLULARTECH" , "технология");
define("_SCANNETWORKS", "Сканиране на мрежи");
define("_AVAILABLENETWORKS", "Налични мрежи");
define("_NETWORKSTATUS", "Състояние на мрежата");
define("_PLEASEWAITMSG", "Моля, изчакайте...");
define("_SCANNINGWIFIMSG", "Сканиране на Wi-Fi мрежи");
define("_NOWIFIFOUNDMSG", "Не са намерени Wi-Fi мрежи");
define("_PLEASECHECKWIFICONNMSG", "Моля, проверете вашата Wi-Fi връзка и опитайте отново.");

define("_APPLICATIONRESTART", "Тази промяна изисква рестартиране на приложението.");

define("_QRCODE", "Показване на QR код");
define("_QRCODEONSCREEN", "QR код на екрана");
define("_QRCODEDELIMITER", "QR код разделител");
define("_INVALIDDELIMITERCHARACTER", "Символът на разделителя на QR кода е невалиден, интервалът не е приемлив, дължината на знака трябва да е минимум 1 и максимум 3, валидни знаци 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");

define("_LOCATION", "Местоположение");
define("_INDOOR", "На закрито");
define("_OUTDOOR", "На открито");
define("_POWEROPTIMIZEREXTERNALMETER", "Външен измервателен уред");
define("_OPERATIONMODE", "Режим на работа");
define("_AUTOSELECTED", "Автоматично избрано");
define("_NOTSELECTED", "Не е избрано");
define("_CHARGINGMODESELECTIONANDPOWEROPTIMIZERCONF", "Избор на режим на зареждане и конфигурация на Power Optimizer");

define("_USERINTERACTION", "Взаимодействие с потребителя");

define("_STANDBYLEDBEHAVIOUR", "Поведение на светодиода в режим на готовност");
define("_OFF", "Изключен");
define("_ON", "Включен");

define("_LOADSHEDDINGMINIMUMCURRENT", "Минимален ток на разтоварване");
define("_UNBALANCEDLOADDETECTIONMAXCURRENT", "Максимален ток при откриване на небалансиран товар");

define("_SCHEDULEDCHARGING", "Планирано зареждане");
define("_OFFPEAKCHARGING", "Зареждане извън пиковите часове");
define("_OFFPEAKCHARGINGWEEKENDS", "Зареждане извън пиковите часове през уикендите");
define("_OFFPEAKCHARGINGPERIODS", "Периоди на зареждане извън пиковите натоварвания");
define("_CONTINUECHARGINGENDPEAKINTERVAL", "Продължете зареждането след края на пиковия интервал");
define("_CONTINUECHARGINGWITHOUTREAUTHAFTERPOWERLOSS", "Продължете зареждането без повторна автентикация след загуба на захранване");



define("_RANDOMISEDDELAYMAXIMUMDURATION", "Максимална продължителност на произволно забавяне (секунди)");

define("_RANDOMISEDDELAYMAXIMUMDURATIONERROR", "* Необходима е максимална продължителност на произволно забавяне!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONBENUMERIC", "* Максималната продължителност на произволно забавяне трябва да е цяло число!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONLIMIT", "* Максималната продължителност на произволно забавяне трябва да бъде между 0 и 1800");
define("_OFFPEAKCHARGINGPERIODSERROR", "* Необходими са периоди на зареждане извън пиковите часове!");
define("_OFFPEAKCHARGINGPERIODSSAMETIMEERROR", "* Времето за начало и край на зареждането извън пиковите часове не може да бъде едно и също!");

define("_OFFPEAKCHARGINGSECONDTIMEPERIOD", "Втори времеви период на зареждане извън пиковите часове");
define("_OFFPEAKDISABLEDCONFIRM", "Зареждането извън пиковите часове ще бъде деактивирано. Потвърждавате ли?");

define("_SHOWSERVICECONTACTINFO", "Показване на информация за контакт с допълнителна услуга");
define("_EXTRASERVICECONTACTINFORMATION", "Информацията за контакт със сервиза се показва на екраните за свързване на кабел за зареждане, подготовка за зареждане, инициализиране и изчакване на връзка");

define("_LOADSHEDDINGSTATUS", "Състояние на намаляване на натоварването: ");
define("_ACTIVE", "Активен");
define("_INACTIVE", "Неактивен");
define("_POWEROPTIMIZEREXTERNALMETERENABLEALERT", "Ако искате да използвате Вашата опция за управление на натоварването в Modbus,<br>първо трябва да деактивирате общото ограничение на тока на оптимизатора на мощността от „Избор на режим на зареждане и конфигурация на оптимизатора на мощността“.");
define("_MODBUSALERT", "Ако искате да активирате Вашия външен измервателен уред на Оптимизатор на мощността, първо трябва да деактивирате Modbus от „Локално управление на натоварването“.");
define("_POWEROPTIMIZERDLMENABLEALERT", "Ако искате да използвате опцията за управление на товара в режим Master/Slave,<br>първо трябва да деактивирате Оптимизатора на захранването<br>от &#39Избор на режим на зареждане и конфигурация на Оптимизатора на захранването&#39.");
define("_DLMALERT", "Ако искате да активирате Оптимизатора на захранването,<br>първо трябва да деактивирате Master/Slave<br>от &#39Локално управление на товара&#39.");

define("_DLMALERTFOLLOWTHESUN", "Ако искате да активирате функцията за следенвай слънцето, първо трябва да деактивирате Master/Slave<br> в &#39локалното управление на натоварването&#39.");
define("_FOLLOWTHESUNDLMENABLEALERT", "Ако искате да използвате опцията за управление на натоварването в режим Master/Slave, <br>първо трябва да деактивирате функцията за следвай слънцето в конфигурацията на Power Optimizer&#39.");

define("_RESETUSERPASSWORD", "Нулиране <br> на потребителска <br> парола");
define("_INSTALLATIONERRORENABLEDCONFIRM", "Ако искате да деактивирате Разрешаване на грешка при инсталация,<br>първо трябва да настроите Системата за заземяване от &#39Настройки за инсталиране&#39 на IT/Разделена фаза.");
define("_EARTHINGSYSTEMCONFIRM", "Ако искате да настроите системата за заземяване на TN/TT,<br>първо трябва да активирате Разрешаване на грешка при инсталация от &#39Настройки на OCPP&#39.");

define("_AUTHKEYMAXLIMIT", "дължината трябва да бъде максимум 40 знака.");
define("_AUTHORIZATIONKEYEMPTYCONFIRM", "Полето Authorization Key е празно.<br>Потвърждаване на промените?");

define("_RANDOMISEDDELAYATOFFPEAKEND", "Рандомизирано забавяне в края на извън пиковите часове");
define("_FIFO", "FIFO");
define("_FAILSAFECURRENT", "Безопасен ток");
define("_FAILSAFECURRENTERROR", "Изисква се Failsafe Current!");
define("_FAILSAFECURRENTLESSTHAN0", "* Failsafe Current value не трябва да бъде по-малко от 0!");
define("_FAILSAFECURRENTMORETHAN32", "* Failsafe Current value не трябва да бъде повече от 32!");
define("_FAILSAFECURRENTMORETHAN50", "* Failsafe Current value не трябва да бъде повече от 50!");

define("_LOCALCHARGESESSION", "Местни таксувани сесии");
define("_ROWNUMBER", "Ред №");
define("_SESSIONUUID", "таксуване ID");
define("_AUTHORIZATIONUID", "RFID код");
define("_STARTTIME", "Начален час");
define("_STOPTIME", "Време на спиране");
define("_TOTALTIME", "Общо време");
define("_STATUS", "Състояние");
define("_CHARGEPOINTIDS", "Номер на контакта");
define("_INITIALENERGY", "Първоначална енергия (kWh)");
define("_LASTENERGY", "Последна енергия(kWh)");
define("_TOTALENERGY", "Обща енергия (kWh)");
define("_DOWNLOADLOCALCHARGESESSIONLOGS", "Пълен регистър на сесията в CSV");
define("_DOWNLOADFULLSESSIONLOGS", "Обобщен дневник в CSV");
define("_STARTDATE", "начална дата");
define("_ENDDATE", "крайна дата");
define("_RFIDSELECTION", "избор на RFID");
define("_CLEAR", "ясно");

define("_FALLBACKCURRENT", "Резервен ток");
define("_FALLBACKRANGE", "Резервният ток трябва да бъде 0 или в диапазона от ");
define("_DOWNLOADEEBUSLOGS", "EEBUS регистрационни файлове");
define("_PAIRINGENERGYMANAGER", "Активирано за сдвояване");
define("_PAIR", "Активиране на двойки");
define("_UNPAIR", "Раздвояване");
define("_EEBUS", "EEBUS");
define("_FIRMWAREVERSION", "Версия на фърмуера");
define("_EEBUSDISCOVERY", "Открити устройства");
define("_REFRESH", "Опресняване");
define("_CPROLEMASTERREQUIREDFIELD", "Ако искате да актуализирате настройките на групата за управление на натоварването, ролята на точка за зареждане трябва да бъде запазена като &#39Master&#39 от общите настройки за управление на натоварването.");

define("_LISTOFSLAVES", "Списък на роби");
define("_NUMBEROFSLAVES", "Брой роби");
define("_LISTOFCONNECTOR", "Списък с конектори");
define("_AVAILABLECURRENT", "Налична текуща фаза");

define("_DLMINTERFACE", "DLM интерфейс");
define("_ETHERNET", "Ethernet");
define("_DLMINTERFACEERROR", "Активиране на WiFi от мрежови интерфейси!");

define("_MUSTBEINTEGER", "трябва да е цяло число!");

define("_GRIDBUFFER", "Процент на защита на мрежата");
define("_CHARGINGSTATUSALERT", "В състояние на зареждане стойността не може да се актуализира!");
define("_READUNDERSTAND", "Прочетох, разбирам");

define("_MORETHAN10", "Трябва да увеличите максималния ток на мрежата или да намалите процента на защита на мрежата, преди да запазите тези настройки. Максималният ток на мрежата не може да бъде по-нисък от 10A, когато използвате процента на защита на мрежата.");

define("_CLUSTERMAXCURRENT", "Максимален ток на клъстера");
define("_CLUSTERFAILSAFECURRENT", "Клъстер Failsafe Current");
define("_CLUSTERMAXCURRENTERROR", "Изисква се максимален ток на клъстера!");
define("_CLUSTERFAILSAFECURRENTERROR", "Необходим е Failsafe Current на клъстера!");
define("_CLUSTERFAILSAFECURRENTLESSTHAN0", "Текущата стойност за безопасност на клъстера не трябва да бъде по-малка от 0!");
define("_CLUSTERFAILSAFECURRENTMORETHAN", "Стойността на безопасния ток на клъстера трябва да бъде по-малка от максималния ток на мрежата!");
define("_CLUSTERFAILSAFE", "Клъстер Failsafe Mode");

define("_CLUSTERMAXCURRENTLESSTHAN10", "Максималната текуща стойност на клъстера не трябва да бъде по-малка от 10");
define("_CLUSTERMAXCURRENTMORETHAN", "Максималната текуща стойност на клъстера трябва да бъде равна или по-малка от тази стойност:");