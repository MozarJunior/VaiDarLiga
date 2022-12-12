@extends('layout.main')

@section('title', 'Atualização de dados')
@section('css')
<link rel="stylesheet" href="{{ url('assets/css/admin.css') }}">
@endsection
@php
    $page = '';
@endphp

@section('content')
    <div class="col-12 col-md-6">
        <div class="p-5">
            <form action="{{ route('update.user', $id) }}" method="POST">
                <p class="fs-3">Atualização de dados</p>
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirmar Senha</label>
                    <input type="password" name="confirma_senha" class="form-control"
                        id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
@endsection

