<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'first_name'   => "First{$i}",
                'last_name'    => "Last{$i}",
                'email'        => "user{$i}@gmail.com",
                'password'     => Hash::make('12345'),
                'phone_number' => "0300-00000{$i}",
                'gender'       => ($i % 2 == 0) ? 'Male' : 'Female',
                'dob'          => Carbon::createFromDate(1990 + $i, 1, 1)->toDateString(),
                'address'      => "Address {$i}",
                'profile_photo'=> null,
                'role_id'      => rand(1, 5),
            ]);
        }
    }
}