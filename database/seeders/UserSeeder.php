<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::create([
            'name' => 'Usman Ahmed',
            'email' => 'usman@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Assign roles if they exist
        if ($adminRole = Role::where('name', 'admin')->first()) {
            $admin->assignRole($adminRole);
        }

    }
} 