document.addEventListener("DOMContentLoaded", function() {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/categorias", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let categorias = JSON.parse(xhr.responseText);
            let select = document.getElementById("categoria");
            categorias.forEach(function(categoria) {
                let option = document.createElement("option");
                option.value = categoria;
                option.textContent = categoria;
                select.appendChild(option);
            });
        }
    };
    xhr.send();
});