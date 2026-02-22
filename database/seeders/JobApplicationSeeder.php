<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobApplicationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('job_applications')->insert([
            [
                'job_id' => 1, // Laravel Backend Developer
                'user_id' => 2, // Assuming User ID 2 is a Student
                'applied_at' => now(),
                'created_at' => now(),
            ],
            [
                'job_id' => 2, // UI/UX Design Intern
                'user_id' => 2,
                'applied_at' => now(),
                'created_at' => now(),
            ],
            [
                'job_id' => 1,
                'user_id' => 3, // Another Student
                'applied_at' => now(),
                'created_at' => now(),
            ]
        ]);
    }
}