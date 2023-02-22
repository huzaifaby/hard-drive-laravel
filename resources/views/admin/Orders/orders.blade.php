@extends('admin.index')
@section('content')


<h1 class="mt-4">Orders Tables</h1>
<div class="mb-4 bg-light text-end p-2">
    <a href="{{ route('orders.export') }}" class="btn btn-success">Export</a>
</div>

<nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ url('/dashboard/orders') }}"
                class="text-dark text-decoration-none ">All <span class="all-orders"></span></a></li>
        <li class="breadcrumb-item"><a href="{{ url('/dashboard/orders') }}?status=processing"
                class="text-decoration-none ">Processing <span class="text-dark processing-orders"></span></a></li>
        <li class="breadcrumb-item"><a href="{{ url('/dashboard/orders') }}?status=on hold"
                class="text-decoration-none '">On hold <span class="text-dark onhold-orders"></span></a></li>
        <li class="breadcrumb-item"><a href="{{ url('/dashboard/orders') }}?status=completed"
                class="text-decoration-none ">Completed <span class="text-dark completed-orders"></span></a></li>
        <li class="breadcrumb-item"><a href="{{ url('/dashboard/orders') }}?status=cancelled"
                class="text-decoration-none ">Cancelled <span class="text-dark cancelled-orders"></span></a></li>
        <li class="breadcrumb-item"><a href="{{ url('/dashboard/orders') }}?status=refunded"
                class="text-decoration-none ">Refunded <span class="text-dark refunded-orders"></span></a></li>
        <li class="breadcrumb-item"><a href="{{ url('/dashboard/orders') }}?status=failed"
                class="text-decoration-none ">Failed <span class="text-dark failed-orders"></span></a></li>
    </ol>
</nav>

<div class="card mb-4">
    <div class="card-header">
        <input type="text" name="search" id="search" class="form-control" placeholder="Search Here...">
    </div>
    <div class="card-body">
        <div class="table-data table-responsive">
            <table class="table  ">
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
                        @if($order->created_at->diffInSeconds(Carbon\Carbon::now()) < 60) <td>
                            {{ $order->created_at->diffInSeconds(Carbon\Carbon::now()) }} seconds ago</td>
                            @elseif($order->created_at->diffInMinutes(Carbon\Carbon::now()) < 60) <td>
                                {{ $order->created_at->diffInMinutes(Carbon\Carbon::now()) }} minutes ago</td>
                                @elseif($order->created_at->diffInHours(Carbon\Carbon::now()) < 24) <td>
                                    {{ $order->created_at->diffInHours(Carbon\Carbon::now()) }} hours ago</td>
                                    @else
                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                    @endif

                                    @if($order->order_status == 'Processing' )
                                    <td style="background:#f8dda7;color:#94660c;">{{ $order->order_status }}</td>
                                    @else
                                    <td style="background:#c6e1c6;color:#5b841b;">{{ $order->order_status }}</td>
                                    @endif
                                    <td>{{ $order->total_amount }}</td>
                                    <td>

                                        <a href="" data-bs-toggle="modal" data-bs-target="#updateModal"
                                            data-id="{{ $order->orders_id }}"
                                            data-status="{{ $order->order_status }}"
                                            data-address="{{ $order->address }}"
                                            data-email="{{ $order->email }}"
                                            data-phone="{{ $order->phone_no }}"
                                            data-payment="{{ $order->payment_method }}"

                                            
                                            class="btn btn-primary orders_view">
                                            <i class="fas fa-eye"></i></a>

                                        <a href="edit-orders/{{ $order->orders_id }}" class="btn btn-success">
                                            <i class="fas fa-edit"></i></a>

                                        <a href="" data-id="{{ $order->orders_id }}"
                                            class="btn btn-danger delete_orders">
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
@include('admin.Orders.orders_view_modal')



@endsection