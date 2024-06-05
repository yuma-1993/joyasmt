<div class="card">
    <div class="card-header">
        <h3 class="card-title">Menú de Herramientas</h3>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item"><a href="{{ route('usuario.panel') }}">Mi perfil</a></li>
            @if(auth()->check())
            <li class="list-group-item">
                <a class="{{request()->routeIs('joyas.create') ? 'active' : ''}}" href="{{ route('joyas.create') }}">Crear Joya</a>
            </li>
            @endif
            <li class="list-group-item"><a href="{{ route('usuario.publicaciones') }}">Publicaciones</a></li>
        </ul>
    </div>
</div>