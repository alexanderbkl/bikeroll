@extends('layout')

@section('title', 'Editar carrera')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                @include('partials.validation-errors')
                <form class="bg-white py-3 px-4 shadow rounded" enctype="multipart/form-data" method="POST"
                    action="{{ route('course.update', $course) }}">
                    @method('PATCH')
                    <h1>Editar carrera</h1>
                    @include('course._form', ['btnText' => 'Actualizar'])
                </form>
            </div>
        </div>
    @endsection
