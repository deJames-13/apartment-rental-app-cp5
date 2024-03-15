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
    Schema::create('units', function (Blueprint $table) {
      $table->id();

      $table->unsignedBigInteger('property_id');
      $table->foreign('property_id')->references('id')->on('property_listings')->onDelete('cascade');

      $table->string('unit_code');
      $table->tinyInteger('floor_number');
      $table->tinyInteger('no_of_bedroom')->default(0);
      $table->tinyInteger('no_of_bathroom')->default(0);
      $table->string('unit_thambnail')->nullable();
      $table->tinyInteger('date_posted')->nullable();
      $table->tinyInteger('date_available_from')->nullable();
      $table->string('description')->nullable();
      $table->string('heading')->nullable();


      $table->enum('status', ['available', 'occupied', 'inactive'])->default('inactive');
      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('units');
  }
};
