<div class="">
<nav class="navbar navbar-expand-lg navbar-light bg-light flex-column header__main">
    <a class="navbar-brand" href="{{ url('/') }}">PriceAnalysis</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav flex-column">
            @if(Auth::check() && Auth::user()->id)
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/category/index') }}">Categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/unit/index') }}">Unidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/product/index') }}">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/user/index') }}">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/verify-user/index') }}">Solicitudes de verificación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/email/index') }}">Emails</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">Cerrar sesión</a>
                </li>
            @endif
      
        @if(Auth::check() && Auth::user()->id)

            <li class="nav-item">
                <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
            </li>
        </ul>
        @endif
    </div>
</nav>
    
</div>