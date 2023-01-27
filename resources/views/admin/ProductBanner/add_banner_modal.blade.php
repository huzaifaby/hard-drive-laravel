<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form method="post" id="addBannerForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Banner</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errMsgContainer mb-3">

                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="banner_name"> Banner Name</label>
                                <input type="text" class="form-control" name="banner_name" id="banner_name"
                                    placeholder="Banner Name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="banner_slug"> Banner Slug</label>
                                <input type="text" class="form-control" name="banner_slug" id="banner_slug"
                                    placeholder="Banner Slug">
                            </div>
                        </div>
                    </div>


                    <div class="form-group mt-2">
                        <label for="banner_description"> Banner Description</label>
                        <textarea class="form-control" name="banner_description" id="banner_description" cols="10"
                            rows="5"></textarea>


                    </div>

                    <div class="form-group mt-2">
                        <label for="image"> Banner Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Banner Image">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_banner">Save Banner</button>
                </div>
            </div>
        </div>
    </form>
</div>



<script>
$("#banner_name").keyup(function() {
    var Text = $(this).val();
    Text = Text.toLowerCase().replace(/[^a-z0-9-]/g, '-').replace(/-+/g, '-');

    $("#banner_slug").val(Text);
});
</script>