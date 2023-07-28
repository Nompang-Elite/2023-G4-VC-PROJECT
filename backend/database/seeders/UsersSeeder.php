<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            // Users//
            [
                "firstname" => "Elena",
                "lastname" => "Soe",
                "gender" => "M",
                "phone" => "0987654321",
                "user_type" => 3,
                "email" => "elenasoe@gmail.com",
                "password" => "!@#123Abc",
            ],
            [
                "firstname" => "Jame",
                "lastname" => "Smith",
                "gender" => "M",
                "phone" => "0876543219",
                "user_type" => 3,
                "email" => "jamesmith@gmail.com",
                "password" => "!@#123Abc",
            ],
            [
                "firstname" => "Marcel",
                "lastname" => "Atino",
                "gender" => "M",
                "phone" => "0876543219",
                "user_type" => 3,
                "email" => "marcelatino@gmail.com",
                "password" => "!@#123Abc",
            ],
            [
                "firstname" => "Sumatra",
                "lastname" => "Jen",
                "gender" => "M",
                "phone" => "081234567",
                "user_type" => 3,
                "email" => "sumatrajen@gmail.com",
                "password" => "!@#123Abc",
            ],

            // Hotel owner//
            [
                "firstname" => "Matin",
                "lastname" => "Thi",
                "gender" => "M",
                "phone" => "097234567",
                "user_type" => 2,
                "email" => "matinthi@gmail.com",
                "password" => "!@#123Abc",
            ],
            [
                "firstname" => "Kimbery",
                "lastname" => "Mak",
                "gender" => "M",
                "phone" => "012876534",
                "user_type" => 2,
                "email" => "kimberymak@gmail.com",
                "password" => "!@#123Abc",
            ],
            [
                "firstname" => "Misuma",
                "lastname" => "June",
                "gender" => "F",
                "phone" => "09854325",
                "user_type" => 2,
                "email" => "misumajune@gmail.com",
                "password" => "!@#123Abc",
            ],
            [
                "firstname" => "Jasmen",
                "lastname" => "Tom",
                "gender" => "M",
                "phone" => "024587589",
                "user_type" => 2,
                "email" => "jasmentom@gmail.com",
                "password" => "!@#123Abc",
            ],
            [
                "firstname" => "Sovan",
                "lastname" => "Sok",
                "gender" => "F",
                "phone" => "097234567",
                "user_type" => 2,
                "email" => "sovansok@gmail.com",
                "password" => "!@#123Abc",
            ],
            [
                "firstname" => "Makara",
                "lastname" => "Leak",
                "gender" => "F",
                "phone" => "088765432",
                "user_type" => 2,
                "email" => "makaraleak@gmail.com",
                "password" => "!@#123Abc",
            ],
            [
                "firstname" => "Sujenna",
                "lastname" => "Kin",
                "gender" => "F",
                "phone" => "0876543219",
                "user_type" => 2,
                "email" => "sujennakin@gmail.com",
                "password" => "!@#123Abc",
            ],
            [
                "firstname" => "Chendy",
                "lastname" => "Min",
                "gender" => "F",
                "phone" => "015678923",
                "user_type" => 2,
                "email" => "chendymin@gmail.com",
                "password" => "!@#123Abc",
            ],
            [
                "firstname" => "Nacho",
                "lastname" => "El",
                "gender" => "M",
                "phone" => "0765432198",
                "user_type" => 2,
                "email" => "elnacho@gmail.com",
                "password" => "!@#123Abc",
            ],
            [
                "firstname" => "Jean",
                "lastname" => "Hearl",
                "gender" => "M",
                "phone" => "0765432198",
                "user_type" => 2,
                "email" => "jeanhearl@gmail.com",
                "password" => "!@#123Abc",
            ],

            // Admin //
            [
                "firstname" => "Admin",
                "lastname" => "The Best",
                "gender" => "M",
                "phone" => "0123456789",
                "user_type" => 1,
                "email" => "admin@gmail.com",
                "password" => "!@#123Abc",
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
