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

          
class OrdersController extends Controller
{
    //orders view
   public function orders()
   {    
        $orders = Orders::select('orders.id as orders_id', 'orders.*', 'billing_details.*')->
        join('billing_details', 'billing_details.order_id', '=', 'orders.id')
        ->paginate(5);     


        return view('admin.Orders.orders')->with(compact('orders'));
   }

   public function OrdersEdit($id)
   {
      $orders = Orders::join('billing_details', 'billing_details.order_id', '=', 'orders.id')->
      join('shipping_details', 'shipping_details.order_id', '=', 'orders.id')
      ->where('orders.id', $id)->first();

      
      $BillingDetails = BillingDetails::join('orders', 'orders.id', '=', 'billing_details.order_id')->
      where('orders.id', $id)->first();

      $ShippingDetails = ShippingDetails::join('orders', 'orders.id', '=', 'shipping_details.order_id')->
      where('orders.id', $id)->first();


      $order_products = OrderProducts::join('orders', 'orders.id', '=', 'order_products.order_id')->
      join('products', 'products.id', '=', 'order_products.product_id')->
      where('order_products.order_id', $id)->get();

       return view('admin.Orders.update_orders')->with(compact('orders'))->with(compact('order_products'))
       ->with(compact('BillingDetails'))->with(compact('ShippingDetails'));
   }  
   

      

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



 //update Featured orders status
 public function orderStatus(Request $request){

    //get the id
    $id = $request->product_id;
    $orders = Orders::find($id);

    $orders->update([
        'is_featured'=>$request->featured,
    ]);

    return response()->json([
        'status' => 'success',
    ]);
}



    //delete orders
    public function deleteOrders(Request $request){

    $id = $request->product_id;
    $orders = Orders::find($id);
    $orders->delete();
    
    BillingDetails::where('order_id', $request->product_id)->delete();
    ShippingDetails::where('order_id', $request->product_id)->delete();

    // Orders::find($request->product_id)->delete();


    return response()->json([
        'status' => 'success',
    ]);

}


    //pagination page
   public function pagination(Request $request){

    $orders = Orders::select('Orders.id as orders_id', 'orders.*', 'order_products.*', 'billing_details.*')->
        join('order_products', 'order_products.order_id', '=', 'orders.id')->
        join('billing_details', 'billing_details.order_id', '=', 'orders.id')
        ->paginate(5);     
    return view('admin.Orders.pagination_orders',compact('orders'))->render();

   }

    //search orders
   public function searchOrders(Request $request){

    $orders = Orders::join('order_products', 'order_products.order_id', '=', 'orders.id')->
    join('billing_details', 'billing_details.order_id', '=', 'orders.id')->where('orders.product_name', 'like', '%'.$request->search_string.'%')
    ->paginate(5);

    if($products->count() >= 1){
        return view('admin.Orders.pagination_orders',compact('orders'))->render();
    }else{
        return response()->json([
            'status' => 'nothing_found',

        ]);
    }

   }


}