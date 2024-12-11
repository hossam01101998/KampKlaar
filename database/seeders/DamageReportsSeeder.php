<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DamageReportsSeeder extends Seeder
{
    public function run()
    {
        DB::table('damage_reports')->insert([
            'user_id' => 1,  // Assuming admin user ID
            'item_id' => 1,  // Assuming the first inventory item ID
            'description' => 'The tent has a small tear in the fabric.',
        ]);
    }
}

?>