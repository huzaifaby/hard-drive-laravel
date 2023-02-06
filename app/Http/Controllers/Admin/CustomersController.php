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

          
class CustomersController extends Controller
{
    //CustomersController view
   public function customers()
   {    

        $customers = Customers::latest()->paginate(5);
        return view('admin.Customers.customers')->with(compact('customers'));
   }

   public function CustomersEdit($id)
   {
      $customers = Customers::where('id', $id)->first();

       return view('admin.Customers.update_customers')->with(compact('customers'));
   }  
   

      

   //update Customers
public function updateCustomers(Request $request){

    $customers = Customers::find($request->up_id);

    $image = $request->file('customer_image');
    $new_image = $customers->customer_image;

    if ($image) {
    //delete old image from folder
    if(file_exists(public_path('image/customer/' . $customers->customer_image))) {
        unlink(public_path('image/customer/' . $customers->customer_image));
    }

    //upload new image to folder
    $new_image = time().'.'.$image->getClientOriginalExtension();
    $image->move(public_path('image/customer'), $new_image);

    }


    $customers->update([
        'customer_image' => $new_image,
        'full_name'=>$request->full_name,
        'phone_no'=>$request->phone_no,
        'email' => $request->email,
        'address' => $request->address,
        'country' => $request->country,
        'city' => $request->city,
        'zip_code' => $request->zip_code,
        'fax_no' => $request->fax_no,
    ]);

    return redirect()->route('customers');
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