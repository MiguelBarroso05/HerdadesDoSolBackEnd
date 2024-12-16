<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            UserSeeder::class,
            SaleSeeder::class,
            ActivityTypeSeeder::class,
            ActivitySeeder::class,
            AccommodationTypeSeeder::class,
            AccommodationSeeder::class,
        ]);


    }
}
