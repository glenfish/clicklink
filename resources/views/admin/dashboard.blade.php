@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h1 class="mt-5">Admin Dashboard</h1>
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

    <div class="alert alert-info" role="alert">
        <p>{{ $hasJob ? 'There are jobs in the system.' : 'There are no jobs in the system.' }}</p>
    </div>

    <h2>Manage Users</h2>
    <!-- Example user management table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Affiliate ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->affiliate_id }}</td>
                <td>
                    <form action="{{ url('/admin/deactivate-user/'.$user->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-warning btn-sm">Deactivate</button>
                    </form>
                    <form action="{{ url('/admin/delete-zip/'.$user->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete ZIP</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection