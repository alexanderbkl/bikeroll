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
    @endif

    <form method="POST" action="{{ route('projects.store') }}">
        @csrf
        <label>
            Title
            <input type="text" name="title" value="{{old('title')}}">
        </label>
        <br>
        <label>
            URL
            <input type="text" name="url" value="{{old('url')}}">
        </label>
        <br>
        <label>
            Description
            <textarea type="text" name="description">{{old('description')}}</textarea>
        </label>
        <br>
        <button>Save</button>
    </form>
    
@endsection