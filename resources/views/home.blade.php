@extends('layouts.plantilla')
@section('titulo', 'Las Joyas de Montánchez y Trasierra')
@section('contenido')
<div class="container mt-5">
    @if(auth()->guard('web')->check())
        @auth('web')
            <div class="bienvenida">
                <h1 class="text-center mb-4">Bienvenido/a {{ auth()->guard('web')->user()->login }}</h1>
            </div>
        @endauth
    @endif
    @if(auth()->guard('empresa')->check())
        @auth('empresa')
            <div class="bienvenida">
                <h1 class="text-center mb-4">Bienvenido/a {{ auth()->guard('empresa')->user()->login }}</h1>
            </div>
        @endauth
    @endif
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form id="consultaJoyas" data-route="{{ route('consultar.joyas') }}">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" class="form-control form-control-sm text-center placeholder-black" placeholder="Nombre" name="nombre" id="nombre">
                </div>
                <div class="form-group mb-3">
                    <label for="categoria"></label>
                    <select class="form-control form-control-sm custom-select text-center" name="categoria" id="categoria">
                        <option value="">Categoría</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="municipio"></label>
                    <select class="form-control form-control-sm custom-select text-center" name="municipio" id="municipio">
                        <option value="">Municipio</option>
                    </select>
                </div>
                
                <div class="form-group mb-3 d-flex flex-column flex-md-row justify-content-center align-items-center">
                    <button type="submit" class="btn btn-dark btn-sm mb-2 mb-md-0 mx-2">Buscar joyas</button>
                    <button type="button" class="btn btn-secondary btn-sm mx-2" onclick="borrarSessionStorage()">Vaciar tesoro de joyas</button>
                </div>
                
                
            </form>
        </div>
    </div>

    <div id="container" class="container">
        
    </div>

    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                    <div class="card-body">
                        <h2 class="card-title">Quiénes somos</h2>
                        <p class="card-text">Somos una empresa dedicada al turismo rural sostenible y ecológico en Montánchez y Trasierra. Nuestro objetivo es promover experiencias auténticas en la naturaleza y contribuir a la preservación del medio ambiente.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    
    
</div>

<script>
    var rutaBase = "{{ url('/joyas/') }}";
</script>
<script src="{{ asset('js/scripts/joyas/vaciarJoyas.js') }}"></script>
<script src="{{ asset('js/scripts/joyas/sesionJoyas.js') }}"></script>
<script src="{{ asset('js/scripts/joyas/buscadorJoyas.js') }}"></script>
<script src="{{ asset('js/scripts/joyas/obtenerCategorias.js') }}"></script>
<script src="{{ asset('js/scripts/joyas/obtenerMunicipios.js') }}"></script>
@endsection
