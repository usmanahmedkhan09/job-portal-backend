<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Enums\RolesEnum;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // List of roles to create
          $roles = [
            RolesEnum::ADMIN,
            RolesEnum::EMPLOYER,
            RolesEnum::JOB_SEEKER,
            RolesEnum::MODERATOR,
            RolesEnum::GUEST,
            RolesEnum::HR_ADMIN_SUPPORT
        ];

        // Loop through each role and create it if it doesn't already exist
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $this->command->info('Roles seeded successfully!');
    }
}
