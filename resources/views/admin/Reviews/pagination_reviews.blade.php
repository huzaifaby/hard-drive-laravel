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