<?php include("header.php"); ?>

<div class="cart-wrapper mt-5">
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
                <form>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control shadow-none" placeholder="Full Name" id="name">
                        </div>
                        <div class="col">
                            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control shadow-none" placeholder="Phone" id="phone">
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control shadow-none" placeholder="Email" id="email">
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
                            <label for="state" class="form-label">State Code <span class="text-danger">*</span></label>
                            <select id="state" class="form-control shadow-none">
                                <option value="" hidden>Select</option>
                                <option value="">Sindh</option>
                                <option value="">Punjab</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="city" class="form-label">Town / City <span class="text-danger">*</span></label>
                            <input type="text" class="form-control shadow-none" placeholder="Town / City" id="city">
                        </div>
                        <div class="col">
                            <label for="zip" class="form-label">Postcode / ZIP <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control shadow-none" placeholder="Postcode / ZIP" id="zip">
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="company" class="form-label">Company Name (optional) <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control shadow-none" placeholder="Company Name" id="company">
                    </div>
                    <div class="mb-3 form-check border-bottom pb-3">
                        <input type="checkbox" class="form-check-input shadow-none" id="check">
                        <label class="form-check-label" for="check">Ship to a different address?</label>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="orderNotes" class="form-label">Order Notes <span
                                class="text-danger">*</span></label>
                        <textarea id="orderNotes" class="form-control shadow-none"
                            placeholder="Notes about your order, e.g. special notes for delivery." cols="30"
                            rows="5"></textarea>
                    </div>
                </form>
                <!-- form end -->
            </div>
            <div class="col-md-4">

                <!-- side card  -->
                <div class="card bg-light border border-0">
                    <div class="card-body">
                        <h3 class="p-2 border-bottom">Your Order</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Product</td>
                                        <td class="text-end">Total</td>
                                    </tr>
                                    <tr>
                                        <td>1 × C911R Dell 80GB 5400RPM SATA 2.5-inch Hard Drive</td>
                                        <td class="text-end">$153.55</td>
                                    </tr>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="text-end">$389.4</td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td class="text-end pb-4">0%</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td class="text-end pb-4">$389.4</td>
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
                        <a href="#" class="square-block-btn mt-3">Place Order</a>
                    </div>
                </div>
                <!-- side card /  -->

            </div>
        </div>

    </div>
</div>

<?php include("footer.php"); ?>