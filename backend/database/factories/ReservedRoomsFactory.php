<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\Reservations;
use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReservedRooms>
 */
class ReservedRoomsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "number_of_room" => $this->faker->numberBetween(1, 4),
            "reservation_id" => $this->faker->numberBetween(1, 4),
            "room_type_id" => $this->faker->numberBetween(1, 4),
        ];
    }
}
