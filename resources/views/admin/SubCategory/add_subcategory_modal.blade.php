<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form method="post" id="addSubCategoryForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Sub Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errMsgContainer mb-3">

                    </div>

                    <div class="row">

                        <div class="col">
                            <div class="form-group">
                                <label for="category_id"> Category Name</label>
                                <select name="category_id" class="form-select" id="category_id">
                                <option hidden value="">Select</option>
                                @foreach($products_category as $key=>$productscategory)
                                <option value="{{ $productscategory->id }}">{{ $productscategory->category_name }}
                                </option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="sub_category_name"> Sub Category Name</label>
                                <input type="text" class="form-control" name="sub_category_name" id="sub_category_name"
                                    placeholder="Category Name">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group mt-2">
                                <label for="sub_category_slug"> Sub Category Slug</label>
                                <input type="text" class="form-control" name="sub_category_slug" id="sub_category_slug"
                                    placeholder="Category Slug">
                            </div>
                        </div>
                    </div>





                    <div class="form-group mt-2">
                        <label for="image"> Sub Category Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Category Image">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_subcategory">Save Category</button>
                </div>
            </div>
        </div>
    </form>
</div>



<script>
$("#sub_category_name").keyup(function() {
    var Text = $(this).val();
    Text = Text.toLowerCase().replace(/[^a-z0-9-]/g, '-').replace(/-+/g, '-');

    $("#sub_category_slug").val(Text);
});
</script>