<div class="card col-md-3 bg-dark text-light menu">
    <div class="card-header">
        <h2 class="text-center mb-4">Panel de Administración</h2>
    </div>
    <div class="card-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.administrar_usuarios') }}">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.administrar_empresas') }}">Empresas</a>
            </li>
        </ul>
    </div>
</div>
