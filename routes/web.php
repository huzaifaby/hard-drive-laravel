<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ProductDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
//index
Route::get('/',[IndexController::class,'index'])->name('index');
//end

//frontend work

//product detail
// Route::get('product-detail',[ProductDetailController::class,'ProductDetail'])->name('product.detail');
Route::get('product-detail/{product_slug}', [ProductDetailController::class,'ProductDetail'])->name('product.detail');
//end
//frontend work end





//Admin Dashboard work
Route::get('dashboard', [DashboardController::class, 'index']); 
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
//end

//Product crud 
Route::get('dashboard/product', [ProductController::class, 'products'])->name('products');
Route::post('/add-product',[ProductController::class,'addProduct'])->name('add.product');
Route::post('/update-product',[ProductController::class,'updateProduct'])->name('update.product');
Route::post('/delete-product',[ProductController::class,'deleteProduct'])->name('delete.product');
Route::get('/pagination/paginate-data',[ProductController::class,'pagination']);
Route::get('/search-product',[ProductController::class,'searchProduct'])->name('search.product');
//end

//Category crud 
Route::get('dashboard/product-category', [CategoryController::class, 'productCategory'])->name('category');
Route::post('/add-category',[CategoryController::class,'addCategory'])->name('add.category');
Route::post('/update-category',[CategoryController::class,'updateCategory'])->name('update.category');
Route::post('/delete-category',[CategoryController::class,'deleteCategory'])->name('delete.category');
Route::get('/pagination/paginate-data',[CategoryController::class,'pagination']);
Route::get('/search-category',[CategoryController::class,'searchCategory'])->name('search.category');
//end
//Admin Dashboard work end
