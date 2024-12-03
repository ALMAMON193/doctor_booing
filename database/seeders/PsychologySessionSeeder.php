<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\PsychologySessions;

class PsychologySessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create a Faker instance
        $faker = Faker::create();

        // Fake image paths (you can replace these with actual image paths in your public directory)
        $fakeImages = [
            'sessions/fake_image1.jpg',
            'sessions/fake_image2.jpg',
            'sessions/fake_image3.jpg',
            'sessions/fake_image4.jpg'
        ];

        // Loop to create 4 sessions
        for ($i = 0; $i < 4; $i++) {
            PsychologySessions::create([
                'name' => $faker->sentence(5), // Random sentence for name
                'image' => $fakeImages[$i], // Fake image from the array
                'description' => $faker->paragraph, // Random paragraph for description
            ]);
        }
    }
}
