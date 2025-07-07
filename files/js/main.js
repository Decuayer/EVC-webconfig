
(function ($) {
    "use strict";


    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    $('.btn-show-pass').on('click', function(){
        const input = $(this).siblings('input');
        const icon = $(this).find('i');
        if(input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        }
        else {
            input.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
        
    });
    

})(jQuery);

// Decu Added

function toggleDropdownClass() {
    const dropdownLinks = document.querySelectorAll('.nav-item.dropdown > .nav-link');

    dropdownLinks.forEach(link => {
        if (window.innerWidth >= 768) {
            link.classList.remove('dropdown-toggle');
            link.removeAttribute('data-bs-toggle');

            if (!link.dataset.originalOnclick && link.getAttribute("onclick")) {
                link.dataset.originalOnclick = link.getAttribute("onclick");
            }
            if (link.dataset.originalOnclick) {
                link.setAttribute("onclick", link.dataset.originalOnclick);
            }

        } else {
            if (!link.classList.contains('dropdown-toggle')) {
                link.classList.add('dropdown-toggle');
            }
            if (!link.hasAttribute('data-bs-toggle')) {
                link.setAttribute('data-bs-toggle', 'dropdown');
            }

            if (!link.dataset.originalOnclick && link.getAttribute("onclick")) {
                link.dataset.originalOnclick = link.getAttribute("onclick");
            }
            link.removeAttribute("onclick");
        }
    });
}

window.addEventListener('DOMContentLoaded', toggleDropdownClass);
window.addEventListener('resize', toggleDropdownClass);

document.addEventListener("DOMContentLoaded", function () {
    const toggler = document.querySelector(".navbar-toggler");
    const collapseEl = document.getElementById("mainNav");

    if (!collapseEl || !toggler) return;


    let bsCollapse = bootstrap.Collapse.getInstance(collapseEl);
    if (!bsCollapse) {
        bsCollapse = new bootstrap.Collapse(collapseEl, { toggle: false });
    }

    toggler.addEventListener("click", function () {
        bsCollapse.toggle();
    });

    document.addEventListener("click", function (event) {
        const isClickInsideMenu = collapseEl.contains(event.target);
        const isClickOnToggler = toggler.contains(event.target);

        if (collapseEl.classList.contains("show") && !isClickInsideMenu && !isClickOnToggler) {
            bsCollapse.hide();
        }
    });

    collapseEl.querySelectorAll("a.const, a.dropdown-item").forEach(link => {
        link.addEventListener("click", function () {
            if (collapseEl.classList.contains("show")) {
                bsCollapse.hide();
            }
        });
    });
});

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})

document.addEventListener("DOMContentLoaded", function () {
    const tabBars = {
        General: [
            'languageSettingsBar',
            'displayBacklightSettingsBar',
            'ledDimmingSettingsBar',
            'standbyLedBehaviourBar',
            'themeSettingsBar',
            'contactInfoBar',
            'logoSettingsBar',
            'qrCodeBar',
            'scheduledChargingBar'
        ],
        InstallationSettings: [
            'earthingSystemBar',
            'currentLimiterBarSettingsBar',
            'unbalancedLoadDetectionBar',
            'externalEnableInputBar',
            'lockableCableBar',
            'powerOptimizerCurrentLimitBar',
            'loadSheddingMinimumCurrentBar'
        ],
        OCPPSettings: [
            'defaultOpenOCPP',
            'ocppVersionBar',
            'ocppConnectionSettingsBar',
            'ocppConnectionParametersBar'
        ],
        NetworkInterfaces: [
            'cellularBar',
            'lanBar',
            'wlanBar',
            'wifiHotspotBar'
        ],
        LocalLoadManagement: [
            'defaultLocalLoadBar',
            'loadManagementGroupButton'
        ],
        SystemMaintenance: [
            'logFilesBar',
            'firmwareUpdatesBar',
            'backupRestoreBar',
            'systemResetBar',
            'administrationPasswordBar',
            'factoryDefaultBar',
            'localChargeSessionBar'
        ]
    };

    const barIdToValue = {
        // General
        languageSettingsBar: "LanguageSettings",
        displayBacklightSettingsBar: "DisplayBacklightSettings",
        ledDimmingSettingsBar: "LedDimmingSettings",
        standbyLedBehaviourBar: "StandbyLedBehaviour",
        themeSettingsBar: "ThemeSettings",
        contactInfoBar: "ServiceContactSettings",
        logoSettingsBar: "LogoSettings",
        qrCodeBar: "QRCodeSettings",
        scheduledChargingBar: "ScheduledCharging",

        // InstallationSettings
        earthingSystemBar: "EarthingSystem",
        currentLimiterBarSettingsBar: "CurrrentLimitterSettings",
        unbalancedLoadDetectionBar: "UnbalancedLoadDetection",
        externalEnableInputBar: "ExternalEnableInput",
        lockableCableBar: "LockableCable",
        powerOptimizerCurrentLimitBar: "PowerOptimizerCurrentLimit",
        loadSheddingMinimumCurrentBar: "LoadSheddingMinimumCurrent",

        // OCPPSettings
        defaultOpenOCPP: "OCPPConnection",
        ocppVersionBar: "OCPPVersion",
        ocppConnectionSettingsBar: "OCPPConnectionSettings",
        ocppConnectionParametersBar: "OCPPConfiguration",

        // NetworkInterfaces
        cellularBar: "CellularNetwork",
        lanBar: "LanNetwork",
        wlanBar: "WlanNetwork",
        wifiHotspotBar: "WifiHotspotNetwork",

        // LocalLoadManagement
        defaultLocalLoadBar: "LoadManagement",
        loadManagementGroupButton: "LoadManagementGroup",

        // SystemMaintenance
        logFilesBar: "LogFiles",
        firmwareUpdatesBar: "FirmwareUpdate",
        backupRestoreBar: "BackupRestore",
        systemResetBar: "SystemReset",
        administrationPasswordBar: "Password",
        factoryDefaultBar: "FactoryDefault",
        localChargeSessionBar: "LocalChargeSession"
    };

    Object.keys(tabBars).forEach(tabId => {
        const barList = tabBars[tabId];
        const activeInput = document.getElementById(`active_bar_${tabId}`);
        if (!activeInput) return;

        for (let barId of barList) {
            const barElement = document.getElementById(barId);
            if (barElement && window.getComputedStyle(barElement).display !== 'none') {
                activeInput.value = barIdToValue[barId] || ""; // eşleşme yoksa boş geç
                break;
            }
        }
    });
});