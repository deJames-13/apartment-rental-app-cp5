<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\PropertyListing;
use App\Models\LeaseApplication;
use App\Models\LeaseInfo;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeaseInfo>
 */
class LeaseInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

      $unit = Unit::inRandomOrder()->first();
          if (!$unit) {
            $unit = Unit::factory()->create();
          }
          $unitId = $unit->id;
        return [
        'unit_id' => $unitId,
        'lease_type' => $this->faker->randomElement(['short_term', 'long_term']),
        'lease_application_fee' => $this->faker->randomFloat(2, 10, 100),
        'lease_fee' => $this->faker->randomFloat(2, 50, 500),
        'security_deposit' => $this->faker->randomFloat(2, 100, 1000),
        'short_term_rent' => $this->faker->randomFloat(2, 500, 2000),
        'long_term_rent' => $this->faker->randomFloat(2, 1000, 5000),
        'termination_amount' => $this->faker->randomFloat(2, 100, 1000),
        'is_termination_allowed' => $this->faker->boolean(),
        'is_sub_leasing_allowed' => $this->faker->boolean(),
        'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
