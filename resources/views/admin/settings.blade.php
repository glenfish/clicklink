@extends('layouts.app')

@section('title', 'Admin Settings')

@section('content')
    <h1 class="mt-5">Admin Settings</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/settings') }}">Settings</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <form id="logout-form" action="{{ url('/admin/logout') }}" method="GET" style="display: none;">
        @csrf
    </form>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ url('/admin/settings') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="base_url">Base URL</label>
            <input type="url" class="form-control" id="base_url" name="base_url" value="{{ old('base_url', $settings->base_url ?? '') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
@endsection