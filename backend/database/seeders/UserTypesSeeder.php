<?php

namespace Database\Seeders;

use App\Models\UserTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userType = [
            [
                "type" => "admin",
                "permission" => "['VIEW', 'EDIT-ACC', 'DELETE-ACC']",
            ],
            [
                "type" => "hotel_owner",
                "permission" => "['VIEW', 'EDIT', 'DELETE']",
            ],
            [
                "type" => "guest",
                "permission" => "['VIEW', 'CHECK-IN', 'CHECK-OUT']",
            ]
        ];
        foreach ($userType as $type) {
            UserTypes::create($type);
        }
    }
}
