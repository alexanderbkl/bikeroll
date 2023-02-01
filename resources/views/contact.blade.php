@extends('layout')

@section('content')
    <h1>Contact</h1>

    <form method="POST" action={{ route('messages.store') }}>
        @csrf
        <input name="name" placeholder="Name" value="{{ old('name') }}"><br>
        {!! $errors->first('name', '<small>:message</small>') !!}<br>

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"><br>
        {!! $errors->first('email', '<small>:message</small>') !!}<br>

        <input name="subject" placeholder="Subject" value="{{ old('subject') }}"><br>
        {!! $errors->first('subject', '<small>:message</small>') !!}<br>

        <textarea name="content" placeholder="Message">{{ old('content') }}</textarea><br>
        {!! $errors->first('content', '<small>:message</small>') !!}<br>
        <button>Send</button>
    </form>
@endsection