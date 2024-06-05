<header class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <img src="{{ asset('/assets/logo.png') }}" alt="Descripción de la imagen" class="logo">
        <h1 class="navbar-brand"></h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('home') ? 'active' : ''}}" href="{{route('home')}}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('nosotros') ? 'active' : ''}}" href="{{route('nosotros')}}">Nosotros</a>
                </li>
                
                <!-- Si el usuario o empresa no está logeado -->
                @guest('web')
                @guest('empresa')
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('login') ? 'active' : ''}}" href="{{route('login')}}">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('registrar') ? 'active' : ''}}" href="{{route('registrar')}}">Registrar usuario</a>
                </li>
                @endguest
                @endguest

                <!-- Si el usuario o empresa está logeado -->
                @auth('web')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
                @endauth

                @auth('empresa')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
                @endauth

                <!-- Si el usuario es logeado como admin -->
                @auth('web')
                @if(auth('web')->user()->rol == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.panel') }}">Admin</a>
                </li>
                @endif
                @endauth

                <!-- Si el usuario está logeado y además su rol es usuario -->
                @auth('web')
                @if(auth('web')->user()->rol == 'usuario')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('usuario.panel') ? 'active' : '' }}" href="{{ route('usuario.panel') }}">Panel de usuario</a>
                </li>
                @endif
                @endauth

                <!-- Si la empresa está logeado y además su rol es empresa -->
                @auth('empresa')
                @if(auth('empresa')->user()->rol == 'empresa')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('empresa.panel') ? 'active' : '' }}" href="{{ route('empresa.panel') }}">Panel de empresa</a>
                </li>
                @endif
                @endauth

            </ul>
        </div>
    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbarToggle = document.querySelector('.navbar-toggler');

        const navbarCollapse = document.querySelector('.navbar-collapse');

        navbarToggle.addEventListener('click', function() {
            navbarCollapse.classList.toggle('show');
        });
    });
</script>