@include('frontend.header')


<div class="cart-wrapper">
    <div class="container">

        <!-- breadcrumb start  -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>
        <!-- breadcrumb end  -->

        <div class="row">
            <div class="col-md-8">
                <h1>Billing Details</h1>
                <span class="heading-border mb-4"></span>
                <!-- form start  -->
                <form action="{{ route('order.add') }}" method="POST">
                @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="total_price" value="{{$subtotal}}">
                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control shadow-none" placeholder="Full Name" name="full_name" id="name">
                        </div>
                        <div class="col">
                            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control shadow-none" placeholder="Phone" name="phone_no" id="phone">
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control shadow-none" placeholder="Email" name="email" id="email">
                    </div>
                    <div class="col mb-3">
                        <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control shadow-none" name="address" placeholder="Address" id="address">
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="country" class="form-label">Country Code <span
                                    class="text-danger">*</span></label>
                            <select id="country" name="country" class="form-control shadow-none">
                                <option value="" hidden>Select</option>
                                <option value="USA">USA</option>
                                <option value="Pakistan">Pakistan</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="state" class="form-label">State Code <span class="text-danger">*</span></label>
                            <select id="state" name="state" class="form-control shadow-none">
                                <option value="" hidden>Select</option>
                                <option value="Sindh">Sindh</option>
                                <option value="Punjab">Punjab</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="city" class="form-label">Town / City <span class="text-danger">*</span></label>
                            <input type="text" name="city" class="form-control shadow-none" placeholder="Town / City" id="city">
                        </div>
                        <div class="col">
                            <label for="zip" class="form-label">Postcode / ZIP <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control shadow-none" name="post_code" placeholder="Postcode / ZIP" id="zip">
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="company" class="form-label">Company Name (optional) <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control shadow-none" name="company_name" placeholder="Company Name" id="company">
                    </div>
                    <div class="mb-3 form-check border-bottom pb-3">
                        <input type="checkbox" class="form-check-input shadow-none" id="checkDiffAddress">
                        <label class="form-check-label" for="check">Ship to a different address?</label>
                    </div>
                    <div id="shiptoDiffAddress" style="display:none;">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="name" class="form-label">Full Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-none" placeholder="Full Name" id="name">
                            </div>
                            <div class="col">
                                <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control shadow-none" placeholder="Phone" id="phone">
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control shadow-none" placeholder="Address" id="address">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="country" class="form-label">Country Code <span
                                        class="text-danger">*</span></label>
                                <select id="country" class="form-control shadow-none">
                                    <option value="" hidden>Select</option>
                                    <option value="">USA</option>
                                    <option value="">Pakistan</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="state" class="form-label">State Code <span
                                        class="text-danger">*</span></label>
                                <select id="state" class="form-control shadow-none">
                                    <option value="" hidden>Select</option>
                                    <option value="">Sindh</option>
                                    <option value="">Punjab</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="city" class="form-label">Town / City <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-none" placeholder="Town / City" id="city">
                            </div>
                            <div class="col">
                                <label for="zip" class="form-label">Postcode / ZIP <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-none" placeholder="Postcode / ZIP"
                                    id="zip">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="orderNotes" class="form-label">Order Notes <span
                                class="text-danger">*</span></label>
                        <textarea id="orderNotes" name="order_notes" class="form-control shadow-none"
                            placeholder="Notes about your order, e.g. special notes for delivery." cols="30"
                            rows="5"></textarea>
                    </div>
                
                <!-- form end -->
            </div>
            <div class="col-md-4">

                <!-- side card  -->
                <div class="card bg-light border border-0 px-4">
                    <div class="card-body">
                        <h3 class="p-2 border-bottom">Your Order</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Product</td>
                                        <td class="text-end">Total</td>
                                    </tr>
                                    @if(!empty($cart))
                                    @foreach($cart as $id => $details)
                                    <tr>
                                        <td>{{ $details['quantity'] }} × {{ substr($details['product_title'], 0, 30) }}...</td>
                                        <td class="text-end">${{ $details['product_price'] }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="text-end">${{$subtotal}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td class="text-end pb-4">0%</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td class="text-end pb-4">${{$subtotal}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Free Shipping (7-10 days) - $ 0
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Standard Shipping (3 - 5 days) - $ 20
                            </label>
                        </div>
                        <div class="form-check border-bottom pb-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3"
                                checked>
                            <label class="form-check-label" for="flexRadioDefault3">
                                Fast Shipping (2 days) - $ 40
                            </label>
                        </div>

                        <div class="form-check py-3 text-primary">
                            <input class="form-check-input" type="radio" name="payment" id="paypal" checked>
                            <label class="form-check-label" for="paypal">
                                PayPal Express
                                <br>
                                <small>Pay via your PayPal account.</small>
                            </label>
                        </div>

                        <div class="form-check text-primary">
                            <input class="form-check-input" type="radio" name="payment" id="creditcard" checked>
                            <label class="form-check-label" for="creditcard">
                                Credit card
                                <br>
                                <small>Pay via your Credit Card.</small>
                            </label>
                        </div>

                        <img src="https://jbsdevices.com/assets/front/images/stripe-payment.png" loading="lazy"
                            class="img-fluid mt-3" alt="">
                        <input type="submit" class="square-block-btn mt-3" value="Place Order">
                    </div>
                </div>
                <!-- side card /  -->

                </form>

            </div>
        </div>

    </div>
</div>

@include('frontend.footer')