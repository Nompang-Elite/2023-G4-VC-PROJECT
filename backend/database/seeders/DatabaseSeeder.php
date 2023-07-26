<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\HostedAt;
use App\Models\Hotel;
use App\Models\OccupiedRooms;
use App\Models\Reservations;
use App\Models\ReservedRooms;
use App\Models\Reviews;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create user type
        $this->call(UserTypesSeeder::class);
        // Create user
        $this->call(UsersSeeder::class);
        // Create hotel data
        $this->call(HotelsSeeder::class);
        // Create hotel info data
        $this->call(HotelsInfoSeeder::class);
        // Create room types data
        $this->call(RoomTypesSeeder::class);
        // Create rooms data
        $this->call(RoomsSeeder::class);
        // Create rooms data
        $this->call(ReviewsSeeder::class);
        // Create occupiedRoom data
        $this->call(OccupiedRoomsSeeder::class);
        
        // Reservations::factory(10)->create();
        // OccupiedRooms::factory(10)->create();
        // HostedAt::factory(10)->create();
        // ReservedRooms::factory(10)->create();
        // Reservation
        // Reservations::factory(4)->create();
        // Reserved room
        // ReservedRooms::factory(4)->create();
        // Occupied room
        // OccupiedRooms::factory(4)->create();
        // Reviews
        Reviews::factory(4)->create();
        // Image
        $this->call(ImagesSeeder::class);
        $this->call(HotelImagesSeeder::class);
        $this->call(RoomImagesSeeder::class);
    }
}
