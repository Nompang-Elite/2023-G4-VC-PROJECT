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
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string("name", 40)->default("untitled");
            $table->string("description")->default('no descriptions');
            $table->integer("max_capacity")->default(0);
            $table->integer("bed_count")->default(0);
            $table->unsignedBigInteger("hotel_id");
            $table->foreign("hotel_id")->references("id")->on("hotels");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_types');
    }
};
