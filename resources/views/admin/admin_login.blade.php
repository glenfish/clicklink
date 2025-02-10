@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
    <h1>Admin Login</h1>
    @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{ url('/admin/login') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection