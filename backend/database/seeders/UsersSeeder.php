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
                "firstname" => "Jimmy",
                "lastname" => "Janne",
                "gender" => "M",
                "phone" => "0123456789",
                "email" => "jimmyjane@gmail.com",
                "password" => "!@#123Abc",
            ],
            [
                "firstname" => "Jame",
                "lastname" => "smith",
                "gender" => "M",
                "phone" => "0123456789",
                "email" => "jamesmith1@gmail.com",
                "password" => "!@#123Abc",
            ],
            [
                "firstname" => "Jame",
                "lastname" => "smith",
                "gender" => "M",
                "phone" => "0123456789",
                "email" => "jamesmith2@gmail.com",
                "password" => "!@#123Abc",
            ],
            [
                "firstname" => "Jame",
                "lastname" => "smith",
                "gender" => "M",
                "phone" => "0123456789",
                "email" => "jamesmith3@gmail.com",
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
            [
                "firstname" => "Hotel",
                "lastname" => "The Best",
                "gender" => "M",
                "phone" => "0123456789",
                "user_type" => 2,
                "email" => "owner@gmail.com",
                "password" => "!@#123Abc",
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
