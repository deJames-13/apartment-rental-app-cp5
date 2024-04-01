<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\PropertyListing;
use App\Models\LeaseApplication;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class LeaseApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LeaseApplication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

      $faker = $this->faker;

      $tenant = User::where('role', 'tenant')->inRandomOrder()->first();
    if (!$tenant) {
        $tenant = User::factory()->create(['role' => 'tenant']);
    }
    $tenantId = $tenant->id;

    $landlord = User::where('role', 'landlord')->inRandomOrder()->first();
    if (!$landlord) {
        $landlord = User::factory()->create(['role' => 'landlord']);
    }
    $landlordId = $landlord->id;

    $property = PropertyListing::inRandomOrder()->first();
    if (!$property) {
        $property = PropertyListing::factory()->create();
    }
    $propertyId = $property->id;

    $unit = Unit::inRandomOrder()->first();
    if (!$unit) {
        $unit = Unit::factory()->create();
    }
    $unitId = $unit->id;

        return [
        'tenant_id' => $tenantId,
        'landlord_id' => $landlordId,
        'property_id' => $propertyId,
        'unit_id' => $unitId,
        'title' => $faker->sentence(),
        'start_date' => $faker->date(),
        'end_date' => $faker->date(),
        'rent_amount' => $faker->randomFloat(2, 500, 5000),
        'status' => $faker->randomElement(['active', 'inactive']),
        'notes' => $faker->text(),
        'tenant_id_card' => $faker->imageUrl(),
        'signature' => $faker->imageUrl(),
        ];
    }
}
