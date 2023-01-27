<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form method="post" id="updateBrandForm" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="up_brand_id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabel">Update Brand</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errMsgContainer mb-3">

                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="up_brand_name"> Brand Name</label>
                                <input type="text" class="form-control" name="up_brand_name" id="up_brand_name"
                                    placeholder="Brand Name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="up_brand_slug"> Brand Slug</label>
                                <input type="text" class="form-control" name="up_brand_slug" id="up_brand_slug"
                                    placeholder="Brand Slug">
                            </div>
                        </div>
                    </div>


                    <div class="form-group mt-2">
                        <label for="up_brand_description"> Brand Description</label>
                        <textarea class="form-control" name="up_brand_description" id="up_brand_description" cols="10"
                            rows="5"></textarea>


                    </div>

                    <div class="form-group mt-2">
                        <label for="up_brand_image"> Brand Image</label>
                        <input type="file" class="form-control" name="up_brand_image" id="up_brand_image" placeholder="Brand Image">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_brand">Update Brand</button>
                </div>
            </div>
        </div>
    </form>
</div>