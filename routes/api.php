<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Api\Admin\DashboardController as AdminDashController;
use App\Http\Controllers\Api\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Api\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Api\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Api\Admin\VendorController as AdminVendorController; 
use App\Http\Controllers\Api\Admin\OrderController; 
use App\Http\Controllers\Api\Admin\UserController as AdminUserController;
use App\Http\Controllers\Api\Admin\ReportController; 


use App\Models\Admin;

// General routes
Route::get('/user', function (Request $request) {return $request->user();})->middleware('auth:sanctum');

Route::get('signup', [RegisterController::class, 'index'])->middleware('guest')->name('signup');
Route::get('vendor/register', [RegisterController::class, 'index'])->middleware('guest')->name('vendor.register');
Route::post('signup', [RegisterController::class, 'store'])->middleware('guest');
Route::get('signin', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('signin', [LoginController::class, 'store'])->middleware('guest');
// JWT-protected routes
Route::middleware(['jwt.auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('/protected-route', function () {
        return 'This is a protected route!';
    });
});
// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard route
    Route::get('dashboard', [AdminDashController::class, 'index'])->name('dashboard');
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('index');
        Route::get('/checkout', [AdminProductController::class, 'checkout'])->name('checkout');
        Route::post('/store', [AdminProductController::class, 'store'])->name('store');
        Route::get('edit/{id}', [AdminProductController::class, 'edit'])->name('edit');
        Route::get('data', [AdminProductController::class, 'getProductsData'])->name('data');
        Route::get('fetch', [AdminProductController::class, 'fetchProducts'])->name('fetch');
        Route::put('update/{id}', [AdminProductController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [AdminProductController::class, 'destroy'])->name('destroy');
        Route::get('categories/{categoryId}', [AdminProductController::class,'getAttributesByCategory'])->name('attributes');
    });
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('fetch', [AdminCategoryController::class, 'fetchCategory'])->name('fetch');
        Route::post('store', [AdminCategoryController::class, 'store'])->name('store');
        Route::get('edit/{id}', [AdminCategoryController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [AdminCategoryController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [AdminCategoryController::class, 'delete'])->name('delete');
    });
    Route::prefix('user')->name('user.')->group(function(){
        Route::get('fetch', [AdminUserController::class, 'fetchUsers'])->name('fetch');
        Route::post('store', [AdminUserController::class, 'store'])->name('store');
        Route::get('edit/{id}', [AdminUserController::class, 'edit'])->name('edit');
    }); 
});
