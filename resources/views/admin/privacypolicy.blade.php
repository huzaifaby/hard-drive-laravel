@extends('admin.index')
@section('content')

<h1 class="my-4 text-center">Privacy Policy</h1>
<div class="card">
    <div class="card-body">
        <form method="post" id="updateSettingForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $PrivacyPolicy->id }}" class="form-control" name="up_id" id="up_id">

            
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ $PrivacyPolicy->title }}" id="title" class="form-control"
                            placeholder="title">
                    </div>
                </div>
         
            </div>

            
            <div class="row">
                <div class="form-group mt-2">
                    <label for="privacypolicy_description">Description</label>
                    <textarea class="form-control" name="privacypolicy_description" placeholder="description" id="privacypolicy_description" cols="5"
                        rows="5">{{ $PrivacyPolicy->description }}</textarea>
                </div>
            </div>
          

            <div class="row mt-2">
             
             <div class="col">
                 <label for="meta_title">Meta Title</label>
                 <input type="text" value="{{ $PrivacyPolicy->meta_title }}" class="form-control" placeholder="Meta Title" name="meta_title" id="meta_title">
             </div>

             <div class="col">
                 <label for="meta_description">Meta Title</label>
                 <input type="text" value="{{ $PrivacyPolicy->meta_description }}" class="form-control" placeholder="Meta Description" name="meta_description" id="meta_description">
             </div>
         </div>

        <div class="row my-4 text-center">
            <div class="col">
            <button type="submit" class="btn btn-primary update_privacyPolicy">Save Privacy Policy</button>

            </div>
        </div>

    

        </form>
    </div>
</div>



<script>
$(document).ready(function() {

  
    //update setting  data
    $(document).on('click', '.update_privacyPolicy', function(e) {
        e.preventDefault();
        let up_id = $('#up_id').val();
        let title = $('#title').val();
        let privacypolicy_description = CKEDITOR.instances['privacypolicy_description'].getData();
        let meta_title = $('#meta_title').val();
        let meta_description = $('#meta_description').val();
        
        var formData = new FormData();
        formData.append('up_id', up_id);
        formData.append('title', title);
        formData.append('privacypolicy_description', privacypolicy_description);
        formData.append('meta_title', meta_title);
        formData.append('meta_description', meta_description);


        $.ajax({
            url: "{{ route('update.privacyPolicy') }}",
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


<script>
      $('#privacypolicy_description').summernote({
        tabsize: 2,
        height: 300
      });
    </script>


@endsection