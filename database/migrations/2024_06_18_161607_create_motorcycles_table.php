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
        Schema::create('motorcycles', function (Blueprint $table) {
            $table->id();
            $table->string('manufacturer');
            $table->string('model');
            $table->decimal('engine_size', 4, 1)->nullable();
            $table->integer('horsepower')->nullable();
            $table->decimal('torque', 5, 2)->nullable();
            $table->integer('top_speed')->nullable();
            $table->integer('year')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('category')->nullable();
            $table->string('image_url')->nullable();
            $table->text('description')->nullable();
            $table->integer('amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorcycles');
    }
};
