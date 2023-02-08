@extends('layout')

@section('title', 'Portafolio | ' . $course->title)

@section('content')
    <div class="container">
        <div class="bg-white p-5 shadow rounded">
            <h1>{{ $course->title }}</h1>
            @if ($course->map_image)
                <img role="button" onclick="window.open(this.src);" class="img-thumbnail" width="100" src="{{ asset('/uploads/courses/mapimages/' . $course->map_image) }}"
                    alt="sin imagen" />
            @else
                <p>No hay imagen</p>
            @endif
            @if ($course->is_active)
                <p class="text-success">Activo</p>
            @else
                <p class="text-danger">Inactivo</p>
            @endif
            <p class="text-secondary">{{ $course->description }}</p>
            <!--Create a for loop to display all images saved inside the json list called $course->images, transform first to array/object-->
            @foreach (json_decode($course->images) as $image)
                <img role="button" onclick="window.open(this.src);" class="img-thumbnail" width="100"
                    src="{{ asset('/uploads/courses/images/' . $image) }}" alt="sin imagen" />
            @endforeach
            <p class="text-black-50">Creado {{ $course->created_at->diffForHumans() }}</p>
            <div class="d-flex justify-content-between align-items-between">
                <a href="{{ route('course.index') }}">Back</a>
                @auth
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-primary" href="{{ route('course.edit', $course) }}">Edit</a>
                        <a class="btn btn-danger" href="#"
                            onclick="document.getElementById('delete-course').submit()">Delete</a>
                        <form class="d-none" id="delete-course" method="POST" action="{{ route('course.destroy', $course) }}">
                            @csrf @method('DELETE')
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
