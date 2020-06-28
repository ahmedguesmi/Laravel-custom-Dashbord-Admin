<?php

namespace App\Http\Requests\Folder;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class UpdateFolderRequest
 *
 * @package App\Http\Requests
 */
class UpdateFolderRequest extends FormRequest
{
    /**
     * @return int|null
     */
    public function authorize()
    {
        return Auth::id();
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'folder_name' => 'required|min:1|max:50',
        ];
    }
}
