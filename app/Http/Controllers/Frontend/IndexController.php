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


class IndexController extends Controller
{   
    //login view
    public function index()
    {
        
        $latest_products = Product::orderBy('id', 'desc')->get();
        $sale_products = Product::where('is_sale', 1)->get();
        $featured_products = Product::where('is_featured', 1)->get();
        $featured_categories = ProductCategory::where('category_is_featured', 1)->take(4)->get();
        $Networking = Product::where('category_id', 1)->get();
        $power_supply_unit = Product::where('category_id', 3)->get();
        $memory = Product::where('category_id', 2)->get();
        $desktop_motherboard = Product::where('category_id', 4)->get();
        $banners = ProductBanner::all();
        $brands = ProductBrand::all();
 
        
        return view('frontend.index')->with(compact('latest_products'))->
        with(compact('sale_products'))->with(compact('featured_products'))
        ->with(compact('featured_categories'))->with(compact('Networking'))
        ->with(compact('power_supply_unit'))->with(compact('memory'))->with(compact('desktop_motherboard'))
        ->with(compact('banners'))->with(compact('brands'));

    }  

   


    

}
