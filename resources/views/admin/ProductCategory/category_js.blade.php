

<script>
$(document).ready(function() {

    //add category
    $(document).on('click', '.add_category', function(e) {
        e.preventDefault();
        let category_name = $('#category_name').val();
        let category_slug = $('#category_slug').val();
        let image = $('#image')[0].files[0];

        var formData = new FormData();
        formData.append('category_name', category_name);
        formData.append('category_slug', category_slug);
        formData.append('image', image);

        $.ajax({
            url: "{{ route('add.category') }}",
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
                    $('#addCategoryForm')[0].reset();
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

    //show category value in update form
    $(document).on('click', '.update_category_form', function() {
        let id = $(this).data('id');
        let name = $(this).data('name');
        let detail = $(this).data('detail');

        $('#up_id').val(id);
        $('#up_name').val(name);
        $('#up_detail').val(detail);

    });

    //update category  data
    $(document).on('click', '.update_category', function(e) {
        e.preventDefault();
        let up_category_id = $('#up_category_id').val();
        let up_category_name = $('#up_category_name').val();
        let up_category_slug = $('#up_category_slug').val();
        let up_category_image = $('#up_category_image')[0].files[0];

        var formData = new FormData();
        formData.append('up_category_id', up_category_id);
        formData.append('up_category_name', up_category_name);
        formData.append('up_category_slug', up_category_slug);
        formData.append('up_category_image', up_category_image);

        console.log(formData);

        $.ajax({
            url: "{{ route('update.category') }}",
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
                    $('#updateCategoryForm')[0].reset();
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



    //delete category  data
    $(document).on('click', '.delete_category', function(e) {
        e.preventDefault();
        let category_id = $(this).data('id');

        if (confirm('Are you sure to delete category ??')) {
            $.ajax({
                url: "{{ route('delete.category') }}",
                method: 'post',
                data: {
                    category_id: category_id
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
        category(page)
    })

    function category(page) {
        $.ajax({
            url: "/pagination/paginate-data?page=" + page,
            success: function(res) {
                $('.table-data').html(res);
            }
        })
    }

    //search category

    $(document).on('keyup', function(e) {
        e.preventDefault();
        let search_string = $('#search').val();
        $.ajax({
            url: "{{ route('search.category') }}",
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