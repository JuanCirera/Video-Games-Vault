<?php

namespace Database\Seeders;

use App\Models\Videogame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideogameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<5;$i++){
            Videogame::factory()->create([
                "title" => "Videojuego ".$i,
                "release_date" => now(),
                "updated_date" => now(),
                "additions" => "",
            ]);
        }

        for($i=5;$i<7;$i++){
            Videogame::factory()->create([
                "title" => "Videojuego ".$i,
                "release_date" => now(),
                "updated_date" => now(),
                "additions" => "Videojuego ".$i.": DLC 1",
                "followed" => true
            ]);
        }
    }
}
