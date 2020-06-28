<nav class="navbar navbar-expand-lg ">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        
            @if(Auth::check() && Auth::user()->id)
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/post/index') }}">Publicar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/profile') }}">Mis datos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/my-posts') }}">Mis publicaciones</a>
                </li>
                @if(Auth::user()->role_id == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/dashboard') }}">Administrador</a>
                    </li>
                @endif
               <!--- <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">Cerrar sesión</a>
                </li>--->
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/businesses') }}">Empresas</a>
            </li>
            @if(Auth::guest())
        
            <li class="nav-item">
                <a class="nav-link " href="{{ url('/register') }}">Registro</a>
            </li>
            <li class="nav-item">
                
                <a class="nav-link btn-general" href="{{ url('/login') }}">Login</a>
            </li>
        @endif
        </ul>
    <div class="navbar-expand-md  navbar-hover ">
        <div class="collapse navbar-collapse" id="navbarHover">
            <ul class="navbar-nav">      
                @if(Auth::check() && Auth::user()->id)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">            
                    <li>
                        <a class="dropdown-item" href="{{ url('/logout') }}">Cerrar sesión <i class="fa fa-sign-out"></i></a></li>
                       
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
    </div>
  </div>
</nav>