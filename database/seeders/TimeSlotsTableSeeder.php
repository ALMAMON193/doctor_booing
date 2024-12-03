<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimeSlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed time slots for doctors with IDs from 1 to 500
        for ($doctorId = 1; $doctorId <= 500; $doctorId++) {
            for ($hour = 9; $hour <= 17; $hour++) { 
                DB::table('time_slots')->insert([
                    'doctor_id' => $doctorId,
                    'start_time' => Carbon::createFromTime($hour, 0, 0)->format('H:i:s'), 
                    'end_time' => Carbon::createFromTime($hour + 1, 0, 0)->format('H:i:s'),
                    'status' => 'available', // Default status
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
