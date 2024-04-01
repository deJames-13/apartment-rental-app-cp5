<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\PropertyListing;
use App\Models\LeaseApplication;
use App\Models\LeaseInfo;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaseInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      LeaseInfo::factory()->count(15)->create();
    }
}
