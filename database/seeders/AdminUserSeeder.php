<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::FirstOrCreate(
            ['email' => 'admin@TaskMate.test'],
            [
                'name' => 'TaskMate',
                'username' => 'TaskMate',
                'password' => bcrypt('123456'), // Change this to a secure password
                'role' => 'admin',
                'account_status' => 'active',
                'sign_up_date' => now(),
                'last_login' => now(),
                'profile_picture' => null,
            ]);
        
    }
}
