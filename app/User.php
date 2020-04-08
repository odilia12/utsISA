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
        'name', 'email', 'password', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function contract()
    {
        return $this->hasMany('App\Contract');
    }

    public function scheduleManager()
    {
        return $this->hasMany('App\Schedule', 'manager_id');
    }

    public function scheduleArtist()
    {
        return $this->hasMany('App\Schedule', 'artist_id');
    }
}
