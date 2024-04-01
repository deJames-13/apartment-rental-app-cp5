<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\PropertyListing;
use App\Models\LeaseApplication;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      $property = PropertyListing::inRandomOrder()->first();
      if (!$property) {
          $property = PropertyListing::factory()->create();
      }
      $propertyId = $property->id;
        return [
            'property_id' => $propertyId,
            'unit_code' => $this->faker->word,
            'room_number' => $this->faker->numberBetween(1, 10),
            'floor_number' => $this->faker->numberBetween(1, 20),
            'no_of_bedroom' => $this->faker->numberBetween(1, 5),
            'no_of_bathroom' => $this->faker->numberBetween(1, 3),
            'unit_thumbnail' => $this->faker->imageUrl(),
            'date_posted' => $this->faker->numberBetween(1, 30),
            'date_available_from' => $this->faker->numberBetween(31, 60),
            'description' => $this->faker->text,
            'heading' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['available', 'unavailable', 'inactive']),
        ];
    }
}
