@extends('admin.index')
@section('content')

<h1 class="mt-4">Category Tables</h1>
<div class="mb-4 bg-light text-end p-2">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add Category</button>
</div>
<div class="card mb-4">
    <div class="card-header">
        <input type="text" name="search" id="search" class="form-control" placeholder="Search Here...">
    </div>
    <div class="card-body">
        <div class="table-data ">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $key=>$categories)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $categories->category_name }}</td>
                        <td>{{ $categories->category_slug }}</td>
                        <td><img src="{{ asset('image/category/'.$categories->category_image) }}" height="100px" width="100px"></td>

                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#updateModal" data-CategoryId="{{ $categories->id }}"
                                data-categoryName="{{ $categories->category_name }}" data-categorySlug="{{ $categories->category_slug }}"
                                class="btn btn-success update_category_form">
                                <i class="las la-edit"></i></a>

                            <a href="" data-categoryId="{{ $categories->id }}" class="btn btn-danger delete_category">
                                <i class="las la-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $category->links() !!}
        </div>
    </div>
</div>

@include('admin.ProductCategory.category_js')
@include('admin.ProductCategory.add_category_modal')
@include('admin.ProductCategory.update_category_modal')

@endsection