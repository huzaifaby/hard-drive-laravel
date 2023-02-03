<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hard Drive Website</title>
    <meta name="description" content="hard drive website">
    <meta name="robots" content="noindex, nofollow">
    <!-- CSS link  -->
    <link rel="stylesheet" href="../frontend_assets/css/style.css">
    <!-- bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- boxicons  -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <!-- MDB -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet"> -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

</head>

<body>

    <!-- topbar start  -->
    <div class="topbar py-2 border-bottom border-top">
        <div class="container">
            <p class="card-text text-center">We Accept PO's from SMEs, Startups, Fortune 1000 Companies, Government
                Agencies, Universities, and Schools.</p>
        </div>
    </div>
    <!-- topbar end -->
    <!-- header start  -->
    <header class="d-none d-lg-block mainHeader">

        <!-- navbar start  -->
        <nav class="navbar navbar-expand-lg bg-white shadow-none">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('image/logo/'.$settings[0]->logo) }}" class="img-fluid" loading="lazy"
                        width="150" alt="">
                </a>
                <button class="navbar-toggler" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Processors & CPUs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Memory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Networking Devices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Storage Devices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Managed Services</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar end  -->
    </header>
    <!-- header end  -->

    <!-- category start  -->
    <div class="category bg-white py-3 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2 order-3 mb-3 order-lg-1">
                    <div class="dropdown-left d-lg-block d-none">
                        <button class="square-block-btn" type="button" id="dropdownMenuButton"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            CATEGORIES <i class="bx bx-menu ms-2"></i>
                        </button>

                        <ul class="dropdown-menu rounded-0 " aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item border-bottom bg-white"
                                    href="{{ url('/category/power-supply-others') }}">
                                    Power Supply & others &raquo;
                                </a>
                                <!-- Dropdown menu -->
                                <div class="dropdown-menu dropdown-submenu megamenu mt-0 rounded-0">
                                    <div>
                                        <div class="row my-2">
                                            <div class="col-md-6 col-lg-3 mb-3">
                                                <ul>
                                                    @foreach($sub_category as $key=>$subcategory)
                                                    <li class="mb-2">
                                                        <a href="#">Memory</a>
                                                    </li>
                                                    <li class="mb-2">
                                                        <a href="{{ url('/category/' . $subcategory->sub_category_slug) }}"
                                                            class="text-dark">{{ $subcategory->sub_category_name }}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a class="dropdown-item border-bottom bg-white"
                                    href="{{ url('/category/networking-devices') }}">Networking Devices</a></li>
                            <li>
                                <a class="dropdown-item border-bottom bg-white"
                                    href="{{ url('/category/memory') }}">Memory</a>
                            </li>
                            <li>
                                <a class="dropdown-item border-bottom bg-white"
                                    href="{{ url('/category/storage-devices') }}">Storage Devices</a>
                            </li>
                            <li>
                                <a class="dropdown-item bg-white mb-0" href="{{ route('category.index') }}">See All
                                    Categories</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-5 mb-3 order-1 order-lg-2">

                    <!-- form start  -->
                    <form class="searchBar">
                        <input type="search"
                            placeholder="Please Search by Part Number, by Brand, by Model name or any keyword"
                            name="search">
                        <button type="submit"><i class="bx bx-search"></i></button>
                    </form>
                    <!-- form end  -->

                </div>
                <div class="col-md-5 mb-3 order-2 order-lg-3">

                    <div class="row align-items-center">

                        <div class="col-auto mb-3">
                            <ul class="list-group list-group-horizontal-lg">
                                <li class="list-group-item number border border-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <i class='bx bx-headphone fs-5'></i>
                                        </div>
                                        <div class="col">
                                            <a href="tel:{{ $settings[0]->phone_no_1}}"
                                                class="text-dark">{{ $settings[0]->phone_no_1}}</a><br>
                                            <a href="tel:{{ $settings[0]->phone_no_2}}"
                                                class="text-dark">{{ $settings[0]->phone_no_2}}</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="col">
                            <ul class="list-group list-group-horizontal-lg">
                                <li class="list-group-item number border border-0 p-0">
                                    <?php  if (Auth::guard('customer')->check()) { ?>
                                    <a href="{{ route('customer.dashboard') }}" class="text-dark">
                                        <i class="bx bx-user fs-5"></i> <span class="text-dark">Account</span>
                                    </a>
                                    <?php } else { ?>
                                    <a href="{{ route('account.show') }}" class="text-dark">
                                        <i class="bx bx-user fs-5"></i> <span class="text-dark">Account</span>
                                    </a>
                                    <?php }  ?>

                                </li>
                            </ul>
                        </div>

                        <div class="col-auto">
                            <div class="dropdown-center cart-btn">
                                <button class="bg-white" type="button" id="cartDropdown" data-mdb-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class='bx bx-shopping-bag'></i>
                                    <span class="badge text-bg-light rounded-circle fw-light cart-count">0</span>
                                    Your Cart
                                </button>
                                <div class="dropdown-menu p-4" style="width: 350px" aria-labelledby="cartDropdown">
                                    @if(empty($cart))
                                    <p class="mb-0">No products in the cart.</p>
                                    @else
                                    <!-- table start  -->
                                    <table class="table table-borderless cart-table">
                                        <tbody id="cartTable">
                                        </tbody>
                                    </table>
                                    @endif
                                    <!-- table end  -->

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- category end  -->

    <!-- navbar start  -->
    <nav class="navbar navbar-expand-lg bg-white shadow-none d-sm-block d-lg-none">
        <div class="container">
            <div class="row align-items-center w-100">
                <div class="col">
                    <a class="navbar-brand" href="#">
                        <img src="https://jbsdevices.com/assets/images/1612886525logo.png" class="img-fluid"
                            loading="lazy" width="100" alt="">
                    </a>
                </div>
                <div class="col-auto">
                    <div>
                        <ul class="nav me-auto mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#"><i class="bx bx-headphone fs-5"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#"><i class="bx bx-user fs-5"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- navbar end  -->

    <!-- mobile header start  -->
    <header class="d-sm-block d-lg-none mainMobileHeader">




        <!-- menubar, searchbar and cart start -->
        <div class="categories d-sm-block d-lg-none">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <button class="bg-white" id="sideNavMenuBar">
                            <i class="bx bx-menu fs-5"></i>
                        </button>
                    </div>
                    <div class="col">
                        <!-- form start  -->
                        <form class="searchBar">
                            <input type="search"
                                placeholder="Please Search by Part Number, by Brand, by Model name or any keyword"
                                name="search" class="border border-2 w-100">
                        </form>
                        <!-- form end  -->
                    </div>
                    <div class="col-auto">
                        <button type="button" class="position-relative bg-white" id="cartDropdownMobile"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            <span class="badge text-bg-danger text-white rounded-circle cart-count"></span>
                            <i class="bx bx-shopping-bag fs-5"></i>
                        </button>
                        <div class="dropdown-menu p-4" style="width: 350px" aria-labelledby="cartDropdownMobile">
                            @if(empty($cart))
                            <p class="mb-0">No products in the cart.</p>
                            @endif
                            <!-- table start  -->
                            @if(!empty($cart))
                            <table class="table table-borderless">
                                <tbody>
                                    @foreach($cart as $id => $details)
                                    <tr>
                                        <td><a href="{{ route('cart.show') }}"
                                                class="text-dark">{{ substr($details['product_title'], 0, 30) }}<br>
                                                <p class="mb-0">{{ $details['quantity'] }} x
                                                    ${{ $details['product_price'] }}</p>
                                            </a> </td>
                                        <td><a href="{{ route('cart.show') }}">
                                                <img src="{{ asset('image/products/'.$details['product_image']) }}"
                                                    loading="lazy" width="75" alt="">
                                            </a></td>
                                        <td><a data-id="{{ $id }}" class="remove-from-cart" href="#"><i
                                                    class="bx bx-trash text-danger fs-5"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    <tr class="border-bottom border-top">
                                        <td colspan="3" class="text-center">Subtotal: ${{$subtotal}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><a href="{{ route('cart.show') }}" class="square-block-btn">View
                                                Cart</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><a href="{{ route('checkout.show') }}"
                                                class="square-block-btn bg-secondary">Checkout</a></td>

                                    </tr>
                                </tbody>
                            </table>
                            @endif
                            <!-- table end  -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- menubar, searchbar and cart end -->


    </header>
    <!-- mobile header end  -->



    <!-- sidebar start  -->
    <nav class="sidenav d-sm-block d-lg-none" id="sideNavBar">

        <!-- close button  -->
        <a href="#" class="bg-light pb-2"><i class="bx bx-x" id="sideNavCloseMenuBar"></i> Close</a>


        <!-- categories nav start  -->
        <ul class="ps-0 mt-2">
            <li>
                <a href="#" class="dropdown-btn sideNavDropdown">Dropdown
                    <i class="bx bx-plus"></i>
                </a>
                <ul class="dropdown-container sideNavsubmenu">
                    <li class="ps-1 pt-2">Networking</li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-btn sideNavDropdown">Dropdown
                    <i class="bx bx-plus"></i>
                </a>
                <ul class="dropdown-container sideNavsubmenu">
                    <li class="ps-1 pt-2">Networking</li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-btn sideNavDropdown">Dropdown
                    <i class="bx bx-plus"></i>
                </a>
                <ul class="dropdown-container sideNavsubmenu">
                    <li class="ps-1 pt-2">Networking</li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-btn sideNavDropdown">Dropdown
                    <i class="bx bx-plus"></i>
                </a>
                <ul class="dropdown-container sideNavsubmenu">
                    <li class="ps-1 pt-2">Networking</li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 1</a></li>
                </ul>
            </li>


        </ul>
        <!-- categories nav end  -->

    </nav>
    <!-- sidebar end  -->

    <!-- main layout start  -->
    <div class="layout-container">




