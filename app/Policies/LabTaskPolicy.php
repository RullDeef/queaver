<?php

namespace App\Policies;

use App\Models\LabTask;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LabTaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LabTask  $labTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, LabTask $labTask)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->isModerator();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LabTask  $labTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, LabTask $labTask)
    {
        return $user->isAdmin() || $user->isModerator();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LabTask  $labTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, LabTask $labTask)
    {
        return $user->isAdmin() || $user->isModerator();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LabTask  $labTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, LabTask $labTask)
    {
        return $user->isAdmin() || $user->isModerator();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LabTask  $labTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, LabTask $labTask)
    {
        return $user->isAdmin() || $user->isModerator();
    }
}
