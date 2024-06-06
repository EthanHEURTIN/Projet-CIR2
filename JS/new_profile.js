getdbDepth();

function displayMN90(response){

    console.log(response);
    tbody = document.getElementById('table_info');
    tbody.innerHTML = "";

    var capacity_tank_l = response.capacity_tank_l;
    var pressure_tank = response.pressure_tank;

    
    for(let key in response){
        if(response.hasOwnProperty(key) && !isNaN(key)){
            table = "";

            var dataLine = response[key];

            var number_paliers = 0;
            if(dataLine["m15"] != null) number_paliers++;
            if(dataLine["m12"] != null) number_paliers++;
            if(dataLine["m9"] != null) number_paliers++;
            if(dataLine["m6"] != null) number_paliers++;
            if(dataLine["m3"] != null) number_paliers++;
            

            if(checkConsommationTank(dataLine["prof"], dataLine["t"], number_paliers, capacity_tank_l*pressure_tank, [0, dataLine["m3"], dataLine["m6"], dataLine["m9"], dataLine["m12"], dataLine["m15"]])){
                table += '<tr class="bg-green-200">';
            }
            else {
                table += '<tr class="bg-red-200">';
            }
            table += '<td class="border border-slate-600 px-3 py-2">' + dataLine["prof"] +'</td>';
            if (dataLine[1] >= 60){
                $h = dataLine[1] % 60;
                if($h == 0){
                    $h = '';
                }
                table += '<td class="border border-slate-600 px-3 py-2">' + Math.floor(dataLine["t"]/60) + 'h' + $h +'</td>';
            } else {
                table += '<td class="border border-slate-600 px-3 py-2">' + dataLine["t"] +'m</td>';
            }
            if (dataLine["m15"] == null){
                dataLine["m15"] = 0;
            }
            table += '<td class="border border-slate-600 px-3 py-2">' + dataLine["m15"] +'</td>';
            if (dataLine["m12"] == null){
                dataLine["m12"] = 0;
            }
            table += '<td class="border border-slate-600 px-3 py-2">' + dataLine["m12"] +'</td>';
            if (dataLine["m9"] == null){
                dataLine["m9"] = 0;
            }
            table += '<td class="border border-slate-600 px-3 py-2">' + dataLine["m9"] +'</td>';
            if (dataLine["m6"] == null){
                dataLine["m6"] = 0;
            }
            table += '<td class="border border-slate-600 px-3 py-2">' + dataLine["m6"] +'</td>';
            if (dataLine["m3"] == null){
                dataLine["m3"] = 0;
            }
            table += '<td class="border border-slate-600 px-3 py-2">' + dataLine["m3"] +'</td>';
            table += '<td class="border border-slate-600 px-3 py-2">' + dataLine["dtr"] +'</td>';
            table += '<td class="border border-slate-600 px-3 py-2">' + dataLine["gps"] +'</td>';
    
            table += '</tr>';
            tbody.innerHTML += table;

        }
    }



    /* Add to Duration Select button different time possible */
    
    options = "";
    select = document.getElementById('duration');
    select.removeAttribute('disabled');

    for(let key in response){
        if(response.hasOwnProperty(key) && !isNaN(key)){
            var dataLine = response[key];

            if (dataLine["t"] >= 60){
                $h = dataLine["t"] % 60;
                if($h == 0){
                    $h = '';
                }
                options += '<option value="'+ dataLine["t"] +'">'+ Math.floor(dataLine["t"]/60) + 'h' + $h +'</option>';
            } else {
                options += '<option value="'+ dataLine["t"] +'">'+ dataLine["t"] +'m</option>';
            }
        }
    }

    select.innerHTML = options;

    /* Add button to submit form */
    box = document.getElementById('form');
    box.innerHTML = `
    <div class="flex items-center justify-center">
        <button id="buttonGetStartedProfile" type="submit" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Get started</a>
    </div>
    `;
    
}

function displayDepth(reponse){

    options = "";
    options += '<option disabled selected value> -- select an depth -- </option>';
    select = document.getElementById('depth');

    reponse.forEach(element => {
        options += '<option value="'+ element[0] +'">'+ element[0] +'m</option>'
    });

    select.innerHTML = options;
}

function getMN90ByDepth(){

    depth = document.getElementById('depth').value;
    ajaxRequest('GET', "../request.php/getMN90Depth", displayMN90,"Depth=" + depth);

}

function getdbDepth(){

    ajaxRequest('GET', "../request.php/getDepth", displayDepth);

}


// Fonction qui permet de vérifier si la plongée est possible selon la bouteille de la personne
// 

function checkConsommationTank(
    /* Profondeur de la plongée : */prof, 
    /* Durée de la plongée : */ duree,
    /* Nombre de paliers : */ n, 
    /* Volume total de la bouteille : */ vt, 
    /* Temps des différents paliers : */ temps_paliers){

    palier = [0, 3, 6, 9, 12, 15];
    C_tot = 0;                                                                              // Consommation totale
    C_1 = 20 * ((prof / 20) + 1) * (prof / 15);                                             // Consommation à t_1
    C_2 = 20 * ((prof / 10) + 1) * (duree - (prof / 15));                                   // Consommation à t_2
    C_tot = C_1 + C_2;
    prof_temp = prof;

    for(let i = n; i >= 1; i--){
        C_p = 20 * (((prof_temp - palier[i]) / 20) + 1) * ((prof_temp - palier[i])/15);
        C_l = 20 * ((palier[i] / 10) + 1) * (temps_paliers[i]);
        C_tot = C_tot + C_p + C_l;
        prof_temp = palier[i]; 
    }

    if(vt > C_tot + 15*20){                                                                 // Sécurité de 15 minutes pour la plongée
        return true;
    }
    else {
        return false;
    }

}