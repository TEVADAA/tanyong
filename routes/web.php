<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

// Route::get('/',SliderController::class);

//Slider
Route::get('/slider/show',[SliderController::class,'show'])->name('slider.show');
Route::get('/slider/create', function(){return view('admin.slider.create');})->name('slider.create');
Route::post('/slider/store',[SliderController::class ,'store'])->name('slider.store');
Route::get('/slider/edit/{id}',[SliderController::class,'edit'])->name('slider.edit');
Route::post('/slider/update/{id}',[SliderController::class,'update'])->name('slider.update');
Route::delete('/slider/delete/{id}',[SliderController::class, 'delete'])->name('slider.delete');


//Categories
Route::get('/categories/show',[CategoriesController::class,'show'])->name('categories.show');
Route::get('/categories/create', function(){return view('admin.categories.create');})->name('categories.create');
Route::post('/categories/store',[CategoriesController::class , 'store'])->name('categories.store');
Route::get('/categories/edit/{cat_id}',[CategoriesController::class,'edit'])->name('categories.edit');
Route::post('/categories/update/{cat_id}',[CategoriesController::class,'update'])->name('categories.update');
Route::delete('/categories/delete/{cat_id}',[CategoriesController::class, 'delete'])->name('categories.delete');


//Product
Route::get('product/show',[ProductController::class,'show'])->name('product.show');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store',[ProductController::class , 'store'])->name('product.store');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
