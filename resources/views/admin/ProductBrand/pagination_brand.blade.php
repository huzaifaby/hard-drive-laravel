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