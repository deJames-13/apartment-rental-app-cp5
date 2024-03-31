<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('first_name');
      $table->string('last_name');
      $table->string('username')->unique();
      $table->string('email')->unique();
      $table->string('password');
      $table->string('phone')->nullable();
      $table->string('address')->nullable();
      $table->string('city')->nullable();
      $table->string('region')->nullable();
      $table->string('country')->nullable();
      $table->string('postal_code')->nullable();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('image_path')->nullable();
      $table->enum('role', ['admin', 'agent', 'landlord', 'tenant', 'user'])->default('user');
      $table->enum('status', ['active', 'inactive'])->default('active');
      $table->date('birthdate')->nullable();
      $table->integer('age')->nullable();
      $table->string('occupation')->nullable();
      $table->rememberToken();
      $table->timestamps();
      $table->softDeletes();
    });

    Schema::create('password_reset_tokens', function (Blueprint $table) {
      $table->string('email')->primary();
      $table->string('token');
      $table->timestamp('created_at')->nullable();
    });

    Schema::create('sessions', function (Blueprint $table) {
      $table->string('id')->primary();
      $table->foreignId('user_id')->nullable()->index();
      $table->string('ip_address', 45)->nullable();
      $table->text('user_agent')->nullable();
      $table->longText('payload');
      $table->integer('last_activity')->index();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
    Schema::dropIfExists('password_reset_tokens');
    Schema::dropIfExists('sessions');
  }
};
