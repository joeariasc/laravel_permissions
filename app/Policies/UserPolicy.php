<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user_a
     * @return mixed
     */
    public function viewAny(User $user_a)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user_a
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $user_a, User $user, $permissions = null)
    {
        if ($user_a->havePermission($permissions[0])) {
            return true;
        } else  
        if ($user_a->havePermission($permissions[1])) {
            return $user_a->id === $user->id;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user_a
     * @return mixed
     */
    public function create(User $user_a)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user_a
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user_a, User $user, $permissions)
    {
        if ($user_a->havePermission($permissions[0])){
            return true;
        }else  
        if ($user_a->havePermission($permissions[1])){
            return $user_a->id === $user->id;
        }
        else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user_a
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user_a, User $user)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user_a
     * @param  \App\User  $user
     * @return mixed
     */
    public function restore(User $user_a, User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user_a
     * @param  \App\User  $user
     * @return mixed
     */
    public function forceDelete(User $user_a, User $user)
    {
        //
    }
}
