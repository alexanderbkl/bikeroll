@extends('layout')

@section('title', 'Portafolio | '.$project->title)

@section('content')
<h1>{{ $project->title }}</h1>
<p>{{ $project->description }}</p>
<p>Creado {{ $project->created_at->diffForHumans() }}</p>
<p>Editado {{ $project->updated_at->diffForHumans() }}</p>
@endsection