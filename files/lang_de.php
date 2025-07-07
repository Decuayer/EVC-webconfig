<?php
include_once "access_control.php";
define("_LOGIN", "ANMELDEN");
define("_USERNAME", "Benutzername:");
define("_PASSWORD", "Passwort:");
define("_CHANGEPASSWORD", "PASSWORT ÄNDERN");
define("_CURRENTPASSWORD", "Aktuelles Passwort:");
define("_NEWPASSWORD", "Neues Passwort:");
define("_CONFIRMNEWPASSWORD", "Neues Passwort bestätigen :");
define("_SUBMIT", "Senden");
define("_CURRENTPASSWORDREQUIRED", "Aktuelles Passwort ist erforderlich");
define("_PASSWORDREQUIRED", "Passwort ist erforderlich");
define("_USERNAMEREQUIRED", "Benutzername ist erforderlich");
define("_USERAUTHFAILED", "Benutzer-Authentifizierung fehlgeschlagen!!");
define("_USERNAMEORCURRENTPASSWORDWRONG", "Benutzername oder aktuelles Passwort ist falsch!");
define("_DBACCESSFAILURE", "Der Zugriff auf die Datenbank ist nicht möglich!");
define("_CHANGEPASSWORDERROR", "Bitte ändern Sie zunächst Ihr Passwort!");
define("_SAMEPASSWORDERROR", "Aktuelles und neues Passwort sollten sich voneinander unterscheiden!!");
define("_PASSWORDMATCHERROR", "Passwörter stimmen nicht überein!");
define("_CURRENTPASSWORDWRONG", "Aktuelles Passwort ist falsch!");
define("_PASSWORDERRORLEVEL2", "Passwort ist ungültig, Zeichenlänge muss 20 sein und mindestens zwei Buchstaben [A-Za-z], zwei Ziffern [0-9] und zwei Sonderzeichen enthalten [!%&/()=?*#+-_]");
define("_PASSWORDERRORLEVEL3", "Das Passwort ist ungültig, die Zeichenlänge muss mindestens 12, maximal 32 Zeichen betragen und enthält mindestens zwei Kleinbuchstaben [a-z] und zwei Großbuchstaben [A-Z], zwei Zahlen [0-9] und mindestens zwei Sonderzeichen [!%&/()=?*#+-_].");
define("_LOGINLOCKOUT", "Zu viele Fehlschläge. Bitte versuchen Sie es nach 1800 Sekunden.");

define("_MAINPAGE", "Hauptseite");
define("_GENERAL", "Allgemeine Einstellungen");
define("_OCPPSETTINGS", "OCPP-Einstellungen ");
define("_NETWORKINTERFACES", "Netzwerk-Schnittstellen");

define("_OCPPCONNINTERFACE", "OCPP-Verbindungsschnittstelle: ");
define("_CONNECTIONSTATE", "Verbindungszustand  : ");
define("_DISCONNECTED", "Nicht verbunden");
define("_NEEDTOLOGINFIRST", "Bitte melden Sie sich zunächst an!");
define("_CONNECTED", "Verbunden");
define("_CPSERIALNUMBER", "CP Seriennummer : ");
define("_HMISOFTWAREVERSION", "HMI Softwarestand : ");
define("_OCPPSOFTWAREVERSION", "OCPP Softwarestand : ");
define("_POWERBOARDSOFTWAREVERSION", "Leistungsplatine Softwarestand : ");
define("_OCPPDEVICEID", "OCPP Geräte-ID : ");
define("_DURATIONAFTERPOWERON", "Dauer nach dem Einschalten : ");
define("_LOGOUT", "Ausloggen");
define("_PRESET", "Voreinstellungen:");

define("_OCPPCONNECTION", "OCPP Verbindung");
define("_ENABLED", "Aktiviert");
define("_DISABLED", "Deaktiviert");
define("_CONNECTIONSETTINGS", "Verbindungseinstellungen");
define("_CENTRALSYSTEMADDRESS", "Zentrale Systemadresse ");
define("_CHARGEPOINTID", "Ladepunkt-ID ");
define("_OCPPVERSION", "OCPP Version");
define("_SAVE", "Speichern");
define("_SAVESUCCESSFUL", "Erfolgreich gespeichert.");
define("_CENTRALSYSTEMADDRESSERROR", "Zentrale Systemadresse ist erforderlich!");
define("_CHARGEPOINTIDERROR", "Ladepunkt-ID ist erforderlich!");
define("_SECONDS", "Sekunden");
define("_ADD", "Hinzufügen");
define("_REMOVE", "Entfernen");
define("_SAVECAPITAL", "SPEICHERN");
define("_CANCEL", "Abbrechen");

define("_CELLULAR", "Mobilfunk");
define("_INTERFACEIPADDRESS", "IP-Adresse der Schnittstelle: ");
define("_ICCID", "ICCID: ");
define("_IMSI", "IMSI: ");
define("_IMEI", "IMEI: ");
define("_APNNAME", "APN Name: ");
define("_APNUSERNAME", "APN Benutzername: ");
define("_APNPASSWORD", "APN Passwort: ");
define("_IPSETTING", "IP-Einstellung: ");
define("_IPADDRESS", "IP-Adresse: ");
define("_NETWORKMASK", "Subnetzmaske/ Netzwerkmaske : ");
define("_DEFAULTGATEWAY", "Standardgateway: ");
define("_PRIMARYDNS", "Primärer DNS-Server: ");
define("_SECONDARYDNS", "Sekundärer DNS-Server: ");
define("_WIFI", "WLAN");
define("_SECURITY", "Sicherheit: ");
define("_SECURITYTYPE", "Sicherheits-Typ wählen ");
define("_NONE", "Keine");
define("_SELECTMODE", "Bitte Modus auswählen!");
define("_RFIDLOCALLIST", "Liste lokaler RFID-Karten");
define("_ACCEPTALLRFIDS", "Alle RFID-Karten akzeptieren");
define("_MANAGERFIDLOCALLIST", "Lokale RFID-Karten verwalten:");
define("_AUTOSTART", "Auto-Start");
define("_PROCESSING", "Wird verarbeitet ... Bitte warten");
define("_MACADDRESS", "MAC-Adresse: ");
define("_WIFIHOTSPOT", "WLAN-Hotspot");
define("_TURNONDURINGBOOT", "Beim Booten einschalten: ");
define("_AUTOTURNOFFTIMEOUT", "Zeitüberschreitung beim automatischen Ausschalten: ");
define("_AUTOTURNOFF", "Automatische Abschaltung: ");
define("_HOTSPOTALERTMESSAGE", "Änderungen der Hotspot-Einstellungen werden beim nächsten Einschalten des Geräts wirksam. ");
define("_HOTSPOTREBOOTMESSAGE", "Möchten Sie jetzt neu starten? ");

define("_DOWNLOADACLOGS", "AC-Protokolle herunterladen");
define("_DOWNLOADCELLULARLOGS", "Herunterladen von Mobilfunk-Protokollen");
define("_DOWNLOADPOWERBOARDLOGS", "Herunterladen Protokolle Leistungsplatine  ");
define("_PASSWORDRESETSUCCESSFUL", "Ihr Passwort wurde erfolgreich geändert.");
define("_DBOPENEDSUCCESSFULLY", "Datenbank erfolgreich geöffnet\n");
define("_WSSCERTSSETTINGS", "WSS Zertifikatseinstellungen ");
define("_CONFKEYS", "Konfigurationsschlüssel");
define("_KEY", "Schlüssel");
define("_STATIC", "Statisch");
define("_TIMEZONE", "Zeitzone");
define("_PLEASESELECTTIMEZONE", "Bitte Zeitzone wählen");
define("_DISPLAYSETTINGS", "Anzeigeeinstellungen");
define("_DISPLAYLANGUAGE", "Anzeigesprache");
define("_BACKLIGHTDIMMING", " Hintergrundbeleuchtung : ");
define("_PLEASESELECT", "Bitte wählen");
define("_TIMEBASED", "zeitbasierte");
define("_SENSORBASED", "sensorbasierte");
define("_BACKLIGHTDIMMINGLEVEL", "Level  Hintergrundbeleuchtung : ");
define("_BACKLIGHTTHRESHOLD", "Schwellenwert für Hintergrundbeleuchtung  : ");
define("_SETMIDTHRESHOLD", "SetMid Schwellenwert");
define("_SETHIGHTHRESHOLD", "SetHigh Schwellenwert");
define("_LOCALLOADMANAGEMENT", "Lokales Lastmanagement");
define("_MINIMUMCURRENT", "Mindeststromstärke: ");
define("_FIFOPERCENTAGE", "FIFO-Prozentsatz: ");
define("_GRIDMAXCURRENT", "Netz Höchststrom: ");
define("_MASTERIPADDRESS", "Haupt-IP-Adresse: ");
define("_BACKLIGHTTIMESETTINGS", "Einstellungen der Hintergrundbeleuchtungszeit: ");
define("_SHOULDSELECTTIMEZONE", "* Bitte wählen Sie die Zeitzone aus!");
define("_MINIMUMCURRENTREQUIRED", "* Mindeststrom ist erforderlich!");
define("_CURRENTMUSTBENUMERIC", "* Wert muss numerisch sein!");
define("_FIFOPERCREQUIRED", "* FIFO-Prozentsatz ist erforderlich!");
define("_FIFOPERCSHOULDBETWEEN", "* Der FIFO-Prozentsatz muss zwischen 0 und 100 liegen!");
define("_PERCMUSTBENUMERIC", "* Wert muss numerisch sein! ");
define("_GRIDMAXCURRENTREQUIRED", "* Max Netzanschlussstrom ist erforderlich ");
define("_GRIDCURRENTMUSTBENUMERIC", "* Wert muss numerisch sein!");
define("_IPADDRESSOFMASTERREQUIRED", "* Wert muss numerisch sein!");
define("_INVALIDIPADDRESS", "* Sie haben eine ungültige IP-Adresse eingegeben!");
define("_SAMENETWORKLAN", "* Sie haben im selben Netzwerk wie LAN eine IP-Adresse eingegeben!");
define("_SAMENETWORKWLAN", "* Sie haben im selben Netzwerk wie WLAN eine IP-Adresse eingegeben!");
define("_APNISREQUIRED", "APN ist erforderlich! ");
define("_IPADDRESSREQUIRED", "IP-Adresse ist erforderlich!");
define("_NETWORKMASKREQUIRED", "Netzwerk-Maske ist erforderlich!");
define("_INVALIDNETWORKMASK", "* Sie haben eine ungültige Netzwerk-Maske eingegeben!");
define("_DEFAULTGATEWAYREQUIRED", "Standard-Gateway ist erforderlich!");
define("_INVALIDGATEWAY", "Sie haben eine ungültige Standard-Gateway eingegeben!");
define("_PRIMARYDNSREQUIRED", "Primäre DNS ist erforderlich!");
define("_INVALIDDNS", "Sie haben eine ungültige DNS eingegeben!");
define("_SELECTIPSETTING", "Bitte wählen Sie die IP-Einstellung.");
define("_SSIDREQUIRED", "SSID ist erforderlich!");
define("_PASSWORDISREQUIRED", "Passwort ist erforderlich! ");
define("_WIFIPASSWORDERROR", "Passwort ist ungültig, die Zeichenlänge muss mindestens 8 und maximal 63 betragen <br> gültige Zeichen a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL2", "&#8226; Das Passwort ist ungültig, die Zeichenlänge muss 20 betragen,<br>&#8226; Das Passwort muss mindestens zwei Buchstaben enthalten [A-Za-z],<br>&#8226; Passwort muss mindestens zwei Ziffern enthalten [0-9],<br>&#8226; Das Passwort muss mindestens zwei Sonderzeichen enthalten [!%&/()=?*#+-_]");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL3", "&#8226; Passwort ist ungültig, Zeichenlänge muss mindestens 12, maximal 32 betragen,<br>&#8226; Das Passwort muss mindestens zwei Kleinbuchstaben enthalten [a-z], <br>&#8226; Das Passwort muss mindestens zwei Großbuchstaben enthalten [A-Z], <br>&#8226; Passwort muss mindestens zwei Ziffern enthalten [0-9],<br>&#8226; Das Passwort muss mindestens zwei Sonderzeichen enthalten [!%&/()=?*#+-_]");
define("_WIFISSIDERROR", "SSID ist ungültig, gültige Zeichen a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_SELECTSECURITYTYPE", "Bitte Sicherheitstyp auswählen");
define("_HOSTIPREQUIRED", "* Host-IP ist erforderlich!");
define("_CERTMANREQUIRED", "* Zertifizierungsmanagement ist erforderlich!");
define("_OCPPENABLEALERT", "Wenn Sie Ihre Ladestation im Standalone-Modus verwenden möchten,<br> müssen Sie im Menü \"OCPP-Einstellungen\"<br>die \"Voreinstellung\" auf \"Standalone\" setzen.");
define("_NOTSAVEDALERT", "Seite wurde nicht gespeichert..");
define("_SAVEQUESTION", "Möchten Sie die Änderungen speichern?");
define("_OKBUTTON", "OK");
define("_LTECONNECTIONCONFIRM", "Die Mobilfunkverbindung wird deaktiviert. Bestätigen?");
define("_WIFICONNECTIONCONFIRM", "Die WLAN-Verbindung wird deaktiviert. Bestätigen?");
define("_DHCPSERVERCONNECTIONCONFIRM", "Wenn Sie den LAN-DHCP-Server aktivieren möchten,<br>müssen Sie zuerst den WLAN-Hotspot unter &#39WLAN-Hotspot&#39 deaktivieren.");
define("_WIFIHOTSPOTCONNECTIONCONFIRM", "Wenn Sie den WLAN-Hotspot aktivieren möchten,<br>müssen Sie zuerst den LAN-DHCP-Server unter &#39LAN-IP-Einstellung&#39 deaktivieren.");

define("_DYNAMIC", "Dynamisch");
define("_DIAGNOSTICS", "Diagnostik");
define("_LOCALLOAD", "Lokales Lastmanagement");
define("_DOWNLOAD", "Herunterladen");
define("_STARTDATE", "Startdatum");
define("_ENDDATE", "Enddatum");
define("_CLEAREVENTLOGS", "Alle Ereignisprotokolle löschen");
define("_CLEAREVENTLOGSINFO", "Dies löscht alle Ereignisprotokolle!");
define("_DOWNLOADEVENTLOGSINFO", "Laden Sie Geräteereignisprotokolle für maximal 5 Tage herunter");
define("_DEVICEEVENTLOGS", "Geräteereignisprotokolle");
define("_DEVICECHANGELOGS", "Gerätesänderungsprotokolle");
define("_LOGSDATEERROR", "Bitte wählen Sie Daten für maximal 5 Tage.");
define("_DOWNLOACHANGELOGS", "Gerätesänderungsprotokolle herunterladen");
define("_VPNFUNCTIONALITY", "VPN-Funktionalität: ");
define("_CERTMANAGEMENT", "Zertifizierungsmanagement: ");
define("_NAME", "Name: ");
define("_CONNECTIONINTERFACE", "Verbindungs-Schnittstelle ");
define("_ANY", "Alle");
define("_OCPPCONNPARAMETERS", "OCPP Konfigurationsparameter");
define("_SETDEFAULT", "Auf Standardwerte setzen  ");
define("_STANDALONEMODE", "Standalone Modus");
define("_STANDALONEMODETITLE", "Standalone Modus:");
define("_STANDALONEMODENOTSELECTED", "* Standalone Modus kann nicht ausgewählt werden, da OCPP aktiviert ist.");
define("_CHARGERWEBUI", "Web-Benutzeroberfläche des Ladegeräts");
define("_SYSTEMMAINTENANCE", "Systemwartung");
define("_HOSTIP", "Host-IP: ");
define("_PASSWORDERRORLEVEL1", "Passwort ist ungültig, Zeichenlänge muss mindestens 6 Zeichen betragen und mindestens 1 Kleinbuchstaben, 1 Großbuchstaben und 1 Ziffer enthalten!");
define("_SELECTBACKLIGHTDIMMING", "* Sie müssen das Dimmen der Hintergrundbeleuchtung wählen!");
define("_ISREQUIRED", "ist erforderlich!");
define("_ISNOTVALID", "ist ungültig!");
define("_ISDUPLICATED", "ist dupliziert!");
define("_MUSTBENUMERIC", "muss numerisch sein!");
define("_VPNFUNCTIONALITYREQUIRED", "* VPN-Funktionalität ist erforderlich!");
define("_VPNNAMEREQUIRED", "* VPN-Name ist erforderlich!");
define("_VPNPASSWORDREQUIRED", "* VPN-Passwort ist erforderlich!");
define("_EXPLANATION", "Kennzeichnet ein Pflichtfeld.");
define("_FIRMWAREUPDATE", "Firmware-Aktualisierungen");
define("_BACKUPRESTORE", "Sicherung und Wiederherstellung der Konfiguration");
define("_SYSTEMRESET", "System zurücksetzen");
define("_CHANGEADMINPASSWORD", "Passwort zur Verwaltung");
define("_FACTORYRESET", "Werkseinstellungen");
define("_FACTORYRESETBUTTON", "Zurück auf Werkseinstellungen");
define("_FACTORYDEFAULTCONFIGURATION", "Werkseitige Standardkonfiguration");
define("_LOGFILES", "Protokoll-Dateien");
define("_BACKUPFILE", "Sicherungsdatei");
define("_RESTOREFILE", "Konfig-Datei wiederherstellen");
define("_FREEMODEMAXCHARACTER", "darf maximal 32 Zeichen lang sein!");
define("_RESTOREMESSAGE", "Bestätigen Sie, die Änderungen zu übernehmen und jetzt neu zu starten?");

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

define("_PASSWORDTYPEEXPLANATION", "Ihr Passwort muss 6 Zeichen lang sein und mindestens einen Großbuchstaben
, einen Kleinbuchstaben und eine Ziffer enthalten.");
define("_PASSWORDTYPEEXPLANATIONLEVEL2", "Ihr Passwort muss 20 Zeichen lang sein und enthält mindestens zwei Buchstaben,
zwei Ziffern und zwei Sonderzeichen.");
define("_PASSWORDTYPEEXPLANATIONLEVEL3", "Ihr Passwort muss mindestens 12, maximal 32 Zeichen lang sein und mindestens zwei Großbuchstaben,
zwei Kleinbuchstaben, zwei Ziffern und zwei Sonderzeichen enthalten.");

define("_BACKTOLOGIN", "Zurück zum Login");
define("_CHANGE", "PASSWORT ÄNDERN");
define("_SYSTEMADMINISTRATION", "Systemverwaltung");
define("_UPDATE", "Aktualisierung");
define("_CONFIRM", "Bestätigen");
define("_FACTORYDEFAULTCONFIRM", "Sind Sie sicher, dass Sie auf die Werkseinstellungen zurücksetzen wollen?");
define("_FILENAME", "Dateiname");
define("_UPLOAD", "Hochladen");
define("_SELECTFIRMWARE", "Firmware-Update-Datei vom PC auswählen");
define("_FIRMWAREFILESIZE", "Bitte überprüfen Sie die Größe der Firmware-Datei.");
define("_FIRMWAREFILETYPE", "Bitte überprüfen Sie den Typ der Firmware-Datei.");

define("_LESSTHANOREQUAL4", "muss zwischen 1 und 4 liegen");
define("_LESSTHANOREQUAL20", "muss kleiner oder gleich 20 sein");
define("_LESSTHANOREQUAL65000", "muss kleiner oder gleich 65000 sein");
define("_LESSTHANOREQUAL300", "muss kleiner oder gleich 300 sein");
define("_LESSTHANOREQUAL86500", "muss kleiner oder gleich 86500 sein");
define("_LESSTHANOREQUAL10000", "muss kleiner oder gleich 10000 sein");
define("_LESSTHANOREQUAL22", "muss kleiner oder gleich 22 sein");
define("_LESSTHANOREQUAL10", "muss kleiner oder gleich 10 sein");
define("_LESSTHANOREQUAL600", "muss kleiner oder gleich 600 sein");
define("_LESSTHANOREQUAL120", "muss kleiner oder gleich 120 sein");
define("_HIGHTHANOREQUAL0", "muss größer oder gleich 0 sein");
define("_CHANGEPASSWORDSUGGESTION", "Wir empfehlen Ihnen, Ihr Standardpasswort im Systemwartungsmenü zu ändern");

define("_FILESIZE", "Bitte überprüfen Sie die Größe der Datei.");
define("_FILETYPE", "Bitte überprüfen Sie die Typ der Datei.");

define("_BACKUPVERSIONCHECK", "Die Version dieser Datei ist für das Gerät nicht geeignet.");
define("_HARDRESETCONFIRM", "Sind Sie sicher, dass Sie das Zurücksetzen erzwingen (hard reset) wollen?");
define("_SOFTRESETCONFIRM", "Sind Sie sicher, dass Sie das Gerät zurücksetzen wollen?");
define("_NEWSETUP", "Bitte verwenden Sie für die neue Einrichtung das Benutzerhandbuch.");

define("_LOADMANAGEMENT", "Lastmanagement");
define("_CPROLE", "Cp Funktion");
define("_GRIDSETTINGS", "Netzeinstellungen");
define("_LOADMANAGEMENTMODE", "Lastmanagement Modus");
define("_LOADMANAGEMENTGROUP", "Lastmanagement Gruppe");
define("_LOADMANAGEMENTOPTION", "Lastmanagement Option");

define("_ALARMS", "Benachrichtigungen");

define("_LOGOSETTINGS", "Logo Einstellungen");
define("_USELOGO", "Wählen Sie die Bilddatei vom PC aus");
define("_LOGOTYPE", "Bitte wählen Sie ein Bild im PNG-Format.");
define("_LOGODIMENSION", "Die maximal zulässige Bildgröße beträgt 80 x 80, <br> bitte wählen Sie ein Logo mit der entsprechenden Größe aus.");

define("_SERVICECONTACTINFO", "Service-Kontaktinformationen anzeigen");
define("_SERVICECONTACTINFOCHARACTER", "Die Kontaktinformationen dürfen maximal 25 Zeichen lang sein!<br>Gültige Zeichen a..z 0..9 .+@*");

define("_SCREENTHEME", "Bildschirmgestaltung");
define("_DARKBLUE", "Dunkelblau");
define("_ORANGE", "Orange");
define("_PLEASEENTERRFIDLOCALLIST", "Bitte geben Sie die Liste lokaler RFID-Karten ein!");

define("_MASTER", "Master");
define("_SLAVE", "Slave");
define("_TOTALCURRENTLIMIT", "Maximal Strom je Phase");
define("_SUPPLYTYPE", "Versorgungstyp");
define("_FIFOPERCANTAGE", "FIFO Percentage");
define("_TIC", "TIC");
define("_EQUALLYSHARED", "gleichmäßig verteilt");
define("_COMBINED", "Kombiniert");
define("_TOTALCURRENTLIMITERROR", "Maximalstrom pro Phase ist erforderlich!");
define("_LESSTHAN1024", "muss weniger als 1024 sein");
define("_ATLEAST0","muss mindestens 0 sein");
define("_MORETHAN12", "muss mehr als 12 sein");
define("_CHOOSEONE", "Bitte wählen Sie eine");
define("_SLAVEMINCHCURRENT", "Einstellung des Offline-Failsafe-Ladestroms im DLM Szenario");
define("_SERIALNO", "Seriennummer");
define("_CONNECTORSTATE", "Verbindungsstatus");
define("_NUMBEROFPHASES", "Anzahl der Phasen");
define("_PHASECONSEQUENCE", "Phasenverbindungssequenz");
define("_VIP", "VIP-Laden");
define("_CPMODE", "CP Mode");
define("_VIPERROR", "VIP-Laden erforderlich");
define("_PHASECONSEQUENCEERROR", "Phasenverbindungssequenz ist erforderlich!");
define("_CPMODEERROR", "CP-Modus ist erforderlich!");
define("_SUPPORTEDCURRENT", "Unterstützter Strom");
define("_INSTANTCURPERPHASE", "Aktueller Stromwert pro Phase");
define("_FIFOCHARGINGPERCENTAGE", "FIFO-Ladeprozentsatz");
define("_MINIMUMCURRENT1P", "Minimaler Ladestrom 1-phasig");
define("_MINIMUMCURRENT3P", "Minimaler Ladestrom 3-phasig");
define("_MAXIMUMCURRENT", "Maximaler Ladestrom");
define("_STEP", "Schritt");
define("_UPDATEDLMGROUP", "dynamische Lastmanagementgruppe aktualisieren");
define("_MAINCIRCUITCURRENT", "Maximaler Netzstrom");
define("_MAINCIRCUITCURRENTERROR", "Maximaler Netzstrom ist erforderlich!");
define("_DLMMAXCURRENT", "DLM-Gesamtstrombegrenzung pro Phase");
define("_DLMMAXCURRENTERROR", "DLM-Gesamtstrombegrenzung pro Phase ist erforderlich!");
define("_DLMMAXCURRENTMORETHANMAIN", "Die DLM-Gesamtstromgrenze sollte mehr als die Hälfte des Hauptleistungsschalterstroms betragen");
define("_DLMMAXCURRENTLESSTHANMAIN", "Die DLM-Gesamtstromgrenze sollte geringer sein als der Strom des Hauptleistungsschalters");

define("_DHCPSERVER", "DHCP-Server");
define("_DHCPCLIENT", "DHCP-Client");

define("_MAXDHCPADDRRANGE", "DHCP-Server-End-IP-Adresse");
define("_MINDHCPADDRRANGE", "DHCP-Server-Start-IP-Adresse");

define("_MAXDHCPADDRRANGEERROR", "Die End-IP-Adresse des DHCP-Servers ist erforderlich!");
define("_MINDHCPADDRRANGEERROR", "Die Start-IP-Adresse des DHCP-Servers ist erforderlich!");
define("_DIFFERENCEBETWEENMAXANDMINADDRRANGE", "DHCP-Server-End-IP-Adresse sollte größer sein als die DHCP-Server-Start-IP-Adresse");
define("_IPADDRESSRANGE", "Die IP-Adresse kann keinen Wert zwischen den Start- und End-IP-Adressen des DHCP-Servers annehmen");
define("_INVALIDSUBNET", "IP-Adresse befindet sich nicht im Subnetz");
define("_CELLULARGATEWAY", "Mobilfunk-Gateway");
define("_CONNECTIONSTATUS", "Verbindingsstatus");

define("_INSTALLATIONSETTINGS", "Installations-Einstellungen");
define("_EARTHINGSYSTEM", "Erdungssystem");
define("_CURRENTLIMITERSETTINGS", "Aktuelle Begrenzereinstellungen");
define("_CURRENTLIMITERPHASE", "Strombegrenzerphase");
define("_CURRENTLIMITERVALUE", "Strombegrenzungswert");
define("_UNBALANCEDLOADDETECTION", "Schieflasterkennung");
define("_EXTERNALENABLEINPUT", "Externer Freigabeeingang");
define("_LOCKABLECABLE", "Abschließbares Kabel");
define("_POWEROPTIMIZERTOTALCURRENTLIMIT", "Gesamtstromgrenze des Leistungsoptimierers");
define("_POWEROPTIMIZER", "Leistungsoptimierers");
define("_TNORTT", "TN/TT");
define("_SPLITPHASE", "IT/Split Phase");
define("_ONEPHASE", "Eine Phase");
define("_THREEPHASE", "Drei Phasen");
define("_POWEROPTIMIZERTOTALCURRENTLIMITMORETHANOREQUAL16", "Die Gesamtstrombegrenzung <br> des Leistungsoptimierers muss <br> größer oder gleich 16 sein");
define("_POWEROPTIMIZERTOTALCURRENTLIMITLESSTHANOREQUAL100", "Die Gesamtstromgrenze <br> des Leistungsoptimierers muss <br> kleiner oder gleich 100 sein");
define("_FOLLOWTHESUN", "Folge der Sonne");
define("_FOLLOWTHESUNMODE", "Folgen Sie dem Sonnenmodus");
define("_AUTOPHASESWITCHING", "Automatische Phasenumschaltung");
define("_MAXHYBRID", "Max-Hybrid");
define("_SUNONLY", "Nur Sonne");
define("_SUNHYBRID", "Sonnenhybrid");

define("_DISPLAYBACKLIGHTSETTINGS", "Einstellung der Bildschirmhintergrundbeleuchtung");
define("_BACKLIGHTLEVEL", "Hintergrundbeleuchtung");
define("_SUNRISETIME", "Zeitpunkt Sonnenaufgang ");
define("_SUNSETTIME", "Zeitpunkt Sonnenuntergang");

define("_HIGH", "Hoch");
define("_MID", "Mittel");
define("_LOW", "Niedrig");

define("_A", " (A)");

define("_CURRENTLIMITERVALUELESSTHAN8", "* Wenn EVReadySupport eingeschaltet ist und die Strombegrenzungsphase eine Phase ist, darf der Strombegrenzungswert nicht kleiner als 8 sein!");
define("_CURRENTLIMITERVALUELESSTHAN14", "* Wenn EVReadySupport eingeschaltet ist und die Phase des Strombegrenzers dreiphasig ist, darf der Wert des Strombegrenzers nicht kleiner als 14 sein!");
define("_LEDDIMMINGSETTINGS", "LED-Dimmeinstellungen");
define("_LEDDIMMINGLEVEL", "LED-Verdunkelungsstufe");
define("_VERYLOW", "Sehr niedrig");
define("_WARNINGFORLTEENABLED", "Der IP-Einstellungsmodus der LAN-Schnittstelle wird als statisch festgelegt und der DHCP-Server wird aktiviert.");
define("_WARNINGFORLTEDISABLED", "Der IP-Einstellungsmodus der LAN-Schnittstelle wird als DHCP-Client festgelegt und der DHCP-Server wird deaktiviert.");
define("_ACCEPTQUESTION", "Akzeptieren Sie die Änderungen?");

define("_CELLULARGATEWAYCONFIRM", "Der Mobilfunk-Gateway wird deaktiviert. Möchten Sie bestätigen?");

define("_ETHERNETIP", "Ethernet-Schnittstellen-IP:");
define("_WLANIP", "WLAN-Schnittstellen-IP:");
define("_STRENGTH", "Stärke");
define("_WIFIFREQ", "Frequenz");
define("_WIFILEVEL", "Ebene");
define("_CELLULARIP", "Mobilfunk-Schnittstellen-IP:");
define("_CELLULAROPERCODE" , "Operator");
define("_CELLULARTECH" , "Technologie");
define("_SCANNETWORKS" , "Netzwerke scannen");
define("_AVAILABLENETWORKS" , "Verfügbare Netzwerke");
define("_NETWORKSTATUS" , "Netzwerkstatus");
define("_PLEASEWAITMSG" , "Bitte warten...");
define("_SCANNINGWIFIMSG" , "Wi-Fi-Netzwerke werden gescannt");
define("_NOWIFIFOUNDMSG" , "Keine Wi-Fi-Netzwerke gefunden");
define("_PLEASECHECKWIFICONNMSG" , "Bitte überprüfen Sie Ihre Wi-Fi-Verbindung und versuchen Sie es erneut.");

define("_APPLICATIONRESTART", "Diese Änderung erfordert einen Neustart der Anwendung.");
define("_POWEROPTIMIZEREXTERNALMETER", "Externer Zähler");
define("_OPERATIONMODE", "Betriebsmodus");
define("_AUTOSELECTED", "Automatisch ausgewählt");
define("_NOTSELECTED", "Nicht ausgewählt");
define("_CHARGINGMODESELECTIONANDPOWEROPTIMIZERCONF", "Auswahl des Lademodus und Konfiguration des Leistungsoptimierers");

define("_USERINTERACTION", "Benutzerinteraktion");
define("_STANDBYLEDBEHAVIOUR", "Standby-LED-Verhalten");
define("_OFF", "Aus");
define("_ON", "An");
define("_QRCODE", "QR-Code anzeigen");
define("_QRCODEONSCREEN", "QR-Code auf dem Bildschirm");
define("_QRCODEDELIMITER", "QR-Code-Trennzeichen");
define("_INVALIDDELIMITERCHARACTER", "QR-Code-Trennzeichen ist ungültig, Leerzeichen sind nicht akzeptabel, Zeichenlänge muss mindestens 1 und maximal 3, gültige Zeichen 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");

define("_LOCATION", "Standort");
define("_INDOOR", "Innen");
define("_OUTDOOR", "Draussen");

define("_LOADSHEDDINGMINIMUMCURRENT", "Mindeststrom für Lastabwurf");
define("_UNBALANCEDLOADDETECTIONMAXCURRENT", "Unsymmetrische Lasterkennung Max. Strom");

define("_SCHEDULEDCHARGING", "Geplantes Laden");
define("_OFFPEAKCHARGING", "Off-Peak-Laden");
define("_OFFPEAKCHARGINGWEEKENDS", "Off-Peak-Ladewochenenden");
define("_OFFPEAKCHARGINGPERIODS", "Ladezeiten außerhalb der Spitzenzeiten");
define("_CONTINUECHARGINGENDPEAKINTERVAL", "Fortsetzen des Ladevorgangs nach Ende des Spitzenintervalls");
define("_CONTINUECHARGINGWITHOUTREAUTHAFTERPOWERLOSS", "Weiterladen ohne erneute Authentifizierung nach Stromausfall");



define("_RANDOMISEDDELAYMAXIMUMDURATION", "Randomisierte Verzögerung Maximale <br> Dauer (Sekunden)");

define("_RANDOMISEDDELAYMAXIMUMDURATIONERROR", "* Maximale Dauer der randomisierten Verzögerung erforderlich!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONBENUMERIC", "* Maximale Dauer der randomisierten Verzögerung muss ganzzahlig sein!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONLIMIT", "* Randomized Delay Maximum Duration sollte zwischen 0 und 1800 liegen");
define("_OFFPEAKCHARGINGPERIODSERROR", "* Off-Peak-Ladezeiten sind erforderlich!");
define("_OFFPEAKCHARGINGPERIODSSAMETIMEERROR", "*Start- und Endzeit des Off-Peak-Ladevorgangs dürfen nicht identisch sein!");
define("_OFFPEAKCHARGINGSECONDTIMEPERIOD", "Zweiter Zeitraum für Laden außerhalb der Spitzenzeiten");
define("_OFFPEAKDISABLEDCONFIRM", "Das Laden außerhalb der Spitzenzeiten wird deaktiviert. Bestätigen?");
define("_SHOWSERVICECONTACTINFO", "Zusätzliche Service-Kontaktinformationen anzeigen");
define("_EXTRASERVICECONTACTINFORMATION", "Service-Kontaktinformationen werden auf den Bildschirmen „Ladekabel anschließen“, „Aufladen vorbereiten“, „Initialisieren“ und „Warten auf Verbindung“ angezeigt");

define("_LOADSHEDDINGSTATUS", "Lastabwurfstatus: ");
define("_ACTIVE", "Aktiv");
define("_INACTIVE", "Inaktiv");
define("_POWEROPTIMIZEREXTERNALMETERENABLEALERT", "Wenn Sie Ihre Lastverwaltungsoption in Modbus verwenden möchten,<br>müssen Sie zuerst die Gesamtstrombegrenzung des Leistungsoptimierers<br>unter „Auswahl des Lademodus und Konfiguration des Leistungsoptimierers“ deaktivieren.");
define("_MODBUSALERT", "Wenn Sie Ihr Power Optimizer External Meter aktivieren möchten,<br>müssen Sie zuerst Modbus<br>unter &#39Local Load Management&#39 deaktivieren..");
define("_POWEROPTIMIZERDLMENABLEALERT", "Wenn Sie Ihre Lastmanagementoption in Master/Slave verwenden möchten,<br>müssen Sie zuerst den Leistungsoptimierer in der<br>&#39Lade-Modus Auswahl und Leistungsoptimierer Konfiguration&#39 deaktivieren.");
define("_DLMALERT", "Wenn Sie Ihren Leistungsoptimierer aktivieren möchten,<br>müssen Sie zuerst Master/Slave<br>in der &#39Lokalen Lastverwaltung&#39 deaktivieren.");

define("_DLMALERTFOLLOWTHESUN", "Wenn Sie Folge der Sonne aktivieren möchten,<br>müssen Sie zuerst Master/Slave<br>in der &#39Lokalen Lastverwaltung&#39 deaktivieren.");
define("_FOLLOWTHESUNDLMENABLEALERT", "Wenn Sie die Lastmanagement-Option als Master/Slave verwenden möchten, <br> müssen Sie zunächst die Sonnenverfolgung im <br>&#39 Power Optimizer-Konfigurationsmenü&#39 deaktivieren.");

define("_RESETUSERPASSWORD", "Benutzerkennwort <br> zurücksetzen");
define("_INSTALLATIONERRORENABLEDCONFIRM", "Wenn Sie die Installationsfehleraktivierung deaktivieren möchten,<br>müssen Sie zuerst das Erdungssystem unter &#Installationseinstellungen&#39 auf IT/Split Phase einstellen.");
define("_EARTHINGSYSTEMCONFIRM", "Wenn Sie das Erdungssystem auf TN/TT einstellen möchten,<br>müssen Sie zuerst die Installationsfehleraktivierung in den &#39OCPP-Einstellungen&#39 aktivieren.");

define("_AUTHKEYMAXLIMIT", "die Länge sollte maximal 40 Zeichen betragen.");
define("_AUTHORIZATIONKEYEMPTYCONFIRM", "Das Feld Authorization Key ist leer.<br>Bestätigen Sie die Änderungen?");

define("_RANDOMISEDDELAYATOFFPEAKEND", "Randomisierte Verzögerung am Off-Peak-Ende");
define("_FIFO", "FIFO");
define("_FAILSAFECURRENT", "Ausfallsicherer Strom");
define("_FAILSAFECURRENTERROR", "Notstrom ist erforderlich!");
define("_FAILSAFECURRENTLESSTHAN0", "* Failsafe Stromwert darf nicht kleiner als 0 sein!");
define("_FAILSAFECURRENTMORETHAN32", "* Failsafe Current Wert darf nicht größer als 32 sein!");
define("_FAILSAFECURRENTMORETHAN50", "* Failsafe Current Wert darf nicht größer als 50 sein!");

define("_LOCALCHARGESESSION", "Lokale Ladesitzungen");
define("_ROWNUMBER", "Zeilennummer");
define("_SESSIONUUID", "Gebühren-ID");
define("_AUTHORIZATIONUID", "RFID-Code");
define("_STARTTIME", "Startzeit");
define("_STOPTIME", "Endzeit");
define("_TOTALTIME", "Gesamtzeit");
define("_STATUS", "Status");
define("_CHARGEPOINTIDS", "Socket-Nummer");
define("_INITIALENERGY", "Anfansenergie(kWh)");
define("_LASTENERGY", "LetzteEnergie(kWh)");
define("_TOTALENERGY", "Gesamtenergie (kWh)");
define("_DOWNLOADLOCALCHARGESESSIONLOGS", "Vollständiges Sitzungsprotokoll in CSV");
define("_DOWNLOADFULLSESSIONLOGS", "Zusammenfassung des Protokolls in CSV");
define("_STARTDATE", "Startdatum");
define("_ENDDATE", "Endtermin");
define("_RFIDSELECTION", "RFID-Auswahl");
define("_CLEAR", "klar");

define("_FALLBACKCURRENT", "Fallback-Strom");
define("_FALLBACKRANGE", "Der Rückfallstrom muss 0 sein oder im Bereich von liegen ");
define("_DOWNLOADEEBUSLOGS", "EEBUS-Protokolle");
define("_PAIRINGENERGYMANAGER", "Für die Kopplung aktiviert");
define("_PAIR", "Pair Enable");
define("_UNPAIR", "Unpair");
define("_EEBUS", "EEBUS");
define("_FIRMWAREVERSION", "Firmware-Version");
define("_EEBUSDISCOVERY", "Erkannte Geräte");
define("_REFRESH", "Refresh");
define("_CPROLEMASTERREQUIREDFIELD", "Wenn Sie die Einstellungen der Lastmanagementgruppe aktualisieren möchten, muss die Ladepunktrolle in den allgemeinen Lastmanagementeinstellungen als &#39Master&#39 gespeichert werden.");

define("_LISTOFSLAVES", "Liste der Slaves");
define("_NUMBEROFSLAVES", "Anzahl der Slaves");
define("_LISTOFCONNECTOR", "Liste der Konnektoren");
define("_AVAILABLECURRENT", "Verfügbare aktuelle Phase");

define("_DLMINTERFACE", "DLM-Schnittstelle");
define("_ETHERNET", "Ethernet");
define("_DLMINTERFACEERROR", "WLAN über Netzwerkschnittstellen aktivieren!");

define("_MUSTBEINTEGER", "muss eine ganzzahl sein!");
define("_GRIDBUFFER", "Prozentsatz der Netzschutzmarge");
define("_CHARGINGSTATUSALERT", "Im Ladestatus kann der Wert nicht aktualisiert werden!");
define("_READUNDERSTAND", "Ich habe gelesen, ich verstehe");

define("_MORETHAN10", "Sie müssen den maximalen Netzstrom erhöhen oder den Prozentsatz der Netzschutzmarge verringern, bevor Sie diese Einstellungen speichern. Die Grenze für den maximalen Netzstrom kann bei Verwendung des Prozentsatzes der Netzschutzmarge nicht unter 10 A liegen.");

define("_CLUSTERMAXCURRENT", "Maximaler Clusterstrom");
define("_CLUSTERFAILSAFECURRENT", "Cluster-Failsafe-Strom");
define("_CLUSTERMAXCURRENTERROR", "Cluster-Maximalstrom ist erforderlich!");
define("_CLUSTERFAILSAFECURRENTERROR", "Cluster-Failsafe-Strom ist erforderlich!");
define("_CLUSTERFAILSAFECURRENTLESSTHAN0", "Cluster Failsafe Current value darf nicht kleiner als 0 sein!");
define("_CLUSTERFAILSAFECURRENTMORETHAN", "Cluster-Failsafe-Stromwert muss kleiner sein als der maximale Netzstrom!");
define("_CLUSTERFAILSAFE", "Cluster-Failsafe-Modus");

define("_CLUSTERMAXCURRENTLESSTHAN10", "Der maximale Cluster-Aktualwert darf nicht kleiner als 10 sein");
define("_CLUSTERMAXCURRENTMORETHAN", "Der maximale aktuelle Clusterwert muss gleich oder kleiner als dieser Wert sein:");