<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PropertyListing;


class PropertyListingSeeder extends Seeder
{
    public function run()
    {
        PropertyListing::factory(15)->create();
    }
}
