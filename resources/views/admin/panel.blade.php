

@extends('layout')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-6">
                <h1 class="display-4 text-primary">Panel administrador</h1>
                @auth
                    Bienvenido, {{ auth()->user()->name }}
                @endauth
                <p class="lead text-secondary">Opciones de administrador:
                </p>
                <div class="d-flex flex-row align-items-center">
                    <a class="m-5 btn btn-lg btn-block btn-primary" href="{{ route('course.index') }}">Cursos</a>
                    <a class="m-5 btn btn-lg btn-block btn-primary" href="{{ route('insurers.index') }}">Aseguradoras</a>
                    <a class="m-5 btn btn-lg btn-block btn-primary" href="{{ route('sponsor.index') }}">Patrocinadores</a>
                    {{-- <a class="m-5 btn btn-lg btn-block btn-primary" href="{{ route('sponsors.index') }}">Patrocinadores</a> --}}
                </div>

            </div>

        </div>
    </div>
@endsection
