<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form  method="post" id="addCategoryForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errMsgContainer mb-3">

                    </div>

                    <div class="form-group">
                        <label for="name"> Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name">
                    </div>

                    <div class="form-group mt-2">
                        <label for="name"> Category Slug</label>
                        <input type="text" class="form-control" name="category_slug" id="category_slug" placeholder="Category Slug">
                    </div>

                    <div class="form-group mt-2">
                        <label for="image"> Category Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Category Image">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_category">Save Category</button>
                </div>
            </div>
        </div>
    </form>
</div>




