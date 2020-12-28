<div class="">
<nav class="navbar navbar-expand-lg navbar-light  flex-column header__main">
    <a class="navbar-brand" href="{{ url('/') }}">PriceAnalysis</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav flex-column">
            @if(Auth::check() && Auth::user()->id)

                 <li class="nav-item">
                     <a class="nav-link" href=""> <img class="filter" src="{{ asset('assets/img/iconos/bx-dashboard.svg') }}" alt="">Dashboard </a>
                 </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/category/index') }}"><img class="filter" src="{{ asset('assets/img/iconos/bx-grid-alt.svg') }}" alt="">Categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/unit/index') }}"><img class="filter"  src="{{ asset('assets/img/iconos/bx-square.svg') }}" alt="">Unidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/brand/index') }}"><img class="filter"  src="{{ asset('assets/img/iconos/bx-box.svg') }}" alt="">Marcas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/product/index') }}"><img class="filter"  src="{{ asset('assets/img/iconos/bx-box.svg') }}" alt="">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/user/index') }}"><img class="filter"  src="{{ asset('assets/img/iconos/bx-group.svg') }}" alt=""> Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/blogs/index') }}"><img class="filter"  src="{{ asset('assets/img/iconos/bx-group.svg') }}" alt=""> Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/post/index') }}"><img class="filter"  src="{{ asset('assets/img/iconos/bx-group.svg') }}" alt=""> Publicaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/verify-user/index') }}"><img class="filter"  src="{{ asset('assets/img/iconos/bx-list-plus.svg') }}" alt="">Solicitudes de verificación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/email/index') }}"><img class="filter" src="{{ asset('assets/img/iconos/bx-envelope.svg') }}" alt="">Emails</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}"><img class="filter"  src="{{ asset('assets/img/iconos/bx-log-in.svg') }}" alt="">Cerrar sesión</a>
                </li>
            @endif
      
        @if(Auth::check() && Auth::user()->id)

            <li class="nav-item">
                <a class="nav-link" href="#"><img class="filter"  src="{{ asset('assets/img/iconos/bx-user.svg') }}" alt="">{{ Auth::user()->name }}</a>
            </li>
        </ul>
        @endif
    </div>
</nav>
    
</div>