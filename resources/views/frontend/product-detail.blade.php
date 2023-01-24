@include('frontend.header')


<div class="single-product-wrapper mt-5">
    <div class="container">
        <!-- breadcrumb start  -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>
        <!-- breadcrumb end  -->

        <!-- single product start  -->
        <div class="row">
            <div class="col-md-3">
                <div class="imgbx">
                    <img src="{{ asset('image/products/'.$product->product_image) }}" class="img-thumbnail"
                        loading="lazy" alt="">
                </div>
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
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>SKU</td>
                            <td> {{ $product->product_sku }}</td>
                        </tr>
                        <tr>
                            <td>Manufacturer</td>
                            <td>
                                <a href="#">HP</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Condition</td>
                            <td>{{ $product->product_condition }}</td>
                        </tr>
                        <tr>
                            <td>Availability</td>
                            <td><a href="#" class="text-success">In Stock</a></td>
                        </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <!-- Inc / Dec start  -->
                        <ul class="list-group list-group-horizontal-lg text-center">
                            <li class="list-group-item"><button class="bg-white"> <i class='bx bx-plus'></i> </button>
                            </li>
                            <li class="list-group-item">
                                <p class="card-text-para mb-0">1</p>
                            </li>
                            <li class="list-group-item"><button class="bg-white"> <i class="bx bx-minus"></i> </button>
                            </li>
                        </ul>
                        <!-- Inc / Dec end  -->
                    </div>

                    <div class="col-md-4 mb-3">
                        <!-- addto cart btns  -->
                        <a href="#" class="square-block-btn"><i class="bx bx-cart"></i> Add to Cart</a>
                        <!-- addto cart btns / -->
                    </div>

                    <div class="col-md-4 mb-3">
                        <!-- buy now btns -->
                        <a href="#" class="square-block-btn bg-warning">Buy Now</a>
                        <!-- buy now btns / -->
                    </div>
                </div>

                <p class="card-text-para my-3">
                    Call <a href="tel:+1469-459-9688">+1 469-459-9688</a> for further assistance with this part
                    number
                </p>

                <!-- satisfactory section start  -->
                <div class="satisfaction-section">
                    <div class="container">
                        <div class="main-boxes">
                            <div class="row align-items-center">
                                <!-- box start  -->
                                <div class="col">
                                    <div class="row align-items-center justify-content-center text-center">
                                        <div class="col-auto">
                                            <div class="imgbx">
                                                <img src="https://jbsdevices.com/assets/images/services/1613403754payments.png"
                                                    loading="lazy" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="caption">
                                                <h6 class="mb-0">Payment</h6>
                                                <p class="mb-0">Secure System</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row align-items-center justify-content-center text-center">
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

                                <div class="col">
                                    <div class="row align-items-center justify-content-center text-center">
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

                                <div class="col">
                                    <div class="row align-items-center justify-content-center text-center">
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
                        <p class="card-text">See our reviews on<svg role="img" aria-labelledby="trustpilotLogo"
                                viewBox="0 0 126 31" xmlns="http://www.w3.org/2000/svg" width="80">
                                <title id="trustpilotLogo">Trustpilot</title>
                                <path class="tp-logo__text"
                                    d="M33.074774 11.07005H45.81806v2.364196h-5.010656v13.290316h-2.755306V13.434246h-4.988435V11.07005h.01111zm12.198892 4.319629h2.355341v2.187433h.04444c.077771-.309334.222203-.60762.433295-.894859.211092-.287239.466624-.56343.766597-.79543.299972-.243048.633276-.430858.999909-.585525.366633-.14362.744377-.220953 1.12212-.220953.288863 0 .499955.011047.611056.022095.1111.011048.222202.033143.344413.04419v2.408387c-.177762-.033143-.355523-.055238-.544395-.077333-.188872-.022096-.366633-.033143-.544395-.033143-.422184 0-.822148.08838-1.199891.254096-.377744.165714-.699936.41981-.977689.740192-.277753.331429-.499955.729144-.666606 1.21524-.166652.486097-.244422 1.03848-.244422 1.668195v5.39125h-2.510883V15.38968h.01111zm18.220567 11.334883H61.02779v-1.579813h-.04444c-.311083.574477-.766597 1.02743-1.377653 1.369908-.611055.342477-1.233221.51924-1.866497.51924-1.499864 0-2.588654-.364573-3.25526-1.104765-.666606-.740193-.999909-1.856005-.999909-3.347437V15.38968h2.510883v6.948968c0 .994288.188872 1.701337.577725 2.1101.377744.408763.922139.618668 1.610965.618668.533285 0 .96658-.077333 1.322102-.243048.355524-.165714.644386-.37562.855478-.65181.222202-.265144.377744-.596574.477735-.972194.09999-.37562.144431-.784382.144431-1.226288v-6.573349h2.510883v11.323836zm4.27739-3.634675c.07777.729144.355522 1.237336.833257 1.535623.488844.287238 1.06657.441905 1.744286.441905.233312 0 .499954-.022095.799927-.055238.299973-.033143.588836-.110476.844368-.209905.266642-.099429.477734-.254096.655496-.452954.166652-.198857.244422-.452953.233312-.773335-.01111-.320381-.133321-.585525-.355523-.784382-.222202-.209906-.499955-.364573-.844368-.497144-.344413-.121525-.733267-.232-1.17767-.320382-.444405-.088381-.888809-.18781-1.344323-.287239-.466624-.099429-.922138-.232-1.355432-.37562-.433294-.14362-.822148-.342477-1.166561-.596573-.344413-.243048-.622166-.56343-.822148-.950097-.211092-.386668-.311083-.861716-.311083-1.436194 0-.618668.155542-1.12686.455515-1.54667.299972-.41981.688826-.75124 1.14434-1.005336.466624-.254095.97769-.430858 1.544304-.541334.566615-.099429 1.11101-.154667 1.622075-.154667.588836 0 1.15545.066286 1.688736.18781.533285.121524 1.02213.320381 1.455423.60762.433294.276191.788817.640764 1.07768 1.08267.288863.441905.466624.98324.544395 1.612955h-2.621984c-.122211-.596572-.388854-1.005335-.822148-1.204193-.433294-.209905-.933248-.309334-1.488753-.309334-.177762 0-.388854.011048-.633276.04419-.244422.033144-.466624.088382-.688826.165715-.211092.077334-.388854.198858-.544395.353525-.144432.154667-.222203.353525-.222203.60762 0 .309335.111101.552383.322193.740193.211092.18781.488845.342477.833258.475048.344413.121524.733267.232 1.177671.320382.444404.088381.899918.18781 1.366542.287239.455515.099429.899919.232 1.344323.37562.444404.14362.833257.342477 1.17767.596573.344414.254095.622166.56343.833258.93905.211092.37562.322193.850668.322193 1.40305 0 .673906-.155541 1.237336-.466624 1.712385-.311083.464001-.711047.850669-1.199891 1.137907-.488845.28724-1.04435.508192-1.644295.640764-.599946.132572-1.199891.198857-1.788727.198857-.722156 0-1.388762-.077333-1.999818-.243048-.611056-.165714-1.14434-.408763-1.588745-.729144-.444404-.33143-.799927-.740192-1.05546-1.226289-.255532-.486096-.388853-1.071621-.411073-1.745528h2.533103v-.022095zm8.288135-7.700208h1.899828v-3.402675h2.510883v3.402675h2.26646v1.867052h-2.26646v6.054109c0 .265143.01111.486096.03333.684954.02222.18781.07777.353524.155542.486096.07777.132572.199981.232.366633.298287.166651.066285.377743.099428.666606.099428.177762 0 .355523 0 .533285-.011047.177762-.011048.355523-.033143.533285-.077334v1.933338c-.277753.033143-.555505.055238-.811038.088381-.266642.033143-.533285.04419-.811037.04419-.666606 0-1.199891-.066285-1.599855-.18781-.399963-.121523-.722156-.309333-.944358-.552381-.233313-.243049-.377744-.541335-.466625-.905907-.07777-.364573-.13332-.784383-.144431-1.248384v-6.683825h-1.899827v-1.889147h-.02222zm8.454788 0h2.377562V16.9253h.04444c.355523-.662858.844368-1.12686 1.477644-1.414098.633276-.287239 1.310992-.430858 2.055369-.430858.899918 0 1.677625.154667 2.344231.475048.666606.309335 1.222111.740193 1.666515 1.292575.444405.552382.766597 1.193145.9888 1.92229.222202.729145.333303 1.513527.333303 2.3421 0 .762288-.099991 1.50248-.299973 2.20953-.199982.718096-.499955 1.347812-.899918 1.900194-.399964.552383-.911029.98324-1.533194 1.31467-.622166.33143-1.344323.497144-2.18869.497144-.366634 0-.733267-.033143-1.0999-.099429-.366634-.066286-.722157-.176762-1.05546-.320381-.333303-.14362-.655496-.33143-.933249-.56343-.288863-.232-.522175-.497144-.722157-.79543h-.04444v5.656393h-2.510883V15.38968zm8.77698 5.67849c0-.508193-.06666-1.005337-.199981-1.491433-.133321-.486096-.333303-.905907-.599946-1.281527-.266642-.37562-.599945-.673906-.988799-.894859-.399963-.220953-.855478-.342477-1.366542-.342477-1.05546 0-1.855387.364572-2.388672 1.093717-.533285.729144-.799928 1.701337-.799928 2.916578 0 .574478.066661 1.104764.211092 1.59086.144432.486097.344414.905908.633276 1.259432.277753.353525.611056.629716.99991.828574.388853.209905.844367.309334 1.355432.309334.577725 0 1.05546-.121524 1.455423-.353525.399964-.232.722157-.541335.97769-.905907.255531-.37562.444403-.79543.555504-1.270479.099991-.475049.155542-.961145.155542-1.458289zm4.432931-9.99812h2.510883v2.364197h-2.510883V11.07005zm0 4.31963h2.510883v11.334883h-2.510883V15.389679zm4.755124-4.31963h2.510883v15.654513h-2.510883V11.07005zm10.210184 15.963847c-.911029 0-1.722066-.154667-2.433113-.452953-.711046-.298287-1.310992-.718097-1.810946-1.237337-.488845-.530287-.866588-1.160002-1.12212-1.889147-.255533-.729144-.388854-1.535622-.388854-2.408386 0-.861716.133321-1.657147.388853-2.386291.255533-.729145.633276-1.35886 1.12212-1.889148.488845-.530287 1.0999-.93905 1.810947-1.237336.711047-.298286 1.522084-.452953 2.433113-.452953.911028 0 1.722066.154667 2.433112.452953.711047.298287 1.310992.718097 1.810947 1.237336.488844.530287.866588 1.160003 1.12212 1.889148.255532.729144.388854 1.524575.388854 2.38629 0 .872765-.133322 1.679243-.388854 2.408387-.255532.729145-.633276 1.35886-1.12212 1.889147-.488845.530287-1.0999.93905-1.810947 1.237337-.711046.298286-1.522084.452953-2.433112.452953zm0-1.977528c.555505 0 1.04435-.121524 1.455423-.353525.411074-.232.744377-.541335 1.01102-.916954.266642-.37562.455513-.806478.588835-1.281527.12221-.475049.188872-.961145.188872-1.45829 0-.486096-.066661-.961144-.188872-1.44724-.122211-.486097-.322193-.905907-.588836-1.281527-.266642-.37562-.599945-.673907-1.011019-.905907-.411074-.232-.899918-.353525-1.455423-.353525-.555505 0-1.04435.121524-1.455424.353525-.411073.232-.744376.541334-1.011019.905907-.266642.37562-.455514.79543-.588835 1.281526-.122211.486097-.188872.961145-.188872 1.447242 0 .497144.06666.98324.188872 1.458289.12221.475049.322193.905907.588835 1.281527.266643.37562.599946.684954 1.01102.916954.411073.243048.899918.353525 1.455423.353525zm6.4883-9.66669h1.899827v-3.402674h2.510883v3.402675h2.26646v1.867052h-2.26646v6.054109c0 .265143.01111.486096.03333.684954.02222.18781.07777.353524.155541.486096.077771.132572.199982.232.366634.298287.166651.066285.377743.099428.666606.099428.177762 0 .355523 0 .533285-.011047.177762-.011048.355523-.033143.533285-.077334v1.933338c-.277753.033143-.555505.055238-.811038.088381-.266642.033143-.533285.04419-.811037.04419-.666606 0-1.199891-.066285-1.599855-.18781-.399963-.121523-.722156-.309333-.944358-.552381-.233313-.243049-.377744-.541335-.466625-.905907-.07777-.364573-.133321-.784383-.144431-1.248384v-6.683825h-1.899827v-1.889147h-.02222z"
                                    fill="#191919"></path>
                                <path class="tp-logo__star" fill="#00B67A"
                                    d="M30.141707 11.07005H18.63164L15.076408.177071l-3.566342 10.892977L0 11.059002l9.321376 6.739063-3.566343 10.88193 9.321375-6.728016 9.310266 6.728016-3.555233-10.88193 9.310266-6.728016z">
                                </path>
                                <path class="tp-logo__star-notch" fill="#005128"
                                    d="M21.631369 20.26169l-.799928-2.463625-5.755033 4.153914z"></path>
                            </svg></p>
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
    </div>
    <!-- tab end  -->
</div>
<!-- overview section end   -->


<!-- related section start  -->
<div class="related mt-5">
    <div class="container">
        <h3 class="mt-5">Related Products</h3>
        <span class="heading-border"></span>

        <!-- boxes start  -->
        <div class="row mt-4">

            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <a href="">
                            <img src="https://jbsdevices.com/assets/images/products/5188-5464-5188-5464_xdngfkxwn9lccmkv.jpg"
                                class="img-fluid" loading="lazy" alt="...">
                            <h5 class="card-title-price text-center">$83.50/-</h5>
                            <p class="card-text-para">X7DBE-X-O Supermicro Dual LGA771 Xeon/ Intel 5000P/ PCI</p>
                        </a>
                        <a href="#" class="mb-2 pills-block-btn"> <i class="bx bx-cart"></i>
                            Add to Cart</a>
                        <a href="#" class="addtoCompare">+ Add to
                            Compare</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <a href="">
                            <img src="https://jbsdevices.com/assets/images/products/5188-5464-5188-5464_xdngfkxwn9lccmkv.jpg"
                                class="img-fluid" loading="lazy" alt="...">
                            <h5 class="card-title-price text-center">$83.50/-</h5>
                            <p class="card-text-para">X7DBE-X-O Supermicro Dual LGA771 Xeon/ Intel 5000P/ PCI</p>
                        </a>
                        <a href="#" class="mb-2 pills-block-btn"> <i class="bx bx-cart"></i>
                            Add to Cart</a>
                        <a href="#" class="addtoCompare">+ Add to
                            Compare</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <a href="">
                            <img src="https://jbsdevices.com/assets/images/products/5188-5464-5188-5464_xdngfkxwn9lccmkv.jpg"
                                class="img-fluid" loading="lazy" alt="...">
                            <h5 class="card-title-price text-center">$83.50/-</h5>
                            <p class="card-text-para">X7DBE-X-O Supermicro Dual LGA771 Xeon/ Intel 5000P/ PCI</p>
                        </a>
                        <a href="#" class="mb-2 pills-block-btn"> <i class="bx bx-cart"></i>
                            Add to Cart</a>
                        <a href="#" class="addtoCompare">+ Add to
                            Compare</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <a href="">
                            <img src="https://jbsdevices.com/assets/images/products/5188-5464-5188-5464_xdngfkxwn9lccmkv.jpg"
                                class="img-fluid" loading="lazy" alt="...">
                            <h5 class="card-title-price text-center">$83.50/-</h5>
                            <p class="card-text-para">X7DBE-X-O Supermicro Dual LGA771 Xeon/ Intel 5000P/ PCI</p>
                        </a>
                        <a href="#" class="mb-2 pills-block-btn"> <i class="bx bx-cart"></i>
                            Add to Cart</a>
                        <a href="#" class="addtoCompare">+ Add to
                            Compare</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- boxes end  -->

    </div>
</div>
<!-- related section end -->

@include('frontend.footer')