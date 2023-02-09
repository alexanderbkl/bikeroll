@extends('layout')

@section('title', 'Portafolio | ' . $course->title)

@section('content')
    <div class="container">
        <div class="bg-white p-5 shadow rounded">
            <div class=" d-flex flex-column justify-content-center align-items-center">
                <h1>{{ $course->title }}</h1>
                @if ($course->poster_image)
                    <img role="button" onclick="window.open(this.src);" class="img-thumbnail"
                        src="{{ asset('/uploads/courses/posterimages/' . $course->poster_image) }}" alt="sin imagen" />
                @endif
                @if ($course->map_image)
                    <h1>Mapa:</h1>
                    <img role="button" onclick="window.open(this.src);" class="img-thumbnail"
                        src="{{ asset('/uploads/courses/mapimages/' . $course->map_image) }}" alt="sin imagen" />
                @else
                    <p>Sin mapa</p>
                @endif
            </div>
            @if ($course->is_active)
                <p class="text-success">Activo</p>
            @else
                <p class="text-danger">Inactivo</p>
            @endif
            <p class="text-secondary">{{ $course->description }}</p>
            <!--Create a for loop to display all images saved inside the json list called $course->images, transform first to array/object-->
            @if (json_decode($course->images) == null)
                <p>No hay imágenes</p>
            @else
                <p>Imágenes:</p>
                @foreach (json_decode($course->images) as $image)
                    <img role="button" onclick="window.open(this.src);" class="img-thumbnail" width="200"
                        src="{{ asset('/uploads/courses/images/' . $image) }}" alt="sin imagen" />
                @endforeach
            @endif

            <p class="text-black-50">Creado {{ $course->created_at->diffForHumans() }}</p>
            <div class="d-flex justify-content-between align-items-between">
                <a href="{{ route('course.index') }}">Atrás</a>
                @role('admin')
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-primary" href="{{ route('course.edit', $course) }}">Editar</a>
                        <a class="btn btn-danger" href="#"
                            onclick="document.getElementById('delete-course').submit()">Eliminar</a>
                        <form class="d-none" id="delete-course" method="POST" action="{{ route('course.destroy', $course) }}">
                            @csrf @method('DELETE')
                        </form>
                    </div>
                @endrole
            </div>
        </div>
    </div>
@endsection
