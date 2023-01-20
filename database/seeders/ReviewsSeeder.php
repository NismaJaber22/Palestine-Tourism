<?php

namespace Database\Seeders;

use App\Models\Reviews;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reviews::create([
            'opinion' => 'Reservations are available for various places band easy reservations',

            'user_id' => 1,
            ]);
    }
}
