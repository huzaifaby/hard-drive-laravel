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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="cart-wrapper mt-4">
    <div class="container">

        <div class="row">
            <div class="col-md-8 left mb-3">

                <!-- breadcrumb start  -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
                <!-- breadcrumb end  -->

                <h1>Billing Details</h1>
                <span class="heading-border mb-4"></span>
                <!-- form start  -->
                <!-- <form action="{{ route('order.add') }}" method="POST"> -->

                <form action="{{ route('order.add') }}" method="post" class="require-validation"
                    data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    @csrf

                    <input type="hidden" class="total_price" value="{{$subtotal}}" id="total_price" name="total_price">

                    <div class="row mb-3">
                        <div class="col">
                            <?php
                                $full_name = ''; $email = ''; $phone_no = '';
                              if (Auth::guard('customer')->check()) {
                                $full_name = Auth::guard('customer')->user()->full_name;
                                $email = Auth::guard('customer')->user()->email;
                                $phone_no = Auth::guard('customer')->user()->phone_no;
                              }
                            ?>
                            <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control shadow-none" value="{{ $full_name }}"
                                placeholder="Full Name" name="full_name" id="fullname" required>
                        </div>
                        <div class="col">
                            <label for="tel" class="form-label">Phone <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control shadow-none" value="{{ $phone_no }}"
                                placeholder="Phone" name="phone_no" id="tel" required>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="mail" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control shadow-none" placeholder="Email" value="{{ $email }}"
                            name="email" id="mail" required>
                    </div>
                    <div class="col mb-3">
                        <label for="ship_address" class="form-label">Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control shadow-none" name="address" placeholder="Address"
                            id="ship_address" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-select" class="form-label">Country Code <span
                                    class="text-danger">*</span></label>
                            <select name="country" required class="form-select shadow-none country-dd">
                                <option value="">Select Country</option>
                                @foreach ($countries as $data)
                                <option value="{{$data->id}}">
                                    {{$data->country_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="form-select" class="form-label">State Code <span class="text-danger">*</span></label>
                            <select name="state" class="form-select shadow-none state-dd" required>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-select" class="form-label">Town / City <span class="text-danger">*</span></label>
                            <select name="city" class="form-select shadow-none city-dd" required>
                            </select>
                        </div>
                        <div class="col">
                            <label for="postzip" class="form-label">Postcode / ZIP <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control shadow-none" name="post_code"
                                placeholder="Postcode / ZIP" id="postzip" required>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="companyname" class="form-label">Company Name (optional) <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control shadow-none" name="company_name"
                            placeholder="Company Name" id="companyname">
                    </div>

                    <div class="mb-3 form-check border-bottom pb-3">
                        <input type="checkbox" class="form-check-input shadow-none" value="0" name="checkDiffAddress"
                            id="checkDiffAddress">
                        <label class="form-check-label" for="check">Ship to a different address?</label>
                    </div>

                    <div id="shiptoDiffAddress" style="display:none;">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="name" class="form-label">Full Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-none" placeholder="Full Name"
                                    name="shipping_full_name" id="name">
                            </div>
                            <div class="col">
                                <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control shadow-none" placeholder="Phone"
                                    name="shipping_phone_no" id="phone">
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control shadow-none" placeholder="Email"
                                name="shipping_email" id="email">
                        </div>
                        <div class="col mb-3">
                            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control shadow-none" name="shipping_address"
                                placeholder="Address" id="address">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="form-select" class="form-label">Country Code <span
                                        class="text-danger">*</span></label>
                                <select name="shipping_country" class="form-select shadow-none country-dd">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $data)
                                    <option value="{{$data->id}}">
                                        {{$data->country_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="form-select" class="form-label">State Code <span
                                        class="text-danger">*</span></label>
                                <select name="shipping_state" class="form-select shadow-none state-dd">
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="form-select" class="form-label">Town / City <span
                                        class="text-danger">*</span></label>
                                <select name="shipping_city" class="form-select shadow-none city-dd">
                                </select>
                            </div>
                            <div class="col">
                                <label for="zip" class="form-label">Postcode / ZIP <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-none" name="shipping_post_code"
                                    placeholder="Postcode / ZIP" id="zip">
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="company" class="form-label">Company Name (optional) <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control shadow-none" name="shipping_company_name"
                                placeholder="Company Name" id="company">
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
            <div class="col-md-4 right">

                <!-- side card  -->
                <div class="card bg-light border border-0 px-4">
                    <div class="card-body">
                        <h3 class="p-2 border-bottom">Your Order</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody id="checkoutTable">
                                    


                                </tbody>
                            </table>
                        </div>

                        <div class="form-group my-3 rounded">
                            <span><i class='bx bx-purchase-tag-alt'></i> Have a promotion code?</span>
                            <div class="row mt-1">
                                <div class="col pe-0">
                                    <input id="coupon_code"
                                        class="form-control py-2 rounded-0 rounded-start shadow-none"
                                        placeholder="Coupon Code" type="text">
                                </div>
                                <div class="col-auto ps-0">
                                    <button id="applyCouponBtn"
                                        class="square-sm-btn rounded-0 rounded-end apply_coupon">Apply
                                        Coupon</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-input" for="flexRadioDefault1">
                                Free Shipping (7-10 days) - $ 0
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                checked>
                            <label class="form-check-input" for="flexRadioDefault2">
                                Standard Shipping (3 - 5 days) - $ 20
                            </label>
                        </div>
                        <div class="form-check border-bottom pb-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3"
                                checked>
                            <label class="form-check-input" for="flexRadioDefault3">
                                Fast Shipping (2 days) - $ 40
                            </label>
                        </div>

                        <div class="form-check py-3 text-primary">
                            <input class="form-check-input" type="radio" value="PayPal" name="paymentOption" id="paypal"
                                checked onclick="displayPaypal()">
                            <label class="form-check-input" for="paypal">
                                PayPal Express
                                <br>
                                <small>Pay via your PayPal account.</small>
                            </label>
                        </div>

                        <div class="form-check text-primary">
                            <input class="form-check-input" type="radio" name="paymentOption" id="creditcard"
                                onclick="displayCreditcard()">
                            <label class="form-check-input" for="creditcard">
                                Credit card
                                <br>
                                <small>Pay via your Credit Card.</small>
                            </label>

                        </div>

                        <div class="row" id="creditcard-input" style="display:none;">

                            <div class="panel panel-default credit-card-box">

                                <div class="panel-body mt-3">

                                    @if (Session::has('success'))
                                    <div class="alert alert-success text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">??</a>
                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                    @endif



                                    <div class="mb-3">
                                        <div class=' form-group required'>
                                            <input class='form-control shadow-none' placeholder="Name" size='4'
                                                type='text'>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class=' form-group  required'>
                                            <input autocomplete='off' name="card_number"
                                                placeholder="1234 1234 1234 1234"
                                                class='form-control card-number shadow-none' size='20' type='text'
                                                onkeypress='return isNumberKey(event)' maxlength='16'>
                                        </div>
                                    </div>

                                    <div class='form-row row'>
                                        <div class='col col-md-4 form-group cvc required'>
                                            <input autocomplete='off' class='form-control card-cvc shadow-none'
                                                placeholder='CVC' size='4' type='text'
                                                onkeypress='return isNumberKey(event)' maxlength='4'>
                                        </div>
                                        <div class='col col-md-4 form-group expiration required'>
                                            <input class='form-control card-expiry-month shadow-none' placeholder='MM'
                                                size='2' onkeypress='return isNumberKey(event)' maxlength='2'
                                                type='text'>
                                        </div>
                                        <div class='col col-md-4 form-group expiration required'>
                                            <input class='form-control card-expiry-year shadow-none' placeholder='YYYY'
                                                size='4' onkeypress='return isNumberKey(event)' maxlength='4'
                                                type='text'>
                                        </div>
                                    </div>

                                    <div class='form-row row mt-3'>
                                        <div class='col-md-12 error form-group d-none'>
                                            <div class='alert-danger alert'>Please correct the errors and
                                                try
                                                again.</div>
                                        </div>
                                    </div>


                                </div>
                            </div>

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



@include('frontend.country_state_city_js')
