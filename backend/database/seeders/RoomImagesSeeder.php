<?php

namespace Database\Seeders;

use App\Models\RoomImages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $img = [
            [
                "room_type_id" => 2,
                "image_id" => 5
            ],
            [
                "room_type_id" => 3,
                "image_id" => 5
            ],
            [
                "room_type_id" => 1,
                "image_id" => 5
            ]
        ];

        foreach ($img as $i) {
            RoomImages::create($i);
        }
    }
}
