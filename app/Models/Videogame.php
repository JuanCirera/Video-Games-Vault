<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    use HasFactory;

    protected $fillable=["title","slug","release_date","updated_date","additions","followed","image"];

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }


    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
