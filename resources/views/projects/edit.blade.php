@extends('layout')

@section('title', 'Create project')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                @include('partials.validation-errors')
                <form class="bg-white py-3 px-4 shadow rounded" method="POST"
                    action="{{ route('projects.update', $project) }}">
                    @method('PATCH')
                    <h1>Edit project</h1>
                    @include('projects._form', ['btnText' => 'Update'])
                </form>
            </div>
        </div>
    @endsection
