@extends('layouts.plantilla')
@section('titulo', 'Login Usuario')
@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Inicio de sesión de usuarios</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            @if(isset($error))
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="login">Login:</label>
                                <input type="text" class="form-control @error('login') is-invalid @enderror" name="login" id="login" value="{{ old('login') }}">
                                @error('login')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" name="enviar" class="btn btn-dark btn-block">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
