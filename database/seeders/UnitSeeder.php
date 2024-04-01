<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\PropertyListing;
use App\Models\LeaseApplication;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::factory()->count(15)->create();
    }
}
