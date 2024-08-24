<?php

namespace Database\Seeders;

use App\Models\Hobby;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $hobbies = [
            "Reading", "Writing", "Drawing", "Painting", "Cooking", "Baking",
            "Gardening", "Hiking", "Cycling", "Running", "Swimming", "Fishing",
            "Photography", "Traveling", "Playing Music", "Singing", "Dancing",
            "Knitting", "Sewing", "Crafting", "Woodworking", "Collecting", "Bird Watching",
            "Yoga", "Meditation", "Chess", "Board Games", "Video Games", "Puzzles",
            "Blogging", "Vlogging", "Podcasting", "Scrapbooking", "Calligraphy",
            "Pottery", "Rock Climbing", "Martial Arts", "Scuba Diving", "Surfing",
        ];

        $dataLength = count($hobbies);

        for($i = 0; $i < $dataLength; $i++) {
            Hobby::create([
                "name" => $hobbies[$i],
            ]);
        }
    }
}
