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
                "firstname" => "Helena",
                "lastname" => "Smith",
                "gender" => "M",
                "phone" => "0876543219",
                "user_type" => 3,
                "email" => "helenasmith@gmail.com",
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
