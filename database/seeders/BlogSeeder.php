<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Blog::create([
        'title' => 'Jerusalem',
        'text' => 'It is the capital of the Palestinian state and its largest city,with a total area of about 19,331 km², and it was attacked 52 times
                    and was invaded approximately 44 times. It was founded by the Canaanites nearly 3000 years ago BC, and inhabited by the Jebusites, so it was named after
                    (Jebus), and the flag of Jerusalem since ancient times was shattered. Many are like the Crusaders, the Persians and the Romans, and the foot has many names,
                     including: Bayt al-Maqdis, the first two qiblas, and al-Quds al-Sharif.',

        'image'=> '../user/images/home-images/jerusalem.jpg',
        // 'image'=>Storage::path('user/images/home-images/jerusalem.jpg'),

        'status'=>1,
        'user_id' => 1,
        ]);
    }
}
