<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form method="post" id="addBrandForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Brand</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errMsgContainer mb-3">

                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="brand_name"> Brand Name</label>
                                <input type="text" class="form-control" name="brand_name" id="brand_name"
                                    placeholder="Brand Name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="brand_slug"> Brand Slug</label>
                                <input type="text" class="form-control" name="brand_slug" id="brand_slug"
                                    placeholder="Brand Slug">
                            </div>
                        </div>
                    </div>


                    <div class="form-group mt-2">
                        <label for="brand_description"> Brand Description</label>
                        <textarea class="form-control" name="brand_description" id="brand_description" cols="10"
                            rows="5"></textarea>


                    </div>

                    <div class="form-group mt-2">
                        <label for="image"> Brand Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Brand Image">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_brand">Save Brand</button>
                </div>
            </div>
        </div>
    </form>
</div>



<script>
$("#brand_name").keyup(function() {
    var Text = $(this).val();
    Text = Text.toLowerCase().replace(/[^a-z0-9-]/g, '-').replace(/-+/g, '-');

    $("#brand_slug").val(Text);
});
</script>