<?php

namespace Database\Seeders;

use App\Models\Reviews;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            // Template
            // [
            //     "user_id" => "",
            //     "hotel_id" => "",
            //     "comment" => "",
            // ],
        ];
        foreach ($reviews as $review) {
            Reviews::create($review);
        }
    }
}
