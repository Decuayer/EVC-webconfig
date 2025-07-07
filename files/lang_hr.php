<?php
include_once "access_control.php";
define("_LOGIN", "PRIJAVA");
define("_USERNAME", "Korisničko ime:");
define("_PASSWORD", "Lozinka:");
define("_CHANGEPASSWORD", "Promijeni lozinku");
define("_CURRENTPASSWORD", "Trenutna lozinka:");
define("_NEWPASSWORD", "Nova lozinka:");
define("_CONFIRMNEWPASSWORD", "Potvrdite novu lozinku:");
define("_SUBMIT", "Pošalji");
define("_CURRENTPASSWORDREQUIRED", "Trenutna lozinka je obavezna");
define("_PASSWORDREQUIRED", "Lozinka je obavezna");
define("_USERNAMEREQUIRED", "Korisničko ime je obavezno");
define("_USERAUTHFAILED", "Autorizacija korisnika nije uspjela!");
define("_USERNAMEORCURRENTPASSWORDWRONG", "Korisničko ime ili trenutna lozinka su pogrešni!");
define("_DBACCESSFAILURE", "Ne možete pristupiti bazi podataka!");
define("_CHANGEPASSWORDERROR", "Prvo trebate promijeniti svoju lozinku!");
define("_SAMEPASSWORDERROR", "Trenutna i nova lozinka moraju se razlikovati!");
define("_PASSWORDMATCHERROR", "Lozinke se ne podudaraju!");
define("_CURRENTPASSWORDWRONG", "Trenutna lozinka je netočna!");
define("_PASSWORDERRORLEVEL2", "Lozinka nije ispravna, broj znakova treba biti 20 te treba sadržavati barem dva slova [A-Za-z], dva broja [0-9] i dva posebna znaka [!%&/()=?*#+-_]");
define("_PASSWORDERRORLEVEL3", "Lozinka nije valjana, a duljina znakova mora biti najmanje 12, s najviše 32 znaka te sadržavati barem dva mala slova [a-z], dva velika slova [A-Z], dva broja [0-9] te barem dva posebna znaka [!% &/()=?*#+-_].");
define("_LOGINLOCKOUT", "Previše neuspjelih pokušaja. Pokušajte nakon 1800 sekundi.");

define("_MAINPAGE", "Glavna stranica");
define("_GENERAL", "Opće postavke ");
define("_OCPPSETTINGS", "OCPP postavke");
define("_NETWORKINTERFACES", "Mrežna sučelja");

define("_OCPPCONNINTERFACE", "Sučelje OCPP priključka : ");
define("_CONNECTIONSTATE", "Status veze : ");
define("_DISCONNECTED", "Odspojeno");
define("_NEEDTOLOGINFIRST", "Prvo se trebate prijaviti!");
define("_CONNECTED", "Spojeno");
define("_CPSERIALNUMBER", "CP serijski broj : ");
define("_HMISOFTWAREVERSION", "HMI verzija softvera : ");
define("_OCPPSOFTWAREVERSION", "OCPP verzija softvera : ");
define("_POWERBOARDSOFTWAREVERSION", "Verzija softvera matične ploče : ");
define("_OCPPDEVICEID", "Oznaka OCPP uređaja : ");
define("_DURATIONAFTERPOWERON", "Trajanje nakon uključivanja : ");
define("_LOGOUT", "Odjava");
define("_PRESET", "Prethodno podešeno:");

define("_OCPPCONNECTION", "OCPP priključak");
define("_ENABLED", "Aktivirano");
define("_DISABLED", "Deaktivirano");
define("_CONNECTIONSETTINGS", "Postavke veze");
define("_CENTRALSYSTEMADDRESS", "Adresa središnjeg sustava ");
define("_CHARGEPOINTID", "Oznaka točke punjenja ");
define("_OCPPVERSION", "OCPP verzija");
define("_SAVE", "Spremi");
define("_SAVESUCCESSFUL", "Uspješno spremljeno.");
define("_CENTRALSYSTEMADDRESSERROR", "Adresa središnjeg sustava je obavezna!");
define("_CHARGEPOINTIDERROR", "Oznaka točke punjenja je obavezna!");
define("_SECONDS", "Sekundi");
define("_ADD", "Dodaj");
define("_REMOVE", "Ukloni");
define("_SAVECAPITAL", "SPREMI");
define("_CANCEL", "Poništi");

define("_CELLULAR", "Celularni");
define("_INTERFACEIPADDRESS", "IP adresa sučelja: ");
define("_ICCID", "ICCID: ");
define("_IMSI", "IMSI: ");
define("_IMEI", "IMEI: ");
define("_APNNAME", "Naziv APN-a: ");
define("_APNUSERNAME", "Korisničko ime APN-a: ");
define("_APNPASSWORD", "Lozinka APN-a: ");
define("_IPSETTING", "IP podešavanje: ");
define("_IPADDRESS", "IP adresa: ");
define("_NETWORKMASK", "Mrežna maska: ");
define("_DEFAULTGATEWAY", "Zadani mrežni pristupnik: ");
define("_PRIMARYDNS", "Primarni DNS: ");
define("_SECONDARYDNS", "Sekundarni DNS: ");
define("_WIFI", "WLAN");
define("_SECURITY", "Sigurnost: ");
define("_SECURITYTYPE", "Odabir vrste sigurnosti");
define("_NONE", "Ništa");
define("_SELECTMODE", "Odaberite način rada!");
define("_RFIDLOCALLIST", "RFID lokalni popis");
define("_ACCEPTALLRFIDS", "Prihvati sve RFID-ove");
define("_MANAGERFIDLOCALLIST", "Upravljaj RFID lokalnim popisom:");
define("_AUTOSTART", "Automatsko pokretanje");
define("_PROCESSING", "Obrađivanje... Molimo, pričekajte...");
define("_MACADDRESS", "MAC adresa: ");
define("_WIFIHOTSPOT", "Wi-Fi Hotspot");
define("_TURNONDURINGBOOT", "Uključivanje tijekom podizanja sustava: ");
define("_AUTOTURNOFFTIMEOUT", "Vremensko ograničenje automatskog isključivanja: ");
define("_AUTOTURNOFF", "Automatsko isključivanje: ");
define("_HOTSPOTALERTMESSAGE", "Promjene postavke hotspota primijenit će se kada se uređaj uključi  idući put.. ");
define("_HOTSPOTREBOOTMESSAGE", "Želite li sada obaviti podizanje sustava? ");

define("_DOWNLOADACLOGS", "Preuzmi AC zapise");
define("_DOWNLOADCELLULARLOGS", "Preuzmi zapise modula bežične mreže");
define("_DOWNLOADPOWERBOARDLOGS", "Preuzmi zapise matične ploče");
define("_PASSWORDRESETSUCCESSFUL", "Vaša lozinka je uspješno ponovno podešena.");
define("_DBOPENEDSUCCESSFULLY", "Baza podataka uspješno je otvorena\n");
define("_WSSCERTSSETTINGS", "Postavke WSS certifikata ");
define("_CONFKEYS", "Gumbi konfiguracije");
define("_KEY", "Gumb");
define("_STATIC", "Statični");
define("_TIMEZONE", "Vremenska zona");
define("_PLEASESELECTTIMEZONE", "Odaberite vremensku zonu");
define("_DISPLAYSETTINGS", "Prikaz postavki");
define("_DISPLAYLANGUAGE", "Jezik zaslona");
define("_BACKLIGHTDIMMING", "Prigušivanje pozadinskog svjetla : ");
define("_PLEASESELECT", "Molimo odaberite");
define("_TIMEBASED", "Vremenski određeno");
define("_SENSORBASED", "Temeljeno na senzoru");
define("_BACKLIGHTDIMMINGLEVEL", "Razina prigušivanje pozadinskog svjetla : ");
define("_BACKLIGHTTHRESHOLD", "Prag pozadinskog svjetla : ");
define("_SETMIDTHRESHOLD", "PodesiSrednjPrag");
define("_SETHIGHTHRESHOLD", "PodesiVisokiPrag");
define("_LOCALLOADMANAGEMENT", "Upravljanje lokalnim opterećenjem");
define("_MINIMUMCURRENT", "Minimalna jakost struje: ");
define("_FIFOPERCENTAGE", "FIFO postotak: ");
define("_GRIDMAXCURRENT", "Maksimalna jakost struje mreže: ");
define("_MASTERIPADDRESS", "IP adresa glavne stanice za punjenje: ");
define("_BACKLIGHTTIMESETTINGS", "Postavke vremena pozadinskog svjetla: ");
define("_SHOULDSELECTTIMEZONE", "* Morate odabrati vremensku zonu!");
define("_MINIMUMCURRENTREQUIRED", "* Minimalna jakost struje je obavezna!");
define("_CURRENTMUSTBENUMERIC", "* Jakost struje treba biti izražena brojkama!");
define("_FIFOPERCREQUIRED", "* FIFO postotak je obavezan!");
define("_FIFOPERCSHOULDBETWEEN", "* FIFO postotak treba biti između 0 i 100!");
define("_PERCMUSTBENUMERIC", "* Postotak biti izražen brojkama!");
define("_GRIDMAXCURRENTREQUIRED", "* Maksimalna jakost struje mreže je obavezna!");
define("_GRIDCURRENTMUSTBENUMERIC", "* Jakost struje mreže treba biti izražena brojkama!");
define("_IPADDRESSOFMASTERREQUIRED", "* IP adresa glavne stanice za punjenje je obavezna!");
define("_INVALIDIPADDRESS", "* Unijeli ste neispravnu IP adresu!");
define("_SAMENETWORKLAN", "* Unijeli ste IP adresu u istoj mreži s LAN-om!");
define("_SAMENETWORKWLAN", "* Unijeli ste IP adresu u istoj mreži s WLAN-om!");
define("_APNISREQUIRED", "APN je obavezan!");
define("_IPADDRESSREQUIRED", "IP adresa je obavezna!");
define("_NETWORKMASKREQUIRED", "Mrežna maska je obavezna!");
define("_INVALIDNETWORKMASK", "* Unijeli ste neispravnu mrežnu masku!");
define("_DEFAULTGATEWAYREQUIRED", "Zadani mrežni pristupnik (gateway) je obavezan!");
define("_INVALIDGATEWAY", "Unijeli ste neispravni zadani mrežni pristupnik (gateway)!");
define("_PRIMARYDNSREQUIRED", "Primarni dns je obavezan!");
define("_INVALIDDNS", "Unijeli ste neispravni dns!");
define("_SELECTIPSETTING", "Odaberite IP postavku.");
define("_SSIDREQUIRED", "SSID je obavezan!");
define("_PASSWORDISREQUIRED", "Lozinka je obavezna!");
define("_WIFIPASSWORDERROR", "Lozinka nije ispravna, broj znakova treba biti minimalno 8, a maksimalno 63 ispravni znakovi a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL2", "&#8226; Lozinka nije ispravna, broj znakova treba biti 20,<br>&#8226; te treba sadržavati barem dva slova [A-Za-z],<br>&#8226; dva broja [0-9],<br>&#8226; i dva posebna znaka [!%&/()=?*#+-_]");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL3", "&#8226; Lozinka nije ispravna, duljina znakova mora biti najmanje 12,s najviše 32 znaka,<br>&#8226; Lozinka mora sadržavati barem dva mala slova [a-z], <br>&#8226; Lozinka mora sadržavati barem dva velika slova [A-Z], <br>&#8226;  Lozinka mora sadržavati barem dvije znamenke [0-9],<br>&#8226; Lozinka mora sadržavati barem dva posebna znaka [!%&/()=?*#+-_]");
define("_WIFISSIDERROR", "SSID nije ispravan, ispravni znakovi  a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_SELECTSECURITYTYPE", "Odaberite vrstu sigurnosti");
define("_HOSTIPREQUIRED", "* IP glavnog računala je obavezan!");
define("_CERTMANREQUIRED", "* Upravljanje certifikatima je obavezno!");
define("_OCPPENABLEALERT", "Ako želite koristiti svoju stanicu za punjenje u načinu rada samostalnog korištenja,<br>tada prvo trebate deaktivirati OCPP vezu u izborniku OCPP postavki");
define("_NOTSAVEDALERT", "Stranica nije spremljena.");
define("_SAVEQUESTION", "Želite li spremiti promjene?");
define("_OKBUTTON", "OK");
define("_LTECONNECTIONCONFIRM", "Veza bežične mreže bit će deaktivirana. Želite li potvrditi?");
define("_WIFICONNECTIONCONFIRM", "Wi-Fi veza bit će deaktivirana. Želite li potvrditi?");
define("_DHCPSERVERCONNECTIONCONFIRM", "Ako želite aktivirati poslužitelj LAN DHCP,<br>tada prvo trebate deaktivirati Wi-Fi Hotspot<br>u opciji &#39i-Fi Hotspot&#39.");
define("_WIFIHOTSPOTCONNECTIONCONFIRM", "Ako želite aktivirati Wi-Fi Hotspot,<br>tada prvo trebate deaktivirati poslužitelj LAN DHCP u opciji &#39Postavke LAN IP-a&#39.");

define("_DYNAMIC", "Dinamično");
define("_DIAGNOSTICS", "Dijagnostika");
define("_LOCALLOAD", "Upravljanje lokalnim opterećenjem");
define("_DOWNLOAD", "Preuzmi");
define("_STARTDATE", "Datum početka");
define("_ENDDATE", "Datum završetka");
define("_CLEAREVENTLOGS", "Obriši sve dnevnike događaja");
define("_CLEAREVENTLOGSINFO", "Ovo će obrisati sve dnevnike događaja!");
define("_DOWNLOADEVENTLOGSINFO", "Preuzmi dnevnike događaja uređaja za maksimalno 5 dana");
define("_DEVICEEVENTLOGS", "Dnevnici događaja uređaja");
define("_DEVICECHANGELOGS", "Dnevnici promjena uređaja");
define("_LOGSDATEERROR", "Molimo odaberite datume za maksimalno 5 dana.");
define("_DOWNLOACHANGELOGS", "Preuzmi dnevnike promjena uređaja");
define("_VPNFUNCTIONALITY", "VPN funkcionalnost: ");
define("_CERTMANAGEMENT", "Upravljanje certifikatima: ");
define("_NAME", "Naziv: ");
define("_CONNECTIONINTERFACE", "Sučelje za povezivanje ");
define("_ANY", "Svaki");
define("_OCPPCONNPARAMETERS", "OCPP parametri konfiguracije");
define("_SETDEFAULT", "Podesi na zadano ");
define("_STANDALONEMODE", "Način rada samostalnog korištenja");
define("_STANDALONEMODETITLE", "Način rada samostalnog korištenja:");
define("_STANDALONEMODENOTSELECTED", "* Način rada samostalnog korištenja ne može se odabrati je je OCPP aktiviran.");
define("_CHARGERWEBUI", "Internetsko korisničko sučelje punjača");
define("_SYSTEMMAINTENANCE", "Održavanje sustava");
define("_HOSTIP", "IP glavnog računala: ");
define("_PASSWORDERRORLEVEL1", "Vaša lozinka treba sadržavati 6 znakova i sastojati se od barem jednog velikog slova, jednog malog slova, jednog broja.");
define("_SELECTBACKLIGHTDIMMING", "* Morate odabrati prigušivanje pozadinskog svjetla!");
define("_ISREQUIRED", "je obavezno!");
define("_ISNOTVALID", "nije valjan!");
define("_ISDUPLICATED", "je dupliciran");
define("_MUSTBENUMERIC", "treba biti izraženo brojkama!");
define("_VPNFUNCTIONALITYREQUIRED", "* Vpn funkcionalnost je obavezna!");
define("_VPNNAMEREQUIRED", "* Vpn naziv je obavezan!");
define("_VPNPASSWORDREQUIRED", "* Vpn lozinka je obavezna!");
define("_EXPLANATION", "Označava obavezno polje.");
define("_FIRMWAREUPDATE", "Ažuriranje firmwarea");
define("_BACKUPRESTORE", "Sigurnosna kopija i obnova konfiguracije");
define("_SYSTEMRESET", "Ponovno podešavanje sustava");
define("_CHANGEADMINPASSWORD", "Administrativna lozinka");
define("_FACTORYRESET", "Tvornički zadana postavke");
define("_FACTORYRESETBUTTON", "Vrati na tvorničke postavke");
define("_FACTORYDEFAULTCONFIGURATION", "Tvornički zadana konfiguracija");
define("_LOGFILES", "Datoteke zapisa");
define("_BACKUPFILE", "Datoteka sigurnosne kopije");
define("_RESTOREFILE", "Obnovi datoteku konfiguracije");
define("_FREEMODEMAXCHARACTER", "mora imati najviše 32 znaka!");
define("_RESTOREMESSAGE", "Potvrđujete li da želite odmah izvršiti primjenu promjena i ponovno pokretanje sustava?");

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

define("_PASSWORDTYPEEXPLANATION", "Vaša lozinka treba sadržavati 6 znakova i sastojati se od barem jednog velikog
slova, jednog malog slova, jednog broja.");

define("_PASSWORDTYPEEXPLANATIONLEVEL2", "Vaša lozinka treba sadržavati 20 znakova i barem dva slova,
dvije znamenke i dva posebna znaka.");

define("_PASSWORDTYPEEXPLANATIONLEVEL3", "Vaša lozinka mora sadržavati barem 12, najviše 32 znaka i barem dva velika slova,
dva mala slova, dvije znamenke i dva posebna znaka.");


define("_BACKTOLOGIN", "Natrag na prijavu");
define("_CHANGE", "Promjena");
define("_SYSTEMADMINISTRATION", "Administracija sustava");
define("_UPDATE", "Obnovi");
define("_CONFIRM", "Potvrdi");
define("_FACTORYDEFAULTCONFIRM", "Jeste li sigurni da želite vratiti tvornički zadane postavke?");
define("_FILENAME", "Naziv datoteke");
define("_UPLOAD", "Učitavanje");
define("_SELECTFIRMWARE", "Odaberite datoteku ažuriranja firmwarea na računalu");
define("_FIRMWAREFILESIZE", "Provjerite veličinu datoteke firmwarea.");
define("_FIRMWAREFILETYPE", "Provjerite vrstu datoteke firmwarea.");

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
define("_HIGHTHANOREQUAL0", "mora biti veći ili jednak 0");
define("_CHANGEPASSWORDSUGGESTION", "Preporučujemo vam da promijenite svoju zadanu lozinku u izborniku održavanja sustava");

define("_FILESIZE", "Provjerite veličinu datoteke.");
define("_FILETYPE", "Provjerite vrstu datoteke.");

define("_BACKUPVERSIONCHECK", "Verzija datoteke ne odgovara uređaju.");
define("_HARDRESETCONFIRM", "Sigurno želite vratiti na tvorničke postavke?");
define("_SOFTRESETCONFIRM", "Sigurno želite ponovno pokrenuti uređaj?");
define("_NEWSETUP", "Za novo podešavanje koristite korisnički priručnik.");

define("_LOADMANAGEMENT", "Upravljanje opterećenjem");
define("_CPROLE", "Uloga točke punjenja");
define("_GRIDSETTINGS", "Postavke mreže");
define("_LOADMANAGEMENTMODE", "Način rada upravljanja opterećenjem");
define("_LOADMANAGEMENTGROUP", "Grupa upravljanja opterećenjem");
define("_LOADMANAGEMENTOPTION", "Opcija upravljanja opterećenjem");
define("_ALARMS", "Alarmi");

define("_MASTER", "Glavna stanica za punjenje");
define("_SLAVE", "Pomoćna stanica za punjenje");
define("_TOTALCURRENTLIMIT", "Ukupno ograničenje struje po fazi");
define("_SUPPLYTYPE", "Vrsta opskrbe");
define("_FIFOPERCANTAGE", "FIFO postotak");
define("_TIC", "TIC");
define("_EQUALLYSHARED", "Podjednaki način");
define("_COMBINED", "Kombinirani");
define("_TOTALCURRENTLIMITERROR", "Ukupno ograničenje struje po fazi je obavezno!");
define("_LESSTHAN1024", "mora biti manji od 1024");
define("_ATLEAST0","mora biti barem 0");
define("_MORETHAN12", "mora biti veći od 12");
define("_CHOOSEONE", "Odaberite jedno");
define("_SLAVEMINCHCURRENT", "Postavka vanmrežnog punjenja sigurne struje");
define("_SERIALNO", "Serijski broj");
define("_CONNECTORSTATE", "Status priključka");
define("_NUMBEROFPHASES", "Broj faza");
define("_PHASECONSEQUENCE", "Slijed povezivanja faza");
define("_VIP", "VIP punjenje");
define("_CPMODE", "CP način");
define("_VIPERROR", "VIP punjenje je obavezno");
define("_PHASECONSEQUENCEERROR", "Slijed povezivanja faza je obavezan!");
define("_CPMODEERROR", "CP način rada je obavezan!");
define("_SUPPORTEDCURRENT", "Podržane struje");
define("_INSTANTCURPERPHASE", "Faza trenutne struje");
define("_FIFOCHARGINGPERCENTAGE", "Postotak FIFO punjenja");
define("_MINIMUMCURRENT1P", "Minimalna struja punjenja 1-fazna");
define("_MINIMUMCURRENT3P", "Minimalna struja punjenja 3-fazna");
define("_MAXIMUMCURRENT", "Maksimalna struja punjenja");
define("_STEP", "Korak");
define("_UPDATEDLMGROUP", "Ažuriranje DLM grupe");
define("_MAINCIRCUITCURRENT", "Maksimalna struja mreže");
define("_MAINCIRCUITCURRENTERROR", "Potrebna je maksimalna struja mreže!");
define("_DLMMAXCURRENT", "DLM ukupno ograničenje struje po fazi");
define("_DLMMAXCURRENTERROR", "DLM ukupno ograničenje struje po fazi je obvezno!");
define("_DLMMAXCURRENTMORETHANMAIN", "DLM ukupno ograničenje struje po fazi treba biti veće od polovice struje glavnog prekidača kruga");
define("_DLMMAXCURRENTLESSTHANMAIN", "DLM ukupno ograničenje struje treba bi biti manje od struje glavnog prekidača kruga");

define("_LOGOSETTINGS", "Postavke logotipa");
define("_USELOGO", "Odaberite datoteku logotipa s računala");
define("_LOGOTYPE", "Odaberite logotip u png formatu.");
define("_LOGODIMENSION", "Maksimalna dozvoljena veličina logotipa je 80x80, odaberite logotip odgovarajuće veličine.");

define("_SERVICECONTACTINFO", "Zaslon s kontakt podacima servisa");
define("_SERVICECONTACTINFOCHARACTER", "Zaslon s kontakt podacima servisa može imati maksimalno 25 znakova!<br>ispravni znakovi a..z 0..9 .+@*");

define("_SCREENTHEME", "Tema zaslona");
define("_DARKBLUE", "Tamnoplava");
define("_ORANGE", "Narančasta");
define("_PLEASEENTERRFIDLOCALLIST", "Unesite RFID lokalni popis!");

define("_DHCPSERVER", "Poslužitelj DHCP");
define("_DHCPCLIENT", "DHCP klijent");

define("_MAXDHCPADDRRANGE", "Krajnja IP adresa DHCP poslužitelja");
define("_MINDHCPADDRRANGE", "Početna IP adresa DHCP poslužitelja");

define("_MAXDHCPADDRRANGEERROR", "Krajnja IP adresa DHCP poslužitelja je obavezna!");
define("_MINDHCPADDRRANGEERROR", "Početna IP adresa DHCP poslužitelja je obavezna!");
define("_DIFFERENCEBETWEENMAXANDMINADDRRANGE", "Krajnja IP adresa DHCP poslužitelja treba biti veća od početne Ip adresa DHCP poslužitelja");
define("_IPADDRESSRANGE", "IP adresa ne može imati vrijednost između početne i krajnje IP adrese DHCP poslužitelja");

define("_CELLULARGATEWAY", "Mobilni pristupnik");
define("_INVALIDSUBNET", "IP adresa nije istinska podmreža");

define("_CONNECTIONSTATUS", "Status veze");

define("_INSTALLATIONSETTINGS", "Postavke instalacije");
define("_EARTHINGSYSTEM", "Sustav uzemljenja");
define("_CURRENTLIMITERSETTINGS", "Postavke limitatora");
define("_CURRENTLIMITERPHASE", "Faza limitatora");
define("_CURRENTLIMITERVALUE", "Vrijednost limitatora");
define("_UNBALANCEDLOADDETECTION", "Otkrivanje nebalansiranog opterećenja");
define("_EXTERNALENABLEINPUT", "Izvana aktivirani ulaz");
define("_LOCKABLECABLE", "Kabel koji se može blokirati");
define("_POWEROPTIMIZERTOTALCURRENTLIMIT", "Ukupno ograničenje struje optimizatora napajanja");
define("_POWEROPTIMIZER", "Optimizatora napajanja");
define("_TNORTT", "TN/TT");
define("_SPLITPHASE", "IT/Razdvojena faza");
define("_ONEPHASE", "Jedna faza");
define("_THREEPHASE", "Tri faze");
define("_POWEROPTIMIZERTOTALCURRENTLIMITMORETHANOREQUAL16", "Ukupno ograničenje struje <br> optimizatora napajanja mora biti veća ili jednaka 16");
define("_POWEROPTIMIZERTOTALCURRENTLIMITLESSTHANOREQUAL100", "Ukupno ograničenje struje <br> optimizatora napajanja mora biti manja ili jednaka 100");
define("_FOLLOWTHESUN", "Pratite sunce");
define("_FOLLOWTHESUNMODE", "Pratite način sunca");
define("_AUTOPHASESWITCHING", "Automatsko prebacivanje faza");
define("_MAXHYBRID", "Max hibrid");
define("_SUNONLY", "Samo sunce");
define("_SUNHYBRID", "Sunčani hibrid");

define("_DISPLAYBACKLIGHTSETTINGS", "Pozadinsko svjetlo zaslona");
define("_BACKLIGHTLEVEL", "Razina pozadinskog svjetla");
define("_SUNRISETIME", "Vrijeme izlaska sunca ");
define("_SUNSETTIME", "Vrijeme zalaska sunca");

define("_HIGH", "Visoka");
define("_MID", "Srednja");
define("_LOW", "Niska");

define("_A", " (A)");

define("_CURRENTLIMITERVALUELESSTHAN8", "* Kada je uključen EVReadySupport i faza limitatora struje je jedna faza, vrijednost limitatora struje ne smije biti manja od 8!");
define("_CURRENTLIMITERVALUELESSTHAN14", "* Kada je uključen EVReadySupport i faza limitatora struje je trofazna, vrijednost limitatora struje ne smije biti manja od 14!");

define("_LEDDIMMINGSETTINGS", "Prigušivanje LED svjetla");
define("_LEDDIMMINGLEVEL", "Razina prigušivanje LED svjetla");
define("_VERYLOW", "Jako niska");
define("_WARNINGFORLTEENABLED", "LAN interface IP setting mode will be set as static and DHCP Server will be activated.");
define("_WARNINGFORLTEDISABLED", "Način podešavanja IP sučelja LAN postavlja se na DHCP klijent, a DHCP poslužitelj će se deaktivirati.");
define("_ACCEPTQUESTION", "Prihvaćate li promjene?");

define("_CELLULARGATEWAYCONFIRM", "Veza bežičnog mrežnog pristupnika (gateway) će se deaktivirati.");

define("_ETHERNETIP", "IP Ethernet sučelja:");
define("_WLANIP", "IP WLAN sučelja:");
define("_STRENGTH", "Snaga");
define("_WIFIFREQ", "Frekvencija");
define("_WIFILEVEL", "Razina");
define("_CELLULARIP", "IP mobilnog sučelja:");
define("_CELLULAROPERCODE" , "Operater");
define("_CELLULARTECH" , "Tehnologija");
define("_SCANNETWORKS" , "Skeniraj mreže");
define("_AVAILABLENETWORKS" , "Dostupne mreže");
define("_NETWORKSTATUS" , "Status mreže");
define("_PLEASEWAITMSG" , "Molimo čekajte...");
define("_SCANNINGWIFIMSG" , "Skeniranje Wi-Fi mreža");
define("_NOWIFIFOUNDMSG" , "Nema pronađenih Wi-Fi mreža");
define("_PLEASECHECKWIFICONNMSG" , "Molimo provjerite vašu Wi-Fi vezu i pokušajte ponovno.");

define("_APPLICATIONRESTART", "Ova promjena zahtjeva ponovno pokretanje aplikacije.");

define("_QRCODE", "Prikaz QR koda");
define("_QRCODEONSCREEN", "QR kod na zaslonu");
define("_QRCODEDELIMITER", "Razdjelnik QR koda");
define("_INVALIDDELIMITERCHARACTER", "Znak razdjelnika QR koda nije valjan, razmak nije prihvatljiv, broj znakova treba biti minimalno 1, a maksimalno 3, važeći znakovi 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");

define("_LOCATION", "Mjesto");
define("_INDOOR", "Unutra");
define("_OUTDOOR", "Vani");
define("_POWEROPTIMIZEREXTERNALMETER", "Vanjsko brojilo");
define("_OPERATIONMODE", "Način rada");
define("_AUTOSELECTED", "Automatski odabrano");
define("_NOTSELECTED", "Nije odabrano");
define("_CHARGINGMODESELECTIONANDPOWEROPTIMIZERCONF", "Odabir načina punjenja i konfiguracija optimizatora napajanja");

define("_USERINTERACTION", "Interakcija korisnika");

define("_STANDBYLEDBEHAVIOUR", "Način rada LED lampice pripravnosti");
define("_OFF", "Isključeno");
define("_ON", "Uključeno");

define("_LOADSHEDDINGMINIMUMCURRENT", "Minimalna struja rasterećenja sustava");
define("_UNBALANCEDLOADDETECTIONMAXCURRENT", "Otkrivanje nebalansiranog opterećenja maksimalne jakosti struje");

define("_SCHEDULEDCHARGING", "Planirano punjenje");
define("_OFFPEAKCHARGING", "Punjenje za vrijeme niske tarife");
define("_OFFPEAKCHARGINGWEEKENDS", "Punjenje za vrijeme niske tarife tijekom vikenda");
define("_OFFPEAKCHARGINGPERIODS", "Punjenje za vrijeme razdoblja niske tarife");
define("_CONTINUECHARGINGENDPEAKINTERVAL", "Nastavite s punjenjem nakon završetka vršnog intervala");
define("_CONTINUECHARGINGWITHOUTREAUTHAFTERPOWERLOSS", "Nastavite s punjenjem bez ponovne autentifikacije nakon gubitka napajanja");



define("_RANDOMISEDDELAYMAXIMUMDURATION", "Maksimalno trajanje nasumične odgode (sekunde)");

define("_RANDOMISEDDELAYMAXIMUMDURATIONERROR", "* Maksimalno trajanje nasumične odgode je obavezno!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONBENUMERIC", "* Maksimalno trajanje nasumične odgode mora biti integral!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONLIMIT", "* Maksimalno trajanje nasumične odgode treba biti između 0 i 1800");
define("_OFFPEAKCHARGINGPERIODSERROR", "* Punjenje za vrijeme razdoblja niske tarife je obavezno!");
define("_OFFPEAKCHARGINGPERIODSSAMETIMEERROR", "* Vrijeme početka i završetka punjenja izvan najveće potrošnje ne može biti isto!");

define("_OFFPEAKCHARGINGSECONDTIMEPERIOD", "Drugo razdoblje punjenja izvan najveće potrošnje");
define("_OFFPEAKDISABLEDCONFIRM", "Punjenje za vrijeme niske tarife će se deaktivirati. Želite li potvrditi?");

define("_SHOWSERVICECONTACTINFO", "Prikaži dodatne informacije kontakt podataka servisa");
define("_EXTRASERVICECONTACTINFORMATION", "Kontakt podaci servisa prikazani su na zaslonima priključivanja kabela za punjenje, pripreme za punjenje, pokretanja i čekanja na vezu");

define("_LOADSHEDDINGSTATUS", "Status rasterećenja: ");
define("_ACTIVE", "Aktivno");
define("_INACTIVE", "Neaktivno");
define("_POWEROPTIMIZEREXTERNALMETERENABLEALERT", "Ako želite koristiti svoju opciju upravljanja opterećenjem u Modbusu,<br>prvo trebate onemogućiti Ograničenje ukupne struje optimizatora snage u dijelu „Odabir načina punjenja i konfiguracija optimizatora snage“.");
define("_MODBUSALERT", "Ako želite omogućiti svoj vanjski mjerač optimizatora snage,<br>prvo trebate deaktivirati Modbus u dijelu „Upravljanje lokalnim opterećenjem“.");
define("_POWEROPTIMIZERDLMENABLEALERT", "Ako želite koristiti opciju Upravljanja Opterećenjem u Master/Slave režimu,<br>prvo morate onemogućiti Optimizator Snage iz &#39Izbor Režima Punjenja i Konfiguracija Optimizatora Snage&#39.");
define("_DLMALERT", "Ako želite omogućiti svoj Optimizator Snage,<br>prvo morate onemogućiti Master/Slave<br>iz &#39Lokalnog Upravljanja Opterećenjem&#39.");

define("_FOLLOWTHESUNDLMENABLEALERT", "Ako želite koristiti opciju Upravljanja Opterećenjem u Master/Slave režimu,<br>prvo morate onemogućiti  Pratite sunce iz &#39Izbor Režima Punjenja i Konfiguracija Optimizatora Snage&#39.");
define("_DLMALERTFOLLOWTHESUN", "Ako želite omogućiti svoj Pratite sunce,<br>prvo morate onemogućiti Master/Slave<br>iz &#39Lokalnog Upravljanja Opterećenjem&#39.");

define("_RESETUSERPASSWORD", "Resetiranje <br> korisničke lozinke");
define("_INSTALLATIONERRORENABLEDCONFIRM", "Ako želite onemogućiti instalacijsku grešku Enable,<br>najprije trebate postaviti sustav uzemljenja iz &#39Instalacijskih postavki&#39 na IT/Split Phase.");
define("_EARTHINGSYSTEMCONFIRM", "Ako želite postaviti Sustav uzemljenja na TN/TT,<br>najprije morate omogućiti Instalacijska greška Enable iz &#39OCPP postavki&#39.");

define("_AUTHKEYMAXLIMIT", "duljina bi trebala biti maksimalno 40 znakova.");
define("_AUTHORIZATIONKEYEMPTYCONFIRM", "Polje Authorization Key je prazno.<br>Potvrđujete li promjene?");

define("_RANDOMISEDDELAYATOFFPEAKEND", "Nasumično kašnjenje na kraju izvan špice");
define("_FIFO", "FIFO");
define("_FAILSAFECURRENT", "Sigurnosna struja");
define("_FAILSAFECURRENTERROR", "Potrebna je sigurna struja!");
define("_FAILSAFECURRENTLESSTHAN0", "* Failsafe Current value ne smije biti manja od 0!");
define("_FAILSAFECURRENTMORETHAN32", "* Failsafe Current value ne smije biti veća od 32!");
define("_FAILSAFECURRENTMORETHAN50", "* Vrijednost Failsafe Current ne smije biti veća od 50!");

define("_LOCALCHARGESESSION", "Lokalne naplate sesija");
define("_ROWNUMBER", "Broj reda");
define("_SESSIONUUID", "díj ID");
define("_AUTHORIZATIONUID", "RFID kod");
define("_STARTTIME", "Vrijeme početka");
define("_STOPTIME", "Vrijeme zaustavljanja");
define("_TOTALTIME", "Ukupnovrijeme");
define("_STATUS", "Status");
define("_CHARGEPOINTIDS", "Broj utičnice");
define("_INITIALENERGY", "Početna energija(kWh)");
define("_LASTENERGY", "Posljednja energija(kWh)");
define("_TOTALENERGY", "Ukupna energija(kWh)");
define("_DOWNLOADLOCALCHARGESESSIONLOGS", "Cijeli zapisnik sesije u CSV-u");
define("_DOWNLOADFULLSESSIONLOGS", "Zapisnik sažetka u CSV-u");
define("_STARTDATE", "početni datum");
define("_ENDDATE", "datum završetka");
define("_RFIDSELECTION", "RFID iğzbor");
define("_CLEAR", "čisto");

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

define("_LISTOFSLAVES", "Popis robova");
define("_NUMBEROFSLAVES", "Broj robova");
define("_LISTOFCONNECTOR", "Popis konektora");
define("_AVAILABLECURRENT", "Dostupna trenutna faza");

define("_DLMINTERFACE", "DLM sučelje");
define("_ETHERNET", "Ethernet");
define("_DLMINTERFACEERROR", "Omogući WiFi s mrežnih sučelja!");

define("_MUSTBEINTEGER", "mora biti cijeli broj!");
define("_GRIDBUFFER", "Postotak margine zaštite mreže");
define("_CHARGINGSTATUSALERT", "U statusu punjenja, vrijednost se ne može ažurirati!");
define("_READUNDERSTAND", "Pročitao sam, razumijem");

define("_MORETHAN10", "Morate povećati maksimalnu struju mreže ili smanjiti postotak granične zaštite mreže prije spremanja ovih postavki. Ograničenje maksimalne struje mreže ne može biti niže od 10A kada se koristi postotak granične zaštite mreže.");

define("_CLUSTERMAXCURRENT", "Maksimalna struja klastera");
define("_CLUSTERFAILSAFECURRENT", "Sigurna struja klastera");
define("_CLUSTERMAXCURRENTERROR", "Potrebna je maksimalna struja klastera!");
define("_CLUSTERFAILSAFECURRENTERROR", "Potrebna je struja sigurnosti klastera!");
define("_CLUSTERFAILSAFECURRENTLESSTHAN0", "Trenutna vrijednost klastera Failsafe ne smije biti manja od 0!");
define("_CLUSTERFAILSAFECURRENTMORETHAN", "Vrijednost struje bez greške klastera mora biti manja od maksimalne struje mreže!");
define("_CLUSTERFAILSAFE", "Kluster Failsafe Mode");

define("_CLUSTERMAXCURRENTLESSTHAN10", "Maksimalna trenutna vrijednost klastera ne smije biti manja od 10");
define("_CLUSTERMAXCURRENTMORETHAN", "Maksimalna trenutna vrijednost klastera mora biti jednaka ili manja od ove vrijednosti:");