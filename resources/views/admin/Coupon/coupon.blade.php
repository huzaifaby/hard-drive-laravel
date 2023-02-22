@extends('admin.index')
@section('content')


<h1 class="mt-4">Coupon Tables</h1>
<div class="mb-4 bg-light text-end p-2">
    <a href="{{ route('coupon.add') }}" class="btn btn-success ">Add Coupon </a>



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
                        <th scope="col">Code</th>
                        <th scope="col">Coupon type</th>
                        <th scope="col">Coupon amount</th>
                        <th scope="col">Expiry Date</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coupons as $key=>$coupon)
                    <tr>
                        <td>{{ $coupon->coupon_code }}</td>
                        <td>{{ $coupon->discount_type }}</td>
                        <td>{{ $coupon->coupon_amount }}</td>
                        <td>{{ $coupon->coupon_expiry_date }}</td>
                        <td>
                            <a href="edit-coupon/{{ $coupon->id }}" class="btn btn-success">
                                <i class="fas fa-edit"></i></a>

                            <a href="" data-id="{{ $coupon->id }}" class="btn btn-danger delete_coupon">
                                <i class="las la-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $coupons->links() !!}
        </div>
    </div>
</div>

@include('admin.Coupon.coupon_js')
@endsection