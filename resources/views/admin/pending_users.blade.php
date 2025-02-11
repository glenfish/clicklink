@extends('layouts.admin')

@section('content')
    <h1>Pending User Approvals</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendingUsers as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.approve', $user->id) }}">
                            @csrf
                            <button type="submit">Approve</button>
                        </form>
                        <form method="POST" action="{{ route('admin.deny', $user->id) }}">
                            @csrf
                            <button type="submit">Deny</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection