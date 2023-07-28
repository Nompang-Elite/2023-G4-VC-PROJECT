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
            [
                "address" => "Krong Stueng Saen",
                "city" => "Kampong Thom",
                "country" => "cambodia",
                "postal_code" => "06402",
                "phone" => "069 210 000",
                "email" => "royalpalacehotels@gmail.com",
                "hotel_id" => 3,
            ],
            [
                "address" => "Cham Bok Village, Sangkat Spean Meanchey",
                "city" => "Mondulkiri",
                "country" => "cambodia",
                "postal_code" => "98745",
                "phone" => "012777101",
                "email" => "anikpalacehotel@gmail.com",
                "hotel_id" => 1,
            ],
            [
                "address" => "Sok San Road Steung Thmey Village Sangkat Svay Dangkum Siem Reap",
                "city" => "Siem Reap",
                "country" => "cambodia",
                "postal_code" => "171209",
                "phone" => "095678904",
                "email" => "saemsiemreaphotel@gmail.com",
                "hotel_id" => 2,
            ],
            [
                "address" => "Sangkat Andoung Khmer",
                "city" => "Kampot",
                "country" => "cambodia",
                "postal_code" => "070803",
                "phone" => "06098734",
                "email" => "royalcrownhotel@gmail.com",
                "hotel_id" => 4,
            ],
            [
                "address" => "Village 3,Sangkat Preah Ponlea,Krung Serey Sophorn",
                "city" => "Banteay Meanchey",
                "country" => "cambodia",
                "postal_code" => "98765",
                "phone" => "09612345",
                "email" => "asiahotel@gmail.com",
                "hotel_id" => 5,
            ],
            [
                "address" => "Sangkat Chamkar Somraong",
                "city" => "Battambang",
                "country" => "cambodia",
                "postal_code" => "021404",
                "phone" => "097876543",
                "email" => "grandelevationhotel@gmail.com",
                "hotel_id" => 6,
            ],
            [
                "address" => "Sangkat Kampong Cham, Krung Kampong Cham, Kampong Cham",
                "city" => "Kampong Cham",
                "country" => "cambodia",
                "postal_code" => "030402",
                "phone" => "01234567",
                "email" => "hmgrandcentralhotel@gmail.com",
                "hotel_id" => 7,
            ],
            [
                "address" => "7M38+4W7, AH1, Krong Kampong Chhnang",
                "city" => "Kampong Chhnang",
                "country" => "cambodia",
                "postal_code" => "040802",
                "phone" => "015678923",
                "email" => "monsoonbassachotel@gmail.com",
                "hotel_id" => 8,
            ],
            [
                "address" => "Sre Ambel, Koh Kong Province",
                "city" => "Koh Kong",
                "country" => "cambodia",
                "postal_code" => "09203",
                "phone" => "088456724",
                "email" => "duongchanhotel@gmail.com",
                "hotel_id" => 9,
            ],
            [
                "address" => "Phum Samnoeng, Sangkat Rokarthom, Krung Chbamorn",
                "city" => "Kampong Speu",
                "country" => "cambodia",
                "postal_code" => "12402 ",
                "phone" => "012345092",
                "email" => "mettavaryhotel@gmail.com",
                "hotel_id" => 10,
            ],
        ];
        foreach ($hotelInfo as $info) {
            HotelInfo::create($info);
        }
    }
}
