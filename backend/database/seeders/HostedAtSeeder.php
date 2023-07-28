<?php

namespace Database\Seeders;

use App\Models\HostedAt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HostedAtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hostedat = [
            [
                "occupied_id" => 1,
                "user_id"=> 1
            ],
            [
                "occupied_id" => 2,
                "user_id"=> 2
            ],
            [
                "occupied_id" => 3,
                "user_id"=> 3
            ],
            [
                "occupied_id" => 4,
                "user_id"=> 4
            ],
            [
                "occupied_id" => 5,
                "user_id"=> 5
            ],
            [
                "occupied_id" => 6,
                "user_id"=> 6
            ],
            [
                "occupied_id" => 7,
                "user_id"=> 7
            ],
            [
                "occupied_id" => 8,
                "user_id"=> 8
            ],
            [
                "occupied_id" => 9,
                "user_id"=> 9
            ],
            [
                "occupied_id" => 10,
                "user_id"=> 10
            ]
        ];
        foreach($hostedat as $hostedats){
            HostedAt::create($hostedats);
        }
        
    }
}
