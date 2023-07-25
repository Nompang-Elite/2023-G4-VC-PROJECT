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
                "hotel_id" => 1,
                "image_id" => 2
            ],
            [
                "hotel_id" => 2,
                "image_id" => 3
            ],
            [
                "hotel_id" => 2,
                "image_id" => 4
            ],

        ];

        foreach ($hotelImgs as $img) {
            HotelImages::create($img);
        }
    }
}
