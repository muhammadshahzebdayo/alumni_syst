<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   public function run(): void
{
    $this->call([
        UserRolesSeeder::class,
        UsersSeeder::class,
        DepartmentsSeeder::class,
        AlumniSeeder::class,
        GroupsSeeder::class,
        GroupsMembersSeeder::class,
        EventsSeeder::class,
        EventsParticipantsSeeder::class,
        LoginLogsSeeder::class,
        MessagesSeeder::class,
        JobCategorySeeder::class,
        JobSeeder::class,
        NewsSeeder::class,
        JobApplicationSeeder::class
        ]);
}
}
