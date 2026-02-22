<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('departments')->insert([
            'department_name' => "Department $i",   // must match migration column
            ]);
        }
    }
}
