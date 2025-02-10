<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 'admin') {
            return $next($request);
        }

        return redirect('/')->with('error', 'You do not have admin access.');
    }
}