<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed the users table with 10 users
        \App\Models\User::factory(10)->create();
        
        // Seed the admin user
        $this->call(AdminUserSeeder::class);
    }
}