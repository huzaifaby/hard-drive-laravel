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
use App\Models\SubCategory;


class CategoriesController extends Controller
{   

    public function index()
    {
        $all_categories = ProductCategory::all();
        $latest_products = Product::orderBy('id', 'desc')->get();
        return view('frontend.category')->with(compact('all_categories'))->with(compact('latest_products'));
    }  

    public function Categories()
    {
        $sub_categories = SubCategory::all();
        return view('frontend.categories', compact('sub_categories'));

    }


    public function parentCategory($parent)
    {
        $category = ProductCategory::where('category_slug', $parent)->firstOrFail();
        $products_by_category = Product::where('category_id', $category->id)->get();
    
        return view('frontend.category-detail', compact('category', 'products_by_category'));
    }

    
    public function parentSubCategory($parent, $sub)
{
    $category = ProductCategory::where('category_slug', $parent)->firstOrFail();
    $subcategory = SubCategory::where('sub_category_slug', $sub)->firstOrFail();
    $products_by_category = Product::where('category_id', $category->id)->where('sub_category_id', $subcategory->id)->get();

    return view('frontend.category-detail', compact('category', 'subcategory', 'products_by_category'));
}


        
   
}

