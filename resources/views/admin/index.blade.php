<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bolão do IF - Pagina do Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ url('assets/css/admin.css') }}">
</head>
@php
    $page = '';
@endphp
<body>
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
                        <a class="nav-link" aria-current="page" href="{{ route('welcome') }}">Home</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                @if (Auth::guard('admin')->check())
                    <form class="d-flex ms-3" action="{{ route('logout.admin') }}" method="GET">
                        @csrf
                        <button class="btn btn-outline-success" type="submit">Sair</button>
                    </form>    
                @endif

            </div>
        </div>
    </nav>

    <section id="administracao">
        <div class="container">
            <div class="p-3">
                <div class="row">
                    <div class="col-12 d-flex flex-column justify-content-center">
                        <p class="text-center fs-1 admin-p">Bem vindo</p>
                        <p class="text-center fs-4 admin-p">Está é a area de administração do sistema</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card my-3 flex-column align-items-center d-flex p-3">
                                <img src="{{ url('assets/img/perfil.png') }}" alt="Perfil" class="perfil">
                                <p class="text-center fs-4 mb-2">Administrador do Sistema</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card p-3 mb-3">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div class="d-flex justify-content-evenly align-items-center h-100">
                                <div class="card p-3 m-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Administrar Usuários</h5>
                                        <p class="card-text">Você pode adicionar novos usuários.</p>
                                        <p class="card-text">Você pode listar, atualizar ou excluir um usuário.</p>
                                        <div class="dropdown drop-admin">
                                                <a class="btn btn-primary dropdown-toggle {{ $page == 'admin' ? 'active' : ''}}" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Usuários
                                                </a>
                                            
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="{{ route('create.admin') }}">Adicionar Usuário</a>
                                                    <a class="dropdown-item" href="{{ route('show.users') }}">Listar Usuarios</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-3 m-3">
                                        <div class="card-body">
                                            <h5 class="card-title">Administrar Jogos</h5>
                                            <p class="card-text">Você pode adicionar novos jogos.</p>
                                            <p class="card-text">Você pode listar, atualizar ou excluir um jogo.</p>
                                            <div class="dropdown drop-admin">
                                                <a class="btn btn-primary dropdown-toggle {{ $page == 'admin' ? 'active' : ''}}" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Jogos
                                                </a>
                                            
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="{{ route('admin.jogos') }}">Adicionar Jogo</a>
                                                    <a class="dropdown-item" href="{{ route('show.jogos') }}">Listar Jogos</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @extends('layout.footer')
</body>

</html>
