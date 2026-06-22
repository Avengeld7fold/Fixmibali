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
        // ponytail: security — fail-loud instead of seeding a weak default password.
        // Upgrade: when a proper RBAC/role system is in place, drop this guard.
        $password = env('ADMIN_PASSWORD');
        if ($password === null || $password === '' || $password === 'admin12345') {
            throw new \RuntimeException(
                'Set ADMIN_PASSWORD (and ADMIN_EMAIL/ADMIN_USERNAME) in your .env before seeding. '
                .'Refusing to seed a weak default admin account.'
            );
        }

        $email = env('ADMIN_EMAIL', 'admin@example.com');
        $name = env('ADMIN_NAME', 'Admin');
        $username = env('ADMIN_USERNAME', 'admin');

        // is_admin is intentionally NOT in $fillable to prevent mass-assignment
        // privilege escalation. We set it explicitly here instead.
        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'username' => $username,
                'password' => Hash::make($password),
            ]
        );
        $user->is_admin = true;
        $user->save();
    }
}
