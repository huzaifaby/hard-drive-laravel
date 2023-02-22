@extends('admin.index')
@section('content')

<h1 class="mt-4">Brand Tables</h1>
<div class="mb-4 bg-light text-end p-2">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add Brand</button>
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
                        <th scope="col">Brand Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brand as $key=>$brands)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $brands->brand_name }}</td>
                        <td>{{ $brands->brand_slug }}</td>
                        <td><img src="{{ asset('image/brand/'.$brands->brand_image) }}" height="100px" width="100px"></td>

                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#updateModal" 
                            data-id="{{ $brands->id }}"
                            data-name="{{ $brands->brand_name }}" 
                            data-slug="{{ $brands->brand_slug }}"
                            data-description="{{ $brands->brand_description }}"
                            class="btn btn-success update_brand_form">
                            <i class="las la-edit"></i></a>

                            <a href="" data-id="{{ $brands->id }}" class="btn btn-danger delete_brand">
                                <i class="las la-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $brand->links() !!}
        </div>
    </div>
</div>

@include('admin.ProductBrand.brand_js')
@include('admin.ProductBrand.add_brand_modal')
@include('admin.ProductBrand.update_brand_modal')

@endsection