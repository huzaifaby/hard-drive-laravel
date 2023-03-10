@include('frontend.header')


<div class="cart-wrapper mt-4">
    <div class="container">

        <div class="row">
            <div class="col-md-3 d-lg-block d-none">

            <!-- breadcrumb start  -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-secondary">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>
        <!-- breadcrumb end  -->

                <div class="accordion" id="accordionExample">
            
                    <div class="card-title mt-3">Latest Products</div>
                    <span class="heading-border"></span>

                    <!-- Swiper -->
                    <div class="swiper latestProductSwiper">
                        <div class="swiper-wrapper pb-5">
                            @php
                            $productChunks = array_chunk($latest_products->toArray(), 3);
                            @endphp

                            @foreach ($productChunks as $productChunk)
                            <div class="swiper-slide mt-3 border-top">
                                @foreach($productChunk as $latestproducts)
                                <!-- swiper box start -->
                                <div class="card rounded-0 border-bottom border-0 shadow-none">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-auto">
                                                <a href="product-detail/{{ $latestproducts['product_slug'] }}">
                                                    <img src="{{ asset('image/products/'.$latestproducts['product_image']) }}"
                                                        class="img-fluid mb-3" width="84" loading="lazy" alt="...">
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="">
                                                    <p class="card-title-price">
                                                        ${{ $latestproducts['product_price'] }}/-
                                                    </p>
                                                    <p class="card-text">
                                                        {{ substr($latestproducts['product_title'], 0, 30) . '...' }}
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- swiper box end -->
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-md-9">

                <!-- category box start  -->
                <div class="catBoxes">

                    <h3 class="border-bottom pb-2">All Categories</h3>
                    <p class="mt-3 my-5">Our site offers the most innovative, reliable, and convenient products for the
                        home. We offer a
                        wide range of storage products, from branded hard disk drives to cheaper external drives and
                        large-capacity flash drives. JBS is the leading manufacturer of storage devices. We offer a wide
                        range of prices for our products, so you can easily find the right device for your needs.</p>

                    <div class="row">

                        @foreach($all_categories as $key=>$allcategories)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{ url('/category/' . $allcategories->category_slug) }}">
                                        <img src="{{ asset('image/category/'.$allcategories->category_image) }}"
                                            class="img-fluid " loading="lazy" alt="...">
                                    </a>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="category/{{ $allcategories->category_slug }}"
                                        class="card-text text-center">{{ $allcategories->category_name }}</a>
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

@include('frontend.footer')