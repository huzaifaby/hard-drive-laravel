@extends('admin.index')
@section('content')

<h3 class="mt-4">Reviews</h3>
<div class="mt-4">
    <form method="post" action="{{ route('update.reviews') }}" id="updateSettingForm" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $product_reviews->id }}" class="form-control" name="up_id" id="up_id">

   
        <div class="row">

        <div class="col">
                <div class="form-group">
                    <label for="product_id">Product</label>
                    <select class="form-select" name="product_id" id="product_id">
                    <option  hidden value="{{ $product->product_id }}">{{ $product->product_title }}</option>
                    @foreach($all_product as $key=>$allproduct)
                    <option value="{{ $allproduct->id }}">{{ $allproduct->product_title }}</option>
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="user_name">Name</label>
                    <input type="text" name="user_name" value="{{ $product_reviews->user_name }}" id="user_name" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="user_email">Email</label>
                    <input type="email" name="user_email" value="{{ $product_reviews->user_email }}" id="user_email" class="form-control">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="review_stars">Stars</label>
                    <input type="text" name="review_stars" value="{{ $product_reviews->review_stars }}" id="review_stars" class="form-control">
                </div>
            </div>
        
        </div>

        <div class="row">
            <div class="form-group mt-2">
                <label for="review_description">Review Description</label>
                <textarea class="form-control" name="review_description" id="review_description" cols="5" rows="5">{{ $product_reviews->review_description }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary update_setting">Save</button>
    </form>
</div>

@endsection