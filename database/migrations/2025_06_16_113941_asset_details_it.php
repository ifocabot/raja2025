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
    Schema::create('asset_details_it', function (Blueprint $table) {
        $table->id();
        $table->foreignId('asset_id')->constrained('assets')->onDelete('cascade');
        $table->string('brand');
        $table->string('model');
        $table->string('serial_number');
        $table->string('os');
        $table->string('cpu');
        $table->string('ram');
        $table->string('storage');
        $table->string('mac_address');
        $table->string('ip_address');
        $table->string('license_key');
        $table->date('warranty_expiry_date')->nullable();
        $table->timestamps();

    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
