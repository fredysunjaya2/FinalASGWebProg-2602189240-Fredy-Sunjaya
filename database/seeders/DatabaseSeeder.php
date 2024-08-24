<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAvatar;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function getRandomHobbies() {
        $hobbies = [
                "Reading", "Writing", "Drawing", "Painting", "Cooking", "Baking",
                "Gardening", "Hiking", "Cycling", "Running", "Swimming", "Fishing",
                "Photography", "Traveling", "Playing Music", "Singing", "Dancing",
                "Knitting", "Sewing", "Crafting", "Woodworking", "Collecting",
                "Bird Watching", "Yoga", "Meditation", "Chess", "Board Games",
                "Video Games", "Puzzles", "Blogging", "Vlogging", "Podcasting",
                "Scrapbooking", "Calligraphy", "Pottery", "Rock Climbing",
                "Martial Arts", "Scuba Diving", "Surfing", "Skiing", "Snowboarding",
                "Skating", "Camping", "Astronomy", "Stargazing", "Model Building",
                "Volunteering", "Homebrewing", "Wine Tasting", "Language Learning"
            ];

            // Get 3 random hobbies
            $randomHobbies = array_rand($hobbies, 3);

            $selectedHobbies = array_map(function($key) use ($hobbies) {
                return $hobbies[$key];
            }, $randomHobbies);

            // Combine into a string
            $hobbiesString = implode(', ', $selectedHobbies);

            // Return or use the string
            return $hobbiesString;
    }

    public function run(): void
    {

        $this->call([
            AvatarSeeder::class,
        ]);

        for ($i = 0; $i < 20; $i++) {
            User::create([
                'name' => fake()->name(),
                'age' => rand(1, 99),
                'gender' => fake()->randomElement($array = ['Male', 'Female']),
                'instagram_username' => "http://www.instagram.com/" . fake()->name(),
                'fields_of_hobby' => $this->getRandomHobbies(),
                'mobile_number' => fake()->phoneNumber(),
                'coin' => rand(100, 1000),
                'register_price' => rand(100000,125000),
                'isPaid' => 1,
                'password' => bcrypt('123456789'),
                'isPrivate'=> 0,
                'current_avatar' => rand(1, 151),
            ]);
        }

        $this->call([
            HobbySeeder::class,
            UserAvatarSeeder::class,
        ]);
    }
}
