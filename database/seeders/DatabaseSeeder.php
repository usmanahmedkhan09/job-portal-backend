<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // JobCategoriesSeeder::class,
            // jobseeder::class,
            // RolesSeeder::class,
            GenericPermissionSeeder::class,
            // skills_seeder::class,
        ]);
    }
}
