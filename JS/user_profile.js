$("#buttonsUserProfile").on("click", "#defaultSettings", () => {
    $("#defaultSettingsDiv").show();
    $("#divingProfilesDiv").hide();

    $("#buttonsUserProfile").html(`
    <button type="button" id="defaultSettings" class="bg-blue-200 text-blue-700 rounded-md px-5 py-3 text-sm font-medium hover:bg-blue-100 rounded-md px-3 py-2 text-sm font-medium">Default settings</button>
    <button type="button" id="divingProfiles" class="bg-blue-700 text-white rounded-md px-5 py-3 text-sm font-medium hover:bg-blue-500 rounded-md px-3 py-2 text-sm font-medium">My diving profiles</button>
    `);
});

$("#buttonsUserProfile").on("click", "#divingProfiles", () => {
    $("#defaultSettingsDiv").hide();
    $("#divingProfilesDiv").show();

    $("#buttonsUserProfile").html(`
    <button type="button" id="defaultSettings" class="bg-blue-700 text-white rounded-md px-5 py-3 text-sm font-medium hover:bg-blue-500 rounded-md px-3 py-2 text-sm font-medium">Default settings</button>
    <button type="button" id="divingProfiles" class="bg-blue-200 text-blue-700 rounded-md px-5 py-3 text-sm font-medium hover:bg-blue-100 rounded-md px-3 py-2 text-sm font-medium">My diving profiles</button>
    `);
});

ajaxRequest('GET', '../PHP/request.php/get_user_settings', (response) => {
    $("#capacityTankInput").val(response.capacity_tank_l);
    $("#pressureTankInput").val(response.pressure_tank);
});

