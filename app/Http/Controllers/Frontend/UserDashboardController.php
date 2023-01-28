<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductBanner;
use App\Models\ProductBrand;
use App\Models\Settings;
use App\Models\Customers;
use App\Models\Orders;


class UserDashboardController extends Controller
{   
   
    public function index()
    {
        $user_id = Auth::guard('customer')->user()->id;
        $recent_orders = Orders::join('customers', 'customers.id', '=', 'Orders.user_id')->where('orders.user_id', $user_id)->get();
       
 
        return view('frontend.user-dashboard')->with(compact('recent_orders'));

    }


    
    public function customerOrders()
    {
        $user_id = Auth::guard('customer')->user()->id;
        $orders = Orders::join('customers', 'customers.id', '=', 'Orders.user_id')->where('orders.user_id', $user_id)->get();
       
 
        return view('frontend.orders')->with(compact('orders'));

    }

        
    public function customerProfile()
    {
        $user_id = Auth::guard('customer')->user()->id;
        $profile = Orders::join('customers', 'customers.id', '=', 'Orders.user_id')->where('orders.user_id', $user_id)->get();
       
 
        return view('frontend.profile')->with(compact('profile'));

    }
 

    

}

