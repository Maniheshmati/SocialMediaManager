<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 40; $i++) {
            User::create([
                'first_name'        => $faker->firstName,
                'last_name'         => $faker->lastName,
                'name'              => $faker->firstName . ' ' . $faker->lastName,
                'email'             => $faker->unique()->safeEmail,
                'email_verified_at' => Carbon::now(),
                'password'          => Hash::make('password'), // all users have password = "password"
                'remember_token'    => null,
                'is_admin'          => 0,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
        }
    }
}
