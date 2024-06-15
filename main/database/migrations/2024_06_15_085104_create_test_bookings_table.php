<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('test_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tests_ids');
            $table->unsignedBigInteger('user_id');
            $table->string('booking_date');
            $table->string('slot');
            $table->enum('status', ["pending", "booked", "completed"])->comment('pending means that user wants to book but no slot is free, booked means booked, completed means test is done');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_bookings');
    }
};
