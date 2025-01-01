<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DamageReport;
use App\Models\Item;
use App\Models\User;

class DamageReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $users = User::all();
        $items = Item::all();

        if ($users->isEmpty() || $items->isEmpty()) {
            $this->command->warn('No users or items found. Seed these tables first.');
            return;
        }

        DamageReport::create([
            'user_id' => 5,
            'item_id' => 4,
            'description' => 'One of the balls that I took was punctured, so we could not use it.',
            'photo' => 'images/damage_photos/basketball.jpg',
        ]);

        DamageReport::create([
            'user_id' => 3,
            'item_id' => 7,
            'description' => 'We rented 4 helmets for a bike ride, but one of us had an accident and the helmet was damaged. I
            am sorry for the inconvenience. I will pay for the damage. please contact me for the payment: 04221157854',
            'photo' => 'images/damage_photos/helmet.jpg',
        ]);

        $user = User::find(2);

        if ($user){

        DamageReport::create([
            'user_id' => $user->user_id,
            'item_id' => 2,
            'description' => 'I took 7 tennis rackets for a tennis tournament, but one of them broke during the game.
            Please let me know if I need to pay for the damage. Contact me at ' . $user->email . ' or ' . $user->phone,
            'photo' => 'images/damage_photos/tennis.jpg',
        ]);
        }

        DamageReport::create([
            'user_id' => 14,
            'item_id' => 13,
            'description' => 'One of the binoculars that I took was broken. When I opened the case, the binoculars were in pieces.',
            'photo' => 'images/damage_photos/binocular.jpg',
        ]);
    }
}

