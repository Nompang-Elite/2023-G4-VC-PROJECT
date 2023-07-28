<?php

namespace Database\Seeders;

use App\Models\HotelImages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotelImgs = [
            [
                "hotel_id" => 1,
                "image_id" => 1
            ],
            [
                "hotel_id" => 2,
                "image_id" => 2
            ],
            [
                "hotel_id" => 3,
                "image_id" => 3
            ],
            [
                "hotel_id" => 4,
                "image_id" => 4
            ],
            [
                "hotel_id" => 5,
                "image_id" => 5
            ],
            [
                "hotel_id" => 6,
                "image_id" => 6
            ],
            [
                "hotel_id" => 7,
                "image_id" => 7
            ],
            [
                "hotel_id" => 8,
                "image_id" => 8
            ],
            [
                "hotel_id" => 9,
                "image_id" => 9
            ],
            [
                "hotel_id" => 10,
                "image_id" => 10
            ],


        ];

        foreach ($hotelImgs as $img) {
            HotelImages::create($img);
        }
    }
}
