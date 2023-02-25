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

        <h1 class="mb-5 text-center fw-normal">My Account</h1>

        <div class="row">
            <div class="col-md-3">
                <nav class="side-buttons">
                    <ul class="ps-0">
                        <li class="border-top px-2 py-3"><a class="text-dark" href="{{ route('customer.dashboard') }}"><i class="bx bxs-dashboard"></i>
                                Dashboard</a></li>
                        <li class="border-top px-2 py-3"><a class="text-dark" href="{{ route('customer.orders') }}"><i class='bx bxs-cart'></i>
                                Orders</a></li>
                        <li class="border-top px-2 py-3"><a class="text-dark" href="{{ route('customer.profile') }}"><i class='bx bxs-user'></i> My
                                Profile</a></li>
                        <li class="border-top px-2 py-3"><a class="text-dark" href="{{ route('customer.reset') }}"><i class='bx bx-reset'></i> Reset
                                Password</a></li>
                        <li class="border-top border-bottom px-2 py-3"><a class="text-dark" href="{{ route('logout') }}"><i
                                    class='bx bx-user-x'></i> Logout</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-9">