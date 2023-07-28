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
            // =======HotelId 1============ 
            [
                "name" => "Vip",
                "description" => "Made with impromptu plans in mind, crash Pintimate and comfortable spaces, ideal for shor.",
                "price" => 20,
                "max_capacity" => 4,
                "bed_count" => 2,
                "hotel_id" => 1,
            ],
            [
                "name" => "Normal Single Bed",
                "description" => "Single rooms are ideal for solo travelers who want a private and comfortable place to stay",
                "price" => 10,
                "max_capacity" => 2,
                "bed_count" => 1,
                "hotel_id" => 1,
            ],
            [
                "name" => "Normal Double Bed ",
                "description" => "A double room can be a good option for couples or solo travelers who want more space than a single room.",
                "price" => 15,
                "max_capacity" => 4,
                "bed_count" => 2,
                "hotel_id" => 1,
            ],
            [
                "name" => "Small Family ",
                "description" => "Accommodate 1-3 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 30,
                "max_capacity" => 6,
                "bed_count" => 3,
                "hotel_id" => 1,
            ],

            // =======HotelId 2============ 
            [
                "name" => "Big Family",
                "description" => "Accommodate 4- 6 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 50,
                "max_capacity" => 6,
                "bed_count" => 4,
                "hotel_id" => 2,
            ],
            [
                "name" => "Vip",
                "description" => "Made with impromptu plans in mind, crash Pintimate and comfortable spaces, ideal for shor.",
                "price" => 20,
                "max_capacity" => 4,
                "bed_count" => 2,
                "hotel_id" => 2,
            ],
            [
                "name" => "Small Family",
                "description" => "Accommodate 1-3 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 10,
                "max_capacity" => 2,
                "bed_count" => 3,
                "hotel_id" => 2,
            ],
            [
                "name" => "Normal Double Bed",
                "description" => "A double room can be a good option for couples or solo travelers who want more space than a single room.",
                "price" => 15,
                "max_capacity" => 4,
                "bed_count" => 2,
                "hotel_id" => 2,
            ],

            // =======HotelId 3============ 
            [
                "name" => "Normal Single Bed",
                "description" => "Single rooms are ideal for solo travelers who want a private and comfortable place to stay",
                "price" => 30,
                "max_capacity" => 6,
                "bed_count" => 1,
                "hotel_id" => 3,
            ],
            [
                "name" => "Big Family",
                "description" => "Accommodate 4- 6 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 50,
                "max_capacity" => 6,
                "bed_count" => 4,
                "hotel_id" => 3,
            ],
            [
                "name" => "Small Family",
                "description" => "Accommodate 1-3 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 50,
                "max_capacity" => 6,
                "bed_count" => 3,
                "hotel_id" => 3,
            ],
            [
                "name" => "VIP",
                "description" => "Made with impromptu plans in mind, crash Pintimate and comfortable spaces, ideal for shor.",
                "price" => 50,
                "max_capacity" => 6,
                "bed_count" => 3,
                "hotel_id" => 3,
            ],
            // =======HotelId 4============ 
            [
                "name" => "Big Family",
                "description" => "Accommodate 4- 6 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 100,
                "max_capacity" => 6,
                "bed_count" => 4,
                "hotel_id" => 4,
            ],
            [
                "name" => "Small Family",
                "description" => "Accommodate 1-3 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 50,
                "max_capacity" => 6,
                "bed_count" => 3,
                "hotel_id" => 4,
            ],
            [
                "name" => "VIP",
                "description" => "Made with impromptu plans in mind, crash Pintimate and comfortable spaces.",
                "price" => 70,
                "max_capacity" => 6,
                "bed_count" => 1,
                "hotel_id" => 4,
            ],
            [
                "name" => "Normal Single Bed",
                "description" => "Single rooms are ideal for solo travelers who want a private and comfortable place to stay",
                "price" => 10,
                "max_capacity" => 2,
                "bed_count" => 1,
                "hotel_id" => 4,
            ],

            // =======HotelId 5============ 
            [
                "name" => "Big Family",
                "description" => "Accommodate 4- 6 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 100,
                "max_capacity" => 6,
                "bed_count" => 4,
                "hotel_id" => 5,
            ],
            [
                "name" => "Small Family",
                "description" => "Accommodate 1-3 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 50,
                "max_capacity" => 6,
                "bed_count" => 3,
                "hotel_id" => 5,
            ],
            [
                "name" => "VIP",
                "description" => "Made with impromptu plans in mind, crash Pintimate and comfortable spaces.",
                "price" => 70,
                "max_capacity" => 6,
                "bed_count" => 1,
                "hotel_id" => 5,
            ],
            [
                "name" => "Normal Single Bed",
                "description" => "Single rooms are ideal for solo travelers who want a private and comfortable place to stay",
                "price" => 10,
                "max_capacity" => 2,
                "bed_count" => 1,
                "hotel_id" => 5,
            ],

            // =======HotelId 6============ 
            [
                "name" => "Big Family",
                "description" => "Accommodate 4- 6 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 100,
                "max_capacity" => 6,
                "bed_count" => 5,
                "hotel_id" => 6,
            ],
            [
                "name" => "Small Family",
                "description" => "Accommodate 1-3 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 50,
                "max_capacity" => 6,
                "bed_count" => 3,
                "hotel_id" => 6,
            ],
            [
                "name" => "VIP",
                "description" => "Made with impromptu plans in mind, crash Pintimate and comfortable spaces",
                "price" => 70,
                "max_capacity" => 6,
                "bed_count" => 1,
                "hotel_id" => 6,
            ],
            [
                "name" => "Normal Single Bed",
                "description" => "Single rooms are ideal for solo travelers who want a private and comfortable place to stay",
                "price" => 10,
                "max_capacity" => 2,
                "bed_count" => 1,
                "hotel_id" => 6,
            ],

            // =======HotelId 7============ 
            [
                "name" => "Big Family",
                "description" => "Accommodate 4- 6 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 100,
                "max_capacity" => 6,
                "bed_count" => 4,
                "hotel_id" => 7,
            ],
            [
                "name" => "Small Family",
                "description" => "Accommodate 1-3 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 50,
                "max_capacity" => 6,
                "bed_count" => 3,
                "hotel_id" => 7,
            ],
            [
                "name" => "VIP",
                "description" => "Made with impromptu plans in mind, crash Pintimate and comfortable spaces.",
                "price" => 70,
                "max_capacity" => 6,
                "bed_count" => 1,
                "hotel_id" => 7,
            ],
            [
                "name" => "Normal Single Bed",
                "description" => "Single rooms are ideal for solo travelers who want a private and comfortable place to stay",
                "price" => 10,
                "max_capacity" => 2,
                "bed_count" => 1,
                "hotel_id" => 7,
            ],

            // =======HotelId 8============ 
            [
                "name" => "Big Family",
                "description" => "Accommodate 4- 6 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 100,
                "max_capacity" => 6,
                "bed_count" => 4,
                "hotel_id" => 8,
            ],
            [
                "name" => "Small Family",
                "description" => "Accommodate 1-3 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 50,
                "max_capacity" => 6,
                "bed_count" => 3,
                "hotel_id" => 8,
            ],
            [
                "name" => "VIP",
                "description" => "Made with impromptu plans in mind, crash Pintimate and comfortable spaces.",
                "price" => 70,
                "max_capacity" => 6,
                "bed_count" => 1,
                "hotel_id" => 8,
            ],
            [
                "name" => "Normal Single Bed",
                "description" => "Single rooms are ideal for solo travelers who want a private and comfortable place to stay",
                "price" => 10,
                "max_capacity" => 2,
                "bed_count" => 1,
                "hotel_id" => 8,
            ],

            // =======HotelId 9============ 
            [
                "name" => "Big Family",
                "description" => "Accommodate 4- 6 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 100,
                "max_capacity" => 6,
                "bed_count" => 4,
                "hotel_id" => 9,
            ],
            [
                "name" => "Small Family",
                "description" => "Accommodate 1-3 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 50,
                "max_capacity" => 6,
                "bed_count" => 3,
                "hotel_id" => 9,
            ],
            [
                "name" => "VIP",
                "description" => "Made with impromptu plans in mind, crash Pintimate and comfortable spaces.",
                "price" => 70,
                "max_capacity" => 6,
                "bed_count" => 1,
                "hotel_id" => 9,
            ],
            [
                "name" => "Normal Single Bed",
                "description" => "Single rooms are ideal for solo travelers who want a private and comfortable place to stay",
                "price" => 10,
                "max_capacity" => 2,
                "bed_count" => 1,
                "hotel_id" => 9,
            ],

            // =======HotelId 10============ 
            [
                "name" => "Big Family",
                "description" => "Accommodate 4- 6 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 100,
                "max_capacity" => 6,
                "bed_count" => 4,
                "hotel_id" => 10,
            ],
            [
                "name" => "Small Family",
                "description" => "Accommodate 1-3 people, usually with an extra twin bed or sleeper sofa.",
                "price" => 50,
                "max_capacity" => 6,
                "bed_count" => 3,
                "hotel_id" => 10,
            ],
            [
                "name" => "VIP",
                "description" => "Made with impromptu plans in mind, crash Pintimate and comfortable spaces.",
                "price" => 70,
                "max_capacity" => 6,
                "bed_count" => 1,
                "hotel_id" => 10,
            ],
            [
                "name" => "Normal Single Bed",
                "description" => "Single rooms are ideal for solo travelers who want a private and comfortable place to stay",
                "price" => 10,
                "max_capacity" => 2,
                "bed_count" => 1,
                "hotel_id" => 10,
            ],
        ];
        foreach ($roomType as $type) {
            RoomType::create($type);
        }
    }
}
