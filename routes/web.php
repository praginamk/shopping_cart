<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

// Route::get('/', function () {
//     return view('welcome');
// });
  
//Home
Route::get('/',[FrontendController::class,'index'])->name('home');
Route::get('/product-view/{id}',[FrontendController::class,'viewproduct'])->name('viewproduct');
Route::get('/addToCart/{id}',[FrontendController::class,'addToCart'])->name('addToCart');
Route::get('/viewMyCart',[FrontendController::class,'viewMyCart'])->name('viewMyCart');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //product routes

    Route::get('products',[ProductController::class,'index'])->name('products.index');
    Route::get('products-create',[ProductController::class,'create'])->name('products.create');
    Route::post('products-store',[ProductController::class,'store'])->name('products.store');
    Route::get('products_edit/{id}',[ProductController::class,'edit'])->name('products.edit');
    Route::post('products_update/{id}',[ProductController::class,'update'])->name('products.update');


});

require __DIR__.'/auth.php';
