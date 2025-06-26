var selectOCPPConnection;
var ocppSelection;
var centralSystemAddress;
var chargePointId;
var wssSettings;
var freeModeActive;
var freeModeRFID;
var allowOffline;
var authorizationCache;
var authorizationKey;
var authorizeRemote;
var blinkRepeat;
var bootNotificationAfterConnectionLoss;
var centralSmartChargingWithNoTripping;
var chargeProfileMaxStackLevel;
var chargingScheduleAllowedChargingRateUnit;
var chargingScheduleMaxPeriods;
var clockData;
var connectionTimeOut;
var connectorPhase;
var rotationMaxLength;
var connectorSwitch3to1PhaseSupported;
var continueChargingAfterPowerLoss;
var CTStationCurrentInformationInterval;
var newTransactionAfterPowerLoss;
var dailyReboot;
var dailyRebootTime;
var dailyRebootType;
var maxKeys;
var heartbeat;
var installationErrorEnable;
var ledTimeoutEnable;
var light;
var localAuthListEnabled;
var localAuthListMaxLength;
var authorizeOffline;
var localPreAuthorize;
var maxChargingProfilesInstalled;
var maxEnergy;
var maxPowerChargeComplete;
var maxTimeChargeComplete;
var alignedData;
var alignedDataMaxLength;
var sampleData;
var meterValuesSampledDataMaxLength;
var sampleInterval;
var minDuration;
var connectorNum;
var reserveConnectorZeroSuppornectorZeroSupported;
var resetRetries;
var ocppSecurityProfile;
var sendLocalListMaxLength;
var sendTotalPowerValue;
var disconnect;
var stopInvalidId;
var stopAligned;
var stopAlignedMax;
var stopSampled;
var stopSampledMax;
var supported;
var supportedMax;
var attempts;
var retryInterval;
var UKSmartCharging;
var unlockConnector;
var pingInterval;
var set_default_button;
var centralSystemError;
var chargePointIdError;
var blinkRepeatError;
var clockDataError;
var connectionTimeOutError;
var connectorPhaseError;
var rotationMaxLengthError;
var maxKeysError;
var heartbeatError;
var lightError;
var maxEnergyError;
var maxPowerChargeCompleteError;
var maxTimeChargeCompleteError;
var alignedDataError;
var alignedDataMaxLengthError;
var sampleDataError;
var sampleIntervalError;
var minDurationError;
var connectorNumError;
var randomDelayOnDailyRebootEnabled;
var resetRetriesError;
var stopAlignedError;
var stopAlignedMaxError;
var stopSampledError;
var stopSampledMaxError;
var supportedError;
var supportedMaxError;
var attemptsError;
var retryIntervalError;
var pingIntervalError;
var freeModeRFIDError;
var chargeProfileMaxStackLevelError;
var chargingScheduleAllowedCharging;
var RateUnitError;
var rfidEndianness;
var chargingScheduleMaxPeriodsError;
var CTStationCurrentInformationIntervalError;
var localAuthListMaxLengthError;
var maxChargingProfilesInstalledError;
var meterValuesSampledDataMaxLengthError;
var maxChargingProfilesInstalledError;
var sendLocalListMaxLengthError;
var wifiPassword;
var wifiHotspotPassword;
var apnPassword;
var simPin;
var smartDisplay;
var somethingChanged = false;
var versionCompare = false;
var cpRoleButton;
var gridSettingsButton;
var loadManagementModeButton;
var loadManagementGroupButton;
var alarmsButton;
var dlmMaxCurrent;
var dlmMaxCurrentErr;
var mainCircuitCurrent;
var mainCircuitCurrentErr;
var textvip;
var textphaseConSequence;
var savingButton = true;
var previousOption = "";
var textSerialNuber;
var somethingChangedForLocalLoadManagementGroup = false;
var somethingChangedForEebus = false;
var selectCpRole;
var supplyTypeSelection;
var loadManagementModeSelection;
var fifoPercentageSelection;
var gridBufferSelection;
var DLMSettingsPart;
var disableWlan = false;
var disableCellular = false;
var check_pass = false;
var elementDict = {};
var barNameForEnterPress = "";
var sendDataTransferMeterConfigurationForNonEichrecht;
var continueChargingAfterPenError;
var webconfigEnabled;
var installationErrorEnable = document.getElementById("installationErrorEnable");
var earthingSystemSelection = document.getElementById("earthingSystemSelection");
var earhingSystemError = 0;
var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

var authorizationKeyValueFlag = false;
var simPinValueFlag = false;
var apnPasswordValueFlag = false;
var wifiPasswordValueFlag = false;
var wifiHotspotPasswordValueFlag = false;

function addToList(from, to) {
    var txt = "#" + from;
    var list = "#" + to;
    var txtvalue = $(txt).val();
    if (/\S/.test(txtvalue)) {
        $(txt).val('');
        $(list).append("<option style=\"color:black\" value='" + txtvalue + "'>" + txtvalue + "</option>");
    }
}

function removeFromList(to) {
    var list = "#" + to + " option:selected";
    $(list).remove();
}

function isLoadManagementGroupActive() {
    return (
        loadManagementValue.toLowerCase() === "enabled" &&
        masterRequiredFields.cpRole.toLowerCase() === "master" &&
        document.getElementById("active_bar").value === "LoadManagementGroup"
    );
}

$(document).ready(function () {
    var tableBody = $('tbody');
    $('#startdate-filter').on('input', function () {
        var startDateFilterValue = $(this).val().toLowerCase();
        var endDateFilterValue = $('#enddate-filter').val().toLowerCase();
        tableBody.find('tr').each(function () {
            var startDate = $(this).find('td').eq(3).text().toLowerCase();
            var endDate = $(this).find('td').eq(4).text().toLowerCase();
            if (startDate.includes(startDateFilterValue) && endDate.includes(endDateFilterValue)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
    $('#enddate-filter').on('input', function () {
        var startDateFilterValue = $('#startdate-filter').val().toLowerCase();
        var endDateFilterValue = $(this).val().toLowerCase();
        tableBody.find('tr').each(function () {
            var startDate = $(this).find('td').eq(3).text().toLowerCase();
            var endDate = $(this).find('td').eq(4).text().toLowerCase();
            if (startDate.includes(startDateFilterValue) && endDate.includes(endDateFilterValue)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
    $('#evse-filter').on('input', function () {
        var filterValue = $(this).val().toLowerCase();

        if (filterValue === '') {
            // Clear any existing filter
            //$('#myTable tbody tr').show();
            tableBody.html(originalData);
        } else {
            // Make an AJAX request to fetch filtered data
            $.ajax({
                url: 'query_chargeSession.php',
                type: 'GET',
                data: { filter: filterValue },
                success: function (result) {
                    // Parse the response JSON and update the data array
                    var response = JSON.parse(result);
                    var data = response.data;
                    $('#myTable tbody').empty();

                    // Rebuild the table using the updated data
                    for (var i = 0; i < data.length; i++) {
                        var row = '<tr>';
                        row += '<td>' + data[i]['Row No'] + '</td>';
                        row += '<td>' + data[i]['sessionUuid'] + '</td>';
                        row += '<td>' + data[i]['authorizationUid'] + '</td>';

                        var startTime = new Date(data[i]['startTime'] * 1000);
                        var formattedStartTime = startTime.getUTCDate() + '/' +
                            (startTime.getUTCMonth() + 1) + '/' +
                            startTime.getUTCFullYear() + ', ' +
                            startTime.getUTCHours().toString().padStart(2, '0') + ':' +
                            startTime.getUTCMinutes().toString().padStart(2, '0') + ':' +
                            startTime.getUTCSeconds().toString().padStart(2, '0');
                        row += '<td>' + formattedStartTime + '</td>';
                        var stopTime = new Date(data[i]['stopTime'] * 1000);
                        var formattedStopTime = stopTime.getUTCDate() + '/' +
                            (stopTime.getUTCMonth() + 1) + '/' +
                            stopTime.getUTCFullYear() + ', ' +
                            stopTime.getUTCHours().toString().padStart(2, '0') + ':' +
                            stopTime.getUTCMinutes().toString().padStart(2, '0') + ':' +
                            stopTime.getUTCSeconds().toString().padStart(2, '0');
                        row += '<td>' + formattedStopTime + '</td>';

                        var duration = stopTime.getTime() - startTime.getTime();
                        var formattedDuration = formatDuration(duration);
                        row += '<td>' + formattedDuration + '</td>';

                        row += '<td>' + data[i]['status'] + '</td>';
                        row += '<td>' + data[i]['chargePointId'] + '</td>';
                        var initialEnergy = data[i]['initialEnergy'] / 1000; // convert to kilowatts
                        var formattedKWh = initialEnergy.toFixed(3); // round to three decimal places
                        row += '<td>' + formattedKWh + '</td>';

                        var lastEnergy = data[i]['lastEnergy'] / 1000; // convert to kilowatts
                        var formattedLastKWh = lastEnergy.toFixed(3); // round to three decimal places
                        row += '<td>' + formattedLastKWh + '</td>';

                        var totalEnergy = (lastEnergy - initialEnergy).toFixed(3); // convert to kilowatt-hours and round to three decimal places
                        var formattedTotalEnergy = Number(totalEnergy); // convert back to a number
                        row += '<td>' + formattedTotalEnergy + '</td>';

                        row += '</tr>';
                        $('#myTable tbody').append(row);
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });

    var tableBody = $('#myTable tbody');
    var originalData = tableBody.html();

    $('#clear-filter').on('click', function (event) {
        event.preventDefault();
        $('#startdate-filter').val('');
        $('#enddate-filter').val('');
        $('#evse-filter').val('');
        tableBody.html(originalData);
    });

    $('.page-link').on('click', function (e) {
        e.preventDefault();
        var page = $(this).data('page');
        $.ajax({
            url: 'query_chargeSession.php',
            type: 'get',
            data: { page: page },
            success: function (data) {
                var result = $.parseJSON(data);
                console.log('Data from server:', result);
                var tbody = '';
                $.each(result.data, function (i, item) {
                    console.log('Row No: ', i + 1);
                    console.log('item: ', item);

                    var row = '<tr>';
                    row += '<td>' + (i + 1 + (page - 1) * 10) + '</td>';
                    row += '<td>' + item.sessionUuid + '</td>';
                    row += '<td>' + item.authorizationUid + '</td>';

                    const startTime = new Date(item.startTime * 1000);

                    // Format the date string in "d/m/Y, H:i:s" format
                    const formattedTime = [
                        startTime.getUTCDate().toString().padStart(2, '0'),
                        (startTime.getUTCMonth() + 1).toString().padStart(2, '0'),
                        startTime.getUTCFullYear().toString(),
                    ].join('/') + ', ' +
                        [
                            startTime.getUTCHours().toString().padStart(2, '0'),
                            startTime.getUTCMinutes().toString().padStart(2, '0'),
                            startTime.getUTCSeconds().toString().padStart(2, '0')
                        ].join(':');

                    // Replace the `startTime` value with the formatted date string
                    row += '<td>' + formattedTime + '</td>';

                    const stopTime = new Date(item.stopTime * 1000);

                    // Format the date string in "d/m/Y, H:i:s" format
                    const formattedTime1 = [
                        stopTime.getUTCDate().toString().padStart(2, '0'),
                        (stopTime.getUTCMonth() + 1).toString().padStart(2, '0'),
                        stopTime.getUTCFullYear().toString(),
                    ].join('/') + ', ' +
                        [
                            stopTime.getUTCHours().toString().padStart(2, '0'),
                            stopTime.getUTCMinutes().toString().padStart(2, '0'),
                            stopTime.getUTCSeconds().toString().padStart(2, '0')
                        ].join(':');

                    // Replace the `stopTime` value with the formatted date string
                    row += '<td>' + formattedTime1 + '</td>';

                    // Assuming `item.totalTime` is a number of seconds
                    const totalTime = new Date(item.totalTime * 1000); // Convert seconds to milliseconds

                    // Format the time string in "H:i:s" format
                    const formattedTime2 = [
                        totalTime.getUTCHours().toString().padStart(2, '0'),
                        totalTime.getUTCMinutes().toString().padStart(2, '0'),
                        totalTime.getUTCSeconds().toString().padStart(2, '0')
                    ].join(':');

                    // Add the formatted time to the row
                    row += '<td>' + formattedTime2 + '</td>';

                    row += '<td>' + item.status + '</td>';
                    row += '<td>' + item.chargePointId + '</td>';

                    const initialEnergy = item.initialEnergy / 1000; // convert to kilowatts
                    const lastEnergy = item.lastEnergy / 1000; // convert to kilowatts
                    const totalEnergy = (lastEnergy - initialEnergy).toFixed(3); // convert to kilowatt-hours and round to three decimal places
                    const formattedInitialEnergy = initialEnergy.toFixed(3); // round to three decimal places
                    const formattedLastEnergy = lastEnergy.toFixed(3); // round to three decimal places

                    row += `<td>${formattedInitialEnergy}</td><td>${formattedLastEnergy}</td><td>${totalEnergy}</td>`;

                    row += '</tr>';
                    tbody += row;
                });
                $('#myTable tbody').html(tbody);
                $('.pagination a').removeClass('active');
                $('.pagination a[data-page="' + page + '"]').addClass('active');
                $('.pagination a:first-child').toggleClass('disabled', page === 1);
                $('.pagination a:last-child').toggleClass('disabled', page === result.pagination.total_pages);

            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });

    var selectEEBUSPairingUnpair = null;
    var selectEEBUSPairingPair = null;
    updateButtonValue(); // Set the initial value of the button on page load

    $("#selectEEBUSPairingUnpair").click(function () {
        $(this).addClass("selected");
        $("#selectEEBUSPairingPair").removeClass("selected");
        saveEebusSettingsDb(false);
        updateButtonValue();
    });

    $("#selectEEBUSPairingPair").click(function () {
        $(this).addClass("selected");
        $("#selectEEBUSPairingUnpair").removeClass("selected");
        saveEebusSettingsDb(true);
        updateButtonValue();
    });

    $('form :input').on('input', function () {
        somethingChanged = true;
    });
    $('#add_button ,#remove_button ,#set_default_button').on('input', function () {
        somethingChanged = true;
    });
    $('#from,#to').on('input', function () {
        somethingChanged = false;
    });

    //for changing the localLoadManagementGroup
    $("#vipSelection, #phaseConnectionSelection").on('input', function () {
        somethingChangedForLocalLoadManagementGroup = true;
    });
    $("body").on('load', init());
    $("#button_device_log").on('click', function () { blockUIForDownload(); });
    $("#hmi_log_button").on('click', function () { blockUIForDownload(); });
    $("#localChargeSession_log_button").on('click', function () { blockUIForDownload(); });
    $("#full_session_log_button").on('click', function () { blockUIForDownload(); });

    if (versionCompare == true) {
        if(isJQueryAndUIReady()){
            $("#restoreConfigAlertMessage").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [{
                    text: ok_button,
                    class: "saveButton",
                    click: function () {
                        $(this).dialog("close");
                        window.location = window.location;

                    }
                },],
                close: function () {

                }
            });
        }
    }


});

document.addEventListener('DOMContentLoaded', (event) => {
    var option = document.getElementById('loadManagementEebus');
    if (eebusEnabled !== "true") {
        option.parentNode.removeChild(option);
    } else {
        option.style.display = "block";
    }
    
    var startDateSelection = document.getElementById('logsStartDateSelection');
    var endDateSelection = document.getElementById('logsEndDateSelection');
    startDateSelection.value = defaultLogsStartDate;
    endDateSelection.value = defaultLogsEndDate;
    handleMinMaxDates();
});

if (smartDisplay) {
    document.getElementById("selectStandaloneMode").selectedIndex = 0;
}

var interval = 10000; // for 10 seconds
setInterval(function () {
    if(isLoadManagementGroupActive()){
        var selectedOption = $('#serialNumberSelection option:selected').val();
        $.ajax({
            type: 'POST',
            url: 'query.php',
            data: { serialNumber: "", vip: "" },
            success: function (data) {
                $('#queryPart').empty();
                $('#queryPart').append(data);
                if (!($('#serialNumberSelection option[value="' + selectedOption + '"]').prop("selected", true).length)) {
                    $('#slaveConfigItems').css("display", "none");
                }
                $('#numberOfSlaves').val(($('#serialNumberSelection option').length) - 1);
                fillingTheSlaveConfigTable5Sec();
            },
            error: function (xhr) {
            }
        });
        // Second AJAX request
        $.ajax({
            type: 'POST',
            url: 'query_connector.php',
            data: { serialNumber: "", connectorId: "" },
            success: function (data) {
                fillingTheConnectorInfoTable5Sec();
            },
            error: function (xhr) {
                // Handle error if needed
            }
        });
    }
}, interval);

var divForLogs;
function disableUI() {
    divForLogs = document.createElement("div");
    divForLogs.className += "overlay";
    document.body.appendChild(divForLogs);
    $('.animationBar').show();
}

function enableUI() {
    $('.animationBar').hide();
    if( document.body.contains(divForLogs)){
        document.body.removeChild(divForLogs);
    }
}
var fileDownloadCheckTimer;

function checkDownloadStatus() {
    $.ajax({
        url: 'checkDownloadStatus.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.status === 'complete') {
                clearInterval(fileDownloadCheckTimer);
                finishDownload();
            }
        },
        error: function(xhr, status, error) {
            console.error('Error checking download status:', error);
            console.error('Status:', status);
            console.error('Response:', xhr.responseText);
        }
    });
}

function blockUIForDownload() {
    disableUI();
    setTimeout(() => {
        fileDownloadCheckTimer = setInterval(checkDownloadStatus(), 500);
    }, 700);
}


function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function readCookie(name) {
    var cookiename = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(cookiename) == 0) return c.substring(cookiename.length, c.length);
    }
    return null;
}

function finishDownload() {
    enableUI();
    clearInterval(fileDownloadCheckTimer);
}



function checkSessionTimeout() {
    // AJAX                           
    var xmlhttp = new XMLHttpRequest();

    // Callback function to handle the response
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4) {
            if (xmlhttp.status == 200) {
                var response = xmlhttp.responseText;
                handleSessionResponse(response);
            } else if (xmlhttp.status == 302) {
                // Redirect response, handle it accordingly
                window.location.href = "http://" + window.location.host;
            }
        }
    };

    // Send AJAX
    xmlhttp.open("GET", "check_session.php", true);
    xmlhttp.send(); 
}

function sessionLogout() {
    var index = { id: 5, token: csrfToken};
    $.ajax({
        type: 'POST',
        data: index,
        url: 'request.php',
        success: function (data) {
            window.location.href = "http://" + window.location.host;
        }
    });
}

// Function to handle the session response
function handleSessionResponse(response) {
    if (response.trim() === "session_expired") {
        // Redirect to the home page
        window.location.href = "http://" + window.location.host;
    }
    // Handle other cases if needed
}


function openTab(tabEvent, tab) {
    checkSessionTimeout();

    var currentTab = document.getElementById("active_tab").value;
    var currentBar = document.getElementById("active_bar").value;
    if (somethingChanged == true) {
        $("#notSavedAlertMessage").dialog({
            width: 580,
            height: 300,
            modal: true,
            closeOnEscape: false,
            dialogClass: "dialog-no-close",
            buttons: [{
                text: cancel_button,
                class: "okButton",
                click: function () {
                    somethingChanged = false;

                    setDefaultParametersForCancel();
                    if (tab == "MainPage") {
                        document.getElementById("defaultOpen").click();
                    } else if (tab == "General") {
                        document.getElementById("generalNav").click();
                    } else if (tab == "OCPPSettings") {
                        document.getElementById("ocppNav").click();
                    } else if (tab == "NetworkInterfaces") {
                        document.getElementById("networkNav").click();
                    } else if (tab == "StandaloneMode") {
                        document.getElementById("standaloneNav").click();
                    } else if (tab == "SystemMaintenance") {
                        document.getElementById("systemNav").click();
                    } else if (tab == "InstallationSettings") {
                        document.getElementById("installationSettingsNav").click();
                    } else if (tab == "LocalLoadManagement") {
                        document.getElementById("localNav").click();
                    }
                    $(this).dialog("close");
                }
            },
            {
                text: save_button,
                class: "saveButton",
                click: function () {
                    if (currentTab == "General") {
                        if (currentBar == "LanguageSettings") {
                            document.getElementById("general_button").click();
                        } else if (currentBar == "ServiceContactSettings") {
                            document.getElementById("contact_info_button").click();
                        } else if (currentBar == "LogoSettings") {
                            document.getElementById("logo_update_button").click();
                        } else if (currentBar == "ThemeSettings") {
                            document.getElementById("general_theme_button").click();
                        } else if (currentBar == "DisplayBacklightSettings") {
                            document.getElementById("back_light_dimming_button").click();
                        } else if (currentBar == "LedDimmingSettings") {
                            document.getElementById("led_dimming_button").click();
                        } else if (currentBar == "QRCodeSettings") {
                            document.getElementById("general_qrCode_button").click();
                        } else if (currentBar == "StandbyLedBehaviour") {
                            document.getElementById("standby_led_behaviour_button").click();
                        } else if (currentBar == "ScheduledCharging") {
                            document.getElementById("scheduled_charging_button").click();
                        }
                    } else if (currentTab == "OCPPSettings") {
                        document.getElementById("ocpp_button").click();
                    } else if (currentTab == "NetworkInterfaces") {
                        if (currentBar == "CellularNetwork") {
                            document.getElementById("interfaces_cellular_button").click();
                        } else if (currentBar == "LanNetwork") {
                            document.getElementById("interfaces_lan_button").click();
                        } else if (currentBar == "WlanNetwork") {
                            document.getElementById("interfaces_wlan_button").click();
                        } else if (currentOpenBar == "WifiHotspotNetwork") {
                            document.getElementById("interfaces_hotspot_button").click();
                        }
                    } else if (currentTab == "StandaloneMode") {
                        document.getElementById("rfid_list_button").click();
                    } else if (currentTab == "SystemMaintenance") {
                        if (currentBar == "Password") {
                            document.getElementById("change_password_button").click();
                        }

                    } else if (currentTab == "InstallationSettings") {
                        if (currentBar == "EarthingSystem") {
                            document.getElementById("earthing_system_button").click();
                        } else if (currentBar == "UnbalancedLoadDetection") {
                            document.getElementById("unbalanced_load_detection_button").click();
                        } else if (currentBar == "ExternalEnableInput") {
                            document.getElementById("external_enable_input_button").click();
                        } else if (currentBar == "LockableCable") {
                            document.getElementById("lockable_cable_button").click();
                        } else if (currentBar == "CurrrentLimitterSettings") {
                            document.getElementById("current_limiter_settings_button").click();
                        } else if (currentBar == "PowerOptimizerCurrentLimit") {
                            document.getElementById("power_optimizer_button").click();
                        } else if (currentBar == "Location") {
                            document.getElementById("location_button").click();
                        } else if (currentBar == "LoadSheddingMinimumCurrent") {
                            document.getElementById("load_shedding_minimum_current_button").click();
                        }

                    } else if (currentTab == "LocalLoadManagement") {
                        if (currentBar == "LoadManagementGroup") {
                            saveSlaveConfigDb();
                        } else if (currentBar == "LoadManagement") {
                            document.getElementById("load_management_button").click();
                        }

                    }
                    somethingChanged = false;
                    $(this).dialog("close");
                }
            },
            ],
            close: function () {
                somethingChanged = false;
            }
        });
    } else {
        callOpenTab(tabEvent, tab);
    }
}

function callOpenTab(evt, tabName) {
    var i, tabcontent, tablinks, default_bar;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
    document.getElementById("active_tab").value = tabName;

    if (tabName == "General" || tabName == "InstallationSettings" || tabName == "NetworkInterfaces" || tabName == "SystemMaintenance") {
        if (tabName == "General") {
            bar_names = document.getElementById("general_settings_bar").getElementsByClassName("barlinks");
        } else if (tabName == "InstallationSettings") {
            bar_names = document.getElementById("installation_settings_bar").getElementsByClassName("barlinks");
        } else if (tabName == "NetworkInterfaces") {
            bar_names = document.getElementById("network_settings_bar").getElementsByClassName("barlinks");
        } else if (tabName == "SystemMaintenance") {
            bar_names = document.getElementById("system_maintenance_bar").getElementsByClassName("barlinks");
        }
        for (j = 0; j < bar_names.length; j++) {
            if (bar_names[j].style.display != "none") {
                default_bar = bar_names[j].id;
                break;
            }
        }
    }

    if (tabName == "General") {
        document.getElementById(default_bar).click();
    } else if (tabName == "OCPPSettings") {
        getDefaultParameters("ocppConnection");
        ocppConnection();
        document.getElementById("defaultOpenOCPP").click();
        openThePosition("OCPPConnectionPart");

    } else if (tabName == "NetworkInterfaces") {
        document.getElementById(default_bar).click();
        ethernetFunction();
        cellularFunction();
        wifiFunction();
        wifiHotspotFunction();
    } else if (tabName == "SystemMaintenance") {
        document.getElementById(default_bar).click();
    } else if (tabName == "LocalLoadManagement") {
        document.getElementById("defaultLocalLoadBar").click();
        CPRoleFunction();
    } else if (tabName == "StandaloneMode") {
        if (selectOCPPConnection.value == 1) {
            if(isJQueryAndUIReady()){
                $("#alertMessage").dialog({
                    width: 580,
                    height: 300,
                    modal: true,
                    closeOnEscape: false,
                    dialogClass: "dialog-no-close",
                    buttons: [{
                        text: ok_button,
                        class: "okButton",
                        click: function () {
                            document.getElementById("ocppNav").click();
                            $(this).dialog("close");
                        }
                    }]
                });
            }
        }
        getDefaultParameters("StandaloneMode");
        selectMode();
    } else if (tabName == "InstallationSettings") {
        document.getElementById(default_bar).click();
    }

}

function openBar(barEvent, bar) {
    checkSessionTimeout();
    var currentOpenBar = document.getElementById("active_bar").value;
    if (somethingChanged == true) {
        $("#notSavedAlertMessage").dialog({
            width: 580,
            height: 300,
            modal: true,
            closeOnEscape: false,
            dialogClass: "dialog-no-close",
            buttons: [{
                text: cancel_button,
                class: "okButton",
                click: function () {
                    $(this).dialog("close");
                    setDefaultParametersForCancel();
                    if (bar == "CellularNetwork") {
                        document.getElementById("cellularBar").click();
                    } else if (bar == "LanNetwork") {
                        document.getElementById("lanBar").click();
                    } else if (bar == "WlanNetwork") {
                        document.getElementById("wlanBar").click();
                    } else if (bar == "WifiHotspotNetwork") {
                        document.getElementById("wifiHotspotBar").click();
                    } else if (bar == "LanguageSettings") {
                        document.getElementById("languageSettingsBar").click();
                    } else if (bar == "ServiceContactSettings") {
                        document.getElementById("contactInfoBar").click();
                    } else if (bar == "LogoSettings") {
                        document.getElementById("logoSettingsBar").click();
                    } else if (bar == "ThemeSettings") {
                        document.getElementById("themeSettingsBar").click();
                    } else if (bar == "DisplayBacklightSettings") {
                        document.getElementById("displayBacklightSettingsBar").click();
                    } else if (bar == "LedDimmingSettings") {
                        document.getElementById("ledDimmingSettingsBar").click();
                    } else if (bar == "QRCodeSettings") {
                        document.getElementById("qrCodeBar").click();
                    } else if (bar == "StandbyLedBehaviour") {
                        document.getElementById("standbyLedBehaviourBar").click();
                    } else if (bar == "ScheduledCharging") {
                        document.getElementById("scheduledChargingBar").click();
                    } else if (bar == "LogFiles") {
                        document.getElementById("logFilesBar").click();
                    } else if (bar == "FirmwareUpdate") {
                        document.getElementById("firmwareUpdatesBar").click();
                    } else if (bar == "BackupRestore") {
                        document.getElementById("backupRestoreBar").click();
                    } else if (bar == "SystemReset") {
                        document.getElementById("systemResetBar").click();
                    } else if (bar == "FactoryDefault") {
                        document.getElementById("factoryDefaultBar").click();
                    } else if (bar == "Password") {
                        document.getElementById("administrationPasswordBar").click();
                    } else if (bar == "LocalChargeSession") {
                        document.getElementById("localChargeSessionBar").click();
                    } else if (bar == "EarthingSystem") {
                        document.getElementById("earthingSystemBar").click();
                    } else if (bar == "UnbalancedLoadDetection") {
                        document.getElementById("unbalancedLoadDetectionBar").click();
                    } else if (bar == "ExternalEnableInput") {
                        document.getElementById("externalEnableInputBar").click();
                    } else if (bar == "LockableCable") {
                        document.getElementById("lockableCableBar").click();
                    } else if (bar == "PowerOptimizerCurrentLimit") {
                        document.getElementById("powerOptimizerCurrentLimitBar").click();
                    } else if (bar == "CurrrentLimitterSettings") {
                        document.getElementById("currentLimiterBarSettingsBar").click();
                    } else if (bar == "Location") {
                        document.getElementById("locationBar").click();
                    } else if (bar == "LoadManagementGroup") {
                        document.getElementById("loadManagementGroupButton").click();
                    } else if (bar == "LoadManagement") {
                        document.getElementById("defaultLocalLoadBar").click();
                    } else if (bar == "LoadSheddingMinimumCurrent") {
                        document.getElementById("loadSheddingMinimumCurrentBar").click();
                    }
                }
            },
            {
                text: save_button,
                class: "saveButton",
                click: function () {
                    if (currentOpenBar == "CellularNetwork") {
                        document.getElementById("interfaces_cellular_button").click();
                    } else if (currentOpenBar == "LanNetwork") {
                        document.getElementById("interfaces_lan_button").click();
                    } else if (currentOpenBar == "WlanNetwork") {
                        document.getElementById("interfaces_wlan_button").click();
                    } else if (currentOpenBar == "WifiHotspotNetwork") {
                        document.getElementById("interfaces_hotspot_button").click();
                    } else if (currentOpenBar == "LanguageSettings") {
                        document.getElementById("general_button").click();
                    } else if (currentOpenBar == "ServiceContactSettings") {
                        document.getElementById("contact_info_button").click();
                    } else if (currentOpenBar == "DisplayBacklightSettings") {
                        document.getElementById("back_light_dimming_button").click();
                    } else if (currentOpenBar == "LedDimmingSettings") {
                        document.getElementById("led_dimming_button").click();
                    } else if (currentOpenBar == "StandbyLedBehaviour") {
                        document.getElementById("standby_led_behaviour_button").click();
                    } else if (currentOpenBar == "LogoSettings") {
                        document.getElementById("logo_update_button").click();
                    } else if (currentOpenBar == "ThemeSettings") {
                        document.getElementById("general_theme_button").click();
                    } else if (currentOpenBar == "QRCodeSettings") {
                        document.getElementById("general_qrCode_button").click();
                    } else if (currentOpenBar == "ScheduledCharging") {
                        document.getElementById("scheduled_charging_button").click();
                    } else if (currentOpenBar == "Password") {
                        document.getElementById("change_password_button").click();
                    } else if (currentOpenBar == "LoadManagementGroup") {
                        saveSlaveConfigDb();
                    } else if (currentOpenBar == "LoadManagement") {
                        document.getElementById("load_management_button").click();
                    } else if (currentOpenBar == "EarthingSystem") {
                        document.getElementById("earthing_system_button").click();
                    } else if (currentOpenBar == "UnbalancedLoadDetection") {
                        document.getElementById("unbalanced_load_detection_button").click();
                    } else if (currentOpenBar == "ExternalEnableInput") {
                        document.getElementById("external_enable_input_button").click();
                    } else if (currentOpenBar == "LockableCable") {
                        document.getElementById("lockable_cable_button").click();
                    } else if (currentOpenBar == "PowerOptimizerCurrentLimit") {
                        document.getElementById("power_optimizer_button").click();
                    } else if (currentOpenBar == "Location") {
                        document.getElementById("location_button").click();
                    } else if (currentOpenBar == "CurrrentLimitterSettings") {
                        document.getElementById("current_limiter_settings_button").click();
                    } else if (currentOpenBar == "LoadSheddingMinimumCurrent") {
                        document.getElementById("load_shedding_minimum_current_button").click();
                    }

                    $(this).dialog("close");
                }
            },
            ],
            close: function () {
                somethingChanged = false;
            }
        });
    } else {
        callOpenBar(barEvent, bar);
    }
}

function callOpenBar(barEvt, barName) {
    elementDict = {};
    getDefaultParameters(barName);
    var i, barcontent, barlinks;
    barcontent = document.getElementsByClassName("barcontent");
    for (i = 0; i < barcontent.length; i++) {
        barcontent[i].style.display = "none";
    }
    barlinks = document.getElementsByClassName("barlinks");
    for (i = 0; i < barlinks.length; i++) {
        barlinks[i].className = barlinks[i].className.replace(" active", "");
    }

    document.getElementById(barName).style.display = "block";
    barEvt.currentTarget.className += " active";
    document.getElementById("active_bar").value = barName;
}

function openBarOCPP(OCPPevt, barNameOCPP) {
    var i, barcontent, barlinks;
    barcontent = document.getElementsByClassName("barcontent");
    barlinks = document.getElementsByClassName("barlinks");
    for (i = 0; i < barlinks.length; i++) {
        barlinks[i].className = barlinks[i].className.replace(" active", "");
    }

    if (barNameOCPP == "OCPPConnection")
        document.getElementById(barNameOCPP).style.display = "block";

    OCPPevt.currentTarget.className += " active";

    document.getElementById("active_bar").value = barNameOCPP;

    if (barNameOCPP == "OCPPConnection") {
        openThePosition("OCPPConnectionPart");
    } else if (barNameOCPP == "OCPPVersion") {
        openThePosition("OCPPVersionPart");
    } else if (barNameOCPP == "OCPPConnectionSettings") {
        openThePosition("OCPPConnectionSettingsPart");
    } else if (barNameOCPP == "OCPPConfiguration") {
        openThePosition("OCPPConfigurationPart");
    }
}

function checkGeneralForm() {
    var dimming = document.getElementById("backlightSelection");
    var dimmingErr = document.getElementById("backlightSelectionErr");
    errorCheck = 0;

    /*if(dimming.selectedIndex == 0) {
        dimmingErr.innerHTML = select_backlight_dimming;
    } else {
        dimmingErr.innerHTML = "*";
        errorCheck--;
    }*/

    if (errorCheck != 0) return (false)
    showingAnimationContainer("button_general");
    return true;
}

function checkPresetForm() {
    showingAnimationContainer("button_preset");
    return true;
}

function checkServiceContactInfoForm() {
    var serviceContactError = 1;
    var serviceContactInfo = document.getElementById("serviceContactInfo");
    var serviceContactInfoErr = document.getElementById("serviceContactInfoErr");

    if (serviceContactInfo.value.trim() != '') {
        if (/^([@+.,* a-z0-9]){1,25}$/.test(serviceContactInfo.value) == false) {
            serviceContactInfoErr.innerHTML = service_contact_info_character;
            serviceContactInfo.className = "focusedTextarea";
        }
        else {
            serviceContactInfoErr.innerHTML = "";
            serviceContactInfo.className = "textarea1";
            serviceContactError--;
        }
    } else {
        serviceContactInfoErr.innerHTML = "";
        serviceContactInfo.className = "textarea1";
        serviceContactError--;
    }

    if (serviceContactError == 0) {
        showingAnimationContainer("button_contact_info");
    }

}

function serviceContactInfo() {
    serviceContactInfo = document.getElementById("serviceContactInfo");
    serviceContactInfoErr = document.getElementById("serviceContactInfoErr");
    serviceContactInfo.className = "textarea1";
    serviceContactInfoErr.innerHTML = "";
}

function checkGeneralThemeForm() {
    showingAnimationContainer("button_general_theme");
    return true;
}

function checkOcppForm() {
    var ocppError = 33;
    var ocppErrorText = "";
    var ocppErrorPosition = "";

    function generateErrorMessage(errorElement,element, message, position) {
        errorElement.innerHTML = message;
        element.className = "focusedTextarea";
        ocppErrorText += message + "<br>";
        if(!ocppErrorPosition)  ocppErrorPosition= position;
    }

    function removeErrorMessage(errorElement,element) {
        errorElement.innerHTML = "";
        element.className = "textarea1";
        ocppError--;
    }

    if (selectOCPPConnection.value == 1) {

    // Meter Values Declaration
    let meterValues = ["Energy.Active.Import.Register","Voltage","Current.Import","Power.Active.Import","Current.Offered","Power.Offered"];

    let alignedDataValues = alignedData.value.split(',').map(value => value.trim());
    let sampleDataValues = sampleData.value.split(',').map(value => value.trim());
    let stopAlignedValues = stopAligned.value.split(',').map(value => value.trim());
    let stopSampledValues = stopSampled.value.split(',').map(value => value.trim());

    let alignedDataCheck = true;
    let sampleDataCheck = true;
    let stopAlignedCheck = true;
    let stopSampledCheck = true;


    let alignedDuplicateCheck = {};
    let sampleDuplicateCheck = {};
    let stopAlignedDuplicateCheck = {};
    let stopSampledDuplicateCheck = {};

    let alignedDuplicate = true;
    let sampledDuplicate = true;
    let stopAlignedDuplicate = true;
    let stopSampledDuplicate = true;


    for(let i = 0; i < alignedDataValues.length; i++){
        const value = alignedDataValues[i];

        if(!meterValues.includes(value)){
            alignedDataCheck = false;
            break;
        }
        if(alignedDuplicateCheck[value]){
            alignedDuplicate = false;
        } else {
            alignedDuplicateCheck[value] = true;
        }
    }

    for(let i = 0; i < sampleDataValues.length; i++){
        const value = sampleDataValues[i];

        if(!meterValues.includes(value)){
            sampleDataCheck = false;
            break;
        }
        if(sampleDuplicateCheck[value]){
            sampledDuplicate = false;
        } else {
            sampleDuplicateCheck[value] = true;
        }
    }

    for(let i = 0; i < stopAlignedValues.length; i++){
        const value = stopAlignedValues[i];

        if(!meterValues.includes(value)){
            stopAlignedCheck = false;
            break;
        }
        if(stopAlignedDuplicateCheck[value]){
            stopAlignedDuplicate = false;
        } else {
            stopAlignedDuplicateCheck[value] = true;

        }
    }

    for(let i = 0; i < stopSampledValues.length; i++){
        const value = stopSampledValues[i];

        if(!meterValues.includes(value)){
            stopSampledCheck = false;
            break;
        }
        if(stopSampledDuplicateCheck[value]){
            stopSampledDuplicate = false;
        } else {
            stopSampledDuplicateCheck[value] = true;
        }
    }

        if (centralSystemAddress.value.trim() == '') {
            generateErrorMessage(centralSystemErr, centralSystemAddress, enter_central_system_address, "centralSystemAddressItem");

        } else {
            removeErrorMessage(centralSystemErr,centralSystemAddress);
        }
        if (chargePointId.value.trim() == '') {
            generateErrorMessage(chargePointIdErr,chargePointId, enter_charge_point_id, "chargePointIdItem");

        } else {
            removeErrorMessage(chargePointIdErr,chargePointId);
        }
        if (freeModeActive.value == "TRUE" && freeModeRFID.value.trim() == '') {
            generateErrorMessage(freeModeRFIDErr,freeModeRFID, "FreeModeRFID " + is_required, "freeModeActiveItem");
        } else if (freeModeRFID.value.length > 32) {
            generateErrorMessage(freeModeRFIDErr,freeModeRFID, "FreeModeRFID " + freeModeMaxCharacter, "freeModeActiveItem");
        } else {
            removeErrorMessage(freeModeRFIDErr,freeModeRFID);
        }
        if (blinkRepeat.value.trim() == '') {
            generateErrorMessage(blinkRepeatErr,blinkRepeat, "BlinkRepeat " + is_required, "blinkRepeatItem");
        } else if (isNaN(blinkRepeat.value.trim())) {
            generateErrorMessage(blinkRepeatErr,blinkRepeat, "BlinkRepeat " + must_be_numeric, "blinkRepeatItem");
        } else if ((!isNaN(blinkRepeat.value.trim()) && (blinkRepeat.value.trim() > 20))) {
            generateErrorMessage(blinkRepeatErr,blinkRepeat, "BlinkRepeat " + less_than_or_equalto20, "blinkRepeatItem");
        } else if ((!isNaN(blinkRepeat.value.trim()) && (blinkRepeat.value.trim() < 0))) {
            generateErrorMessage(blinkRepeatErr,blinkRepeat, "BlinkRepeat " + high_than_or_equalto0, "blinkRepeatItem");
        } else {
            removeErrorMessage(blinkRepeatErr,blinkRepeat);
        }
        if (clockData.value.trim() == '') {
            generateErrorMessage(clockDataErr,clockData, "ClockAlignedDataInterval " + is_required, "clocAlignedkDataItem");
        } else if (isNaN(clockData.value.trim())) {
            generateErrorMessage(clockDataErr,clockData, "ClockAlignedDataInterval " + must_be_numeric, "clocAlignedkDataItem");
        } else if ((!isNaN(clockData.value.trim()) && (clockData.value.trim() > 65000))) {
            generateErrorMessage(clockDataErr,clockData, "ClockAlignedDataInterval " + less_than_or_equalto65000, "clocAlignedkDataItem");
        } else if ((!isNaN(clockData.value.trim()) && (clockData.value.trim() < 0))) {
            generateErrorMessage(clockDataErr,clockData, "ClockAlignedDataInterval " + high_than_or_equalto0, "clocAlignedkDataItem");
        } else {
            removeErrorMessage(clockDataErr,clockData);
        }
        if (connectionTimeOut.value.trim() == '') {
            generateErrorMessage(connectionTimeOutErr,connectionTimeOut, "ConnectionTimeOut " + is_required, "connectionTimeOutItem");
        } else if (isNaN(connectionTimeOut.value.trim())) {
            generateErrorMessage(connectionTimeOutErr,connectionTimeOut, "ConnectionTimeOut " + must_be_numeric, "connectionTimeOutItem");
        } else if ((!isNaN(connectionTimeOut.value.trim()) && (connectionTimeOut.value.trim() > 300))) {
            generateErrorMessage(connectionTimeOutErr,connectionTimeOut, "ConnectionTimeOut " + less_than_or_equalto300, "connectionTimeOutItem");
        } else if ((!isNaN(connectionTimeOut.value.trim()) && (connectionTimeOut.value.trim() < 0))) {
            generateErrorMessage(connectionTimeOutErr,connectionTimeOut, "ConnectionTimeOut " + high_than_or_equalto0, "connectionTimeOutItem");
        } else {
            removeErrorMessage(connectionTimeOutErr,connectionTimeOut);
        }
        if (connectorPhase.value.trim() == '') {
            generateErrorMessage(connectorPhaseErr,connectorPhase, "ConnectorPhaseRotation " + is_required, "connectorPhaseRotationItem");

        } else if (isNaN(connectorPhase.value.trim())) {
            generateErrorMessage(connectorPhaseErr,connectorPhase, "ConnectorPhaseRotation " + must_be_numeric, "connectorPhaseRotationItem");
        } else {
            removeErrorMessage(connectorPhaseErr,connectorPhase);
        }
        if (CTStationCurrentInformationInterval.value.trim() == '') {
            generateErrorMessage(CTStationCurrentInformationIntervalErr,CTStationCurrentInformationInterval, "CTStationCurrentInformationInterval " + is_required, "CTStationCurrentInformationIntervalItem");
        } else if (isNaN(CTStationCurrentInformationInterval.value.trim())) {
            generateErrorMessage(CTStationCurrentInformationIntervalErr,CTStationCurrentInformationInterval, "CTStationCurrentInformationInterval " + must_be_numeric, "CTStationCurrentInformationIntervalItem");
        } else if ((!isNaN(CTStationCurrentInformationInterval.value.trim()) && (CTStationCurrentInformationInterval.value.trim() < 0))) {
            generateErrorMessage(CTStationCurrentInformationIntervalErr,CTStationCurrentInformationInterval, "CTStationCurrentInformationInterval " + high_than_or_equalto0, "CTStationCurrentInformationIntervalItem");
        } else {
            removeErrorMessage(CTStationCurrentInformationIntervalErr,CTStationCurrentInformationInterval);
        }
        if (rotationMaxLength.value.trim() == '') {
            generateErrorMessage(rotationMaxLengthErr,rotationMaxLength, "ConnectorPhaseRotationMaxLength " + is_required, "connectorPhaserRotationMaxLengthItem");
        } else if (isNaN(rotationMaxLength.value.trim())) {
            generateErrorMessage(rotationMaxLengthErr,rotationMaxLength, "ConnectorPhaseRotationMaxLength " + must_be_numeric, "connectorPhaserRotationMaxLengthItem");
        } else {
            removeErrorMessage(rotationMaxLengthErr,rotationMaxLength);
        }
        if (maxKeys.value.trim() == '') {
            generateErrorMessage(maxKeysErr,maxKeys, "GetConfigurationMaxKeys " + is_required, "getConfigurationMaxKeysItem");
        } else if (isNaN(maxKeys.value.trim())) {
            generateErrorMessage(maxKeysErr,maxKeys, "GetConfigurationMaxKeys " + must_be_numeric, "getConfigurationMaxKeysItem");
        } else {
            removeErrorMessage(maxKeysErr,maxKeys);
        }
        if (light.value.trim() == '') {
            generateErrorMessage(lightErr,light, "LightIntensity " + is_required, "lightIntensityItem");
        } else if (isNaN(light.value.trim())) {
            generateErrorMessage(lightErr,light, "LightIntensity " + must_be_numeric, "lightIntensityItem");
        } else if ((!isNaN(light.value.trim()) && (light.value.trim() < 1))) {
            generateErrorMessage(lightErr,light, "LightIntensity " + less_than_or_equalto4, "lightIntensityItem");
        } else if ((!isNaN(light.value.trim()) && (light.value.trim() > 4))) {
            generateErrorMessage(lightErr,light, "LightIntensity " + less_than_or_equalto4, "lightIntensityItem");
        } else {
            removeErrorMessage(lightErr,light);
        }
        if (localAuthListMaxLength.value.trim() == '') {
            generateErrorMessage(localAuthListMaxLengthErr,localAuthListMaxLength, "LocalAuthListMaxLength " + is_required, "localAuthListMaxLengthItem");
        } else if (isNaN(localAuthListMaxLength.value.trim())) {
            generateErrorMessage(localAuthListMaxLengthErr,localAuthListMaxLength, "LocalAuthListMaxLength " + must_be_numeric, "localAuthListMaxLengthItem");
        } else if ((!isNaN(localAuthListMaxLength.value.trim()) && (localAuthListMaxLength.value.trim() > 10000))) {
            generateErrorMessage(localAuthListMaxLengthErr,localAuthListMaxLength, "LocalAuthListMaxLength " + less_than_or_equalto10000, "localAuthListMaxLengthItem");
        } else if ((!isNaN(localAuthListMaxLength.value.trim()) && (localAuthListMaxLength.value.trim() < 0))) {
            generateErrorMessage(localAuthListMaxLengthErr,localAuthListMaxLength, "LocalAuthListMaxLength " + high_than_or_equalto0, "localAuthListMaxLengthItem");
        } else {
            removeErrorMessage(localAuthListMaxLengthErr,localAuthListMaxLength);
        }
        if (maxEnergy.value.trim() == '') {
            generateErrorMessage(maxEnergyErr,maxEnergy, "MaxEnergyOnInvalidId " + is_required, "maxEnergyOnInvalidIdItem");
        } else if (isNaN(maxEnergy.value.trim())) {
            generateErrorMessage(maxEnergyErr,maxEnergy, "MaxEnergyOnInvalidId " + must_be_numeric, "maxEnergyOnInvalidIdItem");
        } else if ((!isNaN(maxEnergy.value.trim()) && (maxEnergy.value.trim() > 22))) {
            generateErrorMessage(maxEnergyErr,maxEnergy, "MaxEnergyOnInvalidId " + less_than_or_equalto22, "maxEnergyOnInvalidIdItem");
        } else if ((!isNaN(maxEnergy.value.trim()) && (maxEnergy.value.trim() < 0))) {
            generateErrorMessage(maxEnergyErr,maxEnergy, "MaxEnergyOnInvalidId " + high_than_or_equalto0, "maxEnergyOnInvalidIdItem");
        } else {
            removeErrorMessage(maxEnergyErr,maxEnergy);
        }
        if (maxPowerChargeComplete.value.trim() == '') {
            generateErrorMessage(maxPowerChargeCompleteErr,maxPowerChargeComplete, "MaxPowerChargeComplete " + is_required, "maxPowerChargeCompleteItem");
        } else if (isNaN(maxPowerChargeComplete.value.trim())) {
            generateErrorMessage(maxPowerChargeCompleteErr,maxPowerChargeComplete, "MaxPowerChargeComplete " + must_be_numeric, "maxPowerChargeCompleteItem");
        } else if ((!isNaN(maxPowerChargeComplete.value.trim()) && (maxPowerChargeComplete.value.trim() < 0))) {
            generateErrorMessage(maxPowerChargeCompleteErr,maxPowerChargeComplete, "MaxPowerChargeComplete " + high_than_or_equalto0, "maxPowerChargeCompleteItem");
        } else {
            removeErrorMessage(maxPowerChargeCompleteErr,maxPowerChargeComplete);
        }
        if (maxTimeChargeComplete.value.trim() == '') {
            generateErrorMessage(maxTimeChargeCompleteErr,maxTimeChargeComplete, "MaxTimeChargeComplete " + is_required, "maxTimeChargeCompleteItem");
        } else if (isNaN(maxTimeChargeComplete.value.trim())) {
            generateErrorMessage(maxTimeChargeCompleteErr,maxTimeChargeComplete, "MaxTimeChargeComplete " + must_be_numeric, "maxTimeChargeCompleteItem");
        } else if ((!isNaN(maxTimeChargeComplete.value.trim()) && (maxTimeChargeComplete.value.trim() < 0))) {
            generateErrorMessage(maxTimeChargeCompleteErr,maxTimeChargeComplete, "MaxTimeChargeComplete " + high_than_or_equalto0, "maxTimeChargeCompleteItem");
        } else {
            removeErrorMessage(maxTimeChargeCompleteErr,maxTimeChargeComplete);
        }
        if (alignedData.value.trim() == '') {
            generateErrorMessage(alignedDataErr,alignedData, "MeterValuesAlignedData " + is_required, "meterValuesAlignedDataItem");
        } else if (!alignedDataCheck){
            generateErrorMessage(alignedDataErr,alignedData, "MeterValuesAlignedData " + is_not_valid, "meterValuesAlignedDataItem");
        } else if (!alignedDuplicate){
            generateErrorMessage(alignedDataErr,alignedData,"MeterValuesAlignedData " + is_duplicated, "meterValuesAlignedDataItem");
        } else {
            removeErrorMessage(alignedDataErr,alignedData);
        }
        if (alignedDataMaxLength.value.trim() == '') {
            generateErrorMessage(alignedDataMaxLengthErr,alignedDataMaxLength, "MeterValuesAlignedDataMaxLength " + is_required, "meterValuesAlignedDataMaxLengthItem");
        } else if (isNaN(alignedDataMaxLength.value.trim())) {
            generateErrorMessage(alignedDataMaxLengthErr,alignedDataMaxLength, "MeterValuesAlignedDataMaxLength " + must_be_numeric, "meterValuesAlignedDataMaxLengthItem");
        } else {
            removeErrorMessage(alignedDataMaxLengthErr,alignedDataMaxLength);
        }
        if (sampleData.value.trim() == '') {
            generateErrorMessage(sampleDataErr,sampleData, "MeterValuesSampledData " + is_required, "meterValuesSampleDataItem");
        } else if (!sampleDataCheck){
            generateErrorMessage(sampleDataErr,sampleData, "MeterValuesSampledData " + is_not_valid, "meterValuesSampleDataItem");
        } else if (!sampledDuplicate){
            generateErrorMessage(sampleDataErr,sampleData, "MeterValuesSampledData " + is_duplicated, "meterValuesSampledDataItem");
        } else {
            removeErrorMessage(sampleDataErr,sampleData);
        }
        if (sampleInterval.value.trim() == '') {
            generateErrorMessage(sampleIntervalErr,sampleInterval, "MeterValueSampleInterval " + is_required, "meterValuesSampleIntervalItem");
        } else if (isNaN(sampleInterval.value.trim())) {
            generateErrorMessage(sampleIntervalErr,sampleInterval, "MeterValueSampleInterval " + must_be_numeric, "meterValuesSampleIntervalItem");
        } else if ((!isNaN(sampleInterval.value.trim()) && (sampleInterval.value.trim() > 65000))) {
            generateErrorMessage(sampleIntervalErr,sampleInterval, "MeterValueSampleInterval " + less_than_or_equalto65000, "meterValuesSampleIntervalItem");
        } else if ((!isNaN(sampleInterval.value.trim()) && (sampleInterval.value.trim() < 0))) {
            generateErrorMessage(sampleIntervalErr,sampleInterval, "MeterValueSampleInterval " + high_than_or_equalto0, "meterValuesSampleIntervalItem");
        } else {
            removeErrorMessage(sampleIntervalErr,sampleInterval);
        }
        if (minDuration.value.trim() == '') {
            generateErrorMessage(minDurationErr,minDuration, "MinimumStatusDuration " + is_required, "minimumStatusDurationItem");
        } else if (isNaN(minDuration.value.trim())) {
            generateErrorMessage(minDurationErr,minDuration, "MinimumStatusDuration " + must_be_numeric, "minimumStatusDurationItem");
        } else if (!isInt(minDuration.value)) {
            generateErrorMessage(minDurationErr,minDuration, "MinimumStatusDuration " + must_be_integer, "minimumStatusDurationItem");
        } else if ((!isNaN(minDuration.value.trim()) && (minDuration.value.trim() > 600))) {
            generateErrorMessage(minDurationErr,minDuration, "MinimumStatusDuration " + less_than_or_equalto600, "minimumStatusDurationItem");
        } else if ((!isNaN(minDuration.value.trim()) && (minDuration.value.trim() < 0))) {
            generateErrorMessage(minDurationErr,minDuration, "MinimumStatusDuration " + high_than_or_equalto0, "minimumStatusDurationItem");
        } else {
            removeErrorMessage(minDurationErr,minDuration);
        }
        if (connectorNum.value.trim() == '') {
            generateErrorMessage(connectorNumErr,connectorNum, "NumberOfConnectors " + is_required, "numberOfConnectorsItem");
        } else if (isNaN(connectorNum.value.trim())) {
            generateErrorMessage(connectorNumErr,connectorNum, "NumberOfConnectors " + must_be_numeric, "numberOfConnectorsItem");
        } else {
            removeErrorMessage(connectorNumErr,connectorNum);
        }
        if (resetRetries.value.trim() == '') {
            generateErrorMessage(resetRetriesErr,resetRetries, "ResetRetries " + is_required, "resetRetriesItem");
        } else if (isNaN(resetRetries.value.trim())) {
            generateErrorMessage(resetRetriesErr,resetRetries, "ResetRetries " + must_be_numeric, "resetRetriesItem");
        } else if ((!isNaN(resetRetries.value.trim()) && (resetRetries.value.trim() > 10))) {
            generateErrorMessage(resetRetriesErr,resetRetries, "ResetRetries " + less_than_or_equalto10, "resetRetriesItem");
        } else if ((!isNaN(resetRetries.value.trim()) && (resetRetries.value.trim() < 0))) {
            generateErrorMessage(resetRetriesErr,resetRetries, "ResetRetries " + high_than_or_equalto0, "resetRetriesItem");
        } else {
            removeErrorMessage(resetRetriesErr,resetRetries);
        }
        if (sendLocalListMaxLength.value.trim() == '') {
            generateErrorMessage(sendLocalListMaxLengthErr,sendLocalListMaxLength, "SendLocalListMaxLength " + is_required, "sendLocalListMaxLengthItem");
        } else if (isNaN(sendLocalListMaxLength.value.trim())) {
            generateErrorMessage(sendLocalListMaxLengthErr,sendLocalListMaxLength, "SendLocalListMaxLength " + must_be_numeric, "sendLocalListMaxLengthItem");
        } else if ((!isNaN(sendLocalListMaxLength.value.trim()) && (sendLocalListMaxLength.value.trim() > 10000))) {
            generateErrorMessage(sendLocalListMaxLengthErr,sendLocalListMaxLength, "SendLocalListMaxLength " + less_than_or_equalto10000, "sendLocalListMaxLengthItem");
        } else if ((!isNaN(sendLocalListMaxLength.value.trim()) && (sendLocalListMaxLength.value.trim() < 0))) {
            generateErrorMessage(sendLocalListMaxLengthErr,sendLocalListMaxLength, "SendLocalListMaxLength " + high_than_or_equalto0, "sendLocalListMaxLengthItem");
        } else {
            removeErrorMessage(sendLocalListMaxLengthErr,sendLocalListMaxLength);
        }
        if (stopAligned.value.trim() == '') {
            generateErrorMessage(stopAlignedErr,stopAligned, "StopTxnAlignedData " + is_required, "stopTxAlignedItem");
        } else if (!stopAlignedCheck){
            generateErrorMessage(stopAlignedErr,stopAligned, "StopTxnAlignedData " + is_not_valid, "stopTxAlignedItem");
        } else if (!stopAlignedDuplicate){
            generateErrorMessage(stopAlignedErr,stopAligned, "StopTxnAlignedData " + is_duplicated, "stopTxnAlignedItem");
        } else {
            removeErrorMessage(stopAlignedErr,stopAligned);
        }
        if (stopAlignedMax.value.trim() == '') {
            generateErrorMessage(stopAlignedMaxErr,stopAlignedMax, "StopTxnAlignedDataMaxLength " + is_required, "stopTxnAlignedDataMaxLengthItem");
        } else if (isNaN(stopAlignedMax.value.trim())) {
            generateErrorMessage(stopAlignedMaxErr,stopAlignedMax, "StopTxnAlignedDataMaxLength " + must_be_numeric, "stopTxnAlignedDataMaxLengthItem");
        } else {
            removeErrorMessage(stopAlignedMaxErr,stopAlignedMax);
        }
        if (stopSampled.value.trim() == '') {
            generateErrorMessage(stopSampledErr,stopSampled, "StopTxnSampledData " + is_required, "stopTxSampledItem");
        } else if (!stopSampledCheck){
            generateErrorMessage(stopSampledErr,stopSampled, "StopTxnSampledData " + is_not_valid, "stopTxSampledItem");
        } else if (!stopSampledDuplicate){
            generateErrorMessage(stopSampledErr,stopSampled, "StopTxnSampledData " + is_duplicated, "stopTxnSampledItem");
        } else {
            removeErrorMessage(stopSampledErr,stopSampled);
        }
        if (stopSampledMax.value.trim() == '') {
            generateErrorMessage(stopSampledMaxErr,stopSampledMax, "StopTxnSampledDataMaxLength " + is_required, "stopTxSampledDataMaxLengthItem");
        } else {
            removeErrorMessage(stopSampledMaxErr,stopSampledMax);
        }
        if (supported.value.trim() == '') {
            generateErrorMessage(supportedErr,supported, "SupportedFeatureProfiles " + is_required, "supportedFeatureProfilesItem");
        } else {
            removeErrorMessage(supportedErr,supported);
        }
        if (supportedMax.value.trim() == '') {
            generateErrorMessage(supportedMaxErr,supportedMax, "SupportedFeatureProfilesMaxLength " + is_required, "supportedFeatureProfilesMaxLengthItem");
        } else if (isNaN(supportedMax.value.trim())) {
            generateErrorMessage(supportedMaxErr,supportedMax, "SupportedFeatureProfilesMaxLength " + must_be_numeric, "supportedFeatureProfilesMaxLengthItem");
        } else {
            removeErrorMessage(supportedMaxErr,supportedMax);
        }
        if (attempts.value.trim() == '') {
            generateErrorMessage(attemptsErr,attempts, "TransactionMessageAttempts " + is_required, "transactionMessageAttemptsItem");
        } else if (isNaN(attempts.value.trim())) {
            generateErrorMessage(attemptsErr,attempts, "TransactionMessageAttempts " + must_be_numeric, "transactionMessageAttemptsItem");
        } else if ((!isNaN(attempts.value.trim()) && (attempts.value.trim() > 10))) {
            generateErrorMessage(attemptsErr,attempts, "TransactionMessageAttempts " + less_than_or_equalto10, "transactionMessageAttemptsItem");
        } else if ((!isNaN(attempts.value.trim()) && (attempts.value.trim() < 0))) {
            generateErrorMessage(attemptsErr,attempts, "TransactionMessageAttempts " + high_than_or_equalto0, "transactionMessageAttemptsItem");
        } else {
            removeErrorMessage(attemptsErr,attempts);
        }
        if (retryInterval.value.trim() == '') {
            generateErrorMessage(retryIntervalErr,retryInterval, "TransactionMessageRetryInterval " + is_required, "transactionMessageRetryIntervalItem");
        } else if (isNaN(retryInterval.value.trim())) {
            generateErrorMessage(retryIntervalErr,retryInterval, "TransactionMessageRetryInterval " + must_be_numeric, "transactionMessageRetryIntervalItem");
        } else if ((!isNaN(retryInterval.value.trim()) && (retryInterval.value.trim() > 120))) {
            generateErrorMessage(retryIntervalErr,retryInterval, "TransactionMessageRetryInterval " + less_than_or_equalto120, "transactionMessageRetryIntervalItem");
        } else if ((!isNaN(retryInterval.value.trim()) && (retryInterval.value.trim() < 0))) {
            generateErrorMessage(retryIntervalErr,retryInterval, "TransactionMessageRetryInterval " + high_than_or_equalto0, "transactionMessageRetryIntervalItem");
        } else {
            removeErrorMessage(retryIntervalErr,retryInterval);
        }
        if (pingInterval.value.trim() == '') {
            generateErrorMessage(pingIntervalErr,pingInterval, "WebSocketPingInterval " + is_required, "webSocketPingIntervalItem");
        } else if (isNaN(pingInterval.value.trim())) {
            generateErrorMessage(pingIntervalErr,pingInterval, "WebSocketPingInterval " + must_be_numeric, "webSocketPingIntervalItem");
        } else if ((!isNaN(pingInterval.value.trim()) && (pingInterval.value.trim() > 600))) {
            generateErrorMessage(pingIntervalErr,pingInterval, "WebSocketPingInterval " + less_than_or_equalto600, "webSocketPingIntervalItem");
        } else if ((!isNaN(pingInterval.value.trim()) && (pingInterval.value.trim() < 0))) {
            generateErrorMessage(pingIntervalErr,pingInterval, "WebSocketPingInterval " + high_than_or_equalto0, "webSocketPingIntervalItem");
        } else {
            removeErrorMessage(pingIntervalErr,pingInterval);
        }

        if (authorizationKey.value.trim() == '') {
            if(isJQueryAndUIReady()){
                $("#authorizationKeyAlertMessage").dialog({
                    width: 580,
                    height: 300,
                    modal: true,
                    closeOnEscape: false,
                    dialogClass: "dialog-no-close",
                    buttons: [
                        {
                            text: cancel_button,
                            class: "okButton",
                            click: function () {
                                document.getElementById("authorizationKey").value = authorizationKeyValue;
                                $(this).dialog("close");
                            }
                        },
                        {
                            text: confirm_button,
                            class: "saveButton",
                            style: "margin-left:12px;",
                            click: function () {
                                ocppError--;
                                if (ocppError == 0) {
                                    ocppModeSelectionAlertMessage();
                                }
                                $(this).dialog("close");
                            }
                        },
                    ],
                    close: function () {
                    }
                });
            }
        } else {
            if (authorizationKey.value.length > 40) {
                generateErrorMessage(authorizationKeyErr,authorizationKey, "AuthorizationKey " + auth_key_max_limit, "AuthorizationKeyItem");
            } else {
                removeErrorMessage(authorizationKeyErr,authorizationKey);
            }
        }
        
        if(ocppError > 0){
            //ocppErrorAlertMessage
            var ocppErrorDialogTextElement = document.getElementById("ocppErrorDialogText");
            // Set the new text
            if(ocppErrorText){
                ocppErrorDialogTextElement.innerHTML = ocppErrorText;

                $("#ocppErrorAlertMessage").dialog({
                    width: 580,
                    height: 300,
                    modal: true,
                    closeOnEscape: false,
                    dialogClass: "dialog-no-close",
                    buttons: [{
                        text: ok_button,
                        class: "okButton",
                        click: function () {
                            $(this).dialog("close");
                            openThePosition(ocppErrorPosition);
                        }
                    }]
                });
            }

        }

    } else {
        ocppError = 0;
    }
    if (ocppError == 0) {
        ocppModeSelectionAlertMessage();
    }
}

function ocppModeSelectionAlertMessage() {
    if (standalone_mode != "ocppList" && standalone_mode != "") {

        if(isJQueryAndUIReady()){
            $("#ocppModeSelectionAlertMessage").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [
                    {
                        text: cancel_button,
                        class: "okButton",
                        click: function () {
                            $(this).dialog("close");
                        }
                    },
                    {
                        text: confirm_button,
                        class: "saveButton",
                        style: "margin-left:12px;",
                        click: function () {
                            showingAnimationContainer("button_ocpp");
                            $(this).dialog("close");
                        }
                    },
                ],
                close: function () {

                }
            });
        }
    } else {
        showingOffPeakChargingOcppAlert();
    }
}

function checkNetworkForm(form) {
    var ethernetCheck = checkEthernetFields();
    var wifiCheck = checkWifiFields();
    var vpnCheck = checkVpnFields();
    if (ethernetCheck == 0 && wifiCheck == 0 && vpnCheck == 0) {
        if(isJQueryAndUIReady()){
            $("#interfaces_saved_message").dialog({
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close"
            });
            setTimeout(function () {
                document.getElementById("button_interfaces").click();
            }, 1000);
        }
    }
}

function checkLANNetworkForm(form) {
    var ethernetCheck = checkEthernetFields();
    if (ethernetCheck == 0) {
        showingAnimationContainer("button_lan_interfaces");
    }
}

function checkWLANNetworkForm(form) {
    var wifiCheck = checkWifiFields();
    if (wifiCheck == 0) {
        if (disableCellular == true) {
            showingAnimationContainer("button_wlan_cellular");
        } else {
            showingAnimationContainer("button_wlan_interfaces");
        }
    }
}

function checkCellularNetworkForm(form) {

    if (disableWlan == true) {
        showingAnimationContainer("button_cellular_wlan");
    } else {
        showingAnimationContainer("button_cellular_interfaces");
    }
}

function checkWifiHotspotForm(form) {
    var wifiHotspotCheck = checkWifiHotspotFields();
    if (wifiHotspotCheck == 0) {
        showHotspotRebootAlert("button_hotspot_interfaces");
    }
}

function showHotspotRebootAlert(buttonId) {
    if(isJQueryAndUIReady()){
        $("#hotspotAlertMessage").dialog({
            width: 580,
            height: 300,
            modal: true,
            closeOnEscape: false,
            dialogClass: "dialog-no-close",
            buttons: [
                {
                    text: cancel_button,
                    class: "okButton",
                    click: function () {
                        showingAnimationContainer(buttonId);
                        $(this).dialog("close");
                    }
                },
                {
                    text: confirm_button,
                    class: "saveButton",
                    style: "margin-left:12px;",
                    click: function () {
                        showingAnimationContainer("button_hotspot_reboot_now");
                        $(this).dialog("close");
                    }
                },
            ],
            close: function () {

            }
        });
    }
}


function checkCellularFields() {
    var cellularEnabled = document.getElementById("cellularEnable");
    var apn = document.getElementById("apn");
    var apnUserName = document.getElementById("apnUserName");
    var apnPassword = document.getElementById("apnPassword");
    var simPin = document.getElementById("simPin");
    var apnErr = document.getElementById("apnErr");
    var apnUserNameErr = document.getElementById("apnUserNameErr");
    var apnPasswordErr = document.getElementById("apnPasswordErr");
    var simPinErr = document.getElementById("simPinErr");
    var cellularError = 1;

    if (cellularEnabled.selected == true) {
        if (apn.value.trim() == '') {
            apnErr.innerHTML = enter_apn;
            apn.className = "focusedTextarea";
        } else {
            apnErr.innerHTML = "";
            apn.className = "textarea1";
            cellularError--;
        }
        /*if (apnUserName.value.trim() == '') {
            apnUserNameErr.innerHTML = "* APN username is required!";
            apnUserName.className = "focusedTextarea";
        } else {
            apnUserNameErr.innerHTML = "*";
            apnUserName.className = "textarea1";
            cellularError--;
        }
        if (apnPassword.value.trim() == '') {
            apnPasswordErr.innerHTML = "* APN password is required!";
            apnPassword.className = "focusedTextarea";
        } else {
            apnPasswordErr.innerHTML = "*";
            apnPassword.className = "textarea1";
            cellularError--;
        }
        if (simPin.value.trim() == '') {
            simPinErr.innerHTML = "* SIM PIN is required!";
            simPin.className = "focusedTextarea";
        } else if (isNaN(simPin.value.trim())) {
            simPinErr.innerHTML = "* SIM PIN must be numeric!";
            simpin.className = "focusedTextarea";
        } else if (simPin.value.length != 4) {
            simPinErr.innerHTML = "* SIM PIN must be 4 digits!";
            simPin.className = "focusedTextarea";
        } else {
            simPinErr.innerHTML = "*";
            simPin.className = "textarea1";
            cellularError--;
        }*/
    } else {
        cellularError = 0;
    }
    return cellularError;
}


function checkEthernetFields() {
    var ethernetEnabled = document.getElementById("ethernetEnable");
    var ethernetSelectionBox = document.getElementById("ethernetIpSetting");
    var IPadress = document.getElementById("IPadress");
    var networkMask = document.getElementById("networkMask");
    var defaultGateway = document.getElementById("defaultGateway");
    var primaryDns = document.getElementById("primaryDns");
    var secondaryDns = document.getElementById("secondaryDns");
    var ethernetSelectionBoxErr = document.getElementById("ethernetIpSettingErr");
    var IPadressErr = document.getElementById("IPadressErr");
    var networkMaskErr = document.getElementById("networkMaskErr");
    var defaultGatewayErr = document.getElementById("defaultGatewayErr");
    var primaryDnsErr = document.getElementById("primaryDnsErr");
    var secondaryDnsErr = document.getElementById("secondaryDnsErr");
    var maxDHCPAddrRange = document.getElementById("maxDHCPAddrRange");
    var maxDHCPAddrRangeErr = document.getElementById("maxDHCPAddrRangeErr");
    var minDHCPAddrRange = document.getElementById("minDHCPAddrRange");
    var minDHCPAddrRangeErr = document.getElementById("minDHCPAddrRangeErr");
    var wifiSelectionBox = document.getElementById("wifiIpSetting");
    var wifiIPaddress = document.getElementById("wifiIPaddress");
    var wifiNetworkMask = document.getElementById("wifiNetworkMask");
    var ethernetError;
    var maxValue = 0;
    var minValue = 0;

    if (ethernetSelectionBox.selectedIndex == "1") {
        ethernetError = 5;
        var subnetCheck = checkNetworkMaskValidity(networkMask.value.trim());
        if (wifiSelectionBox.selectedIndex == "1") {
            var eth_broadcast = calculateBroadcastIP(IPadress.value.trim(), networkMask.value.trim());
            var wifi_broadcast = calculateBroadcastIP(wifiIPaddress.value.trim(), wifiNetworkMask.value.trim());
            if (compare_cidr(networkMask.value.trim(), wifiNetworkMask.value.trim())) {
                eth_broadcast = calculateBroadcastIP(IPadress.value.trim(), wifiNetworkMask.value.trim());
            } else {
                wifi_broadcast = calculateBroadcastIP(wifiIPaddress.value.trim(), networkMask.value.trim());
            }
        }
        if (IPadress.value.trim() == '') {
            IPadressErr.innerHTML = enter_ip;
            IPadress.className = "focusedTextarea";
        } else if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(IPadress.value) == false) {
            IPadressErr.innerHTML = entered_invalid_ip;
            IPadress.className = "focusedTextarea";
        } else if (wifiSelectionBox.selectedIndex == "1" && eth_broadcast == wifi_broadcast) {
            IPadressErr.innerHTML = same_network_wlan;
            IPadress.className = "focusedTextarea";
        } else {
            IPadressErr.innerHTML = "";
            IPadress.className = "textarea1";
            ethernetError--;
        }
        if (networkMask.value.trim() == '') {
            networkMaskErr.innerHTML = enter_network_mask;
            networkMask.className = "focusedTextarea";
        } else if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(networkMask.value) == false) {
            networkMaskErr.innerHTML = entered_invalid_network_mask;
            networkMask.className = "focusedTextarea";
        } else if (subnetCheck == false) {
            networkMaskErr.innerHTML = entered_invalid_network_mask;
            networkMask.className = "focusedTextarea";
        } else {
            networkMaskErr.innerHTML = "";
            networkMask.className = "textarea1";
            ethernetError--;
        }
        if (defaultGateway.value.trim() != '' && /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(defaultGateway.value) == false) {
            defaultGatewayErr.innerHTML = entered_invalid_default_gateway;
            defaultGateway.className = "focusedTextarea";
        } else {
            defaultGatewayErr.innerHTML = "";
            defaultGateway.className = "textarea1";
            ethernetError--;
        }
        if (primaryDns.value.trim() != '' && /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(primaryDns.value) == false) {
            primaryDnsErr.innerHTML = entered_invalid_dns;
            primaryDns.className = "focusedTextarea";
        } else {
            primaryDnsErr.innerHTML = "";
            primaryDns.className = "textarea1";
            ethernetError--;
        }
        if (secondaryDns.value.trim() != '' && /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(secondaryDns.value) == false) {
            secondaryDnsErr.innerHTML = entered_invalid_dns;
            secondaryDns.className = "focusedTextarea";
        } else {
            secondaryDnsErr.innerHTML = "";
            secondaryDns.className = "textarea1";
            ethernetError--;
        }
        ethernetSelectionBoxErr.innerHTML = "";
        ethernetSelectionBox.className = "textarea1";
    }
    else if (ethernetSelectionBox.selectedIndex == "2") { //DHCP Server
        var ethernetError = 8;
        var subnetCheck = checkNetworkMaskValidity(networkMask.value.trim());
        if (networkMask.value.trim() == '') {
            networkMaskErr.innerHTML = enter_network_mask;
            networkMask.className = "focusedTextarea";
        } else if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(networkMask.value) == false) {
            networkMaskErr.innerHTML = entered_invalid_network_mask;
            networkMask.className = "focusedTextarea";
        } else if (subnetCheck == false) {
            networkMaskErr.innerHTML = entered_invalid_network_mask;
            networkMask.className = "focusedTextarea";
        } else {
            networkMaskErr.innerHTML = "";
            networkMask.className = "textarea1";
            ethernetError--;
        }
        if (defaultGateway.value.trim() != '' && /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(defaultGateway.value) == false) {
            defaultGatewayErr.innerHTML = entered_invalid_default_gateway;
            defaultGateway.className = "focusedTextarea";
        } else {
            defaultGatewayErr.innerHTML = "";
            defaultGateway.className = "textarea1";
            ethernetError--;
        }

        var startEndValues = findingHosts(IPadress.value, networkMask.value).split("+");
        var maxIp = startEndValues[0];
        var minIp = startEndValues[1];
        var baseIp = startEndValues[2];

        cidr = 32 - (hostNumber(networkMask.value)); // it gives the number of zeros.
        binaryMinIp = (convertingIptoBinary(minDHCPAddrRange.value)).substring(0, cidr);
        binaryMaxIp = convertingIptoBinary(maxDHCPAddrRange.value).substring(0, cidr);
        binaryIp = convertingIptoBinary(IPadress.value).substring(0, cidr);
        binaryBaseIp = convertingIptoBinary(baseIp).substring(0, cidr);

        if (maxDHCPAddrRange.value.trim() == '') {
            maxDHCPAddrRangeErr.innerHTML = enter_max_dhcp_addr_range;
            maxDHCPAddrRange.className = "focusedTextarea";
        } else if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(maxDHCPAddrRange.value) == false) {
            maxDHCPAddrRangeErr.innerHTML = entered_invalid_ip;
            maxDHCPAddrRange.className = "focusedTextarea";

        } else if (binaryMaxIp.localeCompare(binaryBaseIp)) {
            maxDHCPAddrRangeErr.innerHTML = entered_invalid_subnet;
            maxDHCPAddrRange.className = "focusedTextarea";
        } else {
            maxDHCPAddrRangeErr.innerHTML = "";
            maxDHCPAddrRange.className = "textarea1";
            ethernetError--;
        }
        if (minDHCPAddrRange.value.trim() == '') {
            minDHCPAddrRangeErr.innerHTML = enter_min_dhcp_addr_range;
            minDHCPAddrRange.className = "focusedTextarea";
        } else if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(minDHCPAddrRange.value) == false) {
            minDHCPAddrRangeErr.innerHTML = entered_invalid_ip;
            minDHCPAddrRange.className = "focusedTextarea";

        } else if (binaryMinIp.localeCompare(binaryBaseIp)) {
            minDHCPAddrRangeErr.innerHTML = entered_invalid_subnet;
            minDHCPAddrRange.className = "focusedTextarea";
        } else {
            minDHCPAddrRangeErr.innerHTML = "";
            minDHCPAddrRange.className = "textarea1";
            ethernetError--;
        }
        if (((ip2long(maxDHCPAddrRange.value) - ip2long(minDHCPAddrRange.value))) <= 0) {
            maxDHCPAddrRangeErr.innerHTML = diff_max_and_min_dhcp_adr_range;
            maxDHCPAddrRange.className = "focusedTextarea";
            minDHCPAddrRangeErr.innerHTML = diff_max_and_min_dhcp_adr_range;
            minDHCPAddrRange.className = "focusedTextarea";
        } else {
            ethernetError--;
        }
        if (IPadress.value.trim() == '') {
            IPadressErr.innerHTML = enter_ip;
            IPadress.className = "focusedTextarea";
        } else if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(IPadress.value) == false) {
            IPadressErr.innerHTML = entered_invalid_ip;
            IPadress.className = "focusedTextarea";
        } else if (ip2long(minDHCPAddrRange.value) < ip2long(IPadress.value) && ip2long(maxDHCPAddrRange.value) > ip2long(IPadress.value)) {
            IPadressErr.innerHTML = ip_address_range;
            IPadress.className = "focusedTextarea";
        } else if (binaryIp.localeCompare(binaryBaseIp)) {
            IPadressErr.innerHTML = entered_invalid_subnet;
            IPadress.className = "focusedTextarea";
        } else {
            IPadressErr.innerHTML = "";
            IPadress.className = "textarea1";
            ethernetError--;
        }
        if (primaryDns.value.trim() != '' && /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(primaryDns.value) == false) {

            primaryDnsErr.innerHTML = enter_primary_dns;
            primaryDns.className = "focusedTextarea";
        } else if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(primaryDns.value) == false) {
            primaryDnsErr.innerHTML = entered_invalid_dns;
            primaryDns.className = "focusedTextarea";
        } else {
            primaryDnsErr.innerHTML = "";
            primaryDns.className = "textarea1";
            ethernetError--;
        }
        if (secondaryDns.value.trim() != '' && /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(secondaryDns.value) == false) {
            secondaryDnsErr.innerHTML = entered_invalid_dns;
            secondaryDns.className = "focusedTextarea";
        } else {
            secondaryDnsErr.innerHTML = "";
            secondaryDns.className = "textarea1";
            ethernetError--;
        }
        ethernetSelectionBoxErr.innerHTML = "";
        ethernetSelectionBox.className = "textarea1";
    } else if (ethernetSelectionBox.selectedIndex == "0") {
        ethernetSelectionBoxErr.innerHTML = select_ip_setting;
        ethernetSelectionBox.className = "focusedTextarea";
    } else {
        ethernetSelectionBoxErr.innerHTML = "";
        ethernetSelectionBox.className = "textarea1";
        ethernetError = 0;
    }
    return ethernetError;
}

function checkWifiFields() {
    var wifiEnabled = document.getElementById("wifiEnable");
    var ssid = document.getElementById("wifiSSID");
    var selectSecurity = document.getElementById("selectSecurity");
    var wifiSelectionBox = document.getElementById("wifiIpSetting");
    var wifiIPaddress = document.getElementById("wifiIPaddress");
    var wifiNetworkMask = document.getElementById("wifiNetworkMask");
    var wifiDefaultGateway = document.getElementById("wifiDefaultGateway");
    var wifiPrimaryDns = document.getElementById("wifiPrimaryDns");
    var wifiSecondaryDns = document.getElementById("wifiSecondaryDns");
    var ssidErr = document.getElementById("wifiSSIDErr");
    var wifiPasswordErr = document.getElementById("wifiPasswordErr");
    var selectSecurityErr = document.getElementById("selectSecurityErr");
    var wifiIPaddressErr = document.getElementById("wifiIPaddressErr");
    var wifiNetworkMaskErr = document.getElementById("wifiNetworkMaskErr");
    var wifiDefaultGatewayErr = document.getElementById("wifiDefaultGatewayErr");
    var wifiPrimaryDnsErr = document.getElementById("wifiPrimaryDnsErr");
    var wifiSecondaryDnsErr = document.getElementById("wifiSecondaryDnsErr");
    var ethernetSelectionBox = document.getElementById("ethernetIpSetting");
    var IPadress = document.getElementById("IPadress");
    var networkMask = document.getElementById("networkMask");
    var wifiError = -1;
    if (wifiSelectionBox.selectedIndex == "1") {
        wifiError = 8;
    } else if (wifiSelectionBox.selectedIndex == "2") {
        wifiError = 3;
    }

    if (wifiEnabled.selected == true) {
        if (ssid.value.trim() == '') {
            ssidErr.innerHTML = enter_ssid;
            ssid.className = "focusedTextarea";
        } else if (/^[\u0020-\u007F\u00C0-\u017F]{1,32}$/.test(ssid.value) == false) {
            ssidErr.innerHTML = wifiSSIDSpecialCharacter;
            ssid.className = "focusedTextarea";
        } else if ((ssid.value).includes('"') ||
            (ssid.value).includes("\\")) {
            ssidErr.innerHTML = wifiSSIDSpecialCharacter;
            ssid.className = "focusedTextarea";
        } else {
            ssidErr.innerHTML = "";
            ssid.className = "textarea1";
            wifiError--;
        }
        if (wifiPassword.value.trim() == '' && selectSecurity.value == 'none') {
            wifiPasswordErr.innerHTML = "";
            wifiPassword.className = "textarea1";
            wifiError--;
        }else{
            if(wifiPassword.value.trim() == "******"){
                wifiPasswordErr.innerHTML = "";
                wifiPassword.className = "textarea1";
                wifiError--;
            }else{
                if (wifiPassword.value.trim() == '') {
                    wifiPasswordErr.innerHTML = enter_password;
                    wifiPassword.className = "focusedTextarea";
                } else if (/^([\x20-\x7F]){8,63}$/.test(wifiPassword.value) == false) {
                    wifiPasswordErr.innerHTML = wifiSpecialCharacter;
                    wifiPassword.className = "focusedTextarea";
                } else if ((wifiPassword.value).includes("'") || (wifiPassword.value).includes('"') ||
                    (wifiPassword.value).includes("\\") || wifiPassword.value.includes(" ")) {
                    wifiPasswordErr.innerHTML = wifiSpecialCharacter;
                    wifiPassword.className = "focusedTextarea";
                } else {
                    wifiPasswordErr.innerHTML = "";
                    wifiPassword.className = "textarea1";
                    wifiError--;
                }
            }
    
        }
        if (selectSecurity.value == 'default') {
            selectSecurityErr.innerHTML = select_security_type;
            selectSecurity.className = "focusedTextarea";
        } else {
            selectSecurityErr.innerHTML = "";
            selectSecurity.className = "textarea1";
            wifiError--;
        }
        if (wifiSelectionBox.selectedIndex == "1") {
            var subnetCheck = checkNetworkMaskValidity(wifiNetworkMask.value.trim());
            if (ethernetSelectionBox.selectedIndex == "1") {
                var eth_broadcast = calculateBroadcastIP(IPadress.value.trim(), networkMask.value.trim());
                var wifi_broadcast = calculateBroadcastIP(wifiIPaddress.value.trim(), wifiNetworkMask.value.trim());
                if (compare_cidr(networkMask.value.trim(), wifiNetworkMask.value.trim())) {
                    eth_broadcast = calculateBroadcastIP(IPadress.value.trim(), wifiNetworkMask.value.trim());
                } else {
                    wifi_broadcast = calculateBroadcastIP(wifiIPaddress.value.trim(), networkMask.value.trim());
                }
            }
            if (wifiIPaddress.value.trim() == '') {
                wifiIPaddressErr.innerHTML = enter_ip;
                wifiIPaddress.className = "focusedTextarea";
            } else if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(wifiIPaddress.value) == false) {
                wifiIPaddressErr.innerHTML = entered_invalid_ip;
                wifiIPaddress.className = "focusedTextarea";
            } else if (ethernetSelectionBox.selectedIndex == 1 && eth_broadcast == wifi_broadcast) {
                wifiIPaddressErr.innerHTML = same_network_lan;
                wifiIPaddress.className = "focusedTextarea";
            } else {
                wifiIPaddressErr.innerHTML = "";
                wifiIPaddress.className = "textarea1";
                wifiError--;
            }
            if (wifiNetworkMask.value.trim() == '') {
                wifiNetworkMaskErr.innerHTML = enter_network_mask;
                wifiNetworkMask.className = "focusedTextarea";
            } else if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(wifiNetworkMask.value) == false) {
                wifiNetworkMaskErr.innerHTML = entered_invalid_network_mask;
                wifiNetworkMask.className = "focusedTextarea";
            } else if (subnetCheck == false) {
                wifiNetworkMaskErr.innerHTML = entered_invalid_network_mask;
                wifiNetworkMask.className = "focusedTextarea";
            } else {
                wifiNetworkMaskErr.innerHTML = "";
                wifiNetworkMask.className = "textarea1";
                wifiError--;
            }
            if (wifiDefaultGateway.value.trim() != '' && /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(wifiDefaultGateway.value) == false) {
                wifiDefaultGatewayErr.innerHTML = entered_invalid_default_gateway;
                wifiDefaultGateway.className = "focusedTextarea";
            } else {
                wifiDefaultGatewayErr.innerHTML = "";
                wifiDefaultGateway.className = "textarea1";
                wifiError--;
            }
            if (wifiPrimaryDns.value.trim() != '' && /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(wifiPrimaryDns.value) == false) {
                wifiPrimaryDnsErr.innerHTML = entered_invalid_dns;
                wifiPrimaryDns.className = "focusedTextarea";
            } else {
                wifiPrimaryDnsErr.innerHTML = "";
                wifiPrimaryDns.className = "textarea1";
                wifiError--;
            }
            if (wifiSecondaryDns.value.trim() != '' && /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(wifiSecondaryDns.value) == false) {
                wifiSecondaryDnsErr.innerHTML = entered_invalid_dns;
                wifiSecondaryDns.className = "focusedTextarea";
            } else {
                wifiSecondaryDnsErr.innerHTML = "";
                wifiSecondaryDns.className = "textarea1";
                wifiError--;
            }
            selectWifiIPSettingErr.innerHTML = "";
            wifiSelectionBox.className = "textarea1";
        } else if (wifiSelectionBox.selectedIndex == "0") {
            selectWifiIPSettingErr.innerHTML = select_ip_setting;
            wifiSelectionBox.className = "focusedTextarea";
        } else {
            selectWifiIPSettingErr.innerHTML = "";
            wifiSelectionBox.className = "textarea1";
        }
    } else {
        selectWifiIPSettingErr.innerHTML = "";
        wifiSelectionBox.className = "textarea1";
        wifiError = 0;
    }
    return wifiError;
}

function checkVpnFields() {
    var vpnEnabled = document.getElementById("vpnEnable");
    var vpnFunctionality = document.getElementById("vpnFunctionality");
    var hostIP = document.getElementById("hostIP");
    var certification = document.getElementById("certificationManagement");
    var vpnName = document.getElementById("vpnName");
    var vpnPassword = document.getElementById("vpnPassword");
    var vpnFunctionalityErr = document.getElementById("vpnFunctionalityErr");
    var hostIPErr = document.getElementById("hostIPErr");
    var certificationErr = document.getElementById("certificationErr");
    var vpnNameErr = document.getElementById("vpnNameErr");
    var vpnPasswordErr = document.getElementById("vpnPasswordErr");
    var vpnError = 5;

    if (vpnEnabled.checked == true) {
        if (vpnFunctionality.value.trim() == '') {
            vpnFunctionalityErr.innerHTML = enter_vpn_functionality;
            vpnFunctionality.className = "focusedTextarea";
        } else {
            vpnFunctionalityErr.innerHTML = "*";
            vpnFunctionality.className = "textarea1";
            vpnError--;
        }
        if (hostIP.value.trim() == '') {
            hostIPErr.innerHTML = enter_host_ip;
            hostIP.className = "focusedTextarea";
        } else if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(hostIP.value) == false) {
            hostIPErr.innerHTML = entered_invalid_ip;
            hostIP.className = "focusedTextarea";
        } else {
            hostIPErr.innerHTML = "*";
            hostIP.className = "textarea1";
            vpnError--;
        }
        if (certification.value.trim() == '') {
            certificationErr.innerHTML = enter_cert_management;
            certification.className = "focusedTextarea";
        } else {
            certificationErr.innerHTML = "*";
            certification.className = "textarea1";
            vpnError--;
        }
        if (vpnName.value.trim() == '') {
            vpnNameErr.innerHTML = enter_vpn_name;
            vpnName.className = "focusedTextarea";
        } else {
            vpnNameErr.innerHTML = "*";
            vpnName.className = "textarea1";
            vpnError--;
        }
        if (vpnPassword.value.trim() == '') {
            vpnPasswordErr.innerHTML = enter_vpn_password;
            vpnPassword.className = "focusedTextarea";
        } else {
            vpnPasswordErr.innerHTML = "*";
            vpnPassword.className = "textarea1";
            vpnError--;
        }
    } else {
        vpnError = 0;
    }
    return vpnError;
}

function checkWifiHotspotFields() {
    var hotspotEnabled = document.getElementById("wifiHotspotEnable");
    var ssidHotspot = document.getElementById("wifiHotspotSSID");
    var ssidHotspotErr = document.getElementById("wifiHotspotSSIDErr");
    var wifiHotspotPasswordErr = document.getElementById("wifiHotspotPasswordErr");
    var hotspotError = 2;

    if (hotspotEnabled.selected == true) {
        if (ssidHotspot.value.trim() == '') {
            ssidHotspotErr.innerHTML = enter_ssid;
            ssidHotspot.className = "focusedTextarea";
        } else if (/^([\x20-\x7F])+$/.test(ssidHotspot.value) == false) {
            ssidHotspotErr.innerHTML = wifiSSIDSpecialCharacter;
            ssidHotspot.className = "focusedTextarea";
        } else if ((ssidHotspot.value).includes("'") || (ssidHotspot.value).includes('"') ||
            (ssidHotspot.value).includes("\\")) {
            ssidHotspotErr.innerHTML = wifiSSIDSpecialCharacter;
            ssidHotspot.className = "focusedTextarea";
        } else {
            ssidHotspotErr.innerHTML = "";
            ssidHotspot.className = "textarea1";
            hotspotError--;
        }
        if (checkWifiHotspotPassword() == true) {
            hotspotError--;
        }
    } else {
        hotspotError = 0;
    }
    return hotspotError;
}

function checkQRCodeDelimiterField() {
    var qrCodeEnabled = document.getElementById("qrCodeSelection");
    var qrCodeDelimiterValue = document.getElementById("qrCodeDelimiter");
    var qrCodeDelimiterErr = document.getElementById("qrCodeDelimiterErr");
    var qrCodeError = 1;

    if (qrCodeEnabled.value == 1 && qrCodeDelimiterValue.value.length != 0) {
        if (qrCodeDelimiterValue.value.trim().length == 0) {
            changeLanguageForQRDelimiterErrorText(qrCodeDelimiterErr);
            qrCodeDelimiterErr.innerHTML = qrCodeDelimiterCharacter;
            qrCodeDelimiterValue.className = "focusedTextarea";
        }
        else if (qrCodeDelimiterValue.value.trim() != '' && /^([@+.,0-9:;!#^$%&/()\[{}\]=*?_<>|-]){1,3}$/.test(qrCodeDelimiterValue.value) == false) {
            changeLanguageForQRDelimiterErrorText(qrCodeDelimiterErr);
            qrCodeDelimiterErr.innerHTML = qrCodeDelimiterCharacter;
            qrCodeDelimiterValue.className = "focusedTextarea";
        } else {
            qrCodeDelimiterErr.innerHTML = "";
            qrCodeDelimiterValue.className = "textarea1";
            qrCodeError--;
        }
    } else {
        qrCodeError = 0;
    }
    return qrCodeError;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
//openTab(event,document.getElementById("active_tab").value);
function checkWifiHotspotPassword() {
    var wifiHotspotPasswordErr = document.getElementById("wifiHotspotPasswordErr");
    if(wifiHotspotPassword.value.trim() == "******"){
        wifiHotspotPasswordErr.innerHTML = "";
        wifiHotspotPassword.className = "textarea1";
        return true;
    }else{
        if (hotspotPasswordLevel == 1) {
            if (wifiHotspotPassword.value.trim() != '' && (/^([\x20-\x7F]){8,63}$/.test(wifiHotspotPassword.value) == false)) {
                wifiHotspotPasswordErr.innerHTML = wifiSpecialCharacter;
                wifiHotspotPassword.className = "focusedTextarea";
            } else if ((wifiHotspotPassword.value).includes("'") || (wifiHotspotPassword.value).includes('"') ||
                (wifiHotspotPassword.value).includes("\\")) {
                wifiHotspotPasswordErr.innerHTML = wifiSpecialCharacter;
                wifiHotspotPassword.className = "focusedTextarea";
            } else {
                wifiHotspotPasswordErr.innerHTML = "";
                wifiHotspotPassword.className = "textarea1";
                return true;
            }
        }
        else if (hotspotPasswordLevel == 2) {
            if (wifiHotspotPassword.value.trim() != '' && ((/(?=^.{20}$)(?=(.*\d){2})(?=(.*[A-Za-z]){2})(?=(.*[!%&\/()=?\*#+\-_]){2}).*$/.test(wifiHotspotPassword.value) == false) || (/^[ A-Za-z0-9!%&\/()=?\*#+\-_]*$/.test(wifiHotspotPassword.value) == false))) {
                wifiHotspotPasswordErr.innerHTML = wifiHotspotPasswordErrorLevel2;
                wifiHotspotPassword.className = "focusedTextarea";
            } else {
                wifiHotspotPasswordErr.innerHTML = "";
                wifiHotspotPassword.className = "textarea1";
                return true;
            }
        } else if (hotspotPasswordLevel == 3) {
            if (/(?=^.{12,32}$)(?=(.*\d){2})(?=(.*[A-Z]){2})(?=(.*[a-z]){2})(?=(.*[!%&\/()=?\*#+\-_]){2}).*$/.test(wifiHotspotPassword.value) == false || (/^[ A-Za-z0-9!%&\/()=?\*#+\-_]*$/.test(wifiHotspotPassword.value) == false)) {
                wifiHotspotPasswordErr.innerHTML = wifiHotspotPasswordErrorLevel3;
                wifiHotspotPassword.className = "focusedTextarea";
            } else {
                wifiHotspotPasswordErr.innerHTML = "";
                wifiHotspotPassword.className = "textarea1";
                return true;
            }
        }
        return false;
    }
}

function sendMode() {
    var rfidList = document.getElementById("to");
    var selection = document.getElementById("selectStandaloneMode");
    var standaloneModeErr = document.getElementById("standaloneModeErr");
    var modeError = 1;

    if ((selection.options[selection.selectedIndex].value) == "localList") {
        if (rfidList.options.length != 0) {
            var arrayOfRfid = [];
            for (var i = 0; i < rfidList.options.length; i++) {
                //arrayOfRfid.push(rfidList.options[i].innerHTML);
                arrayOfRfid[i] = rfidList.options[i].innerHTML;
            }
        }
    }
    document.getElementById("demo").value = arrayOfRfid;

    if ((selection.options[selection.selectedIndex].value) == "select") {
        standaloneModeErr.innerHTML = select_mode;
        selection.className = "focusedTextarea";
    } else if ((selection.options[selection.selectedIndex].value) == "localList" && rfidList.options.length == 0) {
        standaloneModeErr.innerHTML = enter_rfid_local_list;
        selection.className = "focusedTextarea";
    } else {
        standaloneModeErr.innerHTML = "";
        selection.className = "selectbox";
        modeError--;
    }

    if (modeError == 0) {
        if (standalone_mode == "ocppList") {
            if(isJQueryAndUIReady()){
                $("#standaloneModeAlertMessage").dialog({
                    width: 580,
                    height: 300,
                    modal: true,
                    closeOnEscape: false,
                    dialogClass: "dialog-no-close",
                    buttons: [
                        {
                            text: cancel_button,
                            class: "okButton",
                            click: function () {
                                $(this).dialog("close");
                            }
                        },
                        {
                            text: confirm_button,
                            class: "saveButton",
                            style: "margin-left:12px;",
                            click: function () {
                                showingAnimationContainer("button_standalone");
                                $(this).dialog("close");
                            }
                        },
                    ],
                    close: function () {

                    }
                });
            }
        } else {
            showingAnimationContainer("button_standalone");
        }
    }
}

function factoryReset(token) {
    if(isJQueryAndUIReady()){
        $("#savedAlertMessage").dialog({
            width: 580,
            height: 300,
            modal: true,
            closeOnEscape: false,
            dialogClass: "dialog-no-close",
            buttons: [{
                text: cancel_button,
                class: "okButton",
                click: function () {
                    $(this).dialog("close");
                }
            },
            {
                text: confirm_button,
                class: "saveButton",
                click: function () {
                    $("#factory_reset_saved_message").dialog({
                        width: 580,
                        height: 300,
                        modal: true,
                        closeOnEscape: false,
                        dialogClass: "dialog-no-close"
                    });
                    setTimeout(function () {
                        startProgressBar(token);
                    }, 1000);


                }
            },
            ],
            close: function () {

            }
        });
    }

}

function firmwareUpdate() {
    showingAnimationContainer("fileUpload");

}

function systemReset(id) {
    var hardResetText = document.getElementById("hardResetWarningText").innerHTML;
    var softResetText = document.getElementById("softResetWarningText").innerHTML;
    if (hardResetText.indexOf("Hard Reset") > -1 || softResetText.indexOf("Hard Reset") > -1) {
        var hardResetWords = hardResetText.split("Hard Reset");
        var softResetWords = softResetText.split("Soft Reset");
        document.getElementById("hardResetWarningText").innerHTML = hardResetWords[0] + "Hard Reset".bold() + hardResetWords[1].bold();
        document.getElementById("softResetWarningText").innerHTML = softResetWords[0] + "Soft Reset".bold() + softResetWords[1].bold();
    }
    if (id === 'button_hard_reset') {
        $('#hardResetWarningText').css('display', 'block');
        $('#softResetWarningText').css('display', 'none');
    } else {
        $('#hardResetWarningText').css('display', 'none');
        $('#softResetWarningText').css('display', 'block');
    }
    if(isJQueryAndUIReady()){
        $("#systemResetWarningAlert").dialog({
            width: 580,
            height: 300,
            modal: true,
            closeOnEscape: false,
            dialogClass: "dialog-no-close",
            buttons: [{
                text: cancel_button,
                class: "okButton",
                click: function () {
                    $(this).dialog("close");
                }
            },
            {
                text: confirm_button,
                class: "saveButton",
                click: function () {
                    $(this).dialog("close");
                    showingAnimationContainer(id);
                }
            },
            ],
            close: function () {

            }
        });
    }

}

function configurationBackUp(id) {
    if(isJQueryAndUIReady()){
        $("#system_reset_message").dialog({
            modal: true,
            closeOnEscape: false,
            dialogClass: "dialog-no-close"
        });
        setTimeout(function () {
            document.getElementById(id).click();
        }, 1000);
    }

}

function init() {
    ocppConnection();
    cellularFunction();
    ethernetFunction();
    wifiFunction();
    wifiHotspotFunction();
    checkWifiHotspotTimeout();
    selectMode();
    displayBacklightSettingsFunction();
    loadManagementOptionFunction();
    CPRoleFunction();
    operationModeFunction();
    arrangeVisibilities();
    unbalancedLoadDetectionFunction();
    qrCodeFunction();
    changeLanguageClass();
    scheduledChargingFunction();
}

function arrangeVisibilities() {
    bars_id_list = getBarsID();
    page_item_list = getVisiblePageItemID();
    if (model != "" && model.toUpperCase() == "EVC10") {
        document.getElementById("themeSettingsBar").style.display = "none";
    }

    if (hidden_bars != "" && hidden_bars != null) {
        var hiddenBars = hidden_bars.split(',');
        for (i = 0; i < hiddenBars.length; i++) {
            if (document.getElementById(hiddenBars[i]) != null) {
                document.getElementById(hiddenBars[i]).style.display = "none";
            }
        }
    }
    if (hidden_page_items != "" && hidden_page_items != null) {
        var hiddenPageItems = hidden_page_items.split(',');
        for (i = 0; i < hiddenPageItems.length; i++) {
            if (document.getElementById(hiddenPageItems[i]) != null) {
                document.getElementById(hiddenPageItems[i]).style.display = "none";
            }
        }
    }
    if (hiddenOptionList != "" && hiddenOptionList != null) {
        var option_json_data = JSON.parse(hiddenOptionList);
        var hidden_value_options = option_json_data.options;
        var compare_element = "";
        var index = "";

        if (hidden_value_options != "" && hidden_value_options != null) {
            for (var hidden_option of hidden_value_options) {
                var items = hidden_option["item"]
                var option_name = hidden_option["optionName"];
                if (items != "" && items != null && option_name != null && option_name != "" && document.getElementById(option_name) != "" && document.getElementById(option_name) != null) {
                    items = items.split(",");
                    var selectionElements = [];
                    var selectionUpperElements = [];
                    for (var element of document.getElementById(option_name).options) {
                        compare_element = element.id;
                        selectionElements.push(compare_element);
                        if (compare_element.includes('_')) {
                            selectionUpperElements.push(compare_element.replace('_', '-').toUpperCase());
                        }
                        else {
                            selectionUpperElements.push(compare_element.toUpperCase());
                        }
                    }
                    for (var item of items) {
                        index = selectionUpperElements.indexOf(item.toUpperCase());
                        if (index != null && selectionElements.includes(selectionElements[index])) {
                            document.getElementById(selectionElements[index]).style.display = "none";
                        }
                    }
                }
            }
        }
    }

    if ((bars_id_list != "" && bars_id_list != null) && (visible_bars != "" && visible_bars != null)) {
        var visibleBars = visible_bars.split(',');
        for (i = 0; i < bars_id_list.length; i++) {
            if (!visibleBars.includes(bars_id_list[i])) {
                document.getElementById(bars_id_list[i]).style.display = "none";
            }
        }
    }
    if (visibleOptionList != "" && visibleOptionList != null) {
        var visible_option_json_data = JSON.parse(visibleOptionList);
        var visible_value_options = visible_option_json_data.options;
        var selectionElements = document.querySelectorAll('select');
        var opt_dict = {};

        for (i = 0; i < selectionElements.length; i++) {
            var optionElements = [];
            for (var opt of selectionElements[i].options) {
                optionElements.push(opt.id);
            }
            opt_dict[selectionElements[i].id] = optionElements;
        }
        if (visible_value_options != "" && visible_value_options != null) {
            for (var visible_option of visible_value_options) {
                if (Object.keys(opt_dict).includes(visible_option['visibleOptionName'])) {
                    index = Object.keys(opt_dict).indexOf(visible_option['visibleOptionName']);
                    for (var opt of Object.values(opt_dict)[index]) {
                        if (!visible_option['visibleItem'].split(",").includes(opt)) {
                            document.getElementById(opt).style.display = "none";
                        }
                    }
                }
            }
        }
    }
    if ((page_item_list != "" && page_item_list != null) && (visible_page_items != "" && visible_page_items != null)) {
        var visiblePageItems = visible_page_items.split(',');
        for (i = 0; i < page_item_list.length; i++) {
            if (!visiblePageItems.includes(page_item_list[i])) {
                document.getElementById(page_item_list[i]).style.display = "none";
            }
        }
    }
}

function getBarsID() {
    var barsElementsIdArr = []; // get all bars id
    $('[id]').each(function () {
        if (this.id) {
            if (this.id.includes("bar") || this.id.includes("Bar")) {
                barsElementsIdArr.push(this.id);
            }
            if ((this.id.includes('_') && this.id.includes('bar')) || (this.id.includes('/') && (this.id.includes('bar') || this.id.includes('Bar'))) || (this.id == "bar") || (this.id == "active_bar")) {
                barsElementsIdArr.pop(this.id);
            }
        }
    });
    return barsElementsIdArr;
}

function getVisiblePageItemID() {
    var pageItemIdArr = []; // get all visible page items id
    $('[id]').each(function () {
        if (this.id) {
            if (this.id.includes("Item")) {
                pageItemIdArr.push(this.id);
            }
        }
    });
    return pageItemIdArr;
}

function cellularFunction() {
    var disabled = document.getElementById("cellularDisable");
    var text = document.getElementById("cellularInfo");
    var apn = document.getElementById("apn");
    var apnUserName = document.getElementById("apnUserName");
    var apnPassword = document.getElementById("apnPassword");
    var simPin = document.getElementById("simPin");
    var apnErr = document.getElementById("apnErr");
    var apnUserNameErr = document.getElementById("apnUserNameErr");
    var apnPasswordErr = document.getElementById("apnPasswordErr");
    var simPinErr = document.getElementById("simPinErr");
    var cellularSettingsPart = document.getElementById("cellularSettingsPart");
    var interfaceIPAddress = document.getElementById("InterfaceIPAddress");
    var IPAddressLabel = document.getElementById("interfaceIPAddressLabel");
    if (apnPassword.value == '') {
        apnPassword.type = 'input';
    } else {
        apnPassword.type = 'password';
        apnPassword.onfocus = function () {
            this.value = '';
        };
    }
    if (simPin.value == '') {
        simPin.type = 'input';
    } else {
        simPin.type = 'password';
        simPin.onfocus = function () {
            this.value = '';
        };
    }
    if (disabled.selected == false) {
        cellularSettingsPart.style.display = "";
        apnErr.innerHTML = "";
        if (interfaceIPAddress.value) {
            interfaceIPAddress.style.display = "";
            IPAddressLabel.style.display = "";
        }
        if (wlanEnable == "true" && disableWlan == false) {
            if(isJQueryAndUIReady()){
                $("#networkInterfaceAlertMessageCellular").dialog({
                    width: 580,
                    height: 300,
                    modal: true,
                    closeOnEscape: false,
                    dialogClass: "dialog-no-close",
                    buttons: [
                        {
                            text: cancel_button,
                            class: "okButton",
                            click: function () {
                                document.getElementById("cellularDisable").selected = true;
                                cellularFunction();
                                disableWlan = false;
                                somethingChanged = false;
                                $(this).dialog("close");
                            }
                        },
                        {
                            text: confirm_button,
                            class: "saveButton",
                            style: "margin-left:12px;",
                            click: function () {
                                document.getElementById("wifiDisable").selected = true;
                                wifiFunction();
                                disableWlan = true;
                                $(this).dialog("close");
                            }
                        },
                    ],
                    close: function () {

                    }
                });
            }
        }
    } else {
        cellularSettingsPart.style.display = "none";
        apnErr.innerHTML = "";
        apnUserNameErr.innerHTML = "";
        apnPasswordErr.innerHTML = "";
        simPinErr.innerHTML = "";
        apn.className = "textarea1";
        apnUserName.className = "textarea1";
        apnPassword.className = "textarea1";
        simPin.className = "textarea1";
        if (interfaceIPAddress.value) {
            interfaceIPAddress.style.display = "none";
            IPAddressLabel.style.display = "none";
        }

    }
}

function ethernetFunction() {
    var selectionBox = document.getElementById("ethernetIpSetting");
    var IPadress = document.getElementById("IPadress");
    var networkMask = document.getElementById("networkMask");
    var defaultGateway = document.getElementById("defaultGateway");
    var primaryDns = document.getElementById("primaryDns");
    var secondaryDns = document.getElementById("secondaryDns");
    var ethernetIpSettingErr = document.getElementById("ethernetIpSettingErr");
    var IPadressErr = document.getElementById("IPadressErr");
    var networkMaskErr = document.getElementById("networkMaskErr");
    var defaultGatewayErr = document.getElementById("defaultGatewayErr");
    var primaryDnsErr = document.getElementById("primaryDnsErr");
    var secondaryDnsErr = document.getElementById("secondaryDnsErr");
    var ethernetInfo = document.getElementById("ethernetInfo");
    var DHCPServerInfo = document.getElementById("DHCPServerInfo");
    var maxDHCPAddrRange = document.getElementById("maxDHCPAddrRange");
    var maxDHCPAddrRangeErr = document.getElementById("maxDHCPAddrRangeErr");
    var minDHCPAddrRange = document.getElementById("minDHCPAddrRange");
    var minDHCPAddrRangeErr = document.getElementById("minDHCPAddrRangeErr");

    ethernetIpSettingErr.innerHTML = "";
    changeLanguageForIpSetting(selectionBox.options[selectionBox.selectedIndex].value, selectionBox);
    if ((selectionBox.options[selectionBox.selectedIndex].value) == "1") { //Static
        showingCellularGatewayAlert();
        DHCPServerInfo.style.display = "none";
        ethernetInfo.style.display = "";
        IPadressErr.innerHTML = "";
        networkMaskErr.innerHTML = "";
        defaultGatewayErr.innerHTML = "";
        primaryDnsErr.innerHTML = "";
    } else if ((selectionBox.options[selectionBox.selectedIndex].value) == "2") { //DHCPServer
        DHCPServerInfo.style.display = "";
        ethernetInfo.style.display = "";
        IPadressErr.innerHTML = "";
        networkMaskErr.innerHTML = "";
        defaultGatewayErr.innerHTML = "";
        primaryDnsErr.innerHTML = "";
        maxDHCPAddrRange.innerHTML = "";
        maxDHCPAddrRangeErr.innerHTML = "";
        minDHCPAddrRange.innerHTML = "";
        minDHCPAddrRangeErr.innerHTML = "";
        if (hotspotEnable == "true") {
            if (lanIpSetting == "Static")
                selectionBox.selectedIndex = 1;
            else if (lanIpSetting == "DHCP")
                selectionBox.selectedIndex = 3;
            ethernetFunction();
            somethingChanged = false;
            if(isJQueryAndUIReady()){
                $("#alertMessageDhcpServer").dialog({
                    width: 580,
                    height: 300,
                    modal: true,
                    closeOnEscape: false,
                    dialogClass: "dialog-no-close",
                    buttons: [
                        {
                            text: cancel_button,
                            class: "okButton",
                            click: function () {
                            
                                $(this).dialog("close");
                            }
                        },
                        {
                            text: confirm_button,
                            class: "saveButton",
                            style: "margin-left:12px;",
                            click: function () {
                                document.getElementById("wifiHotspotBar").click();
                                $(this).dialog("close");
                            }
                        },
                    ],
                    close: function () {
                    
                    }
                });
            }
        }
    } else { //DHCP Client
        showingCellularGatewayAlert();
        ethernetInfo.style.display = "none";
        DHCPServerInfo.style.display = "none";
        IPadressErr.innerHTML = "";
        networkMaskErr.innerHTML = "";
        defaultGatewayErr.innerHTML = "";
        primaryDnsErr.innerHTML = "";
        secondaryDnsErr.innerHTML = "";
        IPadress.className = "textarea1";
        networkMask.className = "textarea1";
        defaultGateway.className = "textarea1";
        primaryDns.className = "textarea1";
        secondaryDns.className = "textarea1";
    }
}

function wifiFunction() {
    var disabled = document.getElementById("wifiDisable");
    var selectionBox = document.getElementById("wifiIpSetting");
    var ssid = document.getElementById("wifiSSID");
    var selectSecurity = document.getElementById("selectSecurity");
    var wifiIPaddress = document.getElementById("wifiIPaddress");
    var wifiNetworkMask = document.getElementById("wifiNetworkMask");
    var wifiDefaultGateway = document.getElementById("wifiDefaultGateway");
    var wifiPrimaryDns = document.getElementById("wifiPrimaryDns");
    var wifiSecondaryDns = document.getElementById("wifiSecondaryDns");
    var ssidErr = document.getElementById("wifiSSIDErr");
    var wifiPasswordErr = document.getElementById("wifiPasswordErr");
    var wifiIPaddressErr = document.getElementById("wifiIPaddressErr");
    var wifiNetworkMaskErr = document.getElementById("wifiNetworkMaskErr");
    var wifiDefaultGatewayErr = document.getElementById("wifiDefaultGatewayErr");
    var wifiPrimaryDnsErr = document.getElementById("wifiPrimaryDnsErr");
    var wifiSecondaryDnsErr = document.getElementById("wifiSecondaryDnsErr");
    var selectSecurityErr = document.getElementById("selectSecurityErr");
    var selectionBoxErr = document.getElementById("selectWifiIPSettingErr");
    var wifiInfo = document.getElementById("wifiInfo");
    var wifiIpInfo = document.getElementById("wifiIpInfo");
    wifiPassword = document.getElementById("wifiPassword");
    var languageSelection = document.getElementById("lang");
    var languageSelectionValue = languageSelection.options[languageSelection.selectedIndex].value;
    if (wifiPassword.value == '') {
        wifiPassword.type = 'input';
    } else {
        wifiPassword.type = 'password';
        wifiPassword.onfocus = function () {
            this.value = '';
        };
    }
    changeLanguageForIpSetting(selectionBox.options[selectionBox.selectedIndex].value, selectionBox);
    if ((languageSelectionValue == "fr" || languageSelectionValue == "es" || languageSelectionValue == "hu")
        && (selectSecurity.options[selectSecurity.selectedIndex].value) == "default") {
        selectSecurity.style.fontSize = 0.55 + "vw";

    }
    else if ((languageSelectionValue == "tr" || languageSelectionValue == "it" || languageSelectionValue == "fi"
        || languageSelectionValue == "cz" || languageSelectionValue == "pl" || languageSelectionValue == "sk" || languageSelectionValue == "nl")
        && (selectSecurity.options[selectSecurity.selectedIndex].value) == "default") {
        selectSecurity.style.fontSize = 0.6 + "vw";

    }
    else {
        selectSecurity.style.fontSize = 0.8 + "vw";
    }

    if ((selectionBox.options[selectionBox.selectedIndex].value) == "1") { //Static
        wifiInfo.style.display = "";
        wifiIPaddress.disabled = false;
        wifiNetworkMask.disabled = false;
        wifiDefaultGateway.disabled = false;
        wifiPrimaryDns.disabled = false;
        wifiSecondaryDns.disabled = false;
        wifiIPaddressErr.innerHTML = "";
        wifiNetworkMaskErr.innerHTML = "";
        wifiDefaultGatewayErr.innerHTML = "";
        wifiPrimaryDnsErr.innerHTML = "";
    } else {
        wifiInfo.style.display = "none";
        wifiIPaddressErr.innerHTML = "";
        wifiNetworkMaskErr.innerHTML = "";
        wifiDefaultGatewayErr.innerHTML = "";
        wifiPrimaryDnsErr.innerHTML = "";
        wifiSecondaryDnsErr.innerHTML = "";
        wifiIPaddress.className = "textarea1";
        wifiNetworkMask.className = "textarea1";
        wifiDefaultGateway.className = "textarea1";
        wifiPrimaryDns.className = "textarea1";
        wifiSecondaryDns.className = "textarea1";
        wifiIPaddress.disabled = true;
        wifiNetworkMask.disabled = true;
        wifiDefaultGateway.disabled = true;
        wifiPrimaryDns.disabled = true;
        wifiSecondaryDns.disabled = true;
    }

    if (disabled.selected == false) {
        wifiIpInfo.style.display = "";
        ssid.disabled = false;
        wifiPassword.disabled = false;
        selectSecurity.disabled = false;
        selectionBox.disabled = false;
        ssidErr.innerHTML = "";
        wifiPasswordErr.innerHTML = "";
        selectionBoxErr.innerHTML = "";
        selectSecurityErr.innerHTML = "";
        if (cellularEnable == "true" && disableCellular == false) {
            if(isJQueryAndUIReady()){
                $("#networkInterfaceAlertMessageWlan").dialog({
                    width: 580,
                    height: 300,
                    modal: true,
                    closeOnEscape: false,
                    dialogClass: "dialog-no-close",
                    buttons: [
                        {
                            text: cancel_button,
                            class: "okButton",
                            click: function () {
                                document.getElementById("wifiDisable").selected = true;
                                wifiFunction();
                                disableCellular = false;
                                somethingChanged = false;
                                $(this).dialog("close");
                            }
                        },
                        {
                            text: confirm_button,
                            class: "saveButton",
                            style: "margin-left:12px;",
                            click: function () {
                                document.getElementById("cellularDisable").selected = true;
                                cellularFunction();
                                disableCellular = true;
                                $(this).dialog("close");
                            }
                        },
                    ],
                    close: function () {

                    }
                });
            }
        }
    } else {
        wifiIpInfo.style.display = "none";
        ssid.disabled = true;
        wifiPassword.disabled = true;
        selectSecurity.disabled = true;
        selectionBox.disabled = true;
        ssidErr.innerHTML = "";
        wifiPasswordErr.innerHTML = "";
        selectionBoxErr.innerHTML = "";
        selectSecurityErr.innerHTML = "";
        ssid.className = "textarea1";
        wifiPassword.className = "textarea1";
        selectionBox.className = "textarea1";
        selectSecurity.className = "textarea1";
        wifiIPaddressErr.innerHTML = "";
        wifiNetworkMaskErr.innerHTML = "";
        wifiDefaultGatewayErr.innerHTML = "";
        wifiPrimaryDnsErr.innerHTML = "";
        wifiSecondaryDnsErr.innerHTML = "";
        wifiIPaddress.className = "textarea1";
        wifiNetworkMask.className = "textarea1";
        wifiDefaultGateway.className = "textarea1";
        wifiPrimaryDns.className = "textarea1";
        wifiSecondaryDns.className = "textarea1";
        wifiIPaddress.disabled = true;
        wifiNetworkMask.disabled = true;
        wifiDefaultGateway.disabled = true;
        wifiPrimaryDns.disabled = true;
        wifiSecondaryDns.disabled = true;
    }
}

function vpnFunction() {
    var disabled = document.getElementById("vpnDisable");
    var text = document.getElementById("vpnInfo");
    var vpnFunctionality = document.getElementById("vpnFunctionality");
    var hostIP = document.getElementById("hostIP");
    var certificationManagement = document.getElementById("certificationManagement");
    var vpnName = document.getElementById("vpnName");
    var vpnPassword = document.getElementById("vpnPassword");
    var vpnFunctionalityErr = document.getElementById("vpnFunctionalityErr");
    var hostIPErr = document.getElementById("hostIPErr");
    var certificationErr = document.getElementById("certificationErr");
    var vpnNameErr = document.getElementById("vpnNameErr");
    var vpnPasswordErr = document.getElementById("vpnPasswordErr");
    if (disabled.checked == false) {
        vpnFunctionality.disabled = false;
        hostIP.disabled = false;
        certificationManagement.disabled = false;
        vpnName.disabled = false;
        vpnPassword.disabled = false;
        vpnFunctionalityErr.innerHTML = "*";
        hostIPErr.innerHTML = "*";
        certificationErr.innerHTML = "*";
        vpnNameErr.innerHTML = "*";
        vpnPasswordErr.innerHTML = "*";
    } else {
        vpnFunctionality.value = "";
        vpnFunctionalityErr.innerHTML = "";
        hostIP.value = "";
        hostIPErr.innerHTML = "";
        certificationManagement.value = "";
        certificationErr.innerHTML = "";
        vpnName.value = "";
        vpnNameErr.innerHTML = "";
        vpnPassword.value = "";
        vpnPasswordErr.innerHTML = "";
        vpnFunctionality.className = "textarea1";
        hostIP.className = "textarea1";
        certificationManagement.className = "textarea1";
        vpnName.className = "textarea1";
        vpnPassword.className = "textarea1";
        vpnFunctionality.disabled = true;
        hostIP.disabled = true;
        certificationManagement.disabled = true;
        vpnName.disabled = true;
        vpnPassword.disabled = true;
    }
}

function checkWifiHotspotTimeout(){
    var autoTurnOff = document.getElementById("selectWifiHotspotAutoTurnOff");
    var hotspotTimeout = document.getElementById("wifiHotspotTimeoutPart");
    if (autoTurnOff.value == "false") {
        hotspotTimeout.style.display = "none";
    }
    else {
        hotspotTimeout.style.display = "";
    }
}

function wifiHotspotFunction() {
    var hotspotEnabled = document.getElementById("wifiHotspotEnable");
    var ssidHotspot = document.getElementById("wifiHotspotSSID");
    wifiHotspotPassword = document.getElementById("wifiHotspotPassword");
    var ssidHotspotErr = document.getElementById("wifiHotspotSSIDErr");
    var wifiHotspotPasswordErr = document.getElementById("wifiHotspotPasswordErr");
    var wifiHotspotInfo = document.getElementById("wifiHotspotInfo");

    if (wifiHotspotPassword.value == '') {
        wifiHotspotPassword.type = 'input';
    } else {
        wifiHotspotPassword.type = 'password';
        wifiHotspotPassword.onfocus = function () {
            this.value = '';
        };
    }

    if (hotspotEnabled.selected == true) { //Enabled
        wifiHotspotInfo.style.display = "";
        ssidHotspot.disabled = false;
        wifiHotspotPassword.disabled = false;
        ssidHotspotErr.innerHTML = "";
        wifiHotspotPasswordErr.innerHTML = "";
        if (lanIpSetting == "DHCPServer") {
            document.getElementById("wifiHotspotDisable").selected = true;
            wifiHotspotFunction();
            somethingChanged = false;
            if(isJQueryAndUIReady()){
                $("#alertMessageHotspot").dialog({
                    width: 580,
                    height: 300,
                    modal: true,
                    closeOnEscape: false,
                    dialogClass: "dialog-no-close",
                    buttons: [
                        {
                            text: cancel_button,
                            class: "okButton",
                            click: function () {
                                $(this).dialog("close");
                            }
                        },
                        {
                            text: confirm_button,
                            class: "saveButton",
                            style: "margin-left:12px;",
                            click: function () {
                                document.getElementById("lanBar").click();
                                $(this).dialog("close");
                            }
                        },
                    ],
                    close: function () {

                    }
                });
            }
        }
    } else {
        wifiHotspotInfo.style.display = "none";
        ssidHotspot.disabled = true;
        wifiHotspotPassword.disabled = true;
        ssidHotspotErr.innerHTML = "";
        wifiHotspotPasswordErr.innerHTML = "";
        ssidHotspot.className = "textarea1";
        wifiHotspotPassword.className = "textarea1";
    }
}

function displaySettings() {
    var backlightSelection = document.getElementById("backlightSelection");
    var backlightLevelTitle = document.getElementById("backlightLevelTitle");
    var backlightStaticLevel = document.getElementById("backlightStaticLevel");
    var backlightSelectionErr = document.getElementById("backlightSelectionErr");
    if (backlightSelection.selectedIndex == 1) {
        backlightLevelTitle.style.visibility = "visible";
        backlightStaticLevel.style.visibility = "visible";
    } else {
        backlightLevelTitle.style.visibility = "hidden";
        backlightStaticLevel.style.visibility = "hidden";
    }
    if (backlightSelection.selectedIndex != 0) {
        backlightSelectionErr.innerHTML = "*";
    }
}


function changeLanguage() {
    showingAnimationContainer("changeLangButton");
}

function ocppConnection() {
    selectOCPPConnection = document.getElementById("selectOCPPConnection");
    ocppSelection = document.getElementById("selectOCPPConnection");
    centralSystemAddress = document.getElementById("centralSystemAddress");
    chargePointId = document.getElementById("chargePointId");
    wssSettings = document.getElementById("wssSettings");
    freeModeActive = document.getElementById("freeModeActive");
    freeModeRFID = document.getElementById("freeModeRFID");
    allowOffline = document.getElementById("allowOffline");
    authorizationCache = document.getElementById("authorizationCache");
    authorizationKey = document.getElementById("authorizationKey");
    authorizeRemote = document.getElementById("authorizeRemote");
    blinkRepeat = document.getElementById("blinkRepeat");
    centralSmartChargingWithNoTripping = document.getElementById("centralSmartChargingWithNoTripping");
    chargeProfileMaxStackLevel = document.getElementById("chargeProfileMaxStackLevel");
    chargingScheduleAllowedChargingRateUnit = document.getElementById("chargingScheduleAllowedChargingRateUnit");
    chargingScheduleMaxPeriods = document.getElementById("chargingScheduleMaxPeriods");
    clockData = document.getElementById("clockData");
    connectionTimeOut = document.getElementById("connectionTimeOut");
    connectorPhase = document.getElementById("connectorPhase");
    rotationMaxLength = document.getElementById("rotationMaxLength");
    connectorSwitch3to1PhaseSupported = document.getElementById("connectorSwitch3to1PhaseSupported");
    continueChargingAfterPowerLoss = document.getElementById("continueChargingAfterPowerLoss");
    CTStationCurrentInformationInterval = document.getElementById("CTStationCurrentInformationInterval");
    newTransactionAfterPowerLoss = document.getElementById("newTransactionAfterPowerLoss");
    dailyReboot = document.getElementById("dailyReboot");
    dailyRebootTime = document.getElementById("dailyRebootTimeInput");
    dailyRebootType = document.getElementById("dailyRebootType");
    maxKeys = document.getElementById("maxKeys");
    heartbeat = document.getElementById("heartbeat");
    installationErrorEnable = document.getElementById("installationErrorEnable");
    ledTimeoutEnable = document.getElementById("LEDTimeoutEnable");
    light = document.getElementById("light");
    localAuthListEnabled = document.getElementById("localAuthListEnabled");
    localAuthListMaxLength = document.getElementById("localAuthListMaxLength");
    authorizeOffline = document.getElementById("authorizeOffline");
    localPreAuthorize = document.getElementById("localPreAuthorize");
    maxChargingProfilesInstalled = document.getElementById("maxChargingProfilesInstalled");
    maxEnergy = document.getElementById("maxEnergy");
    maxPowerChargeComplete = document.getElementById("maxPowerChargeComplete");
    maxTimeChargeComplete = document.getElementById("maxTimeChargeComplete");
    alignedData = document.getElementById("alignedData");
    alignedDataMaxLength = document.getElementById("alignedDataMaxLength");
    sampleData = document.getElementById("sampleData");
    meterValuesSampledDataMaxLength = document.getElementById("meterValuesSampledDataMaxLength");
    sampleInterval = document.getElementById("sampleInterval");
    minDuration = document.getElementById("minDuration");
    connectorNum = document.getElementById("connectorNum");
    randomDelayOnDailyRebootEnabled = document.getElementById("randomDelayOnDailyRebootEnabled");
    reserveConnectorZeroSupported = document.getElementById("reserveConnectorZeroSupported");
    resetRetries = document.getElementById("resetRetries");
    sendDataTransferMeterConfigurationForNonEichrecht = document.getElementById("sendDataTransferMeterConfigurationForNonEichrecht");
    sendLocalListMaxLength = document.getElementById("sendLocalListMaxLength");
    sendTotalPowerValue = document.getElementById("sendTotalPowerValue");
    disconnect = document.getElementById("disconnect");
    stopInvalidId = document.getElementById("stopInvalidId");
    stopAligned = document.getElementById("stopAligned");
    stopAlignedMax = document.getElementById("stopAlignedMax");
    stopSampled = document.getElementById("stopSampled");
    stopSampledMax = document.getElementById("stopSampledMax");
    supported = document.getElementById("supported");
    supportedMax = document.getElementById("supportedMax");
    attempts = document.getElementById("attempts");
    retryInterval = document.getElementById("retryInterval");
    UKSmartCharging = document.getElementById("UKSmartCharging");
    unlockConnector = document.getElementById("unlockConnector");
    pingInterval = document.getElementById("pingInterval");
    set_default_button = document.getElementById("set_default_button");
    centralSystemError = document.getElementById("centralSystemError");
    chargePointIdError = document.getElementById("chargePointIdError");
    blinkRepeatError = document.getElementById("blinkRepeatError");
    bootNotificationAfterConnectionLoss = document.getElementById("bootNotificationAfterConnectionLoss");
    clockDataError = document.getElementById("clockDataError");
    connectionTimeOutError = document.getElementById("connectionTimeOutError");
    connectorPhaseError = document.getElementById("connectorPhaseError");
    CTStationCurrentInformationIntervalError = document.getElementById("CTStationCurrentInformationIntervalError");
    rotationMaxLengthError = document.getElementById("rotationMaxLengthError");
    maxKeysError = document.getElementById("maxKeysError");
    heartbeatError = document.getElementById("heartbeatError");
    lightError = document.getElementById("lightError");
    maxEnergyError = document.getElementById("maxEnergyError");
    maxPowerChargeCompleteError = document.getElementById("maxPowerChargeCompleteError");
    maxTimeChargeCompleteError = document.getElementById("maxTimeChargeCompleteError");
    alignedDataError = document.getElementById("alignedDataError");
    alignedDataMaxLengthError = document.getElementById("alignedDataMaxLengthError");
    sampleDataError = document.getElementById("sampleDataError");
    sampleIntervalError = document.getElementById("sampleIntervalError");
    minDurationError = document.getElementById("minDurationError");
    connectorNumError = document.getElementById("connectorNumError");
    resetRetriesError = document.getElementById("resetRetriesError");
    rfidEndianness = document.getElementById("rfidEndianness");
    ocppSecurityProfile = document.getElementById("ocppSecurityProfile");
    stopAlignedError = document.getElementById("stopAlignedError");
    stopAlignedMaxError = document.getElementById("stopAlignedMaxError");
    stopSampledError = document.getElementById("stopSampledError");
    stopSampledMaxError = document.getElementById("stopSampledMaxError");
    supportedError = document.getElementById("supportedError");
    supportedMaxError = document.getElementById("supportedMaxError");
    attemptsError = document.getElementById("attemptsError");
    retryIntervalError = document.getElementById("retryIntervalError");
    pingIntervalError = document.getElementById("pingIntervalError");
    freeModeRFIDError = document.getElementById("freeModeRFIDError");
    chargeProfileMaxStackLevelError = document.getElementById("chargeProfileMaxStackLevelError");
    chargingScheduleAllowedChargingRateUnitError = document.getElementById("chargingScheduleAllowedChargingRateUnitError");
    chargingScheduleMaxPeriodsError = document.getElementById("chargingScheduleMaxPeriodsError");
    localAuthListMaxLengthError = document.getElementById("localAuthListMaxLengthError");
    maxChargingProfilesInstalledError = document.getElementById("maxChargingProfilesInstalledError");
    meterValuesSampledDataMaxLengthError = document.getElementById("meterValuesSampledDataMaxLengthError");
    maxChargingProfilesInstalledError = document.getElementById("maxChargingProfilesInstalledError");
    sendLocalListMaxLengthError = document.getElementById("sendLocalListMaxLengthError");
    continueChargingAfterPenError = document.getElementById("continueChargingAfterPenError");
    webconfigEnabled = document.getElementById("webconfigEnabled");
    if(meterType !== "" && meterType.localeCompare("EichrechtBauer") == 0 && private_charging == 1){
        selectOCPPConnection.options[0].style.display = "none";
    }else{
        selectOCPPConnection.options[0].style.display = "";
    }
    if (selectOCPPConnection.value == 1) {
        checkAuthorizationKey();
        centralSystemAddress.disabled = false;
        chargePointId.disabled = false;
        wssSettings.disabled = false;
        if (meterType !== "" && meterType.localeCompare("EichrechtBauer") == 0 && private_charging == 1) {
            freeModeActive.disabled = true;
            continueChargingAfterPowerLoss.disabled = true;
        } else {
            freeModeActive.disabled = false
            continueChargingAfterPowerLoss.disabled = false;
        }
        CTStationCurrentInformationInterval.disabled = false;
        newTransactionAfterPowerLoss.disabled = false;
        freeModeRFID.disabled = false;
        allowOffline.disabled = false;
        authorizationCache.disabled = false;
        authorizationKey.disabled = false;
        authorizeRemote.disabled = false;
        blinkRepeat.disabled = false;
        bootNotificationAfterConnectionLoss.disabled = false;
        centralSmartChargingWithNoTripping.disabled = false;
        chargeProfileMaxStackLevel.disabled = false;
        chargingScheduleAllowedChargingRateUnit.disabled = false;
        chargingScheduleMaxPeriods.disabled = false;
        clockData.disabled = false;
        connectionTimeOut.disabled = false;
        connectorPhase.disabled = false;
        rotationMaxLength.disabled = false;
        rfidEndianness.disabled = false;
        connectorSwitch3to1PhaseSupported.disabled = true;
        dailyReboot.disabled = false;
        dailyRebootTime.disabled = false;
        dailyRebootType.disabled = false;
        maxKeys.disabled = false;
        heartbeat.disabled = false;
        if (earthingType == 0) {
            installationErrorEnable.disabled = true;
        } else {
            installationErrorEnable.disabled = false;
        }
        ocppSecurityProfile.disabled = false;
        ledTimeoutEnable.disabled = false;
        light.disabled = false;
        localAuthListEnabled.disabled = false;
        localAuthListMaxLength.disabled = false;
        authorizeOffline.disabled = false;
        localPreAuthorize.disabled = false;
        maxChargingProfilesInstalled.disabled = false;
        maxEnergy.disabled = false;
        maxPowerChargeComplete.disabled = false;
        maxTimeChargeComplete.disabled = false;
        alignedData.disabled = false;
        alignedDataMaxLength.disabled = false;
        sampleData.disabled = false;
        meterValuesSampledDataMaxLength.disabled = false;
        sampleInterval.disabled = false;
        minDuration.disabled = false;
        connectorNum.disabled = false;
        randomDelayOnDailyRebootEnabled.disabled = false;
        reserveConnectorZeroSupported.disabled = true;
        resetRetries.disabled = false;
        sendDataTransferMeterConfigurationForNonEichrecht.disabled = false;
        sendLocalListMaxLength.disabled = false;
        sendTotalPowerValue.disabled = false;
        disconnect.disabled = false;
        stopInvalidId.disabled = false;
        stopAligned.disabled = false;
        stopAlignedMax.disabled = false;
        stopSampled.disabled = false;
        stopSampledMax.disabled = false;
        supported.disabled = false;
        supportedMax.disabled = false;
        attempts.disabled = false;
        retryInterval.disabled = false;
        UKSmartCharging.disabled = false;
        unlockConnector.disabled = false;
        pingInterval.disabled = false;
        set_default_button.disabled = false;
        continueChargingAfterPenError.disabled = false;
        webconfigEnabled.disabled = false;
        document.getElementById("selectOcppVersion").disabled = false;
        centralSystemError.innerHTML = "*";
        chargePointIdError.innerHTML = "*";
        blinkRepeatError.innerHTML = "*";
        clockDataError.innerHTML = "*";
        connectionTimeOutError.innerHTML = "*";
        connectorPhaseError.innerHTML = "*";
        CTStationCurrentInformationIntervalError = "*";
        rotationMaxLengthError.innerHTML = "*";
        maxKeysError.innerHTML = "*";
        heartbeatError.innerHTML = "*";
        lightError.innerHTML = "*";
        maxEnergyError.innerHTML = "*";
        maxPowerChargeCompleteError.innerHTML = "*";
        maxTimeChargeCompleteError.innerHTML = "*";
        alignedDataError.innerHTML = "*";
        alignedDataMaxLengthError.innerHTML = "*";
        sampleDataError.innerHTML = "*";
        sampleIntervalError.innerHTML = "*";
        minDurationError.innerHTML = "*";
        connectorNumError.innerHTML = "*";
        resetRetriesError.innerHTML = "*";
        stopAlignedError.innerHTML = "*";
        stopAlignedMaxError.innerHTML = "*";
        stopSampledError.innerHTML = "*";
        stopSampledMaxError.innerHTML = "*";
        supportedError.innerHTML = "*";
        supportedMaxError.innerHTML = "*";
        attemptsError.innerHTML = "*";
        retryIntervalError.innerHTML = "*";
        pingIntervalError.innerHTML = "*";
        //  freeModeRFIDError.innerHTML = "*";
        chargeProfileMaxStackLevelError.innerHTML = "*";
        chargingScheduleAllowedChargingRateUnitError.innerHTML = "*";
        chargingScheduleMaxPeriodsError.innerHTML = "*";
        localAuthListMaxLengthError.innerHTML = "*";
        maxChargingProfilesInstalledError.innerHTML = "*";
        meterValuesSampledDataMaxLengthError.innerHTML = "*";
        sendLocalListMaxLengthError.innerHTML = "*";

    } else {
        centralSystemError.innerHTML = "";
        chargePointIdError.innerHTML = "";
        wssError.innerHTML = "";
        blinkRepeatError.innerHTML = "";
        clockDataError.innerHTML = "";
        connectionTimeOutError.innerHTML = "";
        connectorPhaseError.innerHTML = "";
        CTStationCurrentInformationIntervalError.innerHTML = "";
        freeModeRFID.disabled = "";
        rotationMaxLengthError.innerHTML = "";
        maxKeysError.innerHTML = "";
        heartbeatError.innerHTML = "";
        lightError.innerHTML = "";
        maxEnergyError.innerHTML = "";
        maxPowerChargeCompleteError.innerHTML = "";
        maxTimeChargeCompleteError.innerHTML = "";
        alignedDataError.innerHTML = "";
        alignedDataMaxLengthError.innerHTML = "";
        sampleDataError.innerHTML = "";
        sampleIntervalError.innerHTML = "";
        minDurationError.innerHTML = "";
        connectorNumError.innerHTML = "";
        resetRetriesError.innerHTML = "";
        stopAlignedError.innerHTML = "";
        stopAlignedMaxError.innerHTML = "";
        stopSampledError.innerHTML = "";
        stopSampledMaxError.innerHTML = "";
        supportedError.innerHTML = "";
        supportedMaxError.innerHTML = "";
        attemptsError.innerHTML = "";
        retryIntervalError.innerHTML = "";
        pingIntervalError.innerHTML = "";
        // freeModeRFIDError.innerHTML = "";
        chargeProfileMaxStackLevelError.innerHTML = "";
        chargingScheduleAllowedChargingRateUnitError.innerHTML = "";
        chargingScheduleMaxPeriodsError.innerHTML = "";
        localAuthListMaxLengthError.innerHTML = "";
        maxChargingProfilesInstalledError.innerHTML = "";
        meterValuesSampledDataMaxLengthError.innerHTML = "";
        sendLocalListMaxLengthError.innerHTML = "";
        centralSystemErr.innerHTML = "";
        chargePointIdErr.innerHTML = "";
        wssErr.innerHTML = "";
        authorizationKeyErr.innerHTML = "";
        blinkRepeatErr.innerHTML = "";
        clockDataErr.innerHTML = "";
        connectionTimeOutErr.innerHTML = "";
        connectorPhaseErr.innerHTML = "";
        CTStationCurrentInformationIntervalErr.innerHTML = "";
        rotationMaxLengthErr.innerHTML = "";
        maxKeysErr.innerHTML = "";
        heartbeatErr.innerHTML = "";
        lightErr.innerHTML = "";
        localAuthListMaxLengthErr.innerHTML = "";
        maxEnergyErr.innerHTML = "";
        maxPowerChargeCompleteErr.innerHTML = "";
        maxTimeChargeCompleteErr.innerHTML = "";
        alignedDataErr.innerHTML = "";
        alignedDataMaxLengthErr.innerHTML = "";
        sampleDataErr.innerHTML = "";
        sampleIntervalErr.innerHTML = "";
        minDurationErr.innerHTML = "";
        connectorNumErr.innerHTML = "";
        resetRetriesErr.innerHTML = "";
        sendLocalListMaxLengthErr.innerHTML = "";
        stopAlignedErr.innerHTML = "";
        stopAlignedMaxErr.innerHTML = "";
        stopSampledErr.innerHTML = "";
        stopSampledMaxErr.innerHTML = "";
        supportedErr.innerHTML = "";
        supportedMaxErr.innerHTML = "";
        attemptsErr.innerHTML = "";
        retryIntervalErr.innerHTML = "";
        pingIntervalErr.innerHTML = "";
        freeModeRFIDErr.innerHTML = "";
        chargeProfileMaxStackLevelErr.innerHTML = "";
        chargingScheduleAllowedChargingRateUnitErr.innerHTML = "";
        chargingScheduleMaxPeriodsErr.innerHTML = "";
        localAuthListMaxLengthErr.innerHTML = "";
        maxChargingProfilesInstalledErr.innerHTML = "";
        meterValuesSampledDataMaxLengthErr.innerHTML = "";
        sendLocalListMaxLengthErr.innerHTML = "";
        centralSystemAddress.className = "textarea1";
        chargePointId.className = "textarea1";
        wssSettings.className = "textarea1";
        authorizationKey.className = "textarea1";
        blinkRepeat.className = "textarea1";
        clockData.className = "textarea1";
        connectionTimeOut.className = "textarea1";
        connectorPhase.className = "textarea1";
        CTStationCurrentInformationInterval.className = "textarea1";
        rotationMaxLength.className = "textarea1";
        maxKeys.className = "textarea1";
        heartbeat.className = "textarea1";
        light.className = "textarea1";
        maxEnergy.className = "textarea1";
        maxPowerChargeComplete.className = "textarea1";
        maxTimeChargeComplete.className = "textarea1";
        alignedData.className = "textarea1";
        alignedDataMaxLength.className = "textarea1";
        sampleData.className = "textarea1";
        sampleInterval.className = "textarea1";
        minDuration.className = "textarea1";
        connectorNum.className = "textarea1";
        resetRetries.className = "textarea1";
        stopAligned.className = "textarea1";
        stopAlignedMax.className = "textarea1";
        stopSampled.className = "textarea1";
        stopSampledMax.className = "textarea1";
        supported.className = "textarea1";
        supportedMax.className = "textarea1";
        attempts.className = "textarea1";
        retryInterval.className = "textarea1";
        pingInterval.className = "textarea1";
        freeModeRFID.className = "textarea1";
        chargeProfileMaxStackLevel.className = "textarea1";
        chargingScheduleAllowedChargingRateUnit.className = "textarea1";
        chargingScheduleMaxPeriods.className = "textarea1";
        localAuthListMaxLength.className = "textarea1";
        maxChargingProfilesInstalled.className = "textarea1";
        meterValuesSampledDataMaxLength.className = "textarea1";
        sendLocalListMaxLength.className = "textarea1";
        centralSystemAddress.disabled = true;
        chargePointId.disabled = true;
        wssSettings.disabled = true;
        freeModeActive.disabled = true;
        freeModeRFID.disabled = true;
        allowOffline.disabled = true;
        authorizationCache.disabled = true;
        authorizationKey.disabled = true;
        authorizationKey.type = 'password';
        authorizeRemote.disabled = true;
        blinkRepeat.disabled = true;
        bootNotificationAfterConnectionLoss.disabled = true;
        centralSmartChargingWithNoTripping.disabled = true;
        chargeProfileMaxStackLevel.disabled = true;
        chargingScheduleAllowedChargingRateUnit.disabled = true;
        chargingScheduleMaxPeriods.disabled = true;
        clockData.disabled = true;
        connectionTimeOut.disabled = true;
        connectorPhase.disabled = true;
        rotationMaxLength.disabled = true;
        rfidEndianness.disabled = true;
        connectorSwitch3to1PhaseSupported.disabled = true;
        continueChargingAfterPowerLoss.disabled = true;
        CTStationCurrentInformationInterval.disabled = true;
        newTransactionAfterPowerLoss.disabled = true;
        dailyReboot.disabled = true;
        dailyRebootTime.disabled = true;
        dailyRebootType.disabled = true;
        maxKeys.disabled = true;
        heartbeat.disabled = true;
        installationErrorEnable.disabled = true;
        ocppSecurityProfile.disabled = true;
        ledTimeoutEnable.disabled = true;
        light.disabled = true;
        localAuthListEnabled.disabled = true;
        localAuthListMaxLength.disabled = true;
        authorizeOffline.disabled = true;
        localPreAuthorize.disabled = true;
        maxChargingProfilesInstalled.disabled = true;
        maxEnergy.disabled = true;
        maxPowerChargeComplete.disabled = true;
        maxTimeChargeComplete.disabled = true;
        alignedData.disabled = true;
        alignedDataMaxLength.disabled = true;
        sampleData.disabled = true;
        meterValuesSampledDataMaxLength.disabled = true;
        sampleInterval.disabled = true;
        minDuration.disabled = true;
        connectorNum.disabled = true;
        randomDelayOnDailyRebootEnabled.disabled = true;
        continueChargingAfterPenError.disabled = true;
        webconfigEnabled.disabled = true;
        reserveConnectorZeroSupported.disabled = true;
        resetRetries.disabled = true;
        sendDataTransferMeterConfigurationForNonEichrecht.disabled = true;
        sendLocalListMaxLength.disabled = true;
        sendTotalPowerValue.disabled = true;
        disconnect.disabled = true;
        stopInvalidId.disabled = true;
        stopAligned.disabled = true;
        stopAlignedMax.disabled = true;
        stopSampled.disabled = true;
        stopSampledMax.disabled = true;
        supported.disabled = true;
        supportedMax.disabled = true;
        attempts.disabled = true;
        retryInterval.disabled = true;
        UKSmartCharging.disabled = true;
        unlockConnector.disabled = true;
        pingInterval.disabled = true;
        set_default_button.disabled = true;
        // document.getElementById("selectOcppKey").disabled = true;
        document.getElementById("selectOcppVersion").disabled = true;
        if (meterType !== "" && meterType.localeCompare("EichrechtBauer") == 0) {
            freeModeRFID.value = '';
        }
    }
}

function checkAuthorizationKey() {
    authorizationKey = document.getElementById("authorizationKey");
    if (authorizationKey.value == '') {
        authorizationKey.type = 'input';
    } else {
        authorizationKey.type = 'password';
        authorizationKey.onfocus = function () {
            this.value = '';
        };
    }
}

function selectMode() {
    var selection = document.getElementById("selectStandaloneMode");
    var ocppSelection = document.getElementById("selectOCPPConnection");
    var standaloneModeError = document.getElementById("standaloneModeErr");
    standaloneModeError.innerHTML = "";
    if ((selection.options[selection.selectedIndex].value) == "localList") {
        mode.style.visibility = "visible";
    } else {
        mode.style.visibility = "hidden";
    }
    if (ocppSelection.selectedIndex == 1) {
        selection.selectedIndex = 0;
        selection.disabled = true;
        document.getElementById("rfid_list_button").disabled = true;
        //   document.getElementById("ocppInfoText").style.display = "block";
    }
}

function setDefaultParameters() {
    var index = { id: 1, token: csrfToken };
    $.ajax({
        type: 'POST',
        data: index,
        url: 'request.php',
        success: function (data) {
            if (data) {
                var jsonObj = jQuery.parseJSON(data);
                $("#freeModeActive").val(jsonObj.FreeModeActive);
                if (meterType !== "" && meterType.localeCompare("EichrechtBauer") == 0) {
                    $("#freeModeRFID").val("");
                } else {
                    $("#freeModeRFID").val(jsonObj.FreeModeRFID);
                }
                $("#allowOffline").val(jsonObj.AllowOfflineTxForUnknownId);
                $("#authorizationCache").val(jsonObj.AuthorizationCacheEnabled);
                $("#authorizationKey").val(jsonObj.AuthorizationKey);
                $("#authorizeRemote").val(jsonObj.AuthorizeRemoteTxRequests);
                $("#blinkRepeat").val(jsonObj.BlinkRepeat);
                $("#bootNotificationAfterConnectionLoss").val(jsonObj.BootNotificationAfterConnectionLoss);
                $("#centralSmartChargingWithNoTripping").val(jsonObj.CentralSmartChargingWithNoTripping);
                $("#chargeProfileMaxStackLevel").val(jsonObj.ChargeProfileMaxStackLevel);
                $("#chargingScheduleMaxPeriods").val(jsonObj.ChargingScheduleMaxPeriods);
                $("#chargingScheduleAllowedChargingRateUnit").val(jsonObj.ChargingScheduleAllowedChargingRateUnit);
                $("#clockData").val(jsonObj.ClockAlignedDataInterval);
                $("#connectionTimeOut").val(jsonObj.ConnectionTimeOut);
                $("#connectorPhase").val(jsonObj.ConnectorPhaseRotation);
                $("#rotationMaxLength").val(jsonObj.ConnectorPhaseRotationMaxLength);
                if(currentLimiterPhase == 1){
                    $("#connectorSwitch3to1PhaseSupported").val("TRUE");
                }else{
                    $("#connectorSwitch3to1PhaseSupported").val(jsonObj.ConnectorSwitch3to1PhaseSupported);
                }
                $("#continueChargingAfterPowerLoss").val(jsonObj.ContinueChargingAfterPowerLoss);
                $("#CTStationCurrentInformationInterval").val(jsonObj.CTStationCurrentInformationInterval);
                $("#newTransactionAfterPowerLoss").val(jsonObj.NewTransactionAfterPowerLoss);
                $("#dailyReboot").val(jsonObj.DailyReboot);
                $("#dailyRebootTimeInput").val(jsonObj.DailyRebootTime);
                $("#dailyRebootType").val(jsonObj.DailyRebootType);
                $("#maxKeys").val(jsonObj.GetConfigurationMaxKeys);
                $("#heartbeat").val(jsonObj.HeartbeatInterval);
                $("#installationErrorEnable").val(jsonObj.InstallationErrorEnable);
                $("#LEDTimeoutEnable").val(jsonObj.LEDTimeoutEnable);
                $("#light").val(jsonObj.LightIntensity);
                $("#localAuthListEnabled").val(jsonObj.LocalAuthListEnabled);
                $("#localAuthListMaxLength").val(jsonObj.LocalAuthListMaxLength);
                $("#authorizeOffline").val(jsonObj.LocalAuthorizeOffline);
                $("#localPreAuthorize").val(jsonObj.LocalPreAuthorize);
                $("#maxChargingProfilesInstalled").val(jsonObj.MaxChargingProfilesInstalled);
                $("#maxEnergy").val(jsonObj.MaxEnergyOnInvalidId);
                $("#maxPowerChargeComplete").val(jsonObj.MaxPowerChargeComplete);
                $("#maxTimeChargeComplete").val(jsonObj.MaxTimeChargeComplete);
                $("#alignedData").val(jsonObj.MeterValuesAlignedData);
                $("#alignedDataMaxLength").val(jsonObj.MeterValuesAlignedDataMaxLength);
                $("#sampleData").val(jsonObj.MeterValuesSampledData);
                $("#meterValuesSampledDataMaxLength").val(jsonObj.MeterValuesSampledDataMaxLength);
                $("#sampleInterval").val(jsonObj.MeterValueSampleInterval);
                $("#minDuration").val(jsonObj.MinimumStatusDuration);
                $("#connectorNum").val(jsonObj.NumberOfConnectors);
                $("#reserveConnectorZeroSupported").val(jsonObj.ReserveConnectorZeroSupported);
                $("#randomDelayOnDailyRebootEnabled").val(jsonObj.RandomDelayOnDailyRebootEnabled);
                $("#continueChargingAfterPenError").val(jsonObj.ContinueChargingAfterPenError);
                $("#webconfigEnabled").val(jsonObj.WebconfigEnabled);
                $("#rfidEndianness").val(jsonObj.RfidEndianness);
                $("#resetRetries").val(jsonObj.ResetRetries);
                $("#ocppSecurityProfile").val(jsonObj.OcppSecurityProfile);
                $("#sendDataTransferMeterConfigurationForNonEichrecht").val(jsonObj.SendDataTransferMeterConfigurationForNonEichrecht);
                $("#sendLocalListMaxLength").val(jsonObj.SendLocalListMaxLength);
                $("#sendTotalPowerValue").val(jsonObj.SendTotalPowerValue);
                $("#disconnect").val(jsonObj.StopTransactionOnEVSideDisconnect);
                $("#stopInvalidId").val(jsonObj.StopTransactionOnInvalidId);
                $("#stopAligned").val(jsonObj.StopTxnAlignedData);
                $("#stopAlignedMax").val(jsonObj.StopTxnAlignedDataMaxLength);
                $("#stopSampled").val(jsonObj.StopTxnSampledData);
                $("#stopSampledMax").val(jsonObj.StopTxnSampledDataMaxLength);
                $("#supported").val(jsonObj.SupportedFeatureProfiles);
                $("#supportedMax").val(jsonObj.SupportedFeatureProfilesMaxLength);
                $("#attempts").val(jsonObj.TransactionMessageAttempts);
                $("#retryInterval").val(jsonObj.TransactionMessageRetryInterval);
                $("#UKSmartCharging").val(jsonObj.UKSmartChargingEnabled);
                $("#unlockConnector").val(jsonObj.UnlockConnectorOnEVSideDisconnect);
                $("#pingInterval").val(jsonObj.WebSocketPingInterval);
            }
        }
    });
}

function openThePosition(selector) {
    var query = '#' + selector;
    var el = document.querySelector(query);

    var positionX = el.offsetLeft;
    var positionY = el.offsetTop + 15;
    if (selector == "OCPPConnectionPart")
        positionY = 0;
    window.scrollTo({
        top: positionY,
        left: positionX,
        behavior: 'smooth'
    });
}

function check_db_password() {
    var curr_pass = document.getElementById("currentPassSys").value;
    var new_password = document.getElementById("passSys").value;
    var new_password_repeat = document.getElementById("repassSys").value;

    var index = { id: 2, currentPassword : curr_pass,
        newPassword : new_password, newPasswordRepeat : new_password_repeat,
        token: csrfToken
     };
    check_password_server_side(index);
}

function check_password_server_side(index){
    $.ajax({
        type: 'POST',
        data: index,
        url: 'request.php',
        success: function (data) {
            check_pass = JSON.parse(data);
            checkPassword(check_pass);
        }
    });
}

function setPassword() {
    var current_pswd = document.getElementById("currentPassSys");
    var pass_pwd = document.getElementById("passSys");
    var re_pwd = document.getElementById("repassSys");
    var passwordError = document.getElementById("passwordErrorSys");
    current_pswd.innerHTML = "";
    pass_pwd.innerHTML = "";
    re_pwd.innerHTML = "";
    current_pswd.className = "textarea1";
    pass_pwd.className = "textarea1";
    re_pwd.className = "textarea1";
    passwordError.innerHTML = "";


}
function checkPassword(result) {
    var passwordError = document.getElementById("passwordErrorSys");
    const passwordErrors = {
        _CURRENTPASSWORDWRONG : wrongCurrentPassword,
        _SAMEPASSWORDERROR : same_password,
        _DBACCESSFAILURE : db_access_fall,
        _PASSWORDERRORLEVEL2 : passwordErrorLevel2,
        _PASSWORDERRORLEVEL3 : passwordErrorLevel3,
        _PASSWORDMATCHERROR : matchCharacter,
        _LOGINLOCKOUT : loginLockout

}
    if(result.error && passwordErrors.hasOwnProperty(result.error)){
        passwordError.innerHTML = passwordErrors[result.error];
    }else{
        showingAnimationContainer("button_change_passwordSys");
    }
}

$("#zipFile").change(function () {
    filename = $("#zipFile").val();
    var res = filename.split('\\');
    var num = res.length;
    var file = res[num - 1];
    var extensionPath = file.split('.');
    var extension = extensionPath[extensionPath.length - 1];
    if (extension.localeCompare("update") != 0) {
        $('#firmwareUpdateForType').css('display', 'block');
        $('#firmwareUpdateForSize').css('display', 'none');
        if(isJQueryAndUIReady()){
            $("#firmwareUpdateAlertMessage").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [{
                    text: cancel_button,
                    class: "okButton",
                    click: function () {
                        $(this).dialog("close");
                    }
                },],
                close: function () {

                }
            });
        }
    } else if (this.files[0].size > 1000000000) {
        $('#firmwareUpdateForType').css('display', 'none');
        $('#firmwareUpdateForSize').css('display', 'block');
        if(isJQueryAndUIReady()){
            $("#firmwareUpdateAlertMessage").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [{
                    text: cancel_button,
                    class: "okButton",
                    click: function () {
                        $(this).dialog("close");
                    }
                },],
                close: function () {

                }
            });
        }
    } else {
        $('#uploadPart').css('display', 'none');
        $('#updatePart').css('display', 'block');
        $("#fileName").text(file);
    }
});

function listenerForEmptyText(id) {
    if (id == "wifiPassword") {
        wifiPasswordValueFlag = true;
        if (wifiPassword.value == '') {
            wifiPassword.type = 'input';
            wifiPassword.onfocus = function () {
                this.value = this.value;
            };
        }
    } else if (id == "wifiHotspotPassword") {
        wifiHotspotPasswordValueFlag = true;
        if (wifiHotspotPassword.value == '') {
            wifiHotspotPassword.type = 'input';
            wifiHotspotPassword.onfocus = function () {
                this.value = this.value;
            };
        }
    } else if (id == "apnPassword") {
        apnPasswordValueFlag = true;
        var apnPassword = document.getElementById(id);
        if (apnPassword.value == '') {
            apnPassword.type = 'input';
            apnPassword.onfocus = function () {
                this.value = this.value;
            };
        }
    } else if (id == "simPin") {
        simPinValueFlag = true;
        var simPin = document.getElementById(id);
        if (simPin.value == '') {
            simPin.type = 'input';
            simPin.onfocus = function () {
                this.value = this.value;
            };
        }
    } else if (id == "authorizationKey") {
        authorizationKeyValueFlag = true;
        if (authorizationKey.value == '') {
            authorizationKey.type = 'input';
            authorizationKey.onfocus = function () {
                this.value = this.value;
            };
        }
    }
}

$("#configBackUpFile").change(function () {
    filename = $("#configBackUpFile").val();
    var res = filename.split('\\');
    var num = res.length;
    var file = res[num - 1];
    var extensionPath = file.split('.');
    var extension = extensionPath[extensionPath.length - 1];
    if (extension.localeCompare("bak") != 0) {
        $('#configUpdateForSize').css('display', 'none');
        $('#configUpdateForType').css('display', 'block');
        if(isJQueryAndUIReady()){
            $("#ConfigUpdateAlertMessage").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [{
                    text: cancel_button,
                    class: "okButton",
                    click: function () {
                        $(this).dialog("close");
                    }
                },],
                close: function () {

                }
            });
        }
    } else if (this.files[0].size > 1000000000) {
        $('#configUpdateForSize').css('display', 'block');
        $('#configUpdateForType').css('display', 'none');
        if(isJQueryAndUIReady()){
            $("#ConfigUpdateAlertMessage").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [{
                    text: cancel_button,
                    class: "okButton",
                    click: function () {
                        $(this).dialog("close");
                    }
                },],
                close: function () {

                }
            });
        }
    } else {
        if(isJQueryAndUIReady()){
            $("#restoreRebootAlertMessage").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [
                    {
                        text: cancel_button,
                        class: "okButton",
                        click: function () {
                            $(this).dialog("close");
                        }
                    },
                    {
                        text: confirm_button,
                        class: "saveButton",
                        style: "margin-left:12px;",
                        click: function () {
                            restoreConfigFile();
                            $(this).dialog("close");
                        }
                    },
                ],
                close: function () {

                }
            });
        }
    }
});

function restoreConfigFile() {
    showingAnimationContainer("configFileUpload");
}

function startProgressBar(token) {
    var i = 0;
    if (i == 0) {
        i = 1;
        var elem = document.getElementById("bar");
        var width = 1;
        var id = setInterval(frame, 600);
        $.ajax({
            url: 'index_main.php',
            type: 'POST',
            data: {
                button_factory_default: '',
                "token": token

            },
            success: function (msg) { }
        });

        function frame() {
            if (width >= 100) {
                clearInterval(id);
                i = 0;
                document.getElementById("factory_reset_setup_message").style.display = "block";
            } else {
                width++;
                elem.style.width = width + "%";
            }
        }
    }
}

function showingAnimationContainer(buttonId) {
    checkSessionTimeout();
    var div = document.createElement("div");
    div.className += "overlay";
    document.body.appendChild(div);
    $('.animationBar').show();
    setTimeout(function () {
        document.getElementById(buttonId).click();
    }, 0);
}

function logoUpdate() {
    showingAnimationContainer("logoUpload");
}

function calculateBroadcastIP(ipAddress, maskIP) {
    var binaryIP = convertIPToBinaryIP(ipAddress);
    var maskBinaryIP = convertIPToBinaryIP(maskIP);
    var invertedMark = [];
    for (var i = 0; i < maskBinaryIP.length; i++) {
        invertedMark.push(invertedBinary(maskBinaryIP[i]));
    }

    var binaryBroadcast = [];
    for (var j = 0; j < maskBinaryIP.length; j++) {
        or = binaryIP[j] | invertedMark[j];
        binaryBroadcast.push(bitwiseOR(binaryIP[j], invertedMark[j]));
    }

    var broadcastIPArr = convertBinaryIPToDecIP(binaryBroadcast);

    var broadcastIPStr = "";
    for (var k = 0; k < broadcastIPArr.length; k++) {
        broadcastIPStr += broadcastIPArr[k] + ".";
    }
    return broadcastIPStr.slice(0, -1);
}

function invertedBinary(number) {
    var no = number + "";
    var noArr = no.split("");
    var newNo = "";
    for (var i = 0; i < noArr.length; i++) {
        if (noArr[i] == "0") {
            newNo += "1";
        } else {
            newNo += "0";
        }
    }
    return newNo;
}

function checkNetworkMaskValidity(subnet) {
    subnet = convertIPToBinaryIP(subnet);
    subnet = subnet.toString();
    subnet = subnet.replace(",", "");
    var subnetArr = subnet.split("");
    var valid = true;
    for (var i = subnetArr.length; i >= 0; i--) {
        if (subnetArr[i] == "1") {
            valid = false;
        }
        if (valid == false && subnetArr[i] == "0") {
            return false;
        }
    }
    return true;
}

function bitwiseOR(firstBinary, secondBinary) {
    var firstArr = [];
    var secondArr = [];
    firstArr = firstBinary.split("");
    secondArr = secondBinary.split("");
    var newAdded = "";
    for (var i = 0; i < firstArr.length; i++) {
        if (firstArr[i] + "+" + secondArr[i] == "1+0") {
            newAdded += "1";
        } else if (firstArr[i] + "+" + secondArr[i] == "0+1") {
            newAdded += "1";
        } else if (firstArr[i] + "+" + secondArr[i] == "1+1") {
            newAdded += "1";
        } else if (firstArr[i] + "+" + secondArr[i] == "0+0") {
            newAdded += "0";
        }
    }
    return newAdded;
}

function convertBinaryIPToDecIP(binaryIPArr) {
    var broadcastIP = [];
    for (var i = 0; i < binaryIPArr.length; i++) {
        broadcastIP.push(parseInt(parseInt(binaryIPArr[i]), 2));
    }
    return broadcastIP;
}

function convertIPToBinaryIP(ipAddress) {
    var ipArr = ipAddress.split(".");
    var binaryIP = [];
    for (var i = 0; i < ipArr.length; i++) {
        var binaryNo = parseInt(ipArr[i]).toString(2);
        if (binaryNo.length == 8) {
            binaryIP.push(binaryNo);
        } else {
            var diffNo = 8 - binaryNo.length;
            var createBinary = '';
            for (var j = 0; j < diffNo; j++) {
                createBinary += '0';
            }
            createBinary += binaryNo;
            binaryIP.push(createBinary);
        }
    }
    return binaryIP;
}

function compare_cidr(eth_mask, wifi_mask) {
    eth_mask = convertIPToBinaryIP(eth_mask);
    wifi_mask = convertIPToBinaryIP(wifi_mask);
    eth_mask = eth_mask.toString();
    wifi_mask = wifi_mask.toString();
    var eth_CIDR = (eth_mask.match(/1/g) || []).length;
    var wifi_CIDR = (wifi_mask.match(/1/g) || []).length;
    if (eth_CIDR < wifi_CIDR) return true;
    else return false;
}

function fillingTheConnectorInfoTable5Sec() {
    var e = document.getElementById("serialNumberSelection");
    var serialNumber = e.options[e.selectedIndex].value;
    var e1 = document.getElementById("serialNumberSelection1");
    var connectorId = e1.options[e1.selectedIndex].getAttribute("data-connector-id");
    if (e.selectedIndex != 0) {
        var index = { serialNumber: serialNumber, vip: "", connectorId: connectorId };
        $.ajax({
            type: 'POST',
            url: 'query_connector.php',
            data: index,
            success: function (data) {
                var result = data.split('|');

                // Check if result[1] exists and has a length greater than 1
                if (result.length > 1 && result[1].length > 1) {
                    var jsonObj = jQuery.parseJSON(result[1].substring(1, (result[1].length) - 1));

                    // Check if jsonObj is not null or undefined
                    if (jsonObj) {
                        $('#slaveConfigItems1').css({
                            "display": "inline-block",
                            "width": "38.5vw"
                        });
                        $("#textConnectorState1").val(jsonObj.connectorState);
                        $("#textInstantCurrentPerPhase01").val(jsonObj.instantCurrentP1);
                        $("#textInstantCurrentPerPhase02").val(jsonObj.instantCurrentP2);
                        $("#textInstantCurrentPerPhase03").val(jsonObj.instantCurrentP3);
                        $("#textAvailableCurrentPerPhase01").val(jsonObj.availableCurrentP1);
                        $("#textAvailableCurrentPerPhase02").val(jsonObj.availableCurrentP2);
                        $("#textAvailableCurrentPerPhase03").val(jsonObj.availableCurrentP3);

                        somethingChangedForLocalLoadManagementGroup = false;
                    } else {
                        console.error("Invalid JSON data received:", result[1]);
                    }
                } else {
                    // Handle the case where result[1] is undefined or has length <= 1
                    console.error("Invalid data received:", result);
                }
            },
            error: function (xhr) {
                console.error("AJAX request failed:", xhr);
                // Handle error if needed
            }
        });
    }
}

function fillingTheSlaveConfigTable5Sec() {
    var e = document.getElementById("serialNumberSelection");
    var serialNumber = e.options[e.selectedIndex].value;
    if (e.selectedIndex != 0) {
        var index = { serialNumber: serialNumber, vip: "" };
        var phaseConnectionSelectionValue = $('#phaseConnectionSelection').val();
        var vipSelectionValue = $('#vipSelection').val();
        $.ajax({
            type: 'POST',
            url: 'query.php',
            data: index,
            success: function (data) {
                var result = data.split('|');
                var jsonObj = jQuery.parseJSON(result[1].substring(1, (result[1].length) - 1));
                $('#slaveConfigItems').css("display", "inline-block");

                $("#textMacAddress").val(jsonObj.macAddress);
                $("#textIpAddress").val(jsonObj.IPAddress);
                $("#vipSelection").val(jsonObj.vip);
                $('#phaseConnectionSelection').empty();
                var phaseConSeq = jsonObj['connectionSequence'];
                if (jsonObj.phasesNumber == 0) {
                    $("#textPhasesNumber").val("1");
                    $('#phaseConnectionSelection').append(`<option value="L1" selected>L1 </option>`);
                    $('#phaseConnectionSelection').append(`<option value="L2">L2 </option>`);
                    $('#phaseConnectionSelection').append(`<option value="L3">L3 </option>`);
                }
                else {
                    $("#textPhasesNumber").val("3");
                    $('#phaseConnectionSelection').append(`<option value="L1,L2,L3">L1,L2,L3</option>`);
                    $('#phaseConnectionSelection').append(`<option value="L2,L3,L1">L2,L3,L1</option>`);
                    $('#phaseConnectionSelection').append(`<option value="L3,L1,L2">L3,L1,L2</option>`);
                }
                $("#phaseConnectionSelection").val(phaseConnectionSelectionValue);
                $("#textConnectorState").val(jsonObj.connectorState);
                $("#textMaximumCurrent").val(jsonObj.maxCurrent);
                $("#textMinCurrent1P").val(jsonObj.minCurrent1P);
                $("#textMinCurrent3P").val(jsonObj.minCurrent3P);
                $("#textForStep").val(jsonObj.step);
                $("#textInstantCurrentPerPhase1").val(jsonObj.instantCurrentP1);
                $("#textInstantCurrentPerPhase2").val(jsonObj.instantCurrentP2);
                $("#textInstantCurrentPerPhase3").val(jsonObj.instantCurrentP3);
                $("#textconnectionStatus").val(jsonObj.connectionStatus);
                $("#textofflineCurrent").val(jsonObj.offlineCurrent);
                if(vipSelectionValue == null){
                    $("#vipSelection").val(jsonObj.vip);
                }
                else {
                    $("#vipSelection").val(vipSelectionValue);
                }

                if (serialNumber == masterSerialNumber) {
                    loadmanagementUpdatedlmgroupButton = document.getElementById('loadmanagement_updatedlmgroup_button');
                    if ($("#textconnectionStatus").val() == "Connected") {
                        loadmanagementUpdatedlmgroupButton.className = 'interfacesButtonUpdateSlave';
                        loadmanagementUpdatedlmgroupButton.setAttribute("onclick", "updateDLMGroup()");

                    } else {
                        loadmanagementUpdatedlmgroupButton.className = 'interfacesButtonUpdateSlaveDisabled';
                        loadmanagementUpdatedlmgroupButton.removeAttribute("onclick");
                    }
                }

                somethingChangedForLocalLoadManagementGroup = false;
            },

            error: function (xhr) {

            }


        });
    }
}
$('#serialNumberSelection').on('focus', function () {
    previousOption = $(this).children("option:selected").val();
})

function checkSaving() {
    if ((somethingChangedForLocalLoadManagementGroup) && (previousOption != choose_one)) {
        if(isJQueryAndUIReady()){
            $("#notSavedAlertMessageForLoadManagementGroupTab").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [{
                    text: cancel_button,
                    class: "okButton",
                    click: function () {
                        somethingChangedForLocalLoadManagementGroup = false;
                        fillingTheSlaveConfigTable();
                        $(this).dialog("close");

                    }
                },
                {
                    text: save_button,
                    class: "saveButton",
                    click: function () {
                        $(this).dialog("close");
                        somethingChangedForLocalLoadManagementGroup = false;
                        saveSlaveConfigDb();

                    }
                },
                ],
                close: function () {
                    somethingChangedForLocalLoadManagementGroup = false;

                }
            });
        }
    } else {
        fillingTheSlaveConfigTable();
    }
}

function checkSavings() {
    if ((somethingChangedForLocalLoadManagementGroup) && (previousOption != choose_one)) {
        $("#notSavedAlertMessageForLoadManagementGroupTab").dialog({
            width: 580,
            height: 300,
            modal: true,
            closeOnEscape: false,
            dialogClass: "dialog-no-close",
            buttons: [{
                text: cancel_button,
                class: "okButton",
                click: function () {
                    somethingChangedForLocalLoadManagementGroup = false;
                    fillingTheConnectorInfoTable();
                    $(this).dialog("close");

                }
            },
            {
                text: save_button,
                class: "saveButton",
                click: function () {
                    $(this).dialog("close");
                    somethingChangedForLocalLoadManagementGroup = false;
                    saveConnectorInfoDb();

                }
            },
            ],
            close: function () {
                somethingChangedForLocalLoadManagementGroup = false;

            }
        });
    } else {
        console.log("No need for dialog, filling the connector info table...");
        fillingTheConnectorInfoTable();
    }
}

function saveSlaveConfigDb() {
    var masterMissingFields = [];
    for (var key in masterRequiredFields){
        if(masterRequiredFields[key] === null || masterRequiredFields[key] == "none"){
            masterMissingFields.push(key);
        }
    }
    if(masterRequiredFields.cpRole.toLowerCase() != "master" || masterMissingFields.length != 0){
        if(isJQueryAndUIReady()){
            $("#cpRoleMasterAlertMessage").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [{
                    text: ok_button,
                    class: "saveButton",
                    click: function () {
                        $(this).dialog("close");
                        document.getElementById("defaultLocalLoadBar").click();
                        CPRoleFunction();
                    }
                },],
                close: function () {

                }
            });
        }
    }else{


        textSerialNuber = document.getElementById("serialNumberSelection");
        textvip = document.getElementById("vipSelection");
        textphaseConSequence = document.getElementById("phaseConnectionSelection");
        textofflineCurrent = document.getElementById("textofflineCurrent");
        textMaximumCurrent = document.getElementById("textMaximumCurrent");
        textMinCurrent1P = document.getElementById("textMinCurrent1P");
        textMinCurrent3P = document.getElementById("textMinCurrent3P");
        textPhasesNumber = document.getElementById("textPhasesNumber");

        if (textPhasesNumber.value == 1) {
           var minFallbackCurrent = parseFloat(textMinCurrent1P.value);
        } else {
           var minFallbackCurrent = parseFloat(textMinCurrent3P.value);
        }
        var offlineCurrent = parseFloat(textofflineCurrent.value);
        var maxFallbackCurrent = parseFloat(textMaximumCurrent.value);

        if (isNaN(offlineCurrent) || (offlineCurrent !== (0) && offlineCurrent < (minFallbackCurrent)) || offlineCurrent > (maxFallbackCurrent)) {
            textofflineCurrentErr.innerHTML = fallback_current_range + minFallbackCurrent + " - " + maxFallbackCurrent + ".";
            textofflineCurrent.className = "focusedTextarea2";
            return false;
        } else {
            textofflineCurrentErr.innerHTML = "";
            textofflineCurrent.className = "textareaForLocalLoadGroup";
        }
        if(textSerialNuber.value == choose_one)
        {
            var index = {
                serialNumber: "clicked",
                vip: "",
                phaseConSequence: textphaseConSequence.value,
                offlineCurrent: textofflineCurrent.value
            };
        }
        else{
            var index = {
                serialNumber: textSerialNuber.value,
                vip: textvip.value,
                phaseConSequence: textphaseConSequence.value,
                offlineCurrent: textofflineCurrent.value
            };
        }

        var div = document.createElement("div");
        div.className += "overlay";
        document.body.appendChild(div);
        $('.animationBar').show();
        $.ajax({
            type: 'POST',
            url: 'query.php',
            data: index,
            success: function(data) {
                somethingChangedForLocalLoadManagementGroup = false;
                if(textSerialNuber.value == ""){
                    textSerialNuber.value = choose_one;
                }
                $('.animationBar').hide();
                document.body.removeChild(div);
                somethingChanged = false;

            },
            error: function(xhr) {
                $('.animationBar').hide();

            }


        });
    }
}

function saveConnectorInfoDb() {
    textSerialNumber = document.getElementById("serialNumberSelection1");
    textvip = document.getElementById("vipSelection");
    textphaseConSequence = document.getElementById("phaseConnectionSelection");
    var selectedOption = $("#serialNumberSelection1 option:selected");
    var connectorId = selectedOption.data("connectorId");
    if (textSerialNuber.value == choose_one) {
        var index = {
            serialNumber: "clicked",
            vip: "",
            phaseConSequence: textphaseConSequence.value,
            connectorId: ""
        };
    }
    else {
        var index = {
            serialNumber: textSerialNumber.value,
            vip: textvip.value,
            phaseConSequence: textphaseConSequence.value,
            connectorId: textConnectorId.value
        };
    }

    var div = document.createElement("div");
    div.className += "overlay";
    document.body.appendChild(div);
    $('.animationBar').show();
    $.ajax({
        type: 'POST',
        url: 'query_connector.php',
        data: index,
        success: function (data) {
            somethingChangedForLocalLoadManagementGroup = false;
            if (textSerialNuber.value == "") {
                textSerialNumber.value = choose_one;
            }
            $('.animationBar').hide();
            document.body.removeChild(div);
            somethingChanged = false;

        },
        error: function (xhr) {
            $('.animationBar').hide();

        }


    });
}

function CPRoleFunction() {
    selectCpRole = document.getElementById("cpRoleSelection");
    //dlmMaxCurrent = document.getElementById("totalCurrentLimit");
    //dlmMaxCurrentErr = document.getElementById("totalCurrentLimitErr");
    mainCircuitCurrent = document.getElementById("mainCircuitCurrent");
    mainCircuitCurrentErr = document.getElementById("mainCircuitCurrentErr");
    supplyTypeSelection = document.getElementById("supplyTypeSelection");
    loadManagementModeSelection = document.getElementById("loadManagementModeSelection");
    fifoPercentageSelection = document.getElementById("fifoPercentageSelection");
    DLMSettingsPart = document.getElementById("DLMSettingsPart");
    var languageSelection = document.getElementById("lang");
    var languageSelectionValue = languageSelection.options[languageSelection.selectedIndex].value;
    clusterMaxCurrentPart = document.getElementById("clusterMaxCurrentPart");
    clusterFailSafeModePart = document.getElementById("clusterFailSafeModePart");

    if (selectCpRole.value == "Slave") {
        DLMSettingsPart.style.display = "none";
        document.getElementById("loadManagementGroupButton").style.pointerEvents = "none";
        if ( languageSelectionValue == "hr"){
            selectCpRole.style.fontSize = 0.67 + "vw";
        }
        clusterMaxCurrentPart.style.display = "none";
        clusterFailSafeModePart.style.display = "none";
    } else {
        DLMSettingsPart.style.display = "";
        mainCircuitCurrent.className = "textarea1";
        mainCircuitCurrentErr.innerHTML = "";
        //dlmMaxCurrent.className = "textarea1";
        //dlmMaxCurrentErr.innerHTML = "";
        document.getElementById("loadManagementGroupButton").style.pointerEvents = "";
        clusterMaxCurrentPart.style.display = "";
        clusterFailSafeModePart.style.display = "";
        loadManagementFunction();
    }
}

function checkDLMSettingsForm() {
    errorCheck = 2;
    dlmSelection = document.getElementById("loadManagementSelection");
    failSafeCurrent = document.getElementById("failSafeCurrent");
    failSafeCurrentErr = document.getElementById("failSafeCurrentErr");
    maximumFailsafeCurrent = 32;
    var dlmInterfaceValue = document.getElementById('dlmInterfaceSelectionOuter').value;
    var dlmInterfaceValueOuter = document.getElementById('dlmInterfaceSelectionOuter');
    var selectNetworkWLAN = document.getElementById('selectNetworkWLAN').value;
    var supplyType = document.getElementById('supplyTypeSelection').value;
    var gridBufferSelectionValue = document.getElementById("gridBufferSelection").value;
    var clusterMaxCurrentErr = document.getElementById("clusterMaxCurrentErr");
    var clusterFailSafeCurrentErr = document.getElementById("clusterFailSafeCurrentErr");
    var clusterMaxCurrentPart = document.getElementById("clusterMaxCurrentPart");
    var clusterFailSafeCurrentPart = document.getElementById("clusterFailSafeCurrentPart");
    var clusterFailSafeModeValue = document.getElementById("clusterFailSafeMode").value;

    if (mainCircuitCurrent.value.trim() != '' && !isNaN(mainCircuitCurrent.value.trim())) {
        var calculateMainCircuitCurrent = Math.floor(parseInt(mainCircuitCurrent.value.trim()) * (1 - gridBufferSelectionValue / 100));
    }

    if (ul_type === 'UL50') {
        maximumFailsafeCurrent = 50;
    }
    if ((dlmSelection.value == "Enabled") && (followTheSunSelection.value != 0 || powerOptimizerValue != 0)) {
        loadManagementOptionSelection();
    } else if(dlmSelection.value == "Modbus" && powerOptimizerValue != 0){
        loadManagementOptionSelection();
    } else if (dlmSelection.value == "Modbus" && powerOptimizerValue == 0) {
        errorCheck = 1;
        if (failSafeCurrent.value.trim() == '') {
            failSafeCurrentErr.innerHTML = failsafe_current_err;
            failSafeCurrent.className = "focusedTextarea";
        } else if (isNaN(failSafeCurrent.value.trim())) {
            failSafeCurrentErr.innerHTML = failsafe_current + " " + must_be_numeric;
            failSafeCurrent.className = "focusedTextarea";
        } else if (failSafeCurrent.value < 0) {
            failSafeCurrentErr.innerHTML = failsafe_current_less_than_0;
            failSafeCurrent.className = "focusedTextarea";
        }
        else if (failSafeCurrent.value > parseInt(maximumFailsafeCurrent)) {
            failSafeCurrentErr.innerHTML = failsafe_current_more_than;
            failSafeCurrent.className = "focusedTextarea";
        } else {
            failSafeCurrentErr.innerHTML = "";
            failSafeCurrent.className = "textarea1";
            errorCheck--;
        }
    }
    else if (dlmSelection.value == "Enabled" && selectCpRole.value == "Master") {
        errorCheck = 4;
        if (dlmInterfaceValue == "wifi" && selectNetworkWLAN == "wifiDisable") {
            dlmInterfaceSelectionOuterErr.innerHTML = dlm_interface_selection_err;
            dlmInterfaceValueOuter.className = "focusedTextarea";
        } else {
            dlmInterfaceSelectionOuterErr.innerHTML = "";
            dlmInterfaceValueOuter.className = "selectbox";
            errorCheck--;
        }
        if (supplyType !== "TIC") {
            if (mainCircuitCurrent.value.trim() == '') {
                mainCircuitCurrentErr.innerHTML = main_circuit_current_err;
                mainCircuitCurrent.className = "focusedTextarea";
            } else if (isNaN(mainCircuitCurrent.value.trim())) {
                mainCircuitCurrentErr.innerHTML = main_circuit_current + " " + must_be_numeric;
                mainCircuitCurrent.className = "focusedTextarea";
            } else if (parseInt(mainCircuitCurrent.value.trim()) > 1024) {
                mainCircuitCurrentErr.innerHTML = main_circuit_current + " " + less_than_1024;
                mainCircuitCurrent.className = "focusedTextarea";
            } else if (calculateMainCircuitCurrent < 10) {
                mainCircuitCurrentErr.innerHTML = more_than_10;
                mainCircuitCurrent.className = "focusedTextarea";
            } else {
                mainCircuitCurrentErr.innerHTML = "";
                mainCircuitCurrent.className = "textarea1";
                errorCheck--;
            }
        } else {
            errorCheck--;
        }
        if (clusterMaxCurrent.value.trim() == '') {
            clusterMaxCurrentErr.innerHTML = cluster_max_current_err;
            clusterMaxCurrent.className = "focusedTextarea";
        } else if (isNaN(clusterMaxCurrent.value.trim())) {
            clusterMaxCurrentErr.innerHTML = cluster_max_current + " " + must_be_numeric;
            clusterMaxCurrent.className = "focusedTextarea";
        } else if (clusterMaxCurrent.value < 10) {
            clusterMaxCurrentErr.innerHTML = cluster_max_current_less_than_10;
            clusterMaxCurrent.className = "focusedTextarea";
        }
        else if (clusterMaxCurrent.value > calculateMainCircuitCurrent) {
            clusterMaxCurrentErr.innerHTML = cluster_max_current_more_than + " " + calculateMainCircuitCurrent;
            clusterMaxCurrent.className = "focusedTextarea";
        } else {
            clusterMaxCurrentErr.innerHTML = "";
            clusterMaxCurrent.className = "textarea1";
            errorCheck--;
        }
        if (clusterFailSafeModeValue == "Enabled") {
            if (clusterFailSafeCurrent.value.trim() == '') {
                clusterFailSafeCurrentErr.innerHTML = cluster_failsafe_current_err;
                clusterFailSafeCurrent.className = "focusedTextarea";
            } else if (isNaN(clusterFailSafeCurrent.value.trim())) {
                clusterFailSafeCurrentErr.innerHTML = cluster_failsafe_current + " " + must_be_numeric;
                clusterFailSafeCurrent.className = "focusedTextarea";
            } else if (clusterFailSafeCurrent.value < 0) {
                clusterFailSafeCurrentErr.innerHTML = cluster_failsafe_current_less_than_0;
                clusterFailSafeCurrent.className = "focusedTextarea";
            }
            else if (clusterFailSafeCurrent.value > parseInt(mainCircuitCurrent.value.trim())) {
                clusterFailSafeCurrentErr.innerHTML = cluster_failsafe_current_more_than;
                clusterFailSafeCurrent.className = "focusedTextarea";
            } else {
                clusterFailSafeCurrentErr.innerHTML = "";
                clusterFailSafeCurrent.className = "textarea1";
                errorCheck--;
            }
        } else {
            errorCheck--;
        }
        
        /* if (dlmMaxCurrent.value.trim() == '') {
            dlmMaxCurrentErr.innerHTML = dlm_max_current_err;
            dlmMaxCurrent.className = "focusedTextarea";
        } else if (parseInt(dlmMaxCurrent.value.trim()) > 1024) {
            dlmMaxCurrentErr.innerHTML = dlm_max_current + " " + less_than_1024;
            dlmMaxCurrent.className = "focusedTextarea";
        } else if (parseInt(dlmMaxCurrent.value.trim()) < 12) {
            dlmMaxCurrentErr.innerHTML = dlm_max_current + " " + more_than_12;
            dlmMaxCurrent.className = "focusedTextarea";
        } else if (isNaN(dlmMaxCurrent.value.trim())) {
            dlmMaxCurrentErr.innerHTML = dlm_max_current + " " + must_be_numeric;
            dlmMaxCurrent.className = "focusedTextarea";
        } else if (parseInt(dlmMaxCurrent.value.trim()) > parseInt(mainCircuitCurrent.value.trim())) {
            dlmMaxCurrentErr.innerHTML = dlm_max_current_less_err;
            dlmMaxCurrent.className = "focusedTextarea";
        } else if (parseInt(dlmMaxCurrent.value.trim()) < (parseInt(mainCircuitCurrent.value.trim()) / 2)) {
            dlmMaxCurrentErr.innerHTML = dlm_max_current_more_err;
            dlmMaxCurrent.className = "focusedTextarea";
        }
        else {
            dlmMaxCurrentErr.innerHTML = "";
            dlmMaxCurrent.className = "textarea1";
            errorCheck--;
        } */
    } else {
        if (dlmInterfaceValue == "wifi" && selectNetworkWLAN == "wifiDisable") {
            dlmInterfaceSelectionOuterErr.innerHTML = dlm_interface_selection_err;
            dlmInterfaceValueOuter.className = "focusedTextarea";
        } else {
            dlmInterfaceSelectionOuterErr.innerHTML = "";
            dlmInterfaceValueOuter.className = "selectbox";
            errorCheck = 0;
        }
    }
    if (errorCheck != 0) return (false)

    showingAnimationContainer("button_load_management");
    return true;
}

function loadManagementFunction() {
    if (loadManagementModeSelection.selectedIndex == 2) {
        fifoPercentageSelection.disabled = false;
    } else {
        fifoPercentageSelection.disabled = true;
    }
}
$("#imageFile").change(function () {
    filename = $("#imageFile").val();
    var res = filename.split('\\');
    var num = res.length;
    var file = res[num - 1];
    var extensionPath = file.split('.');
    var extension = extensionPath[extensionPath.length - 1];
    var fileUpload = document.getElementById("imageFile");
    if (extension.localeCompare("png") != 0) {
        $('#logoUpdateForDimension').css('display', 'none');
        $('#logoUpdateForType').css('display', 'block');
        if(isJQueryAndUIReady()){
            $("#logoUpdateAlertMessage").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [
                    {
                        text: cancel_button,
                        class: "okButton",
                        click: function () {
                            $(this).dialog("close");
                        }
                    },
                ],
                close: function () {

                }
            });
        }
    }
    else if (typeof (fileUpload.files) != "undefined") {
        var reader = new FileReader();
        reader.readAsDataURL(fileUpload.files[0]);
        reader.onload = function (e) {

            var image = new Image();
            image.src = e.target.result;
            image.onload = function () {

                var height = this.height;
                var width = this.width;
                if (height > 80 || width > 80) {
                    $('#logoUpdateForDimension').css('display', 'block');
                    $('#logoUpdateForType').css('display', 'none');
                    if(isJQueryAndUIReady()){
                        $("#logoUpdateAlertMessage").dialog({
                            width: 580,
                            height: 300,
                            modal: true,
                            closeOnEscape: false,
                            dialogClass: "dialog-no-close",
                            buttons: [
                                {
                                    text: cancel_button,
                                    class: "okButton",
                                    click: function () {
                                        $(this).dialog("close");
                                    }
                                },
                            ],
                            close: function () {

                            },
                        });
                    }
                }
                else {
                    $('#logoUploadPart').css('display', 'none');
                    $('#logoUpdatePart').css('display', 'block');
                    $("#logoFileName").text(file);
                }
            };
        }
    }
    else {
        $('#logoUploadPart').css('display', 'none');
        $('#logoUpdatePart').css('display', 'block');
        $("#logoFileName").text(file);
    }

});

function updateDLMGroup() {
    showingAnimationContainer("button_loadmanagement_updatedlmgroup");
}

function ip2long(ip_address) {
    var output = false;
    var parts = [];
    if (ip_address.match(/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/)) {
        parts = ip_address.split('.');
        output = (parts[0] * 16777216 +
            (parts[1] * 65536) +
            (parts[2] * 256) +
            (parts[3] * 1));
    }

    return output;
}

function lteGatewayFunction() {
    lteGatewayEnabled = document.getElementById("lteGatewayEnable");
    if (lteGatewayEnabled.selected == true && ethernet_ip_settings != "DHCPServer") {
        $('#lteEnabled').css('display', 'block');
        $('#lteDisabled').css('display', 'none');
        if(isJQueryAndUIReady()){
            $("#alertMessageForLTEFunction").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [{
                    text: cancel_button,
                    class: "okButton",
                    click: function () {
                        lteGatewayEnabled.selected = false;
                        $(this).dialog("close");

                    }
                },
                {
                    text: ok_button,
                    class: "saveButton",
                    click: function () {
                        $(this).dialog("close");

                    }
                },
                ],
                close: function () {
                    somethingChangedForLocalLoadManagementGroup = false;

                }
            });
        }
    }
}

function findingHosts(defaultGateway, subnetMask) {
    zeroCount = hostNumber(subnetMask); // it gives the number of zeros.
    binaryDefaultGateway = convertingIptoBinary(defaultGateway);
    if (zeroCount > 0) {
        last = (("0".repeat((32 - zeroCount))) + "1".repeat(zeroCount)).match(/.{1,8}/g).join('.').split('.');
        network = baseNetwork(defaultGateway, subnetMask);

        networkArray = network.match(/.{1,8}/g).join('.').split('.');
        lastIp = [];
        firstIp = [];
        baseIp = [];
        for (i = 0; i < networkArray.length; i++) {
            sum = parseInt(last[i], 2) + parseInt(networkArray[i], 2);
            lastIp.push(sum);
            firstIp.push(parseInt(networkArray[i], 2));
            baseIp.push(parseInt(networkArray[i], 2));


        }
        lastIp[3] = lastIp[3] - 1;
        firstIp[3] = firstIp[3] + 1;
        return lastIp.join('.') + "+" + firstIp.join('.') + "+" + baseIp.join('.');

    }

}

function baseNetwork(defaultGateway, subnetMask) {
    zeroCount = hostNumber(subnetMask); // it gives the number of zeros.
    binaryDefaultGateway = convertingIptoBinary(defaultGateway);
    network = (binaryDefaultGateway.substring(0, binaryDefaultGateway.length - zeroCount)).concat("0".repeat(zeroCount));
    return network;

}


function hostNumber(subnetMask) {
    var sum = 0;
    binarySubnetMask = convertingIptoBinary(subnetMask);
    for (i = 0; i < binarySubnetMask.length; i++) {
        sum += parseInt(binarySubnetMask[i]);

    }
    zeroCount = 32 - sum; // it gives the number of zeros.
    return zeroCount;


}

function convertingIptoBinary(ipValue) {
    ipValueArray = ipValue.toString().split(".");
    var binaryIpValue = "";
    for (i = 0; i < ipValueArray.length; i++) {
        tmpBinaryIpValue = Math.abs(ipValueArray[i]).toString(2);
        if (tmpBinaryIpValue.length < 8) {
            zero = "0".repeat((8 - tmpBinaryIpValue.length));
            binaryIpValue += (zero + tmpBinaryIpValue);
        } else {
            binaryIpValue += tmpBinaryIpValue;
        }
    }
    return binaryIpValue;
}
function fillingTheSlaveConfigTable() {
    var e = document.getElementById("serialNumberSelection");
    var serialNumber = e.options[e.selectedIndex].value;
    // Reset input fields
    $("#textConnectorState1").val("");
    $("#textInstantCurrentPerPhase01").val("");
    $("#textInstantCurrentPerPhase02").val("");
    $("#textInstantCurrentPerPhase03").val("");
    $("#textAvailableCurrentPerPhase01").val("");
    $("#textAvailableCurrentPerPhase02").val("");
    $("#textAvailableCurrentPerPhase03").val("");
    if (e.selectedIndex != 0) {
        var index = { serialNumber: serialNumber, vip: "" };
        $.ajax({
            type: 'POST',
            url: 'query.php',
            data: index,
            success: function (data) {
                var result = data.split('|');
                var jsonObj = jQuery.parseJSON(result[1].substring(1, (result[1].length) - 1));
                $('#slaveConfigItems').css("display", "inline-block");
                $("#textNumberOfConnectors").val(jsonObj.noOfConnectors);
                $("#textMacAddress").val(jsonObj.macAddress);
                $("#textIpAddress").val(jsonObj.IPAddress);
                $("#vipSelection").val(jsonObj.vip);
                $('#phaseConnectionSelection').empty();
                var phaseConSeq = jsonObj['connectionSequence'];
                if (jsonObj.phasesNumber == 0) {
                    $("#textPhasesNumber").val("1");
                    $('#phaseConnectionSelection').append(`<option value="L1" selected>L1 </option>`);
                    $('#phaseConnectionSelection').append(`<option value="L2">L2 </option>`);
                    $('#phaseConnectionSelection').append(`<option value="L3">L3 </option>`);
                }
                else {
                    $("#textPhasesNumber").val("3");
                    $('#phaseConnectionSelection').append(`<option value="L1,L2,L3">L1,L2,L3</option>`);
                    $('#phaseConnectionSelection').append(`<option value="L2,L3,L1">L2,L3,L1</option>`);
                    $('#phaseConnectionSelection').append(`<option value="L3,L1,L2">L3,L1,L2</option>`);
                }
                if (phaseConSeq == null || phaseConSeq.includes("None")) {
                    if (jsonObj.phasesNumber == 0) {
                        $("#phaseConnectionSelection").val("L1");
                    }
                    else {
                        $("#phaseConnectionSelection").val("L1,L2,L3");
                    }
                }
                else {
                    $("#phaseConnectionSelection").val(phaseConSeq);
                }
                $('#serialNumberSelection1').empty();
                $('#serialNumberSelection1').append('<option selected disabled>' + choose_one + '</option>');

                if (jsonObj.noOfConnectors == 1) {
                    $('#serialNumberSelection1').append(`<option value="1" data-connector-id="1">1</option>`);
                } else {
                    $('#serialNumberSelection1').append(`<option value="1" data-connector-id="1">1</option>`);
                    $('#serialNumberSelection1').append(`<option value="2" data-connector-id="2">2</option>`);
                }
                $("#textConnectorState").val(jsonObj.connectorState);
                $("#textMaximumCurrent").val(jsonObj.maxCurrent);
                $("#textMinCurrent1P").val(jsonObj.minCurrent1P);
                $("#textMinCurrent3P").val(jsonObj.minCurrent3P);
                $("#textForStep").val(jsonObj.step);
                $("#textInstantCurrentPerPhase1").val(jsonObj.instantCurrentP1);
                $("#textInstantCurrentPerPhase2").val(jsonObj.instantCurrentP2);
                $("#textInstantCurrentPerPhase3").val(jsonObj.instantCurrentP3);
                $("#textconnectionStatus").val(jsonObj.connectionStatus);
                $("#textofflineCurrent").val(jsonObj.offlineCurrent);

                if (serialNumber == masterSerialNumber) {
                    loadmanagementUpdatedlmgroupButton = document.getElementById('loadmanagement_updatedlmgroup_button');
                    if ($("#textconnectionStatus").val() == "Connected") {
                        loadmanagementUpdatedlmgroupButton.className = 'interfacesButtonUpdateSlave';
                        loadmanagementUpdatedlmgroupButton.setAttribute("onclick", "updateDLMGroup()");

                    } else {
                        loadmanagementUpdatedlmgroupButton.className = 'interfacesButtonUpdateSlaveDisabled';
                        loadmanagementUpdatedlmgroupButton.removeAttribute("onclick");
                    }
                }

                somethingChangedForLocalLoadManagementGroup = false;
            },

            error: function (xhr) {

            }


        });
    }
}

function fillingTheConnectorInfoTable() {
    var e = document.getElementById("serialNumberSelection");
    var serialNumber = e.options[e.selectedIndex].value;
    var e1 = document.getElementById("serialNumberSelection1");
    var connectorId = e1.options[e1.selectedIndex].getAttribute("data-connector-id");
    if (e.selectedIndex != 0) {
        var index = { serialNumber: serialNumber, vip: "", connectorId: connectorId };
        $.ajax({
            type: 'POST',
            url: 'query_connector.php',
            data: index,
            success: function (data) {
                var result = data.split('|');
                var jsonObj = jQuery.parseJSON(result[1].substring(1, (result[1].length) - 1));
                $('#slaveConfigItems1').css({
                    "display": "inline-block",
                    "width": "38.5vw"
                });
                $("#textConnectorState1").val(jsonObj.connectorState);
                $("#textInstantCurrentPerPhase01").val(jsonObj.instantCurrentP1);
                $("#textInstantCurrentPerPhase02").val(jsonObj.instantCurrentP2);
                $("#textInstantCurrentPerPhase03").val(jsonObj.instantCurrentP3);
                $("#textAvailableCurrentPerPhase01").val(jsonObj.availableCurrentP1);
                $("#textAvailableCurrentPerPhase02").val(jsonObj.availableCurrentP2);
                $("#textAvailableCurrentPerPhase03").val(jsonObj.availableCurrentP3);

                somethingChangedForLocalLoadManagementGroup = false;
            },
            error: function (xhr) {
            }
        });
    }
}

function checkEarthingSystemForm() {
    earthingSystemCheck();
    if (earhingSystemError == 0) {
        showingAnimationContainer("button_earthing_system");
    }
}

function checkUnbalancedLoadDetectionForm() {
    showingAnimationContainer("button_unbalanced_load_detection");

}

function checkExternalEnableInputForm() {
    showingAnimationContainer("button_external_enable_input");

}

function checklockableCableForm() {
    showingAnimationContainer("button_lockable_cable");

}

function checkBackLightDimmingForm() {
    showingAnimationContainer("button_back_light_dimming");
}

function checkLedDimmingForm() {
    showingAnimationContainer("button_led_dimming");
}

function deviceLogSettings(buttonId) {
    var downloadLogDateErr = document.getElementById("downloadLogDateErr");
    var startDateSelection = document.getElementById('logsStartDateSelection');
    var endDateSelection = document.getElementById('logsEndDateSelection');
    var endDate = new Date(endDateSelection.value);
    var fiveDaysBefore = new Date(endDate);
    fiveDaysBefore.setDate(endDate.getDate() - 5);
    var year = fiveDaysBefore.getFullYear();
    var month = String(fiveDaysBefore.getMonth() + 1).padStart(2, '0');
    var day = String(fiveDaysBefore.getDate()).padStart(2, '0');
    var formattedDateBefore = `${year}-${month}-${day}`;
    var logError = 1;
    if (startDateSelection.value < formattedDateBefore) {
        downloadLogDateErr.innerHTML = logsDateError;
        startDateSelection.className = "focusedTextarea";
        endDateSelection.className = "focusedTextarea";
    } else {
        downloadLogDateErr.innerHTML = "";
        startDateSelection.className = "textarea1";
        endDateSelection.className = "textarea1";
        logError--;
        const hiddenInput = document.getElementById(buttonId);
        if (logError == 0) {
            if (hiddenInput) {
                hiddenInput.click();
                setTimeout(() => {
                    location.href = 'downloadDeviceLogs.php';
                }, 500);
            }
        }
    }
}

function handleMinMaxDates() {
    var startDateSelection = document.getElementById('logsStartDateSelection');
    var endDateSelection = document.getElementById('logsEndDateSelection');
    startDateSelection.max = endDateSelection.value;
    endDateSelection.min = startDateSelection.value;
}

function clearLogsRestartAlertMessage() {
    if(isJQueryAndUIReady()){
        $("#clearLogsRestartAlertMessage").dialog({
            width: 580,
            height: 300,
            modal: true,
            closeOnEscape: false,
            dialogClass: "dialog-no-close",
            buttons: [
                {
                    text: cancel_button,
                    class: "okButton",
                    click: function () {
                        $(this).dialog("close");
                    }
                },
                {
                    text: confirm_button,
                    class: "saveButton",
                    style: "margin-left:12px;",
                    click: function () {
                        showingAnimationContainer("button_clear_device_log");
                        $(this).dialog("close");
                    }
                },
            ],
            close: function () {
            }
        });
    }
}

function displayBacklightSettingsFunction() {
    var sunset = document.getElementById('sunsetTimeSelection');
    var sunrise = document.getElementById('sunriseTimeSelection');
    var backLightLevelSelection = document.getElementById('backLightLevelSelection');
    var ledDimmingSunrise = document.getElementById('ledDimmingSunriseTimeSelection');
    var ledDimmingSunset = document.getElementById('ledDimmingSunsetTimeSelection');
    var ledDimmingLevelSelection = document.getElementById('ledDimmingLevelSelection');
    var languageSelection = document.getElementById("lang");
    var backLightLevelSelection = document.getElementById("backLightLevelSelection");
    var displayBacklightSettingsLanguage = ["pl", "es", "fr", "ro", "sk", "fi"];
    if (displayBacklightSettingsLanguage.includes(languageSelection.options[languageSelection.selectedIndex].value) && backLightLevelSelection.options[backLightLevelSelection.selectedIndex].value == "userInteraction") {
        backLightLevelSelection.style.fontSize = 0.65 + "vw";
    } else {
        backLightLevelSelection.style.fontSize = 0.8 + "vw";
    }

    if (backLightLevelSelection.value == "timeBased") {
        sunset.disabled = false;
        sunrise.disabled = false;
    } else {
        sunset.disabled = true;
        sunrise.disabled = true;
    } if (ledDimmingLevelSelection.value == "timeBased") {
        ledDimmingSunset.disabled = false;
        ledDimmingSunrise.disabled = false;
    } else {
        ledDimmingSunset.disabled = true;
        ledDimmingSunrise.disabled = true;
    }
}

function currentLimiterSettings() {
    var currentLimiterValue = document.getElementById('currentLimiterValue');
    var currentLimiterValueError = document.getElementById('currentLimiterValueErr');
    var currentLimiterPhaseSelection = document.getElementById('currentLimiterPhaseSelection');
    currentLimiterValue.className = "textareaForLocalLoadGroup";
    currentLimiterValueError.innerHTML = "";

}

function checkCurrentLimiterSettingsForm() {
    var currentPhaseInfo = document.getElementById('currentLimiterPhaseSelection');
    var currentPhase = currentPhaseInfo.value;
    var originalPhase = currentPhaseInfo.getAttribute('data-original-value');
    var chargingStatus = currentPhaseInfo.getAttribute('data-charging-status');

    if ((chargingStatus === 'Charging' || chargingStatus === 'SuspendedEV' ) && originalPhase != currentPhase) {
        if (isJQueryAndUIReady()) {
            try {
                $("#chargingStatusAlertMessage").dialog({
                    width: 580,
                    height: 300,
                    modal: true,
                    closeOnEscape: false,
                    dialogClass: "dialog-no-close",
                    buttons: [{
                        text: cancel_button,
                        class: "okButton",
                        click: function () {
                            $(this).dialog("close");
                            select.value = originalPhase;
                        }
                    }]
                });
            } catch (error) {
                console.log("Error creating dialog:", error);
            }
        }
    } else {
        showingAnimationContainer("button_current_limiter_settings");
    }
}


function checkPowerOptimizerForm() {
    var powerOptimizer = document.getElementById("powerOptimizerSelection");
    var followTheSun = document.getElementById("followTheSunSelection");
    if ((loadManagementValue == "Enabled") && (followTheSun.value != 0 || powerOptimizer.value != 0)) {
        powerOptimizerTotalCurrentSelection();
    } else if(loadManagementValue == "Modbus" && powerOptimizer.value != 0){
        powerOptimizerTotalCurrentSelection();
    } else {
        showingOffPeakChargingOperationModeAlert();
    }
}

function loadManagementOptionFunction() {
    loadManagementSelectionPart = document.getElementById('loadManagementSelection');
    CPRolePart = document.getElementById('CPRolePart');
    loadManagementGroupPart = document.getElementById('loadManagementGroupButton');
    DLMSettingsPart = document.getElementById('DLMSettingsPart');
    failSafeCurrentPart = document.getElementById("failSafeCurrentItem");
    failsafeCurrentItem = document.getElementById('failsafeCurrentItem');
    statusItem = document.getElementById('statusItem');
    firmwareVersionItem = document.getElementById('firmwareVersionItem');
    pairedEnergyManagerItem = document.getElementById('pairedEnergyManagerItem');
    unpairedEnergyManagerItem = document.getElementById('unpairedEnergyManagerItem');
    eebusDiscovery = document.getElementById('eebusDiscovery');
    pairingEnergyManagerItem = document.getElementById('pairingEnergyManagerItem');
    refreshButton = document.getElementById('refreshButton');
    load_management_button = document.getElementById('load_management_button');
    DLMInterfacePart = document.getElementById('DLMInterfacePart');
    clusterMaxCurrentPart = document.getElementById('clusterMaxCurrentPart');
    clusterFailSafeModePart = document.getElementById('clusterFailSafeModePart');
    clusterFailSafeCurrentPart = document.getElementById('clusterFailSafeCurrentPart');

    if (loadManagementSelectionPart.value == "Enabled") {
        CPRolePart.style.visibility = "visible";
        loadManagementGroupPart.style.visibility = "visible";
        DLMSettingsPart.style.visibility = "visible";
        load_management_button.style.visibility = "visible";
        failSafeCurrentPart.style.display = "none";
        DLMInterfacePart.style.visibility = "visible";
        clusterMaxCurrentPart.style.visibility = "visible";
        clusterFailSafeModePart.style.visibility = "visible";
    } else if (loadManagementSelectionPart.value == "Modbus") {
        CPRolePart.style.visibility = "hidden";
        loadManagementGroupPart.style.visibility = "hidden";
        DLMSettingsPart.style.visibility = "hidden";
        load_management_button.style.visibility = "hidden";
        failSafeCurrentPart.style.display = "";
        DLMInterfacePart.style.visibility = "hidden";
        clusterMaxCurrentPart.style.visibility = "hidden";
        clusterFailSafeModePart.style.visibility = "hidden";
    }
    else {
        CPRolePart.style.visibility = "hidden";
        loadManagementGroupPart.style.visibility = "hidden";
        DLMSettingsPart.style.visibility = "hidden";
        load_management_button.style.visibility = "hidden";
        failSafeCurrentPart.style.display = "none";
        DLMInterfacePart.style.display = "none";
        DLMInterfacePart.style.visibility = "hidden";
        clusterMaxCurrentPart.style.visibility = "hidden";
        clusterFailSafeModePart.style.visibility = "hidden";
    }
    if (loadManagementSelectionPart.value == "Eebus") {
        failsafeCurrentItem.style.display = "block";
        statusItem.style.display = "block";
        firmwareVersionItem.style.display = "block";
        pairedEnergyManagerItem.style.display = "block";
        unpairedEnergyManagerItem.style.display = "block";
        eebusDiscovery.style.display = "block";
        pairingEnergyManagerItem.style.display = "block";
        refreshButton.style.display = "block";
        load_management_button.style.visibility = "visible";
    } else {
        failsafeCurrentItem.style.display = "none";
        statusItem.style.display = "none";
        firmwareVersionItem.style.display = "none";
        pairedEnergyManagerItem.style.display = "none";
        unpairedEnergyManagerItem.style.display = "none";
        eebusDiscovery.style.display = "none";
        pairingEnergyManagerItem.style.display = "none";
        refreshButton.style.display = "none";
        load_management_button.style.visibility = "visible";
        DLMInterfacePart.style.display = "block";
        clusterMaxCurrentPart.style.visibility = "`block";
        clusterFailSafeModePart.style.visibility = "block";
    }
}

function showingCellularGatewayAlert() {
    if (ethernet_ip_settings == "DHCPServer" && cellular_gateway == "true") {
        if(isJQueryAndUIReady()){
            $("#networkInterfaceAlertMessageCellularGateway").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [
                    {
                        text: cancel_button,
                        class: "okButton",
                        click: function () {
                            document.getElementById("ethernetIpSetting").selectedIndex = "2";
                            DHCPServerInfo.style.display = "";
                            ethernetInfo.style.display = "";
                            IPadressErr.innerHTML = "";
                            networkMaskErr.innerHTML = "";
                            defaultGatewayErr.innerHTML = "";
                            primaryDnsErr.innerHTML = "";
                            maxDHCPAddrRange.innerHTML = "";
                            maxDHCPAddrRangeErr.innerHTML = "";
                            minDHCPAddrRange.innerHTML = "";
                            minDHCPAddrRangeErr.innerHTML = "";
                            somethingChanged = false;
                            $(this).dialog("close");
                        }
                    },
                    {
                        text: confirm_button,
                        class: "saveButton",
                        style: "margin-left:12px;",
                        click: function () {
                            document.getElementById("cellularDisable").selected = true;
                            $(this).dialog("close");
                        }
                    },
                ],
                close: function () {

                }
            });
        }

    }

}
function isInt(value) {
    return !isNaN(value) &&
        parseInt(Number(value)) == value &&
        !isNaN(parseInt(value, 10));
}

function checkGeneralQRCodeForm() {
    var qrCodeCheck = checkQRCodeDelimiterField();
    if (qrCodeCheck == 0) {
        showingAnimationContainer("button_general_qrCode");
    }
}


function operationModeFunction() {
    var languageSelection = document.getElementById("lang");
    var languageSelectionValue = languageSelection.options[languageSelection.selectedIndex].value;
    var operationMode = document.getElementById("operationModeSelection");
    var powerOptimizerTotalCurrent = document.getElementById("powerOptimizerTotalCurrentPart");
    var powerOptimizerExternalMeter = document.getElementById("powerOptimizerExternalMeterPart");
    var powerOptimizer = document.getElementById("powerOptimizerSelection");
    var powerOptimizerPart = document.getElementById("powerOptimizerPart");
    var powerOptimizerExternalMeterSelection = document.getElementById("powerOptimizerExternalMeterSelection");
    var followTheSun = document.getElementById("followTheSunSelection");
    var followTheSunMode = document.getElementById("followTheSunModeSelection");
    var followTheSunModePart = document.getElementById("followTheSunModePart");
    var followTheSunSelectionPart = document.getElementById("followTheSunSelectionPart");
    var autoPhaseSwitchingPart = document.getElementById("autoPhaseSwitchingPart");
    var autoPhaseSwitchingSelection = document.getElementById("autoPhaseSwitchingSelection");
    var currentLimiterPhase = document.getElementById("currentLimiterPhaseSelection");
    var loadManagementSelectionPart = document.getElementById("loadManagementSelection");
    var selectedOption = operationMode.options[operationMode.selectedIndex];

    if (currentLimiterPhase.value == 0) {
        autoPhaseSwitchingSelection.disabled = true;
    } else {
        autoPhaseSwitchingSelection.disabled = false;
    }

    if (loadManagementSelectionPart.value === "Modbus") {
        autoPhaseSwitchingSelection.disabled = true;
    }

    for (var i = 0; i < powerOptimizerExternalMeterSelection.options.length; i++) {
        powerOptimizerExternalMeterSelection.options[i].style.display = "";
    }

    if (selectedOption.value == 4){
        operationMode.style.fontSize = '13px';
        operationMode.options[0].style.fontSize = '16px';
        operationMode.options[1].style.fontSize = '16px';
        operationMode.options[2].style.fontSize = '16px';
    }
    else {
        operationMode.style.fontSize = '16px';
    }

    if (followTheSun.value == 0 || followTheSunDisplay == "none") {
        followTheSunModePart.style.display = "none";
        autoPhaseSwitchingPart.style.display = "none";
    }
    else {
        followTheSunModePart.style.display = "";
        autoPhaseSwitchingPart.style.display = "";
    }
    followTheSunSelectionPart.style.display = followTheSunDisplay;

    if (operationMode.value == 3 || operationMode.value == 4) {
        powerOptimizerTotalCurrent.style.display = "none";
        powerOptimizerExternalMeter.style.visibility = "hidden";
        powerOptimizerPart.style.visibility = "hidden";
    }
    else {
        powerOptimizerPart.style.visibility = "visible";
        if(powerOptimizer.value == 1) {
            powerOptimizerTotalCurrent.style.display = "";
        } else {
            powerOptimizerTotalCurrent.style.display = "none";
        }
        externalMeterVisibility = "";
        if (followTheSun.value == 0 && powerOptimizer.value == 0) {
            externalMeterVisibility = "hidden";
        } else if (followTheSun.value == 1) {
            if (followTheSunMode.value != 3) {
                externalMeterVisibility = "visible";
                if (currentLimiterPhase.value == 0) {
                    powerOptimizerExternalMeterSelection.selectedIndex = 3;
                    for (var i = 0; i < powerOptimizerExternalMeterSelection.options.length; i++) {
                        if (powerOptimizerExternalMeterSelection.options[i].value != 3) {
                            powerOptimizerExternalMeterSelection.options[i].style.display = "none";
                        }
                    }
                } else {
                    powerOptimizerExternalMeterSelection.options[3].style.display = "none";
                }
            } else {
                if (powerOptimizer.value == 0) {
                    externalMeterVisibility = "hidden";
                }
            }
        } else {
            if (powerOptimizer.value == 0) {
                externalMeterVisibility = "hidden";
            } else {
                externalMeterVisibility = "visible";
            }
        }
        if (externalMeterVisibility == "hidden") {
            powerOptimizerExternalMeter.style.visibility = "hidden";
        } else {
            powerOptimizerExternalMeter.style.visibility = "visible";
            powerOptimizerPart.style.visibility = "visible";
            if (languageSelectionValue == "de" || languageSelectionValue == "fr"
                || languageSelectionValue == "hu" || languageSelectionValue == "nl"
                || languageSelectionValue == "pl") {
                powerOptimizerExternalMeterSelection.style.fontSize = 0.7 + "vw";

            }
            else if (languageSelectionValue == "es" || languageSelectionValue == "it") {
                powerOptimizerExternalMeterSelection.style.fontSize = 0.575 + "vw";
            }
            else {
                powerOptimizerExternalMeterSelection.style.fontSize = 0.8 + "vw";
            }
            powerOptimizerExternalMeterFunction();
        }
    }
}

function checkStandByLedBehaviourForm() {
    showingAnimationContainer("button_standby_led_behaviour");
}

function checkLoadSheddingMinimumCurrentForm() {
    showingAnimationContainer("button_load_shedding_minimum_current");
}

function checkUnbalancedLoadDetectionMaxCurrentForm() {
    showingAnimationContainer("button_unbalanced_load_detection_max_current");
}

function unbalancedLoadDetectionFunction() {
    var unbalancedLoadDetection = document.getElementById("unbalancedLoadDetectionSelection");
    var unbalancedLoadDetectionCurrent = document.getElementById("unbalancedLoadDetectionCurrentPart");
    if (unbalancedLoadDetection.value == 0) {
        unbalancedLoadDetectionCurrent.style.visibility = "hidden";
    }
    else {
        unbalancedLoadDetectionCurrent.style.visibility = "visible";
    }
}
function changeLanguageClass() {
    var languageSelection = document.getElementById("lang");
    var languageSelectionValue = languageSelection.options[languageSelection.selectedIndex].value;
    var logoutPosition = document.getElementById("logoutLocation");
    var logoutText = document.getElementById("logoutText");
    document.documentElement.lang = languageSelectionValue;

    if (languageSelectionValue == "fi") {
        document.getElementById('backup_file_button').className = "log_button_suomi";

    } else if (languageSelectionValue == "gr") {
        logoutPosition.classList.add("greekLogoutPosition");
        logoutText.classList.add("greeklogoutText");
    }
    else {
        if (document.getElementById("password_authorization_button_div")) {
            var password_reset_authorization_button = document.getElementById("password_reset_authorization_button");
            if (languageSelectionValue == "hu" || languageSelectionValue == "nl" || languageSelectionValue == "fr"
                || languageSelectionValue == "es") {
                password_reset_authorization_button.style.fontSize = "1vw";
            }
            else if (languageSelectionValue == "tr") {
                document.getElementById("password_authorization_button_div").lang = "tr";
            }
        }
        document.getElementById('backup_file_button').className = "log_button";
        logoutPosition.classList.remove("greekLogoutPosition");
        logoutText.classList.remove("greeklogoutText");
    }
}
function changeLanguageForIpSetting(value, selectionBox) {
    var languageSelection = document.getElementById("lang");
    var languageSelectionValue = languageSelection.options[languageSelection.selectedIndex].value;
    if ((languageSelectionValue == "de" || languageSelectionValue == "es") && value == 0) {
        selectionBox.style.fontSize = 0.5 + "vw";
    }
    else if ((languageSelectionValue == "cz" || languageSelectionValue == "fr" || languageSelectionValue == "it"
        || languageSelectionValue == "sk" || languageSelectionValue == "sv" || languageSelectionValue == "tr" || languageSelectionValue == "nl")
        && value == 0) {
        selectionBox.style.fontSize = 0.6 + "vw";
    }
    else {
        selectionBox.style.fontSize = 0.8 + "vw";
    }
}
function changeLanguageForQRDelimiterErrorText(errorTextBox) {
    var languageSelection = document.getElementById("lang");
    var languageSelectionValue = languageSelection.options[languageSelection.selectedIndex].value;
    if (languageSelectionValue == "da") {
        errorTextBox.style.fontSize = 0.85 + "vw";
    }
    else if (languageSelectionValue == "de" || languageSelectionValue == "no" || languageSelectionValue == "cz") {
        errorTextBox.style.fontSize = 0.83 + "vw";
    }
    else if (languageSelectionValue == "tr" || languageSelectionValue == "me" || languageSelectionValue == "hr") {
        errorTextBox.style.fontSize = 0.8 + "vw";
    }
    else if (languageSelectionValue == "fi") {
        errorTextBox.style.fontSize = 0.79 + "vw";
    }
    else if (languageSelectionValue == "sk" || languageSelectionValue == "ba") {
        errorTextBox.style.fontSize = 0.72 + "vw";
    }
    else if (languageSelectionValue == "nl") {
        errorTextBox.style.fontSize = 0.75 + "vw";
    }
    else if (languageSelectionValue == "hu" || languageSelectionValue == "rs") {
        errorTextBox.style.fontSize = 0.67 + "vw";
    }
    else if (languageSelectionValue == "fr" || languageSelectionValue == "pl") {
        errorTextBox.style.fontSize = 0.65 + "vw";
    }
    else if (languageSelectionValue == "ro" || languageSelectionValue == "bg") {
        errorTextBox.style.fontSize = 0.6 + "vw";
    }
    else if (languageSelectionValue == "gr" || languageSelectionValue == "es") {
        errorTextBox.style.fontSize = 0.59 + "vw";
    }
    else if (languageSelectionValue == "it") {
        errorTextBox.style.fontSize = 0.58 + "vw";
    }
    else {
        errorTextBox.style.fontSize = 0.9 + "vw";
    }
}
function checkScheduledCharging() {
    var randomisedDelayMaximumDuration = document.getElementById('textRandomisedDelayMaximumDuration');
    var randomisedDelayMaximumDurationError = document.getElementById('randomisedDelayMaximumDurationErr');
    var ocppEnability = document.getElementById("selectOCPPConnection");
    var secondTimeIntervalEnablePart = document.getElementById("offPeakChargingSecondTimeInterval");
    errorCheck = 0;

    if (ocppEnability.value == 1 && UKSmartCharging.value.toUpperCase() == "FALSE") {
        errorCheck += 2;
        var offPeakChargingSelection = document.getElementById("offPeakChargingSelection");
        if (offPeakChargingSelection.value == 1) {
            var offPeakChargingPeriodsStart = document.getElementById("textOffPeakChargingPeriodsStart");
            var offPeakChargingPeriodsEnd = document.getElementById("textOffPeakChargingPeriodsEnd");
            var offPeakChargingPeriodsError = document.getElementById("offPeakChargingPeriodsErr");

            var offPeakChargingPeriodsOptionalStart = document.getElementById("textOffPeakChargingPeriodsOptionalStart");
            var offPeakChargingPeriodsOptionalEnd = document.getElementById("textOffPeakChargingPeriodsOptionalEnd");
            var offPeakChargingPeriodsOptionalError = document.getElementById("offPeakChargingPeriodsOptionalErr");



            if (offPeakChargingPeriodsStart.value == "" && offPeakChargingPeriodsEnd.value == "") {
                offPeakChargingPeriodsError.innerHTML = off_peak_charging_periods_error;
                offPeakChargingPeriodsEnd.className = "focusedTextareaForLocalLoadGroup";
                offPeakChargingPeriodsStart.className = "focusedTextareaForLocalLoadGroup";
            } else if (offPeakChargingPeriodsStart.value == "" && offPeakChargingPeriodsEnd.value != "") {
                offPeakChargingPeriodsError.innerHTML = off_peak_charging_periods_error;
                offPeakChargingPeriodsEnd.className = "textareaForLocalLoadGroup";
                offPeakChargingPeriodsStart.className = "focusedTextareaForLocalLoadGroup";

            } else if (offPeakChargingPeriodsStart.value != "" && offPeakChargingPeriodsEnd.value == "") {
                offPeakChargingPeriodsError.innerHTML = off_peak_charging_periods_error;
                offPeakChargingPeriodsEnd.className = "focusedTextareaForLocalLoadGroup";
                offPeakChargingPeriodsStart.className = "textareaForLocalLoadGroup";

            } else if ((offPeakChargingPeriodsStart.value != "" && offPeakChargingPeriodsEnd.value != "") && (offPeakChargingPeriodsStart.value == offPeakChargingPeriodsEnd.value)) {
                offPeakChargingPeriodsError.innerHTML = off_peak_charging_periods_same_time_error;
                offPeakChargingPeriodsEnd.className = "focusedTextareaForLocalLoadGroup";
                offPeakChargingPeriodsStart.className = "focusedTextareaForLocalLoadGroup";

            } else {
                offPeakChargingPeriodsError.innerHTML = "";
                offPeakChargingPeriodsStart.className = "textareaForLocalLoadGroup";
                offPeakChargingPeriodsError.innerHTML = "";
                offPeakChargingPeriodsEnd.className = "textareaForLocalLoadGroup";
                errorCheck--;
            }
            if (secondTimeIntervalEnablePart.value == 1) {
                if (offPeakChargingPeriodsOptionalStart.value == "" && offPeakChargingPeriodsOptionalEnd.value == "") {
                    offPeakChargingPeriodsOptionalError.innerHTML = off_peak_charging_periods_error;
                    offPeakChargingPeriodsOptionalEnd.className = "focusedTextareaForLocalLoadGroup";
                    offPeakChargingPeriodsOptionalStart.className = "focusedTextareaForLocalLoadGroup";
                } else if (offPeakChargingPeriodsOptionalStart.value == "" && offPeakChargingPeriodsOptionalEnd.value != "") {
                    offPeakChargingPeriodsOptionalError.innerHTML = off_peak_charging_periods_error;
                    offPeakChargingPeriodsOptionalEnd.className = "textareaForLocalLoadGroup";
                    offPeakChargingPeriodsOptionalStart.className = "focusedTextareaForLocalLoadGroup";

                } else if (offPeakChargingPeriodsOptionalStart.value != "" && offPeakChargingPeriodsOptionalEnd.value == "") {
                    offPeakChargingPeriodsOptionalError.innerHTML = off_peak_charging_periods_error;
                    offPeakChargingPeriodsOptionalEnd.className = "focusedTextareaForLocalLoadGroup";
                    offPeakChargingPeriodsOptionalStart.className = "textareaForLocalLoadGroup";

                } else if ((offPeakChargingPeriodsOptionalStart.value != "" && offPeakChargingPeriodsOptionalEnd.value != "") && (offPeakChargingPeriodsOptionalStart.value == offPeakChargingPeriodsOptionalEnd.value)) {
                    offPeakChargingPeriodsOptionalError.innerHTML = off_peak_charging_periods_same_time_error;
                    offPeakChargingPeriodsOptionalEnd.className = "focusedTextareaForLocalLoadGroup";
                    offPeakChargingPeriodsOptionalStart.className = "focusedTextareaForLocalLoadGroup";

                } else {
                    offPeakChargingPeriodsOptionalError.innerHTML = "";
                    offPeakChargingPeriodsOptionalStart.className = "textareaForLocalLoadGroup";
                    offPeakChargingPeriodsOptionalEnd.className = "textareaForLocalLoadGroup";
                    errorCheck--;
                }
            } else {
                offPeakChargingPeriodsOptionalError.innerHTML = "";
                offPeakChargingPeriodsOptionalStart.className = "textareaForLocalLoadGroup";
                offPeakChargingPeriodsOptionalEnd.className = "textareaForLocalLoadGroup";
                errorCheck -= 1;
            }
        } else {
            errorCheck -= 2;
        }
    }
    if ((deviceModelCode === "") || (deviceModelCode !== "" && current_user_type.localeCompare("user") != 0)) {
        errorCheck += 1;
        if (randomisedDelayMaximumDuration.value == "") {
            randomisedDelayMaximumDurationError.innerHTML = randomised_delay_maximum_duration_required;
            randomisedDelayMaximumDuration.className = "focusedTextareaForLocalLoadGroup";
            randomisedDelayMaximumDuration.style.fontSize = "18px";
        } else if (isNaN(randomisedDelayMaximumDuration.value) || !isInt(randomisedDelayMaximumDuration.value)) {
            randomisedDelayMaximumDurationError.innerHTML = randomised_delay_maximum_duration_numeric;
            randomisedDelayMaximumDuration.className = "focusedTextareaForLocalLoadGroup";
            randomisedDelayMaximumDuration.style.fontSize = "18px";
        } else if (randomisedDelayMaximumDuration.value < 0) {
            randomisedDelayMaximumDurationError.innerHTML = randomised_delay_maximum_duration_limit;
            randomisedDelayMaximumDuration.className = "focusedTextareaForLocalLoadGroup";
            randomisedDelayMaximumDuration.style.fontSize = "18px";
        } else if (randomisedDelayMaximumDuration.value > 1800) {
            randomisedDelayMaximumDurationError.innerHTML = randomised_delay_maximum_duration_limit;
            randomisedDelayMaximumDuration.className = "focusedTextareaForLocalLoadGroup";
            randomisedDelayMaximumDuration.style.fontSize = "18px";
        } else {
            randomisedDelayMaximumDurationError.innerHTML = "";
            randomisedDelayMaximumDuration.className = "textareaForLocalLoadGroup";

            errorCheck--;
        }
    }
    if (errorCheck != 0) return false;
    showingAnimationContainer("button_scheduled_charging");
    return true;

}

function scheduledChargingFunction() {
    var scheduledChargingOcppEnablePart = document.getElementById("scheduledChargingOcppEnablePart");
    var ocppEnability = document.getElementById("selectOCPPConnection");
    var randomisedDelayMaximumDuration = document.getElementById("textRandomisedDelayMaximumDuration");
    var randomisedDelayMaximumDurationErr = document.getElementById("randomisedDelayMaximumDurationErr");
    var secondTimeIntervalEnablePart = document.getElementById("offPeakChargingSecondTimeInterval");
    var offPeakChargingPeriodsOptionalStart = document.getElementById("textOffPeakChargingPeriodsOptionalStart");
    var offPeakChargingPeriodsOptionalEnd = document.getElementById("textOffPeakChargingPeriodsOptionalEnd");

    var textOffPeakChargingPeriodsStart = document.getElementById("textOffPeakChargingPeriodsStart");
    var textOffPeakChargingPeriodsEnd = document.getElementById("textOffPeakChargingPeriodsEnd");
    var offPeakChargingPeriodsErr = document.getElementById("offPeakChargingPeriodsErr");
    var continueChargingWithoutReAuthenticationSelection = document.getElementById("continueChargingWithoutReAuthenticationSelection");

    textOffPeakChargingPeriodsStart.className = "textareaForLocalLoadGroup";
    textOffPeakChargingPeriodsEnd.className = "textareaForLocalLoadGroup";
    offPeakChargingPeriodsErr.innerHTML = "";
    randomisedDelayMaximumDuration.className = "textareaForLocalLoadGroup";
    randomisedDelayMaximumDurationErr.innerHTML = "";

    if (offPeakChargingPeriodsOptionalStart.value == "" && offPeakChargingPeriodsOptionalEnd.value == "") {
        secondTimeIntervalEnablePart.selectedIndex = 0;
    } else if (offPeakChargingPeriodsOptionalStart.value != "" && offPeakChargingPeriodsOptionalEnd.value != "") {
        secondTimeIntervalEnablePart.selectedIndex = 1;
    }
    if (ocppEnability.value == 1 && UKSmartCharging.value.toUpperCase() == "FALSE") {
        scheduledChargingOcppEnablePart.style.display = "";
        offPeakChargingEnability();
    }
    else {
        scheduledChargingOcppEnablePart.style.display = "none";
    }
    // if model code is eon, off peak charging items become readonly
    //(timezone and randomised delay maximum are readonly when account type is user.)
    if (current_user_type.localeCompare("user") == 0 && deviceModelCode) {
        randomisedDelayMaximumDuration.disabled = true;
    }
    else {
        randomisedDelayMaximumDuration.disabled = false;
    }
    if (meterType !== "" && meterType.localeCompare("EichrechtBauer") == 0 && private_charging == 1) {
        continueChargingWithoutReAuthenticationSelection.disabled = true;
    } else {
        continueChargingWithoutReAuthenticationSelection.disabled = false;
    }


}

function offPeakChargingEnability() {
    var offPeakChargingSelection = document.getElementById("offPeakChargingSelection");
    var offPeakChargingWeekend = document.getElementById("offPeakChargingWeekendSelection");
    var offPeakChargingPeriodsStart = document.getElementById("textOffPeakChargingPeriodsStart");
    var offPeakChargingPeriodsEnd = document.getElementById("textOffPeakChargingPeriodsEnd");
    var offPeakChargingPeriodsOptionalStart = document.getElementById("textOffPeakChargingPeriodsOptionalStart");
    var offPeakChargingPeriodsOptionalEnd = document.getElementById("textOffPeakChargingPeriodsOptionalEnd");
    var continueChargingEndOfSelection = document.getElementById("continueChargingEndOfSelection");
    var offPeakTimeZoneSelection = document.getElementById("offPeakTimeZoneSelection");
    var secondTimeIntervalEnablePart = document.getElementById("offPeakChargingSecondTimeInterval");
    var marginOfsecondTimePeriodError = document.getElementById("scheduledChargingDiv14");
    var offPeakChargingPeriodsOptionalError = document.getElementById("offPeakChargingPeriodsOptionalError");
    var randomisedDelayAtOffPeakEndSelection = document.getElementById("randomisedDelayAtOffPeakEndSelection");


    if (offPeakChargingSelection.value == 1) {
        offPeakChargingWeekend.disabled = false;
        offPeakChargingPeriodsStart.disabled = false;
        offPeakChargingPeriodsEnd.disabled = false;
        continueChargingEndOfSelection.disabled = false;
        secondTimeIntervalEnablePart.disabled = false;
        randomisedDelayAtOffPeakEndSelection.disabled = false;
        if (secondTimeIntervalEnablePart.value == 0) {
            offPeakChargingPeriodsOptionalStart.disabled = true;
            offPeakChargingPeriodsOptionalEnd.disabled = true;
            marginOfsecondTimePeriodError.style.marginRight = "4.5%";
            offPeakChargingPeriodsOptionalError.style.display = "none";

        } else {
            offPeakChargingPeriodsOptionalStart.disabled = false;
            offPeakChargingPeriodsOptionalEnd.disabled = false;
            marginOfsecondTimePeriodError.style.marginRight = "0%";
            offPeakChargingPeriodsOptionalError.style.display = "inline-block";

        }
        if (current_user_type.localeCompare("user") != 0) {
            offPeakTimeZoneSelection.disabled = false;
        } else {
            if (deviceModelCode) {
                offPeakTimeZoneSelection.disabled = true;
            } else {
                offPeakTimeZoneSelection.disabled = false;
            }
        }
    }
    else {
        offPeakChargingWeekend.disabled = true;
        offPeakChargingPeriodsStart.disabled = true;
        offPeakChargingPeriodsEnd.disabled = true;
        offPeakChargingPeriodsOptionalStart.disabled = true;
        offPeakChargingPeriodsOptionalEnd.disabled = true;
        continueChargingEndOfSelection.disabled = true;
        secondTimeIntervalEnablePart.disabled = true;
        offPeakTimeZoneSelection.disabled = true;
        randomisedDelayAtOffPeakEndSelection.disabled = true;
    }
}

function secondTimeEnability() {
    var offPeakChargingPeriodsOptionalStart = document.getElementById("textOffPeakChargingPeriodsOptionalStart");
    var offPeakChargingPeriodsOptionalEnd = document.getElementById("textOffPeakChargingPeriodsOptionalEnd");
    var secondTimeIntervalEnablePart = document.getElementById("offPeakChargingSecondTimeInterval");
    var offPeakChargingPeriodsOptionalError = document.getElementById("offPeakChargingPeriodsOptionalErr");
    var marginOfsecondTimePeriodError = document.getElementById("scheduledChargingDiv14");
    var offPeakChargingSecondPeriodsOptionalError = document.getElementById("offPeakChargingPeriodsOptionalError");
    offPeakChargingPeriodsOptionalStart.className = "textareaForLocalLoadGroup";
    offPeakChargingPeriodsOptionalEnd.className = "textareaForLocalLoadGroup";
    offPeakChargingPeriodsOptionalError.innerHTML = "";
    offPeakChargingSecondPeriodsOptionalError.innerHTML = "";

    if (secondTimeIntervalEnablePart.value == 0) {
        offPeakChargingPeriodsOptionalStart.disabled = true;
        offPeakChargingPeriodsOptionalEnd.disabled = true;
        offPeakChargingPeriodsOptionalStart.value = "";
        offPeakChargingPeriodsOptionalEnd.value = "";
        offPeakChargingPeriodsOptionalError.innerHTML = "";
        offPeakChargingPeriodsOptionalStart.className = "textareaForLocalLoadGroup";
        offPeakChargingPeriodsOptionalEnd.className = "textareaForLocalLoadGroup";
        marginOfsecondTimePeriodError.style.marginRight = "4.5%";
        offPeakChargingSecondPeriodsOptionalError.style.display = "none";

    } else {
        offPeakChargingPeriodsOptionalStart.disabled = false;
        offPeakChargingPeriodsOptionalEnd.disabled = false;
        marginOfsecondTimePeriodError.style.marginRight = "0%";
        offPeakChargingSecondPeriodsOptionalError.style.display = "inline-block";
    }
}

function showingOffPeakChargingOcppAlert() {
    var ocppEnability = document.getElementById("selectOCPPConnection");
    var offPeakChargingSelection = document.getElementById("offPeakChargingSelection");
    var operationModeSelection = document.getElementById("operationModeSelection");
    if (ocppEnability.value == 2) {
        if (offPeakChargingSelection.value == 1) {
            if(isJQueryAndUIReady()){
                $("#offPeakChargingAlertMessage").dialog({
                    width: 580,
                    height: 300,
                    modal: true,
                    closeOnEscape: false,
                    dialogClass: "dialog-no-close",
                    buttons: [
                        {
                            text: cancel_button,
                            class: "okButton",
                            click: function () {
                                $(this).dialog("close");
                            }
                        },
                        {
                            text: confirm_button,
                            class: "saveButton",
                            style: "margin-left:12px;",
                            click: function () {
                                showingAnimationContainer("button_ocpp");
                                $(this).dialog("close");
                            }
                        },
                    ],
                    close: function () {

                    }
                });
            }
        } else {
            showingAnimationContainer("button_ocpp");
        }
    } else {
        showingAnimationContainer("button_ocpp");
    }
}
function showingOffPeakChargingOperationModeAlert() {
    var ocppEnability = document.getElementById("selectOCPPConnection");
    var offPeakChargingSelection = document.getElementById("offPeakChargingSelection");
    var operationModeSelection = document.getElementById("operationModeSelection");
    if (ocppEnability.value == 1) {
        if (offPeakChargingSelection.value == 1 && (operationModeSelection.value == 2 || operationModeSelection.value == 3 || operationModeSelection.value == 4)) {
            if(isJQueryAndUIReady()){
                $("#offPeakChargingAlertMessage").dialog({
                    width: 580,
                    height: 300,
                    modal: true,
                    closeOnEscape: false,
                    dialogClass: "dialog-no-close",
                    buttons: [
                        {
                            text: cancel_button,
                            class: "okButton",
                            click: function () {
                                $(this).dialog("close");
                            }
                        },
                        {
                            text: confirm_button,
                            class: "saveButton",
                            style: "margin-left:12px;",
                            click: function () {
                                showingAnimationContainer("button_power_optimizer");
                                $(this).dialog("close");
                            }
                        },
                    ],
                    close: function () {
                    }
                });
            }
        } else {
            showingAnimationContainer("button_power_optimizer");
        }
    } else {
        showingAnimationContainer("button_power_optimizer");
    }
}

function getDefaultParameters(barName) {
    barNameForEnterPress = barName;
    if (barName == "LanguageSettings") {
        elementDict["languageSelection"] = document.getElementById("languageSelection").value;
    }
    else if (barName == "DisplayBacklightSettings") {
        elementDict["backLightLevelSelection"] = document.getElementById("backLightLevelSelection").value;
        elementDict["sunriseTimeSelection"] = document.getElementById("sunriseTimeSelection").value;
        elementDict["sunsetTimeSelection"] = document.getElementById("sunsetTimeSelection").value;
    }
    else if (barName == "LedDimmingSettings") {
        elementDict["ledDimmingLevelSelection"] = document.getElementById("ledDimmingLevelSelection").value;
        elementDict["ledDimmingSunriseTimeSelection"] = document.getElementById("ledDimmingSunriseTimeSelection").value;
        elementDict["ledDimmingSunsetTimeSelection"] = document.getElementById("ledDimmingSunsetTimeSelection").value;
    }
    else if (barName == "StandbyLedBehaviour") {
        elementDict["standByLedBehaviourSelection"] = document.getElementById("standByLedBehaviourSelection").value;
    }
    else if (barName == "ThemeSettings") {
        elementDict["themeSelection"] = document.getElementById("themeSelection").value;
    }
    else if (barName == "ServiceContactSettings") {
        elementDict["serviceContactInfo"] = document.getElementById("serviceContactInfo").value;
    }
    else if (barName == "QRCodeSettings") {
        elementDict["qrCodeSelection"] = document.getElementById("qrCodeSelection").value;
    }
    else if (barName == "EarthingSystem") {
        elementDict["earthingSystemSelection"] = document.getElementById("earthingSystemSelection").value;
    }
    else if (barName == "EarthingSystem") {
        elementDict["earthingSystemSelection"] = document.getElementById("earthingSystemSelection").value;
    }
    else if (barName == "CurrrentLimitterSettings") {
        elementDict["currentLimiterPhaseSelection"] = document.getElementById("currentLimiterPhaseSelection").value;
        elementDict["currentLimiterValue"] = document.getElementById("currentLimiterValue").value;
    }
    else if (barName == "UnbalancedLoadDetection") {
        elementDict["unbalancedLoadDetectionSelection"] = document.getElementById("unbalancedLoadDetectionSelection").value;
        elementDict["unbalancedLoadDetectionMaxCurrentSelection"] = document.getElementById("unbalancedLoadDetectionMaxCurrentSelection").value;
    }
    else if (barName == "ExternalEnableInput") {
        elementDict["externalEnableInputSelection"] = document.getElementById("externalEnableInputSelection").value;
    }
    else if (barName == "LockableCable") {
        elementDict["lockableCableSelection"] = document.getElementById("lockableCableSelection").value;
    }
    else if (barName == "LockableCable") {
        elementDict["lockableCableSelection"] = document.getElementById("lockableCableSelection").value;
    }
    else if (barName == "PowerOptimizerCurrentLimit") {
        elementDict["operationModeSelection"] = document.getElementById("operationModeSelection").value;
        elementDict["powerOptimizerSelection"] = document.getElementById("powerOptimizerSelection").value;
        elementDict["powerOptimizerExternalMeterSelection"] = document.getElementById("powerOptimizerExternalMeterSelection").value;
    }
    else if (barName == "ocppConnection") {
        elementDict["selectOCPPConnection"] = document.getElementById("selectOCPPConnection").value;
        elementDict["centralSystemAddress"] = document.getElementById("centralSystemAddress").value;
        elementDict["chargePointId"] = document.getElementById("chargePointId").value;
        elementDict["wssSettings"] = document.getElementById("wssSettings").value;
        elementDict["freeModeActive"] = document.getElementById("freeModeActive").value;
        elementDict["freeModeRFID"] = document.getElementById("freeModeRFID").value;
        elementDict["allowOffline"] = document.getElementById("allowOffline").value;
        elementDict["authorizationCache"] = document.getElementById("authorizationCache").value;
        elementDict["authorizationKey"] = document.getElementById("authorizationKey").value;
        elementDict["authorizeRemote"] = document.getElementById("authorizeRemote").value;
        elementDict["blinkRepeat"] = document.getElementById("blinkRepeat").value;
        elementDict["centralSmartChargingWithNoTripping"] = document.getElementById("centralSmartChargingWithNoTripping").value;
        elementDict["chargeProfileMaxStackLevel"] = document.getElementById("chargeProfileMaxStackLevel").value;
        elementDict["chargingScheduleAllowedChargingRateUnit"] = document.getElementById("chargingScheduleAllowedChargingRateUnit").value;
        elementDict["chargingScheduleMaxPeriods"] = document.getElementById("chargingScheduleMaxPeriods").value;
        elementDict["clockData"] = document.getElementById("clockData").value;
        elementDict["connectionTimeOut"] = document.getElementById("connectionTimeOut").value;
        elementDict["connectorPhase"] = document.getElementById("connectorPhase").value;
        elementDict["rotationMaxLength"] = document.getElementById("rotationMaxLength").value;
        elementDict["connectorSwitch3to1PhaseSupported"] = document.getElementById("connectorSwitch3to1PhaseSupported").value;
        elementDict["continueChargingAfterPowerLoss"] = document.getElementById("continueChargingAfterPowerLoss").value;
        elementDict["CTStationCurrentInformationInterval"] = document.getElementById("CTStationCurrentInformationInterval").value;
        elementDict["newTransactionAfterPowerLoss"] = document.getElementById("newTransactionAfterPowerLoss").value;
        elementDict["dailyReboot"] = document.getElementById("dailyReboot").value;
        elementDict["dailyRebootTimeInput"] = document.getElementById("dailyRebootTimeInput").value;
        elementDict["dailyRebootType"] = document.getElementById("dailyRebootType").value;
        elementDict["maxKeys"] = document.getElementById("maxKeys").value;
        elementDict["heartbeat"] = document.getElementById("heartbeat").value;
        elementDict["installationErrorEnable"] = document.getElementById("installationErrorEnable").value;
        elementDict["LEDTimeoutEnable"] = document.getElementById("LEDTimeoutEnable").value;
        elementDict["light"] = document.getElementById("light").value;
        elementDict["localAuthListEnabled"] = document.getElementById("localAuthListEnabled").value;
        elementDict["localAuthListMaxLength"] = document.getElementById("localAuthListMaxLength").value;
        elementDict["authorizeOffline"] = document.getElementById("authorizeOffline").value;
        elementDict["localPreAuthorize"] = document.getElementById("localPreAuthorize").value;
        elementDict["maxChargingProfilesInstalled"] = document.getElementById("maxChargingProfilesInstalled").value;
        elementDict["maxEnergy"] = document.getElementById("maxEnergy").value;
        elementDict["maxPowerChargeComplete"] = document.getElementById("maxPowerChargeComplete").value;
        elementDict["maxTimeChargeComplete"] = document.getElementById("maxTimeChargeComplete").value;
        elementDict["alignedData"] = document.getElementById("alignedData").value;
        elementDict["alignedDataMaxLength"] = document.getElementById("alignedDataMaxLength").value;
        elementDict["sampleData"] = document.getElementById("sampleData").value;
        elementDict["meterValuesSampledDataMaxLength"] = document.getElementById("meterValuesSampledDataMaxLength").value;
        elementDict["sampleInterval"] = document.getElementById("sampleInterval").value;
        elementDict["minDuration"] = document.getElementById("minDuration").value;
        elementDict["connectorNum"] = document.getElementById("connectorNum").value;
        elementDict["reserveConnectorZeroSupported"] = document.getElementById("reserveConnectorZeroSupported").value;
        elementDict["randomDelayOnDailyRebootEnabled"] = document.getElementById("randomDelayOnDailyRebootEnabled").value;
        elementDict["continueChargingAfterPenError"] = document.getElementById("continueChargingAfterPenError").value;
        elementDict["webconfigEnabled"] = document.getElementById("webconfigEnabled").value;
        elementDict["resetRetries"] = document.getElementById("resetRetries").value;
        elementDict["ocppSecurityProfile"] = document.getElementById("ocppSecurityProfile").value;
        elementDict["sendDataTransferMeterConfigurationForNonEichrecht"] = document.getElementById("sendDataTransferMeterConfigurationForNonEichrecht").value;
        elementDict["sendLocalListMaxLength"] = document.getElementById("sendLocalListMaxLength").value;
        elementDict["sendTotalPowerValue"] = document.getElementById("sendTotalPowerValue").value;
        elementDict["disconnect"] = document.getElementById("disconnect").value;
        elementDict["stopInvalidId"] = document.getElementById("stopInvalidId").value;
        elementDict["stopAligned"] = document.getElementById("stopAligned").value;
        elementDict["stopAlignedMax"] = document.getElementById("stopAlignedMax").value;
        elementDict["stopSampled"] = document.getElementById("stopSampled").value;
        elementDict["stopSampledMax"] = document.getElementById("stopSampledMax").value;
        elementDict["supported"] = document.getElementById("supported").value;
        elementDict["supportedMax"] = document.getElementById("supportedMax").value;
        elementDict["attempts"] = document.getElementById("attempts").value;
        elementDict["retryInterval"] = document.getElementById("retryInterval").value;
        elementDict["UKSmartCharging"] = document.getElementById("UKSmartCharging").value;
        elementDict["unlockConnector"] = document.getElementById("unlockConnector").value;
        elementDict["pingInterval"] = document.getElementById("pingInterval").value;
    }
    else if (barName == "CellularNetwork") {
        elementDict["selectCellular"] = document.getElementById("selectCellular").value;
        elementDict["selectLTEGateway"] = document.getElementById("selectLTEGateway").value;
        elementDict["apn"] = document.getElementById("apn").value;
        elementDict["apnUserName"] = document.getElementById("apnUserName").value;
        elementDict["apnPassword"] = document.getElementById("apnPassword").value;
        elementDict["simPin"] = document.getElementById("simPin").value;

    }
    else if (barName == "LanNetwork") {
        elementDict["ethernetIpSetting"] = document.getElementById("ethernetIpSetting").value;
        elementDict["IPadress"] = document.getElementById("IPadress").value;
        elementDict["networkMask"] = document.getElementById("networkMask").value;
        elementDict["defaultGateway"] = document.getElementById("defaultGateway").value;
        elementDict["primaryDns"] = document.getElementById("primaryDns").value;
        elementDict["secondaryDns"] = document.getElementById("secondaryDns").value;
        elementDict["minDHCPAddrRange"] = document.getElementById("minDHCPAddrRange").value;
        elementDict["maxDHCPAddrRange"] = document.getElementById("maxDHCPAddrRange").value;
    }
    else if (barName == "WlanNetwork") {
        elementDict["selectNetworkWLAN"] = document.getElementById("selectNetworkWLAN").value;
        elementDict["wifiSSID"] = document.getElementById("wifiSSID").value;
        elementDict["wifiPassword"] = document.getElementById("wifiPassword").value;
        elementDict["selectSecurity"] = document.getElementById("selectSecurity").value;
    }
    else if (barName == "WifiHotspotNetwork") {
        elementDict["selectWifiHotspot"] = document.getElementById("selectWifiHotspot").value;
        elementDict["selectWifiHotspotTimeout"] = document.getElementById("selectWifiHotspotTimeout").value;
        elementDict["wifiHotspotSSID"] = document.getElementById("wifiHotspotSSID").value;
        elementDict["wifiHotspotPassword"] = document.getElementById("wifiHotspotPassword").value;
    }
    else if (barName == "StandaloneMode") {
        elementDict["selectStandaloneMode"] = document.getElementById("selectStandaloneMode").value;
        elementDict["from"] = document.getElementById("from").value;
    }
    else if (barName == "LoadManagement") {
        elementDict["loadManagementSelection"] = document.getElementById("loadManagementSelection").value;
        elementDict["cpRoleSelection"] = document.getElementById("cpRoleSelection").value;
        elementDict["mainCircuitCurrent"] = document.getElementById("mainCircuitCurrent").value;
        //elementDict["totalCurrentLimit"] = document.getElementById("totalCurrentLimit").value;
        elementDict["supplyTypeSelection"] = document.getElementById("supplyTypeSelection").value;
        elementDict["loadManagementModeSelection"] = document.getElementById("loadManagementModeSelection").value;
        elementDict["loadManagementModeSelection"] = document.getElementById("loadManagementModeSelection").value;

    }
    else if (barName == "LoadManagementGroup") {
        elementDict["serialNumberSelection"] = document.getElementById("serialNumberSelection").value;

    } else if (barName == "ScheduledCharging") {
        elementDict["textRandomisedDelayMaximumDuration"] = document.getElementById("textRandomisedDelayMaximumDuration").value;
        elementDict["offPeakChargingSelection"] = document.getElementById("offPeakChargingSelection").value;
        elementDict["offPeakChargingWeekendSelection"] = document.getElementById("offPeakChargingWeekendSelection").value;
        elementDict["randomisedDelayAtOffPeakEndSelection"] = document.getElementById("randomisedDelayAtOffPeakEndSelection").value;
        elementDict["offPeakChargingSecondTimeInterval"] = document.getElementById("offPeakChargingSecondTimeInterval").value;
        elementDict["textOffPeakChargingPeriodsStart"] = document.getElementById("textOffPeakChargingPeriodsStart");
        elementDict["textOffPeakChargingPeriodsEnd"] = document.getElementById("textOffPeakChargingPeriodsEnd");
        elementDict["textOffPeakChargingPeriodsOptionalStart"] = document.getElementById("textOffPeakChargingPeriodsOptionalStart");
        elementDict["textOffPeakChargingPeriodsOptionalEnd"] = document.getElementById("textOffPeakChargingPeriodsOptionalEnd");
        elementDict["offPeakTimeZoneSelection"] = document.getElementById("offPeakTimeZoneSelection").value;
        elementDict["continueChargingWithoutReAuthenticationSelection"] = document.getElementById("continueChargingWithoutReAuthenticationSelection").value;
    } else if (barName == "Password") {
        elementDict["currentPassSys"] = document.getElementById("currentPassSys").value;
        elementDict["passSys"] = document.getElementById("passSys").value;
        elementDict["repassSys"] = document.getElementById("repassSys").value;

    }
    else if (barName == "LogFiles") {
        elementDict["logsStartDateSelection"] = defaultLogsStartDate;
        elementDict["logsEndDateSelection"] = defaultLogsEndDate;
    }

}

function checkPasswordResetForm() {
    showingAnimationContainer("button_password_reset_authorization");

}
function setDefaultParametersForCancel() {
    for (var k in elementDict) {
        document.getElementById(k).value = elementDict[k];
    }
    if (elementDict.hasOwnProperty("backLightLevelSelection") || elementDict.hasOwnProperty("ledDimmingLevelSelection")) {
        displayBacklightSettingsFunction();
    } else if (elementDict.hasOwnProperty("currentLimiterValue")) {
        currentLimiterSettings();
    } else if (elementDict.hasOwnProperty("unbalancedLoadDetectionSelection")) {
        unbalancedLoadDetectionFunction();
    }
    else if (elementDict.hasOwnProperty("operationModeSelection")) {
        operationModeFunction();
    }
    else if (elementDict.hasOwnProperty("ocppConnection")) {
        ocppConnection();
    }
    else if (elementDict.hasOwnProperty("selectStandaloneMode")) {
        selectMode();
    }
    else if (elementDict.hasOwnProperty("selectCellular")) {
        cellularFunction();
    }
    else if (elementDict.hasOwnProperty("ethernetIpSetting")) {
        ethernetFunction();
    }
    else if (elementDict.hasOwnProperty("selectNetworkWLAN")) {
        wifiFunction();
    }
    else if (elementDict.hasOwnProperty("selectWifiHotspot")) {
        wifiHotspotFunction();
    }
    else if (elementDict.hasOwnProperty("LoadManagement")) {
        loadManagementOptionFunction();
    }
    else if (elementDict.hasOwnProperty("LoadManagementGroup")) {
        CPRoleFunction();
    }
    else if (elementDict.hasOwnProperty("LoadManagementGroup")) {
        CPRoleFunction();
    } else if (elementDict.hasOwnProperty("textRandomisedDelayMaximumDuration")) {
        scheduledChargingFunction();
        document.getElementById("offPeakChargingSecondTimeInterval").value = elementDict["offPeakChargingSecondTimeInterval"];
        document.getElementById("textOffPeakChargingPeriodsStart").value = offPeakChargingPeriodsArbitraryStart;
        document.getElementById("textOffPeakChargingPeriodsEnd").value = offPeakChargingPeriodsArbitraryEnd;
        document.getElementById("textOffPeakChargingPeriodsOptionalStart").value = offPeakChargingPeriodsTemporarStart;
        document.getElementById("textOffPeakChargingPeriodsOptionalEnd").value = offPeakChargingPeriodsTemporaryEnd;
        secondTimeEnability();
    } else if (elementDict.hasOwnProperty("serviceContactInfo")) {
        serviceContactInfo();
    } else if (elementDict.hasOwnProperty("currentPassSys")) {
        setPassword();
    } else if (elementDict.hasOwnProperty("logsStartDateSelection") || elementDict.hasOwnProperty("logsEndDateSelection")) {
        handleMinMaxDates();
    }
}


document.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        if (barNameForEnterPress == "ServiceContactSettings") {
            checkServiceContactInfoForm();
        } else if (barNameForEnterPress == "ScheduledCharging") {
            checkScheduledCharging();
        } else if (barNameForEnterPress == "CurrrentLimitterSettings") {
            checkCurrentLimiterSettingsForm();
        } else if (barNameForEnterPress == "ocppConnection") {
            checkOcppForm();
        } else if (barNameForEnterPress == "CellularNetwork") {
            checkCellularNetworkForm();
        } else if (barNameForEnterPress == "LanNetwork") {
            checkLANNetworkForm();
        } else if (barNameForEnterPress == "WlanNetwork") {
            checkWLANNetworkForm();
        } else if (barNameForEnterPress == "WifiHotspotNetwork") {
            checkWifiHotspotForm();
        } else if (barNameForEnterPress == "StandaloneMode") {
            sendMode();
        } else if (barNameForEnterPress == "LoadManagement") {
            checkDLMSettingsForm();
        } else if (barNameForEnterPress == "Password") {
            checkPassword();
        } else if (barNameForEnterPress == "LogFiles") {
            handleMinMaxDates();
        }

    }
});


document.getElementById("loadManagementSelection").onchange = function () { loadManagementOptionSelection() };
document.getElementById("powerOptimizerSelection").onchange = function () { powerOptimizerTotalCurrentSelection() };
document.getElementById("followTheSunSelection").onchange = function () { powerOptimizerTotalCurrentSelection() };

function loadManagementOptionSelection() {
    if (loadManagementSelectionPart.value == "Enabled" && followTheSunSelection.value == 1){
        if(isJQueryAndUIReady()){
            $("#alertMessageForMasterSlaveFollowTheSun").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [{
                    text: ok_button,
                    class: "okButton",
                    click: function () {
                        somethingChanged = false;
                        somethingChangedForLocalLoadManagementGroup = false;

                        document.getElementById("installationSettingsNav").click();
                        document.getElementById("powerOptimizerCurrentLimitBar").click();

                        $(this).dialog("close");
                    }
                }]
            });
        }

    }else{
         loadManagementOptionFunction();
    }
    if (loadManagementSelectionPart.value == "Modbus" && powerOptimizerValue != 0) {
        if(isJQueryAndUIReady()){
            $("#alertMessageForLoadManagement").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [{
                    text: ok_button,
                    class: "okButton",
                    click: function () {
                        somethingChanged = false;
                        somethingChangedForLocalLoadManagementGroup = false;

                        document.getElementById("installationSettingsNav").click();
                        document.getElementById("powerOptimizerCurrentLimitBar").click();

                        $(this).dialog("close");
                    }
                }]
            });
        }
    } else if (loadManagementSelectionPart.value == "Enabled" && powerOptimizerValue != 0) {
        if(isJQueryAndUIReady()){
            $("#alertMessageForMasterSlave").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [{
                    text: ok_button,
                    class: "okButton",
                    click: function () {
                        somethingChanged = false;
                        somethingChangedForLocalLoadManagementGroup = false;

                        document.getElementById("installationSettingsNav").click();
                        document.getElementById("powerOptimizerCurrentLimitBar").click();

                        $(this).dialog("close");
                    }
                }]
            });
        }
    } else {
        loadManagementOptionFunction();
    }
}

function powerOptimizerTotalCurrentSelection() {
    var followTheSun = document.getElementById("followTheSunSelection");
    var powerOptimizer = document.getElementById("powerOptimizerSelection");
    if (followTheSun.value == 1 && loadManagementValue == "Enabled"){
        if(isJQueryAndUIReady()){
            $("#alertMessageForDlmAndFollowTheSunEnable").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [{
                    text: ok_button,
                    class: "okButton",
                    click: function () {
                        somethingChanged = false;
                        document.getElementById("localNav").click();
                        $(this).dialog("close");
                    }
                }]
            });
        }

    }else{
         operationModeFunction();
    }
    if (powerOptimizer.value != 0 && loadManagementValue == "Modbus") {
        if(isJQueryAndUIReady()){
            $("#alertMessageForPowerOptimizerExternalEnableAlert").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [{
                    text: ok_button,
                    class: "okButton",
                    click: function () {
                        somethingChanged = false;
                        document.getElementById("localNav").click();
                        $(this).dialog("close");
                    }
                }]
            });
        }
    } else if (powerOptimizer.value != 0 && loadManagementValue == "Enabled") {
        if(isJQueryAndUIReady()){
            $("#alertMessageForDlmEnable").dialog({
                width: 580,
                height: 300,
                modal: true,
                closeOnEscape: false,
                dialogClass: "dialog-no-close",
                buttons: [{
                    text: ok_button,
                    class: "okButton",
                    click: function () {
                        somethingChanged = false;
                        document.getElementById("localNav").click();
                        $(this).dialog("close");
                    }
                }]
            });
        }
    } else {
        operationModeFunction();
    }
}

function powerOptimizerExternalMeterFunction() {
    var powerOptimizerExternalMeterSelection = document.getElementById("powerOptimizerExternalMeterSelection");
    var powerOptimizerExternalMeterPartForAutoSelected = document.getElementById("powerOptimizerExternalMeterPartForAutoSelected");
    var operationModeSelection = document.getElementById("operationModeSelection");
    var powerOptimizerSelection = document.getElementById("powerOptimizerSelection");
    var followTheSun = document.getElementById("followTheSunSelection");
    var followTheSunMode = document.getElementById("followTheSunModeSelection");
    var autoPhaseSwitchingSelection = document.getElementById("autoPhaseSwitchingSelection");
    var powerOptimizerTotalCurrent = document.getElementById("powerOptimizerTotalCurrentSelection");

    if (powerOptimizerExternalMeterSelection.value == 0) {
        powerOptimizerExternalMeterPartForAutoSelected.style.display = "";
        powerOptimizerExternalMeterSelection.style.width = "12vw";
        operationModeSelection.style.width = "12vw";
        powerOptimizerSelection.style.width = "12vw";
        followTheSun.style.width = "12vw";
        followTheSunMode.style.width = "12vw";
        autoPhaseSwitchingSelection.style.width = "12vw";
        powerOptimizerTotalCurrent.style.width = "12vw";
    }
    else if (powerOptimizerExternalMeterSelection.value == 3) {
        powerOptimizerExternalMeterPartForAutoSelected.style.display = "none";
        powerOptimizerExternalMeterSelection.style.width = "17vw";
        operationModeSelection.style.width = "17vw";
        powerOptimizerSelection.style.width = "17vw";
        followTheSun.style.width = "17vw";
        followTheSunMode.style.width = "17vw";
        autoPhaseSwitchingSelection.style.width = "17vw";
        powerOptimizerTotalCurrent.style.width = "17vw";
    }
    else {
        powerOptimizerExternalMeterPartForAutoSelected.style.display = "none";
        powerOptimizerExternalMeterSelection.style.width = "12vw";
        operationModeSelection.style.width = "12vw";
        powerOptimizerSelection.style.width = "12vw";
        followTheSun.style.width = "12vw";
        followTheSunMode.style.width = "12vw";
        autoPhaseSwitchingSelection.style.width = "12vw";
        powerOptimizerTotalCurrent.style.width = "12vw";
    }
}

function earthingSystemCheck() {
    if (selectOCPPConnection.value == 1) {
        if (earthingSystemSelection.selectedIndex == 0 && installationErrorEnableValue == "FALSE") {
            if(isJQueryAndUIReady()){
                $("#earthingSystemAlertMessage").dialog({
                    width: 580,
                    height: 300,
                    modal: true,
                    closeOnEscape: false,
                    dialogClass: "dialog-no-close",
                    buttons: [{
                        text: ok_button,
                        class: "okButton",
                        click: function () {
                            somethingChanged = false;
                            earhingSystemError += 1;
                            document.getElementById("ocppNav").click();
                            $(this).dialog("close");
                        }
                    }]
                });
            }

        }
        else {
            earhingSystemError = 0;
        }
    }
}
function logoRemove() {
    showingAnimationContainer("button_logo_remove");
}

function qrCodeFunction() {
    var qrCode = document.getElementById("qrCodeSelection");
    var qrCodeDelimiterPart = document.getElementById("qrCodeDelimiterPart");
    var adhocUrlPrefixPart = document.getElementById("adhocUrlPrefixPart");
    if (qrCode.value == 0) {
        qrCodeDelimiterPart.style.visibility = "hidden";
        adhocUrlPrefixPart.style.visibility = "hidden";
    }
    else {
        qrCodeDelimiterPart.style.visibility = "visible";
        adhocUrlPrefixPart.style.visibility = "visible";
    }
}

function formatDuration(duration) {
    var hours = Math.floor(duration / (1000 * 60 * 60));
    var minutes = Math.floor((duration % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((duration % (1000 * 60)) / 1000);
    var formattedDuration = "";
    if (hours < 10) {
        formattedDuration += "0";
    }
    formattedDuration += hours + ":";
    if (minutes < 10) {
        formattedDuration += "0";
    }
    formattedDuration += minutes + ":";
    if (seconds < 10) {
        formattedDuration += "0";
    }
    formattedDuration += seconds;
    return formattedDuration;
}

function handleBackupButtonClick() {
    window.location.href = 'backUpDBFile.php';
    checkBackupButtonCookie();
}

function checkBackupButtonCookie() {
    blockUIForDownload();
}

function refreshSelectBox() {
    // Make an AJAX request to reload paired energy manager information
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Get the response as JSON
                var response = JSON.parse(xhr.responseText);

                // Update the value of the paired energy manager input field
                document.getElementById("textPairedEnergyManager").value = response.pairedEnergyManager;

                // Replace the select box options with the updated data
                var selectBox = document.getElementById('selectEebusDiscovery');
                selectBox.innerHTML = response.selectOptions;

                // Update the additional HTML elements
                document.getElementById("textfailsafeCurrent").value = response.fallbackCurrent;
                document.getElementById("textSkiStatus").value = response.skiStatus;
                document.getElementById("textFirmwareVersion").value = response.firmwareVersion;
                //var eebusPairButton = document.getElementById("eebusPair");
                let isSkiEmpty = (response.SKI ?? '') === '' ? 0 : 1;
                let isSkiDiscoveryEmpty = (response.skiDiscovery ?? '') === '' ? 0 : 1;

                if (!((isSkiEmpty === 0) && (isSkiDiscoveryEmpty === 1))) {
                    $('#eebusPair').prop('disabled', true).addClass('interfacesButtonPairDisabled').removeClass('interfacesButtonPair');
                    //eebusPairButton.classList.remove('selected');
                } else {
                    $('#eebusPair').prop('disabled', false).addClass('interfacesButtonPair').removeClass('interfacesButtonPairDisabled');
                    //eebusPairButton.classList.add('selected');
                }
            } else {
                // Handle the error case
                console.error('Error: ' + xhr.status);
            }
        }
    };

    xhr.open('POST', 'refresh.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send();
}

function updateButtonValue() {
    var selectEEBUSPairingUnpair = $("#selectEEBUSPairingUnpair").hasClass("selected");
    var buttonValue = selectEEBUSPairingPair ? "true" : selectEEBUSPairingUnpair ? "false" : null;
    $("#eebusPair").val(buttonValue);
    $("#eebusUnpair").val(buttonValue);
    $("#selectEEBUSPairingPair").addClass("selected");
}

function saveEebusSettingsDb(state) {
    var selectEebus = document.getElementById("selectEEBUS");
    var eebusState = 'Eebus';
    var selectEEBUSPairingUnpair = null;
    var selectEEBUSPairingPair = null;
    if ($("#selectEEBUSPairingUnpair").hasClass("selected")) {
        selectEEBUSPairingUnpair = false;
    }
    if ($("#selectEEBUSPairingPair").hasClass("selected")) {
        selectEEBUSPairingPair = true;
    }

    if (state == true) {
        selectEEBUSPairingUnpair = null;
        selectEEBUSPairingPair = true;
        eebusState = eebusState;
    }
    else if (state == false) {
        selectEEBUSPairingUnpair = false;
        selectEEBUSPairingPair = null;
        eebusState = eebusState;

    }
    else {
        selectEEBUSPairingUnpair = null;
        selectEEBUSPairingPair = null;
        eebusState = eebusState;

    }
    var textEebusDiscovery = document.getElementById("selectEebusDiscovery").value;
    var encodedEebusState = encodeURIComponent(eebusState);
    var index = {
        eebusState: eebusState,
        selectEEBUSPairingUnpair: selectEEBUSPairingUnpair,
        selectEEBUSPairingPair: selectEEBUSPairingPair,
        selectEebusDiscovery: textEebusDiscovery
    };
    var div = document.createElement("div");
    div.className += "overlay";
    document.body.appendChild(div);
    $('.animationBar').show();

    $.ajax({
        type: 'POST',
        url: 'query_Eebus.php',
        data: index,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $('.animationBar').hide();
            document.body.removeChild(div);
            $('#pageContent').html(data);
        },
        error: function (xhr) {
            $('.animationBar').hide();
            alert('Error: ' + xhr.responseText);
        }
    });
}

function isJQueryAndUIReady() {
    // If jQuery ve jQuery UI is not loaded, it means that session finished.
    if (typeof jQuery === 'undefined' || typeof jQuery.ui === 'undefined') {
      console.error('jQuery or jQuery UI is not loaded.');
      checkSessionTimeout();
    }
    return true;
}

function toggleMainCircuitCurrent() {
    var supplyType = document.getElementById('supplyTypeSelection').value;
    var mainCircuitCurrent = document.getElementById('mainCircuitCurrent');
    
    if (supplyType === 'TIC') {
        mainCircuitCurrent.readOnly = true;
        mainCircuitCurrent.value = dlmTICTotalCurrentValue;
    } else {
        mainCircuitCurrent.readOnly = false;
        mainCircuitCurrent.value = mainCircuitCurrentValue;
    }
}

function selectNetwork(networkName) {
    document.getElementById('wifiSSID').value = networkName;
    const wifiSSIDItem = document.getElementById('wifiSSIDItem');
    const wifiPasswordInput = document.getElementById('wifiPassword');
    const wifiPasswordErr = document.getElementById('wifiPasswordErr');
    wifiPasswordInput.value = '';
    if (wifiPasswordErr) wifiPasswordErr.textContent = '';

    wifiSSIDItem.scrollIntoView({ behavior: 'smooth', block: 'center' });
}

function scanWifiNetworks() {
    const scanButton = document.getElementById('button_scanWifiNetworks');
    const loadingPopup = document.getElementById('loadingPopup');
    const networkList = document.getElementById('wifiNetworkList');
    const PasswordItem = document.getElementById('wifiPasswordItem');

    scanButton.disabled = true;
    loadingPopup.style.display = 'block';
    networkList.innerHTML = '';

    $.ajax({
        url: 'scanWifiNetworks.php?fetch=true',
        method: 'GET',
        success: function(response) {
            const networks = response;

            if (networks.length > 0) {
                networks.forEach(network => {
                    const networkList = document.getElementById('wifiNetworkList');
                    const listItem = document.createElement('li');
                    listItem.style = `
                        padding: 8px;
                        border: 1px solid #007BFF;
                        border-radius: 5px;
                        cursor: pointer;
                        background-color: #F8F9FA;
                        transition: background-color 0.3s;
                        display: flex;
                        align-items: center;
                        gap: 10px;`;

                    const signalBars = document.createElement('div');
                    signalBars.style = 'display: flex; align-items: flex-end; gap: 2px; height: 30px;';

                    const wifiLevel = getWifiLevel(network.signal);
                    const wifiIcon = document.createElement('img');
                    wifiIcon.src = "css/wifi_level_" + wifiLevel +".png";
                    wifiIcon.style.width = '36px';
                    wifiIcon.style.height = '36px';

                    signalBars.appendChild(wifiIcon);

                    const networkInfo = document.createElement('div');
                    networkInfo.style = 'flex: 1; display: flex; flex-direction: column; justify-content: center;';

                    const ssid = document.createElement('span');
                    ssid.style = 'font-size: 14px; font-weight: bold;';
                    ssid.textContent = network.ssid;

                    const details = document.createElement('span');
                    details.style = 'font-size: 12px; color: #6c757d;';
                    details.textContent = `${network.freq}Hz \u00A0 ${network.signal} dBm`;

                    networkInfo.appendChild(ssid);
                    networkInfo.appendChild(details);

                    listItem.appendChild(signalBars);
                    listItem.appendChild(networkInfo);

                    listItem.addEventListener('mouseover', function() {
                        this.style.backgroundColor = '#007BFF';
                        this.style.color = '#FFFFFF';
                    });
                    listItem.addEventListener('mouseout', function() {
                        this.style.backgroundColor = '#F8F9FA';
                        this.style.color = '#000000';
                    });

                    listItem.addEventListener('click', function() {
                        selectNetwork(network.ssid);
                    });

                    networkList.appendChild(listItem);
                });

                networkList.scrollIntoView({ behavior: 'smooth', block: 'start' });
            } else {
                showNoNetworkPopup();
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX error:', error);
            showNoNetworkPopup();
        },
        complete: function() {
            scanButton.disabled = false;
            loadingPopup.style.display = 'none';
        }
    });
}

function closeNoNetworkPopup() {
    document.getElementById('noNetworkPopup').style.display = 'none';
}

function retryScanWifiNetworks() {
    document.getElementById('noNetworkPopup').style.display = 'none';
    scanWifiNetworks();
}

function showNoNetworkPopup() {
    document.getElementById('noNetworkPopup').style.display = 'flex';
}

function getWifiLevel(signal) {
    if (signal >= -50) return 4;
    if (signal >= -60) return 3;
    if (signal >= -70) return 2;
    if (signal >= -90) return 1;
    return 0;
}

// Initial check in case the page loads with TIC selected
document.addEventListener("DOMContentLoaded", function() {
    toggleMainCircuitCurrent();
});

document.addEventListener("DOMContentLoaded", function () {
    
    document.getElementById('wifiHotspotPassword').value = wifiHotspotPasswordValue;
    document.getElementById('wifiPassword').value = wifiPasswordValue;
    document.getElementById('apnPassword').value = apnPasswordValue;
    document.getElementById('simPin').value = simPinValue;
    document.getElementById("authorizationKey").value = authorizationKeyValue;

    var loadmanagementUpdatedlmgroupButton = document.getElementById('loadmanagement_updatedlmgroup_button');
    if (masterConnectionStatus == "Connected") {
        console.log("master Connection status :",masterConnectionStatus);
        loadmanagementUpdatedlmgroupButton.className = 'interfacesButtonUpdateSlave';
        loadmanagementUpdatedlmgroupButton.setAttribute("onclick", "updateDLMGroup()");

    } else {
        loadmanagementUpdatedlmgroupButton.className = 'interfacesButtonUpdateSlaveDisabled';
        loadmanagementUpdatedlmgroupButton.removeAttribute("onclick");
    }
});

document.addEventListener("DOMContentLoaded", function () {
    toggleClusterFailsafeMode();
});

function toggleClusterFailsafeMode() {
    var clusterFailSafeModeValue = document.getElementById("clusterFailSafeMode").value;
    var clusterFailSafeCurrentPart = document.getElementById("clusterFailSafeCurrentPart");
    var clusterFailSafeCurrent = document.getElementById("clusterFailSafeCurrent");
    //var selectCpRoleValue = document.getElementById("cpRoleSelection").value;
    if (clusterFailSafeModeValue === "Enabled") {
      clusterFailSafeCurrentPart.style.display = "block";
    } else {
      clusterFailSafeCurrentPart.style.display = "none";
      clusterFailSafeCurrent.value = 0;
    }
}
