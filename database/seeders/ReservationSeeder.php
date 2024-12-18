<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Item;
use Faker\Factory as Faker;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = User::all();
        $items = Item::all();



        foreach ($users as $user) {
            for ($i = 0; $i < 3; $i++) {
                $randomItem = $items->random();

                $startDate = $faker->dateTimeBetween('now', '+1 month')->format('Y/m/d');
                $endDate = $faker->dateTimeBetween('+1 month', '+2 months')->format('Y/m/d');


                Reservation::create([
                    'user_id' => $user->user_id,
                    'item_id' => $randomItem->item_id,
                    'quantity' => $faker->numberBetween(1, $randomItem->quantity),
                    'status' => $faker->boolean(80),
                    'start_date' => $startDate,
                    'end_date' => $endDate

                    //'start_date' => '2024/12/19',
                    //'end_date' => '2024/12/25'

                ]);
            }
        }
    }
}
