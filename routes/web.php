<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;

//frontend controller
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ProductDetailController;
use App\Http\Controllers\Frontend\CategoriesController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/




Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
   
        //index
        Route::get('/',[IndexController::class,'index'])->name('index');
        //end


        //cart page code
        Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
        Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
        Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
        Route::patch('/cart/{id}', 'App\Http\Controllers\Frontend\CartController@updateCart');
        //end

        //checkout page code
        Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
        Route::post('place-order', [CheckoutController::class, 'placeOrder'])->name('order.add'); 
        //end



        //frontend work

        //product detail
        Route::get('product-detail/{product_slug}', [ProductDetailController::class,'ProductDetail'])->name('product.detail');
        //end

        //Category
        Route::get('category', [CategoriesController::class,'index'])->name('category.index');
        //end

       //category detail
        Route::get('category/{category_slug}', [CategoriesController::class,'CategoryDetail'])->name('category.detail');
        //end


        //frontend work end

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
        Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom'); 


        /**
         * Login Routes
         */
        Route::get('login', [AuthController::class, 'index'])->name('login');
        Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
       

//Admin Dashboard work
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('dashboard/setting', [SettingController::class,'index'])->name('dashboard.setting');
Route::post('/update-setting',[SettingController::class,'updateSetting'])->name('update.setting');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
//end

//Product crud 
Route::get('dashboard/product', [ProductController::class, 'products'])->name('products');
Route::post('/add-product',[ProductController::class,'addProduct'])->name('add.product');
Route::post('/update-product',[ProductController::class,'updateProduct'])->name('update.product');
Route::post('/delete-product',[ProductController::class,'deleteProduct'])->name('delete.product');
Route::get('/pagination/paginate-data',[ProductController::class,'pagination']);
Route::get('/search-product',[ProductController::class,'searchProduct'])->name('search.product');
Route::post('/featured-product',[ProductController::class,'featuredProduct'])->name('featured.product');
Route::post('/sale-product',[ProductController::class,'saleProduct'])->name('sale.product');
//end

//Category crud 
Route::get('dashboard/product-category', [CategoryController::class, 'productCategory'])->name('category');
Route::post('/add-category',[CategoryController::class,'addCategory'])->name('add.category');
Route::post('/update-category',[CategoryController::class,'updateCategory'])->name('update.category');
Route::post('/delete-category',[CategoryController::class,'deleteCategory'])->name('delete.category');
Route::get('/pagination/paginate-data',[CategoryController::class,'pagination']);
Route::get('/search-category',[CategoryController::class,'searchCategory'])->name('search.category');
Route::post('/featured-category',[CategoryController::class,'featuredCategory'])->name('featured.category');
//end

//Product Banner crud 
Route::get('dashboard/product-banner', [BannerController::class, 'productBanner'])->name('banner');
Route::post('/add-banner',[BannerController::class,'addBanner'])->name('add.banner');
Route::post('/update-banner',[BannerController::class,'updateBanner'])->name('update.banner');
Route::post('/delete-banner',[BannerController::class,'deleteBanner'])->name('delete.banner');
Route::get('/pagination/paginate-data',[BannerController::class,'pagination']);
Route::get('/search-banner',[BannerController::class,'searchBanner'])->name('search.banner');
//end

//Product Brand crud 
Route::get('dashboard/product-brand', [BrandController::class, 'productBrand'])->name('brand');
Route::post('/add-brand',[BrandController::class,'addBrand'])->name('add.brand');
Route::post('/update-brand',[BrandController::class,'updateBrand'])->name('update.brand');
Route::post('/delete-brand',[BrandController::class,'deleteBrand'])->name('delete.brand');
Route::get('/pagination/paginate-data',[BrandController::class,'pagination']);
Route::get('/search-brand',[BrandController::class,'searchBrand'])->name('search.brand');
//end


//Admin Dashboard work end

    });
});