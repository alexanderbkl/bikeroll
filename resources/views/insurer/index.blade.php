@extends('layout')

@section('title', 'Aseguradoras')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="display-4 mb-0">Aseguradoras</h1>
            @role('admin')
                <a class="btn btn-primary" href="{{ route('insurers.create') }}">Añadir nueva aseguradora</a>
            @endrole
        </div>
        <hr>
        <p class="lead text-secondary">Lista de aseguradoras:</p>
        <ul class="list-group">
            @forelse ($insurers as $insurer)
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    <a class="text-decoration-none text-secondary d-flex justify-content-between align-items-center"
                        href="{{ route('insurers.show', $insurer) }}">

                        <span class="font-weight-bold">
                            {{ $insurer->name }}
                        </span>
                        <span class="font-weight-bold">
                            {{ $insurer->cif }}
                        </span>
                        <span class="font-weight-bold">
                            {{ $insurer->address }}
                        </span>

                        <span class="text-black-50">
                            {{ $insurer->created_at->format('d/m/Y') }}
                        </span>
                    </a>
                </li>
            @empty
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    No hay aseguradoras disponibles</li>
            @endforelse
            {{ $insurers->links() }}
        </ul>
    </div>
@endsection
