<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Route;

Auth::routes();


// User Section
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('user.index');
});
Route::get('/user-dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
//Admin section
Route::middleware(['auth', AuthAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
    // Brand section
    Route::get('/admin/brands', [BrandController::class, 'BrandList'])->name('all.brands');
    Route::post('/admin/brands/create',[BrandController::class, 'BrandAdd'])->name('create.brand');

    // Category section
    Route::get('/category-page', [CategoryController::class, 'CategoryPage'])->name('category.index');
    Route::get('/category-list', [CategoryController::class, 'CategoryList'])->name('category.list');
    Route::post('/category-crate', [CategoryController::class, 'CategoryCreate'])->name('category.create');
    Route::post('/category-update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::post('/category-delete', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
});


