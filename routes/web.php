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

Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');

Route::controller(FileController::class)->group(function(){

    Route::get('file-upload', 'index');

    Route::post('file-upload', 'store')->name('file.store');

});

