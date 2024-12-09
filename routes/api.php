<?php

use App\Http\Controllers\Api\Admin\DashboardController as AdminDashController;
use App\Http\Controllers\Api\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Api\Admin\ServiceController as AdminServiceController;
// use App\Http\Controllers\Api\Admin\UserController as AdminUserController;
use App\Http\Controllers\Api\Admin\VendorController as AdminVendorController; // Adjusted import to match naming convention
use App\Http\Controllers\Api\Admin\OrderController; // Added missing import for OrderController
use App\Http\Controllers\Api\Admin\ReportController; // Added missing import for ReportController

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Models\Admin;

// General routes
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

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
        Route::get('categories/{categoryId}', [AdminProductController::class, 'getAttributesByCategory'])->name('attributes');
    });

    // Order management routes
    // Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
    // Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    // User management route
    // Route::get('users', [AdminUserController::class, 'index'])->name('users.index');

    // // Sales report route
    // Route::get('reports/sales', [ReportController::class, 'sales'])->name('reports.sales');
});
