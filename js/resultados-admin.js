
function Encuesta(id, titulo, descripcion) {
    this.id = id;
    this.titulo = titulo;
    this.descripcion = descripcion;
    this.abre = null;
    this.cierra = null;
    this.setAbre = function (dateString) {
        this.abre = new Date(dateString);
    };
    this.setCierra = function (dateString) {
        this.cierra = new Date(dateString);
    };
}

function loadAPI(){
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);
}

function display(jsonText) {

    var jsonObj = JSON.parse(jsonText);
    document.getElementById("titulo").innerHTML = jsonObj.titulo;
    document.getElementById("desc").innerHTML = jsonObj.desc;
    document.getElementById("abre").innerHTML = jsonObj.abre;
    document.getElementById("cierra").innerHTML = jsonObj.cierra;
    drawChart(jsonObj);
}

function drawChart(jsonObj) {
    // Draw the chart and set the chart values
    // google.charts.load('current', { 'packages': ['corechart'] });
    // google.charts.setOnLoadCallback(drawChart);

    // Create the data table.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Resultados');
    data.addColumn('number', 'Votos');
    var index;
    var rows = [];
    for (index in jsonObj.opciones){
        rows.push([jsonObj.opciones[index].opcion, parseFloat(jsonObj.opciones[index].votos)]);
    }
    
    data.addRows(rows);
    // Set chart options
    var options = {
        'title': 'Resultados',
        'width': '100%',
        'height': '100%'
    };

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('resultados'));
    chart.draw(data, options);

}

function requestResultados() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            display(this.responseText);
            document.getElementById("demo").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "src/controller/resultadosController.php", true);
    // xhttp.open("GET", "src/controller/encuestaController.php?diasAtras=7&diasAdelante=1", true);
    xhttp.send();
}
