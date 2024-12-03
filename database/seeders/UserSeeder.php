<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create 1 admin user
        User::create([
            'name' => 'Admin',
            'lname' => 'User',
            'phone' => $faker->unique()->phoneNumber,
            'city' => $faker->city,
            'gender' => 'Male',
            'dob' => $faker->date('Y-m-d', '1985-01-01'),
            'postalcode' => (int)$faker->postcode,
            'street' => $faker->streetAddress,
            'area_focus' => $faker->word,
            'preferred_type' => $faker->word,
            'avatar' => $faker->imageUrl(200, 200, 'people', true),
            'email' => 'admin@admin.com',
            'otp' => $faker->randomNumber(6, true),
            'otp_expires_at' => $faker->dateTimeBetween('now', '+2 days'),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'language' => 'English',
            'qualification' => 'Admin Qualification',
            'ahpra_registraion_number' => '123456',
            'practice_name' => 'Admin Practice',
            'practice_address' => 'Admin Address',
            'therapy_mode' => 'Offline',
            'client_age_group' => 'All',
            'area_of_expertise' => 'Admin Area',
            'experience' => $faker->numberBetween(1, 30),
            'upload_certificate' => $faker->imageUrl(640, 480, 'technics', true),
            'profile_description' => 'Admin profile description',
            'terms_registration' => true,
            'terms_agreement' => true,
            'role' => 'admin',
            'slug' => null,
        ]);

//        // Create 50 doctor users
//        $ahpraPrefixes = ['MED', 'DEN', 'PHA', 'PSY', 'NUR'];
//
//        for ($i = 0; $i < 10; $i++) {
//            $gender = $faker->randomElement(['Male', 'Female']);
//            $name = $faker->firstName($gender); // Generate first name with a specific gender
//            $lname = $faker->lastName;
//
//
//            // Assign avatar based on gender
//            $avatar = $gender === 'Male'
//                ? 'https://plus.unsplash.com/premium_photo-1658506671316-0b293df7c72b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8ZG9jdG9yfGVufDB8fDB8fHww'
//                : 'https://media.gettyimages.com/id/1473559425/photo/female-medical-practitioner-reassuring-a-patient.jpg?s=2048x2048&w=gi&k=20&c=i32Q2A-kCTBM0npBPYBaew5sgFfxpRAgmbunLEaxscg=';
//
//
//            $ahpraPrefix = $faker->randomElement($ahpraPrefixes);
//            $ahpraNumber = $ahpraPrefix . $faker->unique()->numberBetween(100000, 999999);
//
//
//            $areaOfExpertise = $faker->word;
//            $slug = Str::slug($areaOfExpertise);
//
//            // Ensure unique slug
//            while (User::where('slug', $slug)->exists()) {
//                $slug = Str::slug($areaOfExpertise . '-' . Str::random(20));
//            }
//
//            // Ensure unique email and phone
//            $email = $faker->unique()->safeEmail;
//            $phone = $faker->unique()->phoneNumber;
//
//            // Generate user
//            User::create([
//                'name' => $name,
//                'lname' => $lname,
//                'phone' => $phone,
//                'city' => $faker->city,
//                'gender' => $gender,
//                'dob' => $faker->date('Y-m-d', '1985-01-01'),
//                'postalcode' => (int)$faker->postcode,
//                'street' => $faker->streetAddress,
//                'area_focus' => $faker->word,
//                'preferred_type' => $faker->word,
//                'avatar' => $avatar,
//                'email' => $email,
//                'otp' => $faker->randomNumber(6, true),
//                'otp_expires_at' => $faker->dateTimeBetween('now', '+2 days'),
//                'email_verified_at' => now(),
//                'password' => Hash::make('12345678'),
//                'language' => 'English',
//                'qualification' => $faker->word,
//                'ahpra_registraion_number' => $ahpraNumber,
//                'session_duration' => $faker->numberBetween(0, 59),
//                'session_price' => (float)$faker->randomFloat(2, 10, 500),
//                'practice_name' => $faker->company,
//                'practice_address' => $faker->address,
//                'therapy_mode' => $faker->word,
//                'client_age_group' => $faker->randomElement(['Adults', 'Teens', 'Children']),
//                'area_of_expertise' => $areaOfExpertise,
//                'experience' => $faker->numberBetween(1, 30),
//                'upload_certificate' => $faker->imageUrl(640, 480, 'technics', true),
//                'profile_description' => $faker->paragraph,
//                'terms_registration' => $faker->boolean,
//                'terms_agreement' => $faker->boolean,
//                'role' => 'doctor',
//                'slug' => $slug,
//            ]);
//        }
//
//
//        // Create 3 client users
//
//        for ($i = 0; $i < 3; $i++) {
//            // Ensure unique email and phone
//            $email = $faker->unique()->safeEmail;
//            $phone = $faker->unique()->phoneNumber;
//
//            User::create([
//                'name' => $faker->firstName,
//                'lname' => $faker->lastName,
//                'phone' => $phone,
//                'city' => $faker->city,
//                'gender' => $faker->randomElement(['Male', 'Female']),
//                'dob' => $faker->date('Y-m-d', '1990-01-01'),
//                'postalcode' => (int)$faker->postcode,
//                'street' => $faker->streetAddress,
//                'area_focus' => $faker->word,
//                'preferred_type' => $faker->word,
//                'avatar' => $faker->imageUrl(200, 200, 'people', true),
//                'email' => $email,
//                'otp' => $faker->randomNumber(6, true),
//                'otp_expires_at' => $faker->dateTimeBetween('now', '+2 days'),
//                'email_verified_at' => now(),
//                'password' => Hash::make('12345678'),
//                'language' => 'English',
//                'qualification' => 'Client',
//                'ahpra_registraion_number' => 'N/A',
//                'practice_name' => 'Client Practice',
//                'practice_address' => 'Client Address',
//                'therapy_mode' => 'Online',
//                'client_age_group' => 'Adults',
//                'area_of_expertise' => 'Client Area',
//                'experience' => $faker->numberBetween(1, 30),
//                'upload_certificate' => $faker->imageUrl(640, 480, 'technics', true),
//                'profile_description' => 'Client profile description',
//                'terms_registration' => true,
//                'terms_agreement' => true,
//                'role' => 'client',
//                'slug' => null,
//            ]);
//
//        }
    }
}


