
<script>
$(document).ready(function() {

    //add product
    $(document).on('click', '.add_product', function(e) {
        e.preventDefault();
        let product_title = $('#product_title').val();
        let product_slug = $('#product_slug').val();
        let product_price = $('#product_price').val();
        let product_sku = $('#product_sku').val();
        let product_condition = $('#product_condition').val();
        let product_description = $('#product_description').val();
        let product_meta_title = $('#product_meta_title').val();
        let product_meta_description = $('#product_meta_description').val();
        let image = $('#image')[0].files[0];

        let formData = new FormData();
        formData.append('product_title', product_title);
        formData.append('product_slug', product_slug);
        formData.append('product_price', product_price);
        formData.append('product_sku', product_sku);
        formData.append('product_condition', product_condition);
        formData.append('product_description', product_description);
        formData.append('product_meta_title', product_meta_title);
        formData.append('product_meta_description', product_meta_description);
        formData.append('image', image);

        $.ajax({
            url: "{{ route('add.product') }}",
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status == 'success') {

                    Swal.fire(
                        'Added Successfully!',
                        '',
                        'success'
                    )

                    $('#addModal').modal('hide');
                    $('#addProductForm')[0].reset();
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
    });

    //show product value in update form
    $(document).on('click', '.update_product_form', function() {
        let id = $(this).data('id');
        let title = $(this).data('title');
        let price = $(this).data('price');
        let sku = $(this).data('sku');
        let condition = $(this).data('condition');
        let description = $(this).data('description');
        let slug = $(this).data('slug');
        let metatitle = $(this).data('metatitle');
        let metadescription = $(this).data('metadescription');

      


        $('#up_id').val(id);
        $('#up_product_title').val(title);
        $('#up_product_price').val(price);
        $('#up_product_slug').val(slug);
        $('#up_product_sku').val(sku);
        $('#up_product_condition').val(condition);
        $('#up_product_description').val(description);
        $('#up_product_meta_title').val(metatitle);
        $('#up_product_meta_description').val(metadescription);
    });

    //update product  data
    $(document).on('click', '.update_product', function(e) {
        e.preventDefault();
        let up_id = $('#up_id').val();
        let up_product_title = $('#up_product_title').val();
        let up_product_price = $('#up_product_price').val();
        let up_product_slug = $('#up_product_slug').val();
        let up_product_sku = $('#up_product_sku').val();
        let up_product_condition = $('#up_product_condition').val();
        let up_product_description = $('#up_product_description').val();
        let up_product_meta_title = $('#up_product_meta_title').val();
        let up_product_meta_description = $('#up_product_meta_description').val();
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
        formData.append('up_image', up_image);


        $.ajax({
            url: "{{ route('update.product') }}",
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



    //delete product  data
    $(document).on('click', '.delete_product', function(e) {
        e.preventDefault();
        let product_id = $(this).data('id');

        if (confirm('Are you sure to delete product??')) {
            $.ajax({
                url: "{{ route('delete.product') }}",
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
    })

    //pagination
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1]
        product(page)
    })

    function product(page) {
        $.ajax({
            url: "/pagination/paginate-data?page=" + page,
            success: function(res) {
                $('.table-data').html(res);
            }
        })
    }

    //search product

    $(document).on('keyup', function(e) {
        e.preventDefault();
        let search_string = $('#search').val();
        $.ajax({
            url: "{{ route('search.product') }}",
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