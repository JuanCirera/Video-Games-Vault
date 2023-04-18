<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=["name","videogame_id"];

    public function videogames(){
        return $this->belongsToMany(Videogame::class)->withTimestamps();
    }
}
