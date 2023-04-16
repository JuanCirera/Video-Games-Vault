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
            "name" => "completados",
        ]);

        Category::factory()->create([
            "name" => "jugando actualmente",
        ]);

        Category::factory()->create([
            "name" => "pendientes",
        ]);

        Category::factory()->create([
            "name" => "probados",
        ]);

        Category::factory()->create([
            "name" => "sin categoria",
        ]);
    }
}
