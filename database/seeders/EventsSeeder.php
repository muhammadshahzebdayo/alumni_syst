<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('events')->insert([
                'event_name'  => "Event {$i}",
                'description' => "Description for event {$i}",
                'event_date'  => now()->addDays($i),
            ]);
        }
    }
}
