getdbMN90Line();

function displayProfile(reponse){

    console.log(reponse);

    table = document.getElementById('table');
    tableHTML = "";
    nb_pallier = 0;
    for (let i = 0; i < 5; i++) {
        if(reponse[i+2] != null){
            conteur++;
        }
    }
    

/*
Faire un tableau

const xArray = [0,3,9,11,14,15];
const yArray = [0,-30,-30,-10,-10,0];

const t1X = [3,3];
const t1Y = [0,-30];

// Define Data
const data = [{
    x: xArray,
    y: yArray,
    mode:"lines"
},{
    x: t1X,
    y: t1Y,
    mode: 'lines',
    name: 'dot',
    line: {
    dash: 'dot',
    width: 4
    }
}];

// Define Layout
const layout = {
    xaxis: {range: [-2, 17], title: "Time in minute"},
    yaxis: {range: [-38, 2], title: "Depth"},  
    title: "This profiles",
    showlegend: false
};

// Display using Plotly
Plotly.newPlot("myPlot", data, layout);
*/

}

function getdbMN90Line(){

    depth = document.getElementById("depth").getAttribute('value');
    duration = document.getElementById("duration").getAttribute('value');
    ajaxRequest('GET', '../request.php/dbMN90Line?Depth='+depth + '&Duration='+duration, displayProfile);

}