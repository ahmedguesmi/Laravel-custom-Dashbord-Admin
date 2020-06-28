<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class Folder
 *
 * @package App\Models
 */
class Folder extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'parent_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany(File::class, 'folder_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Folder::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Folder::class, 'parent_id');
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeNoParent($query)
    {
        $userId = Auth::id();
        $admin_check = DB::table('role_user')
        ->select('user_id')
        ->where('user_id',$userId)
        ->where('role_id','=',1)               
        ->first();

        if(!empty($admin_check)){
            print_r($admin_check);
      //  die('test');
        return $query->where('parent_id', null);
        }else{
        return $query->where('parent_id', null)->where('user_id',$userId);
        }
    }
}
