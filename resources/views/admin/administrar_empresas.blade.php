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
                        <label for="descripcion">Descripción:</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" value="">
                        <button type="submit">Consultar</button>
                    </form>

                    <div id="resultados">
                        <table id="tablaResultados" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
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
                            let descripcion = document.getElementById('descripcion').value;
                    
                            let url = "{{ route('consultar.estadisticas.empresas') }}";
                            url += "?ID=" + ID + "&nombre=" + nombre + "&descripcion=" + descripcion;
                    
                            fetch(url)
                                .then(response => response.json())
                                .then(data => {
                                    let tabla = document.getElementById('tablaResultados').getElementsByTagName('tbody')[0];
                                    tabla.innerHTML = '';
                    
                                    data.forEach(function(empresa) {
                                        let row = '<tr>';
                                        row += '<td>' + empresa.id + '</td>';
                                        row += '<td>' + empresa.nombre + '</td>';
                                        row += '<td>' + empresa.descripcion + '</td>';
                                        row += '<td><button class="btn btn-danger" onclick="eliminarEmpresa(' + empresa.id + ')">Eliminar</button></td>';
                                        row += '</tr>';
                    
                                        tabla.innerHTML += row;
                                    });
                                })
                                .catch(error => console.error('Error:', error));
                        });

                        function eliminarEmpresa(id) {
                            if (confirm('¿Estás seguro de que quieres eliminar esta empresa?')) {
                                fetch("{{ url('eliminar-empresa') }}/" + id, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                })
                                .then(response => {
                                    if (response.ok) {
                                        consultarEstadisticas();
                                        alert('Empresa eliminada correctamente');
                                    } else {
                                        alert('Hubo un problema al eliminar la empresa');
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                            }
                        }

                        function consultarEstadisticas() {
                            let ID = document.getElementById('ID').value;
                            let nombre = document.getElementById('nombre').value;
                            let descripcion = document.getElementById('descripcion').value;

                            let url = "{{ route('consultar.estadisticas.empresas') }}";
                            url += "?ID=" + ID + "&nombre=" + nombre + "&descripcion=" + descripcion;

                            fetch(url)
                                .then(response => response.json())
                                .then(data => {
                                    let tabla = document.getElementById('tablaResultados').getElementsByTagName('tbody')[0];
                                    tabla.innerHTML = '';

                                    data.forEach(function(empresa) {
                                        let row = '<tr>';
                                        row += '<td>' + empresa.id + '</td>';
                                        row += '<td>' + empresa.nombre + '</td>';
                                        row += '<td>' + empresa.descripcion + '</td>';
                                        row += '<td><button class="btn btn-danger" onclick="eliminarEmpresa(' + empresa.id + ')">Eliminar</button></td>';
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
