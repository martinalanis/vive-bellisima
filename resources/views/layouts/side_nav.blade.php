<div class="sidebar" data-color="purple" data-background-color="white">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <img src="{{asset('img/logo.png')}}" alt="" class="logoside"/>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav" >
            <li class="nav-item {{ request()->path() === '/' ? 'active':'' }}">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="material-icons text-info">dashboard</i>
                    <p>Escritorio</p>
                </a>
            </li>
            <li class="nav-item {{ active('usuarios') }}">
                <a class="nav-link" href="{{ route('usuarios.index') }}">
                    <i class="material-icons text-info">people</i>
                    <p>Usuarios</p>
                </a>
            </li>
            <li class="nav-item {{ active('almacen') }}">
                <a class="nav-link" href="./almacen.html">
                    <i class="material-icons text-info">store</i>
                    <p>Almacen</p>
                </a>
            </li>
            <li class="nav-item {{ active('reportes') }}">
                <a class="nav-link" href="./reportes.html">
                    <i class="material-icons text-info">playlist_add_check</i>
                    <p>Reportes</p>
                </a>
            </li>
            
        </ul>
    </div>
</div>