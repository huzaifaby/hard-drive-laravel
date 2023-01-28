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
            <div class="col-md-4 mb-5">
                <div class="container">
                    <div class="border-end bg-white" id="sidebar-wrapper">
                        <div class="sidebar-heading border-bottom bg-light"></div>
                        <div class="list-group list-group-flush">
                            <a class="list-group-item list-group-item-action list-group-item-light p-3"
                                href="{{ route('customer.dashboard') }}">Dashboard</a>
                            <a class="list-group-item list-group-item-action list-group-item-light p-3"
                                href="{{ route('customer.orders') }}">Orders</a>
                            <a class="list-group-item list-group-item-action list-group-item-light p-3"
                                href="{{ route('customer.profile') }}">My
                                Profile</a>
                            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Reset
                                Password</a>
                            <a class="list-group-item list-group-item-action list-group-item-light p-3"
                                href="{{ route('logout') }}">Logout</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h2>Edit Profile</h2>
                <div class="container">
                    <form>
                        <div class="row ">
                            <div class="col">
                                <div class="form-group">
                                    <label for="full_name">Name</label>
                                    <input type="text" class="form-control" name="full_name" id="full_name">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <label for="phone_no">Phone</label>
                                    <input type="text" class="form-control" name="phone_no" id="phone_no">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="fax">Fax</label>
                                    <input type="text" class="form-control" name="fax" id="fax">
                                </div>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <select class="form-control" name="city" id="city">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select class="form-control" name="country" id="country">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <label for="zip_code">Zip</label>
                                    <input type="text" class="form-control" name="zip_code" id="zip_code">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

@include('frontend.footer')