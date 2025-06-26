<?php
include_once "access_control.php";
define("_LOGIN", "GİRİŞ");
define("_USERNAME", "Kullanıcı Adı:");
define("_PASSWORD", "Şifre:");
define("_CHANGEPASSWORD", "Şifre değiştir");
define("_CURRENTPASSWORD", "Mevcut şifre:");
define("_NEWPASSWORD", "Yeni şifre:");
define("_CONFIRMNEWPASSWORD", "Yeni şifreyi doğrula:");
define("_SUBMIT", "Gönder");
define("_CURRENTPASSWORDREQUIRED", "Mevcut şifre girilmeli");
define("_PASSWORDREQUIRED", "Şifre girilmeli");
define("_USERNAMEREQUIRED", "Kullanıcı adı girilmeli");
define("_USERAUTHFAILED", "Kullanıcı doğrulama başarısız!");
define("_USERNAMEORCURRENTPASSWORDWRONG", "Kullanıcı adı veya mevcut şifre yanlış!");
define("_DBACCESSFAILURE", "Veritabanına erişilemiyor!");
define("_CHANGEPASSWORDERROR", "Önce şifrenizi değiştirmeniz gerekiyor!");
define("_SAMEPASSWORDERROR", "Mevcut ve yeni şifre birbirinden farklı olmalı!");
define("_PASSWORDMATCHERROR", "Şifreler eşleşmiyor!");
define("_CURRENTPASSWORDWRONG", "Mevcut şifre yanlış!");
define("_PASSWORDERRORLEVEL2", "Şifre geçersiz, karakter uzunluğu 20 olmalı ve en az iki harf [A-Za-z], iki rakam [0-9] ve iki özel karakter içermelidir [!%&/()=?*#+-_]");
define("_PASSWORDERRORLEVEL3", "Şifre geçersiz, karakter uzunluğu en az 12, en fazla 32 karakter olmalı ve en az iki küçük harf [a-z], iki büyük harf [A-Z], iki sayı [0-9] ve iki özel karakter [!%&/()=?*#+-_] içermelidir.");
define("_LOGINLOCKOUT", "Çok fazla başarısız giriş yaptınız. Lütfen 1800 saniye sonra deneyin.");

define("_MAINPAGE", "Ana Sayfa");
define("_GENERAL", "Genel Ayarlar");
define("_OCPPSETTINGS", "OCPP Ayarları");
define("_NETWORKINTERFACES", "Network Arayüzleri");

define("_OCPPCONNINTERFACE", "OCPP Bağlantı Arayüzü : ");
define("_CONNECTIONSTATE", "Bağlantı Durumu : ");
define("_DISCONNECTED", "Bağlantı kesildi");
define("_NEEDTOLOGINFIRST", "Önce giriş yapmanız gerekiyor!");
define("_CONNECTED", "Bağlandı");
define("_CPSERIALNUMBER", "CP Seri Numarası : ");
define("_HMISOFTWAREVERSION", "HMI Yazılım Versiyonu : ");
define("_OCPPSOFTWAREVERSION", "OCPP Yazılım Versiyonu : ");
define("_POWERBOARDSOFTWAREVERSION", "Güç Ünitesi Yazılım Versiyonu : ");
define("_OCPPDEVICEID", "OCPP Cihaz Kimliği : ");
define("_DURATIONAFTERPOWERON", "Cihaz açıldıktan sonra geçen süre : ");
define("_LOGOUT", "Çıkış");
define("_PRESET", "Ön-Ayarlar:");

define("_OCPPCONNECTION", "OCPP Bağlantısı");
define("_ENABLED", "Açık");
define("_DISABLED", "Kapalı");
define("_CONNECTIONSETTINGS", "Bağlantı Ayarları");
define("_CENTRALSYSTEMADDRESS", "Merkezi Sistem Adresi ");
define("_CHARGEPOINTID", "Şarj Noktası Kimliği ");
define("_OCPPVERSION", "OCPP Versiyonu");
define("_SAVE", "Kaydet");
define("_SAVESUCCESSFUL", "Başarıyla kaydedildi.");
define("_CENTRALSYSTEMADDRESSERROR", "* Merkezi sistem adresi giriniz!");
define("_CHARGEPOINTIDERROR", "* Şarj noktası kimliği giriniz!");
define("_SECONDS", "Saniye");
define("_ADD", "Ekle");
define("_REMOVE", "Çıkar");
define("_SAVECAPITAL", "KAYDET");
define("_CANCEL", "İptal");

define("_CELLULAR", "Hücresel");
define("_INTERFACEIPADDRESS", "Arayüz IP Adresi: ");
define("_ICCID", "ICCID: ");
define("_IMSI", "IMSI: ");
define("_IMEI", "IMEI: ");
define("_APNNAME", "APN İsmi: ");
define("_APNUSERNAME", "APN Kullanıcı Adı: ");
define("_APNPASSWORD", "APN Şifresi: ");
define("_IPSETTING", "IP Ayarı: ");
define("_IPADDRESS", "IP Adresi: ");
define("_NETWORKMASK", "Ağ Maskesi: ");
define("_DEFAULTGATEWAY", "Varsayılan Ağ Geçidi: ");
define("_PRIMARYDNS", "Birincil DNS: ");
define("_SECONDARYDNS", "İkincil DNS: ");
define("_WIFI", "Kablosuz");
define("_SECURITY", "Güvenlik: ");
define("_SECURITYTYPE", "Güvenlik türünü seçiniz");
define("_NONE", "Hiçbiri");
define("_SELECTMODE", "Lütfen modu seçiniz!");
define("_RFIDLOCALLIST", "RFID Yerel Liste");
define("_ACCEPTALLRFIDS", "Tüm RFID leri Kabul Et");
define("_MANAGERFIDLOCALLIST", "RFID Local Listeyi Yönet:");
define("_AUTOSTART", "Otomatik Başlatma");
define("_PROCESSING", "İşleniyor... Lütfen bekleyiniz...");
define("_MACADDRESS", "MAC Adresi: ");
define("_WIFIHOTSPOT", "Kablosuz Bağlantı Noktası");
define("_TURNONDURINGBOOT", "Açılış sırasında aç: ");
define("_AUTOTURNOFFTIMEOUT", "Otomatik kapanma zaman aşımı: ");
define("_AUTOTURNOFF", "Otomatik kapanma: ");
define("_HOTSPOTALERTMESSAGE", "Kablosuz bağlantı noktası ayar değişiklikleri cihazın bir sonraki açılışında devreye girecektir. ");
define("_HOTSPOTREBOOTMESSAGE", "Şimdi yeniden baslatmak istiyor musunuz? ");

define("_DOWNLOADACLOGS", "AC Loglarını İndir");
define("_DOWNLOADCELLULARLOGS", "Hücresel Modül Loglarını İndir");
define("_DOWNLOADPOWERBOARDLOGS", "Güç Kartı Loglarını İndir");
define("_PASSWORDRESETSUCCESSFUL", "Şifreniz başarıyla sıfırlandı.");
define("_DBOPENEDSUCCESSFULLY", "Veritabanı başarıyla açıldı\n");
define("_WSSCERTSSETTINGS", "WSS Sertifika Ayarları");
define("_CONFKEYS", "Konfigürasyon Anahtarları");
define("_KEY", "Anahtar");
define("_STATIC", "Statik");
define("_TIMEZONE", "Zaman Dilimi");
define("_PLEASESELECTTIMEZONE", "Lütfen zaman dilimini seçiniz");
define("_DISPLAYSETTINGS", "Ekran Ayarları");
define("_DISPLAYLANGUAGE", "Ekran Dili");
define("_BACKLIGHTDIMMING", "Arka Plan Işığı Karartma : ");
define("_PLEASESELECT", "Lütfen seçin");
define("_TIMEBASED", "Zaman Bazlı");
define("_SENSORBASED", "Sensör Bazlı");
define("_BACKLIGHTDIMMINGLEVEL", "Arka Plan Işığı Karartma Seviyesi : ");
define("_BACKLIGHTTHRESHOLD", "Arka Plan Işığı Eşiği : ");
define("_SETMIDTHRESHOLD", "Orta Eşiği Ayarla");
define("_SETHIGHTHRESHOLD", "Yüksek Eşiği Ayarla");
define("_LOCALLOADMANAGEMENT", "Yerel Yük Yönetimi");
define("_MINIMUMCURRENT", "Minimum Akım: ");
define("_FIFOPERCENTAGE", "FIFO Yüzdesi: ");
define("_GRIDMAXCURRENT", "Şerit Maksimum Akımı: ");
define("_MASTERIPADDRESS", "Master IP Adresi: ");
define("_BACKLIGHTTIMESETTINGS", "Arka Plan Işığı Zaman Ayarları: ");
define("_SHOULDSELECTTIMEZONE", "* Zaman dilimini seçmeniz gerekmektedir!");
define("_MINIMUMCURRENTREQUIRED", "* Minimum akımı giriniz!");
define("_CURRENTMUSTBENUMERIC", "* Akım numerik olmak zorundadır!");
define("_FIFOPERCREQUIRED", "* FIFO yüzdesini giriniz!");
define("_FIFOPERCSHOULDBETWEEN", "* FIFO yüzdesi 0 ile 100 arasında olmak zorundadır!");
define("_PERCMUSTBENUMERIC", "* Yüzde numerik olmak zorundadır!");
define("_GRIDMAXCURRENTREQUIRED", "* Şerit maksimum akımını giriniz!");
define("_GRIDCURRENTMUSTBENUMERIC", "* Şerit akımı numerik olmak zorundadır!");
define("_IPADDRESSOFMASTERREQUIRED", "* Master IP adresini giriniz!");
define("_INVALIDIPADDRESS", "* Geçersiz IP adresi girdiniz!");
define("_SAMENETWORKLAN", "* LAN ile aynı ağ içerisinde IP adresi girdiniz!");
define("_SAMENETWORKWLAN", "* WLAN ile aynı ağ içerisinde IP adresi girdiniz!");
define("_APNISREQUIRED", "APN giriniz!");
define("_IPADDRESSREQUIRED", "IP addresini giriniz!");
define("_NETWORKMASKREQUIRED", "Ağ maskesini giriniz!");
define("_INVALIDNETWORKMASK", "* Geçersiz ağ maskesi girdiniz!");
define("_DEFAULTGATEWAYREQUIRED", "Varsayılan ağ geçidini giriniz!");
define("_INVALIDGATEWAY", "Geçersiz varsayılan ağ geçidi girdiniz!");
define("_PRIMARYDNSREQUIRED", "Birincil dns giriniz!");
define("_INVALIDDNS", "Geçersiz dns girdiniz!");
define("_SELECTIPSETTING", "Lütfen IP ayarını seçiniz.");
define("_SSIDREQUIRED", "SSID giriniz!");
define("_PASSWORDISREQUIRED", "Şifre giriniz!");
define("_WIFIPASSWORDERROR", "Şifre geçersiz, karakter uzunluğu en az 8 en fazla 63 olmalıdır <br> geçerli karakter a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=* ?-_@<>|");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL2", "&#8226; Şifre geçersiz, karakter uzunluğu 20 olmalıdır,<br>&#8226; Şifre en az iki harf içermelidir [A-Za-z],<br>&#8226; Şifre en az iki sayı içermelidir [0-9],<br>&#8226; Şifre en az iki özel karakter içermelidir [!%&/()=?*#+-_]");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL3", "&#8226; Şifre geçersiz, karakter uzunluğu en az 12, en fazla 32 olmalıdır,<br>&#8226; Şifre en az iki küçük harf içermelidir [a-z], <br>&#8226; Şifre en az iki büyük harf içermelidir [A-Z], <br>&#8226; Şifre en az iki sayı içermelidir [0-9],<br>&#8226; Şifre en az iki özel karakter içermelidir [!%&/()=?*#+-_]");
define("_WIFISSIDERROR", "SSID geçersiz, geçerli karakterler a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_SELECTSECURITYTYPE", "Lütfen güvenlik türünü seçiniz.");
define("_HOSTIPREQUIRED", "* Ana makine IP giriniz!");
define("_CERTMANREQUIRED", "* Sertifika yönetimini giriniz!");
define("_OCPPENABLEALERT", "Şarj istasyonunu Bağımsız Modda kullanmak istiyorsanız,<br>öncelikle &#39OCPP Ayarları&#39 kısmından OCPP bağlantısını<br>kapatmanız gerekmektedir.");
define("_NOTSAVEDALERT", "Sayfa kaydedilmedi.");
define("_SAVEQUESTION", "Değişiklikleri kaydetmek ister misiniz?");
define("_OKBUTTON", "TAMAM");
define("_LTECONNECTIONCONFIRM", "Hücresel bağlantısı devre dışı kalacaktır. Onaylıyor musunuz?");
define("_WIFICONNECTIONCONFIRM", "Wi-Fi bağlantısı devre dışı kalacaktır. Onaylıyor musunuz?");
define("_DHCPSERVERCONNECTIONCONFIRM", "LAN DHCP Server&#39ı etkinleştirmek istiyorsanız,<br>öncelikle &#39Wi-Fi Hotspot&#39 kısmından Wi-Fi Hotspot&#39u<br>kapatmanız gerekmektedir.");
define("_WIFIHOTSPOTCONNECTIONCONFIRM", "Wi-Fi Hotspot&#39u etkinleştirmek istiyorsanız,<br>öncelikle &#39LAN IP Setting&#39 kısmından LAN DHCP Server&#39ı<br>kapatmanız gerekmektedir.");

define("_DYNAMIC", "Dinamik");
define("_DIAGNOSTICS", "Sistem Kontrolü");
define("_LOCALLOAD", "Yerel Yük Yönetimi");
define("_DOWNLOAD", "İndir");
define("_STARTDATE", "Başlangıç Tarihi");
define("_ENDDATE", "Bitiş Tarihi");
define("_CLEAREVENTLOGS", "Tüm Olay Loglarını Temizle");
define("_CLEAREVENTLOGSINFO", "Bu, tüm olay loglarını temizleyecektir!");
define("_DOWNLOADEVENTLOGSINFO", "En fazla 5 günlük süre için cihaz olay loglarını indir");
define("_DEVICEEVENTLOGS", "Cihaz Olay Logları");
define("_DEVICECHANGELOGS", "Cihaz Değişiklik Logları");
define("_LOGSDATEERROR", "Lütfen en fazla 5 günlük süre için tarihleri seçin.");
define("_DOWNLOACHANGELOGS", "Cihaz Değişiklik Loglarını İndir");
define("_VPNFUNCTIONALITY", "VPN İşlevselliği: ");
define("_CERTMANAGEMENT", "Sertifika Yönetimi: ");
define("_NAME", "İsim: ");
define("_CONNECTIONINTERFACE", "Bağlantı Arayüzü ");
define("_ANY", "Herhangi biri");
define("_OCPPCONNPARAMETERS", "OCPP Konfigürasyon Parametreleri");
define("_SETDEFAULT", "Varsayılanlara Ayarla ");
define("_STANDALONEMODE", "Bağımsız Mod");
define("_STANDALONEMODETITLE", "Bağımsız Mod:");
define("_STANDALONEMODENOTSELECTED", "* OCPP etkin olduğu için bağımsız mod seçilemiyor.");
define("_CHARGERWEBUI", "Şarj Cihazı Web Arayüzü");
define("_SYSTEMMAINTENANCE", "Sistem Bakımı");
define("_HOSTIP", "Sunucu IP: ");
define("_PASSWORDERRORLEVEL1", "Şifre geçersiz, karakter uzunluğu en az 6 karakter olmalı ve en az 1 küçük harf, 1 büyük harf ve 1 sayısal karakter içermelidir!");
define("_SELECTBACKLIGHTDIMMING", "* Arka plan ışığı karartma yöntemi seçiniz!");
define("_ISREQUIRED", "giriniz!");
define("_ISNOTVALID", "geçerli değildir!");
define("_ISDUPLICATED", "aynı değerden iki tane mevcut!");
define("_MUSTBENUMERIC", "numerik olmalı!");
define("_VPNFUNCTIONALITYREQUIRED", "* Vpn işlevselliği giriniz!");
define("_VPNNAMEREQUIRED", "* Vpn ismi giriniz!");
define("_VPNPASSWORDREQUIRED", "* Vpn şifresi giriniz!");
define("_EXPLANATION", "Zorunlu alanı belirtir.");
define("_FIRMWAREUPDATE", "Yazılım güncellemeleri");
define("_BACKUPRESTORE", "Yapılandırma yedekleme & geri yükleme");
define("_SYSTEMRESET", "Sistemi sıfırlama");
define("_CHANGEADMINPASSWORD", "Yönetici şifresi");
define("_FACTORYRESET", "Varsayılan fabrika ayarları");
define("_FACTORYRESETBUTTON", "Fabrika ayarları");
define("_FACTORYDEFAULTCONFIGURATION", "Varsayılan Fabrika Yapılandırması");
define("_LOGFILES", "Log Dosyaları");
define("_BACKUPFILE", "Dosya Yedeği Al");
define("_RESTOREFILE", "Yapılandırma Dosyasını Geri Yükle");
define("_FREEMODEMAXCHARACTER", "en fazla 32 karakter olmalı!");
define("_RESTOREMESSAGE", "Değişiklikleri uygulamayı ve şimdi yeniden başlatmayı onaylıyor musunuz?");

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

define("_PASSWORDTYPEEXPLANATION", "Şifreniz 6 karakter olmalı.En az bir büyük harf,bir küçük harf ve bir rakam içermelidir.");
define("_PASSWORDTYPEEXPLANATIONLEVEL2", "Şifreniz 20 karakter olmalı ve en az iki harf, iki rakam ve iki özel karakterden oluşmalıdır.");
define("_PASSWORDTYPEEXPLANATIONLEVEL3", "Şifreniz en az 12, en fazla 32 karakter olmalı ve en az iki büyük harf,
iki küçük harf, iki rakam ve iki özel karakterden oluşmalıdır.");

define("_BACKTOLOGIN", "Giriş Sayfasına Geri Dön");
define("_CHANGE", "Değiştir");
define("_SYSTEMADMINISTRATION", "Sistem Yönetimi");
define("_UPDATE", "Güncelleme");
define("_CONFIRM", "Onayla");
define("_FACTORYDEFAULTCONFIRM", "Fabrika varsayılanlarına geri dönmek istediğinizden emin misiniz?");
define("_FILENAME", "Dosya İsmi");
define("_UPLOAD", "Yükle");
define("_SELECTFIRMWARE", "Bilgisayardan Donanım Güncelleme dosyasını seçiniz.");
define("_FIRMWAREFILESIZE", "Donanım Güncelleme dosyasının boyutunu lütfen kontrol ediniz.");
define("_FIRMWAREFILETYPE", "Donanım Güncelleme dosyasının tipini lütfen kontrol ediniz.");

define("_LESSTHANOREQUAL4", "1 ile 4 arasında olmalı");
define("_LESSTHANOREQUAL20", "20&#39den küçük veya eşit olmalı");
define("_LESSTHANOREQUAL65000", "65000&#39den küçük veya eşit olmalı");
define("_LESSTHANOREQUAL300", "300&#39den küçük veya eşit olmalı");
define("_LESSTHANOREQUAL86500", "86500&#39den küçük veya eşit olmalı");
define("_LESSTHANOREQUAL10000", "10000&#39den küçük veya eşit olmalı");
define("_LESSTHANOREQUAL22", "22&#39den küçük veya eşit olmalı");
define("_LESSTHANOREQUAL10", "10&#39dan küçük veya eşit olmalı");
define("_LESSTHANOREQUAL600", "600&#39den küçük veya eşit olmalı");
define("_LESSTHANOREQUAL120", "120&#39den küçük veya eşit olmalı");
define("_HIGHTHANOREQUAL0", "0&#39dan büyük veya eşit olmalı");
define("_CHANGEPASSWORDSUGGESTION", "Sistem bakımı menüsünden varsayılan şifrenizi değiştirmenizi öneririz.");

define("_FILESIZE", "Dosyasının boyutunu lütfen kontrol ediniz.");
define("_FILETYPE", "Dosyasının tipini lütfen kontrol ediniz.");

define("_BACKUPVERSIONCHECK", "Bu dosyanın versiyonu cihaz için uygun değildir.");
define("_HARDRESETCONFIRM", "Hard Reset için emin misiniz?");
define("_SOFTRESETCONFIRM", "Soft Reset için emin misiniz?");
define("_NEWSETUP", "Lütfen yeniden kurulum için kullanım kılavuzunu kullanın");

define("_LOADMANAGEMENT", "Yük Yönetimi");
define("_CPROLE", "Şarj Noktası Rolü");
define("_GRIDSETTINGS", "Şebeke Ayarları");
define("_LOADMANAGEMENTMODE", "Yük Yönetim Modu");
define("_LOADMANAGEMENTGROUP", "Yük Yönetim Grubu");
define("_LOADMANAGEMENTOPTION", "Yük Yönetimi Seçeneği");
define("_ALARMS", "Alarmlar");

define("_MASTER", "Master");
define("_SLAVE", "Slave");
define("_TOTALCURRENTLIMIT", "Faz Başına Toplam Akım Sınırı");
define("_SUPPLYTYPE", "Tedarik Türü");
define("_FIFOPERCANTAGE", "FIFO Yüzdesi");
define("_TIC", "TIC");
define("_EQUALLYSHARED", "Eşit Paylaşılmış");
define("_COMBINED", "Karma");
define("_TOTALCURRENTLIMITERROR", "Faz Başına Toplam Akım Sınırını Giriniz");
define("_LESSTHAN1024", "1024&#39den küçük olmalı");
define("_ATLEAST0","en az 0 olmalı");
define("_MORETHAN12", "12&#39den büyük olmalı");
define("_CHOOSEONE", "Seçim yapınız");
define("_SLAVEMINCHCURRENT", "Çevrimdışı Arıza Korumalı Şarj Akımı Ayarı");
define("_SERIALNO", "Seri No");
define("_CONNECTORSTATE", "Konnektör Durumu");
define("_NUMBEROFPHASES", "Faz Sayısı");
define("_PHASECONSEQUENCE", "Faz Bağlantı Sırası");
define("_VIP", "VIP Şarjı");
define("_CPMODE", "CP Modu");
define("_VIPERROR", "VIP Şarjı giriniz");
define("_PHASECONSEQUENCEERROR", "Faz Bağlantı Sırasını Giriniz");
define("_CPMODEERROR", "CP Modu Giriniz");
define("_SUPPORTEDCURRENT", "Desteklenen Akım");
define("_INSTANTCURPERPHASE", "Faz Başına Anlık Akım");
define("_FIFOCHARGINGPERCENTAGE", "FIFO Şarj Yüzdesi");
define("_MINIMUMCURRENT1P", "Minimum Şarj Akımı 1-Faz");
define("_MINIMUMCURRENT3P", "Minimum Şarj Akımı 3-Faz");
define("_MAXIMUMCURRENT", "Maximum Şarj Akımı");
define("_STEP", "Adım");
define("_UPDATEDLMGROUP", "DLM Grubunu Yenile");
define("_MAINCIRCUITCURRENT", "Maksimum Şebeke Akımı");
define("_MAINCIRCUITCURRENTERROR", "Maksimum Şebeke Akımı gerekli!");
define("_DLMMAXCURRENT", "Faz Başına DLM Toplam Akım Limiti");
define("_DLMMAXCURRENTERROR", "Faz Başına DLM Toplam Akım Limiti gerekli!");
define("_DLMMAXCURRENTMORETHANMAIN", "DLM Toplam Akım Limiti, Ana Devre Kesici Akımının yarısından fazla olmalıdır");
define("_DLMMAXCURRENTLESSTHANMAIN", "DLM Toplam Akım Limiti, Ana Devre Kesici Akımından az olmalıdır");

define("_LOGOSETTINGS", "Logo Ayarları");
define("_USELOGO", "Bilgisayardan logo dosyasını seçiniz.");
define("_LOGOTYPE", "Lütfen png uzantılı bir logo seçiniz.");
define("_LOGODIMENSION", "İzin verilen maksimum logo boyutu 80x80&#39dir, lütfen uygun ölçülerde bir logo seçiniz.");

define("_SERVICECONTACTINFO", "Ekran Servis İletişim Bilgileri");
define("_SERVICECONTACTINFOCHARACTER", "Ekran Servis İletişim Bilgileri En Fazla 25 Karakter Olmalı!<br>Geçerli karakterler a..z 0..9 .+@*");

define("_SCREENTHEME", "Ekran Teması");
define("_DARKBLUE", "Koyu Mavi");
define("_ORANGE", "Turuncu");
define("_PLEASEENTERRFIDLOCALLIST", "Lütfen RFID yerel listesine girin!");

define("_DHCPSERVER", "DHCP Server");
define("_DHCPCLIENT", "DHCP Client");

define("_MAXDHCPADDRRANGE", "DHCP Sunucu Bitiş IP Adresi");
define("_MINDHCPADDRRANGE", "DHCP Sunucu Başlangıç IP Adresi");

define("_MAXDHCPADDRRANGEERROR", "DHCP Sunucu Bitiş IP Adresini giriniz");
define("_MINDHCPADDRRANGEERROR", "DHCP Sunucu Başlangıç IP Adresi giriniz");
define("_DIFFERENCEBETWEENMAXANDMINADDRRANGE", "DHCP Sunucu Bitiş IP Adresi,DHCP Sunucu Başlangıç IP Adresinden büyük olmalı");
define("_IPADDRESSRANGE", "IP Adresi, DHCP Sunucu Başlangıç ve Bitiş IP Adres aralığında değer alamaz");

define("_CELLULARGATEWAY", "Hücresel Geçidi");
define("_INVALIDSUBNET", "Ip Adresiniz doğru subnet&#39de değil.");

define("_CONNECTIONSTATUS", "Bağlantı Durumu");

define("_INSTALLATIONSETTINGS", "Kurulum Ayarları");
define("_EARTHINGSYSTEM", "Topraklama Sistemi");
define("_CURRENTLIMITERSETTINGS", "Akım Sınırlama Ayarları");
define("_CURRENTLIMITERPHASE", "Akım Sınırlama Fazı");
define("_CURRENTLIMITERVALUE", "Akım Sınırlama Değeri");
define("_UNBALANCEDLOADDETECTION", "Dengesiz Yük Algılama");
define("_EXTERNALENABLEINPUT", "Harici Etkinleştirme Girişi");
define("_LOCKABLECABLE", "Kilitlenebilir Kablo");
define("_POWEROPTIMIZERTOTALCURRENTLIMIT", "Güç İyileştirici Toplam Akım Sınırı");
define("_POWEROPTIMIZER", "Güç İyileştirici");
define("_TNORTT", "TN/TT");
define("_SPLITPHASE", "IT/Split Phase");
define("_ONEPHASE", "Bir Faz");
define("_THREEPHASE", "Üç Faz");
define("_POWEROPTIMIZERTOTALCURRENTLIMITMORETHANOREQUAL16", "Güç İyileştirici Toplam Akım <br> Sınırı 16\’dan büyük <br> veya eşit olmalı");
define("_POWEROPTIMIZERTOTALCURRENTLIMITLESSTHANOREQUAL100", "Güç İyileştirici Toplam Akım <br> Sınırı 100\’den küçük <br> veya eşit olmalı");
define("_FOLLOWTHESUN", "Güneşi takip et");
define("_FOLLOWTHESUNMODE", "Güneşi takip et modu");
define("_AUTOPHASESWITCHING", "Otomatik Faz Değiştirme");
define("_MAXHYBRID", "Maksimum hibrit");
define("_SUNONLY", "Sadece güneş");
define("_SUNHYBRID", "Güneş hibrit");

define("_DISPLAYBACKLIGHTSETTINGS", "Ekran Parlaklık Ayarları");
define("_BACKLIGHTLEVEL", "Ekran Parlaklık Seviyesi");
define("_SUNRISETIME", "Gün Doğumu Zamanı");
define("_SUNSETTIME", "Gün Batımı Zamanı");

define("_HIGH", "Yüksek");
define("_MID", "Orta");
define("_LOW", "Düşük");

define("_A", " (A)");

define("_CURRENTLIMITERVALUELESSTHAN8", "* EVReadySupport açıkken ve akım limit fazı bir faz iken, akım limit değeri 8&#39den az olamaz!");
define("_CURRENTLIMITERVALUELESSTHAN14", "* EVReadySupport açıkken ve akım limit fazı üç fazlıyken, akım limit değeri 14&#39ten az olamaz!");
define("_LEDDIMMINGSETTINGS", "Led Parlaklık Ayarları");
define("_LEDDIMMINGLEVEL", "Led Parlaklık Seviyesi");
define("_VERYLOW", "Çok Düşük");
define("_WARNINGFORLTEENABLED", "LAN arayüzü IP ayar modu statik olarak ayarlanacak ve DHCP Server etkinleştirilecektir.");
define("_WARNINGFORLTEDISABLED", "LAN arayüzü IP ayar modu DHCP Client olarak ayarlanacak ve DHCP Server devre dışı bırakılacaktır..");
define("_ACCEPTQUESTION", "Değişiklikleri kabul ediyor musunuz?");

define("_CELLULARGATEWAYCONFIRM", "Hücresel Ağ Geçidi devre dışı bırakılacak.");

define("_ETHERNETIP", "Ethernet Arayüzü IP&#39si:");
define("_WLANIP", "WLAN Arayüzü IP&#39si:");
define("_STRENGTH", "Güç");
define("_WIFIFREQ", "Frekans");
define("_WIFILEVEL", "Seviye");
define("_CELLULARIP", "Hücresel Arayüzü IP&#39si:");
define("_CELLULAROPERCODE" , "Şebeke");
define("_CELLULARTECH" , "Teknoloji");
define("_SCANNETWORKS", "Ağları Tara");
define("_AVAILABLENETWORKS", "Mevcut Ağlar");
define("_NETWORKSTATUS", "Ağ Durumu");
define("_PLEASEWAITMSG", "Lütfen Bekleyin...");
define("_SCANNINGWIFIMSG", "Wi-Fi Ağları Taranıyor");
define("_NOWIFIFOUNDMSG", "Hiç Wi-Fi Ağı Bulunamadı");
define("_PLEASECHECKWIFICONNMSG", "Wi-Fi bağlantınızı kontrol edin ve tekrar deneyin.");

define("_APPLICATIONRESTART", "Bu değişiklik, uygulamanın yeniden başlatılmasını gerektirir.");

define("_QRCODE", "Ekran QR Kodu");
define("_QRCODEONSCREEN", "Ekrandaki QR Kodu");
define("_QRCODEDELIMITER", "QR Kod Ayırıcı");
define("_INVALIDDELIMITERCHARACTER", "QR kod ayırıcının karakteri geçersiz, boşluk karakteri kabul edilemez, karakter uzunluğu en az 1, en fazla 3 karakter olmalıdır, geçerli karakterler 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");

define("_LOCATION", "Konum");
define("_INDOOR", "İçeri");
define("_OUTDOOR", "Dışarı");
define("_POWEROPTIMIZEREXTERNALMETER", "Harici Sayaç");
define("_OPERATIONMODE", "Çalışma Modu");
define("_AUTOSELECTED", "Otomatik Seçili");
define("_NOTSELECTED", "Seçili Değil");
define("_CHARGINGMODESELECTIONANDPOWEROPTIMIZERCONF", "Şarj Modu Seçimi ve Güç Optimize Edici Yapılandırması");

define("_USERINTERACTION", "Kullanıcı Etkileşimi");
define("_STANDBYLEDBEHAVIOUR", "Bekleme LED Davranışı");
define("_OFF", "Kapalı");
define("_ON", "Açık");

define("_LOADSHEDDINGMINIMUMCURRENT", "Yük Atma Minimum Akımı");
define("_UNBALANCEDLOADDETECTIONMAXCURRENT", "Dengesiz Yük Algılama Maks Akımı");

define("_SCHEDULEDCHARGING", "Programlı Şarj");
define("_OFFPEAKCHARGING", "Yoğun Olmayan Şarj");
define("_OFFPEAKCHARGINGWEEKENDS", "Hafta Sonları Yoğun Olmayan Şarj");
define("_OFFPEAKCHARGINGPERIODS", "Yoğun Olmayan Şarj Dönemleri");
define("_CONTINUECHARGINGENDPEAKINTERVAL", "Zirve Aralığı Sonunda Şarjı Sürdür");
define("_CONTINUECHARGINGWITHOUTREAUTHAFTERPOWERLOSS", "Güç Kaybı Sonrası Yeniden Yetkilendirme Olmadan Şarjı Sürdürme");



define("_RANDOMISEDDELAYMAXIMUMDURATION", "Rastgele Gecikme Maksimum <br> Süresi (saniye)");

define("_RANDOMISEDDELAYMAXIMUMDURATIONERROR", "* Rastgele Gecikme Maksimum Süresi gerekli!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONBENUMERIC", "* Rastgele Gecikme Maksimum Süresi tamsayı olmalıdır!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONLIMIT", "* Randomize Gecikme Maksimum Süresi 0 ile 1800 arasında olmalıdır!");
define("_OFFPEAKCHARGINGPERIODSERROR", "* Yoğun Olmayan Şarj Periyotları gereklidir!");
define("_OFFPEAKCHARGINGPERIODSSAMETIMEERROR", "* Off Peak Şarj Başlangıç ve Bitiş zamanı aynı olamaz!");
define("_OFFPEAKCHARGINGSECONDTIMEPERIOD", "Yoğun Olmayan Şarj İkinci Zaman Periyodu");
define("_OFFPEAKDISABLEDCONFIRM", "Off-Peak Şarj devre dışı kalacaktır. Onaylıyor musunuz?");
define("_SHOWSERVICECONTACTINFO", "Ekstra Hizmet İletişim Bilgilerini Göster");
define("_EXTRASERVICECONTACTINFORMATION", "Servis İletişim Bilgileri, Şarj Kablosunu Bağlama, Şarj Etmeye Hazırlanma, Başlatma ve Bağlantıyı Bekleme Ekranlarında gösterilir.");

define("_LOADSHEDDINGSTATUS", "Yük Atma Durumu:");
define("_ACTIVE", "Etkin");
define("_INACTIVE", "Etkin değil");
define("_POWEROPTIMIZEREXTERNALMETERENABLEALERT", "Yük Yönetimi Seçeneğinizi Modbus olarak kullanmak istiyorsanız,<br>önce &#39Power Optimizer Yapılandırması&#39&#39ndan Power Optimizer Toplam Akım Limitini<br> devre dışı bırakmanız gerekir.");
define("_MODBUSALERT", "Power Optimizer Harici Sayacınızı etkinleştirmek istiyorsanız,<br>önce &#39Yerel Yük Yönetimi&#39&#39nden Modbus<br>devre dışı bırakmanız gerekir.");
define("_POWEROPTIMIZERDLMENABLEALERT", "Yük Yönetimi Seçeneğinizi Master/Slave olarak kullanmak istiyorsanız,<br>önce &#39Power Optimizer Yapılandırması&#39&#39ndan Power Optimizer&#39ı<br> devre dışı bırakmanız gerekir.");
define("_DLMALERT", "Power Optimizerınızı etkinleştirmek istiyorsanız,<br>önce &#39Yerel Yük Yönetimi&#39&#39nden Master/Slave<br>devre dışı bırakmanız gerekir.");

define("_FOLLOWTHESUNDLMENABLEALERT", "Yük Yönetimi Seçeneğinizi Master/Slave olarak kullanmak istiyorsanız,<br>önce &#39Power Optimizer Yapılandırması&#39&#39ndan Güneşi Takip Et&#39i<br> devre dışı bırakmanız gerekir.");
define("_DLMALERTFOLLOWTHESUN", "Güneşi Takip Eti etkinleştirmek istiyorsanız,<br>önce &#39Yerel Yük Yönetimi&#39&#39nden Master/Slave<br>devre dışı bırakmanız gerekir.");

define("_RESETUSERPASSWORD", "Kullanıcı Şifresini <br> Sıfırla");
define("_INSTALLATIONERRORENABLEDCONFIRM", "Kurulum Hatası Etkinleştirmeyi devre dışı bırakmak istiyorsanız,<br>önce Topraklama Sistemini &#39Kurulum Ayarları&#39&#39ndan IT/Bölünmüş Faz&#39a ayarlamanız gerekir.");
define("_EARTHINGSYSTEMCONFIRM", "Topraklama Sistemini TN/TT olarak ayarlamak istiyorsanız,<br>önce &#39OCPP Ayarları&#39&#39ndan Kurulum Hatası Etkinleştirmeyi etkinleştirmeniz gerekir.");

define("_AUTHKEYMAXLIMIT", "uzunluğu maksimum 40 karakter olmalıdır.");
define("_AUTHORIZATIONKEYEMPTYCONFIRM", "Authorization Key alanı boş.<br>Değişiklikleri onaylıyor musunuz?");

define("_RANDOMISEDDELAYATOFFPEAKEND", "Yoğun Olmayan Şarjda Rastgele Gecikme");
define("_FIFO", "FIFO");
define("_FAILSAFECURRENT", "Güvenli Akım");
define("_FAILSAFECURRENTERROR", "Güvenli Akım gereklidir!");
define("_FAILSAFECURRENTLESSTHAN0", "* Güvenli Akım değeri 0&#39dan küçük olmamalıdır!");
define("_FAILSAFECURRENTMORETHAN32", "* Arızaya Dayanıklı Akım değeri 32&#39den fazla olmamalıdır!");
define("_FAILSAFECURRENTMORETHAN50", "* Arızaya Dayanıklı Akım değeri 50&#39den fazla olmamalıdır!");

define("_LOCALCHARGESESSION", "Yerel Ücretlendirme Oturumları");
define("_ROWNUMBER", "Satır No");
define("_SESSIONUUID", "Şarj Kimlik Kodu");
define("_AUTHORIZATIONUID", "RFID Kodu");
define("_STARTTIME", "Başlangıç Zamanı");
define("_STOPTIME", "Bitiş Zamanı");
define("_TOTALTIME", "Toplam Süre");
define("_STATUS", "Durum");
define("_CHARGEPOINTIDS", "Soket Numarası");
define("_INITIALENERGY", "Başlangıç Enerjisi(kWh)");
define("_LASTENERGY", "Bitiş Enerjisi(kWh)");
define("_TOTALENERGY", "Toplam Enerji(kWh)");
define("_DOWNLOADLOCALCHARGESESSIONLOGS", "CSV&#39de Tam Oturum Günlüğü");
define("_DOWNLOADFULLSESSIONLOGS", "CSV&#39de Özet Günlüğü");
define("_STARTDATE", "Başlangıç Tarihi");
define("_ENDDATE", "Bitiş Tarihi");
define("_RFIDSELECTION", "RFID Seçimi");
define("_CLEAR", "Temizle");

define("_FALLBACKCURRENT", "Yedek akım");
define("_FALLBACKRANGE", "Yedek akım 0 veya şu aralıkta olmalıdır: ");
define("_DOWNLOADEEBUSLOGS", "EEBUS Günlükleri");
define("_PAIRINGENERGYMANAGER", "Eşleştirme için etkinleştirildi");
define("_PAIR", "Eşleştirme Etkin");
define("_UNPAIR", "Eşleştirmeyi kaldır");
define("_EEBUS", "EEBUS");
define("_FIRMWAREVERSION", "Firmware Sürümü");
define("_EEBUSDISCOVERY", "Keşfedilen Cihazlar");
define("_REFRESH", "Yenile");
define("_CPROLEMASTERREQUIREDFIELD", "Yük Yönetim Grubu ayarlarını güncellemek istiyorsanız yük yönetimi genel ayarlarından şarj noktası rolünün &#39Master&#39 olarak kaydedilmesi gerekmektedir.");

define("_LISTOFSLAVES", "Slave Listesi");
define("_NUMBEROFSLAVES", "Slave Sayısı");
define("_LISTOFCONNECTOR", "Konnektör Listesi");
define("_AVAILABLECURRENT", "Kullanılabilir Akım");

define("_DLMINTERFACE", "DLM Arayüzü");
define("_ETHERNET", "Ethernet");
define("_DLMINTERFACEERROR", "Ağ Arayüzlerinden WiFi&#39yi etkinleştirin!");

define("_MUSTBEINTEGER", "tamsayı olmalı!");
define("_GRIDBUFFER", "Şebeke Koruma Marjı Yüzdesi");
define("_CHARGINGSTATUSALERT", "Cihaz şarj durumundayken değer güncellenemez!");
define("_READUNDERSTAND", "Okudum, anladım");

define("_MORETHAN10", "Bu ayarları kaydetmeden önce Maksimum Şebeke Akımını artırmalı veya Şebeke Koruma Marj Yüzdesini azaltmalısınız. Şebeke Koruma Marj Yüzdesi kullanıldığında Maksimum Şebeke Akımı sınırı 10A&#39dan düşük olamaz.");

define("_CLUSTERMAXCURRENT", "Küme Maksimum Akımı");
define("_CLUSTERFAILSAFECURRENT", "Küme Arıza Korumalı Akımı");
define("_CLUSTERMAXCURRENTERROR", "Küme Maksimum Akımı gerekli!");
define("_CLUSTERFAILSAFECURRENTERROR", "Küme Arıza Korumalı Akımı gerekli!");
define("_CLUSTERFAILSAFECURRENTLESSTHAN0", "Küme Arıza Güvenliği Geçerli değeri 0&#39dan küçük olmamalıdır!");
define("_CLUSTERFAILSAFECURRENTMORETHAN", "Küme Arıza Korumalı Akım değeri Maksimum Şebeke Akımından küçük olmalıdır!");
define("_CLUSTERFAILSAFE", "Küme Arıza Koruma Modu");

define("_CLUSTERMAXCURRENTLESSTHAN10", "Küme Maksimum Geçerli değeri 10&#39dan az olmamalıdır");
define("_CLUSTERMAXCURRENTMORETHAN", "Küme Maksimum Geçerli değer bu değere eşit veya daha az olmalıdır:");