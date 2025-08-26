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
            $table->uuid('id')->primary();
            $table->string('username', 16)->unique();
            $table->char('password', 60);
            $table->string('full_name', 64);
            $table->string('profession', 32);
            $table->string('description', 300);
            $table->string('email', 64);
            $table->string('phone', 16);
            $table->string('address', 128);
            $table->string('photo', 32);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
