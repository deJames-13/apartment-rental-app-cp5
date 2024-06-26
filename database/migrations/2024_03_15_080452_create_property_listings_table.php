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
    Schema::create('property_listings', function (Blueprint $table) {
      $table->id();



      $table->unsignedBigInteger('landlord_id');
      $table->foreign('landlord_id')->references('id')->on('users')->onDelete('cascade');


      $table->enum('type', ['Apartment', 'Condominium', 'House', 'Townhouse', 'Commercial', 'Industrial'])->default('Apartment');
      $table->enum('status', ['active', 'inactive', 'available', 'unavailable', 'sold', 'renovating'])->default('active');
      $table->string('property_name');
      $table->integer('no_of_floors');
      $table->integer('no_of_units');
      $table->string('address');
      $table->string('city');
      $table->string('region');
      $table->string('country');
      $table->string('postal_code');
      $table->decimal('default_price');
      $table->string('property_thumbnail')->nullable();
      $table->string('heading')->nullable();
      $table->longText('description')->nullable();
      $table->decimal('lowest_price');
      $table->decimal('max_price');
      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('property_listings');
  }
};
