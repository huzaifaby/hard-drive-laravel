@include('frontend.header')

<style>
@media (min-width: 768px) {
    .left {
        width: 70%
    }

    .right {
        width: 30%
    }
}
</style>

<div class="cart-wrapper mt-3">
    <div class="container">



        <div class="row">
            <div class="col-md-8 left mb-3">

                <!-- breadcrumb start  -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                </nav>
                <!-- breadcrumb end  -->

                <!-- table start  -->
                <div class="table-responsive-sm d-none d-lg-block">

                    <table class="table table-borderless">
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

                <!-- mobile cart  -->
                <div id="MobileCartPage" class="d-block d-lg-none">
            
                </div>
                <!-- mobile cart /  -->

            </div>
            <div class="col-md-4 right">

                <!-- side card  -->
                <div class="card bg-light border border-0 px-4">
                    <div class="card-body">
                        <h3 class="p-2 border-bottom">Cart totals</h3>
                        <div class="table-responsive">

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="text-end sub-total"></td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td class="text-end pb-4">0 tax</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td class="text-end pb-4 sub-total"></td>
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





@include('frontend.footer')