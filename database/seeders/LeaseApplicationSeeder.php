<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LeaseApplication;
use Database\Factories\LeaseApplicationFactory;

class LeaseApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      LeaseApplication::factory()->count(15)->create();
    }
}
