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
                <h3 class="border-bottom pb-2"></h3>
                <p class="mt-3 my-5">Our site offers the most innovative, reliable, and convenient products for the
                    home. We offer a
                    wide range of storage products, from branded hard disk drives to cheaper external drives and
                    large-capacity flash drives. JBS is the leading manufacturer of storage devices. We offer a wide
                    range of prices for our products, so you can easily find the right device for your needs.</p>
                <div class="row">
                    <?php
                    
                    $test = $app->make('url')->to('/');
                    ?>

                    @foreach($products_by_category as $key=>$productsbycategory)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="{{ url('/product-detail/' . $productsbycategory->product_slug) }}">
                                    <img src="{{ asset('image/products/'.$productsbycategory->product_image) }}"
                                        class="img-fluid" loading="lazy" alt="...">
                                    <h5 class="card-title-price text-center">${{ $productsbycategory->product_price }}/-
                                    </h5>
                                    <p class="card-text-para">
                                        {{ substr($productsbycategory->product_title, 0, 50) . '...' }}</p>
                                </a>
                                <a href="javascript:void(0)" data-id="{{ $productsbycategory->id }}" class="mb-2 pills-block-btn add-to-cart">
                                    <i class="bx bx-cart"></i> Add to Cart</a>
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