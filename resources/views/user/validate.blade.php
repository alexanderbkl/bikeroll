@extends('layout')

@section('title', 'Validar usuario')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                @include('partials.validation-errors')
                <form class="bg-white py-3 px-4 shadow rounded" enctype="multipart/form-data" method="POST"
                    action="{{ route('user.update', $user) }}">
                    @method('PATCH')
                    <h1>Validar usuario</h1>
                    <!--If user is pro, only need to add federation number. If not, show validation form-->

                        @include('user._payform', ['btnText' => 'Asignar', 'user' => $user, 'insurers' => $insurers])


                </form>
            </div>
        </div>
    @endsection
