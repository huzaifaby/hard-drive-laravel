<script>
$(document).ready(function() {

    //delete reviews  data
    $(document).on('click', '.delete_blogs', function(e) {
        e.preventDefault();
        let blog_id = $(this).data('id');
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
                    url: "{{ route('delete.blog') }}",
                    method: 'post',
                    data: {
                        blog_id: blog_id
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
        blog(page)
    })

    function blog(page) {
        $.ajax({
            url: "/pagination/paginate-blog?page=" + page,
            success: function(res) {
                $('.table-data').html(res);
            }
        })
    }

    //search reviews

    $(document).on('keyup', function(e) {
        e.preventDefault();
        let search_string = $('#search').val();
        $.ajax({
            url: "{{ route('search.blog') }}",
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


