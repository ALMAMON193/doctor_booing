<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AppointmentBookingSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Get all users (or any specific set of users) you want to associate appointments with
        $users = \App\Models\User::all(); // Replace with your actual user model and logic if needed

        foreach ($users as $user) {
            // Create 10 appointments for each user
            // Insert other random appointments
            for ($i = 0; $i < 3; $i++) {
                DB::table('appointment_bookings')->insert([
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'email' => $faker->unique()->safeEmail,
                    'phone' => $faker->phoneNumber,
                    'consultant_type' => $faker->randomElement(['psychologist', 'therapist', 'counselor']),
                    'appointment_date' => $faker->date(),
                    'appointment_time' => $faker->time(),
                    'message' => $faker->paragraph,
                    'psychologist_id' => $faker->randomElement([2, 3, 4, 5, 6, 7, 8, 9, 10]), // Random psychologist IDs except 1
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
