<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

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

// BUKU
Route::resource('/buku', BukuController::class);
Route::get('/search', [BukuController::class, 'search'])->name('search');
Route::delete('/buku/{buku}', 'App\Http\Controllers\BukuController@destroy')->name('buku.destroy');


