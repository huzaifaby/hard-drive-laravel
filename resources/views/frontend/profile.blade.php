@include('frontend.sidebar-user-dashboard')


<h4 class="pb-2 text-start fw-normal">Edit Profile</h4>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        @if($profile->customer_image == null)
        <img src="https://jbsdevices.com/assets/images/1615158947profileimagelogo.png" width="115" loading="lazy"
            class="mb-3" alt="">
        @else

        <img src="{{ asset('image/customer/'.$profile->customer_image) }}" width="115" loading="lazy" class="mb-3"
            alt="">
        @endif

        <div class="col-6"> <input type="file" name="customer_image" id="customer_image"
                class="form-control border-bottom border-0 rounded-0"></div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="hidden" class="form-control" value="{{ $profile->id }}" name="id">
            <input type="text" placeholder="Full Name" value="{{ $profile->full_name }}" name="full_name" id="full_name"
                class="form-control shadow-none border-bottom border-0 rounded-0">
        </div>
        <div class="col">
            <input type="email" value="{{ $profile->email }}" name="email" id="email" placeholder="Email"
                class="form-control shadow-none border-bottom border-0 rounded-0">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="text" placeholder="Phone No." value="{{ $profile->phone_no }}" name="phone_no" id="phone_no"
                class="form-control shadow-none border-bottom border-0 rounded-0">
        </div>
        <div class="col">
            <input type="text" placeholder="Fax" value="{{ $profile->fax_no }}" name="fax_no" id="fax"
                class="form-control shadow-none border-bottom border-0 rounded-0">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="text" placeholder="City" name="city" id="city" value="{{ $profile->city }}"
                class="form-control shadow-none border-bottom border-0 rounded-0">
        </div>
        <div class="col">
            <select name="country" id="country" class="form-select shadow-none border-bottom border-0 rounded-0">
                <option value="{{ $profile->country }}">{{ $profile->country }}</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="text" placeholder="Zip Code" value="{{ $profile->zip_code }}" name="zip_code" id="zip_code"
                class="form-control shadow-none border-bottom border-0 rounded-0">
        </div>
        <div class="col">
            <input type="text" placeholder="Address" value="{{ $profile->address }}" name="address" id="address"
                class="form-control shadow-none border-bottom border-0 rounded-0">
        </div>
    </div>
    <div class="col-2"><button class="square-block-btn" type="submit">Save</button></div>
</form>
<!-- box end -->

</div>
</div>

</div>
</div>

@include('frontend.footer')