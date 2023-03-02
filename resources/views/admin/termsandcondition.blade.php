@extends('admin.index')
@section('content')

<h1 class="my-4 text-center">Terms and Condition</h1>
<div class="card">
    <div class="card-body">
        <form method="post" id="updateSettingForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $TermsandCondition->id }}" class="form-control" name="up_id" id="up_id">

            
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ $TermsandCondition->title }}" id="title" class="form-control"
                            placeholder="title">
                    </div>
                </div>
         
            </div>

            
            <div class="row">
                <div class="form-group mt-2">
                    <label for="termsandcondition_description">Description</label>
                    <textarea class="form-control" name="termsandcondition_description" placeholder="description" id="termsandcondition_description" cols="5"
                        rows="5">{{ $TermsandCondition->description }}</textarea>
                </div>
            </div>
          

            <div class="row mt-2">
             
             <div class="col">
                 <label for="meta_title">Meta Title</label>
                 <input type="text" value="{{ $TermsandCondition->meta_title }}" class="form-control" placeholder="Meta Title" name="meta_title" id="meta_title">
             </div>

             <div class="col">
                 <label for="meta_description">Meta Title</label>
                 <input type="text" value="{{ $TermsandCondition->meta_description }}" class="form-control" placeholder="Meta Description" name="meta_description" id="meta_description">
             </div>
         </div>

        <div class="row my-4 text-center">
            <div class="col">
            <button type="submit" class="btn btn-primary update_termsandcondition">Update Terms and Condition</button>

            </div>
        </div>

    

        </form>
    </div>
</div>



<script>
$(document).ready(function() {

  
    //update termsandcondition  data
    $(document).on('click', '.update_termsandcondition', function(e) {
        e.preventDefault();
        let up_id = $('#up_id').val();
        let title = $('#title').val();
        let termsandcondition_description = CKEDITOR.instances['termsandcondition_description'].getData();
        let meta_title = $('#meta_title').val();
        let meta_description = $('#meta_description').val();
        
        var formData = new FormData();
        formData.append('up_id', up_id);
        formData.append('title', title);
        formData.append('termsandcondition_description', termsandcondition_description);
        formData.append('meta_title', meta_title);
        formData.append('meta_description', meta_description);


        $.ajax({
            url: "{{ route('update.termsandcondition') }}",
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
      $('#termsandcondition_description').summernote({
        tabsize: 2,
        height: 300
      });
    </script>

@endsection