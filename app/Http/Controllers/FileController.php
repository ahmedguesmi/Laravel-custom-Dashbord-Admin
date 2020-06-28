<?php

namespace App\Http\Controllers;

use App\Http\Requests\File\CreateFileRequest;
use App\Services\FileService;

/**
 * Class FileController
 *
 * @package App\Http\Controllers
 */
class FileController extends Controller
{
    /**
     * @var FileService
     */
    private $fileService;

    /**
     * FileController constructor.
     *
     * @param FileService $fileService
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;

        $this->middleware(['auth', 'verified'])->only(['store', 'destroy']);
    }

    /**
     * @param CreateFileRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateFileRequest $request)
    {
        $this->fileService->store($request->validated());

        return back()->with('status', 'File uploaded successfully!');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        return $this->fileService->download($id);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->fileService->destroy($id);

        return back()->with('status', 'File deleted successfully!');
    }
}
