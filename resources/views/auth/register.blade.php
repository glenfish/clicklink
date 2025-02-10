@extends('layouts.app')

@section('title', 'Register User')

@section('content')
    <h1>Register</h1>
    @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="/register" method="POST">
        @csrf
        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:&nbsp;</label>
        <input type="password" id="password" name="password" required>&nbsp;&nbsp;
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <a href="/login">Already have an account? Login</a>
@endsection