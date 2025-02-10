<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return Auth::check() ? redirect('/dashboard') : redirect('/login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'affiliate_id' => 'nullable|string',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'affiliate_id' => $request->affiliate_id,
        ]);

        Auth::login($user);
        return redirect('/dashboard')->with('success', 'Registration successful!');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'Logged in successfully!');
        }

        return redirect('/login')->with('error', 'Invalid email or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logged out successfully');
    }

    public function showAdminLoginForm()
    {
        return view('auth.admin_login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/admin/dashboard')->with('success', 'Admin logged in successfully!');
        }

        return redirect('/admin/login')->with('error', 'Invalid admin email or password');
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login')->with('success', 'Logged out successfully');
    }
}