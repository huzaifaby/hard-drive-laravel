@extends('admin.index')
@section('content')

<h3 class="mt-4">Update Coupons</h3>
<div class="mt-4">
    <form method="post" action="{{ route('update.coupon') }}" id="updateSettingForm" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $coupon->coupons_id }}" class="form-control" name="up_id" id="up_id">

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="coupon_code">Coupon Code</label>
                    <input type="text" name="coupon_code" value="{{ $coupon->coupon_code }}" id="coupon_code"
                        class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="discount_type">Discount Type</label>
                    <select class="form-select" name="discount_type" id="discount_type">
                        <option hidden value="{{ $coupon->discount_type }}">{{ $coupon->discount_type }}</option>
                        <option value="Percentage discount">Percentage discount</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="coupon_amount">Coupon Amount</label>
                    <input type="text" name="coupon_amount" value="{{ $coupon->coupon_amount }}" id="coupon_amount"
                        class="form-control">
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col">
                <div class="form-group">
                    <label for="product_id">Product</label>
                    <select name="product_id" id="product_id" class="form-select">
                        <option value="{{ $coupon->product_id }}">{{ $coupon->product_title }}</option>
                        @foreach($products as $key=>$product)
                        <option value="{{ $product->id }}">{{ $product->product_title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="coupon_expiry_date">Expiry Date</label>
                    <input type="date" name="coupon_expiry_date" value="{{ $coupon->coupon_expiry_date }}"
                        id="coupon_expiry_date" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="coupon_status">Status</label>
                    <select name="coupon_status" id="coupon_status" class="form-select">
                    @if($coupon->coupon_status == 1)
                    <option hidden value="{{ $coupon->coupon_status }}">Active</option>
                    @else
                    <option hidden value="{{ $coupon->coupon_status }}">Deactive</option>
                    @endif
                        <option value="1">Active</option>
                        <option value="0">In active</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="minimum_spend">Minimum Spend</label>
                    <input type="text" name="minimum_spend" value="{{ $coupon->minimum_spend }}" id="minimum_spend" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="maximum_spend">Maximum Spend</label>
                    <input type="text" name="maximum_spend" value="{{ $coupon->maximum_spend }}" id="maximum_spend" class="form-control">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary update_setting">Update</button>
    </form>
</div>

@endsection