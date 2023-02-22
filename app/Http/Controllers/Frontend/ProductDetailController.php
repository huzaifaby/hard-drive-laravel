<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\product_reviews;


class ProductDetailController extends Controller
{   
    //login view
    public function ProductDetail($product_slug)
    {
        $product = Product::where('product_slug', $product_slug)->first();

        $related_products = Product::join('product_categories', 'product_categories.id', '=', 'products.category_id')->
        where('products.product_slug', $product_slug)->get();
 
        $reviews = product_reviews::join('products', 'products.id', '=', 'product_reviews.product_id')->
        where('products.product_slug', $product_slug)->get();
 
        $product_brand = Product::join('product_brands', 'product_brands.id', '=', 'products.brand_id')->
        where('products.product_slug', $product_slug)->first();
        return view('frontend.product-detail')->with(compact('product'))->with(compact('product_brand'))
        ->with(compact('related_products'))->with(compact('reviews'));
    }  

    public function starRating(Request $request)
    {
        $product_reviews = product_reviews::create([
            'product_id' => $request->product_id,
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'review_description' => $request->review_description,
            'review_stars' => $request->rating,
        ]);

        return response()->json([
            'message' => 'Star rating saved successfully',
        ], 201);
    }
      
   
}