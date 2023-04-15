<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    use HasFactory;

    protected $fillable=["name","release_date","additions","followed"];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
