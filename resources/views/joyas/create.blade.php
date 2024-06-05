@extends('layouts.plantilla')
@section('titulo', 'Creación de Joyas')
@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Crear Joya</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('joyas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                                @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" rows="5">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="municipio">Municipio:</label>
                                <select name="municipio" class="form-control">
                                    <option value="-------" disabled selected>-------</option>
                                    <option value="">Selecciona un municipio</option>
                                    <option value="Albalá">Albalá</option>
                                    <option value="Aldea del Cano">Aldea del Cano</option>
                                    <option value="Alcuéscar">Alcuéscar</option>
                                    <option value="Almoharín">Almoharín</option>
                                    <option value="Arroyomolinos">Arroyomolinos</option>
                                    <option value="Benquerencia">Benquerencia</option>
                                    <option value="Botija">Botija</option>
                                    <option value="Casas de Don Antonio">Casas de Don Antonio</option>
                                    <option value="Montánchez">Montánchez</option>
                                    <option value="Salvatierra de Santiago">Salvatierra de Santiago</option>
                                    <option value="Torre de Santa María">Torre de Santa María</option>
                                    <option value="Torremocha">Torremocha</option>
                                    <option value="Valdefuentes">Valdefuentes</option>
                                    <option value="Valdemorales">Valdemorales</option>
                                    <option value="Zarza de Montánchez">Zarza de Montánchez</option>
                                </select>
                                @error('municipio')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoría*:</label>
                                <select class="form-control @error('categoria') is-invalid @enderror" name="categoria" id="tcategoria">
                                    <option value="-------" disabled selected>-------</option>
                                    <option value="monumento">Monumento</option>
                                    <option value="museo">Museo</option>
                                    <option value="edificio">Edificio</option>
                                    <option value="escultura">Escultura</option>
                                    <option value="restaurante">Restaurante</option>
                                    <option value="bar">Bar</option>
                                    <option value="comercio local">Comercio local</option>
                                    <option value="hospedaje">Hospedaje</option>
                                    <option value="granja">Granja</option>
                                    <option value="actividad al aire libre">Actividad al aire libre</option>
                                    <option value="festival local">Festival local</option>
                                    <option value="parque natural">Parque natural</option>
                                    <option value="observación aves">Observación de aves</option>
                                    <option value="degustación de productos locales">Degustación de productos locales</option>
                                    <option value="taller artesanal">Taller artesanal</option>
                                    <option value="paseo en bicicleta">Paseo en bicicleta</option>
                                    <option value="avistamiento de fauna">Avistamiento de fauna</option>
                                    <option value="camping">Camping</option>
                                    <option value="visita a bodegas">Visita a bodegas</option>
                                    <option value="excursiones">Excursión</option>
                                    <option value="espeleología">Espeleología</option>
                                    <option value="observación astronómica">Observación astronómica</option>
                                    <option value="otro">Otro</option>
                                </select>
                                @error('categoria')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="imagen">Imagen:</label>
                                <input type="file" name="imagen" id="imagen">
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
