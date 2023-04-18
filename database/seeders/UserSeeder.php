<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'avatar' => "https://ui-avatars.com/api/?name=admin&background=02B3E4&color=fff&bold=true",
            "created_at" => now()
        ]);

        User::factory()->create([
            'username' => 'CiReRaWarGamer',
            'email' => 'cwg@gmail.com',
            'password' => 'password',
            'avatar' => "https://ui-avatars.com/api/?name=cwg&background=02B3E4&color=fff&bold=true",
            "created_at" => now()
        ]);

        User::factory()->create([
            'username' => 'Excidium',
            'email' => 'excidium@gmail.com',
            'password' => 'password',
            'avatar' => "https://ui-avatars.com/api/?name=excidium&background=02B3E4&color=fff&bold=true",
            "created_at" => now()
        ]);
    }
}
