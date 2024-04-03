<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\PropertyListing;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyListingFactory extends Factory
{
  protected $model = PropertyListing::class;

  public function definition()
  {
    $landlord = User::where('role', 'landlord')->inRandomOrder()->first();

    if (!$landlord) {
      $landlord = User::factory()->create(['role' => 'landlord']);
    }

    return [
      'landlord_id' => $landlord->id,
      'type' => $this->faker->randomElement(['Apartment', 'Condominium', 'House', 'Townhouse', 'Commercial', 'Industrial']),
      'status' => 'available',
      'property_name' => $this->faker->company,
      'no_of_floors' => $this->faker->numberBetween(1, 10),
      'no_of_units' => $this->faker->numberBetween(1, 100),
      'address' => $this->faker->address,
      'city' => $this->faker->city,
      'region' => $this->faker->state,
      'country' => $this->faker->country,
      'postal_code' => $this->faker->postcode,
      'default_price' => $this->faker->randomFloat(2, 1000, 10000),
      'property_thumbnail' => null,
      'heading' => $this->faker->sentence,
      'description' => $this->faker->paragraph,
      'lowest_price' => $this->faker->randomFloat(2, 500, 5000),
      'max_price' => $this->faker->randomFloat(2, 5000, 20000),
    ];
  }
}
