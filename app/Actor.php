<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    /**
     * @property $name,
     * @property $photo_url,
     * @property $decrypt_info,
     * @property-read $created_at,
     * @property-read $updated_at,
     * @property Actor[]|\Illuminate\Database\Eloquent\Collection $actors
     */

    protected $fillable = [
        'name',
        'photo_url',
        'decrypt_info'
    ];

    public function film()
    {
        return $this->belongsToMany('App\Film', 'actor_film');
    }

}
