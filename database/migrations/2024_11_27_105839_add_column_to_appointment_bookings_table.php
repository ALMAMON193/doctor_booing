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
        Schema::table('appointment_bookings', function (Blueprint $table) {
            $table->foreignId('appointment_time_id')->nullable()->constrained('time_slots')->nullOnDelete();
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointment_bookings', function (Blueprint $table) {
            $table->dropForeign(['appointment_time_id']);
            $table->dropColumn('appointment_time_id');
            $table->dropColumn('status');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
