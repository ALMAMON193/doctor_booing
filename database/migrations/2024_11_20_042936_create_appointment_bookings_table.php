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
        Schema::create('appointment_bookings', function (Blueprint $table) {
            
            $table->id(); 
            $table->string('first_name');
            $table->string('last_name'); 
            $table->string('email'); 
            $table->string('phone'); 
            $table->string('consultant_type');
            $table->date('appointment_date');
            $table->time('appointment_time'); 
            $table->text('message')->nullable(); 
            $table->decimal('session_price', 8, 2)->nullable();
            $table->foreignId('psychologist_id')->nullable()->constrained('users')->nullOnDelete(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_bookings');
    }
};
