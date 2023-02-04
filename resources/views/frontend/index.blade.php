@include('frontend.header')

<!-- banner start -->
<div class="main-banner mh-100">
    <!-- Swiper -->
    <div class="swiper bannerSwiper">
        <div class="swiper-wrapper">

            @foreach($banners as $key=>$banner)
            <div class="swiper-slide"
                style="background:url({{ asset('image/banner/'.$banner->banner_image) }}) no-repeat;">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6">
                            <div class="content">
                                <span>upto 50% off</span>
                                <h1 class="mt-3">{{ $banner->banner_name }}</h1>
                                <p class="pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Blanditiis, voluptate?</p>
                                <a href="product-detail/{{ $banner->banner_slug }}" class="pills-sm-btn">shop now </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- Swiper /  -->
</div>
<!-- banner end  -->

<!-- satisfactory section start  -->
<div class="satisfaction-section mt-5">
    <div class="container">
        <div class="main-boxes">
            <div class="row align-items-center">
                <!-- box start  -->
                <div class="col">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-auto">
                            <div class="imgbx">
                                <img src="https://jbsdevices.com/assets/images/services/1613403754payments.png"
                                    loading="lazy" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="caption">
                                <h5 class="mb-0">Payment</h5>
                                <p class="mb-0">Secure System</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-auto">
                            <div class="imgbx">
                                <img src="https://jbsdevices.com/assets/images/services/1613403689feedback.png"
                                    loading="lazy" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="caption">
                                <h5 class="mb-0">99% Customer</h5>
                                <p class="mb-0">Feedbacks</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-auto">
                            <div class="imgbx">
                                <img src="https://jbsdevices.com/assets/images/services/1613403646free-delivery.png"
                                    loading="lazy" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="caption">
                                <h5 class="mb-0">Express Delivery</h5>
                                <p class="mb-0">We Ship Worldwide</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-auto">
                            <div class="imgbx">
                                <img src="https://jbsdevices.com/assets/images/services/1613403777tag.png"
                                    loading="lazy" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="caption">
                                <h5 class="mb-0">Only Best</h5>
                                <p class="mb-0">Brands</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- box end  -->
            </div>
        </div>
    </div>
</div>
<!-- satisfactory section end  -->

<!-- fetaured priooduct start  -->
<div class="featured-products mt-5">
    <div class="container">
        <div class="row">
            <!-- left side start  -->
            <div class="col-md-9">
                <!-- tabs start  -->
                <div class="products">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-newArrival-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-newArrival" type="button" role="tab"
                                aria-controls="pills-newArrival" aria-selected="true">New Arrivals</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-onSale-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-onSale" type="button" role="tab" aria-controls="pills-onSale"
                                aria-selected="false">On Sale</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-bestRated-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-bestRated" type="button" role="tab"
                                aria-controls="pills-bestRated" aria-selected="false">Best Rated</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-newArrival" role="tabpanel"
                            aria-labelledby="pills-newArrival-tab" tabindex="0">

                            <!-- box start  -->
                            <!-- Swiper -->

                            <div class="swiper productSlide">
                                <div class="swiper-wrapper pb-5">

                                    @foreach($latest_products as $key=>$latestproducts)
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="product-detail/{{ $latestproducts->product_slug }}">
                                                    <img src="{{ asset('image/products/'.$latestproducts->product_image) }}"
                                                        class="img-fluid" loading="lazy" alt="...">
                                                    <h5 class="card-title-price text-center">
                                                        ${{ $latestproducts->product_price }}/-</h5>
                                                    <p class="card-text-para">{{ $latestproducts->product_title }}</p>
                                                    <a href="javascript:void(0)"
                                                        class="mb-2 pills-block-btn add-to-cart"
                                                        data-id="{{ $latestproducts->id }}" >
                                                        <i class="bx bx-cart"></i> Add to Cart
                                                    </a>
                                                    <a href="#" class="addtoCompare">+ Add to
                                                        Compare</a>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <!-- box end -->

                        </div>
                        <div class="tab-pane fade" id="pills-onSale" role="tabpanel" aria-labelledby="pills-onSale-tab"
                            tabindex="0">

                            <!-- box start  -->
                            <!-- Swiper -->

                            <div class="swiper productSlide">
                                <div class="swiper-wrapper pb-5">

                                    @foreach($sale_products as $key=>$saleproducts)
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="product-detail/{{ $saleproducts->product_slug }}">
                                                    <img src="{{ asset('image/products/'.$saleproducts->product_image) }}"
                                                        class="img-fluid" loading="lazy" alt="...">
                                                    <h5 class="card-title-price text-center">
                                                        ${{ $saleproducts->product_price }}/-</h5>
                                                    <p class="card-text-para">{{ $saleproducts->product_title }}</p>
                                                    <a href="javascript:void(0)"  data-id="{{ $latestproducts->id }}" class="mb-2 pills-block-btn add-to-cart">
                                                        <i class="bx bx-cart"></i> Add to Cart
                                                    </a>
                                                    <a href="#" class="addtoCompare">+ Add to
                                                        Compare</a>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <!-- box end -->



                        </div>
                        <div class="tab-pane fade" id="pills-bestRated" role="tabpanel"
                            aria-labelledby="pills-bestRated-tab" tabindex="0">

                            <!-- box start  -->
                            <!-- Swiper -->

                            <div class="swiper productSlide">
                                <div class="swiper-wrapper pb-5">

                                    @foreach($featured_products as $key=>$featuredproducts)
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="product-detail/{{ $featuredproducts->product_slug }}">
                                                    <img src="{{ asset('image/products/'.$featuredproducts->product_image) }}"
                                                        class="img-fluid" loading="lazy" alt="...">
                                                    <h5 class="card-title-price text-center">
                                                        ${{ $featuredproducts->product_price }}/-</h5>
                                                    <p class="card-text-para">{{ $featuredproducts->product_title }}</p>
                                                    <a href="javascript:void(0)" data-id="{{ $featuredproducts->id }}" class="mb-2 pills-block-btn add-to-cart">
                                                        <i class="bx bx-cart"></i> Add to Cart</a>
                                                    <a href="#" class="addtoCompare">+ Add to
                                                        Compare</a>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <!-- box end -->

                        </div>
                    </div>
                </div>
                <!-- tabs end  -->
            </div>
            <!-- left side end  -->

            <!-- right side start  -->
            <div class="col-md-3">
                <!-- form start  -->
                <div class="card bg-light">
                    <div class="card-body">
                        <h5 class="card-title">Send Query</h5>
                        <p class="card-text">Our Dedicated Account Manager will get in touch with you shortly
                        </p>
                        <form>
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="fullName">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="phone">
                            </div>
                            <div class="mb-3">
                                <label for="companyName" class="form-label">Company Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="companyName">
                            </div>
                            <div class="mb-3">
                                <label for="partNumber" class="form-label">Part Number <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="partNumber">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="targetPrice" class="form-label">Target Price <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="targetPrice">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="quantity">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="square-block-btn">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- form end  -->
            </div>
            <!-- right side end  -->
        </div>
    </div>
</div>
<!-- featured products end  -->

<!-- notice start  -->
<div class="notice-line text-center mt-5">
    <p>We Accept PO's from SMEs, Startups, Fortune 1000 Companies, Government Agencies, Universities, and
        Schools.</p>
</div>
<!-- notice end  -->

<!-- category start  -->
<div class="category mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <!-- right heading start  -->
                <div class="featured-heading">
                    <span>Featured</span>
                    <h5>Our Featured <br> Categories</h5>
                    <a href="category" class="fullCatalog">FULL CATALOG</a>
                </div>
                <!-- right heading end  -->
            </div>
            <div class="col-md-9">

                <!-- category box start  -->
                <div class="catBoxes">
                    <div class="row">
                        @foreach($featured_categories as $key=>$featuredcategories)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <a href="category/{{ $featuredcategories->category_slug }}">
                                        <img src="{{ asset('image/category/'.$featuredcategories->category_image) }}"
                                            class="img-fluid" loading="lazy" alt="...">
                                    </a>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="#"
                                        class="card-text text-center">{{ $featuredcategories->category_name }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <!-- category box end  -->

            </div>
        </div>
    </div>
</div>
<!-- category end  -->


<!-- landscape section start  -->
<div class="landscape mt-5 bg-light py-3">
    <div class="container">
        <h5 class="mt-5">Desktop & Server Motherboards</h5>
        <span class="heading-border"></span>

        <!-- boxes start  -->
        <div class="row mt-4">
            @foreach($desktop_motherboard as $key=>$desktopmotherboard)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header border border-0 text-end bg-white">
                        <a href="#" class="addtoWishList"><i class="bx bx-heart"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('image/products/'.$desktopmotherboard->product_image) }}"
                                    class="img-fluid" loading="lazy" alt="...">
                            </div>
                            <div class="col-md-6">
                                <a href="product-detail/{{ $desktopmotherboard->product_slug }}">
                                    <h5 class="card-title-price">{{ $desktopmotherboard->product_price }}</h5>
                                    <p class="card-text mb-3">{{ $desktopmotherboard->product_title }}
                                    </p>
                                </a>
                                <a href="add-to-cart" data-id="{{ $desktopmotherboard->id }}" class="mb-2 pills-block-btn add-to-cart"> <i class="bx bx-cart"></i>
                                    Add to Cart</a>
                                <a href="#" class="addtoCompare ">+ Add to
                                    Compare</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- boxes end  -->

    </div>
</div>
<!-- landscape section end -->


<!-- hot new arrivals start  -->
<div class="new-arrivals mt-5">
    <div class="container">

        <!-- tabs start  -->
        <div class="products">
            <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-networking-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-networking" type="button" role="tab" aria-controls="pills-networking"
                        aria-selected="true">Networking</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-powerSupplyUnit-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-powerSupplyUnit" type="button" role="tab"
                        aria-controls="pills-powerSupplyUnit" aria-selected="false">Power Supply Unit</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-memory-tab" data-bs-toggle="pill" data-bs-target="#pills-memory"
                        type="button" role="tab" aria-controls="pills-memory" aria-selected="false">Memory</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent2">
                <div class="tab-pane fade show active" id="pills-networking" role="tabpanel"
                    aria-labelledby="pills-networking-tab" tabindex="0">

                    <!-- box start  -->
                    <!-- Swiper -->
                    <div class="swiper newArrivalsSlide">
                        <div class="swiper-wrapper pb-5">

                            @foreach($Networking as $key=>$Network)
                            <div class="swiper-slide">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="product-detail/{{ $Network->product_slug }}">
                                            <img src="{{ asset('image/products/'.$Network->product_image) }}"
                                                class="img-fluid" loading="lazy" alt="...">
                                            <h5 class="card-title-price text-center">${{ $Network->product_price }}/-
                                            </h5>
                                            <p class="card-text-para">${{ $Network->product_title }}/-</p>
                                        </a>
                                        <a href="add-to-cart" data-id="{{ $Network->id }}" class="mb-2 pills-block-btn add-to-cart">
                                            <i class="bx bx-cart"></i> Add to Cart</a>
                                        <a href="#" class="addtoCompare">+ Add to
                                            Compare</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <!-- box end -->

                </div>
                <div class="tab-pane fade" id="pills-powerSupplyUnit" role="tabpanel"
                    aria-labelledby="pills-powerSupplyUnit-tab" tabindex="0">

                    <!-- box start  -->
                    <!-- Swiper -->
                    <div class="swiper newArrivalsSlide">
                        <div class="swiper-wrapper pb-5">

                            @foreach($power_supply_unit as $key=>$powersupplyunit)
                            <div class="swiper-slide">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="product-detail/{{ $powersupplyunit->product_slug }}">
                                            <img src="{{ asset('image/products/'.$powersupplyunit->product_image) }}"
                                                class="img-fluid" loading="lazy" alt="...">
                                            <h5 class="card-title-price text-center">
                                                ${{ $powersupplyunit->product_price }}/-</h5>
                                            <p class="card-text-para">${{ $powersupplyunit->product_title }}/-</p>
                                        </a>
                                        <a href="javascript:void(0)" data-id="{{ $powersupplyunit->id }}" class="mb-2 pills-block-btn add-to-cart">
                                            <i class="bx bx-cart"></i> Add to Cart</a>
                                        <a href="#" class="addtoCompare">+ Add to
                                            Compare</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <!-- box end -->

                </div>
                <div class="tab-pane fade" id="pills-memory" role="tabpanel" aria-labelledby="pills-memory-tab"
                    tabindex="0">

                    <!-- box start  -->
                    <!-- Swiper -->
                    <div class="swiper newArrivalsSlide">
                        <div class="swiper-wrapper pb-5">

                            @foreach($memory as $key=>$memories)
                            <div class="swiper-slide">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="product-detail/{{ $memories->product_slug }}">
                                            <img src="{{ asset('image/products/'.$memories->product_image) }}"
                                                class="img-fluid" loading="lazy" alt="...">
                                            <h5 class="card-title-price text-center">${{ $memories->product_price }}/-
                                            </h5>
                                            <p class="card-text-para">${{ $memories->product_title }}/-</p>
                                        </a>
                                        <a href="javascript:void(0)" data-id="{{ $memories->id }}" class="mb-2 pills-block-btn add-to-cart">
                                            <i class="bx bx-cart"></i> Add to Cart</a>
                                        <a href="#" class="addtoCompare">+ Add to
                                            Compare</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <!-- box end -->

                </div>
            </div>
        </div>
        <!-- tabs end  -->

    </div>
</div>
<!-- hot new arrivals end  -->


<!-- brand section start  -->
<div class="brand-section mt-5 border border-top border-bottom">
    <!-- <div class="container"> -->

    <!-- box start  -->
    <!-- Swiper -->
    <div class="swiper brandsSlide">
        <div class="swiper-wrapper p-4">

            @foreach($brands as $key=>$brand)
            <div class="swiper-slide">
                <img src="{{ asset('image/brand/'.$brand->brand_image) }}" class="img-fluid" width="145" loading="lazy"
                    height="50" alt="...">
            </div>
            @endforeach


        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <!-- box end -->

    <!-- </div> -->
</div>
<!-- brand section end  -->


@include('frontend.footer')