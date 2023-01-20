<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ToursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Place::create([

            'name' => 'Jerusalem',
            'description' => 'Walking in the streets of Jerusalem, visiting Al-Aqsa Mosque and the Dome of the Rock,
                                 praying there, and heading to the Church of the Holy Sepulchre.',
            'type' => 'Religious',
            'cities_id' => '1',
            'Price' => '150',
            'date' => '2023-10-01',
            'start' => '7',
            'AddRem1' => '00',
            'close' => '7',
            'AddRem2' => '00',
            'image'=> '../user/images/home-images/jerusalem.jpg',

        ]);

        Place::create([

            'name' => 'Sebastia',
            'description' => 'It is located near Nablus
            It overlooks a wide area from all directions and has beautiful fields and orchards that give its area a renewed and beautiful view.',
            'type' => 'Cultural',
            'cities_id' => '3',
            'Price' => '50',
            'date' => '2023-10-05',
            'start' => '7',
            'AddRem1' => '00',
            'close' => '7',
            'AddRem2' => '00',
            'image'=> '../user/images/home-images/saabastia.jpg',

        ]);

        Place::create([

            'name' => 'zoo',
            'description' => 'Garden and park
            It contains trees and animals and also contains recreational games for children and adults.',
            'type' => 'Leisure',
            'cities_id' => '4',
            'Price' => '50',
            'date' => '2023-6-05',
            'start' => '10',
            'AddRem1' => '00',
            'close' => '5',
            'AddRem2' => '00',
            'image'=> '../user/images/home-images/zoo.jpg',

        ]);
    }
}
