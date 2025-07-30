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
        Schema::create('crews', function (Blueprint $table) {
            $table->id();
            $table->integer('ship_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('role', ['captain', 'Chief officer', 'Able Seaman', 'Ordinary Seaman', 'Engine Cadet', 'Radio officer', 'Chief Cook', 'Steward', 'Deckhand'])->default('Captain');
            $table->string('phone_number')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->foreign('ship_id')->references('id')->on('ships')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crews');
    }
};
