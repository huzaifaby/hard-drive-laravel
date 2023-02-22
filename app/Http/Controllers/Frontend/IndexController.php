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
        $Networking = Product::join('product_categories', 'product_categories.id', '=', 'products.category_id')->where('product_categories.category_name', 'Networking Devices')->get();
        $power_supply_unit = Product::join('product_categories', 'product_categories.id', '=', 'products.category_id')->where('product_categories.category_name', 'Power Supply & others')->get();
        $memory = Product::join('product_categories', 'product_categories.id', '=', 'products.category_id')->where('product_categories.category_name', 'Memory')->get();
        $desktop_motherboard = Product::join('product_categories', 'product_categories.id', '=', 'products.category_id')->where('product_categories.category_name', 'Desktop & Server Motherboards')->get();
        $banners = ProductBanner::all();
        $brands = ProductBrand::all();
 
        
        return view('frontend.index')->with(compact('latest_products'))->
        with(compact('sale_products'))->with(compact('featured_products'))
        ->with(compact('featured_categories'))->with(compact('Networking'))
        ->with(compact('power_supply_unit'))->with(compact('memory'))->with(compact('desktop_motherboard'))
        ->with(compact('banners'))->with(compact('brands'));

    }  

   
 

    public function showGuest()
    {
        return view('frontend.guest');
    }



    public function autocompleteSearch(Request $request)
    {
        $query = $request->input('query');
        $data = Product::where('product_title', 'LIKE', '%'. $query. '%')->get();
        return response()->json($data);
    } 

    public function search(Request $request)
    {

 
        if($request->input('search')){
        $search = $request->input('search');
        $data = Product::where('product_title', 'LIKE', '%'. $search. '%')->get();
        } else {
        $searchPrice = $request->input('price');
        $data = Product::whereBetween('product_price', [0, $searchPrice])->get();
        }

        return view('frontend.search')->with(compact('data'));

    }





 

    

}

