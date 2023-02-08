@extends('layout')

@section('title', 'Actualizar aseguradora')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                @include('partials.validation-errors')
                <form class="bg-white py-3 px-4 shadow rounded" method="POST"
                    action="{{ route('insurers.update', $insurer) }}">
                    @method('PATCH')
                    <h1>Actualizar aseguradora</h1>
                    @include('insurer._form', ['btnText' => 'Actualizar'])
                </form>
            </div>
        </div>
    @endsection
