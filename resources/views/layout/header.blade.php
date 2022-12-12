<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bolão do IF</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ $page == 'welcome' ? 'active' : ''}}" aria-current="page" href="{{ route('welcome') }}">Home</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ $page == 'welcome' ? 'active' : ''}}" aria-current="page" href="{{ route('login.admin') }}">Admin</a>
                    </li>
                    
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ $page == 'apostas' ? 'active' : ''}}" href="{{ route('apostas') }}">Minhas Apostas</a>
                        </li>
                    @endauth

                    @if (Auth::guard('admin')->check()  && !($page == 'welcome'))
                        <div class="dropdown drop-admin">
                            <a class="btn btn-primary dropdown-toggle {{ $page == 'admin' ? 'active' : ''}}" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Usuários
                            </a>
                        
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('create.admin') }}">Adicionar Usuário</a>
                                <a class="dropdown-item" href="{{ route('show.users') }}">Listar Usuarios</a>
                            </div>
                        </div>
                        <div class="dropdown drop-admin">
                            <a class="btn btn-primary dropdown-toggle {{ $page == 'admin' ? 'active' : ''}}" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Jogos
                            </a>
                        
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('admin.jogos') }}">Adicionar Jogo</a>
                                <a class="dropdown-item" href="{{ route('show.jogos') }}">Listar Jogos</a>
                            </div>
                        </div>
                    @endif
                    
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary btn-search" type="submit">Search</button>
                </form>
                @if (Auth::guard('admin')->check())
                <form class="d-flex ms-3" action="{{ route('logout.admin') }}" method="GET">
                    @csrf
                    <button class="btn btn-primary" type="submit">Sair</button>
                </form>
                @endif
                @auth
                    <form class="d-flex ms-3" action="{{ route('logout') }}" method="GET">
                        @csrf
                        <button class="btn btn-primary" type="submit">Sair</button>
                    </form>
                @endauth

            </div>
        </div>
    </nav>
</header>