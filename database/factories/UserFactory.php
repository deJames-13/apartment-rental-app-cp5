<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      $faker = $this->faker;
        return [
          'first_name' => $faker->firstName,
          'last_name' => $faker->lastName,
          'username' => $faker->unique()->userName,
          'email' => $faker->unique()->safeEmail,
          'password' => Hash::make('password'),
          'phone' => $faker->phoneNumber,
          'address' => $faker->streetAddress,
          'city' => $faker->city,
          'region' => $faker->state,
          'country' => $faker->country,
          'postal_code' => $faker->postcode,
          'email_verified_at' => now(),
          'image_path' => null,
          'role' => $faker->randomElement(['admin', 'agent', 'landlord', 'tenant', 'user']),
          'status' => 'active',
          'birthdate' => $faker->date,
          'age' => $faker->numberBetween(18, 80),
          'occupation' => $faker->jobTitle,
          'remember_token' => null,
          'created_at' => now(),
          'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
