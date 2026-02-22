<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void {
    $categories = [
        ['category_id' => 1, 'category_name' => 'Software Development'],
        ['category_id' => 2, 'category_name' => 'Data Science'],
        ['category_id' => 3, 'category_name' => 'Digital Marketing'],
        ['category_id' => 4, 'category_name' => 'Graphic Designing'],
        ['category_id' => 5, 'category_name' => 'Human Resources'],
    ];
    DB::table('job_categories')->insert($categories);
}
}
