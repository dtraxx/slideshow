<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VideoController;
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

/*Route::get('/', function () {
    return view('auth.register');
})->name('home');*/

Route::get('/', function (){
    return view('auth.register');
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

Route::get('video-uploader', function (){
    return view('videos.video-upload');
})->name('video-uploader');

Route::controller(PhotoController ::class)->group(function(){
    Route::get('photo-index', 'index')->name('index');
    Route::post('file-upload', 'store')->name('file.store');
    Route::delete('photo.delete/{id}', 'delete')->name('photo.delete');
    Route::get('carousel', 'showCarousel')->name('carousel-show');
    Route::get('fullcarousel', 'showCarouselFull')->name('carousel-full');
});

Route::controller(VideoController ::class)->group(function(){
    Route::get('video-index', 'index')->name('video-index');
    Route::post('video-upload', 'store')->name('video.store');
    Route::delete('video.delete/{id}', 'delete')->name('video.delete');
});
