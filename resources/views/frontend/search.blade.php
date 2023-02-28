@include('frontend.header')


<div class="cart-wrapper ">
    <div class="container">

        <!-- breadcrumb start  -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>
        <!-- breadcrumb end  -->

        <div class="row">
            <div class="col-md-3">
                <div class="accordion" id="accordionExample">

                    <div class="card-title mt-3">Filters</div>

                    <button class="accordion-button text-dark shadow-none bg-light" type="button">
                        Price
                    </button>

                    <div class="multi-range-field my-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text"></span>
                            <input type="text" class="form-control shadow-none" name="searchPrice" id="price-display"
                                placeholder="0 - 10000">
                        </div>
                        <input id="price-slider" class="multi-range w-100" type="range" min="0" max="10000" step="100"
                            value="0">

                        <button type="submit" id="searchProductbyPrice" class="square-block-btn">Filter</button>
                    </div>


                </div>
            </div>
            <div class="col-md-9">

                <!-- box start  -->



                <div class="row">
                    <?php
                    
                    $test = $app->make('url')->to('/');
                    ?>

                    @php
                    $user_id = Auth::guard('customer')->user() ? Auth::guard('customer')->user()->id :
                    null;
                    @endphp


                    @foreach($data as $key=>$datas)
                    @php
                    $bg_color = 'none';
                    if ($user_id) {
                    $in_wishlist = DB::table('wishlists')
                    ->where('user_id', $user_id)
                    ->where('product_id', $datas->id)
                    ->exists();
                    $bg_color = $in_wishlist ? 'red' : 'none';
                    }
                    @endphp

                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="{{ url('/product-detail/' . $datas->product_slug) }}">


                                    <div class="wishlist-container">
                                        @if ($user_id)
                                        <button class="wishlist-btn" data-id="{{ $datas->id }}">
                                            <svg class="wishlist-icon" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="{{ $bg_color }}" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" stroke="currentColor"
                                                class="feather feather-heart color-filled">
                                                <path
                                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                </path>
                                            </svg>
                                        </button>
                                        @endif
                                    </div>
                                    <img src="{{ asset('image/products/'.$datas->product_image) }}"
                                        class="img-fluid mb-3" loading="lazy" alt="...">
                                    <h5 class="card-title-price text-center">${{ $datas->product_price }}/-</h5>
                                    <p class="card-text-para">{{ substr($datas->product_title, 0, 50) . '...' }}</p>
                                </a>
                                @if($datas->availability == 0 )
                                    <a href="javascript:void(0)" disabled class="mb-2 pills-block-btn">
                                        Out of stock
                                    </a>
                                    @else
                                    <a href="javascript:void(0)" class="mb-2 pills-block-btn add-to-cart"
                                        data-id="{{ $datas->id }}">
                                        <i class="bx bx-cart"></i> Add to Cart
                                    </a>
                                    @endif
                                <a href="#" class="addtoCompare ">+ Add to
                                    Compare</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <p class="my-4">If you don't see an item that you are looking for, feel free to contact us. We have
                    access to
                    over 1 million items in stock and can help locate your required item.</p>

                <ul class="ps-2">
                    <li>Phone: <a href="#">+1 469-459-9688</a></li>
                    <li>Email: <a href="#">support@jbsdevices.com</a></li>
                </ul>

                <!-- box end -->

            </div>
        </div>

    </div>
</div>

<script>
var slider = document.getElementById("price-slider");
var display = document.getElementById("price-display");

slider.min = 1;
slider.max = 10000;
slider.step = 1;

slider.oninput = function() {
    display.value = this.value;
}



$("#searchProductbyPrice").click(function() {
    window.location.href = "/search?price=" + $("#price-display").val();
});
</script>
@include('frontend.footer')