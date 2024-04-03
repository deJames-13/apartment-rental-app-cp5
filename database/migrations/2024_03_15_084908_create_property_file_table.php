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
    Schema::create('property_file', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('property_id');
      $table->unsignedBigInteger('file_id');

      $table->foreign('property_id')->references('id')->on('property_listings')->onDelete('cascade');
      $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');

      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('property_file');
  }
};
