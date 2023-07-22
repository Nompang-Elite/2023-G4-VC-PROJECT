<?php

namespace Database\Seeders;

use App\Models\HotelInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelsInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotelInfo = [
            // Template
            // [
            //     "address" => "",
            //     "city" => "",
            //     "country" => "",
            //     "postal_code" => "",
            //     "phone" => "",
            //     "email" => "",
            //     "hotel_id" => "",
            // ],
            [
                "address" => "svay dangkom",
                "city" => "siem reap",
                "country" => "cambodia",
                "postal_code" => "000000",
                "phone" => "0123456789",
                "email" => "angkorroyalhotels@gmail.com",
                "hotel_id" => 1,
            ],
            [
                "address" => "svay dangkom",
                "city" => "siem reap",
                "country" => "cambodia",
                "postal_code" => "000000",
                "phone" => "0123456789",
                "email" => "angkorpalacehotels@gmail.com",
                "hotel_id" => 2,
            ]
        ];
        foreach ($hotelInfo as $info) {
            HotelInfo::create($info);
        }
    }
}
