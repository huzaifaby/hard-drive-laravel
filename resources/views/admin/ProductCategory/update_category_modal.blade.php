<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form method="post" id="updateCategoryForm" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="up_category_id">
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
                            <div class="form-group mb-3">
                                <label for="name"> Category Name</label>
                                <input type="text" class="form-control" name="up_category_name" id="up_category_name"
                                    placeholder="Category Name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-3">
                                <label for="name"> Category Slug</label>
                                <input type="text" class="form-control" name="up_category_slug" id="up_category_slug"
                                    placeholder="Category Slug">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="up_sub_category_name"> Sub Category Name</label>
                                <input type="text" class="form-control" name="up_sub_category_name"
                                    id="up_sub_category_name" placeholder="Sub Category Name">
                            </div>
                        </div>
                  
                    </div>


                    <div class="row align-items-center">
                        <div class="col">
                            <div class="form-group">
                                <label for="image"> Category Image</label>
                                <input type="file" class="form-control" name="up_category_image" id="up_category_image">
                            </div>
                        </div>
                        <div class="col-auto">

                            <img width="100" class="img-thumbnail" src="" id="img-preview">


                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_category">Update Category</button>
                </div>
            </div>
        </div>
    </form>
</div>