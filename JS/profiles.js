getdbMN90Line();

function displayProfile(reponse){

    let bar = reponse['pressure_tank'];
    let airCapacity = reponse['capacity_tank_l'];
    let airVolume = airCapacity * bar;
    let depth = reponse['prof'];
    let consumption = 0;
    let duration = reponse['t'];
    let tx = 2;
    let time = 0;
    let totalTime = 0;

    let table = document.getElementById('table');
    let tableHTML = "";

    let palierName ="";
    let oldPalierName ="";
    let pallierTime = 0;
    let pallierDepth = 0;

    let depthArray = [0];
    let tempsArray = [0];
    let barAmbianteArray = [1];
    let consumptionArray = [0];
    let barArray = [bar];
    let airVolumeArray = [airVolume];

    data = [{x: 0, y: 0}];
    
    /* T0 - T2 static */
    // t0
    tableHTML += '<tr class="bg-blue-400">';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">t0</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">0</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">0</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">1</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">0</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ bar +'</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ airVolume +'</td>';
    tableHTML += '</tr>';
    // t1
    time = Math.round(depth/15);
    totalTime += time;
    consumption = 20 * ((depth/2)/10 +1) * time;
    airVolume -= consumption;
    bar = Math.round(airVolume / airCapacity);
    
    if(airVolume < 0){
        tableHTML += '<tr class="bg-red-300">';
    } else if(bar < 50){
        tableHTML += '<tr class="bg-blue-300 text-red-600">';
    } else {
        tableHTML += '<tr class="bg-blue-300">';
    }
    tableHTML += '<td class="border border-slate-600 px-3 py-2">t1</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ depth +'</td>';
    if (time >= 60){
        let $h = time % 60;
        if($h == 0){
            $h = '';
        }
        tableHTML += '<td class="border border-slate-600 px-3 py-2">' + Math.floor(time/60) + 'h' + $h +'</td>';
    } else {
        tableHTML += '<td class="border border-slate-600 px-3 py-2">' + time +'m</td>';
    }
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ ((depth/10+1) + 1)/2 +'</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ consumption +'</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ bar +'</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ airVolume +'</td>';
    tableHTML += '</tr>';

    depthArray.push(depth);
    tempsArray.push(time + tempsArray.at(-1));
    barAmbianteArray.push(((depth/10+1) + 1)/2);
    consumptionArray.push(consumption);
    barArray.push(bar);
    airVolumeArray.push(airVolume);
    data.push({x: totalTime, y: -depth});

    // t2
    time = Math.round(duration - time/15);
    totalTime += time;
    consumption = 20 * (depth/10 +1) * time;
    airVolume -= consumption;
    bar = Math.round(airVolume / airCapacity);
    
    if(airVolume < 0){
        tableHTML += '<tr class="bg-red-400">';
    } else if(bar < 50){
        tableHTML += '<tr class="bg-blue-400 text-red-600">';
    } else {
        tableHTML += '<tr class="bg-blue-400">';
    }
    tableHTML += '<td class="border border-slate-600 px-3 py-2">t2</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ depth +'</td>';
    if (time >= 60){
        $h = time % 60;
        if($h == 0){
            $h = '';
        }
        tableHTML += '<td class="border border-slate-600 px-3 py-2">' + Math.floor(time/60) + 'h' + $h +'</td>';
    } else {
        tableHTML += '<td class="border border-slate-600 px-3 py-2">' + time +'m</td>';
    }
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ (depth/10+1) +'</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ consumption +'</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ bar +'</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ airVolume +'</td>';
    tableHTML += '</tr>';

    depthArray.push(depth);
    tempsArray.push(time + tempsArray.at(-1));
    barAmbianteArray.push((depth/10+1));
    consumptionArray.push(consumption + consumptionArray.at(-1));
    barArray.push(bar);
    airVolumeArray.push(airVolume);
    data.push({x: totalTime, y: -depth});

    // t3 and more...
    for (let i = 0; i < 5; i++) {
        
        pallierDepth = (5-i)*3;
        palierName = 'm' + String(pallierDepth);
        if(i != 0){
            if(reponse[palierName] != null){
                pallierTime = reponse[palierName] - reponse[oldPalierName];
            }
        } else {
            pallierTime = reponse[palierName];
        }

        if(pallierTime != null){
            time = Math.ceil((depth - pallierDepth) /15);
            totalTime += time;
            consumption = 20 * ((depth + pallierDepth)/20 +1) * time;
            airVolume -= consumption;
            bar = ((depth + pallierDepth)/20 +1);
            tx++;

            if(airVolume < 0){
                tableHTML += '<tr class="bg-red-300">';
            } else if(Math.round(airVolume / airCapacity) < 50){
                tableHTML += '<tr class="bg-blue-300 text-red-600">';
            } else {
                tableHTML += '<tr class="bg-blue-300">';
            }
            tableHTML += '<td class="border border-slate-600 px-3 py-2">t'+ tx +'</td>';
            tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ pallierDepth +'</td>';
            if (time >= 60){
                $h = time % 60;
                if($h == 0){
                    $h = '';
                }
                tableHTML += '<td class="border border-slate-600 px-3 py-2">' + Math.floor(time/60) + 'h' + $h +'</td>';
            } else {
                tableHTML += '<td class="border border-slate-600 px-3 py-2">' + time +'m</td>';
            }
            tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ bar +'</td>';
            tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ consumption +'</td>';
            tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ Math.round(airVolume / airCapacity) +'</td>';
            tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ airVolume +'</td>';
            tableHTML += '</tr>';

            depthArray.push(pallierDepth);
            tempsArray.push(time + tempsArray.at(-1));
            barAmbianteArray.push(bar);
            consumptionArray.push(consumption + consumptionArray.at(-1));
            barArray.push(Math.round(airVolume / airCapacity));
            airVolumeArray.push(airVolume);
            data.push({x: totalTime, y: -pallierDepth});

            /* Time during pallier */
            time = pallierTime;
            totalTime += time;
            consumption = 20 * (pallierDepth/10 +1) * time;
            airVolume -= consumption;
            bar = (pallierDepth/10 +1);
            tx++;
            
            if(airVolume < 0){
                tableHTML += '<tr class="bg-red-400">';
            } else if(Math.round(airVolume / airCapacity) < 50){
                tableHTML += '<tr class="bg-blue-300 text-red-600">';
            } else {
                tableHTML += '<tr class="bg-blue-400">';
            }
            tableHTML += '<td class="border border-slate-600 px-3 py-2">t'+ tx +'</td>';
            tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ pallierDepth +'</td>';
            if (time >= 60){
                $h = time % 60;
                if($h == 0){
                    $h = '';
                }
                tableHTML += '<td class="border border-slate-600 px-3 py-2">' + Math.floor(time/60) + 'h' + $h +'</td>';
            } else {
                tableHTML += '<td class="border border-slate-600 px-3 py-2">' + time +'m</td>';
            }
            tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ bar +'</td>';
            tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ consumption +'</td>';
            tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ Math.round(airVolume / airCapacity) +'</td>';
            tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ airVolume +'</td>';
            tableHTML += '</tr>';
            depth = pallierDepth;

            depthArray.push(pallierDepth);
            tempsArray.push(time + tempsArray.at(-1));
            barAmbianteArray.push(bar);
            consumptionArray.push(consumption + consumptionArray.at(-1));
            barArray.push(Math.round(airVolume / airCapacity));
            airVolumeArray.push(airVolume);
            data.push({x: totalTime, y: -pallierDepth});
        }
        oldPalierName = palierName;
    }
    // Tfinal

    if(reponse[3] != 0){
        palierName = 'dtr';
        if(palierName != null){
            pallierTime = reponse[palierName] - reponse[oldPalierName];
        }
    } else {
        pallierTime = palierName;
    }
    pallierDepth = 0;

    time = Math.ceil((depth - pallierDepth) /15);
    totalTime += time;
    consumption = 20 * ((depth + pallierDepth)/20 +1) * time;
    airVolume -= consumption;
    bar = ((depth + pallierDepth)/20 +1);
    tx++;
    
    if(airVolume < 0){
        tableHTML += '<tr class="bg-red-300">';
    } else if(Math.round(airVolume / airCapacity) < 50){
        tableHTML += '<tr class="bg-blue-300 text-red-600">';
    } else {
        tableHTML += '<tr class="bg-blue-300">';
    }
    tableHTML += '<td class="border border-slate-600 px-3 py-2">t'+ tx +'</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ 0 +'</td>';
    if (time >= 60){
        $h = time % 60;
        if($h == 0){
            $h = '';
        }
        tableHTML += '<td class="border border-slate-600 px-3 py-2">' + Math.floor(time/60) + 'h' + $h +'</td>';
    } else {
        tableHTML += '<td class="border border-slate-600 px-3 py-2">' + time +'m</td>';
    }
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ bar +'</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ consumption +'</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ Math.round(airVolume / airCapacity) +'</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ airVolume +'</td>';
    tableHTML += '</tr>';

    depthArray.push(0);
    tempsArray.push(time + tempsArray.at(-1));
    barAmbianteArray.push(bar);
    consumptionArray.push(consumption + consumptionArray.at(-1));
    barArray.push(Math.round(airVolume / airCapacity));
    airVolumeArray.push(airVolume);
    data.push({x: totalTime, y: -pallierDepth});

    table.innerHTML = tableHTML;
    
    const ctx = document.getElementById('profile');

    function setTextLabel(context){
        time = tempsArray[context.dataIndex]
        let timetext = '';
        if (time >= 60){
            $h = time % 60;
            if($h == 0){
                $h = '';
            }
            timetext += Math.floor(time/60) + 'h' + $h +'min';
        } else {
            timetext = time + 'min';
        }
        let text = `
        Depth = `+ String(depthArray[context.dataIndex]) +`m
        Time = `+ timetext +`
        Ambiant Pressure = ` + String(barAmbianteArray[context.dataIndex])+`bar
        Consumption (total) = ` + String(consumptionArray[context.dataIndex])+`L
        Bar left = ` + String(barArray[context.dataIndex]) + `bar
        Air Volume left = ` + String(airVolumeArray[context.dataIndex])+'L';
        return text;
    }

    new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: 'profile',
                data: data
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Profile'
                },
                tooltip: {
                    titleAlign: 'center',
                    displayColors: false,
                    callbacks: {
                        title: function(context) {return "T" + context[0].dataIndex},
                        label: function(context) {return setTextLabel(context)}
                    }
                }
            },
            scales: {
                x: {
                    type: 'linear'
                }
            },
            pointBorderWidth: 10,
            pointHitRadius: 10,
            pointBorderColor: 'rgba(255, 125, 125)',
        }
    });

}

function getdbMN90Line(){

    depth = document.getElementById("depth").getAttribute('value');
    duration = document.getElementById("duration").getAttribute('value');
    ajaxRequest('GET', '../request.php/dbMN90Line', displayProfile, 'Depth='+depth + '&Duration='+duration);

}