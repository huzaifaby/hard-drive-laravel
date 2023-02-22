<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form method="post" id="updateProductForm" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="up_id">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabel">Update Products</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errMsgContainer mb-3">

                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="up_product_title"> Product Title</label>
                                <input type="text" class="form-control" name="up_product_title" id="up_product_title"
                                    placeholder="Product Name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="up_product_slug"> Product Slug</label>
                                <input type="text" class="form-control" name="up_product_slug" id="up_product_slug"
                                    placeholder="Product Slug">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="up_product_price"> Product Price</label>
                                <input type="text" class="form-control" name="up_product_price" id="up_product_price"
                                    placeholder="Product Price">
                            </div>
                        </div>



                    </div>


                    <div class="row">
                        <div class="col">
                            <div class="form-group mt-2">
                                <label for="up_product_sku"> Product SKU</label>
                                <input type="text" class="form-control" name="up_product_sku" id="up_product_sku"
                                    placeholder="Product SKU">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group mt-2 ">
                                <label for="up_category_id"> Product Category</label>
                                <select class="form-select category_id" name="up_category_id" id="up_category_id">
                                    <option hidden>Select</option>
                                    @foreach($products_category as $key=>$productscategory)
                                    <option value="{{ $productscategory->id }}">{{ $productscategory->category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col">
                            <div class="form-group mt-2 ">
                                <label for="up_sub_category_id"> Sub Category Category</label>
                                <select class="form-select sub_category_id" name="up_sub_category_id" id="up_sub_category_id">
                                    <option hidden>Select</option>
                                </select>
                            </div>
                        </div>

                     

                    </div>



                    <div class="row">

                    <div class="col">
                            <div class="form-group mt-2">
                                <label for="up_brand_id"> Manufacturer</label>
                                <select class="form-select" name="up_brand_id" id="up_brand_id">
                                    <option hidden>Select</option>
                                    @foreach($products_brand as $key=>$products_brands)
                                    <option value="{{ $products_brands->id }}">{{ $products_brands->brand_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group mt-2">
                                <label for="up_availability"> Availability </label>
                                <select class="form-select" name="up_availability" id="up_availability">
                                    <option hidden>Select</option>
                                    <option value="1">In Stock</option>
                                    <option value="0">Out of Stock</option>
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group mt-2">
                                <label for="up_product_condition"> Product Condition</label>
                                <input type="text" class="form-control" name="up_product_condition"
                                    id="up_product_condition" placeholder="Product Condition">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group mt-2">
                                <label for="up_product_quantity"> Quantity</label>
                                <input type="number" class="form-control" name="up_product_quantity"
                                    id="up_product_quantity" placeholder="Product Quantity">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <label for="up_image"> Product Image</label>
                        <input type="file" class="form-control" name="up_image" id="up_image"
                            placeholder="Product Image">
                    </div>

                    <div class="form-group mt-2">
                        <label for="up_product_description"> Product Description</label>
                        <textarea class="form-control" name="up_product_description" id="up_product_description"
                            cols="10" rows="5"></textarea>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group mt-2">
                                <label for="up_product_meta_title"> Product Meta Title</label>
                                <input type="text" class="form-control" name="up_product_meta_title"
                                    id="up_product_meta_title" placeholder="Product Meta Title">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mt-2">
                                <label for="up_product_meta_description"> Product Meta Description</label>
                                <input type="text" class="form-control" name="up_product_meta_description"
                                    id="up_product_meta_description" placeholder="Product Meta Description">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary update_product">Update Product</button>
                </div>
            </div>
        </div>
    </form>
</div>


<script>
$("#up_product_title").keyup(function() {
    var Text = $(this).val();
    Text = Text.toLowerCase().replace(/[^a-z0-9-]/g, '-').replace(/-+/g, '-');

    $("#up_product_slug").val(Text);
});
</script>


<script>
CKEDITOR.replace('up_product_description');
CKEDITOR.config.height = '100';
CKEDITOR.config.width = '100%';
</script>