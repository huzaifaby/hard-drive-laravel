<?php include("header.php"); ?>

<div class="cart-wrapper mt-5">
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
                <form>
                    <div class="col mb-3">
                        <label for="loginEmail" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control shadow-none" placeholder="Email" id="loginEmail">
                    </div>
                    <div class="col mb-3">
                        <label for="loginPassword" class="form-label">Password <span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control shadow-none" placeholder="Password"
                            id="loginPassword">
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
                <p>Don't have an account ? <a href="#">Create one now</a></p>
                <!-- form start  -->
                <form>
                    <div class="col mb-3">
                        <label for="registerName" class="form-label">Full Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control shadow-none" placeholder="Full Name" id="registerName">
                    </div>
                    <div class="col mb-3">
                        <label for="registerEmail" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control shadow-none" placeholder="Email" id="registerEmail">
                    </div>
                    <div class="col mb-3">
                        <label for="registerPhone" class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control shadow-none" placeholder="Phone" id="registerPhone">
                    </div>
                    <div class="col mb-3">
                        <label for="registerAddress" class="form-label">Address <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control shadow-none" placeholder="Address" id="registerAddress">
                    </div>
                    <div class="col mb-3">
                        <label for="registerPassword" class="form-label">Password <span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control shadow-none" placeholder="Password"
                            id="registerPassword">
                    </div>
                    <div class="col mb-3">
                        <label for="cpassword" class="form-label">Confirm Password <span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control shadow-none" placeholder="Confirm Password"
                            id="cpassword">
                    </div>
                    <button type="submit" class="pills-sm-btn">Register</button>
                </form>
                <!-- form end -->
            </div>

            </div>
        </div>

    </div>
</div>

<?php include("footer.php"); ?>