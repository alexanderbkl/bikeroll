@extends('layout')

@section('title', 'Patrocinadores')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="display-4 mb-0">Patrocinadores</h1>
            @role('admin')
                <a class="btn btn-primary" href="{{ route('sponsor.create') }}">Crear nuevo patrocinador</a>
            @endrole
        </div>
        <hr>
        <p class="lead text-secondary">Lista de patrocinadores:</p>
        <ul class="list-group">
            @forelse ($sponsors as $sponsor)
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    <a class="text-decoration-none text-secondary d-flex justify-content-between align-items-center"
                        href="{{ route('sponsor.show', $sponsor) }}">
                        @if ($sponsor->logo)
                            <img class="img-thumbnail pointer" width="50"
                                src="{{ asset('/uploads/sponsors/logos/' . $sponsor->logo) }}"
                                alt="sin imagen" />
                        @else
                            <span>s/i</span>
                        @endif
                        <span class="font-weight-bold">
                            {{ $sponsor->title }}
                        </span>
                        <!--check if course is_active-->
                        @if ($sponsor->is_active)
                            <span class="text-success">Activo</span>
                        @else
                            <span class="text-danger">Inactivo</span>
                        @endif
                        <span class="text-black-50">
                            {{ $sponsor->created_at->format('d/m/Y') }}
                        </span>
                    </a>
                </li>
            @empty
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    No hay patrocinadores por el momento</li>
            @endforelse
            {{ $sponsors->links() }}
        </ul>
    </div>
@endsection
