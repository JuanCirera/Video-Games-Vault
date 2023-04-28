<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            "name" => "completado",
        ]);

        Category::factory()->create([
            "name" => "jugando",
        ]);

        Category::factory()->create([
            "name" => "pendiente",
        ]);

        Category::factory()->create([
            "name" => "probado",
        ]);

        Category::factory()->create([
            "name" => "sin categoria",
        ]);
    }
}
