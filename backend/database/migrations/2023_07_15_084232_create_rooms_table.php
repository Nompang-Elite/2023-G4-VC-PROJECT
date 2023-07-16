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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string("number")->default("not define");
            $table->string("name")->default("untitled");
            $table->string("status")->default("unknown");
            $table->unsignedBigInteger("room_type_id");
            $table->unsignedBigInteger("hotel_id");
            $table->foreign("room_type_id")->references("id")->on("room_types");
            $table->foreign("hotel_id")->references("id")->on("hotels");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
