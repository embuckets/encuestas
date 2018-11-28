function newOption() {
    if (document.getElementById("myInput").value === ''){
        alert("Las opciones no pueden ser vacias");
        return;
    }

    var optionsContainer = document.getElementById("myOptions");
    
    var newOption = document.createElement("input");
    var deleteBtn = document.createElement("span");
    
    var optionDiv = document.createElement("div");
    optionDiv.appendChild(newOption);
    optionDiv.appendChild(deleteBtn);
    optionsContainer.appendChild(optionDiv);


    newOption.value = document.getElementById("myInput").value;
    newOption.name = "options[]";
    newOption.disabled = true;
    newOption.className = "form-crear-input-opc disabled";


    deleteBtn.innerHTML = "\u00D7";
    deleteBtn.className = "form-crear-del";
    deleteBtn.onclick = function () {
        var children = optionsContainer.children;
        optionsContainer.removeChild(optionDiv);
    }
    document.getElementById("myInput").value = '';
}