<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable=["title","body","rating","user_id","videogame_id","likes","dislikes"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function videogame(){
    //     return $this->belongsTo(Videogame::class);
    // }

    public function usersLiked(){
        return $this->belongsToMany(User::class, 'user_like_review', 'user_id', 'review_id')->withTimestamps();
    }

    public function usersDisliked(){
        return $this->belongsToMany(User::class, 'user_dislike_review', 'user_id', 'review_id')->withTimestamps();
    }
}
