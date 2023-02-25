<?php
           
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Orders;
use App\Models\OrderProducts;
use App\Models\BillingDetails;
use App\Models\ProductCategory;
use App\Models\ProductBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\ShippingDetails;
use App\Models\product_reviews;

          
class ReviewsController extends Controller
{
    //ReviewsController view
   public function reviews()
   {    
        $product_reviews = product_reviews::latest()->paginate(5);
        return view('admin.Reviews.reviews')->with(compact('product_reviews'));
   }
   //end

    //edit
   public function ReviewsEdit($id)
   {
      $product_reviews = product_reviews::where('id', $id)->first();

      $product = Product::leftjoin('product_reviews', 'product_reviews.product_id', '=', 'products.id')->where('product_reviews.id', $id)->first();

      $all_product = Product::all();

       return view('admin.Reviews.update_reviews')->with(compact('product_reviews'))->
       with(compact('product'))->with(compact('all_product'));
   }  
   //end
   

      

   //update reviews
public function updateReviews(Request $request){

    $product_reviews = product_reviews::find($request->up_id);

   
    $product_reviews->update([
        'product_id'=>$request->product_id,
        'user_name'=>$request->user_name,
        'user_email' => $request->user_email,
        'review_description' => $request->review_description,
        'review_stars' => $request->review_stars,
      
    ]);

    return redirect()->route('reviews');
    }
    //end


    //delete reviews
    public function deleteReviews(Request $request){

    $id = $request->review_id;
    $product_reviews = product_reviews::find($id);
    $product_reviews->delete();

    return response()->json([
        'status' => 'success',
    ]);

    }
    //end


    //pagination page
   public function pagination(Request $request){

    $product_reviews = product_reviews::latest()->paginate(5);
    return view('admin.Reviews.pagination_reviews',compact('product_reviews'))->render();
   }
   //end

    //search reviews
   public function searchReviews(Request $request){

    $product_reviews = product_reviews::latest()->where('user_name', 'like', '%'.$request->search_string.'%')->
    paginate(5);

    if($product_reviews->count() >= 1){
        return view('admin.Reviews.pagination_reviews',compact('product_reviews'))->render();
    }else{
        return response()->json([
            'status' => 'nothing_found',

        ]);
    }
   }
   //end


}