<?php include("header.php"); ?>

<div class="cart-wrapper">
    <div class="container">

        <!-- breadcrumb start  -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Guest</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </nav>
        <!-- breadcrumb end  -->

        <div class="row mt-5 align-items-center">
            <div class="col-md-6 mb-3 px-5">
                <h2 class="border-bottom pb-3 mb-4">Don't have an account ? Place Order as Guest</h2>
                <a href="#" class="square-block-btn mb-3 py-3"> Checkout as Guest <i class='bx bx-right-arrow-alt'></i> </a>
                <a href="#" class="square-block-btn py-3"> <i class='bx bx-arrow-back'></i> Back to Shopping  </a>
            </div>
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
        </div>

    </div>
</div>

<?php include("footer.php"); ?>