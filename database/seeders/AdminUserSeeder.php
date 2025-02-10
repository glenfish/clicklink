<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpassword'), // Set a secure password
            'role' => 'admin',
        ]);
    }
}