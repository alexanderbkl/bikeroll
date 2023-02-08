@extends('layout')

@section('title', 'Aseguradora | ' . $insurer->name)

@section('content')
    <div class="container">
        <div class="bg-white p-5 shadow rounded">
            <h1>{{ $insurer->name }}</h1>
            <p class="text-secondary">{{ $insurer->cif }}</p>
            <p class="text-secondary">{{ $insurer->address }}</p>
            <p class="text-secondary">Precio por cursa: {{ $insurer->price }}€</p>
            <p class="text-black-50">Creado {{ $insurer->created_at->diffForHumans() }}</p>
            <div class="d-flex justify-content-between align-items-between">
                <a href="{{ route('insurers.index') }}">Atrás</a>
                @auth
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-primary" href="{{ route('insurers.edit', $insurer) }}">Editar</a>
                        <a class="btn btn-danger" href="#"
                            onclick="document.getElementById('delete-insurer').submit()">Eliminar</a>
                        <form class="d-none" id="delete-insurer" method="POST" action="{{ route('insurers.destroy', $insurer) }}">
                            @csrf @method('DELETE')
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
