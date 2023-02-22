@extends('layout')

@section('title', 'Carreras')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="display-4 mb-0">Carreras</h1>
            @role('admin')
                <a class="btn btn-primary" href="{{ route('course.create') }}">Crear nueva carrera</a>
            @endrole
        </div>
        <hr>
        <p class="lead text-secondary">Carreras de bicicleta:</p>
        <ul class="list-group">
            @forelse ($courses as $course)
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    <a class="text-decoration-none text-secondary d-flex justify-content-between align-items-center"
                        href="{{ route('course.show', $course) }}">
                        @if ($course->poster_image)
                            <img class="img-thumbnail pointer" width="50"
                                src="{{ asset('/uploads/courses/posterimages/' . $course->poster_image) }}"
                                alt="sin imagen" />
                        @else
                            <span>s/i</span>
                        @endif
                        <span class="font-weight-bold">
                            {{ $course->title }}
                        </span>
                        <!--check if course is_active-->
                        @if ($course->is_active)
                            <span class="text-success">Activo</span>
                        @else
                            <span class="text-danger">Inactivo</span>
                        @endif
                        <span class="text-black-50">Celebración:
                            {{ date('d/m/Y', strtotime($course->date)) }}
                        </span>

                        <!--if course date is less than 30 days away from now, show button to Apuntarse-->
                        @auth
                            @if (date('Y-m-d', strtotime($course->date)) < date('Y-m-d', strtotime('+30 days')))
                                @if ($course->users->contains(auth()->user()->id))
                                    <span class="text-success">Apuntado</span>
                                @endif
                            @endif
                        @endauth
                    </a>
                </li>
            @empty
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    No hay cursas disponibles</li>
            @endforelse
            {{ $courses->links() }}
        </ul>
    </div>
@endsection
