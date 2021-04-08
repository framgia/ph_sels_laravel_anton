<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserFollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::inRandomOrder()->limit(20)->get() as $user) {
            User::inRandomOrder()->first()->follow($user);
        }
    }
}
