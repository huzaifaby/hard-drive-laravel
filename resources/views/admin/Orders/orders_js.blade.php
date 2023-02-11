<script>
$(document).ready(function() {



    //show orders value in update form
    $(document).on('click', '.orders_view', function() {
        let id = $(this).data('id');
        let orderStatus = $(this).data('status');
        let address = $(this).data('address');
        let email = $(this).data('email');
        let phone = $(this).data('phone');
        let payment = $(this).data('payment');

        $('a.update_status').attr('data-id', id);



        $('a.edit').attr('href', 'edit-orders/' + id);
        $('#order-no').html("Order #" + id);
        $('#order-status').html(orderStatus);
        $('#order-address').html(address);
        $('#order-email').html(email);
        $('#order-phone').html(phone);
        $('#order-payment').html(payment);
        $.ajax({
            type: "GET",
            url: "/order-products/" + id,
            success: function(data) {
                console.log(data);
                $.each(data, function(index, orderProduct) {
                    let getproductName = orderProduct.product_name;
                    productName = getproductName.substring(0, 30) + '...';
                    let cost = orderProduct.price;
                    let qty = orderProduct.qty;
                    let row = '<tr><td>' + productName + '</td><td>' +
                        qty + '</td><td>' + cost + '</td></tr>';
                    $('#quick_view').append(row);
                });
            }

        });


    });




    //Featured orders  data
    $(document).on('click', '.update_status', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let status = $(this).data('status');


        $.ajax({
            url: "{{ route('orders.status') }}",
            method: 'post',
            data: {
                id: id,
                status: status
            },
            success: function(res) {
                if (res.status == 'success') {
                    Swal.fire(
                        'Updated Successfully!',
                        '',
                        'success'
                    )
                    location.reload();

                }
            }
        });

    })

    //pagination
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1]
        orders(page)
    })

    function orders(page) {
        $.ajax({
            url: "/pagination/paginate-data?page=" + page,
            success: function(res) {
                $('.table-data').html(res);
            }
        })
    }

    //search orders

    $(document).on('keyup', function(e) {
        e.preventDefault();
        let search_string = $('#search').val();
        $.ajax({
            url: "{{ route('search.orders') }}",
            method: 'GET',
            data: {
                search_string: search_string
            },
            success: function(res) {
                $('.table-data').html(res);
                if (res.status == 'nothing_found') {
                    $('.table-data').html('<span class="text-danger">' + 'Nothing Found' +
                        '</span>');
                }
            }
        });
    })

    $(document).on('click', '#close-btn', function(e) {

        $('#updateOrdersForm')[0].reset();
        $('#updateModal').modal('hide');

        location.reload();
    })
});
</script>