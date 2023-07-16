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
        Schema::create('occupied_rooms', function (Blueprint $table) {
            $table->id();
            $table->datetime("check_in");
            $table->datetime("check_out");
            $table->unsignedBigInteger("room_id");
            $table->foreign("room_id")->references("id")->on("rooms");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('occupied_rooms');
    }
};
