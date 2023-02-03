@extends('layout')

@section('title', 'Projects')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="display-4 mb-0">Projects</h1>
            @auth
                <a class="btn btn-primary" href="{{ route('course.create') }}">Crear nueva cursa</a>
            @endauth
        </div>
        <hr>
        <p class="lead text-secondary">Proyectos activos de montaje en bicicleta.</p>
        <ul class="list-group">
            @forelse ($courses as $cursa)
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    <a class="text-decoration-none text-secondary d-flex justify-content-between align-items-center"
                        href="{{ route('projects.show', $project) }}">
                        <span class="font-weight-bold">
                            {{ $cursa->title }}
                        </span>
                        <span class="text-black-50">
                            {{ $cursa->created_at->format('d/m/Y') }}
                        </span>
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
