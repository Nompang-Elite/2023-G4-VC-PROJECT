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
            ],
            [
                "name" => "normal_single_bed",
                "max_capacity" => 2,
                "bed_count" => 1,
            ],
            [
                "name" => "normal_double_bed",
                "max_capacity" => 4,
                "bed_count" => 2,
            ],
            [
                "name" => "famliy_small",
                "max_capacity" => 6,
                "bed_count" => 2,
            ],
            [
                "name" => "famliy_big",
                "max_capacity" => 6,
                "bed_count" => 3,
            ],
        ];
        foreach ($roomType as $type) {
            RoomType::create($type);
        }
    }
}
