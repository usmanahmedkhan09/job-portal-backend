<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class skills_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, get or create the job categories
        $categories = [
            'Software Development' => DB::table('job_categories')->where('name', 'Software Development')->first()->id,
            'Web Development' => DB::table('job_categories')->where('name', 'Web Development')->first()->id,
            'Mobile Development' => DB::table('job_categories')->where('name', 'Mobile Development')->first()->id,
            'Data Science & AI' => DB::table('job_categories')->where('name', 'Data Science & AI')->first()->id,
            'Cybersecurity' => DB::table('job_categories')->where('name', 'Cybersecurity')->first()->id,
            'Cloud Computing' => DB::table('job_categories')->where('name', 'Cloud Computing')->first()->id,
            'IT Support' => DB::table('job_categories')->where('name', 'IT Support')->first()->id,
            'Marketing' => DB::table('job_categories')->where('name', 'Marketing')->first()->id,
            'SEO & Content Writing' => DB::table('job_categories')->where('name', 'SEO & Content Writing')->first()->id,
            'Graphic Design' => DB::table('job_categories')->where('name', 'Graphic Design')->first()->id,
            'Finance & Accounting' => DB::table('job_categories')->where('name', 'Finance & Accounting')->first()->id,
            'Banking & Investment' => DB::table('job_categories')->where('name', 'Banking & Investment')->first()->id,
            'Healthcare' => DB::table('job_categories')->where('name', 'Healthcare')->first()->id,
            'Nursing & Medical Assistance' => DB::table('job_categories')->where('name', 'Nursing & Medical Assistance')->first()->id,
            'Pharmaceuticals' => DB::table('job_categories')->where('name', 'Pharmaceuticals')->first()->id,
            'Education & Teaching' => DB::table('job_categories')->where('name', 'Education & Teaching')->first()->id,
            'Legal & Law Services' => DB::table('job_categories')->where('name', 'Legal & Law Services')->first()->id,
            'Engineering' => DB::table('job_categories')->where('name', 'Engineering')->first()->id,
            'Civil Engineering' => DB::table('job_categories')->where('name', 'Civil Engineering')->first()->id,
            'Mechanical Engineering' => DB::table('job_categories')->where('name', 'Mechanical Engineering')->first()->id,
            'Electrical Engineering' => DB::table('job_categories')->where('name', 'Electrical Engineering')->first()->id,
            'Customer Service' => DB::table('job_categories')->where('name', 'Customer Service')->first()->id,
            'Human Resources (HR)' => DB::table('job_categories')->where('name', 'Human Resources (HR)')->first()->id,
            'Retail & Sales' => DB::table('job_categories')->where('name', 'Retail & Sales')->first()->id,
            'Hospitality & Tourism' => DB::table('job_categories')->where('name', 'Hospitality & Tourism')->first()->id,
            'Logistics & Supply Chain' => DB::table('job_categories')->where('name', 'Logistics & Supply Chain')->first()->id,
            'Manufacturing & Production' => DB::table('job_categories')->where('name', 'Manufacturing & Production')->first()->id,
            'Real Estate' => DB::table('job_categories')->where('name', 'Real Estate')->first()->id,
            'Construction & Architecture' => DB::table('job_categories')->where('name', 'Construction & Architecture')->first()->id,
            'Aerospace & Aviation' => DB::table('job_categories')->where('name', 'Aerospace & Aviation')->first()->id,
            'Energy & Oil/Gas' => DB::table('job_categories')->where('name', 'Energy & Oil/Gas')->first()->id,
            'Government & Public Administration' => DB::table('job_categories')->where('name', 'Government & Public Administration')->first()->id,
            'Non-Profit & NGO' => DB::table('job_categories')->where('name', 'Non-Profit & NGO')->first()->id,
            'Media & Entertainment' => DB::table('job_categories')->where('name', 'Media & Entertainment')->first()->id,
            'Journalism & Writing' => DB::table('job_categories')->where('name', 'Journalism & Writing')->first()->id,
            'Sports & Fitness' => DB::table('job_categories')->where('name', 'Sports & Fitness')->first()->id,
            'Telecommunications' => DB::table('job_categories')->where('name', 'Telecommunications')->first()->id,
            'Agriculture & Farming' => DB::table('job_categories')->where('name', 'Agriculture & Farming')->first()->id,
            'Automotive Industry' => DB::table('job_categories')->where('name', 'Automotive Industry')->first()->id
        ];

        $skills = [
            // Software Development
            ['name' => 'PHP', 'category_id' => $categories['Software Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'JavaScript', 'category_id' => $categories['Software Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Python', 'category_id' => $categories['Software Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Java', 'category_id' => $categories['Software Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'C#', 'category_id' => $categories['Software Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ruby', 'category_id' => $categories['Software Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'SQL', 'category_id' => $categories['Software Development'], 'created_at' => now(), 'updated_at' => now()],
            
            // Web Development
            ['name' => 'HTML/CSS', 'category_id' => $categories['Web Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'React', 'category_id' => $categories['Web Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vue.js', 'category_id' => $categories['Web Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Angular', 'category_id' => $categories['Web Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laravel', 'category_id' => $categories['Web Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Node.js', 'category_id' => $categories['Web Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'WordPress', 'category_id' => $categories['Web Development'], 'created_at' => now(), 'updated_at' => now()],
            
            // Mobile Development
            ['name' => 'React Native', 'category_id' => $categories['Mobile Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Flutter', 'category_id' => $categories['Mobile Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Swift', 'category_id' => $categories['Mobile Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kotlin', 'category_id' => $categories['Mobile Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'iOS Development', 'category_id' => $categories['Mobile Development'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Android Development', 'category_id' => $categories['Mobile Development'], 'created_at' => now(), 'updated_at' => now()],
            
            // Data Science & AI
            ['name' => 'Machine Learning', 'category_id' => $categories['Data Science & AI'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'TensorFlow', 'category_id' => $categories['Data Science & AI'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PyTorch', 'category_id' => $categories['Data Science & AI'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'R Programming', 'category_id' => $categories['Data Science & AI'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Data Mining', 'category_id' => $categories['Data Science & AI'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Natural Language Processing', 'category_id' => $categories['Data Science & AI'], 'created_at' => now(), 'updated_at' => now()],
            
            // Cloud Computing
            ['name' => 'AWS', 'category_id' => $categories['Cloud Computing'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Azure', 'category_id' => $categories['Cloud Computing'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Google Cloud', 'category_id' => $categories['Cloud Computing'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Docker', 'category_id' => $categories['Cloud Computing'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kubernetes', 'category_id' => $categories['Cloud Computing'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jenkins', 'category_id' => $categories['Cloud Computing'], 'created_at' => now(), 'updated_at' => now()],
            
            // IT Support
            ['name' => 'Technical Support', 'category_id' => $categories['IT Support'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Network Administration', 'category_id' => $categories['IT Support'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'System Administration', 'category_id' => $categories['IT Support'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hardware Support', 'category_id' => $categories['IT Support'], 'created_at' => now(), 'updated_at' => now()],
            
            // Marketing
            ['name' => 'Digital Marketing', 'category_id' => $categories['Marketing'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Social Media Marketing', 'category_id' => $categories['Marketing'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Email Marketing', 'category_id' => $categories['Marketing'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Content Strategy', 'category_id' => $categories['Marketing'], 'created_at' => now(), 'updated_at' => now()],
            
            // SEO & Content Writing
            ['name' => 'SEO', 'category_id' => $categories['SEO & Content Writing'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Content Writing', 'category_id' => $categories['SEO & Content Writing'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Copywriting', 'category_id' => $categories['SEO & Content Writing'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Blog Writing', 'category_id' => $categories['SEO & Content Writing'], 'created_at' => now(), 'updated_at' => now()],
            
            // Graphic Design
            ['name' => 'Adobe Photoshop', 'category_id' => $categories['Graphic Design'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Adobe Illustrator', 'category_id' => $categories['Graphic Design'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'UI/UX Design', 'category_id' => $categories['Graphic Design'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Figma', 'category_id' => $categories['Graphic Design'], 'created_at' => now(), 'updated_at' => now()],
            
            // Finance & Accounting
            ['name' => 'Financial Analysis', 'category_id' => $categories['Finance & Accounting'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bookkeeping', 'category_id' => $categories['Finance & Accounting'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'QuickBooks', 'category_id' => $categories['Finance & Accounting'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tax Preparation', 'category_id' => $categories['Finance & Accounting'], 'created_at' => now(), 'updated_at' => now()],
            
            // Banking & Investment
            ['name' => 'Investment Analysis', 'category_id' => $categories['Banking & Investment'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Risk Management', 'category_id' => $categories['Banking & Investment'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Portfolio Management', 'category_id' => $categories['Banking & Investment'], 'created_at' => now(), 'updated_at' => now()],
            
            // Healthcare
            ['name' => 'Patient Care', 'category_id' => $categories['Healthcare'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Medical Records', 'category_id' => $categories['Healthcare'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Clinical Research', 'category_id' => $categories['Healthcare'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Healthcare Administration', 'category_id' => $categories['Healthcare'], 'created_at' => now(), 'updated_at' => now()],
            
            // Cybersecurity
            ['name' => 'Network Security', 'category_id' => $categories['Cybersecurity'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Penetration Testing', 'category_id' => $categories['Cybersecurity'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Security Auditing', 'category_id' => $categories['Cybersecurity'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Incident Response', 'category_id' => $categories['Cybersecurity'], 'created_at' => now(), 'updated_at' => now()],
            
            // Engineering (General)
            ['name' => 'AutoCAD', 'category_id' => $categories['Engineering'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Project Management', 'category_id' => $categories['Engineering'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Quality Control', 'category_id' => $categories['Engineering'], 'created_at' => now(), 'updated_at' => now()],
            
            // Human Resources (HR)
            ['name' => 'Recruitment', 'category_id' => $categories['Human Resources (HR)'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Employee Relations', 'category_id' => $categories['Human Resources (HR)'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Performance Management', 'category_id' => $categories['Human Resources (HR)'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'HR Administration', 'category_id' => $categories['Human Resources (HR)'], 'created_at' => now(), 'updated_at' => now()],
            
            // Customer Service
            ['name' => 'Customer Support', 'category_id' => $categories['Customer Service'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Call Center Operations', 'category_id' => $categories['Customer Service'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Conflict Resolution', 'category_id' => $categories['Customer Service'], 'created_at' => now(), 'updated_at' => now()],
            
            // Retail & Sales
            ['name' => 'Sales Strategy', 'category_id' => $categories['Retail & Sales'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Account Management', 'category_id' => $categories['Retail & Sales'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Retail Management', 'category_id' => $categories['Retail & Sales'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Merchandising', 'category_id' => $categories['Retail & Sales'], 'created_at' => now(), 'updated_at' => now()]
        ];

        DB::table('skills')->insert($skills);
    }
}
