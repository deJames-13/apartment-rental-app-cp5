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
    Schema::create('unit_features', function (Blueprint $table) {
      $table->unsignedBigInteger('id');
      $table->foreign('id')->primary()->references('id')->on('units')->onDelete('cascade');

      $table->boolean('is_air_conditioned');
      $table->boolean('is_pets_allowed');
      $table->boolean('has_balcony');
      $table->boolean('has_security');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('unit_features');
  }
};
