<script>
    $(document).ready(function() {

        'use strict';

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.wishlist-btn').click(function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/wishlist/add',
        method: 'POST',
        data: {
            id: id,
        },
        success: function(response) {
            if (response.success) {
                toastr.success('Successfully Added To Wishlist', '', {
                    "progressBar": true,
                    "timeOut": 1500
                });
            } else if (response.error) {
                toastr.error(response.error, '', {
                    "progressBar": true,
                    "timeOut": 1500
                });
            }
        },
        error: function(error) {
            toastr.error('Error Adding Product To Wishlist', '', {
                "progressBar": true,
                "timeOut": 1500
            });
        }
    });
});





//wishlist
$('.remove_from_wishlist').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: "{{ route('delete.wishlist') }}",
            method: 'POST',
            data: {
                id: id,
            },
            success: function(data) {
                location.reload();

            }
        });
    });
//end

});
</script>