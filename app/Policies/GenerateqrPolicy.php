<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Generateqr;
use Illuminate\Auth\Access\HandlesAuthorization;

class GenerateqrPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_generateqr');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Generateqr $generateqr): bool
    {
        return $user->can('view_generateqr');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_generateqr');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Generateqr $generateqr): bool
    {
        return $user->can('update_generateqr');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Generateqr $generateqr): bool
    {
        return $user->can('delete_generateqr');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_generateqr');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Generateqr $generateqr): bool
    {
        return $user->can('force_delete_generateqr');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_generateqr');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Generateqr $generateqr): bool
    {
        return $user->can('restore_generateqr');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_generateqr');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Generateqr $generateqr): bool
    {
        return $user->can('replicate_generateqr');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_generateqr');
    }
}
