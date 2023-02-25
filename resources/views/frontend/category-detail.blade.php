@include('frontend.header')


<div class="cart-wrapper mt-4">

    <div class="d-lg-none d-block p-3 mb-3 text-center" style="background:#FD6602;">
        <h6 class="text-white "><i class="bx bx-filter text-white"></i> Filters</h6>
        <div class="row">
            <div class="col">
                <select id="display_prods" class="form-select shadow-none border-0" style="background-color:#FD6602;">
                    <option value="12">Show 12</option>
                    <option value="50">Show 50</option>
                    <option value="100">Show 100</option>
                    <option value="150">Show 150</option>
                </select>
            </div>
            <div class="col">
                <select id="sort" class="form-select shadow-none border-0" style="background-color:#FD6602;">
                    <option value="">Sort</option>
                    <option value="date_desc">Sort by latest</option>
                    <option value="date_asc">Sort by oldest</option>
                    <option value="price_asc">Sort by price: low to high</option>
                    <option value="price_desc">Sort by price: high to low</option>
                </select>
            </div>
        </div>
    </div>




    <div class="container">

        <div class="row">
            <div class="col-md-3 order-lg-1 order-2">

                <!-- breadcrumb start  -->
                <div class="d-lg-block d-none">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="text-secondary">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
                <!-- breadcrumb end  -->

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
            <div class="col-md-9 order-lg-2 order-1">

                <!-- <h3 class="border-bottom pb-2"></h3> -->

                <p class="mt-3 d-lg-block d-none my-5">Our site offers the most innovative, reliable, and convenient
                    products for the
                    home. We offer a
                    wide range of storage products, from branded hard disk drives to cheaper external drives and
                    large-capacity flash drives. JBS is the leading manufacturer of storage devices. We offer a wide
                    range of prices for our products, so you can easily find the right device for your needs.</p>
                <div class="d-lg-block d-none">
                    <div class="row">
                        <?php
                    $test = $app->make('url')->to('/');
                    ?>

                        @php
                        $user_id = Auth::guard('customer')->user() ? Auth::guard('customer')->user()->id :
                        null;
                        @endphp

                        @foreach($products_by_category as $key=>$productsbycategory)
                        @php
                        $bg_color = 'none';
                        if ($user_id) {
                        $in_wishlist = DB::table('wishlists')
                        ->where('user_id', $user_id)
                        ->where('product_id', $productsbycategory->id)
                        ->exists();
                        $bg_color = $in_wishlist ? 'red' : 'none';
                        }
                        @endphp
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <a href="{{ url('/product-detail/' . $productsbycategory->product_slug) }}">
                                        <div class="wishlist-container">
                                            @if ($user_id)
                                            <button class="wishlist-btn" data-id="{{ $productsbycategory->id }}">
                                                <svg class="wishlist-icon" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="{{ $bg_color }}"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke="currentColor" class="feather feather-heart color-filled">
                                                    <path
                                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                    </path>
                                                </svg>
                                            </button>
                                            @endif
                                        </div>
                                        <img src="{{ asset('image/products/'.$productsbycategory->product_image) }}"
                                            class="img-fluid mb-3" loading="lazy" alt="...">
                                        <h5 class="card-title-price text-center">
                                            ${{ $productsbycategory->product_price }}/-
                                        </h5>
                                        <p class="card-text-para">
                                            {{ substr($productsbycategory->product_title, 0, 50) . '...' }}</p>
                                    </a>
                                    <a href="javascript:void(0)" data-id="{{ $productsbycategory->id }}"
                                        class="mb-2 pills-block-btn add-to-cart">
                                        <i class="bx bx-cart"></i> Add to Cart</a>
                                    <a href="#" class="addtoCompare ">+ Add to
                                        Compare</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="d-lg-none d-block">
                    <div class="row">

                        @php
                        $user_id = Auth::guard('customer')->user() ? Auth::guard('customer')->user()->id :
                        null;
                        @endphp

                        @foreach($products_by_category as $key=>$productsbycategory)
                        @php
                        $bg_color = 'none';
                        if ($user_id) {
                        $in_wishlist = DB::table('wishlists')
                        ->where('user_id', $user_id)
                        ->where('product_id', $productsbycategory->id)
                        ->exists();
                        $bg_color = $in_wishlist ? 'red' : 'none';
                        }
                        @endphp

                        <div class="col-6 mb-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <a href="{{ url('/product-detail/' . $productsbycategory->product_slug) }}">
                                        <div class="wishlist-container">
                                            @if ($user_id)
                                            <button class="wishlist-btn" data-id="{{ $productsbycategory->id }}">
                                                <svg class="wishlist-icon" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="{{ $bg_color }}"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke="currentColor" class="feather feather-heart color-filled">
                                                    <path
                                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                    </path>
                                                </svg>
                                            </button>
                                            @endif
                                        </div>

                                        <img src="{{ asset('image/products/'.$productsbycategory->product_image) }}"
                                            class="img-fluid mb-3" loading="lazy" alt="...">
                                        <h5 class="card-title-price fs-6 fw-normal text-center">
                                            ${{ $productsbycategory->product_price }}/-
                                        </h5>
                                        <p class="card-text-para">
                                            {{ substr($productsbycategory->product_title, 0, 50) . '...' }}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
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






<script>
// Get the select elements
var displayProds = document.getElementById('display_prods');
var sort = document.getElementById('sort');

// Set the selected value of the "Show" filter from localStorage (if it exists)
var showFilter = localStorage.getItem('showFilter');
if (showFilter !== null) {
    displayProds.value = showFilter;
}

// Set the selected value of the "Sort" filter from localStorage (if it exists)
var sortFilter = localStorage.getItem('sortFilter');
if (sortFilter !== null) {
    sort.value = sortFilter;
}

// Add event listeners to apply filters on change
displayProds.addEventListener('change', function() {
    localStorage.setItem('showFilter', this.value);
    window.location.href = updateQueryStringParameter(window.location.href, 'display_prods', this.value);
});

sort.addEventListener('change', function() {
    localStorage.setItem('sortFilter', this.value);
    window.location.href = updateQueryStringParameter(window.location.href, 'sort', this.value);
});

// Function to update a query string parameter in a URL
function updateQueryStringParameter(uri, key, value) {
    var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
    var separator = uri.indexOf('?') !== -1 ? "&" : "?";
    if (uri.match(re)) {
        return uri.replace(re, '$1' + key + "=" + value + '$2');
    } else {
        return uri + separator + key + "=" + value;
    }
}
</script>






@include('frontend.footer')