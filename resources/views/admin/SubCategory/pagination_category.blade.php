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