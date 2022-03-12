<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Middleware\Checkout;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

// ========== Home Route ========
Route::get('/', [ClientProductController::class, 'productTrendingHomePage'])->name('home-page');


// ========== Product and product detail Route ========
Route::get('/products',[ClientProductController::class, "showProducts"])->name('product-page');
Route::get('/products/{slug}',[ClientProductController::class, "showProductsByCategory"])->name('product-page-byCategory');
Route::get('/product/{slug}',[ClientProductController::class, "showProductDetail"])->name('product-detail-page');
Route::get('/trending',[ClientProductController::class, "getTrendingProducts"]);


// ========== Successful Order Notification route ========
Route::get('/successfulorder', function () {
    return view('client.successfulOrder.index');
})->name('successful-order-page');

// ========== Contact route ========
Route::get('/contact', [ContactController::class, 'index'])->name('contact-page');
Route::post('/contact', [ContactController::class, 'createContact'])->name('create-contact');



// ========== Cart Route ========
Route::prefix('cart')->group(function() {
    Route::get('/', [CartController::class, 'index'])->name('show-cart'); 
    Route::post('add/{id}', [CartController::class, 'add'])->name('add-cart'); 
    Route::get('remove/{id}', [CartController::class, 'remove'])->name('remove-cart'); 
    Route::post('update', [CartController::class, 'update'])->name('update-cart'); 
    Route::get('clear', [CartController::class, 'clear'])->name('clear-cart'); 
});


// ========== Search Route ========
Route::get('/resultsearch', [ClientProductController::class, 'resultsearch'])->name('search-page');

// ========== Checkout Route ========
Route::prefix('/checkout')->middleware('checkout')->group(function () {
    Route::get('', [CheckoutController::class, 'index'])->name('show-checkout');
    Route::post('', [CheckoutController::class, 'store'])->name('store-checkout');
});
Route::get('test-mail', [CheckoutController::class, 'testMail'])->name('test-mail');

Route::get('/successful', function () { return view('client.successfulOrder.index');})->name('successful-order');


//========= Admin routes ============
Route::middleware(['guest:admin'])->group(function () {

    Route::get('/admin-register', [AuthController::class, 'showRegister'])->name('admin-register');
    Route::post('/admin-register', [AuthController::class, 'storeRegister'])->name('admin-register');


    Route::get('/admin-login', [AuthController::class, 'showLogin'])->name('admin-login');
    Route::post('/admin-login', [AuthController::class, 'login'])->name('admin-login');
});
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin-logout', [AuthController::class, 'logout'])->name('admin-logout');


    Route::prefix('admin')->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('admin-home');

        Route::prefix('category')->group(function () {
            Route::get('', [CategoryController::class, 'showCategory'])->name('show-category');

            Route::get('create', [CategoryController::class, 'showCreateCategory'])->name('create-category');
            Route::post('create', [CategoryController::class, 'storeCategory']);

            Route::get('/{slug}', [CategoryController::class, 'showEditCategory'])->name('edit-category');
            Route::put('/{slug}', [CategoryController::class, 'updateCategory']);

            Route::get('delete/{slug}', [CategoryController::class, 'deleteCategory'])->name('delete-category');
        });

        Route::prefix('product')->group(function () {
            Route::get('', [ProductController::class, 'showProduct'])->name('show-product');

            Route::get('create', [ProductController::class, 'showCreateProduct'])->name('create-product');
            Route::post('create', [ProductController::class, 'storeProduct']);

            Route::get('/{slug}', [ProductController::class, 'showEditProduct'])->name('edit-product');
            Route::put('/{slug}', [ProductController::class, 'updateProduct']); 
            
    
            Route::get('delete/{slug}', [ProductController::class, 'deleteProduct'])->name('delete-product');

        });

        Route::prefix('media')->group(function () {
            Route::get('', [MediaController::class, 'index'])->name('show-media');
        });


        Route::get('/orders', [OrderController::class, 'index'])->name('show-orders');
        Route::get('/order/{id}', [OrderController::class, 'showOrderDetail'])->name('show-order-detail');
        Route::post('/order/confirm/{id}', [OrderController::class, 'confirmOrderDetail'])->name('confirm-order-detail');
        Route::post('/order/cancel/{id}', [OrderController::class, 'cancelOrderDetail'])->name('cancel-order-detail');
        Route::post('/order/complete/{id}', [OrderController::class, 'completeOrderDetail'])->name('complete-order-detail');
   
        Route::get('/contacts', [ContactController::class, 'displayListContacts'])->name('contact');
   
   
    });
});