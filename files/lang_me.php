<?php
include_once "access_control.php";
define("_LOGIN", "PRIJAVITE SE");
define("_USERNAME", "Korisničko ime:");
define("_PASSWORD", "Lozinka:");
define("_CHANGEPASSWORD", "Promijenite lozinku");
define("_CURRENTPASSWORD", "Trenutna lozinka:");
define("_NEWPASSWORD", "Nova lozinka:");
define("_CONFIRMNEWPASSWORD", "Potvrdite novu lozinku:");
define("_SUBMIT", "Podnesite");
define("_CURRENTPASSWORDREQUIRED", "Potrebna je trenutna lozinka");
define("_PASSWORDREQUIRED", "Potrebna je lozinka");
define("_USERNAMEREQUIRED", "Potrebno je korisničko ime");
define("_USERAUTHFAILED", "Autentifikacija korisnika nije uspješno izvršena!");
define("_USERNAMEORCURRENTPASSWORDWRONG", "Korisničko ime ili trenutna lozinka je pogrešna!");
define("_DBACCESSFAILURE", "Nije moguće pristupiti bazi podataka!");
define("_CHANGEPASSWORDERROR", "Prvo morate da promijenite lozinku!");
define("_SAMEPASSWORDERROR", "Trenutna i nova lozinka treba da se razlikuju jedna od druge!");
define("_PASSWORDMATCHERROR", "Lozinke se ne poklapaju!");
define("_CURRENTPASSWORDWRONG", "Trenutna lozinka je pogrešna!");
define("_PASSWORDERRORLEVEL2", "Lozinka je nevažeća, dužina znakova mora biti 20 i da sadrži najmanje dva slova [A-Za-z], dvije cifre [0-9] i dva specijalna znaka [!%&/()=?*#+-_]");
define("_PASSWORDERRORLEVEL3", "Lozinka je nevažeća, dužina karaktera mora biti najmanje 12, najviše 32 znaka i sadržati najmanje dva mala slova [a-z] i dva velika slova [A-Z], dvije cifre [0-9] i najmanje dva specijalna znaka [!%&/()=?*#+-_].");
define("_LOGINLOCKOUT", "Previše neuspjelih pokušaja. Pokušajte nakon 1800 sekundi.");

define("_MAINPAGE", "Naslovna strana");
define("_GENERAL", "Opšta podešavanja");
define("_OCPPSETTINGS", "OCPP podešavanja");
define("_NETWORKINTERFACES", "Mrežni interfejsi");

define("_OCPPCONNINTERFACE", "Interfejs OCPP veze : ");
define("_CONNECTIONSTATE", "Status veze : ");
define("_DISCONNECTED", "Nije povezano");
define("_NEEDTOLOGINFIRST", "Prvo se morate prijaviti!");
define("_CONNECTED", "Povezano");
define("_CPSERIALNUMBER", "CP serijski broj : ");
define("_HMISOFTWAREVERSION", "Verzija softvera HMI : ");
define("_OCPPSOFTWAREVERSION", "Verzija softvera OCPP : ");
define("_POWERBOARDSOFTWAREVERSION", "Verzija softvera ploče napajanja : ");
define("_OCPPDEVICEID", "OCPP ID uređaja : ");
define("_DURATIONAFTERPOWERON", "Trajanje nakon uključivanja : ");
define("_LOGOUT", "Odjaviti se");
define("_PRESET", "Prethodno podešavanje:");

define("_OCPPCONNECTION", "OCPP veza");
define("_ENABLED", "Omogućena");
define("_DISABLED", "Onemogućena");
define("_CONNECTIONSETTINGS", "Podešavanja veze");
define("_CENTRALSYSTEMADDRESS", "Adresa centralnog sistema ");
define("_CHARGEPOINTID", "ID tačke punjenja ");
define("_OCPPVERSION", "OCPP verzija");
define("_SAVE", "Sačuvati");
define("_SAVESUCCESSFUL", "Uspješno sačuvano.");
define("_CENTRALSYSTEMADDRESSERROR", "Potrebna je adresa centralnog sistema!");
define("_CHARGEPOINTIDERROR", "Potreban je ID tačke punjenja!");
define("_SECONDS", "Sekunde");
define("_ADD", "Dodati");
define("_REMOVE", "Ukloniti");
define("_SAVECAPITAL", "SAČUVATI");
define("_CANCEL", "Poništiti");

define("_CELLULAR", "Mobilni");
define("_INTERFACEIPADDRESS", "IP adresa interfejsa: ");
define("_ICCID", "ICCID: ");
define("_IMSI", "IMSI: ");
define("_IMEI", "IMEI: ");
define("_APNNAME", "APN ime: ");
define("_APNUSERNAME", "APN korisničko ime: ");
define("_APNPASSWORD", "APN lozinka: ");
define("_IPSETTING", "IP podešavanje: ");
define("_IPADDRESS", "IP adresa: ");
define("_NETWORKMASK", "Maska mreže: ");
define("_DEFAULTGATEWAY", "Podrazumijevani prolaz: ");
define("_PRIMARYDNS", "Primarni DNS: ");
define("_SECONDARYDNS", "Sekundarni DNS: ");
define("_WIFI", "WLAN");
define("_SECURITY", "Bezbijednost: ");
define("_SECURITYTYPE", "Izaberite tip bezbijednosti");
define("_NONE", "Nijedan");
define("_SELECTMODE", "Izaberite režim!");
define("_RFIDLOCALLIST", "RFID Lokalna lista");
define("_ACCEPTALLRFIDS", "Prihvatite sve RFID-ove");
define("_MANAGERFIDLOCALLIST", "Upravljajte listom lokalnih RFID:");
define("_AUTOSTART", "Autostart");
define("_PROCESSING", "Obrada... Sačekajte...");
define("_MACADDRESS", "MAC adresa: ");
define("_WIFIHOTSPOT", "&#39Vruća tačka&#39 za Wi-Fi");
define("_TURNONDURINGBOOT", "Uključite tokom pokretanja: ");
define("_AUTOTURNOFFTIMEOUT", "Vremensko ograničenje automatskog isključivanja: ");
define("_AUTOTURNOFF", "Automatsko isključivanje: ");
define("_HOTSPOTALERTMESSAGE", "Promjene u podešavanju &#39Vruće tačke&#39 za Wi-Fi će stupiti na snagu sledeći put kada se uređaj uključi. ");
define("_HOTSPOTREBOOTMESSAGE", "Da li želite sada da ponovo pokrenete sistem? ");

define("_DOWNLOADACLOGS", "Preuzmite AC dnevnike");
define("_DOWNLOADCELLULARLOGS", "Preuzmite dnevnike mobilnog modula");
define("_DOWNLOADPOWERBOARDLOGS", "Preuzmite dnevnike Ploče za napajanje");
define("_PASSWORDRESETSUCCESSFUL", "Vaša lozinka je uspješno resetovana.");
define("_DBOPENEDSUCCESSFULLY", "Baza podataka je uspješno otvorena\n");
define("_WSSCERTSSETTINGS", "Podešavanja WSS sertifikata ");
define("_CONFKEYS", "Konfiguracioni tasteri");
define("_KEY", "Taster");
define("_STATIC", "Statično");
define("_TIMEZONE", "Vremenska zona");
define("_PLEASESELECTTIMEZONE", "Izaberite vremensku zonu");
define("_DISPLAYSETTINGS", "Podešavanja prikaza");
define("_DISPLAYLANGUAGE", "Jezik prikaza");
define("_BACKLIGHTDIMMING", "Zatamnjenje pozadinskog osvjetljenja : ");
define("_PLEASESELECT", "Izaberite");
define("_TIMEBASED", "Zasnovano na vremenu");
define("_SENSORBASED", "Zasnovano na senzoru");
define("_BACKLIGHTDIMMINGLEVEL", "Nivo zatamnjenja pozadinskog osvjetljenja : ");
define("_BACKLIGHTTHRESHOLD", "Prag pozadinskog osvjetljenja : ");
define("_SETMIDTHRESHOLD", "SetMidThreshold");
define("_SETHIGHTHRESHOLD", "SetHighThresold");
define("_LOCALLOADMANAGEMENT", "Lokalno upravljanje opterećenjem");
define("_MINIMUMCURRENT", "Minimalna struja: ");
define("_FIFOPERCENTAGE", "Minimalna struja: ");
define("_GRIDMAXCURRENT", "Maksimalna struja mreže:: ");
define("_MASTERIPADDRESS", "IP adresa matičnog sistema:: ");
define("_BACKLIGHTTIMESETTINGS", "Podešavanja vremena pozadinskog osvjetljenja: ");
define("_SHOULDSELECTTIMEZONE", "* Morate da izaberete vremensku zonu!");
define("_MINIMUMCURRENTREQUIRED", "* Potrebna je minimalna struja!");
define("_CURRENTMUSTBENUMERIC", "* Struja mora biti numerička!");
define("_FIFOPERCREQUIRED", "* FIFO procenat je obavezan!");
define("_FIFOPERCSHOULDBETWEEN", "* FIFO procenat mora biti između 0 i 100!");
define("_PERCMUSTBENUMERIC", "* Procenat mora biti numerički!");
define("_GRIDMAXCURRENTREQUIRED", "* Potrebna je maksimalna struja mreže!");
define("_GRIDCURRENTMUSTBENUMERIC", "* Struja mreže mora biti numerička!");
define("_IPADDRESSOFMASTERREQUIRED", "* IP adresa matičnog sistema je obavezna!");
define("_INVALIDIPADDRESS", "* Unijeli ste nevažeću IP adresu!");
define("_SAMENETWORKLAN", "* Unijeli ste IP adresu u istu mrežu sa LAN!");
define("_SAMENETWORKWLAN", "* Unijeli ste IP adresu u istu mrežu sa WLAN!");
define("_APNISREQUIRED", "APN je obavezan!");
define("_IPADDRESSREQUIRED", "IP adresa je obavezna!");
define("_NETWORKMASKREQUIRED", "Mrežna maska je obavezna!");
define("_INVALIDNETWORKMASK", "* Unijeli ste nevažeću mrežnu masku!");
define("_DEFAULTGATEWAYREQUIRED", "Potreban je podrazumevani mrežni prolaz!");
define("_INVALIDGATEWAY", "Unijeli ste nevažeći podrazumevani mrežni prolaz!");
define("_PRIMARYDNSREQUIRED", "Primarni DNS je obavezan!");
define("_INVALIDDNS", "Unijeli ste nevažeći DNS!");
define("_SELECTIPSETTING", "Izaberite IP podešavanje.");
define("_SSIDREQUIRED", "SSID je obavezan!");
define("_PASSWORDISREQUIRED", "Potrebna je šifra!");
define("_WIFIPASSWORDERROR", "Lozinka je nevažeća, dužina karaktera mora biti najmanje 8, a najviše 63 <br> važeća znaka a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL2", "&#8226; Lozinka je nevažeća, dužina znakova mora biti 20,<br>&#8226; i da sadrži najmanje dva slova [A-Za-z],<br>&#8226; dvije cifre [0-9],<br>&#8226;  i dva specijalna znaka [!%&/()=?*#+-_]");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL3", "&#8226; Lozinka je nevažeća, dužina znakova mora biti najmanje 12, najviše 32,<br>&#8226; Lozinka mora da sadrži najmanje dva mala slova [a-z], <br>&#8226; Lozinka mora sadržati najmanje dva velika slova [A-Z], <br>&#8226; Lozinka mora sadržati najmanje dvije cifre [0-9],<br>&#8226; Lozinka mora sadržati najmanje dva specijalna znaka [!%&/()=?*#+-_]");
define("_WIFISSIDERROR", "SSID je nevažeći, važeći znakovi a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_SELECTSECURITYTYPE", "Izaberite tip bezbednosti");
define("_HOSTIPREQUIRED", "* IP hosta je obavezan!");
define("_CERTMANREQUIRED", "* Upravljanje sertifikacijom je potrebno!");
define("_OCPPENABLEALERT", "Ako želite da koristite svoju stanicu za punjenje u samostalnom režimu,<br>prvo morate da onemogućite OCPP vezu iz menija podešavanja OCPP");
define("_NOTSAVEDALERT", "Stranica nije sačuvana.");
define("_SAVEQUESTION", "Da li želite da sačuvate promjene?");
define("_OKBUTTON", "Uredu");
define("_LTECONNECTIONCONFIRM", "Mobilna veza će biti onemogućena. Da li potvrđujete?");
define("_WIFICONNECTIONCONFIRM", "Wi-Fi veza će biti onemogućena. Da li potvrđujete?");
define("_DHCPSERVERCONNECTIONCONFIRM", "Ako želite da omogućite LAN DHCP server,<br>prvo morate da onemogućite &#39Vruću tačku&#39 za Wi-Fi u odjeljku &#39Vruća tačka&#39 za Wi-Fi.");
define("_WIFIHOTSPOTCONNECTIONCONFIRM", "Ako želite da omogućite &#39Vruću tačku&#39 za Wi-Fi,<br>prvo morate da onemogućite LAN DHCP server u Podešavanjima za LAN IP.");

define("_DYNAMIC", "Dinamički");
define("_DIAGNOSTICS", "Dijagnostika");
define("_LOCALLOAD", "Lokalno upravljanje opterećenjem");
define("_DOWNLOAD", "Preuzmi");
define("_STARTDATE", "Datum početka");
define("_ENDDATE", "Datum završetka");
define("_CLEAREVENTLOGS", "Obriši sve dnevnike događaja");
define("_CLEAREVENTLOGSINFO", "Ovo će obrisati sve dnevnike događaja!");
define("_DOWNLOADEVENTLOGSINFO", "Preuzmi dnevnike događaja uređaja za maksimalno 5 dana");
define("_DEVICEEVENTLOGS", "Dnevnici događaja uređaja");
define("_DEVICECHANGELOGS", "Dnevnici promena uređaja");
define("_LOGSDATEERROR", "Molimo izaberite datume za maksimalno 5 dana.");
define("_DOWNLOACHANGELOGS", "Preuzmi dnevnike promena uređaja");
define("_VPNFUNCTIONALITY", "VPN funkcionalnost: ");
define("_CERTMANAGEMENT", "Upravljanje sertifikacijom: ");
define("_NAME", "Ime: ");
define("_CONNECTIONINTERFACE", "Interfejs veze ");
define("_ANY", "Bilo koji");
define("_OCPPCONNPARAMETERS", "Parametri konfiguracije OCPP");
define("_SETDEFAULT", "Podesite na podrazumijevane vrijednosti ");
define("_STANDALONEMODE", "Samostalni režim");
define("_STANDALONEMODETITLE", "Samostalni režim:");
define("_STANDALONEMODENOTSELECTED", "* Samostalni režim se ne može izabrati jer je OCPP omogućen.");
define("_CHARGERWEBUI", "Mrežni korisnički interfejs punjača");
define("_SYSTEMMAINTENANCE", "Održavanje sistema");
define("_HOSTIP", "IP hosta: ");
define("_PASSWORDERRORLEVEL1", "Lozinka je nevažeća, dužina karaktera mora da ima najmanje 6 znakova i da sadrži najmanje 1 malo slovo, 1 veliko slovo i 1 numerički znak!");
define("_SELECTBACKLIGHTDIMMING", "* Morate da izaberete zatamnjenje pozadinskog osvjetlјenja!");
define("_ISREQUIRED", "je potrebno!");
define("_ISNOTVALID", "nije važeće!");
define("_ISDUPLICATED", "je dupliciran!");
define("_MUSTBENUMERIC", "mora biti numerički!");
define("_VPNFUNCTIONALITYREQUIRED", "* Potrebna je VPN funkcionalnost!");
define("_VPNNAMEREQUIRED", "* Potreban je VPN naziv!");
define("_VPNPASSWORDREQUIRED", "* Potrebna je VPN lozinka!");
define("_EXPLANATION", "Ukazuje na obavezno polje.");
define("_FIRMWAREUPDATE", "Ažuriranja firmvera");
define("_BACKUPRESTORE", "Rezervna kopija i vraćanje konfiguracije");
define("_SYSTEMRESET", "Resetovanje sistema");
define("_CHANGEADMINPASSWORD", "Administrativna lozinka");
define("_FACTORYRESET", "Fabrička podrazumijevana podešavanja");
define("_FACTORYRESETBUTTON", "Resetovanje na fabrička podešavanja");
define("_FACTORYDEFAULTCONFIGURATION", "Konfiguracija fabričkih podrazumijevanih podešavanja");
define("_LOGFILES", "Datoteke dnevnika");
define("_BACKUPFILE", "Datoteka rezervne kopije");
define("_RESTOREFILE", "Vratite konfiguracionu datoteku");
define("_FREEMODEMAXCHARACTER", "mora imati najviše 32 znaka!");
define("_RESTOREMESSAGE", "Da li potvrđujete da želite da primijenite promjene i ponovo pokrenete sistem sada?");

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

define("_PASSWORDTYPEEXPLANATION", "Vaša lozinka mora da ima 6 znakova i da sadrži najmanje jedno veliko
slovo, jedno malo slovo, jednu cifru.");

define("_PASSWORDTYPEEXPLANATIONLEVEL2", "Vaša lozinka mora da ima 20 znakova i da sadrži najmanje dva
slova, dvije cifre i dva specijalna znaka.");

define("_PASSWORDTYPEEXPLANATIONLEVEL3", "Vaša lozinka mora da ima najmanje 12, maksimalno 32 karaktera i da sadrži najmanje dva velika slova,
dva mala slova, dvije cifre i dva specijalna znaka.");

define("_BACKTOLOGIN", "Povratak na prijavu");
define("_CHANGE", "Promjena");
define("_SYSTEMADMINISTRATION", "Sistemska administracija");
define("_UPDATE", "Ažuriranje");
define("_CONFIRM", "Potvrdite");
define("_FACTORYDEFAULTCONFIRM", "Da li ste sigurni da želite da se vratite na fabrička podešavanja?");
define("_FILENAME", "Naziv dokumenta");
define("_UPLOAD", "Otpremiti");
define("_SELECTFIRMWARE", "Izaberite datoteku za ažuriranje firmvera sa računara");
define("_FIRMWAREFILESIZE", "Provjerite veličinu datoteke firmvera.");
define("_FIRMWAREFILETYPE", "Proverite tip datoteke firmvera.");

define("_LESSTHANOREQUAL4", "mora biti između 1 i 4");
define("_LESSTHANOREQUAL20", "mora biti manji od ili jednak sa 20");
define("_LESSTHANOREQUAL65000", "mora biti manji od ili jednak sa 65000");
define("_LESSTHANOREQUAL300", "mora biti manji od ili jednak sa 300");
define("_LESSTHANOREQUAL86500", "mora biti manji od ili jednak sa 86500");
define("_LESSTHANOREQUAL10000", "mora biti manji od ili jednak sa 10000");
define("_LESSTHANOREQUAL22", "mora biti manji od ili jednak sa 22");
define("_LESSTHANOREQUAL10", "mora biti manji od ili jednak sa 10");
define("_LESSTHANOREQUAL600", "mora biti manji od ili jednak sa 600");
define("_LESSTHANOREQUAL120", "mora biti manji od ili jednak sa 120");
define("_HIGHTHANOREQUAL0", "mora biti veći ili jednak 0");
define("_CHANGEPASSWORDSUGGESTION", "Preporučujemo vam da promijenite podrazumijevanu lozinku iz menija za održavanje sistema");

define("_FILESIZE", "Provjerite veličinu datoteke.");
define("_FILETYPE", "Provjerite tip datoteke.");

define("_BACKUPVERSIONCHECK", "Verzija ove datoteke nije prikladna za uređaj.");
define("_HARDRESETCONFIRM", "Jeste li sigurni da želite da resetujete hardver?");
define("_SOFTRESETCONFIRM", "Jeste li sigurni da želite da resetujete softver?");
define("_NEWSETUP", "Koristite korisnički priručnik za novo podešavanje.");

define("_LOADMANAGEMENT", "Upravljanje opterećenjem");
define("_CPROLE", "Uloga tačke punjenja");
define("_GRIDSETTINGS", "Podešavanja mreže");
define("_LOADMANAGEMENTMODE", "Režim upravljanja opterećenjem");
define("_LOADMANAGEMENTGROUP", "Grupa za upravljanje opterećenjem");
define("_LOADMANAGEMENTOPTION", "Opcija upravljanja opterećenjem");
define("_ALARMS", "Alarmi");

define("_MASTER", "Matični sistem");
define("_SLAVE", "Podređeni sistem");
define("_TOTALCURRENTLIMIT", "Ograničenje ukupne struje po fazi");
define("_SUPPLYTYPE", "Vrsta napajanja");
define("_FIFOPERCANTAGE", "FIFO procenat");
define("_TIC", "TIC");
define("_EQUALLYSHARED", "Jednako podijeljeno");
define("_COMBINED", "Kombinovano");
define("_TOTALCURRENTLIMITERROR", "Potrebno je ograničenje ukupne struje po fazi!");
define("_LESSTHAN1024", "mora biti manje od 1024");
define("_ATLEAST0","mora biti barem 0");
define("_MORETHAN12", "mora biti više od 12");
define("_CHOOSEONE", "Izaberite jedan");
define("_SLAVEMINCHCURRENT", "Trenutno podešavanje za bezbjedno punjenje van mreže");
define("_SERIALNO", "Serijski broj");
define("_CONNECTORSTATE", "Status priključka");
define("_NUMBEROFPHASES", "Broj faza");
define("_PHASECONSEQUENCE", "Redosljed povezivanja faza");
define("_VIP", "VIP punjenje");
define("_CPMODE", "CP režim");
define("_VIPERROR", "VIP punjenje je potrebno");
define("_PHASECONSEQUENCEERROR", "Potreban je redosljed povezivanja faza!");
define("_CPMODEERROR", "CP režim je obavezan!");
define("_SUPPORTEDCURRENT", "Podržana struja");
define("_INSTANTCURPERPHASE", "Faza trenutne struje");
define("_FIFOCHARGINGPERCENTAGE", "FIFO procenat punjenja");
define("_MINIMUMCURRENT1P", "Minimalna struja punjenja 1-fazna");
define("_MINIMUMCURRENT3P", "Minimalna struja punjenja 3-fazna");
define("_MAXIMUMCURRENT", "Maksimalna struja punjenja");
define("_STEP", "Korak");
define("_UPDATEDLMGROUP", "Ažuriranje DLM grupe");
define("_MAINCIRCUITCURRENT", "Maksimalna struja mreže");
define("_MAINCIRCUITCURRENTERROR", "Potrebna je maksimalna struja mreže!");
define("_DLMMAXCURRENT", "DLM ukupno ograničenje struje po fazi");
define("_DLMMAXCURRENTERROR", "DLM ukupno ograničenje struje po fazi je obavezno!");
define("_DLMMAXCURRENTMORETHANMAIN", "DLM ukupno ograničenje struje po fazi treba biti veće od polovice struje glavnog prekidača kola");
define("_DLMMAXCURRENTLESSTHANMAIN", "DLM ukupno ograničenje struje treba bi biti manje od struje glavnog prekidača kola");

define("_LOGOSETTINGS", "Podešavanja logotipa");
define("_USELOGO", "Izaberite datoteku logotipa sa računara");
define("_LOGOTYPE", "Izaberite logotipa u PNG formatu.");
define("_LOGODIMENSION", "Maksimalna dozvoljena veličina logotipa je 80x80; izaberite logotip odgovarajuće veličine.");

define("_SERVICECONTACTINFO", "Prikažite informacije za kontakt servisa");
define("_SERVICECONTACTINFOCHARACTER", "Prikaz informacija za kontakt servisa mora imati najviše 25 znakova!<br>važeći znakovi a..z 0..9 .+@*");

define("_SCREENTHEME", "Tema ekrana");
define("_DARKBLUE", "Tamno plava");
define("_ORANGE", "Narandžasta");
define("_PLEASEENTERRFIDLOCALLIST", "Unesite listu lokalnih RFID!");

define("_DHCPSERVER", "DHCP Server");
define("_DHCPCLIENT", "DHCP klijent");

define("_MAXDHCPADDRRANGE", "Krajnja IP adresa DHCP servera");
define("_MINDHCPADDRRANGE", "Startna IP adresa DHCP servera");

define("_MAXDHCPADDRRANGEERROR", "Potrebna je krajnja IP adresa DHCP servera!");
define("_MINDHCPADDRRANGEERROR", "Potrebna je startna IP adresa DHCP servera!");
define("_DIFFERENCEBETWEENMAXANDMINADDRRANGE", "Krajnja IP adresa DHCP servera treba da bude veća od početne IP adrese DHCP servera");
define("_IPADDRESSRANGE", "IP adresa ne može imati vrednost između startne i krajnje IP adrese DHCP servera");

define("_CELLULARGATEWAY", "Mrežni prolaz za mobilnu telefoniju");
define("_INVALIDSUBNET", "IP adresa nije u pravoj podmreži");

define("_CONNECTIONSTATUS", "Status veze");

define("_INSTALLATIONSETTINGS", "Podešavanja instalacije");
define("_EARTHINGSYSTEM", "Sistem uzemljenja");
define("_CURRENTLIMITERSETTINGS", "Podešavanja ograničenja struje");
define("_CURRENTLIMITERPHASE", "Faza ograničenja struje");
define("_CURRENTLIMITERVALUE", "Vrijednost ograničenja struje");
define("_UNBALANCEDLOADDETECTION", "Detekcija neuravnoteženog opterećenja");
define("_EXTERNALENABLEINPUT", "Omogućavanje spoljnjeg ulaza");
define("_LOCKABLECABLE", "Kabal koji se može zaključati");
define("_POWEROPTIMIZERTOTALCURRENTLIMIT", "Ograničenje ukupne struje optimizatora napajanja");
define("_POWEROPTIMIZER", "Optimizatora napajanja");
define("_TNORTT", "TN/TT");
define("_SPLITPHASE", "IT/Split-faza");
define("_ONEPHASE", "Monofazni");
define("_THREEPHASE", "Trofazni");
define("_POWEROPTIMIZERTOTALCURRENTLIMITMORETHANOREQUAL16", "Ograničenje ukupne struje <br> optimizatora snage mora biti <br> veće od ili jednako sa 16");
define("_POWEROPTIMIZERTOTALCURRENTLIMITLESSTHANOREQUAL100", "Ograničenje ukupne struje <br> optimizatora snage mora biti <br> manje od ili jednako sa 100");
define("_FOLLOWTHESUN", "Pratite Sunce");
define("_FOLLOWTHESUNMODE", "Pratite Sunčev način rada");
define("_AUTOPHASESWITCHING", "Automatsko prebacivanje faze");
define("_MAXHYBRID", "Max hybrid");
define("_SUNONLY", "Samo sunce");
define("_SUNHYBRID", "Sunčev hibrid");

define("_DISPLAYBACKLIGHTSETTINGS", "Podešavanja pozadinskog osvjetljenja ekrana");
define("_BACKLIGHTLEVEL", "Nivo pozadinskog osvjetljenja");
define("_SUNRISETIME", "Vrijeme izlaska sunca ");
define("_SUNSETTIME", "Vrijeme zalaska sunca");

define("_HIGH", "Visok");
define("_MID", "Srednji");
define("_LOW", "Nizak");

define("_A", " (A)");

define("_CURRENTLIMITERVALUELESSTHAN8", "* Kada je EVReadySupport uključen i faza limitera (ograničavača) struje je jednofazna, vrijednost limitera struje ne smije biti manja od 8!");
define("_CURRENTLIMITERVALUELESSTHAN14", "* Kada je EVReadySupport uključen i faza ograničenja struje je trofazna, vrijednost limitera struje ne smije biti manja od 14!");

define("_LEDDIMMINGSETTINGS", "Podešavanja zatamnjivanja LED svijetla");
define("_LEDDIMMINGLEVEL", "Nivo zatamnjivanja LED svijetla");
define("_VERYLOW", "Veoma nizak");
define("_WARNINGFORLTEENABLED", "LAN interface IP setting mode will be set as static and DHCP Server will be activated.");
define("_WARNINGFORLTEDISABLED", "Režim podešavanja IP LAN interfejsa biće postavljen kao DHCP klijent dok će DHCP server biti deaktiviran.");
define("_ACCEPTQUESTION", "Da li prihvatate promene?");

define("_CELLULARGATEWAYCONFIRM", "Mobilni prolaz će biti onemogućen.");

define("_ETHERNETIP", "IP Ethernet interfejsa:");
define("_WLANIP", "IP WLAN interfejsa:");
define("_STRENGTH", "Snaga");
define("_WIFIFREQ", "Frekvencija");
define("_WIFILEVEL", "Nivo");
define("_CELLULARIP", "IP mobilnog interfejsa:");
define("_CELLULAROPERCODE" , "Operater");
define("_CELLULARTECH" , "Tehnologija");
define("_SCANNETWORKS", "Skener mreža");
define("_AVAILABLENETWORKS", "Dostupne mreže");
define("_NETWORKSTATUS", "Status mreže");
define("_PLEASEWAITMSG", "Molimo sačekajte...");
define("_SCANNINGWIFIMSG", "Skener Wi-Fi mreža");
define("_NOWIFIFOUNDMSG", "Nema pronađenih Wi-Fi mreža");
define("_PLEASECHECKWIFICONNMSG", "Molimo proverite vašu Wi-Fi konekciju i pokušajte ponovo.");

define("_APPLICATIONRESTART", "Ova promjena zahtijeva ponovno pokretanje aplikacije.");

define("_QRCODE", "Prikaži QR kôd");
define("_QRCODEONSCREEN", "QR kôd na ekranu");
define("_QRCODEDELIMITER", "Razdjelnik QR kôd");
define("_INVALIDDELIMITERCHARACTER", "Znak razdjelnika QR kôd nije valjan, razmak nije prihvatljiv, dužina karaktera mora biti najmanje 1, a najviše 3, važeća znaka 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");

define("_LOCATION", "Mjesto");
define("_INDOOR", "Unutrašnji");
define("_OUTDOOR", "Vanjski");
define("_POWEROPTIMIZEREXTERNALMETER", "Eksterni Merač");
define("_OPERATIONMODE", "Režim rada");
define("_AUTOSELECTED", "Automatski odabrano");
define("_NOTSELECTED", "Nije izabran");
define("_CHARGINGMODESELECTIONANDPOWEROPTIMIZERCONF", "Izbor režima punjenja i konfiguracija optimizacije napajanja");

define("_USERINTERACTION", "Interakcija korisnika");

define("_STANDBYLEDBEHAVIOUR", "Status LED lampice za režim mirovanja:");
define("_OFF", "Isključeno");
define("_ON", "Uključeno");

define("_LOADSHEDDINGMINIMUMCURRENT", "Minimalna struja rasterećenja");
define("_UNBALANCEDLOADDETECTIONMAXCURRENT", "Maksimalna struja detekcije neuravnoteženog opterećenja");

define("_SCHEDULEDCHARGING", "Planirano punjenje");
define("_OFFPEAKCHARGING", "Punjenje van radnog vremena");
define("_OFFPEAKCHARGINGWEEKENDS", "Punjenje van maksimalnog opterećenja vikendom");
define("_OFFPEAKCHARGINGPERIODS", "Periodi punjenja van maksimalnog opterećenja");
define("_CONTINUECHARGINGENDPEAKINTERVAL", "Nastavite sa punjenjem nakon završetka vršnog intervala");
define("_CONTINUECHARGINGWITHOUTREAUTHAFTERPOWERLOSS", "Nastavite sa punjenjem bez ponovne autentifikacije nakon gubitka napajanja");



define("_RANDOMISEDDELAYMAXIMUMDURATION", "Maksimalno trajanje nasumičnog <br> kašnjenja (u sekundama)");

define("_RANDOMISEDDELAYMAXIMUMDURATIONERROR", "* Potrebno je maksimalno trajanje nasumičnog kašnjenja!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONBENUMERIC", "* Maksimalno trajanje nasumičnog kašnjenja mora biti cijeli broj!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONLIMIT", "* Maksimalno trajanje nasumičnog kašnjenja treba da bude između 0 i 1800");
define("_OFFPEAKCHARGINGPERIODSERROR", "* Neophodni su periodi punjenja van maksimalnog opterećenja!");
define("_OFFPEAKCHARGINGPERIODSSAMETIMEERROR", "* Vrijeme početka i završetka punjenja van maksimalnog opterećenja ne može biti isto!");

define("_OFFPEAKCHARGINGSECONDTIMEPERIOD", "Drugi vremenski period punjenja van maksimalnog opterećenja");
define("_OFFPEAKDISABLEDCONFIRM", "Punjenje van maksimalnog opterećenja će biti onemogućeno. Da li potvrđujete?");

define("_SHOWSERVICECONTACTINFO", "Prikažite dodatne informacije o kontaktu servisa");
define("_EXTRASERVICECONTACTINFORMATION", "Informacije o kontaktu servisa su prikazane na ekranima za povezivanje kabla za punjenje, pripremu za punjenje, inicijalizaciju i čekanje na povezivanje");

define("_LOADSHEDDINGSTATUS", "Status smanjenja opterećenja: ");
define("_ACTIVE", "Aktivan");
define("_INACTIVE", "Neaktivno");
define("_POWEROPTIMIZEREXTERNALMETERENABLEALERT", "Ako želite koristiti svoju opciju upravljanja opterećenjem u Modbusu,<br>prvo trebate onemogućiti Ograničenje ukupne struje optimizatora snage u delu „Odabir načina punjenja i konfiguracija optimizatora snage“.");
define("_MODBUSALERT", "Ako želite omogućiti svoj eksterni merač optimizatora snage,<br>prvo trebate deaktivirati Modbus u delu „Upravljanje lokalnim opterećenjem“.");
define("_POWEROPTIMIZERDLMENABLEALERT", "Ako želite koristiti opciju Upravljanja Opterećenjem u Master/Slave režimu,<br>prvo morate onemogućiti Optimizator Snage iz &#39Izbor Režima Punjenja i Konfiguracija Optimizatora Snage&#39.");
define("_DLMALERT", "Ako želite da aktivirate Optimizator Snage,<br>prvo morate onemogućiti Master/Slave<br>iz &#39Lokalnog Upravljanja Opterećenjem&#39.");

define("_FOLLOWTHESUNDLMENABLEALERT", "Ako želite koristiti opciju Upravljanja Opterećenjem u Master/Slave režimu,<br>prvo morate onemogućiti Pratite Sunce iz &#39Izbor Režima Punjenja i Konfiguracija Optimizatora Snage&#39.");
define("_DLMALERTFOLLOWTHESUN", "Ako želite da aktivirate Pratite Sunce,<br>prvo morate onemogućiti Master/Slave<br>iz &#39Lokalnog Upravljanja Opterećenjem&#39.");

define("_RESETUSERPASSWORD", "Resetujte <br> korisničku lozinku");
define("_INSTALLATIONERRORENABLEDCONFIRM", "If you want to disable Installation Error Enable,<br>first you need to set Earthing System from &#39Installation Settings&#39 to IT/Split Phase.");
define("_EARTHINGSYSTEMCONFIRM", "If you want to set Earthing System to TN/TT,<br>first you need to enable Installation Error Enable from &#39OCPP Settings&#39.");

define("_AUTHKEYMAXLIMIT", "duljina bi trebala biti maksimalno 40 znakova.");
define("_AUTHORIZATIONKEYEMPTYCONFIRM", "Authorization Key field is empty.<br>Do you confirm the changes?");

define("_RANDOMISEDDELAYATOFFPEAKEND", "Randomised Delay At Off Peak End");
define("_FIFO", "FIFO");
define("_FAILSAFECURRENT", "Sigurnosna struja");
define("_FAILSAFECURRENTERROR", "Potrebna je sigurna struja!");
define("_FAILSAFECURRENTLESSTHAN0", "* Failsafe Current value ne smije biti manja od 0!");
define("_FAILSAFECURRENTMORETHAN32", "* Failsafe Current value ne smije biti veća od 32!");
define("_FAILSAFECURRENTMORETHAN50", "* Vrijednost Failsafe Current ne smije biti veća od 50!");

define("_LOCALCHARGESESSION", "Lokalne sesije naplate");
define("_ROWNUMBER", "Broj reda");
define("_SESSIONUUID", "ID Naplate");
define("_AUTHORIZATIONUID", "RFID Kodj");
define("_STARTTIME", "Vrijeme početka");
define("_STOPTIME", "Vrijeme zaustavljanja");
define("_TOTALTIME", "Ukupno vrijeme");
define("_STATUS", "Status");
define("_CHARGEPOINTIDS", "Broj na šteker");
define("_INITIALENERGY", "Inicijalna energija(kWh)");
define("_LASTENERGY", "Posljednja energija(kWh)");
define("_TOTALENERGY", "Ukupna energija(kWh)");
define("_DOWNLOADLOCALCHARGESESSIONLOGS", "Prijava kompletne sesije u CSV");
define("_DOWNLOADFULLSESSIONLOGS", "Rezime prijave u CSV");
define("_STARTDATE", "početni datum");
define("_ENDDATE", "datum završetka");
define("_RFIDSELECTION", "RFID oabjr");
define("_CLEAR", "jisto");

define("_FALLBACKCURRENT", "Rezervna struja");
define("_FALLBACKRANGE", "Rezervna struja mora biti 0 ili unutar raspona od ");
define("_DOWNLOADEEBUSLOGS", "EEBUS zapisnici");
define("_PAIRINGENERGYMANAGER", "Omogućeno za uparivanje");
define("_PAIR", "Omogući uparivanje");
define("_UNPAIR", "Razpari");
define("_EEBUS", "EEBUS");
define("_FIRMWAREVERSION", "Verzija firmvera");
define("_EEBUSDISCOVERY", "Otkriveni uređaji");
define("_REFRESH", "Osvježi");
define("_CPROLEMASTERREQUIREDFIELD", "Ako želite ažurirati postavke grupe za upravljanje opterećenjem, uloga točke punjenja mora biti spremljena kao &#39Master&#39 iz općih postavki upravljanja opterećenjem.");

define("_LISTOFSLAVES", "Боолуудын жагсаалт");
define("_NUMBEROFSLAVES", "Боолуудын тоо");
define("_LISTOFCONNECTOR", "Холбогчдын жагсаалт");
define("_AVAILABLECURRENT", "Боломжтой одоогийн үе шат");

define("_DLMINTERFACE", "DLM интерфейс");
define("_ETHERNET", "Ethernet");
define("_DLMINTERFACEERROR", "Сүлжээний интерфейсээс WiFi-г идэвхжүүлнэ үү!");

define("_MUSTBEINTEGER", "mora biti cijeli broj!");
define("_GRIDBUFFER", "Postotak margine zaštite mreže");
define("_CHARGINGSTATUSALERT", "Vo statusot na polnenje, vrednosta ne može da se ažurira!");
define("_READUNDERSTAND", "Pročitao sam, razumem");

define("_MORETHAN10", "Morate povećati maksimalnu struju mreže ili smanjiti postotak granične zaštite mreže prije spremanja ovih postavki. Ograničenje maksimalne struje mreže ne može biti niže od 10A kada se koristi postotak granične zaštite mreže.");

define("_CLUSTERMAXCURRENT", "Maksimalna struja klastera");
define("_CLUSTERFAILSAFECURRENT", "Sigurna struja klastera");
define("_CLUSTERMAXCURRENTERROR", "Potrebna je maksimalna struja klastera!");
define("_CLUSTERFAILSAFECURRENTERROR", "Potrebna je struja sigurnosti klastera!");
define("_CLUSTERFAILSAFECURRENTLESSTHAN0", "Trenutna vrijednost klastera Failsafe ne smije biti manja od 0!");
define("_CLUSTERFAILSAFECURRENTMORETHAN", "Vrijednost struje sigurne od kvara klastera mora biti manja od maksimalne struje mreže!");
define("_CLUSTERFAILSAFE", "Kluster Failsafe Mode");

define("_CLUSTERMAXCURRENTLESSTHAN10", "Maksimalna trenutna vrijednost klastera ne smije biti manja od 10");
define("_CLUSTERMAXCURRENTMORETHAN", "Maksimalna trenutna vrijednost klastera mora biti jednaka ili manja od ove vrijednosti:");