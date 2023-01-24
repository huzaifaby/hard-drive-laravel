<?php include("header.php"); ?>

<div class="cart-wrapper mt-5">
    <div class="container">

        <!-- breadcrumb start  -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>
        <!-- breadcrumb end  -->

        <div class="row">
            <div class="col-md-8">
                <!-- table start  -->
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead class="border border-bottom border-0">
                            <tr>
                                <td colspan="2">Product</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Total</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><img src="https://jbsdevices.com/assets/images/products/9x3005-144.jpg"
                                        loading="lazy" width="180" alt=""></th>
                                <td class="align-middle">9X3005-144 Seagate Cheetah 10K.7 73.4GB 10000RPM U...
                                </td>
                                <td class="align-middle">$389.4</td>
                                <td class="align-middle">
                                    <!-- Inc / Dec start  -->
                                    <ul class="list-group list-group-horizontal">
                                        <li class="list-group-item"><button class="bg-white"> <i class="bx bx-plus"></i> </button></li>
                                        <li class="list-group-item">
                                            <p class="card-text-para mb-0">1</p>
                                        </li>
                                        <li class="list-group-item"><button class="bg-white"> <i class="bx bx-minus"></i> </button></li>
                                    </ul>
                                    <!-- Inc / Dec end  -->
                                </td>
                                <td class="align-middle">$389.4</td>
                                <td class="align-middle"><i class="bx bx-trash text-danger fs-4"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- table end  -->
            </div>
            <div class="col-md-4">

                <!-- side card  -->
                <div class="card bg-light border border-0">
                    <div class="card-body">
                        <h3 class="p-2 border-bottom">Cart totals</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="text-end">$389.4</td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td class="text-end pb-4">0%</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td class="text-end pb-4">$389.4</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="square-block-btn">Proceed to Checkout</a>
                        <a href="#" class="addtoCompare py-3 border-bottom">Back to Shopping</a>
                        <img src="https://jbsdevices.com/assets/front/images/stripe-payment.png" loading="lazy"
                            class="img-fluid pt-3" alt="">
                    </div>
                </div>
                <!-- side card /  -->

            </div>
        </div>

    </div>
</div>

<?php include("footer.php"); ?>