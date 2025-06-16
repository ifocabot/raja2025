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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->constrained('asset_categories');
            $table->foreignId('type_id')->constrained('asset_types');
            $table->foreignId('vendor_id')->constrained('vendors');
            $table->foreignId('location_id')->constrained('locations');
            $table->foreignId('owner_id')->constrained('users');
            $table->date('purchase_date');
            $table->decimal('price', 15, 2);
            $table->string('condition');
            $table->string('status');
            $table->string('tag_number');
            $table->date('disposal_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->text('notes')->nullable();
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
