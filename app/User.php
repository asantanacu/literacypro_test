<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the bands for the user.
     */
    public function bands()
    {
        return $this->hasMany('App\Band');
    }  

    /**
     * Get all of the albums for the user.
     */
    public function albums()
    {
        return $this->hasManyThrough('App\Album', 'App\Band');
    }
}
