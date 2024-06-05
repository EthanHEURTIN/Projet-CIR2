getdbDepth();

function displayMN90(reponse){

    table = "";
    tbody = document.getElementById('table_info');

    reponse.forEach(element => {
        table += '<tr class="bg-green-200">';
        table += '<td class="border border-slate-600 px-3 py-2">' + element[0] +'</td>';
        if (element[1] >= 60){
            $h = element[1] % 60;
            if($h == 0){
                $h = '';
            }
            table += '<td class="border border-slate-600 px-3 py-2">' + Math.floor(element[1]/60) + 'h' + $h +'</td>';
        } else {
            table += '<td class="border border-slate-600 px-3 py-2">' + element[1] +'m</td>';
        }
        if (element[2] == null){
            element[2] = 0;
        }
        table += '<td class="border border-slate-600 px-3 py-2">' + element[2] +'</td>';
        if (element[3] == null){
            element[3] = 0;
        }
        table += '<td class="border border-slate-600 px-3 py-2">' + element[3] +'</td>';
        if (element[4] == null){
            element[4] = 0;
        }
        table += '<td class="border border-slate-600 px-3 py-2">' + element[4] +'</td>';
        if (element[5] == null){
            element[5] = 0;
        }
        table += '<td class="border border-slate-600 px-3 py-2">' + element[5] +'</td>';
        if (element[6] == null){
            element[6] = 0;
        }
        table += '<td class="border border-slate-600 px-3 py-2">' + element[6] +'</td>';
        table += '<td class="border border-slate-600 px-3 py-2">' + element[7] +'</td>';
        table += '<td class="border border-slate-600 px-3 py-2">' + element[8] +'</td>';

        table += '</tr>';
    });

    tbody.innerHTML = table;


    /* Add to Duration Select button different time possible */
    options = "";
    select = document.getElementById('duration');

    reponse.forEach(element => {
        if (element[1] >= 60){
            $h = element[1] % 60;
            if($h == 0){
                $h = '';
            }
            options += '<option value="'+ element[1] +'">'+ Math.floor(element[1]/60) + 'h' + $h +'</option>'
        } else {
            options += '<option value="'+ element[1] +'">'+ element[1] +'m</option>'
        }
    });

    select.innerHTML = options;

    /* Add button to submit form */
    box = document.getElementById('form');
    box.innerHTML = `
    <div class="flex items-center justify-center pb-4 py-4">
        <button type="submit" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Get started</a>
    </div>
    `
}

function displayDepth(reponse){

    options = "";
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