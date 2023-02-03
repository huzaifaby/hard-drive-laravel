<script>
$(document).ready(function() {

   

    //show orders value in update form
    $(document).on('click', '.update_orders_form', function() {
        let id = $(this).data('id');
        let title = $(this).data('title');
        let price = $(this).data('price');
        let sku = $(this).data('sku');
        let condition = $(this).data('condition');
        let description = $(this).data('description');
        let slug = $(this).data('slug');
        let metatitle = $(this).data('metatitle');
        let metadescription = $(this).data('metadescription');
        let category_name = $(this).data('categoryname');
        let category_id = $(this).data('categoryid');
        let brand_id = $(this).data('brandid');
        let brand_name = $(this).data('brandname');
        let availability = $(this).data('availability');
        let product_quantity = $(this).data('quantity');
        let availability_name;
        if (availability == 0) {
            availability_name = 'Out of Stock';
        } else {
            availability_name = 'In Stock';
        }


        $('#up_id').val(id);
        $('#up_product_title').val(title);
        $('#up_product_price').val(price);
        $('#up_product_slug').val(slug);
        $('#up_product_sku').val(sku);
        $('#up_product_condition').val(condition);
        CKEDITOR.instances['up_product_description'].setData(description);
        $('#up_product_meta_title').val(metatitle);
        $('#up_product_meta_description').val(metadescription);
        $('#up_category_id').append('<option hidden selected value="' + category_id + '">' +
            category_name + '</option>');
        $('#up_brand_id').append('<option hidden selected value="' + brand_id + '">' +
            brand_name + '</option>');
        $('#up_availability').append('<option hidden selected value="' + availability + '">' +
            availability_name + '</option>');
        $('#up_product_quantity').val(product_quantity);

    });

    //update orders  data
    $(document).on('click', '.update_product', function(e) {
        e.preventDefault();
        let up_id = $('#up_id').val();
        let up_product_title = $('#up_product_title').val();
        let up_product_price = $('#up_product_price').val();
        let up_product_slug = $('#up_product_slug').val();
        let up_product_sku = $('#up_product_sku').val();
        let up_product_condition = $('#up_product_condition').val();
        let up_product_description = CKEDITOR.instances['up_product_description'].getData();
        let up_product_meta_title = $('#up_product_meta_title').val();
        let up_product_meta_description = $('#up_product_meta_description').val();
        let up_category_id = $('#up_category_id').val();
        let up_brand_id = $('#up_brand_id').val();
        let up_availability = $('#up_availability').val();
        let up_product_quantity = $('#up_product_quantity').val();
        let up_image = $('#up_image')[0].files[0];

        var formData = new FormData();
        formData.append('up_id', up_id);
        formData.append('up_product_title', up_product_title);
        formData.append('up_product_price', up_product_price);
        formData.append('up_product_slug', up_product_slug);
        formData.append('up_product_sku', up_product_sku);
        formData.append('up_product_condition', up_product_condition);
        formData.append('up_product_description', up_product_description);
        formData.append('up_product_meta_title', up_product_meta_title);
        formData.append('up_product_meta_description', up_product_meta_description);
        formData.append('up_category_id', up_category_id);
        formData.append('up_brand_id', up_brand_id);
        formData.append('up_availability', up_availability);
        formData.append('up_product_quantity', up_product_quantity);
        formData.append('up_image', up_image);


        $.ajax({
            url: "{{ route('update.orders') }}",
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status == 'success') {

                    Swal.fire(
                        'Update Successfully!',
                        '',
                        'success'
                    )

                    $('#updateModal').modal('hide');
                    $('#updateProductForm')[0].reset();
                    $('.table').load(location.href + ' .table');

                }
            },
            error: function(err) {
                let error = err.responseJSON;
                $.each(error.errors, function(index, value) {
                    $('.errMsgContainer').append('<span class="text-danger">' +
                        value + '</span>' + '<br>');
                });
            }
        });
    })




    //Featured orders  data
    $(document).on('click', '.featured_orders', function(e) {
        e.preventDefault();
        let product_id = $(this).data('id');
        let featured = $(this).data('featured');


        $.ajax({
            url: "{{ route('orders.status') }}",
            method: 'post',
            data: {
                product_id: product_id,
                featured: featured
            },
            success: function(res) {
                if (res.status == 'success') {
                    Swal.fire(
                        'Updated Successfully!',
                        '',
                        'success'
                    )
                    $('.table').load(location.href + ' .table');

                }
            }
        });

    })







    //delete orders  data
    $(document).on('click', '.delete_product', function(e) {
        e.preventDefault();
        let product_id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('delete.orders') }}",
                    method: 'post',
                    data: {
                        product_id: product_id
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            Swal.fire(
                                'Deleted Successfully!',
                                '',
                                'success'
                            )
                            $('.table').load(location.href + ' .table');
                        }
                    }
                });
            }
        });
    });


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
});
</script>


