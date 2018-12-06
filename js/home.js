function Encuesta(id, titulo, descripcion) {
    this.id = id;
    this.titulo = titulo;
    this.descripcion = descripcion;
    this.abre = null;
    this.cierra = null;
    this.votado = null;
    this.setAbre = function (dateString) {
        this.abre = new Date(dateString);
    };
    this.setCierra = function (dateString) {
        this.cierra = new Date(dateString);
    };
}

function Opcion(opcion) {
    this.opcion = opcion;
}

function buildEncuesta(jsonObj) {
    var id_encuesta = jsonObj.id_encuesta;
    var titulo = jsonObj.titulo;
    var descripcion = jsonObj.descripcion;
    var encuesta = new Encuesta(id_encuesta, titulo, descripcion);
    encuesta.setAbre(jsonObj.abre);
    encuesta.setCierra(jsonObj.cierra);
    if (jsonObj.votado) {
        encuesta.votado = new Opcion(jsonObj.votado);
    }
    return encuesta;
}

function display(jsonText) {
    var container = document.getElementById("container");
    while(container.lastChild){
        container.removeChild(container.lastChild);
    }
    var jsonArray = JSON.parse(jsonText);
    var encuestas = [];
    for (i in jsonArray) {
        var encuesta = buildEncuesta(jsonArray[i]);
        var card = buildCard(encuesta);
        container.appendChild(card);
    }
}

function buildCard(encuesta) {
    var cardDiv = document.createElement("div");
    cardDiv.className = "card grid-item";
    var cardTitle = document.createElement("h3");
    cardTitle.className = "card-title";
    cardTitle.innerHTML = encuesta.titulo;
    var cardText = document.createElement("p");
    cardText.className = "card-text";
    cardText.innerHTML = encuesta.descripcion;

    var cardAbre = document.createElement("p");
    cardAbre.className = "text-muted";
    cardAbre.innerHTML = "Abre: " + encuesta.abre.toLocaleString();

    var cardCierra = document.createElement("p");
    cardCierra.className = "text-muted";
    cardCierra.innerHTML = "Cierra: " + encuesta.cierra.toLocaleString();

    var cardButton = document.createElement("input");
    cardButton.type = "submit";
    cardButton.className = "card-button";
    // si cierra despues que hora actual permite votar
    if (encuesta.cierra > new Date()) {
        cardButton.value = "Votar";
    } else {
        cardButton.value = "Resultados";
    }
    if (encuesta.abre > new Date()) {
        cardButton.disabled = true;
    }

    var form = document.createElement("form");
    form.method = "POST";
    form.action = "src/controller/encuesta.php";
    var hidden = document.createElement("input");
    hidden.type = "hidden";
    hidden.name = "encuestaId";
    hidden.value = encuesta.id;

    form.appendChild(cardTitle);
    form.appendChild(cardText);
    form.appendChild(cardAbre);
    form.appendChild(cardCierra);

    if (encuesta.votado) {
        var cardVotado = document.createElement("p");
        cardVotado.className = "text-bold";
        cardVotado.innerHTML = "Votaste: " + encuesta.votado.opcion;
        form.appendChild(cardVotado);
    }

    form.appendChild(cardButton);
    form.appendChild(hidden);

    cardDiv.appendChild(form);
    return cardDiv;
}


function requestEncuestas() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            display(this.responseText);
        }
    };
    var abre = document.getElementById("abre-date").value;
    var cierra = document.getElementById("cierra-date").value;
    xhttp.open("GET", "src/controller/encuestaController.php?abre=" + abre + "&cierra=" + cierra, true);
    xhttp.send();
}
