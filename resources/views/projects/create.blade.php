@extends('layout')

@section('title', 'Create project')

@section('content')
    <h1>Create new project</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    <form method="POST" action="{{ route('projects.store') }}">
        @csrf
        <label>
            Title
            <input type="text" name="title" value="puta">
        </label>
        <br>
        <label>
            URL
            <input type="text" name="url" value="Me cago en tu madre">
        </label>
        <br>
        <label>
            Description
            <textarea type="text" name="description">asdasd</textarea>
        </label>
        <br>
        <button>Save</button>
    </form>
    
@endsection