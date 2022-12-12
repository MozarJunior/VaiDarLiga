@extends('layout.main')

@section('title', 'Listagem dos Usuários')
@section('css')
<link rel="stylesheet" href="{{ url('assets/css/admin.css') }}">
@endsection
@php
    $page = '';
    $numApostas = 0
@endphp
@section('content')
    <section id="usuarios">
        <div class="container p-5">
            <div class="row">
                @foreach ($users as $user)
                    @if ($numApostas > 0)
                        @php
                            $numApostas = 0
                        @endphp
                    @endif
                    @foreach ($apostas as $aposta)
                            @if ($aposta->user_id == $user->id)
                                @php
                                    $numApostas = $numApostas + 1;
                                @endphp
                            @endif
                    @endforeach
                    <div class="col-12 col-md-4 ">
                        <div class="card-body">
                            <div class="d-flex justify-content-around align-items-center h-100">
                                <div class="card p-3 m-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $user->nome }}</h5>
                                        <p class="card-text">E-mail: {{ $user->email }}</p>
                                        <p class="card-text">Quantidade de Apostas: {{ $numApostas }}</p>
                                        <p class="card-text">Data de Criação: {{ date('d/m/Y', strtotime($user->created_at)) }}</p>
                                        <a class="btn btn-primary" href="{{ route('update', $user->id) }}">Atualizar dados</a>
                                        <form action="{{ route('delete.user', $user->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Remover Usuário</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
@endsection