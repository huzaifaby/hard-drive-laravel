@extends('admin.index')
@section('content')


<h1 class="mt-4">Reviews Tables</h1>
<div class="mb-4 bg-light text-end p-2">


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
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Review Description</th>
                        <th scope="col">Stars</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product_reviews as $key=>$productreviews)
                    <tr>
                           <td>{{ $productreviews->user_name }}</td>
                           <td>{{ $productreviews->user_email }}</td>
                           <td>{{ $productreviews->review_description }}</td>
                           <td>{{ $productreviews->review_stars }}</td>
                            <td>
                                <a href="edit-reviews/{{ $productreviews->id }}" class="btn btn-success">
                                    <i class="fas fa-edit"></i></a>

                                <a href="" data-id="{{ $productreviews->id }}" class="btn btn-danger delete_reviews">
                                    <i class="las la-trash-alt"></i></a>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $product_reviews->links() !!}
        </div>
    </div>
</div>

@include('admin.Reviews.reviews_js')
@endsection