$("#buttonsUserProfile").on("click", "#defaultSettings", () => {
    $("#defaultSettingsDiv").show();
    $("#divingProfilesDiv").hide();
    $("#divingProfilesButton").hide();

    $("#buttonsUserProfile").html(`
    <button type="button" id="defaultSettings" class="bg-blue-200 text-blue-700 rounded-md my-auto px-5 py-3 text-sm font-medium hover:bg-blue-100 rounded-md px-3 py-2 text-sm font-medium">Default settings</button>
    <button type="button" id="divingProfiles" class="bg-blue-700 text-white rounded-md my-auto px-5 py-3 text-sm font-medium hover:bg-blue-500 rounded-md px-3 py-2 text-sm font-medium">My diving profiles</button>
    `);
    $("#msgConfirm").hide();
});

$("#buttonsUserProfile").on("click", "#divingProfiles", () => {
    $("#defaultSettingsDiv").hide();
    $("#divingProfilesDiv").show();
    $("#divingProfilesButton").show();

    $("#buttonsUserProfile").html(`
    <button type="button" id="defaultSettings" class="bg-blue-700 text-white rounded-md my-auto px-5 py-3 text-sm font-medium hover:bg-blue-500 rounded-md px-3 py-2 text-sm font-medium">Default settings</button>
    <button type="button" id="divingProfiles" class="bg-blue-200 text-blue-700 rounded-md my-auto px-5 py-3 text-sm font-medium hover:bg-blue-100 rounded-md px-3 py-2 text-sm font-medium">My diving profiles</button>
    `);
});

ajaxRequest('GET', '../PHP/request.php/get_user_settings', (response) => {
    $("#capacityTankInput").val(response.capacity_tank_l);
    $("#pressureTankInput").val(response.pressure_tank);
});

$("#defaultSettingsDiv").on("click", "#buttonSubmitUserSettings", (event) => {
    event.preventDefault();

    var capacity = $("#capacityTankInput").val();
    var pressure = $("#pressureTankInput").val();

    ajaxRequest("PUT", "../PHP/request.php/set_user_settings/", (response) => {
        if(response){
            $("#msgConfirm").show();
        }
        else {
            $("#msgConfirm").hide();
            console.log("Error during insertion !");
        }

    }, "capacity=" + capacity + "&pressure=" + pressure);

});
