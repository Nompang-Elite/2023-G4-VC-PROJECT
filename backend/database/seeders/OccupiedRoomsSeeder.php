<?php

namespace Database\Seeders;

use App\Models\OccupiedRooms;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OccupiedRoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $occupieds = [
            [
                "room_id" => 1,
                "check_in" => "2023-08-1",
                "check_out" => "2023-08-5",
            ],
            [
                "room_id" => 2,
                "check_in" => "2023-08-2",
                "check_out" => "2023-08-5",
            ],
            [
                "room_id" => 3,
                "check_in" => "2023-08-1",
                "check_out" => "2023-08-4",
            ],
            [
                "room_id" => 4,
                "check_in" => "2023-08-5",
                "check_out" => "2023-08-7",
            ],
            [
                "room_id" => 5,
                "check_in" => "2023-08-4",
                "check_out" => "2023-08-9",
            ],
            [
                "room_id" => 6,
                "check_in" => "2023-06-2",
                "check_out" => "2023-06-4",
            ],
            [
                "room_id" => 7,
                "check_in" => "2023-07-4",
                "check_out" => "2023-07-9",
            ],
            [
                "room_id" => 8,
                "check_in" => "2023-07-3",
                "check_out" => "2023-07-6",
            ],
            [
                "room_id" => 9,
                "check_in" => "2023-05-4",
                "check_out" => "2023-05-9",
            ],
            [
                "room_id" => 10,
                "check_in" => "2023-09-1",
                "check_out" => "2023-09-4",
            ]
        ];
        foreach ($occupieds  as $occupied ) {
            OccupiedRooms::create($occupied);
        }
    }
}
