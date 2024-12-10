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
        Schema::create('damage_reports', function (Blueprint $table) {
            // Primary key for report_id
            $table->id('report_id'); // AUTO_INCREMENT in MySQL by default

            // Foreign key for user_id referencing the users table
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Foreign key for item_id referencing the inventory table
            $table->foreignId('item_id')->constrained('inventory')->onDelete('cascade');

            // Description of the damage (TEXT type with NOT NULL constraint)
            $table->text('description')->nullable(false);

            // Timestamp for when the report was created, with default CURRENT_TIMESTAMP
            $table->timestamp('created_at')->useCurrent();

            // Optional updated_at column for when the report is updated
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('damage_reports');
    }
};
