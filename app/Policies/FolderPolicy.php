<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Folder;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class FolderPolicy
 *
 * @package App\Policies
 */
class FolderPolicy
{
    use HandlesAuthorization;

    /**
     * @param User   $user
     * @param Folder $folder
     *
     * @return bool
     */
    public function update(User $user, Folder $folder)
    {
        return $user->id === $folder->user_id;
    }

    /**
     * @param User   $user
     * @param Folder $folder
     *
     * @return bool
     */
    public function delete(User $user, Folder $folder)
    {
        return $user->id === $folder->user_id;
    }

    /**
     * @param User   $user
     * @param Folder $folder
     *
     * @return bool
     */
    public function restore(User $user, Folder $folder)
    {
        return $user->id === $folder->user_id;
    }

    /**
     * @param User   $user
     * @param Folder $folder
     *
     * @return bool
     */
    public function forceDelete(User $user, Folder $folder)
    {
        return $user->id === $folder->user_id;
    }
}
