<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'user_id' => '1',
            'username' => 'Test User',
            'password' => '****',
            'email' => 'test@example.com',
            'role' => 'admin',
            'yout_movement' => 'chiro blabla',
        ]);
    }
}
