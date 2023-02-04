@include('frontend.header')


<div class="cart-wrapper">
    <div class="container">

        <!-- breadcrumb start  -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>
        <!-- breadcrumb end  -->

        <div class="row">
            <div class="col-md-8">
                <!-- table start  -->
                <div class="table-responsive">

                    <table class="table  table-borderless">
                        <thead class="border border-bottom border-0">
                            <tr>
                                <td colspan="2">Product</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Total</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody id="cartpage">

                        </tbody>

                    </table>
                </div>
                <p class="mb-0 no_product">No products in the cart.</p>
                <!-- table end  -->
            </div>
            <div class="col-md-4">

                <!-- side card  -->
                <div class="card bg-light border border-0 px-4">
                    <div class="card-body">
                        <h3 class="p-2 border-bottom">Cart totals</h3>
                        <div class="table-responsive">

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="text-end sub-total">${{$subtotal}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td class="text-end pb-4">0 tax</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td class="text-end pb-4 sub-total">${{$subtotal}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @if($subtotal == 0)
                        <a href="{{ route('cart.show') }}" class="square-block-btn">Proceed to Checkout</a>
                        @else
                        <a href="{{ route('checkout.show') }}" class="square-block-btn">Proceed to Checkout</a>
                        @endif
                        <a href="#" class="addtoCompare py-3 border-bottom">Back to Shopping</a>
                        <img src="https://jbsdevices.com/assets/front/images/stripe-payment.png" loading="lazy"
                            class="img-fluid pt-3" alt="">
                    </div>
                </div>
                <!-- side card /  -->

            </div>
        </div>

    </div>
</div>







<script>

</script>


@include('frontend.footer')