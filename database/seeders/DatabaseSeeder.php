<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin Travel Jogja',
            'email' => 'admin@traveljogja.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123098'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Rsyid',
            'email' => 'rsyid@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('rsyid123'),
            'role' => 'admin',
        ]);

        // Create a regular user for testing
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
