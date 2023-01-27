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


class CategoriesController extends Controller
{   

    public function index()
    {
        $all_categories = ProductCategory::all();
        return view('frontend.category')->with(compact('all_categories'));
    }  


    public function CategoryDetail($category_slug)
    {
        $categoriess = ProductCategory::where('category_slug', $category_slug)->first();

        $products_by_category = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
        ->where('product_categories.category_slug', $category_slug)->get();
        return view('frontend.category-detail')->with(compact('products_by_category'));
    }  
        
   
}

