<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
        User::truncate();

        $faker = \Faker\Factory::create();

        User::create([
            'name' => 'tester',
            'email' => 'tester@test.com',
            'password' => Hash::make($faker->password),
            'api_token' => str_random(70),
        ]);
        // generate a few more users for our app
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($faker->password),
                'api_token' => str_random(70),
            ]);
        }
    }
}
