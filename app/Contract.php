<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'name', 'notes', 'end_date', 'company_name', 'manager_id', 'artist_id', 'status',
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
