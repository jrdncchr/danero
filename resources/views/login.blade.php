@extends('layouts.app')

@section('title', 'Login')
@section('sub-title', 'Login')

@section('content')
<div class="col-sm-4 col-sm-offset-4">

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
        </div>
        <div class="checkbox">
            <label>
            <input type="checkbox" name="remember" /> Remember Me
            </label>
        </div>
        <button type="submit" class="btn btn-default pull-right">Login</button>
    </form>
</div>
@endsection