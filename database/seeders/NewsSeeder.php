<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void {
    DB::table('news')->insert([
        [
            'title' => 'Annual Alumni Meetup 2026',
            'content' => 'Join us for the grand alumni gathering next month.',
            'created_at' => now(),
        ],
        [
            'title' => 'New Placement Drive',
            'content' => 'Top Tech companies are visiting for recruitment on Monday.',
            'created_at' => now(),
        ]
    ]);
}
}
