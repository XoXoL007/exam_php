<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'name'
    ];


    public function film()
    {
        return $this->belongsToMany('App\Film', 'genre_film')->toArray();
    }

}
