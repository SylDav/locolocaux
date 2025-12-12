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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agency_id')->constrained()->onDelete('cascade');
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('address_id')->nullable()->constrained('addresses')->onDelete('set null');
            $table->string('title');
            $table->enum('type', ['house', 'apartment', 'studio', 'office', 'local', 'other']);
            $table->float('surface_area');
            $table->float('land')->nullable();
            $table->integer('rooms');
            $table->decimal('rent_amount', 10, 2);
            $table->enum('status', ['available', 'rented', 'sold', 'under_contract', 'draft', 'maintenance'])->default('available');
            $table->text('description')->nullable();
            $table->string('reference')->unique();
            $table->string('property_type');
            $table->integer('bedrooms');
            $table->integer('floor')->nullable();
            $table->integer('floor_count')->nullable();
            $table->year('construction_year')->nullable();
            $table->string('heating_type')->nullable();
            $table->string('energy_class', 1)->nullable();
            $table->string('ges', 1)->nullable();
            $table->boolean('furnished')->default(false);
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('charges', 10, 2)->default(0);
            $table->decimal('property_tax', 10, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
