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
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@vgv.com',
            'password' => bcrypt('Pistacho1'),
            'profile_photo_path' => 'img/default_profile_photo.png'
        ]);

        DB::table('users')->insert([
            'username' => 'CWG',
            'email' => 'cirera@vgv.com',
            'password' => bcrypt('Pistacho1'),
            'profile_photo_path' => 'img/default_profile_photo.png'
        ]);
    }
}
