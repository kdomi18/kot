<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/crop', function () {
    return view('crop');
})->middleware(['auth'])->name('crop');

Route::get('/livestock', function () {
    return view('livestock');
})->middleware(['auth'])->name('livestock');

Route::get('/market', function () {
    return view('market');
})->middleware(['auth'])->name('market');

Route::get('/weather', function () {
    return view('weather');
})->middleware(['auth'])->name('weather');

Route::get('/vet', function () {
    return view('vet');
})->middleware(['auth'])->name('vet');

Route::get('/users', function () {
    return view('users');
})->middleware(['auth'])->name('users');
