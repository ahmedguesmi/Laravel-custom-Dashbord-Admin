<?php

namespace App\Services\Traits;

/**
 * Trait FolderPathTrait
 *
 * @package App\Services\Traits
 */
trait FolderPathTrait
{
    /**
     * @param $id
     *
     * @return string
     */
    public function getFolderPath($id)
    {
        $parent = $this->folderRepository->show($id);
        $path = $parent->name . '/';

        if ($parent->parent) {
            return $this->getFolderPath($parent->parent->id) . $path;
        }

        return $path;
    }
}
