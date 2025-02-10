@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
    <h1 class="mt-5">User Dashboard</h1>
    
    <h2>Update Account Email</h2>
    <p>Current Email: {{ $user->email }}</p>
    <form action="/user/update-email" method="POST">
        @csrf
        <label for="email">New Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        <button type="submit" class="btn btn-primary">Update Email</button>
    </form>

    <h2>Update Affiliate ID</h2>
    @if ($user->affiliate_id)
        <p>Current Affiliate ID: {{ $user->affiliate_id }}</p>
    @endif
    <form action="/user/update-affiliate-id" method="POST">
        @csrf
        <label for="affiliate_id">
            {{ $user->affiliate_id ? 'New Affiliate ID:' : 'Add Your Affiliate ID:' }}
        </label>
        <input type="text" id="affiliate_id" name="affiliate_id" value="{{ $user->affiliate_id }}" required>
        <button type="submit" class="btn btn-primary">
            {{ $user->affiliate_id ? 'Update Affiliate ID' : 'Add Affiliate ID' }}
        </button>
    </form>

    
    
    <h2>Generate ZIP File</h2>
    <p>{{ $hasJob ? 'Your ZIP file is being built.' : 'You have not generated a ZIP file yet.' }}</p>
    <form action="/user/generate-zip" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Generate ZIP File</button>
    </form>

    
    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection