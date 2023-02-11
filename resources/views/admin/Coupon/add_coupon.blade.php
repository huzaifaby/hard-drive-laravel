@extends('admin.index')
@section('content')

<h3 class="mt-4">Add Coupon</h3>
<div class="mt-4">
    <form method="post" action="{{ route('save.coupon') }}" enctype="multipart/form-data">
        @csrf


        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="coupon_code">Coupon Code</label>
                    <input type="text" name="coupon_code" id="coupon_code" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="discount_type">Discount Type</label>
                    <select class="form-select" name="discount_type" id="discount_type">
                        <option value="Percentage discount">Percentage discount</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="coupon_amount">Coupon Amount</label>
                    <input type="text" name="coupon_amount" id="coupon_amount" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col">
                <div class="form-group">
                    <label for="product_id">Product</label>
                    <select name="product_id" id="product_id" class="form-select">
                        @foreach($products as $key=>$product)
                        <option value="{{ $product->id }}">{{ $product->product_title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="coupon_expiry_date">Expiry Date</label>
                    <input type="date" name="coupon_expiry_date" id="coupon_expiry_date" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="coupon_status">Status</label>
                    <select name="coupon_status" id="coupon_status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">In Active</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="minimum_spend">Minimum Spend</label>
                    <input type="text" name="minimum_spend" id="minimum_spend" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="maximum_spend">Maximum Spend</label>
                    <input type="text" name="maximum_spend" id="maximum_spend" class="form-control">
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary update_setting">Save</button>
    </form>
</div>

@endsection