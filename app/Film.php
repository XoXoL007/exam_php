<?php

namespace App;

use App\Casts\ReleaseYearCast;
use App\Casts\QualityCast;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App
 *
 * @property-read $id
 * @property $title
 * @property $decryption
 * @property $cover_url
 * @property $quality_id
 * @property $trailer_ulr
 * @property $film_url
 * @property $release_year_id
 * @property-read $created_at
 * @property-read $updated_at
 * @property User $user
 */


class Film extends Model
{

    protected $fillable = [
      'user_id',
      'title',
      'decryption',
      'cover_url',
      'trailer_url',
      'film_url',
      'quality_id',
      'release_year_id',
    ];

    protected $casts = [
        'quality_id' => QualityCast::class,
        'release_year_id' => ReleaseYearCast::class
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genre()
    {
        return $this->belongsToMany('App\Genre', 'genre_film');
    }

    public function actor()
    {
        return $this->belongsToMany('App\Actor', 'actor_film');
    }
}
