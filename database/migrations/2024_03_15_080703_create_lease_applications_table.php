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
        Schema::create('lease_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id');
            $table->unsignedBigInteger('landlord_id');
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('unit_id');
            $table->string('title')->nullable();


            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('rent_amount', 10, 2);
            $table->enum('status', ['active', 'inactive']);
            $table->text('notes')->nullable();

            // Foreign keys
            $table->foreign('tenant_id')->references('id')->on('users');
            $table->foreign('landlord_id')->references('id')->on('users');
            $table->foreign('property_id')->references('id')->on('property_listings');
            $table->foreign('unit_id')->references('id')->on('units');

            // images/file documentation for application

            $table->string('tenant_id_card')->nullable();
            $table->string('signature')->nullable();



            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lease_applications');
    }
};
