<?php

namespace Database\Seeders;

use App\Models\UserAvatar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i = 0; $i < 100; $i++) {
            UserAvatar::create([
                "user_id"=> rand(1, 20),
                "avatar_id" => rand(1,151),
            ]);
        }
    }
}
