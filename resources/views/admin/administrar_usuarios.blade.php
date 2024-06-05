@extends('layouts.plantilla')
@section('titulo', 'Login')
@section('contenido')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.menu_admin')
            <div class="col-md-9 contenido">
                <div id="estadisticas" class="p-4">
                    <h1>Panel de Administrador</h1>
                    <form id="consultaForm">
                        @csrf
                        <label for="id">ID:</label>
                        <input type="text" class="form-control" name="ID" id="ID" value="">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" value="">
                        <button type="submit">Consultar</button>
                    </form>

                    <div id="resultados">
                        <table id="tablaResultados" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                
                    <script>
                        document.getElementById('consultaForm').addEventListener('submit', function(event) {
                            event.preventDefault();
                    
                            let ID = document.getElementById('ID').value;
                            let nombre = document.getElementById('nombre').value;
                            let apellido = document.getElementById('apellido').value;
                    
                            let url = "{{ route('consultar.estadisticas.usuarios') }}";
                            url += "?ID=" + ID + "&nombre=" + nombre + "&apellido=" + apellido;
                    

                            fetch(url)
                                .then(response => response.json())
                                .then(data => {
                                    let tabla = document.getElementById('tablaResultados').getElementsByTagName('tbody')[0];
                                    tabla.innerHTML = '';
                    
                                    data.forEach(function(usuario) {
                                        let row = '<tr>';
                                        row += '<td>' + usuario.id + '</td>';
                                        row += '<td>' + usuario.nombre + '</td>';
                                        row += '<td>' + usuario.apellido + '</td>';
                                        row += '<td><button class="btn btn-danger" onclick="eliminarUsuario(' + usuario.id + ')">Eliminar</button></td>';
                                        row += '</tr>';
                    
                                        tabla.innerHTML += row;
                                    });
                                })
                                .catch(error => console.error('Error:', error));
                        });

                        function eliminarUsuario(id) {
                            if (confirm('¿Estás seguro de que quieres eliminar este usuario?')) {
                                fetch("{{ url('eliminar-usuario') }}/" + id, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                })
                                .then(response => {
                                    if (response.ok) {
                                        consultarEstadisticas();
                                        alert('Usuario eliminado correctamente');
                                    } else {
                                        alert('Hubo un problema al eliminar el usuario');
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                            }
                        }

                        function consultarEstadisticas() {
                            let ID = document.getElementById('ID').value;
                            let nombre = document.getElementById('nombre').value;
                            let apellido = document.getElementById('apellido').value;

                            let url = "{{ route('consultar.estadisticas.usuarios') }}";
                            url += "?ID=" + ID + "&nombre=" + nombre + "&apellido=" + apellido;

                            fetch(url)
                                .then(response => response.json())
                                .then(data => {
                                    let tabla = document.getElementById('tablaResultados').getElementsByTagName('tbody')[0];
                                    tabla.innerHTML = '';

                                    data.forEach(function(usuario) {
                                        let row = '<tr>';
                                        row += '<td>' + usuario.id + '</td>';
                                        row += '<td>' + usuario.nombre + '</td>';
                                        row += '<td>' + usuario.apellido + '</td>';
                                        row += '<td><button class="btn btn-danger" onclick="eliminarUsuario(' + usuario.id + ')">Eliminar</button></td>';
                                        row += '</tr>';

                                        tabla.innerHTML += row;
                                    });
                                })
                                .catch(error => console.error('Error:', error));
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
