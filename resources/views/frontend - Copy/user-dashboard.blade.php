@include('frontend.sidebar-user-dashboard')




<h4 class="pb-2 text-start fw-normal">Recent Orders</h4>

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

<!-- box end -->

</div>
</div>

</div>
</div>

@include('frontend.footer')