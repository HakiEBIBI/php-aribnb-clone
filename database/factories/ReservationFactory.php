<?php

namespace Database\Factories;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'arrival_date' => fake()->date(),
            'departure_date' => fake()->date(),
            'traveler_number' => fake()->numberBetween(1, 5),
            'reservation_date' => fake()->date(),
        ];
    }
}
