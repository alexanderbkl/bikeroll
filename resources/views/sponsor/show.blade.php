@extends('layout')

@section('title', $sponsor->name)

@section('content')
    <div class="container">
        <div class="bg-white p-5 shadow rounded">
            <div class=" d-flex flex-column justify-content-center align-items-center">
                <h1>{{ $sponsor->name }}</h1>
                <h3>CIF: {{ $sponsor->cif }}</h3>
                @if ($sponsor->logo)
                    <img role="button" onclick="window.open(this.src);" class="img-thumbnail" width="200"
                        src="{{ asset('/uploads/sponsors/logos/' . $sponsor->logo) }}" alt="sin imagen" />
                @endif
            </div>
            @if ($sponsor->is_active)
                <p class="text-success">Activo</p>
            @else
                <p class="text-danger">Inactivo</p>
            @endif
            @if ($sponsor->main_plane)
                <p class="text-success">Sale en plano principal</p>
            @else
                <p class="text-danger">No sale en plano principal</p>
            @endif
            <p class="text-secondary">{{ $sponsor->address }}</p>

            @if ($courses->count() > 0)
                <p>Eventos:</p>
                @foreach ($courses as $course)
                    <a href="{{ route('course.show', $course) }}" target="_blank">{{ $course->title }}</a>
                    @if ($course->is_active)
                        <span class="text-success"> Activo</span> <br>
                    @else
                        <span class="text-danger"> Inactivo</span> <br>
                    @endif
                @endforeach
            @else
                <p>No hay eventos</p>
            @endif

            <p class="text-black-50">Dado de alta {{ $sponsor->created_at->diffForHumans() }}</p>
            <div class="d-flex justify-content-between align-items-between">
                <a href="{{ route('sponsor.index') }}">Atrás</a>
                @role('admin')
                    <a class="btn btn-primary" href="{{ route('sponsor.generate', $sponsor) }}">FACTURA</a>

                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-primary" href="{{ route('sponsor.edit', $sponsor) }}">Editar</a>
                        <a class="btn btn-danger" href="#"
                            onclick="document.getElementById('delete-sponsor').submit()">Eliminar</a>
                        <form class="d-none" id="delete-sponsor" method="POST"
                            action="{{ route('sponsor.destroy', $sponsor) }}">
                            @csrf @method('DELETE')
                        </form>
                    </div>
                @endrole
            </div>
        </div>
    </div>
@endsection
