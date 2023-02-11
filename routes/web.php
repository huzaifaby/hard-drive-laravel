<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;

//frontend controller
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ProductDetailController;
use App\Http\Controllers\Frontend\CategoriesController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Frontend\UserDashboardController;

use App\Http\Controllers\StripePaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/




Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
   
        //index
        Route::get('/',[IndexController::class,'index'])->name('index');

        Route::get('/autocomplete-search',[IndexController::class,'autocompleteSearch']);

        Route::get('/search', [IndexController::class,'search']);

        //end


        //cart page code
        Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
        Route::get('/load-cart-data',[CartController::class, 'loadcart']);
        Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
        Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
        Route::post('/update-cart/{id}', [CartController::class, 'updateCart'])->name('updateCart');

        Route::post('/cart/coupon', [CheckoutController::class, 'validateCoupon'])->name('apply.coupon');

        //end

        //checkout page code
        Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
        Route::post('place-order', [CheckoutController::class, 'placeOrder'])->name('order.add'); 
        Route::post('api/fetch-states', [CheckoutController::class, 'fetchState']);
        Route::post('api/fetch-cities', [CheckoutController::class, 'fetchCity']);
        //end


        //frontend work

        //product detail
        Route::get('product-detail/{product_slug}', [ProductDetailController::class,'ProductDetail'])->name('product.detail');
        //end

        //start rating
        Route::post('/star-ratings', [ProductDetailController::class,'starRating']);
        //end

        //Category
        Route::get('category', [CategoriesController::class,'index'])->name('category.index');
        //end

       //category detail
        Route::get('category/{category_slug}', [CategoriesController::class,'CategoryDetail'])->name('category.detail');
        //end




        //frontend work end

    Route::group(['middleware' => ['guest']], function() {

       // for admin dashboard
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
        //end



        //for frontend
        // Customer Login Routes
        // Route::get('guest', [IndexController::class, 'showGuest'])->name('guest.show');

        Route::get('user/login', [CustomerAuthController::class, 'showAccount'])->name('account.show');
        Route::post('customer/login', [CustomerAuthController::class, 'login'])->name('customer.login');

        // Customer Register Routes
        Route::post('/customer/register', [CustomerAuthController::class, 'register'])->name('customer.register');
        // end

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
Route::get('productexportData',[ExportController::class,'productexportData'])->name('product.export');
Route::get('dashboard/productCSV',[ImportController::class,'productcsv'])->name('product.csv');
Route::post('/import-productcsv',[ImportController::class,'importproductCsvToDb'])->name('import.productcsv');
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

//Sub Category crud 
Route::get('dashboard/product-subcategory', [SubCategoryController::class, 'SubCategory'])->name('subcategory');
Route::post('/add-subcategory',[SubCategoryController::class,'addSubCategory'])->name('add.subcategory');
Route::post('/update-subcategory',[SubCategoryController::class,'updateSubCategory'])->name('update.subcategory');
Route::post('/delete-subcategory',[SubCategoryController::class,'deleteSubCategory'])->name('delete.subcategory');
Route::get('/pagination/paginate-subdata',[SubCategoryController::class,'pagination']);
Route::get('/search-subcategory',[SubCategoryController::class,'searchSubCategory'])->name('search.subcategory');
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


//Orders crud
Route::get('dashboard/orders', [OrdersController::class, 'orders'])->name('orders');
Route::get('dashboard/edit-orders/{id}', [OrdersController::class,'OrdersEdit'])->name('orders.edit');
Route::post('/update-orders',[OrdersController::class,'updateOrders'])->name('update.orders');
Route::post('/delete-orders',[OrdersController::class,'deleteOrders'])->name('delete.orders');
Route::get('/pagination/paginate-data',[OrdersController::class,'pagination']);
Route::get('/search-orders',[OrdersController::class,'searchOrders'])->name('search.orders');
Route::post('/order-status',[OrdersController::class,'orderStatus'])->name('orders.status');
Route::get('orderexportData',[ExportController::class,'productexportData'])->name('orders.export');
Route::get('dashboard/orderCSV',[ImportController::class,'ordercsv'])->name('orders.csv');
Route::post('/import-ordercsv',[ImportController::class,'importorderCsvToDb'])->name('import.ordercsv');
Route::get('/load-orders-data',[OrdersController::class, 'loadordersCount']);
Route::get('/status', [OrdersController::class,'orderFilter']);
Route::get('/order-products/{id}',[OrdersController::class,'showOrderProducts'])->name('order-products.show');

//end

//customers crud 
Route::get('dashboard/customers', [CustomersController::class, 'customers'])->name('customers');
Route::get('dashboard/edit-customers/{id}', [CustomersController::class,'CustomersEdit'])->name('customers.edit');
Route::post('/update-customers',[CustomersController::class,'updateCustomers'])->name('update.customers');
Route::post('/delete-customers',[CustomersController::class,'deleteCustomers'])->name('delete.customers');
Route::get('/pagination/paginate-data',[CustomersController::class,'pagination']);
Route::get('/search-customers',[CustomersController::class,'searchCustomers'])->name('search.customers');
//end

//Coupon crud 
Route::get('dashboard/coupon', [CouponController::class, 'coupon'])->name('coupon');
Route::get('dashboard/add-coupon', [CouponController::class,'CustomersAdd'])->name('coupon.add');
Route::post('/save-coupon',[CouponController::class,'saveCoupon'])->name('save.coupon');
Route::get('dashboard/edit-coupon/{id}', [CouponController::class,'CouponEdit'])->name('coupon.edit');
Route::post('/update-coupon',[CouponController::class,'updateCoupon'])->name('update.coupon');
Route::post('/delete-coupon',[CouponController::class,'deleteCoupon'])->name('delete.coupon');
Route::get('/pagination/paginate-data',[CouponController::class,'pagination']);
Route::get('/search-coupon',[CouponController::class,'searchCoupon'])->name('search.coupon');
//end


//Admin Dashboard work end

    });


    Route::group(['middleware' => ['auth.customer']], function() {
    Route::get('user/dashboard', [UserDashboardController::class, 'index'])->name('customer.dashboard');
    Route::get('user/orders', [UserDashboardController::class, 'customerOrders'])->name('customer.orders');
    Route::get('user/profile', [UserDashboardController::class, 'customerProfile'])->name('customer.profile');
    Route::post('update-profile', [UserDashboardController::class, 'updateProfile'])->name('update.profile');
    Route::get('user/reset', [UserDashboardController::class, 'customerReset'])->name('customer.reset');
    Route::post('reset-password', [UserDashboardController::class, 'resetPassword'])->name('reset.password');
    Route::get('user/lgout', [CustomerAuthController::class, 'logout'])->name('logout');

    });
});