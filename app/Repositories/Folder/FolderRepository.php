<?php

namespace App\Repositories\Folder;

use App\Models\Folder;
use Auth;
use Illuminate\Support\Facades\DB;


/**
 * Class FolderRepository
 *
 * @package App\Repositories\User
 */
class FolderRepository implements FolderRepositoryInterface
{
    /**
     * @return mixed
     */
    public function index()
    {
        return Folder::noParent()->paginate(50);
    }

    /**
     * @param array $data
     *
     * @return mixed|void
     */
    public function store(array $data)
    {
        Folder::create($data);
    }

    /**
     * @param $id
     *
     * @return Folder|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function show($id)
    {
        $userId = Auth::id();
        $admin_check = DB::table('role_user')
        ->select('user_id')
        ->where('user_id',$userId)
        ->where('role_id','=',1)               
        ->first();
        if(!empty($admin_check)){
            return Folder::with(['parent', 'children', 'files'])
            ->where('folders.id', $id)
            ->firstOrFail();
        }else{
            return Folder::with(['parent', 'children', 'files'])
                ->where('folders.id', $id)
                ->where('user_id',$userId)
                ->firstOrFail();
        }
    }

    /**
     * @param array $data
     * @param       $id
     *
     * @return mixed|void
     */
    public function update(array $data, $id)
    {
        Folder::where('id', $id)->update($data);
    }

    /**
     * @param $id
     *
     * @return mixed|void
     */
    public function destroy($id)
    {
        Folder::destroy($id);
    }
}
