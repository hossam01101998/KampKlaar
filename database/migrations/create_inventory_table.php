<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::statement('PRAGMA foreign_keys = ON'); // Enable foreign keys
        
        Schema::create('inventory', function (Blueprint $table) {
            $table->id('item_id');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->integer('quantity');
            $table->string('youth_movement', 100);
            $table->string('place', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}

?>