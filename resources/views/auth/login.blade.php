@extends('layouts.app')

@section('title', 'User Login')

@section('content')
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    @if(session('error'))
        <div>{{ session('error') }}</div>
    @endif
    <form action="/login" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>&nbsp;&nbsp;
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <a href="/register">No Account? Register</a><br><br>
    <a href="/forgot-password">Update Password</a>
@endsection