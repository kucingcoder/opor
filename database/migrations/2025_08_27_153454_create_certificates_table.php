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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail', 32)->unique();
            $table->string('name', 64)->unique();
            $table->string('description', 128);
            $table->string('file', 40)->unique();
            $table->unsignedBigInteger('certificate_category_id');
            $table->timestamps();

            $table->foreign('certificate_category_id')
                ->references('id')
                ->on('certificate_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
