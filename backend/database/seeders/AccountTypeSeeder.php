<?php

namespace Database\Seeders;

use App\Models\AccountType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $types = [
            [
                "desc" => "customer",
                "perm" => "BOOK, DELETE_TICKET, CANCEL",
            ],
            [
                "desc" => "hotel_owner",
                "perm" => "CREATE_HOTEL, CREATE_ROOM, DELETE_TICKET, CANCEL",
            ]
        ];

        foreach ($types as $type) {
            AccountType::create(
                [
                    'description' => $type['desc'],
                    'permission' => $type['perm']
                ]
            );
        }
    }
}
