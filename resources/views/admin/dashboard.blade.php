@extends('layouts.admin')

@section('content')
    <h1 class="mt-5">Admin Dashboard</h1>
    
    <div class="alert alert-info" role="alert">
        <p>{{ $hasJob ? 'Account requests pending.' : 'No pending action required.' }}</p>
    </div>

    <h2>Manage Users</h2>
    <!-- Example user management table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Affiliate ID</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->affiliate_id }}</td>
                <td>{{ $user->status === 'active' ? 'approved' : $user->status }}</td>
                <td>
                    @if(!$user->deactivated)
                        <form action="{{ url('/admin/deactivate-user/'.$user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">Deactivate</button>
                        </form>
                    @else
                        <button class="btn btn-secondary btn-sm" disabled>Deactivated</button>
                    @endif
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