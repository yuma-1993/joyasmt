@extends('layouts.plantilla')
@section('titulo', 'Registrar')
@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Registrar</h1>
                    </div>
                    <div class="card-body">
                        <h2><a href="{{route('registrar-usuario')}}">Usuario</a></h2>
                        <h2><a href="{{route('registrar-empresa')}}">Empresa</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

