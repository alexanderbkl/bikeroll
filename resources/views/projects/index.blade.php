@extends('layout')

@section('title', 'Projects')

@section('content')
    <h1>Projects</h1>

    @auth
        <a href="{{ route('projects.create') }}">Create new project</a>
    @endauth
    <ul>
        @forelse ($projects as $project)
            <li><a href="{{route('projects.show', $project)}}">{{ $project->title }}</a>
                <br><small>{{ $project->description }}</small> <br> Editado {{ $project->updated_at->diffForHumans() }}</li>
        @empty
            <li>No project items</li>
        @endforelse
        {{ $projects->links() }}
    </ul>
    
@endsection