<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\TermsandCondition;



class TermsandConditionController extends Controller
{   
   
    public function index()
    {
        $TermsandCondition = TermsandCondition::where('id', 1)->first();
        return view('frontend.terms-and-condition')->with(compact('TermsandCondition'));

    }


   
}

