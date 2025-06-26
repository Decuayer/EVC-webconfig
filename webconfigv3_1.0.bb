DESCRIPTION = "WebConfig Menu for Vestel EVC04 Project"
SECTION = "apps"
DEPENDS = ""
LICENSE = "CLOSED"

FILESEXTRAPATHS_prepend := "${THISDIR}/files:"

S = "${WORKDIR}"

SRC_URI = "file://standaloneTab.php \
           file://changePassword.php \
           file://diagnosticsTab.php \
           file://downloadDeviceLogs.php \
           file://downloadChargeSessionsLogs.php \
           file://downloadFullSessionLogs.php \
           file://localChargeSessionTab.php \
           file://query_chargeSession.php \
           file://refresh.php \
           file://generalTab.php \
           file://index.php \
           file://index_main.php \
           file://interfaces.json \
           file://logout.php \
           file://mainPageTab.php \
           file://networkInterfacesTab.php \
           file://ocppSettingsTab.php \
           file://backupTab.php \
           file://factoryResetTab.php \
           file://firmwareUpdateTab.php \
           file://generalTabDisplay.php \
           file://generalTabLanguage.php \
           file://localLoadTab.php \
           file://logFilesTab.php \
           file://networkCellularTab.php \
           file://networkLanTab.php \
           file://networkWlanTab.php \
           file://networkWifiHotspotTab.php \
           file://ocppConnectionTab.php \
           file://systemResetTab.php \
           file://webLogoTab.php \
           file://php.ini \
           file://README \
           file://systemMaintenanceTab.php \
           file://zmq.so \
           file://css/background.png \
           file://css/download-icon.png \
	       file://css/upload-icon.png \
           file://css/factory-reset-icon.png \
           file://css/hard-reset.png \
           file://css/hmi-logs.png \
           file://css/soft-reset.png \
           file://css/wifi_level_0.png \
           file://css/wifi_level_1.png \
           file://css/wifi_level_2.png \
           file://css/wifi_level_3.png \
           file://css/wifi_level_4.png \
           file://css/jquery-ui.css \
           file://css/main.css \
           file://css/util.css \
           file://css/webconfig.css \
           file://css/bootstrap.css \
           file://css/bootstrap.min.css \
           file://fonts/font-awesome-4.7.0/css/font-awesome.css \
           file://fonts/font-awesome-4.7.0/css/font-awesome.min.css \
           file://fonts/font-awesome-4.7.0/fonts/FontAwesome.otf \
           file://fonts/font-awesome-4.7.0/fonts/fontawesome-webfont.eot \
           file://fonts/font-awesome-4.7.0/fonts/fontawesome-webfont.svg \
           file://fonts/font-awesome-4.7.0/fonts/fontawesome-webfont.ttf \
           file://fonts/font-awesome-4.7.0/fonts/fontawesome-webfont.woff \
           file://fonts/font-awesome-4.7.0/fonts/fontawesome-webfont.woff2 \
           file://fonts/raleway/Raleway-Black.ttf \
           file://fonts/raleway/Raleway-Bold.ttf \
           file://fonts/raleway/Raleway-Medium.ttf \
           file://fonts/raleway/Raleway-Regular.ttf \
           file://fonts/raleway/Raleway-SemiBold.ttf \
           file://fonts/opensans/OpenSans-Bold.ttf \
           file://fonts/opensans/OpenSans-BoldItalic.ttf \
           file://fonts/opensans/OpenSans-ExtraBold.ttf \
           file://fonts/opensans/OpenSans-ExtraBoldItalic.ttf \
           file://fonts/opensans/OpenSans-Italic.ttf \
           file://fonts/opensans/OpenSans-Light.ttf \
           file://fonts/opensans/OpenSans-LightItalic.ttf \
           file://fonts/opensans/OpenSans-Regular.ttf \
           file://fonts/opensans/OpenSans-Semibold.ttf \
           file://fonts/opensans/OpenSans-SemiboldItalic.ttf \
           file://js/jquery.js \
           file://js/jquery-3.7.1.min.js \
           file://js/jquery-ui.js \
           file://js/main.js \
           file://js/webconfig.js \
           file://js/bootstrap.min.js \
           file://js/jquery.min.js \
           file://js/jquery.cookie.js \
           file://languageController.php \
           file://ocppConfigurations.json \
           file://changePasswordInSystemMaintanence.php \
           file://backUpDBFile.php \
           file://lang_en.php \
           file://lang_tr.php \
           file://lang_de.php \
           file://lang_ro.php \
           file://lang_es.php \
           file://lang_fr.php \
           file://lang_it.php \
           file://lang_cz.php \
           file://lang_da.php \
           file://lang_fi.php \
           file://lang_he.php \
           file://lang_hu.php \
           file://lang_no.php \
           file://lang_pl.php \
           file://lang_sk.php \
           file://lang_sv.php \
           file://lang_nl.php \
           file://lang_ba.php \
           file://lang_bg.php \
           file://lang_gr.php \
           file://lang_hr.php \
           file://lang_me.php \
           file://lang_rs.php \
	       file://loadManagementTab.php \
	       file://loadManagementGroupTab.php \
	       file://query.php \
	       file://query_Eebus.php \
           file://query_connector.php \
	       file://serviceContactInfoTab.php \
	       file://generalTabTheme.php \
           file://generalTabDisplayBacklight.php \
           file://installationSettings.php \
           file://earthingSystemTab.php \
           file://unbalancedLoadDetectionTab.php \
           file://externalEnableInputTab.php \
           file://lockableCableTab.php \
           file://currentLimitterSettings.php \
           file://powerOptimizerCurrentLimit.php \
	       file://request.php \
           file://generalTabLedDimming.php \
           file://generalTabQRCode.php \
           file://generalTabStandbyLedBehaviour.php \
           file://loadSheddingMinimumCurrent.php \
           file://generalTabScheduledCharging.php \
           file://zmqHandler.php \
           file://optionsAndControls.php \
           file://downloadChangeLogs.php \
           file://checkDownloadStatus.php \
           file://check_session.php \
           file://access_control.php \
           file://documentationApproval.php \
           file://login.php \
           file://privacyDocumentTranslations.json \
           file://scanWifiNetworks.php \
"

FILES_${PN} = "/usr/share/webconfig/* \
               /etc/php/apache2-php7/php.ini \
               /usr/lib/php7/extensions/no-debug-non-zts-20160303/zmq.so \
"
RDEPENDS_${PN} = "\
	lighttpd \
	lighttpd-module-access \
	lighttpd-module-setenv \
	lighttpd-module-expire \
	lighttpd-module-cgi \
	lighttpd-module-compress \
	php-cgi \
	zeromq \
"

do_install() {
    install -d ${D}/usr/share/webconfig
    install ${WORKDIR}/standaloneTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/changePassword.php ${D}/usr/share/webconfig
    install ${WORKDIR}/diagnosticsTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/downloadDeviceLogs.php ${D}/usr/share/webconfig
    install ${WORKDIR}/downloadChargeSessionsLogs.php ${D}/usr/share/webconfig
    install ${WORKDIR}/downloadFullSessionLogs.php ${D}/usr/share/webconfig
    install ${WORKDIR}/localChargeSessionTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/query_chargeSession.php ${D}/usr/share/webconfig
    install ${WORKDIR}/refresh.php ${D}/usr/share/webconfig
    install ${WORKDIR}/generalTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/index.php ${D}/usr/share/webconfig/index.php
    install ${WORKDIR}/index_main.php ${D}/usr/share/webconfig
    install ${WORKDIR}/interfaces.json ${D}/usr/share/webconfig
    install ${WORKDIR}/logout.php ${D}/usr/share/webconfig
    install ${WORKDIR}/mainPageTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/networkInterfacesTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/ocppSettingsTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/backupTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/factoryResetTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/firmwareUpdateTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/generalTabDisplay.php ${D}/usr/share/webconfig
    install ${WORKDIR}/generalTabLanguage.php ${D}/usr/share/webconfig
    install ${WORKDIR}/localLoadTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/logFilesTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/networkCellularTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/networkLanTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/networkWlanTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/networkWifiHotspotTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/ocppConnectionTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/systemResetTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/webLogoTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/README ${D}/usr/share/webconfig
    install ${WORKDIR}/systemMaintenanceTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_en.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_tr.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_de.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_ro.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_es.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_fr.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_it.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_cz.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_da.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_fi.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_he.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_hu.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_no.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_pl.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_sk.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_sv.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_nl.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_ba.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_bg.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_gr.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_hr.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_me.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lang_rs.php ${D}/usr/share/webconfig
    install ${WORKDIR}/languageController.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/ocppConfigurations.json ${D}/usr/share/webconfig
    install ${WORKDIR}/changePasswordInSystemMaintanence.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/backUpDBFile.php ${D}/usr/share/webconfig
    install ${WORKDIR}/loadManagementTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/loadManagementGroupTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/query.php ${D}/usr/share/webconfig
    install ${WORKDIR}/query_Eebus.php ${D}/usr/share/webconfig
    install ${WORKDIR}/query_connector.php ${D}/usr/share/webconfig
    install ${WORKDIR}/serviceContactInfoTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/generalTabTheme.php ${D}/usr/share/webconfig
    install ${WORKDIR}/generalTabDisplayBacklight.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/installationSettings.php ${D}/usr/share/webconfig
    install ${WORKDIR}/earthingSystemTab.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/unbalancedLoadDetectionTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/externalEnableInputTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/lockableCableTab.php ${D}/usr/share/webconfig
    install ${WORKDIR}/currentLimitterSettings.php ${D}/usr/share/webconfig
    install ${WORKDIR}/powerOptimizerCurrentLimit.php ${D}/usr/share/webconfig
    install ${WORKDIR}/request.php ${D}/usr/share/webconfig
    install ${WORKDIR}/generalTabLedDimming.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/generalTabQRCode.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/generalTabStandbyLedBehaviour.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/loadSheddingMinimumCurrent.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/generalTabScheduledCharging.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/zmqHandler.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/optionsAndControls.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/downloadChangeLogs.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/checkDownloadStatus.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/check_session.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/access_control.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/documentationApproval.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/login.php  ${D}/usr/share/webconfig
    install ${WORKDIR}/privacyDocumentTranslations.json  ${D}/usr/share/webconfig
    install ${WORKDIR}/scanWifiNetworks.php ${D}/usr/share/webconfig

    install -d ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/background.png ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/download-icon.png ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/upload-icon.png ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/factory-reset-icon.png ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/hard-reset.png ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/hmi-logs.png ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/soft-reset.png ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/wifi_level_0.png ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/wifi_level_1.png ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/wifi_level_2.png ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/wifi_level_3.png ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/wifi_level_4.png ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/jquery-ui.css ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/main.css ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/util.css ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/webconfig.css ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/bootstrap.css ${D}/usr/share/webconfig/css
    install ${WORKDIR}/css/bootstrap.min.css ${D}/usr/share/webconfig/css
    ln -s -r ${D}/run/media/mmcblk1p3/weblogo.png ${D}/usr/share/webconfig/css/weblogo.png

    install -d ${D}/usr/share/webconfig/fonts/font-awesome-4.7.0/css
    install ${WORKDIR}/fonts/font-awesome-4.7.0/css/font-awesome.css ${D}/usr/share/webconfig/fonts/font-awesome-4.7.0/css
    install ${WORKDIR}/fonts/font-awesome-4.7.0/css/font-awesome.min.css ${D}/usr/share/webconfig/fonts/font-awesome-4.7.0/css

    install -d ${D}/usr/share/webconfig/fonts/font-awesome-4.7.0/fonts
    install ${WORKDIR}/fonts/font-awesome-4.7.0/fonts/FontAwesome.otf ${D}/usr/share/webconfig/fonts/font-awesome-4.7.0/fonts
    install ${WORKDIR}/fonts/font-awesome-4.7.0/fonts/fontawesome-webfont.eot ${D}/usr/share/webconfig/fonts/font-awesome-4.7.0/fonts
    install ${WORKDIR}/fonts/font-awesome-4.7.0/fonts/fontawesome-webfont.svg ${D}/usr/share/webconfig/fonts/font-awesome-4.7.0/fonts
    install ${WORKDIR}/fonts/font-awesome-4.7.0/fonts/fontawesome-webfont.ttf ${D}/usr/share/webconfig/fonts/font-awesome-4.7.0/fonts
    install ${WORKDIR}/fonts/font-awesome-4.7.0/fonts/fontawesome-webfont.woff ${D}/usr/share/webconfig/fonts/font-awesome-4.7.0/fonts
    install ${WORKDIR}/fonts/font-awesome-4.7.0/fonts/fontawesome-webfont.woff2 ${D}/usr/share/webconfig/fonts/font-awesome-4.7.0/fonts

    install -d ${D}/usr/share/webconfig/fonts/raleway
    install ${WORKDIR}/fonts/raleway/Raleway-Black.ttf ${D}/usr/share/webconfig/fonts/raleway
    install ${WORKDIR}/fonts/raleway/Raleway-Bold.ttf ${D}/usr/share/webconfig/fonts/raleway
    install ${WORKDIR}/fonts/raleway/Raleway-Medium.ttf ${D}/usr/share/webconfig/fonts/raleway
    install ${WORKDIR}/fonts/raleway/Raleway-Regular.ttf ${D}/usr/share/webconfig/fonts/raleway
    install ${WORKDIR}/fonts/raleway/Raleway-SemiBold.ttf ${D}/usr/share/webconfig/fonts/raleway

    install -d ${D}/usr/share/webconfig/fonts/opensans
    install ${WORKDIR}/fonts/opensans/OpenSans-Bold.ttf ${D}/usr/share/webconfig/fonts/opensans
    install ${WORKDIR}/fonts/opensans/OpenSans-BoldItalic.ttf ${D}/usr/share/webconfig/fonts/opensans
    install ${WORKDIR}/fonts/opensans/OpenSans-ExtraBold.ttf ${D}/usr/share/webconfig/fonts/opensans
    install ${WORKDIR}/fonts/opensans/OpenSans-ExtraBoldItalic.ttf ${D}/usr/share/webconfig/fonts/opensans
    install ${WORKDIR}/fonts/opensans/OpenSans-Italic.ttf ${D}/usr/share/webconfig/fonts/opensans
    install ${WORKDIR}/fonts/opensans/OpenSans-Light.ttf ${D}/usr/share/webconfig/fonts/opensans
    install ${WORKDIR}/fonts/opensans/OpenSans-LightItalic.ttf ${D}/usr/share/webconfig/fonts/opensans
    install ${WORKDIR}/fonts/opensans/OpenSans-Regular.ttf ${D}/usr/share/webconfig/fonts/opensans
    install ${WORKDIR}/fonts/opensans/OpenSans-Semibold.ttf ${D}/usr/share/webconfig/fonts/opensans
    install ${WORKDIR}/fonts/opensans/OpenSans-SemiboldItalic.ttf ${D}/usr/share/webconfig/fonts/opensans

    install -d ${D}/usr/share/webconfig/js
    install ${WORKDIR}/js/jquery.js ${D}/usr/share/webconfig/js
    install ${WORKDIR}/js/jquery-3.7.1.min.js ${D}/usr/share/webconfig/js
    install ${WORKDIR}/js/jquery-ui.js ${D}/usr/share/webconfig/js
    install ${WORKDIR}/js/main.js ${D}/usr/share/webconfig/js
    install ${WORKDIR}/js/webconfig.js ${D}/usr/share/webconfig/js
    install ${WORKDIR}/js/bootstrap.min.js ${D}/usr/share/webconfig/js
    install ${WORKDIR}/js/jquery.min.js ${D}/usr/share/webconfig/js
    install ${WORKDIR}/js/jquery.cookie.js ${D}/usr/share/webconfig/js

    install -d ${D}/etc/php/apache2-php7
    install ${WORKDIR}/php.ini ${D}/etc/php/apache2-php7

    install -d ${D}/usr/lib/php7/extensions/no-debug-non-zts-20160303
    install ${WORKDIR}/zmq.so ${D}/usr/lib/php7/extensions/no-debug-non-zts-20160303

    chmod -R 700 ${D}/usr/share/webconfig/
}

