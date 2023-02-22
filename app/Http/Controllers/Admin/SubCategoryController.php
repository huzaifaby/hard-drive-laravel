<?php
           
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

          
class SubCategoryController extends Controller
{
    //sub category view
   public function subCategory()
   {    $sub_category = SubCategory::select('sub_categories.id as subcategory_id', 'sub_categories.*', 'product_categories.*')->
        join('product_categories', 'product_categories.id', '=', 'sub_categories.category_id')->
        paginate(5);  

        $products_category = ProductCategory::all();
        return view('admin.SubCategory.subCategory')->with(compact('sub_category'))->
        with(compact('products_category'));
   }
   

       //add category
   public function addsubcategory(Request $request){

    $request->validate(
        [
            'sub_category_name' => 'required|unique:category',
            'sub_category_slug' => 'required|unique:slug',
        ],
        [
            'sub_category_name.required' => 'Sub Category Name is Required',
            'sub_category_name.unique' => 'Sub category is Already Exists',
            'sub_category_slug.required' => 'Slug is Required',

        ]
        );

        $imageName = '';
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('image/sub_category',$imageName);
        }

        SubCategory::create([
            'category_id' => $request->category_id,
            'sub_category_name' => $request->sub_category_name,
            'sub_category_slug' => $request->sub_category_slug,
            'sub_category_image' => $imageName,
        ]);
       
        return response()->json([
            'status' => 'success',
        ]);

        
   }



   //update category
   public function updatesubcategory(Request $request){

    $request->validate(
        [
            'up_sub_category_name' => 'required|unique:category,name,'.$request->up_category_id,
            'up_sub_category_slug' => 'required',
        ],
        [
            'up_sub_category_name.required' => 'sub category is Required',
            'up_sub_category_name.unique' => 'sub category is Already Exists',
            'up_sub_category_slug.required' => 'Slug is Required',
        ]
    );

    //get the sub category and image file
    $sub_category = SubCategory::find($request->up_category_id);
    $image = $request->file('up_sub_category_image');
    $new_image = $sub_category->sub_category_image;
    // check if image file exists
    if ($image) {
        //delete old image from folder
        if(file_exists(public_path('image/sub_category/' . $sub_category->sub_category_image))) {
            unlink(public_path('image/sub_category/' . $sub_category->sub_category_image));
        }
        //upload new image to folder
        $new_image = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('image/sub_category'), $new_image);
    }

    //update category with new image name
    $sub_category->update([
        'category_id' => $request->up_category_id,
        'sub_category_name' => $request->up_sub_category_name,
        'sub_category_slug' => $request->up_sub_category_slug,
        'sub_category_image' => $new_image,
    ]);

    return response()->json([
        'status' => 'success',
    ]);
}





    //delete category
    public function deletesubcategory(Request $request){

    $id = $request->category_id;
    $sub_category = SubCategory::find($id);
    $deleteOldImage = public_path('image/sub_category/'.$sub_category->sub_category_image); //corrected path
    if(file_exists(public_path('image/sub_category/' . $sub_category->sub_category_image))) {
        unlink(public_path('image/sub_category/' . $sub_category->sub_category_image));
    }
    $sub_category->delete();



    return response()->json([
        'status' => 'success',
    ]);

}


    //pagination page
   public function pagination(Request $request){

    $sub_category = SubCategory::select('sub_categories.id as subcategory_id', 'sub_categories.*', 'product_categories.*')->
    join('product_categories', 'product_categories.id', '=', 'sub_categories.category_id')->
    paginate(5); 
    return view('admin.SubCategory.pagination_sub_category',compact('sub_category'))->render();

   }

    //search sub category
   public function searchsubcategory(Request $request){

    $sub_category = SubCategory::join('product_categories', 'product_categories.id', '=', 'sub_categories.category_id')->
    where('sub_categories.sub_category_name', 'like', '%'.$request->search_string.'%')
    ->orderBy('sub_categories.id','desc')
    ->paginate(5);

    if($sub_category->count() >= 1){
        return view('admin.SubCategory.pagination_subcategory',compact('sub_category'))->render();
    }else{
        return response()->json([
            'status' => 'nothing_found',

        ]);
    }

   }


}