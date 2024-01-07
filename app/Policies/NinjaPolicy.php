<?php

namespace App\Policies;

use App\Models\Airbus;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NinjaPolicy
{
    public function view(User $user, Airbus $airbus): bool
    {
        return $user->user_role_id=='1';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->user_role_id=='2';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Airbus $airbus): bool
    {    dd($user);
         return $user->user_role_id ==  '1';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Airbus $airbus): bool
    {   
        return $user->user_role_id == '1';
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Airbus $airbus): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, Airbus $airbus): bool
    // {
    //     //
    // }
}
