<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminSetting;
use App\Models\User;

class AdminController extends Controller
{
    public function settings()
    {
        $setting = AdminSetting::first() ?? new AdminSetting(['affiliate_url_base' => 'https://yourdomain.com/encryptfire?seller=']);
        return view('admin.settings', compact('setting'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'affiliate_url_base' => 'required|string',
        ]);

        $setting = AdminSetting::first();
        if ($setting) {
            $setting->update(['affiliate_url_base' => $request->affiliate_url_base]);
        } else {
            AdminSetting::create(['affiliate_url_base' => $request->affiliate_url_base]);
        }

        return redirect('/admin/settings')->with('success', 'Settings updated successfully.');
    }

    public function dashboard()
    {
        $users = User::orderBy('id')->get();
        return view('admin.dashboard', compact('users'));
    }
}