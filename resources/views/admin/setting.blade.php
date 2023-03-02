@extends('admin.index')
@section('content')

<h1 class="my-4 text-center">Setting</h1>
<div class="card">
    <div class="card-body">
        <form method="post" id="updateSettingForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $setting->id }}" class="form-control" name="up_id" id="up_id">

            <div class="form-group">
                <img src="{{ asset('image/logo/'.$setting->logo) }}" class="rounded-square" style="width: 150px;"
                    alt="Avatar" />
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" class="form-control" name="logo" id="logo">
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="phone_no_1">Phone no 1</label>
                        <input type="tel" name="phone_no_1" value="{{ $setting->phone_no_1 }}" id="phone_no_1" class="form-control"
                            placeholder="Phone no 1">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="phone_no_2">Phone no 2</label>
                        <input type="tel" name="phone_no_2" id="phone_no_2" value="{{ $setting->phone_no_2 }}" class="form-control"
                            placeholder="Phone no 2">
                    </div>
                </div>

                <div class="col">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" value="{{ $setting->email }}" placeholder="Email" id="email">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="facebook">Faceook</label>
                    <input type="text" class="form-control" value="{{ $setting->facebook }}" placeholder="facebook" id="facebook">
                </div>

                <div class="col">
                    <label for="twitter">Twitter</label>
                    <input type="text" value="{{ $setting->twitter }}" class="form-control" placeholder="twitter" name="twitter" id="twitter">
                </div>

                <div class="col">
                    <label for="instagram">Instagram</label>
                    <input type="text" value="{{ $setting->instagram }}" class="form-control" placeholder="instagram" name="instagram" id="instagram">
                </div>

                <div class="col">
                    <label for="linkedin">linkedin</label>
                    <input type="text" value="{{ $setting->linkedin }}" class="form-control" placeholder="linkedin" name="linkedin" id="linkedin">
                </div>
            </div>

            <div class="row mt-2">
             
             <div class="col">
                 <label for="meta_title">Meta Title</label>
                 <input type="text" value="{{ $setting->meta_title }}" class="form-control" placeholder="Meta Title" name="meta_title" id="meta_title">
             </div>

             <div class="col">
                 <label for="meta_description">Meta Title</label>
                 <input type="text" value="{{ $setting->meta_description }}" class="form-control" placeholder="Meta Description" name="meta_description" id="meta_description">
             </div>
         </div>

            <div class="row">
                <div class="form-group mt-2">
                    <label for="footer_description">Footer Description</label>
                    <textarea class="form-control" name="footer_description" placeholder="Footer Description" id="footer_description" cols="5"
                        rows="5">{{ $setting->footer_description }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group mt-2">
                    <label for="address">Address</label>
                    <textarea class="form-control" name="address" placeholder="address" id="address" cols="5"
                        rows="5">{{ $setting->Address }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary update_setting">Save Setting</button>
        </form>
    </div>
</div>



<script>
$(document).ready(function() {

  
    //update setting  data
    $(document).on('click', '.update_setting', function(e) {
        e.preventDefault();
        let up_id = $('#up_id').val();
        let phone_no_1 = $('#phone_no_1').val();
        let phone_no_2 = $('#phone_no_2').val();
        let email = $('#email').val();
        let meta_title = $('#meta_title').val();
        let meta_description = $('#meta_description').val();
        let address = $('#address').val();
        let footer_description = $('#footer_description').val();
        let facebook = $('#facebook').val();
        let twitter = $('#twitter').val();
        let instagram = $('#instagram').val();
        let linkedin = $('#linkedin').val();
        let logo = $('#logo')[0].files[0];
        
        var formData = new FormData();
        formData.append('up_id', up_id);
        formData.append('phone_no_1', phone_no_1);
        formData.append('phone_no_2', phone_no_2);
        formData.append('email', email);
        formData.append('meta_title', meta_title);
        formData.append('meta_description', meta_description);
        formData.append('address', address);
        formData.append('footer_description', footer_description);
        formData.append('logo', logo);
        formData.append('facebook', facebook);
        formData.append('twitter', twitter);
        formData.append('instagram', instagram);
        formData.append('linkedin', linkedin);


        $.ajax({
            url: "{{ route('update.setting') }}",
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status == 'success') {

                    Swal.fire(
                        'Update Successfully!',
                        '',
                        'success'
                    )

                }
            }
        });
    })
});
</script>

@endsection