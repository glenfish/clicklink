<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Job;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $hasJob = Job::where('user_id', $user->id)->where('status', 'pending')->exists();
        return view('dashboard', compact('user', 'hasJob'));
    }

    public function updateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = Auth::user();
        $user->update(['email' => $request->email]);
        return redirect('/dashboard')->with('success', 'Email updated successfully.');
    }

    public function updateAffiliateId(Request $request)
    {
        $request->validate(['affiliate_id' => 'required|string']);
        $user = Auth::user();
        $user->update(['affiliate_id' => $request->affiliate_id]);
        return redirect('/dashboard')->with('success', 'Affiliate ID updated successfully.');
    }

    public function generateZip(Request $request)
    {
        $user = Auth::user();
        Job::create([
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        // Logic to generate ZIP file (e.g., queue a job)

        return redirect('/dashboard')->with('success', 'ZIP file generation started.');
    }
}