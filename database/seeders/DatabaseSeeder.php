<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     $this->call(UserSeeder::class);
     $this->call(BlogSeeder::class);

     $this->call(CitySeeder::class);
     $this->call(ReviewsSeeder::class);
     $this->call(ToursSeeder::class);



    }
}
