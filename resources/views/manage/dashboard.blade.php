@extends('layouts.app')

@section('title', 'Dashboard')
@section('sub-title', 'What do you want to do?')

@section('content')
<div class="col-sm-4 col-sm-offset-4">
    <div class="links">
    	<a href="{{ route('stories.create') }}">Add a new Story</a>
        <a href="{{ route('stories.index') }}">Manage my Stories</a>
        <a href="#">Edit About Me</a>
        <a href="#">Edit Account</a>
        <a href="{{ route('logout') }}">Logout</a>
    </div>
</div>
@endsection