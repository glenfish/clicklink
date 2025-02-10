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

            $resetLink = URL::to('/reset-password/' . $token);
            // Send the reset link via email - Implement email sending logic here

            return redirect('/forgot-password')->with('success', 'Password reset link sent to your email.');
        }

        return redirect('/forgot-password')->with('error', 'Email does not exist.');
    }

    public function showResetPasswordForm($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();

        if ($passwordReset && Carbon::now()->lt($passwordReset->expires_at)) {
            return view('auth.reset_password', compact('token'));
        }

        return redirect('/forgot-password')->with('error', 'Invalid or expired password reset token.');
    }

    public function resetPassword(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $passwordReset = PasswordReset::where('token', $token)->first();

        if ($passwordReset && Carbon::now()->lt($passwordReset->expires_at)) {
            $user = User::find($passwordReset->user_id);
            $user->update(['password' => Hash::make($request->password)]);

            $passwordReset->delete();

            return redirect('/login')->with('success', 'Password reset successfully. You can now log in.');
        }

        return redirect('/forgot-password')->with('error', 'Invalid or expired password reset token.');
    }
}