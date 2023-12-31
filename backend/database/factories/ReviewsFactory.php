<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reviews>
 */
class ReviewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => $this->faker->numberBetween(1, count(User::where("user_type", 3)->get())),
            "hotel_id" => $this->faker->numberBetween(1, count(Hotel::all())),
            "rate" => $this->faker->numberBetween(1, 5),
            "comment" => $this->faker->text(100),
        ];
    }
}
