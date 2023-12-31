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
            // Hotel 1
            [
                "number" => "ACH-1",
                "room_type_id" => 1,
                "hotel_id" => 1,
            ],
            [
                "number" => "ACH-2",
                "room_type_id" => 1,
                "hotel_id" => 1,
            ],
            [
                "number" => "ACH-3",
                "room_type_id" => 2,
                "hotel_id" => 1,
            ],
            [
                "number" => "ACH-4",
                "room_type_id" => 2,
                "hotel_id" => 1,
            ],
            [
                "number" => "ACH-5",
                "room_type_id" => 3,
                "hotel_id" => 1,
            ],
            [
                "number" => "ACH-6",
                "room_type_id" => 3,
                "hotel_id" => 1,
            ],
            // Hotel 2
            [
                "number" => "TPPP-1",
                "room_type_id" => 5,
                "hotel_id" => 2,
            ],
            [
                "number" => "TPPP-2",
                "room_type_id" => 5,
                "hotel_id" => 2,
            ],
            [
                "number" => "TPPP-3",
                "room_type_id" => 6,
                "hotel_id" => 2,
            ],
            [
                "number" => "TPPP-4",
                "room_type_id" => 6,
                "hotel_id" => 2,
            ],
            [
                "number" => "TPPP-5",
                "room_type_id" => 7,
                "hotel_id" => 2,
            ],
            [
                "number" => "TPPP-6",
                "room_type_id" => 7,
                "hotel_id" => 2,
            ],
            // Hotel 3
            [
                "number" => "RPH-1",
                "room_type_id" => 9,
                "hotel_id" => 3,
            ],
            [
                "number" => "RPH-2",
                "room_type_id" => 9,
                "hotel_id" => 3,
            ],
            [
                "number" => "RPH-3",
                "room_type_id" => 10,
                "hotel_id" => 3,
            ],
            [
                "number" => "RPH-4",
                "room_type_id" => 10,
                "hotel_id" => 3,
            ],
            [
                "number" => "RPH-5",
                "room_type_id" => 11,
                "hotel_id" => 3,
            ],
            [
                "number" => "RPH-6",
                "room_type_id" => 11,
                "hotel_id" => 3,
            ],
            // Hotel 4
            [
                "number" => "RCH-1",
                "room_type_id" => 13,
                "hotel_id" => 4,
            ],
            [
                "number" => "RCH-2",
                "room_type_id" => 13,
                "hotel_id" => 4,
            ],
            [
                "number" => "RCH-3",
                "room_type_id" => 14,
                "hotel_id" => 4,
            ],
            [
                "number" => "RCH-4",
                "room_type_id" => 14,
                "hotel_id" => 4,
            ],
            [
                "number" => "RCH-5",
                "room_type_id" => 15,
                "hotel_id" => 4,
            ],
            [
                "number" => "RCH-6",
                "room_type_id" => 15,
                "hotel_id" => 4,
            ],
            // Hotel 5
            [
                "number" => "AH-1",
                "room_type_id" => 17,
                "hotel_id" => 5,
            ],
            [
                "number" => "AH-2",
                "room_type_id" => 17,
                "hotel_id" => 5,
            ],
            [
                "number" => "AH-3",
                "room_type_id" => 18,
                "hotel_id" => 5,
            ],
            [
                "number" => "AH-4",
                "room_type_id" => 18,
                "hotel_id" => 5,
            ],
            [
                "number" => "AH-5",
                "room_type_id" => 19,
                "hotel_id" => 5,
            ],
            [
                "number" => "AH-6",
                "room_type_id" => 19,
                "hotel_id" => 5,
            ],
            // Hotel 6
            [
                "number" => "GEH-1",
                "room_type_id" => 21,
                "hotel_id" => 6,
            ],
            [
                "number" => "GEH-2",
                "room_type_id" => 21,
                "hotel_id" => 6,
            ],
            [
                "number" => "GEH-3",
                "room_type_id" => 22,
                "hotel_id" => 6,
            ],
            [
                "number" => "GEH-4",
                "room_type_id" => 22,
                "hotel_id" => 6,
            ],
            [
                "number" => "GEH-5",
                "room_type_id" => 23,
                "hotel_id" => 6,
            ],
            [
                "number" => "GEH-6",
                "room_type_id" => 23,
                "hotel_id" => 6,
            ],
            // Hotel 7
            [
                "number" => "HGCM-1",
                "room_type_id" => 25,
                "hotel_id" => 7,
            ],
            [
                "number" => "HGCM-2",
                "room_type_id" => 25,
                "hotel_id" => 7,
            ],
            [
                "number" => "HGCM-3",
                "room_type_id" => 26,
                "hotel_id" => 7,
            ],
            [
                "number" => "HGCM-4",
                "room_type_id" => 26,
                "hotel_id" => 7,
            ],
            [
                "number" => "HGCM-5",
                "room_type_id" => 27,
                "hotel_id" => 7,
            ],
            [
                "number" => "HGCM-6",
                "room_type_id" => 27,
                "hotel_id" => 7,
            ],
            // Hotel 8
            [
                "number" => "MBH-1",
                "room_type_id" => 29,
                "hotel_id" => 8,
            ],
            [
                "number" => "MBH-2",
                "room_type_id" => 29,
                "hotel_id" => 8,
            ],
            [
                "number" => "MBH-3",
                "room_type_id" => 30,
                "hotel_id" => 8,
            ],
            [
                "number" => "MBH-4",
                "room_type_id" => 30,
                "hotel_id" => 8,
            ],
            [
                "number" => "MBH-5",
                "room_type_id" => 31,
                "hotel_id" => 8,
            ],
            [
                "number" => "MBH-6",
                "room_type_id" => 31,
                "hotel_id" => 8,
            ],
            // Hotel 9
            [
                "number" => "SSH-1",
                "room_type_id" => 33,
                "hotel_id" => 9,
            ],
            [
                "number" => "SSH-2",
                "room_type_id" => 33,
                "hotel_id" => 9,
            ],
            [
                "number" => "SSH-3",
                "room_type_id" => 34,
                "hotel_id" => 9,
            ],
            [
                "number" => "SSH-4",
                "room_type_id" => 34,
                "hotel_id" => 9,
            ],
            [
                "number" => "SSH-5",
                "room_type_id" => 35,
                "hotel_id" => 9,
            ],
            [
                "number" => "SSH-6",
                "room_type_id" => 35,
                "hotel_id" => 9,
            ],
            // Hotel 10
            [
                "number" => "MH-1",
                "room_type_id" => 37,
                "hotel_id" => 10,
            ],
            [
                "number" => "MH-2",
                "room_type_id" => 37,
                "hotel_id" => 10,
            ],
            [
                "number" => "MH-3",
                "room_type_id" => 38,
                "hotel_id" => 10,
            ],
            [
                "number" => "MH-4",
                "room_type_id" => 38,
                "hotel_id" => 10,
            ],
            [
                "number" => "MH-5",
                "room_type_id" => 39,
                "hotel_id" => 10,
            ],
            [
                "number" => "MH-6",
                "room_type_id" => 39,
                "hotel_id" => 10,
            ]
        ];
        foreach ($rooms as $room) {
            Rooms::create($room);
        }
    }
}
