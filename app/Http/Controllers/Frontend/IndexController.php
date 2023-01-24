<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


class IndexController extends Controller
{   
    //login view
    public function index()
    {
       
        $products = Product::all();
        return view('frontend.index')->with(compact('products'));
    }  
      
   
}