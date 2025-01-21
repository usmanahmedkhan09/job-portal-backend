<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Software Development', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Web Development', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mobile Development', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Data Science & AI', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cybersecurity', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cloud Computing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'IT Support', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Marketing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'SEO & Content Writing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Graphic Design', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Finance & Accounting', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Banking & Investment', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Healthcare', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nursing & Medical Assistance', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pharmaceuticals', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Education & Teaching', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Legal & Law Services', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Engineering', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Civil Engineering', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mechanical Engineering', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Electrical Engineering', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Customer Service', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Human Resources (HR)', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Retail & Sales', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hospitality & Tourism', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Logistics & Supply Chain', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Manufacturing & Production', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Real Estate', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Construction & Architecture', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Aerospace & Aviation', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Energy & Oil/Gas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Government & Public Administration', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Non-Profit & NGO', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Media & Entertainment', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Journalism & Writing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sports & Fitness', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Telecommunications', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Agriculture & Farming', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Automotive Industry', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('job_categories')->insert($categories);
    }
}
