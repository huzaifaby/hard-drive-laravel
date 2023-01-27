<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Settings;



class SettingController extends Controller
{   
    //login view
    public function setting()
    {
        
        $settings = Settings::all();
        
        return view('frontend.header')->with(compact('settings'));
    }  

    
      
   
}

