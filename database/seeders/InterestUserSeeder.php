<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Interest;
use App\Models\User;
use Illuminate\Database\Seeder;

class InterestUserSeeder extends Seeder
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
            $user->interests()->attach([Interest::query()->inRandomOrder()->value('id'), Interest::query()->inRandomOrder()->value('id')]);
        }



    }
}
