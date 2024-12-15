<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $items = [
            [
                'name' => 'Soccer Ball',
                'description' => 'Standard size soccer ball, ideal for training and matches.',
                'quantity' => 50,
                'place' => 'Warehouse A',
                'youth_movement' => 'Group 1',
            ],
            [
                'name' => 'Tennis Racket',
                'description' => 'Professional tennis racket, lightweight and durable for advanced players.',
                'quantity' => 30,
                'place' => 'Warehouse B',
                'youth_movement' => 'Group 1',
            ],
            [
                'name' => 'Squash Shoes',
                'description' => 'High-quality squash shoes, with non-slip soles and comfort for long sessions.',
                'quantity' => 40,
                'place' => 'Warehouse C',
                'youth_movement' => 'Group 1',
            ],
            [
                'name' => 'Basketball',
                'description' => 'Professional basketball, durable and perfect for training and games.',
                'quantity' => 60,
                'place' => 'Warehouse D',
                'youth_movement' => 'Group 1',
            ],
            [
                'name' => 'Volleyball',
                'description' => 'Competition-grade volleyball, ideal for intermediate and advanced level tournaments.',
                'quantity' => 25,
                'place' => 'Warehouse E',
                'youth_movement' => 'Group 1',
            ],
            [
                'name' => 'Gym Equipment',
                'description' => 'Set of dumbbells, mats, and resistance bands for home training.',
                'quantity' => 100,
                'place' => 'Warehouse F',
                'youth_movement' => 'Group 1',
            ],
            [
                'name' => 'Cycling Helmet',
                'description' => 'High-security cycling helmet, ventilated with aerodynamic design.',
                'quantity' => 35,
                'place' => 'Warehouse G',
                'youth_movement' => 'Group 1',
            ],
            [
                'name' => 'Running Shoes',
                'description' => 'Running shoes with excellent cushioning, perfect for both short and long-distance running.',
                'quantity' => 45,
                'place' => 'Warehouse H',
                'youth_movement' => 'Group 1',
            ],
            [
                'name' => 'Training Shirt',
                'description' => 'Technical fabric shirt, ideal for intensive training sessions.',
                'quantity' => 70,
                'place' => 'Warehouse I',
                'youth_movement' => 'Group 1',
            ],
            [
                'name' => 'Sports Backpack',
                'description' => 'Durable sports backpack with compartments for sports gear and accessories.',
                'quantity' => 15,
                'place' => 'Warehouse J',
                'youth_movement' => 'Group 1',
            ],
        ];

        // Insert items into the database
        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
