<script>
$(document).ready(function() {
    $('.minus').click(function() {
        var $input = $(this).parent().siblings().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function() {
        var $input = $(this).parent().siblings().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });



const stars = document.querySelectorAll('.star');

for (let i = 0; i < stars.length; i++) {
    stars[i].addEventListener('mouseover', function() {
        for (let j = 0; j <= i; j++) {
            // stars[j].style.color = "orange";
            stars[j].classList.add("text-warning");
            
        }
    });
    stars[i].addEventListener('mouseout', function() {
        for (let j = 0; j <= i; j++) {
            stars[j].classList.remove("text-warning");

        }
    });

    stars[i].addEventListener('click', function() {
        for (let j = 0; j <= i; j++) {
            stars[j].classList.add("active");
            stars[j].classList.add("text-warning");

        }
        for (let j = i + 1; j < stars.length; j++) {
            stars[j].classList.remove("active");
            stars[j].classList.remove("text-warning");

        }
    });
}

$('.star').click(function() {

    var rating = $(this).index() + 1;
    var activeStars = $(this).siblings('.active').length + 1;


    $(this).prevAll().addClass('active');
    $(this).addClass('active');
    $(this).nextAll().removeClass('active');

    $('#rating').val(activeStars);

});

$('.add_review').click(function() {

    let product_id = $('#product_id').val();
    let user_name = $('#user_name').val();
    let user_email = $('#user_email').val();
    let review_description = $('#review_description').val();
    let rating = $('#rating').val();

    $.ajax({
        url: '/star-ratings',
        type: 'POST',
        data: {
            _token: "{{ csrf_token() }}",
            rating: rating,
            product_id: product_id,
            user_name: user_name,
            user_email: user_email,
            review_description: review_description,
        },
        success: function(response) {
            location.reload();

        },
        error: function(error) {
            console.error(error);
        },
    });
});
});
</script>