<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    public function run()
    {
        DB::table('inventory')->insert([
            'name' => 'Tent',
            'description' => 'Large camping tent for 10 people.',
            'quantity' => 5,
            'youth_movement' => 'Scouts Halle',
            'place' => 'Loods, rek 2, niveau 2',
        ]);
    }
}

?>