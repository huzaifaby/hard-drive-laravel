<script>
$(document).ready(function() {

    'use strict';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    loadcart();

    //add to cart
    // Add to cart
    $('.add-to-cart').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var quantities = $('#quantities').val() || 1;
        $.ajax({
            url: '/cart/add',
            method: 'POST',
            data: {
                id: id,
                quantities: quantities,
            },
            success: function(data) {
                toastr.success('Successfully Added To Cart', '', {
                    "progressBar": true,
                    "timeOut": 1500
                });

                // loadcart();
                window.location.href = "/cart";
            },
            error: function(xhr, status, error) {
                // Handle CSRF token mismatch error
                if (xhr.status === 419) {
                    location.reload();
                }
            }
        });
    });
    //end


    // load cart
    function loadcart() {
        $.ajax({
            url: "/load-cart-data",
            method: "GET",
            success: function(response) {
                $('.cart-count').html(response.total_product_count);
                $('.sub-total').html('$' + response.subtotal.toFixed(2));
                let subtotals = response.subtotal.toFixed(2);
                let cart = response.cart;
                let cartTable = $('#cartTable');
                let checkoutTable = $('#checkoutTable');
                let cartTableMobile = $('#cartTableMobile');
                let cartpage = $('#cartpage');
                cartTable.html('');
                cartTableMobile.html('');
                cartpage.html('');
                checkoutTable.html('');
                let coupon = response && response.coupon;

                if (coupon) {
                    console.log(coupon);
                    $('.coupon_code').html();

                    if (Object.keys(coupon).length === 0) {
                        $("#couponcode").hide();
                    } else {
                        $("#couponcode").show();
                        $('.coupon_code').html(coupon.coupon_code);
                    }
                }

                if (cart) {
                    if (Object.keys(cart).length === 0) {
                        $(".no_product").show();
                        $(".cart-table").hide();
                        return;
                    } else {
                        $(".no_product").hide();
                        $(".cart-table").show();
                        for (let id in cart) {
                            let details = cart[id];
                            let productTitle = details['product_title'];
                            let quantity = details['quantity'];
                            let productPrice = details['product_price'];
                            let productImage = details['product_image'];

                            var cartShowUrl = "{{ route('cart.show') }}";

                            let row = `<tr>
              <td><a href="${cartShowUrl}" class="text-dark">${productTitle.substr(0, 30)}<br>
                <p class="mb-0">${quantity} x $${productPrice}</p>
              </a></td>
                <td><a href="{{ route('cart.show') }}">
                 <img src="{{ asset('image/products/') }}/${productImage}" loading="lazy" width="75" alt=""></a></td>
                <td><a data-id="${id}" class="remove-from-cart" href="#">
                <i class="bx bx-trash text-danger fs-5"></i></a></td>
                 </tr>`;

                            cartTable.append(row);
                            cartTableMobile.append(row);


                            let row1 = `
                    <tr>
                    <th><img src="{{ asset('image/products/') }}/${productImage}" loading="lazy" width="180" alt=""></th>
                    <td class="align-middle">${productTitle}</td>
                    <td class="align-middle">$${productPrice}</td>
                    <td class="align-middle">
                        <!-- Inc / Dec start  -->
                    
                        <!-- Inc / Dec start  -->
                        <div>
                            <div class="d-flex">
                                <div class="border px-3 py-2 rounded-start">
                                    <span class="bg-white  minus-button" data-id="${id}" id="minus-button"><button class="bg-white">-</button></span>
                                </div>
                                <div class="border-top px-3 py-2  border-bottom">
                                <p class="card-text-para mb-0">${quantity}</p>
                                </div>
                                <div class="border px-3 py-2 rounded-end">
                                    <span class="bg-white plus-button" data-id="${id}" id="plus-button"><button class="bg-white">+</button></span>
                                </div>
                            </div>
                        </div>
                        <!-- Inc / Dec end  -->
                      
                    </td>
                    <td class="align-middle">$${(quantity * productPrice).toFixed(2)}/-</td>
                    <td class="align-middle"><a href="#" class="remove-from-cart" data-id="${id}"><i class="bx bx-trash text-danger fs-4"></i></a></td>
                    </tr>
                `;
                            cartpage.append(row1);

                            let row2 = `
                            <tr>
                                        <td>Product</td>
                                        <td class="text-end">Total</td>
                                    </tr>
                    <tr>
                    <td>${quantity} ×
                    ${productTitle}...</td>
                    <td class="text-end">${(quantity * productPrice).toFixed(2)}/-
                    </td>
                    </tr>
                    `;
                    checkoutTable.append(row2);
                        }

                        let row3 = `

                       <tr>
                       <td>Subtotal</td>
                       <td class="text-end">$${subtotals}/-</td>
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
                     <td class="text-end">$${subtotals}/-</td>
                    </tr>
                            `;
                   checkoutTable.append(row3);

                 let subTotalRow = `<tr class="border-bottom border-top">
            <td colspan="3" class="text-center">Subtotal: $${subtotals}</td>
                </tr>
                 <tr>
                <td colspan="3"><a href="{{ route('cart.show') }}" class="square-block-btn">View Cart</a></td>
             </tr>
              <tr>
             <td colspan="3"><a href="{{ route('checkout.show') }}" class="square-block-btn bg-secondary">Checkout</a></td>
             </tr>`;

                        cartTable.append(subTotalRow);
                        cartTableMobile.append(subTotalRow);
                    }
                }
            }
        });
    }
    //end




    //remove cart
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


                loadcart();

            }
        });
    });
    //end

    //quantity plus button
    $(document).on('click', '#plus-button', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            url: '/update-cart/' + id,
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "quantity": 1
            },
            success: function(response) {
                loadcart();
            }
        });
    });
    //end

    ////quantity minus button
    $(document).on('click', '#minus-button', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            url: '/update-cart/' + id,
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "quantity": -1
            },
            success: function(response) {
                loadcart();
            }
        });
    });
    //end

    //cupon
    $('.apply_coupon').click(function(e) {
        e.preventDefault();
        let coupon_code = $('#coupon_code').val();
        let total_price = $('#total_price').val();
        $.ajax({
            url: '/cart/coupon',
            method: 'POST',
            data: {
                total_price: total_price,
                coupon_code: coupon_code,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('.total_price').html(response.discount);
                $('.total_price').val(response.discount);


                toastr.success('Coupon applied Successfully', '', {
                    "progressBar": true,
                    "timeOut": 1500
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status === 400) {
                    if (jqXHR.responseJSON.error === 'Coupon already applied') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Coupon already applied!',
                        });
                    } else if (jqXHR.responseJSON.error === 'Coupon has expired') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Coupon has expired!',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Invalid Coupon Code!',
                        });
                    }
                }
            }
        });
    });
    //end

    //searchbar
    $('.searchName').on('keyup', function() {
        var query = $(this).val();

        if (query.length > 0) {
            $.ajax({
                url: "{{ url('autocomplete-search') }}",
                type: "GET",
                data: {
                    'query': query
                },
                success: function(data) {
                    $('#search_list').css('display', 'block');
                    $('#search_list').html('');
                    $.each(data, function(key, value) {
                        $('#search_list').append(
                            '<div class="container"><div class="row align-items-center"><div class="col-auto"><a href="/product-detail/' +
                            value.product_slug +
                            '"><img width="50" src="{{ asset("image/products" ) }}/' +
                            value.product_image + '"></div>' +
                            '<div class="col">' + value.product_title +
                            '<span class="d-block">Price: ' + value
                            .product_price + '</span></a></div></div></div>');
                    });
                }
            });
        } else {
            $('#search_list').css('display', 'none');
        }
    });
    $("#searchProduct").click(function() {
        window.location.href = "/search?search=" + $(".searchName").val();
    });

    $("#searchblog").click(function() {
        window.location.href = "/blog-search?search=" + $(".searchBlog").val();
    });
    //end

});
</script>