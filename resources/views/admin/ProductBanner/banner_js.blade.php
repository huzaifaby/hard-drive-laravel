

<script>
$(document).ready(function() {

    //add banner
    $(document).on('click', '.add_banner', function(e) {
        e.preventDefault();
        let banner_name = $('#banner_name').val();
        let banner_slug = $('#banner_slug').val();
        let banner_description = $('#banner_description').val();
        let image = $('#image')[0].files[0];

        var formData = new FormData();
        formData.append('banner_name', banner_name);
        formData.append('banner_slug', banner_slug);
        formData.append('banner_description', banner_description);
        formData.append('image', image);

        $.ajax({
            url: "{{ route('add.banner') }}",
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
                    $('#addBannerForm')[0].reset();
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

    //show banner value in update form
    $(document).on('click', '.update_banner_form', function() {
        let banner_id = $(this).data('id');
        let banner_name = $(this).data('name');
        let banner_slug = $(this).data('slug');
        let description = $(this).data('description');

        $('#up_banner_id').val(banner_id);
        $('#up_banner_name').val(banner_name);
        $('#up_banner_slug').val(banner_slug);
        $('#up_banner_description').val(description);

    });

    //update banner  data
    $(document).on('click', '.update_banner', function(e) {
        e.preventDefault();
        let up_banner_id = $('#up_banner_id').val();
        let up_banner_name = $('#up_banner_name').val();
        let up_banner_slug = $('#up_banner_slug').val();
        let up_banner_description = $('#up_banner_description').val();
        let up_banner_image = $('#up_banner_image')[0].files[0];

        var formData = new FormData();
        formData.append('up_banner_id', up_banner_id);
        formData.append('up_banner_name', up_banner_name);
        formData.append('up_banner_slug', up_banner_slug);
        formData.append('up_banner_description', up_banner_description);
        formData.append('up_banner_image', up_banner_image);


        $.ajax({
            url: "{{ route('update.banner') }}",
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
                    $('#updateBannerForm')[0].reset();
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



    //delete banner  data
    $(document).on('click', '.delete_banner', function(e) {
    e.preventDefault();
    let banner_id = $(this).data('id');
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
                url: "{{ route('delete.banner') }}",
                method: 'post',
                data: {
                    banner_id: banner_id
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
        banner(page)
    })

    function banner(page) {
        $.ajax({
            url: "/pagination/paginate-banner?page=" + page,
            success: function(res) {
                $('.table-data').html(res);
            }
        })
    }

    //search banner

    $(document).on('keyup', function(e) {
        e.preventDefault();
        let search_string = $('#search').val();
        $.ajax({
            url: "{{ route('search.banner') }}",
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