@extends('admin.index')
@section('content')

<h3 class="mt-4">Customers</h3>
<div class="mt-4">
    <form method="post" action="{{ route('update.customers') }}" id="updateSettingForm" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $customers->id }}" class="form-control" name="up_id" id="up_id">

        <div class="form-group">
            <img src="{{ asset('image/customer/'.$customers->customer_image) }}" class="rounded-square"
                style="width: 150px;" alt="Avatar" />
        </div>
        <div class="form-group">
            <label for="customer_image">Customer Image</label>
            <input type="file" class="form-control" name="customer_image" id="customer_image">
        </div>
        <div class="row">

            <div class="col">
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="tel" name="full_name" value="{{ $customers->full_name }}" id="full_name" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="tel" name="email" value="{{ $customers->email }}" id="email" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="phone_no">Phone No</label>
                    <input type="tel" name="phone_no" id="phone_no" value="{{ $customers->phone_no }}" class="form-control">
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col">
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="tel" name="country" value="{{ $customers->country }}" id="country" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="tel" name="city" value="{{ $customers->city }}" id="city" class="form-control">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="zip_code">Zip Code</label>
                    <input type="tel" name="zip_code" value="{{ $customers->zip_code }}" id="zip_code" class="form-control">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="fax_no">Fax No</label>
                    <input type="tel" name="fax_no" id="fax_no" value="{{ $customers->fax_no }}" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group mt-2">
                <label for="address">Address</label>
                <textarea class="form-control" name="address" id="address" cols="5" rows="5">{{ $customers->address }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary update_setting">Save</button>
    </form>
</div>

@endsection