<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'cityName' => 'Jerusalem',
        ]);
        City::create([
            'cityName' => 'Tulkarm',
        ]);
        City::create([
            'cityName' => 'Nablus',
        ]);
    }
}
