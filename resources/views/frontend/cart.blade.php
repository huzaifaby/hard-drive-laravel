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
                    <table class="table huzaifa table-borderless">
                        <thead class="border border-bottom border-0">
                            <tr>
                                <td colspan="2">Product</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Total</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        @if(!empty($cart))
                            @foreach($cart as $id => $details)
                            <tr>
                                <th><img src="{{ asset('image/products/'.$details['product_image']) }}" loading="lazy"
                                        width="180" alt=""></th>
                                <td class="align-middle">{{ $details['product_title'] }}
                                </td>
                                <td class="align-middle">${{ $details['product_price'] }}</td>
                                <td class="align-middle">
                                    <!-- Inc / Dec start  -->
                                    <ul class="list-group list-group-horizontal">
                                        <li class="list-group-item "><button class="bg-white plus-button"
                                                data-id="{{ $id }}" id="plus-button"> <i class="bx bx-plus"></i>
                                            </button></li>
                                        <li class="list-group-item">
                                            <p class="card-text-para mb-0">{{ $details['quantity'] }}</p>
                                        </li>
                                        <li class="list-group-item"><button class="bg-white minus-button"
                                                data-id="{{ $id }}" id="minus-button"> <i class="bx bx-minus"></i>
                                            </button></li>
                                    </ul>
                                    <!-- Inc / Dec end  -->
                                </td>
                                <td class="align-middle">${{ $details['quantity'] * $details['product_price'] }}/-</td>
                                <td class="align-middle"><a href="#" class="remove-from-cart" data-id="{{ $id }}"><i
                                            class="bx bx-trash text-danger fs-4"></i></a></td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- table end  -->
            </div>
            <div class="col-md-4">

                <!-- side card  -->
                <div class="card bg-light border border-0 px-4">
                    <div class="card-body">
                        <h3 class="p-2 border-bottom">Cart totals</h3>
                        <div class="table-responsive">
                            <table class="table huzaifa1">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="text-end">${{$subtotal}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td class="text-end pb-4">0 tax</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td class="text-end pb-4">${{$subtotal}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('checkout.show') }}" class="square-block-btn">Proceed to Checkout</a>
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
$(document).on('click', '.remove-from-cart', function(e) {
    e.preventDefault();
    var id = $(this).data('id');

    $.ajax({
        url: '/cart/remove',
        method: 'POST',
        data: {
            id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(data) {
          

            location.reload();

        }
    });
});
</script>


<script>
document.querySelectorAll(".plus-button").forEach(function(button) {
    button.addEventListener("click", function() {
        var id = button.getAttribute("data-id");
        updateQuantity(id, 1);
    });
});

document.querySelectorAll(".minus-button").forEach(function(button) {
    button.addEventListener("click", function() {
        var id = button.getAttribute("data-id");
        updateQuantity(id, -1);
    });
});

function updateQuantity(id, quantity) {
    $.ajax({
        type: "PATCH",
        url: `/cart/${id}`,
        data: {
            _token: '{{ csrf_token() }}',
            quantity: quantity
        },
        success: function(response) {
            // update the quantity and total price on the page
            // $('.huzaifa').load(location.href + ' .huzaifa');
            
            location.reload();

        },
        error: function(error) {
            console.log(error);
        }
    });
}
</script>


@include('frontend.footer')