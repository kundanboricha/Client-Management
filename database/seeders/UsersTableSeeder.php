<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'mobile_number' => $faker->numerify('##########'),
                'gender' => $faker->randomElement([1, 2]), // Assuming 1 represents Male, 2 represents Female
                'state' => $faker->state,
                'address' => $faker->address,
                'city' => $faker->city,
                'password' => Hash::make('password'), // Hashing the default password 'password'
            ]);
        }
    }
}
