<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        DB::table('user_roles')->insert([
            ['role_name' => 'Admin'],
            ['role_name' => 'Student'],
            ['role_name' => 'Recruiter'],
            ['role_name' => 'Faculty'],
            ['role_name' => 'Staff'],
            ['role_name' => 'Guest'],
            ['role_name' => 'Moderator'],
            ['role_name' => 'Support'],
            ['role_name' => 'Manager'],
            ['role_name' => 'Director'],
        ]);
    }
}
