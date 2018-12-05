function display(jsonText) {

    var jsonObj = JSON.parse(jsonText);
    document.getElementById("titulo").innerHTML = jsonObj.titulo;
    document.getElementById("desc").innerHTML = jsonObj.desc;
    document.getElementById("abre").innerHTML = jsonObj.abre;
    document.getElementById("cierra").innerHTML = jsonObj.cierra;
    
    var tbody = document.getElementById("resultados");
    var index;
    for (index in jsonObj.opciones){
        var row = tbody.insertRow();
        row.insertCell(0).innerHTML = jsonObj.opciones[index].opcion;
        row.insertCell(1).innerHTML = jsonObj.opciones[index].votos;
    }
}

function requestResultados() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            display(this.responseText);
            // document.getElementById("demo").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "src/controller/resultadosController.php", true);
    xhttp.send();
}
