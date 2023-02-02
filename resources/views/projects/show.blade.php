@extends('layout')

@section('title', 'Portafolio | '.$project->title)

@section('content')
<h1>{{ $project->title }}</h1>

@auth
    <a href="{{ route('projects.edit', $project) }}">Edit</a>

    <form method="POST" action="{{ route('projects.destroy', $project) }}">
        @csrf @method('DELETE')
        <button>Delete</button>
    </form>
@endauth

<p>{{ $project->description }}</p>
<p>Creado {{ $project->created_at->diffForHumans() }}</p>
<p>Editado {{ $project->updated_at->diffForHumans() }}</p>
@endsection