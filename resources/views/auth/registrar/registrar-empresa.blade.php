@extends('layouts.plantilla')
@section('titulo', 'Registrar usuario')
@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Registrar empresa</h1>
                        <p>Los campos con (*) son obligatorios</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('registrar-empresa') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="login">Nombre de identificación de la empresa*:</label>
                                <input type="text" class="form-control @error('login') is-invalid @enderror" name="login" id="login" value="{{ old('login') }}">
                                @error('login')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña*:</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirmar Contraseña*:</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                            </div>
                            <div class="form-group">
                                <label for="email">Email*:</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre de la empresa*:</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" value="{{ old('nombre') }}">
                                @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción de la actividad*:</label>
                                <input type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" value="{{ old('descripcion') }}">
                                @error('descripcion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="municipio">Municipio*:</label>
                                <input type="text" class="form-control @error('municipio') is-invalid @enderror" name="municipio" id="municipio" value="{{ old('municipio') }}">
                                @error('municipio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="codigo_postal">Codigo Postal*:</label>
                                <input type="text" class="form-control @error('codigo_postal') is-invalid @enderror" name="codigo_postal" id="codigo_postal" value="{{ old('codigo_postal') }}">
                                @error('codigo_postal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección*:</label>
                                <input type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" id="direccion" value="{{ old('direccion') }}">
                                @error('direccion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="web">Web:</label>
                                <input type="text" class="form-control @error('web') is-invalid @enderror" name="web" id="web" value="{{ old('web') }}">
                                @error('web')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tipo">Tipo*:</label>
                                <select class="form-control @error('tipo') is-invalid @enderror" name="tipo" id="tipo">
                                    <option value="-------" disabled selected>-------</option>
                                    <option value="hosteleria" {{ old('tipo') == 'hosteleria' ? 'selected' : '' }}>Hostelería</option>
                                    <option value="hospedaje" {{ old('tipo') == 'hospedaje' ? 'selected' : '' }}>Hospedaje</option>
                                    <option value="ganaderia" {{ old('tipo') == 'ganaderia' ? 'selected' : '' }}>Ganadería</option>
                                    <option value="agricultura" {{ old('tipo') == 'agricultura' ? 'selected' : '' }}>Agricultura</option>
                                    <option value="comercio_minorista" {{ old('tipo') == 'comercio_minorista' ? 'selected' : '' }}>Comercio Minorista</option>
                                    <option value="alimentacion" {{ old('tipo') == 'alimentacion' ? 'selected' : '' }}>Alimentación</option>
                                    <option value="entretenimiento" {{ old('tipo') == 'entretenimiento' ? 'selected' : '' }}>Entretenimiento</option>
                                    <option value="arte_y_cultura" {{ old('tipo') == 'arte_y_cultura' ? 'selected' : '' }}>Arte y Cultura</option>
                                    <option value="comunicacion_y_medios" {{ old('tipo') == 'comunicacion_y_medios' ? 'selected' : '' }}>Comunicación y Medios</option>
                                    <option value="servicios_publicos" {{ old('tipo') == 'servicios_publicos' ? 'selected' : '' }}>Servicios Públicos</option>
                                </select>
                                @error('tipo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" name="enviar" class="btn btn-dark btn-block">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

