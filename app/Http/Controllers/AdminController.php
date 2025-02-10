<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $hasJob = Job::exists();
        $users = User::all();
        return view('admin.dashboard', compact('hasJob', 'users'));
    }

    public function updateSettings(Request $request)
    {
        // Update settings logic
        return redirect('/admin/settings')->with('success', 'Settings updated successfully.');
    }

    public function deactivateUser($id)
    {
        $user = User::find($id);
        $user->deactivated = true;
        $user->save();

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

    public function settings()
    {
        return view('admin.settings');
    }
}