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
            UserInfo::query()->create(['user_id' => $user->id]);
        }
    }
}
