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
                <p class="lead text-secondary">Proyecto realizado para IES La Pineda sobre cursos de bicicleta en Laravel.
                </p>
                <div class="d-flex flex-row align-items-center">
                    <a class="btn btn-lg btn-block btn-primary" href="{{ route('projects.index') }}">Projectes</a>
                    <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('contact') }}">Contact</a>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <img src="{{ asset('img/home.svg') }}" alt="Home" class="img-fluid">
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
