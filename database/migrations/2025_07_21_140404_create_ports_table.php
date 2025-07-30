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
        Schema::create('ports', function (Blueprint $table) {
            $table->id(); // Unique identifier for each port
            $table->string('name', 255)->notNullable(); // Name of the port
            $table->string('country', 100)->notNullable(); // Country where the port is located
            $table->string('port_type', 100)->nullable(); // Type of port (Cargo, Passenger, etc.)
            $table->string('coordinates', 50)->nullable(); // Latitude and longitude coordinates
            $table->float('depth')->nullable(); // Depth of the harbor in meters
            $table->integer('docking_capacity')->nullable(); // Number of available docking spaces or berths
            $table->float('max_vessel_size')->nullable(); // Maximum vessel size in meters
            $table->string('security_level', 50)->nullable(); // Security level (e.g., High, Medium, Low)
            $table->boolean('customs_authorized')->default(false); // Whether the port is authorized for customs clearance
            $table->string('operational_hours', 50)->nullable(); // Operational hours of the port
            $table->string('port_manager', 255)->nullable(); // Manager of the port
            $table->string('port_contact_info', 255)->nullable(); // Contact information for the port
            $table->boolean('is_active')->default(true); // Whether the port is active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ports');
    }
};
