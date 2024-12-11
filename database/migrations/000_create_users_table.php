<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->string('email', 100)->unique();
            $table->enum('role', ['admin', 'leader'])->default('leader');
            $table->string('youth_movement', 100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

?>