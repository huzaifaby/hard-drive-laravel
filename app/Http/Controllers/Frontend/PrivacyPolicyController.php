<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\PrivacyPolicy;



class PrivacyPolicyController extends Controller
{   
   
    public function index()
    {
        $PrivacyPolicy = PrivacyPolicy::where('id', 1)->first();
        return view('frontend.privacy-policy')->with(compact('PrivacyPolicy'));

    }


   
}

