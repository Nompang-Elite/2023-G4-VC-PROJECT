<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservations>
 */
class ReservationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "date_in" => $this->faker->date(),
            "date_out" => $this->faker->date(),
            "user_id" => $this->faker->numberBetween(1, 4),
        ];
    }
}
