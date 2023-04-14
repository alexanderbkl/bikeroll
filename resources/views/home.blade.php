@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-6">
                <h1 class="display-4 text-primary">BIKEROLL</h1>
                @auth
                    Bienvenido, {{ auth()->user()->name }}
                @endauth
                <p class="lead text-secondary">Carreras de bicicleta en Laravel. Proyecto realizado para IES La Pineda.
                </p>
                <div class="d-flex flex-row align-items-center">
                    <a class="btn btn-lg btn-block btn-primary" href="{{ route('course.index') }}">Carreras</a>
                    <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('contact') }}">Contactar</a>
                </div>
                @if ($sponsors->count() > 0)
                    <p>Patrocinadores destacados:</p>
                    @foreach ($sponsors as $sponsor)
                        @if ($sponsor->is_active)
                            @if ($sponsor->logo)
                                <img class="img-thumbnail pointer" width="50"
                                    src="{{ asset('/uploads/sponsors/logos/' . $sponsor->logo) }}" alt="sin imagen" />
                            @endif
                            <a href="{{ route('sponsor.show', $sponsor) }}" target="_blank">{{ $sponsor->name }}</a> <br>
                        @endif
                    @endforeach
                @else
                    <p>No hay patrocinadores</p>
                @endif
                <!--si hay courses, mostrarlos-->
                @if ($courses->count() > 0)
                    <p>Carreras destacadas:</p>
                    @foreach ($courses as $course)
                        @if ($course->is_active)
                            <img class="img-thumbnail pointer" width="50"
                                src="{{ asset('/uploads/courses/posterimages/' . $course->poster_image) }}"
                                alt="sin imagen" />
                            <a href="{{ route('course.show', $course) }}" target="_blank"> {{ $course->title }}</a> <br>
                        @endif
                    @endforeach
                @else
                    <p>No hay carreras</p>
                @endif
            </div>
            <div class="col-12 col-lg-6">
                <img src="{{ asset('img/about.svg') }}" alt="Home" class="img-fluid">
            </div>
        </div>
    </div>


@endsection


<!--
<?php
/*
@extends('layouts.app')




@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
*/
?>
gg bro-->
