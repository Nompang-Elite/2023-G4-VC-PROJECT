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
        User::create([
            "firstname" => "Jame",
            "lastname" => "smith",
            "gender" => "M",
            "phone" => "0123456789",
            "email" => "jamesmith@gmail.com",
            "password" => "!@#$1234Abc",
        ]);
    }
}
