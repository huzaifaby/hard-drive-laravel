<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductBanner;
use App\Models\ProductBrand;
use App\Models\Settings;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\wishlists;


class UserDashboardController extends Controller
{   
   
    public function index()
    {
        $user_id = Auth::guard('customer')->user()->id;
        $recent_orders = Orders::join('customers', 'customers.id', '=', 'Orders.user_id')->where('orders.user_id', $user_id)->get();
       
 
        return view('frontend.user-dashboard')->with(compact('recent_orders'));

    }


    
    public function customerOrders()
    {
        $user_id = Auth::guard('customer')->user()->id;
        $orders = Orders::join('customers', 'customers.id', '=', 'Orders.user_id')->where('orders.user_id', $user_id)->get();
       
 
        return view('frontend.orders')->with(compact('orders'));

    }

        
    public function customerProfile()
    {
        $user_id = Auth::guard('customer')->user()->id;
        $profile = Orders::join('customers', 'customers.id', '=', 'Orders.user_id')->where('orders.user_id', $user_id)->first();
       
        return view('frontend.profile')->with(compact('profile'));

    }


    //update customer profile
     public function updateProfile(Request $request){

            //get the id
            $id = $request->id;
            $customers = Customers::find($id);

            $image = $request->file('customer_image');
            $new_image = $customers->customer_image;

           
        
            if ($customers->customer_image == null) {

                $new_image = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('image/customer'), $new_image);

            }elseif($image && $customers->customer_image != null){
            //delete old image from folder
            if(file_exists(public_path('image/customer/' . $customers->customer_image))) {
                unlink(public_path('image/customer/' . $customers->customer_image));
            }
            //upload new image to folder
            $new_image = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('image/customer'), $new_image);
        }

            $customers->update([
                'full_name'=>$request->full_name,
                'email'=>$request->email,
                'phone_no'=>$request->phone_no,
                'address'=>$request->address,
                'city'=>$request->city,
                'country'=>$request->country,
                'zip_code'=>$request->zip_code,
                'fax_no'=>$request->fax_no,
                'customer_image'=>$new_image,

            ]);

            return redirect("user/profile")->withSuccess('Updated Successfully');

           
        }


        public function customerReset()
        {
            $user_id = Auth::guard('customer')->user()->id;
           
            return view('frontend.reset')->with(compact('user_id'));
    
        }
 


        public function resetPassword(Request $request){
            $id = $request->id;
            $customers = Customers::find($id);
          
            if (!Hash::check($request->current_password, $customers->password)) {
              return redirect()->back()->withInput($request->only('current_password'))->with('errors', 'Current password Does not match.');
            }
          
            $customers->update([
              'password' => Hash::make($request->input('new_password')),
            ]);
          
            return redirect("user/reset")->withSuccess('Updated Successfully');
          }




          public function Wishlist()
          {
        
            $user_id = Auth::guard('customer')->user()->id;
            $wishlist_products = wishlists::select('wishlists.id as wishlists_id', 'wishlists.*', 'products.*','customers.*')
            ->join('customers', 'customers.id', '=', 'wishlists.user_id')->
            join('products', 'products.id', '=', 'wishlists.product_id')
            ->where('wishlists.user_id', $user_id)->get();
           
     
            return view('frontend.wishlist')->with(compact('wishlist_products'));
      
          }

        //delete Customers
        public function deleteWishlist(Request $request){

            $id = $request->id;
            $wishlists = wishlists::find($id);
            $wishlists->delete();
        
            return response()->json([
                'status' => 'success',
            ]);
        
            }
            //end

    

}

