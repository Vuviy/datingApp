<?php

namespace Database\Seeders;

use App\Models\FastDateInfo;
use App\Models\User;
use Illuminate\Database\Seeder;

class FastDateInfoSeeder extends Seeder
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
            FastDateInfo::query()->create(['user_id' => $user->id]);
        }

    }
}
