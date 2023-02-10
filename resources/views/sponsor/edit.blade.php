@extends('layout')

@section('title', 'Editar patrocinador')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                @include('partials.validation-errors')
                <form class="bg-white py-3 px-4 shadow rounded" enctype="multipart/form-data" method="POST"
                    action="{{ route('sponsor.update', $sponsor) }}">
                    @method('PATCH')
                    <h1>Editar patrocinador</h1>
                    @include('sponsor._form', ['btnText' => 'Actualizar', 'courses' => $courses])
                </form>
            </div>
        </div>
    @endsection
