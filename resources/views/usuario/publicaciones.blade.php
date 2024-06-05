@extends('layouts.plantilla')
@section('titulo', 'Login')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('usuario.partials.menu_usuario')
            </div>
            <div class="col-md-9">
                <div class="table-responsive"> 
                    <table class="table tabla_publicaciones"> 
                        <thead class="thead-dark"> 
                            <tr>
                                <th scope="col">Imagen</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Municipio</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Acción</th> 
                            </tr>
                        </thead>
                        <tbody class="tbody_tabla_publicaciones">
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log({{ auth()->guard('web')->id() }});
    // Función para hacer la solicitud AJAX y actualizar la tabla de publicaciones
    function obtenerUsuarioJoyas(usuarioId) {
        fetch(`/usuario_publicaciones/${usuarioId}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                const tabla = document.querySelector('.tbody_tabla_publicaciones');

                data.forEach(joya => {
                    const fila = document.createElement('tr');
                    fila.innerHTML = `
                        <td><img src="./assets/imagen/${joya.imagen}" alt="${joya.nombre}" style="max-width: 100px;"></td>
                        <td>${joya.nombre}</td>
                        <td>${joya.municipio}</td>
                        <td>${joya.descripcion}</td>
                        <td><a class="btn btn-dark" href="/joyas/${joya.id}">Ver detalle</a></td>
                    `;
                    tabla.appendChild(fila);
                });
            })
            .catch(error => console.error('Error al obtener datos:', error));
    }

    obtenerUsuarioJoyas({{ auth()->guard('web')->id() }});
});

</script>
