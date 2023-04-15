<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::factory()->create([
            "title" => "BATTLEPAY 204$",
            "body" => "Este juego no deja jugar a la gente humilde",
            "rating" => "20",
            "user_id" => 2,
            "videogame_id" => 2
        ]);

        Review::factory()->create([
            "title" => "CYBERPAIN 2077",
            "body" => "Dicen que los errores te hacen más fuerte. Luego de preordenar este juego, me volví fisicoculturista.",
            "rating" => "30",
            "user_id" => 1,
            "videogame_id" => 1
        ]);

        Review::factory()->create([
            "title" => "CALL OF FRUTY: CHEATZONE",
            "body" => "Bienvenido al juego donde morirás continuamente en bucle gracias a los chetos que vende activision...",
            "rating" => "10",
            "user_id" => 2,
            "videogame_id" => 3
        ]);
    }
}
