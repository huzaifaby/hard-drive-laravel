

<script>
$(document).ready(function() {

    //add category
    $(document).on('click', '.add_subcategory', function(e) {
        e.preventDefault();
        let category_id = $('#category_id').val();
        let sub_category_name = $('#sub_category_name').val();
        let sub_category_slug = $('#sub_category_slug').val();
        let image = $('#image')[0].files[0];

        var formData = new FormData();
        formData.append('category_id', category_id);
        formData.append('sub_category_name', sub_category_name);
        formData.append('sub_category_slug', sub_category_slug);
        formData.append('image', image);

        $.ajax({
            url: "{{ route('add.subcategory') }}",
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
                    $('#addSubCategoryForm')[0].reset();
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

    //show sub category value in update form
    $(document).on('click', '.update_subcategory_form', function() {
        let category_id = $(this).data('categoryid');
        let category_name = $(this).data('categoryname');
        let sub_category_id = $(this).data('id');
        let sub_category_name = $(this).data('name');
        let sub_category_slug = $(this).data('slug');


        $('#up_category_id').append('<option hidden selected value="' + category_id + '">' +
         category_name + '</option>');
        $('#up_sub_category_id').val(sub_category_id);
        $('#up_sub_category_name').val(sub_category_name);
        $('#up_sub_category_slug').val(sub_category_slug);

    });

    //update category  data
    $(document).on('click', '.update_subcategory', function(e) {
        e.preventDefault();
        let up_category_id = $('#up_category_id').val();
        let up_sub_category_id = $('#up_sub_category_id').val();
        let up_sub_category_name = $('#up_sub_category_name').val();
        let up_sub_category_slug = $('#up_sub_category_slug').val();
        let up_sub_category_image = $('#up_sub_category_image')[0].files[0];

        var formData = new FormData();
        formData.append('up_category_id', up_category_id);
        formData.append('up_sub_category_id', up_sub_category_id);
        formData.append('up_sub_category_name', up_sub_category_name);
        formData.append('up_sub_category_slug', up_sub_category_slug);
        formData.append('up_sub_category_image', up_sub_category_image);


        $.ajax({
            url: "{{ route('update.subcategory') }}",
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
                    $('#updateSubCategoryForm')[0].reset();
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
    $(document).on('click', '.delete_subcategory', function(e) {
    e.preventDefault();
    let category_id = $(this).data('id');

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
                url: "{{ route('delete.subcategory') }}",
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
    });
});


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

    //search sub category

    $(document).on('keyup', function(e) {
        e.preventDefault();
        let search_string = $('#search').val();
        $.ajax({
            url: "{{ route('search.subcategory') }}",
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