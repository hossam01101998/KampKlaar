<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

use App\Models\User;
use App\Models\Item;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */


    public function run(): void
    {
        /*DB::table('users')->insert([
            'username' => 'admin',
            'password' => 'password123',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'youth_movement' => 'Scouts Halle',
        ]);*/



       User::create([
            'username' => 'hossam12',
            'youth_movement' => 'ADVENTURE LEADERS',
            'email' => 'hossam@gmail.com',
            'Phone' => '01111451111',
            'password' => '11111111',
            'isadmin' => true,
        ]);



        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'username' => $faker->userName,
                'email' => $faker->unique()->email,
                'Phone' => '0445785546' + $i*5115485,
                'password' => 'password123',
                'isadmin' => false,
                'youth_movement' => 'ADVENTURE LEADERS']);

        }

        User::create([
            'username' => 'admin',
            'youth_movement' => 'NAUTRE EXPLORERS',
            'email' => 'hossam2@gmail.com',
            'Phone' => '01111111111',
            'password' => '11111111',
            'isadmin' => true,
        ]);

        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++) {
            User::create([
                'username' => $faker->userName,
                'email' => $faker->unique()->email,
                'Phone' => '04521552452' + $i*10115485,
                'password' => 'password123',
                'isadmin' => false,
                'youth_movement' => 'NATURE EXPLORERS']);

        }
    }
}
