@extends('layout')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">

       

        <form class="bg-white shadow rounded py-3 px-4" 
        method="POST"
         action="{{ route('messages.store') }}">
            @csrf
            <h1 class="display-4">Contact</h1>

            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control bg-light shadow-sm border-0" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            <div class="form-group">
                <label for="email">e-mail</label>
                <input class="form-control bg-light shadow-sm border-0" type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}"><br>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            
            <div class="form-group">
                <label for="subject">Subject</label>
                <input class="form-control bg-light shadow-sm border-0" id="subject" name="subject" placeholder="Subject" value="{{ old('subject') }}"><br>
                @error('subject')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
                
            <div class="form-group">
                <label for="content">e-mail</label>
                <textarea class="form-control bg-light shadow-sm border-0" id="content" name="content" placeholder="Message">{{ old('content') }}</textarea><br>
                @error('content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
                <button class="btn btn-primary btn-lg">Send</button>
        </form>
    </div>
</div>
    </div>

@endsection