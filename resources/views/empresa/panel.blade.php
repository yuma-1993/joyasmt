@extends('layouts.plantilla')
@section('titulo', 'Login')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('empresa.partials.menu_empresa')
            </div>
            <div class="col-md-9">
                @if(auth()->guard('empresa')->check())
                    @auth('empresa')
                        <h1>Hola {{ auth()->guard('empresa')->user()->login }}</h1>
                        <p>Bienvenido/a a tu panel de empresa</p>
                    @endauth
                @endif
                @include('layouts.partials.carrusel')
            </div>
        </div>
    </div>

@endsection

