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

