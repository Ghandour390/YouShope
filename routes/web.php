<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\SucategorieController;
use Faker\Guesser\Name;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/user/store',[RegisteredUserController::class,'store'])->name('user.create');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::prefix('produits')->name('produit.')->controller(ProduitController::class)->group(function () {
//     Route::get('/', 'index')->name('index'); 
//     Route::get('/create', function () {
//         return view('produit.create');
//     })->name('create'); 
//     Route::post('/', 'createProduit')->name('store'); 
//     Route::get('/{produit}/edit', 'edit')->name('edit'); 
//     Route::put('/{produit}', 'update')->name('update'); 
//     Route::delete('/{produit}', 'destroy')->name('destroy'); 
// });
Route::get('/admin/produits',[ProduitController::class,'index'])->Name('admin.produits');
Route::post('/admin/produits/create',[ProduitController::class,'store'])->Name('admin.produits.create');


// Route::prefix('admin')->group(function () {
    Route::get('admin/categories', [CategorieController::class, 'index'])->name('admin.categories');
    Route::post('admin/categories/create', [CategorieController::class, 'store'])->name('admin.categories.store');
    // Route::get('/categories/edit/{id}', [CategorieController::class, 'edit'])->name('admin.categories.edit');
    Route::post('admin/categories/edit/{id}', [CategorieController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/update', [CategorieController::class, 'update'])->name('admin.categories.update');
    Route::post('admin/categories/delete', [CategorieController::class, 'destroy'])->name('admin.categories.destroy');
// });

// Route::prefix('admin')->group(function () {
    Route::get('admin/sucategories', [SucategorieController::class, 'index'])->name('admin.sucategories');
    Route::post('admin/sucategories', [SucategorieController::class, 'store'])->name('admin.sucategories.store');
    Route::post('admin/sucategories/edit/{id}', [SucategorieController::class, 'edit'])->name('admin.sucategories_edit');
    Route::put('admin/sucategories/update', [SucategorieController::class, 'update'])->name('admin.sucategories.update');
    Route::delete('admin/sucategories/{sucategorie}', [SucategorieController::class, 'destroy'])->name('admin.sucategories.destroy');
// });
