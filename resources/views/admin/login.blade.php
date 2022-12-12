@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ url('assets/css/welcome.css') }}">
@endsection

@section('title', 'Login de Administrador')

@php
    $page = 'admin';
@endphp

@section('content')

    <section>
        <div class="container p-3">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="p-5">
                            <form action="{{ route('login.adm') }}" method="POST">
                                <p class="fs-3">Login de Administrador</p>
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">E-mail</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </form>
                            @if ($errors->first('login'))
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    {{ $errors->first('login') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

        </div>
    </section>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
@endsection