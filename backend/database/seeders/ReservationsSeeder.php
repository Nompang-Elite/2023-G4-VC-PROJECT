<?php

namespace Database\Seeders;

use App\Models\Reservations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservation = [
            [
                "date_in" => "2023-05-4",
                "date_out" => "2023-05-4",
                "made_by" => "unknown",
                "user_id" => 1,
                "hotel_id" => 1,
            ],
            [
                "date_in" => "2023-06-4",
                "date_out" => "2023-06-6",
                "made_by" => "unknown",
                "user_id" => 2,
                "hotel_id" => 1,
            ],
            [
                "date_in" => "2023-05-1",
                "date_out" => "2023-05-4",
                "made_by" => "unknown",
                "user_id" => 3,
                "hotel_id" => 2,
            ],
            [
                "date_in" => "2023-05-2",
                "date_out" => "2023-05-5",
                "made_by" => "unknown",
                "user_id" => 4,
                "hotel_id" => 2,
            ],
            [
                "date_in" => "2023-07-5",
                "date_out" => "2023-07-8",
                "made_by" => "unknown",
                "user_id" => 5,
                "hotel_id" => 3,
            ],
            [
                "date_in" => "2023-07-2",
                "date_out" => "2023-07-4",
                "made_by" => "unknown",
                "user_id" => 6,
                "hotel_id" => 6,
            ],
            [
                "date_in" => "2023-08-9",
                "date_out" => "2023-08-12",
                "made_by" => "unknown",
                "user_id" => 7,
                "hotel_id" => 7,
            ],
            [
                "date_in" => "2023-08-5",
                "date_out" => "2023-08-9",
                "made_by" => "unknown",
                "user_id" => 8,
                "hotel_id" => 8,
            ],
            [
                "date_in" => "2023-09-1",
                "date_out" => "2023-09-5",
                "made_by" => "unknown",
                "user_id" => 9,
                "hotel_id" => 9,
            ],
            [
                "date_in" => "2023-09-21",
                "date_out" => "2023-09-24",
                "made_by" => "unknown",
                "user_id" => 10,
                "hotel_id" => 10,
            ],
        ];
        foreach ($reservation as $reservations) {
            Reservations::create($reservations);
        }
    }
}
