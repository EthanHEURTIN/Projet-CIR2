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
    xaxis: {range: [-2, 17], title: "Depth"},
    yaxis: {range: [-38, 2], title: "Time in minute"},  
    title: "This profiles",
    showlegend: false
};

// Display using Plotly
Plotly.newPlot("myPlot", data, layout);