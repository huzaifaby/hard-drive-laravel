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
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('customer.profile') }}">My
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
                <h2>Recent Orders</h2>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#ORDER</th>
                                <th scope="col">DATE</th>
                                <th scope="col">ORDER TOTAL</th>
                                <th scope="col">ORDER STATUS</th>
                                <th scope="col">VIEW</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recent_orders as $key=>$recentorders)
                            <tr>
                                <td>{{ $recentorders['id'] }}</td>
                                <td>{{ date("F d, Y", strtotime($recentorders['created_at'])) }}</td>
                                <td>${{ $recentorders['total_amount'] }}/-</td>
                                <td>{{ $recentorders['order_status'] }}</td>
                                <td></td>

                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>

@include('frontend.footer')