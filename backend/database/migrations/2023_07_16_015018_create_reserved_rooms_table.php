<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reserved_rooms', function (Blueprint $table) {
            $table->id();
            $table->integer("number_of_room");
            $table->string("status")->default("unknown");
            $table->unsignedBigInteger("reservation_id");
            $table->foreign("reservation_id")->references("id")->on("reservations");
            $table->unsignedBigInteger("room_type_id");
            $table->foreign("room_type_id")->references("id")->on("room_types");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserved_rooms');
    }
};
