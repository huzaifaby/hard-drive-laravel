<?php
           
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
            
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

          
class CategoryController extends Controller
{
    //category view
   public function productCategory()
   {    
        $category = ProductCategory::latest()->paginate(5);
        return view('admin.ProductCategory.productCategory',compact('category'));
   }
   

       //add category
   public function addcategory(Request $request){

    $request->validate(
        [
            'category_name' => 'required|unique:category',
            'category_slug' => 'required|unique:slug',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ],
        [
            'category_name.required' => 'Category Name is Required',
            'category_name.unique' => 'category is Already Exists',
            'category_slug.required' => 'Slug is Required',

        ]
        );

        $imageName = '';
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('image/category',$imageName);
        }

        ProductCategory::create([
            'category_name' => $request->category_name,
            'category_slug' => $request->category_slug,
            'category_image' => $imageName,
        ]);
       
        return response()->json([
            'status' => 'success',
        ]);
   }



   //update category
public function updatecategory(Request $request){

    $request->validate(
        [
            'up_category_name' => 'required|unique:category,name,'.$request->up_id,
            'up_category_slug' => 'required',
            'up_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ],
        [
            'up_category_name.required' => 'category is Required',
            'up_category_name.unique' => 'category is Already Exists',
            'up_category_slug.required' => 'Slug is Required',
        ]
    );

    //get the category and image file
    $category = ProductCategory::find($request->up_id);
    $image = $request->file('up_image');

    //delete old image from folder
    if(file_exists(public_path('image/category/' . $category->image))) {
        unlink(public_path('image/category/' . $category->image));
    }

    //upload new image to folder
    $new_image = time().'.'.$image->getClientOriginalExtension();
    $image->move(public_path('image/category'), $new_image);

    //update category with new image name
    $category->update([
        'category_name' => $request->category_name,
        'category_slug' => $request->category_slug,
        'category_image' => $new_image,
    ]);

    return response()->json([
        'status' => 'success',
    ]);
}

    //delete category
    public function deletecategory(Request $request){

    $id = $request->category_id;
    $category = ProductCategory::find($id);
    $deleteOldImage = public_path('image/category/'.$category->image); //corrected path
    if(file_exists(public_path('image/category/' . $category->image))) {
        unlink(public_path('image/category/' . $category->image));
    }
    $category->delete();



    return response()->json([
        'status' => 'success',
    ]);

}


    //pagination page
   public function pagination(Request $request){

    $category = ProductCategory::latest()->paginate(5);
    return view('admin.ProductCategory.pagination_category',compact('productCategory'))->render();

   }

    //search category
   public function searchcategory(Request $request){

    $category = ProductCategory::where('category_name', 'like', '%'.$request->search_string.'%')
    ->orderBy('id','desc')
    ->paginate(5);

    if($category->count() >= 1){
        return view('admin.ProductCategory.pagination_category',compact('productCategory'))->render();
    }else{
        return response()->json([
            'status' => 'nothing_found',

        ]);
    }

   }


}