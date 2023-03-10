<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\PrivacyPolicy;
use App\Models\TermsandCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    //index
    public function index()
    {
        $setting = Settings::where('id', 1)->first();
        return view('admin.setting')->with(compact('setting'));
    }  
     //end


       
   //update settings
    public function updateSetting(Request $request){

    //get the settings and image file
    $settings = Settings::find($request->up_id);
    $image = $request->file('logo');
    $new_image = $settings->logo;

    if ($image) {
    //delete old image from folder
    if(file_exists(public_path('image/logo/' . $settings->logo))) {
        unlink(public_path('image/logo/' . $settings->logo));
    }

    //upload new image to folder
    $new_image = time().'.'.$image->getClientOriginalExtension();
    $image->move(public_path('image/logo'), $new_image);

    }

    //update settings with new image name
    $settings->update([
        'logo' => $new_image,
        'phone_no_1'=>$request->phone_no_1,
        'phone_no_2'=>$request->phone_no_2,
        'Address' => $request->address,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,
        'email' => $request->email,
        'footer_description' => $request->footer_description,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'instagram' => $request->instagram,
        'linkedin' => $request->linkedin,

    ]);

    return response()->json([
        'status' => 'success',
    ]);
    }
 //end


  //privacyPolicy
  public function privacyPolicy()
  {
      $PrivacyPolicy = PrivacyPolicy::where('id', 1)->first();
      return view('admin.privacypolicy')->with(compact('PrivacyPolicy'));
  }  
   //end


   //update privacyPolicy
   public function updatePrivacyPolicy(Request $request){

    $PrivacyPolicy = PrivacyPolicy::find($request->up_id);
   

    $PrivacyPolicy->update([
       
        'title' => $request->title,
        'description' => $request->privacypolicy_description,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,

    ]);

    return response()->json([
        'status' => 'success',
    ]);
    }
 //end



  //privacyPolicy
  public function termsandCondition()
  {
      $TermsandCondition = TermsandCondition::where('id', 1)->first();
      return view('admin.termsandcondition')->with(compact('TermsandCondition'));
  }  
   //end


   //update privacyPolicy
   public function updateTermsandCondition(Request $request){

    $TermsandCondition = TermsandCondition::find($request->up_id);
   

    $TermsandCondition->update([
       
        'title' => $request->title,
        'description' => $request->termsandcondition_description,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,

    ]);

    return response()->json([
        'status' => 'success',
    ]);
    }
 //end


}


