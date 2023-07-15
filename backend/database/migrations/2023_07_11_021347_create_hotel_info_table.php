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
        Schema::create('hotel_infos', function (Blueprint $table) {
            $table->id();
            $table->string("address");
            $table->string("city");
            $table->string("country");
            $table->string("postal_code");
            $table->string("phone");
            $table->string('email')->unique();
            $table->unsignedBigInteger("hotel_id");
            $table->foreign("hotel_id")->references("id")->on("hotels");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_addresses');
    }
};
