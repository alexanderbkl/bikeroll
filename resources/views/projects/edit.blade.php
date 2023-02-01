@extends('layout')

@section('title', 'Create project')

@section('content')
    <h1>Edit project</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('projects.update', $project) }}">
        @csrf @method('PATCH')
        <label>
            Title
            <input type="text" name="title" value="{{old('title', $project->title)}}">
        </label>
        <br>
        <label>
            URL
            <input type="text" name="url" value="{{old('url', $project->url)}}">
        </label>
        <br>
        <label>
            Description
            <textarea type="text" name="description">{{old('description', $project->description)}}</textarea>
        </label>
        <br>
        <button>Update</button>
    </form>
    
@endsection