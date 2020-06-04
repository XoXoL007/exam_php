<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App
 *
 * @property-read $id
 * @property $name
 * @property $email
 * @property $password
 * @property $remember_token
 * @property-read $created_at
 * @property-read $updated_at
 * @property Film[]|\Illuminate\Database\Eloquent\Collection $films
 * @property $role_id
 */

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function films()
    {
        return $this->hasMany(Film::class);
    }

    function actors()
    {
        return $this->hasMany(Actor::class);
    }
}
