<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Random\RandomException;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws RandomException
     */
    public function run()
    {
        $faker = Faker::create(); // Create a new Faker instance

// Loop through doctor IDs from 1 to 10
for ($doctorId = 1; $doctorId <= 10; $doctorId++) {
    // Generate exactly 9 time slots per doctor
    for ($i = 0; $i < 9; $i++) {
        // Random start time between 8:00 AM and 5:00 PM
        $startTime = $faker->dateTimeBetween('08:00:00', '16:30:00')->format('H:i:s');

        // Random end time (must be after start time, within a reasonable range)
        $endTime = date('H:i:s', strtotime($startTime) + random_int(30, 120) * 60);

        // Ensure end time does not exceed the working hours of 5:00 PM
        if (strtotime($endTime) > strtotime('17:00:00')) {
            $endTime = '17:00:00';
        }

        // Random status ('available' or 'booked')
        $status = $faker->randomElement(['available']);

        // Insert into the database
        DB::table('time_slots')->insert([
            'doctor_id' => $doctorId,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'status' => $status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
    }
}
