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
        Schema::table('package_bookings', function (Blueprint $table) {
            // Change column type from enum to varchar
            $table->string('status')->change();
        });

        Schema::table('test_bookings', function (Blueprint $table) {
            // Change column type from enum to varchar
            $table->string('status')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('package_bookings', function (Blueprint $table) {
            // Change column type from varchar to enum
            $table->enum('status', ['pending', 'completed'])->change();
        });

        Schema::table('test_bookings', function (Blueprint $table) {
            // Change column type from varchar to enum
            $table->enum('status', ['pending', 'completed'])->change();
        });
    }
};

