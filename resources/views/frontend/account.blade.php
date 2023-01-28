@include('frontend.header')


<div class="cart-wrapper ">
    <div class="container">

        <!-- breadcrumb start  -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </nav>
        <!-- breadcrumb end  -->

        <div class="row mt-5">
            <div class="col-md-6 mb-5">
                <div class="container">
                    <h2>Login</h2>
                    <span class="heading-border mb-4"></span>
                    <p class>Login to your JBS user portal</p>
                    <!-- form start  -->
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('customer.login') }}">
                        @csrf
                        <div class="col mb-3">
                            <label for="loginEmail" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control shadow-none" placeholder="Email"
                                id="loginEmail">
                        </div>
                        <div class="col mb-3">
                            <label for="loginPassword" class="form-label">Password <span
                                    class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control shadow-none"
                                placeholder="Password" id="loginPassword">
                        </div>
                        <div class="mb-3 form-check border-bottom pb-3">
                            <input type="checkbox" class="form-check-input shadow-none" id="check">
                            <label class="form-check-label" for="check">Remember me</label>
                        </div>
                        <button type="submit" class="pills-sm-btn">Login</button>
                    </form>
                    <!-- form end -->
                </div>
            </div>
            <div class="col-md-6">

                <div class="container">
                    <h2>Register</h2>
                    <span class="heading-border mb-4"></span>
                    <p>Don't have an account? Create one now</p>
                    <!-- form start  -->
                    <form action="{{ route('customer.register') }}" method="POST">
                        @csrf

                        <div class="col mb-3">
                            <label for="full_name" class="form-label">Full Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control shadow-none" name="full_name" placeholder="Full Name"
                                id="full_name">
                                @if ($errors->has('full_name'))
                            <span class="text-danger">{{ $errors->first('full_name') }}</span>
                            @endif
                        </div>
                        <div class="col mb-3">
                            <label for="email" class="form-label">Email <span
                                    class="text-danger">*</span></label>
                          
                            <input type="email" class="form-control shadow-none" name="email" placeholder="Email"
                                id="email">
                                @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="col mb-3">
                            <label for="registerPhone" class="form-label">Phone <span
                                    class="text-danger">*</span></label>
                            <input type="tel" class="form-control shadow-none" name="phone_no" placeholder="Phone"
                                id="registerPhone">
                        </div>
                        <div class="col mb-3">
                            <label for="registerAddress" class="form-label">Address <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control shadow-none" name="address" placeholder="Address"
                                id="registerAddress">
                        </div>
                        <div class="col mb-3">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control shadow-none" name="password"
                                placeholder="Password" id="password">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif

                        </div>
                        <div class="col mb-3">
                            <label for="cpassword" class="form-label">Confirm Password <span
                                    class="text-danger">*</span></label>
                            <input type="password" class="form-control shadow-none" name="password_confirmation"
                                placeholder="Confirm Password" id="cpassword">
                        </div>
                        <button type="submit" class="pills-sm-btn">Register</button>
                    </form>
                    <!-- form end -->
                </div>

            </div>
        </div>

    </div>
</div>

@include('frontend.footer')