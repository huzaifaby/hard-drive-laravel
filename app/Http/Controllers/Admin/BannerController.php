<?php
           
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
            
use App\Models\ProductBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

          
class BannerController extends Controller
{
    //banner view
   public function productBanner()
   {    
        $banner = ProductBanner::latest()->paginate(5);
        return view('admin.ProductBanner.productBanner',compact('banner'));
   }
   

       //add banner
   public function addBanner(Request $request){

 

        $imageName = '';
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('image/banner',$imageName);
        }

        ProductBanner::create([
            'banner_name' => $request->banner_name,
            'banner_slug' => $request->banner_slug,
            'banner_description' => $request->banner_description,
            'banner_image' => $imageName,
        ]);
       
        return response()->json([
            'status' => 'success',
        ]);

        
   }



   //update banner
   public function updateBanner(Request $request){



    //get the banner and image file
    $banner = ProductBanner::find($request->up_banner_id);
    $image = $request->file('up_banner_image');
    $new_image = $banner->banner_image;
    // check if image file exists
    if ($image) {
        //delete old image from folder
        if(file_exists(public_path('image/banner/' . $banner->banner_image))) {
            unlink(public_path('image/banner/' . $banner->banner_image));
        }
        //upload new image to folder
        $new_image = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('image/banner'), $new_image);
    }

    //update banner with new image name
    $banner->update([
        'banner_name' => $request->up_banner_name,
        'banner_slug' => $request->up_banner_slug,
        'banner_description' => $request->up_banner_description,
        'banner_image' => $new_image,
    ]);

    return response()->json([
        'status' => 'success',
    ]);
}


    //delete banner
    public function deleteBanner(Request $request){

    $id = $request->banner_id;
    $banner = ProductBanner::find($id);
    $deleteOldImage = public_path('image/banner/'.$banner->banner_image); //corrected path
    if(file_exists(public_path('image/banner/' . $banner->banner_image))) {
        unlink(public_path('image/banner/' . $banner->banner_image));
    }
    $banner->delete();



    return response()->json([
        'status' => 'success',
    ]);

}


    //pagination page
   public function pagination(Request $request){

    $banner = ProductBanner::latest()->paginate(5);
    return view('admin.ProductBanner.pagination_banner',compact('banner'))->render();

   }

    //search banner
   public function searchBanner(Request $request){

    $banner = ProductBanner::where('banner_name', 'like', '%'.$request->search_string.'%')
    ->orderBy('id','desc')
    ->paginate(5);

    if($banner->count() >= 1){
        return view('admin.ProductBanner.pagination_banner',compact('banner'))->render();
    }else{
        return response()->json([
            'status' => 'nothing_found',

        ]);
    }

   }


}