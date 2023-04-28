<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    use HasFactory;

    protected $fillable=["title","slug","release_date","updated_date","additions","image"];

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
