@extends('admin.index')
@section('content')


<h1 class="mt-4">Product Tables</h1>
<div class="mb-4 bg-light text-end p-2">
<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</button>
<a href="{{ route('product.csv') }}" class="btn btn-success ">Import</a>
<a href="{{ route('product.export') }}" class="btn btn-success">Export</a>


</div>
<div class="card mb-4">
    <div class="card-header">
        <input type="text" name="search" id="search" class="form-control" placeholder="Search Here...">
    </div>
    <div class="card-body">
        <div class="table-data">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key=>$product)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $product->product_title }}</td>
                        <td>{{ $product->product_price }}</td>
                        <td><img src="{{ asset('image/products/'.$product->product_image) }}" height="100px"
                                width="100px"></td>

                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#updateModal" data-id="{{ $product->product_id }}"
                                data-title="{{ $product->product_title }}" data-price="{{ $product->product_price }}"
                                data-sku="{{ $product->product_sku }}"
                                data-condition="{{ $product->product_condition }}"
                                data-description="{{ $product->product_description }}"
                                data-slug="{{ $product->product_slug }}"
                                data-metatitle="{{ $product->product_meta_title }}"
                                data-metadescription="{{ $product->product_meta_description }}"
                                data-categoryname="{{ $product->category_name }}"
                                data-categoryid="{{ $product->category_id }}"
                                data-subcategoryname="{{ $product->sub_category_name }}"
                                data-subcategoryid="{{ $product->sub_category_id }}"
                                data-brandname="{{ $product->brand_name }}"
                                data-brandid="{{ $product->brand_id }}"
                                data-availability="{{ $product->availability }}"
                                data-quantity="{{ $product->quantity }}"
                                class="btn btn-success update_product_form">
                                <i class="fas fa-edit"></i></a>
                      
                            @if($product->is_featured == 0 )
                            <a href="" data-id="{{ $product->product_id }}" data-featured="1"
                                class="btn btn-danger featured_product">
                                <i class="lar la-star text-white"></i></a>
                              @else
                              <a href="" data-id="{{ $product->product_id }}" data-featured="0"
                                class="btn btn-success featured_product">
                                <i class="lar la-star text-white"></i></a>
                           @endif

                           @if($product->is_sale == 0 )
                           <a href="" data-id="{{ $product->product_id }}" data-sale="1"
                                class="btn btn-danger sale_product">
                                <i class="las la-tag"></i></a>
                            @else
                            <a href="" data-id="{{ $product->product_id }}" data-sale="0"
                                class="btn btn-success sale_product">
                                <i class="las la-tag"></i></a>
                            @endif

                        <a href="" data-id="{{ $product->product_id }}" class="btn btn-danger delete_product mt-2">
                            <i class="las la-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $products->links() !!}
        </div>
    </div>
</div>

@include('admin.Products.product_js')
@include('admin.Products.add_product_modal')
@include('admin.Products.update_product_modal')


@endsection