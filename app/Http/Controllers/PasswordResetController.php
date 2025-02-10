<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PasswordResetController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot_password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $token = Str::random(32);
            $expiresAt = Carbon::now()->addHour();

            PasswordReset::create([
                'user_id' => $user->id,
                'token' => $token,
                'expires_at' => $expiresAt,
            ]);

            $resetLink = URL::to('/reset_password/' . $token);
            return redirect('/forgot_password')->with('success', "A password reset link has been generated. For testing, use: $resetLink");
        }

        return redirect('/forgot_password')->with('error', 'Email address not found.');
    }

    public function showResetPasswordForm($token)
    {
        $resetRecord = PasswordReset::where('token', $token)->first();

        if ($resetRecord && $resetRecord->expires_at > Carbon::now()) {
            return view('auth.reset_password', compact('token'));
        }

        return redirect('/forgot_password')->with('error', 'Invalid or expired password reset token.');
    }

    public function resetPassword(Request $request, $token)
    {
        $resetRecord = PasswordReset::where('token', $token)->first();

        if ($resetRecord && $resetRecord->expires_at > Carbon::now()) {
            $request->validate([
                'password' => 'required|confirmed',
            ]);

            $user = User::find($resetRecord->user_id);
            $user->update(['password' => Hash::make($request->password)]);

            $resetRecord->delete();

            return redirect('/login')->with('success', 'Password has been reset successfully. Please log in.');
        }

        return redirect('/forgot_password')->with('error', 'Invalid or expired password reset token.');
    }
}