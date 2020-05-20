<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @if(Auth::guest())
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">Registro</a>
                </li>
            @endif
            @if(Auth::check() && Auth::user()->id)
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/post/index') }}">Publicar</a>
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
</nav>