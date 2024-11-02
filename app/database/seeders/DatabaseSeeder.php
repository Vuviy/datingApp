<?php

namespace Database\Seeders;

use App\Models\Feed;
use App\Models\Interest;
use App\Models\Offer;
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
         User::factory(100)->create();

<<<<<<< HEAD
<<<<<<< HEAD
         Interest::factory(100)->create();

         Offer::factory(199)->create();
         Feed::factory(199)->create();
=======
//         Offer::factory(199)->create();
//         Feed::factory(199)->create();
>>>>>>> 3cbd4e352c08a3a17ff0e6f4a47749f41ae8fd81

        $this->call([
            InterestUserSeeder::class,
        ]);
=======
//         Offer::factory(199)->create();
//         Feed::factory(199)->create();

//        $this->call([
//            InterestUserSeeder::class,
//        ]);
//
//        $this->call([
//            WalletSeeder::class,
//        ]);
//
//        $this->call([
//            BillingSeeder::class,
//        ]);
//
//        $this->call([
//            UserInfoSeeder::class,
//        ]);
//
//        $this->call([
//            FastDateInfoSeeder::class
//        ]);
<<<<<<< HEAD
>>>>>>> 3cbd4e352c08a3a17ff0e6f4a47749f41ae8fd81
=======
>>>>>>> 3cbd4e352c08a3a17ff0e6f4a47749f41ae8fd81

        $this->call([
            WalletSeeder::class,
        ]);

        $this->call([
            BillingSeeder::class,
        ]);

        $this->call([
            UserInfoSeeder::class,
        ]);
    }
}
