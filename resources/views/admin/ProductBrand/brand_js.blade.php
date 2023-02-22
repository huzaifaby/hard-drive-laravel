

<script>
$(document).ready(function() {

    //add brand
    $(document).on('click', '.add_brand', function(e) {
        e.preventDefault();
        let brand_name = $('#brand_name').val();
        let brand_slug = $('#brand_slug').val();
        let brand_description = $('#brand_description').val();
        let image = $('#image')[0].files[0];

        var formData = new FormData();
        formData.append('brand_name', brand_name);
        formData.append('brand_slug', brand_slug);
        formData.append('brand_description', brand_description);
        formData.append('image', image);

        $.ajax({
            url: "{{ route('add.brand') }}",
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
                    $('#addBrandForm')[0].reset();
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

    //show brand value in update form
    $(document).on('click', '.update_brand_form', function() {
        let brand_id = $(this).data('id');
        let brand_name = $(this).data('name');
        let brand_slug = $(this).data('slug');
        let description = $(this).data('description');

        $('#up_brand_id').val(brand_id);
        $('#up_brand_name').val(brand_name);
        $('#up_brand_slug').val(brand_slug);
        $('#up_brand_description').val(description);

    });

    //update brand  data
    $(document).on('click', '.update_brand', function(e) {
        e.preventDefault();
        let up_brand_id = $('#up_brand_id').val();
        let up_brand_name = $('#up_brand_name').val();
        let up_brand_slug = $('#up_brand_slug').val();
        let up_brand_description = $('#up_brand_description').val();
        let up_brand_image = $('#up_brand_image')[0].files[0];

        var formData = new FormData();
        formData.append('up_brand_id', up_brand_id);
        formData.append('up_brand_name', up_brand_name);
        formData.append('up_brand_slug', up_brand_slug);
        formData.append('up_brand_description', up_brand_description);
        formData.append('up_brand_image', up_brand_image);


        $.ajax({
            url: "{{ route('update.brand') }}",
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
                    $('#updateBrandForm')[0].reset();
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



    //delete brand  data
    $(document).on('click', '.delete_brand', function(e) {
        e.preventDefault();
        let brand_id = $(this).data('id');
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
                    url: "{{ route('delete.brand') }}",
                    method: 'post',
                    data: {
                        brand_id: brand_id
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
        brand(page)
    })

    function brand(page) {
        $.ajax({
            url: "/pagination/paginate-brand?page=" + page,
            success: function(res) {
                $('.table-data').html(res);
            }
        })
    }

    //search brand

    $(document).on('keyup', function(e) {
        e.preventDefault();
        let search_string = $('#search').val();
        $.ajax({
            url: "{{ route('search.brand') }}",
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