<?php
include_once "access_control.php";
define("_LOGIN", "ΣΥΝΔΕΣΗ");
define("_USERNAME", "Όνομα χρήστη:");
define("_PASSWORD", "Κωδικός πρόσβασης:");
define("_CHANGEPASSWORD", "Αλλαγή κωδικού πρόσβασης");
define("_CURRENTPASSWORD", "Τρέχων κωδικός πρόσβασης:");
define("_NEWPASSWORD", "Νέος κωδικός πρόσβασης:");
define("_CONFIRMNEWPASSWORD", "Επιβεβαίωση νέου κωδικού πρόσβασης:");
define("_SUBMIT", "Υποβολή");
define("_CURRENTPASSWORDREQUIRED", "Ο Τρέχων κωδικός πρόσβασης απαιτείται");
define("_PASSWORDREQUIRED", "Ο Κωδικός πρόσβασης απαιτείται");
define("_USERNAMEREQUIRED", "Το Όνομα χρήστη απαιτείται");
define("_USERAUTHFAILED", "Η Επαλήθευση ταυτότητας χρήστη απαιτείται!");
define("_USERNAMEORCURRENTPASSWORDWRONG", "Το όνομα χρήστη ή ο τρέχων κωδικός πρόσβασης είναι λάθος!");
define("_DBACCESSFAILURE", "Ανέφικτη η πρόσβαση στη βάση δεδομένων!");
define("_CHANGEPASSWORDERROR", "Πρέπει πρώτα να αλλάξετε κωδικό πρόσβασης!");
define("_SAMEPASSWORDERROR", "Ο νέος κωδικός πρόσβασης δεν μπορεί να είναι ίδιος με τον τρέχοντα!");
define("_PASSWORDMATCHERROR", "Οι κωδικοί πρόσβασης δεν συμφωνούν!");
define("_CURRENTPASSWORDWRONG", "Λάθος τρέχων κωδικός πρόσβασης!");
define("_PASSWORDERRORLEVEL2", "Ο κωδικός πρόσβασης δεν είναι έγκυρος, ο αριθμός των χαρακτήρων πρέπει να είναι 20 και να περιέχει τουλάχιστον δύο γράμματα [A-Za-z], δύο ψηφία [0-9] και δύο ειδικούς χαρακτήρες [!§$%&/()=?*#+-_.:,;]");
define("_PASSWORDERRORLEVEL3", "Ο κωδικός πρόσβασης δεν είναι έγκυρος, ο αριθμός χαρακτήρων πρέπει να είναι τουλάχιστον 12 και το πολύ 32, και να περιέχονται τουλάχιστον δύο πεζά [a-z] και δύο κεφαλαία γράμματα [A-Z], δύο αριθμοί [0-9] και τουλάχιστον δύο ειδικοί χαρακτήρες [!%&/()=?*#+-_].");
define("_LOGINLOCKOUT", "Πάρα πολλές αποτυχημένες προσπάθειες. Δοκιμάστε μετά από 1800 δευτερόλεπτα.");

define("_MAINPAGE", "Κύρια σελίδα");
define("_GENERAL", "Γενικές ρυθμίσεις");
define("_OCPPSETTINGS", "Ρυθμίσεις OCPP");
define("_NETWORKINTERFACES", "Διεπαφές δικτύου");

define("_OCPPCONNINTERFACE", "Διεπαφή σύνδεσης OCPP : ");
define("_CONNECTIONSTATE", "Κατάσταση σύνδεσης : ");
define("_DISCONNECTED", "Αποσυνδέθηκε");
define("_NEEDTOLOGINFIRST", "Πρέπει να συνδεθείτε πρώτα!");
define("_CONNECTED", "Συνδέθηκε");
define("_CPSERIALNUMBER", "Αριθμός σειράς σημείου φόρτισης : ");
define("_HMISOFTWAREVERSION", "Έκδοση λογισμικού διεπαφής χρήστη : ");
define("_OCPPSOFTWAREVERSION", "Έκδοση λογισμικού OCPP : ");
define("_POWERBOARDSOFTWAREVERSION", "Έκδοση λογισμικού πλακέτας ισχύος : ");
define("_OCPPDEVICEID", "ID συσκευής OCPP : ");
define("_DURATIONAFTERPOWERON", "Διάρκεια μετά την ενεργοποίηση : ");
define("_LOGOUT", "Αποσύνδεση χρήστη");
define("_PRESET", "Προρρυθμίσεις:");

define("_OCPPCONNECTION", "Σύνδεση OCPP");
define("_ENABLED", "Ενεργοποιημένη");
define("_DISABLED", "Απενεργοποιημένη");
define("_CONNECTIONSETTINGS", "Ρυθμίσεις σύνδεσης");
define("_CENTRALSYSTEMADDRESS", "Διεύθυνση κεντρικού συστήματος ");
define("_CHARGEPOINTID", "ID σημείου φόρτισης ");
define("_OCPPVERSION", "Έκδοση OCPP");
define("_SAVE", "Αποθήκευση");
define("_SAVESUCCESSFUL", "Αποθήκευση επιτυχής.");
define("_CENTRALSYSTEMADDRESSERROR", "Η Διεύθυνση κεντρικού συστήματος απαιτείται!");
define("_CHARGEPOINTIDERROR", "Το ID σημείου φόρτισης απαιτείται!");
define("_SECONDS", "Δευτερόλεπτα");
define("_ADD", "Προσθήκη");
define("_REMOVE", "Αφαίρεση");
define("_SAVECAPITAL", "ΑΠΟΘΗΚΕΥΣΗ");
define("_CANCEL", "Ακύρωση");

define("_CELLULAR", "Δεδομένα κινητής");
define("_INTERFACEIPADDRESS", "Διεύθυνση IP διεπαφής: ");
define("_ICCID", "ICCID: ");
define("_IMSI", "IMSI: ");
define("_IMEI", "IMEI: ");
define("_APNNAME", "Όνομα APN: ");
define("_APNUSERNAME", "Όνομα χρήστη APN: ");
define("_APNPASSWORD", "Κωδικός πρόσβασης APN: ");
define("_IPSETTING", "Ρύθμιση IP: ");
define("_IPADDRESS", "Διεύθυνση IP: ");
define("_NETWORKMASK", "Μάσκα δικτύου: ");
define("_DEFAULTGATEWAY", "Προεπιλεγμένη πύλη: ");
define("_PRIMARYDNS", "Κύρια διεύθυνση DNS: ");
define("_SECONDARYDNS", "Δευτερεύουσα διεύθυνση DNS: ");
define("_WIFI", "WLAN");
define("_SECURITY", "Ασφάλεια: ");
define("_SECURITYTYPE", "Επιλέξτε τύπο ασφάλειας");
define("_NONE", "Καμία");
define("_SELECTMODE", "Επιλέξτε λειτουργία!");
define("_RFIDLOCALLIST", "Τοπική λίστα RFID");
define("_ACCEPTALLRFIDS", "Αποδοχή όλων των RFID");
define("_MANAGERFIDLOCALLIST", "Διαχείριση τοπικής λίστας RFID:");
define("_AUTOSTART", "Αυτόματη έναρξη");
define("_PROCESSING", "Επεξεργασία... Περιμένετε...");
define("_MACADDRESS", "Διεύθυνση MAC: ");
define("_WIFIHOTSPOT", "Wi-Fi Hotspot");
define("_TURNONDURINGBOOT", "Ενεργοποίηση κατά την εκκίνηση: ");
define("_AUTOTURNOFFTIMEOUT", "Λήξη χρόνου αυτόματης απενεργοποίησης: ");
define("_AUTOTURNOFF", "Αυτόματη απενεργοποίηση: ");
define("_HOTSPOTALERTMESSAGE", "Οι αλλαγές ρύθμισης Hotspot θα ισχύσουν την επόμενη φορά που θα ενεργοποιηθεί η συσκευή. ");
define("_HOTSPOTREBOOTMESSAGE", "Θέλετε επανεκκίνηση τώρα; ");

define("_DOWNLOADACLOGS", "Λήψη καταγραφών AC");
define("_DOWNLOADCELLULARLOGS", "Λήψη καταγραφών μονάδας κινητής τηλεφωνίας");
define("_DOWNLOADPOWERBOARDLOGS", "Λήψη καταγραφών Πλακέτας ισχύος");
define("_PASSWORDRESETSUCCESSFUL", "Ο κωδικός σας άλλαξε με επιτυχία.");
define("_DBOPENEDSUCCESSFULLY", "Η βάση δεδομένων άνοιξε με επιτυχία\n");
define("_WSSCERTSSETTINGS", "Ρυθμίσεις πιστοποιητικών WSS ");
define("_CONFKEYS", "Κλειδιά διαμόρφωσης");
define("_KEY", "Κλειδί");
define("_STATIC", "Στατικό");
define("_TIMEZONE", "Ζώνη ώρας");
define("_PLEASESELECTTIMEZONE", "Επιλέξτε ζώνη ώρας");
define("_DISPLAYSETTINGS", "Ρυθμίσεις οθόνης");
define("_DISPLAYLANGUAGE", "Γλώσσα ενδείξεων");
define("_BACKLIGHTDIMMING", "Ρύθμιση οπίσθιου φωτισμού : ");
define("_PLEASESELECT", "Επιλέξτε");
define("_TIMEBASED", "Βάσει χρόνου");
define("_SENSORBASED", "Με βάση αισθητήρα");
define("_BACKLIGHTDIMMINGLEVEL", "Επίπεδο ρύθμισης οπίσθιου φωτισμού : ");
define("_BACKLIGHTTHRESHOLD", "Κατώφλι ρύθμισης οπίσθιου φωτισμού : ");
define("_SETMIDTHRESHOLD", "Ρύθμιση μεσαίου ορίου");
define("_SETHIGHTHRESHOLD", "Ρύθμιση υψηλού ορίου");
define("_LOCALLOADMANAGEMENT", "Διαχείριση τοπικού φορτίου");
define("_MINIMUMCURRENT", "Ελάχιστο ρεύμα: ");
define("_FIFOPERCENTAGE", "Ποσοστό FIFO: ");
define("_GRIDMAXCURRENT", "Μέγιστο ρεύμα δικτύου: ");
define("_MASTERIPADDRESS", "Διεύθυνση IP Κύριας μονάδας: ");
define("_BACKLIGHTTIMESETTINGS", "Ρυθμίσεις χρόνου οπίσθιου φωτισμού ");
define("_SHOULDSELECTTIMEZONE", "* Πρέπει να επιλέξετε ζώνη ώρας!");
define("_MINIMUMCURRENTREQUIRED", "* Το Ελάχιστο ρεύμα απαιτείται!");
define("_CURRENTMUSTBENUMERIC", "* Το ρεύμα πρέπει να είναι αριθμητικό!");
define("_FIFOPERCREQUIRED", "* Το Ποσοστό FIFO απαιτείται!");
define("_FIFOPERCSHOULDBETWEEN", "* Το ποσοστό FIFO πρέπει να είναι μεταξύ 0 και 100!");
define("_PERCMUSTBENUMERIC", "* Το ποσοστό πρέπει να είναι αριθμητικό!");
define("_GRIDMAXCURRENTREQUIRED", "* Το Μέγιστο ρεύμα δικτύου απαιτείται!");
define("_GRIDCURRENTMUSTBENUMERIC", "* Το ρεύμα δικτύου πρέπει να είναι αριθμητικό!");
define("_IPADDRESSOFMASTERREQUIRED", "* Η Διεύθυνση IP κύριας μονάδας απαιτείται!");
define("_INVALIDIPADDRESS", "* Καταχωρίσατε μη έγκυρη διεύθυνση IP!");
define("_SAMENETWORKLAN", "* Καταχωρίσατε διεύθυνση IP στο ίδιο δίκτυο με LAN!");
define("_SAMENETWORKWLAN", "* YΚαταχωρίσατε διεύθυνση IP στο ίδιο δίκτυο με WLAN!");
define("_APNISREQUIRED", "Ο APN απαιτείται!");
define("_IPADDRESSREQUIRED", "Η Διεύθυνση IP απαιτείται!");
define("_NETWORKMASKREQUIRED", "Η Μάσκα δικτύου απαιτείται!");
define("_INVALIDNETWORKMASK", "* Καταχωρίσατε μη έγκυρη μάσκα δικτύου!");
define("_DEFAULTGATEWAYREQUIRED", "Η Προεπιλεγμένη πύλη απαιτείται!");
define("_INVALIDGATEWAY", "Καταχωρίσατε μη έγκυρη προεπιλεγμένη πύλη!");
define("_PRIMARYDNSREQUIRED", "Η Πρωτεύουσα διεύθυνση DNS απαιτείται!");
define("_INVALIDDNS", "Καταχωρίσατε μη έγκυρη διεύθυνση DNS!");
define("_SELECTIPSETTING", "Επιλέξτε ρύθμιση IP.");
define("_SSIDREQUIRED", "Ο SSID απαιτείται!");
define("_PASSWORDISREQUIRED", "Ο Κωδικός πρόσβασης απαιτείται!");
define("_WIFIPASSWORDERROR", "Ο κωδικός πρόσβασης δεν είναι έγκυρος, ο αριθμός χαρακτήρων πρέπει να είναι τουλάχιστον 8 και το πολύ 63 <br> έγκυροι χαρακτήρες a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL2", "&#8226; Ο κωδικός πρόσβασης δεν είναι έγκυρος, ο αριθμός των χαρακτήρων πρέπει να είναι 20,<br>&#8226; και να περιέχει τουλάχιστον δύο γράμματα [A-Za-z],<br>&#8226; δύο ψηφία [0-9],<br>&#8226; και δύο ειδικούς χαρακτήρες [!%&/()=?*#+-_]");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL3", "&#8226; Ο κωδικός πρόσβασης δεν είναι έγκυρος, tο μήκος χαρακτήρων πρέπει να είναι τουλάχιστον 12, το μέγιστο 32,<br>&#8226; περιέχει τουλάχιστον δύο πεζά γράμματα [a-z], <br>&#8226; περιέχει τουλάχιστον δύο κεφαλαία γράμματα [A-Z], <br>&#8226; περιέχει τουλάχιστον δύο ψηφία [0-9],<br>&#8226; περιέχει τουλάχιστον δύο ειδικούς χαρακτήρες [!%&/()=?*#+-_]");
define("_WIFISSIDERROR", "Το SSID δεν είναι έγκυρο, έγκυροι χαρακτήρες a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_SELECTSECURITYTYPE", "Επιλέξτε τύπο ασφάλειας");
define("_HOSTIPREQUIRED", "* Το IP κύριου υπολογιστή απαιτείται!");
define("_CERTMANREQUIRED", "* Η Διαχείριση πιστοποίησης απαιτείται!");
define("_OCPPENABLEALERT", "Αν θέλετε να χρησιμοποιήσετε τον σταθμό φόρτισης σε Αυτόνομη λειτουργία,<br> πρέπει πρώτα να απενεργοποιήσετε τη σύνδεση OCPP από το μενού &#39Ρυθμίσεις OCPP&#39");
define("_NOTSAVEDALERT", "Η σελίδα δεν αποθηκεύτηκε.");
define("_SAVEQUESTION", "Θέλετε αποθήκευση των αλλαγών;");
define("_OKBUTTON", "OK");
define("_LTECONNECTIONCONFIRM", "Η σύνδεση δεδομένων κινητής θα απενεργοποιηθεί. Επιβεβαιώνετε;");
define("_WIFICONNECTIONCONFIRM", "Η σύνδεση Wi-Fi θα απενεργοποιηθεί. Επιβεβαιώνετε;");
define("_DHCPSERVERCONNECTIONCONFIRM", "Αν θέλετε να ενεργοποιήσετε τον Διακομιστή DHCP LAN, πρώτα πρέπει να απενεργοποιήσετε το Wi-Fi Hotspot από την επιλογή &#39Wi-Fi Hotspot&#39.");
define("_WIFIHOTSPOTCONNECTIONCONFIRM", "Αν θέλετε να ενεργοποιήσετε το Wi-Fi Hotspot, πρώτα πρέπει να απενεργοποιήσετε τον Διακομιστή DHCP LAN DHCP από την επιλογή &#39Ρύθμιση IP LAN&#39.");

define("_DYNAMIC", "Δυναμική");
define("_DIAGNOSTICS", "Διαγνωστικά");
define("_LOCALLOAD", "Διαχείριση τοπικού φορτίου");
define("_DOWNLOAD", "Λήψη");
define("_STARTDATE", "Ημερομηνία Έναρξης");
define("_ENDDATE", "Ημερομηνία Λήξης");
define("_CLEAREVENTLOGS", "Καθαρισμός Όλων των Καταγραφών Συναγερμού");
define("_CLEAREVENTLOGSINFO", "Αυτό θα διαγράψει όλες τις καταγραφές συναγερμού!");
define("_DOWNLOADEVENTLOGSINFO", "Κατεβάστε καταγραφές συμβάντων της συσκευής για το πολύ 5 ημέρες");
define("_DEVICEEVENTLOGS", "Καταγραφές Συμβάντων Συσκευής");
define("_DEVICECHANGELOGS", "Καταγραφές Αλλαγών Συσκευής");
define("_LOGSDATEERROR", "Επιλέξτε ημερομηνίες για μέγιστη διάρκεια 5 ημερών.");
define("_DOWNLOACHANGELOGS", "Κατεβάστε τις Καταγραφές Αλλαγών Συσκευής");
define("_VPNFUNCTIONALITY", "Λειτουργικότητα VPN: ");
define("_CERTMANAGEMENT", "Διαχείριση πιστοποίησης: ");
define("_NAME", "Όνομα: ");
define("_CONNECTIONINTERFACE", "Διεπαφή σύνδεσης ");
define("_ANY", "Οποιαδήποτε");
define("_OCPPCONNPARAMETERS", "Παράμετροι διαμόρφωσης OCPP");
define("_SETDEFAULT", "Να τεθούν στις προεπιλογές ");
define("_STANDALONEMODE", "Αυτόνομη λειτουργία");
define("_STANDALONEMODETITLE", "Αυτόνομη λειτουργία:");
define("_STANDALONEMODENOTSELECTED", "* Η αυτόνομη λειτουργία δεν μπορεί να επιλεχθεί επειδή έχει ενεργοποιηθεί το OCPP.");
define("_CHARGERWEBUI", "Διεπαφή διαδικτυακού χρήστη φορτιστή");
define("_SYSTEMMAINTENANCE", "Συντήρηση συστήματος");
define("_HOSTIP", "IP κύριου υπολογιστή: ");
define("_PASSWORDERRORLEVEL1", "Ο κωδικός πρόσβασης δεν είναι έγκυρος, ο αριθμός χαρακτήρων πρέπει να είναι τουλάχιστον 6 και να περιέχει τουλάχιστον 1 πεζό γράμμα, 1 κεφαλαίο γράμμα και 1 αριθμητικό χαρακτήρα!");
define("_SELECTBACKLIGHTDIMMING", "* Πρέπει να επιλέξετε ρύθμιση οπίσθιου φωτισμού!");
define("_ISREQUIRED", "απαιτείται!");
define("_ISNOTVALID", "δεν είναι έγκυρο!");
define("_ISDUPLICATED", "είναι διπλό!");
define("_MUSTBENUMERIC", "πρέπει να είναι αριθμητικό!");
define("_VPNFUNCTIONALITYREQUIRED", "* Η Λειτουργικότητα VPN απαιτείται!");
define("_VPNNAMEREQUIRED", "* Το Όνομα VPN απαιτείται!");
define("_VPNPASSWORDREQUIRED", "* Ο Κωδικός πρόσβασης VPN απαιτείται!");
define("_EXPLANATION", "Υποδεικνύει απαιτούμενο πεδίο.");
define("_FIRMWAREUPDATE", "Ενημερώσεις υλικολογισμικού");
define("_BACKUPRESTORE", "Διαμόρφωση αντιγράφων ασφαλείας & επαναφοράς");
define("_SYSTEMRESET", "Επαναφορά συστήματος");
define("_CHANGEADMINPASSWORD", "Κωδικός πρόσβασης διαχείρισης");
define("_FACTORYRESET", "Εργοστασιακή προεπιλογή");
define("_FACTORYRESETBUTTON", "Εργοστασιακή επαναφορά");
define("_FACTORYDEFAULTCONFIGURATION", "Διαμόρφωση εργοστασιακής προεπιλογής");
define("_LOGFILES", "Αρχεία καταγραφής");
define("_BACKUPFILE", "Αρχείο αντιγραφής ασφαλείας");
define("_RESTOREFILE", "Επαναφορά αρχείου διαμόρφωσης");
define("_FREEMODEMAXCHARACTER", "πρέπει να έχει το πολύ 32 χαρακτήρες!");
define("_RESTOREMESSAGE", "Επιβεβαιώνετε να εφαρμοστούν οι αλλαγές και να γίνει επανεκκίνηση τώρα;");

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

define("_PASSWORDTYPEEXPLANATION", "Ο κωδικός πρόσβασής σας πρέπει να έχει 6 χαρακτήρες και να περιέχει
τουλάχιστον ένα κεφαλαίο γράμμα, ένα πεζό γράμμα, ένα αριθμητικό ψηφίο.");

define("_PASSWORDTYPEEXPLANATIONLEVEL2", "Ο κωδικός πρόσβασής σας πρέπει να έχει 20 χαρακτήρες και να περιέχει τουλάχιστον δύο
γράμματα, δύο ψηφία και δύο ειδικούς χαρακτήρες.");

define("_PASSWORDTYPEEXPLANATIONLEVEL3", "Ο κωδικός πρόσβασης πρέπει να έχει τουλάχιστον 12 και το πολύ 32 χαρακτήρες και να περιέχει τουλάχιστον δύο κεφαλαία γράμματα,
δύο πεζά γράμματα, δύο ψηφία και δύο ειδικούς χαρακτήρες.");

define("_BACKTOLOGIN", "Επιστροφή στη Σύνδεση χρήστη");
define("_CHANGE", "Αλλαγή");
define("_SYSTEMADMINISTRATION", "Διαχείριση συστήματος");
define("_UPDATE", "Ενημέρωση");
define("_CONFIRM", "Επιβεβαίωση");
define("_FACTORYDEFAULTCONFIRM", "Σίγουρα θέλετε επαναφορά στις εργοστασιακές προεπιλογές;");
define("_FILENAME", "Όνομα αρχείου");
define("_UPLOAD", "Αποστολή");
define("_SELECTFIRMWARE", "Επιλέξτε αρχείο ενημέρωσης υλικολογισμικού από υπολογιστή");
define("_FIRMWAREFILESIZE", "Ελέγξτε το μέγεθος του αρχείου υλικολογισμικού.");
define("_FIRMWAREFILETYPE", "Ελέγξτε τον τύπο του αρχείου υλικολογισμικού.");

define("_LESSTHANOREQUAL4", "πρέπει να είναι μεταξύ 1 και 4");
define("_LESSTHANOREQUAL20", "πρέπει να είναι μικρότερο ή ίσο με 20");
define("_LESSTHANOREQUAL65000", "πρέπει να είναι μικρότερο ή ίσο με 65000");
define("_LESSTHANOREQUAL300", "πρέπει να είναι μικρότερο ή ίσο με 300");
define("_LESSTHANOREQUAL86500", "πρέπει να είναι μικρότερο ή ίσο με 86500");
define("_LESSTHANOREQUAL10000", "πρέπει να είναι μικρότερο ή ίσο με 10000");
define("_LESSTHANOREQUAL22", "πρέπει να είναι μικρότερο ή ίσο με 22");
define("_LESSTHANOREQUAL10", "πρέπει να είναι μικρότερο ή ίσο με 10");
define("_LESSTHANOREQUAL600", "πρέπει να είναι μικρότερο ή ίσο με 600");
define("_LESSTHANOREQUAL120", "πρέπει να είναι μικρότερο ή ίσο με 120");
define("_HIGHTHANOREQUAL0", "πρέπει να είναι μεγαλύτερο ή ίσο με 0");
define("_CHANGEPASSWORDSUGGESTION", "Συνιστούμε να αλλάξετε το προεπιλεγμένο κωδικό πρόσβασης από το μενού συντήρησης συστήματος");

define("_FILESIZE", "Ελέγξτε το μέγεθος του αρχείου.");
define("_FILETYPE", "Ελέγξτε τον τύπο του αρχείου.");

define("_BACKUPVERSIONCHECK", "Η έκδοση αυτού του αρχείου δεν είναι κατάλληλη για τη συσκευή.");
define("_HARDRESETCONFIRM", "Σίγουρα θέλετε Επαναφορά μέσω υλισμικού;");
define("_SOFTRESETCONFIRM", "Σίγουρα θέλετε Επαναφορά μέσω λογισμικού;");
define("_NEWSETUP", "Χρησιμοποιήστε το εγχειρίδιο χρήσης για τη νέα διαμόρφωση.");

define("_LOADMANAGEMENT", "Διαχείριση φορτίου");
define("_CPROLE", "Ρόλος σημείου φόρτισης");
define("_GRIDSETTINGS", "Ρυθμίσεις δικτύου");
define("_LOADMANAGEMENTMODE", "Λειτουργία διαχείρισης φορτίου");
define("_LOADMANAGEMENTGROUP", "Ομάδα διαχείρισης φορτίου");
define("_LOADMANAGEMENTOPTION", "Επιλογή Διαχείρισης φορτίου");
define("_ALARMS", "Συναγερμοί");

define("_MASTER", "Κύρια μονάδα");
define("_SLAVE", "Εξαρτημένη μονάδα");
define("_TOTALCURRENTLIMIT", "Όριο συνολικού ρεύματος ανά φάση");
define("_SUPPLYTYPE", "Τύπος παροχής");
define("_FIFOPERCANTAGE", "Ποσοστό FIFO");
define("_TIC", "TIC");
define("_EQUALLYSHARED", "Ίση κατανομή");
define("_COMBINED", "Συνδυασμός");
define("_TOTALCURRENTLIMITERROR", "Το Όριο συνολικού ρεύματος ανά φάση απαιτείται!");
define("_LESSTHAN1024", "πρέπει να είναι μικρότερο από 1024");
define("_ATLEAST0","πρέπει να είναι τουλάχιστον 0");
define("_MORETHAN12", "πρέπει να είναι μεγαλύτερο από 12");
define("_CHOOSEONE","Επιλέξτε ένα");
define("_SLAVEMINCHCURRENT", "Ρύθμιση ρεύματος φόρτισης ασφαλείας εκτός σύνδεσης");
define("_SERIALNO", "Αριθμός σειράς");
define("_CONNECTORSTATE", "Κατάσταση συνδέσμου");
define("_NUMBEROFPHASES", "Αριθμός φάσεων");
define("_PHASECONSEQUENCE", "Σειρά σύνδεσης φάσεων");
define("_VIP", "Φόρτιση VIP");
define("_CPMODE", "Η Λειτουργία σημείου φόρτισης");
define("_VIPERROR", "Απαιτείται Φόρτιση VIP");
define("_PHASECONSEQUENCEERROR", "Η Σειρά σύνδεσης φάσεων απαιτείται!");
define("_CPMODEERROR", "Η Λειτουργία σημείου φόρτισης απαιτείται!");
define("_SUPPORTEDCURRENT", "Υποστηριζόμενο ρεύμα");
define("_INSTANTCURPERPHASE", "Στιγμιαία φάση ρεύματος");
define("_FIFOCHARGINGPERCENTAGE", "Ποσοστό φόρτισης FIFO");
define("_MINIMUMCURRENT1P", "Ελάχιστο ρεύμα φόρτισης 1φασικό");
define("_MINIMUMCURRENT3P", "Ελάχιστο ρεύμα φόρτισης 3φασικό");
define("_MAXIMUMCURRENT", "Μέγιστο ρεύμα φόρτισης");
define("_STEP", "Βήμα");
define("_UPDATEDLMGROUP", "Ενημέρωση Ομάδας DLM");
define("_MAINCIRCUITCURRENT", "Μέγιστο ρεύμα δικτύου");
define("_MAINCIRCUITCURRENTERROR", "Απαιτείται μέγιστο ρεύμα δικτύου!");
define("_DLMMAXCURRENT", "Όριο συνολικού ρεύματος DLM ανά φάση");
define("_DLMMAXCURRENTERROR", "Το Όριο συνολικού ρεύματος DLM ανά φάση απαιτείται!");
define("_DLMMAXCURRENTMORETHANMAIN", "Το Όριο συνολικού ρεύματος DLM θα πρέπει να είναι μεγαλύτερο από το μισό του ρεύματος κύριου ασφαλειοδιακόπτη");
define("_DLMMAXCURRENTLESSTHANMAIN", "Το Όριο συνολικού ρεύματος DLM θα πρέπει να είναι μικρότερο από το ρεύμα κύριου ασφαλειοδιακόπτη");

define("_LOGOSETTINGS", "Ρυθμίσεις λογότυπου");
define("_USELOGO", "Επιλέξτε λογότυπο από υπολογιστή");
define("_LOGOTYPE", "Επιλέξτε ένα λογότυπο με μορφή png.");
define("_LOGODIMENSION", "Το μέγιστο επιτρεπόμενο μέγεθος λογότυπου είναι 80x80, επιλέξτε ένα λογότυπο με το κατάλληλο μέγεθος.");

define("_SERVICECONTACTINFO", "Πληροφορίες επικοινωνίας σέρβις οθόνης");
define("_SERVICECONTACTINFOCHARACTER", "Οι Πληροφορίες επικοινωνίας σέρβις οθόνης πρέπει να έχουν το πολύ 40 χαρακτήρες!<br>έγκυροι χαρακτήρες a..z 0..9 .+@*");

define("_SCREENTHEME", "Θέμα οθόνης");
define("_DARKBLUE", "Σκούρο μπλε");
define("_ORANGE", "Πορτοκαλί");
define("_PLEASEENTERRFIDLOCALLIST", "Καταχωρίστε Τοπική λίστα RFID!");

define("_DHCPSERVER", "Διακομιστής DHCP");
define("_DHCPCLIENT", "Πελάτης DHCP");

define("_MAXDHCPADDRRANGE", "Διεύθυνση IP λήξης διακομιστή DHCP");
define("_MINDHCPADDRRANGE", "Διεύθυνση IP έναρξης διακομιστή DHCP");

define("_MAXDHCPADDRRANGEERROR", "Η Διεύθυνση IP λήξης διακομιστή DHCP απαιτείται!");
define("_MINDHCPADDRRANGEERROR", "Η Διεύθυνση IP έναρξης διακομιστή DHCP απαιτείται!");
define("_DIFFERENCEBETWEENMAXANDMINADDRRANGE", "Η Διεύθυνση IP λήξης διακομιστή DHCP θα πρέπει να είναι μεγαλύτερη από τη Διεύθυνση IP έναρξης διακομιστή DHCP");
define("_IPADDRESSRANGE", "Η Διεύθυνση IP δεν μπορεί να λάβει τιμή μεταξύ των διευθύνσεων IP Έναρξης και λήξης διακομιστή DHCP.");

define("_CELLULARGATEWAY", "Πύλη κινητής τηλεφωνίας");
define("_INVALIDSUBNET", "Η διεύθυνση IP δεν είναι στο πραγματικό υποδίκτυο");

define("_CONNECTIONSTATUS", "Κατάσταση σύνδεσης");

define("_INSTALLATIONSETTINGS", "Ρυθμίσεις εγκατάστασης");
define("_EARTHINGSYSTEM", "Σύστημα γείωσης");
define("_CURRENTLIMITERSETTINGS", "Ρυθμίσεις περιοριστή ρεύματος");
define("_CURRENTLIMITERPHASE", "Φάση περιοριστή ρεύματος");
define("_CURRENTLIMITERVALUE", "Τιμή περιοριστή ρεύματος");
define("_UNBALANCEDLOADDETECTION", "Ανίχνευση ανισοκατανομής φορτίου");
define("_EXTERNALENABLEINPUT", "Είσοδος εξωτερικής ενεργοποίησης");
define("_LOCKABLECABLE", "Καλώδιο με κλείδωμα");
define("_POWEROPTIMIZERTOTALCURRENTLIMIT", "Όριο συνολικού ρεύματος βελτιστοποιητή ισχύος");
define("_POWEROPTIMIZER", "Βελτιστοποιητής ισχύος");
define("_TNORTT", "TN/TT");
define("_SPLITPHASE", "IT/Χωριστή φάση");
define("_ONEPHASE", "Μονοφασικό");
define("_THREEPHASE", "Τριφασικό");
define("_POWEROPTIMIZERTOTALCURRENTLIMITMORETHANOREQUAL16", "Το όριο συνολικού ρεύματος βελτιστοποιητή ισχύος πρέπει <br> να είναι μεγαλύτερο ή ίσο του 16");
define("_POWEROPTIMIZERTOTALCURRENTLIMITLESSTHANOREQUAL100", "Το όριο συνολικού ρεύματος βελτιστοποιητή ισχύος πρέπει <br> να είναι μικρότερο ή ίσο του 100");
define("_FOLLOWTHESUN", "Ακολουθώ τον ήλιο");
define("_FOLLOWTHESUNMODE", "Ακολουθήστε τη λειτουργία του ήλιου");
define("_AUTOPHASESWITCHING", "Αυτόματη εναλλαγή φάσης");
define("_MAXHYBRID", "Max υβριδικό");
define("_SUNONLY", "Ήλιος μόνο");
define("_SUNHYBRID", "Ήλιος υβριδικό");

define("_DISPLAYBACKLIGHTSETTINGS", "Ρυθμίσεις οπίσθιου φωτισμού οθόνης");
define("_BACKLIGHTLEVEL", "Επίπεδο οπίσθιου φωτισμού");
define("_SUNRISETIME", "Ώρα ανατολής ηλίου ");
define("_SUNSETTIME", "Ώρα δύσης ηλίου");

define("_HIGH", "Υψηλός");
define("_MID", "Μεσαίος");
define("_LOW", "Χαμηλός");

define("_A", " (A)");

define("_CURRENTLIMITERVALUELESSTHAN8", "* Όταν η υποστήριξη EVReadySupport είναι ενεργοποιημένη και η Φάση περιοριστή ρεύματος είναι μονοφασικός, η τιμή περιοριστή ρεύματος δεν πρέπει να είναι μικρότερη από 8!");
define("_CURRENTLIMITERVALUELESSTHAN14", "* Όταν η υποστήριξη EVReadySupport είναι ενεργοποιημένη και η Φάση περιοριστή ρεύματος είναι τριφασικός, η τιμή περιοριστή ρεύματος δεν πρέπει να είναι μικρότερη από 14!");

define("_LEDDIMMINGSETTINGS", "Ρύθμιση έντασης LED");
define("_LEDDIMMINGLEVEL", "Επίπεδο ρύθμισης έντασης LED");
define("_VERYLOW", "Πολύ χαμηλό");
define("_WARNINGFORLTEENABLED", "Η λειτουργία ρύθμισης IP της διεπαφής LAN θα οριστεί ως στατική και ο διακομιστής DHCP θα ενεργοποιηθεί.");
define("_WARNINGFORLTEDISABLED", "Η λειτουργία ρύθμισης IP της διεπαφής LAN θα έχει οριστεί σε Πελάτης DHCP και ο Διακομιστής DHCP θα είναι απενεργοποιημένος.");
define("_ACCEPTQUESTION", "Αποδέχεστε τις αλλαγές;");

define("_CELLULARGATEWAYCONFIRM", "Η πύλη κινητής τηλεφωνίας θα απενεργοποιηθεί.");

define("_ETHERNETIP", "IP διεπαφής Ethernet:");
define("_WLANIP", "IP διεπαφής WLAN:");
define("_STRENGTH", "Δύναμη");
define("_WIFIFREQ", "Συχνότητα");
define("_WIFILEVEL", "Επίπεδο");
define("_CELLULARIP", "IP διεπαφής Κινητής τηλεφωνία:");
define("_CELLULAROPERCODE" , "Χειριστής");
define("_CELLULARTECH" , "Τεχνολογία");
define("_SCANNETWORKS" , "Σάρωση Δικτύων");
define("_AVAILABLENETWORKS" , "Διαθέσιμα Δίκτυα");
define("_NETWORKSTATUS" , "Κατάσταση Δικτύου");
define("_PLEASEWAITMSG" , "Παρακαλώ Περιμένετε...");
define("_SCANNINGWIFIMSG" , "Σάρωση Δικτύων Wi-Fi");
define("_NOWIFIFOUNDMSG" , "Δεν βρέθηκαν Δίκτυα Wi-Fi");
define("_PLEASECHECKWIFICONNMSG" , "Παρακαλώ ελέγξτε τη σύνδεση Wi-Fi και προσπαθήστε ξανά.");

define("_APPLICATIONRESTART", "Για την αλλαγή αυτή απαιτείται επανεκκίνηση της εφαρμογής.");

define("_QRCODE", "Εμφάνιση κωδικού QR");
define("_QRCODEONSCREEN", "Κωδικός QR επί της οθόνης");
define("_QRCODEDELIMITER", "Οριοθέτης κωδικού QR");
define("_INVALIDDELIMITERCHARACTER", "Ο χαρακτήρας διαχωρισμού κωδικού QR δεν είναι έγκυρος, Ο χαρακτήρας κενού διαστήματος δεν είναι αποδεκτός, ο αριθμός χαρακτήρων πρέπει να είναι τουλάχιστον 1 και το πολύ 3, έγκυροι χαρακτήρες 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");

define("_LOCATION", "Τοποθεσία");
define("_INDOOR", "Εσωτερικός χώρος");
define("_OUTDOOR", "Εξωτερικός χώρος");
define("_POWEROPTIMIZEREXTERNALMETER", "Εξωτερικός μετρητής");
define("_OPERATIONMODE", "Τρόπος λειτουργίας");
define("_AUTOSELECTED", "Επιλέγεται αυτόματα");
define("_NOTSELECTED", "Δεν έχει επιλεχθεί");
define("_CHARGINGMODESELECTIONANDPOWEROPTIMIZERCONF", "Επιλογή λειτουργίας φόρτισης και Διαμόρφωση βελτιστοποιητή ισχύος");

define("_USERINTERACTION", "Αλληλεπίδραση με χρήστη");

define("_STANDBYLEDBEHAVIOUR", "Συμπεριφορά LED Αναμονής");
define("_OFF", "Απεν");
define("_ON", "Ενεργ");

define("_LOADSHEDDINGMINIMUMCURRENT", "Ελάχιστο ρεύμα απόρριψης φορτίου");
define("_UNBALANCEDLOADDETECTIONMAXCURRENT", "Ελάχ. ρεύμα ανίχνευσης μη ισοσταθμισμένου φορτίου");

define("_SCHEDULEDCHARGING", "Προγραμματισμένη φόρτιση");
define("_OFFPEAKCHARGING", "Φόρτιση εκτός ωρών αιχμής");
define("_OFFPEAKCHARGINGWEEKENDS", "Φόρτιση εκτός ωρών αιχμής τα Σαββατοκύριακα");
define("_OFFPEAKCHARGINGPERIODS", "Περίοδο φόρτισης εκτός ωρών αιχμής");
define("_CONTINUECHARGINGENDPEAKINTERVAL", "Συνεχίστε τη φόρτιση μετά το τέλος της κορυφαίας περιόδου");
define("_CONTINUECHARGINGWITHOUTREAUTHAFTERPOWERLOSS", "Συνεχίστε τη φόρτιση χωρίς επαναβεβαίωση μετά από διακοπή ρεύματος");



define("_RANDOMISEDDELAYMAXIMUMDURATION", "Μέγιστη διάρκεια τυχαιοποιημένης καθυστέρησης (δευτερόλεπτα)");

define("_RANDOMISEDDELAYMAXIMUMDURATIONERROR", "* Η Μέγιστη διάρκεια τυχαιοποιημένης καθυστέρησης απαιτείται!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONBENUMERIC", "* Η Μέγιστη διάρκεια τυχαιοποιημένης καθυστέρησης πρέπει να είναι ακέραιος!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONLIMIT", "* Η Μέγιστη διάρκεια τυχαιοποιημένης καθυστέρησης πρέπει να είναι μεταξύ 0 και 1800");
define("_OFFPEAKCHARGINGPERIODSERROR", "* Οι Περίοδοι φόρτισης εκτός ωρών αιχμής απαιτούνται!");
define("_OFFPEAKCHARGINGPERIODSSAMETIMEERROR", "* Η Ώρα έναρξης και λήξης φόρτισης εκτός αιχμής δεν μπορεί να είναι ίδιες!");

define("_OFFPEAKCHARGINGSECONDTIMEPERIOD", "Δεύτερη χρονική περίοδος φόρτισης εκτός αιχμής");
define("_OFFPEAKDISABLEDCONFIRM", "Η Φόρτιση εκτός ωρών αιχμής θα απενεργοποιηθεί. Επιβεβαιώνετε;");

define("_SHOWSERVICECONTACTINFO", "Εμφάνιση Πρόσθετων πληροφοριών επικοινωνίας σέρβις");
define("_EXTRASERVICECONTACTINFORMATION", "Οι Πληροφορίες επικοινωνίας σέρβις εμφανίζονται στις οθόνες Συνδέστε καλώδιο φόρτισης, Προετοιμασία για φόρτιση, Αρχικοποίηση και Αναμονή για σύνδεση");

define("_LOADSHEDDINGSTATUS", "Κατάσταση απόρριψης φορτίου: ");
define("_ACTIVE", "Ενεργ");
define("_INACTIVE", "Ανενεργ");
define("_POWEROPTIMIZEREXTERNALMETERENABLEALERT", "Αν θέλετε να χρησιμοποιήσετε την Επιλογή Διαχείρισης φορτίου στο Modbus,<br>πρώτα πρέπει να απενεργοποιήσετε το Όριο Συνολικού ρεύματος Βελτιστοποιητή ισχύος από το σημείο &#39Επιλογή λειτουργίας φόρτισης και Διαμόρφωση Βελτιστοποιητή ισχύος&#39.");
define("_MODBUSALERT", "Αν θέλετε να ενεργοποιήσετε τον Εξωτερικό Μετρητή Βελτιστοποιητή ισχύος,<br>πρώτα πρέπει να απενεργοποιήσετε το Modbus από την  &#39Τοπική διαχείριση φορτίου &#39.");
define("_POWEROPTIMIZERDLMENABLEALERT", "Αν θέλετε να χρησιμοποιήσετε την Επιλογή Διαχείρισης Φορτίου στη λειτουργία Master/Slave,<br>πρέπει πρώτα να απενεργοποιήσετε τον Βελτιστοποιητή Ισχύος από την<br>&#39Επιλογή Κατάστασης Φόρτισης και Διαμόρφωσης Βελτιστοποιητή Ισχύος&#39.");
define("_DLMALERT", "Αν θέλεις να ενεργοποιήσεις τον Βελτιστοποιητή Ισχύος σου,<br>πρέπει πρώτα να απενεργοποιήσεις το Master/Slave<br>από &#39Τοπική Διαχείριση Φορτίου&#39.");

define("_FOLLOWTHESUNDLMENABLEALERT", "Εάν θέλετε να χρησιμοποιήσετε την επιλογή Διαχείρισης Φόρτισης ως Master/Slave,<br>πρέπει πρώτα να απενεργοποιήσετε την<br>&#39 παρακολούθηση του ήλιου από τη Ρύθμιση Βελτιστοποιητή Ισχύος&#39.");
define("_DLMALERTFOLLOWTHESUN", "Για να ενεργοποιήσετε την παρακολούθηση του ήλιου,<br> πρέπει πρώτα να απενεργοποιήσετε την ρύθμιση Master/Slave<br> από &#39τη Διαχείριση Τοπικής Φόρτισης&#39.");

define("_RESETUSERPASSWORD", "Ορισμός νέου <br> κωδικού πρόσβασης <br> χρήστη");
define("_INSTALLATIONERRORENABLEDCONFIRM", "Εάν θέλετε να απενεργοποιήσετε την Ενεργοποίηση σφάλματος εγκατάστασης,<br>πρώτα πρέπει να ορίσετε το σύστημα γείωσης από το &#39Ρυθμίσεις εγκατάστασης&#39 σε IT/Split Phase.");
define("_EARTHINGSYSTEMCONFIRM", "Εάν θέλετε να ορίσετε το Σύστημα γείωσης σε TN/TT,<br>πρώτα πρέπει να ενεργοποιήσετε το Installation Error Enable από τις &#39OCPP Settings&#39.");

define("_AUTHKEYMAXLIMIT", "Το μήκος πρέπει να είναι το πολύ 40 χαρακτήρες.");
define("_AUTHORIZATIONKEYEMPTYCONFIRM", "Το πεδίο Authorization Key είναι κενό.<br>Επιβεβαιώνετε τις αλλαγές;");

define("_RANDOMISEDDELAYATOFFPEAKEND", "Τυχαιοποιημένη καθυστέρηση στο τέλος εκτός αιχμής");
define("_FIFO", "FIFO");
define("_FAILSAFECURRENT", "Ασφαλές ρεύμα");
define("_FAILSAFECURRENTERROR", "Απαιτείται Failsafe Current!");
define("_FAILSAFECURRENTLESSTHAN0", "* Failsafe Η τρέχουσα τιμή δεν πρέπει να είναι μικρότερη από 0!");
define("_FAILSAFECURRENTMORETHAN32", "* Failsafe Η τρέχουσα τιμή δεν πρέπει να είναι μεγαλύτερη από 32!");
define("_FAILSAFECURRENTMORETHAN50", "* Failsafe Η τρέχουσα τιμή δεν πρέπει να είναι μεγαλύτερη από 50!");

define("_LOCALCHARGESESSION", "Τοπικές συνεδρίες χρέωσης");
define("_ROWNUMBER", "Αριθμός σειράς");
define("_SESSIONUUID", "ταυτότητα χρέωσης");
define("_AUTHORIZATIONUID", "Κωδικός RFID");
define("_STARTTIME", "Ώρα Έναρξης");
define("_STOPTIME", "Ώρα Λήξης");
define("_TOTALTIME", "Συνολικός Χρόνος");
define("_STATUS", "Κατάσταση");
define("_CHARGEPOINTIDS", "Αριθμός πρίζας");
define("_INITIALENERGY", "Αρχική Ενέργεια(kWh)");
define("_LASTENERGY", "Τελευταία Ενέργεια(kWh)");
define("_TOTALENERGY", "Συνολική Ενέργεια(kWh)");
define("_DOWNLOADLOCALCHARGESESSIONLOGS", "Λήψη σε μορφή CSV");
define("_DOWNLOADFULLSESSIONLOGS", "Σύνοψη Καταγραφής σε Μορφή CSV");
define("_STARTDATE", "ημερομηνία έναρξης");
define("_ENDDATE", "ημερομηνία λήξης");
define("_RFIDSELECTION", "επιλογή RFID");
define("_CLEAR", "Σαφή");

define("_FALLBACKCURRENT", "Επιστροφικό ρεύμα");
define("_FALLBACKRANGE", "Το εναλλακτικό ρεύμα πρέπει να είναι 0 ή εντός του εύρους των ");
define("_DOWNLOADEEBUSLOGS", "Καταγραφή EEBUS");
define("_PAIRINGENERGYMANAGER", "Ενεργοποιήθηκε για σύζευξη");
define("_PAIR", "Pair Enable");
define("_UNPAIR", "Unpair");
define("_EEBUS", "EEBUS");
define("_FIRMWAREVERSION", "Έκδοση υλικολογισμικού");
define("_EEBUSDISCOVERY", "Ανακαλύφθηκαν συσκευές");
define("_REFRESH", "Refresh");
define("_CPROLEMASTERREQUIREDFIELD", "Εάν θέλετε να ενημερώσετε τις ρυθμίσεις της ομάδας διαχείρισης φορτίου, ο ρόλος του σημείου χρέωσης πρέπει να αποθηκευτεί ως &#39Κύριος&#39 από τις γενικές ρυθμίσεις διαχείρισης φορτίου.");

define("_LISTOFSLAVES", "Λίστα Σκλάβων");
define("_NUMBEROFSLAVES", "Αριθμός Σκλάβων");
define("_LISTOFCONNECTOR", "Λίστα εφαρμογών σύνδεσης");
define("_AVAILABLECURRENT", "Διαθέσιμη τρέχουσα φάση");

define("_DLMINTERFACE", "Διεπαφή DLM");
define("_ETHERNET", "Ethernet");
define("_DLMINTERFACEERROR", "Ενεργοποίηση WiFi από διεπαφές δικτύου!");

define("_MUSTBEINTEGER", "πρέπει να είναι ακέραιος!");
define("_GRIDBUFFER", "Ποσοστό περιθωρίου προστασίας πλέγματος");
define("_CHARGINGSTATUSALERT", "Στην κατάσταση φόρτισης, η τιμή δεν μπορεί να ενημερωθεί!");
define("_READUNDERSTAND", "Διάβασα, καταλαβαίνω");

define("_MORETHAN10", "Πρέπει να αυξήσετε το Μέγιστο Ρεύμα Πλέγματος ή να μειώσετε το Ποσοστό Περιθωρίου Προστασίας Πλέγματος πριν αποθηκεύσετε αυτές τις ρυθμίσεις. Το μέγιστο όριο ρεύματος δικτύου δεν μπορεί να είναι μικρότερο από 10 Α όταν χρησιμοποιείτε το Ποσοστό Περιθωρίου Προστασίας Πλέγματος.");

define("_CLUSTERMAXCURRENT", "Μέγιστο ρεύμα συμπλέγματος");
define("_CLUSTERFAILSAFECURRENT", "Ασφαλές ρεύμα συμπλέγματος");
define("_CLUSTERMAXCURRENTERROR", "Απαιτείται μέγιστο ρεύμα συμπλέγματος!");
define("_CLUSTERFAILSAFECURRENTERROR", "Απαιτείται ρεύμα ασφαλείας συμπλέγματος!");
define("_CLUSTERFAILSAFECURRENTLESSTHAN0", "Cluster Failsafe Η τρέχουσα τιμή δεν πρέπει να είναι μικρότερη από 0!");
define("_CLUSTERFAILSAFECURRENTMORETHAN", "Cluster Failsafe Η τρέχουσα τιμή πρέπει να είναι μικρότερη από το μέγιστο ρεύμα δικτύου!");
define("_CLUSTERFAILSAFE", "Ασφαλής λειτουργία συμπλέγματος");

define("_CLUSTERMAXCURRENTLESSTHAN10", "Cluster Max Η τρέχουσα τιμή δεν πρέπει να είναι μικρότερη από 10");
define("_CLUSTERMAXCURRENTMORETHAN", "Cluster Max Η τρέχουσα τιμή πρέπει να είναι ίση ή μικρότερη από αυτήν την τιμή:");