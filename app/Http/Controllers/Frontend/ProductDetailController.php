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

        $related_products = Product::join('product_categories', 'product_categories.id', '=', 'products.category_id')->
        where('products.product_slug', $product_slug)->get();
 

        $product_brand = Product::join('product_brands', 'product_brands.id', '=', 'products.brand_id')->
        where('products.product_slug', $product_slug)->first();
        return view('frontend.product-detail')->with(compact('product'))->with(compact('product_brand'))
        ->with(compact('related_products'));
    }  
      
   
}