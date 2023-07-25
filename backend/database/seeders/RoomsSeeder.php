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
            // Template
            // [
            //     "name" => "",
            //     "number" => "",
            //     "status" => "",
            //     "room_type_id" => "",
            //     "hotel_id" => "",
            // ],
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
                "number" => "AKR-03",
                "room_type_id" => 3,
                "hotel_id" => 1,
            ],
            [
                "number" => "AKR-04",
                "room_type_id" => 3,
                "hotel_id" => 1,
            ],
            [
                "number" => "AKR-05",
                "room_type_id" => 3,
                "hotel_id" => 1,
            ],
            [
                "number" => "AKP-01",
                "room_type_id" => 1,
                "hotel_id" => 2,
            ],
            [
                "number" => "AKP-02",
                "room_type_id" => 2,
                "hotel_id" => 2,
            ],
            [
                "number" => "AKP-03",
                "room_type_id" => 2,
                "hotel_id" => 2,
            ],
            [
                "number" => "AKP-04",
                "room_type_id" => 3,
                "hotel_id" => 2,
            ],
            [
                "number" => "AKP-05",
                "room_type_id" => 3,
                "hotel_id" => 2,
            ]

        ];
        foreach ($rooms as $room) {
            Rooms::create($room);
        }
    }
}
