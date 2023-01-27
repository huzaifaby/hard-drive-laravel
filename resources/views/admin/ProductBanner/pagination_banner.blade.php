<table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Banner Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banner as $key=>$banners)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $banners->banner_name }}</td>
                        <td>{{ $banners->banner_slug }}</td>
                        <td><img src="{{ asset('image/banner/'.$banners->banner_image) }}" height="100px" width="100px"></td>

                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#updateModal" 
                            data-id="{{ $banners->id }}"
                            data-name="{{ $banners->banner_name }}" 
                            data-slug="{{ $banners->banner_slug }}"
                            data-description="{{ $banners->banner_description }}"
                            class="btn btn-success update_banner_form">
                            <i class="las la-edit"></i></a>

                            <a href="" data-id="{{ $banners->id }}" class="btn btn-danger delete_banner">
                                <i class="las la-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $banner->links() !!}