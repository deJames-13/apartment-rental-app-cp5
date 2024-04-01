<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LeaseTransaction;
use Database\Factories\LeaseTransactionFactory;

class LeaseTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LeaseTransaction::factory()->count(15)->create();
    }
}
