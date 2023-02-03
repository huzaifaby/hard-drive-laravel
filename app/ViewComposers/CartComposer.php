<?php

namespace App\ViewComposers;

use Illuminate\View\View;

class CartComposer
{
    public function compose(View $view)
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

        return response()->json(['cart'=>$view->with(['cart' => $cart, 'subtotal' => $subtotal, 'total_product_count' => $total_product_count])]);

    }
}











?>