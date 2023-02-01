@extends('layout')

@section('title', 'Portfolio')

@section('content')
    <h1>Portfolio</h1>

    <ul>
        @forelse ($projects as $project)
            <li>{{ $project->title }} <br><small>{{ $project->description }}</small> <br> Editado hace {{ $project->updated_at->diffForHumans() }}</li>
        @empty
            <li>No portfolio items</li>
        @endforelse
        {{ $projects->links() }}
    </ul>
    
@endsection