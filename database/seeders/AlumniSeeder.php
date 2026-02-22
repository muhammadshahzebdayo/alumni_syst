<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('alumni')->insert([
                'user_id'        => $i,
                'department_id'  => rand(1, 10),
                'graduation_year'=> 2010 + $i,
                'current_job'    => "Job Title {$i}"
            ]);
        }
    }
}