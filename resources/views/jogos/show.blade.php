@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ url('assets/css/jogos.css') }}">
@endsection

@section('title', 'Listagem de Jogos')
@php
    $page = '';
    $numApostas = 0;
@endphp


@section('content')

<section id="jogos">
<div class="container p-5">
    <div class="row">
        @foreach ($jogos as $jogo)
            @if ($numApostas > 0)
                @php
                    $numApostas = 0
                @endphp
            @endif
            @foreach ($apostas as $aposta)
                @if ($aposta->jogo_id == $jogo->id)
                    @php
                        $numApostas = $numApostas + 1;
                    @endphp
                @endif
            @endforeach
            <div class="col-12 col-md-4 ">
                <div class="card p-3 m-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-around align-items-center h-100">
                            <div class="time d-flex flex-column align-items-center">
                                <img src='{{ url("assets/img/bandeiras/$jogo->bandeira_1") }}'>
                                <span class="text-center fw-semibold">{{ $jogo->time_1 }}</span>
                            </div>
                            <span class="fs-3 text-secondary text-center fw-bold">7:00</span>
                            <div class="time d-flex flex-column align-items-center">
                                <img src='{{ url("assets/img/bandeiras/$jogo->bandeira_2") }}' >
                                <span class="text-center fw-semibold">{{ $jogo->time_2 }}</span>
                            </div>
                        </div>
                    </div>
                    <p class="card-text">Quantidade de Apostas: {{ $numApostas }}</p>
                    <p class="card-text">{{ date('d/m/Y', strtotime($jogo->created_at)) }}</p>
                    <form class="buttons" action="{{ route('delete.jogos', $jogo->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a href="{{ route('jogos.update', $jogo->id) }}" class="btn btn-primary">Atualizar Jogo</a>
                        <button type="submit" class="btn btn-danger">Remover Jogo</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection