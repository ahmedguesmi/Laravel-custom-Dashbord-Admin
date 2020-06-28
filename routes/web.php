<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/login')->name('home');;

Route::redirect('/home', '/folders')->name('home');;

Auth::routes(['verify' => true]);

Route::resource('files', 'FileController')->only([
    'store', 'show', 'destroy'
]);

Route::resource('folders', 'FolderController')->except([
    'create', 'edit'
]);
