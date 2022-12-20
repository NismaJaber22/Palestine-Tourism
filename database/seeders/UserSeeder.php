<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'userfname' => 'Nisma',
            'userlname' => 'Jaber',
            'email' => 'nisma@gmail.com',
            'password' => Hash::make('123456789Nn'),
            'liveIn'=>4,
            'is_admin'=>1,
            'image'=>'',
        ]);
        User::create([
            'userfname' => 'Nisma',
            'userlname' => 'mahmoud',
            'email' => 'nismajaber@gmail.com',
            'password' => Hash::make('123456789Nn'),
            'liveIn'=>3,
            'is_admin'=>0,
            'image'=>'',
        ]);
    }
}
