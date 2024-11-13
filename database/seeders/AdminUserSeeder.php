<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'username' => 'admin',              // Admin username
            'firstName' => 'Admin',
            'lastName' => 'User',
            'email' => 'admin@test.com',     // Replace with admin email
            'password' => Hash::make('admin1234'), // Replace with secure password
            'age' => 30,                        // Sample age
            'qualification' => 'Post-Graduate',         // Sample qualification
            'is_admin' => true,                 // Mark as admin
        ]);
    }
}
