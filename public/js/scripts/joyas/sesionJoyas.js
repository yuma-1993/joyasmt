window.addEventListener('DOMContentLoaded', function() {
    let nombre = sessionStorage.getItem('nombre');
    let categoria = sessionStorage.getItem('categoria');
    let municipio = sessionStorage.getItem('municipio');

    if (nombre || categoria || municipio) {
        let route = document.getElementById('consultaJoyas').getAttribute('data-route');
        let url = route + "?nombre=" + nombre + "&categoria=" + categoria + "&municipio=" + municipio;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                let container = document.getElementById('container');
                container.innerHTML = '';

                data.forEach(function(joyas) {

                let joya = document.createElement('div');
                joya.classList.add('joya', 'row', 'm-3', 'border', 'p-3');

                let imagenLink = document.createElement('a');
                imagenLink.href = rutaBase + "/" + joyas.id;
                imagenLink.classList.add('col-md-6');
                let imagen = document.createElement('img');
                imagen.src = './assets/imagen/' + joyas.imagen; 
                imagen.classList.add('img-fluid', 'w-100');
                imagenLink.appendChild(imagen);
                joya.appendChild(imagenLink);

                let detallesLink = document.createElement('a');
                detallesLink.href = rutaBase + "/" + joyas.id;
                detallesLink.classList.add('col-md-6');

                let detallesDiv = document.createElement('div');
                detallesDiv.classList.add('detalles');

                let nombreH1 = document.createElement('h1');
                nombreH1.classList.add('nombre');
                nombreH1.textContent = joyas.nombre;
                detallesDiv.appendChild(nombreH1);

                let municipioP = document.createElement('p');
                municipioP.textContent = "Municipio: " + joyas.municipio;
                detallesDiv.appendChild(municipioP);

                let categoriaP = document.createElement('p');
                categoriaP.textContent = "Categoría: " + joyas.categoria;
                detallesDiv.appendChild(categoriaP);

                let descripcionP = document.createElement('p');
                descripcionP.textContent = joyas.descripcion;
                detallesDiv.appendChild(descripcionP);

                detallesLink.appendChild(detallesDiv);
                joya.appendChild(detallesLink);

                container.appendChild(joya);
            });
        })
        .catch(error => console.error('Error:', error));
    }
});