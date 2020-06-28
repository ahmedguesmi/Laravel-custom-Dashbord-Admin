<?php

namespace App\Repositories\File;

/**
 * Class FileRepositoryInterface
 *
 * @package App\Repositories\File
 */
interface FileRepositoryInterface
{
    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function show($id);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id);
}
