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
                'quantity' => 57,
                'place' => 'Warehouse A 485Y',
                'youth_movement' => 'ADVENTURE LEADERS',
                'photo'=> 'images/item_photos/soccer.jpg',
            ],
            [
                'name' => 'Tennis Racket',
                'description' => 'Professional tennis racket, lightweight and durable for advanced players.',
                'quantity' => 30,
                'place' => 'Warehouse A 14F',
                'youth_movement' => 'ADVENTURE LEADERS',
                'photo'=> 'images/item_photos/tennis.jpg',
            ],
            [
                'name' => 'Squash Shoes 36-45',
                'description' => 'High-quality squash shoes, with non-slip soles and comfort for long sessions.',
                'quantity' => 40,
                'place' => 'Warehouse A 27A',
                'youth_movement' => 'ADVENTURE LEADERS',
                'photo'=> 'images/item_photos/shoes.jpg',
            ],
            [
                'name' => 'Basketball',
                'description' => 'Professional basketball, durable and perfect for training and games.',
                'quantity' => 60,
                'place' => 'Warehouse B 123U',
                'youth_movement' => 'ADVENTURE LEADERS',
                'photo'=> 'images/item_photos/basketball.jpg',
            ],
            [
                'name' => 'Volleyball',
                'description' => 'Competition-grade volleyball, ideal for intermediate and advanced level tournaments.',
                'quantity' => 25,
                'place' => 'Warehouse A 103I',
                'youth_movement' => 'ADVENTURE LEADERS',
                'photo'=> 'images/item_photos/volleyball.jpg',
            ],
            [
                'name' => 'Paddle Surf Set',
                'description' => 'Paddle surf board with paddle, ideal for beginners and intermediate level users.',
                'quantity' => 17,
                'place' => 'Warehouse B 34H',
                'youth_movement' => 'ADVENTURE LEADERS',
                'photo'=> 'images/item_photos/paddlesurf.jpg',
            ],
            [
                'name' => 'Cycling Helmet',
                'description' => 'High-security cycling helmet, ventilated with aerodynamic design.',
                'quantity' => 35,
                'place' => 'Warehouse A 74E',
                'youth_movement' => 'ADVENTURE LEADERS',
                'photo'=> 'images/item_photos/helmet.png',
            ],
            [
                'name' => 'Wetsuits',
                'description' => 'Professional wetsuits, ideal for water sports and diving.',
                'quantity' => 45,
                'place' => 'Warehouse B 12K',
                'youth_movement' => 'ADVENTURE LEADERS',
                'photo'=> 'images/item_photos/wetsuits.png',
            ],
            [
                'name' => 'Snow Goggles',
                'description' => 'Professional snow goggles, with UV protection and anti-fog lenses.',
                'quantity' => 63,
                'place' => 'Warehouse A 32R',
                'youth_movement' => 'ADVENTURE LEADERS',
                'photo'=> 'images/item_photos/snowglasses.jpg',
            ],
            [
                'name' => 'Tents 2-4 people',
                'description' => 'High-quality tents for 2-4 people, ideal for camping and outdoor activities.',
                'quantity' => 15,
                'place' => 'Warehouse B 85S',
                'youth_movement' => 'ADVENTURE LEADERS',
                'photo'=> 'images/item_photos/tents.jpg',
            ],
            [
                'name' => 'Fishing Rod',
                'description' => 'Professional fishing rod, ideal for freshwater and saltwater fishing.',
                'quantity' => 17,
                'place' => 'Warehouse B 115A',
                'youth_movement' => 'ADVENTURE LEADERS',
                'photo'=> 'images/item_photos/fishing.jpg',
            ],

            //another youth movement

            [
                'name' => 'Kayak',
                'description' => 'Professional kayak, ideal for beginners and intermediate level users.',
                'quantity' => 12,
                'place' => 'Gent Warehouse 13',
                'youth_movement' => 'NATURE EXPLORERS',
                'photo'=> 'images/item_photos/kayak.jpg',
            ],
            [
                'name' => 'Binooculars',
                'description' => 'High-quality binoculars, with 10x magnification and anti-glare lenses. For birdwatching and nature observation.',
                'quantity' => 37,
                'place' => 'Gent Warehouse 24',
                'youth_movement' => 'NATURE EXPLORERS',
                'photo'=> 'images/item_photos/binocular.jpg',
            ],
            [
                'name' => 'Scuba Diving Gear',
                'description' => 'Professional scuba diving gear, including wetsuit, fins, mask, and snorkel.',
                'quantity' => 24,
                'place' => 'Gent Warehouse 51',
                'youth_movement' => 'NATURE EXPLORERS',
                'photo'=> 'images/item_photos/diving.jpg',
            ],
        ];

        // Insert items into the database
        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
