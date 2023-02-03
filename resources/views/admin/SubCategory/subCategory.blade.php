@extends('admin.index')
@section('content')

<h1 class="mt-4">Sub Category Tables</h1>
<div class="mb-4 bg-light text-end p-2">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add Sub Category</button>
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
                        <th scope="col">Category </th>
                        <th scope="col">Sub Category </th>
                        <th scope="col">Slug</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sub_category as $key=>$subcategory)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $subcategory->category_name }}</td>
                        <td>{{ $subcategory->sub_category_name }}</td>
                        <td>{{ $subcategory->sub_category_slug }}</td>
                        <td><img src="{{ asset('image/sub_category/'.$subcategory->sub_category_image) }}" height="100px" width="100px"></td>

                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#updateModal" 
                            data-id="{{ $subcategory->subcategory_id }}"
                            data-categoryid="{{ $subcategory->category_id }}"
                            data-categoryname="{{ $subcategory->category_name }}"
                            data-name="{{ $subcategory->sub_category_name }}" 
                            data-slug="{{ $subcategory->sub_category_slug }}"
                            class="btn btn-success update_subcategory_form">
                            <i class="las la-edit"></i></a>

                             
                         

                            <a href="" data-id="{{ $subcategory->subcategory_id }}" class="btn btn-danger delete_subcategory">
                                <i class="las la-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $sub_category->links() !!}
        </div>
    </div>
</div>

@include('admin.SubCategory.subcategory_js')
@include('admin.SubCategory.add_subcategory_modal')
@include('admin.SubCategory.update_subcategory_modal')

@endsection