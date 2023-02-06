<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use Stripe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\BillingDetails;
use App\Models\Orders;
use App\Models\OrderProducts;
use App\Models\ShippingDetails;
use App\Models\{Country, State, City};

class CheckoutController extends Controller
{   
    
    //checkout

    public function showCheckout()
    {
        $data['countries'] = Country::get(["country_name", "id"]);
        return view('frontend.checkout',$data);
    }

    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["state_name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["city_name", "id"]);
        return response()->json($data);
    }

    public function placeOrder(Request $request)
    {  

     
        $user_id = null;
        $subtotal = $request->total_price;
        $key = $request->stripeToken;
       


        if($key != null){
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        $customer = Stripe\Customer::create(array(
    
                "address" => [
    
                        "line1" => $request->address,
    
                        "postal_code" => $request->post_code,
    
                        "city" => $request->city,
    
                        "state" => $request->state,
    
                        "country" => $request->country,
    
                    ],
    
                "email" => $request->email,
    
                "name" => $request->full_name,
    
                "source" => $request->stripeToken
    
             ));
    
      
    
        Stripe\Charge::create ([
    
                "amount" => 100 * 100,
    
                "currency" => "usd",
    
                "customer" => $customer->id,
    
                "description" => "Test payment",
    
                "shipping" => [
    
                  "name" => $request->full_name,
    
                  "address" => [ 
    
                    "line1" => $request->address,
    
                    "postal_code" => $request->post_code,
    
                    "city" => $request->city,
    
                    "state" => $request->state,
    
                    "country" => $request->country,
    
                  ],
    
                ]
    
        ]); 
    
      
        }
   

        //end




      

     // Check if user is logged in
     if (Auth::guard('customer')->check()) {
    // Get the user_id from the logged in user
    $user_id = Auth::guard('customer')->user()->id;


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

        
        if($request->payment_method == 'PayPal'){
            
            $paymentMethod = 'Paypal';
        }
        else{
            $paymentMethod = 'Credit Card';
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
            'payment_method' => $paymentMethod,
            'transaction_id' => $request->card_number,
        ]);

        if($request->checkDiffAddress == 0){
        ShippingDetails::create([
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
    } else {

        ShippingDetails::create([
            'order_id'=>$lastInsertId,
            'full_name'=>$request->shipping_full_name,
            'phone_no'=>$request->shipping_phone_no,
            'email' => $request->shipping_email,
            'address' => $request->shipping_address,
            'country' => $request->shipping_country,
            'state' => $request->shipping_state,
            'city' => $request->shipping_city,
            'post_code' => $request->shipping_post_code,
            'company_name' => $request->shipping_company_name,
            'order_notes' => $request->shipping_order_notes,
        ]);
    }

        session()->forget('cart');

        if($key != null){
        return redirect("/");
        }else{
            return redirect("https://www.paypal.com/signin");
        }
    }

    //end checkout

    

}

