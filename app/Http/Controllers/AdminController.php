<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $hasJob = Job::exists();
        $users = User::all();
        return view('admin.dashboard', compact('hasJob', 'users'));
    }

    public function settings()
    {
        $settings = DB::table('settings')->first();
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'base_url' => 'required|url',
        ]);

        DB::table('settings')->updateOrInsert(
            ['id' => 1],
            ['base_url' => $request->base_url]
        );

        return redirect('/admin/settings')->with('success', 'Settings updated successfully.');
    }

    public function deactivateUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->deactivated = true;
            $user->save();
        }

        return redirect('/admin/dashboard')->with('success', 'User deactivated successfully.');
    }

    public function deleteUserZip($id)
    {
        $job = Job::where('user_id', $id)->first();
        if ($job) {
            $job->delete();
        }

        return redirect('/admin/dashboard')->with('success', 'User ZIP file deleted successfully.');
    }

    public function showPendingUsers()
    {
        $pendingUsers = User::where('status', 'pending')->get();
        return view('admin.pending_users', compact('pendingUsers'));
    }

    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();

        // Send approval email here...

        return redirect()->route('admin.pending_users')->with('success', 'User approved successfully.');
    }

    public function denyUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'denied';
        $user->save();

        // Send denial email here...

        return redirect()->route('admin.pending_users')->with('success', 'User denied successfully.');
    }

    public function showAdminLoginForm()
    {
        return view('auth.admin_login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}