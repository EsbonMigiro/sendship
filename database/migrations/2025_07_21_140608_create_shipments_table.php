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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->integer('cargo_id')->unsigned();
            $table->integer('ship_id')->unsigned();
            $table->integer('origin_port_id')->unsigned();
            $table->integer('destination_port_id')->unsigned();
            $table->date('departure_date')->nullable();
            $table->date('arrival_estimate')->nullable();
            $table->date('actual_arrival_date')->nullable();
            $table->enum('status', ['pending', 'in_transit', 'delivered', 'delayed'])->default('pending');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('set null');
            $table->foreign('ship_id')->references('id')->on('ships')->onDelete('set null');
            $table->foreign('origin_port_id')->references('id')->on('ports')->onDelete('set null');
            $table->foreign('destination_port_id')->references('id')->on('ports')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
