<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomType = [
            [
                "name" => "vip",
                "max_capacity" => 4,
                "bed_count" => 2,
                "price" =>20,
                "hotel_id" => 1,
            ],
            [
                "name" => "normal_single_bed",
                "max_capacity" => 2,
                "bed_count" => 1,
                "price" =>90,
                "hotel_id" => 1,
            ],
            [
                "name" => "normal_double_bed",
                "max_capacity" => 4,
                "bed_count" => 2,
                "price" =>30,
                "hotel_id" => 1,
            ],
            [
                "name" => "famliy_small",
                "max_capacity" => 6,
                "bed_count" => 2,
                "price" =>60,
                "hotel_id" => 1,
            ],
            [
                "name" => "famliy_big",
                "max_capacity" => 6,
                "bed_count" => 3,
                "price" =>20,
                "hotel_id" => 1,
            ],
            [
                "name" => "vip",
                "max_capacity" => 4,
                "bed_count" => 2,
                "price" =>80,
                "hotel_id" => 2,
            ],
            [
                "name" => "normal_single_bed",
                "max_capacity" => 2,
                "bed_count" => 1,
                "price" =>20,
                "hotel_id" => 2,
            ],
            [
                "name" => "normal_double_bed",
                "max_capacity" => 4,
                "bed_count" => 2,
                "price" =>60,
                "hotel_id" => 2,
            ],
            [
                "name" => "famliy_small",
                "max_capacity" => 6,
                "bed_count" => 2,
                "price" =>40,
                "hotel_id" => 2,
            ],
            [
                "name" => "famliy_big",
                "max_capacity" => 6,
                "bed_count" => 3,
                "price" =>120,
                "hotel_id" => 2,
            ],
        ];
        foreach ($roomType as $type) {
            RoomType::create($type);
        }
    }
}
