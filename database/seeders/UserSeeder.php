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
            'email' => 'admin@vgv.com',
            'password' => bcrypt('Pistacho1'),
            'avatar' => "https://ui-avatars.com/api/?name=admin&background=8392ab&color=fff&bold=true",
            "created_at" => now()
        ]);

        User::factory()->create([
            'username' => 'CWG',
            'email' => 'cirerawargamer@vgv.com',
            'password' => bcrypt('Pistacho1'),
            'avatar' => "https://ui-avatars.com/api/?name=cwg&background=8392ab&color=fff&bold=true",
            "created_at" => now()
        ]);
    }
}
