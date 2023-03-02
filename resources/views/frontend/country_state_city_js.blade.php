
<script>
function displayPaypal() {
    let paypalcheckbox = document.getElementById("paypal");
    let creditcardcheckbox = document.getElementById("creditcard");
    document.getElementById("creditcard-input").style.display = "none";
    document.getElementById("payment-form").classList.remove("require-validation");
    paypalcheckbox.value = 'PayPal';
    creditcardcheckbox.value = '';


}

function displayCreditcard() {
    let paypalcheckbox = document.getElementById("paypal");
    let creditcardcheckbox = document.getElementById("creditcard");
    document.getElementById("creditcard-input").style.display = "block";
    document.getElementById("payment-form").classList.add("require-validation");
    paypalcheckbox.value = '';
    creditcardcheckbox.value = 'Credit Card';


}
</script>



<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
$(function() {

    $('input[name="paymentOption"]').on('change', function() {
        if (this.value === 'Credit Card') {

            var $form = $(".require-validation");
            $('form.require-validation').on('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('d-none');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('d-none');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('d-none')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        }
    });
});
</script>


<script>
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>




<script>
$(document).ready(function() {
    $('.country-dd').on('change', function() {
        var idCountry = this.value;
        $(".state-dd").html('');
        $.ajax({
            url: "{{url('api/fetch-states')}}",
            type: "POST",
            data: {
                country_id: idCountry,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('.state-dd').html('<option value="">Select State</option>');
                $.each(result.states, function(key, value) {
                    $(".state-dd").append('<option value="' + value
                        .id + '">' + value.state_name + '</option>');
                });
                $('.city-dd').html('<option value="">Select City</option>');
            }
        });
    });
    $('.state-dd').on('change', function() {
        var idState = this.value;
        $(".city-dd").html('');
        $.ajax({
            url: "{{url('api/fetch-cities')}}",
            type: "POST",
            data: {
                state_id: idState,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(res) {
                $('.city-dd').html('<option value="">Select City</option>');
                $.each(res.cities, function(key, value) {
                    $(".city-dd").append('<option value="' + value
                        .id + '">' + value.city_name + '</option>');
                });
            }
        });
    });
});
</script>





<script>
$(document).ready(function() {


});
</script>


@include('frontend.footer')