<?php

namespace App\Policies;

use App\Dokter;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DokterPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Dokter  $dokter
     * @return mixed
     */
    public function view(User $user, Dokter $dokter)
    {
        return in_array($user->email, [
            'admin@gmail.com'
        ]);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->email === 'admin@gmail.com';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Dokter  $dokter
     * @return mixed
     */
    public function update(User $user, Dokter $dokter)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Dokter  $dokter
     * @return mixed
     */
    public function delete(User $user, Dokter $dokter)
    {
        return in_array($user->email, [
            'admin@gmail.com'
        ]);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Dokter  $dokter
     * @return mixed
     */
    public function restore(User $user, Dokter $dokter)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Dokter  $dokter
     * @return mixed
     */
    public function forceDelete(User $user, Dokter $dokter)
    {
        //
    }
}
