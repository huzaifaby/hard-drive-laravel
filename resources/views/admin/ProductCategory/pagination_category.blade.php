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
                            <a href="" data-bs-toggle="modal" data-bs-target="#updateModal" 
                            data-id="{{ $categories->id }}"
                            data-name="{{ $categories->category_name }}" 
                            data-slug="{{ $categories->category_slug }}"
                            class="btn btn-success update_category_form">
                            <i class="las la-edit"></i></a>

                             
                            @if($categories->category_is_featured == 0 )
                            <a href="" data-id="{{ $categories->id }}" data-featured="1"
                                class="btn btn-danger featured_categories">
                                <i class="lar la-star text-white"></i></a>
                              @else
                              <a href="" data-id="{{ $categories->id }}" data-featured="0"
                                class="btn btn-success featured_categories">
                                <i class="lar la-star text-white"></i></a>
                           @endif

                            <a href="" data-id="{{ $categories->id }}" class="btn btn-danger delete_category">
                                <i class="las la-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $category->links() !!}