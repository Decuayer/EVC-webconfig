<?php
include_once "access_control.php";
define("_LOGIN", "PRIJAVITE SE");
define("_USERNAME", "Korisničko ime:");
define("_PASSWORD", "Lozinka:");
define("_CHANGEPASSWORD", "Promijeni lozinku");
define("_CURRENTPASSWORD", "Trenutna lozinka:");
define("_NEWPASSWORD", "Nova lozinka:");
define("_CONFIRMNEWPASSWORD", "Potvrdite novu lozinku:");
define("_SUBMIT", "Podnesite");
define("_CURRENTPASSWORDREQUIRED", "Potrebno je unijeti trenutnu lozinku");
define("_PASSWORDREQUIRED", "Potrebno je unijeti lozinku");
define("_USERNAMEREQUIRED", "Potrebno je unijeti korisničko ime");
define("_USERAUTHFAILED", "Autentifikacija korisnika nije uspjela!");
define("_USERNAMEORCURRENTPASSWORDWRONG", "Korisničko ime ili trenutna lozinka je pogrešna!");
define("_DBACCESSFAILURE", "Nije moguće pristupiti bazi podataka!");
define("_CHANGEPASSWORDERROR", "Prvo morate promijeniti svoju lozinku!");
define("_SAMEPASSWORDERROR", "Trenutna i nova lozinka treba da se razlikuju jedna od druge!");
define("_PASSWORDMATCHERROR", "Lozinke se ne podudaraju!");
define("_CURRENTPASSWORDWRONG", "Trenutna lozinka je pogrešna!");
define("_PASSWORDERRORLEVEL2", "Lozinka je nevažeća, mora imati 20 znakova i sadržavati najmanje dva slova [A-Za-z], dvije cifre [0-9] i dva posebna znaka [!§$%&/()=?*#+- _.:,;]");
define("_PASSWORDERRORLEVEL3", "Lozinka nije važeća, a dužina znakova mora biti najmanje 12, s najviše 32 znaka i sadržavati barem dva mala slova [a-z], dva velika slova [A-Z], dvije brojke [0-9] i barem dva posebna znaka [!% &/()=?*#+-_].");
define("_LOGINLOCKOUT", "Previše neuspjelih pokušaja. Molimo pokušajte nakon 1800 sekundi.");

define("_MAINPAGE", "Početna stranica");
define("_GENERAL", "Opšte postavke");
define("_OCPPSETTINGS", "OCPP postavke");
define("_NETWORKINTERFACES", "Mrežni interfejsi");

define("_OCPPCONNINTERFACE", "OCPP Connection Interface : ");
define("_CONNECTIONSTATE", "Stanje veze : ");
define("_DISCONNECTED", "Nije povezano");
define("_NEEDTOLOGINFIRST", "Prvo se morate prijaviti!");
define("_CONNECTED", "Povezano");
define("_CPSERIALNUMBER", "CP serijski broj : ");
define("_HMISOFTWAREVERSION", "HMI verzija softvera : ");
define("_OCPPSOFTWAREVERSION", "OCPP verzija softvera : ");
define("_POWERBOARDSOFTWAREVERSION", "Verzija softvera Power Board : ");
define("_OCPPDEVICEID", "ID OCCP uređaja : ");
define("_DURATIONAFTERPOWERON", "Trajanje nakon uključivanja : ");
define("_LOGOUT", "Odjavite se");
define("_PRESET", "Prethodne postavke:");

define("_OCPPCONNECTION", "OCPP veza");
define("_ENABLED", "Omogućeno");
define("_DISABLED", "Onemogućeno");
define("_CONNECTIONSETTINGS", "Postavke veze");
define("_CENTRALSYSTEMADDRESS", "Adresa centralnog sistema ");
define("_CHARGEPOINTID", "ID mjesta punjenja ");
define("_OCPPVERSION", "OCPP verzija");
define("_SAVE", "Spremiti");
define("_SAVESUCCESSFUL", "Uspješno spremljeno.");
define("_CENTRALSYSTEMADDRESSERROR", "Potrebna je adresa centralnog sistema!");
define("_CHARGEPOINTIDERROR", "Potreban je ID tačke punjenja!");
define("_SECONDS", "Sekundi");
define("_ADD", "Dodati");
define("_REMOVE", "Ukloniti");
define("_SAVECAPITAL", "SPREMITI");
define("_CANCEL", "Otkazati");

define("_CELLULAR", "Mobilni");
define("_INTERFACEIPADDRESS", "IP adresa interfejsa: ");
define("_ICCID", "ICCID: ");
define("_IMSI", "IMSI: ");
define("_IMEI", "IMEI: ");
define("_APNNAME", "APN ime: ");
define("_APNUSERNAME", "APN korisničko ime: ");
define("_APNPASSWORD", "APN lozinka: ");
define("_IPSETTING", "IP postavka: ");
define("_IPADDRESS", "IP adresa: ");
define("_NETWORKMASK", "Mrežna maska: ");
define("_DEFAULTGATEWAY", "Zadani prolaz: ");
define("_PRIMARYDNS", "Primarni DNS: ");
define("_SECONDARYDNS", "Sekundarni DNS: ");
define("_WIFI", "WLAN");
define("_SECURITY", "Sigurnost: ");
define("_SECURITYTYPE", "Odaberite vrstu sigurnosti");
define("_NONE", "Nema");
define("_SELECTMODE", "Odaberite način rada!");
define("_RFIDLOCALLIST", "RFID Lokalna lista");
define("_ACCEPTALLRFIDS", "Prihvatite sve RFID-ove");
define("_MANAGERFIDLOCALLIST", "Upravljajte RFID lokalnom listom:");
define("_AUTOSTART", "Autostart");
define("_PROCESSING", "Obrada... Sačekajte...");
define("_MACADDRESS", "MAC adresa: ");
define("_WIFIHOTSPOT", "Vruća tačka Wi-Fi-a");
define("_TURNONDURINGBOOT", "Uključite tokom pokretanja: ");
define("_AUTOTURNOFFTIMEOUT", "Vremensko ograničenje automatskog isključivanja: ");
define("_AUTOTURNOFF", "Automatsko isključivanje: ");
define("_HOTSPOTALERTMESSAGE", "Promjene postavki &#39vruće tačke&#39 će stupiti na snagu sljedeći put kada se uređaj uključi. ");
define("_HOTSPOTREBOOTMESSAGE", "Želite li sada ponovo pokrenuti? ");

define("_DOWNLOADACLOGS", "Preuzmite AC zapise");
define("_DOWNLOADCELLULARLOGS", "Preuzmite zapise mobilnog modula");
define("_DOWNLOADPOWERBOARDLOGS", "Preuzmite Power Board zapise");
define("_PASSWORDRESETSUCCESSFUL", "Vaša lozinka je uspješno poništena.");
define("_DBOPENEDSUCCESSFULLY", "Uspješno otvorena baza podataka\n");
define("_WSSCERTSSETTINGS", "Postavke WSS certifikata ");
define("_CONFKEYS", "Konfiguracijski ključevi");
define("_KEY", "Tipka");
define("_STATIC", "Statički");
define("_TIMEZONE", "Vremenska zona");
define("_PLEASESELECTTIMEZONE", "Odaberite vremensku zonu");
define("_DISPLAYSETTINGS", "Postavke prikaza");
define("_DISPLAYLANGUAGE", "Jezik prikaza");
define("_BACKLIGHTDIMMING", "Zatamnjenje pozadinskog osvetljenja : ");
define("_PLEASESELECT", "Izaberite");
define("_TIMEBASED", "Zasnovano na vremenu");
define("_SENSORBASED", "Temeljeno na senzoru");
define("_BACKLIGHTDIMMINGLEVEL", "Nivo zatamnjenja pozadinskog osvetljenja : ");
define("_BACKLIGHTTHRESHOLD", "Prag pozadinskog osvetljenja : ");
define("_SETMIDTHRESHOLD", "SetMidThreshold");
define("_SETHIGHTHRESHOLD", "SetHighThresold");
define("_LOCALLOADMANAGEMENT", "Lokalno upravljanje opterećenjem");
define("_MINIMUMCURRENT", "Minimalna struja: ");
define("_FIFOPERCENTAGE", "FIFO postotak: ");
define("_GRIDMAXCURRENT", "Maksimalna struja mreže: ");
define("_MASTERIPADDRESS", "IP adresa matičnog sistema: ");
define("_BACKLIGHTTIMESETTINGS", "Postavke vremena pozadinskog osvjetljenja: ");
define("_SHOULDSELECTTIMEZONE", "* Morate odabrati vremensku zonu!");
define("_MINIMUMCURRENTREQUIRED", "* Potrebna je minimalna struja!");
define("_CURRENTMUSTBENUMERIC", "*  Struja mora biti brojčana!");
define("_FIFOPERCREQUIRED", "* FIFO postotak je obavezan!");
define("_FIFOPERCSHOULDBETWEEN", "* FIFO postotak mora biti između 0 i 100!");
define("_PERCMUSTBENUMERIC", "* Postotak mora biti numerički!");
define("_GRIDMAXCURRENTREQUIRED", "* Potrebna je maksimalna struja mreže!");
define("_GRIDCURRENTMUSTBENUMERIC", "* Struja mreže mora biti numerička!");
define("_IPADDRESSOFMASTERREQUIRED", "* IP adresa matičnog sistema je obavezna!");
define("_INVALIDIPADDRESS", "* Uneli ste nevažeću IP adresu!");
define("_SAMENETWORKLAN", "* Unijeli ste IP adresu u istoj mreži s LAN-om!");
define("_SAMENETWORKWLAN", "* Unijeli ste IP adresu u istoj mreži s WLAN-om!");
define("_APNISREQUIRED", "APN je obavezan!");
define("_IPADDRESSREQUIRED", "IP adresa je obavezna!");
define("_NETWORKMASKREQUIRED", "Mrežna maska je obavezna!");
define("_INVALIDNETWORKMASK", "* Uneli ste nevažeću mrežnu masku!");
define("_DEFAULTGATEWAYREQUIRED", "Zadani prolaz je obavezan!");
define("_INVALIDGATEWAY", "Uneli ste nevažeći zadani prolaz!");
define("_PRIMARYDNSREQUIRED", "Potreban je primarni DNS!");
define("_INVALIDDNS", "Uneli ste neispravan DNS!");
define("_SELECTIPSETTING", "Odaberite postavku IP-a.");
define("_SSIDREQUIRED", "SSID je obavezan!");
define("_PASSWORDISREQUIRED", "Lozinka je obavezna!");
define("_WIFIPASSWORDERROR", "Lozinka je nevažeća, dužina karaktera mora biti minimalno 8, a maksimalno 63 važeća znaka a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL2", "&#8226; Lozinka je nevažeća, dužina znakova mora biti 20,<br> &#8226; i sadržavati najmanje dva slova [A-Za-z],<br>&#8226; dvije cifre [0-9],<br>&#8226;i dva posebna znaka [!%&/()=?*#+-_]");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL3", "&#8226; Lozinka nije važeća, a dužina znakova mora biti najmanje 12, s najviše 32 znaka<br>&#8226; Lozinka mora sadržavati barem dva mala slova [a-z], <br>&#8226;  Lozinka mora sadržavati barem dva velika slova [A-Z], <br>&#8226; Lozinka mora sadržavati barem dvije brojke [0-9],<br>&#8226; Lozinka mora sadržavati barem dva posebna znaka [!%&/()=?*#+-_]");
define("_WIFISSIDERROR", "SSID je nevažeći, važeći znakovi a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_SELECTSECURITYTYPE", "Odaberite vrstu sigurnosti");
define("_HOSTIPREQUIRED", "* Host IP je obavezan!");
define("_CERTMANREQUIRED", "* Upravljanje certifikatima je potrebno!");
define("_OCPPENABLEALERT", "Ako želite da koristite svoju stanicu za punjenje u samostalnom načinu rada,<br>prvo morate onemogućiti OCPP vezu iz izbornika postavki OCPP");
define("_NOTSAVEDALERT", "Stranica nije sačuvana.");
define("_SAVEQUESTION", "Želite li sačuvati promjene?");
define("_OKBUTTON", "UREDU");
define("_LTECONNECTIONCONFIRM", "Mobilna veza će biti onemogućena. Da li potvrđujete?");
define("_WIFICONNECTIONCONFIRM", "Wi-Fi veza će biti onemogućena. Da li potvrđujete?");
define("_DHCPSERVERCONNECTIONCONFIRM", "Ako želite da omogućite LAN DHCP server,<br>prvo morate da onemogućite vruću tačku Wi-Fi-a u odeljku Vruća tačka Wi-Fi-a.");
define("_WIFIHOTSPOTCONNECTIONCONFIRM", "Ako želite da omogućite Vruću tačka Wi-Fi-a,<br>prvo morate da onemogućite LAN DHCP server u odeljku Vruća tačka Wi-Fi-a");

define("_DYNAMIC", "Dinamička");
define("_DIAGNOSTICS", "Dijagnostika");
define("_LOCALLOAD", "Lokalno upravljanje opterećenjem");
define("_DOWNLOAD", "Preuzmi");
define("_STARTDATE", "Datum početka");
define("_ENDDATE", "Datum završetka");
define("_CLEAREVENTLOGS", "Obriši sve dnevnike događaja");
define("_CLEAREVENTLOGSINFO", "Ovo će obrisati sve dnevnike događaja!");
define("_DOWNLOADEVENTLOGSINFO", "Preuzmi dnevnike događaja uređaja za maksimalno 5 dana");
define("_DEVICEEVENTLOGS", "Dnevnici događaja uređaja");
define("_DEVICECHANGELOGS", "Dnevnici promjena uređaja");
define("_LOGSDATEERROR", "Molimo vas da odaberete datume za maksimalno 5 dana.");
define("_DOWNLOACHANGELOGS", "Preuzmi dnevnike promjena uređaja");
define("_VPNFUNCTIONALITY", "VPN funkcionalnost: ");
define("_CERTMANAGEMENT", "Upravljanje certifikacijom: ");
define("_NAME", "Ime: ");
define("_CONNECTIONINTERFACE", "Interfejs veze ");
define("_ANY", "Bilo koji");
define("_OCPPCONNPARAMETERS", "OCPP konfiguracijski parametri");
define("_SETDEFAULT", "Postavite na Zadano ");
define("_STANDALONEMODE", "Samostalni način rada");
define("_STANDALONEMODETITLE", "Samostalni način rada:");
define("_STANDALONEMODENOTSELECTED", "* Samostalni način rada ne može se odabrati jer je OCPP omogućen.");
define("_CHARGERWEBUI", "Web korisnički interfejs punjača");
define("_SYSTEMMAINTENANCE", "Održavanje sistema");
define("_HOSTIP", "Host IP: ");
define("_PASSWORDERRORLEVEL1", "Lozinka je nevažeća, dužina karaktera mora biti najmanje 6 znakova i sadržavati najmanje 1 malo slovo, 1 veliko slovo i 1 numerički znak!");
define("_SELECTBACKLIGHTDIMMING", "* Morate odabrati prigušivanje pozadinskog svjetla!");
define("_ISREQUIRED", "je potrebno!");
define("_ISNOTVALID", "nije važeće!");
define("_ISDUPLICATED", "je dupliran!");
define("_MUSTBENUMERIC", "mora biti numerički!");
define("_VPNFUNCTIONALITYREQUIRED", "* Potrebna je VPN funkcionalnost!");
define("_VPNNAMEREQUIRED", "* Potreban je VPN naziv!");
define("_VPNPASSWORDREQUIRED", "* Potrebna je VPN lozinka!");
define("_EXPLANATION", "Ukazuje Obavezno polje.");
define("_FIRMWAREUPDATE", "Ažuriranja firmvera");
define("_BACKUPRESTORE", "Sigurnosno kopiranje i vraćanje konfiguracije");
define("_SYSTEMRESET", "Resetovanje sistema");
define("_CHANGEADMINPASSWORD", "Administrativna lozinka");
define("_FACTORYRESET", "Tvorničke postavke");
define("_FACTORYRESETBUTTON", "Vraćanje na tvorničke postavke");
define("_FACTORYDEFAULTCONFIGURATION", "Fabrički zadana konfiguracija");
define("_LOGFILES", "Datoteke zapisa");
define("_BACKUPFILE", "Datoteka rezervne kopije");
define("_RESTOREFILE", "Vratite konfiguracioni fajl");
define("_FREEMODEMAXCHARACTER", "mora imati najviše 32 znaka!");
define("_RESTOREMESSAGE", "Da li potvrđujete primjenu promjena i ponovno pokretanje sada?");

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

define("_PASSWORDTYPEEXPLANATION", "Vaša lozinka mora imati 6 znakova i sadržavati najmanje jedno veliko
slovo, jedno malo slovo, jednu cifru.");

define("_PASSWORDTYPEEXPLANATIONLEVEL2", "Vaša lozinka mora imati 20 znakova i barem dva
slova, dvije brojke i dva posebna znaka.");

define("_PASSWORDTYPEEXPLANATIONLEVEL3", "Vaša lozinka mora sadržavati barem 12, najviše 32 znaka i barem dva velika slova,
dva mala slova, dvije brojke i dva posebna znaka.");
define("_BACKTOLOGIN", "Povratak na prijavu");
define("_CHANGE", "Promjena");
define("_SYSTEMADMINISTRATION", "Sistemska administracija");
define("_UPDATE", "Ažuriranje");
define("_CONFIRM", "Potvrdite");
define("_FACTORYDEFAULTCONFIRM", "Jeste li sigurni da se želite vratiti na tvorničke postavke?");
define("_FILENAME", "Naziv datoteke");
define("_UPLOAD", "Učitavanje");
define("_SELECTFIRMWARE", "Odaberite datoteku ažuriranja firmvera sa računara");
define("_FIRMWAREFILESIZE", "Provjerite veličinu datoteke firmvera.");
define("_FIRMWAREFILETYPE", "Provjerite tip datoteke firmvera.");

define("_LESSTHANOREQUAL4", "mora biti između 1 i 4");
define("_LESSTHANOREQUAL20", "mora biti manji ili jednak sa 20");
define("_LESSTHANOREQUAL65000", "mora biti manji ili jednak sa 65000");
define("_LESSTHANOREQUAL300", "mora biti manji ili jednak sa 300");
define("_LESSTHANOREQUAL86500", "mora biti manji ili jednak sa 86500");
define("_LESSTHANOREQUAL10000", "mora biti manji ili jednak sa 10000");
define("_LESSTHANOREQUAL22", "mora biti manji ili jednak sa 22");
define("_LESSTHANOREQUAL10", "mora biti manji ili jednak sa 10");
define("_LESSTHANOREQUAL600", "mora biti manji ili jednak sa 600");
define("_LESSTHANOREQUAL120", "mora biti manji ili jednak sa 120");
define("_HIGHTHANOREQUAL0", "mora biti veći ili jednak 0");
define("_CHANGEPASSWORDSUGGESTION", "Preporučujemo vam da promijenite zadanu lozinku iz menija održavanja sistema");

define("_FILESIZE", "Provjerite veličinu datoteke.");
define("_FILETYPE", "Provjerite tip datoteke.");

define("_BACKUPVERSIONCHECK", "Verzija ove datoteke nije prikladna za uređaj.");
define("_HARDRESETCONFIRM", "Jeste li sigurni da želite izvršiti resetovanje hardvera?");
define("_SOFTRESETCONFIRM", "Jeste li sigurni da želite izvršiti resetovanje softvera?");
define("_NEWSETUP", "Koristite korisnički priručnik za novo podešavanje.");

define("_LOADMANAGEMENT", "Upravljanje opterećenjem");
define("_CPROLE", "Uloga tačke punjenja");
define("_GRIDSETTINGS", "Postavke mreže");
define("_LOADMANAGEMENTMODE", "Režim upravljanja opterećenjem");
define("_LOADMANAGEMENTGROUP", "Grupa za upravljanje opterećenjem");
define("_LOADMANAGEMENTOPTION", "Opcija upravljanja opterećenjem");
define("_ALARMS", "Alarmi");

define("_MASTER", "Matični sistem");
define("_SLAVE", "Podređeni sistem");
define("_TOTALCURRENTLIMIT", "Ukupna granica struje po fazi");
define("_SUPPLYTYPE", "Tip napajanja");
define("_FIFOPERCANTAGE", "FIFO postotak");
define("_TIC", "TIC");
define("_EQUALLYSHARED", "Jednako podijeljeno");
define("_COMBINED", "Kombinovano");
define("_TOTALCURRENTLIMITERROR", "Potrebno je ograničenje ukupne struje po fazi!");
define("_LESSTHAN1024", "mora biti manje od 1024");
define("_ATLEAST0","mora biti barem 0");
define("_MORETHAN12", "mora biti više od 12");
define("_CHOOSEONE", "Izaberite jedan");
define("_SLAVEMINCHCURRENT", "Trenutna postavka za bezbedno punjenje van mreže");
define("_SERIALNO", "Serijski broj");
define("_CONNECTORSTATE", "Stanje priključka");
define("_NUMBEROFPHASES", "Broj faza");
define("_PHASECONSEQUENCE", "Redosljed povezivanja faza");
define("_VIP", "VIP punjenje");
define("_CPMODE", "CP modalitet");
define("_VIPERROR", "VIP punjenje je potrebno");
define("_PHASECONSEQUENCEERROR", "Potreban je redosljed povezivanja faza!");
define("_CPMODEERROR", "CP modalitet je potreban!");
define("_SUPPORTEDCURRENT", "Podržana struja");
define("_INSTANTCURPERPHASE", "Faza sa trenutnim napajanjem struje");
define("_FIFOCHARGINGPERCENTAGE", "FIFO postotak punjenja");
define("_MINIMUMCURRENT1P", "Minimalna struja punjenja 1-fazna");
define("_MINIMUMCURRENT3P", "Minimalna struja punjenja 3-fazna");
define("_MAXIMUMCURRENT", "Maksimalna struja punjenja");
define("_STEP", "Korak");
define("_UPDATEDLMGROUP", "Ažurirajte DLM grupu");
define("_MAINCIRCUITCURRENT", "Maksimalna struja mreže");
define("_MAINCIRCUITCURRENTERROR", "Potrebna je maksimalna struja mreže!");
define("_DLMMAXCURRENT", "DLM ukupno ograničenje struje po fazi");
define("_DLMMAXCURRENTERROR", "DLM ukupno ograničenje struje po fazi je obavezno!");
define("_DLMMAXCURRENTMORETHANMAIN", "DLM ukupno ograničenje struje po fazi treba biti veće od polovice struje glavnog prekidača kruga");
define("_DLMMAXCURRENTLESSTHANMAIN", "DLM ukupno ograničenje struje treba bi biti manje od struje glavnog prekidača kruga");

define("_LOGOSETTINGS", "Postavke logotipa");
define("_USELOGO", "Odaberite datoteku logotipa sa računara");
define("_LOGOTYPE", "Odaberite logotip u PNG formatu.");
define("_LOGODIMENSION", "Maksimalna dozvoljena veličina logotipa je 80x80, odaberite logotip odgovarajuće veličine.");

define("_SERVICECONTACTINFO", "Informacije za kontakt servisa ekrana");
define("_SERVICECONTACTINFOCHARACTER", "Informacije za kontakt servisa ekrana moraju imati najviše 25 znakova!!<br>važeći znakovi a..z 0..9 .+@*");

define("_SCREENTHEME", "Tema ekrana");
define("_DARKBLUE", "Tamno plava");
define("_ORANGE", "Narandžasta");
define("_PLEASEENTERRFIDLOCALLIST", "Unesite popis lokalnih RFID!");

define("_DHCPSERVER", "DHCP Server");
define("_DHCPCLIENT", "DHCP klijent");

define("_MAXDHCPADDRRANGE", "Krajnja IP adresa DHCP servera");
define("_MINDHCPADDRRANGE", "Početna IP adresa DHCP servera");

define("_MAXDHCPADDRRANGEERROR", "Završna IP adresa DHCP servera je obavezna!");
define("_MINDHCPADDRRANGEERROR", "Potrebna je startna IP adresa DHCP servera!");
define("_DIFFERENCEBETWEENMAXANDMINADDRRANGE", "Krajnja IP adresa DHCP servera bi trebala biti veća od početne IP adrese DHCP servera");
define("_IPADDRESSRANGE", "IP adresa ne može imati vrijednost između početne i krajnje IP adrese DHCP servera");

define("_CELLULARGATEWAY", "Mobilni pristupnik");
define("_INVALIDSUBNET", "IP adresa nije u pravoj podmreži");

define("_CONNECTIONSTATUS", "Status veze");

define("_INSTALLATIONSETTINGS", "Postavke instalacije");
define("_EARTHINGSYSTEM", "Sistem uzemljenja");
define("_CURRENTLIMITERSETTINGS", "Trenutne postavke graničnika");
define("_CURRENTLIMITERPHASE", "Trenutna faza graničnika");
define("_CURRENTLIMITERVALUE", "Trenutna vrijednost graničnika");
define("_UNBALANCEDLOADDETECTION", "Detekcija neuravnoteženog opterećenja");
define("_EXTERNALENABLEINPUT", "Eksterni ulaz za omogućavanje");
define("_LOCKABLECABLE", "Kabl koji se može zaključati");
define("_POWEROPTIMIZERTOTALCURRENTLIMIT", "Ograničenje ukupnog dotoka struje Optimizatora snage");
define("_POWEROPTIMIZER", "Optimizatora snage");
define("_TNORTT", "TN/TT");
define("_SPLITPHASE", "IT/Faza razdvajanja");
define("_ONEPHASE", "Jedna faza");
define("_THREEPHASE", "Tri faze");
define("_POWEROPTIMIZERTOTALCURRENTLIMITMORETHANOREQUAL16", "Ograničenje ukupnog dotoka struje Optimizatora snage mora biti veće ili jednako sa 16");
define("_POWEROPTIMIZERTOTALCURRENTLIMITLESSTHANOREQUAL100", "Ograničenje ukupnog dotoka struje Optimizatora snage mora biti manje ili jednako sa 100");
define("_FOLLOWTHESUN", "Pratite Sunce");
define("_FOLLOWTHESUNMODE", "Pratite Sunčev način rada");
define("_AUTOPHASESWITCHING", "Automatsko prebacivanje faze");
define("_MAXHYBRID", "Max hybrid");
define("_SUNONLY", "Samo sunce");
define("_SUNHYBRID", "Sunčev hibrid");

define("_DISPLAYBACKLIGHTSETTINGS", "Postavke pozadinskog osvjetljenja ekrana");
define("_BACKLIGHTLEVEL", "Nivo pozadinskog osvjetljenja");
define("_SUNRISETIME", "Vrijeme izlaska sunca ");
define("_SUNSETTIME", "Vrijeme zalaska sunca");

define("_HIGH", "Visok");
define("_MID", "Srednji");
define("_LOW", "Nizak");

define("_A", " (A)");

define("_CURRENTLIMITERVALUELESSTHAN8", "* Kada je uključen EVReadySupport i faza limitatora struje je jedna faza, vrijednost limitatora struje ne smije biti manja od 8!");
define("_CURRENTLIMITERVALUELESSTHAN14", "* Kada je uključen EVReadySupport i faza limitatora struje je trofazna, vrijednost limitatora struje ne smije biti manja od 14!");

define("_LEDDIMMINGSETTINGS", "Postavke zatamnjenje LED svjetla");
define("_LEDDIMMINGLEVEL", "Nivo zatamnjenja LED svjetla");
define("_VERYLOW", "Vrlo nizak");
define("_WARNINGFORLTEENABLED", "LAN interface IP setting mode will be set as static and DHCP Server will be activated.");
define("_WARNINGFORLTEDISABLED", "Način podešavanja IP interfejsa LAN postavlja se na DHCP klijent, a DHCP interfejs će se deaktivirati.");
define("_ACCEPTQUESTION", "Prihvaćate promjene?");

define("_CELLULARGATEWAYCONFIRM", "Mobilni prolaz će biti onemogućen.");

define("_ETHERNETIP", "IP Ethernet interfejsa:");
define("_WLANIP", "IP WLAN interfejsa:");
define("_STRENGTH", "Snaga");
define("_WIFIFREQ", "Frekvencija");
define("_WIFILEVEL", "Stepen");
define("_CELLULARIP", "IP mobilnog interfejsa:");
define("_CELLULAROPERCODE" , "Operater");
define("_CELLULARTECH" , "Tehnologija");
define("_SCANNETWORKS", "Skeniraj mreže");
define("_AVAILABLENETWORKS", "Dostupne mreže");
define("_NETWORKSTATUS", "Status mreže");
define("_PLEASEWAITMSG", "Molimo sačekajte...");
define("_SCANNINGWIFIMSG", "Skeniranje Wi-Fi mreža");
define("_NOWIFIFOUNDMSG", "Nijedna Wi-Fi mreža nije pronađena");
define("_PLEASECHECKWIFICONNMSG", "Proverite Wi-Fi vezu i pokušajte ponovo.");

define("_APPLICATIONRESTART", "Ova promjena zahtijeva ponovno pokretanje aplikacije.");

define("_QRCODE", "Prikaži QR kod");
define("_QRCODEONSCREEN", "QR kod na ekranu");
define("_QRCODEDELIMITER", "QR kod na ekranu");
define("_INVALIDDELIMITERCHARACTER", "Razdjelnik QR koda je nevažeći, razmak nije prihvatljiv, dužina karaktera mora biti minimalno 1, a maksimalno 3 znakova, važeći znakovi 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");

define("_LOCATION", "Lokacija");
define("_INDOOR", "Unutra");
define("_OUTDOOR", "Vani");
define("_POWEROPTIMIZEREXTERNALMETER", "Eksterni Merač");
define("_OPERATIONMODE", "Način rada");
define("_AUTOSELECTED", "Automatski odabrano");
define("_NOTSELECTED", "Nije odabrano");
define("_CHARGINGMODESELECTIONANDPOWEROPTIMIZERCONF", "Odabir načina punjenja i konfiguracija Optimizatora snage");

define("_USERINTERACTION", "Interakcija korisnika");

define("_STANDBYLEDBEHAVIOUR", "Način rada LED lampice pripravnosti");
define("_OFF", "Isključeno");
define("_ON", "Uključeno");

define("_LOADSHEDDINGMINIMUMCURRENT", "Minimalna struja rasterećenja");
define("_UNBALANCEDLOADDETECTIONMAXCURRENT", "Maksimalna struja detekcije neuravnoteženog opterećenja");

define("_SCHEDULEDCHARGING", "Planirano punjenje");
define("_OFFPEAKCHARGING", "Punjenje van radnog vremena");
define("_OFFPEAKCHARGINGWEEKENDS", "Punjenje van perioda maksimalnog opterećenja vikendom");
define("_OFFPEAKCHARGINGPERIODS", "Periodi punjenja van perioda maksimalnog opterećenja");
define("_CONTINUECHARGINGENDPEAKINTERVAL", "Nastavite s punjenjem nakon završetka vršnog intervala");
define("_CONTINUECHARGINGWITHOUTREAUTHAFTERPOWERLOSS", "Nastavite s punjenjem bez ponovne autentifikacije nakon gubitka napajanja");



define("_RANDOMISEDDELAYMAXIMUMDURATION", "Nasumično maksimalno trajanje kašnjenja (sekunde)");

define("_RANDOMISEDDELAYMAXIMUMDURATIONERROR", "* Potrebno je nasumično maksimalno trajanje kašnjenja!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONBENUMERIC", "* Nasumično maksimalno trajanje kašnjenja mora biti cijeli broj!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONLIMIT", "* Maksimalno trajanje nasumičnog kašnjenja treba biti između 0 i 1800");
define("_OFFPEAKCHARGINGPERIODSERROR", "* Neophodni su periodi punjenja van perioda maksimalnog opterećenja!");
define("_OFFPEAKCHARGINGPERIODSSAMETIMEERROR", "* Vrijeme početka i završetka punjenja izvan najveće potrošnje ne može biti isto!");

define("_OFFPEAKCHARGINGSECONDTIMEPERIOD", "Drugi period punjenja izvan najveće potrošnje");
define("_OFFPEAKDISABLEDCONFIRM", "Punjenje van perioda maksimalnog opterećenja će biti onemogućeno. Da li potvrđujete?");

define("_SHOWSERVICECONTACTINFO", "Prikaži dodatne informacije za kontakt servisa");
define("_EXTRASERVICECONTACTINFORMATION", "Informacije za kontakt servisa su prikazane na ekranima Povezivanje kabla za punjenje, Priprema za punjenje, Inicijalizacija i Čekanje na povezivanje");

define("_LOADSHEDDINGSTATUS", "Status rasterećenja: ");
define("_ACTIVE", "Aktivno");
define("_INACTIVE", "Neaktivno");
define("_POWEROPTIMIZEREXTERNALMETERENABLEALERT", "Ako želite koristiti svoju opciju upravljanja opterećenjem u Modbusu,<br>prvo trebate onemogućiti Ograničenje ukupne struje optimizatora snage u dijelu „Odabir načina punjenja i konfiguracija optimizatora snage“.");
define("_MODBUSALERT", "Ako želite omogućiti svoj vanjski mjerač optimizatora snage,<br>prvo trebate deaktivirati Modbus u dijelu „Upravljanje lokalnim opterećenjem“.");
define("_POWEROPTIMIZERDLMENABLEALERT", "Ako želite koristiti opciju Upravljanja Opterećenjem u Master/Slave režimu,<br>prvo morate onemogućiti Optimizator Snage iz &#39Izbor Režima Punjenja i Konfiguracija Optimizatora Snage&#39.");
define("_DLMALERT", "Ako želite aktivirati Optimizator Snage,<br>prvo morate onemogućiti Master/Slave<br>iz &#39Lokalnog Upravljanja Opterećenjem&#39.");

define("_DLMALERTFOLLOWTHESUN", "Ako želite omogućiti svoj Pratite sunce,<br>prvo morate onemogućiti Master/Slave<br>iz &#39Lokalnog Upravljanja Opterećenjem&#39.");
define("_FOLLOWTHESUNDLMENABLEALERT", "Ako želite koristiti opciju Upravljanja Opterećenjem u Master/Slave režimu,<br>prvo morate onemogućiti  Pratite sunce iz &#39Izbor Režima Punjenja i Konfiguracija Optimizatora Snage&#39.");

define("_RESETUSERPASSWORD", "Resetovanje <br> lozinke korisnika");
define("_INSTALLATIONERRORENABLEDCONFIRM", "Ako želite da onemogućite Omogućavanje greške pri instalaciji,<br>prvo morate postaviti sistem uzemljenja sa &#39Postavke instalacije&#39 na IT/Split Phase.");
define("_EARTHINGSYSTEMCONFIRM", "Ako želite postaviti sistem uzemljenja na TN/TT,<br>prvo morate omogućiti Omogućavanje greške pri instalaciji iz &#39OCPP postavki&#39.");

define("_AUTHKEYMAXLIMIT", "dužina treba da bude maksimalno 40 karaktera.");
define("_AUTHORIZATIONKEYEMPTYCONFIRM", "Polje Authorization Key je prazno.<br>Da li potvrđujete promjene?");

define("_RANDOMISEDDELAYATOFFPEAKEND", "Nasumično kašnjenje na kraju van špica");
define("_FIFO", "FIFO");
define("_FAILSAFECURRENT", "Failsafe Current");
define("_FAILSAFECURRENTERROR", "Failsafe Current je obavezna!");
define("_FAILSAFECURRENTLESSTHAN0", "* Failsafe Trenutna vrijednost ne smije biti manja od 0!");
define("_FAILSAFECURRENTMORETHAN32", "* Failsafe Trenutna vrijednost ne smije biti veća od 32!");
define("_FAILSAFECURRENTMORETHAN50", "* Failsafe Trenutna vrijednost ne smije biti veća od 50!");


define("_LOCALCHARGESESSION", "Lokalne sesije naplate");
define("_ROWNUMBER", "Broj reda");
define("_SESSIONUUID", "ID Naplate");
define("_AUTHORIZATIONUID", "RFID Kod");
define("_STARTTIME", "vrijeme početka");
define("_STOPTIME", "Vrijeme zaustavljanja");
define("_TOTALTIME", "Ukupno vrijeme");
define("_STATUS", "Status");
define("_CHARGEPOINTIDS", "Broj utičnice");
define("_INITIALENERGY", "Inicijalna energija(kWh)");
define("_LASTENERGY", "Posljednja energija(kWh)");
define("_TOTALENERGY", "Ukupna energija(kWh)");
define("_DOWNLOADLOCALCHARGESESSIONLOGS", "Prijava kompletne sesije u CSV");
define("_DOWNLOADFULLSESSIONLOGS", "Rezime prijave u CSV");
define("_STARTDATE", "datum početka");
define("_ENDDATE", "datum završetka");
define("_RFIDSELECTION", "RFID izbor");
define("_CLEAR", "jasno");

define("_FALLBACKCURRENT", "Rezervna struja");
define("_FALLBACKRANGE", "Povratna struja mora biti 0 ili unutar raspona od ");
define("_DOWNLOADEEBUSLOGS", "EEBUS zapisnici");
define("_PAIRINGENERGYMANAGER", "Omogućeno za uparivanje");
define("_PAIR", "Omogući uparivanje");
define("_UNPAIR", "Razpari");
define("_EEBUS", "EEBUS");
define("_FIRMWAREVERSION", "Verzija firmvera");
define("_EEBUSDISCOVERY", "Otkriveni uređaji");
define("_REFRESH", "Osvježi");
define("_CPROLEMASTERREQUIREDFIELD", "Ako želite da ažurirate postavke grupe za upravljanje opterećenjem, uloga tačke punjenja mora biti sačuvana kao &#39Master<&#39 iz općih postavki upravljanja opterećenjem.");

define("_LISTOFSLAVES", "Lista podređenih");
define("_NUMBEROFSLAVES", "Broj podređenih");
define("_LISTOFCONNECTOR", "Lista konektora");
define("_AVAILABLECURRENT", "Dostupna trenutna faza");

define("_DLMINTERFACE", "DLM sučelje");
define("_ETHERNET", "Ethernet");
define("_DLMINTERFACEERROR", "Omogući WiFi sa mrežnih interfejsa!");

define("_MUSTBEINTEGER", "mora biti cijeli broj!");

define("_GRIDBUFFER", "Postotak margine zaštite mreže");
define("_CHARGINGSTATUSALERT", "U statusu punjenja vrijednost se ne može ažurirati!");
define("_READUNDERSTAND", "Pročitao sam, razumem");

define("_MORETHAN10", "Morate povećati maksimalnu struju mreže ili smanjiti postotak margine zaštite mreže prije spremanja ovih postavki. Granica maksimalne struje mreže ne može biti niža od 10A kada koristite postotak margine zaštite mreže.");

define("_CLUSTERMAXCURRENT", "Maksimalna struja klastera");
define("_CLUSTERFAILSAFECURRENT", "Cluster Failsafe Current");
define("_CLUSTERMAXCURRENTERROR", "Potrebna je maksimalna struja klastera!");
define("_CLUSTERFAILSAFECURRENTERROR", "Cluster Failsafe struja je potrebna!");
define("_CLUSTERFAILSAFECURRENTLESSTHAN0", "Cluster Failsafe Trenutna vrijednost ne smije biti manja od 0!");
define("_CLUSTERFAILSAFECURRENTMORETHAN", "Vrijednost struje sigurnosti klastera mora biti manja od maksimalne struje mreže!");
define("_CLUSTERFAILSAFE", "Cluster Failsafe Mode");

define("_CLUSTERMAXCURRENTLESSTHAN10", "Maksimalna trenutna vrijednost klastera ne smije biti manja od 10");
define("_CLUSTERMAXCURRENTMORETHAN", "Maksimalna trenutna vrijednost klastera mora biti jednaka ili manja od ove vrijednosti:");