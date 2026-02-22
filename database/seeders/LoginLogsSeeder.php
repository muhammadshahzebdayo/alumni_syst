<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoginLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('login_logs')->insert([
                'user_id' => $i,
                'ip_address' => "192.168.1.$i",
                'created_at' => now(),   // ✅ matches migration
                'updated_at' => now(),
            ]);
        }
    }
}
