<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('asset_lifecycles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained('assets')->onDelete('cascade');

            $table->string('previous_status')->nullable();
            $table->string('new_status');

            $table->unsignedBigInteger('previous_location_id')->nullable();
            $table->unsignedBigInteger('new_location_id')->nullable();

            $table->text('note')->nullable();
            $table->timestamp('changed_at')->nullable(); // bisa manual atau otomatis
            $table->timestamps();

            $table->foreign('previous_location_id')->references('id')->on('locations')->nullOnDelete();
            $table->foreign('new_location_id')->references('id')->on('locations')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asset_lifecycles');
    }
};
