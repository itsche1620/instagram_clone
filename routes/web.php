<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('photos', PhotoController::class);
});

Route::get('/upload', [PhotoController::class, 'create'])->middleware('auth')->name('upload');
Route::post('/photos/{id}/like', [PhotoController::class, 'like'])->name('photos.like');
Route::delete('/photos/{photo}/like', [PhotoController::class, 'destroy'])->name('photos.unlike');
