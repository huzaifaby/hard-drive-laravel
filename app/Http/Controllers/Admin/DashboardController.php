<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Orders;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $out_of_stock = Product::where('availability', '=', 0)->count();
        $low_in_stock = Product::where('quantity', '=', 2)->count();

        $currentMonthSales = Orders::whereMonth('created_at', Carbon::now()->month)
        ->sum('total_amount');     


     return view('admin.index')->with(compact('out_of_stock'))->with(compact('low_in_stock'))
     ->with(compact('currentMonthSales'));

    }


 

}
