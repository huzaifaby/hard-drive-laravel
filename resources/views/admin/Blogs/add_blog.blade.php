@extends('admin.index')
@section('content')

<h3 class="mt-4">Add Blogs</h3>
<div class="mt-4">
    <form method="post" action="{{ route('blog.save') }}" id="updateSettingForm" enctype="multipart/form-data">
        @csrf

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="blog_title">Title</label>
                    <input type="text" name="blog_title" id="blog_title" class="form-control" >
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="blog_slug">Slug</label>
                    <input type="text" name="blog_slug" id="blog_slug" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="blog_category">Category</label>
                    <input type="text" name="blog_category" id="blog_category" class="form-control">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="blog_tags">Tags</label>
                    <input type="text"  name="blog_tags" id="blog_tags" class="form-control">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="blog_source">Source</label>
                    <input type="text" name="blog_source" id="blog_source" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group mt-2">
                <label for="blog_description">Description</label>
                <textarea class="form-control"  name="blog_description" id="blog_description" cols="5"
                    rows="5"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="form-group mt-2">
                <label for="blog_image">Image</label>
                <input type="file" name="blog_image"  class="form-control">
            </div>
        </div>


        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" id="meta_title" class="form-control">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <input type="text" name="meta_description" id="meta_description" class="form-control">
                </div>
            </div>
        </div>



        <button type="submit" class="btn btn-primary update_setting">Save</button>
    </form>
</div>


<script>
      $('#blog_description').summernote({
        tabsize: 2,
        height: 300
      });
    </script>

<script>
$("#blog_title").keyup(function() {
    var Text = $(this).val();
    Text = Text.toLowerCase().replace(/[^a-z0-9-]/g, '-').replace(/-+/g, '-');

    $("#blog_slug").val(Text);
});
</script>
@endsection