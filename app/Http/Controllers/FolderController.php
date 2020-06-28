<?php

namespace App\Http\Controllers;

use App\Http\Requests\Folder\CreateFolderRequest;
use App\Http\Requests\Folder\UpdateFolderRequest;
use App\Services\FolderService;

/**
 * Class FolderController
 *
 * @package App\Http\Controllers
 */
class FolderController extends Controller
{
    /**
     * @var FolderService
     */
    private $folderService;

    /**
     * FolderController constructor.
     *
     * @param FolderService $folderService
     */
    public function __construct(FolderService $folderService)
    {
        $this->folderService = $folderService;

        $this->middleware(['auth', 'verified'])->only(['store', 'update', 'destroy']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $folders = $this->folderService->index();
        return view('folders.index', compact('folders'));
    }

    /**
     * @param CreateFolderRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateFolderRequest $request)
    {
        $this->folderService->store($request->validated());

        return back()->with('status', 'Folder created successfully!');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $folder = $this->folderService->show($id);
        return view('folders.show', compact('folder'));
    }

    /**
     * @param UpdateFolderRequest $request
     * @param                     $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateFolderRequest $request, $id)
    {
        $this->folderService->update($request->validated(), $id);

        return back()->with('status', 'Folder renamed successfully!');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->folderService->destroy($id);

        return back()->with('status', 'Folder deleted successfully!');
    }
}
