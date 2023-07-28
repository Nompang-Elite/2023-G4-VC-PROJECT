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
                "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                "price" => 20,
                "max_capacity" => 4,
                "bed_count" => 2,
                "hotel_id" => 1,
            ],
            [
                "name" => "normal_single_bed",
                "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                "price" => 10,
                "max_capacity" => 2,
                "bed_count" => 1,
                "hotel_id" => 1,
            ],
            [
                "name" => "normal_double_bed",
                "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                "price" => 15,
                "max_capacity" => 4,
                "bed_count" => 2,
                "hotel_id" => 1,
            ],
            [
                "name" => "famliy_small",
                "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                "price" => 30,
                "max_capacity" => 6,
                "bed_count" => 2,
                "hotel_id" => 1,
            ],
            [
                "name" => "famliy_big",
                "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                "price" => 50,
                "max_capacity" => 6,
                "bed_count" => 3,
                "hotel_id" => 1,
            ],
            [
                "name" => "vip",
                "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                "price" => 20,
                "max_capacity" => 4,
                "bed_count" => 2,
                "hotel_id" => 2,
            ],
            [
                "name" => "normal_single_bed",
                "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                "price" => 10,
                "max_capacity" => 2,
                "bed_count" => 1,
                "hotel_id" => 2,
            ],
            [
                "name" => "normal_double_bed",
                "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                "price" => 15,
                "max_capacity" => 4,
                "bed_count" => 2,
                "hotel_id" => 2,
            ],
            [
                "name" => "famliy_small",
                "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                "price" => 30,
                "max_capacity" => 6,
                "bed_count" => 2,
                "hotel_id" => 2,
            ],
            [
                "name" => "famliy_big",
                "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                "price" => 50,
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
