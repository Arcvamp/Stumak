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
use App\Http\Controllers\Api\Vendor\DashboardController as VendorDashController;
use App\Http\Controllers\Api\Vendor\ProductController as VendorProductController;
use App\Http\Controllers\Api\Vendor\ProfileController as VendorProfileController;

// General routes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('signup', [RegisterController::class, 'index'])->name('signup');
    Route::get('vendor/register', [RegisterController::class, 'index'])->name('vendor.register');
    Route::post('signup', [RegisterController::class, 'create']);
    Route::get('signin', [LoginController::class, 'index'])->name('login');
    Route::post('signin', [LoginController::class, 'create']);
});

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

    // Product routes
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('index');
        Route::get('checkout', [AdminProductController::class, 'checkout'])->name('checkout');
        Route::post('create', [AdminProductController::class, 'create'])->name('create');
        Route::get('find/{id}', [AdminProductController::class, 'find'])->name('find');
        Route::get('data', [AdminProductController::class, 'getProductsData'])->name('data');
        Route::get('fetch', [AdminProductController::class, 'fetchProducts'])->name('fetch');
        Route::put('update/{id}', [AdminProductController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [AdminProductController::class, 'destroy'])->name('delete');
        // Route::get('categories/{categoryId}', [AdminProductController::class, 'getAttributesByCategory'])->name('attributes');
        Route::get('category', [AdminProductController::class, 'getCategory'])->name('category');
        Route::get('getSubCategoriesByCategory/{id}', [AdminProductController::class, 'getSubCategoriesByCategory'])->name('getSubCategoriesByCategory');
        Route::get('getChildCategoriesBySubCategory/{id}', [AdminProductController::class, 'getChildCategoriesBySubCategory'])->name('getChildCategoriesBySubCategory');
        Route::get('getBrandsByCategory/{id}', [AdminProductController::class, 'getBrandsByCategory'])->name('getBrandsByCategory');
        Route::get('getBrandsBySubCategory/{id}', [AdminProductController::class, 'getBrandsBySubCategory'])->name('getBrandsBySubCategory');
        Route::get('getBrandsByChildCategory/{id}', [AdminProductController::class, 'getBrandsByChildCategory'])->name('getBrandsByChildCategory');
    });

    // Category routes
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('fetch', [AdminCategoryController::class, 'findALLCategory'])->name('fetch');
        Route::post('create', [AdminCategoryController::class, 'createCategory'])->name('create');
        Route::get('find/{id}', [AdminCategoryController::class, 'findCategory'])->name('find');
        Route::put('update/{id}', [AdminCategoryController::class, 'updateCategory'])->name('update');
        Route::delete('delete/{id}', [AdminCategoryController::class, 'deleteCategory'])->name('delete');
    });

    // Subcategory routes
    Route::prefix('subcategory')->name('subCategory.')->group(function () {
        Route::get('fetch', [AdminCategoryController::class, 'findALLSubcategory'])->name('fetch');
        Route::post('create', [AdminCategoryController::class, 'createSubcategory'])->name('create');
        Route::get('find/{id}', [AdminCategoryController::class, 'findSubcategory'])->name('find');
        Route::put('update/{id}', [AdminCategoryController::class, 'updateSubcategory'])->name('update');
        Route::delete('delete/{id}', [AdminCategoryController::class, 'deleteSubcategory'])->name('delete');
    });

    // Childcategory routes
    Route::prefix('childcategory')->name('childcategory.')->group(function () {
        Route::get('fetch', [AdminCategoryController::class, 'findALLChildcategory'])->name('fetch');
        Route::post('create', [AdminCategoryController::class, 'createChildcategory'])->name('create');
        Route::get('find/{id}', [AdminCategoryController::class, 'findChildcategory'])->name('find');
        Route::put('update/{id}', [AdminCategoryController::class, 'updateChildcategory'])->name('update');
        Route::delete('delete/{id}', [AdminCategoryController::class, 'deleteChildcategory'])->name('delete');
    });

    // Brand routes
    Route::prefix('brand')->name('brand.')->group(function () {
        Route::get('fetch', [AdminCategoryController::class, 'findALLBrand'])->name('fetch');
        Route::post('create', [AdminCategoryController::class, 'createBrand'])->name('create');
        Route::get('find/{id}', [AdminCategoryController::class, 'findBrand'])->name('find');
        Route::put('update/{id}', [AdminCategoryController::class, 'updateBrand'])->name('update');
        Route::delete('delete/{id}', [AdminCategoryController::class, 'deleteBrand'])->name('delete');
    });

    // Vendor routes
    Route::prefix('vendor')->name('vendor.')->group(function () {
        Route::get('fetch', [AdminVendorController::class, 'getVendorsWithProductCount'])->name('fetch');
        Route::post('create', [AdminVendorController::class, 'create'])->name('create');
        Route::get('find/{id}', [AdminVendorController::class, 'find'])->name('find');
        Route::put('update/{id}', [AdminVendorController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [AdminVendorController::class, 'delete'])->name('delete');
    });

    // User routes
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('fetch', [AdminUserController::class, 'fetchALL'])->name('fetch');
        Route::post('create', [AdminUserController::class, 'create'])->name('create');
        Route::get('find/{id}', [AdminUserController::class, 'find'])->name('find');
        Route::put('update/{id}', [AdminUserController::class, 'update'])->name('update');
    });
});

// Vendor routes
Route::prefix('vendor')->name('vendor.')->group(function () {
    Route::get('dashboard', [VendorDashController::class, 'index'])->name('dashboard');

    Route::prefix('product')->name('product.')->group(function () {
        Route::get('fetch', [VendorProductController::class, 'FetchAllproduct'])->name('fetch');
        Route::get('find/{id}', [VendorProductController::class, 'find'])->name('find');
        Route::post('create', [VendorProductController::class, 'createProduct'])->name('create');
        Route::put('update/{id}', [VendorProductController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [VendorProductController::class, 'delete'])->name('delete');
        Route::get('category', [VendorProductController::class, 'getCategory'])->name('getcategory');
        Route::get('getSubCategoriesByCategory/{id}', [VendorProductController::class, 'getSubCategoriesByCategory'])->name('subcategories');
        Route::get('getChildCategoriesBySubCategory/{id}', [VendorProductController::class, 'getChildCategoriesBySubCategory'])->name('getChildCategoriesBySubCategory');
        Route::get('getBrandsByCategory/{id}', [VendorProductController::class, 'getBrandsByCategory'])->name('getBrandsByCategory');
        Route::get('getBrandsBySubCategory/{id}', [VendorProductController::class, 'getBrandsBySubCategory'])->name('getBrandsBySubCategory');
        Route::get('getBrandsByChildCategory/{id}', [VendorProductController::class, 'getBrandsByChildCategory'])->name('getBrandsByChildCategory');
    });

    Route::prefix('profile')->name('profile')->group(function (){
        Route::post('update/{id}',[VendorProfileController::class, 'update'])->name('update');
        Route::get('fetch',[VendorProfileController::class, 'index'])->name('fetch');
    });
});