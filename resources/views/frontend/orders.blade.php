@include('frontend.sidebar-user-dashboard')


<h4 class="pb-2 text-start fw-normal">Purchased Items</h4>

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
        @foreach($orders as $key=>$order)
        <tr>
            <td>{{ $order['id'] }}</td>
            <td>{{ date("F d, Y", strtotime($order['created_at'])) }}</td>
            <td>${{ $order['total_amount'] }}/-</td>
            <td>{{ $order['order_status'] }}</td>
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