<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $hotels = [
            [
                "name" => "Anik Palace Hotel",
                "description" => "Hotel features accommodation with an outdoor swimming pool, free private parking, a fitness centre and a shared lounge.",
                "user_id" => 1
            ],
            [
                "name" => "The Peninsula Phnom Penh",
                "description" => "features accommodation with an outdoor swimming pool, free private parking, a fitness centre and a garden.",
                "user_id" => 2

            ],
            [
                "name" => "Royal Palace Hotels",
                "description" => "Get your trip off to a great start with a stay at this property, which offers free Wi-Fi in all rooms. Conveniently situated in the Khan Tuol Kouk part of Phnom Penh, this property puts you close to attractions and interesting dining options. ",
                "user_id" => 3

            ],
            [
                "name" => "Royal Crown Hotel",
                "description" => "Our spacious and elegant hotel, Royal Crown Hotel is conveniently situated just across the Siem Reap river from the bustling French quarter and the Old Market. The building has retained the true colonial French characteristics.",
                "user_id" => 4

            ],
            [
                "name" => "Asia Hotel",
                "description" => "Located near a train station, Asia Hotel is a great choice for a stay in Phnom Penh. You'll have free perks like WiFi and self parking. Fellow travelers say good things about the helpful staff and spacious guestrooms.",
                "user_id" => 5


            ],
            [
                "name" => "Grand Elevation Hotel",
                "description" => "Grand Elevation Hotel is situated in Phnom Penh and features a shared lounge. Popular points of interest nearby include Aeon Mall and Diamond Island Convention and Exhibition Center.",
                "user_id" => 6

            ],
            [
                "name" => "HM Grand Central Hotel",
                "description" => "Attractively situated in the centre of Phnom Penh, HM Grand Central Hotel features air-conditioned rooms with free WiFi, free private parking and room service.",
                "user_id" => 7

            ],
            [
                "name" => "Monsoon Bassac Hotel",
                "description" => "Guests can approach the 24-hour front desk for luggage storage, laundry and ticketing services. Meeting facilities and banquet services can also be arranged.Couples particularly like the location — they rated it 8.9 for a two-person trip.",
                "user_id" => 8

            ],
            [
                "name" => "Saem Siemreap Hotel",
                "description" => "Guests can rent a bicycle to explore the town, or arrange a day trip at the tour desk. The hotel also provides a business centre, souvenir shop and a 24-hour front desk.",
                "user_id" => 9

            ],
            [
                "name" => "Mettavary Hotel",
                "description" => "Located in Phnom Penh, less than 1 km from Aeon Mall Phnom Penh, Mettavary Hotel provides accommodation with an outdoor swimming pool, free private parking, a fitness centre and a garden.",
                "user_id" => 10

            ]
           
        ];
        foreach ($hotels as $hotel) {
            Hotel::create($hotel);
        }
    }
}
