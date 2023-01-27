<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\BillingDetails;
use App\Models\Orders;
use App\Models\OrderProducts;

class CheckoutController extends Controller
{   
    
    //checkout

    public function showCheckout()
    {
        return view('frontend.checkout');
    }

    public function placeOrder(Request $request)
    {  


        $user_id = null;
        $subtotal = $request->total_price;


     // Check if user is logged in
    if (Auth::check()) {
    // Get the user_id from the logged in user
    $user_id = Auth::user()->id;


      $order = Orders::create([
            'session_id'=>0,
            'user_id'=>$user_id,
            'order_status' => 'pending',
            'total_amount'=>$subtotal,
        ]);

    } else {
        // Get the guest user_id from session
        $user_id = session()->get('guest_user_id');

        $order = Orders::create([
            'session_id'=>$user_id,
            'user_id'=>0,
            'order_status' => 'pending',
            'total_amount'=>$subtotal,
        ]);
        }

        $lastInsertId = $order->id;


        $cart = session()->get('cart');

        $total_quantity = 0;
        if(!empty($cart)){
        foreach ($cart as $item) {
            $product_price = $item['quantity']  * $item['product_price'] ;
            $total_quantity = $item['quantity'];
            $product_id = $item['id'];
            $product_name = $item['product_title'];

            $data = [
                'order_id' =>  $lastInsertId,
                'qty' =>  $total_quantity,
                'price' => $product_price,
                'product_id' =>  $product_id,
                'product_name' => $product_name,
            ];

            $orderProducts = OrderProducts::create($data);

        }
    }

        BillingDetails::create([
            'order_id'=>$lastInsertId,
            'full_name'=>$request->full_name,
            'phone_no'=>$request->phone_no,
            'email' => $request->email,
            'address' => $request->address,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'post_code' => $request->post_code,
            'company_name' => $request->company_name,
            'order_notes' => $request->order_notes,
        ]);

        session()->forget('cart');

        return redirect("/");
    }

    //end checkout

    

}

