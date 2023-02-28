@include('frontend.header')


<div class="cart-wrapper mt-4">
    <div class="container">

        <div class="row">
        
            <div class="col-md-12">

                <!-- category box start  -->
                <div class="catBoxes">

                    <h3 class=" pb-2 text-center">{{$PrivacyPolicy->title}}</h3>
                 
                    {!! $PrivacyPolicy->description !!}

                  
                </div>
                <!-- category box end  -->

            </div>
        </div>

    </div>
</div>

@include('frontend.footer')