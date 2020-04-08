<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'name', 'note', 'time', 'manager_id', 'artist_id',
    ];

    public function usersArtist()
    {
        return $this->belongsTo('App\User', 'artist_id', 'id');
    }

    public function usersManager()
    {
        return $this->belongsTo('App\User', 'manager_id', 'id');
    }
}
