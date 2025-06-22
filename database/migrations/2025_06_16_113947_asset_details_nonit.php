<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asset_details_nonit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained('assets')->onDelete('cascade');
            $table->string('brand')->nullable();;
            $table->string('model')->nullable();;
            $table->string('material')->nullable();;
            $table->string('dimension')->nullable();;
            $table->string('voltage')->nullable();;
            $table->string('power_usage')->nullable();;
            $table->string('location_installed')->nullable();;
            $table->string('maintenance_cycle')->nullable();;
            $table->date('warranty_expiry_date')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
    }
};
