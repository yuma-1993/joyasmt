@extends('layouts.plantilla')
@section('titulo', 'Ficha Joya: ' . $joya->nombre)
@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Joya: {{ $joya->nombre }}</h1>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Categoría: {{ $joya->categoria }}</p>
                        <p class="card-text">Descripción: {{ $joya->descripcion }}</p>
                        <img class="mb-2" src="{{ asset('assets/imagen/' . $joya->imagen) }}" alt="" width="60%">
                        <br>
                        <!-- Boton editar o eliminar en función de si la joya es del usuario o de la empresa que lo creó -->
                        @if((auth('web')->check() && auth('web')->user()->id == $joya->usuario_id) || (auth('web')->check() && auth('web')->user()->rol == 'admin'))
                            <a href="{{ route('joyas.edit', $joya) }}" class="btn btn-primary">Editar Joya</a>
                            <form action="{{ route('joyas.destroy', $joya) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        @endif
                        @if((auth('empresa')->check() && auth('empresa')->user()->id == $joya->empresa_id) || (auth('web')->check() && auth('web')->user()->rol == 'admin'))
                            <a href="{{ route('joyas.edit', $joya) }}" class="btn btn-primary">Editar Joya</a>
                            <form action="{{ route('joyas.destroy', $joya) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        @endif
                        <a href="{{ route('home') }}" class="btn btn-secondary">Volver a Joyas</a>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function borrarSessionStorage() {
            sessionStorage.clear();
        }
    </script>
@endsection
