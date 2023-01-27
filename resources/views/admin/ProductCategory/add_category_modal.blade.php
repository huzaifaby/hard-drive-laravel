<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form method="post" id="addCategoryForm" enctype="multipart/form-data">
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

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="category_name"> Category Name</label>
                                <input type="text" class="form-control" name="category_name" id="category_name"
                                    placeholder="Category Name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mt-2">
                                <label for="category_slug"> Category Slug</label>
                                <input type="text" class="form-control" name="category_slug" id="category_slug"
                                    placeholder="Category Slug">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="sub_category_name"> Sub Category Name</label>
                                <input type="text" class="form-control" name="sub_category_name" id="sub_category_name"
                                    placeholder="Sub Category Name">
                            </div>
                        </div>

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



<script>
$("#category_name").keyup(function() {
    var Text = $(this).val();
    Text = Text.toLowerCase().replace(/[^a-z0-9-]/g, '-').replace(/-+/g, '-');

    $("#category_slug").val(Text);
});
</script>