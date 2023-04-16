<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserVideogameSeeder extends Seeder
{
    private $data = [
        [
            'user_id' => 1,
            'game_id' => 1,
        ],
        [
            'user_id' => 2,
            'game_id' => 1,
        ],
        [
            'user_id' => 2,
            'game_id' => 3,
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->data as $data){
            $user = User::find($data['user_id']);
            $user->videogames()->attach($data['game_id'], ['created_at' => now()]);
        }
    }
}
