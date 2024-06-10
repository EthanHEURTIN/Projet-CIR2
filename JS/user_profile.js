ajaxRequest('GET', 'PHP/vues/request.php/get_user_profiles', displayUserProfiles);

$("#buttonsUserProfile").on("click", "#defaultSettings", () => {
    $("#defaultSettingsDiv").show();
    $("#divingProfilesDiv").hide();
    $("#divingProfilesButton").hide();

    $("#buttonsUserProfile").html(`
    <button type="button" id="defaultSettings" class="bg-blue-200 text-blue-700 rounded-md my-auto px-5 py-3 text-sm font-medium hover:bg-blue-100 rounded-md px-3 py-2 text-sm font-medium">Default settings</button>
    <button type="button" id="divingProfiles" class="bg-indigo-800 text-white rounded-md my-auto px-5 py-3 text-sm font-medium hover:bg-indigo-500 rounded-md px-3 py-2 text-sm font-medium">My diving profiles</button>
    `);
    $("#msgConfirm").hide();
});

$("#buttonsUserProfile").on("click", "#divingProfiles", () => {
    $("#defaultSettingsDiv").hide();
    $("#divingProfilesDiv").show();
    $("#divingProfilesButton").show();

    $("#buttonsUserProfile").html(`
    <button type="button" id="defaultSettings" class="bg-indigo-800 text-white rounded-md my-auto px-5 py-3 text-sm font-medium hover:bg-indigo-500 rounded-md px-3 py-2 text-sm font-medium">Default settings</button>
    <button type="button" id="divingProfiles" class="bg-blue-200 text-blue-700 rounded-md my-auto px-5 py-3 text-sm font-medium hover:bg-blue-100 rounded-md px-3 py-2 text-sm font-medium">My diving profiles</button>
    `);

    ajaxRequest('GET', 'PHP/vues/request.php/get_user_profiles', displayUserProfiles);

});

ajaxRequest('GET', 'PHP/vues/request.php/get_user_settings', (response) => {
    $("#capacityTankInput").val(response.capacity_tank_l);
    $("#pressureTankInput").val(response.pressure_tank);
});

$("#defaultSettingsDiv").on("click", "#buttonSubmitUserSettings", (event) => {
    event.preventDefault();

    var capacity = $("#capacityTankInput").val();
    var pressure = $("#pressureTankInput").val();

    ajaxRequest("PUT", "PHP/vues/request.php/set_user_settings", (response) => {
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
            var text = `
            <div id="line" class="mx-auto text-center py-4">
            <form action="profile.php" method="POST">
            <input id="duration" name="duration" type="hidden" value="` + elem['duration_min'] + `"> 
            <input id="depth" name="depth" type="hidden" value="` + elem['depth'] + `"> 
            `;
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
            <button id="buttonViewUserProfile" type="submit" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white ml-5">Select Profile</button>
            <button id="buttonDeleteUserProfile" type="button" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 ml-5">Delete</button>
            </form>
            </div>
            `;
            htmlToInsert += text;
        });
    }
    
    
    if(counter == 0){
        htmlToInsert = "<div class='mx-auto pt-16 sm:px-6 lg:px-8'><div class='bg-white overflow-hidden shadow-xl sm:rounded-lg'><div class='text-center px-4 py-5 sm:px-6'><h3 class='text-lg my-6 font-medium leading-6 text-gray-900'>No diving profiles</h3><div class='bg-gray-200 h-1 w-2/3 mx-auto'></div><p class='my-8 mx-8'>You don't have any diving profiles saved for the moment, click on the button to fill the area with your first profile.</p><div class='my-8'><a href='new_profile.php' class='bg-indigo-800 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-indigo-500 rounded-md px-3 py-2 text-sm font-medium'>Go to App</a></div></div></div></div>";
        document.getElementById("divUserProfiles").classList.remove("bg-blue-100");
        document.getElementById("divUserProfiles").classList.remove("shadow-2xl");
    }

    $("#divUserProfiles").html(htmlToInsert);

    document.querySelectorAll("#buttonDeleteUserProfile").forEach(function(button) {
        button.addEventListener('click', function() {
            var inputDuration = this.closest('#line').querySelector('#duration');
            var inputDepth = this.closest('#line').querySelector('#depth');
    
            ajaxRequest('DELETE', 'PHP/vues/request.php/delete_user_profile/?' + "depth=" + inputDepth.value + "&duration=" + inputDuration.value, (response) => {
                ajaxRequest('GET', 'PHP/vues/request.php/get_user_profiles', displayUserProfiles);
            });


        });
    
    });
    
}



