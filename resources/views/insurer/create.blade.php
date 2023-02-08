@extends('layout')

@section('title', 'Añadir aseguradora')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">


                @include('partials.validation-errors')

                <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('insurers.store') }}">
                    <h1 class="display-4">Nueva aseguradora</h1>
                    <hr>
                    @include('insurer._form', ['btnText' => 'Añadir'])
                </form>
            </div>
        </div>
    </div>
@endsection
