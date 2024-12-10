<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            // Primary key for reservation_id
            $table->id('reservation_id'); // AUTO_INCREMENT by default in MySQL

            // Foreign key for user_id referencing the users table
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Foreign key for item_id referencing the inventory table
            $table->foreignId('item_id')->constrained('inventory')->onDelete('cascade');

            // Start date and end date (DATE type with NOT NULL constraints)
            $table->date('start_date')->nullable(false);
            $table->date('end_date')->nullable(false);

            // Timestamps for created_at and updated_at
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
