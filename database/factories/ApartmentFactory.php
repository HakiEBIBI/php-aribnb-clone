<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // get user

        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(3),
            'address' => fake()->address(),
            'city' => fake()->city(),
            'postal_code' => fake()->postcode(),
            'max_number_of_people' => fake()->numberBetween(1, 10),
            'price_per_night' => fake()->randomFloat(2, 50, 500),
        ];
    }
}
