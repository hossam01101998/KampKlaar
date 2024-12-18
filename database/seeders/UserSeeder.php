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
            'youth_movement' => 'Group 1',
            'email' => 'hossam@gmail.com',
            'password' => '11111111',
            'isadmin' => true,
        ]);



        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'username' => $faker->userName,
                'email' => $faker->unique()->email,
                'password' => 'password123',
                'isadmin' => false,
                'youth_movement' => 'Group 1']);


        }
    }
}
