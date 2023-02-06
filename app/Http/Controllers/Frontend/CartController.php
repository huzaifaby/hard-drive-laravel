<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


class CartController extends Controller
{   
    
     //add to cart
     public function addToCart(Request $request) {
        $id = $request->id;
        $product = Product::find($id);

        // Check if user is logged in
        if (Auth::guard('customer')->check()) {
            // Get the user_id from the logged in user
            $user_id = Auth::guard('customer')->user()->id;
        } else {
            // Create a guest user_id session
            $user_id = session()->get('guest_user_id');
            if (!$user_id) {
                $user_id = uniqid();
                session()->put('guest_user_id', $user_id);
            }
        }

        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [
                $request->id => [
                    "user_id" => $user_id,
                    "product_title" => $product->product_title,
                    "quantity" => $request->quantities,
                    "product_price" => $product->product_price,
                    "product_image" => $product->product_image,
                    "id" => $product->id,
                ]
            ];

            session()->put('cart', $cart);
            return response()->json(['success' => 'Product added to cart','cart'=>$cart]);
        }

        if (isset($cart[$request->id])) {
            // $cart[$request->id]['quantity']++;
            $cart[$request->id]['quantity'] = $cart[$request->id]['quantity'] + $request->quantities;

            session()->put('cart', $cart);
            return response()->json(['success' => 'Product added to cart','cart'=>$cart]);
        }

        $cart[$request->id] = [
            "user_id" => $user_id,
            "product_title" => $product->product_title,
            "quantity" => $request->quantities,
            "product_price" => $product->product_price,
            "product_image" => $product->product_image,
            "id" => $product->id,
        ];

        session()->put('cart', $cart);
        return response()->json(['success' => 'Product added to cart','cart'=>$cart]);
    }
    
    public function showCart()
    {
        return view('frontend.cart');
    }

    // public function showCart()
    // {
    //     $cart = session()->get('cart');
    //     $subtotal = 0;
    //     $total_product_count = 0;
    //     if(!empty($cart)){
    //     foreach ($cart as $item) {
    //         $subtotal += $item['product_price'] * $item['quantity'];
    //         $total_product_count ++;
    //     }
    // }
    //     return view('frontend.cart',compact('cart','subtotal','total_product_count'));
    // }

    public function loadcart()
    {
        $cart = session()->get('cart');
        $subtotal = 0;
        $total_product_count = 0;
        if(!empty($cart)){
        foreach ($cart as $item) {
            $subtotal += $item['product_price'] * $item['quantity'];
            $total_product_count ++;
        }
    }
        return response()->json(['cart'=>$cart,'subtotal'=>$subtotal,'total_product_count'=>$total_product_count]);

    }


public function removeFromCart(Request $request)
{
    $id = $request->input('id');
    $cart = session()->get('cart');
    unset($cart[$id]);
    session()->put('cart', $cart);
    return response()->json(['message' => 'Product removed from cart successfully.']);
    
}



    public function updateCart(Request $request, $id)
{
    $cart = $request->session()->get('cart');
    $cart[$id]['quantity'] += $request->quantity;
    if ($cart[$id]['quantity'] <= 0) {
        unset($cart[$id]);
    } else {
        $cart[$id]['total_price'] = $cart[$id]['quantity'] * $cart[$id]['product_price'];
    }
    $request->session()->put('cart', $cart);
    return response()->json(['message' => 'Product removed from cart successfully.']);

}

//add to cart end

    //checkout

    public function showCheckout()
    {
        return view('frontend.checkout');
    }

    //end checkout






    

}

