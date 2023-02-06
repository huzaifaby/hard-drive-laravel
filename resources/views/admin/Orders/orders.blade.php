@extends('admin.index')
@section('content')


<h1 class="mt-4">Orders Tables</h1>
<div class="mb-4 bg-light text-end p-2">
    <a href="{{ route('orders.csv') }}" class="btn btn-success ">Import</a>
    <a href="{{ route('orders.export') }}" class="btn btn-success">Export</a>


</div>
<div class="card mb-4">
    <div class="card-header">
        <input type="text" name="search" id="search" class="form-control" placeholder="Search Here...">
    </div>
    <div class="card-body">
        <div class="table-data">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Order</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $key=>$order)
                    <tr>
                        <td>#{{ $order->orders_id }} {{ $order->full_name }}</td>
                        @if($order->created_at->diffInHours(Carbon\Carbon::now()) < 24) <td>
                            {{ $order->created_at->diffInHours(Carbon\Carbon::now()) }} hours ago</td>
                            @else
                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                            @endif
                            @if($order->order_status == 'Pending' )
                            <td style="background:#f8dda7;color:#94660c;">{{ $order->order_status }}</td>
                            @else
                            <td style="background:#c6e1c6;color:#5b841b;">{{ $order->order_status }}</td>
                            @endif
                            <td>{{ $order->total_amount }}</td>
                            <td>
                                <a href="edit-orders/{{ $order->orders_id }}" class="btn btn-success">
                                    <i class="fas fa-edit"></i></a>

                                <a href="" data-id="{{ $order->orders_id }}" class="btn btn-danger delete_orders">
                                    <i class="las la-trash-alt"></i></a>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $orders->links() !!}
        </div>
    </div>
</div>

@include('admin.Orders.orders_js')


@endsection