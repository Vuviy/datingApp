<?php

namespace Database\Seeders;

use App\Models\Billing;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $users = User::all();

        foreach ($users as $user)
        {
            UserInfo::query()->create([
                'user_id' => $user->id,
                'height' => random_int(150, 210),
                'weight'  => random_int(45, 150),
                'hair_color'  => random_int(1, 5),
                'boobs_size'  => $user->gender == 'female' ? random_int(1, 5) : null,
                'ass_girth'  => random_int(60, 140),
                'waistline'  => random_int(50, 100),
                'dick_length'  => $user->gender == 'male' ? random_int(5, 30) : null,
                'goal_here'  => random_int(1, 3),
            ]);
        }
    }
}
