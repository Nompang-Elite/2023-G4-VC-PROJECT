<?php

namespace Database\Seeders;

use App\Models\Rooms;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            [
                "number" => "AKR-01",
                "room_type_id" => 2,
                "hotel_id" => 1,
            ],
            [
                "number" => "AKR-02",
                "room_type_id" => 2,
                "hotel_id" => 1,
            ],
            [
                "number" => "AK-01",
                "room_type_id" => 3,
                "hotel_id" => 1,
            ],
            [
                "number" => "AK1-02",
                "room_type_id" => 3,
                "hotel_id" => 2,
            ],
            [
                "number" => "AKR-05",
                "room_type_id" => 3,
                "hotel_id" => 2,
            ],
            [
                "number" => "AKP-06",
                "room_type_id" => 1,
                "hotel_id" => 2,
            ],
            [
                "number" => "KP-01",
                "room_type_id" => 2,
                "hotel_id" => 3,
            ],
            [
                "number" => "KP-02",
                "room_type_id" => 2,
                "hotel_id" => 3,
            ],
            [
                "number" => "AKP-06",
                "room_type_id" => 3,
                "hotel_id" => 4,
            ],
            [
                "number" => "AKP-07",
                "room_type_id" => 3,
                "hotel_id" => 4,
            ],
            [
                "number" => "KP-03",
                "room_type_id" => 3,
                "hotel_id" => 6,
            ],
            [
                "number" => "KP-04",
                "room_type_id" => 3,
                "hotel_id" => 5,
            ],
            [
                "number" => "AKP-05",
                "room_type_id" => 3,
                "hotel_id" => 6,
            ],
            [
                "number" => "AK-04",
                "room_type_id" => 3,
                "hotel_id" => 7,
            ],
            [
                "number" => "AK-05",
                "room_type_id" => 3,
                "hotel_id" => 8,
            ],
            [
                "number" => "BKP-01",
                "room_type_id" => 3,
                "hotel_id" => 8,
            ],
            [
                "number" => "BKP-02",
                "room_type_id" => 3,
                "hotel_id" => 9,
            ],
            [
                "number" => "BKP-03",
                "room_type_id" => 3,
                "hotel_id" => 9,
            ],
            [
                "number" => "BK-01",
                "room_type_id" => 3,
                "hotel_id" => 10,
            ],
            [
                "number" => "BK-02",
                "room_type_id" => 3,
                "hotel_id" => 10,
            ]

        ];
        foreach ($rooms as $room) {
            Rooms::create($room);
        }
    }
}
