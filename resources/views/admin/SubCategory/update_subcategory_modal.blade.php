<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form method="post" id="updateSubCategoryForm" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="up_sub_category_id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabel">Update Sub Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errMsgContainer mb-3">

                    </div>

                    <div class="row">


                        <div class="col">
                            <div class="form-group">
                                <label for="up_category_id"> Category Name</label>
                                <select name="up_category_id" class="form-select" id="up_category_id">
                                    <option hidden value=""></option>
                                    @foreach($products_category as $key=>$productscategory)
                                    <option value="{{ $productscategory->id }}">{{ $productscategory->category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col">
                            <div class="form-group mb-3">
                                <label for="up_sub_category_name"> Sub Category Name</label>
                                <input type="text" class="form-control" name="up_sub_category_name"
                                    id="up_sub_category_name" placeholder="Sub Category Name">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-3">
                                <label for="up_sub_category_slug"> Sub Category Slug</label>
                                <input type="text" class="form-control" name="up_sub_category_slug"
                                    id="up_sub_category_slug" placeholder="Sub Category Slug">
                            </div>
                        </div>
                    </div>


                    <div class="row align-items-center">
                        <div class="col">
                            <div class="form-group">
                                <label for="up_sub_category_image"> Sub Category Image</label>
                                <input type="file" class="form-control" name="up_sub_category_image"
                                    id="up_sub_category_image">
                            </div>
                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_subcategory">Update Sub Category</button>
                </div>
            </div>
        </div>
    </form>
</div>