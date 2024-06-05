document.addEventListener("DOMContentLoaded", function() {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/municipios", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let municipios = JSON.parse(xhr.responseText);
            let select = document.getElementById("municipio");
            municipios.forEach(function(municipio) {
                let option = document.createElement("option");
                option.value = municipio;
                option.textContent = municipio;
                select.appendChild(option);
            });
        }
    };
    xhr.send();
});