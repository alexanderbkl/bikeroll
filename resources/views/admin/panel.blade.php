

@extends('layout')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-6">
                <h1 class="display-4 text-primary">Panel administrador</h1>
                @auth
                    Welcome, {{ auth()->user()->name }}
                @endauth
                <p class="lead text-secondary">Opciones de administrador:
                </p>
                <div class="d-flex flex-row align-items-center">
                    <a class="btn btn-lg btn-block btn-primary" href="{{ route('course.index') }}">Curses</a>
                </div>

            </div>

        </div>
    </div>
@endsection
