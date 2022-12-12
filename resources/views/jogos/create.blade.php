@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ url('assets/css/jogos.css') }}">
@endsection

@section('title', 'Cadastro de Jogos')
@php
    $page = 'jogos';
@endphp


@section('content')

<div class="col-12 col-md-6">
    <div class="p-5">
        <form action="{{ route('create.jogos') }}" method="POST">
            <p class="fs-3">Cadastre um Jogo</p>
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">TIme da casa</label>
                <input type="text" name="time1" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Time de Fora</label>
                <input type="text" name="time2" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Placar do Time da Casa</label>
                <input type="number" name="placar1" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Placar do Time de Fora</label>
                <input type="number" name="placar2" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Data do Jogo</label>
                <input type="datetime-local" name="data_jogo" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
        @if ($errors->first('cadastro'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{ $errors->first('cadastro') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif
        @if (session('cadastro'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('cadastro') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif

    </div>
</div>
@endsection