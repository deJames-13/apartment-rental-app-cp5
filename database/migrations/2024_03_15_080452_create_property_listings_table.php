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

      $table->unsignedBigInteger('ptype_id')->nullable();
      $table->foreign('ptype_id')->references('id')->on('property_types')->onDelete('cascade');


      $table->unsignedBigInteger('landlord_id');
      $table->foreign('landlord_id')->references('id')->on('users')->onDelete('cascade');


      $table->string('property_name');
      $table->string('property_status');
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
      $table->string('description')->nullable();
      $table->decimal('lowest_price')->nullable();
      $table->decimal('max_price')->nullable();

      $table->enum('status', ['active', 'inactive'])->default('active');
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
