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
                "description" => "description hotel1",
                "max_capacity" => 4,
                "bed_count" => 2,
                "price" => 3,
                "hotel_id" => 1,
            ],
            [
                "name" => "vip",
                "description" => "description hotel2",
                "max_capacity" => 4,
                "bed_count" => 2,
                "price" => 3,
                "hotel_id" => 2,
            ],
            [
                "name" => "normal_single_bed",
                "description" => "description hotel1",
                "max_capacity" => 2,
                "bed_count" => 1,
                "price" => 3,
                "hotel_id" => 1,
            ],
            [
                "name" => "normal_single_bed",
                "description" => "description hotel3",
                "max_capacity" => 2,
                "bed_count" => 1,
                "price" => 3,
                "hotel_id" => 3,
            ],
            [
                "name" => "normal_double_bed",
                "description" => "description hotel4",
                "max_capacity" => 4,
                "bed_count" => 2,
                "price" => 3,
                "hotel_id" => 4,
            ],
            [
                "name" => "famliy_small",
                "description" => "description hotel1",
                "max_capacity" => 6,
                "bed_count" => 2,
                "price" => 3,
                "hotel_id" => 1,
            ],
            [
                "name" => "famliy_big",
                "description" => "description hotel3",
                "max_capacity" => 6,
                "bed_count" => 3,
                "price" => 3,
                "hotel_id" => 3,
            ],
            [
                "name" => "famliy_big",
                "description" => "description hotel2",
                "max_capacity" => 6,
                "bed_count" => 3,
                "price" => 3,
                "hotel_id" => 2,
            ],
            [
                "name" => "famliy_big",
                "description" => "description hotel2",
                "max_capacity" => 6,
                "bed_count" => 3,
                "price" => 3,
                "hotel_id" => 2,
            ],
            [
                "name" => "vip",
                "max_capacity" => 4,
                "bed_count" => 2,
                "hotel_id" => 2,
            ],
            [
                "name" => "normal_single_bed",
                "max_capacity" => 2,
                "bed_count" => 1,
                "hotel_id" => 2,
            ],
            [
                "name" => "normal_double_bed",
                "max_capacity" => 4,
                "bed_count" => 2,
                "hotel_id" => 2,
            ],
            [
                "name" => "famliy_small",
                "max_capacity" => 6,
                "bed_count" => 2,
                "hotel_id" => 2,
            ],
            [
                "name" => "famliy_big",
                "max_capacity" => 6,
                "bed_count" => 3,
                "hotel_id" => 2,
            ],
        ];
        foreach ($roomType as $type) {
            RoomType::create($type);
        }
    }
}
