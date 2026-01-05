<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the application's database with an admin user.
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@example.com');
        $name = env('ADMIN_NAME', 'Admin');
        $username = env('ADMIN_USERNAME', 'admin');
        $password = env('ADMIN_PASSWORD', 'admin12345');

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'username' => $username,
                'password' => Hash::make($password),
            ]
        );
    }
}
