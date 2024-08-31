<?php

namespace Database\Seeders;

use App\Models\Interest;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(10)->create();

         Interest::factory(10)->create();

        $this->call([
            InterestUserSeeder::class,
        ]);

        $this->call([
            WalletSeeder::class,
        ]);

        $this->call([
            BillingSeeder::class,
        ]);

        $this->call([
            UserInfoSeeder::class,
        ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
