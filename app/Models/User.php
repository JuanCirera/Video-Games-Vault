<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'avatar',
        'external_id',
        'external_auth',
        'notifySocial',
        'notifyGames'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
    * @return string
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function videogames(){
        return $this->belongsToMany(Videogame::class)->withTimestamps();
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    // FOLLOWERS SYSTEM
    // Se relaciona a si mismo, teniendo cada relacion una FK distinta en la tabla pivote
    public function followers(){
        return $this->belongsToMany(User::class, 'user_follower', 'following_id', 'follower_id');
    }

    public function followings(){
        return $this->belongsToMany(User::class, 'user_follower', 'follower_id', 'following_id');
    }

}
