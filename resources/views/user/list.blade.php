@extends('layout')

@section('title', 'Patrocinadores')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="display-4 mb-0">Usuarios</h1>

        </div>
        <hr>

        <p class="lead text-secondary">Lista de usuarios:</p>
        <ul class="list-group">
            @forelse ($users as $user)
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    <br><br><br>
                    {!! QrCode::generate($user->id) !!}
                    <br><br><br>
                    <span class="font-weight-bold">
                        {{ $user->name }}
                    </span>
                    <!--check if course is_active-->
                    @if ($user->paid)
                        <span class="text-success">Pagado</span>
                        <span class="text-black-50">
                            Creado el:
                            {{ $user->created_at->format('d/m/Y') }}
                        </span>
                        <span class="text-black-50">
                            email:
                            {{ $user->email }}
                        </span>
                        </a>
                    @endif
                @empty
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    No hay patrocinadores por el momento</li>
                </li>
            @endforelse
        </ul>
    </div>
@endsection
