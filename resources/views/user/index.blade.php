@extends('layout')

@section('title', 'Datos usuario')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">

                <h1>Datos usuario</h1>
                <!--If user is pro, only need to show federation number paragraph. If not, show insurer_cif number and ref to it-->
                <p>Nombre: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
                <p>Fecha de nacimiento: {{ $user->dob }}</p>
                <p>Dirección: {{ $user->address }}</p>
                <p>Género:
                    @if ($user->gender == 'male')
                        Hombre
                    @else
                        Mujer
                    @endif
                    @if ($user->is_pro)
                        @if ($user->paid)
                            <p>Número de federación: {{ $user->federation_number }}</p>
                        @else
                            <p>Número de federación: Sin asignar</p>
                            <a href="{{ route('user.validate', $user) }}" class="btn btn-primary btn-lg btn-block">Asignar</a>
                        @endif
                    @else
                        @if ($user->paid)
                            <p>Seguro: {{ $user->insurer_cif }}</p>
                        @else
                            <p>Seguro: No seleccionado</p>
                            <a href="{{ route('user.validate', $user) }}" class="btn btn-primary btn-lg btn-block">Asignar</a>

                        @endif
                    @endif

            </div>
        </div>
    @endsection
