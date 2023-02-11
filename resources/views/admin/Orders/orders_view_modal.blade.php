<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form method="post" id="updateOrdersForm" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="up_id">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background:#fcfcfc">

                    <div class="col-7">
                        <h1 class="modal-title fs-5" id="order-no"></h1>
                    </div>
                    <div class="col-4 text-end">
                        <button class="btn" id="order-status" style="background:#f8dda7;color:#94660c;"
                            disabled></button>
                    </div>

                    <div class="border-start">
                        <button type="button" id="close-btn" class="btn-close" ></button>
                    </div>

                </div>
                <div class="modal-body">


                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">

                                <div class="col">

                                    <div class="row align-items-center">
                                        <div class="col">
                                            <p class="mb-0 fw-bold">Billing details</p>

                                        </div>
                                    </div>

                                    <div class="billing">
                                        <p class="mb-0 mt-2" id="order-address"></p>

                                        <p class="mb-0  mt-2" style="font-weight:600">Email</p>
                                        <p class="mb-0" id="order-email"></p>

                                        <p class="mb-0  mt-2" style="font-weight:600">Phone</p>
                                        <p class="mb-0" id="order-phone"></p>

                                        <p class="mb-0  mt-2" style="font-weight:600">Payment via</p>
                                        <p class="mb-0" id="order-payment"></p>
                                    </div>


                                </div>

                                <!-- shipping -->
                                <div class="col">
                                    <p>
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <p class="mb-0 fw-bold">Shipping details</p>

                                        </div>

                                    </div>

                                    <div class="shipping">
                                        <p class="mb-0 mt-2" id="order-address">John Rutherford
                                            9750 Lake District Ln
                                            Orlando, FL 32832</p>

                                        <p class="mb-0  mt-2" style="font-weight:600">Shipping method</p>
                                        <p class="mb-0">Flat rate</p>
                                    </div>
                                </div>
                                <!-- end -->
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>

                                                <tr>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="quick_view">
                 
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <div class="col">
                        <a   data-status="Processing" class="btn btn-light border update_status">Processing</a>
                        <a   data-status="Completed" class="btn btn-light border update_status">Completed</a>

                    </div>
                    <a href="#" class="edit">Edit</a>
                </div>
            </div>
        </div>
    </form>
</div>