<?php
include_once "access_control.php";
define("_LOGIN", "PRIJAVA");
define("_USERNAME", "Korisničko ime obavezno:");
define("_PASSWORD", "Lozinka:");
define("_CHANGEPASSWORD", "Promena lozinke");
define("_CURRENTPASSWORD", "Trenutačna lozinka:");
define("_NEWPASSWORD", "Nova lozinka:");
define("_CONFIRMNEWPASSWORD", "Potvrdite novu lozinku:");
define("_SUBMIT", "Pošaljite");
define("_CURRENTPASSWORDREQUIRED", "Trenutačna lozinka obavezna");
define("_PASSWORDREQUIRED", "Lozinka obavezna");
define("_USERNAMEREQUIRED", "Korisničko ime obavezno");
define("_USERAUTHFAILED", "Autentifikacija korisnika nije uspela!");
define("_USERNAMEORCURRENTPASSWORDWRONG", "Korisničko ime ili trenutna lozinka je pogrešna!");
define("_DBACCESSFAILURE", "Nije moguće pristupiti bazi podataka!");
define("_CHANGEPASSWORDERROR", "Prvo morate da promenite lozinku!");
define("_SAMEPASSWORDERROR", "Trenutačna i nova lozinka treba da se razlikuju jedna od druge!");
define("_PASSWORDMATCHERROR", "Lozinke se ne poklapaju!");
define("_CURRENTPASSWORDWRONG", "Trenutačna lozinka je pogrešna!");
define("_PASSWORDERRORLEVEL2", "Lozinka je nevažeća, dužina znakova mora biti 20 i da sadrži najmanje dva slova [A-Za-z], dve cifre [0-9] and two i dva specijalna znaka [!%&/()=?*#+-_]");
define("_PASSWORDERRORLEVEL3", "Lozinka nije važeća, a dužina znakova mora biti najmanje 12, sa najviše 32 znaka i sadržavati barem dva mala slova [a-z], dva velika slova [A-Z], dve cifre [0-9] i barem dva posebna znaka [!% &/()=?*#+-_].");
define("_LOGINLOCKOUT", "Превише неуспелих покушаја. Покушајте након 1800 секунди.");

define("_MAINPAGE", "Početna stranica");
define("_GENERAL", "Opšta podešavanja");
define("_OCPPSETTINGS", "OCPP podešavanja");
define("_NETWORKINTERFACES", "Mrežni interfejsi");

define("_OCPPCONNINTERFACE", "OCPP mrežni interfejs : ");
define("_CONNECTIONSTATE", "Status veze : ");
define("_DISCONNECTED", "Isključeno");
define("_NEEDTOLOGINFIRST", "Prvo se morate prijaviti!");
define("_CONNECTED", "Povezano");
define("_CPSERIALNUMBER", "CP serijski broj : ");
define("_HMISOFTWAREVERSION", "Verzija softvera HMI : ");
define("_OCPPSOFTWAREVERSION", "Verzija softvera OCPP : ");
define("_POWERBOARDSOFTWAREVERSION", "Verzija softvera Power Board : ");
define("_OCPPDEVICEID", "OCPP ID uređaja : ");
define("_DURATIONAFTERPOWERON", "Trajanje nakon uključivanja : ");
define("_LOGOUT", "Odjava");
define("_PRESET", "Unapred postavljena podešenja:");

define("_OCPPCONNECTION", "OCPP veza");
define("_ENABLED", "Omogućen");
define("_DISABLED", "Onemogućen");
define("_CONNECTIONSETTINGS", "Podešavanja veze");
define("_CENTRALSYSTEMADDRESS", "Adresa centralnog sistema ");
define("_CHARGEPOINTID", "ID tačke punjenja ");
define("_OCPPVERSION", "OCPP verzija");
define("_SAVE", "Spremiti");
define("_SAVESUCCESSFUL", "Uspešno spremljeno.");
define("_CENTRALSYSTEMADDRESSERROR", "Potrebna je adresa centralnog sistema!");
define("_CHARGEPOINTIDERROR", "ID tačke punjenja je obavezan!");
define("_SECONDS", "Sekunde");
define("_ADD", "Dodati");
define("_REMOVE", "Ukloniti");
define("_SAVECAPITAL", "SPREMITI");
define("_CANCEL", "Otkaži");

define("_CELLULAR", "Mobilni telefone");
define("_INTERFACEIPADDRESS", "IP adresa interfejsa: ");
define("_ICCID", "ICCID: ");
define("_IMSI", "IMSI: ");
define("_IMEI", "IMEI: ");
define("_APNNAME", "APN ime: ");
define("_APNUSERNAME", "APN korisničko ime: ");
define("_APNPASSWORD", "APN lozinska: ");
define("_IPSETTING", "IP podešavanja: ");
define("_IPADDRESS", "IP adresa: ");
define("_NETWORKMASK", "Mrežna maska: ");
define("_DEFAULTGATEWAY", "Zadani gejtvej: ");
define("_PRIMARYDNS", "Primarni DNS: ");
define("_SECONDARYDNS", "Sekundarni DNS: ");
define("_WIFI", "WLAN");
define("_SECURITY", "Bezbednost: ");
define("_SECURITYTYPE", "Izaberite tip bezbednosti");
define("_NONE", "Nijedan");
define("_SELECTMODE", "Molimo izaberite režim!");
define("_RFIDLOCALLIST", "RFID lokalna lista");
define("_ACCEPTALLRFIDS", "Prihvatite sve RFID-ove");
define("_MANAGERFIDLOCALLIST", "Upravljajte RFID lokalnom listom:");
define("_AUTOSTART", "Autostart");
define("_PROCESSING", "Obrada je u toku... Molimo sačekajte...");
define("_MACADDRESS", "MAC adresa: ");
define("_WIFIHOTSPOT", "ViFi hotspot");
define("_TURNONDURINGBOOT", "Uključite tokom pokretanja: ");
define("_AUTOTURNOFFTIMEOUT", "Vremensko ograničenje automatskog isključivanja: ");
define("_AUTOTURNOFF", "Automatsko isključivanje: ");
define("_HOTSPOTALERTMESSAGE", "Promene podešavanja hotspota će stupiti na snagu sledeći put kada se uređaj uključi. ");
define("_HOTSPOTREBOOTMESSAGE", "Da li želite da ponovo pokrenete sistem sada? ");

define("_DOWNLOADACLOGS", "Preuzmite AC dnevnike");
define("_DOWNLOADCELLULARLOGS", "Preuzmite dnevnike modula za mobilne telefone");
define("_DOWNLOADPOWERBOARDLOGS", "Preuzmite Power Board dnevnike");
define("_PASSWORDRESETSUCCESSFUL", "Vaša lozinka je uspešno resetovana.");
define("_DBOPENEDSUCCESSFULLY", "Baza podataka je uspešno otvorena\n");
define("_WSSCERTSSETTINGS", "Podešavanja VSS sertifikata ");
define("_CONFKEYS", "Konfiguracioni tasteri");
define("_KEY", "Taster");
define("_STATIC", "Statično");
define("_TIMEZONE", "Vremenska zona");
define("_PLEASESELECTTIMEZONE", "Molimo izaberite vremensku zonu");
define("_DISPLAYSETTINGS", "Podešavanja ekrana");
define("_DISPLAYLANGUAGE", "Jezik prikaza");
define("_BACKLIGHTDIMMING", "Zatamnjenje pozadinskog osvetljenja : ");
define("_PLEASESELECT", "Molimo izaberite");
define("_TIMEBASED", "Na bazi vremena");
define("_SENSORBASED", "Na bazi senzora");
define("_BACKLIGHTDIMMINGLEVEL", "Nivo zatamnjenja pozadinskog osvetljenja : ");
define("_BACKLIGHTTHRESHOLD", "Prag pozadinskog osvetljenja : ");
define("_SETMIDTHRESHOLD", "SetMidThreshold");
define("_SETHIGHTHRESHOLD", "SetHighThresold");
define("_LOCALLOADMANAGEMENT", "Upravljanje lokalnim opterećenjem");
define("_MINIMUMCURRENT", "Minimalna struja: ");
define("_FIFOPERCENTAGE", "FIFO procenat: ");
define("_GRIDMAXCURRENT", "Maksimalna struja mreže: ");
define("_MASTERIPADDRESS", "IP adresa mastera: ");
define("_BACKLIGHTTIMESETTINGS", "Podešavanja vremena pozadinskog osvetljenja: ");
define("_SHOULDSELECTTIMEZONE", "* Morate da izaberete vremensku zonu!");
define("_MINIMUMCURRENTREQUIRED", "* Potrebna je minimalna struja!");
define("_CURRENTMUSTBENUMERIC", "* Struja mora biti numerička!");
define("_FIFOPERCREQUIRED", "* FIFO procenat je obavezan!");
define("_FIFOPERCSHOULDBETWEEN", "* FIFO procenat mora biti između 0 i 100!");
define("_PERCMUSTBENUMERIC", "* Procenat mora biti numerički!");
define("_GRIDMAXCURRENTREQUIRED", "* Potrebna je maksimalna struja mreže!");
define("_GRIDCURRENTMUSTBENUMERIC", "* Struja mreže mora biti numerička!");
define("_IPADDRESSOFMASTERREQUIRED", "* IP adresa mastera je obavezna!");
define("_INVALIDIPADDRESS", "* Uneli ste nevažeću IP adresu!");
define("_SAMENETWORKLAN", "* Uneli ste IP adresu u istoj mreži sa LAN-om!");
define("_SAMENETWORKWLAN", "* Uneli ste IP adresu u istoj mreži sa WLAN-om!");
define("_APNISREQUIRED", "APN je obavezan!");
define("_IPADDRESSREQUIRED", "IP adresa je obavezna!");
define("_NETWORKMASKREQUIRED", "Mrežna maska je obavezna!");
define("_INVALIDNETWORKMASK", "* Uneli ste nevažeću mrežnu masku!");
define("_DEFAULTGATEWAYREQUIRED", "Potreban je podrazumevani mrežni prolaz!");
define("_INVALIDGATEWAY", "Uneli ste nevažeći podrazumevani gatevai!");
define("_PRIMARYDNSREQUIRED", "Primarni DNS je obavezan!");
define("_INVALIDDNS", "Uneli ste nevažeći DNS!");
define("_SELECTIPSETTING", "Odaberite IP podešavanje.");
define("_SSIDREQUIRED", "SSID je obavezan!");
define("_PASSWORDISREQUIRED", "Lozinka obavezna!");
define("_WIFIPASSWORDERROR", "Lozinka je nevažeća, dužina znakova mora biti najmanje 8, a najviše može da sadrži 63 <br> važeća znaka a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL2", "&#8226; Lozinka je nevažeća, dužina znakova mora biti 20,<br>&#8226; i da sadrži najmanje dva slova [A-Za-z],<br>&#8226; dve cifre [0-9],<br>&#8226; i dva specijalna znaka [!%&/()=?*#+-_]");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL3", "&#8226; Lozinka nije važeća, a dužina znakova mora biti najmanje 12, sa maksimalno 32,<br>&#8226; Lozinka mora sadržavati barem dva mala slova [a-z], <br>&#8226; Lozinka mora sadržavati barem dva velika slova [A-Z], <br>&#8226; Lozinka mora sadržavati barem dve cifre [0-9],<br>&#8226; Lozinka mora sadržavati barem dva posebna znaka [!%&/()=?*#+-_]");
define("_WIFISSIDERROR", "SSID je obavezan, važeća znaka a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_SELECTSECURITYTYPE", "Molimo izaberite tip bezbednosti");
define("_HOSTIPREQUIRED", "* IP hosta je obavezan!");
define("_CERTMANREQUIRED", "* Upravljanje sertifikacijom je potrebno!");
define("_OCPPENABLEALERT", "Ako želite da koristite svoju stanicu za punjenje u samostalnom režimu,<br>prvo morate da onemogućite OCPP vezu iz &#39OCPP menija podešavanja&#39");
define("_NOTSAVEDALERT", "Stranica nije sačuvana.");
define("_SAVEQUESTION", "Da li želite da sačuvate promene?");
define("_OKBUTTON", "Uredu");
define("_LTECONNECTIONCONFIRM", "Mobilna veza će biti onemogućena. Da li potvrđujete?");
define("_WIFICONNECTIONCONFIRM", "Vi-Fi veza će biti onemogućena. Da li potvrđujete?");
define("_DHCPSERVERCONNECTIONCONFIRM", "Ako želite da omogućite LAN DHCP server,<br>prvo morate da onemogućite Vi-Fi Hotspot<br>iz &#39Vi-Fi Hotspot&#39.");
define("_WIFIHOTSPOTCONNECTIONCONFIRM", "Ako želite da omogućite Vi-Fi Hotspot,<br>prvo morate da onemogućite LAN DHCP server<br>iz &#39LAN IP Setting&#39.");

define("_DYNAMIC", "Dinamika");
define("_DIAGNOSTICS", "Dijagnostike");
define("_LOCALLOAD", "Upravljanje lokalnim opterećenjem");
define("_DOWNLOAD", "Preuzmi");
define("_STARTDATE", "Datum početka");
define("_ENDDATE", "Datum završetka");
define("_CLEAREVENTLOGS", "Obriši sve dnevnike događaja");
define("_CLEAREVENTLOGSINFO", "Ovo će obrisati sve dnevnike događaja!");
define("_DOWNLOADEVENTLOGSINFO", "Preuzmi dnevnike događaja uređaja za maksimalno 5 dana");
define("_DEVICEEVENTLOGS", "Dnevnici događaja uređaja");
define("_DEVICECHANGELOGS", "Dnevnici promena uređaja");
define("_LOGSDATEERROR", "Molimo vas da odaberete datume za maksimalno 5 dana.");
define("_DOWNLOACHANGELOGS", "Preuzmi dnevnike promena uređaja");
define("_VPNFUNCTIONALITY", "VPN funkcionalnost: ");
define("_CERTMANAGEMENT", "Upravljanje sertifikacijom: ");
define("_NAME", "Ime: ");
define("_CONNECTIONINTERFACE", "Interfejs za povezivanje ");
define("_ANY", "Bilo koji");
define("_OCPPCONNPARAMETERS", "OCPP konfiguracioni parametri");
define("_SETDEFAULT", "Podesite na podrazumevane vrednosti ");
define("_STANDALONEMODE", "Samostalni režim");
define("_STANDALONEMODETITLE", "Samostalni režim:");
define("_STANDALONEMODENOTSELECTED", "* Samostalni režim se ne može izabrati jer je OCPP omogućen.");
define("_CHARGERWEBUI", "Veb korisnički interfejs punjača");
define("_SYSTEMMAINTENANCE", "Održavanje sistema");
define("_HOSTIP", "Host IP: ");
define("_PASSWORDERRORLEVEL1", "Lozinka je nevažeća, dužina karaktera mora da ima najmanje 6 znakova i da sadrži najmanje 1 malo slovo, 1 veliko slovo i 1 numerički znak!");
define("_SELECTBACKLIGHTDIMMING", "* Morate da izaberete zatamnjenje pozadinskog osvetljenja!");
define("_ISREQUIRED", "je potrebno!");
define("_ISNOTVALID", "nije važeće!");
define("_ISDUPLICATED", "Je dupliranje!");
define("_MUSTBENUMERIC", "mora biti numerički!");
define("_VPNFUNCTIONALITYREQUIRED", "* Potrebna je VPN funkcionalnost!");
define("_VPNNAMEREQUIRED", "* Potreban je VPN naziv!");
define("_VPNPASSWORDREQUIRED", "* Potrebna je VPN lozinka!");
define("_EXPLANATION", "označava obavezno polje.");
define("_FIRMWAREUPDATE", "Ažuriranja firmvera");
define("_BACKUPRESTORE", "Rezervna kopija i vraćanje konfiguracije");
define("_SYSTEMRESET", "Resetovanje sistema");
define("_CHANGEADMINPASSWORD", "Administrativna lozinka");
define("_FACTORYRESET", "Fabričke vrednosti");
define("_FACTORYRESETBUTTON", "Vraćanje na fabrička podešenja");
define("_FACTORYDEFAULTCONFIGURATION", "Fabrički podrazumevana konfiguracija");
define("_LOGFILES", "Datoteke sa beleškama");
define("_BACKUPFILE", "Rezervna datoteka");
define("_RESTOREFILE", "Vratite konfiguracioni fajl");
define("_FREEMODEMAXCHARACTER", "mora imati najviše 32 znaka!");
define("_RESTOREMESSAGE", "Da li potvrđujete da primenite promene i ponovo pokrenete sistem sada?");

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

define("_PASSWORDTYPEEXPLANATION", "Vaša lozinka mora da ima 6 znakova i da sadrži najmanje jedno veliko slovo,
jedno malo slovo, jedan broj.");

define("_PASSWORDTYPEEXPLANATIONLEVEL2", "Vaša lozinka mora da ima 20 znakova i barem dva
slova, dve cifre i dva posebna znaka.");

define("_PASSWORDTYPEEXPLANATIONLEVEL3", "Vaša lozinka mora da sadrži barem 12, maksimalno 32 znaka i barem dva velika slova,
dva mala slova, dve cifre i dva posebna znaka.");

define("_BACKTOLOGIN", "Povratak na prijavu");
define("_CHANGE", "Promena");
define("_SYSTEMADMINISTRATION", "Sistemska administracija");
define("_UPDATE", "Ažuriranje");
define("_CONFIRM", "Potvrdi");
define("_FACTORYDEFAULTCONFIRM", "Da li ste sigurni da ćete se vratiti na fabrička podešavanja?");
define("_FILENAME", "Naziv dokumenta");
define("_UPLOAD", "Učitaj");
define("_SELECTFIRMWARE", "Izaberite datoteku za ažuriranje firmvera sa računara");
define("_FIRMWAREFILESIZE", "Proverite veličinu datoteke firmvera.");
define("_FIRMWAREFILETYPE", "Proverite tip datoteke firmvera.");

define("_LESSTHANOREQUAL4", "mora biti između 1 i 4");
define("_LESSTHANOREQUAL20", "mora biti manja ili jednaka 20");
define("_LESSTHANOREQUAL65000", "mora biti manja ili jednaka 65000");
define("_LESSTHANOREQUAL300", "mora biti manja ili jednaka 300");
define("_LESSTHANOREQUAL86500", "mora biti manja ili jednaka 86500");
define("_LESSTHANOREQUAL10000", "mora biti manja ili jednaka 10000");
define("_LESSTHANOREQUAL22", "mora biti manja ili jednaka 22");
define("_LESSTHANOREQUAL10", "mora biti manja ili jednaka 10");
define("_LESSTHANOREQUAL600", "mora biti manja ili jednaka 600");
define("_LESSTHANOREQUAL120", "mora biti manja ili jednaka 120");
define("_HIGHTHANOREQUAL0", "mora biti veći ili jednak 0");
define("_CHANGEPASSWORDSUGGESTION", "Preporučujemo vam da promenite podrazumevanu lozinku iz menija za održavanje sistema");

define("_FILESIZE", "Proverite veličinu datoteke.");
define("_FILETYPE", "Proverite tip datoteke.");

define("_BACKUPVERSIONCHECK", "Verzija ove datoteke nije prikladna za uređaj.");
define("_HARDRESETCONFIRM", "Jeste li sigurni u tvrdo resetovanje?");
define("_SOFTRESETCONFIRM", "Da li ste sigurni u meko resetovanje?");
define("_NEWSETUP", "Molimo koristite korisnički priručnik za novo podešavanje.");

define("_LOADMANAGEMENT", "Upravljanje opterećenjem");
define("_CPROLE", "Uloga tačke punjenja");
define("_GRIDSETTINGS", "Podešavanja mreže");
define("_LOADMANAGEMENTMODE", "Režim upravljanja opterećenjem");
define("_LOADMANAGEMENTGROUP", "Grupa za upravljanje opterećenjem");
define("_LOADMANAGEMENTOPTION", "Opcija upravljanja opterećenjem");
define("_ALARMS", "Alarmi");

define("_MASTER", "Master");
define("_SLAVE", "Slave");
define("_TOTALCURRENTLIMIT", "Ograničenje ukupne struje po fazi");
define("_SUPPLYTYPE", "Tip napajanja");
define("_FIFOPERCANTAGE", "FIFO procenat");
define("_TIC", "TIC");
define("_EQUALLYSHARED", "Jednako podeljeno");
define("_COMBINED", "Kombinovano");
define("_TOTALCURRENTLIMITERROR", "Potrebno je ograničenje ukupne struje po fazi!");
define("_LESSTHAN1024", "mora biti manje od 1024");
define("_ATLEAST0","mora biti barem 0");
define("_MORETHAN12", "mora biti više od 12");
define("_CHOOSEONE", "Izaberite jedno");
define("_SLAVEMINCHCURRENT", "Trenutna postavka za bezbedno punjenje van mreže");
define("_SERIALNO", "Serijski broj");
define("_CONNECTORSTATE", "Status konektora");
define("_NUMBEROFPHASES", "Broj faza");
define("_PHASECONSEQUENCE", "Redosled povezivanja faza");
define("_VIP", "VIP punjenje");
define("_CPMODE", "CP režim");
define("_VIPERROR", "VIP punjenje je potrebno");
define("_PHASECONSEQUENCEERROR", "Potreban je redosled povezivanja faza!");
define("_CPMODEERROR", "CP režim je obavezan!");
define("_SUPPORTEDCURRENT", "Podržana struja");
define("_INSTANTCURPERPHASE", "Faza trenutne struje");
define("_FIFOCHARGINGPERCENTAGE", "FIFO procenat punjenja");
define("_MINIMUMCURRENT1P", "Minimalna struja punjenja 1-fazna");
define("_MINIMUMCURRENT3P", "Minimalna struja punjenja 3-fazna");
define("_MAXIMUMCURRENT", "Maksimalna struja punjenja");
define("_STEP", "Korak");
define("_UPDATEDLMGROUP", "Ažurirajte DLM grupu");
define("_MAINCIRCUITCURRENT", "Максимална струја мреже");
define("_MAINCIRCUITCURRENTERROR", "Потребна је максимална струја мреже!");
define("_DLMMAXCURRENT", "DLM ukupno ograničenje struje po fazi");
define("_DLMMAXCURRENTERROR", "DLM ukupno ograničenje struje po fazi je obavezno!");
define("_DLMMAXCURRENTMORETHANMAIN", "DLM ukupno ograničenje struje po fazi treba biti veće od polovice struje glavnog prekidača kola");
define("_DLMMAXCURRENTLESSTHANMAIN", "DLM ukupno ograničenje struje treba bi biti manje od struje glavnog prekidača kola");

define("_LOGOSETTINGS", "Podešavanja logotipa");
define("_USELOGO", "Izaberite datoteku logotipa sa računara");
define("_LOGOTYPE", "Izaberite logo u png formatu.");
define("_LOGODIMENSION", "Maksimalna dozvoljena veličina logotipa je 80x80, molimo izaberite logotip odgovarajuće veličine.");

define("_SERVICECONTACTINFO", "Prikažite kontakt informacije za uslugu");
define("_SERVICECONTACTINFOCHARACTER", "Prikažite kontakt informacije o servisu moraju imati najviše 25 karaktera!<br>važeći znakovi a..z 0..9 .+@*");

define("_SCREENTHEME", "Tema displeja");
define("_DARKBLUE", "Tamno plava");
define("_ORANGE", "Narančasta");
define("_PLEASEENTERRFIDLOCALLIST", "Unesite lokalnu listu RFID!");

define("_DHCPSERVER", "DHCP Server");
define("_DHCPCLIENT", "DHCP klijent");

define("_MAXDHCPADDRRANGE", "Krajnja IP adresa DHCP servera");
define("_MINDHCPADDRRANGE", "Početna IP adresa DHCP servera");

define("_MAXDHCPADDRRANGEERROR", "Potrebna je krajnja IP adresa DHCP servera!");
define("_MINDHCPADDRRANGEERROR", "Potrebna je startna IP adresa DHCP servera!");
define("_DIFFERENCEBETWEENMAXANDMINADDRRANGE", "Krajnja IP adresa DHCP servera treba da bude veća od početne IP adrese DHCP servera");
define("_IPADDRESSRANGE", "IP adresa ne može imati vrednost između početne i krajnje IP adrese DHCP servera");

define("_CELLULARGATEWAY", "Mobilni pristupnik");
define("_INVALIDSUBNET", "IP adresa nije u pravoj podmreži");

define("_CONNECTIONSTATUS", "Status veze");

define("_INSTALLATIONSETTINGS", "Početna podešavanja");
define("_EARTHINGSYSTEM", "Sistem uzemljenja");
define("_CURRENTLIMITERSETTINGS", "Pozicija limitera struje");
define("_CURRENTLIMITERPHASE", "Faza limitera struje");
define("_CURRENTLIMITERVALUE", "Vrednost limitera struje");
define("_UNBALANCEDLOADDETECTION", "Detekcija neuravnoteženog opterećenja");
define("_EXTERNALENABLEINPUT", "Eksterna funkcija za omogućavanje ulaza");
define("_LOCKABLECABLE", "Kabl sa mogućnosti zaključavanja");
define("_POWEROPTIMIZERTOTALCURRENTLIMIT", "Ograničenje ukupne struje za optimizaciju napajanja");
define("_POWEROPTIMIZER", "Optimizaciju napajanja");
define("_TNORTT", "TN/TT");
define("_SPLITPHASE", "IT/Podeljena faza");
define("_ONEPHASE", "Jedna faza");
define("_THREEPHASE", "Tri faze");
define("_POWEROPTIMIZERTOTALCURRENTLIMITMORETHANOREQUAL16", "Ograničenje ukupne struje <br> optimizatora snage mora <br> biti veće ili jednako 16");
define("_POWEROPTIMIZERTOTALCURRENTLIMITLESSTHANOREQUAL100", "Ograničenje ukupne struje <br> optimizatora snage mora <br> biti manje ili jednako 100");
define("_FOLLOWTHESUN", "Pratite Sunce");
define("_FOLLOWTHESUNMODE", "Pratite Sunčev način rada");
define("_AUTOPHASESWITCHING", "Automatsko prebacivanje faze");
define("_MAXHYBRID", "Max hybrid");
define("_SUNONLY", "Samo sunce");
define("_SUNHYBRID", "Sunčev hibrid");

define("_DISPLAYBACKLIGHTSETTINGS", "Podešavanja pozadinskog osvetljenja ekrana");
define("_BACKLIGHTLEVEL", "Nivo pozadinskog osvetljenja");
define("_SUNRISETIME", "Vreme izlaska sunca ");
define("_SUNSETTIME", "Vreme zalaska sunca");

define("_HIGH", "Visoko");
define("_MID", "Srednje");
define("_LOW", "Nisko");

define("_A", " (A)");

define("_CURRENTLIMITERVALUELESSTHAN8", "* Kada je uključen EVReadySupport i faza limitatora struje je jedna faza, vrednost limitatora struje ne sme biti manja od 8!");
define("_CURRENTLIMITERVALUELESSTHAN14", "* Kada je uključen EVReadySupport i faza limitatora struje je trofazna, vrednost limitatora struje ne sme biti manja od 14!");

define("_LEDDIMMINGSETTINGS", "LED zatamnjivanje");
define("_LEDDIMMINGLEVEL", "Nivo LED zatamnjivanja");
define("_VERYLOW", "Veoma nizak");
define("_WARNINGFORLTEENABLED", "LAN interface IP setting mode will be set as static and DHCP Server will be activated.");
define("_WARNINGFORLTEDISABLED", "Način podešavanja IP interfejsa LAN postavlja se na DHCP klijent, a DHCP interfejs se deaktivira.");
define("_ACCEPTQUESTION", "Da li prihvatate promene?");

define("_CELLULARGATEWAYCONFIRM", "Gejtvej za mobilne telefone će biti onemogućen.");

define("_ETHERNETIP", "IP Ethernet interfejsa:");
define("_WLANIP", "IP WLAN interfejsa:");
define("_STRENGTH", "Putere");
define("_WIFIFREQ", "Frekvencija");
define("_WIFILEVEL", "Razina");
define("_CELLULARIP", "IP mobilnog interfejsa:");
define("_CELLULAROPERCODE" , "Operator");
define("_CELLULARTECH" , "Tehnologie");
define("_SCANNETWORKS", "Skeniraj mreže");
define("_AVAILABLENETWORKS", "Dostupne mreže");
define("_NETWORKSTATUS", "Status mreže");
define("_PLEASEWAITMSG", "Molimo čekajte...");
define("_SCANNINGWIFIMSG", "Skeniranje Wi-Fi mreža");
define("_NOWIFIFOUNDMSG", "Nema pronađenih Wi-Fi mreža");
define("_PLEASECHECKWIFICONNMSG", "Provjerite vašu Wi-Fi vezu i pokušajte ponovo.");

define("_APPLICATIONRESTART", "Ova promena zahteva ponovno pokretanje aplikacije.");

define("_QRCODE", "Prikaži KR kod");
define("_QRCODEONSCREEN", "KR kod na ekranu");
define("_QRCODEDELIMITER", "KR Code Delimiter");
define("_INVALIDDELIMITERCHARACTER", "Znak za razgraničenje KR koda je nevažeći, razmak nije prihvatljiv, dužina znakova mora biti najmanje 1, a najviše može da sadrži 3, važeći znakovi 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");

define("_LOCATION", "Lokacija");
define("_INDOOR", "U zatvorenom");
define("_OUTDOOR", "Na otvorenom");
define("_POWEROPTIMIZEREXTERNALMETER", "Eksterni Merač");
define("_OPERATIONMODE", "Režim rada");
define("_AUTOSELECTED", "Auto Selected");
define("_NOTSELECTED", "Nije izabran");
define("_CHARGINGMODESELECTIONANDPOWEROPTIMIZERCONF", "Izbor režima punjenja i konfiguracija optimizatora napajanja");

define("_USERINTERACTION", "Interakcija korisnika");

define("_STANDBYLEDBEHAVIOUR", "Način rada LED lampice pripravnosti");
define("_OFF", "Isključeno");
define("_ON", "Uključeno");

define("_LOADSHEDDINGMINIMUMCURRENT", "Minimalna struja raspadanja opterećenja");
define("_UNBALANCEDLOADDETECTIONMAXCURRENT", "Maksimalna struja detekcije neuravnoteženog opterećenja");

define("_SCHEDULEDCHARGING", "Planirano punjenje");
define("_OFFPEAKCHARGING", "Punjenje van vršnog opterećenja");
define("_OFFPEAKCHARGINGWEEKENDS", "Punjenje van vršnog opterećenja vikendom");
define("_OFFPEAKCHARGINGPERIODS", "Periodi punjenja van vršnog opterećenja");
define("_CONTINUECHARGINGENDPEAKINTERVAL", " Nastavite sa punjenjem nakon završetka vršnog intervala");
define("_CONTINUECHARGINGWITHOUTREAUTHAFTERPOWERLOSS", "Nastavite sa punjenjem bez ponovne autentifikacije nakon gubitka napajanja");



define("_RANDOMISEDDELAYMAXIMUMDURATION", "Nasumično maksimalno trajanje <br> kašnjenja (sekunde)");

define("_RANDOMISEDDELAYMAXIMUMDURATIONERROR", "* Potrebno je uneti maksimalno trajanje slučajnog kašnjenja!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONBENUMERIC", "* Maksimalno trajanje slučajnog kašnjenja mora biti ceo broj!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONLIMIT", "* Maksimalno trajanje slučajnog kašnjenja treba da bude između 0 i 1800");
define("_OFFPEAKCHARGINGPERIODSERROR", "* Neophodni su periodi punjenja van vršnog opterećenja!");
define("_OFFPEAKCHARGINGPERIODSSAMETIMEERROR", "* Vreme početka i završetka punjenja van najveće potrošnje ne može biti isto!");

define("_OFFPEAKCHARGINGSECONDTIMEPERIOD", "Drugi period punjenja van najveće potrošnje");
define("_OFFPEAKDISABLEDCONFIRM", "Punjenje van radnog vremena će biti onemogućeno. Da li potvrđujete?");

define("_SHOWSERVICECONTACTINFO", "Prikaži dodatne informacije o kontaktu usluge");
define("_EXTRASERVICECONTACTINFORMATION", "Kontakt informacije o servisu su prikazane na ekranima za povezivanje kabla za punjenje, priprema za punjenje, inicijalizacija i čekanje na povezivanje");

define("_LOADSHEDDINGSTATUS", "Status rasterećenja: ");
define("_ACTIVE", "Aktivno");
define("_INACTIVE", "Neaktivno");
define("_POWEROPTIMIZEREXTERNALMETERENABLEALERT", "Ako želite koristiti svoju opciju upravljanja opterećenjem u Modbusu,<br>prvo trebate onemogućiti Ograničenje ukupne struje optimizatora snage u delu „Odabir načina punjenja i konfiguracija optimizatora snage“.");
define("_MODBUSALERT", "Ako želite omogućiti svoj eksterni merač optimizatora snage,<br>prvo trebate deaktivirati Modbus u delu „Upravljanje lokalnim opterećenjem“.");
define("_POWEROPTIMIZERDLMENABLEALERT", "Ako želite koristiti opciju Upravljanja Opterećenjem u Master/Slave režimu,<br>prvo morate onemogućiti Optimizator Snage iz &#39Izbor Režima Punjenja i Konfiguracija Optimizatora Snage&#39.");
define("_DLMALERT", "Ako želite da aktivirate Optimizator Snage,<br>prvo morate da onemogućite Master/Slave<br>iz &#39Lokalnog Upravljanja Opterećenjem&#39.");

define("_FOLLOWTHESUNDLMENABLEALERT", "Ako želite koristiti opciju Upravljanja Opterećenjem u Master/Slave režimu,<br>prvo morate onemogućiti Pratite Sunce iz &#39Izbor Režima Punjenja i Konfiguracija Optimizatora Snage&#39.");
define("_DLMALERTFOLLOWTHESUN", "Ako želite da aktivirate Pratite Sunce,<br>prvo morate da onemogućite Master/Slave<br>iz &#39Lokalnog Upravljanja Opterećenjem&#39.");

define("_RESETUSERPASSWORD", "Resetovanje <br> lozinke korisnika");
define("_INSTALLATIONERRORENABLEDCONFIRM", "Ako želite da onemogućite Omogućavanje greške pri instalaciji,<br>prvo morate da podesite sistem uzemljenja sa &#39Podešavanja instalacije&#39 na IT/Split Phase.");
define("_EARTHINGSYSTEMCONFIRM", "Ako želite da podesite sistem uzemljenja na TN/TT,<br>prvo morate da omogućite Omogućavanje greške pri instalaciji iz &#39OCPP podešavanja&#39.");

define("_AUTHKEYMAXLIMIT", "dužina treba da bude maksimalno 40 karaktera.");
define("_AUTHORIZATIONKEYEMPTYCONFIRM", "Polje Authorization Key je prazno.<br>Da li potvrđujete promene?");

define("_RANDOMISEDDELAYATOFFPEAKEND", "Nasumično kašnjenje na kraju van špica");
define("_FIFO", "FIFO");
define("_FAILSAFECURRENT", "Failsafe Current");
define("_FAILSAFECURRENTERROR", "Potrebna je bezbedna struja!");
define("_FAILSAFECURRENTLESSTHAN0", "* Failsafe Trenutna vrednost ne sme biti manja od 0!");
define("_FAILSAFECURRENTMORETHAN32", "* Failsafe Trenutna vrednost ne sme biti veća od 32!");
define("_FAILSAFECURRENTMORETHAN50", "* Failsafe Trenutna vrednost ne sme biti veća od 50!");

define("_LOCALCHARGESESSION", "Lokalne zaračunane seje");
define("_ROWNUMBER", "Št. vrstice");
define("_SESSIONUUID", "id naplate");
define("_AUTHORIZATIONUID", "RFID Kodj");
define("_STARTTIME", "Začetni čas");
define("_STOPTIME", "ustaviti čas");
define("_TOTALTIME", "Skupni čas");
define("_STATUS", "Stanje");
define("_CHARGEPOINTIDS", "Broj utičnice");
define("_INITIALENERGY", "Začetna energija(kWh)");
define("_LASTENERGY", "Zadnja energija(kWh)");
define("_TOTALENERGY", "Skupna energija(kWh)");
define("_DOWNLOADLOCALCHARGESESSIONLOGS", "Celoten dnevnik seje v CSV");
define("_DOWNLOADFULLSESSIONLOGS", "Povzetek dnevnika v CSV");
define("_STARTDATE", "datum početka");
define("_ENDDATE", "krajnji datum");
define("_RFIDSELECTION", "RFID izbor");
define("_CLEAR", "jasno");

define("_FALLBACKCURRENT", "Zamjenska struja");
define("_FALLBACKRANGE", "Резервна струја мора бити 0 или унутар опсега од ");
define("_DOWNLOADEEBUSLOGS", "EEBUS evidencije");
define("_PAIRINGENERGYMANAGER", "Omogućeno za uparivanje");
define("_PAIR", "Omogući uparivanje");
define("_UNPAIR", "Razpari");
define("_EEBUS", "EEBUS");
define("_FIRMWAREVERSION", "Verzija firmvera");
define("_EEBUSDISCOVERY", "Откривени уређаји");
define("_REFRESH", "Osvježi");
define("_CPROLEMASTERREQUIREDFIELD", "Ako želite da ažurirate podešavanja grupe za upravljanje opterećenjem, uloga tačke punjenja mora biti sačuvana kao &#39Master&#39 iz opštih podešavanja upravljanja opterećenjem.");

define("_LISTOFSLAVES", "Листа подређених");
define("_NUMBEROFSLAVES", "Број подређених");
define("_LISTOFCONNECTOR", "Листа конектора");
define("_AVAILABLECURRENT", "Доступна тренутна фаза");

define("_DLMINTERFACE", "ДЛМ интерфејс");
define("_ETHERNET", "Етернет");
define("_DLMINTERFACEERROR", "Омогући ВиФи са мрежних интерфејса!");

define("_MUSTBEINTEGER", "мора бити цео број!");
define("_GRIDBUFFER", "Проценат маргине заштите мреже");
define("_CHARGINGSTATUSALERT", "U statusu punjenja, vrednost se ne može ažurirati!");
define("_READUNDERSTAND", "Pročitao sam, razumem");

define("_MORETHAN10", "Morate povećati maksimalnu struju mreže ili smanjiti procenat margine zaštite mreže pre nego što sačuvate ova podešavanja. Ograničenje maksimalne struje mreže ne može biti manje od 10A kada se koristi procenat margine zaštite mreže.");

define("_CLUSTERMAXCURRENT", "Макс. струја кластера");
define("_CLUSTERFAILSAFECURRENT", "Цлустер Фаилсафе Цуррент");
define("_CLUSTERMAXCURRENTERROR", "Потребна је максимална струја кластера!");
define("_CLUSTERFAILSAFECURRENTERROR", "Цлустер Фаилсафе Цуррент је обавезна!");
define("_CLUSTERFAILSAFECURRENTLESSTHAN0", "Цлустер Фаилсафе Тренутна вредност не сме бити мања од 0!");
define("_CLUSTERFAILSAFECURRENTMORETHAN", "Вредност Цлустер Фаилсафе Цуррент мора бити мања од максималне струје мреже!");
define("_CLUSTERFAILSAFE", "Цлустер Фаилсафе Моде");

define("_CLUSTERMAXCURRENTLESSTHAN10", "Цлустер Мак Тренутна вредност не сме бити мања од 10");
define("_CLUSTERMAXCURRENTMORETHAN", "Maksimalna vrednost struje klastera mora biti jednaka ili manja od ove vrednosti:");