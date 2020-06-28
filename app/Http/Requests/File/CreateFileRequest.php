<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class CreateFileRequest
 *
 * @package App\Http\Requests\File
 */
class CreateFileRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'file_to_upload' => 'required|file|max:4096',
            'folder_id'      => 'required|exists:folders,id',
        ];
    }
}
