@extends('layouts.plantilla')
@section('titulo', 'Listado de Joyas')
@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-3xl font-bold mb-4">Listado de joyas</h1>
                @auth('web')
                    <a href="{{ route('joyas.create') }}" class="btn btn-primary mb-4">Crear Joya</a>
                @endauth
                @auth('empresa')
                    <a href="{{ route('joyas.create') }}" class="btn btn-primary mb-4">Crear Joya</a>
                @endauth
                    
                
                <ul class="list-group">
                    @foreach ($joyas as $joya)
                        <a href="{{ route('joyas.show', $joya->id) }}">
                            {{ $joya->nombre }}  ({{ ($joya->usuario)->nombre ?? ($joya->empresa)->nombre }})
                        </a>
                    @endforeach
                </ul>
                <div class="mt-4">
                    {{ $joyas->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    
@endsection
