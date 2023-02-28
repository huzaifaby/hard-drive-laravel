@include('frontend.header')

<style>
.rating {
    display: flex;
}

.star {
    cursor: pointer;
    color: gray;
}

span.active {
    color: #ffcc00;
}

span.bg-white.plus,
span.bg-white.minus {
    cursor: pointer;
}

/* 
input#quantities {
    min-width: 17px!important;
    max-width: 68px;
} */
</style>
<div class="single-product-wrapper mt-4">
    <div class="container">


        <!-- single product start  -->
        <div class="row">
            <div class="col-md-3 mb-3">

                <!-- breadcrumb start  -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
                <!-- breadcrumb end  -->

                <button type="button" class="imgbx" data-bs-toggle="modal" data-bs-target="#imageModal">
                    <div class="img-zoom-container">
                        <img id="myimage" width="300" height="240"
                            src="{{ asset('image/products/'.$product->product_image) }}" class="img-thumbnail"
                            loading="lazy" alt="">
                        <div id="myresult" class="img-zoom-result"></div>
                    </div>
                </button>
            </div>
            <!-- center  -->
            <div class="col-md-6">
                <h3>
                    {{ $product->product_title }}
                </h3>
                <p class="card-title-price fs-3 mt-2">
                    {{ $product->product_price }}
                </p>
                <hr>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>SKU</td>
                            <td>{{ $product->product_sku }}</td>
                        </tr>
                        <tr>
                            <td>Manufacturer</td>
                            <td>
                                <a href="#">{{ $product_brand->brand_name }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Condition</td>
                            <td>{{ $product->product_condition }}</td>
                        </tr>
                        <tr>
                            <td>Availability</td>
                            @if($product->availability == 0 )
                            <td><a href="#" class="text-success">Out of Stock</a></td>
                            @else
                            <td><a href="#" class="text-success">In Stock</a></td>
                            @endif
                        </tr>
                    </tbody>
                </table>
                <hr>
                <div class="row mb-3">
                    <div class="col-6">
                        <!-- Inc / Dec start  -->
                        <div>
                            <div class="d-flex">
                                <div class="border px-3 py-2 rounded-start">
                                    <span class="bg-white minus"> - </span>
                                </div>
                                <div class="border-top border-bottom">
                                    <input type="text" class="w-100 h-100 d-block text-center mb-0" id="quantities"
                                        name="quantities" value="1" />
                                </div>
                                <div class="border px-3 py-2 rounded-end">
                                    <span class="bg-white plus"> + </span>
                                </div>
                            </div>
                        </div>
                        <!-- Inc / Dec end  -->
                    </div>

                    <div class="col-6">
                        <!-- addto cart btns  -->
                        @if($product->availability == 0 )
                        <a href="javascript:void(0)" disabled class="square-block-btn bg-secondary text-light"> Out of
                            stock</a>
                        @else
                        <a href="javascript:void(0)" class="square-block-btn add-to-cart"
                            data-id="{{ $product->id }}"><i class="bx bx-cart"></i> Add to Cart</a>
                        @endif

                        <!-- addto cart btns / -->
                    </div>


                </div>

                <p class="card-text-para my-3">
                    Call <a href="tel:+1469-459-9688">+1 469-459-9688</a> for further assistance with this part
                    number
                </p>

                <!-- satisfactory section start  -->
                <div class="satisfaction-section mb-3">
                    <div class="container">
                        <div class="main-boxes">
                            <div class="row align-items-center">
                                <!-- box start  -->
                                <div class="col-md my-3">
                                    <div class="text-center">
                                        <div class="col-auto">
                                            <div class="imgbx">
                                                <img src="https://jbsdevices.com/assets/images/services/1613403777tag.png"
                                                    loading="lazy" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="caption">
                                                <h6 class="mb-0">Only Best</h6>
                                                <p class="mb-0">Brands</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md my-3">
                                    <div class="text-center">
                                        <div class="col-auto">
                                            <div class="imgbx">
                                                <img src="https://jbsdevices.com/assets/images/services/1613403689feedback.png"
                                                    loading="lazy" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="caption">
                                                <h6 class="mb-0">99% Customer</h6>
                                                <p class="mb-0">Feedbacks</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md my-3">
                                    <div class="text-center">
                                        <div class="col-auto">
                                            <div class="imgbx">
                                                <img src="https://jbsdevices.com/assets/images/services/1613403646free-delivery.png"
                                                    loading="lazy" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="caption">
                                                <h6 class="mb-0">Express Delivery</h6>
                                                <p class="mb-0">We Ship Worldwide</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md my-3">
                                    <div class="text-center">
                                        <div class="col-auto">
                                            <div class="imgbx">
                                                <img src="https://jbsdevices.com/assets/images/services/1613403777tag.png"
                                                    loading="lazy" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="caption">
                                                <h6 class="mb-0">Only Best</h6>
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

            </div>
            <!-- center / -->
            <div class="col-md-3">
                <!-- form start  -->
                <div class="card border border-0 border-start rounded-0">
                    <div class="card-body">

                        <div class="bg-info text-white p-2 rounded-2 mb-3">
                            Free ground shipping within United States
                        </div>
                        <h5 class="card-title">Request for Quote:</h5>
                        <span class="heading-border mb-3"></span>
                        <form>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="Name" class="form-label">Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="Name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone <span
                                                class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" id="phone">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="targetPrice" class="form-label">Target Price <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="targetPrice">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="quantity">
                            </div>

                            <button type="submit" class="square-block-btn">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- form end  -->
            </div>
        </div>
        <!-- single product end  -->

    </div>
</div>


<!-- overview section start   -->
<div class="overview mt-5">
    <!-- tab start  -->
    <ul class="nav nav-pills mb-3 py-3 px-lg-5 px-md-2 px-sm-2 bg-light" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-overview-tab" data-bs-toggle="pill"
                data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview"
                aria-selected="true">Overview</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-warranty-tab" data-bs-toggle="pill" data-bs-target="#pills-warranty"
                type="button" role="tab" aria-controls="pills-warranty" aria-selected="false">Warranty</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-shipping-tab" data-bs-toggle="pill" data-bs-target="#pills-shipping"
                type="button" role="tab" aria-controls="pills-shipping" aria-selected="false">Shipping</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-q-a-tab" data-bs-toggle="pill" data-bs-target="#pills-q-a" type="button"
                role="tab" aria-controls="pills-q-a" aria-selected="false">Q&A</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews"
                type="button" role="tab" aria-controls="pills-reviews" aria-selected="false">Reviews</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab"
            tabindex="0">

            <!-- overview start  -->
            <div class="container">
                <p class="card-text-para">BF0720B26A HP 72.8GB 15000RPM Ultra-320 SCSI 80-Pin 3.5-inch Hard
                    Drive</p>
            </div>
            <!-- overview end  -->

        </div>
        <div class="tab-pane fade" id="pills-warranty" role="tabpanel" aria-labelledby="pills-warranty-tab"
            tabindex="0">

            <!-- warranty start  -->
            <div class="container">
                <div class="card border border-0 bg-light">
                    <div class="card-body">
                        <h5 class="card-subtitle">What does Refurbished mean?</h5>
                        <p class="card-text-para">Refurbished means that the item was sent back to the original
                            manufacturer, and it has been rechecked or reassembled and to provide cost-effective
                            solution and to provide end-of-life products.</p>
                        <h5 class="card-subtitle">
                            Reason to buy refurbished IT devices:
                        </h5>
                        <ul class="card-text">
                            <li>Better quality</li>
                            <li>Lower costs</li>
                            <li>Extend the Life of your Current Technology</li>
                            <li>A More Reliable Warranty</li>
                            <li>A Greener Solution</li>
                            <li>Save IT budget</li>
                        </ul>
                        <h4 class="card-title mb-3">Warranty may vary according to item condition.</h4>
                        <h5 class="card-subtitle">
                            Our usual warranty is:
                        </h5>
                        <ul class="card-text">
                            <li>Refurbished 30 days</li>
                            <li>New Open Box 90 days</li>
                            <li>New Factory Sealed 1 year or standard manufacturer warranty</li>
                        </ul>
                        <p class="card-text-para">
                            Our items undergo a series of rigorous tests! All used or refurbished products are
                            examined by our fulfillment team to ensure that any cosmetic issues will not affect
                            the performance of your order. Our warehouse technicians also perform diagnostic
                            tests to make sure you get exactly what you ordered and that it functions properly.
                            If you have any issues with your purchase, contact us and we'll do our best to
                            resolve them.</p>
                        <p class="card-text-para">
                            Our goal at JBS Devices is to provide customer service that is better than any other
                            and to do this we must offer what you need. Our staff will help you with warranty
                            questions if needed or assist you with information on purchasing aftermarket
                            accessories, so please give us a call at +1 469-459-9688 or email us
                            support@jbsdevices.com
                        </p>
                        <a href="#" class="">Read More...</a>
                    </div>
                </div>
            </div>
            <!-- warranty end  -->

        </div>
        <div class="tab-pane fade" id="pills-shipping" role="tabpanel" aria-labelledby="pills-shipping-tab"
            tabindex="0">

            <!-- shipping start  -->
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row" class="align-middle">Ground</th>
                                <td>
                                    In the US ONLY, the transit time is between 3-7 business days, cut-off time
                                    stands at 1 PM Central Time. Depending on your location, Ground orders may
                                    be delivered by either UPS or USPS.
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="align-middle">Ground</th>
                                <td>
                                    In the US ONLY, the transit time is between 3-7 business days, cut-off time
                                    stands at 1 PM Central Time. Depending on your location, Ground orders may
                                    be delivered by either UPS or USPS.
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="align-middle">Ground</th>
                                <td>
                                    In the US ONLY, the transit time is between 3-7 business days, cut-off time
                                    stands at 1 PM Central Time. Depending on your location, Ground orders may
                                    be delivered by either UPS or USPS.
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="align-middle">Ground</th>
                                <td>
                                    In the US ONLY, the transit time is between 3-7 business days, cut-off time
                                    stands at 1 PM Central Time. Depending on your location, Ground orders may
                                    be delivered by either UPS or USPS.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- shipping end -->

        </div>
        <div class="tab-pane fade" id="pills-q-a" role="tabpanel" aria-labelledby="pills-q-a-tab" tabindex="0">

            <!-- Q&A start  -->
            <div class="container">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed bg-light shadow-none" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Question #1
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is
                                intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                first item's accordion body.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-heade bg-light mb-0" id="flush-headingTwo">
                            <button class="accordion-button collapsed bg-light shadow-none" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                Question #2
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is
                                intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                second item's accordion body. Let's imagine this being filled with some actual
                                content.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed bg-light shadow-none" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Question #3
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is
                                intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                third item's accordion body. Nothing more exciting happening here in terms of
                                content, but just filling up the space to make it look, at least at first
                                glance, a bit more representative of how this would look in a real-world
                                application.</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Q&A start  -->

        </div>
        <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab" tabindex="0">

            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3">

                        <div class="review-detail">
                            <h3 class="border-bottom pb-3 mb-3">Review (45)</h3>
                            <p class="mb-3 fs-3">4.8
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                            </p>
                            <div class="row align-items-center">
                                <div class="col">
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                </div>
                                <div class="col-auto">
                                    <p class="mb-0">35</p>
                                </div>
                                <div class="col">
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                            aria-label="Basic example" style="width: 30%" aria-valuenow="30"
                                            aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col">
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star-half text-warning"></i>
                                    <i class="bx bxs-star-half text-warning"></i>
                                </div>
                                <div class="col-auto">
                                    <p class="mb-0">35</p>
                                </div>
                                <div class="col">
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                            aria-label="Basic example" style="width: 20%" aria-valuenow="20"
                                            aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col">
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star-half text-warning"></i>
                                    <i class="bx bxs-star-half text-warning"></i>
                                    <i class="bx bxs-star-half text-warning"></i>
                                </div>
                                <div class="col-auto">
                                    <p class="mb-0">35</p>
                                </div>
                                <div class="col">
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                            aria-label="Basic example" style="width: 5%" aria-valuenow="5"
                                            aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col">
                        <h3>Add a review</h3>
                        <span class="heading-border mb-3"></span>
                        <div class="rating mb-3">
                            <span class="star bx bxs-star text-warning" id="star1"></span>
                            <span class="star bx bxs-star " id="star2"></span>
                            <span class="star bx bxs-star " id="star3"></span>
                            <span class="star bx bxs-star " id="star4"></span>
                            <span class="star bx bxs-star " id="star5"></span>
                        </div>

                        <!-- form start  -->

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="hidden" value="" name="rating" class="form-control shadow-none"
                                        id="rating">
                                    <input type="hidden" value="{{ $product->id }}" name="product_id"
                                        class="form-control shadow-none" id="product_id">
                                    <input type="text" name="user_name" class="form-control shadow-none" id="user_name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="user_email" class="form-control shadow-none"
                                        id="user_email">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                            <textarea id="review_description" name="review_description" cols="30" rows="5"
                                class="form-control shadow-none"></textarea>
                        </div>
                        <button type="submit" class="square-block-btn add_review">Add Review</button>

                        <!-- form end  -->
                    </div>
                </div>

                <div class="reviews bg-light p-4 mt-4 rounded">
                    @foreach($reviews as $key => $review)
                    <div class="row border-bottom pb-3 mb-3">
                        <div class="col-md-2 text-center">
                            <h6>{{ $review->user_name }}</h6>
                            <p>{{ $review->created_at->format('M d, Y') }}</p>
                            <span>
                                @for($i = 1; $i <= 5; $i++) @if($i <=$review->review_stars)
                                    <i class="bx bxs-star text-warning"></i>
                                    @else
                                    <i class="bx bxs-star" style="color:grey;"></i>
                                    @endif
                                    @endfor
                            </span>
                        </div>
                        <div class="col-md-8">
                            <p>{{ $review->review_description }}</p>
                        </div>
                        <div class="col-md-2 d-inline-flex">
                            <img loading="lazy" width="24" height="24"
                                src="https://jbsdevices.com/assets/images/shield.png" alt="">
                            <p>Verified Buyer</p>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>

        </div>
    </div>
    <!-- tab end  -->
</div>
<!-- overview section end   -->


<!-- related section start  -->
<div class="related mt-5">
    <div class="container">
        <h3 class="mt-5">Related Products</h3>
        <span class="heading-border"></span>




        <!-- box start  -->
        <!-- Swiper -->

        <div class="swiper productSlide mt-5">
            <div class="swiper-wrapper pb-5">


                @foreach($related_products as $key=>$relatedproducts)
                <div class="swiper-slide">
                    <div class="card">
                        <div class="card-body text-center">
                            <a href="product-detail/{{ $relatedproducts->product_slug }}">
                                <img src="{{ asset('image/products/'.$relatedproducts->product_image) }}"
                                    class="img-fluid" loading="lazy" alt="...">
                                <h5 class="card-title-price text-center">
                                    ${{ $relatedproducts->product_price }}/-</h5>
                                <p class="card-text-para">{{ $relatedproducts->product_title }}</p>
                                <a href="javascript:void(0)" class="mb-2 pills-block-btn add-to-cart"
                                    data-id="{{ $relatedproducts->id }}">
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
</div>
<!-- related section end -->


<!-- image show on click start  -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body text-center">
                <img src="{{ asset('image/products/'.$product->product_image) }}" class="img-thumbnail w-100" loading="lazy"
                    alt="">
            </div>
        </div>
    </div>
</div>
<!-- image show on click end -->

@include('frontend.rating_js')

@include('frontend.footer')