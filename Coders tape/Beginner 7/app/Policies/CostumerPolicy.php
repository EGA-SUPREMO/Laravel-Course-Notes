<?php

namespace App\Policies;

use App\Costumer;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CostumerPolicy
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
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Costumer  $Costumer
     * @return mixed
     */
    public function view(User $user, Costumer $Costumer)
    {
        return [$user->email => [
            'admin@admin.com',
        ]];
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return [$user->email => [
            'admin@admin.com',
        ]];
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Costumer  $Costumer
     * @return mixed
     */
    public function update(User $user, Costumer $Costumer)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Costumer  $Costumer
     * @return mixed
     */
    public function delete(User $user, Costumer $Costumer)
    {
        return [$user->email => [
            'admin@admin.com',
        ]];
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Costumer  $Costumer
     * @return mixed
     */
    public function restore(User $user, Costumer $Costumer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Costumer  $Costumer
     * @return mixed
     */
    public function forceDelete(User $user, Costumer $Costumer)
    {
        //
    }
}
