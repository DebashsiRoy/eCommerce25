<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProductCartsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ProductWishController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use App\Models\Brand;
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

    // Product Cart
    Route::post('/addTo-cart',[ProductCartsController::class, 'CreateCartList'])->name('addTo.cart');
    Route::get('/cart-list',[ProductCartsController::class, 'CartList'])->name('cart.list');
    Route::get('/delete-cart/{product_id}',[ProductCartsController::class, 'DeleteCartList'])->name('cart.delete');

    // Invoice
    Route::get('/create-invoice',[invoiceController::class, 'InvoiceCreate'])->name('create.invoice');
    Route::get('/invoice-list',[invoiceController::class, 'InvoiceList'])->name('invoice-list');
    Route::get('/invoice-product-list/{invoice_id}',[invoiceController::class, 'InvoiceProductList'])->name('invoice-product-list');

    // Product carts
    Route::get('/payment',[ProductCartsController::class, 'CreatePayment'])->name('create.payment');


    Route::get('/payment/success', [StripePaymentController::class, 'success'])->name('stripe.success');
    Route::get('/payment/cancel', [StripePaymentController::class, 'cancel'])->name('stripe.cancel');


});
Route::get('/user-dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
//Admin section
Route::middleware(['auth', AuthAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
    // products section
    Route::get('/products-page', [ProductController::class, 'index'])->name('product.index');
    Route::post("/add-product-details", [ProductController::class, 'addProductDetails'])->name('product.details.create');

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

    // Policy Controller
    Route::post('/add-policy', [PolicyController::class, 'policyAdd'])->name('add-policy');


});

Route::get('shop-page', [shopController::class, 'salePage'])->name('shop.page');
Route::get('shop-products', [shopController::class, 'shopProducts'])->name('shop.products');

// Product Wish list
Route::get('/product-wishlist', [ProductWishController::class, 'productWishList'])->name('product.wishlist');
Route::get('/create-wishlist/{product_id}', [ProductWishController::class, 'CreateWishList'])->name('create.wishlist');
Route::get('/remove-wishlist/{product_id}', [ProductWishController::class, 'RemoveWishList'])->name('remove.wishlist');

// Get details
Route::get('/category-list-in-menu', [CategoryController::class, 'categoryForMenu'])->name('category.list.menu');
Route::get('/brand-list-home', [BrandController::class, 'brandListAll'])->name('brand.list.home');

Route::post("/add-slider", [ProductController::class, 'addSlider'])->name('add.slider');
Route::get('/ListProductSlider', [ProductController::class, 'ListProductSlider'])->name('product.slider');

Route::get("/ListProductByRemark/{remark}", [ProductController::class, 'listProductByRemark'])->name('product.by.remark');

Route::get("/brCategoryPage", [CategoryController::class, 'ByCategoryPage'])->name('category.page');
Route::get("/byCategoryListById/{id}", [ProductController::class, 'ListProductCategory'])->name('category.list.by.id');

Route::get("/list-by-brand",[BrandController::class,'byBrandPage'])->name('brand.page');
Route::get("/byBrandListById/{id}", [ProductController::class, 'ListProductBrand'])->name('brand.list.by.id');

Route::get('/policy-list/{type}', [PolicyController::class, 'PolicyByType'])->name('policy-list');
Route::get("/policy",[PolicyController::class, 'policyPage'])->name('policy');

Route::get("/product-details",[HomeController::class, 'productDetails'])->name('product.details');
Route::get("/details-by-id/{id}", [ProductController::class, 'ProductDetailById'])->name('details.by.id');

// user login and register page
Route::get("/user-login", [HomeController::class, 'loginPage'])->name('login-page');
