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
use App\Models\Customers;
use App\Models\Coupon;

          
class CouponController extends Controller
{
    //CustomersController view
   public function coupon()
   {    

        $coupons = Coupon::latest()->paginate(5);
        $products = Product::all();
        return view('admin.Coupon.coupon')->with(compact('coupons'));
   }

   public function CustomersAdd()
   {
       $products = Product::all();

       return view('admin.Coupon.add_coupon')->with(compact('products'));
   }  

   //add product
   public function saveCoupon(Request $request){

         Coupon::create([
          'coupon_code'=>$request->coupon_code,
          'discount_type'=>$request->discount_type,
          'coupon_amount'=>$request->coupon_amount,
          'product_id' => $request->product_id,
          'coupon_expiry_date' => $request->coupon_expiry_date,
          'coupon_status' => $request->coupon_status,
          'minimum_spend' => $request->minimum_spend,
          'maximum_spend' => $request->maximum_spend,
         ]);

         return redirect()->route('coupon');

           }

   public function CouponEdit($id)
   {
      $coupon = Coupon::select('coupons.id as coupons_id', 'coupons.*', 'products.*')->
      join('products', 'products.id', '=', 'coupons.product_id')->where('coupons.id', $id)->first();
      $products = Product::all();


       return view('admin.Coupon.update_coupon')->with(compact('coupon'))->with(compact('products'));
   }  
   

      

   //update Customers
public function updateCoupon(Request $request){

    $coupon = Coupon::find($request->up_id);

    $coupon->update([
        'coupon_code'=>$request->coupon_code,
        'discount_type'=>$request->discount_type,
        'coupon_amount'=>$request->coupon_amount,
        'product_id' => $request->product_id,
        'coupon_expiry_date' => $request->coupon_expiry_date,
        'coupon_status' => $request->coupon_status,
        'minimum_spend' => $request->minimum_spend,
        'maximum_spend' => $request->maximum_spend,
    ]);

    return redirect()->route('coupon');
}


    //delete Customers
    public function deleteCustomers(Request $request){

    $id = $request->product_id;
    $customers = Customers::find($id);
    $customers->delete();

    return response()->json([
        'status' => 'success',
    ]);

}


    //pagination page
   public function pagination(Request $request){

    $customers = Customers::latest()->paginate(5);
  
    return view('admin.Customers.pagination_customers',compact('customers'))->render();

   }

    //search customers
   public function searchCustomers(Request $request){

    $customers = Customers::latest()->paginate(5);


    if($customers->count() >= 1){
        return view('admin.Customers.pagination_customers',compact('customers'))->render();
    }else{
        return response()->json([
            'status' => 'nothing_found',

        ]);
    }

   }


}