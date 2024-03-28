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
        Schema::create('maintence_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('tenant_id');

            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'in_progress', 'completed']);

            // Foreign keys
            $table->foreign('property_id')->references('id')->on('property_listings');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('tenant_id')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintence_requests');
    }
};
