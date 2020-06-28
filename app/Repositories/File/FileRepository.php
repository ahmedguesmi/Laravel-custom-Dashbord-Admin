<?php

namespace App\Repositories\File;

use App\Models\File;

/**
 * Class FileRepository
 *
 * @package App\Repositories\User
 */
class FileRepository implements FileRepositoryInterface
{
    /**
     * @param array $data
     *
     * @return mixed|void
     */
    public function create(array $data)
    {
        File::create($data);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        return File::findOrFail($id);
    }

    /**
     * @param $id
     *
     * @return mixed|void
     */
    public function destroy($id)
    {
        File::destroy($id);
    }
}
