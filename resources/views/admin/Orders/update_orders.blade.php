@extends('admin.index')
@section('content')

<h3 class="mt-4">Orders</h3>
<div class="mt-4">
    <form method="post" action="{{ route('update.orders') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="up_id" value="{{$orders->id }}" class="form-control">

        <div class="row">
            <div class="col-md-9">

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="phone_no_1">Created Date</label>
                            <input type="date" value="{{ $orders->created_at->format('Y-m-d') }}" name="created_at"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="phone_no_2">Order Status</label>
                            <select class="form-select" name="order_status">
                                <option hidden value="{{$orders->order_status }}">{{$orders->order_status }}</option>
                                <option value="Pending Payment">Pending Payment</option>
                                <option value="Processing">Processing</option>
                                <option value="On hold">On hold</option>
                                <option value="Completed">Completed</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Refunded">Refunded</option>
                                <option value="Failed">Failed</option>
                                <option value="Draft">Draft</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>

                    </div>
                    <div class="col">
                        <p>
                        <div class="row align-items-center">
                            <div class="col">
                                <p class="mb-0 fw-bold">Billing</p>

                            </div>
                            <div class="col text-end billing-pencil-icon">
                                <button class="btn shadow-none border-0 billing-btn " type="button" data-toggle="collapse"
                                    data-target="#collapseBilling" aria-expanded="false"
                                    aria-controls="collapseBilling">
                                    <i class="fas fa-pencil"></i>
                                </button>
                            </div>
                        </div>

                        <div class="billing">
                            <p class="mb-0 mt-2">{{$BillingDetails->address }}</p>

                            <p class="mb-0 fw-bold mt-2">Email address:</p>
                            <p class="mb-0">{{$BillingDetails->email }}</p>

                            <p class="mb-0 fw-bold mt-2">Phone:</p>
                            <p class="mb-0">{{$BillingDetails->phone_no }}</p>
                            </p>
                        </div>

                        <div class="collapse mt-2" id="collapseBilling">


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" class="form-control" name="full_name" id="full_name"
                                        value="{{$BillingDetails->full_name }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" value="{{$BillingDetails->email }}" name="email"
                                        id="email">
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="phone_no">Phone No</label>
                                    <input type="text" class="form-control" name="phone_no" id="phone_no"
                                        value="{{$BillingDetails->phone_no }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{$BillingDetails->address }}" id="address">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control" name="company_name" value="{{$BillingDetails->company_name }}"
                                    id="company_name">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Country">Country</label>
                                    <input type="text" class="form-control" value="{{$BillingDetails->country }}" name="country"
                                        id="country">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" value="{{$BillingDetails->state }}" name="state"
                                        id="state">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" value="{{$BillingDetails->city }}" name="city"
                                        id="city">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="post_code">Postcode / ZIP</label>
                                    <input type="text" class="form-control" value="{{$BillingDetails->post_code }}"
                                        name="post_code" id="post_code">
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="payment_method">Payment Method</label>
                                <select class="form-select" name="payment_method" id="payment_method">
                                    <option hidden value="{{$BillingDetails->payment_method }}">{{$BillingDetails->payment_method }}
                                    </option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="Credit Card">PayPal</option>
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="transaction_id">Transaction ID</label>
                                <input type="text" class="form-control" name="transaction_id" value="{{$BillingDetails->transaction_id }}"
                                    id="transaction_id">
                            </div>
                        </div>
                    </div>

                    <!-- shipping -->
                    <div class="col">
                        <p>
                        <div class="row align-items-center">
                            <div class="col">
                                <p class="mb-0 fw-bold">Shipping</p>

                            </div>
                            <div class="col text-end shipping-pencil-icon">
                                <button class="btn shadow-none border-0 shipping-btn" type="button" data-toggle="collapse"
                                    data-target="#collapseShipping" aria-expanded="false"
                                    aria-controls="collapseShipping">
                                    <i class="fas fa-pencil"></i>
                                </button>
                            </div>
                        </div>

                        <div class="shipping">
                            <p class="mb-0 mt-2">{{$ShippingDetails->address }}</p>

                            <p class="mb-0 fw-bold mt-2">Email address:</p>
                            <p class="mb-0">{{$ShippingDetails->email }}</p>

                            <p class="mb-0 fw-bold mt-2">Phone:</p>
                            <p class="mb-0">{{$ShippingDetails->phone_no }}</p>
                            </p>
                        </div>

                        <div class="collapse mt-2" id="collapseShipping">


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" class="form-control" name="shipping_full_name" id="full_name"
                                        value="{{$ShippingDetails->full_name }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" value="{{$ShippingDetails->email }}" name="shipping_email"
                                        id="email">
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="phone_no">Phone No</label>
                                    <input type="text" class="form-control" name="shipping_phone_no" id="phone_no"
                                        value="{{$ShippingDetails->phone_no }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control"  name="shipping_address" value="{{$ShippingDetails->address }}" id="address">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control" name="shipping_company_name" value="{{$ShippingDetails->company_name }}"
                                    id="company_name">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Country">Country</label>
                                    <input type="text" class="form-control" value="{{$ShippingDetails->country }}" name="shipping_country"
                                        id="country">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" value="{{$ShippingDetails->state }}" name="shipping_state"
                                        id="state">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" value="{{$ShippingDetails->city }}" name="shipping_city"
                                        id="city">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="post_code">Postcode / ZIP</label>
                                    <input type="text" class="form-control" value="{{$ShippingDetails->post_code }}"
                                        name="shipping_post_code" id="post_code">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="order_notes">Customer provided note:</label>
                                <input type="text" name="order_notes" class="form-control" value="{{$ShippingDetails->order_notes }}""
                                    id="order_notes">
                            </div>


                        </div>
                    </div>
                    <!-- end -->
                </div>

                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">

                                    <tr>
                                        <th scope="col" colspan="2">Item</th>
                                        <th scope="col">Coast</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order_products as $key=>$orderproducts)
                                    <tr>
                                        <td><img src="{{ asset('image/products/'.$orderproducts->product_image) }}"
                                                height="80" width="100"></td>
                                        <td class="align-middle"> {{ $orderproducts->product_title }}</td>
                                        <td>${{ $orderproducts->product_price }}</td>
                                        <td>{{ $orderproducts->qty }}</td>
                                        <td>${{ $orderproducts->price }}</td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

                <div class="row justify-content-end bg-white p-4 mb-3 ">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-8 text-end">
                                <p>Items Subtotal:</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <p> <strong>${{$orders->total_amount }}</strong></p>
                            </div>

                            <div class="col-md-8 text-end">
                                <p>Shipping:</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <p> <strong>$0</strong></p>
                            </div>

                            <div class="col-md-8 text-end">
                                <p>Order Total:</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <p> <strong>${{$orders->total_amount }}</strong></p>
                            </div>

                            <hr>

                            <div class="col-md-8 text-end">
                                <p><strong> Paid: </strong></p>
                            </div>
                            <div class="col-md-4 text-end">
                                <p> <strong>${{$orders->total_amount }}</strong></p>
                            </div>

                            <div class="col-md-8 text-end">
                                <p>January 31, 2023 via Credit Card </p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button bg-white shadow-none text-dark border-bottom" type="button"
                                data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne"
                                aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Order Actions
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body p-1">
                                <div class="row">
                                    <div class="col">
                                        <select class="form-select" name="" id="">
                                            <option value="">Choose an action...</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-primary"><i
                                                class="fas fa-chevron-right"></i></button>
                                    </div>
                                </div>
                                <div class="row border-top mt-3">
                                    <div class="col text-center">
                                        <button type="submit"
                                            class="btn btn-primary update_setting my-3">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </form>
</div>


<script>
    //billing
const button = document.querySelector(".billing-btn");
const billingDiv = document.querySelector(".billing");
const pencilIconDiv = document.querySelector(".billing-pencil-icon");

button.addEventListener("click", function() {
    if (billingDiv.style.display === "none") {
        billingDiv.style.display = "block";
        pencilIconDiv.style.display = "block";
    } else {
        billingDiv.style.display = "none";
        pencilIconDiv.style.display = "none";
    }
});
//end

//shipping
const Shippingbutton = document.querySelector(".shipping-btn");
const shippingDiv = document.querySelector(".shipping");
const shippingpencilIconDiv = document.querySelector(".shipping-pencil-icon");

Shippingbutton.addEventListener("click", function() {
    if (shippingDiv.style.display === "none") {
        shippingDiv.style.display = "block";
        shippingpencilIconDiv.style.display = "block";
    } else {
        shippingDiv.style.display = "none";
        shippingpencilIconDiv.style.display = "none";
    }
});
//end
</script>


@endsection