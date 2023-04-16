<?php

namespace Database\Seeders;

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
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(VideogameSeeder::class);
        $this->call(UserVideogameSeeder::class);
        $this->call(CategoryVideogameSeeder::class);
        $this->call(ReviewSeeder::class);
    }
}
