<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\SucategorieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('produits')->name('produit.')->controller(ProduitController::class)->group(function () {
    Route::get('/', 'index')->name('index'); 
    Route::get('/create', function () {
        return view('produit.create');
    })->name('create'); 
    Route::post('/', 'createProduit')->name('store'); 
    Route::get('/{produit}/edit', 'edit')->name('edit'); 
    Route::put('/{produit}', 'update')->name('update'); 
    Route::delete('/{produit}', 'destroy')->name('destroy'); 
});



Route::prefix('admin')->group(function () {
    Route::get('/categories', [CategorieController::class, 'index'])->name('admin.categories');
    Route::post('/categories', [CategorieController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('admin.categories.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('/sucategories', [sucategorieController::class, 'index'])->name('admin.sucategories');
    Route::post('/sucategories', [sucategorieController::class, 'store'])->name('admin.sucategories.store');
    Route::get('/sucategories/{categorie}/edit', [sucategorieController::class, 'edit'])->name('admin.sucategories_edit');
    Route::put('/sucategories/{categorie}', [sucategorieController::class, 'update'])->name('admin.sucategories.update');
    Route::delete('/sucategories/{sucategorie}', [sucategorieController::class, 'destroy'])->name('admin.sucategories.destroy');
});
