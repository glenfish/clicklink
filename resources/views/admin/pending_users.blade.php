@extends('layouts.admin')

@section('content')
    <h1>Pending User Approvals</h1>
    <table>
        <thead>
            
        </thead>
        <tbody>
            @if($pendingUsers->isEmpty())
                <tr>
                    <td colspan="3" style="padding: 10px; text-align: center;">
                        No users to approve
                    </td>
                </tr>
            @else
                @foreach($pendingUsers as $user)
                    <tr>
                        <td colspan="1" style="padding: 10px;">
                            <div style="padding: 20px; background-color: #e0e0e0; border-radius: 8px; width: 100%;">
                                <span>{{ $user->email }}</span>
                            </div>
                        </td>
                        <td colspan="1" style="padding: 10px;">
                            <div style="padding: 20px;  border-radius: 8px; width: 100%;">
                                <form method="POST" action="{{ route('admin.approve', $user->id) }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Approve</button>
                                </form>
                            </div>
                        </td>
                        <td colspan="1" style="padding: 10px;">
                            <div style="padding: 20px;  border-radius: 8px; width: 100%;">
                                <form method="POST" action="{{ route('admin.deny', $user->id) }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary">Deny</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            <tr style="height: 10px;"></tr>
        
        </tbody>
    </table>
@endsection