<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // ------------------------------
            // Personal Information
            // ------------------------------
            $table->id();
            $table->string('name');
            $table->string('lname');
            $table->string('phone')->unique();
            $table->string('city')->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->date('dob');
            $table->integer('postalcode')->nullable();
            $table->string('street')->nullable();
            $table->string('area_focus')->nullable();
            $table->string('preferred_type')->nullable()->nullable();
            $table->string('avatar')->nullable();

            // ------------------------------
            // Contact Information
            // ------------------------------
            $table->string('email')->unique();
            $table->string('otp')->nullable();
            $table->timestamp('otp_expires_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // ------------------------------
            // Language Preferences
            // ------------------------------
            $table->string('language')->nullable();

            // ------------------------------
            // Professional Information
            // ------------------------------
            $table->string('qualification')->nullable();
            $table->string('ahpra_registraion_number')->nullable();

            // ------------------------------
            // Therapy Model Information
            // ------------------------------
            $table->string('practice_name')->nullable();
            $table->string('session_duration')->nullable();
            $table->decimal('session_price')->default(0);
            $table->string('practice_address')->nullable();
            $table->string('therapy_mode')->nullable();
            $table->string('client_age_group')->nullable();

            // ------------------------------
            // Area of Expertise
            // ------------------------------
            $table->string('area_of_expertise')->nullable();
            $table->integer('experience')->nullable();

            // ------------------------------
            // Certificate Upload
            // ------------------------------
            $table->string('upload_certificate')->nullable();

            // ------------------------------
            // Profile Description
            // ------------------------------
            $table->text('profile_description')->nullable();

            // ------------------------------
            // Terms and Agreements
            // ------------------------------
            $table->boolean('terms_registration')->default(false);
            $table->boolean('terms_agreement')->default(false);
            $table->string('slug')->nullable();

            // ------------------------------
            // User Role
            // ------------------------------
            $table->enum('role', ['admin', 'doctor', 'client'])->default('client');

                // ------------------------------
            // Status
            // ------------------------------
            // ------------------------------
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            // Authentication and Timestamps
            // ------------------------------
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
