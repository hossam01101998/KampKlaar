<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            // This will be AUTO_INCREMENT in MySQL by default
            $table->string('username',50)->unique()->nullable(false); // UNIQUE and NOT NULL

            $table->string('password', 255)->nullable(false); // NOT NULL
            $table->string('email', 100)->unique()->nullable(false); // UNIQUE and NOT NULL
            $table->timestamp('email_verified_at')->nullable();

            $table->string('phone', 15)->unique()->nullable();
            $table->string('photo', 255)->nullable();

            //$table->enum('role', ['admin', 'leader'])->default('leader');
            $table->boolean('isadmin')->default(false);

            //by default the user is a leader

            $table->string('youth_movement', 100)->nullable(false);

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
