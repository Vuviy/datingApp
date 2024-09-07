<?php

namespace Database\Seeders;

use App\Models\Billing;
use App\Models\User;
use Illuminate\Database\Seeder;

class BillingSeeder extends Seeder
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
            Billing::query()->create(['user_id' => $user->id]);
        }
    }
}
