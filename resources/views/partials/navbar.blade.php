<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{url('/')}}">LoloSports</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/catalogo')}}">Artículos<span class="sr-only"></span></a>
            </li>
            @if(Auth::check() )
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/cesta')}}">Cesta</a>
                </li>
                @if(Auth::user()->rol == "administrador")
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/control')}}">Administración</a>
                    </li>
                @endif
            @endif
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/api/articulos')}}">API<span class="sr-only"></span></a>
            </li>
        </ul>

        <ul class="navbar-nav navbar-right">
            @if(Auth::check() )
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/miPerfil')}}">Mi perfil</a>
                </li>
                <li class="nav-item">
                    <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                            Cerrar sesión
                        </button>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/register')}}">Registrar</a>
                </li>
            @endif
        </ul>
    </div>
</nav>