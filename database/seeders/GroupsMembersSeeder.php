<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('group_members')->insert([
                'group_id' => rand(1, 10),
                'user_id'  => rand(1, 10),
            ]);
        }
    }
}