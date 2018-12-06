function Encuesta(id, titulo, descripcion) {
    this.id = id;
    this.titulo = titulo;
    this.descripcion = descripcion;
    this.abre = null;
    this.cierra = null;
    this.opciones = [];
    this.setAbre = function (dateString) {
        this.abre = new Date(dateString);
    };
    this.setCierra = function (dateString) {
        this.cierra = new Date(dateString);
    };
}

function Opcion(id, idEncuesta, opcion) {
    this.id = id;
    this.idEncuesta = idEncuesta;
    this.opcion = opcion;
}


function buildEncuesta(jsonObj) {
    var id_encuesta = jsonObj.id_encuesta;
    var titulo = jsonObj.titulo;
    var descripcion = jsonObj.desc;
    var encuesta = new Encuesta(id_encuesta, titulo, descripcion);
    encuesta.setAbre(jsonObj.abre);
    encuesta.setCierra(jsonObj.cierra);
    var i;
    for (i in jsonObj.opciones) {
        var opcionJSON = jsonObj.opciones[i];
        var opcion = new Opcion(opcionJSON.id_opcion, opcionJSON.id_encuesta, opcionJSON.opcion);
        encuesta.opciones.push(opcion);
    }
    return encuesta;
}

function display(jsonText) {
    var container = document.getElementById("form-voto");
    var jsonObj = JSON.parse(jsonText);

    var encuesta = buildEncuesta(jsonObj);
    var card = buildCard(encuesta);
    container.appendChild(card);

}

function buildCard(encuesta) {
    var cardDiv = document.createElement("div");
    // cardDiv.className = "card grid-item";
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
    cardButton.value = "Votar";
    cardButton.className = "card-button";

    // var form = document.createElement("form");
    // form.method = "POST";
    // form.action = "votar";
    var hidden = document.createElement("input");
    hidden.type = "hidden";
    hidden.name = "encuestaId";
    hidden.value = encuesta.id;

    cardDiv.appendChild(cardTitle);
    cardDiv.appendChild(cardText);
    cardDiv.appendChild(cardAbre);
    cardDiv.appendChild(cardCierra);

    var cardSelect = document.createElement("div");
    // cardSelect.name = "opciones";
    cardSelect.className = "container-card-radio";
    // cardSelect.required = true;

    var i;
    for (i in encuesta.opciones) {
        var opcion = encuesta.opciones[i];
        //opcion 2
        var radio = createRadio(opcion);
        cardSelect.appendChild(radio);

        //opcion 1
        // var radioNode = document.createElement("input");
        // radioNode.type = "radio";
        // radioNode.name = "opciones"
        // radioNode.value = opcion.id;
        // radioNode.required = true;
        // radioNode.className = "card-radio";
        // // optionNode.innerHTML = opcion.opcion;
        // var text = document.createTextNode(opcion.opcion);
        // var label = document.createElement("label");
        // label.appendChild(radioNode)
        // label.innerHTML = opcion.opcion;

        // // radioNode.appendChild(text);
        // // form.appendChild(radioNode);
        // // cardSelect.appendChild(radioNode);
        // cardSelect.appendChild(label);
    }

    // form.appendChild(cardSelect);
    cardDiv.appendChild(cardSelect);
    cardDiv.appendChild(cardButton);
    cardDiv.appendChild(hidden);

    // cardDiv.appendChild(form);
    return cardDiv;
}

function createRadio(opcion) {
    var radioHtml = "<label class=\"card-radio\"><input type='radio' name='opciones' value='" + opcion.id + "' required />" + " " + opcion.opcion + "</label>";
    var radioDiv = document.createElement("div");
    radioDiv.innerHTML = radioHtml;
    return radioDiv.firstChild;
}

function requestOpciones() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            display(this.responseText);
        }
    };
    xhttp.open("GET", "src/controller/votacionController.php", true);
    xhttp.send();
}
