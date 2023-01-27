<?php
           
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
            
use App\Models\ProductBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

          
class BrandController extends Controller
{
    //Brand view
   public function productBrand()
   {    
        $brand = ProductBrand::latest()->paginate(5);
        return view('admin.ProductBrand.productBrand',compact('brand'));
   }
   

       //add Brand
   public function addBrand(Request $request){

 

        $imageName = '';
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('image/brand',$imageName);
        }

        ProductBrand::create([
            'brand_name' => $request->brand_name,
            'brand_slug' => $request->brand_slug,
            'brand_description' => $request->brand_description,
            'brand_image' => $imageName,
        ]);
       
        return response()->json([
            'status' => 'success',
        ]);

        
   }



   //update brand
   public function updateBrand(Request $request){



    //get the brand and image file
    $brand = ProductBrand::find($request->up_brand_id);
    $image = $request->file('up_brand_image');
    $new_image = $brand->brand_image;
    // check if image file exists
    if ($image) {
        //delete old image from folder
        if(file_exists(public_path('image/brand/' . $brand->brand_image))) {
            unlink(public_path('image/brand/' . $brand->brand_image));
        }
        //upload new image to folder
        $new_image = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('image/brand'), $new_image);
    }

    //update brand with new image name
    $brand->update([
        'brand_name' => $request->brand_name,
        'brand_slug' => $request->brand_slug,
        'brand_description' => $request->brand_description,
        'brand_image' => $new_image,
    ]);

    return response()->json([
        'status' => 'success',
    ]);
}


    //delete brand
    public function deleteBrand(Request $request){

    $id = $request->brand_id;
    $brand = ProductBrand::find($id);
    $deleteOldImage = public_path('image/brand/'.$brand->brand_image); //corrected path
    if(file_exists(public_path('image/brand/' . $brand->brand_image))) {
        unlink(public_path('image/brand/' . $brand->brand_image));
    }
    $brand->delete();



    return response()->json([
        'status' => 'success',
    ]);

}


    //pagination page
   public function pagination(Request $request){

    $brand = ProductBrand::latest()->paginate(5);
    return view('admin.ProductBrand.pagination_brand',compact('brand'))->render();

   }

    //search brand
   public function searchBrand(Request $request){

    $brand = ProductBrand::where('brand_name', 'like', '%'.$request->search_string.'%')
    ->orderBy('id','desc')
    ->paginate(5);

    if($brand->count() >= 1){
        return view('admin.ProductBrand.pagination_brand',compact('brand'))->render();
    }else{
        return response()->json([
            'status' => 'nothing_found',

        ]);
    }

   }


}