<?php

namespace App\Repositories\Folder;

/**
 * Class FolderRepositoryInterface
 *
 * @package App\Repositories\Folder
 */
interface FolderRepositoryInterface
{
    /**
     * @return mixed
     */
    public function index();

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function store(array $data);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function show($id);

    /**
     * @param array $data
     * @param       $id
     *
     * @return mixed
     */
    public function update(array $data, $id);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id);
}
