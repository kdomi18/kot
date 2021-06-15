<?php

use Admin\UserController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\VetController;
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
Route::get('/market/buyers', [BuyerController::class, "getBuyer"])->middleware(['auth'])->name('buyers');
Route::get("/market/buyer/{id}", [BuyerController::class, "getBuyerById"])->middleware(['auth']);
Route::get("/market/delete-buyer/{id}", [BuyerController::class, "deleteBuyer"])->middleware(['auth']);
Route::get("/market/edit-buyer/{id}", [BuyerController::class, "editBuyer"])->middleware(['auth']);
Route::post("/market/update-buyer", [BuyerController::class, 'updateBuyer'])->name('buyer.update')->middleware(['auth']);

// supplier routes
Route::get("/market/add-supplier", [SupplierController::class, 'addSupplier'])->middleware(['auth'])->name('add.supplier');
Route::post("/market/create-supplier", [SupplierController::class, 'createSupplier'])->name('supplier.create')->middleware(['auth']);
Route::get('/market/suppliers', [SupplierController::class, "getSupplier"])->middleware(['auth'])->name('suppliers');
Route::get("/market/supplier/{id}", [SupplierController::class, "getSupplierById"])->middleware(['auth']);
Route::get("/market/delete-supplier/{id}", [SupplierController::class, "deleteSupplier"])->middleware(['auth']);
Route::get("/market/edit-supplier/{id}", [SupplierController::class, "editSupplier"])->middleware(['auth']);
Route::post("/market/update-supplier", [SupplierController::class, 'updateSupplier'])->name('supplier.update')->middleware(['auth']);

// vet routes
Route::get("/vet/add-vet", [VetController::class, 'addVet'])->middleware(['auth'])->name('add.vet');
Route::post("/vet/create-vet", [VetController::class, 'createVet'])->name('vet.create')->middleware(['auth']);
Route::get('/vet/vets', [VetController::class, "getVet"])->middleware(['auth'])->name('vets');
Route::get("/vet/vet/{id}", [VetController::class, "getVetById"])->middleware(['auth']);
Route::get("/vet/delete-vet/{id}", [VetController::class, "deleteVet"])->middleware(['auth']);
Route::get("/vet/edit-vet/{id}", [VetController::class, "editVet"])->middleware(['auth']);
Route::post("/vet/update-vet", [VetController::class, 'updateVet'])->name('vet.update')->middleware(['auth']);
