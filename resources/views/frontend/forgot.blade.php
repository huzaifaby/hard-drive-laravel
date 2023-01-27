<?php include("header.php"); ?>

<div class="cart-wrapper">
    <div class="container">

        <!-- breadcrumb start  -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
            </ol>
        </nav>
        <!-- breadcrumb end  -->

        <div class="row mt-5 justify-content-center">
            <div class="col-md-6 mb-5">
                <div class="container">
                    <h2>Forgot Password</h2>
                    <span class="heading-border mb-4"></span>
                    <p class>Please Write your Email</p>
                    <!-- form start  -->
                    <form>
                        <div class="col mb-3">
                            <label for="loginEmail" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control shadow-none" placeholder="Email" id="loginEmail">
                        </div>
                        <button type="submit" class="pills-sm-btn">Submit</button>
                    </form>
                    <!-- form end -->
                </div>
            </div>
        </div>

    </div>
</div>

<?php include("footer.php"); ?>