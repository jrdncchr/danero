@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="col-sm-6 col-sm-offset-3">
    <div class="links">
        <a href="{{ route('stories') }}">Stories</a>
        <a href="https://laracasts.com">About</a>
    </div>
</div>
@endsection