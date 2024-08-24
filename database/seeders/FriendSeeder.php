<?php

namespace Database\Seeders;

use App\Models\Friend;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $status = ["Pending", "Accepted", "Declined"];

        for($i = 0;  $i < 10; $i++) {
            $friend1 = Friend::create([
                "user_id" => 1,
                "friend_id" => rand(1,20),
                "status" => $status[rand(0,2)],
            ]);

            Friend::create([
                "user_id" => $friend1->friend_id,
                "friend_id" => $friend1->user_id,
                "status" => $friend1->status,
            ]);
        }
    }
}
