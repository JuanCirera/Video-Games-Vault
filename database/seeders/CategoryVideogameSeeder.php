<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Videogame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryVideogameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $default = 5;
        //La categoria por defecto es el id 5, si por lo que sea cambia el id y peta, se cambia aqui
        $videogames = Videogame::all();
        foreach ($videogames as $v) {
            $v->categories()->attach($default);
        }
    }
}
