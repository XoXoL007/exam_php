<?php

namespace App\Policies;

use App\Film;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilmPolice
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Film  $film
     * @return mixed
     */
    public function view(User $user, Film $film)
    {
        return $user->id === $film->user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Film  $film
     * @return mixed
     */
    public function update(User $user, Film $film)
    {
        return $user->id === $film->user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Film  $film
     * @return mixed
     */
    public function delete(User $user, Film $film)
    {
        return $user->id === $film->user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Film  $film
     * @return mixed
     */
    public function restore(User $user, Film $film)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Film  $film
     * @return mixed
     */
    public function forceDelete(User $user, Film $film)
    {
        //
    }
}
