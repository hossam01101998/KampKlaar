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
        Schema::create('inventory', function (Blueprint $table) {
            // Primary key for item_id
            $table->id('item_id'); // AUTO_INCREMENT in MySQL by default

            // Item name (VARCHAR(100)) with NOT NULL constraint
            $table->string('name', 100)->nullable(false);

            // Description of the item (TEXT type, no constraint)
            $table->text('description')->nullable();

            // Quantity of the item (INT with NOT NULL constraint)
            $table->integer('quantity')->nullable(false);

            // Youth movement (VARCHAR(100)) with NOT NULL constraint
            $table->string('youth_movement', 100)->nullable(false);

            // Timestamps for created_at and updated_at
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
