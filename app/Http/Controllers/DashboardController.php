<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobResult;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $hasJob = JobResult::where('user_id', Auth::id())->count() > 0;
        return view('dashboard', compact('hasJob'));
    }
}