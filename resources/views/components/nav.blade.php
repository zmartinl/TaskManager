<nav>
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() === 'home' ? 'active' : '' }}" href="{{ route('home') }}">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() === 'adminPanel' ? 'active' : '' }}" href="{{ route('adminPanel') }}">Panel Administrador</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() === 'userPanel' ? 'active' : '' }}" href=" {{ route('userPanel') }} ">Panel Usuario</a>
        </li> 
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() === 'historic' ? 'active' : '' }}" href=" {{ route('historic') }} ">Historico</a>
        </li>
    </ul> 
</nav>
<hr>