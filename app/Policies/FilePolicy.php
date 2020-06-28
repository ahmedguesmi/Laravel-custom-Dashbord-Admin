<?php

namespace App\Policies;

use App\Models\User;
use App\Models\File;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class FilePolicy
 *
 * @package App\Policies
 */
class FilePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param File $file
     *
     * @return bool
     */
    public function update(User $user, File $file)
    {
        return $user->id === $file->user_id;
    }

    /**
     * @param User $user
     * @param File $file
     *
     * @return bool
     */
    public function delete(User $user, File $file)
    {
        return $user->id === $file->user_id;
    }

    /**
     * @param User $user
     * @param File $file
     *
     * @return bool
     */
    public function restore(User $user, File $file)
    {
        return $user->id === $file->user_id;
    }

    /**
     * @param User $user
     * @param File $file
     *
     * @return bool
     */
    public function forceDelete(User $user, File $file)
    {
        return $user->id === $file->user_id;
    }
}
