@extends('layouts.app')

@section('title', 'Admin Settings')

@section('content')
    <title>Admin Settings</title>
</head>
<body>
    <h1>Admin Settings</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form action="/admin/settings" method="POST">
        @csrf
        <label for="affiliate_url_base">Affiliate URL Base:</label>
        <input type="text" id="affiliate_url_base" name="affiliate_url_base" value="{{ $setting->affiliate_url_base }}" required>
        <button type="submit" class="btn btn-primary">Update Settings</button>
    </form>
@endsection