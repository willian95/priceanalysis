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
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">Cerrar sesión</a>
                </li>
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
        @if(Auth::check() && Auth::user()->id)
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
            </li>
        </ul>
        @endif
    </div>
  </div>
</nav>