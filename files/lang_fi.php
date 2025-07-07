<?php
include_once "access_control.php";
define("_LOGIN", "KIRJAUDU SISÄÄN");
define("_USERNAME", "Käyttäjänimi:");
define("_PASSWORD", "Salasana:");
define("_CHANGEPASSWORD", "Muuta salasanaa");
define("_CURRENTPASSWORD", "Nykyinen salasana:");
define("_NEWPASSWORD", "Uusi salasana:");
define("_CONFIRMNEWPASSWORD", "Vahvista uusi salasana:");
define("_SUBMIT", "Lähetä");
define("_CURRENTPASSWORDREQUIRED", "Nykyinen salasana vaaditaan");
define("_PASSWORDREQUIRED", "Salasana vaaditaan");
define("_USERNAMEREQUIRED", "Käyttäjänimi vaaditaan");
define("_USERAUTHFAILED", "Käyttäjän vahvistus epäonnistui!");
define("_USERNAMEORCURRENTPASSWORDWRONG", "Käyttäjätunnus tai nykyinen salasana on väärä!");
define("_DBACCESSFAILURE", "Tietokantaa ei voida avata!");
define("_CHANGEPASSWORDERROR", "Salasana on muutettava ensin!");
define("_SAMEPASSWORDERROR", "Nykyinen ja uusi salasana ei saa olla sama!");
define("_PASSWORDMATCHERROR", "Salasanat eivät täsmää!");
define("_CURRENTPASSWORDWRONG", "Nykyinen salasana on väärä!");
define("_PASSWORDERRORLEVEL2", "Salasana on virheellinen, merkin pituuden on oltava 20 ja sisältää vähintään kaksi kirjainta [A-Za-z], kaksi numeroa [0-9] ja kaksi erikoismerkkiä [!%&/()=?*#+-_]");
define("_PASSWORDERRORLEVEL3", "Salasana on virheellinen, merkin pituus saa olla vähintään 12, enintään 32 merkkiä ja sisältää vähintään kaksi pientä [a-z] ja kaksi isoa kirjainta [A-Z], kaksi numeroa [0-9] ja vähintään kaksi erikoismerkkiä [!%&/()=?*#+-_].");
define("_LOGINLOCKOUT", "Liian monta epäonnistunutta yritystä. Yritä 1800 sekunnin kuluttua.");

define("_MAINPAGE", "Pääsivu");
define("_GENERAL", "Yleiset asetukset");
define("_OCPPSETTINGS", "OCPP-asetukset");
define("_NETWORKINTERFACES", "Verkkoliittymät");

define("_OCPPCONNINTERFACE", "OCPP-yhteysliittymä : ");
define("_CONNECTIONSTATE", "Liitännän tila : ");
define("_DISCONNECTED", "Kytketty irti");
define("_NEEDTOLOGINFIRST", "Sinun on kirjauduttava sisään ensin!");
define("_CONNECTED", "Yhdistetty");
define("_CPSERIALNUMBER", "CP-sarjanumero : ");
define("_HMISOFTWAREVERSION", "HMI-ohjelmaversio : ");
define("_OCPPSOFTWAREVERSION", "OCPP-ohjelmaversio : ");
define("_POWERBOARDSOFTWAREVERSION", "Virtalevyn ohjelmistoversio : ");
define("_OCPPDEVICEID", "OCPP-laitetunnus : ");
define("_DURATIONAFTERPOWERON", "Kesti virrankytkennän jälkeen : ");
define("_LOGOUT", "Kirjaudu ulos");
define("_PRESET", "Esiasetukset:");

define("_OCPPCONNECTION", "OCPP-liitäntä");
define("_ENABLED", "Päällä");
define("_DISABLED", "Pois päältä");
define("_CONNECTIONSETTINGS", "Liitäntäasetukset");
define("_CENTRALSYSTEMADDRESS", "Keskusjärjestelmän osoite ");
define("_CHARGEPOINTID", "Latauspisteen tunnus ");
define("_OCPPVERSION", "OCPP-versio");
define("_SAVE", "Tallenna");
define("_SAVESUCCESSFUL", "Tallennus onnistui.");
define("_CENTRALSYSTEMADDRESSERROR", "Keskusjärjestelmän osoite vaaditaan!");
define("_CHARGEPOINTIDERROR", "Latauspisteen tunnus vaaditaan!");
define("_SECONDS", "Sekuntia");
define("_ADD", "Lisää");
define("_REMOVE", "Poista");
define("_SAVECAPITAL", "TALLENNA");
define("_CANCEL", "Peruuta");

define("_CELLULAR", "Matkapuhelin");
define("_INTERFACEIPADDRESS", "Käyttöliittymän IP-osoite: ");
define("_ICCID", "ICCID: ");
define("_IMSI", "IMSI: ");
define("_IMEI", "IMEI: ");
define("_APNNAME", "APN-nimi: ");
define("_APNUSERNAME", "APN-käyttäjänimi: ");
define("_APNPASSWORD", "APN-salasana: ");
define("_IPSETTING", "IP-asetus: ");
define("_IPADDRESS", "IP-osoite: ");
define("_NETWORKMASK", "Verkon peite: ");
define("_DEFAULTGATEWAY", "Oletusyhdyskäytävä: ");
define("_PRIMARYDNS", "Ensisijainen DNS: ");
define("_SECONDARYDNS", "Toissijainen DNS: ");
define("_WIFI", "WLAN");
define("_SECURITY", "Turvallisuus: ");
define("_SECURITYTYPE", "Valitse turvallisuustyyppi");
define("_NONE", "Ei mitään");
define("_SELECTMODE", "Valitse tila!");
define("_RFIDLOCALLIST", "RFID paikallinen luettelo");
define("_ACCEPTALLRFIDS", "Hyväksy kaikki RFID:t");
define("_MANAGERFIDLOCALLIST", "Hallitse RFID paikallista luetteloa:");
define("_AUTOSTART", "Automaattikäynnistys");
define("_PROCESSING", "Käsitellään... Odota...");
define("_MACADDRESS", "MAC-osoite: ");
define("_WIFIHOTSPOT", "WLAN-yhteyspiste");
define("_TURNONDURINGBOOT", "Kytke virta käynnistyksen aikana: ");
define("_AUTOTURNOFFTIMEOUT", "Automaattinen sammutus aikakatkaisu: ");
define("_AUTOTURNOFF", "Automaattinen sammutus: ");
define("_HOTSPOTALERTMESSAGE", "Hotspot-asetuksen muutokset tulevat voimaan, kun laite käynnistetään seuraavan kerran. ");
define("_HOTSPOTREBOOTMESSAGE", "Haluatko käynnistää uudestaan nyt? ");

define("_DOWNLOADACLOGS", "Lataa AC-lokit");
define("_DOWNLOADCELLULARLOGS", "Lataa matkapuhelinmoduulin lokit");
define("_DOWNLOADPOWERBOARDLOGS", "Lataa virtalevyn lokit");
define("_PASSWORDRESETSUCCESSFUL", "Salasanan nollaus onnistui.");
define("_DBOPENEDSUCCESSFULLY", "Tietokannan avaaminen onnistui\n");
define("_WSSCERTSSETTINGS", "WSS-sertifikaattiasetukset ");
define("_CONFKEYS", "Kokoonpanonäppäimet");
define("_KEY", "Näppäin");
define("_STATIC", "Staattinen");
define("_TIMEZONE", "Aikavyöhyke");
define("_PLEASESELECTTIMEZONE", "Valitse aikavyöhyke");
define("_DISPLAYSETTINGS", "Näyttöasetukset");
define("_DISPLAYLANGUAGE", "Näyttökieli");
define("_BACKLIGHTDIMMING", "Taustavalon himmennys : ");
define("_PLEASESELECT", "Valitse");
define("_TIMEBASED", "Aikapohjainen");
define("_SENSORBASED", "Anturipohjainen");
define("_BACKLIGHTDIMMINGLEVEL", "Taustavalon himmennystaso : ");
define("_BACKLIGHTTHRESHOLD", "Taustavalon kynnysarvo : ");
define("_SETMIDTHRESHOLD", "SetMidThreshold");
define("_SETHIGHTHRESHOLD", "SetHighThresold");
define("_LOCALLOADMANAGEMENT", "Paikallisen kuorman hallinta");
define("_MINIMUMCURRENT", "Minimivirta: ");
define("_FIFOPERCENTAGE", "FIFO-prosentti: ");
define("_GRIDMAXCURRENT", "Verkon maksimivirta: ");
define("_MASTERIPADDRESS", "Päälaitteen IP-osoite: ");
define("_BACKLIGHTTIMESETTINGS", "Taustavalon aika-asetukset: ");
define("_SHOULDSELECTTIMEZONE", "* Aikavyöhyke on valittava!");
define("_MINIMUMCURRENTREQUIRED", "* Minimivirta vaaditaan!");
define("_CURRENTMUSTBENUMERIC", "* Virran on oltava numeerinen!");
define("_FIFOPERCREQUIRED", "* FIFO-prosentti vaaditaan!");
define("_FIFOPERCSHOULDBETWEEN", "* FIFO-prosentin on oltava välillä 0 ja 100!");
define("_PERCMUSTBENUMERIC", "* Prosentin on oltava numeerinen!");
define("_GRIDMAXCURRENTREQUIRED", "* Verkon maksimivirta vaaditaan!");
define("_GRIDCURRENTMUSTBENUMERIC", "* Verkon virran on oltava numeerinen!");
define("_IPADDRESSOFMASTERREQUIRED", "* Päälaitteen IP-osoite vaaditaan!");
define("_INVALIDIPADDRESS", "* Olet syöttänyt väärän IP-osoitteen!");
define("_SAMENETWORKLAN", "* Olet syöttänyt IP-osoitteen samassa verkossa LAN:n kanssa!");
define("_SAMENETWORKWLAN", "* Olet syöttänyt IP-osoitteen samassa verkossa WLAN-verkon kanssa!");
define("_APNISREQUIRED", "APN vaaditaan!");
define("_IPADDRESSREQUIRED", "IP-osoite vaaditaan!");
define("_NETWORKMASKREQUIRED", "Verkon peite vaaditaan!");
define("_INVALIDNETWORKMASK", "* Olet syöttänyt väärän verkon peitteen!");
define("_DEFAULTGATEWAYREQUIRED", "Oletusyhdyskäytävä vaaditaan!");
define("_INVALIDGATEWAY", "Olet syöttänyt väärän oletusyhdyskäytävän!");
define("_PRIMARYDNSREQUIRED", "Ensisijainen dns vaaditaan!");
define("_INVALIDDNS", "Olet syöttänyt väärän dns:n!");
define("_SELECTIPSETTING", "Valitse IP-asetus.");
define("_SSIDREQUIRED", "SSID vaaditaan!");
define("_PASSWORDISREQUIRED", "Salasana vaaditaan!");
define("_WIFIPASSWORDERROR", "Salasana on virheellinen, merkin pituuden on oltava vähintään 8 ja enintään 63 <br> kelvollista merkkiä a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL2", "&#8226; Salasana on virheellinen, merkin pituuden on oltava 20,<br>&#8226; Salasanassa on oltava vähintään kaksi kirjainta [A-Za-z],<br>&#8226; Salasanassa on oltava vähintään kaksi numeroa [0-9],<br>&#8226; Salasanassa on oltava vähintään kaksi erikoismerkkiä [!%&/()=?*#+-_]");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL3", "&#8226; Salasana on virheellinen, merkin pituuden on oltava vähintään 12, enintään 32,<br>&#8226; Salasanassa on oltava vähintään kaksi pientä kirjainta [a-z], <br>&#8226; Salasanassa on oltava vähintään kaksi isoa kirjainta [A-Z], <br>&#8226; Salasanassa on oltava vähintään kaksi numeroa [0-9],<br>&#8226; Salasanassa on oltava vähintään kaksi erikoismerkkiä [!%&/()=?*#+-_]");

define("_WIFISSIDERROR", "SSID on virheellinen, kelvollisia merkkejä a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_SELECTSECURITYTYPE", "Valitse turvallisuustyyppi");
define("_HOSTIPREQUIRED", "* Isäntä-IP vaaditaan!");
define("_CERTMANREQUIRED", "* Sertifioinnin hallinta vaaditaan!");
define("_OCPPENABLEALERT", "Jos haluat käyttää latausasemaa erillisessä tilassa,<br>on OCPP-yhteys kytkettävä ensin pois päältä &#39OCPP-asetusvalikossa&#39.");
define("_NOTSAVEDALERT", "Sivua ei tallennettu.");
define("_SAVEQUESTION", "Haluatko tallentaa muutokset?");
define("_OKBUTTON", "OK");
define("_LTECONNECTIONCONFIRM", "Matkapuhelinyhteys katkaistaan. Vahvistatko?");
define("_WIFICONNECTIONCONFIRM", "Wi-Fi yhteys katkaistaan. Vahvistatko?");
define("_DHCPSERVERCONNECTIONCONFIRM", "Jos haluat ottaa LAN DHCP -palvelimen käyttöön,<br>sinun on ensin poistettava Wi-Fi-hotspot<br>käytöstä Wi-Fi-yhteyspisteestä.");
define("_WIFIHOTSPOTCONNECTIONCONFIRM", "Jos haluat ottaa Wi-Fi-yhteyspisteen käyttöön,<br>sinun on ensin poistettava LAN DHCP -palvelin<br>käytöstä &#39LAN IP Setting&#39 -kohdasta.");

define("_DYNAMIC", "Dynaaminen");
define("_DIAGNOSTICS", "Diagnostiikka");
define("_LOCALLOAD", "Paikallisen kuorman hallinta");
define("_DOWNLOAD", "Lataa");
define("_STARTDATE", "Aloituspäivämäärä");
define("_ENDDATE", "Loppumispäivämäärä");
define("_CLEAREVENTLOGS", "Tyhjennä kaikki tapahtumalokit");
define("_CLEAREVENTLOGSINFO", "Tämä tyhjentää kaikki tapahtumalokit!");
define("_DOWNLOADEVENTLOGSINFO", "Lataa laitteen tapahtumalokit enintään 5 päivän ajalta");
define("_DEVICEEVENTLOGS", "Laitteen tapahtumalokit");
define("_DEVICECHANGELOGS", "Laitteen muutospäiväkirjat");
define("_LOGSDATEERROR", "Valitse päivämäärät enintään 5 päivän ajalta.");
define("_DOWNLOACHANGELOGS", "Lataa laitteen muutospäiväkirjat");
define("_VPNFUNCTIONALITY", "VPN-toiminnallisuus: ");
define("_CERTMANAGEMENT", "Sertifioinnin hallinta: ");
define("_NAME", "Nimi: ");
define("_CONNECTIONINTERFACE", "Yhteysliittymä ");
define("_ANY", "Mikä tahansa");
define("_OCPPCONNPARAMETERS", "OCPP kokoonpanon parametrit");
define("_SETDEFAULT", "Aseta oletusasetuksiin ");
define("_STANDALONEMODE", "Erillinen tila");
define("_STANDALONEMODETITLE", "Erillinen tila:");
define("_STANDALONEMODENOTSELECTED", "* Erillistä tilaa ei voida valita, koska OCPP on päällä.");
define("_CHARGERWEBUI", "Laturin verkkoliittymä");
define("_SYSTEMMAINTENANCE", "Järjestelmän ylläpito");
define("_HOSTIP", "Isäntä-IP: ");
define("_PASSWORDERRORLEVEL1", "Salasana on virheellinen, merkin pituuden tulee olla vähintään 6 merkkiä ja sisältää vähintään 1 pienen kirjaimen, 1 ison kirjaimen ja 1 numeromerkin!");
define("_SELECTBACKLIGHTDIMMING", "* Taustavalon himmennys on valittava!");
define("_ISREQUIRED", "vaaditaan!");
define("_ISNOTVALID", "ei ole kelvollinen!");
define("_ISDUPLICATED", "on monistettu!");
define("_MUSTBENUMERIC", "on oltava numeerinen!");
define("_VPNFUNCTIONALITYREQUIRED", "* Vpn toiminnallisuus vaaditaan!");
define("_VPNNAMEREQUIRED", "* Vpn nimi vaaditaan!");
define("_VPNPASSWORDREQUIRED", "* Vpn salasana vaaditaan!");
define("_EXPLANATION", "Näyttää vaaditun kentän.");
define("_FIRMWAREUPDATE", "Laiteohjelman päivitykset");
define("_BACKUPRESTORE", "Kokoonpanon varmuuskopiointi ja palautus");
define("_SYSTEMRESET", "Järjestelmän nollaus");
define("_CHANGEADMINPASSWORD", "Pääkäyttäjän salasana");
define("_FACTORYRESET", "Tehdasasetukset");
define("_FACTORYRESETBUTTON", "Tehdasasetusten palautus");
define("_FACTORYDEFAULTCONFIGURATION", "Tehdasasetusten kokoonpano");
define("_LOGFILES", "Lokitiedostot");
define("_BACKUPFILE", "Varmuuskopiointitiedosto");
define("_RESTOREFILE", "Palauta Config-tiedosto");
define("_FREEMODEMAXCHARACTER", "oltava vähintään 32 merkkiä!");
define("_RESTOREMESSAGE", "Vahvistatko, että otat muutokset käyttöön ja käynnistät sen uudelleen?");

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

define("_PASSWORDTYPEEXPLANATION", "Salasanan on oltava 6 merkin pituinen ja sisällettävä vähintään yhden
pienen, ison kirjaimen ja numeron.");
define("_PASSWORDTYPEEXPLANATIONLEVEL2", "Salasanan on oltava 20 merkin pituinen ja sisältää vähintään kaksi kirjainta,
kaksi numeroa ja kaksi erikoismerkkiä.");
define("_PASSWORDTYPEEXPLANATIONLEVEL3", "Salasanasi tulee olla vähintään 12, enintään 32 merkkiä pitkä ja sisältää vähintään yhden ison kirjaimen,
yhden pienen kirjaimen, numeronumeron ja erikoismerkit.");

define("_BACKTOLOGIN", "Takaisin sisäänkirjautumiseen");
define("_CHANGE", "Muuta");
define("_SYSTEMADMINISTRATION", "Järjestelmän hallinta");
define("_UPDATE", "Päivitys");
define("_CONFIRM", "Vahvista");
define("_FACTORYDEFAULTCONFIRM", "Haluatko varmasti palauttaa tehdasasetukset?");
define("_FILENAME", "Tiedostonimi");
define("_UPLOAD", "Lataa");
define("_SELECTFIRMWARE", "Valitse laiteohjelman päivitystiedosto tietokoneesta");
define("_FIRMWAREFILESIZE", "Tarkasta laiteohjelmatiedoston koko.");
define("_FIRMWAREFILETYPE", "Tarkasta laiteohjelmatiedoston tyyppi.");

define("_LESSTHANOREQUAL4", "oltava välillä 1 ja 4");
define("_LESSTHANOREQUAL20", "oltava alle tai sama kuin 20");
define("_LESSTHANOREQUAL65000", "oltava alle tai sama kuin 65000");
define("_LESSTHANOREQUAL300", "oltava alle tai sama kuin 300");
define("_LESSTHANOREQUAL86500", "oltava alle tai sama kuin 86500");
define("_LESSTHANOREQUAL10000", "oltava alle tai sama kuin 10000");
define("_LESSTHANOREQUAL22", "oltava alle tai sama kuin 22");
define("_LESSTHANOREQUAL10", "oltava alle tai sama kuin 10");
define("_LESSTHANOREQUAL600", "oltava alle tai sama kuin 600");
define("_LESSTHANOREQUAL120", "oltava alle tai sama kuin 120");
define("_HIGHTHANOREQUAL0", "oltava suurempi tai yhtä suuri kuin 0");
define("_CHANGEPASSWORDSUGGESTION", "Suosittelemme, että vaihdat oletussalasanan järjestelmän ylläpitovalikosta");

define("_FILESIZE", "Tarkasta tiedoston koko.");
define("_FILETYPE", "Tarkasta tiedoston tyyppi.");

define("_BACKUPVERSIONCHECK", "Tiedostoversio ei sovi laitteelle.");
define("_HARDRESETCONFIRM", "Haluatko varmasti nollata täysin?");
define("_SOFTRESETCONFIRM", "Haluatko varmasti nollata osittain?");
define("_NEWSETUP", "Lue uuden asetuksen ohjeet käyttöohjeesta.");

define("_LOGOSETTINGS", "Logo-asetukset");
define("_USELOGO", "Valitse logo-tiedosto tietokoneesta");
define("_LOGOTYPE", "Valitse logo png-muodossa.");
define("_LOGODIMENSION", "Suurin sallittu logo-koko on 80x80, valitse sopivan kokoinen logo.");

define("_SERVICECONTACTINFO", "Näytä huoltoyhteystiedot");
define("_SERVICECONTACTINFOCHARACTER", "Näytä huoltoyhteystiedot saavat olla enintään 25 merkin pituiset!<br>Kelvolliset merkit a..z 0..9 .+@*");

define("_SCREENTHEME", "Näyttöteema");
define("_DARKBLUE", "Tummansininen");
define("_ORANGE", "Oranssi");
define("_PLEASEENTERRFIDLOCALLIST", "Avaa RFID paikallinen luettelo!");

define("_LOADMANAGEMENT", "Kuormanhallinta");
define("_CPROLE", "Charge Point Role");
define("_GRIDSETTINGS", "Verkkoasetukset");
define("_LOADMANAGEMENTMODE", "Kuorman hallintatila");
define("_LOADMANAGEMENTGROUP", "Kuorman hallintaryhmä");
define("_LOADMANAGEMENTOPTION", "Kuormanhallintavaihtoehto");
define("_ALARMS", "Hälytykset");

define("_MASTER", "Päälaite");
define("_SLAVE", "Orjalaite");
define("_TOTALCURRENTLIMIT", "Kokonaisvirtaraja / vaihe");
define("_SUPPLYTYPE", "Syöttötyyppi");
define("_FIFOPERCANTAGE", "FIFO Percentage");
define("_TIC", "TIC");
define("_EQUALLYSHARED", "Tasajaettu");
define("_COMBINED", "Yhdistetty");
define("_TOTALCURRENTLIMITERROR", "Kokonaisvirtaraja / vaihe vaaditaan!");
define("_LESSTHAN1024", "oltava alle 1024");
define("_ATLEAST0","täytyy olla vähintään 0");
define("_MORETHAN12", "oltava yli 12");
define("_CHOOSEONE", "Valitse yksi");
define("_SLAVEMINCHCURRENT", "Offline Failsafe -latausvirta -asetus");
define("_SERIALNO", "Sarjanumero");
define("_CONNECTORSTATE", "Liittimen tila");
define("_NUMBEROFPHASES", "Vaihemäärä");
define("_PHASECONSEQUENCE", "Vaiheen liitäntäjakso");
define("_VIP", "VIP lataus");
define("_CPMODE", "CP-tila");
define("_VIPERROR", "VIP lataus vaaditaan");
define("_PHASECONSEQUENCEERROR", "Vaiheen liitäntäjakso vaaditaan!");
define("_CPMODEERROR", "CP-tila vaaditaan!");
define("_SUPPORTEDCURRENT", "Tuettu virta");
define("_INSTANTCURPERPHASE", "Välitön virtavaihe");
define("_FIFOCHARGINGPERCENTAGE", "FIFO latausprosentti");
define("_MINIMUMCURRENT1P", "Minimilatausvirta 1-vaiheinen");
define("_MINIMUMCURRENT3P", "Minimilatausvirta 3-vaiheinen");
define("_MAXIMUMCURRENT", "Maksimilatausvirta");
define("_STEP", "Askel");
define("_UPDATEDLMGROUP", "Päivitä DLM-ryhmä");
define("_MAINCIRCUITCURRENT", "Mainimaalinen verkkovirta");
define("_MAINCIRCUITCURRENTERROR", "Maksimaalinen verkkovirta vaaditaan!");
define("_DLMMAXCURRENT", "DLM:n kokonaisvirtaraja vaihetta kohti");
define("_DLMMAXCURRENTERROR", "DLM:n kokonaisvirtaraja vaihetta kohti vaaditaan!");
define("_DLMMAXCURRENTMORETHANMAIN", "DLM-kokonaisvirran rajan tulee olla yli puolet päävirtakatkaisijavirrasta");
define("_DLMMAXCURRENTLESSTHANMAIN", "DLM-kokonaisvirran rajan tulee olla pienempi kuin päävirtakatkaisijavirta");

define("_DHCPSERVER", "DHCP-palvelin");
define("_DHCPCLIENT", "DHCP-asiakas");

define("_MAXDHCPADDRRANGE", "DHCP-palvelimen loppu IP-osoite");
define("_MINDHCPADDRRANGE", "DHCP-palvelimen alku IP-osoite");

define("_MAXDHCPADDRRANGEERROR", "DHCP-palvelimen loppu IP-osoite vaaditaan!");
define("_MINDHCPADDRRANGEERROR", "DHCP-palvelimen alku IP-osoite vaaditaan!");
define("_DIFFERENCEBETWEENMAXANDMINADDRRANGE", "DHCP-palvelimen loppu IP-osoitteen tulee olla suurempi kuin DHCP-palvelimen alku IP-osoite");
define("_IPADDRESSRANGE", "IP-osoite ei voi sisältää arvoa DHCP-palvelimen alku ja loppu IP-osoitteiden välillä");
define("_INVALIDSUBNET", "IP-osoite ei ole todellinen aliverkko");

define("_CONNECTIONSTATUS", "Yhteyden tila");

define("_INSTALLATIONSETTINGS", "Asennus-asetukset");
define("_EARTHINGSYSTEM", "Maadoitusjärjestelmä");
define("_CURRENTLIMITERSETTINGS", "Virtarajoittimen asetus");
define("_CURRENTLIMITERPHASE", "Virtarajoittimen vaihe");
define("_CURRENTLIMITERVALUE", "Virtarajoittimen arvo");
define("_UNBALANCEDLOADDETECTION", "Epätasaisen kuorman tunnistus");
define("_EXTERNALENABLEINPUT", "Ulkoisen käyttöönoton tulo");
define("_LOCKABLECABLE", "Lukittava kaapeli");
define("_POWEROPTIMIZERTOTALCURRENTLIMIT", "Virran optimoijan kokonaisvirtaraja");
define("_POWEROPTIMIZER", "Virran optimoijan");
define("_TNORTT", "TN/TT");
define("_SPLITPHASE", "IT/Split Phase");
define("_ONEPHASE", "Yksi vaihe");
define("_THREEPHASE", "Kolmivaihe");
define("_POWEROPTIMIZERTOTALCURRENTLIMITMORETHANOREQUAL16", "Virran optimoijan <br> kokonaisvirtarajan on oltava <br> 16 tai suurempi");
define("_POWEROPTIMIZERTOTALCURRENTLIMITLESSTHANOREQUAL100", "Virran optimoijan <br> kokonaisvirtarajan on oltava <br> 100 tai pienempi");
define("_FOLLOWTHESUN", "Seuraa aurinkoa");
define("_FOLLOWTHESUNMODE", "Seuraa aurinkotilaa");
define("_AUTOPHASESWITCHING", "Automaattinen vaiheen vaihto");
define("_MAXHYBRID", "Max hybridi");
define("_SUNONLY", "Vain aurinko");
define("_SUNHYBRID", "Sun hybridi");

define("_DISPLAYBACKLIGHTSETTINGS", "Näytön taustavalon asetukset");
define("_BACKLIGHTLEVEL", "Taustavalon taso");
define("_SUNRISETIME", "Auringonnousun aika ");
define("_SUNSETTIME", "Auringonlaskun aika");

define("_HIGH", "Korkea");
define("_MID", "Keskitaso");
define("_LOW", "Matala");

define("_A", " (A)");

define("_CURRENTLIMITERVALUELESSTHAN8", "* Kun ZEReadySupport on päällä ja virtarajavaihe on yksi vaihe, virran raja-arvo ei voi olla pienempi kuin 8!");
define("_CURRENTLIMITERVALUELESSTHAN14", "* Kun ZEReadySupport on päällä ja virtarajavaihe on kolmivaiheinen, virran raja-arvo ei voi olla pienempi kuin 14!");
define("_LEDDIMMINGSETTINGS", "Led-himmennys asetukset");
define("_LEDDIMMINGLEVEL", "LED-himmennys taso");
define("_VERYLOW", "Erittäin matala");

define("_CELLULARGATEWAYCONFIRM", "Cellular Gateway poistetaan käytöstä.");

define("_ETHERNETIP", "Ethernet-liittymän IP:");
define("_WLANIP", "WLAN-liittymän IP:");
define("_STRENGTH", "Vahvuus");
define("_WIFIFREQ", "Taajuus");
define("_WIFILEVEL", "Taso");
define("_CELLULARIP", "Matkapuhelinliittymän IP:");
define("_CELLULAROPERCODE" , "Operaattori");
define("_CELLULARTECH" , "Tekniikka");
define("_APPLICATIONRESTART", "Tämä muutos vaatii sovelluksen uudelleenkäynnistyksen.");
define("_ACCEPTQUESTION", "Hyväksytkö muutokset?");
define("_SCANNETWORKS" , "Verkkojen skannaus");
define("_AVAILABLENETWORKS" , "Saatavilla olevat verkot");
define("_NETWORKSTATUS" , "Verkon tila");
define("_PLEASEWAITMSG" , "Odota...");
define("_SCANNINGWIFIMSG" , "Skannataan Wi-Fi-verkkoja");
define("_NOWIFIFOUNDMSG" , "Ei löytynyt Wi-Fi-verkkoja");
define("_PLEASECHECKWIFICONNMSG" , "Tarkista Wi-Fi-yhteytesi ja yritä uudelleen.");

define("_QRCODE", "Vis QR -kode");
define("_QRCODEONSCREEN", "QR -koodi Näytöllä");
define("_QRCODEDELIMITER", "QR-koodin erotin");
define("_INVALIDDELIMITERCHARACTER", "QR-koodin erotinmerkki on virheellinen, välilyöntiä ei voida hyväksyä, merkin pituuden on oltava vähintään 1 ja enintään 3, kelvollisia merkkejä 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");

define("_LOCATION", "Sijainti");
define("_INDOOR", "Sisätiloissa");
define("_OUTDOOR", "Ulkona");
define("_POWEROPTIMIZEREXTERNALMETER", "Ulkoinen Mittari");
define("_OPERATIONMODE", "Toimintatila");
define("_AUTOSELECTED", "Auto Valittu");
define("_NOTSELECTED", "Ei valittu");
define("_CHARGINGMODESELECTIONANDPOWEROPTIMIZERCONF", "Lataustilan Valinta ja Virran Optimoija -Määritykset");

define("_USERINTERACTION", "Käyttäjän vuorovaikutus");
define("_STANDBYLEDBEHAVIOUR", "Valmiustilan LED -käyttäytyminen");
define("_OFF", "Vinossa");
define("_ON", "Päällä");

define("_LOADSHEDDINGMINIMUMCURRENT", "Kuormanpoiston minimivirta");
define("_UNBALANCEDLOADDETECTIONMAXCURRENT", "Epätasapainoisen kuorman havaitsemisen maksimivirta");

define("_SCHEDULEDCHARGING", "Suunniteltu lataus");
define("_OFFPEAKCHARGING", "Off Peak -lataus");
define("_OFFPEAKCHARGINGWEEKENDS", "Lataushuippujen ulkopuolella viikonloppuisin");
define("_OFFPEAKCHARGINGPERIODS", "Huippuhuippujen latausjaksot");
define("_CONTINUECHARGINGENDPEAKINTERVAL", "Jatka lataamista huippuhetken päättymisen jälkeen");
define("_CONTINUECHARGINGWITHOUTREAUTHAFTERPOWERLOSS", "atka lataamista ilman uudelleentodentamista virran katkeamisen jälkeen");



define("_RANDOMISEDDELAYMAXIMUMDURATION", "Satunnaistettu viiveen enimmäiskesto (sekuntia)");

define("_RANDOMISEDDELAYMAXIMUMDURATIONERROR", "* Satunnaistettu viiveen enimmäiskesto vaaditaan!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONBENUMERIC", "* Satunnaistetun viiveen enimmäiskeston on oltava kokonaisluku!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONLIMIT", "* Satunnaistetun viiveen enimmäiskeston tulee olla 0 - 1800");
define("_OFFPEAKCHARGINGPERIODSERROR", "* Huippuhuippujen latausjaksot vaaditaan!");
define("_OFFPEAKCHARGINGPERIODSSAMETIMEERROR", "* Off Peak -latauksen aloitus- ja lopetusaika eivät voi olla samat!");
define("_OFFPEAKCHARGINGSECONDTIMEPERIOD", "Lataushuippujen ulkopuolella toinen aikajakso");
define("_OFFPEAKDISABLEDCONFIRM", "Ruuhka-aikojen ulkopuolinen lataus poistetaan käytöstä. Vahvistatko?");
define("_SHOWSERVICECONTACTINFO", "Näytä lisäpalvelun yhteystiedot");
define("_EXTRASERVICECONTACTINFORMATION", "Huollon yhteystiedot näkyvät Connect Charging Cable, Latausvalmistelut, Alustus ja Odotetaan liitäntää -näytöt");

define("_LOADSHEDDINGSTATUS", "Kuorman irtoamisen tila: ");
define("_ACTIVE", "Aktiivinen");
define("_INACTIVE", "Epäaktiivinen");
define("_POWEROPTIMIZEREXTERNALMETERENABLEALERT", "Jos haluat käyttää Modbus-kuormanhallintavaihtoehtoasi,<br>sinun on ensin poistettava Power Optimizerin kokonaisvirtaraja<br>&#39Lataustilan valinnasta ja Power Optimizer -määrityksistä&#39.");
define("_MODBUSALERT", "Jos haluat ottaa käyttöön ulkoisen Power Optimizer -mittarin,<br>sinun on ensin poistettava Modbus-aktivointi<br>&#39Local Load Managementista&#39.");
define("_POWEROPTIMIZERDLMENABLEALERT", "Jos haluat käyttää Kuormanhallintaoptiota Master/Slave-tilassa,<br>sinun on ensin poistettava Tehon optimoija käytöstä<br>&#39Lataustilan valinta ja Tehon optimoijan asetukset&#39 -valikosta.");
define("_DLMALERT", "Jos haluat aktivoida Tehon optimointimenettelysi,<br>sinun on ensin poistettava Master/Slave<br>käytöstä &#39Paikallisesta Kuormanhallinnasta&#39.");

define("_FOLLOWTHESUNDLMENABLEALERT", "Jos haluat käyttää Kuormanhallintaoptiota Master/Slave-tilassa,<br>sinun on ensin poistettava Seuraa aurinkoa<br>&#39Lataustilan valinta ja Tehon optimoijan asetukset&#39 -valikosta.");
define("_DLMALERTFOLLOWTHESUN", "Jos haluat aktivoida Seuraa aurinkoa,<br>sinun on ensin poistettava Master/Slave<br>käytöstä &#39Paikallisesta Kuormanhallinnasta&#39.");

define("_RESETUSERPASSWORD", "Palauta käyttäjän <br> salasana");
define("_INSTALLATIONERRORENABLEDCONFIRM", "Jos haluat poistaa asennusvirheen käyttöönoton käytöstä,<br>sinun on ensin asetettava maadoitusjärjestelmä &#39Asennusasetukset&#39 kohtaan IT/Split Phase.");
define("_EARTHINGSYSTEMCONFIRM", "Jos haluat asettaa maadoitusjärjestelmän asetukseksi TN/TT,<br>sinun on ensin otettava käyttöön asennusvirheen käyttöönotto &#39OCPP-asetuksista&#39.");

define("_AUTHKEYMAXLIMIT", "pituus saa olla enintään 40 merkkiä.");
define("_AUTHORIZATIONKEYEMPTYCONFIRM", "Authorization Key-kenttä on tyhjä.<br>Vahvistatko muutokset?");

define("_RANDOMISEDDELAYATOFFPEAKEND", "Satunnaistettu viive ruuhkan ulkopuolella");
define("_FIFO", "FIFO");
define("_FAILSAFECURRENT", "Vikaturvallinen virta");
define("_FAILSAFECURRENTERROR", "Vikavirta vaaditaan!");
define("_FAILSAFECURRENTLESSTHAN0", "* Vikaturvavirta-arvo ei saa olla pienempi kuin 0!");
define("_FAILSAFECURRENTMORETHAN32", "* Failsafe Current -arvo ei saa olla suurempi kuin 32!");
define("_FAILSAFECURRENTMORETHAN50", "* Failsafe Current -arvo ei saa olla yli 50!");

define("_LOCALCHARGESESSION", "Paikalliset maksuistunnot");
define("_ROWNUMBER", "Rivin nro");
define("_SESSIONUUID", "Veloittaa ID");
define("_AUTHORIZATIONUID", "RFID-koodi");
define("_STARTTIME", "Alkamisaika");
define("_STOPTIME", "Lopetusaika");
define("_TOTALTIME", "Kokonaisaika");
define("_STATUS", "Tila");
define("_CHARGEPOINTIDS", "Pistorasian numero");
define("_INITIALENERGY", "Alkuenergia(kWh)");
define("_LASTENERGY", "Viimeinen energi(kWh)");
define("_TOTALENERGY", "Kokonaisenergia(kWh)");
define("_DOWNLOADLOCALCHARGESESSIONLOGS", "Koko istunnon kirjautuminen CSV:ssä");
define("_DOWNLOADFULLSESSIONLOGS", "Yhteenvetokirjaus CSV:ssä");
define("_STARTDATE", "Aloituspäivämäärä");
define("_ENDDATE", "päättymispäivä");
define("_RFIDSELECTION", "RFID valinta");
define("_CLEAR", "asia selvä");

define("_FALLBACKCURRENT", "Varavirta");
define("_FALLBACKRANGE", "Varavirran on oltava 0 tai alueella ");
define("_DOWNLOADEEBUSLOGS", "EEBUS-lokit");
define("_PAIRINGENERGYMANAGER", "Pariliitos käytössä");
define("_PAIR", "Pair Enable");
define("_UNPAIR", "Poista pari");
define("_EEBUS", "EEBUS");
define("_FIRMWAREVERSION", "Laiteohjelmistoversio");
define("_EEBUSDISCOVERY", "Löydetyt laitteet");
define("_REFRESH", "Päivitä");
define("_CPROLEMASTERREQUIREDFIELD", "Jos haluat päivittää kuormanhallintaryhmän asetuksia, latauspisterooli on tallennettava &#39Master&#39 kuormanhallinnan yleisistä asetuksista.");

define("_LISTOFSLAVES", "Orjien luettelo");
define("_NUMBEROFSLAVES", "Orjien lukumäärä");
define("_LISTOFCONNECTOR", "Luettelo liittimistä");
define("_AVAILABLECURRENT", "Käytettävissä oleva nykyinen vaihe");

define("_DLMINTERFACE", "DLM-liitäntä");
define("_ETHERNET", "Ethernet");
define("_DLMINTERFACEERROR", "Ota WiFi käyttöön verkkoliitännöistä!");

define("_MUSTBEINTEGER", "täytyy olla kokonaisluku!");
define("_GRIDBUFFER", "Verkon suojausmarginaaliprosentti");
define("_CHARGINGSTATUSALERT", "Lataustilassa arvoa ei voi päivittää!");
define("_READUNDERSTAND", "Luin, ymmärrän");

define("_MORETHAN10", "Sinun on suurennettava enimmäisverkkovirtaa tai vähennettävä verkon suojausmarginaaliprosenttia ennen näiden asetusten tallentamista. Verkkovirran enimmäisraja ei voi olla pienempi kuin 10 A, kun käytetään verkkosuojausmarginaaliprosenttia.");

define("_CLUSTERMAXCURRENT", "Klusterin maksimivirta");
define("_CLUSTERFAILSAFECURRENT", "Klusterin vikasietovirta");
define("_CLUSTERMAXCURRENTERROR", "Klusterin maksimivirta vaaditaan!");
define("_CLUSTERFAILSAFECURRENTERROR", "Cluster Failsafe Current vaaditaan!");
define("_CLUSTERFAILSAFECURRENTLESSTHAN0", "Cluster Failsafe Nykyinen arvo ei saa olla pienempi kuin 0!");
define("_CLUSTERFAILSAFECURRENTMORETHAN", "Cluster Failsafe Current -arvon on oltava pienempi kuin grid-virran enimmäisarvo!");
define("_CLUSTERFAILSAFE", "Klusterin vikasietotila");

define("_CLUSTERMAXCURRENTLESSTHAN10", "Klusterin maksimi nykyinen arvo ei saa olla pienempi kuin 10");
define("_CLUSTERMAXCURRENTMORETHAN", "Cluster Max Current -arvon on oltava yhtä suuri tai pienempi kuin tämä arvo:");