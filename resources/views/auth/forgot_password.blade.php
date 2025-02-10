@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <title>Forgot Password</title>
</head>
<body>
    <h1>Change Password</h1>
    <form action="/forgot-password" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit" class="btn btn-primary">Send Reset Link</button>
    </form>
@endsection