<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


class ProductDetailController extends Controller
{   
    //login view
    public function ProductDetail($product_slug)
    {
        $product = Product::where('product_slug', $product_slug)->first();
        return view('frontend.product-detail')->with(compact('product'));
    }  
      
   
}