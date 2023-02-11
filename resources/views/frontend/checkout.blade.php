@include('frontend.header')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

        <div class="row mb-3">
            <div class="col">
                <input id="coupon_code" class="form-control" placeholder="Coupon Code" type="text">
            </div>
            <div class="col">
                <button id="applyCouponBtn" class="apply_coupon">Apply Coupon</button>
            </div>
        </div>

        <!-- 
        <script>
        document.getElementById("applyCouponBtn").addEventListener("click", function() {
            let couponCode = document.getElementById("couponCodeInput").value;
            let subtotal = document.getElementById("total_price").value;
            

            if (couponCode === "DISCOUNT20") {
                subtotal *= 0.8;
                console.log("Discount applied! New subtotal: ", subtotal);
            } else {
                console.log("Invalid coupon code.");
            }
        });
        </script> -->





        <div class="row">
            <div class="col-md-8">
                <h1>Billing Details</h1>
                <span class="heading-border mb-4"></span>
                <!-- form start  -->
                <!-- <form action="{{ route('order.add') }}" method="POST"> -->

                <form role="form" action="{{ route('order.add') }}" method="post" class="require-validation"
                    data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    @csrf

                    <input type="text" class="total_price" value="{{$subtotal}}" id="total_price" name="total_price">

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
                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control shadow-none" value="{{ $full_name }}"
                                placeholder="Full Name" name="full_name" id="name" required>
                        </div>
                        <div class="col">
                            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control shadow-none" value="{{ $phone_no }}"
                                placeholder="Phone" name="phone_no" id="phone" required>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control shadow-none" placeholder="Email" value="{{ $email }}"
                            name="email" id="email" required>
                    </div>
                    <div class="col mb-3">
                        <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control shadow-none" name="address" placeholder="Address"
                            id="address" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="country" class="form-label">Country Code <span
                                    class="text-danger">*</span></label>
                            <select name="country" class="form-select shadow-none country-dd">
                                <option value="">Select Country</option>
                                @foreach ($countries as $data)
                                <option value="{{$data->id}}">
                                    {{$data->country_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="state" class="form-label">State Code <span class="text-danger">*</span></label>
                            <select name="state" class="form-select shadow-none state-dd">
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="city" class="form-label">Town / City <span class="text-danger">*</span></label>
                            <select name="city" class="form-select shadow-none city-dd">
                            </select>
                        </div>
                        <div class="col">
                            <label for="zip" class="form-label">Postcode / ZIP <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control shadow-none" name="post_code"
                                placeholder="Postcode / ZIP" id="zip" required>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="company" class="form-label">Company Name (optional) <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control shadow-none" name="company_name"
                            placeholder="Company Name" id="company">
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
                                <label for="shipping_country" class="form-label">Country Code <span
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
                                <label for="shipping_state" class="form-label">State Code <span
                                        class="text-danger">*</span></label>
                                <select name="shipping_state" class="form-select shadow-none state-dd">
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="shipping_city" class="form-label">Town / City <span
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
                                        <td>{{ $details['quantity'] }} ×
                                            {{ substr($details['product_title'], 0, 30) }}...</td>
                                        <td class="text-end">${{ $details['quantity'] * $details['product_price'] }}  </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="text-end total_price">${{ number_format($subtotal, 2) }}</td>
                                    </tr>
                                    <tr id="couponcode">
                                        <td>Coupon</td>
                                        <td class="text-end pb-4 coupon_code"></td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td class="text-end pb-4">0%</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td class="text-end total_price">${{ number_format($subtotal, 2) }}</td>
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
                            <input class="form-check-input" type="radio" value="PayPal" name="paymentOption" id="paypal"
                                checked onclick="displayPaypal()">
                            <label class="form-check-label" for="paypal">
                                PayPal Express
                                <br>
                                <small>Pay via your PayPal account.</small>
                            </label>
                        </div>

                        <div class="form-check text-primary">
                            <input class="form-check-input" type="radio" name="paymentOption" id="creditcard"
                                onclick="displayCreditcard()">
                            <label class="form-check-label" for="creditcard">
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
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
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


<script>
function displayPaypal() {
    let paypalcheckbox = document.getElementById("paypal");
    let creditcardcheckbox = document.getElementById("creditcard");
    document.getElementById("creditcard-input").style.display = "none";
    document.getElementById("payment-form").classList.remove("require-validation");
    paypalcheckbox.value = 'PayPal';
    creditcardcheckbox.value = '';


}

function displayCreditcard() {
    let paypalcheckbox = document.getElementById("paypal");
    let creditcardcheckbox = document.getElementById("creditcard");
    document.getElementById("creditcard-input").style.display = "block";
    document.getElementById("payment-form").classList.add("require-validation");
    paypalcheckbox.value = '';
    creditcardcheckbox.value = 'Credit Card';


}
</script>



<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
$(function() {

    $('input[name="paymentOption"]').on('change', function() {
        if (this.value === 'Credit Card') {

            var $form = $(".require-validation");
            $('form.require-validation').on('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('d-none');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('d-none');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('d-none')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        }
    });
});
</script>


<script>
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>




<script>
$(document).ready(function() {
    $('.country-dd').on('change', function() {
        var idCountry = this.value;
        $(".state-dd").html('');
        $.ajax({
            url: "{{url('api/fetch-states')}}",
            type: "POST",
            data: {
                country_id: idCountry,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('.state-dd').html('<option value="">Select State</option>');
                $.each(result.states, function(key, value) {
                    $(".state-dd").append('<option value="' + value
                        .id + '">' + value.state_name + '</option>');
                });
                $('.city-dd').html('<option value="">Select City</option>');
            }
        });
    });
    $('.state-dd').on('change', function() {
        var idState = this.value;
        $(".city-dd").html('');
        $.ajax({
            url: "{{url('api/fetch-cities')}}",
            type: "POST",
            data: {
                state_id: idState,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(res) {
                $('.city-dd').html('<option value="">Select City</option>');
                $.each(res.cities, function(key, value) {
                    $(".city-dd").append('<option value="' + value
                        .id + '">' + value.city_name + '</option>');
                });
            }
        });
    });
});
</script>





<script>
$(document).ready(function() {


});
</script>


@include('frontend.footer')