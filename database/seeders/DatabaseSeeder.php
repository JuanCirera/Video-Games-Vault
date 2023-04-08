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
            'avatar' => "https://ui-avatars.com/api/?name=admin&background=8392ab&color=fff&bold=true"
        ]);

        DB::table('users')->insert([
            'username' => 'CWG',
            'email' => 'cirera@vgv.com',
            'password' => bcrypt('Pistacho1'),
            'avatar' => "https://ui-avatars.com/api/?name=cwg&background=8392ab&color=fff&bold=true"
        ]);
    }
}
