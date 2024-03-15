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
    Schema::create('lease_infos', function (Blueprint $table) {
      $table->id();
      $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
      $table->string('lease_type');
      $table->decimal('lease_application_fee');
      $table->decimal('lease_fee');
      $table->decimal('security_deposit');
      $table->decimal('short_term_rent');
      $table->decimal('long_term_rent');
      $table->decimal('termination_amount')->default(0);
      $table->decimal('is_termination_allowed')->default(false);
      $table->decimal('is_sub_leasing_allowed')->default(false);


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
    Schema::dropIfExists('lease_infos');
  }
};
