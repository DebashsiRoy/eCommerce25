<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ProductWishController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Route;

Auth::routes();


// User Section
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('user.index');
    Route::get('/customer-profile', [UserController::class, 'userProfileIndex'])->name('user.profile');
    Route::get('/user-profile', [UserController::class, 'userProfile'])->name('profile.details');
    Route::get('/user-account-details', [UserController::class, 'accountDetails'])->name('user.account.details');
    Route::post('/user-profile-update', [UserController::class, 'UpdateProfile'])->name('user.profile.update');
    // Customer Profile
    Route::post('/customer-profile', [CustomerProfileController::class, 'CreateCustomerProfile'])->name('customer.profile');
    Route::get('/readProfile', [CustomerProfileController::class, 'ReadProfile'])->name('customer.page');

    // Product Review
    Route::post('/product-review', [ProductReviewController::class, 'CreateProductReview'])->name('product.review');

    // Product Wish list
    Route::get('/product-wishlist', [ProductWishController::class, 'productWishList'])->name('product.wishlist');
    Route::get('/create-wishlist/{product_id}', [ProductWishController::class, 'CreateWishList'])->name('create.wishlist');
    Route::get('/remove-wishlist/{product_id}', [ProductWishController::class, 'RemoveWishList'])->name('remove.wishlist');
});
Route::get('/user-dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
//Admin section
Route::middleware(['auth', AuthAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
    // products section
    Route::get('/products-page', [ProductController::class, 'index'])->name('product.index');

    // Category section
    Route::get('/category-page', [CategoryController::class, 'CategoryPage'])->name('category.index');
    Route::get('/category-list', [CategoryController::class, 'CategoryList'])->name('category.list');
    Route::post('/category-crate', [CategoryController::class, 'CategoryCreate'])->name('category.create');
    Route::post('/category-update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::post('/category-delete', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
    Route::post('/category-by-id', [CategoryController::class, 'categoryByID'])->name('category.id');

    // Brand section
    Route::get('/brand-page', [BrandController::class, 'brandPage'])->name('brand.index');
    Route::get('/brands-list', [BrandController::class, 'BrandList'])->name('all.brands');
    Route::post('/admin/brands/create',[BrandController::class, 'BrandAdd'])->name('create.brand');
    Route::post('/brand-delete', [BrandController::class, 'brandDelete'])->name('brand.delete');
    Route::post('/brand-by-id', [BrandController::class, 'BrandByID'])->name('brand.id');
    Route::post('/brand-update', [BrandController::class, 'BrandUpdate'])->name('brand.update');

    // Products Section
    Route::get('/products-page', [ProductController::class, 'productIndex'])->name('product.page');
    Route::get('/products-list', [ProductController::class, 'ProductList'])->name('product.list');
    Route::post('/product-create', [ProductController::class, 'createProduct'])->name('product.create');
    Route::post('/product-update', [ProductController::class, 'updateProduct'])->name('product.update');
    Route::post('/product-by-id', [ProductController::class, 'productById'])->name('product.byID');
    Route::post('/product-delete', [ProductController::class, 'deleteProduct'])->name('product.delete');

    // Product Details
//    Route::post('/product-add-details', [ProductDetailController::class, 'addProductDetails'])->name('product.addDetails');
//    Route::post('/product-delete-details', [ProductDetailController::class, 'deleteProductDetails'])->name('product.deleteDetails');
//    Route::post('/product-update-details', [ProductDetailController::class, 'updateProductDetails'])->name('product.updateDetails');
//    Route::get('/productDetails-page',[ProductDetailController::class, 'productDetailsPage'])->name('product.details');
//    Route::get('/productDetails-list',[ProductDetailController::class, 'ProductDetailsList'])->name('product.details.list');



});

Route::get('shop-page', [shopController::class, 'salePage'])->name('shop.page');
Route::get('shop-products', [shopController::class, 'shopProducts'])->name('shop.products');



