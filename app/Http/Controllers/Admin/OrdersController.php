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
use App\Models\{Country, State, City};
          
class OrdersController extends Controller
{
    //orders view
    public function orders(Request $request)
    {    
        $status = $request->query('status');

        $orders = Orders::select('orders.id as orders_id', 'orders.*', 'billing_details.*')
            ->join('billing_details', 'billing_details.order_id', '=', 'orders.id');
        
        if ($status) {
            $orders->where('orders.order_status', $status);
        }

        $orders = $orders->paginate(5);     

        return view('admin.Orders.orders')->with(compact('orders'));
    }
    //end

    //load
   public function loadordersCount()
   {

     $all_orders = Orders::count();
     $processing = Orders::where('order_status','Processing')->count();
     $on_hold = Orders::where('order_status','On Hold')->count();
     $completed = Orders::where('order_status','Completed')->count();
     $cancelled = Orders::where('order_status','Cancelled')->count();
     $refunded = Orders::where('order_status','Refunded')->count();
     $failed = Orders::where('order_status','Failed')->count();

     return response()->json(['all_orders'=>$all_orders,'processing'=>$processing,'on_hold'=>$on_hold,'completed'=>$completed
    ,'cancelled'=>$cancelled,'refunded'=>$refunded,'failed'=>$failed]);

   }
    //end

   //filter
   public function orderFilter(Request $request)
   {
       $search = $request->input('search');
       $data = Orders::where('product_title', 'LIKE', '%'. $search. '%')->get();
       return view('admin.Orders.orders')->with(compact('data'));
   }
    //end

    //show
   public function showOrderProducts($id)
    {
     $order_products = OrderProducts::join('orders', 'orders.id', '=', 'order_products.order_id')->
      join('products', 'products.id', '=', 'order_products.product_id')->
      where('order_products.order_id', $id)->get();     

    return response()->json($order_products);
    }
     //end



    //edit
   public function OrdersEdit($id)
   {
      $orders = Orders::join('billing_details', 'billing_details.order_id', '=', 'orders.id')->
      join('shipping_details', 'shipping_details.order_id', '=', 'orders.id')
      ->where('orders.id', $id)->first();

      
      $BillingDetails = BillingDetails::join('orders', 'orders.id', '=', 'billing_details.order_id')->
      join('countries', 'countries.id', '=', 'billing_details.country')->
      join('states', 'states.id', '=', 'billing_details.state')->
      join('cities', 'cities.id', '=', 'billing_details.city')->
      where('orders.id', $id)->first();

      $ShippingDetails = ShippingDetails::join('orders', 'orders.id', '=', 'shipping_details.order_id')->
      join('countries', 'countries.id', '=', 'shipping_details.country')->
      join('states', 'states.id', '=', 'shipping_details.state')->
      join('cities', 'cities.id', '=', 'shipping_details.city')->
      where('orders.id', $id)->first();


      $order_products = OrderProducts::join('orders', 'orders.id', '=', 'order_products.order_id')->
      join('products', 'products.id', '=', 'order_products.product_id')->
      where('order_products.order_id', $id)->get();     

      $countries = Country::get(["country_name", "id"]);

       return view('admin.Orders.update_orders')->with(compact('orders'))->with(compact('order_products'))
       ->with(compact('BillingDetails'))->with(compact('ShippingDetails'))->with(compact('countries'));
   }  
   //end
   

      

   //update orders
public function updateOrders(Request $request){

  
    $orders = Orders::find($request->up_id);

    //update orders with new image name
    $orders->update([
        'order_status'=>$request->order_status,
    ]);

    $BillingDetails = BillingDetails::where('order_id', $request->up_id);

    $BillingDetails->update([
        'full_name'=>$request->full_name,
        'phone_no'=>$request->phone_no,
        'email' => $request->email,
        'address' => $request->address,
        'country' => $request->country,
        'state' => $request->state,
        'city' => $request->city,
        'post_code' => $request->post_code,
        'company_name' => $request->company_name,
        'payment_method' => $request->payment_method,
        'transaction_id' => $request->transaction_id,
    ]);

    $ShippingDetails = ShippingDetails::where('order_id', $request->up_id);
    $ShippingDetails->update([
         'full_name'=>$request->shipping_full_name,
         'phone_no'=>$request->shipping_phone_no,
         'email' => $request->shipping_email,
         'address' => $request->shipping_address,
         'country' => $request->shipping_country,
         'state' => $request->shipping_state,
         'city' => $request->shipping_city,
         'post_code' => $request->shipping_post_code,
         'company_name' => $request->shipping_company_name,
         'order_notes' => $request->order_notes,
    ]);

    return redirect()->route('orders');
    }
     //end



 //update Featured orders status
 public function orderStatus(Request $request){

    //get the id
    $id = $request->id;
    $orders = Orders::find($id);

    $orders->update([
        'order_status'=>$request->status,
    ]);

    return response()->json([
        'status' => 'success',
    ]);
    }
     //end



    //delete orders
    public function deleteOrders(Request $request){

    $id = $request->product_id;
    $orders = Orders::find($id);
    $orders->delete();
    
    BillingDetails::where('order_id', $request->product_id)->delete();
    ShippingDetails::where('order_id', $request->product_id)->delete();

    return response()->json([
        'status' => 'success',
    ]);
    }
     //end

    //pagination page
   public function pagination(Request $request){

    $orders = Orders::select('orders.id as orders_id', 'orders.*', 'billing_details.*')->
    join('billing_details', 'billing_details.order_id', '=', 'orders.id')
    ->paginate(5);        
    return view('admin.Orders.pagination_orders',compact('orders'))->render();

   }
    //end

    //search orders
   public function searchOrders(Request $request){

    $orders = Orders::select('orders.id as orders_id', 'orders.*', 'billing_details.*')->
    join('billing_details', 'billing_details.order_id', '=', 'orders.id')->where('orders.id', 'like', '%'.$request->search_string.'%')
    ->orWhere('billing_details.full_name', 'like', '%'.$request->search_string.'%')
    ->paginate(5);

    if($orders->count() >= 1){
        return view('admin.Orders.pagination_orders',compact('orders'))->render();
    }else{
        return response()->json([
            'status' => 'nothing_found',

        ]);
    }
   }
    //end


}