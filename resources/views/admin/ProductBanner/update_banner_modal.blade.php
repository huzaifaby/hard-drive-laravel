<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form method="post" id="updateBannerForm" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="up_banner_id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabel">Update Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errMsgContainer mb-3">

                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="up_banner_name"> Banner Name</label>
                                <input type="text" class="form-control" name="up_banner_name" id="up_banner_name"
                                    placeholder="Banner Name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="up_banner_slug"> Banner Slug</label>
                                <input type="text" class="form-control" name="up_banner_slug" id="up_banner_slug"
                                    placeholder="Banner Slug">
                            </div>
                        </div>
                    </div>


                    <div class="form-group mt-2">
                        <label for="up_banner_description"> Banner Description</label>
                        <textarea class="form-control" name="up_banner_description" id="up_banner_description" cols="10"
                            rows="5"></textarea>


                    </div>

                    <div class="form-group mt-2">
                        <label for="up_banner_image"> Banner Image</label>
                        <input type="file" class="form-control" name="up_banner_image" id="up_banner_image" placeholder="Banner Image">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_banner">Update Banner</button>
                </div>
            </div>
        </div>
    </form>
</div>