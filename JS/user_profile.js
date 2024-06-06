ajaxRequest('GET', '../request.php/get_user_profiles', displayUserProfiles);

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

    ajaxRequest('GET', '../request.php/get_user_profiles', displayUserProfiles);

});

ajaxRequest('GET', '../request.php/get_user_settings', (response) => {
    $("#capacityTankInput").val(response.capacity_tank_l);
    $("#pressureTankInput").val(response.pressure_tank);
});

$("#defaultSettingsDiv").on("click", "#buttonSubmitUserSettings", (event) => {
    event.preventDefault();

    var capacity = $("#capacityTankInput").val();
    var pressure = $("#pressureTankInput").val();

    ajaxRequest("PUT", "../request.php/set_user_settings/", (response) => {
        if(response){
            $("#msgConfirm").show();
        }
        else {
            $("#msgConfirm").hide();
            console.log("Error during insertion !");
        }

    }, "capacity=" + capacity + "&pressure=" + pressure);

});


function displayUserProfiles(response){
    let htmlToInsert = '';
    let counter = 0;

    if(response.length){
        response.forEach(elem => {
            counter++;
            console.log(elem);
            var text = '<div class="mx-auto text-center py-4">';
            if (elem['duration_min'] >= 60){
                var h = elem['duration_min'] % 60;
                if(h == 0){
                    h = '';
                }
                text += '<span class="mt-6 px-5 text-lg leading-8 text-gray-600">Duration : ' + Math.floor(elem['duration_min']/60) + 'h' + h + '</span>';
            } else {
                text += '<span class="mt-6 px-5 text-lg leading-8 text-gray-600">Duration : ' + elem['duration_min'] + 'min </span>';
            }
    
            text += `
            <span class="mt-6 px-5 text-lg leading-8 text-gray-600">Depth : `+ elem['depth'] + `m</span>
            <button id="buttonViewUserProfile" type="button" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Select Profile</button>
            </div>`;
            htmlToInsert += text;
        });
    }
    
    
    if(counter == 0){
        htmlToInsert = 'You have not any profile diving !';
    }

    $("#divUserProfiles").html(htmlToInsert);


}
