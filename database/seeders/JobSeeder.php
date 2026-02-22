<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  public function run(): void {
    DB::table('job')->insert([
        [
            'job_id' => 1,
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'Laravel Backend Developer',
            'company_name' => 'TechSolutions PK',
            'description' => 'Expert in Laravel and MySQL required.',
            'location' => 'Karachi',
            'job_type' => 'Full-time',
            'salary_range' => '60k - 90k',
            'status' => 'Active',
            'created_at' => now(),
        ],
        [
            'job_id' => 2,
            'user_id' => 1,
            'category_id' => 4,
            'title' => 'UI/UX Design Intern',
            'company_name' => 'Creative Agency',
            'description' => 'Learning opportunity for fresh designers.',
            'location' => 'Remote',
            'job_type' => 'Remote Internship',
            'salary_range' => '15k - 20k',
            'status' => 'Active',
            'created_at' => now(),
        ]
    ]);
}
}
