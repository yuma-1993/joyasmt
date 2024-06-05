@extends('layouts.plantilla')
@section('titulo', 'Login')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('usuario.partials.menu_usuario')
            </div>
            <div class="col-md-9">
                <div class="col-md-9">
                    @if(auth()->guard('web')->check())
                        @auth('web')
                            <h1>Hola {{ auth()->guard('web')->user()->login }}</h1>
                            <p>Bienvenido/a a tu panel de usuario</p>
                        @endauth
                    @endif
                @include('layouts.partials.carrusel')
            </div>
        </div>
    </div>

@endsection

