<?php

use Admin\UserController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\CropController;
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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::get('/livestock', function () {
    return view('livestock');
})->middleware(['auth'])->name('livestock');

//Route::get('/market', function () {
//    return view('market');
//})->middleware(['auth'])->name('market');

Route::get('/weather', function () {
    return view('weather');
})->middleware(['auth'])->name('weather');

Route::get('/vet', function () {
    return view('vet');
})->middleware(['auth'])->name('vet');

//Route::get('/users', function () {
//    return view('users');
//})->middleware(['auth'])->name('users');

// manager routes
Route::prefix('manager')->middleware(['auth', 'auth.isManagerOrOwner', 'verified'])->name('manager.')->group(function (){
    Route::resource('/users', UserController::class);
});

// crop routes
Route::get("/crop/add-crop", [CropController::class, 'addCrop'])->middleware(['auth'])->name('add.crop');
Route::post("/crop/create-crop", [CropController::class, 'createCrop'])->name('crop.create')->middleware(['auth']);
Route::get('/crop/crop', [CropController::class, "getCrop"])->middleware(['auth'])->name('crop');
Route::get("/crop/crop/{id}", [CropController::class, "getCropById"])->middleware(['auth']);
Route::get("/crop/delete-crop/{id}", [CropController::class, "deleteCrop"])->middleware(['auth']);
Route::get("/crop/edit-crop/{id}", [CropController::class, "editCrop"])->middleware(['auth']);
Route::post("/crop/update-crop", [CropController::class, 'updateCrop'])->name('crop.update')->middleware(['auth']);

// buyer routes
Route::get("/market/add-buyer", [BuyerController::class, 'addBuyer'])->middleware(['auth'])->name('add.buyer');
Route::post("/market/create-buyer", [BuyerController::class, 'createBuyer'])->name('buyer.create')->middleware(['auth']);
Route::get('/market/market', [BuyerController::class, "getBuyer"])->middleware(['auth'])->name('market');
Route::get("/market/buyer/{id}", [BuyerController::class, "getBuyerById"])->middleware(['auth']);
Route::get("/market/delete-buyer/{id}", [BuyerController::class, "deleteBuyer"])->middleware(['auth']);
Route::get("/market/edit-buyer/{id}", [BuyerController::class, "editBuyer"])->middleware(['auth']);
Route::post("/market/update-buyer", [BuyerController::class, 'updateBuyer'])->name('buyer.update')->middleware(['auth']);
