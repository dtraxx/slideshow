<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('uploader', function (){
    return view('uploader');
})->name('uploader');

Route::controller(PhotoController ::class)->group(function(){

    Route::get('photo-index', 'index')->name('index');

    Route::post('file-upload', 'store')->name('file.store');

    Route::delete('photo.delete/{id}', 'delete')->name('photo.delete');
});

