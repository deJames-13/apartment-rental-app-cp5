<?php

namespace Database\Seeders;

use App\Models\Unit;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\LeaseInfo;
use App\Models\PropertyListing;
use Illuminate\Database\Seeder;
use App\Models\LeaseApplication;
use App\Models\LeaseTransaction;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(100)->create();

    // User::factory()->create([
    //     'username' => 'test',
    //     'email' => 'test@example.com',
    // ]);

    User::factory(100)->create();
    PropertyListing::factory(100)->create();
    Unit::factory(100)->create();
    LeaseInfo::factory(100)->create();
    LeaseApplication::factory(100)->create();
    LeaseTransaction::factory(100)->create();
  }
}
