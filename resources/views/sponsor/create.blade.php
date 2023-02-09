@extends('layout')

@section('title', 'Crear sponsor')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">


                @include('partials.validation-errors')

                <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('sponsor.store') }}" enctype="multipart/form-data">
                    <h1 class="display-4">Nova cursa</h1>
                    <hr>
                    @include('sponsor._form', ['btnText' => 'Crear'])
                </form>
            </div>
        </div>
    </div>
@endsection
