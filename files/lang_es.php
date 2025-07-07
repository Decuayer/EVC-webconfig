<?php
include_once "access_control.php";
define("_LOGIN", "INICIAR SESIÓN");
define("_USERNAME", "Nombre de Usuario:");
define("_PASSWORD", "Contraseña:");
define("_CHANGEPASSWORD", "Cambiar la contraseña");
define("_CURRENTPASSWORD", "Contraseña Actual:");
define("_NEWPASSWORD", "Nueva Contraseña:");
define("_CONFIRMNEWPASSWORD", "Confirmar la nueva contraseña:");
define("_SUBMIT", "Enviar");
define("_CURRENTPASSWORDREQUIRED", "Se requiere la contraseña actual");
define("_PASSWORDREQUIRED", "Se requiere la contraseña");
define("_USERNAMEREQUIRED", "Se requiere el nombre de usuario");
define("_USERAUTHFAILED", "¡Ha fallado la autenticación de usuario!");
define("_USERNAMEORCURRENTPASSWORDWRONG", "¡El nombre de usuario o la contraseña actual son incorrectos!");
define("_DBACCESSFAILURE", "¡No se puede acceder a la base de datos!");
define("_CHANGEPASSWORDERROR", "¡Primero tiene que cambiar su contraseña!");
define("_SAMEPASSWORDERROR", "¡La contraseña actual y la nueva contraseña deberían ser diferentes la una a la otra!!");
define("_PASSWORDMATCHERROR", "¡Las contraseñas no coinciden!");
define("_CURRENTPASSWORDWRONG", "¡La contraseña actual es incorrecta!");
define("_PASSWORDERRORLEVEL2", "La contraseña no es válida, la longitud de caracteres debe ser 20 y contener al menos dos letras [A-Za-z], dos dígitos [0-9] y dos caracteres especiales [!%&/()=?*#+-_]");
define("_PASSWORDERRORLEVEL3", "La contraseña no es válida, la longitud de caracteres debe ser de al menos 12, máximo 32 caracteres y contiene al menos dos letras minúsculas [a-z] y dos mayúsculas [A-Z], dos números [0-9] y al menos dos caracteres especiales [!%&/()=?*#+-_].");
define("_LOGINLOCKOUT", "Demasiados intentos fallidos. Inténtelo después de 1800 segundos.");

define("_MAINPAGE", "Pagina principal");
define("_GENERAL", "Configuraciones Generales");
define("_OCPPSETTINGS", "Configuraciones de OCCP");
define("_NETWORKINTERFACES", "Interfaces de Red");

define("_OCPPCONNINTERFACE", "Interfaz de Conexión de OCCP : ");
define("_CONNECTIONSTATE", "Estado de Conexión : ");
define("_DISCONNECTED", "Desconectado");
define("_NEEDTOLOGINFIRST", "¡Primero tiene que iniciar sesión!");
define("_CONNECTED", "Conectado");
define("_CPSERIALNUMBER", "Número de Serie de CP  : ");
define("_HMISOFTWAREVERSION", "Versión de software de HMI : ");
define("_OCPPSOFTWAREVERSION", "Versión de software de OCPP : ");
define("_POWERBOARDSOFTWAREVERSION", "Versión de Software de Tarjeta de Potencia  : ");
define("_OCPPDEVICEID", "ID del Dispositivo OCPP : ");
define("_DURATIONAFTERPOWERON", "Duración después del encendido  : ");
define("_LOGOUT", "Cerrar sesión");
define("_PRESET", "Ajustes predefinidos:");

define("_OCPPCONNECTION", "Conexión OCPP");
define("_ENABLED", "Habilitado");
define("_DISABLED", "Deshabilitado");
define("_CONNECTIONSETTINGS", "Configuraciones de Conexión");
define("_CENTRALSYSTEMADDRESS", "Dirección del Sistema Central ");
define("_CHARGEPOINTID", "ID del Punto de Carga ");
define("_OCPPVERSION", "Versión de OCPP");
define("_SAVE", "Guardar");
define("_SAVESUCCESSFUL", "Se ha guardado con éxito.");
define("_CENTRALSYSTEMADDRESSERROR", "Se requiere la dirección del sistema central!");
define("_CHARGEPOINTIDERROR", "Se requiere ID de punto de carga!");
define("_SECONDS", "Segundos");
define("_ADD", "Añadir");
define("_REMOVE", "Eliminar");
define("_SAVECAPITAL", "GUARDAR");
define("_CANCEL", "Cancelar");

define("_CELLULAR", "Cellular");
define("_INTERFACEIPADDRESS", "Dirección IP de Interfaz: ");
define("_ICCID", "ICCID: ");
define("_IMSI", "IMSI: ");
define("_IMEI", "IMEI: ");
define("_APNNAME", "Nombre del APN: ");
define("_APNUSERNAME", "Nombre de Usuario del APN: ");
define("_APNPASSWORD", "Contraseña del APN: ");
define("_IPSETTING", "Configuración de IP: ");
define("_IPADDRESS", "Direcciones IP: ");
define("_NETWORKMASK", "Máscara de Red: ");
define("_DEFAULTGATEWAY", "Con: ");
define("_PRIMARYDNS", "DNS Primario: ");
define("_SECONDARYDNS", "DNS Secundario: ");
define("_WIFI", "WLAN");
define("_SECURITY", "Seguridad: ");
define("_SECURITYTYPE", "Seleccionar tipo de seguridad");
define("_NONE", "Ninguno");
define("_SELECTMODE", "Por favor elija un modo!");
define("_RFIDLOCALLIST", "Lista Local de RFID");
define("_ACCEPTALLRFIDS", "Aceptar Todos RFID");
define("_MANAGERFIDLOCALLIST", "Administrar Lista Local de RFID:");
define("_AUTOSTART", "Autoarranque");
define("_PROCESSING", "Procesando... Espere por favor...");
define("_MACADDRESS", "Dirección MAC: ");
define("_WIFIHOTSPOT", "Punto de acceso wifi");
define("_TURNONDURINGBOOT", "Encienda durante el arranque: ");
define("_AUTOTURNOFFTIMEOUT", "Tiempo de espera de apagado automático: ");
define("_AUTOTURNOFF", "Apagado automático: ");
define("_HOTSPOTALERTMESSAGE", "Los cambios en la configuración del hotspot entrarán en vigor la próxima vez que encienda el dispositivo. ");
define("_HOTSPOTREBOOTMESSAGE", "¿Quieres reiniciar ahora? ");

define("_DOWNLOADACLOGS", "Descargar Registros de AC");
define("_DOWNLOADCELLULARLOGS", "Descargar Registros de Módulo Celular");
define("_DOWNLOADPOWERBOARDLOGS", "Descargar Registros de Tarjeta de Potencia");
define("_PASSWORDRESETSUCCESSFUL", "Su contraseña ha sido restablecida con éxito.");
define("_DBOPENEDSUCCESSFULLY", "Se abrió con éxito la base de datos\n");
define("_WSSCERTSSETTINGS", "Configuración de Certificados WSS ");
define("_CONFKEYS", "Teclas de Configuración");
define("_KEY", "Tecla");
define("_STATIC", "Estática");
define("_TIMEZONE", "Zona horaria");
define("_PLEASESELECTTIMEZONE", "Por favor elija Zona horaria");
define("_DISPLAYSETTINGS", "Configuración del Display");
define("_DISPLAYLANGUAGE", "Idioma de la pantalla");
define("_BACKLIGHTDIMMING", "Atenuación de Luz de Fondo : ");
define("_PLEASESELECT", "Por favor, seleccione");
define("_TIMEBASED", "Basado En Tiempo");
define("_SENSORBASED", "Basado En Sensor");
define("_BACKLIGHTDIMMINGLEVEL", "Nivel de Atenuación de Luz de Fondo : ");
define("_BACKLIGHTTHRESHOLD", "Umbral de Luz de Fondo  : ");
define("_SETMIDTHRESHOLD", "SetMidThreshold");
define("_SETHIGHTHRESHOLD", "SetHighThresold");
define("_LOCALLOADMANAGEMENT", "Gestión de Carga Local");
define("_MINIMUMCURRENT", "Corriente Mínima: ");
define("_FIFOPERCENTAGE", "Porcentaje de FIFO: ");
define("_GRIDMAXCURRENT", "Corriente Máxima de Red: ");
define("_MASTERIPADDRESS", "Dirección IP del Maestro: ");
define("_BACKLIGHTTIMESETTINGS", "Ajustes de Hora de Luz de Fondo: ");
define("_SHOULDSELECTTIMEZONE", "* ¡Tiene que seleccionar la zona horaria!");
define("_MINIMUMCURRENTREQUIRED", "* ¡Se requiere corriente mínima!!");
define("_CURRENTMUSTBENUMERIC", "* ¡Corriente debe ser numérica!");
define("_FIFOPERCREQUIRED", "* ¡Se requiere porcentaje de FIFO!");
define("_FIFOPERCSHOULDBETWEEN", "* ¡Porcentaje de FIFO debe estar entre 0 y 100!");
define("_PERCMUSTBENUMERIC", "* ¡Porcentaje debe ser numérico!");
define("_GRIDMAXCURRENTREQUIRED", "* ¡Se requiere la máxima corriente de red!");
define("_GRIDCURRENTMUSTBENUMERIC", "* ¡Corriente de red debe ser numérica!");
define("_IPADDRESSOFMASTERREQUIRED", "* ¡Se requiere dirección IP de maestro!");
define("_INVALIDIPADDRESS", "* ¡Ha introducido una dirección IP inválida!");
define("_SAMENETWORKLAN", "* Ha introducido una dirección IP en la misma red con LAN!");
define("_SAMENETWORKWLAN", "* Ha introducido una dirección IP en la misma red con WLAN!");
define("_APNISREQUIRED", "¡Se requiere APN!");
define("_IPADDRESSREQUIRED", "¡Se requiere dirección IP!");
define("_NETWORKMASKREQUIRED", "¡Se requiere máscara de red!");
define("_INVALIDNETWORKMASK", "* ¡Ha introducido una máscara de red inválida!");
define("_DEFAULTGATEWAYREQUIRED", "¡Se requiere puerta de acceso por defecto!");
define("_INVALIDGATEWAY", "¡Ha introducido una puerta de acceso por defecto inválida!");
define("_PRIMARYDNSREQUIRED", "¡Se requiere dns primario!");
define("_INVALIDDNS", "¡Ha introducido un dns primario inválido!");
define("_SELECTIPSETTING", "Por favor elija la configuración de IP.");
define("_SSIDREQUIRED", "¡Se requiere SSID!");
define("_PASSWORDISREQUIRED", "¡\"Se requiere la contraseña!");
define("_WIFIPASSWORDERROR", "La contraseña no es válida, la longitud de los caracteres debe tener un mínimo de 8 y un máximo de 63 <br> caracteres válidos a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL2", "&#8226; La contraseña no es válida, la longitud de caracteres debe ser 20,<br>&#8226; La contraseña debe contener al menos dos letras [A-Za-z],<br>&#8226; La contraseña debe contener al menos dos dígitos [0-9],<br>&#8226; La contraseña debe contener al menos dos caracteres especiales [!%&/()=?*#+-_]");
define("_WIFIHOTSPOTPASSWORDERRORLEVEL3", "&#8226; La contraseña no es válida, la longitud de caracteres debe ser al menos 12, máximo 32,<br>&#8226; La contraseña debe contener al menos dos letras minúsculas [a-z], <br>&#8226; La contraseña debe contener al menos dos letras mayúsculas [A-Z], <br>&#8226; La contraseña debe contener al menos dos dígitos [0-9],<br>&#8226; La contraseña debe contener al menos dos caracteres especiales [!%&/()=?*#+-_]");

define("_WIFISSIDERROR", "SSID no es válido, caracteres válidos a..z A..Z 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");
define("_SELECTSECURITYTYPE", "Por favor elija tipo de seguridad");
define("_HOSTIPREQUIRED", "* ¡Se requiere Host IP!");
define("_CERTMANREQUIRED", "* ¡Se requiere la administración de certificación!!");
define("_OCPPENABLEALERT", "En caso de que desee utilizar su estación de carga en Modo Autónomo,<br>primero debe desactivar la conexión OCPP<br>desde el &#39Menú de Configuración de OCPP.");
define("_NOTSAVEDALERT", "La página no fue guardada.");
define("_SAVEQUESTION", "¿Desea guardar los cambios?");
define("_OKBUTTON", "OK");
define("_LTECONNECTIONCONFIRM", "Se desactivará la conexión móvil. ¿Desea confirmarlo?");
define("_WIFICONNECTIONCONFIRM", "Se desactivará la conexión Wi-Fi. ¿Desea confirmarlo?");
define("_DHCPSERVERCONNECTIONCONFIRM", "Si desea habilitar el servidor DHCP de LAN,<br>primero debe deshabilitar el punto de acceso Wi-Fi<br>desde &#39Punto de acceso Wi-Fi&#39.");
define("_WIFIHOTSPOTCONNECTIONCONFIRM", "Si desea habilitar el punto de acceso Wi-Fi,<br>primero debe deshabilitar el servidor DHCP de LAN<br>desde &#39Configuración de IP de LAN&#39.");

define("_DYNAMIC", "Dinámico");
define("_DIAGNOSTICS", "Diagnósticos");
define("_LOCALLOAD", "Gestión de Carga Local");
define("_DOWNLOAD", "Descargar");
define("_STARTDATE", "Fecha de Inicio");
define("_ENDDATE", "Fecha de Fin");
define("_CLEAREVENTLOGS", "Eliminar Todos los Registros de Eventos");
define("_CLEAREVENTLOGSINFO", "¡Esto eliminará todos los registros de eventos!");
define("_DOWNLOADEVENTLOGSINFO", "Descargar los registros de eventos del dispositivo para un período máximo de 5 días");
define("_DEVICEEVENTLOGS", "Registros de Eventos del Dispositivo");
define("_DEVICECHANGELOGS", "Registros de Cambios del Dispositivo");
define("_LOGSDATEERROR", "Seleccione fechas para un período máximo de 5 días.");
define("_DOWNLOACHANGELOGS", "Descargar Registros de Cambios del Dispositivo");
define("_VPNFUNCTIONALITY", "Funcionalidad de VPN: ");
define("_CERTMANAGEMENT", "Gestión de certificaciones: ");
define("_NAME", "Nombre: ");
define("_CONNECTIONINTERFACE", "Interfaz de Conexión ");
define("_ANY", "Cualquiera");
define("_OCPPCONNPARAMETERS", "Parámetros de Configuración de OCPP");
define("_SETDEFAULT", "Establecer Valores Predeterminados  ");
define("_STANDALONEMODE", "Modo Autónomo");
define("_STANDALONEMODETITLE", "Modo Autónomo:");
define("_STANDALONEMODENOTSELECTED", "* Modo autónomo no se puede seleccionar dado que OCPP está activado.");
define("_CHARGERWEBUI", "Interfaz de Usuario de Web de Cargador");
define("_SYSTEMMAINTENANCE", "Mantenimiento del Sistema");
define("_HOSTIP", "IP del host: ");
define("_PASSWORDERRORLEVEL1", "¡La contraseña no es válida, la longitud de los caracteres debe tener un mínimo de 6 caracteres y contener al menos 1 letra minúscula, 1 letra mayúscula y 1 carácter numérico!");
define("_SELECTBACKLIGHTDIMMING", "* ¡Tiene que seleccionar la atenuación de luz de fondo!");
define("_ISREQUIRED", "¡Se requiere!");
define("_ISNOTVALID", "¡no es válido!");
define("_ISDUPLICATED", "¡esta duplicado!");
define("_MUSTBENUMERIC", "¡debe ser numérico!");
define("_VPNFUNCTIONALITYREQUIRED", "* ¡Se requiere la funcionalidad de Vpn!");
define("_VPNNAMEREQUIRED", "* ¡Se requiere el nombre de Vpn!");
define("_VPNPASSWORDREQUIRED", "* ¡Se requiere la contraseña de Vpn!");
define("_EXPLANATION", "Indica el campo obligatorio..");
define("_FIRMWAREUPDATE", "Actualizaciones de Firmware");
define("_BACKUPRESTORE", "Configuración de Respaldo y Recuperación");
define("_SYSTEMRESET", "Restablecimiento del Sistema");
define("_CHANGEADMINPASSWORD", "Contraseña de Administración");
define("_FACTORYRESET", "Valores de Fábrica");
define("_FACTORYRESETBUTTON", "Restablecimiento de fábrica");
define("_FACTORYDEFAULTCONFIGURATION", "Configuración de Valores de Fábrica");
define("_LOGFILES", "Ficheros de Registro");
define("_BACKUPFILE", "Fichero de Respaldo");
define("_RESTOREFILE", "Restaurar el Fichero de Configuración");
define("_FREEMODEMAXCHARACTER", "debe tener un máximo de 32 caracteres");
define("_RESTOREMESSAGE", "¿Confirmas para aplicar cambios y reiniciar ahora?");

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

define("_PASSWORDTYPEEXPLANATION", "Su contraseña debe tener 6 caracteres y debe contener al menos una letra
mayúscula, una letra minúscula y un dígito numérico.");
define("_PASSWORDTYPEEXPLANATIONLEVEL2", "Su contraseña debe tener 20 caracteres y debe contener al menos dos letras,
dos números y dos caracteres especiales.");
define("_PASSWORDTYPEEXPLANATIONLEVEL3", "Su contraseña debe tener un mínimo de 12, un máximo de 32 caracteres y debe contener al menos dos letras mayúsculas,
dos letras minúsculas, dos dígitos numéricos y dos caracteres especiales.");

define("_BACKTOLOGIN", "Volver al Inicio de Sesión");
define("_CHANGE", "Cambiar");
define("_SYSTEMADMINISTRATION", "Administración de Sistema");
define("_UPDATE", "Actualizar");
define("_CONFIRM", "Confirmar ");
define("_FACTORYDEFAULTCONFIRM", "¿Está seguro de restablecer los valores predeterminados en la fábrica?");
define("_FILENAME", "Nombre del Archivo");
define("_UPLOAD", "Subir");
define("_SELECTFIRMWARE", "Seleccione desde PC el Archivo de Actualización del Firmware");
define("_FIRMWAREFILESIZE", "Por favor, controle el tamaño del archivo del firmware.");
define("_FIRMWAREFILETYPE", "Por favor, controle el tipo del archivo del firmware.");

define("_LESSTHANOREQUAL4", "debe estar entre 1 y 4");
define("_LESSTHANOREQUAL20", "debe ser menos o igual a 20");
define("_LESSTHANOREQUAL65000", "debe ser menos o igual a 65000");
define("_LESSTHANOREQUAL300", "debe ser menos o igual a 300");
define("_LESSTHANOREQUAL86500", "debe ser menos o igual a 86500");
define("_LESSTHANOREQUAL10000", "debe ser menos o igual a 10000");
define("_LESSTHANOREQUAL22", "debe ser menos o igual a 22");
define("_LESSTHANOREQUAL10", "debe ser menos o igual a 10");
define("_LESSTHANOREQUAL600", "debe ser menos o igual a 600");
define("_LESSTHANOREQUAL120", "debe ser menos o igual a 120");
define("_HIGHTHANOREQUAL0", "debe ser mayor o igual a 0");
define("_CHANGEPASSWORDSUGGESTION", "Le aconsejamos que cambie su contraseña predeterminada desde el menú de mantenimiento del sistema");

define("_FILESIZE", "Por favor, controle el tamaño del archivo..");
define("_FILETYPE", "Por favor, controle el tipo del archivo..");

define("_BACKUPVERSIONCHECK", "La versión de este archivo no es adecuada para el dispositivo..");
define("_HARDRESETCONFIRM", "¿ Está usted seguro de reinicio Duro ?");
define("_SOFTRESETCONFIRM", "¿ Está usted seguro de reinicio Blando ?");
define("_NEWSETUP", "Por favor, para la nueva configuración utilice el manual del usuario.");
//
define("_LOADMANAGEMENT", "Administración de Carga");
define("_CPROLE", "Papel de Cp");
define("_GRIDSETTINGS", "Configuraciones de Red");
define("_LOADMANAGEMENTMODE", "Modo de Administración de Carga");
define("_LOADMANAGEMENTGROUP", "Grupo de Administración de Carga");
define("_LOADMANAGEMENTOPTION", "Opción de gestión de carga");

define("_ALARMS", "Alarmas");

define("_LOGOSETTINGS", "Configuración del logotipo");
define("_USELOGO", "Seleccione el archivo de logotipo");
define("_LOGOTYPE", "Por favor seleccione un logotipo con formato png.");
define("_LOGODIMENSION", "El tamaño máximo permitido del logotipo es 80 x 80, <br> por favor seleccione un logotipo con el tamaño adecuado.");

define("_SERVICECONTACTINFO", "Mostrar información de contacto de servicio");
define("_SERVICECONTACTINFOCHARACTER", "La información de contacto de servicio de la pantalla debe tener un máximo de 25 caracteres!<br>Caracteres válidos a..z 0..9 .+@*");

define("_SCREENTHEME", "Tema de pantalla");
define("_DARKBLUE", "Azul Oscuro");
define("_ORANGE", "Naranja");
define("_PLEASEENTERRFIDLOCALLIST", "¡Ingrese la lista local RFID!");

define("_MASTER", "Maestro");
define("_SLAVE", "Esclavo");
define("_TOTALCURRENTLIMIT", "Límite de corriente total por fase");
define("_SUPPLYTYPE", "Tipo de alimentación");
define("_FIFOPERCANTAGE", "FIFO Percentage");
define("_TIC", "TIC");
define("_EQUALLYSHARED", "Igualmente compartido");
define("_COMBINED", "Conjunto");
define("_TOTALCURRENTLIMITERROR", "¡Se requiere límite de corriente total por fase!");
define("_LESSTHAN1024", "debe ser menor de 1024");
define("_ATLEAST0","debe ser al menos 0");
define("_MORETHAN12", "debe ser más de 12");
define("_CHOOSEONE", "Elija uno");
define("_SLAVEMINCHCURRENT", "Configuración de corriente de carga a prueba de fallas fuera de línea");
define("_SERIALNO", "Número de serie");
define("_CONNECTORSTATE", "Estado del conector");
define("_NUMBEROFPHASES", "Numero de fases");
define("_PHASECONSEQUENCE", "Secuencia de conexión de fase");
define("_VIP", "Carga VIP");
define("_CPMODE", "CP Mode");
define("_VIPERROR", "Se requiere carga VIP");
define("_PHASECONSEQUENCEERROR", "Se requiere secuencia de conexión de fase!");
define("_CPMODEERROR", "¡Se requiere el modo CP!");
define("_SUPPORTEDCURRENT", "Corriente admitida");
define("_INSTANTCURPERPHASE", "Fase actual instantánea");
define("_FIFOCHARGINGPERCENTAGE", "Porcentaje de carga FIFO");
define("_MINIMUMCURRENT1P", "Corriente de carga mínima monofásica");
define("_MINIMUMCURRENT3P", "Corriente de carga mínima trifásica");
define("_MAXIMUMCURRENT", "Corriente de carga máxima");
define("_STEP", "Paso");
define("_UPDATEDLMGROUP", "Actualizar Grupo DLM");
define("_MAINCIRCUITCURRENT", "Corriente máxima de red");
define("_MAINCIRCUITCURRENTERROR", "¡Se requiere corriente de red máxima!");
define("_DLMMAXCURRENT", "Límite de corriente total DLM por fase");
define("_DLMMAXCURRENTERROR", "¡Se requiere el límite de corriente total DLM por fase!");
define("_DLMMAXCURRENTMORETHANMAIN", "El límite de corriente total de DLM debe ser más de la mitad de la corriente del disyuntor principal");
define("_DLMMAXCURRENTLESSTHANMAIN", "El límite de corriente total de DLM debe ser menor que la corriente del disyuntor principal");

define("_DHCPSERVER", "Servidor DHCP");
define("_DHCPCLIENT", "Cliente DHCP");

define("_MAXDHCPADDRRANGE", "Dirección IP final del servidor DHCP");
define("_MINDHCPADDRRANGE", "Dirección IP de inicio del servidor DHCP");

define("_MAXDHCPADDRRANGEERROR", "¡Se necesita la dirección IP final del servidor DHCP!");
define("_MINDHCPADDRRANGEERROR", "¡Se necesita la dirección IP de inicio del servidor DHCP!");
define("_DIFFERENCEBETWEENMAXANDMINADDRRANGE", "La dirección IP final del servidor DHCP debe ser mayor que la dirección IP de inicio del servidor DHCP");
define("_IPADDRESSRANGE", "La dirección IP no puede tomar un valor entre las direcciones IP inicial y final del servidor DHCP");

define("_CELLULARGATEWAY", "Puerta de enlace celular");
define("_INVALIDSUBNET", "La dirección IP no está en la verdadera subred");

define("_CONNECTIONSTATUS", "Estado de conexión");

define("_INSTALLATIONSETTINGS", "Configuración de la instalación");
define("_EARTHINGSYSTEM", "Sistema de puesta a tierra");
define("_CURRENTLIMITERSETTINGS", "Ajuste de limitador de corriente");
define("_CURRENTLIMITERPHASE", "Fase del limitador de corriente");
define("_CURRENTLIMITERVALUE", "Valor del limitador actual");
define("_UNBALANCEDLOADDETECTION", "Detección de carga desequilibrada");
define("_EXTERNALENABLEINPUT", "Entrada de habilitación externa");
define("_LOCKABLECABLE", "Cable bloqueable");
define("_POWEROPTIMIZERTOTALCURRENTLIMIT", "Límite de corriente total del optimizador de energía");
define("_POWEROPTIMIZER", "Optimizador de energía");
define("_TNORTT", "TN/TT");
define("_SPLITPHASE", "IT/Split Phase");
define("_ONEPHASE", "Una fase");
define("_THREEPHASE", "Trifásico");
define("_POWEROPTIMIZERTOTALCURRENTLIMITMORETHANOREQUAL16", "El límite de corriente total <br> del optimizador de energía <br> debe ser mayor o igual a 16");
define("_POWEROPTIMIZERTOTALCURRENTLIMITLESSTHANOREQUAL100", "El límite de corriente total <br> del optimizador de energía <br> debe ser menor o igual a 100");
define("_FOLLOWTHESUN", "Sigue el sol");
define("_FOLLOWTHESUNMODE", "Sigue el modo sol");
define("_AUTOPHASESWITCHING", "Cambio de fase automático");
define("_MAXHYBRID", "Híbrida máxima");
define("_SUNONLY", "Sol solamente");
define("_SUNHYBRID", "Híbrido solar");

define("_DISPLAYBACKLIGHTSETTINGS", "Ajustes de la luz de fondo de la pantalla");
define("_BACKLIGHTLEVEL", "Nivel de la luz de fondo");
define("_SUNRISETIME", "Hora del amanecer ");
define("_SUNSETTIME", "Hora del atardecer");

define("_HIGH", "Alto");
define("_MID", "Medio");
define("_LOW", "Bajo");

define("_A", " (A)");

define("_CURRENTLIMITERVALUELESSTHAN8", "* Cuando EVReadySupport está activado y la fase límite actual es una fase, ¡el valor límite actual no puede ser inferior a 8!");
define("_CURRENTLIMITERVALUELESSTHAN14", "* Cuando EVReadySupport está activado y la fase de límite de corriente es trifásica, ¡el valor de límite de corriente no puede ser inferior a 14!");
define("_LEDDIMMINGSETTINGS", "Configuración de atenuación de Led");
define("_LEDDIMMINGLEVEL", "Nivel de atenuación Led");
define("_VERYLOW", "Muy baja");
define("_WARNINGFORLTEENABLED", "El modo de configuración de IP de la interfaz LAN se establecerá como estático y el servidor DHCP se activará.");
define("_WARNINGFORLTEDISABLED", "El modo de configuración de IP de la interfaz LAN se establecerá como Cliente DHCP y el servidor DHCP se desactivará.");
define("_ACCEPTQUESTION", "¿Aceptas los cambios?");

define("_CELLULARGATEWAYCONFIRM", "La puerta de enlace celular se desactivará.");

define("_ETHERNETIP", "IP de la interfaz Ethernet:");
define("_WLANIP", "IP de interfaz WLAN:");
define("_STRENGTH", "Fortaleza: ");
define("_WIFIFREQ", ", Frecuencia: ");
define("_WIFILEVEL", ", El Nivel: ");
define("_CELLULARIP", "IP de interfaz celular:");
define("_CELLULAROPERCODE" , ", Operadora: ");
define("_CELLULARTECH" , ", Tecnología: ");
define("_SCANNETWORKS" , "Escanear Redes");
define("_AVAILABLENETWORKS" , "Redes Disponibles");
define("_NETWORKSTATUS" , "Estado de la Red");
define("_PLEASEWAITMSG" , "Por favor, espere...");
define("_SCANNINGWIFIMSG" , "Escaneando Redes Wi-Fi");
define("_NOWIFIFOUNDMSG" , "No se encontraron Redes Wi-Fi");
define("_PLEASECHECKWIFICONNMSG" , "Por favor, verifique su conexión Wi-Fi e intente nuevamente.");

define("_APPLICATIONRESTART", "Este cambio requiere reiniciar la aplicación.");

define("_QRCODE", "Código QR de la pantalla");
define("_QRCODEONSCREEN", "Código QR en pantalla");
define("_QRCODEDELIMITER", "Delimitador de código QR");
define("_INVALIDDELIMITERCHARACTER", "El carácter delimitador del código QR no es válido,  el carácter de espacio en blanco no es aceptable, la longitud de los caracteres debe tener un mínimo de 1 y un máximo de 3, caracteres válidos 0..9 .,:;!#^+$%&/(){[]}=*?-_@<>|");

define("_LOCATION", "Localización");
define("_INDOOR", "Interior");
define("_OUTDOOR", "Exterior");
define("_POWEROPTIMIZEREXTERNALMETER", "Medidor Externo");
define("_OPERATIONMODE", "Modo De Operación");
define("_AUTOSELECTED", "Seleccionado automáticamente");
define("_NOTSELECTED", "No seleccionada");
define("_CHARGINGMODESELECTIONANDPOWEROPTIMIZERCONF", "Selección Del Modo de Carga y Configuración Del Optimizador de Energía");

define("_USERINTERACTION", "La interacción del usuario");
define("_STANDBYLEDBEHAVIOUR", "Comportamiento del LED en espera");
define("_OFF", "Apagada");
define("_ON", "En");

define("_LOADSHEDDINGMINIMUMCURRENT", "Corriente mínima de deslastre de carga");
define("_UNBALANCEDLOADDETECTIONMAXCURRENT", "Corriente máxima de detección de carga desequilibrada");

define("_SCHEDULEDCHARGING", "Carga programada");
define("_OFFPEAKCHARGING", "Carga fuera de pico");
define("_OFFPEAKCHARGINGWEEKENDS", "Fines de semana de carga fuera de horas pico");
define("_OFFPEAKCHARGINGPERIODS", "Períodos de carga fuera de horas pico");
define("_CONTINUECHARGINGENDPEAKINTERVAL", "Continuar la carga al final del intervalo de pico");
define("_CONTINUECHARGINGWITHOUTREAUTHAFTERPOWERLOSS", "Continuar la carga sin reautorización tras una pérdida de energía");


define("_RANDOMISEDDELAYMAXIMUMDURATION", "Retraso aleatorizado Máximo <br> Duración (segundos)");

define("_RANDOMISEDDELAYMAXIMUMDURATIONERROR", "* ¡Se requiere la duración máxima del retraso aleatorio!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONBENUMERIC", "* ¡La duración máxima del retraso aleatorio debe ser entero!");
define("_RANDOMISEDDELAYMAXIMUMDURATIONLIMIT", "* ¡La duración máxima del retraso aleatorio debe estar entre 0 y 1800");
define("_OFFPEAKCHARGINGPERIODSERROR", "* ¡Se requieren períodos de carga fuera de horas pico!");
define("_OFFPEAKCHARGINGPERIODSSAMETIMEERROR", "* La hora de inicio y finalización de carga fuera de pico no puede ser la misma!");
define("_OFFPEAKCHARGINGSECONDTIMEPERIOD", "Segundo período de tiempo de carga fuera de las horas pico");
define("_OFFPEAKDISABLEDCONFIRM", "La carga fuera de las horas pico se desactivará. ¿Desea confirmarlo?");
define("_SHOWSERVICECONTACTINFO", "Mostrar información de contacto de servicio adicional");
define("_EXTRASERVICECONTACTINFORMATION", "La información de contacto del servicio se muestra en las pantallas Conexión del cable de carga, Preparación para la carga, Inicialización y Espera de conexión");

define("_LOADSHEDDINGSTATUS", "Estado de deslastre de carga: ");
define("_ACTIVE", "Activo");
define("_INACTIVE", "Inactivo");
define("_POWEROPTIMIZEREXTERNALMETERENABLEALERT", "Si desea utilizar su opción de administración de carga en Modbus,<br>primero debe deshabilitar el límite de corriente total del optimizador de energía<br>desde &#39Selección del modo de carga y configuración del optimizador de energía&#39.");
define("_MODBUSALERT", "Si desea habilitar su medidor externo Power Optimizer,<br>primero debe desactivar Modbus<br>desde &#39Gestión de carga local&#39.");
define("_POWEROPTIMIZERDLMENABLEALERT", "Si desea utilizar su Opción de Gestión de Carga en Master/Slave,<br>primero debe desactivar el Optimizador de Potencia de<br>&#39Selección de Modo de Carga y Configuración del Optimizador de Potencia&#39.");
define("_DLMALERT", "Si deseas habilitar tu Optimizador de Potencia,<br>primero debes desactivar Master/Slave<br>en &#39Gestión Local de Carga&#39.");

define("_FOLLOWTHESUNDLMENABLEALERT", "Si desea utilizar su Opción de Gestión de Carga en Master/Slave,<br>primero debe desactivar el Sigue el sol de<br>&#39Selección de Modo de Carga y Configuración del Optimizador de Potencia&#39.");
define("_DLMALERTFOLLOWTHESUN", "Si deseas habilitar tu Sigue el sol,<br>primero debes desactivar Master/Slave<br>en &#39Gestión Local de Carga&#39.");

define("_RESETUSERPASSWORD", "Restablecer <br> contraseña de <br> usuario");
define("_INSTALLATIONERRORENABLEDCONFIRM", "Si desea deshabilitar la habilitación de errores de instalación,<br>primero debe configurar el Sistema de conexión a tierra desde &#39Configuración de instalación&#39 a TI/Fase dividida.");
define("_EARTHINGSYSTEMCONFIRM", "Si desea configurar el Sistema de puesta a tierra en TN/TT,<br>primero debe habilitar Habilitar error de instalación desde &#39Configuración de OCPP&#39.");

define("_AUTHKEYMAXLIMIT", "la longitud debe ser de máximo 40 caracteres.");
define("_AUTHORIZATIONKEYEMPTYCONFIRM", "El campo Authorization Key está vacío.<br>¿Confirma los cambios?");

define("_RANDOMISEDDELAYATOFFPEAKEND", "Retraso aleatorizado en el final de temporada baja");
define("_FIFO", "FIFO");
define("_FAILSAFECURRENT", "Corriente a prueba de fallas");
define("_FAILSAFECURRENTERROR", "¡Se requiere corriente a prueba de fallas!");
define("_FAILSAFECURRENTLESSTHAN0", "* ¡El valor de corriente a prueba de fallos no debe ser inferior a 0!");
define("_FAILSAFECURRENTMORETHAN32", "* ¡El valor de corriente a prueba de fallos no debe ser superior a 32!");
define("_FAILSAFECURRENTMORETHAN50", "* ¡El valor de corriente a prueba de fallos no debe ser superior a 50!");

define("_LOCALCHARGESESSION", "Sesiones de carga local");
define("_ROWNUMBER", "Fila No");
define("_SESSIONUUID", "ID de cargo");
define("_AUTHORIZATIONUID", "código RFID");
define("_HORA DE INICIO", "Hora de inicio");
define("_STOPTIME", "Hora de Fin");
define("_TOTALTIME", "Tiempo Total");
define("_ESTADO", "Estado");
define("_CHARGEPOINTIDS", "Número de enchufe");
define("_ENERGIAINICIAL", "EnergiaInicial(kWh)");
define("_LASTENERGY", "Última Energía(kWh)");
define("_TOTALENERGY", "Energia total(kWh)");
define("_DOWNLOADLOCALCHARGESESSIONLOGS", "Inicio de sesión completo en CSV");
define("_DOWNLOADFULLSESSIONLOGS", "Resumen de registro en CSV");
define("_STARTDATE", "fecha de inicio");
define("_ENDDATE", "fecha final");
define("_RFIDSELECTION", "selección de RFID");
define("_CLEAR", "clara");

define("_FALLBACKCURRENT", "Actual de respaldo");
define("_FALLBACKRANGE", "La corriente de retorno debe ser 0 o estar dentro del rango de ");
define("_DOWNLOADEEBUSLOGS", "Registros de EEBUS");
define("_PAIRINGENERGYMANAGER", "Habilitado para emparejamiento");
define("_PAIR", "Habilitar par");
define("_UNPAIR", "Desemparejar");
define("_EEBUS", "EEBUS");
define("_FIRMWAREVERSION", "Versión de firmware");
define("_EEBUSDISCOVERY", "Dispositivos descubiertos");
define("_REFRESH", "Refrescar");
define("_CPROLEMASTERREQUIREDFIELD", "Si desea actualizar la configuración del grupo de administración de carga, la función del punto de carga debe guardarse como &#39Maestro&#39 desde la configuración general de administración de carga.");

define("_LISTOFSLAVES", "Lista de esclavos");
define("_NUMBEROFSLAVES", "Número de esclavos");
define("_LISTOFCONNECTOR", "Lista de conectores");
define("_AVAILABLECURRENT", "Fase actual disponible");

define("_DLMINTERFACE", "Interfaz DLM");
define("_ETHERNET", "Ethernet");
define("_DLMINTERFACEERROR", "¡Habilite WiFi desde las interfaces de red!");

define("_MUSTBEINTEGER", "¡debe ser un entero!");
define("_GRIDBUFFER", "Porcentaje de margen de protección de la red");
define("_CHARGINGSTATUSALERT", "En el estado de carga, ¡no se puede actualizar el valor!");
define("_READUNDERSTAND", "Leí, entiendo");

define("_MORETHAN10", "Debe aumentar la Corriente Máxima de Red o disminuir el Porcentaje de Margen de Protección de Red antes de guardar esta configuración. El límite de Corriente Máxima de Red no puede ser inferior a 10 A cuando se utiliza el Porcentaje de Margen de Protección de Red.");

define("_CLUSTERMAXCURRENT", "Corriente máxima del clúster");
define("_CLUSTERFAILSAFECURRENT", "Actual de seguridad del clúster");
define("_CLUSTERMAXCURRENTERROR", "¡Se requiere corriente máxima del clúster!");
define("_CLUSTERFAILSAFECURRENTERROR", "¡Se requiere corriente de seguridad del clúster!");
define("_CLUSTERFAILSAFECURRENTLESSTHAN0", "¡El valor actual del clúster a prueba de fallos no debe ser inferior a 0!");
define("_CLUSTERFAILSAFECURRENTMORETHAN", "¡El valor de la corriente de seguridad del clúster debe ser menor que la corriente máxima de la red!");
define("_CLUSTERFAILSAFE", "Modo de seguridad del clúster");

define("_CLUSTERMAXCURRENTLESSTHAN10", "El valor de la corriente máxima del clúster no debe ser menor que 10");
define("_CLUSTERMAXCURRENTMORETHAN", "El valor actual máximo del clúster debe ser igual o menor que este valor:");