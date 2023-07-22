<?php

namespace Database\Factories;

use App\Models\Rooms;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OccupiedRooms>
 */
class OccupiedRoomsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "check_in" => $this->faker->dateTime(),
            "check_out" => $this->faker->dateTime(),
            "room_id" => $this->faker->numberBetween(1, count(Rooms::all())),
        ];
    }
}
