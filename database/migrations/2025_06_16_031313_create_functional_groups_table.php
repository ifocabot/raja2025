<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('functional_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g. Computing Devices, Audio Visual
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {

    }
};
