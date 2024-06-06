getdbMN90Line();

function displayProfile(reponse){

    let bar = reponse[1][1];
    let airCapacity = reponse[1][0];
    let airVolume = airCapacity * bar;
    let depth = reponse[0][0];
    let consumption = 0;
    let duration = reponse[0][1];
    let tx = 2;

    let pallierTime = 0;
    let pallierDepth = 0;

    let table = document.getElementById('table');
    let tableHTML = "";

    let nb_pallier = 0;
    for (let i = 0; i < 5; i++) {
        if(reponse[i+2] != null){
            nb_pallier++;
        }
    }

    
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
    consumption = 20 * ((depth/2)/10 +1) * time;
    airVolume -= consumption;
    
    if(airVolume < 0){
        tableHTML += '<tr class="bg-red-300">';
    } else {
        tableHTML += '<tr class="bg-blue-300">';
    }
    tableHTML += '<td class="border border-slate-600 px-3 py-2">t1</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ depth/2 +'</td>';
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
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ Math.round(airVolume / airCapacity) +'</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ airVolume +'</td>';
    tableHTML += '</tr>';
    // t2
    time = Math.round(duration - time/15);
    consumption = 20 * (depth/10 +1) * time;
    airVolume -= consumption;
    
    if(airVolume < 0){
        tableHTML += '<tr class="bg-red-400">';
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
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ Math.round(airVolume / airCapacity) +'</td>';
    tableHTML += '<td class="border border-slate-600 px-3 py-2">'+ airVolume +'</td>';
    tableHTML += '</tr>';
    // t3 and more...
    for (let i = 0; i < 5; i++) {
        
        if(reponse[0][1+i] != null && i != 0){
            pallierTime = reponse[0][2+i] - reponse[0][1+i];
        } else {
            pallierTime = reponse[0][2+i];
        }
        pallierDepth = (5-i)*3;

        if(pallierTime != null){
            time = Math.ceil((depth - pallierDepth) /15);
            consumption = 20 * ((depth + pallierDepth)/20 +1) * time;
            airVolume -= consumption;
            bar = ((depth + pallierDepth)/20 +1);
            tx++;

            if(airVolume < 0){
                tableHTML += '<tr class="bg-red-300">';
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

            time = pallierTime;
            consumption = 20 * (pallierDepth/10 +1) * time;
            airVolume -= consumption;
            bar = (pallierDepth/10 +1);
            tx++;
            
            if(airVolume < 0){
                tableHTML += '<tr class="bg-red-400">';
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
        }
    }
    // Tfinal

    if(reponse[0][6] != null){
        pallierTime = reponse[0][7] - reponse[0][6];
    } else {
        pallierTime = reponse[0][7];
    }
    pallierDepth = 0;

    time = Math.ceil((depth - pallierDepth) /15);
    consumption = 20 * ((depth + pallierDepth)/20 +1) * time;
    airVolume -= consumption;
    bar = ((depth + pallierDepth)/20 +1);
    tx++;
    
    if(airVolume < 0){
        tableHTML += '<tr class="bg-red-300">';
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

    table.innerHTML = tableHTML;
    
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

}

function getdbMN90Line(){

    depth = document.getElementById("depth").getAttribute('value');
    duration = document.getElementById("duration").getAttribute('value');
    ajaxRequest('GET', '../request.php/dbMN90Line', displayProfile, 'Depth='+depth + '&Duration='+duration);

}