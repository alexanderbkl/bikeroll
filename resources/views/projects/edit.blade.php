@extends('layout')

@section('title', 'Create project')

@section('content')
    <h1>Edit project</h1>


    @include('partials.validation-errors')

    <form method="POST" action="{{ route('projects.update', $project) }}">
        @method('PATCH')
        @include('projects._form', ['btnText' => 'Update'])
    </form>
    
@endsection